<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url() ?>/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php
                    $pic = get_data_by_id('pic','users','user_id',newSession()->adUserId);
                    echo image_view('uploads/user','',$pic,'noimage.png','img-circle elevation-2 size-50x50');
                ?>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo admin_user_name();?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
<!--        <div class="form-inline">-->
<!--            <div class="input-group" data-widget="sidebar-search">-->
<!--                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">-->
<!--                <div class="input-group-append">-->
<!--                    <button class="btn btn-sidebar">-->
<!--                        <i class="fas fa-search fa-fw"></i>-->
<!--                    </button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <?php
                    $adRoleId = newSession()->adRoleId;
                    $modArrayPur = ['Dashboard'];
                    $menuAccessPur = all_menu_permission_check($modArrayPur,$adRoleId);
                    if ($menuAccessPur == true){
                ?>
                    <?php echo add_main_based_menu_with_permission('Dashboard', base_url().'/Admin/Dashboard', $adRoleId, 'fa-tachometer-alt', 'Dashboard');?>

                <?php } ?>

                <?php
                    $modArrayPur = ['Products'];
                    $menuAccessPur = all_menu_permission_check($modArrayPur,$adRoleId);
                    if ($menuAccessPur == true){
                ?>
                <li class="nav-header">Products</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p> Products Options <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php echo add_main_based_menu_with_permission('Product List', base_url().'/Admin/Products', $adRoleId, 'fa-circle', 'Products');?>

                        <?php echo add_main_based_menu_with_permission('Product Category', base_url().'/Admin/Product_category', $adRoleId, 'fa-circle', 'Product_category');?>

                        <?php echo add_main_based_menu_with_permission('Brand', base_url().'/Admin/Brand', $adRoleId, 'fa-circle', 'Brand');?>


                    </ul>
                </li>
                <?php } ?>

                <li class="nav-header">Users</li>
                <?php
                    $modArrayPur = ['User'];
                    $menuAccessPur = all_menu_permission_check($modArrayPur,$adRoleId);
                    if ($menuAccessPur == true){
                ?>
                <li class="nav-item">
                    <a href="<?php echo base_url('Admin/User');?>" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <?php } ?>

                <?php
                    $modArrayPur = ['Role'];
                    $menuAccessPur = all_menu_permission_check($modArrayPur,$adRoleId);
                    if ($menuAccessPur == true){
                ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Admin/Role');?>" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p> User Role </p>
                        </a>
                    </li>
                <?php } ?>

                <?php
                $modArrayPur = ['Customers'];
                $menuAccessPur = all_menu_permission_check($modArrayPur,$adRoleId);
                if ($menuAccessPur == true){
                    ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Admin/Customers');?>" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>Customers </p>
                        </a>
                    </li>
                <?php } ?>

                <li class="nav-header">Settings</li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>