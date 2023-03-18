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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Dashboard')?>">Home</a></li>
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
                        <!--                        <a href="--><?php //echo base_url('Admin/Brand')?><!--" class="btn btn-primary btn-block ">Add</a>-->
                    </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('Admin/Product_category/update_action')?>" method="post" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="product_category" class="form-control" placeholder="Product Category name" value="<?php echo $category->product_category;?>" required>
                                <input type="hidden" name="prod_cat_id" value="<?php echo $category->prod_cat_id;?>" required>
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" placeholder="image" >
                            </div>

                            <button class="btn btn-primary" >Update</button>
                            <a href="<?php echo base_url('Admin/Product_category')?>" class="btn btn-danger" >Back</a>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Image</label><br>
                                <?php echo image_view('uploads/category','',$category->image,'noimage.png','');?>
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