<section class="main-container">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center mb-4 mb-md-0">
                <img src="<?php echo base_url()?>/assets/img/sing-up.png" alt="Sing Up" class="img-fluid">
            </div>
            <div class="col-md-6">
                <form action="<?php echo base_url('register_action')?>" method="post" class="sing-up">
                    <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                    <div class="form-group">
                        <div class="input-group d-flex align-items-center bg-white border rounded-2 px-3 mb-4">
                            <input class="form-control border-0" id="firstname" name="firstname" type="text" placeholder="First Name" required >
                            <div class="input-group-addon p-1">
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 8C12.933 8 14.5 6.433 14.5 4.5C14.5 2.567 12.933 1 11 1C9.067 1 7.5 2.567 7.5 4.5C7.5 6.433 9.067 8 11 8Z" stroke="#4D4D4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1 19.5C1 15.0815 5.0295 11.5 10 11.5M14.5 20L19.5 15L17.5 13L12.5 18V20H14.5Z" stroke="#4D4D4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group d-flex align-items-center bg-white border rounded-2 px-3 mb-4">
                            <input class="form-control border-0" id="lastname" name="lastname" type="text" placeholder="Last Name" required >
                            <div class="input-group-addon p-1">
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 8C12.933 8 14.5 6.433 14.5 4.5C14.5 2.567 12.933 1 11 1C9.067 1 7.5 2.567 7.5 4.5C7.5 6.433 9.067 8 11 8Z" stroke="#4D4D4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1 19.5C1 15.0815 5.0295 11.5 10 11.5M14.5 20L19.5 15L17.5 13L12.5 18V20H14.5Z" stroke="#4D4D4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group d-flex align-items-center bg-white border rounded-2 px-3 mb-4">
                            <input class="form-control border-0" id="email" name="email" type="email" placeholder="Email" required>
                            <div class="input-group-addon p-1">
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 2C20 0.9 19.1 0 18 0H2C0.9 0 0 0.9 0 2V14C0 15.1 0.9 16 2 16H18C19.1 16 20 15.1 20 14V2ZM18 2L10 7L2 2H18ZM18 14H2V4L10 9L18 4V14Z" fill="#4D4D4D"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group d-flex align-items-center bg-white border rounded-2 px-3 mb-4">
                            <input class="form-control border-0" id="phone" name="phone" type="number" placeholder="Phone" required>
                            <div class="input-group-addon p-1">
                                <svg aria-hidden="true" focusable="false" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="16">
                                    <path d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"/></svg>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group d-flex align-items-center bg-white border rounded-2 px-3 mb-4">
                            <input class="form-control border-0" id="password" name="password" type="password" placeholder="Password" required>
                            <div class="input-group-addon p-1">
                                <svg width="23" height="12" viewBox="0 0 23 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 8C5.45 8 4.97933 7.804 4.588 7.412C4.196 7.02067 4 6.55 4 6C4 5.45 4.196 4.979 4.588 4.587C4.97933 4.19567 5.45 4 6 4C6.55 4 7.02067 4.19567 7.412 4.587C7.804 4.979 8 5.45 8 6C8 6.55 7.804 7.02067 7.412 7.412C7.02067 7.804 6.55 8 6 8ZM6 12C4.33333 12 2.91667 11.4167 1.75 10.25C0.583333 9.08333 0 7.66667 0 6C0 4.33333 0.583333 2.91667 1.75 1.75C2.91667 0.583333 4.33333 0 6 0C7.11667 0 8.12933 0.275 9.038 0.825C9.946 1.375 10.6667 2.1 11.2 3H19.575C19.7083 3 19.8377 3.025 19.963 3.075C20.0877 3.125 20.2 3.2 20.3 3.3L22.3 5.3C22.4 5.4 22.471 5.50833 22.513 5.625C22.5543 5.74167 22.575 5.86667 22.575 6C22.575 6.13333 22.5543 6.25833 22.513 6.375C22.471 6.49167 22.4 6.6 22.3 6.7L19.125 9.875C19.0417 9.95833 18.9417 10.025 18.825 10.075C18.7083 10.125 18.5917 10.1583 18.475 10.175C18.3583 10.1917 18.2417 10.1833 18.125 10.15C18.0083 10.1167 17.9 10.0583 17.8 9.975L16.5 9L15.075 10.075C14.9917 10.1417 14.9 10.1917 14.8 10.225C14.7 10.2583 14.6 10.275 14.5 10.275C14.4 10.275 14.296 10.2583 14.188 10.225C14.0793 10.1917 13.9833 10.1417 13.9 10.075L12.375 9H11.2C10.6667 9.9 9.946 10.625 9.038 11.175C8.12933 11.725 7.11667 12 6 12ZM6 10C6.93333 10 7.75433 9.71667 8.463 9.15C9.171 8.58333 9.64167 7.86667 9.875 7H13L14.45 8.025V8.037V8.025L16.5 6.5L18.275 7.875L20.15 6H20.138H20.15L19.15 5V4.988V5H9.875C9.64167 4.13333 9.171 3.41667 8.463 2.85C7.75433 2.28333 6.93333 2 6 2C4.9 2 3.95833 2.39167 3.175 3.175C2.39167 3.95833 2 4.9 2 6C2 7.1 2.39167 8.04167 3.175 8.825C3.95833 9.60833 4.9 10 6 10Z" fill="#4D4D4D"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group d-flex align-items-center bg-white border rounded-2 px-3 mb-4">
                            <input class="form-control border-0" id="password" name="confirm_password" type="password" placeholder="Confirm Password" required>
                            <div class="input-group-addon p-1">
                                <svg width="23" height="12" viewBox="0 0 23 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 8C5.45 8 4.97933 7.804 4.588 7.412C4.196 7.02067 4 6.55 4 6C4 5.45 4.196 4.979 4.588 4.587C4.97933 4.19567 5.45 4 6 4C6.55 4 7.02067 4.19567 7.412 4.587C7.804 4.979 8 5.45 8 6C8 6.55 7.804 7.02067 7.412 7.412C7.02067 7.804 6.55 8 6 8ZM6 12C4.33333 12 2.91667 11.4167 1.75 10.25C0.583333 9.08333 0 7.66667 0 6C0 4.33333 0.583333 2.91667 1.75 1.75C2.91667 0.583333 4.33333 0 6 0C7.11667 0 8.12933 0.275 9.038 0.825C9.946 1.375 10.6667 2.1 11.2 3H19.575C19.7083 3 19.8377 3.025 19.963 3.075C20.0877 3.125 20.2 3.2 20.3 3.3L22.3 5.3C22.4 5.4 22.471 5.50833 22.513 5.625C22.5543 5.74167 22.575 5.86667 22.575 6C22.575 6.13333 22.5543 6.25833 22.513 6.375C22.471 6.49167 22.4 6.6 22.3 6.7L19.125 9.875C19.0417 9.95833 18.9417 10.025 18.825 10.075C18.7083 10.125 18.5917 10.1583 18.475 10.175C18.3583 10.1917 18.2417 10.1833 18.125 10.15C18.0083 10.1167 17.9 10.0583 17.8 9.975L16.5 9L15.075 10.075C14.9917 10.1417 14.9 10.1917 14.8 10.225C14.7 10.2583 14.6 10.275 14.5 10.275C14.4 10.275 14.296 10.2583 14.188 10.225C14.0793 10.1917 13.9833 10.1417 13.9 10.075L12.375 9H11.2C10.6667 9.9 9.946 10.625 9.038 11.175C8.12933 11.725 7.11667 12 6 12ZM6 10C6.93333 10 7.75433 9.71667 8.463 9.15C9.171 8.58333 9.64167 7.86667 9.875 7H13L14.45 8.025V8.037V8.025L16.5 6.5L18.275 7.875L20.15 6H20.138H20.15L19.15 5V4.988V5H9.875C9.64167 4.13333 9.171 3.41667 8.463 2.85C7.75433 2.28333 6.93333 2 6 2C4.9 2 3.95833 2.39167 3.175 3.175C2.39167 3.95833 2 4.9 2 6C2 7.1 2.39167 8.04167 3.175 8.825C3.95833 9.60833 4.9 10 6 10Z" fill="#4D4D4D"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Sign Up" class="btn btn-sign bg-transparent border-1 rounded-0 w-100 text-black fw-bold fs-5 border-dark">
                    </div>
                    <p class="text-center fs-4 my-3 text-gray">or</p>
                </form>
            </div>
        </div>

        <div class="sing-in card px-5 bg-white text-center rounded-0 border-0">
            <p>Already have an account?</p>
            <p><a href="<?php echo base_url('login') ?>" class="btn bg-custom-color rounded-0 px-5 py-2 fs-5 text-white fw-semibold">Sign In</a></p>
        </div>
    </div>
</section>