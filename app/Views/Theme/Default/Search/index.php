<section class="main-container">
    <div class="container">
        <div class="trend-collection mb-5">
            <div class="card rounded-0">
                <div class="card-header py-3 bg-white d-flex justify-content-between align-items-center">
                    <h4>Trending collection</h4>
                    <div class="swiper-btn d-flex">
                        <div class="trend-button-prev">
                            <i class="fa-solid fa-angle-left"></i>
                        </div>
                        <div class="trend-button-next">
                            <i class="fa-solid fa-angle-right"></i>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="swiper trendSlide text-center">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="<?php echo base_url() ?>/assets/img/trend1.png" alt="" class="img-fluid w-100">
                                <h3 class="my-3"><a href="#">The Oversized Alpaca Crew</a></h3>
                                <p><a href="#" class="btn btn-shop w-100">Shop Now</a></p>
                            </div>
                            <div class="swiper-slide">
                                <img src="<?php echo base_url() ?>/assets/img/trend2.png" alt="" class="img-fluid w-100">
                                <h3 class="my-3"><a href="#">The Premium-Weight Crew</a></h3>
                                <p><a href="#" class="btn btn-shop w-100">Shop Now</a></p>
                            </div>
                            <div class="swiper-slide">
                                <img src="<?php echo base_url() ?>/assets/img/trend3.png" alt="" class="img-fluid w-100">
                                <h3 class="my-3"><a href="#">The Forever High-Top</a></h3>
                                <p><a href="#" class="btn btn-shop w-100">Shop Now</a></p>
                            </div>
                            <div class="swiper-slide">
                                <img src="<?php echo base_url() ?>/assets/img/trend3.png" alt="" class="img-fluid w-100">
                                <h3 class="my-3"><a href="#">The Forever High-Top</a></h3>
                                <p><a href="#" class="btn btn-shop w-100">Shop Now</a></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="product-category mb-5">
            <div class="card rounded-0 p-5">
                <div class="card-header py-3 bg-white border-0">
                    <h4 class="fs-6 mb-0">Search</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card p-3 rounded-0">
                                <div class="product-filter">
                                    <p>Category</p>
                                    <ul class="list-unstyled lh-lg">
                                        <?php foreach (getParentCategoryArray() as $cat){ ?>
                                            <li><a href="<?php echo base_url('category/'.$cat->prod_cat_id);?>"><i class="fa-solid fa-angle-right"></i> <?php echo $cat->category_name?> <span class="count"><?php echo category_id_by_product_count($cat->prod_cat_id)?></span></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="product-filter">
                                    <p>Filter Price</p>
                                    <p>
                                        <input type="text" id="amount" readonly style="border:0;">
                                    </p>
                                    <div class="slider-range"></div>
                                    <p class="mt-4"><a href="#" class="btn bg-black text-white px-3 rounded-0">Go</a></p>
                                </div>
                                <div class="product-filter">
                                    <p>Size</p>
                                    <ul class="list-unstyled filter-items">
                                        <li><a href="#">40</a></li>
                                        <li><a href="#">41</a></li>
                                        <li><a href="#">42</a></li>
                                        <li><a href="#">43</a></li>
                                        <li><a href="#">44</a></li>
                                        <li><a href="#">45</a></li>
                                    </ul>
                                </div>
                                <div class="product-filter">
                                    <p>Color</p>
                                    <ul class="list-unstyled filter-items">
                                        <li><a href="#">Red</a></li>
                                        <li><a href="#">Yellow</a></li>
                                        <li><a href="#">Purple</a></li>
                                        <li><a href="#">Blue</a></li>
                                        <li><a href="#">Brown</a></li>
                                    </ul>
                                </div>
                                <div class="product-filter">
                                    <p>Manufacturer</p>
                                    <label class="w-100 mb-2">
                                        <input type="checkbox" name=""manufacturer id=""> Apple  <span class="count">20</span>
                                    </label>
                                    <label class="w-100 mb-2">
                                        <input type="checkbox" name=""manufacturer id=""> Xiaomi  <span class="count">20</span>
                                    </label>
                                    <label class="w-100 mb-2">
                                        <input type="checkbox" name=""manufacturer id=""> Amazon  <span class="count">20</span>
                                    </label>
                                </div>

                                <div class="product-filter">
                                    <p>Rating</p>
                                    <label class="w-100 mb-2">
                                        <input type="checkbox" name=""manufacturer id="">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        and above
                                        <span class="count">20</span>
                                    </label>
                                    <label class="w-100 mb-2">
                                        <input type="checkbox" name=""manufacturer id="">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        and above
                                        <span class="count">20</span>
                                    </label>
                                    <label class="w-100 mb-2">
                                        <input type="checkbox" name=""manufacturer id="">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        <i class="fa-regular fa-star"></i>
                                        and above
                                        <span class="count">20</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="products">
                                <div class="row gx-0 row-cols-1 row-cols-sm-2 row-cols-md-3 h-100">
                                    <?php foreach ($products as $pro){ ?>
                                        <div class="col border p-2">
                                            <div class="product-grid h-100 d-flex align-items-stretch flex-column position-relative">

                                                <?php if (!isset(newSession()->isLoggedInCustomer)){ ?>
                                                    <a href="<?php echo base_url('login');?>" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2"><i class="fa-solid fa-heart"></i></a>
                                                <?php }else{ ?>
                                                    <a href="javascript:void(0)" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2" onclick="addToWishlist(<?php echo $pro->product_id ?>)"><i class="fa-solid fa-heart"></i></a>
                                                <?php } ?>
                                                <a href="javascript:void(0)" onclick="addToCompare(<?php echo $pro->product_id ?>)" class="btn-compare position-absolute start-0 top-0 mt-5 ms-2"><i class="fa-solid fa-code-compare"></i></a>

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
                                                    <div class="product-title mb-2">
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



                        <div class="col-lg-12" >
                            <?php echo $links;?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>