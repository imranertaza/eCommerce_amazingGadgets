<section class="banner">
    <div class="container">
        <div class="row gx-0">
            <div class="col-lg-9 offset-lg-3">
                <div class="swiper bannerSlide">
                    <div class="swiper-wrapper">
                        <?php $sli_1 = get_lebel_by_value_in_theme_settings('slider_1'); ?>
                        <div class="swiper-slide"><?php echo image_view('uploads/slider', '', $sli_1, 'noimage.png', 'img-fluid w-100');?></div>
                        <?php $sli_2 = get_lebel_by_value_in_theme_settings('slider_2'); ?>
                        <div class="swiper-slide"><?php echo image_view('uploads/slider', '', $sli_2, 'noimage.png', 'img-fluid w-100');?></div>
                        <?php $sli_3 = get_lebel_by_value_in_theme_settings('slider_3'); ?>
                        <div class="swiper-slide"><?php echo image_view('uploads/slider', '', $sli_3, 'noimage.png', 'img-fluid w-100');?></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="main-container my-5">
    <div class="container">
        <div class="popular-category mb-5">
            <div class="card rounded-0 border-0">
                <div class="card-header  border-start border-end border-top border-bottom-0  rounded-0 py-3 bg-white">
                    <h4>Popular Categories</h4>
                </div>
                <div class="card-body p-0">
                    <div class="row gx-0 row-cols-2 row-cols-sm-4 row-cols-lg-6 text-center">
                        <?php

                            foreach ($populerCat as $catPop){
                                $icon_id = get_data_by_id('icon_id','cc_product_category','prod_cat_id',$catPop->prod_cat_id);
                                $icon = get_data_by_id('code','cc_icons','icon_id',$icon_id);
                        ?>
                        <div class="col border p-5">
                            <a href="<?php echo base_url('category/'.$catPop->prod_cat_id);?>">
                            <?php echo $icon; //echo image_view('icons','',$icon,'noimage.png','img-fluid icon-pd-20')?>
                            <h5 class="mt-3"><a href="#"><?php echo get_data_by_id('category_name','cc_product_category','prod_cat_id',$catPop->prod_cat_id);?></a></h5>
                            </a>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="trend-collection mb-5">
            <div class="card rounded-0">
                <div class="card-header py-3 bg-white d-flex justify-content-between align-items-center">
                    <h4>Trending collection</h4>
                    <div class="swiper-btn d-flex">
                        <div class="trend-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-74251e9ed2a9b87c">
                            <i class="fa-solid fa-angle-left"></i>
                        </div>
                        <div class="trend-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-74251e9ed2a9b87c">
                            <i class="fa-solid fa-angle-right"></i>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="swiper trendSlide text-center swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                        <div class="swiper-wrapper" id="swiper-wrapper-74251e9ed2a9b87c" aria-live="polite" style="transform: translate3d(-1113px, 0px, 0px); transition-duration: 0ms;"><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="1" role="group" aria-label="2 / 4" style="width: 340px; margin-right: 31px;">
                                <img src="<?php echo base_url()?>/assets/img/trend2.png" alt="" class="img-fluid w-100">
                                <h3 class="my-3"><a href="#">The Premium-Weight Crew</a></h3>
                                <p><a href="#" class="btn btn-shop w-100">Shop Now</a></p>
                            </div><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2" role="group" aria-label="3 / 4" style="width: 340px; margin-right: 31px;">
                                <img src="<?php echo base_url()?>/assets/img/trend3.png" alt="" class="img-fluid w-100">
                                <h3 class="my-3"><a href="#">The Forever High-Top</a></h3>
                                <p><a href="#" class="btn btn-shop w-100">Shop Now</a></p>
                            </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="3" role="group" aria-label="4 / 4" style="width: 340px; margin-right: 31px;">
                                <img src="<?php echo base_url()?>/assets/img/trend3.png" alt="" class="img-fluid w-100">
                                <h3 class="my-3"><a href="#">The Forever High-Top</a></h3>
                                <p><a href="#" class="btn btn-shop w-100">Shop Now</a></p>
                            </div>
                            <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" role="group" aria-label="1 / 4" style="width: 340px; margin-right: 31px;">
                                <img src="<?php echo base_url()?>/assets/img/trend1.png" alt="" class="img-fluid w-100">
                                <h3 class="my-3"><a href="#">The Oversized Alpaca Crew</a></h3>
                                <p><a href="#" class="btn btn-shop w-100">Shop Now</a></p>
                            </div>
                            <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" role="group" aria-label="2 / 4" style="width: 340px; margin-right: 31px;">
                                <img src="<?php echo base_url()?>/assets/img/trend2.png" alt="" class="img-fluid w-100">
                                <h3 class="my-3"><a href="#">The Premium-Weight Crew</a></h3>
                                <p><a href="#" class="btn btn-shop w-100">Shop Now</a></p>
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="2" role="group" aria-label="3 / 4" style="width: 340px; margin-right: 31px;">
                                <img src="<?php echo base_url()?>/assets/img/trend3.png" alt="" class="img-fluid w-100">
                                <h3 class="my-3"><a href="#">The Forever High-Top</a></h3>
                                <p><a href="#" class="btn btn-shop w-100">Shop Now</a></p>
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="3" role="group" aria-label="4 / 4" style="width: 340px; margin-right: 31px;">
                                <img src="<?php echo base_url()?>/assets/img/trend3.png" alt="" class="img-fluid w-100">
                                <h3 class="my-3"><a href="#">The Forever High-Top</a></h3>
                                <p><a href="#" class="btn btn-shop w-100">Shop Now</a></p>
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" role="group" aria-label="1 / 4" style="width: 340px; margin-right: 31px;">
                                <img src="<?php echo base_url()?>/assets/img/trend1.png" alt="" class="img-fluid w-100">
                                <h3 class="my-3"><a href="#">The Oversized Alpaca Crew</a></h3>
                                <p><a href="#" class="btn btn-shop w-100">Shop Now</a></p>
                            </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="1" role="group" aria-label="2 / 4" style="width: 340px; margin-right: 31px;">
                                <img src="<?php echo base_url()?>/assets/img/trend2.png" alt="" class="img-fluid w-100">
                                <h3 class="my-3"><a href="#">The Premium-Weight Crew</a></h3>
                                <p><a href="#" class="btn btn-shop w-100">Shop Now</a></p>
                            </div><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2" role="group" aria-label="3 / 4" style="width: 340px; margin-right: 31px;">
                                <img src="<?php echo base_url()?>/assets/img/trend3.png" alt="" class="img-fluid w-100">
                                <h3 class="my-3"><a href="#">The Forever High-Top</a></h3>
                                <p><a href="#" class="btn btn-shop w-100">Shop Now</a></p>
                            </div></div>

                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                </div>
            </div>
        </div>
        <div class="weekly-deals mb-5">
            <div class="card rounded-0">
                <div class="row gx-0">
                    <div class="col-lg-3">
                        <div class="deal-box position-relative h-100">
                            <?php
                            $banner_1 = get_lebel_by_value_in_theme_settings('home_category_banner');
                            echo image_view('uploads/category_banner', '', $banner_1, 'noimage.png', 'w-100 h-100');
                            ?>
                            <div class="deal-content position-absolute top-0 d-flex align-items-stretch h-100 w-100 flex-column p-4">
                                <p class="mt-auto text-center"><a href="#" class="btn btn-shop">Shop Now <i class="fa-solid fa-angle-right"></i></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="products h-100">
                            <div class="row gx-0 row-cols-1 row-cols-sm-2 row-cols-md-4 h-100">
                                <?php foreach ($products as $pro){ ?>
                                <div class="col border p-2">
                                    <div class="product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                        <?php if (modules_key_by_access('wishlist') == 1) { ?>
                                            <?php if (!isset(newSession()->isLoggedInCustomer)){ ?>
                                                <a href="<?php echo base_url('login');?>" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2"><i class="fa-solid fa-heart"></i></a>
                                            <?php }else{ ?>
                                                <a href="javascript:void(0)" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2" onclick="addToWishlist(<?php echo $pro->product_id ?>)"><i class="fa-solid fa-heart"></i></a>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php if (modules_key_by_access('compare') == 1) { ?>
                                        <a href="javascript:void(0)" onclick="addToCompare(<?php echo $pro->product_id ?>)" class="btn-compare position-absolute start-0 top-0 mt-5 ms-2"><i class="fa-solid fa-code-compare"></i></a>
                                        <?php } ?>
                                        <div class="product-top">
                                            <?php echo image_view('uploads/products',$pro->product_id,'191_'.$pro->image,'noimage.png','img-fluid w-100')?>
                                            <div class="rating text-center my-2">
                                                <?php echo product_id_by_rating($pro->product_id);?>
                                            </div>
                                        </div>
                                        <div class="product-bottom mt-auto">
                                            <div class="category">
                                                Categorie
                                            </div>
                                            <div class="product-title mb-2 text-capitalize">
                                                <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo $pro->name;?></a>
                                            </div>
                                            <div class="price mb-3">
                                                <?php $spPric = get_data_by_id('special_price','cc_product_special','product_id',$pro->product_id);  if (empty($spPric)){ ?>
                                                    <?php echo currency_symbol($pro->price);?>
                                                <?php }else{ ?>
                                                    <small> <del><?php echo currency_symbol($pro->price);?></del></small>/<?php echo currency_symbol($spPric);?>
                                                <?php } ?>
                                            </div>
                                            <a href="javascript:void(0)" onclick="addToCart(<?php echo $pro->product_id ?>)" class="btn btn-cart w-100 rounded-0 mt-3">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="featured-products mb-5">
            <div class="card rounded-0">
                <div class="card-header py-3 bg-white">
                    <a href="<?php echo base_url('featuredproducts')?>" style="float: right;">View all featured products</a>
                    <h4>Featured Products</h4>
                </div>
                <div class="card-body">
                    <div class="products h-100">
                        <div class="row gx-0 row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-5 h-100">
                            <?php foreach ($prodFeat as $fetPro){ ?>
                            <div class="col border p-2">
                                <div class="product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                    <?php if (modules_key_by_access('wishlist') == 1) { ?>
                                        <?php if (!isset(newSession()->isLoggedInCustomer)){ ?>
                                            <a href="<?php echo base_url('login');?>" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2"><i class="fa-solid fa-heart"></i></a>
                                        <?php }else{ ?>
                                            <a href="javascript:void(0)" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2" onclick="addToWishlist(<?php echo $fetPro->product_id ?>)"><i class="fa-solid fa-heart"></i></a>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php if (modules_key_by_access('compare') == 1) { ?>
                                    <a href="javascript:void(0)" onclick="addToCompare(<?php echo $fetPro->product_id ?>)" class="btn-compare position-absolute start-0 top-0 mt-5 ms-2"><i class="fa-solid fa-code-compare"></i></a>
                                    <?php } ?>
                                    <div class="product-top">
                                        <?php echo image_view('uploads/products',$fetPro->product_id,'191_'.$fetPro->image,'noimage.png','img-fluid w-100')?>
                                        <div class="rating text-center my-2">
                                            <?php echo product_id_by_rating($fetPro->product_id);?>
                                        </div>
                                    </div>
                                    <div class="product-bottom mt-auto">
                                        <div class="category">
                                            Categorie
                                        </div>
                                        <div class="product-title mb-2 text-capitalize">
                                            <a href="<?php echo base_url('detail/'.$fetPro->product_id)?>"><?php echo $fetPro->name;?></a>
                                        </div>
                                        <div class="price mb-3">
                                            <?php $spPricFut = get_data_by_id('special_price','cc_product_special','product_id',$fetPro->product_id);  if (empty($spPricFut)){ ?>
                                                <?php echo currency_symbol($fetPro->price);?>
                                            <?php }else{ ?>
                                                <small> <del><?php echo currency_symbol($fetPro->price);?></del></small>/<?php echo currency_symbol($spPricFut);?>
                                            <?php } ?>
                                        </div>
                                        <a href="javascript:void(0)" onclick="addToCart(<?php echo $fetPro->product_id ?>)" class="btn btn-cart w-100 rounded-0 mt-3">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>