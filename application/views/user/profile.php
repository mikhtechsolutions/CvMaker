<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="d-inline-block">
                    <h3 class="card-title">
                        <i class="fa fa-list"></i>
                        <?= $title?>
                    </h3>
                </div>
            </div>
            <!-- /.card-header -->
        </div>
        <!-- For Messages -->
        <?php $this->load->view('admin/includes/_messages.php') ?>
        <div class="row">
            <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">

                                <img class="profile-user-img img-fluid img-circle" src="<?= ($user_data['thumb'] != '')?base_url($user_data['thumb']):base_url('/assets/dist/img/avatar5.png'); ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $user_data['firstname'].' '.$user_data['lastname'];?> </h3>

                            <p class="text-muted text-center"><?= $user_data['designation']?></p>
                            <p class="text-muted text-center"><?=trans('joined')?>:&nbsp;<?= date_time($user_data['created_date']);?></p>
                            <p class="text-center">
 
                                <?php if( $user_data['skype'] != '' ): ?>
                                <a href="skype:<?= $user_data['skype'];?>" title="<?= $user_data['skype'];?>"><i class="fa fa-skype" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                <?php endif; ?>

                                <?php if( $user_data['linkedin'] != '' ):?>
                                <a target="_blank" href="<?= $user_data['linkedin'];?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                <?php endif; ?>

                                <?php if( $user_data['whatsapp'] != '' ): ?>
                                <a href="https://wa.me/<?= $user_data['whatsapp'];?>" title="<?= $user_data['whatsapp'];?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                <?php endif; ?>

                                <?php if( $user_data['facebook'] != '' ): ?>
                                <a target="_blank" href="<?= $user_data['facebook'];?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                <?php endif; ?>

                                <?php if( $user_data['twitter'] != '' ): ?>
                                <a target="_blank" href="<?= $user_data['twitter'];?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                <?php endif; ?>

                                <?php if( $user_data['instagram'] != '' ): ?>
                                <a target="_blank" href="<?= $user_data['instagram'];?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <?php endif; ?>
                            </p>

                            <a class="nav-link btn btn-success text-white" href="<?= base_url($user_data['username']) ?>"><i class="fa fa-eye"></i> <?=trans('view_profile')?></a>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link <?= $this->session->flashdata('update_tab');?>" href="#info" data-toggle="tab"><?=trans('update_info')?></a></li>

                            <li class="nav-item"><a class="nav-link <?= $this->session->flashdata('social_tab');?>" href="#social" data-toggle="tab"><?=trans('social_settings')?></a></li>

                            <li class="nav-item"><a class="nav-link <?= $this->session->flashdata('general_tab');?>" href="#general" data-toggle="tab"><?=trans('profile_settings')?></a></li>
                        </ul>
                    </div><!-- /.card-header -->

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane <?= $this->session->flashdata('update_tab');?>" id="info">

                                <?php echo form_open_multipart(base_url('user/profile/update'), 'class="form-horizontal"');  ?>
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
                                        <label><?= trans('designation')?></label>
                                        <input type="text" name="designation" value="<?=!empty(old("designation")) ? old("designation") : $user_data['designation'];?>" class="form-control" placeholder="">
                                    </div>

                                    <div class="col-6">
                                        <label class="control-label"><?= trans('email')?></label>
                                        <input type="text" name="email" value="<?=!empty(old("email")) ? old("email") : $user_data['email']  ;?>" class="form-control" placeholder="">
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
                                    <div class="col-12">
                                        <label><?= trans('address')?></label>
                                        <input name="address"  class="form-control" rows="3" placeholder="" value="<?=!empty(old("address")) ? old("address"): $user_data['address'];?>" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label><?= trans('phone')?></label>
                                        <input type="text" name="phone" value="<?=!empty(old("phone")) ? old("phone") : $user_data['phone'] ;?>" class="form-control" placeholder="">
                                    </div>

                                    <div class="col-6">
                                        <label for="exampleInputFile"><?= trans('resume')?>&nbsp;[pdf/doc]
                                        <?PHP
                                            if(!empty($user_data['resume'])) {
                                                echo '( <small><a href="'.base_url($user_data['resume']).'">'.trans('download_resume').'</a></small> )';
                                            }
                                        ?></label>
                                        <div class="custom-file">
                                            <input type="file" name="resume" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile"><?=trans('choose_file')?></label>
                                            <span id="file_path_span"></span>
                                        </div>
                                        <!--<div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>-->
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label>Skype</label>
                                        <input type="text" name="skype" value="<?=!empty( old("skype")) ? old("skype") : $user_data['skype'];?>" class="form-control" placeholder="e.g., sk_john123">
                                    </div>
                                    <div class="col-6">
                                        <label>Whatsapp</label>
                                        <input type="text" name="whatsapp" value="<?=!empty(old("whatsapp")) ? old("whatsapp")  :$user_data['whatsapp'];?>" class="form-control" placeholder="e.g., +923001234567">
                                    </div>

                                </div>

                                <div class="row form-group">
                                    <div class="col-12">
                                        <label><?= trans('about_me')?></label>
                                        <textarea name="about_me"  class="form-control" rows="3" placeholder=""><?=!empty(old("about_me")) ? old("about_me"): $user_data['about_me'];?></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <img width="100px" src="<?= ($user_data['thumb'] != '')? base_url($user_data['thumb']): base_url('assets/dist/img/avatar5.png'); ?>"><br><br>
                                        <div style="position:relative;" class="m-t-5"><?= IMAGE_FILE_TYPES ?><br>
                                            <label class='btn btn-default' href='javascript:;'>
                                                <i class="fa fa-cloud-upload"></i> <?= trans('photo')?>
                                                <input type="file" style='position:absolute;z-index:2;top:0;left:0;height:38px;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="photo" onchange='$("#upload-logo").html($(this).val());' />
                                            </label>
                                            &nbsp;
                                            <span class='label label-info' id="upload-logo"></span>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="update_id" value="<?=$user_data['id']?>">
                                <input type="hidden" name="update_tab" value="info">

                                <div class="form-group">
                                    <input type="submit" name="submit" value="<?= trans('update')?>" class="btn btn-info pull-right">
                                </div>


                                <?php echo form_close(); ?>
                            </div>

                            <div class="tab-pane <?= $this->session->flashdata('social_tab');?>" id="social">
                                <?php echo form_open(base_url('user/profile/update'), 'class="form-horizontal"');  ?>

                                <div class="row form-group">
                                    <label>Facebook</label>
                                    <input type="text" name="facebook" value="<?=!empty(old("facebook")) ? old("facebook") :$user_data['facebook'] ;?>" class="form-control" placeholder="e.g., https://www.facebook.com">
                                </div>

                                <div class="row form-group">
                                    <label>Twitter</label>
                                    <input type="text" name="twitter" value="<?=!empty(old("twitter")) ? old("twitter"): $user_data['twitter'];?>" class="form-control" placeholder="e.g., https://www.twitter.com">
                                </div>

                                <div class="row form-group">
                                    <label>LinkedIn</label>
                                    <input type="text" name="linkedin" value="<?=!empty(old("linkedin")) ? old("linkedin") :$user_data['linkedin'] ;?>" class="form-control" placeholder="e.g., https://www.linkedin.com">
                                </div>

                                <div class="row form-group">
                                    <label>Instagram</label>
                                    <input type="text" name="instagram" value="<?=!empty(old("instagram")) ? old("instagram") : $user_data['instagram'] ;?>" class="form-control" placeholder="e.g., https://www.instagram.com">
                                </div>

                                <input type="hidden" name="update_id" value="<?=$user_data['id']?>">
                                <input type="hidden" name="update_tab" value="social">

                                <div class="form-group">
                                    <input type="submit" name="submit" value="Update" class="btn btn-info pull-right">
                                </div>

                                <?php echo form_close(); ?>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane <?= $this->session->flashdata('general_tab');?>" id="general">
                                <?php echo form_open(base_url('user/profile/update'), 'class="form-horizontal"');  ?>

                                <div class="row">
                                    <?php
                                    $class = '';
                                    $msg = '';

                                    foreach ($public_features as $feature):
                                        if ($feature->allowed_feature == 0) { // current package is not allowed
                                            $class = 'profile_feature_disabled';
                                            $msg = trans('pro_feature_only');
                                        }
                                        ?>
                                        <div class="col-4" style="margin-bottom: 2em;">
                                            <input class="<?=$class?>" type="checkbox" <?= ($user_data[$feature->form_field_name]==1)?'checked':'';?> value="1" name="<?=$feature->form_field_name?>" data-msg="<?=$msg?>" data-toggle="toggle">
                                            <label class="form-check-label" style="margin-left: 1em"><b><?=$feature->name?> <?=trans('system')?></b></label>
                                        </div>
                                        <?PHP
                                        $msg= '';
                                        $class = '';
                                    endforeach;
                                    ?>

                                </div>

                                <input type="hidden" name="update_id" value="<?=$user_data['id']?>">
                                <input type="hidden" name="update_tab" value="general">

                                <div class="form-group">
                                    <input type="submit" name="submit" value="<?=trans('update')?>" class="btn btn-info pull-right">
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