

<section class="main-container">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center mb-4 mb-lg-0">
                <img src="<?php echo base_url()?>/assets/img/sing-up.png" alt="Sing In" class="img-fluid">
            </div>
            <div class="col-lg-6 mb-4 mb-lg-0">
                <form action="<?php echo base_url('password_action')?>" method="post" class="sing-up">
                    <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                    <div class="form-group">
                        <div class="input-group d-flex align-items-center bg-white border px-3 rounded-2 mb-4">
                            <input class="form-control border-0" id="email" name="email" type="email" placeholder="Email"  required >
                            <div class="input-group-addon p-1">
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 2C20 0.9 19.1 0 18 0H2C0.9 0 0 0.9 0 2V14C0 15.1 0.9 16 2 16H18C19.1 16 20 15.1 20 14V2ZM18 2L10 7L2 2H18ZM18 14H2V4L10 9L18 4V14Z" fill="#4D4D4D"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Otp" class="btn btn-sign bg-transparent border-1 rounded-2 w-100 text-black fw-bold fs-5 border-dark">
                    </div>
                </form>
            </div>
        </div>


    </div>
</section>