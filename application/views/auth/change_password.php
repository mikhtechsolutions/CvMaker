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
        </div>
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="box-body">
                    <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>

                    <?php echo form_open(base_url('auth/change_password'), 'class="form-horizontal"');  ?>

                    <div class="form-group">
                        <label class="control-label"><?=trans('old_pass')?></label>
                        <input type="password" name="old_password" class="form-control" placeholder="">
                    </div>

                    <div class="form-group">
                        <label class="control-label"><?=trans('new_pass')?></label>
                        <input type="password" name="new_password" class="form-control" placeholder="">
                    </div>

                    <div class="form-group">
                        <label class="control-label"><?=trans('confirm_new_pass')?></label>
                        <input type="password" name="confirm_new_password" class="form-control" placeholder="">
                    </div>



                    <div class="form-group">
                        <input type="submit" name="submit" value="<?=trans('label_change_pass')?>" class="btn btn-info pull-right">
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
</div>