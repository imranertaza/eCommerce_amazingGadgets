<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Category create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Product Category create</li>
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
                        <h3 class="card-title">Product Category create</h3>
                    </div>
                    <div class="col-md-4">
                        <!--                        <a href="--><?php //echo base_url('Admin/Brand')
                                                                ?>
                        <!--" class="btn btn-primary btn-block ">Add</a>-->
                    </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message');
                        endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('product_category_create_action') ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="category_name" class="form-control" placeholder="Category name"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>Main Category</label>
                                <select name="parent_id" class="form-control text-capitalize select2bs4">
                                    <option value="">Please select</option>
                                    <?php foreach ($category as $cat) { ?>
                                    <option value="<?php echo $cat->prod_cat_id ?>">
                                        <?php
                                            $main_cat = (!empty($cat->parent_id)) ? get_data_by_id('parent_id', 'cc_product_category', 'prod_cat_id', $cat->parent_id) : '';
                                            echo (!empty($main_cat)) ? get_data_by_id('category_name', 'cc_product_category', 'prod_cat_id', $main_cat) . '->' : '';
                                            echo (!empty($cat->parent_id)) ? get_data_by_id('category_name', 'cc_product_category', 'prod_cat_id', $cat->parent_id) . '->' : '';
                                            echo $cat->category_name;
                                            ?>
                                    </option>
                                    <?php } ?>
                                </select>

                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" placeholder="image">
                            </div>

                            <div class="form-group">
                                <label>Icon</label>
                                <?php $icons = get_all_data_array('cc_icons'); ?>
                                <div class="row">
                                    <?php $i = 1;
                                    $j = 1;
                                    foreach ($icons as $valic) { ?>
                                    <div class="col-md-2  custom-control custom-radio">
                                        <input class="custom-control-input" type="radio"
                                            id="customRadio_<?php echo $i++ ?>" name="icon_id"
                                            value="<?php echo $valic->icon_id; ?>">
                                        <label for="customRadio_<?php echo $j++ ?>"
                                            class="custom-control-label"><?php echo image_view('icons', '', $valic->name, 'no_image', '') ?></label>
                                    </div>
                                    <?php } ?>

                                </div>
                            </div>

                            <button class="btn btn-primary">Create</button>
                            <a href="<?php echo base_url('product_category') ?>" class="btn btn-danger">Back</a>
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