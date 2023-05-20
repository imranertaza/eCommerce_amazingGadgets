<section class="main-container my-5">
    <div class="container">
        <div class="popular-category mb-5">

            <div class="card rounded-0">
                <div class="card-header py-3 bg-white">
                    <h4>Featured Product List</h4>
                </div>
                <div class="card-body">
                    <div class="products h-100">
                        <div class="row gx-0 row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-5 h-100">

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

                    <?php echo $links;?>
                </div>
            </div>

        </div>
    </div>
</section>