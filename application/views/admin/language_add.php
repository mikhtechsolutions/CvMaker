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
          <a href="<?= base_url('admin/languages'); ?>" class="btn btn-success"><i class="fa fa-list"></i>List Languages</a>
        </div>
      </div>
      <!-- /.card-header -->
    </div>
    <div class="card">
      <div class="card-body">
        <div class="box-body">
          <!-- For Messages -->
          <?php $this->load->view('admin/includes/_messages.php') ;?>

          <?php echo form_open_multipart(base_url('admin/languages/add'), 'class="form-horizontal"');  ?>
          <div class="row form-group">
            <div class="col-6">
              <label class="control-label">Display Name</label>
              <input type="text" name="display_name" value="<?=isset($update_id) && empty(old('display_name'))?$language->display_name:old('display_name')?>" class="form-control" placeholder="">
            </div>

            <div class="col-6">
              <label class="control-label">Directory Name</label>
              <input type="text" name="directory_name" value="<?=isset($update_id) && empty(old('directory_name'))?$language->directory_name:old('directory_name')?>" class="form-control" placeholder="">
            </div>
          </div>

          <?PHP
          $btn_save = 'Save';
          if (isset($update_id)):
            $btn_save = 'Update';
            ?>
            <input type="hidden" name="update_id" value="<?=isset($update_id)?$language->id:''?>">
            <?PHP endif;?>


            <div class="row form-group">
              <div class="col-12">
                <input type="submit" name="submit" value="<?=$btn_save.' Language';?>" class="btn btn-info pull-right">
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