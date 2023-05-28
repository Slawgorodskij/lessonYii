<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Product $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => "Вы действительно хотите удалить Товар $model->name?",
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'category_id',
                'value' => $model->category->name,
            ],
            'name',
            'content:html',
            'price',
            'keywords',
            'description',
            'img',
            [
                'attribute' => 'hit',
                'value' => !$model->hit
                    ? '<span class="text-danger">Нет</span>'
                    : '<span class="text-success">Да</span>',
                'format' => 'html',
            ],
            [
                'attribute' => 'new',
                'value' => !$model->new
                    ? '<span class="text-danger">Нет</span>'
                    : '<span class="text-success">Да</span>',
                'format' => 'html',
            ],
            [
                'attribute' => 'sale',
                'value' => !$model->sale
                    ? '<span class="text-danger">Нет</span>'
                    : '<span class="text-success">Да</span>',
                'format' => 'html',
            ],
        ],
    ]) ?>

</div>
