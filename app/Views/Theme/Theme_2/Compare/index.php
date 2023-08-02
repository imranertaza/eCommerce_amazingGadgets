<section class="main-container">
    <div class="container">
        <h1 class="page-title mb-3">Compare Products</h1>
        <div class="card p-3 rounded-0">
<!--            <p class="text-end"><a href="#">Print This Page</a></p>-->
            <?php if (!empty($products)){ ?>
                <div class="table-responsive">
            <table class="table table-bordered table-hover" id="compReload">
                <tr>
                    <th style="width: 40%;"></th>
                    <?php foreach ($products as $key => $pro){ ?>
                    <td class="text-end" style="width: 30%;"><a href="javascript:void(0)" onclick="removeToCompare(<?php echo $key ?>)"><i class="fa-solid fa-close"></i></a></td>
                    <?php } ?>

                </tr>


                <tr>
                    <th></th>
                    <?php foreach ($products as $pro){ ?>
                    <td>
                        <p><?php echo image_view('uploads/products',$pro->product_id,'191_'.$pro->image,'noimage.png','img-fluid')?></p>
                        <p><a href="<?php echo base_url('detail/'.$pro->product_id)?>"><?php echo $pro->name;?></a></p>
                        <div class="">
                            <span><?php $spPric = get_data_by_id('special_price','cc_product_special','product_id',$pro->product_id);  if (empty($spPric)){ ?>
                                    <?php echo currency_symbol($pro->price);?>
                                <?php }else{ ?>
                                    <small class="off-price" > <del><?php echo currency_symbol($pro->price);?></del></small> <?php echo currency_symbol($spPric);?>
                                                <?php } ?></span><br>
                            <span>
                                    <?php echo product_id_by_rating($pro->product_id,'1');?>
                                </span>
                        </div>
                        <p><?php echo addToCartBtn($pro->product_id);?></p>
                    </td>
                    <?php } ?>
                </tr>
                <tr>
                    <th>Model</th>
                    <?php foreach ($products as $pro){ ?>
                    <td><?php echo $pro->model; ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <th>Brand</th>
                    <?php foreach ($products as $pro){ ?>
                        <td><?php echo get_data_by_id('name','cc_brand','brand_id',$pro->brand_id); ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <th>Description</th>
                    <?php foreach ($products as $pro){ ?>
                        <td><?php echo get_data_by_id('description','cc_product_description','product_id',$pro->product_id); ?></td>
                    <?php } ?>
                </tr>
                <tr>
                    <th>Specification</th>
                    <?php foreach ($products as $pro){ ?>
                        <td>
                            <?php $attb = attribute_array_by_product_id($pro->product_id); foreach ($attb as $at){?>
                            <p><b><?php echo get_data_by_id('name','cc_product_attribute_group','attribute_group_id',$at->attribute_group_id)?></b> : <?php echo $at->name;?></p>
                            <?php } ?>
                        </td>
                    <?php } ?>
                </tr>
            </table>
            </div>
            <?php } ?>
        </div>

    </div>
</section>