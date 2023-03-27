<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product update</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Product update</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="<?php echo base_url('product_update_action') ?>" method="post"
              enctype="multipart/form-data">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card-title">Product update</h3>
                        </div>
                        <div class="col-md-4" style="text-align: right;">
                            <button type="submit" class="btn btn-primary" >Update</button>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px">
                            <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                       href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                       aria-selected="true">Genarel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                       href="#custom-tabs-four-profile" role="tab"
                                       aria-controls="custom-tabs-four-profile" aria-selected="false">Data</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                       href="#custom-tabs-four-messages" role="tab"
                                       aria-controls="custom-tabs-four-messages" aria-selected="false">Option</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                       href="#custom-tabs-four-attribute" role="tab"
                                       aria-controls="custom-tabs-four-messages" aria-selected="false">Attribute</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                       href="#custom-tabs-four-special" role="tab"
                                       aria-controls="custom-tabs-four-messages" aria-selected="false">Special</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                                       href="#custom-tabs-four-image" role="tab"
                                       aria-controls="custom-tabs-four-messages" aria-selected="false">Image</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                                     aria-labelledby="custom-tabs-four-home-tab">
                                    <div class="form-group">
                                        <label>Name <span class="requi">*</span></label>
                                        <input type="text" name="pro_name" class="form-control" placeholder="Name" value="<?php echo $prod->name;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" rows="3" class="form-control"
                                                  placeholder="Description"><?php echo $prod->name;?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Tag</label>
                                        <input type="text" name="tag" class="form-control" placeholder="Tag" value="<?php echo $prod->tag;?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control"
                                               placeholder="Meta Title" value="<?php echo $prod->meta_title;?>" >
                                    </div>

                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea name="meta_description" rows="3" class="form-control"
                                                  placeholder="Meta Description"><?php echo $prod->meta_description;?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Keyword</label>
                                        <input type="text" name="meta_keyword" class="form-control"
                                               placeholder="Meta Keyword" value="<?php echo $prod->meta_keyword;?>" >
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                     aria-labelledby="custom-tabs-four-profile-tab">
                                    <div class="form-group">
                                        <label>Model <span class="requi">*</span></label>
                                        <input type="text" name="model" class="form-control" placeholder="Model" value="<?php echo $prod->model;?>"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label>Brand</label>
                                        <select name="brand_id" class="form-control">
                                            <option value="">Please select</option>
                                            <?php echo getListInOption($prod->brand_id, 'brand_id', 'name', 'brand'); ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Category <span class="requi">*</span></label>
                                        <?php $checkcat = check_is_parent_category($prod->product_category_id); ?>
                                        <select name="parent_id" class="form-control text-capitalize"
                                                onchange="getSubCat(this.value)" required>
                                            <option value="">Please select</option>
                                            <?php echo getListInParentCategory($checkcat); ?>
                                        </select>
                                    </div>

                                    <div class="form-group" id="subCatData">

                                    </div>

                                    <div class="form-group">
                                        <label>Price <span class="requi">*</span></label>
                                        <input type="number" name="price" class="form-control" placeholder="Price" value="<?php echo $prod->price;?>"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity <span class="requi">*</span></label>
                                        <input type="number" name="quantity" class="form-control" placeholder="Quantity" value="<?php echo $prod->quantity;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Wight</label>
                                        <input type="text" name="weight" class="form-control" value="<?php echo $prod->weight;?>" placeholder="Weight">
                                    </div>
                                    <div class="form-group">
                                        <label>Length</label>
                                        <input type="text" name="length" class="form-control" placeholder="Length" value="<?php echo $prod->length;?>" >
                                    </div>
                                    <div class="form-group">
                                        <label>Width</label>
                                        <input type="text" name="width" class="form-control" placeholder="Width" value="<?php echo $prod->width;?>" >
                                    </div>
                                    <div class="form-group">
                                        <label>Height</label>
                                        <input type="text" name="height" class="form-control" placeholder="Height" value="<?php echo $prod->height;?>" >
                                    </div>
                                    <div class="form-group">
                                        <label>Sort Order</label>
                                        <input type="text" name="sort_order" class="form-control"
                                               placeholder="sort order" value="<?php echo $prod->sort_order;?>" >
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="Active" <?php echo ($prod->status == 'Active')?'selected':'';?> >Active</option>
                                            <option value="Inactive" <?php echo ($prod->status == 'Inactive')?'selected':'';?> >Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                                     aria-labelledby="custom-tabs-four-messages-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Option</h3>
                                        </div>
                                        <div class="col-md-6">
                                        </div>

                                        <div id="new_chq"></div>
                                        <input type="hidden" value="1" id="total_chq">

                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <a href="javascript:void(0)" onclick="add_option();" class="btn btn-sm btn-primary">Add option</a>
                                        </div>

                                    </div>


                                </div>

                                <div class="tab-pane fade" id="custom-tabs-four-attribute" role="tabpanel"
                                     aria-labelledby="custom-tabs-four-messages-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Attribute</h3>
                                        </div>
                                        <div class="col-md-6">
                                        </div>

                                        <div id="new_att">

                                        </div>
                                        <input type="hidden" value="1" id="total_att">

                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <a href="javascript:void(0)" onclick="add_attribute();" class="btn btn-sm btn-primary">Add attribute</a>
                                        </div>

                                    </div>


                                </div>

                                <div class="tab-pane fade" id="custom-tabs-four-special" role="tabpanel"
                                     aria-labelledby="custom-tabs-four-messages-tab">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Special Price </label>
                                                <input type="text" name="special_price" class="form-control" placeholder="Special Price" value="<?php echo $prod->special_price;?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Start Date</label>
                                                <input type="date" name="start_date" class="form-control" placeholder="Start Date" value="<?php echo $prod->start_date;?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <input type="date" name="end_date" class="form-control" placeholder="End Date" value="<?php echo $prod->end_date;?>" >
                                            </div>
                                        </div>



                                    </div>


                                </div>

                                <div class="tab-pane fade" id="custom-tabs-four-image" role="tabpanel"
                                     aria-labelledby="custom-tabs-four-messages-tab">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3>Image</h3>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="file" name="image" class="form-control" required>
                                        </div>


                                        <div class="col-md-12 mt-3">
                                            <input type="text"  id="example_img_up" value="" />
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </form>
    </section>
    <!-- /.content -->
</div>