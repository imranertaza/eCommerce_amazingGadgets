<section class="main-container my-5">
    <div class="container">
        <div class="popular-category mb-5">
            <div class="card rounded-0 border-0 ">
                <div class="card-body  mb-5 p-0 ">
                    <div class="row">
                        <div class="col-md-12 px-5" id="message">
                            <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                        </div>

                        <div class="col-md-3 div-p" >
                            <div class="box-order d-flex justify-content-between" style="margin-top: -30px;">
                                <span class="mt-3 con-tit">Total Order</span>
                                <?php
                                    $all = 0;
                                    foreach ($order as $acVal){ $all++;}
                                ?>
                                <span class="amount-or"><?php echo $all;?></span>
                            </div>

                            <div class="box-order mt-2 d-flex justify-content-between">
                                <span class="mt-3 con-tit">Total Complete <br>Order</span>
                                <?php
                                $complete = 0;
                                foreach ($order as $acVal){
                                    $orderSt = order_id_by_status($acVal->order_id);
                                    if ($orderSt == 'Complete'){ $complete++; }
                                }
                                ?>
                                <span class="amount-or"><?php echo $complete;?></span>
                            </div>

                            <div class="box-order mt-2 d-flex justify-content-between">
                                <span class="mt-3 con-tit">Total Cancel <br>Order</span>
                                <?php
                                $canceled = 0;
                                foreach ($order as $acVal){
                                    $orderSt = order_id_by_status($acVal->order_id);
                                    if ($orderSt == 'Canceled'){ $canceled++; }
                                }
                                ?>
                                <span class="amount-or"><?php echo $canceled;?></span>
                            </div>
                        </div>
                        <div class="col-md-3 div-p" >
                            <h4 class="mt-4 ti-or-n">Join our mailing list.</h4>
                            <p class="mt-3 con-or">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <h4 class="ti-or-n">Newsletters</h4>
                            <p class="mt-3 con-or">You aren't subscribed to our newsletter.</p>
                            <?php $check = get_data_by_id('newsletter','cc_customer','customer_id',newSession()->cusUserId);?>
                            <div class="form-check">
                                <input class="form-check-input" onclick="subscription()" <?php echo ($check == 1)?'checked':'';?> type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label lab-st" for="flexCheckDefault">
                                    General Subscription
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 div-p" >
                            <h4 class="mt-4 ti-or-n">Change Password</h4>
                            <form action="<?php echo base_url('password_action_update')?>" method="post">
                            <div class="mb-3 mt-3">
                                <input type="password" name="current_password" class="form-control con-or text-center" placeholder="Current Password*" required >
                            </div>
                            <div class="mb-3">
                                <input type="password" name="new_password" class="form-control con-or text-center"  placeholder="New Password*" required >
                            </div>
                            <div class="mb-3">
                                <input type="password" name="confirm_password"  class="form-control con-or text-center" placeholder="Confirm Password*" required >
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn bg-dark text-white w-100" >Update</button>
                            </div>
                            </form>
                        </div>
                        <div class="col-md-3 div-p" >
                            <center><h4 class="mt-4 ti-or-n">Recent Order</h4></center>
                            <table class="table table-borderless table-responsive">
                                <tbody>
                                <?php foreach ($orderItem as $item){ ?>
                                    <tr>
                                        <td><?php
                                            $img = get_data_by_id('image','cc_products','product_id',$item->product_id);
                                            echo image_view('uploads/products',$item->product_id,'100_'.$img,'noimage.png','');
                                            ?>

                                        </td>
                                        <td>
                                            <p class="p-date"><?php echo invoiceDateFormat($item->createdDtm);?></p>
                                            <span class="p-sty"><?php echo get_data_by_id('name','cc_products','product_id',$item->product_id);;?></span>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>