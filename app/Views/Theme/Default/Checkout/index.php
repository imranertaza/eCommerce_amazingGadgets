<section class="main-container checkout" id="tableReload">
    <div class="container">
        <form action="<?php echo base_url('checkout_action') ?>" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <?php $isLoggedInCustomer = newSession()->isLoggedInCustomer;
                    if (!isset($isLoggedInCustomer) || $isLoggedInCustomer != TRUE) { ?>
                    <p><a class="btn bg-black w-100 text-white rounded-0" href="#">Log In</a></p>
                    <p class="text-center">Or</p>
                    <div class="create-box mb-5">
                        <p class="mb-0"><label><input type="checkbox" name="create" id="createNew"> Check Mark the box
                                for create an account</label></p>
                        <p class="ms-3 lh-sm"><small>By creating an account you will be able to make quick purchases
                                later and see details about all orders</small></p>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="w-100" for="name">First Name</label>
                                <input class="form-control rounded-0" type="text" name="payment_firstname" id="name"
                                       placeholder="First Name" value="<?php echo isset($customer->firstname)?$customer->firstname:'';?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="w-100" for="name">Last Name</label>
                                <input class="form-control rounded-0" type="text" name="payment_lastname" id="payment_lastname"
                                       placeholder="Last Name" value="<?php echo isset($customer->lastname)?$customer->lastname:'';?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="w-100" for="phone">Phone</label>
                                <input class="form-control rounded-0" type="number" name="payment_phone" id="payment_phone"
                                       placeholder="Phone" value="<?php echo isset($customer->phone)?$customer->phone:'';?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="w-100" for="email">Email</label>
                                <input class="form-control rounded-0" type="email" name="payment_email" id="email"
                                       placeholder="Email" value="<?php echo isset($customer->email)?$customer->email:'';?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="w-100" for="phone">Country</label>
                                <select name="payment_country_id" class="form-control" onchange="selectState(this.value,'stateView')" required>
                                    <option value="" >Please select</option>
                                    <?php $cou = isset($customer->email)?$customer->email:'';?>
                                    <?php echo country('');?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="w-100" for="payment_city">District</label>
                                <select name="payment_city" class="form-control" id="stateView" required >
                                    <option value="" >Please select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label class="w-100" for="name">Address line 1*</label>
                                <input class="form-control rounded-0" type="text" name="payment_address_1"
                                       id="payment_address_1" placeholder="Address line 1" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label class="w-100" for="name">Address line 2*</label>
                                <input class="form-control rounded-0" type="text" name="payment_address_2"
                                       id="payment_address_2" placeholder="Address line 2" required>
                            </div>
                        </div>
                    </div>
                    <p class="mb-0"><label><input type="checkbox" name="shipping_else" id="shipping_else" onclick="shippingAddress()"> Product shipping address
                            elsewhere?</label></p>
                    <div id="shipping_address" class="mt-4" style="display: none;">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label class="w-100" for="name">First Name</label>
                                    <input class="form-control rounded-0" type="text" name="shipping_firstname" id="shipping_firstname"
                                           placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label class="w-100" for="name">Last Name</label>
                                    <input class="form-control rounded-0" type="text" name="shipping_lastname" id="shipping_lastname"
                                           placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label class="w-100" for="phone">Phone</label>
                                    <input class="form-control rounded-0" type="number" name="shipping_phone" id="shipping_phone"
                                           placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label class="w-100" for="email">Email</label>
                                    <input class="form-control rounded-0" type="email" name="shipping_email" id="shipping_email"
                                           placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label class="w-100" for="country">Country</label>
                                    <select name="	shipping_country_id" class="form-control" onchange="selectState(this.value,'sh_stateView')" required>
                                        <option value="" >Please select</option>
                                        <?php echo country('');?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label class="w-100" for="email">District</label>
                                    <select name="shipping_city" class="form-control" id="sh_stateView" required >
                                        <option value="" >Please select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-4">
                                    <label class="w-100" for="name">Address line 1*</label>
                                    <input class="form-control rounded-0" type="text" name="shipping_address_1"
                                           id="shipping_address_1" placeholder="Address line 1">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-4">
                                    <label class="w-100" for="name">Address line 2*</label>
                                    <input class="form-control rounded-0" type="text" name="shipping_address_2"
                                           id="shipping_address_2" placeholder="Address line 2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="checkout-items mb-4">
                        <?php foreach (Cart()->contents() as $val) { ?>
                            <div class="list-item d-flex gap-2 mb-2">
                                <div class="d-flex gap-2 bg-gray p-2 rounded-2">
                                    <?php
                                    $img = get_data_by_id('image', 'cc_products', 'product_id', $val['id']);
                                    $des = get_data_by_id('description', 'cc_product_description', 'product_id', $val['id']);
                                    ?>
                                    <?php echo image_view('uploads/products', $val['id'], '100_' . $img, 'noimage.png', 'img-fluid') ?>
                                    <div>
                                        <p class="fw-semibold mb-2"><?php echo $val['name']; ?></p>
                                        <p class="lh-sm"><small><?php echo substr($des, 0, 80) ?></small></p>
                                    </div>
                                </div>
                                <div class="list-item-qty text-center bg-gray p-1 py-3 rounded-2 align-items-center d-flex flex-column">
                                    <button class="btn btn-sm w-100 p-0"
                                            onclick="plusItem('<?php echo $val['rowid']; ?>')" id="minus-btn"><i
                                                class="fa fa-plus"></i></button>
                                    <input type="text" id="qty_input" name="qty"
                                           class="border-0 text-center item_<?php echo $val['rowid']; ?>"
                                           value="<?php echo $val['qty']; ?>" min="1" style="width:45px">
                                    <button class="btn btn-sm w-100 p-0"
                                            onclick="minusItem('<?php echo $val['rowid']; ?>')" id="plus-btn"><i
                                                class="fa fa-minus"></i></button>

                                    <button class="btn btn-primary btn-sm" id="btn_<?php echo $val['rowid']; ?>"
                                            style="display:none;" onclick="updateQty('<?php echo $val['rowid']; ?>')">
                                        Update
                                    </button>
                                </div>
                                <div class="remove bg-gray px-3 py-2 rounded-2 align-items-center d-flex">
                                    <a href="javascript:void(0)" onclick="removeCart('<?php echo $val['rowid']; ?>')"><i
                                                class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="summery">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Price</span>
                            <span><?php echo Cart()->total() ?>tk</span>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span>Discount</span>
                            <?php $disc = 0;
                            if (isset(newSession()->coupon_discount)) {
                                $disc = round((Cart()->total() * newSession()->coupon_discount) / 100); ?>
                                <span><?php echo $disc ?>tk</span>
                            <?php }
                            $total = (isset(newSession()->coupon_discount)) ? Cart()->total() - $disc : Cart()->total(); ?>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping Charge</span>
                            <div class="d-flex flex-column text-end">
                                <span><label>Home delivery 50tk <input type="radio" name="shipping_method"
                                                                       id="shipping_method"></label></span>
                                <span><label>Courier 70tk <input type="radio" name="shipping_method"
                                                                 id="shipping_method"></label></span>
                            </div>
                        </div>
                        <div class="total py-3 mt-3">
                            <div class="d-flex justify-content-between fw-bold">
                                <span>Total</span>
                                <span><?php echo $total ?>tk</span>
                            </div>
                        </div>
                    </div>
                    <div class="payment-method mt-5 mb-4 p-3">
                        <p><label><input type="radio" name="payment_method" id="payment_method"> Cash on delivery
                                <small>(Cash to be paid after product delivery.)</small></label></p>
                        <p><label><input type="radio" name="payment_method" id="payment_method"> <img
                                        src="assets/img/ssl-commerz.png" alt=""></label></p>
                    </div>
                    <p>
                        <button type="submit" class="btn bg-black text-white w-100 rounded-0">Confirm Order</button>
                    </p>
                </div>
            </div>
        </form>
    </div>
</section>