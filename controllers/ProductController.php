<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;

class ProductController extends AppController
{
    public function actionView($id)
    {
        $product = Product::findOne(['id' => $id]);
       // $category = Category::findOne(['product_id'=>$product->id]);
        return $this->render('view', [
            'product' => $product,
        ]);
    }
}