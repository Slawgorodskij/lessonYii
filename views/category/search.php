<?php

/** @var yii\web\View $this */

use app\components\MenuWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<section id="advertisement">
    <div class="container">
        <?= Html::img("@web/images/shop/123.jpg", ['alt' => 'реклама']) ?>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <ul class="catalog panel-menu category-products">
                        <?= MenuWidget::widget(['tpl' => 'menu']) ?>
                    </ul>

                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"
                                   data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br/>
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <?= Html::img("@web/images/home/shipping.jpg", ["alt" => "картинка с надписью доставка"]) ?>
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <?php if (!empty($products)): ?>
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Вы искали: <?= $q ?></h2>
                        <?php $i = 0;
                        foreach ($products as $product): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <?= Html::img("@web/images/shop/{$product->img}", ['alt' => $product->name]) ?>
                                            <h2>$<?= $product->price ?></h2>
                                            <p><?= $product->name ?></p>
                                            <p class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
                                            </p>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>$<?= $product->price ?></h2>
                                                <a href="<?= Url::to(['product/view', 'id' => $product->id]) ?>">
                                                    <?= $product->name ?>
                                                </a>
                                                <a href="<?= Url::to(['cart/add', 'id' => $product->id]) ?>"
                                                   data-id="<?= $product->id?>"
                                                   class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Add to cart
                                                </a>
                                            </div>
                                        </div>
                                        <?php if ($product->new): ?>
                                            <?= Html::img("@web/images/home/new.png", ['alt' => 'новинка', 'class' => "new"]) ?>
                                        <?php endif ?>
                                        <?php if ($product->sale): ?>
                                            <?= Html::img("@web/images/home/sale.png", ['alt' => 'распродажа', 'class' => "new"]) ?>
                                        <?php endif ?>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php $i++ ?>
                            <?php if ($i % 3 === 0): ?>
                                <div class="clearfix"></div>
                            <?php endif; ?>
                        <?php endforeach ?>

                        <div class="clearfix"></div>
                        <?= LinkPager::widget([
                            "pagination" => $pages,
                            "class" => "pagination",
                        ]) ?>

                    </div><!--features_items-->
                <?php else: ?>
                    <h2>Ни чего не нашлось по вашему запросу: <?= Html::encode($q) ?></h2>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>
