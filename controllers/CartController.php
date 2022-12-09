<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Product;

class CartController extends AppController
{
    public function actionAdd()
    {
        $id = \Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if(empty($product)) return false;

        $session = \Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->addToCart($product);
    }
}