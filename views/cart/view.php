<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>

<section id="cart_items">
    <div class="container">
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
                                        data-id="<?= $id?>"
                                >
                                    <i class="fa fa-times"></i>
                                </button>
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

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>

							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>

							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->