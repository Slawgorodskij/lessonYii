<?php

namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart($product, $qty = 1)
    {
            echo 'Корзина';
    }
}