<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Weight Shipping Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active">Weight Shipping Settings</li>
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
                        <h3 class="card-title">Weight Shipping Settings</h3>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('shipping_update_action')?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="1" <?php echo ($shipping_status == '1')?'selected':'';?> >Active</option>
                                    <option value="0" <?php echo ($shipping_status == '0')?'selected':'';?> >Inactive</option>
                                </select>
                            </div>
                        </div>
                        <?php foreach ($shipping as $val){ ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo $val->title;?></label>
                                <input type="text" name="label[]" class="form-control" placeholder="Value" value="<?php echo $val->value;?>" required>
                                <input type="hidden" name="id[]" value="<?php echo $val->settings_id;?>" required>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-primary btn-sm" onclick="add_option_weight()"  style="float: right;">Add</a>
                                    <h5>Set value</h5>
                                </div>
                            </div>
                            <div id="new_chq">
                                <?php foreach ($extra_settingd as $key => $val){ ?>
                                    <div class="row" id="new_<?php echo $key ?>"><div class='col-md-5'><label>Weight</label><br><input type='text' name='weight_label[]'  class='form-control' value="<?php echo $val->label;?>"></div><div class='col-md-5'><label>Amount</label><br><input type='text' name='weight_value[]'  class='form-control' value="<?php echo $val->value;?>"><input type="hidden" name="weight_id[]" value="<?php echo $val->settings_id;?>"> </div><div class='col-md-2'><a href='javascript:void(0)' onclick='remove_weight(this),remove_data_weight(<?php echo $val->settings_id;?>)' class='btn btn-sm btn-danger' style='margin-top: 34px;'>X</a></div></div>
                                <?php } ?>
                            </div>
                            <input type="hidden" id="total_chq" value="<?php echo (!empty($extra_settingd))?count($extra_settingd):'1';?>">
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary" >Update</button>
                            <input type="hidden" name="shipping_method_id" value="<?php echo $shipping_method_id;?>" required>
                            <a href="<?php echo base_url('shipping')?>" class="btn btn-danger" >Back</a>
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