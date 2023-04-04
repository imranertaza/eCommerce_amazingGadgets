<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Category update</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Product Category update</li>
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
                        <h3 class="card-title">Product Category update</h3>
                    </div>
                    <div class="col-md-4">
                        <!--                        <a href="-->
                        <?php //echo base_url('Admin/Brand')?><!--" class="btn btn-primary btn-block ">Add</a>-->
                    </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                           href="#custom-tabs-four-home" role="tab"
                                           aria-controls="custom-tabs-four-home" aria-selected="true">General</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                           href="#custom-tabs-four-profile" role="tab"
                                           aria-controls="custom-tabs-four-profile" aria-selected="false">Others</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel"
                                         aria-labelledby="custom-tabs-four-home-tab">
                                        <form action="<?php echo base_url('product_category_update_action') ?>"
                                              method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" name="category_name" class="form-control"
                                                               placeholder="Category name"
                                                               value="<?php echo $category->category_name; ?>" required>
                                                        <input type="hidden" name="prod_cat_id"
                                                               value="<?php echo $category->prod_cat_id; ?>" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Parent Category</label>
                                                        <select name="parent_id" class="form-control text-capitalize">
                                                            <option value="">Please select</option>
                                                            <?php echo getListInParentCategory($category->parent_id); ?>
                                                        </select>

                                                    </div>

                                                    <div class="form-group">
                                                        <label>Image</label>
                                                        <input type="file" name="image" class="form-control"
                                                               placeholder="image">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Icon</label>
                                                        <?php $icons = get_all_data_array('icons');?>
                                                        <div class="row">
                                                            <?php $i = 1; $j = 1; foreach ($icons as $valic){ ?>
                                                                <div class="col-md-2  custom-control custom-radio">
                                                                    <input class="custom-control-input" <?php echo ($category->icon_id == $valic->icon_id)?'checked':'';?> type="radio" id="customRadio_<?php echo $i++?>" name="icon_id" value="<?php echo $valic->icon_id;?>">
                                                                    <label for="customRadio_<?php echo $j++?>" class="custom-control-label"><?php echo image_view('icons','',$valic->name,'no_image','')?></label>
                                                                </div>
                                                            <?php } ?>

                                                        </div>
                                                    </div>

                                                    <button class="btn btn-primary">Update</button>
                                                    <a href="<?php echo base_url('product_category') ?>"
                                                       class="btn btn-danger">Back</a>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="description" rows="4" class="form-control"><?php echo $category->description; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Popular</label>
                                                    <?php $checkPop = is_exists('product_category_popular','prod_cat_id',$category->prod_cat_id); ?>
                                                    <input type="checkbox" name="popular" <?php echo ($checkPop == false)?'checked':'';?>  data-bootstrap-switch>
                                                </div>
                                            </div>
                                        </div>
                                        </form>

                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                         aria-labelledby="custom-tabs-four-profile-tab">
                                        <form action="<?php echo base_url('product_category_update_action_others') ?>"
                                              method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Meta title</label>
                                                        <input type="text" name="meta_title" class="form-control" placeholder="Meta title" value="<?php echo $category->meta_title; ?>" >
                                                        <input type="hidden" name="prod_cat_id"
                                                               value="<?php echo $category->prod_cat_id; ?>" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Meta keyword</label>
                                                        <input type="text" name="meta_keyword" class="form-control" placeholder="Meta keyword" value="<?php echo $category->meta_keyword; ?>" >
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Meta description</label>
                                                        <textarea name="meta_description" rows="4" class="form-control"><?php echo $category->meta_description; ?></textarea>
                                                    </div>



                                                    <button class="btn btn-primary">Update</button>
                                                    <a href="<?php echo base_url('Admin/Product_category') ?>"
                                                       class="btn btn-danger">Back</a>

                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Sort order</label>
                                                        <input type="text" name="sort_order" class="form-control" placeholder="Sort order" value="<?php echo $category->sort_order; ?>" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Header menu</label>
                                                        <select name="header_menu" class="form-control" >
                                                            <option value="1" <?php echo ($category->header_menu == 1)?'selected':''; ?> >Yes</option>
                                                            <option value="0" <?php echo ($category->header_menu == 0)?'selected':''; ?> >No</option>
                                                        </select>
                                                    </div>


                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>


                </div>

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