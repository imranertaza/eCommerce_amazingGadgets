<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazing Gadgets</title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>/favicon.ico">

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/amazing_gadgets/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/amazing_gadgets/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/amazing_gadgets/style.css">

    <script src="<?php echo base_url() ?>/assets/amazing_gadgets/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/amazing_gadgets/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/amazing_gadgets/swiper-bundle.min.js"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/amazing_gadgets/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/amazing_gadgets/slick/slick-theme.css">

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/amazing_gadgets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/amazing_gadgets/owl.theme.default.min.css">

</head>
<body>
<div class="message_alert" id="messAlt" >
    <div class="alert-success_web py-2 px-3 border-0 text-white fs-5 text-capitalize" id="mesVal" ><?php print 'Successfully update to cart';?> </div>
</div>
<header class="header bg-white">
    <div class="topbar">
        <div class="container">
            <div class="row align-items-center m-t-h" >
                <div class="col-sm-5 col-12 text-center text-sm-start">
                    <span class="me-1"><a href="">Free delivery in dhaka</a></span>
                    <span><a href="<?php echo base_url('page/returns-policy')?>">Returns Policy</a></span>
                </div>
                <div class="col-sm-7 col-12 text-md-start-2  d-flex justify-content-center justify-content-md-end align-items-center top-bar-height" >
                    <?php if (modules_key_by_access('wishlist') == 1) { ?>
                    <a class="me-3 d-flex" href="<?php echo base_url('favorite')?>">
                        <span><i class="fa-solid fa-heart me-1"></i></span>
                        <span>Wishlist</span>
                    </a>
                    <?php } ?>

                    <?php if (modules_key_by_access('compare') == 1) { ?>
                    <a class="me-3 d-flex" href="<?php echo base_url('compare')?>">
                        <span class="me-1"><i class="fa-solid fa-code-compare"></i>  </span>
                        <span>  Compare</span>
                    </a>
                    <?php } ?>

                    <?php if (!isset(newSession()->isLoggedInCustomer)){ ?>
                    <a class="me-1 me-md-3 py-3 pe-1 pe-md-3 d-flex no-pd" href="<?php echo base_url('register')?>">
                        <span><i class="fa-solid fa-user me-1"></i></span>
                        <span class=" d-sm-block">Create an account</span>
                    </a>
                        <div class="left-bor" style=""></div>
                    <a class="" href="<?php echo base_url('login')?>"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Sign In</a>
<!--                    <a class="btn btn-signin text-white bg-black" href="--><?php //echo base_url('login')?><!--"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Sign In</a>-->
                    <?php }else{ ?>
<!--                        <a class="btn btn-signin border-start  text-white bg-black mt-2 mb-2" href="--><?php //echo base_url('dashboard')?><!--">Dashboard</a>-->
                        <div class="left-bor" style=""></div>
                        <div class="btn-group">
                            <a class="dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                My account
                            </a>
                            <ul class="dropdown-menu custom-drop">
                                <li><a class="dropdown-item mt-2 mb-2" href="<?php echo base_url('dashboard')?>">Dashboard</a></li>
                                <li><a href="<?php echo base_url('profile');?>" class="dropdown-item mt-2 mb-2">Profile</a></li>
                                <li><a href="<?php echo base_url('my_order');?>" class="dropdown-item mt-2 mb-2">My order</a></li>
                                <?php if (modules_key_by_access('wishlist') == 1) { ?>
                                <li><a href="<?php echo base_url('favorite');?>" class="dropdown-item mt-2 mb-2">My Wish list</a></li>
                                <?php } ?>
                                <li><a href="<?php echo base_url('logout');?>" class="dropdown-item mt-2 mb-2">Log out</a></li>

                            </ul>
                        </div>

                    <?php }?>

                </div>
            </div>
        </div>
    </div>
    <div class="header-main py-1">
        <div class="container">
            <div class="row align-items-center m-t-h">
                <div class="col-4 order-1 d-md-none">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                </div>
                <div class="col-4 order-2 col-md-3 order-1 mb-3 mb-md-0">
                    <div class="logo text-center text-md-start">
                        <a href="<?php echo base_url()?>">
                            <?php $logoImg = get_lebel_by_value_in_theme_settings('side_logo');
                            echo image_view('uploads/logo','',$logoImg,'noimage.png','img-fluid side_logo');?>
                        </a>
                    </div>
                </div>
                <div class="col-12 order-4 order-md-2 col-md-6 order-3 order-md-2 mb-3 mb-md-0 sear-pd" >
                    <?php if (modules_key_by_access('top_search') == 1) { ?>
                    <form id="first-form-top" action="<?php echo base_url('products/search');?>" class="mini-search" method="GET">
                        <div class="input-group" id="first-valid">
                            <div class="input-group-btn search-panel">
<!--                                <select name="top_category"  class="form-select rounded-0">-->
                                <select name="cat" id="first-cat"  class="form-select rounded-0" >
                                    <option value="">All Categories</option>
                                    <?php foreach (getParentCategoryArray() as $catTop){ $tCat =  isset($top_category)?$top_category:'';?>
                                    <option value="<?php echo $catTop->prod_cat_id;?>" <?php echo ($tCat == $catTop->prod_cat_id)?'selected':'';?> ><?php echo $catTop->category_name;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <input type="text" class="form-control" id="first-keywordTop" name="keywordTop" placeholder="Search item..." value="<?php echo isset($keywordTop)?$keywordTop:'';?>" >
                            <span class="input-group-btn">
                                <button class="btn btn-default border rounded-0 bg-black text-white" onclick="topSearchValidation('first-form-top','first-cat','first-keywordTop','first-valid')"  type="button">
                                    <i class="fa-solid fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <?php } ?>
                </div>
                <div class="col-4 order-3 col-md-3 mb-3 mb-md-0 order-2 order-md-3 d-flex justify-content-end" >
                    <a href="<?php echo base_url('cart')?>" >
                    <div class="mini-cart d-flex position-relative" id="cartReload">


                        <div class="cart-content d-none d-md-flex flex-column">
                            <span class="w-100">My Cart</span>
                            <span class="total"> <?php echo currency_symbol(Cart()->total()) ?></span>
                        </div>

                        <div class="cart-icon rounded-5 align-items-center justify-content-center p-3 me-3">
                            <img src="<?php echo base_url() ?>/assets/amazing_gadgets/img/cart.png" alt="" class="img-fluid">
                        </div>
                        <span class="cart-item position-absolute rounded-5 d-flex align-items-center justify-content-center"><?php echo count(Cart()->contents()); ?></span>

                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom py-3 py-md-0">
        <div class="container">
            <div class="row gx-0">
                <div class="col-md-3">
                    <?php if(isset($home_menu)){  ?>
                    <div class="allcategory h-100 me-md-3">
                        <button class="cat-btn-h btn py-3 bg-black text-white text-uppercase show fw-semibold dropdown-toggle rounded-0 h-100  border-0 text-center w-100 btn-click " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bars me-3 no-mg"></i>
                            Shop by Categories
                        </button>
                        <ul class="dropdown-menu border  cat-drop-menu all-cat-menu btn-cat-show" >
                            <?php foreach (getSideMenuArray() as $pcat){?>
                            <li>
                                <a class="dropdown-item" href="<?php echo base_url('category/'.$pcat->prod_cat_id);?>">
                                    <span class="icon icon-he">
                                        <?php echo get_data_by_id('code','cc_icons','icon_id',$pcat->icon_id); ?>
                                    </span>
                                    <?php echo $pcat->category_name; ?>
                                    <?php  if(!empty(count(getCategoryBySubArray($pcat->prod_cat_id)))){ ?>
                                    <i class="fa-solid fa-angle-right  float-end"></i>
                                    <?php } ?>
                                </a>
                                <?php  if(!empty(count(getCategoryBySubArray($pcat->prod_cat_id)))){ ?>
                                <ul class="dropdown-menu dropdown-submenu" >
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
                    <div class="breadcrumb mb-0 mt-3 d-flex align-items-center text-uppercase">
                            <a href="<?php echo base_url();?>">Home</a>
                            <i class="fa fa-angle-right mx-2"></i>
                            <?php echo (isset($page_title))?$page_title:'';?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-9 d-flex align-items-md-center">
                    <nav class="navbar-primary navbar navbar-expand-md">
                        <div class="offcanvas offcanvas-start " id="navbarNav">
                            <div class="offcanvas-header">
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body w-100">
                                <ul class="navbar d-flex flex-column flex-md-row align-items-start justify-content-md-between  text-uppercase mb-0">
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="<?php echo base_url()?>">Home</a>
                                    </li>

                                    <?php echo top_menu();?>

                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('page/contact-us')?>">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('page/about-us')?>">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('page/about-us')?>">Help Center</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="sticky-menu sticky-menu-class menu-show-hide" >
        <div class="header-main py-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 col-md-3 order-1 mb-3 mb-md-0">
                        <div class="logo">
                            <a href="<?php echo base_url()?>">
                                <?php $logoImg = get_lebel_by_value_in_theme_settings('side_logo');
                                echo image_view('uploads/logo','',$logoImg,'noimage.png','img-fluid side_logo img-30');?>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 order-3 order-md-2 mb-3 mb-md-0 sear-pd" >
                        <?php if (modules_key_by_access('top_search') == 1) { ?>
                            <form id="second-form-top" action="<?php echo base_url('products/search');?>" class="mini-search" method="GET">
                                <div class="input-group" id="second-valid">
                                    <div class="input-group-btn search-panel">
                                        <!--                                <select name="top_category"  class="form-select rounded-0">-->
                                        <select name="cat" id="second-cat"  class="form-select rounded-0" >
                                            <option value="">All Categories</option>
                                            <?php foreach (getParentCategoryArray() as $catTop){ $tCat =  isset($top_category)?$top_category:'';?>
                                                <option value="<?php echo $catTop->prod_cat_id;?>" <?php echo ($tCat == $catTop->prod_cat_id)?'selected':'';?> ><?php echo $catTop->category_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <input type="text" class="form-control" id="second-keywordTop" name="keywordTop" placeholder="Search item..." value="<?php echo isset($keywordTop)?$keywordTop:'';?>" >
                                    <span class="input-group-btn">
                                <button class="btn btn-default border rounded-0 bg-black text-white" onclick="topSearchValidation('second-form-top','second-cat','second-keywordTop','second-valid')" type="button">
                                    <i class="fa-solid fa-search"></i>
                                </button>
                            </span>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                    <div class="col-6 col-md-3 mb-3 mb-md-0 order-2 order-md-3 d-flex justify-content-end" >
                        <a href="<?php echo base_url('cart')?>" >
                            <div class="mini-cart d-flex position-relative" id="cartReload2">



                                <div class="cart-content d-none d-md-flex flex-column">
                                    <span class="w-100">My Cart</span>
                                    <span class="total"> <?php echo currency_symbol(Cart()->total()) ?></span>
                                </div>

                                <div class="cart-icon rounded-5 align-items-center justify-content-center p-3 me-3">
                                    <img src="<?php echo base_url() ?>/assets/amazing_gadgets/img/cart.png" alt="" class="img-fluid">
                                </div>
                                <span class="cart-item position-absolute rounded-5 d-flex align-items-center justify-content-center"><?php echo count(Cart()->contents()); ?></span>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom border-bottom">
            <div class="container">
                <div class="row gx-0">
                    <div class="col-sm-3 col-8">
                        <?php if(isset($home_menu)){  ?>
                            <div class="allcategory h-100 " style="width:94%;">
                                <button class="cat-btn-h btn bg-black text-white text-uppercase fw-semibold dropdown-toggle rounded-0 h-100 border-0 text-center w-100 btn-click" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-bars me-3 no-mg"></i>
                                    Shop by Categories
                                </button>
                                <ul class="dropdown-menu border cat-drop-menu all-cat-menu" >
                                    <?php foreach (getSideMenuArray() as $pcat){?>
                                        <li>
                                            <a class="dropdown-item" href="<?php echo base_url('category/'.$pcat->prod_cat_id);?>">
                                    <span class="icon icon-he">
                                        <?php echo get_data_by_id('code','cc_icons','icon_id',$pcat->icon_id); ?>
                                    </span>
                                                <?php echo $pcat->category_name; ?>
                                                <?php  if(!empty(count(getCategoryBySubArray($pcat->prod_cat_id)))){ ?>
                                                    <i class="fa-solid fa-angle-right  float-end"></i>
                                                <?php } ?>
                                            </a>
                                            <?php  if(!empty(count(getCategoryBySubArray($pcat->prod_cat_id)))){ ?>
                                                <ul class="dropdown-menu dropdown-submenu" >
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
                            <div class="breadcrumb mb-0 mt-3 d-flex align-items-center text-uppercase">
                                <a href="<?php echo base_url();?>">Home</a>
                                <i class="fa fa-angle-right mx-2"></i>
                                <?php echo (isset($page_title))?$page_title:'';?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-6 col-4 d-flex align-items-center">
                        <nav class="navbar-primary navbar navbar-expand-xl nav-menu-main">
                            <div class="container-fluid  main-menu-but" >
                                <button class="navbar-toggler" id="navbarPopUp" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse w-100 show  nav-menu-collapse " id="navbarNav">
                                    <button type="button" class="btn-close d-xl-none"id="navClose" aria-label="Close"></button>
                                    <ul class="navbar-nav d-flex justify-content-between  text-uppercase mobile-css">
                                        <li class="nav-item">
                                            <a class="nav-link" aria-current="page" href="<?php echo base_url()?>">Home</a>
                                        </li>

                                        <?php echo top_menu();?>

                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('page/contact-us')?>">Contact</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('page/about-us')?>">About Us</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url('page/about-us')?>">Help Center</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

