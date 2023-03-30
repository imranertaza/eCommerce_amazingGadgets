<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customers update</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active">Customers update</li>
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
                        <h3 class="card-title">Customers update</h3>
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
                <div class="row">

                    <div class="col-md-12">

                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Register</a>
                                    </li>
<!--                                    <li class="nav-item">-->
<!--                                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">General</a>-->
<!--                                    </li>-->

                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <form action="<?php echo base_url('customers_update_action')?>" method="post" >
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" name="firstname" class="form-control" placeholder="First Name" value="<?php echo $customers->firstname;?>" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control" placeholder="Email"  value="<?php echo $customers->email;?>" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="number" name="phone" class="form-control" placeholder="Phone" value="<?php echo $customers->phone;?>" required>
                                                    </div>

                                                    <input type="hidden" name="customer_id" value="<?php echo $customers->customer_id;?>" required>
                                                    <button type="submit" class="btn btn-primary" >Update</button>
                                                    <a href="<?php echo base_url('customers')?>" class="btn btn-danger" >Back</a>

                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="<?php echo $customers->lastname;?>"  required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="password" class="form-control" placeholder="Password" >
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Confirm Password</label>
                                                        <input type="password" name="con_password" class="form-control" placeholder="Confirm Password" >
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                        <form action="<?php echo base_url('customers_general_action')?>" method="post">





                                            <input type="hidden" name="customer_id" value="<?php echo $customers->customer_id;?>" required>
                                            <button class="btn btn-primary" >Update</button>
                                            <a href="<?php echo base_url('customers')?>" class="btn btn-danger" >Back</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>



                    </div>
                    <div class="col-md-6">

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