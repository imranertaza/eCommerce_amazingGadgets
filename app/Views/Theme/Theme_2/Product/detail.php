<section class="main-container">
    <div class="container">
        <div class="product-details">
            <div class=" p-3  mb-4 border-bottom">
                <div class="row">
                    <div class="col-lg-8 mb-3 mb-lg-0">
                        <section class="banner-section ">
                            <div class="container  product-det-info">
                                <div class="vehicle-detail-banner banner-content clearfix">
                                    <div class="banner-slider">
                                        <div class="thumb_plus_video">
                                        <div class="slider slider-nav thumb-image">

                                            <div class="thumbnail-image">
                                                <div class="thumbImg">
                                                    <?php echo image_view('uploads/products',$products->product_id,'100_'.$products->image,'noimage.png','img-fluid')?>
                                                </div>
                                            </div>

                                            <?php
                                            if (!empty($proImg)){
                                                foreach ($proImg as $imgval) {
                                                    echo '<div class="thumbnail-image"><div class="thumbImg">'.multi_image_view('uploads/products', $imgval->product_id, $imgval->product_image_id, '100_' . $imgval->image, 'noimage.png', 'img-fluid').'</div></div>';
                                                }
                                            }
                                            ?>
                                            <?php if (!empty($products->video)){ ?>
                                            <div class="thumbnail-image">
                                                <div class="thumbImg video-thum">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#videoeModal">
                                                        <?php echo image_view('uploads/products',$products->product_id,'100_'.$products->image,'noimage.png','img-fluid')?>
                                                    <img src="<?php echo base_url('uploads/play.png')?>" alt="" class="play-image">
                                                    </a>
                                                </div>
                                            </div>
                                            <?php } ?>

                                        </div>


                                        <div class="slider slider-for">
                                            <div class="slider-banner-image">
                                                <?php echo image_view('uploads/products',$products->product_id,'437_'.$products->image,'noimage.png','img-fluid')?>
                                            </div>

                                            <?php
                                            if (!empty($proImg)){
                                                foreach ($proImg as $imgval) {
                                                    echo '<div class="slider-banner-image">'.multi_image_view('uploads/products', $imgval->product_id, $imgval->product_image_id, '437_' . $imgval->image, 'noimage.png', 'img-fluid').'</div>';
                                                }
                                            }
                                            ?>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-4">
                        <div class="product-info-det p-3">
                            <p><?php echo $products->name;?></p>
                            <div class="rating mb-2">
                                <?php echo product_id_by_rating($products->product_id,'1');?>
                            </div>

                            <div class="price mb-3">
                                <?php $spPric = get_data_by_id('special_price','cc_product_special','product_id',$products->product_id); if (empty($spPric)){ ?>
                                    <?php echo currency_symbol($products->price);?>
                                <?php }else{ ?>
                                    <small> <del><?php echo currency_symbol($products->price);?></del></small><br><?php echo currency_symbol($spPric);?>
                                <?php } ?>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-cart rounded-0 mt-2" onclick="addToCart(<?php echo $products->product_id ?>)">Add to Cart</a>
                            <div class="d-flex justify-content-between pro-w">

                                <?php if (modules_key_by_access('wishlist') == 1) { ?>
                                    <?php if (!isset(newSession()->isLoggedInCustomer)){ ?>
                                        <a href="<?php echo base_url('login');?>" class="btn btn-wishlist-2 rounded-0 mt-3 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                                                <path d="M6.99967 13.0009L6.03301 12.1342C4.91079 11.1231 3.98301 10.2509 3.24967 9.51758C2.51634 8.78424 1.93301 8.1258 1.49967 7.54224C1.06634 6.95913 0.763674 6.42313 0.591674 5.93424C0.419674 5.44535 0.333452 4.94535 0.333008 4.43424C0.333008 3.3898 0.683008 2.51758 1.38301 1.81758C2.08301 1.11758 2.95523 0.767578 3.99967 0.767578C4.57745 0.767578 5.12745 0.8898 5.64967 1.13424C6.1719 1.37869 6.6219 1.72313 6.99967 2.16758C7.37745 1.72313 7.82745 1.37869 8.34967 1.13424C8.8719 0.8898 9.4219 0.767578 9.99967 0.767578C11.0441 0.767578 11.9163 1.11758 12.6163 1.81758C13.3163 2.51758 13.6663 3.3898 13.6663 4.43424C13.6663 4.94535 13.5801 5.44535 13.4077 5.93424C13.2352 6.42313 12.9326 6.95913 12.4997 7.54224C12.0663 8.1258 11.483 8.78424 10.7497 9.51758C10.0163 10.2509 9.08856 11.1231 7.96634 12.1342L6.99967 13.0009ZM6.99967 11.2009C8.06634 10.2454 8.94412 9.4258 9.63301 8.74224C10.3219 8.05869 10.8663 7.46447 11.2663 6.95958C11.6663 6.4538 11.9441 6.00358 12.0997 5.60891C12.2552 5.21424 12.333 4.82269 12.333 4.43424C12.333 3.76758 12.1108 3.21202 11.6663 2.76758C11.2219 2.32313 10.6663 2.10091 9.99967 2.10091C9.47745 2.10091 8.99412 2.24802 8.54967 2.54224C8.10523 2.83647 7.79967 3.21158 7.63301 3.66758H6.36634C6.19967 3.21202 5.89412 2.83691 5.44967 2.54224C5.00523 2.24758 4.5219 2.10047 3.99967 2.10091C3.33301 2.10091 2.77745 2.32313 2.33301 2.76758C1.88856 3.21202 1.66634 3.76758 1.66634 4.43424C1.66634 4.82313 1.74412 5.21491 1.89967 5.60958C2.05523 6.00424 2.33301 6.45424 2.73301 6.95958C3.13301 7.46491 3.67745 8.05935 4.36634 8.74291C5.05523 9.42647 5.93301 10.2458 6.99967 11.2009Z" fill="#444444"/>
                                            </svg> Add to Wishlist</a>
                                    <?php }else{ ?>
                                        <a href="javascript:void(0)" class="btn btn-wishlist-2 rounded-0 mt-3 me-1" onclick="addToWishlist(<?php echo $products->product_id ?>)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                                                <path d="M6.99967 13.0009L6.03301 12.1342C4.91079 11.1231 3.98301 10.2509 3.24967 9.51758C2.51634 8.78424 1.93301 8.1258 1.49967 7.54224C1.06634 6.95913 0.763674 6.42313 0.591674 5.93424C0.419674 5.44535 0.333452 4.94535 0.333008 4.43424C0.333008 3.3898 0.683008 2.51758 1.38301 1.81758C2.08301 1.11758 2.95523 0.767578 3.99967 0.767578C4.57745 0.767578 5.12745 0.8898 5.64967 1.13424C6.1719 1.37869 6.6219 1.72313 6.99967 2.16758C7.37745 1.72313 7.82745 1.37869 8.34967 1.13424C8.8719 0.8898 9.4219 0.767578 9.99967 0.767578C11.0441 0.767578 11.9163 1.11758 12.6163 1.81758C13.3163 2.51758 13.6663 3.3898 13.6663 4.43424C13.6663 4.94535 13.5801 5.44535 13.4077 5.93424C13.2352 6.42313 12.9326 6.95913 12.4997 7.54224C12.0663 8.1258 11.483 8.78424 10.7497 9.51758C10.0163 10.2509 9.08856 11.1231 7.96634 12.1342L6.99967 13.0009ZM6.99967 11.2009C8.06634 10.2454 8.94412 9.4258 9.63301 8.74224C10.3219 8.05869 10.8663 7.46447 11.2663 6.95958C11.6663 6.4538 11.9441 6.00358 12.0997 5.60891C12.2552 5.21424 12.333 4.82269 12.333 4.43424C12.333 3.76758 12.1108 3.21202 11.6663 2.76758C11.2219 2.32313 10.6663 2.10091 9.99967 2.10091C9.47745 2.10091 8.99412 2.24802 8.54967 2.54224C8.10523 2.83647 7.79967 3.21158 7.63301 3.66758H6.36634C6.19967 3.21202 5.89412 2.83691 5.44967 2.54224C5.00523 2.24758 4.5219 2.10047 3.99967 2.10091C3.33301 2.10091 2.77745 2.32313 2.33301 2.76758C1.88856 3.21202 1.66634 3.76758 1.66634 4.43424C1.66634 4.82313 1.74412 5.21491 1.89967 5.60958C2.05523 6.00424 2.33301 6.45424 2.73301 6.95958C3.13301 7.46491 3.67745 8.05935 4.36634 8.74291C5.05523 9.42647 5.93301 10.2458 6.99967 11.2009Z" fill="#444444"/>
                                            </svg> Add to Wishlist</a>
                                    <?php } ?>
                                <?php } ?>

                                <?php if (modules_key_by_access('compare') == 1) { ?>
                                    <a href="javascript:void(0)" class="btn btn-wishlist-2 rounded-0 mt-3 ms-1" onclick="addToCompare(<?php echo $products->product_id ?>)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.88892 11.9906L5.61892 10.7206L6.28892 10.0206L8.41892 12.1506V12.8506L6.28892 14.9806L5.57892 14.2706L6.84892 13.0006H4.99892C4.67024 13.0019 4.34456 12.9381 4.04065 12.813C3.73673 12.6878 3.46061 12.5037 3.2282 12.2713C2.99579 12.0389 2.81169 11.7627 2.68652 11.4588C2.56136 11.1549 2.49759 10.8292 2.49892 10.5006V4.95057C2.0198 4.84856 1.57943 4.61277 1.22892 4.27057C0.880785 3.91882 0.643929 3.47235 0.547898 2.98687C0.451868 2.50138 0.500914 1.99836 0.688917 1.54057C0.878663 1.08432 1.19936 0.694534 1.6105 0.42044C2.02164 0.146346 2.50479 0.000236501 2.99892 0.000565995C3.34188 -0.00680688 3.68256 0.0579233 3.99892 0.190566C4.30197 0.315238 4.57732 0.498734 4.80903 0.730451C5.04075 0.962168 5.22425 1.23751 5.34892 1.54057C5.48192 1.85757 5.54592 2.19857 5.53892 2.54057C5.53904 3.11689 5.34003 3.67556 4.97557 4.12202C4.61112 4.56848 4.1036 4.8753 3.53892 4.99057V10.4906C3.53892 10.8884 3.69695 11.2699 3.97826 11.5512C4.25956 11.8325 4.64109 11.9906 5.03892 11.9906H6.88892ZM2.20892 3.74057C2.49744 3.93279 2.84363 4.01913 3.18862 3.98492C3.53362 3.9507 3.85611 3.79804 4.10125 3.5529C4.34639 3.30776 4.49905 2.98526 4.53327 2.64027C4.56748 2.29528 4.48114 1.94908 4.28892 1.66057C4.12118 1.41206 3.88497 1.21754 3.60892 1.10057C3.33644 0.989575 3.0372 0.961739 2.74892 1.02057C2.45693 1.07703 2.18852 1.21958 1.97823 1.42987C1.76793 1.64017 1.62538 1.90858 1.56892 2.20057C1.51009 2.48884 1.53793 2.78809 1.64892 3.06057C1.76592 3.33757 1.95992 3.57357 2.20892 3.74057ZM12.5389 10.0406C13.0189 10.1386 13.4609 10.3756 13.8089 10.7206C14.2166 11.1308 14.4702 11.6692 14.5267 12.2448C14.5832 12.8205 14.4391 13.3979 14.1189 13.8796C13.9132 14.1862 13.6422 14.4435 13.3253 14.6329C13.0083 14.8223 12.6534 14.9392 12.2859 14.9751C11.9184 15.0111 11.5476 14.9651 11.1999 14.8407C10.8523 14.7162 10.5366 14.5163 10.2754 14.2553C10.0143 13.9943 9.81416 13.6786 9.68949 13.3311C9.56483 12.9836 9.51869 12.6127 9.5544 12.2452C9.59011 11.8777 9.70678 11.5227 9.89602 11.2056C10.0853 10.8886 10.3424 10.6174 10.6489 10.4116C10.9179 10.2296 11.2199 10.1036 11.5389 10.0416V4.49057C11.5389 4.09274 11.3809 3.71121 11.0996 3.42991C10.8183 3.1486 10.4367 2.99057 10.0389 2.99057H8.18892L9.45892 4.26057L8.74892 4.97057L6.61892 2.84057V2.14057L8.74892 0.010566L9.45892 0.720566L8.18892 1.99057H10.0389C10.3676 1.98924 10.6933 2.053 10.9972 2.17817C11.3011 2.30334 11.5772 2.48744 11.8096 2.71985C12.042 2.95226 12.2261 3.22838 12.3513 3.53229C12.4765 3.83621 12.5402 4.16189 12.5389 4.49057V10.0406ZM12.1879 13.9836C12.4451 13.9578 12.6913 13.8659 12.9026 13.7169C13.1139 13.5679 13.283 13.3669 13.3937 13.1332C13.5044 12.8996 13.5528 12.6413 13.5343 12.3835C13.5157 12.1256 13.4309 11.877 13.2879 11.6616C13.1202 11.4131 12.884 11.2185 12.6079 11.1016C12.3357 10.9908 12.0369 10.9629 11.7489 11.0216C11.4569 11.078 11.1885 11.2206 10.9782 11.4309C10.7679 11.6412 10.6254 11.9096 10.5689 12.2016C10.5101 12.4898 10.5379 12.7891 10.6489 13.0616C10.7718 13.3606 10.9881 13.6119 11.2654 13.778C11.5427 13.9441 11.8663 14.0162 12.1879 13.9836Z" fill="#444444"/>
                                        </svg> Add to Compare</a>
                                <?php } ?>

                            </div>

                            <div class="option mt-3">
                                <table class="table table-responsive table-borderless">
                                    <?php foreach (attribute_array_by_product_id($products->product_id) as $spec){?>
                                        <tr>
                                            <td><b><?php echo get_data_by_id('name','cc_product_attribute_group','attribute_group_id',$spec->attribute_group_id);?>:</b></td>
                                            <td><?php echo $spec->name;?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-about ">
            <div class="row mb-4 mt-5">
                <div class="col-lg-8">
                    <p class="pro-abo-title">About this item</p>
                    <div class="pro-abo-text mt-3">
                       <?php echo $products->description;?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <?php echo image_view('uploads/products',$products->product_id,'437_'.$products->image,'noimage.png','img-fluid w-100')?>
                </div>
            </div>
        </div>
        <?php if (!empty($bothProducts)){ ?>
        <div class="row mb-4 ">
            <div class="col-lg-12 border-bottom p-3">
                <ul class="nav nav-tabs list-unstyled mb-5 border-0 border-bottom custom-tab-up" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="first-tab" data-bs-toggle="tab" data-bs-target="#first-tab-pane" type="button" role="tab" aria-controls="description-tab-pane" aria-selected="true">Bought Together</button>
                    </li>
<!--                    <li class="nav-item" role="presentation">-->
<!--                        <button class="nav-link" id="sech-tab"  data-bs-toggle="tab" data-bs-target="#sech-tab-pane" type="button" role="tab" aria-controls="more-tab-pane" aria-selected="false">Also Bought</button>-->
<!--                    </li>-->
                </ul>
                <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade show active" id="first-tab-pane" role="tabpanel" aria-labelledby="first-tab" tabindex="0">
                        <form id="both-product">
                            <div class="row">
                            <div class="col-lg-8">
                                <div class="products h-100">
                                    <div class="row ">
                                        <?php $totalPrice = 0; $i = 1; foreach ($bothProducts as $key => $both){ ?>
                                            <div class="col-lg-3 ">
                                                <div class="product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                                    <div class="product-top border p-2">
                                                        <?php echo image_view('uploads/products',$both->product_id,'191_'.$both->image,'noimage.png','img-fluid w-100')?>
                                                        <input type="checkbox" name="both_product[]" onchange="bothPriceCalculat()" class="form-check-input check-input" value="<?php echo $both->product_id;?>" checked>
                                                    </div>
                                                    <div class="product-bottom  mt-2">
                                                        <div class="product-title-2 mb-2">
                                                            <a href="#"><?php echo substr($both->name,0,40);?> </a>
                                                        </div>
                                                        <div class="price-2 mb-3">
                                                            <?php $spPric = get_data_by_id('special_price','cc_product_special','product_id',$both->product_id); if (empty($spPric)){ ?>
                                                                <?php echo currency_symbol($both->price); ?>
                                                            <?php }else{ ?>
                                                                <?php echo currency_symbol($spPric); ?>sp
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $totalPrice += !empty($spPric)?$spPric:$both->price; $show = 3 / $i; if(($show != 1) && (array_key_exists($key+1, $bothProducts))){ ?>
                                            <div class="col-lg-1 d-flex align-items-center ">
                                                <div class="plus-icon w-100 text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">-->
                                                        <path d="M17.75 10.248H10.25V17.748H7.75V10.248H0.25V7.74805H7.75V0.248047H10.25V7.74805H17.75V10.248Z" fill="black"/>-->
                                                    </svg>
                                                </div>
                                            </div>
                                        <?php } if($i >= 3) { $i = 1; continue; } $i++; } ?>


                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 align-items-center d-flex ">
                                <div class=" w-100 text-center">
                                    <p class="price-rel" id="price-both"><?php echo currency_symbol($totalPrice);?></p>
                                    <button type="button" class="btn w-100 bg-black text-white mt-2" onclick="groupAdtoCart()">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="sech-tab-pane" role="tabpanel" aria-labelledby="sech-tab" tabindex="0">
                        <p class="mb-5"></p>

                    </div>
                </div>
            </div>
        </div>
        <?php } ?>


        <div class="row mb-4 related-products-oth">
            <div class="col-lg-12  p-4 rounded-0 border-bottom border-top">
                <div class=" py-3 bg-white">
                    <h4>Related Product</h4>
                </div>
                <div class="card-body pb-3">
                    <div class="products h-100">
                        <div class="row gx-0 row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-5 h-100">
                            <?php if(!empty($relProd)){ foreach ($relProd as $rPro){ ?>
                            <div class="col border p-2">
                                <div class=" product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                    <?php if (modules_key_by_access('wishlist') == 1) { ?>
                                        <?php if (!isset(newSession()->isLoggedInCustomer)){ ?>
                                            <a href="<?php echo base_url('login');?>" class="btn-wishlist position-absolute  mt-2 ms-2"><i class="fa-solid fa-heart"></i>
                                                <span class="btn-wishlist-text position-absolute  mt-5 ms-2">Favorite</span>
                                            </a>
                                        <?php }else{ ?>
                                            <a href="javascript:void(0)" class="btn-wishlist position-absolute mt-2 ms-2" onclick="addToWishlist(<?php echo $rPro->product_id ?>)"><i class="fa-solid fa-heart"></i>
                                                <span class="btn-wishlist-text position-absolute  mt-5 ms-2">Favorite</span>
                                            </a>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if (modules_key_by_access('compare') == 1) { ?>
                                        <a href="javascript:void(0)" onclick="addToCompare(<?php echo $rPro->product_id ?>)" class="btn-compare position-absolute  mt-5 ms-2"><i class="fa-solid fa-code-compare"></i>
                                            <span class="btn-compare-text position-absolute  mt-5 ms-2">Compare</span>
                                        </a>
                                    <?php } ?>
                                    <div class="product-top text-center">
                                        <?php echo image_view('uploads/products',$rPro->product_id,'191_'.$rPro->image,'noimage.png','img-fluid ')?>
                                        <div class="rating text-center my-2">
                                            <?php echo product_id_by_rating($rPro->product_id);?>
                                        </div>
                                    </div>
                                    <div class="product-bottom mt-auto">
                                        <div class="category-new">
                                            Categorie
                                        </div>
                                        <div class="product-title-new mb-2 text-capitalize">
                                            <a href="<?php echo base_url('detail/'.$rPro->product_id)?>"><?php echo substr($rPro->name,0,60);?></a>
                                        </div>
                                        <div class="price-new mb-3">
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

        <?php if (!empty($products->description_image)){ ?>
        <div class="row mb-4">
            <div class="col-lg-12 p-3">
                <?php echo image_view('uploads/products',$products->product_id,$products->description_image,'',$class='w-100');?>
            </div>
        </div>
        <?php } ?>

        <div class="row mb-4">
            <div class="col-lg-12 p-3 product-guides">
                <p class="product-guides-title">Product guides and Documents</p><br>
                <?php if (!empty($products->documentation_pdf)){ ?>
                <a href="<?php echo base_url('uploads/products/'.$products->product_id.'/'.$products->documentation_pdf)?>" target="_blank" download class="link-product-guides">Product documentation (Pdf)</a><br><br>
                <?php } ?>
                <?php if (!empty($products->safety_pdf)){ ?>
                <a href="<?php echo base_url('uploads/products/'.$products->product_id.'/'.$products->safety_pdf)?>" target="_blank" download class="link-product-guides">Safety information  (Pdf)</a><br><br>
                <?php } ?>
                <?php if (!empty($products->instructions_pdf)){ ?>
                <a href="<?php echo base_url('uploads/products/'.$products->product_id.'/'.$products->instructions_pdf)?>" target="_blank" download class="link-product-guides">Instructions for use (Pdf)</a>
                <?php } ?>
            </div>
        </div>

        <div class="row mb-4 ">
            <div class="col-lg-12  p-4 rounded-0 border-bottom border-top">
                <div class=" py-3 bg-white">
                    <h4>Related Product</h4>
                </div>
                <div class="card-body pb-3">
                    <div class="products h-100">
                        <div class="row gx-0 row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-5 h-100">
                            <?php if(!empty($relProd)){ foreach ($relProd as $rPro){ ?>
                                <div class="col border p-2">
                                    <div class=" product-grid h-100 d-flex align-items-stretch flex-column position-relative">
                                        <?php if (modules_key_by_access('wishlist') == 1) { ?>
                                            <?php if (!isset(newSession()->isLoggedInCustomer)){ ?>
                                                <a href="<?php echo base_url('login');?>" class="btn-wishlist position-absolute  mt-2 ms-2"><i class="fa-solid fa-heart"></i>
                                                    <span class="btn-wishlist-text position-absolute  mt-5 ms-2">Favorite</span>
                                                </a>
                                            <?php }else{ ?>
                                                <a href="javascript:void(0)" class="btn-wishlist position-absolute mt-2 ms-2" onclick="addToWishlist(<?php echo $rPro->product_id ?>)"><i class="fa-solid fa-heart"></i>
                                                    <span class="btn-wishlist-text position-absolute  mt-5 ms-2">Favorite</span>
                                                </a>
                                            <?php } ?>
                                        <?php } ?>
                                        <?php if (modules_key_by_access('compare') == 1) { ?>
                                            <a href="javascript:void(0)" onclick="addToCompare(<?php echo $rPro->product_id ?>)" class="btn-compare position-absolute  mt-5 ms-2"><i class="fa-solid fa-code-compare"></i>
                                                <span class="btn-compare-text position-absolute  mt-5 ms-2">Compare</span>
                                            </a>
                                        <?php } ?>
                                        <div class="product-top text-center">
                                            <?php echo image_view('uploads/products',$rPro->product_id,'191_'.$rPro->image,'noimage.png','img-fluid ')?>
                                            <div class="rating text-center my-2">
                                                <?php echo product_id_by_rating($rPro->product_id);?>
                                            </div>
                                        </div>
                                        <div class="product-bottom mt-auto">
                                            <div class="category-new">
                                                Categorie
                                            </div>
                                            <div class="product-title-new mb-2 text-capitalize">
                                                <a href="<?php echo base_url('detail/'.$rPro->product_id)?>"><?php echo substr($rPro->name,0,60);?></a>
                                            </div>
                                            <div class="price-new mb-3">
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

<div class="modal fade" id="videoeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
<!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            </div>-->
            <div class="modal-body">
                <iframe width="100%" height="350" src="<?php echo $products->video;?>" title="Impossible Records In Football" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>

        </div>
    </div>
</div>