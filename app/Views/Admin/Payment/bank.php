<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bank Transfer Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active">Bank Transfer Settings</li>
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
                        <h3 class="card-title">Bank Transfer Settings</h3>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('bank_transfer_update_action')?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="1" <?php echo ($payment->status == '1')?'selected':'';?>>Active</option>
                                    <option value="0" <?php echo ($payment->status == '0')?'selected':'';?>>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image" >
                        </div>
                        <?php foreach ($payment_settings as $val){ ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $val->title;?></label>
                                    <textarea name="label[]" rows="5" class="form-control" required><?php echo $val->value;?></textarea>
                                    <input type="hidden" name="id[]" value="<?php echo $val->settings_id;?>" required>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="col-md-12">
                            <button class="btn btn-primary" >Update</button>
                            <input type="hidden" name="payment_method_id" value="<?php echo $payment_method_id;?>" required>
                            <a href="<?php echo base_url('payment')?>" class="btn btn-danger" >Back</a>
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