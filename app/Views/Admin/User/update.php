<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users update</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard')?>">Home</a></li>
                        <li class="breadcrumb-item active">Users update</li>
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
                        <h3 class="card-title">Users update</h3>
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

                        <div class="col-md-6">

                            <div class="card card-primary card-outline card-outline-tabs">
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Register</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">General</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Image</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                            <form action="<?php echo base_url('user_update_action')?>" method="post" >
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $user->name;?>" required>

                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email;?>" required>
                                            </div>
                                                <?php if($user->is_default != 1){ ;?>
                                            <div class="form-group">
                                                <label>Role </label>
                                                <select name="role_id" class="form-control" required>
                                                    <option value="">Please select</option>
                                                    <?php echo getListInOption($user->role_id, 'role_id', 'role', 'cc_roles');?>
                                                </select>
                                            </div>
                                                <?php } ?>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control" placeholder="Password" >
                                            </div>
                                            <input type="hidden" name="user_id" value="<?php echo $user->user_id;?>" required>
                                            <button type="submit" class="btn btn-primary" >Update</button>
                                            <a href="<?php echo base_url('user')?>" class="btn btn-danger" >Back</a>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                            <form action="<?php echo base_url('user_general_action')?>" method="post">
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input type="mobile" name="mobile" class="form-control" placeholder="Mobile" value="<?php echo $user->mobile;?>" required>

                                            </div>

                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $user->address;?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Status </label>
                                                <select name="status" class="form-control" required>
                                                    <?php echo globalStatus($user->status);?>
                                                </select>
                                            </div>


                                            <input type="hidden" name="user_id" value="<?php echo $user->user_id;?>" required>
                                            <button class="btn btn-primary" >Update</button>
                                            <a href="<?php echo base_url('user')?>" class="btn btn-danger" >Back</a>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                                            <form action="<?php echo base_url('user_image_action')?>" method="post" enctype="multipart/form-data" >
                                            <div class="form-group">
                                                <?php echo image_view('uploads/user','',$user->pic,'noimage.png','');?>
                                            </div>
                                            <div class="form-group">
                                                <label>Image </label>
                                                <input type="file" class="form-control" name="pic" required>
                                            </div>

                                            <input type="hidden" name="user_id" value="<?php echo $user->user_id;?>" required>
                                            <button class="btn btn-primary" >Update</button>
                                            <a href="<?php echo base_url('user')?>" class="btn btn-danger" >Back</a>
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