<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-body">
        <div class="col-md-6">
          <h4><i class="fa fa-pencil"></i> &nbsp; <?=trans('edit_user')?></h4>
        </div>
        <div class="col-md-6 text-right">
          <a href="<?= base_url('admin/users'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?=trans('users_list')?></a>
          <a href="<?= base_url('admin/users/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?=trans('add_new_user')?></a>
        </div>
        
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?=trans('edit_user')?></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
          <?php if(isset($msg) || validation_errors() !== ''): ?>
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
            <?= validation_errors();?>
            <?= isset($msg)? $msg: ''; ?>
          </div>
        <?php endif; ?>
        
        <?php echo form_open(base_url('admin/users/edit/'.$user['id']), 'class="form-horizontal"' )?> 
        <div class="form-group">
          <label for="username" class="col-sm-2 control-label"><?=trans('user_name')?></label>

          <div class="col-sm-9">
            <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control" id="username" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="firstname" class="col-sm-2 control-label"><?=trans('first_name')?></label>

          <div class="col-sm-9">
            <input type="text" name="firstname" value="<?= $user['firstname']; ?>" class="form-control" id="firstname" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="lastname" class="col-sm-2 control-label"><?=trans('last_name')?></label>

          <div class="col-sm-9">
            <input type="text" name="lastname" value="<?= $user['lastname']; ?>" class="form-control" id="lastname" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label"><?=trans('email')?></label>

          <div class="col-sm-9">
            <input type="email" name="email" value="<?= $user['email']; ?>" class="form-control" id="email" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="mobile_no" class="col-sm-2 control-label"><?=trans('mobile_no')?></label>

          <div class="col-sm-9">
            <input type="number" name="mobile_no" value="<?= $user['mobile_no']; ?>" class="form-control" id="mobile_no" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label for="role" class="col-sm-2 control-label"><?=trans('select_status')?></label>

          <div class="col-sm-9">
            <select name="status" class="form-control">
              <option value=""><?=trans('select_status')?></option>
              <option value="1" <?= ($user['is_active'] == 1)?'selected': '' ?> ><?=trans('active')?></option>
              <option value="0" <?= ($user['is_active'] == 0)?'selected': '' ?>><?=trans('deactive')?></option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-11">
            <input type="submit" name="submit" value="<?=trans('update')?>" class="btn btn-info pull-right">
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>  

</section> 