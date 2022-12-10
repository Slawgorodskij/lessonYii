<section id="cart_items">
    <div class="container">
        <div class="table-responsive cart_info">
            <?php use yii\helpers\Html;
            use yii\helpers\Url;

            if (!empty($session['cart'])): ?>
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
                                    <?= Html::img("@web/images/product/{$product['img']}", ['alt' => $product['name']]) ?>
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
                                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                                        <tr>
                                            <td colspan="4"> Итого: </td>
                                            <td><?= $session['cart.qty'] ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"> На сумму:</td>
                                            <td><?= $session['cart.sum'] ?></td>
                                        </tr>

                    </tbody>
                </table>
            <?php else: ?>
                <h2>Ваша корзина пуста</h2>
            <?php endif; ?>
        </div>
    </div>
</section> <!--/#cart_items-->
