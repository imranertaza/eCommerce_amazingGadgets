<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Update</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Product Update</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="<?php echo base_url('product_update_action') ?>" method="post" enctype="multipart/form-data">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card-title">Product update</h3>
                        </div>
                        <div class="col-md-4" style="text-align: right;">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        <div class="col-md-12" id="message" style="margin-top: 10px">
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
                                    <a class="nav-link" id="custom-tabs-four-link-tab" data-toggle="pill"
                                       href="#custom-tabs-four-link" role="tab"
                                       aria-controls="custom-tabs-four-profile" aria-selected="false">Link</a>
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
                                        <input type="text" name="pro_name" class="form-control" placeholder="Name" value="<?php echo $prod->name;?>"
                                               required>

                                        <input type="hidden" name="product_id" value="<?php echo $prod->product_id;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description"  class="form-control" placeholder="Description" id="editor" ><?php echo $prod->description;?></textarea>
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
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Model <span class="requi">*</span></label>
                                                <input type="text" name="model" class="form-control" placeholder="Model"
                                                       required value="<?php echo $prod->model;?>" >
                                            </div>

                                            <div class="form-group">
                                                <label>Price <span class="requi">*</span></label>
                                                <input type="number" name="price" class="form-control"
                                                       placeholder="Price" value="<?php echo $prod->price;?>"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label>Quantity <span class="requi">*</span></label>
                                                <input type="number" name="quantity" class="form-control"
                                                       placeholder="Quantity" value="<?php echo $prod->quantity;?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Wight</label>
                                                <input type="text" name="weight" class="form-control"
                                                       placeholder="Weight" value="<?php echo $prod->weight;?>" >
                                            </div>
                                            <div class="form-group">
                                                <label>Length</label>
                                                <input type="text" name="length" class="form-control"
                                                       placeholder="Length" value="<?php echo $prod->length;?>" >
                                            </div>
                                            <div class="form-group">
                                                <label>Width</label>
                                                <input type="text" name="width" class="form-control"
                                                       placeholder="Width" value="<?php echo $prod->width;?>" >
                                            </div>
                                            <div class="form-group">
                                                <label>Height</label>
                                                <input type="text" name="height" class="form-control"
                                                       placeholder="Height" value="<?php echo $prod->height;?>" >
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
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="custom-tabs-four-link" role="tabpanel"
                                     aria-labelledby="custom-tabs-four-profile-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Product Featured</label>
                                                <input type="checkbox" name="product_featured" <?php echo ($prod->featured == 1)?'checked':'';?>  data-bootstrap-switch>
                                                <br><br>
                                                <label>Free Delivery</label>
                                                <input type="checkbox" name="product_free_delivery" <?php echo (!empty($free_delivery))?'checked':'';?>  data-bootstrap-switch>
                                            </div>
                                            <div class="form-group">
                                                <label>Brand</label>
                                                <select name="brand_id" class="form-control">
                                                    <option value="">Please select</option>
                                                    <?php echo getListInOption($prod->brand_id, 'brand_id', 'name', 'cc_brand'); ?>
                                                </select>
                                            </div>

                                            <div class="form-group category">
                                                <label>Category <span class="requi">*</span></label>
                                                <select class="select2bs4" name="categorys[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" required>
                                                    <?php $i=1; foreach ($prodCat as $key => $cat) { ?>
                                                        <option value="<?php echo $cat->prod_cat_id; ?>" <?php foreach ($prodCatSel as $valC){ echo ($valC->category_id == $cat->prod_cat_id)?'selected':'';} ?> ><?php echo (!empty($cat->parent_id)) ? get_data_by_id('category_name', 'cc_product_category', 'prod_cat_id', $cat->parent_id) . '->' : ''; ?><?php echo $cat->category_name; ?></option>
                                                    <?php }  ?>

                                                </select>
                                            </div>

                                            <div class="form-group category">
                                                <label>Related Product</label>

                                                <select class="select2_pro" id="keyword" name="product_related[]" multiple="multiple" style="width: 100%;" >
                                                    <?php foreach ($prodrelated as $rel){ ?>
                                                        <option value="<?php echo $rel->related_id?>" selected ><?php echo get_data_by_id('name','cc_products','product_id',$rel->related_id)?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
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

                                        <div id="new_chq">
                                            <?php $i = 1; $j = 1; $k = 1; foreach ($prodOption as $opt){ ?>
                                            <div class="col-md-12 mt-3" id="new_<?php echo $k++;?>">
                                                <select name="option[]" onchange="optionVal(this.value,<?php echo $i++;?> )" style="padding: 3px;">
                                                    <option value="">Please select</option>
                                                    <?php echo getListInOption($opt->option_id, 'option_id', 'name', 'cc_option');?>
                                                </select>
                                                <select name="opValue[]" id="valId_<?php echo $j++;?>" style="padding: 3px;">
                                                    <option value="">Please select</option>
                                                    <?php echo getIdByListInOption($opt->option_value_id, 'option_value_id', 'name', 'cc_option_value','option_id',$opt->option_id);?>
                                                </select>
                                                <input type="number" placeholder="Quantity" name="qty[]" required value="<?php echo $opt->quantity;?>" >
                                                <input type="number" placeholder="Price" name="price_op[]" required value="<?php echo $opt->price;?>" >
                                                <a href="javascript:void(0)" onclick="remove_option(this)" class="btn btn-sm btn-danger" style="margin-top: -5px;">X</a>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <input type="hidden" value="1" id="total_chq">

                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <a href="javascript:void(0)" onclick="add_option();"
                                               class="btn btn-sm btn-primary">Add option</a>
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
                                            <?php foreach ($prodattribute as $attr){ ?>
                                            <div class="col-md-12 mt-3" id="new_2">
                                                <select name="attribute_group_id[]" style="padding: 3px; text-transform: capitalize;" required >
                                                    <option value="">Please select</option>
                                                    <?php echo getListInOption( $attr->attribute_group_id, 'attribute_group_id', 'name', 'cc_product_attribute_group'); ?>
                                                </select>
                                                <input type="text" placeholder="Name" name="name[]" value="<?php echo $attr->name;?>" required >
                                                <input type="text" placeholder="Details" name="details[]" value="<?php echo $attr->details;?>" >
                                                <a href="javascript:void(0)" onclick="remove_attribute(this)" class="btn btn-sm btn-danger" style="margin-top: -5px;">X</a>
                                            </div>
                                            <?php } ?>

                                        </div>
                                        <input type="hidden" value="1" id="total_att">

                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <a href="javascript:void(0)" onclick="add_attribute();"
                                               class="btn btn-sm btn-primary">Add attribute</a>
                                        </div>

                                    </div>


                                </div>

                                <div class="tab-pane fade" id="custom-tabs-four-special" role="tabpanel"
                                     aria-labelledby="custom-tabs-four-messages-tab">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Special Price </label>
                                                <input type="text" name="special_price" class="form-control"
                                                       placeholder="Special Price" value="<?php echo !empty($prodspecial->special_price)?$prodspecial->special_price:'';?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Start Date</label>
                                                <input type="date" name="start_date" class="form-control" placeholder="Start Date" value="<?php echo !empty($prodspecial->start_date)?$prodspecial->start_date:'';?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>End Date</label>
                                                <input type="date" name="end_date" class="form-control" placeholder="End Date" value="<?php echo !empty($prodspecial->end_date)?$prodspecial->end_date:'';?>">
                                            </div>
                                        </div>


                                    </div>


                                </div>

                                <div class="tab-pane fade" id="custom-tabs-four-image" role="tabpanel"
                                     aria-labelledby="custom-tabs-four-messages-tab">
                                    <div class="row" id="reloadImg">
                                        <div class="col-md-4">
                                            <h3>Default Image <span class="requi">*</span></h3>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row ">
                                                <div class="col-md-2 img_view">
                                                <?php echo image_view('uploads/products',$prod->product_id,'100_'.$prod->image,'noimage.png',$class='');?>
                                                </div>
                                            </div>
                                            <div id="framesdef"></div><br>
                                            <input type="file" id="defimage" name="image" class="form-control">

                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                        <div class="col-md-4">
                                            <h3>Multiple Image</h3>
                                        </div>
                                        <div class="col-md-8 mt-3" >
                                            <div class="row mb-4" >
                                            <?php foreach ($prodimage as $img){ ?>
                                                <div class="col-md-2 img_view">
                                                    <?php echo multi_image_view('uploads/products', $img->product_id, $img->product_image_id, '100_' . $img->image, 'noimage.png', 'img-fluid');?>
                                                    <a href="javascript:void(0)" onclick="removeImg(<?php echo $img->product_image_id;?>)" class="btn del-btn"><i class="fas fa-trash"></i> Delete</a>
                                                </div>
                                            <?php } ?>
                                            </div>
                                            <div id="frames"></div><br>
                                            <input type="file" class="form-control" id="image" name="multiImage[]" multiple />

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