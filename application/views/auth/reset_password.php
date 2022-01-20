<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row justify-content-center">
                <div class="col-lg-5 login-box">
                    <h3 class="text-center"><b><a href="<?= base_url(); ?>"><img class="logo" src="<?=base_url().$this->general_settings['logo']?>" alt=""></a></b></h3>
                    <p class="text-center mt-3"><?=trans('reset_pass')?></p>

                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <?php echo form_open(base_url('auth/reset_password'), 'class="my-form" '); ?>
                    <div class="form-group">
                        <label for="password"><i class="icon-lock"></i></label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="<?=trans('password')?>">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password"><i class="icon-lock"></i></label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="<?=trans('confirm_pass')?>">
                    </div>

                    <input type="hidden" name="reset_code" value="<?=isset($reset_code)?$reset_code:''?>">

                    <input type="submit" name="submit" class="btn btn-submit btn-block" value="<?=trans('submit')?>">

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>