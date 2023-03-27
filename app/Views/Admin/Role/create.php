<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Role create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active">Role create</li>
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
                        <h3 class="card-title">Role create</h3>
                    </div>
                    <div class="col-md-4">
                        <!--                        <a href="--><?php //echo base_url('Admin/Brand')?><!--" class="btn btn-primary btn-block ">Add</a>-->
                    </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('role_create_action')?>" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Role Name</label>
                                <input type="text" name="role" class="form-control" placeholder="Role name" required>
                            </div>

                            <div class="form-group">
                                <label for="varchar">Permission</label>
                                <ol>
                                    <?php foreach ($permission as $key => $value) { ?>
                                        <li><?php echo $key; ?>
                                            <?php foreach ($value as $k=>$v) {
//                                                        $isChecked = ($v == 1) ? 'checked="checked"' : '';
                                                $isChecked = ($v == 1) ? '' : ''; ?>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" <?php echo $isChecked; ?> name="permission[<?php print $key; ?>][<?php print $k; ?>]" value="1" > <?php echo $k ?></label>
                                                </div>

                                            <?php } ?>
                                        </li>
                                    <?php } ?>
                                </ol>
                            </div>

                            <button class="btn btn-primary" >Create</button>
                            <a href="<?php echo base_url('role')?>" class="btn btn-danger" >Back</a>
                        </div>
                        <div class="col-md-6"></div>
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