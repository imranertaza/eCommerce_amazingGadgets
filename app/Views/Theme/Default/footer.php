<footer class="footer py-5">
    <div class="container">
        <div class="footer-logo mb-5">
            <img src="<?php echo base_url() ?>/assets/img/logo-footer.png" alt="Amazing Gadgets" class="img-fluid">
        </div>
        <div class="row gx-5">
            <div class="col-sm-6 col-xl-4 mb-4 mb-xl-0 pe-5">
                <h3>Find It Fast</h3>
                <div class="d-flex mb-3 mb-md-5">
                    <div class="icon me-3">
                        <img src="<?php echo base_url() ?>/assets/img/icon-map.png" alt="Maps">
                    </div>
                    <div class="address">
                        <?php echo get_lebel_by_value_in_settings('address');?>
                    </div>
                </div>
                <div class="d-flex mb-3 mb-md-5">
                    <div class="icon me-3">
                        <img src="<?php echo base_url() ?>/assets/img/icon-phone.png" alt="Phone">
                    </div>
                    <div class="phone">
                        <a href="tel:<?php echo get_lebel_by_value_in_settings('phone');?>"><?php echo get_lebel_by_value_in_settings('phone');?></a>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="icon me-3">
                        <img src="<?php echo base_url() ?>/assets/img/icon-email.png" alt="Email">
                    </div>
                    <div class="email">
                        <a href="mailto:<?php echo get_lebel_by_value_in_settings('email');?>"><?php echo get_lebel_by_value_in_settings('email');?></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 mb-3 mb-md-5 mb-xl-0">
                <h3>Customer Care</h3>
                <ul class="list-unstyled lh-lg">
                    <li><a href="<?php echo base_url('dashboard');?>" class="nav-link">My Account</a></li>
                    <li><a href="#" class="nav-link">Privacy Policy</a></li>
                    <li><a href="#" class="nav-link">Terms and Conditions</a></li>
                    <li><a href="#" class="nav-link">Returns/Exchange</a></li>
                    <li><a href="<?php echo base_url('page/about-us');?>" class="nav-link">About Us</a></li>
                    <li><a href="#" class="nav-link">Top Searches</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
                <h3>We Accept</h3>
                <img src="<?php echo base_url() ?>/assets/img/card-logo.png" alt="Cart" class="img-fluid">
            </div>
            <div class="col-sm-6 col-xl-2">
                <h3>Social Media</h3>
                <div class="social">
                    <a target="_blank" href="<?php echo get_lebel_by_value_in_settings('fb_url');?>"><i class="fa-brands fa-facebook-f"></i></a>
                    <a target="_blank" href="<?php echo get_lebel_by_value_in_settings('twitter_url');?>"><i class="fa-brands fa-twitter"></i></a>
                    <a target="_blank" href="<?php echo get_lebel_by_value_in_settings('tiktok_url');?>"><i class="fa-brands fa-tiktok"></i></a>
                    <a target="_blank" href="<?php echo get_lebel_by_value_in_settings('instagram_url');?>"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="<?php echo base_url() ?>/assets/jquery-3.6.0.js"></script>
<script src="<?php echo base_url() ?>/assets/jquery-ui.js"></script>


