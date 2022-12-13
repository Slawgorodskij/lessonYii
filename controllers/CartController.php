<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Order;
use app\models\OrderItems;
use app\models\Product;
use Yii;

class CartController extends AppController
{
    public function actionView()
    {
        $session = Yii::$app->session;
        $session->open();
        $order = new Order();

        $this->setMeta('Корзина');

        if ($order->load(Yii::$app->request->post())) {
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];

            if ($order->save()) {
                $this->saveOrderItems($session['cart'], $order->id);
                Yii::$app->session->setFlash('success', 'Ваш заказ принят. Менеджер вскоре свяжется с Вами');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                $session->remove('cart');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('success', 'Ошибка оформления заказа');
            }
        }

        return $this->render('view', [
            'session' => $session,
            'order' => $order,
        ]);
    }

    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $qty = Yii::$app->request->get('qty') ?
            (int)Yii::$app->request->get('qty') : 1;
        $product = Product::findOne($id);
        if (empty($product)) return false;

        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->addToCart($product, $qty);

        $this->layout = false;

        return $this->render('cart-modal', [
            'session' => $session,
        ]);
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $session->remove('cart');

        $this->layout = false;

        return $this->render('cart-modal', [
            'session' => $session,
        ]);
    }

    public function actionDeleteItem()
    {
        $id = Yii::$app->request->get('id');

        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->recalc($id);

        $this->layout = false;

        return $this->render('cart-modal', [
            'session' => $session,
        ]);
    }

    protected function saveOrderItems($items, $order_id)
    {
        foreach ($items as $id=>$item){
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty'] * $item['price'];
            $order_items->save();
        }
    }
}