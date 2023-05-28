<?php

use app\modules\admin\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создание Товара', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'attribute' => 'category_id',
                'value' => function ($data) {
                    return $data->category->name;
                }
            ],
            'name',
            'price',
            [
                'attribute' => 'hit',
                'value' => function ($data) {
                    return !$data->hit
                        ? '<span class="text-danger">Нет</span>'
                        : '<span class="text-success">Да</span>' ;
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'new',
                'value' => function ($data) {
                    return !$data->new
                        ? '<span class="text-danger">Нет</span>'
                        : '<span class="text-success">Да</span>' ;
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'sale',
                'value' => function ($data) {
                    return !$data->sale
                        ? '<span class="text-danger">Нет</span>'
                        : '<span class="text-success">Да</span>' ;
                },
                'format' => 'html',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
