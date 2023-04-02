<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active">Product List</li>
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
                        <h3 class="card-title">Product List</h3>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo base_url('product_create') ?>" class="btn btn-primary btn-block btn-xs"><i class="fas fa-plus"></i> Add</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Model</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($product as $val){ ?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $val->name;?></td>
                        <td><?php echo $val->model;?></td>
                        <td> <?php echo $val->quantity;?></td>
                        <td><?php echo image_view('uploads/products',$val->product_id,'100_'.$val->image,'noimage.png',$class='');?></td>
                        <td>
                            <a href="<?php echo base_url('product_update/'.$val->product_id)?>" class="btn btn-sm btn-info">Edit</a>
                            <a href="<?php echo base_url('product_delete/'.$val->product_id)?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to Delete?')">delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Model</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
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