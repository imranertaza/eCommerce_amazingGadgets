<section class="main-container my-5">
    <div class="container">
        <div class="popular-category mb-5">
            <div class="card rounded-0 border-0 ">
                <div class="card-header  border-start border-end border-top border-bottom-0  rounded-0 py-3 bg-white text-center">
                    <h4>Login</h4>
                </div>
                <div class="card-body  p-0">
                    <form action="<?php echo base_url('Login/login_action')?>" method="post">
                    <div class="row gx-0 row-cols-2 row-cols-sm-4 row-cols-lg-6 ">
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="number" name="mobile" class="form-control"  placeholder="Phone">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control"  placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary mt-4">Login</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>