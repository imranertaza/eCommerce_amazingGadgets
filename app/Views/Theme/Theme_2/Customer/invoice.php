<section class="main-container my-5" >
    <div class="container">
        <div class="cart border p-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <?php $logoImg = get_lebel_by_value_in_theme_settings('side_logo');
                            echo image_view('uploads/logo','',$logoImg,'noimage.png','img-fluid');?>
                        </div>
                        <div class="address">
                            <div class="icon float-start">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20" fill="none">
                                    <path d="M8 10C8.55 10 9.021 9.804 9.413 9.412C9.80433 9.02067 10 8.55 10 8C10 7.45 9.80433 6.979 9.413 6.587C9.021 6.19567 8.55 6 8 6C7.45 6 6.97933 6.19567 6.588 6.587C6.196 6.979 6 7.45 6 8C6 8.55 6.196 9.02067 6.588 9.412C6.97933 9.804 7.45 10 8 10ZM8 17.35C10.0333 15.4833 11.5417 13.7873 12.525 12.262C13.5083 10.7373 14 9.38333 14 8.2C14 6.38333 13.4207 4.89567 12.262 3.737C11.104 2.579 9.68333 2 8 2C6.31667 2 4.89567 2.579 3.737 3.737C2.579 4.89567 2 6.38333 2 8.2C2 9.38333 2.49167 10.7373 3.475 12.262C4.45833 13.7873 5.96667 15.4833 8 17.35ZM8 20C5.31667 17.7167 3.31267 15.5957 1.988 13.637C0.662666 11.679 0 9.86667 0 8.2C0 5.7 0.804333 3.70833 2.413 2.225C4.021 0.741667 5.88333 0 8 0C10.1167 0 11.979 0.741667 13.587 2.225C15.1957 3.70833 16 5.7 16 8.2C16 9.86667 15.3377 11.679 14.013 13.637C12.6877 15.5957 10.6833 17.7167 8 20Z" fill="#939393"/>
                                </svg>
                            </div>
                            <div class="address float-start ms-2" >
                                <span><strong>Bangladesh office:</strong> <br><?php echo get_lebel_by_value_in_settings('address');?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="inv-detail bg-custom-color text-white rounded position-relative" style="line-height: 16px!important;">
                        <div class="row p-4">
                            <div class="col-md-8 ">
                                <p class="fw-bold">Invoice Number</p>
                                <p>#<?php echo $order->order_id;?></p>
                                <p>Issued date: <?php echo invoiceDateFormat($order->createdDtm);?></p>
                            </div>
                            <div class="col-md-2 text-capitalize ">
                                <p class="fw-bold">Bill to</p>
                                <p><?php echo $order->payment_firstname .' '.$order->payment_lastname;?></p>
                                <p><?php echo $order->payment_phone;?></p>
                                <p><?php echo $order->payment_address_1;?></p>
                            </div>
                            <div class="col-md-2 text-capitalize">
                                <p class="fw-bold">Ship to</p>
                                <p><?php echo $order->shipping_firstname .' '.$order->shipping_lastname;?></p>
                                <p><?php echo $order->shipping_phone;?></p>
                                <p><?php echo $order->shipping_address_1;?></p>
                            </div>
                        </div>
                        <?php
                            $status = order_id_by_status($order->order_id);

                            $bacColor = 'bg-danger';
                            $titleS = 'Unpaid';
                            $pad ='padding:35px 20px;';
                            if ($status == 'Complete'){
                                $bacColor = 'bg-success';
                                $titleS = 'Paid';
                                $pad ='padding: 35px 28px;';
                            }


                        ?>
                        <div class="round <?php echo $bacColor;?> bd-placeholder-img rounded-circle position-absolute " width="75" height="75" style="<?php echo $pad;?>">
                            <span><?php echo $titleS;?></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="table-responsive">
                        <table class="table table-borderless table-responsive">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($orderItem as $item){ ?>
                                <tr>
                                    <td width="700">
                                        <div class="img-table" style="width:12%; float:left;">
                                        <?php
                                        $img = get_data_by_id('image','cc_products','product_id',$item->product_id);
                                        echo image_view('uploads/products',$item->product_id,'100_'.$img,'noimage.png','');
                                        ?>
                                        </div>
                                        <div class="img-text" style="width:88%;float:left;">
                                        <?php echo get_data_by_id('name','cc_products','product_id',$item->product_id) ;?>
                                            <br>
                                        <?php
                                            $orOption = order_iten_id_by_order_options($item->order_item);
                                            if (!empty($orOption)){
                                            foreach ($orOption as $op){ ?>
                                                <?php
                                                $firstCar =  mb_substr($op->value, 0, 1); $length = strlen($op->value);
                                                $isColor = (($firstCar == '#') && ($length == 7))?'':$op->value;
                                                $style = empty($isColor)?"background-color: $op->value;padding: 13px 14px; border: unset;":"padding: 0px 4px;";
                                                ?>
                                            <span><?php echo $op->name?> :</span>
                                            <label class="btn btn-outline-secondary"  style="<?php echo $style;?> border-radius: unset; margin-left:8px; " ><?php echo !empty($isColor)?$op->value:'';?></label>

                                        <?php } } ?>

                                        </div>
                                    </td>
                                    <td><?php echo currency_symbol($item->price);?></td>
                                    <td><?php echo $item->quantity;?></td>
                                    <td><?php echo currency_symbol($item->final_price);?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4"><hr></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end pe-5 fw-bold">Sub Total</td>
                                    <td class="fw-bold"><?php echo currency_symbol($order->total);?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end pe-5 ">Discount</td>
                                    <td><?php echo currency_symbol($order->discount);?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end pe-5 ">Shipping</td>
                                    <td><?php echo currency_symbol($order->shipping_charge);?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="3"><hr></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end pe-5 fw-bold">Total Amount</td>
                                    <td class="fw-bold"><?php echo currency_symbol($order->final_amount);?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>