<script src="<?php echo base_url() ?>/assets/jquery.star-rating.js"></script>
<script>
    $('.ratingPiont').starRating({
        starSize: 1.5,
        showInfo: true
    });

    $('.ratingView').starRating({
        starSize: 1.5,
        showInfo: true
    });

    function shippingAddress() {
        var shipping = document.getElementById('shipping_address');

        if (shipping.style.display === "none") {
            shipping.style.display = "block";
        } else {
            shipping.style.display = "none";
        }
    }

    jQuery( function($) {
        $( ".slider-range" ).slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
        });
        $( "#amount" ).val( "$" + $( ".slider-range" ).slider( "values", 0 ) +
            " - $" + $( ".slider-range" ).slider( "values", 1 ) );
    } );

    var slider = new Swiper ('.gallery-slider', {
        slidesPerView: 1,
        centeredSlides: true,
        loop: true,
        loopedSlides: 4,
    });

    var thumbs = new Swiper ('.gallery-thumbs', {
        slidesPerView: 'auto',
        spaceBetween: 10,
        loopedSlides: 4,
        centeredSlides: true,
        loop: true,
        slideToClickedSlide: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    slider.controller.control = thumbs;
    thumbs.controller.control = slider;

    const formSelect = document.getElementById('form-select');
    // Update the custom select
    // FancySelect.update(formSelect);

    $('#navbarPopUp').click(function () {
        $('#navbarNav').addClass('offcanvas offcanvas-end text-bg-dark');
        $('.navbar-primary ul.navbar-nav').addClass('offcanvas-body');
    });
    $('#navClose').click(function () {
        $("#navbarNav").removeClass('show');

    });
    var swiper = new Swiper(".bannerSlide", {
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        }
    });
    var swiper = new Swiper(".trendSlide", {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: ".trend-button-next",
            prevEl: ".trend-button-prev",
        },
        breakpoints: {
            992: {
                slidesPerView: 3,
                spaceBetween: 31,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            0: {
                slidesPerView: 1,
                spaceBetween: 30,
            },
        },
    });
    document.querySelector('.trend-button-prev').addEventListener('click', function () {
        swiper.slidePrev();
    });

    document.querySelector('.trend-button-next').addEventListener('click', function () {
        swiper.slideNext();
    });

    $(document).ready(function(){

        var quantitiy=0;
        $('#plus-btn').click(function(e){

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#qty_input').val());

            // If is not undefined

            $('#qty_input').val(quantity + 1);


            // Increment

        });

        $('#minus-btn').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#qty_input').val());

            // If is not undefined

            // Increment
            if(quantity>0){
                $('#qty_input').val(quantity - 1);
            }
        });

    });


    function addToCompare(pro_id){
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('addtoCompare')?>",
            data: {product_id:pro_id},
            success: function(response){
                $('#mesVal').html(response);
                $('.message_alert').show();
                setTimeout(function(){ $("#messAlt").fadeOut(1500);}, 600);
            }
        });
    }

    function removeToCompare(key_id){
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('removeToCompare')?>",
            data: {key_id:key_id},
            success: function(response){
                $('#compReload').load(location.href + " #compReload");
                $('#mesVal').html(response);
                $('.message_alert').show();
                setTimeout(function(){ $("#messAlt").fadeOut(1500);}, 600);
            }
        });
    }

    function addToWishlist(pro_id){
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('addtoWishlist')?>",
            data: {product_id:pro_id},
            success: function(response){
                $('#mesVal').html(response);
                $('.message_alert').show();
                setTimeout(function(){ $("#messAlt").fadeOut(1500);}, 600);
            }
        });
    }


    function addToCart(pro_id){
        var qty = $('#qty_input').val();
        if (qty == null){
            qty = '1';
        }
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('addtocart')?>",
            data: {product_id:pro_id,qtyall:qty },
            success: function(response){
                $('#cartReload').load(location.href + " #cartReload");
                $('#mesVal').html(response);
                $('.message_alert').show();
                setTimeout(function(){ $("#messAlt").fadeOut(1500);}, 600);
            }
        });
    }



    function minusItem(rowid){
        var quantity = parseInt($('.item_'+rowid).val());
        if(quantity>1){
            $('.item_'+rowid).val(quantity - 1);
        }
        $('#btn_'+rowid).show();
    }

    function plusItem(rowid){
        var quantity = parseInt($('.item_'+rowid).val());
        $('.item_'+rowid).val(quantity + 1);
        $('#btn_'+rowid).show();

    }

    function updateQty(rowid){
        var qty = $('.item_'+rowid).val();
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('updateToCart')?>",
            data: {rowid:rowid,qty:qty },
            success: function(response){
                $('#cartReload').load(location.href + " #cartReload");
                $('#tableReload').load(location.href + " #tableReload");
                $('#mesVal').html(response);
                $('.message_alert').show();
                setTimeout(function(){ $("#messAlt").fadeOut(1500);}, 600);
            }
        });
    }

    function removeCart(rowid){
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('removeToCart')?>",
            data: {rowid:rowid},
            success: function(response){
                $('#cartReload').load(location.href + " #cartReload");
                $('#tableReload').load(location.href + " #tableReload");
                $('#mesVal').html(response);
                $('.message_alert').show();
                setTimeout(function(){ $("#messAlt").fadeOut(1500);}, 600);
            }
        });
    }

    function pass_show(val){
        var html = '<h6 class="mt-2">Change information</h6><div class="form-group mt-4"><label>Current password</label><input type="password" name="current_password" class="form-control" placeholder="Current password" required></div><div class="form-group mt-4"><label>New password</label><input type="password" name="new_password" class="form-control" placeholder="New password" required></div><div class="form-group mt-4"><label>Confirm password</label><input type="password" name="confirm_password" class="form-control" placeholder="Confirm password" required></div>';
        if (val == '1') {
            $('#passReset').val(0);
            $('#pass-data').html(html);
        }else{
            $('#passReset').val(1);
            $('#pass-data').html('');
        }
    }

    function selectState(country_id,id){
        $.ajax({
            method: "POST",
            url: "<?php echo base_url('checkout_country_zoon')?>",
            data: {country_id:country_id},
            success: function(data){
                $('#'+id).html(data);
            }
        });
    }


</script>

</body>
</html>