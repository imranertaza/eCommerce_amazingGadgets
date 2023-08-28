<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Modules Settings List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Modules Settings List</li>
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
                        <h3 class="card-title">Modules Settings List</h3>
                    </div>
                    <div class="col-md-4 text-right"></div>
                    <div class="col-md-12" style="margin-top: 10px" id="message">
                        <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message');
                        endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('module_settings_action') ?>" method="post">
                    <div class="row">
                        <?php foreach ($modulesSettings as $val) { ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo $val->title; ?></label>
                                <select name="label[]" class="form-control">
                                    <option value="1" <?php echo ($val->value == '1') ? 'selected' : ''; ?>>Active
                                    </option>
                                    <option value="0" <?php echo ($val->value == '0') ? 'selected' : ''; ?>>Inactive
                                    </option>
                                </select>
                                <input type="hidden" name="id[]" value="<?php echo $val->module_settings_id; ?>"
                                    required>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-12">
                            <input type="hidden" name="module_id" value="<?php echo $module_id; ?>" required>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?php echo base_url('module')?>" type="button" class="btn btn-danger">Back</a>
                        </div>
                    </div>
                </form>


            </div>
            <!-- /.card-body -->
            <div class=" card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>