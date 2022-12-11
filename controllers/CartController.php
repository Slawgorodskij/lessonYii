<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Product;
use Yii;

class CartController extends AppController
{
    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if (empty($product)) return false;

        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->addToCart($product);

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

}