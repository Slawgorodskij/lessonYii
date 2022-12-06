<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;

class ProductController extends AppController
{
    public function actionView($id)
    {
        $product = Product::findOne(['id' => $id]);
        $hits = Product::find()
            ->where(['hit' => '1'])
            ->limit(6)
            ->all();
        $this->setMeta('E-Shopper | ' . $product->name, $product->keywords, $product->description);

        return $this->render('view', [
            'product' => $product,
            'hits' => $hits,
        ]);
    }
}