<section class="manu-container my-5" >
    <div class="container">
        <a href="<?php echo base_url('dashboard');?>" class="btn btn-default border <?php echo ($menu_active == 'dashboard')?'text-white bg-black':'';?>">Dashboard</a>
        <a href="<?php echo base_url('profile');?>" class="btn btn-default border <?php echo ($menu_active == 'profile')?'text-white bg-black':'';?>">Profile</a>
        <a href="<?php echo base_url('my_order');?>" class="btn btn-default border <?php echo ($menu_active == 'order')?'text-white bg-black':'';?>">My order</a>
        <?php if (modules_key_by_access('wishlist') == 1) { ?>
        <a href="<?php echo base_url('favorite');?>" class="btn btn-default border <?php echo ($menu_active == 'favorite')?'text-white bg-black':'';?>">My Wish list</a>
        <?php } ?>
        <a href="<?php echo base_url('logout');?>" class="btn btn-default border">Log out</a>
    </div>
</section>