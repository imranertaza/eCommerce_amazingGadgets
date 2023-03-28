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
                    <span class="me-4">Free delivery in dhaka city</span>
                    <span><a href="#">Returns Policy</a></span>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a class="me-3 d-flex" href="#">
                        <span><i class="fa-solid fa-heart me-1"></i></span>
                        <span>Whislist</span>
                    </a>
                    <a class="me-3 py-3 pe-3 border-end d-flex" href="<?php echo base_url('register')?>">
                        <span><i class="fa-solid fa-user me-1"></i></span>
                        <span class="d-none d-sm-block">Create an account</span>
                    </a>
                    <a class="btn btn-signin text-white bg-black" href="<?php echo base_url('login')?>"><i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Sign In</a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-main py-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-md-3 order-1 mb-3 mb-md-0">
                    <div class="logo">
                        <img src="<?php echo base_url() ?>/assets/img/logo.png" alt="Amazing Gadgets" class="img-fluid">
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
                        <button class="cat-btn-h btn btn-secondary text-uppercase show fw-semibold dropdown-toggle rounded-0 h-100  border-0 text-center w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bars me-3"></i>
                            Shop by Categories
                        </button>
                        <ul class="dropdown-menu show">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <span class="icon">
                                        <svg width="20" height="23" viewBox="0 0 20 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20 5.78125L10.25 0.90625L0.5 5.78125V17.9688L10.25 22.832L20 17.9688V5.78125ZM10.25 2.59375L17.5742 6.25L14.7031 7.67969L7.42578 4L10.25 2.59375ZM13.0391 8.52344L10.25 9.90625L2.92578 6.25L5.75 4.84375L13.0391 8.52344ZM18.5 17.0312L11 20.7812V11.2188L18.5 7.46875V17.0312ZM9.5 20.7812L2 17.0312V7.46875L9.5 11.2188V20.7812Z" fill="#5F5F5F"/>
                                        </svg>
                                    </span>
                                    Gadget
                                    <i class="fa-solid fa-angle-right  float-end"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-submenu">
                                    <li><a class="dropdown-item" href="#">Home USE</a></li>
                                    <li><a class="dropdown-item" href="#">Practical Gadget</a></li>
                                    <li><a class="dropdown-item" href="#">Computer Gadget</a></li>
                                    <li><a class="dropdown-item" href="#">Outdoor</a></li>
                                    <li><a class="dropdown-item" href="#">Adventure</a></li>
                                    <li><a class="dropdown-item" href="#">Life Style</a></li>
                                    <li><a class="dropdown-item" href="#">Health</a></li>
                                    <li><a class="dropdown-item" href="#">Travel</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                        <span class="icon">
                                            <svg width="18" height="21" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.9495 3.54104C15.0999 4.3972 14.9132 5.27836 14.4285 5.99994H16.5C16.8977 6.00034 17.279 6.1585 17.5602 6.43972C17.8414 6.72094 17.9996 7.10224 18 7.49994V10.4999C17.9996 10.8976 17.8414 11.2789 17.5602 11.5602C17.279 11.8414 16.8977 11.9995 16.5 11.9999V19.4999C16.4996 19.8976 16.3414 20.2789 16.0602 20.5602C15.779 20.8414 15.3977 20.9995 15 20.9999H3C2.6023 20.9995 2.221 20.8414 1.93978 20.5602C1.65856 20.2789 1.5004 19.8976 1.5 19.4999V11.9999C1.1023 11.9995 0.720997 11.8414 0.439779 11.5602C0.15856 11.2789 0.000397108 10.8976 0 10.4999V7.49994C0.000397108 7.10224 0.15856 6.72094 0.439779 6.43972C0.720997 6.1585 1.1023 6.00034 1.5 5.99994H3.5715C3.08678 5.27836 2.90009 4.3972 3.05053 3.54104C3.20097 2.68488 3.67687 1.92015 4.37855 1.40703C5.08022 0.893908 5.95323 0.67221 6.81471 0.788373C7.67619 0.904536 8.4593 1.34955 9 2.03019C9.5407 1.34955 10.3238 0.904536 11.1853 0.788373C12.0468 0.67221 12.9198 0.893908 13.6215 1.40703C14.3231 1.92015 14.799 2.68488 14.9495 3.54104ZM10.066 3.08325C9.85997 3.39159 9.75 3.7541 9.75 4.12494V5.99994H11.625C11.9958 5.99994 12.3584 5.88998 12.6667 5.68395C12.975 5.47792 13.2154 5.18508 13.3573 4.84247C13.4992 4.49986 13.5363 4.12286 13.464 3.75915C13.3916 3.39543 13.213 3.06134 12.9508 2.79912C12.6886 2.53689 12.3545 2.35832 11.9908 2.28597C11.6271 2.21362 11.2501 2.25075 10.9075 2.39267C10.5649 2.53458 10.272 2.77491 10.066 3.08325ZM7.70017 2.79977C7.34867 2.44827 6.8721 2.25054 6.375 2.24994C5.87772 2.24994 5.40081 2.44749 5.04917 2.79912C4.69754 3.15075 4.5 3.62766 4.5 4.12494C4.5 4.62222 4.69754 5.09914 5.04917 5.45077C5.40081 5.8024 5.87772 5.99994 6.375 5.99994H8.25V4.12494C8.2494 3.62784 8.05167 3.15128 7.70017 2.79977ZM15.0007 19.4999L15 11.9999H9.75V19.4999H15.0007ZM16.5007 10.4999L16.5 7.49994H9.75V10.4999H16.5007ZM8.25 7.49994H1.5V10.4999H8.25V7.49994ZM8.25 11.9999H3V19.4999H8.25V11.9999Z" fill="#5F5F5F"/>
                                            </svg>
                                        </span>
                                    Gift Item
                                    <i class="fa-solid fa-angle-right  float-end"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-submenu">
                                    <li><a class="dropdown-item" href="#">For Him</a></li>
                                    <li><a class="dropdown-item" href="#">For Her</a></li>
                                    <li><a class="dropdown-item" href="#">For Kids</a></li>
                                    <li><a class="dropdown-item" href="#">Occasion</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                        <span class="icon">
                                            <svg width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7197 7.15538C13.8603 7.29603 14.0511 7.37505 14.25 7.37505H17.25C17.4489 7.37505 17.6397 7.29603 17.7803 7.15538C17.921 7.01473 18 6.82396 18 6.62505C18 6.42614 17.921 6.23537 17.7803 6.09472C17.6397 5.95407 17.4489 5.87505 17.25 5.87505H14.25C14.0511 5.87505 13.8603 5.95407 13.7197 6.09472C13.579 6.23537 13.5 6.42614 13.5 6.62505C13.5 6.82396 13.579 7.01473 13.7197 7.15538ZM8.78033 4.59472C8.92098 4.73537 9 4.92614 9 5.12505V5.87505H9.75C9.94891 5.87505 10.1397 5.95407 10.2803 6.09472C10.421 6.23537 10.5 6.42614 10.5 6.62505C10.5 6.82396 10.421 7.01473 10.2803 7.15538C10.1397 7.29603 9.94891 7.37505 9.75 7.37505H9V8.12505C9 8.32396 8.92098 8.51473 8.78033 8.65538C8.63967 8.79603 8.44891 8.87505 8.25 8.87505C8.05108 8.87505 7.86032 8.79603 7.71967 8.65538C7.57901 8.51473 7.5 8.32396 7.5 8.12505V7.37505H6.75C6.55108 7.37505 6.36032 7.29603 6.21967 7.15538C6.07902 7.01473 6 6.82396 6 6.62505C6 6.42614 6.07902 6.23537 6.21967 6.09472C6.36032 5.95407 6.55108 5.87505 6.75 5.87505H7.5V5.12505C7.5 4.92614 7.57901 4.73537 7.71967 4.59472C7.86032 4.45407 8.05108 4.37505 8.25 4.37505C8.44891 4.37505 8.63967 4.45407 8.78033 4.59472ZM19.875 17.5C20.0732 17.4999 20.271 17.4811 20.4656 17.4438C21.3478 17.2861 22.1313 16.785 22.6445 16.0504C23.1577 15.3157 23.3586 14.4076 23.2031 13.525H23.1937L21.6656 5.61255C21.6656 5.60317 21.6656 5.60317 21.6562 5.5938C21.4213 4.29768 20.739 3.1251 19.7282 2.28048C18.7174 1.43586 17.4422 0.972763 16.125 0.971924L7.875 1.00005C6.5516 0.998012 5.27001 1.46342 4.25631 2.31418C3.2426 3.16493 2.56193 4.34636 2.33437 5.65005V5.6688L0.806248 13.5344C0.728064 13.971 0.736937 14.4187 0.832355 14.8518C0.927773 15.2849 1.10785 15.6949 1.36225 16.0582C1.61664 16.4215 1.94033 16.731 2.31471 16.9687C2.68909 17.2065 3.10677 17.368 3.54375 17.4438C3.73519 17.4815 3.92987 17.5004 4.125 17.5C5.02014 17.4982 5.8787 17.1446 6.51562 16.5157L6.55312 16.4688L10.3687 12.25L13.6406 12.2313L17.4469 16.4688L17.4937 16.5157C18.1261 17.1458 18.9823 17.4998 19.875 17.5ZM19.0418 9.51374C18.2682 10.2873 17.219 10.7219 16.125 10.7219L10.0312 10.75C9.92745 10.7517 9.82504 10.7742 9.73005 10.816C9.63506 10.8579 9.5494 10.9183 9.47812 10.9938L5.4375 15.4657C5.15416 15.7431 4.79014 15.9236 4.39777 15.9812C4.00541 16.0387 3.6049 15.9704 3.25381 15.786C2.90273 15.6016 2.61915 15.3106 2.44383 14.9549C2.26852 14.5992 2.2105 14.1971 2.27812 13.8063L3.80625 5.92192C3.81383 5.90753 3.81708 5.89125 3.81562 5.87505C3.98927 4.92586 4.49091 4.06785 5.2329 3.45096C5.97489 2.83406 6.91006 2.49748 7.875 2.50005L16.125 2.47192C17.219 2.47192 18.2682 2.90652 19.0418 3.68011C19.8154 4.4537 20.25 5.50291 20.25 6.59692C20.25 7.69094 19.8154 8.74015 19.0418 9.51374ZM20.9062 9.5688L21.7219 13.8063C21.7895 14.1971 21.7315 14.5992 21.5562 14.9549C21.3808 15.3106 21.0973 15.6016 20.7462 15.786C20.3951 15.9704 19.9946 16.0387 19.6022 15.9812C19.2099 15.9236 18.8458 15.7431 18.5625 15.4657L15.6469 12.2219H16.125C17.0818 12.2228 18.0231 11.9797 18.8597 11.5154C19.6963 11.0512 20.4007 10.3812 20.9062 9.5688Z" fill="#5F5F5F"/>
                                            </svg>
                                        </span>
                                    Toys
                                    <i class="fa-solid fa-angle-right  float-end"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-submenu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Board Game</a></li>
                                    <li><a class="dropdown-item" href="#">Card Game</a></li>
                                    <li><a class="dropdown-item" href="#">Construction Game</a></li>
                                    <li><a class="dropdown-item" href="#">Puzzle</a></li>
                                    <li><a class="dropdown-item" href="#">Out Door Game</a></li>
                                    <li><a class="dropdown-item" href="#">Remote Controlled</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                        <span class="icon">
                                            <svg width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M23.2497 11.4999C23.2497 11.8977 23.0917 12.2791 22.8105 12.5604L18.471 16.9007L20.646 19.0479C20.9662 18.9691 21.3035 18.998 21.6055 19.1303C21.9076 19.2625 22.1576 19.4908 22.3168 19.7796C22.476 20.0684 22.5355 20.4016 22.486 20.7277C22.4366 21.0537 22.2809 21.3543 22.0433 21.5829C21.8056 21.8115 21.4992 21.9554 21.1714 21.9921C20.8437 22.0288 20.513 21.9565 20.2306 21.7862C19.9482 21.6159 19.7299 21.3572 19.6095 21.0502C19.489 20.7432 19.4732 20.4051 19.5645 20.0882L17.4105 17.9612L13.0605 22.3104C12.7792 22.5916 12.3977 22.7496 12 22.7496C11.6023 22.7496 11.2208 22.5916 10.9395 22.3104L6.59925 17.9709L4.45275 20.1459C4.53164 20.4661 4.5027 20.8034 4.37042 21.1055C4.23814 21.4076 4.00992 21.6576 3.72111 21.8168C3.43231 21.9759 3.09906 22.0354 2.77303 21.986C2.44699 21.9365 2.14637 21.7809 1.91776 21.5432C1.68916 21.3055 1.54534 20.9991 1.50859 20.6714C1.47184 20.3437 1.54423 20.013 1.71452 19.7306C1.88481 19.4482 2.1435 19.2298 2.45048 19.1094C2.75747 18.989 3.09562 18.9732 3.4125 19.0644L5.53875 16.9097L1.18875 12.5604C0.907546 12.2791 0.749573 11.8977 0.749573 11.4999C0.749573 11.1022 0.907546 10.7207 1.18875 10.4394L5.53875 6.09019L3.4125 3.93544C3.09495 4.0273 2.75595 4.0118 2.4481 3.89133C2.14026 3.77087 1.88077 3.55218 1.7099 3.26919C1.53903 2.9862 1.46632 2.65473 1.50306 2.3262C1.53981 1.99767 1.68394 1.69045 1.9131 1.4522C2.14227 1.21394 2.44366 1.05798 2.77051 1.00849C3.09736 0.959012 3.43141 1.01878 3.72082 1.17852C4.01024 1.33826 4.23885 1.58905 4.37119 1.89199C4.50353 2.19492 4.5322 2.53305 4.45275 2.85394L6.59925 5.03044L10.9395 0.688691C11.2208 0.407485 11.6023 0.249512 12 0.249512C12.3977 0.249512 12.7792 0.407485 13.0605 0.688691L17.4098 5.03869L19.5653 2.91169C19.4736 2.59403 19.4894 2.25502 19.6102 1.94725C19.7309 1.63949 19.9499 1.38018 20.2331 1.20956C20.5162 1.03895 20.8478 0.966557 21.1763 1.00363C21.5049 1.0407 21.812 1.18516 22.05 1.4146C22.288 1.64403 22.4437 1.94562 22.4928 2.27255C22.5419 2.59948 22.4818 2.93349 22.3217 3.22275C22.1616 3.51201 21.9105 3.74034 21.6074 3.87232C21.3043 4.0043 20.9661 4.03255 20.6453 3.95269L18.4703 6.09919L22.8105 10.4394C23.0917 10.7207 23.2497 11.1022 23.2497 11.4999ZM2.25 11.4999L12 21.2499L21.75 11.4999L12 1.74994L2.25 11.4999ZM8.25 12.6009V7.74994H15.75V12.6002C15.7481 13.31 15.5457 14.0049 15.1661 14.6047C14.7864 15.2044 14.245 15.6847 13.6042 15.9902L12 16.7499L10.3958 15.9909C9.75499 15.6855 9.21359 15.2052 8.83395 14.6054C8.4543 14.0056 8.25188 13.3108 8.25 12.6009ZM13.8992 13.8029C14.1271 13.4433 14.2487 13.0266 14.25 12.6009V9.24994H9.75V12.6009C9.75105 13.0269 9.8725 13.4439 10.1004 13.8038C10.3282 14.1637 10.6532 14.4518 11.0378 14.6349L12 15.0902L12.9623 14.6334C13.3466 14.4504 13.6714 14.1625 13.8992 13.8029Z" fill="#5F5F5F"/>
                                            </svg>
                                        </span>
                                    Home security
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                        <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" fill="#5F5F5F" class="bi bi-trophy" viewBox="0 0 16 16">
                                                <path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5c0 .538-.012 1.05-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33.076 33.076 0 0 1 2.5.5zm.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935zm10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935zM3.504 1c.007.517.026 1.006.056 1.469.13 2.028.457 3.546.87 4.667C5.294 9.48 6.484 10 7 10a.5.5 0 0 1 .5.5v2.61a1 1 0 0 1-.757.97l-1.426.356a.5.5 0 0 0-.179.085L4.5 15h7l-.638-.479a.501.501 0 0 0-.18-.085l-1.425-.356a1 1 0 0 1-.757-.97V10.5A.5.5 0 0 1 9 10c.516 0 1.706-.52 2.57-2.864.413-1.12.74-2.64.87-4.667.03-.463.049-.952.056-1.469H3.504z"/>
                                            </svg>
                                        </span>
                                    Popular
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                        <span class="icon">
                                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.75 0.523438L24 4.64844V13.8477L22.5 13.0977V6.32422L16.5 9.32422V12.3477L15 13.0977V9.32422L9 6.32422V8.98438L7.5 8.23438V4.64844L15.75 0.523438ZM15.75 8.02344L17.8242 6.98047L12.3984 3.875L9.92578 5.11719L15.75 8.02344ZM19.4414 6.18359L21.5742 5.11719L15.75 2.19922L14.0039 3.07812L19.4414 6.18359ZM13.5 13.8477L12 14.5977V14.5859L7.5 16.8359V22.168L12 19.9062V21.5938L6.75 24.2188L0 20.832V12.9102L6.75 9.53516L13.5 12.9102V13.8477ZM6 22.168V16.8359L1.5 14.5859V19.9062L6 22.168ZM6.75 15.5352L11.0742 13.3789L6.75 11.2109L2.42578 13.3789L6.75 15.5352ZM13.5 15.5234L18.75 12.8984L24 15.5234V21.6992L18.75 24.3242L13.5 21.6992V15.5234ZM18 22.2734V18.6992L15 17.1992V20.7734L18 22.2734ZM22.5 20.7734V17.1992L19.5 18.6992V22.2734L22.5 20.7734ZM18.75 17.3984L21.5742 15.9805L18.75 14.5742L15.9258 15.9805L18.75 17.3984Z" fill="#5F5F5F"/>
                                            </svg>
                                        </span>
                                    Gadget head
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                        <span class="icon">
                                            <svg width="18" height="23" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 19.5V22M7 19.5V22M11 3.5V1M7 3.5V1M4 11.5H1.5M16.5 11.5H14M4 6H1.5M16.5 6H14M4 17H1.5M16.5 17H14M4 18.9V4.1C4 3.94087 4.06321 3.78826 4.17574 3.67574C4.28826 3.56321 4.44087 3.5 4.6 3.5H13.4C13.4788 3.5 13.5568 3.51552 13.6296 3.54567C13.7024 3.57583 13.7685 3.62002 13.8243 3.67574C13.88 3.73145 13.9242 3.79759 13.9543 3.87039C13.9845 3.94319 14 4.02121 14 4.1V18.9C14 18.9788 13.9845 19.0568 13.9543 19.1296C13.9242 19.2024 13.88 19.2685 13.8243 19.3243C13.7685 19.38 13.7024 19.4242 13.6296 19.4543C13.5568 19.4845 13.4788 19.5 13.4 19.5H4.6C4.44087 19.5 4.28826 19.4368 4.17574 19.3243C4.06321 19.2117 4 19.0591 4 18.9Z" stroke="#5F5F5F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                    Gadgeteer
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                        <span class="icon">
                                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.1 16.05L10 16.15L9.89 16.05C5.14 11.74 2 8.89 2 6C2 4 3.5 2.5 5.5 2.5C7.04 2.5 8.54 3.5 9.07 4.86H10.93C11.46 3.5 12.96 2.5 14.5 2.5C16.5 2.5 18 4 18 6C18 8.89 14.86 11.74 10.1 16.05ZM14.5 0.5C12.76 0.5 11.09 1.31 10 2.58C8.91 1.31 7.24 0.5 5.5 0.5C2.42 0.5 0 2.91 0 6C0 9.77 3.4 12.86 8.55 17.53L10 18.85L11.45 17.53C16.6 12.86 20 9.77 20 6C20 2.91 17.58 0.5 14.5 0.5Z" fill="#5F5F5F"/>
                                            </svg>
                                        </span>
                                    Gadget lover
                                </a>
                            </li>
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
                                        <a class="nav-link" aria-current="page" href="#">Wishlist</a>
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