<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Color Family update</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active">Color Family update</li>
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
                        <h3 class="card-title">Color Family update</h3>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('color_family_update_action')?>" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Color Name</label>
                                <input type="text" name="color_name" class="form-control" placeholder="Color name" value="<?php echo $color->color_name?>" required>
                            </div>

                            <div class="form-group">
                                <label>Color Code</label>
                                <input type="text" name="code" class="form-control" placeholder="Color code" value="<?php echo $color->code?>" required>
                                <input type="hidden" name="color_family_id"  value="<?php echo $color->color_family_id?>" required>
                            </div>

                            <button class="btn btn-primary" >Update</button>
                            <a href="<?php echo base_url('color_family')?>" class="btn btn-danger" >Back</a>
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