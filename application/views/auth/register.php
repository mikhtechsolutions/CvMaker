<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="row justify-content-center">
        <div class="col-lg-5 login-box">
          <h3 class="text-center"><b><a href="<?= base_url(); ?>"><img class="logo" src="<?=base_url().$this->general_settings['logo']?>" alt=""></a></b></h3>
          <p class="text-center mt-3"><?=$title;?></p>

          <?php $this->load->view('admin/includes/_messages.php') ?>
          <?php echo form_open(base_url('auth/register'), 'class="my-form" '); ?>
          <div class="form-group">
            <label for="fname"><i class="icon-user"></i></label>
            <input type="text" name="username" class="form-control" value="<?=old("username");?>" id="username" placeholder="<?=trans('username')?>">
          </div>
          <div class="form-group">
            <label for="fname"><i class="icon-user"></i></label>
            <input type="text" name="firstname" class="form-control" value="<?=old("firstname");?>" id="firstname" placeholder="<?=trans('first_name')?>">
          </div>
          <div class="form-group">
            <label for="fname"><i class="icon-user"></i></label>
            <input type="text" name="lastname" class="form-control" value="<?=old("lastname");?>" id="lastname" placeholder="<?=trans('last_name')?>">
          </div>
          <div class="form-group">
            <label for="myemail"><i class="icon-envelope"></i></label>
            <input type="email" name="email" class="form-control" value="<?=old("email");?>" id="email" placeholder="<?=trans('email')?>">
          </div>
          <div class="form-group">
            <label for="password"><i class="icon-lock"></i></label>
            <input type="password" name="password" class="form-control" id="password" placeholder="<?=trans('password')?>">
          </div>
          <div class="form-group">
            <label for="password"><i class="icon-lock"></i></label>
            <input type="password" name="confirm_password" class="form-control" id="password" placeholder="<?=trans('confirm')?>">
          </div>
                <input type="hidden" name="package_id" value="<?=$packages[0]->id;?>" >
          <div class="form-group form-check">
            <input class="form-check-input" type="checkbox" required> <?=trans('agree_to')?> <a href="#"><?=trans('terms')?></a>
          </div>

          <?php if($this->general_settings['enable_captcha']){ ?>
            <div class="recaptcha-cnt">
              <?php generate_recaptcha(); ?>
            </div>
          <?php } ?>

          <input type="submit" name="submit" class="btn btn-submit btn-block" value="<?=trans('signup')?>">

          <?php echo form_close(); ?>
          <p class="mt-3 mb-1">
            <a href="<?= base_url('auth/login'); ?>" class="text-center"><?=trans('already_member')?></a>
          </p>

        </div>
      </div>
    </div>
  </div>
</div>



