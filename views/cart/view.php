<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<section id="cart_items">
    <div class="container">
        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-label="close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
                <?= Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif; ?>
        <?php if (Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-label="close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
                <?= Yii::$app->session->getFlash('error'); ?>
            </div>
        <?php endif; ?>
        <div class="table-responsive cart_info">
            <?php if (!empty($session['cart'])): ?>
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Товар</td>
                        <td class="description"></td>
                        <td class="price">Цена</td>
                        <td class="quantity">Колличество</td>
                        <td class="total">Всего</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($session['cart'] as $id => $product): ?>
                        <tr>
                            <td class="cart_product">
                                <a href="<?= Url::to(['product/view', 'id' => $id]) ?>">
                                    <?= Html::img("@web/images/products/{$product['img']}", ['alt' => $product['name']]) ?>
                            </td>
                            <td class="cart_description">
                                <h4>
                                    <a href="<?= Url::to(['product/view', 'id' => $id]) ?>">
                                        <?= $product['name'] ?>
                                    </a>
                                </h4>
                                <p>Web ID: 1089772</p>
                            </td>
                            <td class="cart_price">
                                <p>$ <?= $product['price'] ?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href=""> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity"
                                           value="<?= $product['qty'] ?>"
                                           autocomplete="off"
                                           size="2">
                                    <a class="cart_quantity_down" href=""> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">$<?= $product['price'] * $product['qty'] ?></p>
                            </td>
                            <td class="cart_delete">
                                <button type="button"
                                        class="cart_quantity_delete"
                                        data-id="<?= $id ?>"
                                >
                                    <i class="fa fa-times"></i>
                                </button>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <h2>Ваша корзина пуста</h2>
            <?php endif; ?>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>Готовы оформить заказ?</h3>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="total_area">
                    <?php $form = ActiveForm::begin() ?>
                    <?= $form->field($order, 'name') ?>
                    <?= $form->field($order, 'email') ?>
                    <?= $form->field($order, 'phone') ?>
                    <?= $form->field($order, 'address') ?>
                    <?= Html::submitButton('Заказать', ['class' => 'btn btn-success']) ?>
                    <?php ActiveForm::end() ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>В корзине <span><?= $session['cart.qty'] ?></span></li>
                        <li>На сумму: <span>$<?= $session['cart.sum'] ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->