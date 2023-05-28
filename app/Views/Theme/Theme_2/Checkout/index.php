<section class="main-container checkout" id="tableReload">
    <div class="container">
        <form action="<?php echo base_url('checkout_action') ?>" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <?php $isLoggedInCustomer = newSession()->isLoggedInCustomer;
                    if (!isset($isLoggedInCustomer) || $isLoggedInCustomer != TRUE) { ?>
                    <p><a class="btn bg-black w-100 text-white rounded-0" href="<?php echo base_url('login') ?>">Log In</a></p>
                    <p class="text-center">Or</p>
                    <div class="create-box mb-5">
                        <p class="mb-0"><label><input type="checkbox" onclick="user_create()" name="new_acc_create" id="createNew" value="0" > Check Mark the box
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
                                <label class="w-100" for="email">Email</label>
                                <input class="form-control rounded-0" type="email" name="payment_email" id="email"
                                       placeholder="Email" value="<?php echo isset($customer->email)?$customer->email:'';?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="w-100" for="phone">Phone</label>
                                <input class="form-control rounded-0" type="number" name="payment_phone" id="payment_phone"
                                       placeholder="Phone" value="<?php echo isset($customer->phone)?$customer->phone:'';?>" required>
                            </div>
                        </div>

                        <div class="row" id="regData"></div>


                        <?php
                        $coun = isset($customer->customer_id)?get_data_by_id('country_id','cc_address','customer_id',$customer->customer_id):'';
                        $zon = isset($customer->customer_id)?get_data_by_id('zone_id','cc_address','customer_id',$customer->customer_id):'';
                        $post = isset($customer->customer_id)?get_data_by_id('postcode','cc_address','customer_id',$customer->customer_id):'';
                        $add1 = isset($customer->customer_id)?get_data_by_id('address_1','cc_address','customer_id',$customer->customer_id):'';
                        $add2 = isset($customer->customer_id)?get_data_by_id('address_2','cc_address','customer_id',$customer->customer_id):'';
                        ?>


                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="w-100" for="phone">Country</label>
                                <select name="payment_country_id" class="form-control" onchange="selectState(this.value,'stateView')" required>
                                    <option value="" >Please select</option>

                                    <?php echo country($coun);?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="w-100" for="payment_city">District</label>
                                <select name="payment_city" class="form-control" onchange="shippingCharge()" id="stateView" required >
                                    <option value="" >Please select</option>
                                    <?php echo state_with_country($coun,$zon)?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label class="w-100" for="email">Post code</label>
                                <input class="form-control rounded-0" type="number" name="payment_postcode" id="payment_postcode"
                                       placeholder="Post code" value="<?php echo $post;?>" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label class="w-100" for="name">Address line 1*</label>
                                <input class="form-control rounded-0" type="text" name="payment_address_1"
                                       id="payment_address_1" placeholder="Address line 1" value="<?php echo $add1?>" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label class="w-100" for="name">Address line 2*</label>
                                <input class="form-control rounded-0" type="text" name="payment_address_2"
                                       id="payment_address_2" placeholder="Address line 2" value="<?php echo $add2?>" required>
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
                                    <label class="w-100" for="country">Country</label>
                                    <select name="shipping_country_id" class="form-control" onchange="selectState(this.value,'sh_stateView')" >
                                        <option value="" >Please select</option>
                                        <?php echo country('');?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label class="w-100" for="email">District</label>
                                    <select name="shipping_city" class="form-control" onchange="shippingCharge()"  id="sh_stateView"  >
                                        <option value="" >Please select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label class="w-100" for="email">Postcode</label>
                                    <input class="form-control rounded-0" type="number" name="shipping_postcode" id="shipping_postcode"
                                           placeholder="Shipping postcode">
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
                                    <?php echo image_view('uploads/products', $val['id'], '100_' . $img, 'noimage.png', 'img-fluid w-h-100s') ?>
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
                            <span><?php echo currency_symbol(Cart()->total()) ?></span>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span>Discount</span>
                            <?php $disc = 0;
                            if (isset(newSession()->coupon_discount)) {
                                $disc = round((Cart()->total() * newSession()->coupon_discount) / 100); ?>
                                <span><?php echo currency_symbol($disc) ?></span>
                            <?php }else{echo currency_symbol($disc); }
                            $total = (isset(newSession()->coupon_discount)) ? Cart()->total() - $disc : Cart()->total(); ?>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping Method</span>
                            <div class="d-flex flex-column text-end">
                                <?php foreach (get_all_data_array('cc_shipping_method') as $ship){ ?>
                                <span><label><?php echo $ship->name;?> <input type="radio" name="shipping_method" oninput="shippingCharge()" id="shipping_method" value="<?php echo $ship->code;?>" required></label></span>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <span>Shipping charge</span>
                            <span id="chargeShip"><?php echo currency_symbol(0)?></span>
                            <input type="hidden" name="shipping_charge" id="shipping_charge" >
                        </div>
                        <div class="total py-3 ">
                            <div class="d-flex justify-content-between fw-bold">
                                <span>Total</span>
                                <span id="total"><?php echo currency_symbol($total) ?></span>
                                <input type="hidden" id="totalamo" value="<?php echo $total ?>">
                            </div>
                        </div>
                    </div>
                    <div class="payment-method mt-5 mb-4 p-3">
                        <?php foreach (get_all_data_array('cc_payment_method') as $pay){ ?>
                        <p><label><input type="radio" name="payment_method" id="payment_method" value="<?php echo $pay->payment_method_id;?>" required> <?php echo $pay->name;?> </label></p>
                        <?php } ?>

                    </div>
                    <p>
                        <button type="submit" class="btn bg-black text-white w-100 rounded-0">Confirm Order</button>
                    </p>
                </div>
            </div>
        </form>
    </div>
</section>