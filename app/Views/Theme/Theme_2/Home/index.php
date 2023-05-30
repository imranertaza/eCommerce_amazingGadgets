<section class="banner-m">
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

        <div class="weekly-deals marg-top-90 Hot-Deals  mb-5">
            <div class="row  gx-0">
                <div class="col-lg-3">
                    <div class="deal-box border position-relative  h-100 me-3">
                        <div class="title bg-black text-white d-flex justify-content-between ">
                            <span class="title-hot">Hot Deals</span>
                            <span class="icon-mt" >
                                <svg xmlns="http://www.w3.org/2000/svg" class="left-arr" width="8" height="12" viewBox="0 0 8 12" fill="none" data-bs-target="#hotDells" data-bs-slide="prev">
                                    <path d="M6 12L0 6L6 0L7.4 1.4L2.8 6L7.4 10.6L6 12Z" fill="#FFFBFB"/>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none" data-bs-target="#hotDells" data-bs-slide="next">
                                    <path d="M1.4 12L0 10.6L4.6 6L0 1.4L1.4 0L7.4 6L1.4 12Z" fill="#FFFBFB"/>
                                </svg>
                            </span>
                        </div>
                        <div class="products h-100">
                            <div class="row gx-0 ">
                                <div id="hotDells" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                <?php foreach ($hotProSide as $key => $pro){ ?>
                                        <div class="carousel-item  <?php echo ($key == '0')?'active':'';?>" >
                                    <div class="col pro-pd-hot">
                                        <div class="product-grid   d-flex align-items-stretch flex-column position-relative text-center">

                                            <div class="product-top">
                                                <?php echo image_view('uploads/products',$pro->product_id,'100_'.$pro->image,'noimage.png','img-fluid')?>
                                                <div class="rating text-center my-2">
                                                    <?php echo product_id_by_rating($pro->product_id);?>
                                                </div>
                                            </div>
                                            <div class="product-bottom ">
                                                <div class="product-title-hot height-40 mb-2 text-capitalize">
                                                    <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo substr($pro->name,0,40);?></a>
                                                </div>
                                                <div class="price-hot mb-3">
                                                    <?php $spPric = get_data_by_id('special_price','cc_product_special','product_id',$pro->product_id);  if (empty($spPric)){ ?>
                                                        <?php echo currency_symbol($pro->price);?>
                                                    <?php }else{ ?>
                                                        <small> <del><?php echo currency_symbol($pro->price);?></del></small>/<?php echo currency_symbol($spPric);?>
                                                    <?php } ?>
                                                </div>
                                                <a href="javascript:void(0)" onclick="addToCart(<?php echo $pro->product_id ?>)" class="btn btn-cart bg-black text-white rounded-0 mt-3"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                                        <path d="M14.55 11C15.3 11 15.96 10.59 16.3 9.97L19.88 3.48C19.9643 3.32843 20.0075 3.15747 20.0054 2.98406C20.0034 2.81064 19.956 2.64077 19.8681 2.49126C19.7803 2.34175 19.6549 2.21778 19.5043 2.13162C19.3538 2.04545 19.1834 2.00009 19.01 2H4.21L3.27 0H0V2H2L5.6 9.59L4.25 12.03C3.52 13.37 4.48 15 6 15H18V13H6L7.1 11H14.55ZM5.16 4H17.31L14.55 9H7.53L5.16 4ZM6 16C4.9 16 4.01 16.9 4.01 18C4.01 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16ZM16 16C14.9 16 14.01 16.9 14.01 18C14.01 19.1 14.9 20 16 20C17.1 20 18 19.1 18 18C18 16.9 17.1 16 16 16Z" fill="white"/>
                                                    </svg></a>
                                            </div>
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
                <div class="col-lg-9">
                    <div class="products h-100">
                        <div class="row gx-0 row-cols-1 row-cols-sm-2 row-cols-md-3 h-100">
                            <?php foreach ($hotProlimit as $pro){ ?>
                                <div class="col pe-3 each_pro">
                                    <div class="border p-3 product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                        <?php if (modules_key_by_access('wishlist') == 1) { ?>
                                            <?php if (!isset(newSession()->isLoggedInCustomer)){ ?>

                                                <a href="<?php echo base_url('login');?>" class="btn-wishlist position-absolute  mt-2 ms-2"><i class="fa-solid fa-heart"></i>
                                                    <span class="btn-wishlist-text position-absolute  mt-5 ms-2">Favorite</span>
                                                </a>

                                            <?php }else{ ?>

                                                <a href="javascript:void(0)" class="btn-wishlist position-absolute mt-2 ms-2" onclick="addToWishlist(<?php echo $pro->product_id ?>)"><i class="fa-solid fa-heart"></i>
                                                    <span class="btn-wishlist-text position-absolute  mt-5 ms-2">Favorite</span>
                                                </a>

                                            <?php } ?>
                                        <?php } ?>
                                        <?php if (modules_key_by_access('compare') == 1) { ?>

                                            <a href="javascript:void(0)" onclick="addToCompare(<?php echo $pro->product_id ?>)" class="btn-compare position-absolute  mt-5 ms-2"><i class="fa-solid fa-code-compare"></i>
                                                <span class="btn-compare-text position-absolute  mt-5 ms-2">Compare</span>
                                            </a>

                                        <?php } ?>
                                        <div class="product-top text-center">
                                            <?php echo image_view('uploads/products',$pro->product_id,'191_'.$pro->image,'noimage.png','img-fluid ')?>
                                            <div class="rating text-center my-2">
                                                <?php echo product_id_by_rating($pro->product_id);?>
                                            </div>
                                        </div>
                                        <div class="product-bottom mt-auto">
                                            <div class="category-new">
                                                Categorie
                                            </div>
                                            <div class="product-title-new mb-2 text-capitalize">
                                                <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo substr($pro->name,0,60);?></a>
                                            </div>
                                            <div class="price-new mb-3">
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

        <div class="weekly-deals marg-top-90 Trending  mb-5">
                <div class="row  gx-0">
                    <div class="col-lg-3">
                        <div class="deal-box border position-relative  h-100 me-3">
                            <div class="title  bg-black text-white d-flex justify-content-between ">
                                    <span class="title-hot">Trending Collection</span>
                                    <span class="icon-mt">
                                        <svg class="left-arr" xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none" data-bs-target="#trandCol" data-bs-slide="prev">
<path d="M6 12L0 6L6 0L7.4 1.4L2.8 6L7.4 10.6L6 12Z" fill="#FFFBFB"/>
</svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none" data-bs-target="#trandCol" data-bs-slide="next">
<path d="M1.4 12L0 10.6L4.6 6L0 1.4L1.4 0L7.4 6L1.4 12Z" fill="#FFFBFB"/>
</svg>
                                    </span>
                                </div>
                            <div class="products h-100">
                                <div class="row gx-0 ">
                                    <div id="trandCol" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                    <?php foreach ($tranPro as $key => $pro){ ?>
                                        <div class="col carousel-item  <?php echo ($key == '0')?'active':'';?> pro-pd-hot">
                                            <div class="product-grid   d-flex align-items-stretch flex-column position-relative text-center">

                                                <div class="product-top">
                                                    <?php echo image_view('uploads/products',$pro->product_id,'100_'.$pro->image,'noimage.png','img-fluid')?>
                                                    <div class="rating text-center my-2">
                                                        <?php echo product_id_by_rating($pro->product_id);?>
                                                    </div>
                                                </div>
                                                <div class="product-bottom ">
                                                    <div class="product-title-hot height-40 mb-2 text-capitalize">
                                                        <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo substr($pro->name,0,40);?></a>
                                                    </div>
                                                    <div class="price-hot mb-3">
                                                        <?php $spPric = get_data_by_id('special_price','cc_product_special','product_id',$pro->product_id);  if (empty($spPric)){ ?>
                                                            <?php echo currency_symbol($pro->price);?>
                                                        <?php }else{ ?>
                                                            <small> <del><?php echo currency_symbol($pro->price);?></del></small>/<?php echo currency_symbol($spPric);?>
                                                        <?php } ?>
                                                    </div>
                                                    <a href="javascript:void(0)" onclick="addToCart(<?php echo $pro->product_id ?>)" class="btn btn-cart bg-black text-white rounded-0 mt-3"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                                            <path d="M14.55 11C15.3 11 15.96 10.59 16.3 9.97L19.88 3.48C19.9643 3.32843 20.0075 3.15747 20.0054 2.98406C20.0034 2.81064 19.956 2.64077 19.8681 2.49126C19.7803 2.34175 19.6549 2.21778 19.5043 2.13162C19.3538 2.04545 19.1834 2.00009 19.01 2H4.21L3.27 0H0V2H2L5.6 9.59L4.25 12.03C3.52 13.37 4.48 15 6 15H18V13H6L7.1 11H14.55ZM5.16 4H17.31L14.55 9H7.53L5.16 4ZM6 16C4.9 16 4.01 16.9 4.01 18C4.01 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16ZM16 16C14.9 16 14.01 16.9 14.01 18C14.01 19.1 14.9 20 16 20C17.1 20 18 19.1 18 18C18 16.9 17.1 16 16 16Z" fill="white"/>
                                                        </svg></a>
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
                    <div class="col-lg-9">
                        <div class="video h-100">
                            <iframe class="h-100 w-100" src="<?php echo get_lebel_by_value_in_theme_settings('trending_youtube_video');?>" title="My sunconure flock flewed high in sky for more then 5min||sunconure freefly training in india||" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

        </div>

        <div class="weekly-deals marg-top-90 special-products  mb-5">
            <div class="row gx-0">
                <div class="col-lg-3">
                    <div class="deal-box border position-relative  h-100 me-3">
                        <div class="title  bg-black text-white d-flex justify-content-between ">
                            <span class="title-hot">Special products</span>
                            <span>
                            </span>
                        </div>
                        <div class="products h-100 p-2">
                            <?php foreach ($specialPro as $pro){ ?>
                                <div class="row border-top mt-3 pt-1 pb-1" style="margin-left: -8px !important;margin-right: -8px !important;margin-top: -8px !important;">
                                        <div class="col-md-4 p-2" >
                                            <?php echo image_view('uploads/products',$pro->product_id,'191_'.$pro->image,'noimage.png','img-fluid w-100 ')?>
                                        </div>
                                        <div class="col-md-8 p-2">
                                            <div class="product-title-special height-40 mb-2 text-capitalize">
                                                <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo substr($pro->name,0,40);?></a>
                                            </div>
                                            <div class="price-special mb-3">
                                                <?php $spPric = get_data_by_id('special_price','cc_product_special','product_id',$pro->product_id);  if (empty($spPric)){ ?>
                                                    <?php echo currency_symbol($pro->price);?>
                                                <?php }else{ ?>
                                                    <small> <del><?php echo currency_symbol($pro->price);?></del></small>/<?php echo currency_symbol($spPric);?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 ">
                    <div class="h-100">
                        <div class="banner">
                            <?php
                            $special_banner_1 = get_lebel_by_value_in_theme_settings('special_banner');
                            echo image_view('uploads/special_banner', '', $special_banner_1, 'noimage.png', 'w-100');
                            ?>
                        </div>
                        <div class="products mt-5 ">

                            <div class="menu d-flex justify-content-between ">
                                <div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
                                    <a class="btn border btn-sp-m nav-link active " onclick="loadFun('regular')" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo $special_category_one_name;?></a>
                                    <a class="btn border btn-sp-m nav-link" onclick="loadFun('regular-2')" data-bs-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><?php echo $special_category_two_name;?></a>
                                    <a class="btn border btn-sp-m nav-link" onclick="loadFun('regular-3')" data-bs-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><?php echo $special_category_three_name;?></a>
                                </div>
                                <div class="menu-icon ">
                                </div>
                            </div>

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

<!--                                    <div class="row mt-3 regular">-->
                                    <div class=" mt-3 owl-carousel owl-theme">
                                        <?php foreach ($special_category_onePro as $key => $pro){ ?>
                                            <div class="col item  ">
                                                <div class="border pro-s-height p-3 product-grid  d-flex align-items-stretch flex-column position-relative">
                                                    <?php if (modules_key_by_access('wishlist') == 1) { ?>
                                                        <?php if (!isset(newSession()->isLoggedInCustomer)){ ?>

                                                            <a href="<?php echo base_url('login');?>" class="btn-wishlist position-absolute  mt-2 ms-2"><i class="fa-solid fa-heart"></i>
                                                                <span class="btn-wishlist-text position-absolute  mt-5 ms-2">Favorite</span>
                                                            </a>

                                                        <?php }else{ ?>

                                                            <a href="javascript:void(0)" class="btn-wishlist position-absolute mt-2 ms-2" onclick="addToWishlist(<?php echo $pro->product_id ?>)"><i class="fa-solid fa-heart"></i>
                                                                <span class="btn-wishlist-text position-absolute  mt-5 ms-2">Favorite</span>
                                                            </a>

                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php if (modules_key_by_access('compare') == 1) { ?>

                                                        <a href="javascript:void(0)" onclick="addToCompare(<?php echo $pro->product_id ?>)" class="btn-compare position-absolute  mt-5 ms-2"><i class="fa-solid fa-code-compare"></i>
                                                            <span class="btn-compare-text position-absolute  mt-5 ms-2">Compare</span>
                                                        </a>

                                                    <?php } ?>
                                                    <div class="product-top text-center">
                                                        <?php echo image_view('uploads/products',$pro->product_id,'191_'.$pro->image,'noimage.png','img-fluid ')?>
                                                        <div class="rating text-center my-2">
                                                            <?php echo product_id_by_rating($pro->product_id);?>
                                                        </div>
                                                    </div>
                                                    <div class="product-bottom mt-auto">
                                                        <div class="category-new">
                                                            Categorie
                                                        </div>
                                                        <div class="product-title-new mb-2 text-capitalize">
                                                            <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo substr($pro->name,0,60);?></a>
                                                        </div>
                                                        <div class="price-new ">
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

                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
<!--                                    <div class="row mt-3 regular-2">-->
                                        <div class="mt-3 owl-carousel owl-theme">
                                        <?php foreach ($special_category_twoPro as $key => $pro){ ?>
                                            <div class="col item ">
                                                <div class="border pro-s-height p-3 product-grid  d-flex align-items-stretch flex-column position-relative">
                                                    <?php if (modules_key_by_access('wishlist') == 1) { ?>
                                                        <?php if (!isset(newSession()->isLoggedInCustomer)){ ?>

                                                            <a href="<?php echo base_url('login');?>" class="btn-wishlist position-absolute  mt-2 ms-2"><i class="fa-solid fa-heart"></i>
                                                                <span class="btn-wishlist-text position-absolute  mt-5 ms-2">Favorite</span>
                                                            </a>

                                                        <?php }else{ ?>

                                                            <a href="javascript:void(0)" class="btn-wishlist position-absolute mt-2 ms-2" onclick="addToWishlist(<?php echo $pro->product_id ?>)"><i class="fa-solid fa-heart"></i>
                                                                <span class="btn-wishlist-text position-absolute  mt-5 ms-2">Favorite</span>
                                                            </a>

                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php if (modules_key_by_access('compare') == 1) { ?>

                                                        <a href="javascript:void(0)" onclick="addToCompare(<?php echo $pro->product_id ?>)" class="btn-compare position-absolute  mt-5 ms-2"><i class="fa-solid fa-code-compare"></i>
                                                            <span class="btn-compare-text position-absolute  mt-5 ms-2">Compare</span>
                                                        </a>

                                                    <?php } ?>
                                                    <div class="product-top text-center">
                                                        <?php echo image_view('uploads/products',$pro->product_id,'191_'.$pro->image,'noimage.png','img-fluid ')?>
                                                        <div class="rating text-center my-2">
                                                            <?php echo product_id_by_rating($pro->product_id);?>
                                                        </div>
                                                    </div>
                                                    <div class="product-bottom mt-auto">
                                                        <div class="category-new">
                                                            Categorie
                                                        </div>
                                                        <div class="product-title-new mb-2 text-capitalize">
                                                            <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo substr($pro->name,0,60);?></a>
                                                        </div>
                                                        <div class="price-new ">
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

                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
<!--                                    <div class="row mt-3 regular-3">-->
                                    <div class=" mt-3 owl-carousel owl-theme">
                                        <?php foreach ($special_category_threePro as $key => $pro){ ?>
                                            <div class="col item  ">
                                                <div class="border pro-s-height p-3 product-grid  d-flex align-items-stretch flex-column position-relative">
                                                    <?php if (modules_key_by_access('wishlist') == 1) { ?>
                                                        <?php if (!isset(newSession()->isLoggedInCustomer)){ ?>

                                                            <a href="<?php echo base_url('login');?>" class="btn-wishlist position-absolute  mt-2 ms-2"><i class="fa-solid fa-heart"></i>
                                                                <span class="btn-wishlist-text position-absolute  mt-5 ms-2">Favorite</span>
                                                            </a>

                                                        <?php }else{ ?>

                                                            <a href="javascript:void(0)" class="btn-wishlist position-absolute mt-2 ms-2" onclick="addToWishlist(<?php echo $pro->product_id ?>)"><i class="fa-solid fa-heart"></i>
                                                                <span class="btn-wishlist-text position-absolute  mt-5 ms-2">Favorite</span>
                                                            </a>

                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php if (modules_key_by_access('compare') == 1) { ?>

                                                        <a href="javascript:void(0)" onclick="addToCompare(<?php echo $pro->product_id ?>)" class="btn-compare position-absolute  mt-5 ms-2"><i class="fa-solid fa-code-compare"></i>
                                                            <span class="btn-compare-text position-absolute  mt-5 ms-2">Compare</span>
                                                        </a>

                                                    <?php } ?>
                                                    <div class="product-top text-center">
                                                        <?php echo image_view('uploads/products',$pro->product_id,'191_'.$pro->image,'noimage.png','img-fluid ')?>
                                                        <div class="rating text-center my-2">
                                                            <?php echo product_id_by_rating($pro->product_id);?>
                                                        </div>
                                                    </div>
                                                    <div class="product-bottom mt-auto">
                                                        <div class="category-new">
                                                            Categorie
                                                        </div>
                                                        <div class="product-title-new mb-2 text-capitalize">
                                                            <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo substr($pro->name,0,60);?></a>
                                                        </div>
                                                        <div class="price-new ">
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
            </div>

        </div>

        <div class="weekly-deals marg-top-90 etc mb-5">
            <div class="row gx-0">
                <div class="col-lg-3">
                    <div class="deal-box border position-relative  h-100 me-3">
                        <div class="regular-4 w-100">
                            <div class="carousel-item w-100">
                                <?php
                                $special_banner_1 = get_lebel_by_value_in_theme_settings('left_side_banner_one');
                                echo image_view('uploads/left_side_banner', '', $special_banner_1, 'noimage.png', 'w-100 h-100');
                                ?>
                            </div>
                            <div class="carousel-item w-100">
                                <?php
                                $banner_two = get_lebel_by_value_in_theme_settings('left_side_banner_two');
                                echo image_view('uploads/left_side_banner', '', $banner_two, 'noimage.png', 'w-100 h-100');
                                ?>
                            </div>
                            <div class="carousel-item w-100">
                                <?php
                                $banner_three = get_lebel_by_value_in_theme_settings('left_side_banner_three');
                                echo image_view('uploads/left_side_banner', '', $banner_three, 'noimage.png', 'w-100 h-100');
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="products h-100">
                        <div class="row gx-0 row-cols-1 row-cols-sm-2 row-cols-md-3 h-100">
                            <?php foreach ($productsetc as $pro){ ?>
                                <div class="col  pe-3 each_pro">
                                    <div class="border p-3 product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                        <?php if (modules_key_by_access('wishlist') == 1) { ?>
                                            <?php if (!isset(newSession()->isLoggedInCustomer)){ ?>

                                                <a href="<?php echo base_url('login');?>" class="btn-wishlist position-absolute  mt-2 ms-2"><i class="fa-solid fa-heart"></i>
                                                    <span class="btn-wishlist-text position-absolute  mt-5 ms-2">Favorite</span>
                                                </a>

                                            <?php }else{ ?>

                                                <a href="javascript:void(0)" class="btn-wishlist position-absolute mt-2 ms-2" onclick="addToWishlist(<?php echo $pro->product_id ?>)"><i class="fa-solid fa-heart"></i>
                                                    <span class="btn-wishlist-text position-absolute  mt-5 ms-2">Favorite</span>
                                                </a>

                                            <?php } ?>
                                        <?php } ?>
                                        <?php if (modules_key_by_access('compare') == 1) { ?>

                                            <a href="javascript:void(0)" onclick="addToCompare(<?php echo $pro->product_id ?>)" class="btn-compare position-absolute  mt-5 ms-2"><i class="fa-solid fa-code-compare"></i>
                                                <span class="btn-compare-text position-absolute  mt-5 ms-2">Compare</span>
                                            </a>

                                        <?php } ?>
                                        <div class="product-top text-center">
                                            <?php echo image_view('uploads/products',$pro->product_id,'191_'.$pro->image,'noimage.png','img-fluid ')?>
                                            <div class="rating text-center my-2">
                                                <?php echo product_id_by_rating($pro->product_id);?>
                                            </div>
                                        </div>
                                        <div class="product-bottom mt-auto">
                                            <div class="category-new">
                                                Categorie
                                            </div>
                                            <div class="product-title-new mb-2 text-capitalize">
                                                <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo substr($pro->name,0,60);?></a>
                                            </div>
                                            <div class="price-new mb-3">
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

        <div class="weekly-deals marg-top-90 Brand mb-5">
            <div class="row gx-0">
                <div class="col-lg-3">
                    <div class="deal-box border position-relative  h-100 me-3">
                        <div class="title p-2 bg-black text-white d-flex justify-content-between ">
                            <span class="title-hot">Brands</span>
                            <span class="icon-mt">
                                <a href="javascript:void(0)"><svg class="left-arr" xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
<path d="M6 12L0 6L6 0L7.4 1.4L2.8 6L7.4 10.6L6 12Z" fill="#FFFBFB" data-bs-target="#brand" data-bs-slide="prev" /></a>
</svg>
                                <a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
<path d="M1.4 12L0 10.6L4.6 6L0 1.4L1.4 0L7.4 6L1.4 12Z" fill="#FFFBFB" data-bs-target="#brand" data-bs-slide="next" /></a>
</svg>
                            </span>
                        </div>
                        <div id="brand" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">


                                <?php
                                    $perPageShow = 6;
                                    $count = count($brand)/$perPageShow;
                                    $j = 1;
                                    for ($i=1; $i<=$count; $i++){
                                        $l = $i*$perPageShow;
                                        $act = ($l == $perPageShow)?'active':'';
                                    print '<div class="carousel-item '.$act.'"> <div class="row px-2">';
                                    while($j<=$l){
                                            if (array_key_exists($j-1, $brand)) {
                                                echo '<div class="col-md-6  mt-2  no-padding">'.image_view('uploads/brand', '', $brand[$j-1]->image, 'noimage.png', 'w-100').'</div>';
                                            }
                                            $j++;
                                        }
                                        print ' </div> </div>';
                                     }
                                ?>


                            </div>
                        </div>

                        <div class="title mt-3 p-2 bg-black text-white d-flex justify-content-between ">
                            <span class="title-hot">Brands Search</span>

                        </div>
                        <div class="search">
                            <div class=" p-2 my-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="p-2"><i class="fa fa-search"></i></div>
                                    </div>
                                    <input type="text" name="brand" class="form-control border-0" placeholder="Type Brand Here">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="video h-100">
                        <iframe class="h-100 w-100" style="min-height:370px;" src="<?php echo get_lebel_by_value_in_theme_settings('brands_youtube_video');?>" title="My sunconure flock flewed high in sky for more then 5min||sunconure freefly training in india||" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="weekly-deals marg-top-90 popular_categories mb-5">
            <div class="row gx-0">
                <div class="col-lg-3">
                    <div class="deal-box border  position-relative  h-100 me-3">
                        <div class="title  bg-black text-white d-flex justify-content-between ">
                            <span class="title-hot">Popular Categories</span>
                            <span class="icon-mt">
                                        <svg class="left-arr" xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none" data-bs-target="#popu-cat" data-bs-slide="prev">
<path d="M6 12L0 6L6 0L7.4 1.4L2.8 6L7.4 10.6L6 12Z" fill="#FFFBFB"/>
</svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none" data-bs-target="#popu-cat" data-bs-slide="next">
<path d="M1.4 12L0 10.6L4.6 6L0 1.4L1.4 0L7.4 6L1.4 12Z" fill="#FFFBFB"/>
</svg>
                                    </span>
                        </div>

                        <div id="popu-cat" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                        <?php
                        foreach ($populerCat as $key => $catPop){
                        $icon_id = get_data_by_id('icon_id','cc_product_category','prod_cat_id',$catPop->prod_cat_id);
                        $icon = get_data_by_id('code','cc_icons','icon_id',$icon_id);
                        ?>
                        <div class="products carousel-item  <?php echo ($key == '0')?'active':'';?> p-4  text-center" style="height: 290px;">
                            <div class="ic-pp text-center position-relative p-4 ">

                                <svg xmlns="http://www.w3.org/2000/svg" class="bac-round" width="69" height="69" viewBox="0 0 69 69" fill="none">
                                    <circle cx="34.5" cy="34.5" r="34.5" fill="#EDEDED"/>
                                </svg>
                                <span class="icon-in-rou"><?php echo $icon; ?></span>
                            </div>

                            <div class="text ">
                                <p class="cat-title-side"><?php echo get_data_by_id('category_name','cc_product_category','prod_cat_id',$catPop->prod_cat_id);?></p>
                                <p class="cat-text-side" ><?php echo substr(get_data_by_id('description','cc_product_category','prod_cat_id',$catPop->prod_cat_id) ,0,30);?></p>
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="39" viewBox="0 0 40 39" fill="none">
                                        <rect width="40" height="39" rx="4" fill="#231F20"/>
                                        <path d="M19.3 26.2998C19.1167 26.1165 19.0207 25.8831 19.012 25.5998C19.0033 25.3165 19.091 25.0831 19.275 24.8998L24.175 19.9998H13C12.7167 19.9998 12.479 19.9038 12.287 19.7118C12.095 19.5198 11.9993 19.2825 12 18.9998C12 18.7165 12.096 18.4788 12.288 18.2868C12.48 18.0948 12.7173 17.9991 13 17.9998H24.175L19.275 13.0998C19.0917 12.9165 19.004 12.6831 19.012 12.3998C19.02 12.1165 19.116 11.8831 19.3 11.6998C19.4833 11.5165 19.7167 11.4248 20 11.4248C20.2833 11.4248 20.5167 11.5165 20.7 11.6998L27.3 18.2998C27.4 18.3831 27.471 18.4875 27.513 18.6128C27.555 18.7381 27.5757 18.8671 27.575 18.9998C27.575 19.1331 27.5543 19.2581 27.513 19.3748C27.4717 19.4915 27.4007 19.5998 27.3 19.6998L20.7 26.2998C20.5167 26.4831 20.2833 26.5748 20 26.5748C19.7167 26.5748 19.4833 26.4831 19.3 26.2998Z" fill="white"/>
                                    </svg></a>
                            </div>

                        </div>
                        <?php } ?>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="products border h-100">
                        <div class="row gx-0 row-cols-2 row-cols-sm-4 row-cols-lg-5 text-center">
                            <?php
                            foreach ($populerCat as $catPop){
                                $icon_id = get_data_by_id('icon_id','cc_product_category','prod_cat_id',$catPop->prod_cat_id);
                                $icon = get_data_by_id('code','cc_icons','icon_id',$icon_id);
                                ?>
                                <div class="col  p-3 border position-relative">
                                    <a href="<?php echo base_url('category/'.$catPop->prod_cat_id);?>">
                                        <span class="icon-cat-main"><?php echo $icon; ?></span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="85" height="85" viewBox="0 0 85 85" fill="none">
                                            <circle cx="42.5" cy="42.5" r="42.5" fill="#EDEDED"/>
                                        </svg>
                                        <h5 class="mt-4 cat-name"><a href="#"><?php echo get_data_by_id('category_name','cc_product_category','prod_cat_id',$catPop->prod_cat_id);?></a></h5>
                                    </a>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="weekly-deals marg-top-90 shipping mb-5">
            <div class="row gx-0">
                <div class="col-lg-3">
                    <div class="ma-d d-flex ">
                        <div class="con-ic position-relative">
                            <svg class="left-arr" xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57" fill="none">
                                <circle cx="28.5" cy="28.5" r="28" stroke="#333333"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="ic-om-1" width="22" height="8" viewBox="0 0 22 8" fill="none">
                                <path d="M7 4H15M15 4L12 1M15 4L12 7M2 3C2.19722 3.00002 2.39004 3.05835 2.5542 3.16767C2.71835 3.27699 2.84652 3.4324 2.92257 3.61437C2.99863 3.79634 3.01917 3.99674 2.98163 4.19036C2.94409 4.38398 2.85013 4.56217 2.71157 4.70253C2.57302 4.84288 2.39605 4.93913 2.20294 4.97917C2.00982 5.01922 1.80918 5.00126 1.62624 4.92756C1.4433 4.85386 1.28624 4.72771 1.17481 4.56498C1.06338 4.40225 1.00256 4.21021 1 4.013C1 3.74778 1.10536 3.49343 1.29289 3.30589C1.48043 3.11836 1.73478 3.013 2 3.013V3ZM20 3C20.1972 3.00002 20.39 3.05835 20.5542 3.16767C20.7184 3.27699 20.8465 3.4324 20.9226 3.61437C20.9986 3.79634 21.0192 3.99674 20.9816 4.19036C20.9441 4.38398 20.8501 4.56217 20.7116 4.70253C20.573 4.84288 20.3961 4.93913 20.2029 4.97917C20.0098 5.01922 19.8092 5.00126 19.6262 4.92756C19.4433 4.85386 19.2862 4.72771 19.1748 4.56498C19.0634 4.40225 19.0026 4.21021 19 4.013C19 3.74778 19.1054 3.49343 19.2929 3.30589C19.4804 3.11836 19.7348 3.013 20 3.013V3Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="con-f">
                            <p class="con-to-mm">BRAND NEW ORIGINAL</p>
                            <p class="con-to-mmt">Top Products, Great Quality+</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ma-d d-flex ">
                        <div class="con-ic position-relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57" fill="none">
                                <circle cx="28.5" cy="28.5" r="28" stroke="#333333"/>
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" class="ic-om-2" width="22" height="16" viewBox="0 0 22 16" fill="none">
                                <path d="M5 16C4.16667 16 3.45833 15.7083 2.875 15.125C2.29167 14.5417 2 13.8333 2 13H0V2C0 1.45 0.196 0.979002 0.588 0.587002C0.98 0.195002 1.45067 -0.000664969 2 1.69779e-06H16V4H19L22 8V13H20C20 13.8333 19.7083 14.5417 19.125 15.125C18.5417 15.7083 17.8333 16 17 16C16.1667 16 15.4583 15.7083 14.875 15.125C14.2917 14.5417 14 13.8333 14 13H8C8 13.8333 7.70833 14.5417 7.125 15.125C6.54167 15.7083 5.83333 16 5 16ZM5 14C5.28333 14 5.521 13.904 5.713 13.712C5.905 13.52 6.00067 13.2827 6 13C6 12.7167 5.904 12.479 5.712 12.287C5.52 12.095 5.28267 11.9993 5 12C4.71667 12 4.479 12.096 4.287 12.288C4.095 12.48 3.99933 12.7173 4 13C4 13.2833 4.096 13.521 4.288 13.713C4.48 13.905 4.71733 14.0007 5 14ZM2 11H2.8C3.08333 10.7 3.40833 10.4583 3.775 10.275C4.14167 10.0917 4.55 10 5 10C5.45 10 5.85833 10.0917 6.225 10.275C6.59167 10.4583 6.91667 10.7 7.2 11H14V2H2V11ZM17 14C17.2833 14 17.521 13.904 17.713 13.712C17.905 13.52 18.0007 13.2827 18 13C18 12.7167 17.904 12.479 17.712 12.287C17.52 12.095 17.2827 11.9993 17 12C16.7167 12 16.479 12.096 16.287 12.288C16.095 12.48 15.9993 12.7173 16 13C16 13.2833 16.096 13.521 16.288 13.713C16.48 13.905 16.7173 14.0007 17 14ZM16 9H20.25L18 6H16V9Z" fill="#333333"/>
                            </svg>
                        </div>
                        <div class="con-f">
                            <p class="con-to-mm">FREE SHIPPING</p>
                            <p class="con-to-mmt">No Any hidden fee</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ma-d d-flex ">
                        <div class="con-ic position-relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57" fill="none">
                                <circle cx="28.5" cy="28.5" r="28" stroke="#333333"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="ic-om-3" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M6.5 4L3 7L6.5 10.5" stroke="#333333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M3 7H14.497C17.9385 7 20.861 9.81 20.995 13.25C21.137 16.885 18.1335 20 14.497 20H5.999" stroke="#333333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="con-f">
                            <p class="con-to-mm">RETURN IN 30 DAYS</p>
                            <p class="con-to-mmt">Shop with confidence</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ma-d d-flex ">
                        <div class="con-ic position-relative">
                            <svg xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57" fill="none">
                                <circle cx="28.5" cy="28.5" r="28" stroke="#333333"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="ic-om-4" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                <path d="M20 6.9999C20.5304 6.9999 21.0391 7.21061 21.4142 7.58569C21.7893 7.96076 22 8.46947 22 8.9999V12.9999C22 13.5303 21.7893 14.039 21.4142 14.4141C21.0391 14.7892 20.5304 14.9999 20 14.9999H18.938C18.6942 16.9332 17.7533 18.7111 16.2917 19.9999C14.8302 21.2887 12.9486 21.9999 11 21.9999V19.9999C12.5913 19.9999 14.1174 19.3678 15.2426 18.2425C16.3679 17.1173 17 15.5912 17 13.9999V7.9999C17 6.4086 16.3679 4.88248 15.2426 3.75726C14.1174 2.63204 12.5913 1.9999 11 1.9999C9.4087 1.9999 7.88258 2.63204 6.75736 3.75726C5.63214 4.88248 5 6.4086 5 7.9999V14.9999H2C1.46957 14.9999 0.960859 14.7892 0.585786 14.4141C0.210714 14.039 0 13.5303 0 12.9999V8.9999C0 8.46947 0.210714 7.96076 0.585786 7.58569C0.960859 7.21061 1.46957 6.9999 2 6.9999H3.062C3.30603 5.0668 4.24708 3.28917 5.70857 2.00058C7.17007 0.711979 9.05155 0.000976562 11 0.000976562C12.9484 0.000976562 14.8299 0.711979 16.2914 2.00058C17.7529 3.28917 18.694 5.0668 18.938 6.9999H20ZM6.76 14.7849L7.82 13.0889C8.77308 13.6859 9.87537 14.0017 11 13.9999C12.1246 14.0017 13.2269 13.6859 14.18 13.0889L15.24 14.7849C13.9693 15.581 12.4995 16.0022 11 15.9999C9.50045 16.0023 8.03072 15.5811 6.76 14.7849Z" fill="#333333"/>
                            </svg>
                        </div>
                        <div class="con-f">
                            <p class="con-to-mm">7/24 CUSTOMER SERVICE</p>
                            <p class="con-to-mmt">Reply within 24 working hours</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="weekly-newsletter marg-top-90 newsletter mb-5">
            <div class="row gx-0">
                <div class="col-lg-6">
                <div class="input-group" style="width: 79%;">
                    <input type="text" class="form-control news-sub border-0 rounded-0" placeholder="Enter your Email address" aria-label="Search" aria-describedby="search-addon" />
                    <button type="button" class="btn bg-black text-white rounded-0 sub-btn">Subscribe Now</button>
                </div>
                </div>
            </div>
        </div>


    </div>
</section>