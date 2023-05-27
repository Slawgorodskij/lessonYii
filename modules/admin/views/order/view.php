<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\Order $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1> Просмотр заказа № <?= $model->id ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            [
                'attribute' => 'status',
                'value' => !$model->status
                    ? '<span class="text-danger">Активен</span>'
                    : '<span class="text-success">Завершен</span>',
                'format' => 'html'
            ],
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>
    <?php $items = $model->orderItems; ?>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="description"></td>
                    <td class="price">Цена</td>
                    <td class="quantity">Колличество</td>
                    <td class="total">Всего</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($items as $product): ?>
                    <tr>
                        <td class="cart_description">
                            <h4>
                                <a href="<?= \yii\helpers\Url::to(['/product/view', 'id' => $product['product_id']]) ?>">
                                    <?= $product['name'] ?>
                                </a>
                            </h4>
                        </td>
                        <td class="cart_price">
                            <p>$ <?= $product['price'] ?></p>
                        </td>
                        <td class="cart_quantity">
                            <?= $product['qty_item'] ?>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">$<?= $product['sum_item'] ?></p>
                        </td>
                    </tr>

                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>