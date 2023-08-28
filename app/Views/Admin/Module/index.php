<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Modules List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Modules List</li>
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
                        <h3 class="card-title">Modules List</h3>
                    </div>
                    <div class="col-md-4 text-right"></div>
                    <div class="col-md-12" style="margin-top: 10px" id="message">
                        <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message');
                        endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($modules as $rows) {   ?>
                        <tr>
                            <td><?php print $rows->module_id; ?></td>
                            <td><?php print $rows->module_name; ?></td>
                            <td width="100">
                                <div class="custom-switch" style="display: initial;">
                                    <input type="checkbox" <?php echo ($rows->status == 1) ? 'checked' : '' ?>
                                        onchange="changeStatus(<?= $rows->module_id; ?>);" class="custom-control-input"
                                        id="custom_<?php print $rows->module_id; ?>">
                                    <label class="custom-control-label"
                                        for="custom_<?php print $rows->module_id; ?>"></label>
                                </div>
                                <?php
                                    $check = is_exists('cc_module_settings', 'module_id', $rows->module_id);
                                    if ($check == false) {
                                    ?>
                                <a href="<?php echo base_url('module_settings/' . $rows->module_id) ?>"
                                    class="btn btn-primary btn-xs"><i class="fas fa-cogs"></i> </a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>


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