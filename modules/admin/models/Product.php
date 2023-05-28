<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string|null $content
 * @property float $price
 * @property string|null $keywords
 * @property string|null $description
 * @property string|null $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name'], 'required'],
            [['category_id'], 'integer'],
            [['content', 'hit', 'new', 'sale'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'description', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID товара',
            'category_id' => 'Категория',
            'name' => 'Наименование',
            'content' => 'Описание',
            'price' => 'Цена',
            'keywords' => 'Ключевые словва',
            'description' => 'Мета-описания',
            'img' => 'Фото',
            'hit' => 'Хит',
            'new' => 'Новинка',
            'sale' => 'Распродажа',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}
