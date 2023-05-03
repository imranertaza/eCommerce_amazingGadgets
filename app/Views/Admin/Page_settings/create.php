<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Page create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active">Page create</li>
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
                        <h3 class="card-title">Page create</h3>
                    </div>
                    <div class="col-md-4"> </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('page_create_action')?>" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Page Title <span class="requi">*</span></label>
                                <input type="text" name="page_title" oninput="page_slug(this.value)" class="form-control" placeholder="Page Title" required>
                            </div>

                            <div class="form-group">
                                <label>Slug <span class="requi">*</span></label>
                                <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug" required>
                            </div>

                            <div class="form-group">
                                <label>Template</label>
                                <select name="temp" class="form-control">
                                    <option value="">Please select</option>
                                    <?php echo available_template('');?>
                                </select>
                            </div>



                            <button class="btn btn-primary" >Create</button>
                            <a href="<?php echo base_url('page_list')?>" class="btn btn-danger" >Back</a>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea name="short_des" class="form-control" placeholder="Short Description" ></textarea>
                            </div>

                            <div class="form-group">
                                <label>Page Description</label>
                                <textarea name="page_description" id="editor" rows="4" class="form-control" placeholder="Page Description" ></textarea>
                            </div>

<!--                            <div class="form-group">-->
<!--                                <label>Image</label>-->
<!--                                <input type="file" name="f_image" class="form-control" placeholder="image" >-->
<!--                            </div>-->
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