<section class="main-container">
    <div class="container">
        <div class="cart">
            <table class="cart-table w-100 text-center" id="tableReload">
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
                        <td class="product-remove">
                            <a href="javascript:void(0)" onclick="removeCart('<?php echo $val['rowid'];?>')" ><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                        <td class="product-thumbnail">
                            <a href="#">
                                <?php $img = get_data_by_id('image','products','product_id',$val['id']); ?>
                                <?php echo image_view('uploads/products',$val['id'],'100_'.$img,'noimage.png','img-fluid')?>
                            </a>
                        </td>
                        <td class="product-name text-start">
                            <a href="#"><?php echo $val['name'];?></a>
                        </td>

                        <td class="product-price">
                            <span class="price">$<?php echo $val['price'];?></span>
                        </td>

                        <td class="product-quantity">
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
                        <td class="product-subtotal">
                            <span class="price">$<?php echo $val['subtotal'];?></span>
                        </td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
            <p class="text-end"><a href="#" class="btn btn-dark rounded-0 px-4 btn-checkout">Proceed to checkout</a></p>
        </div>
    </div>
</section>