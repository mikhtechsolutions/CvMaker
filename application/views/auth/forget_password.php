<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row justify-content-center">
                <div class="col-lg-5 login-box">
                    <h3 class="text-center"><b><a href="<?= base_url(); ?>"><img class="logo" src="<?=base_url().$this->general_settings['logo']?>" alt=""></a></b></h3>
                    <p class="text-center mt-3"><?=trans('forgot_pass')?></p>

                    <?php $this->load->view('admin/includes/_messages.php') ?>
                    <?php echo form_open(base_url('auth/forgot_password'), 'class="my-form" '); ?>
                    <div class="form-group">
                        <label for="email"><i class="icon-envelope"></i></label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="<?=trans('email')?>" >
                    </div>
                    <input type="submit" name="submit" class="btn btn-submit btn-block" value="<?=trans('submit')?>">

                    <?php echo form_close(); ?> <br>
                    <p class="mb-0">
                        <a href="<?= base_url('auth/login'); ?>" class="text-center"><?=trans('remember_signin_msg')?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>