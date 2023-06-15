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
                                        <?php echo image_view('uploads/products',$products->product_id,'437_'.$products->image,'noimage.png','img-fluid')?>
                                    </div>
                                    <?php
                                    if (!empty($proImg)){
                                        foreach ($proImg as $imgval) {
                                            echo '<div class="swiper-slide">'.multi_image_view('uploads/products', $imgval->product_id, $imgval->product_image_id, '437_' . $imgval->image, 'noimage.png', 'img-fluid').'</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <?php echo image_view('uploads/products',$products->product_id,'100_'.$products->image,'noimage.png','img-fluid')?>
                                    </div>
                                    <?php
                                        if (!empty($proImg)){
                                            foreach ($proImg as $imgval) {
                                                echo '<div class="swiper-slide">'.multi_image_view('uploads/products', $imgval->product_id, $imgval->product_image_id, '100_' . $imgval->image, 'noimage.png', 'img-fluid').'</div>';
                                            }
                                        }
                                    ?>
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
                        <div class="product-cat mb-3"> </div>
                        <h1 class="product-title mb-4"><?php echo $products->name;?></h1>
                        <div class="rating mb-2">
                           <?php echo product_id_by_rating($products->product_id,'1');?>
                        </div>
                        <div class="brand mb-3"><strong>Brand:</strong> <?php echo get_data_by_id('name','cc_brand','brand_id',$products->brand_id);?></div>
                        <hr>
                        <div class="price mb-3">
                            <?php $spPric = get_data_by_id('special_price','cc_product_special','product_id',$products->product_id); if (empty($spPric)){ ?>
                            <?php echo currency_symbol($products->price);?>
                            <?php }else{ ?>
                               <small> <del><?php echo currency_symbol($products->price);?></del></small><br><?php echo currency_symbol($spPric);?>
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
                        <a href="javascript:void(0)" class="btn btn-cart rounded-0 mt-3 width-100" onclick="addToCart(<?php echo $products->product_id ?>)">Add to Cart</a>
                        <?php if (modules_key_by_access('wishlist') == 1) { ?>
                            <?php if (!isset(newSession()->isLoggedInCustomer)){ ?>
                                <a href="<?php echo base_url('login');?>" class="btn btn-wi  btn-default border rounded-0 mt-3"  ><i class="fa-solid fa-heart me-1"></i> Add to Wishlist</a>
                            <?php }else{ ?>
                                <a href="javascript:void(0)" class="btn btn-wi  btn-default border rounded-0 mt-3"  onclick="addToWishlist(<?php echo $products->product_id ?>)"><i class="fa-solid fa-heart me-1"></i> Add to Wishlist</a>
                            <?php } ?>
                        <?php } ?>

                        <?php if (modules_key_by_access('compare') == 1) { ?>
                        <a href="javascript:void(0)" onclick="addToCompare(<?php echo $products->product_id ?>)" class="btn btn-wi  btn-default border  rounded-0 mt-3"  ><i class="fa-solid fa-code-compare"></i> Add to compare</a>
                        <?php } ?>
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
                <div class="card product-tab p-5 rounded-0 h-100">
                    <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                    <ul class="nav nav-tabs list-unstyled mb-5 border-0" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description-tab-pane" type="button" role="tab" aria-controls="description-tab-pane" aria-selected="true">Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="more-tab" data-bs-toggle="tab" data-bs-target="#more-tab-pane" type="button" role="tab" aria-controls="more-tab-pane" aria-selected="false">More Information</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="false">Reviews</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description-tab-pane" role="tabpanel" aria-labelledby="description-tab" tabindex="0">
                            <div class="description">
                                <h2 class="mb-5"><?php echo $products->name;?></h2>
                                <?php echo $products->description;?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="more-tab-pane" role="tabpanel" aria-labelledby="more-tab" tabindex="0">
                            <h2 class="mb-5"><?php echo $products->name;?></h2>
                            <table class="table table-hover">
                                <tr>
                                    <th>SPECIFICATION</th>
                                    <td>
                                        <table class="table">
                                            <?php foreach (attribute_array_by_product_id($products->product_id) as $spec){?>
                                            <tr>
                                                <td><?php echo get_data_by_id('name','cc_product_attribute_group','attribute_group_id',$spec->attribute_group_id);?>:</td>
                                                <td><?php echo $spec->name;?></td>
                                            </tr>
                                            <?php } ?>

                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">

                            <?php foreach ($review as $rev){ ?>
                                <div class="review text-capitalize mt-2" style="border: 1px solid #ededed;padding: 20px 10px 10px 10px;">
                                    <span style="float: right;"><?php echo $rev->feedback_star;?> <i data-index="2" title="Medium" class="fa-solid fa-star" style="color: rgb(0, 0, 0); margin: 2px; font-size: 1em;"></i></span>
                                    <p><strong><?php echo get_data_by_id('firstname','cc_customer','customer_id',$rev->customer_id).' '.get_data_by_id('lastname','cc_customer','customer_id',$rev->customer_id)?></strong> </p>

                                    <p><?php echo $rev->feedback_text;?></p>
                                </div>
                            <?php } ?>


                            <form action="<?php echo base_url('review')?>" method="post" class="product-review w-50">
                                <p class="mb-4 mt-2"><strong>Your Rating</strong></p>
                                <?php if (isset(newSession()->isLoggedInCustomer)){ if(empty(check_review($products->product_id))){  ?>
                                <div class="rating ">
                                    <div class="ratingPiont"></div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="review">Message</label>
                                    <textarea class="form-control" rows="5" name="feedback_text" id="review" placeholder="Message.." required ></textarea>
                                </div>
                                    <input type="hidden" name="product_id" value="<?php echo $products->product_id;?>">
                                <button class="btn rounded-0 mt-3 px-4 py-2" type="submit">Submit Review</button>
                                <?php }else{ echo '<p>Already Reviewed</p>';} }else{ ?>
                                    <a href="<?php echo base_url('login')?>">Please login to continue</a>
                                <?php }?>
                            </form>

                        </div>
                    </div>


                </div>
            </div>
            <div class="col-lg-3">
                <div class="products">
                    <?php if(!empty($relProdSide)){ foreach ($relProdSide as $relPro){ ?>
                    <div class="product-grid h-100 d-flex align-items-stretch flex-column position-relative text-white card p-3 rounded-0 mb-3">
                        <?php if (modules_key_by_access('wishlist') == 1) { ?>
                            <?php if (!isset(newSession()->isLoggedInCustomer)){ ?>
                                <a href="<?php echo base_url('login');?>" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2"><i class="fa-solid fa-heart"></i></a>
                            <?php }else{ ?>
                                <a href="javascript:void(0)" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2" onclick="addToWishlist(<?php echo $relPro->product_id ?>)"><i class="fa-solid fa-heart"></i></a>
                            <?php } ?>
                        <?php } ?>

                        <?php if (modules_key_by_access('compare') == 1) { ?>
                        <a href="javascript:void(0)" onclick="addToCart(<?php echo $relPro->product_id ?>)" class="btn-compare position-absolute start-0 top-0 mt-5 ms-2"><i class="fa-solid fa-code-compare"></i></a>
                        <?php } ?>
                        <div class="product-top">
                            <?php echo image_view('uploads/products',$relPro->product_id,'191_'.$relPro->image,'noimage.png','img-fluid w-100')?>
                            <div class="rating text-center my-2">
                                <?php echo product_id_by_rating($relPro->product_id);?>
                            </div>
                        </div>
                        <div class="product-bottom mt-auto">
                            <div class="category">
<!--                                Categorie-->
                            </div>
                            <div class="product-title mb-2">
                                <a href="<?php echo base_url('detail/'.$relPro->product_id)?>"><?php echo $relPro->name;?></a>
                            </div>
                            <div class="price mb-3">
                                <?php $spPric2 = get_data_by_id('special_price','cc_product_special','product_id',$relPro->product_id);  if (empty($spPric2)){ ?>
                                    <?php echo currency_symbol($relPro->price);?>
                                <?php }else{ ?>
                                    <small> <del><?php echo currency_symbol($relPro->price);?></del></small>/<?php echo currency_symbol($spPric2);?>
                                <?php } ?>
                            </div>
                            <a href="javascript:void(0)" onclick="addToCart(<?php echo $relPro->product_id ?>)" class="btn btn-cart w-100 rounded-0 mt-3">Add to Cart</a>
                        </div>
                    </div>
                    <?php } } ?>
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
                            <?php if(!empty($relProd)){ foreach ($relProd as $rPro){ ?>
                            <div class="col border p-2">
                                <div class="product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                    <?php if (modules_key_by_access('wishlist') == 1) { ?>
                                    <?php if (!isset(newSession()->isLoggedInCustomer)){ ?>
                                        <a href="<?php echo base_url('login');?>" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2"><i class="fa-solid fa-heart"></i></a>
                                    <?php }else{ ?>
                                        <a href="javascript:void(0)" class="btn-wishlist position-absolute start-0 top-0 mt-2 ms-2" onclick="addToWishlist(<?php echo $rPro->product_id ?>)"><i class="fa-solid fa-heart"></i></a>
                                    <?php } ?>
                                    <?php } ?>

                                    <?php if (modules_key_by_access('compare') == 1) { ?>
                                    <a href="javascript:void(0)" onclick="addToCart(<?php echo $rPro->product_id ?>)" class="btn-compare position-absolute start-0 top-0 mt-5 ms-2"><i class="fa-solid fa-code-compare"></i></a>
                                    <?php } ?>
                                    <div class="product-top">
                                        <?php echo image_view('uploads/products',$rPro->product_id,'191_'.$rPro->image,'noimage.png','img-fluid w-100')?>
                                        <div class="rating text-center my-2">
                                            <?php echo product_id_by_rating($rPro->product_id);?>
                                        </div>
                                    </div>
                                    <div class="product-bottom mt-auto">
                                        <div class="category">
<!--                                            Categorie-->
                                        </div>
                                        <div class="product-title mb-2">
                                            <a href="<?php echo base_url('detail/'.$rPro->product_id)?>"><?php echo $rPro->name;?></a>
                                        </div>
                                        <div class="price mb-3">
                                            <?php $spPric = get_data_by_id('special_price','cc_product_special','product_id',$rPro->product_id);  if (empty($spPric)){ ?>
                                                <?php echo currency_symbol($rPro->price);?>
                                            <?php }else{ ?>
                                                <small> <del><?php echo currency_symbol($rPro->price);?></del></small>/<?php echo currency_symbol($spPric);?>
                                            <?php } ?>
                                        </div>
                                        <a href="javascript:void(0)" onclick="addToCart(<?php echo $rPro->product_id ?>)" class="btn btn-cart w-100 rounded-0 mt-3">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>