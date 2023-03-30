<section class="main-container">
    <div class="container">
        <div class="product-details">
            <div class="card p-3 rounded-0 mb-4">
                <div class="row">
                    <div class="col-lg-5 mb-3 mb-lg-0">
                        <div class="product-image">
                            <div class="swiper-container gallery-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
<!--                                        <img src="--><?php //echo base_url()?><!--/assets/img/product-details.png" alt="" class="img-fluid">-->
                                        <?php echo image_view('uploads/products',$products->product_id,'437_'.$products->image,'noimage.png','img-fluid')?>
                                    </div>
<!--                                    <div class="swiper-slide"><img src="--><?php //echo base_url()?><!--/assets/img/product-details.png" alt="" class="img-fluid"></div>-->
<!--                                    <div class="swiper-slide"><img src="--><?php //echo base_url()?><!--/assets/img/product-details.png" alt="" class="img-fluid"></div>-->
<!--                                    <div class="swiper-slide"><img src="--><?php //echo base_url()?><!--/assets/img/product-details.png" alt="" class="img-fluid"></div>-->
<!--                                    <div class="swiper-slide"><img src="--><?php //echo base_url()?><!--/assets/img/product-details.png" alt="" class="img-fluid"></div>-->
<!--                                    <div class="swiper-slide"><img src="--><?php //echo base_url()?><!--/assets/img/product-details.png" alt="" class="img-fluid"></div>-->
                                </div>
                            </div>

                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <?php echo image_view('uploads/products',$products->product_id,'100_'.$products->image,'noimage.png','img-fluid')?>
                                    </div>
