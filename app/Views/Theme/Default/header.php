<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazing Gadgets</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/style.css">

    <script src="<?php echo base_url() ?>/assets/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/swiper-bundle.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="message_alert" id="messAlt" >
    <div class="alert-success_web py-2 px-3 border-0 text-white fs-5 text-capitalize" id="mesVal" >  </div>
</div>
<header class="header bg-white">
    <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <span class="me-4"><a href="">Free delivery</a></span>
                    <span><a href="#">Returns Policy</a></span>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="me-3 d-flex" href="<?php echo base_url('favorite')?>">
                        <span><i class="fa-solid fa-heart me-1"></i></span>
                        <span>Wishlist</span>
                    </a>

                    <a class="me-3 d-flex" href="<?php echo base_url('compare')?>">
                        <span><i class="fa-solid fa-code-compare"></i></span>
                        <span> Compare</span>
                    </a>

                    <?php if (!isset(newSession()->isLoggedInCustomer)){ ?>
                    <a class="me-3 py-3 pe-3 border-end d-flex" href="<?php echo base_url('register')?>">
                        <span><i class="fa-solid fa-user me-1"></i></span>
                        <span class="d-none d-sm-block">Create an account</span>
                    </a>
                    <a class="btn btn-signin text-white bg-black" href="<?php echo base_url('login')?>"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Sign In</a>
                    <?php }else{ ?>
                        <a class="btn btn-signin text-white bg-black mt-2 mb-2" href="<?php echo base_url('dashboard')?>">Dashboard</a>
                    <?php }?>

                </div>
            </div>
        </div>
    </div>
    <div class="header-main py-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-md-3 order-1 mb-3 mb-md-0">
                    <div class="logo">
                        <a href="<?php echo base_url()?>">
                        <img src="<?php echo base_url() ?>/assets/img/logo.png" alt="Amazing Gadgets" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 order-3 order-md-2 mb-3 mb-md-0">
                    <form action="search" class="mini-search">
                        <div class="input-group">
                            <div class="input-group-btn search-panel">
                                <select name="category" class="form-select rounded-0">
                                    <option value="">All Categories</option>
                                    <option value="">Cat 1</option>
                                    <option value="">Cat 2</option>
                                </select>
                            </div>
                            <input type="text" class="form-control" name="keyword" placeholder="Search term...">
                            <span class="input-group-btn">
                                <button class="btn btn-default border rounded-0 bg-black text-white" type="button">
                                    <i class="fa-solid fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-6 col-md-3 mb-3 mb-md-0 order-2 order-md-3 d-flex justify-content-end" >
                    <a href="<?php echo base_url('cart')?>" >
                    <div class="mini-cart d-flex position-relative" id="cartReload">

                        <div class="cart-icon rounded-5 align-items-center justify-content-center p-3 me-3">
                            <img src="<?php echo base_url() ?>/assets/img/cart.png" alt="" class="img-fluid">
                        </div>
                        <span class="cart-item position-absolute rounded-5 d-flex align-items-center justify-content-center"><?php echo count(Cart()->contents()); ?></span>
                        <div class="cart-content d-flex flex-column">
                            <span class="w-100">My Cart</span>
                            <span class="total">$ <?php echo Cart()->total() ?></span>
                        </div>

                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="row gx-0">
                <div class="col-xl-3 col-lg-4 col-md-6 col-8">
                    <?php if(isset($home_menu)){  ?>
                    <div class="allcategory h-100 w-100">
                        <button class="cat-btn-h btn bg-black text-white text-uppercase show fw-semibold dropdown-toggle rounded-0 h-100  border-0 text-center w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bars me-3"></i>
                            Shop by Categories
                        </button>
                        <ul class="dropdown-menu show">
                            <?php foreach (getParentCategoryArray() as $pcat){?>
                            <li>
                                <a class="dropdown-item" href="<?php echo base_url('category/'.$pcat->prod_cat_id);?>">
                                    <span class="icon">
                                        <?php $icon = get_data_by_id('name','icons','icon_id',$pcat->icon_id); echo image_view('icons','',$icon,'noimage.png','')?>
                                    </span>
                                    <?php echo $pcat->category_name; ?>
                                    <?php  if(!empty(count(getCategoryBySubArray($pcat->prod_cat_id)))){ ?>
                                    <i class="fa-solid fa-angle-right  float-end"></i>
                                    <?php } ?>
                                </a>
                                <?php  if(!empty(count(getCategoryBySubArray($pcat->prod_cat_id)))){ ?>
                                <ul class="dropdown-menu dropdown-submenu">
                                    <?php foreach (getCategoryBySubArray($pcat->prod_cat_id) as $sCat){ ?>
                                    <li><a class="dropdown-item" href="<?php echo base_url('category/'.$sCat->prod_cat_id);?>"><?php echo $sCat->category_name; ?></a></li>
                                    <?php } ?>
                                </ul>
                                <?php } ?>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php }else{ ?>
                    <div class="breadcrumb mb-0 mt-3 d-flex align-items-center">
                            <a href="<?php echo base_url();?>">Home</a>
                            <i class="fa fa-angle-right mx-2"></i>
                            <?php echo (isset($page_title))?$page_title:'';?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-6 col-4 d-flex align-items-center">
                    <nav class="navbar-primary navbar navbar-expand-xl">
                        <div class="container-fluid">
                            <button class="navbar-toggler" id="navbarPopUp" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <button type="button" class="btn-close d-xl-none"id="navClose" aria-label="Close"></button>
                                <ul class="navbar-nav d-flex justify-content-center">
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="<?php echo base_url()?>">Home</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="<?php echo base_url('favorite')?>">Wishlist</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('contact')?>">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('about')?>">About Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="help-center">
                        <a class="d-flex" href="#">
                            <span><img src="<?php echo base_url()?>/assets/img/info.png" alt="" class="img-fluid"></span>
                            <span class="d-none d-md-block">Help Center</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>