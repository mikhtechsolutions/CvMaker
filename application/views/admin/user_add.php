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
        <div class="d-inline-block float-right">
          <a href="<?= base_url('admin/users'); ?>" class="btn btn-success"><i class="fa fa-list"></i><?=trans('list_users')?></a>
        </div>
      </div>
      <!-- /.card-header -->
    </div>

    <div class="card">
      <div class="card-body">
        <div class="box-body">
          <!-- For Messages -->
          <?php $this->load->view('admin/includes/_messages.php') ?>

          <?php echo form_open_multipart(base_url('admin/users/add_user'), 'class="form-horizontal"');  ?>
          <div class="row form-group">
            <div class="col-6">
              <label><?=trans('user_name')?></label>
              <input type="text" name="username" <?=isset($update_id)?'disabled':''?> value="<?=isset($update_id)?$user->username:''?>" class="form-control" placeholder="">
            </div>

            <div class="col-6">
              <label><?=trans('email')?></label>
              <input type="text" name="email" <?=isset($update_id)?'disabled':''?> value="<?=isset($update_id)?$user->email:''?>" class="form-control" placeholder="">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-6">
              <label><?=trans('first_name')?></label>
              <input type="text" name="firstname" value="<?=isset($update_id)?$user->firstname:''?>" class="form-control" placeholder="">
            </div>

            <div class="col-6">
              <label><?=trans('last_name')?></label>
              <input type="text" name="lastname" value="<?=isset($update_id)?$user->lastname:''?>" class="form-control" placeholder="">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-6">
              <label><?=trans('password')?></label>
              <input type="password" name="password" value="<?=isset($update_id)?$user->password:''?>" class="form-control" placeholder="">
            </div>

            <div class="col-6">
              <label><?=trans('phone')?></label>
              <input type="text" name="phone" value="<?=isset($update_id)?$user->phone:''?>" class="form-control" placeholder="">
            </div>
          </div>

          <div class="row form-group">


            <div class="col-12">
              <label><?=trans('address')?></label>
              <textarea name="address" class="form-control" rows="3" placeholder=""><?=isset($update_id)?($user->address):''?></textarea>
            </div>
          </div>



          <?PHP
          $btn_save = trans('save');
          if (isset($update_id)):
            $btn_save = trans('update');
            ?>
            <input type="hidden" name="update_id" value="<?=isset($update_id)?$user->id:''?>">
            <?PHP endif;?>


            <div class="row form-group">
              <div class="col-12">
                <input type="submit" name="submit" value="<?=$btn_save.trans('user');?>" class="btn btn-info pull-right">
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>


        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
  </div>