<!--                                    <div class="swiper-slide"><img src="--><?php //echo base_url()?><!--/assets/img/product-details.png" alt="" class="img-fluid"></div>-->
<!--                                    <div class="swiper-slide"><img src="--><?php //echo base_url()?><!--/assets/img/product-details.png" alt="" class="img-fluid"></div>-->
<!--                                    <div class="swiper-slide"><img src="--><?php //echo base_url()?><!--/assets/img/product-details.png" alt="" class="img-fluid"></div>-->
<!--                                    <div class="swiper-slide"><img src="--><?php //echo base_url()?><!--/assets/img/product-details.png" alt="" class="img-fluid"></div>-->
<!--                                    <div class="swiper-slide"><img src="--><?php //echo base_url()?><!--/assets/img/product-details.png" alt="" class="img-fluid"></div>-->
                                </div>
                                <div class="swiper-button-prev">
                                    <i class="fa-solid fa-angle-left"></i>
                                </div>
                                <div class="swiper-button-next">
                                    <i class="fa-solid fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3 mb-lg-0">
                        <div class="product-cat mb-3">Categorie</div>
                        <h1 class="product-title mb-4"><?php echo $products->name;?></h1>
                        <div class="rating mb-2">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            200 Reating
                        </div>
                        <div class="brand mb-3"><strong>Brand:</strong> <?php echo get_data_by_id('name','brand','brand_id',$products->brand_id);?></div>
                        <hr>
                        <div class="price mb-3">
                            <?php $spPric = get_data_by_id('special_price','product_special','product_id',$products->product_id); if (empty($spPric)){ ?>
                            $<?php echo $products->price;?>
                            <?php }else{ ?>
                               <small> <del>$<?php echo $products->price;?></del></small><br>$<?php echo $spPric;?>
                            <?php } ?>
                        </div>
                        <div class="quantity">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-dark btn-sm" id="minus-btn" onclick="minusItem('plus')"><i class="fa fa-minus"></i></button>
                                </div>
                                <input type="text" id="qty_input" name="qty" class="form-control form-control-sm item_plus" value="1" min="1">
                                <div class="input-group-prepend">
                                    <button class="btn btn-dark btn-sm" id="plus-btn" onclick="plusItem('plus')"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>

                        <a href="javascript:void(0)" class="btn btn-cart rounded-0 mt-3" onclick="addToCart(<?php echo $products->product_id ?>)">Add to Cart</a>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-info p-3">
                            <p><strong>Delivery</strong></p>
                            <div class="d-flex">
                                <p class="me-2"><img src="<?php echo base_url()?>/assets/img/location.png" alt="Map"></p>
                                <p class="me-2">Dhaka, Dhaka North, Banani Road No. 12 - 19</p>
                                <p><a class="loc-change" href="#">CHANGE</a></p>
                            </div>
                            <hr>
                            <p><strong>Service</strong></p>
                            <ul class="list-unstyled">
                                <li><i class="fa-solid fa-square"></i> 100% Authentic</li>
                                <li><i class="fa-solid fa-square"></i> 14 days easy return</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-lg-9 mb-3 mb-lg-0">
                <div class="card p-3 rounded-0 description">
                    <h2 class="mb-5"><?php echo $products->name;?></h2>
                    <p><?php echo $products->description;?></p>
                    <ul class="list-unstyled ps-3 mb-5">
                        <li>6-Months Service warranty</li>
                        <li>High-grade stainless steel blade</li>
                        <li>Compact Design and comfortable to use</li>
                        <li>Ergonomic design for easier handling</li>
                        <li>Effortless even trim</li>
                        <li>Quick-release blades for easy cleaning</li>
                        <li>45 minutes of cordless use</li>
                        <li>Skin-friendly blades for smooth skin</li>
                        <li>4-Detachable 1mm, 3mm, 5mm, & 7mm comb</li>
                    </ul>
                    <hr>
                    <div class="product-video mt-3">
                        <img src="<?php echo base_url()?>/assets/img/video.png" alt="" class="img-fluid w-100">
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="products">
                    <div class="product-grid h-100 d-flex align-items-stretch flex-column position-relative text-white card p-3 rounded-0 mb-3">
                        <a href="#" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2"><i class="fa-solid fa-heart"></i></a>
                        <div class="product-top">
                            <img src="<?php echo base_url()?>/assets/img/p1.png" alt="" class="img-fluid w-100">
                            <div class="rating text-center my-2">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                        <div class="product-bottom mt-auto">
                            <div class="category">
                                Categorie
                            </div>
                            <div class="product-title mb-2">
                                <a href="#">12 COOL Smart Home Gadgets</a>
                            </div>
                            <div class="price mb-3">$200.00</div>
                            <a href="#" class="btn btn-cart w-100 rounded-0 mt-3">Add to Cart</a>
                        </div>
                    </div>
                    <div class="product-grid h-100 d-flex align-items-stretch flex-column position-relative text-white card p-3 rounded-0 mb-3">
                        <a href="#" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2"><i class="fa-solid fa-heart"></i></a>
                        <div class="product-top">
                            <img src="<?php echo base_url()?>/assets/img/p1.png" alt="" class="img-fluid w-100">
                            <div class="rating text-center my-2">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                        <div class="product-bottom mt-auto">
                            <div class="category">
                                Categorie
                            </div>
                            <div class="product-title mb-2">
                                <a href="#">12 COOL Smart Home Gadgets</a>
                            </div>
                            <div class="price mb-3">$200.00</div>
                            <a href="#" class="btn btn-cart w-100 rounded-0 mt-3">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-products mb-5">
            <div class="card rounded-0">
                <div class="card-header py-3 bg-white">
                    <h4>Related Product</h4>
                </div>
                <div class="card-body">
                    <div class="products h-100">
                        <div class="row gx-0 row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-5 h-100">
                            <div class="col border p-2">
                                <div class="product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                    <a href="#" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2"><i class="fa-solid fa-heart"></i></a>
                                    <div class="product-top">
                                        <img src="<?php echo base_url()?>/assets/img/p1.png" alt="" class="img-fluid w-100">
                                        <div class="rating text-center my-2">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-bottom mt-auto">
                                        <div class="category">
                                            Categorie
                                        </div>
                                        <div class="product-title mb-2">
                                            <a href="#">The Woven Sweet Dreams P.J. Top</a>
                                        </div>
                                        <div class="price mb-3">$200.00</div>
                                        <a href="#" class="btn btn-cart w-100 rounded-0 mt-3">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col border p-2">
                                <div class="product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                    <a href="#" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2"><i class="fa-solid fa-heart"></i></a>
                                    <div class="product-top">
                                        <img src="<?php echo base_url()?>/assets/img/p2.png" alt="" class="img-fluid w-100">
                                        <div class="rating text-center my-2">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-bottom mt-auto">
                                        <div class="category">
                                            Categorie
                                        </div>
                                        <div class="product-title mb-2">
                                            <a href="#">The Woven Sweet Dreams P.J. Top</a>
                                        </div>
                                        <div class="price mb-3">$200.00</div>
                                        <a href="#" class="btn btn-cart w-100 rounded-0 mt-3">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col border p-2">
                                <div class="product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                    <a href="#" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2"><i class="fa-solid fa-heart"></i></a>
                                    <div class="product-top">
                                        <img src="<?php echo base_url()?>/assets/img/p3.png" alt="" class="img-fluid w-100">
                                        <div class="rating text-center my-2">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-bottom mt-auto">
                                        <div class="category">
                                            Categorie
                                        </div>
                                        <div class="product-title mb-2">
                                            <a href="#">The Woven Sweet Dreams P.J. Top</a>
                                        </div>
                                        <div class="price mb-3">$200.00</div>
                                        <a href="#" class="btn btn-cart w-100 rounded-0 mt-3">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col border p-2">
                                <div class="product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                    <a href="#" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2"><i class="fa-solid fa-heart"></i></a>
                                    <div class="product-top">
                                        <img src="<?php echo base_url()?>/assets/img/p4.png" alt="" class="img-fluid w-100">
                                        <div class="rating text-center my-2">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-bottom mt-auto">
                                        <div class="category">
                                            Categorie
                                        </div>
                                        <div class="product-title mb-2">
                                            <a href="#">The Woven Sweet Dreams P.J. Top</a>
                                        </div>
                                        <div class="price mb-3">$200.00</div>
                                        <a href="#" class="btn btn-cart w-100 rounded-0 mt-3">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col border p-2">
                                <div class="product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                    <a href="#" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2"><i class="fa-solid fa-heart"></i></a>
                                    <div class="product-top">
                                        <img src="<?php echo base_url()?>/assets/img/p5.png" alt="" class="img-fluid w-100">
                                        <div class="rating text-center my-2">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-bottom mt-auto">
                                        <div class="category">
                                            Categorie
                                        </div>
                                        <div class="product-title mb-2">
                                            <a href="#">The Woven Sweet Dreams P.J. Top</a>
                                        </div>
                                        <div class="price mb-3">$200.00</div>
                                        <a href="#" class="btn btn-cart w-100 rounded-0 mt-3">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col border p-2">
                                <div class="product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                    <a href="#" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2"><i class="fa-solid fa-heart"></i></a>
                                    <div class="product-top">
                                        <img src="<?php echo base_url()?>/assets/img/p6.png" alt="" class="img-fluid w-100">
                                        <div class="rating text-center my-2">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-bottom mt-auto">
                                        <div class="category">
                                            Categorie
                                        </div>
                                        <div class="product-title mb-2">
                                            <a href="#">The Woven Sweet Dreams P.J. Top</a>
                                        </div>
                                        <div class="price mb-3">$200.00</div>
                                        <a href="#" class="btn btn-cart w-100 rounded-0 mt-3">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col border p-2">
                                <div class="product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                    <a href="#" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2"><i class="fa-solid fa-heart"></i></a>
                                    <div class="product-top">
                                        <img src="<?php echo base_url()?>/assets/img/p7.png" alt="" class="img-fluid w-100">
                                        <div class="rating text-center my-2">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-bottom mt-auto">
                                        <div class="category">
                                            Categorie
                                        </div>
                                        <div class="product-title mb-2">
                                            <a href="#">The Woven Sweet Dreams P.J. Top</a>
                                        </div>
                                        <div class="price mb-3">$200.00</div>
                                        <a href="#" class="btn btn-cart w-100 rounded-0 mt-3">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col border p-2">
                                <div class="product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                    <a href="#" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2"><i class="fa-solid fa-heart"></i></a>
                                    <div class="product-top">
                                        <img src="<?php echo base_url()?>/assets/img/p8.png" alt="" class="img-fluid w-100">
                                        <div class="rating text-center my-2">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-bottom mt-auto">
                                        <div class="category">
                                            Categorie
                                        </div>
                                        <div class="product-title mb-2">
                                            <a href="#">The Woven Sweet Dreams P.J. Top</a>
                                        </div>
                                        <div class="price mb-3">$200.00</div>
                                        <a href="#" class="btn btn-cart w-100 rounded-0 mt-3">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col border p-2">
                                <div class="product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                    <a href="#" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2"><i class="fa-solid fa-heart"></i></a>
                                    <div class="product-top">
                                        <img src="<?php echo base_url()?>/assets/img/p9.png" alt="" class="img-fluid w-100">
                                        <div class="rating text-center my-2">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-bottom mt-auto">
                                        <div class="category">
                                            Categorie
                                        </div>
                                        <div class="product-title mb-2">
                                            <a href="#">The Woven Sweet Dreams P.J. Top</a>
                                        </div>
                                        <div class="price mb-3">$200.00</div>
                                        <a href="#" class="btn btn-cart w-100 rounded-0 mt-3">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col border p-2">
                                <div class="product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                    <a href="#" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2"><i class="fa-solid fa-heart"></i></a>
                                    <div class="product-top">
                                        <img src="<?php echo base_url()?>/assets/img/p1.png" alt="" class="img-fluid w-100">
                                        <div class="rating text-center my-2">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-bottom mt-auto">
                                        <div class="category">
                                            Categorie
                                        </div>
                                        <div class="product-title mb-2">
                                            <a href="#">The Woven Sweet Dreams P.J. Top</a>
                                        </div>
                                        <div class="price mb-3">$200.00</div>
                                        <a href="#" class="btn btn-cart w-100 rounded-0 mt-3">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>