<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title">
                        <i class="fa fa-list"></i>
                        <?=$title?>
                    </h3>
                </div>
            </div>
            <!-- /.card-header -->
        </div>
        <!-- For Messages -->
        <?php $this->load->view('admin/includes/_messages.php') ?>

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link <?=$this->session->flashdata('update_tab');?>" href="#info" data-toggle="tab"><?=trans('general_settings')?></a></li>
                            <li class="nav-item"><a class="nav-link <?=$this->session->flashdata('contact_tab');?>" href="#email" data-toggle="tab"><?=trans('email_settings')?></a></li>
                            <li class="nav-item"><a class="nav-link <?=$this->session->flashdata('social_tab');?>" href="#social" data-toggle="tab"><?=trans('social_settings')?></a></li>
                            <li class="nav-item"><a class="nav-link <?=$this->session->flashdata('general_tab');?>" href="#general" data-toggle="tab"><?=trans('configurations')?></a></li>
                            <li class="nav-item"><a class="nav-link <?=$this->session->flashdata('payment_tab');?>" href="#payment" data-toggle="tab"><?=trans('payment_settings')?></a></li>
                            <li class="nav-item"><a class="nav-link <?=$this->session->flashdata('profile_tab');?>" href="#profile" data-toggle="tab"><?=trans('profile_settings')?></a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane <?=$this->session->flashdata('update_tab');?>" id="info">

                                <?php echo form_open_multipart(base_url('admin/settings/update'), 'class="form-horizontal"');  ?>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label><?=trans('site_name')?></label>
                                        <input type="text" name="site_name" class="form-control" value="<?=!empty(old("site_name")) ? old("site_name"): $site_data['site_name'] ;?>" placeholder="">
                                    </div>
                                    <div class="col-6">
                                        <label><?=trans('site_title')?></label>
                                        <input type="text" name="site_title" value="<?=!empty(old("site_title")) ? old("site_title"): $site_data['site_title'] ;?>" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-6">
                                        <label><?=trans('admin_email')?></label>
                                        <input type="text" name="admin_email" value="<?=!empty(old("admin_email")) ? old("admin_email"): $site_data['admin_email'] ;?>" class="form-control" placeholder="">
                                    </div>

                                    <div class="col-6">
                                        <label><?=trans('copyright')?></label>
                                        <input type="text" name="copyright" value="<?=!empty(old("copyright")) ? old("copyright"): $site_data['copyright'] ;?>" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <br>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label for="exampleInputFile"><?=trans('favicon')?></label>
                                        <div class="custom-file">
                                            <input type="file" name="favicon" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile"><?=trans('choose_file')?></label>
                                            <span id="file_path_span"></span>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <label for="exampleInputFile"><?=trans('logo')?></label>
                                        <div class="custom-file">
                                            <input type="file" name="logo" class="custom-file-input" id="exampleInputFile1">
                                            <label class="custom-file-label" for="exampleInputFile1"><?=trans('choose_file')?></label>
                                            <span id="file_path_span1"></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="row form-group">
                                    <div class="col-6">
                                        <?php if ($site_data['favicon']): ?>
                                            <img src="<?php echo base_url($site_data['favicon']) ?>"> <br><br>
                                        <?php endif ?>
                                    </div>

                                    <div class="col-6">
                                        <?php if ($site_data['logo']): ?>
                                            <img src="<?php echo base_url($site_data['logo']) ?>"> <br><br>
                                        <?php endif ?>
                                    </div>
                                </div>



                                <div class="row form-group">
                                    <div class="col-12">
                                        <label><?=trans('description')?></label>
                                        <textarea name="description"  class="form-control" rows="3" placeholder=""><?=!empty(old("description")) ? old("description"): $site_data['description'] ;?></textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-12">
                                        <label><?=trans('footer_about')?></label>
                                        <textarea name="footer_about"  class="form-control" rows="3" placeholder=""><?=!empty(old("footer_about")) ? old("footer_about"): $site_data['footer_about'] ;?></textarea>
                                    </div>
                                </div>


                                <input type="hidden" name="update_id" value="<?=$site_data['id'];?>">
                                <input type="hidden" name="update_tab" value="info">

                                <div class="form-group">
                                    <input type="submit" name="submit" value="Update" class="btn btn-info pull-right">
                                </div>


                                <?php echo form_close(); ?>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane <?=$this->session->flashdata('contact_tab');?>" id="email">
                                <?php echo form_open(base_url('admin/settings/update'), 'class="form-horizontal"');  ?>

                                <div class="row form-group">
                                    <label><?=trans('email_from_to')?></label>
                                    <input type="text" name="email_from" value="<?=!empty(old("email_from")) ? old("email_from"): $site_data['email_from'] ;?>" class="form-control" placeholder="">
                                </div>

                                <div class="row form-group">
                                    <label><?=trans('smtp_host')?></label>
                                    <input type="text" name="smtp_host" value="<?=!empty(old("smtp_host")) ? old("smtp_host"): $site_data['smtp_host'] ;?>" class="form-control" placeholder="">
                                </div>

                                <div class="row form-group">
                                    <label><?=trans('smtp_port')?></label>
                                    <input type="number" name="smtp_port" value="<?=!empty(old("smtp_port")) ? old("smtp_port"): $site_data['smtp_port'] ;?>" class="form-control" placeholder="">
                                </div>

                                <div class="row form-group">
                                    <label><?=trans('smtp_user')?></label>
                                    <input type="text" name="smtp_user" value="<?=!empty(old("smtp_user")) ? old("smtp_user"): $site_data['smtp_user'] ;?>" class="form-control" placeholder="">
                                </div>

                                <div class="row form-group">
                                    <label><?=trans('smtp_pass')?></label>
                                    <input type="password" name="smtp_pass" value="<?=!empty(old("smtp_pass")) ? old("smtp_pass"): $site_data['smtp_pass'] ;?>" class="form-control" placeholder="">
                                </div>

                                <input type="hidden" name="update_id" value="<?=$site_data['id'];?>">
                                <input type="hidden" name="update_tab" value="contact">

                                <div class="form-group">
                                    <input type="submit" name="submit" value="<?=trans('update')?>" class="btn btn-info pull-right">
                                </div>

                                <?php echo form_close(); ?>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane <?=$this->session->flashdata('social_tab');?>" id="social">
                                <?php echo form_open(base_url('admin/settings/update'), 'class="form-horizontal"');  ?>

                                <div class="row form-group">
                                    <label>Facebook</label>
                                    <input type="text" name="facebook" value="<?=!empty(old("facebook")) ? old("facebook"): $site_data['facebook'] ;?>" class="form-control" placeholder="">
                                </div>

                                <div class="row form-group">
                                    <label>Twitter</label>
                                    <input type="text" name="twitter" value="<?=!empty(old("twitter")) ? old("twitter"): $site_data['twitter'] ;?>" class="form-control" placeholder="">
                                </div>

                                <div class="row form-group">
                                    <label>LinkedIn</label>
                                    <input type="text" name="linkedin" value="<?=!empty(old("linkedin")) ? old("linkedin"): $site_data['linkedin'] ;?>" class="form-control" placeholder="">
                                </div>

                                <div class="row form-group">
                                    <label>Instagram</label>
                                    <input type="text" name="instagram" value="<?=!empty(old("instagram")) ? old("instagram"): $site_data['instagram'] ;?>" class="form-control" placeholder="">
                                </div>

                                <input type="hidden" name="update_id" value="<?=$site_data['id'];?>">
                                <input type="hidden" name="update_tab" value="social">

                                <div class="form-group">
                                    <input type="submit" name="submit" value="Update" class="btn btn-info pull-right">
                                </div>

                                <?php echo form_close(); ?>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane <?=$this->session->flashdata('general_tab');?>" id="general">
                                <?php echo form_open(base_url('admin/settings/update'), 'class="form-horizontal"');  ?>

                                <div class="row form-group">
                                    <div class="col-6">
                                        <label> <?=trans('registration_system')?></label>
                                    </div>
                                    <div class="col-6">
                                        <?PHP
                                        $checked = ($site_data['enable_registration']==1)?'checked':'';
                                        ?>
                                        <input type="checkbox" <?=$checked;?> value="1" name="enable_registration" data-toggle="toggle">
                                    </div>
                                </div>

                                <br>

                                <div class="row form-group">
                                    <div class="col-6">
                                        <label><?=trans('show_profile_msg')?> </label>
                                    </div>
                                    <div class="col-6">
                                        <?PHP
                                        $checked = ($site_data['is_show_user_profile']==1)?'checked':'';
                                        ?>
                                        <input type="checkbox" <?=$checked;?> value="1" name="is_show_user_profile" data-toggle="toggle">
                                    </div>
                                </div>

                                <hr />

                                <div class="row form-group">
                                    <div class="col-6">
                                        <label>Google reCaptcha </label>
                                    </div>
                                    <div class="col-6">
                                        <?PHP
                                        $checked = ($site_data['enable_captcha']==1)?'checked':'';
                                        ?>
                                        <input type="checkbox" <?=$checked;?> value="1" name="enable_captcha" data-toggle="toggle">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-6">
                                        <label><?=trans('site_key')?></label>
                                        <input type="text" name="recaptcha_site_key" value="<?=!empty(old("recaptcha_site_key")) ? old("recaptcha_site_key"): $site_data['recaptcha_site_key'] ;?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-6">
                                        <label><?=trans('secret_key')?></label>
                                        <input type="text" name="recaptcha_secret_key" value="<?=!empty(old("recaptcha_secret_key")) ? old("recaptcha_secret_key"): $site_data['recaptcha_secret_key'] ;?>" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-12">
                                        <label><?=trans('language')?></label>
                                        <input type="text" name="recaptcha_lang" value="<?=!empty(old("recaptcha_lang")) ? old("recaptcha_lang"): $site_data['recaptcha_lang'] ;?>" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <input type="hidden" name="update_id" value="<?=$site_data['id'];?>">
                                <input type="hidden" name="update_tab" value="general">

                                <div class="form-group">
                                    <input type="submit" name="submit" value="<?=trans('update')?>" class="btn btn-info pull-right">
                                </div>

                                <?php echo form_close(); ?>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane <?=$this->session->flashdata('payment_tab');?>" id="payment">
                                <?php echo form_open(base_url('admin/settings/update'), 'class="form-horizontal"');  ?>

                                <div class="row form-group">
                                    <div class="col-6">
                                        <label><?=trans('paypal_sandbox')?></label>
                                    </div>
                                    <div class="col-6">
                                        <?PHP
                                        $checked = ($site_data['paypal_is_sandbox']==1)?'checked':'';
                                        ?>
                                        <input type="checkbox" <?=$checked;?> value="1" name="paypal_is_sandbox" data-toggle="toggle">
                                    </div>
                                </div>

                                <br>

                                <div class="row form-group">
                                    <div class="col-6">
                                        <label><?=trans('paypal_sandbox')?> URL</label>
                                        <input type="text" name="paypal_sandbox_url" value="<?=!empty(old("paypal_sandbox_url")) ? old("paypal_sandbox_url"): $site_data['paypal_sandbox_url'] ;?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-6">
                                        <label><?=trans('paypal_live')?> URL</label>
                                        <input type="text" name="paypal_live_url" value="<?=!empty(old("paypal_live_url")) ? old("paypal_live_url"): $site_data['paypal_live_url'] ;?>" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-12">
                                        <label>Paypal Email</label>
                                        <input type="text" name="paypal_email" value="<?=!empty(old("paypal_email")) ? old("paypal_email"): $site_data['paypal_email'] ;?>" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-12">
                                        <label><?=trans('paypal_currency_code')?></label>
                                        <input type="text" maxlength="3" name="paypal_cur_code" value="<?=!empty(old("paypal_cur_code")) ? old("paypal_cur_code"): $site_data['paypal_cur_code'] ;?>" class="form-control" placeholder="">
                                    </div>
                                </div>
                                
                                <hr />

                                <div class="row form-group">
                                    <div class="col-6">
                                        <label><?=trans('stripe_settings')?></label>
                                    </div>
                                    <div class="col-6">
                                        &nbsp;
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-6">
                                        <label><?=trans('secret_key')?></label>
                                        <input type="text" name="stripe_secret_key" value="<?=!empty(old("stripe_secret_key")) ? old("stripe_secret_key"): $site_data['stripe_secret_key'] ;?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-6">
                                        <label><?=trans('publishable_key')?></label>
                                        <input type="text" name="stripe_publish_key" value="<?=!empty(old("stripe_publish_key")) ? old("stripe_publish_key"): $site_data['stripe_publish_key'] ;?>" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <input type="hidden" name="update_id" value="<?=$site_data['id'];?>">
                                <input type="hidden" name="update_tab" value="payment">

                                <div class="form-group">
                                    <input type="submit" name="submit" value="<?=trans('update')?>" class="btn btn-info pull-right">
                                </div>

                                <?php echo form_close(); ?>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane <?= $this->session->flashdata('profile_tab');?>" id="profile">

                                <?php echo form_open_multipart(base_url('admin/settings/update'), 'class="form-horizontal"');  ?>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label class="control-label"><?= trans('first_name')?></label>
                                        <input type="text" name="firstname" class="form-control" value="<?=!empty(old("firstname")) ? old("firstname"): $user_data['firstname'] ;?>" placeholder="">
                                    </div>
                                    <div class="col-6">
                                        <label class="control-label"><?= trans('last_name')?></label>
                                        <input type="text" name="lastname" value="<?=!empty(old("lastname")) ? old("lastname"): $user_data['lastname'];?>" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-6">
                                        <label><?=trans('password')?></label>
                                        <input type="password" name="password" class="form-control" placeholder="">
                                    </div>

                                    <div class="col-6">
                                        <label class="control-label"><?=trans('confirm_pass')?></label>
                                        <input type="password" name="confirm_password" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-6">
                                        <label><?= trans('country')?></label>
                                        <select name="country" class="form-control">
                                            <option value="0"><?=trans('select_country')?></option>
                                            <?php
                                            foreach($countries as $country):?>
                                                <option value="<?=  $country['id']; ?>" <?= ($country['id'] == $user_data['country'])?'selected=selected':''?>><?=  $country['name']; ?></option>
                                                <?php
                                            endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label><?= trans('city')?></label>
                                        <input type="text" name="city" value="<?=!empty( old("city")) ?  old("city") :$user_data['city'];?>" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-6">
                                        <label><?= trans('phone')?></label>
                                        <input type="text" name="phone" value="<?=!empty(old("phone")) ? old("phone") : $user_data['phone'] ;?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-6">
                                        <label class="control-label"><?= trans('email')?></label>
                                        <input type="text" name="email" value="<?=!empty(old("email")) ? old("email") : $user_data['email']  ;?>" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label>Skype</label>
                                        <input type="text" name="skype" value="<?=!empty( old("skype")) ? old("skype") : $user_data['skype'];?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-6">
                                        <label>Whatsapp</label>
                                        <input type="text" name="whatsapp" value="<?=!empty(old("whatsapp")) ? old("whatsapp")  :$user_data['whatsapp'];?>" class="form-control" placeholder="">
                                    </div>

                                </div>


                                <div class="row form-group">
                                    <div class="col-12">
                                        <img width="100px" src="<?= ($user_data['thumb'] != '')? base_url($user_data['thumb']): base_url('assets/dist/img/avatar5.png'); ?>"><br><br>
                                        <div style="position:relative;" class="m-t-5"><?= IMAGE_FILE_TYPES ?><br>
                                            <a class='btn btn-default' href='javascript:;'>
                                                <i class="fa fa-cloud-upload"></i> <?= trans('photo')?>
                                                <input type="file" style='position:absolute;z-index:2;top:0;left:0;height:38px;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="photo" onchange='$("#upload-logo").html($(this).val());' />
                                            </a>
                                            &nbsp;
                                            <span class='label label-info' id="upload-logo"></span>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="update_id" value="<?=$user_data['id']?>">
                                <input type="hidden" name="update_tab" value="profile">

                                <div class="form-group">
                                    <input type="submit" name="submit" value="<?= trans('update')?>" class="btn btn-info pull-right">
                                </div>


                                <?php echo form_close(); ?>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col-md-9 -->

</div> <!-- /.row -->
</section>
</div>