<section class="main-container checkout" id="tableReload">
    <div class="container">
        <form action="<?php echo base_url('checkout_action') ?>" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <?php $isLoggedInCustomer = newSession()->isLoggedInCustomer;
                    if (!isset($isLoggedInCustomer) || $isLoggedInCustomer != TRUE) { ?>
                    <p><a class="btn bg-custom-color w-100 text-white rounded-0" href="<?php echo base_url('login') ?>">Log In</a></p>
                    <p class="text-center pd-te-ch">Or</p>
                    <div class="create-box mb-5 ">
                        <div>
                        <p class="mb-0"><label><input type="checkbox" onclick="user_create()" name="new_acc_create" id="createNew" value="0" > Check Mark the box
                                for create an account</label></p>
                        <p class="ms-3 lh-sm"><small>By creating an account you will be able to make quick purchases
                                later and see details about all orders</small></p>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="check-title">billing and shipping address</p>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="w-100" for="name">First Name</label>
                                <input class="form-control rounded-0" id="fname1" oninput="livename1View(this.value,'namVal')" type="text" name="payment_firstname" id="name"
                                       placeholder="First Name" value="<?php echo isset($customer->firstname)?$customer->firstname:'';?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="w-100" for="name">Last Name</label>
                                <input class="form-control rounded-0" id="lname1" oninput="livename1View(this.value,'namVal')" type="text" name="payment_lastname" id="payment_lastname"
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
                                <input class="form-control rounded-0" oninput="liveTextView(this.value,'phoneVal')" type="number" name="payment_phone" id="payment_phone"
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
                                <select name="payment_country_id" class="form-control" onchange="selectState(this.value,'stateView'),liveView(this,'counVal')" required>
                                    <option value="" >Please select</option>

                                    <?php echo country($coun);?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="w-100" for="payment_city">District</label>
                                <select name="payment_city" class="form-control" onchange="shippingCharge(),liveView(this,'zonVal')" id="stateView" required >
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
                                <input class="form-control rounded-0" oninput="liveTextView(this.value,'add1Val')" type="text" name="payment_address_1"
                                       id="payment_address_1" placeholder="Address line 1" value="<?php echo $add1?>" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label class="w-100" for="name">Address line 2*</label>
                                <input class="form-control rounded-0" oninput="liveTextView(this.value,'add2Val')" type="text" name="payment_address_2"
                                       id="payment_address_2" placeholder="Address line 2" value="<?php echo $add2?>" required>
                            </div>
                        </div>
                    </div>

                    <p class="mb-4"><label class="btn bg-custom-color text-white w-100 rounded-0 " ><input type="checkbox" class="btn-check" name="shipping_else" id="shipping_else" onclick="shippingAddress()">
                            <svg style="margin-bottom: 3px; margin-right: 5px;" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                                <g clip-path="url(#clip0_1425_12145)">
                                    <path d="M12.6458 0.645917C12.6923 0.599354 12.7474 0.562411 12.8082 0.537205C12.8689 0.511998 12.934 0.499023 12.9998 0.499023C13.0656 0.499023 13.1307 0.511998 13.1914 0.537205C13.2522 0.562411 13.3074 0.599354 13.3538 0.645917L16.3538 3.64592C16.4004 3.69236 16.4373 3.74754 16.4625 3.80828C16.4877 3.86903 16.5007 3.93415 16.5007 3.99992C16.5007 4.06568 16.4877 4.13081 16.4625 4.19155C16.4373 4.2523 16.4004 4.30747 16.3538 4.35392L6.35381 14.3539C6.30582 14.4016 6.24867 14.439 6.18581 14.4639L1.18581 16.4639C1.09494 16.5003 0.995402 16.5092 0.899526 16.4895C0.803649 16.4699 0.715653 16.4225 0.646447 16.3533C0.57724 16.2841 0.529867 16.1961 0.510199 16.1002C0.490532 16.0043 0.499435 15.9048 0.535806 15.8139L2.53581 10.8139C2.56073 10.7511 2.59816 10.6939 2.64581 10.6459L12.6458 0.645917ZM11.7068 2.99992L13.9998 5.29292L15.2928 3.99992L12.9998 1.70692L11.7068 2.99992ZM13.2928 5.99992L10.9998 3.70692L4.49981 10.2069V10.4999H4.99981C5.13241 10.4999 5.25959 10.5526 5.35336 10.6464C5.44713 10.7401 5.49981 10.8673 5.49981 10.9999V11.4999H5.99981C6.13241 11.4999 6.25959 11.5526 6.35336 11.6464C6.44713 11.7401 6.49981 11.8673 6.49981 11.9999V12.4999H6.79281L13.2928 5.99992ZM3.53181 11.1749L3.42581 11.2809L1.89781 15.1019L5.71881 13.5739L5.82481 13.4679C5.72943 13.4323 5.6472 13.3684 5.58912 13.2847C5.53104 13.2011 5.49988 13.1017 5.49981 12.9999V12.4999H4.99981C4.8672 12.4999 4.74002 12.4472 4.64625 12.3535C4.55248 12.2597 4.49981 12.1325 4.49981 11.9999V11.4999H3.99981C3.89799 11.4998 3.79862 11.4687 3.71498 11.4106C3.63135 11.3525 3.56744 11.2703 3.53181 11.1749Z" fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_1425_12145">
                                        <rect width="16" height="16" fill="white" transform="translate(0.5 0.5)"/>
                                    </clipPath>
                                </defs>
                            </svg>

                            Product shipping address elsewhere?

                            <svg id="shippingicon2" style="transition: width 2s ease 0s, height 2s ease 0s, transform 0.2s ease 0s;" xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.75 14L10.25 9.5L5.75 5L7.25 3.5L13.25 9.5L7.25 15.5L5.75 14Z" fill="white"/>
                            </svg>

                        </label></p>


                    <div id="shipping_address" class="mt-4" style="display: none;">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label class="w-100" for="name">First Name</label>
                                    <input class="form-control rounded-0" id="fname" oninput="livenameView(this.value,'namVal')" type="text" name="shipping_firstname" id="shipping_firstname"
                                           placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label class="w-100" for="name">Last Name</label>
                                    <input class="form-control rounded-0" id="lname" oninput="livenameView(this.value,'namVal')" type="text" name="shipping_lastname" id="shipping_lastname"
                                           placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label class="w-100" for="phone">Phone</label>
                                    <input class="form-control rounded-0" oninput="liveTextView(this.value,'phoneVal')" type="number" name="shipping_phone" id="shipping_phone"
                                           placeholder="Phone">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label class="w-100" for="country">Country</label>
                                    <select name="shipping_country_id" class="form-control" onchange="selectState(this.value,'sh_stateView'),liveView(this,'counVal')" >
                                        <option value="" >Please select</option>
                                        <?php echo country('');?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label class="w-100" for="email">District</label>
                                    <select name="shipping_city" o class="form-control" onchange="shippingCharge(),liveView(this,'zonVal')"  id="sh_stateView"  >
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
                                    <input class="form-control rounded-0" oninput="liveTextView(this.value,'add1Val')" type="text" name="shipping_address_1"
                                           id="shipping_address_1" placeholder="Address line 1">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-4">
                                    <label class="w-100" for="name">Address line 2*</label>
                                    <input class="form-control rounded-0" oninput="liveTextView(this.value,'add2Val')" type="text" name="shipping_address_2"
                                           id="shipping_address_2" placeholder="Address line 2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="title-checkout">
                        <label class="btn bg-custom-color text-white w-100 rounded-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="22" viewBox="0 0 16 22" fill="none">
                                <path d="M13.9583 3.66699H2.04167C1.53541 3.66699 1.125 4.0774 1.125 4.58366V19.2503C1.125 19.7566 1.53541 20.167 2.04167 20.167H13.9583C14.4646 20.167 14.875 19.7566 14.875 19.2503V4.58366C14.875 4.0774 14.4646 3.66699 13.9583 3.66699Z" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                                <path d="M5.24967 1.8335V4.5835M10.7497 1.8335V4.5835M4.33301 8.7085H11.6663M4.33301 12.3752H9.83301M4.33301 16.0418H7.99967" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg> <span class="text-label">Order Summary</span></label>
                    </div>
                    <div class="checkout-items mb-4">

                        <?php foreach (Cart()->contents() as $val) { ?>
                            <div class="list-item d-flex gap-2 mb-2">
                                <div class="d-flex gap-2 bg-gray p-2 rounded-2 pro-bg-check">
                                    <?php
                                    $img = get_data_by_id('image', 'cc_products', 'product_id', $val['id']);
                                    $des = get_data_by_id('description', 'cc_product_description', 'product_id', $val['id']);
                                    ?>
                                    <?php echo image_view('uploads/products', $val['id'], '100_' . $img, 'noimage.png', 'img-fluid w-h-100') ?>
                                    <div>
                                        <p class="fw-semibold mb-2"><?php echo $val['name']; ?></p>
                                        <p class="lh-sm"><small><?php echo product_id_by_rating($val['id'],'1');?></small></p>
                                    </div>
                                </div>
                                <div class="list-item-qty text-center bg-gray p-1 py-3 rounded-2 align-items-center d-flex flex-column pro-bg-check">
                                    <button type="button" class="btn btn-sm w-100 p-0"
                                            onclick="plusItem('<?php echo $val['rowid']; ?>')" id="minus-btn"><i
                                                class="fa fa-plus"></i></button>
                                    <input type="text" id="qty_input" name="qty"
                                           class="border-0 text-center item_<?php echo $val['rowid']; ?>"
                                           value="<?php echo $val['qty']; ?>" min="1" style="width:45px">
                                    <button type="button" class="btn btn-sm w-100 p-0"
                                            onclick="minusItem('<?php echo $val['rowid']; ?>')" id="plus-btn"><i
                                                class="fa fa-minus"></i></button>

                                    <button class="btn bg-custom-color text-white btn-sm" id="btn_<?php echo $val['rowid']; ?>"
                                            style="display:none;" onclick="updateQty('<?php echo $val['rowid']; ?>')">
                                        Update
                                    </button>
                                </div>
                                <div class="remove bg-gray px-3 py-2 rounded-2 align-items-center d-flex pro-bg-check">
                                    <a href="javascript:void(0)" onclick="removeCart('<?php echo $val['rowid']; ?>')"><i
                                                class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </div>
                        <?php } ?>

                    </div>

                    <div class="summery ">
                        <div class="group-check mb-4">
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
                                <?php }else{ echo '<span>'.currency_symbol($disc).'</span>'; }
                                $total = (isset(newSession()->coupon_discount)) ? Cart()->total() - $disc : Cart()->total(); ?>
                            </div>
                        </div>

                        <div class="title-checkout">
                            <label class="btn bg-custom-color text-white w-100 rounded-0">
                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.83301 17.3333C2.04125 17.6235 2.31698 17.8585 2.6364 18.0182C2.95581 18.1779 3.3093 18.2575 3.66634 18.25C4.02338 18.2575 4.37687 18.1779 4.69629 18.0182C5.0157 17.8585 5.29143 17.6235 5.49967 17.3333C5.70791 17.0432 5.98365 16.8082 6.30306 16.6484C6.62248 16.4887 6.97597 16.4092 7.33301 16.4167C7.69005 16.4092 8.04354 16.4887 8.36295 16.6484C8.68237 16.8082 8.9581 17.0432 9.16634 17.3333C9.37458 17.6235 9.65031 17.8585 9.96973 18.0182C10.2891 18.1779 10.6426 18.2575 10.9997 18.25C11.3567 18.2575 11.7102 18.1779 12.0296 18.0182C12.349 17.8585 12.6248 17.6235 12.833 17.3333C13.0412 17.0432 13.317 16.8082 13.6364 16.6484C13.9558 16.4887 14.3093 16.4092 14.6663 16.4167C15.0234 16.4092 15.3769 16.4887 15.6963 16.6484C16.0157 16.8082 16.2914 17.0432 16.4997 17.3333C16.7079 17.6235 16.9836 17.8585 17.3031 18.0182C17.6225 18.1779 17.976 18.2575 18.333 18.25C18.69 18.2575 19.0435 18.1779 19.363 18.0182C19.6824 17.8585 19.9581 17.6235 20.1663 17.3333M3.66634 15.5L2.74967 10.9167H19.2497L17.4163 14.5833M4.58301 10.9167V5.41667H11.9163L15.583 10.9167M6.41634 5.41667V1.75H5.49967" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span class="text-label">Ship To</span></label>
                        </div>
                        <div class="group-check mb-4">
                            <p class="name-ch text-capitalize " id="namVal" ><?php echo isset($customer->firstname)?$customer->firstname:'';?> <?php echo isset($customer->lastname)?$customer->lastname:'';?></p>
                            <table class="mt-2 table table-borderless table-ship-add">
                                <tr>
                                    <td width="120">Country</td>
                                    <td id="counVal"><?php echo get_data_by_id('name','cc_country','country_id',$coun);?></td>
                                </tr>
                                <tr>
                                    <td width="120">District</td>
                                    <td id="zonVal"><?php echo get_data_by_id('name','cc_zone','zone_id',$zon);?></td>
                                </tr>
                                <tr>
                                    <td width="120">Address line 1</td>
                                    <td id="add1Val"><?php echo $add1;?></td>
                                </tr>
                                <tr>
                                    <td width="120">Address line 2</td>
                                    <td id="add2Val"><?php echo $add2;?></td>
                                </tr>
                                <tr>
                                    <td width="120">Contact</td>
                                    <td id="phoneVal"><?php echo isset($customer->phone)?$customer->phone:'';?></td>
                                </tr>
                            </table>
                        </div>



                        <div class="title-checkout">
                            <label class="btn bg-custom-color text-white w-100 rounded-0">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 4.125V5.5H13.0625V15.8125H8.83025C8.52362 14.6307 7.46075 13.75 6.1875 13.75C4.91425 13.75 3.85138 14.6307 3.54475 15.8125H2.75V12.375H1.375V17.1875H3.54475C3.85138 18.3693 4.91425 19.25 6.1875 19.25C7.46075 19.25 8.52362 18.3693 8.83025 17.1875H14.5448C14.8514 18.3693 15.9143 19.25 17.1875 19.25C18.4607 19.25 19.5236 18.3693 19.8302 17.1875H22V11.5802L21.9567 11.4723L20.5817 7.34731L20.4325 6.875H14.4375V4.125H0ZM0.6875 6.875V8.25H6.875V6.875H0.6875ZM14.4375 8.25H19.4432L20.625 11.7734V15.8125H19.8302C19.5236 14.6307 18.4607 13.75 17.1875 13.75C15.9143 13.75 14.8514 14.6307 14.5448 15.8125H14.4375V8.25ZM1.375 9.625V11H5.5V9.625H1.375ZM6.1875 15.125C6.95544 15.125 7.5625 15.7321 7.5625 16.5C7.5625 17.2679 6.95544 17.875 6.1875 17.875C5.41956 17.875 4.8125 17.2679 4.8125 16.5C4.8125 15.7321 5.41956 15.125 6.1875 15.125ZM17.1875 15.125C17.9554 15.125 18.5625 15.7321 18.5625 16.5C18.5625 17.2679 17.9554 17.875 17.1875 17.875C16.4196 17.875 15.8125 17.2679 15.8125 16.5C15.8125 15.7321 16.4196 15.125 17.1875 15.125Z" fill="white"/>
                                </svg>
                                <span class="text-label">Shipping Method</span></label>
                        </div>

                        <div class="group-check ">


                                <div class="d-flex flex-column">
                                    <?php foreach (get_all_data_array('cc_shipping_method') as $ship){ ?>
                                        <div class="d-flex justify-content-between mt-3"><div class="form-check"><label class="form-check-label"><input class="form-check-input" type="radio" name="shipping_method" oninput="shippingCharge()" id="shipping_method" value="<?php echo $ship->code;?>" required> <?php echo $ship->name;?></label></div></div>
                                    <?php } ?>
                                </div>

                            <div class="d-flex justify-content-between mt-3">
                                <span>Shipping charge</span>
                                <span id="chargeShip"><?php echo currency_symbol(0)?></span>
                                <input type="hidden" name="shipping_charge" id="shipping_charge" >
                            </div>
                        </div>

                        <div class="total py-3 group-check mb-4" style="border-top: unset !important;">
                            <div class="d-flex justify-content-between fw-bold">
                                <span>Total</span>
                                <span id="total"><?php echo currency_symbol($total) ?></span>
                                <input type="hidden" id="totalamo" value="<?php echo $total ?>">
                            </div>
                        </div>
                    </div>

                    <div class="title-checkout">
                        <label class="btn bg-custom-color text-white w-100 rounded-0">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.333 3.6665H3.66634C2.64884 3.6665 1.84217 4.48234 1.84217 5.49984L1.83301 16.4998C1.83301 17.5173 2.64884 18.3332 3.66634 18.3332H18.333C19.3505 18.3332 20.1663 17.5173 20.1663 16.4998V5.49984C20.1663 4.48234 19.3505 3.6665 18.333 3.6665ZM18.333 16.4998H3.66634V10.9998H18.333V16.4998ZM18.333 7.33317H3.66634V5.49984H18.333V7.33317Z" fill="white"/>
                            </svg>
                            <span class="text-label">Payment Method</span></label>
                    </div>
                    <div class="payment-method group-check mb-4 pb-4">
                        <?php foreach (get_all_data_array('cc_payment_method') as $pay){ ?>
                        <div class="d-flex justify-content-between mt-3"><div class="form-check"><label class="form-check-label"><input class="form-check-input" type="radio" name="payment_method" id="payment_method" value="<?php echo $pay->payment_method_id;?>" required> <?php echo !empty($pay->image)?$pay->image:$pay->name;?> </label></div></div>
                        <?php } ?>

                    </div>
                    <p>
                        <button type="submit" class="btn bg-custom-color text-white w-100 rounded-0">Confirm Order</button>
                    </p>
                </div>
            </div>
        </form>
    </div>
</section>