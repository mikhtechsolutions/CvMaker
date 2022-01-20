<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="row justify-content-center">
        <div class="col-lg-5 login-box">
          <h3 class="text-center"><b><a href="<?= base_url(); ?>"><img class="logo" src="<?=base_url().$this->general_settings['logo']?>" alt=""></a></b></h3>
          <p class="text-center mt-3"><?=trans('sign_in_msg')?></p>

          <?php $this->load->view('admin/includes/_messages.php') ?>
          <?php echo form_open(base_url('auth/login'), 'class="my-form" '); ?>
          <div class="form-group">
            <label for="fname"><i class="icon-user"></i></label>
            <input type="text" name="username" value="<?=old("username");?>" class="form-control" id="fname" placeholder="<?=trans('username')?>">
          </div>
          <div class="form-group">
            <label for="myemail"><i class="icon-lock"></i></label>
            <input type="password" name="password" class="form-control" id="myemail" placeholder="<?=trans('password')?>">
          </div>
          <div class="form-group form-check">
            <input class="form-check-input" type="checkbox"> <?=trans('remember_me')?>
          </div>

          <input type="submit" name="submit" class="btn btn-submit btn-block" value="<?=trans('login')?>">

          <?php echo form_close(); ?>
          <p class="mt-3 mb-1">
            <a href="<?= base_url('auth/forgot_password'); ?>"><?=trans('i_forgot_pass')?></a>
          </p>
          <p class="mb-0">
            <a href="<?= base_url('auth/register'); ?>" class="text-center"><?=trans('register_membership')?></a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>


