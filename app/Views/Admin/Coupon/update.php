<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Coupon update</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active">Coupon update</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title">Coupon update</h3>
                    </div>
                    <div class="col-md-4"> </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('coupon_update_action')?>" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="name" value="<?php echo $coupon->name?>" required>
                            </div>

                            <div class="form-group">
                                <label>Code</label>
                                <input type="text" name="code" class="form-control" placeholder="Code" value="<?php echo $coupon->code?>" required>
                            </div>

                            <div class="form-group">
                                <label>Discount On</label>
                                <select name="discount_on" class="form-control" >
                                    <option value="Product" <?php echo ($coupon->discount_on == 'Product')?'selected':''; ?> >Product</option>
                                    <option value="Shipping" <?php echo ($coupon->discount_on == 'Shipping')?'selected':''; ?> >Shipping</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Discount</label>
                                <input type="text" name="discount" class="form-control" placeholder="Discount" value="<?php echo $coupon->discount?>" required>
                            </div>

                            <div class="form-group">
                                <label>Total Useable</label>
                                <input type="text" name="total_useable" class="form-control" placeholder="Total Useable" value="<?php echo $coupon->total_useable?>" required>
                            </div>

                            <input type="hidden" name="coupon_id" value="<?php echo $coupon->coupon_id;?>"  required>
                            <button class="btn btn-primary" >update</button>
                            <a href="<?php echo base_url('coupon')?>" class="btn btn-danger" >Back</a>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Subscribed User</label>
                                <select name="for_subscribed_user" class="form-control" >
                                    <?php echo globalStatus($coupon->for_subscribed_user);?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Registered User</label>
                                <select name="for_registered_user" class="form-control" >
                                    <?php echo globalStatus($coupon->for_registered_user);?>
                                </select>
                            </div>



                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="date" name="date_start" class="form-control" value="<?php echo $coupon->date_start;?>" required>
                            </div>
                            <div class="form-group">
                                <label>End Date</label>
                                <input type="date" name="date_end" class="form-control" value="<?php echo $coupon->date_end;?>"  required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>