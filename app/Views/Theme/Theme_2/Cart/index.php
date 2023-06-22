<section class="main-container" id="tableReload">
    <div class="container">
        <div class="cart">
            <div class="row">
                <div class="col-md-12 ">
                    <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                </div>
            </div>
            <table class="cart-table w-100 text-center " >
                <thead>
                <tr>
                    <th>Delete</th>
                    <th>Product Picture</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach (Cart()->contents() as $val ){ ?>
                    <tr>
                        <td class="product-remove mo-text-center">
                            <a href="javascript:void(0)" onclick="removeCart('<?php echo $val['rowid'];?>')" ><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                        <td class="product-thumbnail mo-text-center">
                            <a href="#">
                                <?php $img = get_data_by_id('image','cc_products','product_id',$val['id']); ?>
                                <?php echo image_view('uploads/products',$val['id'],'100_'.$img,'noimage.png','img-fluid')?>
                            </a>
                        </td>
                        <td class="product-name text-start mo-text-center">
                            <a href="#"><?php echo $val['name'];?></a>
                        </td>

                        <td class="product-price mo-text-center" width="100">
                            <span class="price"><?php echo currency_symbol($val['price']);?></span>
                        </td>

                        <td class="product-quantity mo-text-center" width="180">
                            <div class="quantity d-flex justify-content-end justify-content-lg-center">
                                <div class="input-group mb-3" >
                                    <div class="input-group-prepend">
                                        <button class="btn btn-dark btn-sm" onclick="minusItem('<?php echo $val['rowid'];?>')" id="minus-btn"><i class="fa fa-minus"></i></button>
                                    </div>
                                    <input type="text" id="qty_input" name="qty" class="form-control form-control-sm item_<?php echo $val['rowid'];?>" value="<?php echo $val['qty'];?>" min="1">
<!--                                    <input type="hidden"  name="rowid[]"  value="--><?php //echo $val['rowid'];?><!--" >-->
                                    <div class="input-group-prepend">
                                        <button class="btn btn-dark btn-sm" onclick="plusItem('<?php echo $val['rowid'];?>')" id="plus-btn"><i class="fa fa-plus"></i></button>
                                    </div>

                                </div>

                            </div>
                            <div class="input-group justify-content-center" >
                                <button class="btn btn-primary btn-sm" id="btn_<?php echo $val['rowid'];?>" style="display:none;" onclick="updateQty('<?php echo $val['rowid'];?>')">Update</button>
                            </div>
                        </td>
                        <td class="product-subtotal mo-text-center">
                            <span class="price"><?php echo currency_symbol($val['subtotal']);?></span>
                        </td>
                    </tr>
                <?php } ?>

                <tr>
                    <td colspan="4" style="border-right:0">
                        <form action="<?php echo base_url('checkout_coupon_action')?>" method="post">
                        <div class="d-flex coupon">
                            <input type="text" class="form-control w-auto rounded-0 me-1" name="coupon" placeholder="Coupon Code" required >
                            <input class="btn btn-dark rounded-0 px-4" type="submit" name="submit" value="Apply Coupon">
                        </div>
                        </form>
                    </td>
                    <td class="border-end-0 mo-text-center" style="text-align:left;">
                        <?php $disc = 0; if (isset(newSession()->coupon_discount)){ ?>
                        <span class="fs-4 ">Price</span><br>
                        <span class="fs-4 ">Discount</span><br>
                        <?php } ?>
                        <span class="fs-4 fw-bold">Total</span>
                    </td>
                    <td class="mo-text-center mo-amount" style="text-align:left; width: 170px">
                        <?php if (isset(newSession()->coupon_discount)){ $disc = round((Cart()->total() *newSession()->coupon_discount)/100); ?>
                        <span class=" fs-4"><?php echo currency_symbol(Cart()->total()) ?></span><br>
                        <span class=" fs-4"><?php echo currency_symbol($disc) ?></span><br>
                        <?php } $total = (isset(newSession()->coupon_discount))?Cart()->total() - $disc:Cart()->total();?>
                        <span class="fw-bold fs-4"><?php echo currency_symbol($total) ?></span>
                    </td>
                </tr>

                </tbody>
            </table>
            <?php if (!empty(Cart()->contents())){ ?>
            <p class="text-end"><a href="<?php echo base_url('checkout')?>" class="btn btn-dark rounded-0 px-4 btn-checkout">Proceed to checkout</a></p>
            <?php } ?>
        </div>
    </div>
</section>