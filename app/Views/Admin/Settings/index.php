<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Settings List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin_dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Settings List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form method="post" action="<?php echo base_url('settings_update_action')?>" enctype="multipart/form-data">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title">Settings List</h3>
                    </div>
                    <div class="col-md-4 text-right">
                        <button type="submit" class="btn btn-primary btn-sm " >Save</button>
                    </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <?php if (session()->getFlashdata('message') !== NULL) : echo session()->getFlashdata('message'); endif; ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">General</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Local</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-currency" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Currency</a>
                                    </li>

<!--                                    <li class="nav-item">-->
<!--                                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-images" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Images</a>-->
<!--                                    </li>-->

                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-mail" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Mail</a>
                                    </li>



                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">

                                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('store_name');?></label>
                                                    <input type="text" name="store_name" class="form-control" value="<?php echo get_lebel_by_value_in_settings('store_name');?>"  required>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('store_owner');?></label>
                                                    <input type="text" name="store_owner" class="form-control" value="<?php echo get_lebel_by_value_in_settings('store_owner');?>"  required>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('address');?></label>
                                                    <input type="text" name="address" class="form-control" value="<?php echo get_lebel_by_value_in_settings('address');?>"  required>
                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('email');?></label>
                                                    <input type="text" name="email" class="form-control" value="<?php echo get_lebel_by_value_in_settings('email');?>"  required>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('phone');?></label>
                                                    <input type="text" name="phone" class="form-control" value="<?php echo get_lebel_by_value_in_settings('phone');?>"  required>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('Theme');?></label>

                                                    <select name="Theme" class="form-control" required>
                                                        <?php echo available_theme(get_lebel_by_value_in_settings('Theme'));?>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('country');?></label>
                                                    <select name="country" class="form-control" onchange="selectState(this.value)" required>
                                                        <?php echo country(get_lebel_by_value_in_settings('country'));?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('state');?></label>
                                                    <select name="state" class="form-control" id="stateView" required >
                                                        <?php echo state_with_country(get_lebel_by_value_in_settings('country'),get_lebel_by_value_in_settings('state'));?>
                                                    </select>
                                                </div>

<!--                                                <div class="form-group">-->
<!--                                                    <label>--><?php //echo get_lebel_by_title_in_settings('language');?><!--</label>-->
<!--                                                    <input type="text" name="language" class="form-control" value="--><?php //echo get_lebel_by_value_in_settings('language');?><!--"  required>-->
<!--                                                </div>-->


                                            </div>
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('length_class');?></label>

                                                    <select name="length_class" class="form-control" required>
                                                        <?php $valLen = get_lebel_by_value_in_settings('length_class');?>
                                                        <option value="Centimeter" <?php echo ($valLen == 'Centimeter')?'selected':'';?> >Centimeter</option>
                                                        <option value="Milimeter" <?php echo ($valLen == 'Milimeter')?'selected':'';?> >Milimeter</option>
                                                        <option value="Inch" <?php echo ($valLen == 'Inch')?'selected':'';?> >Inch</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('weight_class');?></label>

                                                    <select name="weight_class" class="form-control" required>
                                                        <?php $valweig = get_lebel_by_value_in_settings('weight_class');?>
                                                        <option value="Kilogram" <?php echo ($valweig == 'Kilogram')?'selected':'';?> >Kilogram</option>
                                                        <option value="Gram" <?php echo ($valweig == 'Gram')?'selected':'';?> >Gram</option>
                                                        <option value="Pound" <?php echo ($valweig == 'Pound')?'selected':'';?> >Pound</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="custom-tabs-four-currency" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('currency');?></label>
                                                    <input type="text" name="currency" class="form-control" value="<?php echo get_lebel_by_value_in_settings('currency');?>"  required>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('currency_symbol');?></label>
                                                    <input type="text" name="currency_symbol" class="form-control" value="<?php echo get_lebel_by_value_in_settings('currency_symbol');?>"  required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('invoice_prefix');?></label>
                                                    <input type="text" name="invoice_prefix" class="form-control" value="<?php echo get_lebel_by_value_in_settings('invoice_prefix');?>"  required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

<!--                                    <div class="tab-pane fade" id="custom-tabs-four-images" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">-->
<!--                                        <div class="row">-->
<!--                                            <div class="col-md-6">-->
<!--                                                <div class="form-group">-->
<!--                                                    --><?php //echo image_view('uploads/store','',get_lebel_by_value_in_settings('store_logo'),'noimage.png',$class='')?>
<!--                                                </div>-->
<!---->
<!--                                                <div class="form-group">-->
<!--                                                    <label>--><?php //echo get_lebel_by_title_in_settings('store_logo');?><!--</label>-->
<!--                                                    <input type="file" name="store_logo" class="form-control" >-->
<!--                                                </div>-->
<!---->
<!---->
<!--                                            </div>-->
<!--                                            <div class="col-md-6">-->
<!--                                                <div class="form-group"></div>-->
<!---->
<!--                                                <div class="form-group">-->
<!--                                                    <label>--><?php //echo get_lebel_by_title_in_settings('store_icon');?><!--</label>-->
<!--                                                    <input type="file" name="store_icon" class="form-control" >-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->

                                    <div class="tab-pane fade" id="custom-tabs-four-mail" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" name="new_account_alert_mail" <?php echo (get_lebel_by_value_in_settings('new_account_alert_mail') == '1')?'checked':'';?> class="custom-control-input" value="1" id="custom2" >
                                                        <label class="custom-control-label" for="custom2"><?php echo get_lebel_by_title_in_settings('new_account_alert_mail');?></label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" name="new_order_alert_mail" <?php echo (get_lebel_by_value_in_settings('new_order_alert_mail') == '1')?'checked':'';?> class="custom-control-input" value="1" id="customSwitch1" >
                                                        <label class="custom-control-label" for="customSwitch1"><?php echo get_lebel_by_title_in_settings('new_order_alert_mail');?></label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('mail_protocol');?></label>
                                                    <input type="text" name="mail_protocol" class="form-control" value="<?php echo get_lebel_by_value_in_settings('mail_protocol');?>"  required>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('mail_address');?></label>
                                                    <input type="text" name="mail_address" class="form-control" value="<?php echo get_lebel_by_value_in_settings('mail_address');?>"  required>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('smtp_host');?></label>
                                                    <input type="text" name="smtp_host" class="form-control" value="<?php echo get_lebel_by_value_in_settings('smtp_host');?>"  required>
                                                </div>





                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('smtp_port');?></label>
                                                    <input type="text" name="smtp_port" class="form-control" value="<?php echo get_lebel_by_value_in_settings('smtp_port');?>"  required>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('smtp_timeout');?></label>
                                                    <input type="text" name="smtp_timeout" class="form-control" value="<?php echo get_lebel_by_value_in_settings('smtp_timeout');?>"  required>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('smtp_username');?></label>
                                                    <input type="text" name="smtp_username" class="form-control" value="<?php echo get_lebel_by_value_in_settings('smtp_username');?>"  required>
                                                </div>

                                                <div class="form-group">
                                                    <label><?php echo get_lebel_by_title_in_settings('smtp_password');?></label>
                                                    <input type="text" name="smtp_password" class="form-control" value="<?php echo get_lebel_by_value_in_settings('smtp_password');?>"  required>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        </form>
    </section>
    <!-- /.content -->
</div>