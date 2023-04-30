<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reviews List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Reviews List</li>
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
                        <h3 class="card-title">Reviews List</h3>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-12" style="margin-top: 10px" id="message">
                        <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Product</th>
                        <th>Customer</th>
                        <th>Star</th>
                        <th>Comment</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($reviews as $val){ ?>
                        <tr>
                            <td width="40"><?php echo $i++;?></td>
                            <td><?php echo get_data_by_id('name','cc_products','product_id',$val->product_id);?></td>
                            <td><?php echo get_data_by_id('firstname','cc_customer','customer_id',$val->customer_id).' '.get_data_by_id('lastname','cc_customer','customer_id',$val->customer_id);?></td>
                            <td><?php echo $val->feedback_star;?></td>
                            <td><?php echo $val->feedback_text;?></td>
                            <td>
                                <select name="status" onchange="reviewStatusUpdate(this.value,<?php echo $val->product_feedback_id;?>)" >
                                    <option value="Pending" <?php echo ($val->status == 'Pending')?'selected':'';?> >Pending</option>
                                    <option value="Active" <?php echo ($val->status == 'Active')?'selected':'';?> >Active</option>
                                </select>
                            </td>
                            <td>
                                <a href="<?php echo base_url('reviews_delete/'.$val->product_feedback_id);?>" onclick="return confirm('Are you sure you want to Delete?')" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Product</th>
                        <th>Customer</th>
                        <th>Star</th>
                        <th>Comment</th>
                        <th>Status</th>
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