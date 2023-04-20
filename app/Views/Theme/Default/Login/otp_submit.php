

<section class="main-container">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center mb-4 mb-lg-0">
                <img src="<?php echo base_url()?>/assets/img/sing-up.png" alt="Sing In" class="img-fluid">
            </div>
            <div class="col-lg-6 mb-4 mb-lg-0"><?php //echo newSession()->otp;?>
                <form action="<?php echo base_url('otp_action')?>" method="post" class="sing-up">
                    <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                    <div class="form-group">
                        <div class="input-group d-flex align-items-center bg-white border px-3 rounded-2 mb-4">
                            <input class="form-control border-0" id="otp" name="otp" type="number" placeholder="Otp"  required >
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