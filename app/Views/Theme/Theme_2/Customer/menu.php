<section class="manu-container my-3 my-md-5" >
    <div class="container">
        <div class="mb-0 d-flex d-md-none justify-content-between justify-content-md-start gap-1 bg-custom-color text-white p-3 mb-2 toggleButton">
            <i class="fa-solid order-2 order-md-1 fa-bars me-3 no-mg"></i>
            <span class="order-1 order-md-2">My Account</span>
        </div>
        <div class="elementToToggle d-none d-md-block">
            <div class="d-flex flex-column flex-md-row gap-2">
                <a href="<?php echo base_url('dashboard');?>" class="btn btn-default border rounded-0 <?php echo ($menu_active == 'dashboard')?'text-white bg-custom-color':'';?>">Dashboard</a>
                <a href="<?php echo base_url('profile');?>" class="btn btn-default border rounded-0 <?php echo ($menu_active == 'profile')?'text-white bg-custom-color':'';?>">Profile</a>
                <a href="<?php echo base_url('my_order');?>" class="btn btn-default border rounded-0 <?php echo ($menu_active == 'order')?'text-white bg-custom-color':'';?>">My order</a>
                <?php if (modules_key_by_access('wishlist') == 1) { ?>
                <a href="<?php echo base_url('favorite');?>" class="btn btn-default border rounded-0 <?php echo ($menu_active == 'favorite')?'text-white bg-custom-color':'';?>">My Wish list</a>
                <?php } ?>
                <a href="<?php echo base_url('logout');?>" class="btn btn-default border rounded-0">Log out</a>
            </div>
        </div>        
    </div>
</section>