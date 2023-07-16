<section class="banner-m">
    <div class="container">
        <div class="row gx-0">

            <div class="col-md-9 offset-md-3">
                <div class="swiper bannerSlide">
                    <div class="swiper-wrapper">
                        <?php $sli_1 = get_lebel_by_value_in_theme_settings('slider_1'); ?>
                        <div class="swiper-slide"><?php echo image_view('uploads/slider', '', $sli_1, 'noimage.png', 'img-fluid w-100 slider-image-height');?></div>
                        <?php $sli_2 = get_lebel_by_value_in_theme_settings('slider_2'); ?>
                        <div class="swiper-slide"><?php echo image_view('uploads/slider', '', $sli_2, 'noimage.png', 'img-fluid w-100 slider-image-height');?></div>
                        <?php $sli_3 = get_lebel_by_value_in_theme_settings('slider_3'); ?>
                        <div class="swiper-slide"><?php echo image_view('uploads/slider', '', $sli_3, 'noimage.png', 'img-fluid w-100 slider-image-height');?></div>
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
                <div class="col-md-3 col-12 mb-3 mb-md-0">
                    <div class="deal-box border position-relative  h-100 me-md-3 mo-m-r-0">
                        <div class="title bg-black text-white d-flex justify-content-between ">
                            <span class="title-hot">Hot Deals</span>
                            <span class="icon-mt" >
                                <svg xmlns="http://www.w3.org/2000/svg" class="hotdeal-button-prev left-arr" width="8" height="12" viewBox="0 0 8 12" fill="none">
                                    <path d="M6 12L0 6L6 0L7.4 1.4L2.8 6L7.4 10.6L6 12Z" fill="#FFFBFB"/>
                                </svg>
                                <svg class="hotdeal-button-next" xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
                                    <path d="M1.4 12L0 10.6L4.6 6L0 1.4L1.4 0L7.4 6L1.4 12Z" fill="#FFFBFB"/>
                                </svg>
                            </span>
                        </div>
                        <div class="p-3 h-100">
                            <div id="hotDells" class="swiper">
                                <div class="swiper-wrapper">
                                    <?php foreach ($hotProSide as $key => $pro){ ?>
                                            <div class="swiper-slide">
                                                <div class="product-grid d-flex align-items-stretch flex-column position-relative text-center">
                                                    <div class="product-top">
                                                        <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo image_view('uploads/products',$pro->product_id,'100_'.$pro->image,'noimage.png','img-fluid')?></a>
                                                        <div class="rating text-center my-2">
                                                            <?php echo product_id_by_rating($pro->product_id);?>
                                                        </div>
                                                    </div>
                                                    <div class="product-bottom ">
                                                        <div class="product-title-hot mb-md-2 text-capitalize">
                                                            <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo substr($pro->name,0,40);?></a>
                                                        </div>
                                                        <div class="price-hot mb-md-3">
                                                            <?php $spPric = get_data_by_id('special_price','cc_product_special','product_id',$pro->product_id);  if (empty($spPric)){ ?>
                                                                <?php echo currency_symbol($pro->price);?>
                                                            <?php }else{ ?>
                                                                <small> <del><?php echo currency_symbol($pro->price);?></del></small>/<?php echo currency_symbol($spPric);?>
                                                            <?php } ?>
                                                        </div>


                                                        <?php echo addToCartBtnIcon($pro->product_id);?>

                                                    </div>
                                                </div>
                                            </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-12">
                    <div class="products h-100">
                        <div id="hotPro" class="swiper hotpro mo-text-center">
                            <div class="hotpro-nav position-absolute top-50 w-100" style="z-index:99">
                                <svg xmlns="http://www.w3.org/2000/svg" class="hotpro-button-prev left-arr float-start ms-2" width="8" height="12" viewBox="0 0 8 12" fill="none">
                                        <path d="M6 12L0 6L6 0L7.4 1.4L2.8 6L7.4 10.6L6 12Z" fill="#000000"/>
                                </svg>
                                <svg class="hotpro-button-next float-end me-2" xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
                                    <path d="M1.4 12L0 10.6L4.6 6L0 1.4L1.4 0L7.4 6L1.4 12Z" fill="#000000"/>
                                </svg>
                            </div>
                        <div class="swiper-wrapper">
                            <?php foreach ($hotProlimit as $pro){ ?>
                                <div class="swiper-slide h-auto pe-3 each_pro mo-p-r-0">
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
                                            <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo image_view('uploads/products',$pro->product_id,'191_'.$pro->image,'noimage.png','img-fluid ')?></a>
                                            <div class="rating text-center my-2">
                                                <?php echo product_id_by_rating($pro->product_id);?>
                                            </div>
                                        </div>
                                        <div class="product-bottom mt-auto">
                                            <div class="category-new">
                                                Categorie
                                            </div>
                                            <div class="product-title-new mb-md-2 text-capitalize">
                                                <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo substr($pro->name,0,60);?></a>
                                            </div>
                                            <div class="price-new mb-md-3">
                                                <?php $spPric = get_data_by_id('special_price','cc_product_special','product_id',$pro->product_id);  if (empty($spPric)){ ?>
                                                    <?php echo currency_symbol($pro->price);?>
                                                <?php }else{ ?>
                                                    <small> <del><?php echo currency_symbol($pro->price);?></del></small>/<?php echo currency_symbol($spPric);?>
                                                <?php } ?>
                                            </div>

                                            <?php echo addToCartBtn($pro->product_id);?>
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

        <div class="weekly-deals marg-top-90 Trending  mb-5">
                <div class="row  gx-0">
                    <div class="col-md-3 col-12 mb-3 mb-md-0">
                        <div class="deal-box border position-relative  h-100 me-3 mo-m-r-0">
                            <div class="title bg-black text-white d-flex justify-content-between ">
                                    <span class="title-hot">Trending Collection</span>
                                    <span class="icon-mt">
                                        <svg class="trend-button-prev left-arr" xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
<path d="M6 12L0 6L6 0L7.4 1.4L2.8 6L7.4 10.6L6 12Z" fill="#FFFBFB"/>
</svg>
                                <svg class="trend-button-next" xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
<path d="M1.4 12L0 10.6L4.6 6L0 1.4L1.4 0L7.4 6L1.4 12Z" fill="#FFFBFB"/>
</svg>
                                    </span>
                                </div>
                            <div class="p-3 h-100">
                            <div id="trandCol" class="swiper">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($tranPro as $key => $pro){ ?>
                                                <div class="swiper-slide">
                                                    <div class="product-grid d-flex align-items-stretch flex-column position-relative text-center">
                                                        <div class="product-top">
                                                            <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo image_view('uploads/products',$pro->product_id,'100_'.$pro->image,'noimage.png','img-fluid')?></a>
                                                            <div class="rating text-center my-2">
                                                                <?php echo product_id_by_rating($pro->product_id);?>
                                                            </div>
                                                        </div>
                                                        <div class="product-bottom ">
                                                            <div class="product-title-hot mb-2 text-capitalize">
                                                                <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo substr($pro->name,0,40);?></a>
                                                            </div>
                                                            <div class="price-hot mb-3">
                                                                <?php $spPric = get_data_by_id('special_price','cc_product_special','product_id',$pro->product_id);  if (empty($spPric)){ ?>
                                                                    <?php echo currency_symbol($pro->price);?>
                                                                <?php }else{ ?>
                                                                    <small> <del><?php echo currency_symbol($pro->price);?></del></small>/<?php echo currency_symbol($spPric);?>
                                                                <?php } ?>
                                                            </div>
                                                            <?php echo addToCartBtnIcon($pro->product_id);?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-12">
                        <div class="video h-100">
                            <iframe class="h-100 w-100" src="<?php echo get_lebel_by_value_in_theme_settings('trending_youtube_video');?>" title="My sunconure flock flewed high in sky for more then 5min||sunconure freefly training in india||" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

        </div>

        <div class="weekly-deals marg-top-90 special-products  mb-5">
            <div class="row gx-0">
                <div class="col-md-3 col-12 mb-3 mb-md-0">
                    <div class="deal-box border position-relative  h-100 me-md-3 mo-m-r-0">
                        <div class="title  bg-black text-white d-flex justify-content-between ">
                            <span class="title-hot">Special products</span>
                            <span>
                            </span>
                        </div>
                        <div class="products h-100 p-2 mo-text-center">
                            <?php foreach ($specialPro as $pro){ ?>
                                <div class="row border-top mt-3 pt-1 pb-1" style="margin-left: -8px !important;margin-right: -8px !important;margin-top: -8px !important;">
                                        <div class="col-2 col-md-4 p-2" >
                                            <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo image_view('uploads/products',$pro->product_id,'191_'.$pro->image,'noimage.png','img-fluid  ')?></a>
                                        </div>
                                        <div class="col-10 col-md-8 p-2">
                                            <div class="product-title-special mb-2 text-capitalize">
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
                <div class="col-md-9 col-12 ">
                    <div class="h-100">
                        <div class="banner">
                            <?php
                            $special_banner_1 = get_lebel_by_value_in_theme_settings('special_banner');
                            echo image_view('uploads/special_banner', '', $special_banner_1, 'noimage.png', 'w-100');
                            ?>
                        </div>
                        <div class="products mt-5 ">

                            <div class="menu d-flex justify-content-between ">
                                <div class="nav nav-tabs border-0 special-tab" id="nav-tab" role="tablist">
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
                                                        <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo image_view('uploads/products',$pro->product_id,'191_'.$pro->image,'noimage.png','img-fluid ')?></a>
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
                                                        <?php echo addToCartBtn($pro->product_id);?>
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
                                                        <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo image_view('uploads/products',$pro->product_id,'191_'.$pro->image,'noimage.png','img-fluid ')?></a>
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
                                                        <?php echo addToCartBtn($pro->product_id);?>
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
                                                        <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo image_view('uploads/products',$pro->product_id,'191_'.$pro->image,'noimage.png','img-fluid ')?></a>
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
                                                        <?php echo addToCartBtn($pro->product_id);?>
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
                <div class="col-sm-3 col-12">
                    <div class="deal-box border position-relative  h-100 me-3 mo-m-r-0">
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
                <div class="col-sm-9 col-12">
                    <div class="products h-100">
                        <div id="etcPro" class="swiper etcpro mo-text-center h-100">
                        <div class="etcpro-nav position-absolute top-50 w-100" style="z-index:99">
                                <svg xmlns="http://www.w3.org/2000/svg" class="etcpro-button-prev left-arr float-start ms-2" width="8" height="12" viewBox="0 0 8 12" fill="none">
                                        <path d="M6 12L0 6L6 0L7.4 1.4L2.8 6L7.4 10.6L6 12Z" fill="#000000"/>
                                </svg>
                                <svg class="etcpro-button-next float-end me-2" xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
                                    <path d="M1.4 12L0 10.6L4.6 6L0 1.4L1.4 0L7.4 6L1.4 12Z" fill="#000000"/>
                                </svg>
                            </div>
                        <div class="swiper-wrapper">
                            <?php foreach ($productsetc as $pro){ ?>
                                <div class="swiper-slide h-auto pe-3 each_pro mo-p-r-0">
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
                                            <a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo image_view('uploads/products',$pro->product_id,'191_'.$pro->image,'noimage.png','img-fluid ')?></a>
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
                                            <div class="price-new mb-md-3">
                                                <?php $spPric = get_data_by_id('special_price','cc_product_special','product_id',$pro->product_id);  if (empty($spPric)){ ?>
                                                    <?php echo currency_symbol($pro->price);?>
                                                <?php }else{ ?>
                                                    <small> <del><?php echo currency_symbol($pro->price);?></del></small>/<?php echo currency_symbol($spPric);?>
                                                <?php } ?>
                                            </div>
                                            <?php echo addToCartBtn($pro->product_id);?>
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

        <div class="weekly-deals marg-top-90 Brand mb-5">
            <div class="row gx-0">
                <div class="col-md-3 col-12 mb-3 mb-md-0">
                    <div class="deal-box border position-relative  h-100 me-md-3 mo-m-r-0">
                        <div class="title p-2 bg-black text-white d-flex justify-content-between ">
                            <span class="title-hot">Brands</span>
                            <span class="icon-mt brand-nav">
                                
                            <span data-bs-target="#brand" data-bs-slide="prev"><svg class="left-arr carousel-control-prev" xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
                                <path d="M6 12L0 6L6 0L7.4 1.4L2.8 6L7.4 10.6L6 12Z" fill="#FFFBFB" /></span>
                                </svg>
                                <span data-bs-target="#brand" data-bs-slide="next"><svg class="carousel-control-next" xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
                                <path d="M1.4 12L0 10.6L4.6 6L0 1.4L1.4 0L7.4 6L1.4 12Z" fill="#FFFBFB" />
                                </svg>
                            </span>
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
                                                echo '<div class="col-6 brand-item  mt-2  no-padding">'.image_view('uploads/brand', '', $brand[$j-1]->image, 'noimage.png', 'brand-img px-2 ').'</div>';
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
                <div class="col-md-9 col-12">
                    <div class="video h-100">
                        <iframe class="h-100 w-100" style="min-height:370px;" src="<?php echo get_lebel_by_value_in_theme_settings('brands_youtube_video');?>" title="My sunconure flock flewed high in sky for more then 5min||sunconure freefly training in india||" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="weekly-deals marg-top-90 popular_categories mb-5">
            <div class="row gx-0">
                <div class="col-md-3 col-12 mb-3 mb-md-0">
                    <div class="deal-box border position-relative h-100 me-md-3 mo-m-r-0">
                        <div class="title  bg-black text-white d-flex justify-content-between ">
                            <span class="title-hot">Popular Categories</span>
                            <span class="icon-mt">
                                        <svg class="popcat-button-prev left-arr" xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none" data-bs-target="#popu-cat" data-bs-slide="prev">
<path d="M6 12L0 6L6 0L7.4 1.4L2.8 6L7.4 10.6L6 12Z" fill="#FFFBFB"/>
</svg>
                                        <svg class="popcat-button-next" xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
<path d="M1.4 12L0 10.6L4.6 6L0 1.4L1.4 0L7.4 6L1.4 12Z" fill="#FFFBFB"/>
</svg>
                                    </span>
                        </div>

                        <div id="populatCat" class="swiper">
                        <div class="swiper-wrapper">
                        <?php
                        foreach ($populerCat as $key => $catPop){
                        $icon_id = get_data_by_id('icon_id','cc_product_category','prod_cat_id',$catPop->prod_cat_id);
                        $icon = get_data_by_id('code','cc_icons','icon_id',$icon_id);
                        ?>
                        <div class="swiper-slide">
                        <div class="products  <?php echo ($key == '0')?'active':'';?> p-md-4  text-center">
                            <div class="ic-pp text-center position-relative p-2 p-md-4 ">

                                <span class="icon-in-rou"><?php echo $icon; ?></span>
                            </div>

                            <div class="text ic-pp-btn">
                                <p class="cat-title-side"><?php echo get_data_by_id('category_name','cc_product_category','prod_cat_id',$catPop->prod_cat_id);?></p>
                                <p class="cat-text-side" ><?php echo substr(get_data_by_id('description','cc_product_category','prod_cat_id',$catPop->prod_cat_id) ,0,30);?></p>
                                <a href="#"  ><svg class="mt-2" xmlns="http://www.w3.org/2000/svg" width="40" height="39" viewBox="0 0 40 39" fill="none">
                                        <rect width="40" height="39" rx="4" fill="#231F20"/>
                                        <path d="M19.3 26.2998C19.1167 26.1165 19.0207 25.8831 19.012 25.5998C19.0033 25.3165 19.091 25.0831 19.275 24.8998L24.175 19.9998H13C12.7167 19.9998 12.479 19.9038 12.287 19.7118C12.095 19.5198 11.9993 19.2825 12 18.9998C12 18.7165 12.096 18.4788 12.288 18.2868C12.48 18.0948 12.7173 17.9991 13 17.9998H24.175L19.275 13.0998C19.0917 12.9165 19.004 12.6831 19.012 12.3998C19.02 12.1165 19.116 11.8831 19.3 11.6998C19.4833 11.5165 19.7167 11.4248 20 11.4248C20.2833 11.4248 20.5167 11.5165 20.7 11.6998L27.3 18.2998C27.4 18.3831 27.471 18.4875 27.513 18.6128C27.555 18.7381 27.5757 18.8671 27.575 18.9998C27.575 19.1331 27.5543 19.2581 27.513 19.3748C27.4717 19.4915 27.4007 19.5998 27.3 19.6998L20.7 26.2998C20.5167 26.4831 20.2833 26.5748 20 26.5748C19.7167 26.5748 19.4833 26.4831 19.3 26.2998Z" fill="white"/>
                                    </svg></a>
                            </div>

                        </div></div>
                        <?php } ?>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-9 col-12">
                    <div class="products border h-100">
                        <div class="row gx-0 row-cols-2 row-cols-sm-5 row-cols-lg-5 text-center">
                            <?php
                            foreach ($populerCat as $catPop){
                                $icon_id = get_data_by_id('icon_id','cc_product_category','prod_cat_id',$catPop->prod_cat_id);
                                $icon = get_data_by_id('code','cc_icons','icon_id',$icon_id);
                                ?>
                                <div class="col p-2 p-md-3 border position-relative">
                                    <a href="<?php echo base_url('category/'.$catPop->prod_cat_id);?>">
                                        <span class="icon-cat-main"><?php echo $icon; ?></span>
<!--                                        <svg xmlns="http://www.w3.org/2000/svg" width="85" height="85" viewBox="0 0 85 85" fill="none">-->
<!--                                            <circle cx="42.5" cy="42.5" r="42.5" fill="#EDEDED"/>-->
<!--                                        </svg>-->
                                        <h5 class="mt-2 mt-md-4 cat-name"><a href="#"><?php echo get_data_by_id('category_name','cc_product_category','prod_cat_id',$catPop->prod_cat_id);?></a></h5>
                                    </a>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>




    </div>
</section>