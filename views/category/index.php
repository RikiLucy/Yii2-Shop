<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

?>


<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php $i = 0; foreach ($sliders as $slider): ?>
                            <li data-target="#slider-carousel" data-slide-to="<?= $i ?>" <?php if ($i == 1): echo "class='active'"; endif;?>> </li>

                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </ol>

                    <div class="carousel-inner">
                        <?php $i = 0; foreach ($sliders as $slider): ?>
                        <div <?php if ($i == 0): echo "class='item active'"; else: echo "class='item'"; endif;?>>


                            <div class="col-sm-6">
                                <h1><?= $slider->title ?></h1>
                                <h2><?= $slider->subtitle ?></h2>
                                <p><?= $slider->text ?></p>
                                <form action="<?= $slider->btn_link ?>">
                                <button type="submit" class="btn btn-default get"><?= $slider->btn_title ?></button>
                                </form>
                            </div>
                            <div class="col-sm-6">
                                <?= Html::img($slider->getImage()->getUrl('484x441'), ['alt' => $slider->title]) ?>
                            </div>
                    <?php $i++; ?>
                        </div>
                        <?php endforeach; ?>
                        <!--<div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>100% Responsive Design</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free Ecommerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                <img src="images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>-->

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <ul class="catalog category-products">
                        <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
                    </ul>



                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center">
                        <img src="images/home/shipping.jpg" alt="" />
                    </div>

                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <?php if(!empty($hits)) :  ?>
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    <?php foreach ($hits as $hit): ?>
                    <?php $mainImg = $hit->getImage(); ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id])?>">

                                    <?= Html::img($mainImg->getUrl(), ['alt' => $hit->name]) ?>
                                    </a>

                                    <h2>$<?= $hit->price ?></h2>
                                    <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id])?>"><?= $hit->name ?></p></a>
                                    <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $hit->id])?>" data-id= '<?= $hit->id ?>' class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                                <?php if( $hit->new) : ?>
                                    <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new']) ?>
                                <?php endif; ?>
                                <?php if( $hit->sale) : ?>
                                    <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'new']) ?>
                                <?php endif; ?>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <? endforeach; ?>

                <?php endif; ?>
                </div><!--features_items-->



            </div>
        </div>
    </div>
</section>
