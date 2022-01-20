<!-- *****Main Wrapper***** -->
<div id="home" class="main-wrapper">
    <!-- *****Main Cntainer***** -->
    <section class="users" style="margin-top: 120px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php echo form_open_multipart(base_url('users'), 'class="form-horizontal"');  ?>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label"><?=trans('username')?></label>
                                        <input type="text" name="username" class="form-control" value="<?=!empty(old("username")) ? old("username") :'';?>" placeholder="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label"><?=trans('designation')?></label>
                                        <input type="text" name="designation" value="<?=!empty(old("designation")) ? old("designation") :'';?>" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <label class="form-label"><?=trans('country')?></label>
                                    <select name="country" class="form-control">
                                        <option value="0">All</option>
                                        <?php
                                        $selected = '';
                                        foreach($countries as $country):
                                            if (!empty(old('country')) && old('country') == $country['id']):
                                                $selected = 'selected';
                                        else:
                                            $selected = '';
                                        endif;
                                        ?>
                                        <option value="<?=  $country['id']; ?>" <?=$selected?>><?=  $country['name']; ?></option>
                                        <?php
                                    endforeach; ?>
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="form-label"><?=trans('user_type')?></label>
                                <select name="is_premium" class="form-control">
                                    <option value=''><?=trans('all')?></option>
                                    <option value='P' <?=!empty(old('is_premium')) && old('is_premium') == 'P'? 'selected':''?>><?=trans('premium')?></option>
                                    <option value='F' <?=!empty(old('is_premium')) && old('is_premium') == 'F'? 'selected':''?>><?=trans('free')?></option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label class="form-label"><?=trans('city')?></label>
                                <input type="text" name="city" value="<?=!empty(old("city")) ? old("city") :'';?>" class="form-control" placeholder="">
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" name="submit" value="<?=trans('search_now')?>" class="btn btn-info pull-right">
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        
                    </div>
                </div>
            </div>
        </div><br>
        <?php
        if ($num_records == 0) {
            ?>
            <div class="row">
                <div class="col">
                    <?=trans('no_rec_found')?>
                </div>
            </div>
            <?php
        }
        $iter = 0;
        $div_close_flag = false;
        $per_row = 4;
        foreach ($users as $user) {
                if ($iter %$per_row == 0){ //  end of row
                    ?>
                    <div class="row">
                        <?php
                    }
                //if ($iter %3 == 0)  {
                    ?>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <?php
                                $img = ($user->thumb !=  '')?$user->thumb:'assets/dist/img/avatar5.png';
                                ?>
                                <figure><img height="150" width="134" src="<?=base_url().$img;?>" class="img-responsive" alt=""></figure>
                                <!---->
                                <?=($user->is_premium) ? '<span class="badge badge-success">'.trans("premium_user").'</span>' : '' ?>
                                <h3><?=$user->firstname.' '.$user->lastname;?></h3>
                                <p><?=($user->designation != '')?$user->designation:'-'?></p>
                                <a href="<?=base_url().$user->username;?>" class="btn btn-primary"><?=trans('view_profile')?></a>
                                <ul class="list-inline mt-3">
                                    <?php if( $user->skype != '' ): ?>
                                    <li class="list-inline-item"><a target="_blank" href="skype:<?=$user->skype;?>"><i class="fab fa-skype" aria-hidden="true"></i></a></li>
                                    <?php endif; ?>

                                    <?php if( $user->linkedin != '' ): ?>
                                    <li class="list-inline-item"><a target="_blank" href="<?=$user->linkedin;?>"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                    <?php endif; ?>

                                    <?php if( $user->whatsapp != '' ): ?>
                                    <li class="list-inline-item"><a target="_blank" href="https://wa.me/<?=$user->whatsapp;?>"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                                    <?php endif; ?>

                                    <?php if( $user->facebook != '' ): ?>
                                    <li class="list-inline-item"><a target="_blank" href="<?=$user->facebook;?>"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                    <?php endif; ?>

                                    <?php if(  $user->twitter != '' ): ?>
                                    <li class="list-inline-item"><a target="_blank" href="<?=$user->twitter;?>"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                    <?php endif; ?>

                                    <?php  if( $user->instagram != '' ): ?>
                                    <li class="list-inline-item"><a target="_blank" href="<?=$user->instagram;?>"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                   // }
                    $iter++;
                        if ($iter %$per_row == 0 || $iter == $num_records){ //  end of row
                            if ($iter > 0) {
                                ?>
                            </div><br>
                            <?php
                        }
                    }
                }
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="float-right">
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
    </div>