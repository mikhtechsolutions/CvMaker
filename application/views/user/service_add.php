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
          <a href="<?= base_url('user/services'); ?>" class="btn btn-success"><i class="fa fa-list"></i><?=trans('list_services')?></a>
        </div>
      </div>
      <!-- /.card-header -->
    </div>
    <div class="card">
      <div class="card-body">
        <div class="box-body">
          <!-- For Messages -->
          <?php $this->load->view('admin/includes/_messages.php') ;?>

          <?php echo form_open_multipart(base_url('user/services/add'), 'class="form-horizontal"');  ?>
          <div class="row form-group">
            <div class="col-6">
            <label class="control-label"><?=trans('service_name')?></label>
            <input type="text" name="service_name" value="<?=isset($update_id) && empty(old('service_name'))?$service->service_name:old('service_name')?>" class="form-control" placeholder="">
            </div>

            <div class="col-6">
              <label><?=trans('font_awesome')?></label>
              <input type="text" name="fa_class" value="<?=isset($update_id) && empty(old('fa_class'))?$service->fa_class:old('fa_class')?>" class="form-control" placeholder="e.g., fas fa-plane-departure" >
              <p><small><a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Fontawesome Icons</a></small></p>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-6">
            <label for="exampleInputFile"><?=trans('service_image')?><?=IMAGE_FILE_TYPES?> (max, 150x150)</label>
            <div class="custom-file">
              <input type="file" name="service_image" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile"><?=trans('choose_file')?></label>
              <span id="file_path_span"></span>
            </div>
            </div>

            <div class="col-6">
              <label><?=trans('status')?></label>
              <select name="status" class="form-control">
                <option value="1"><?=trans('active')?></option>
                <option value="0" <?=(isset($update_id) && $service->is_active == 0)?'selected=selected':''?>><?=trans('deactive')?></option>
              </select>
            </div>

          </div>
          <div class="row form-group">
            <div class="col-12">
              <?php if (isset($update_id)): ?>
                <img src="<?php echo base_url($service->thumb) ?>"> <br><br>
              <?php endif ?>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-12">
            <label><?=trans('service_details')?></label>
            <textarea name="details" class="form-control" rows="3" placeholder=""><?=isset($update_id) && empty(old('details'))?$service->details:old('details')?></textarea>
            </div>
          </div>
          <?PHP
          $btn_save = trans('save');
          if (isset($update_id)):
            $btn_save = trans('update');
            ?>
            <input type="hidden" name="update_id" value="<?=isset($update_id)?$service->id:''?>">
          <?PHP endif;?>


          <div class="row form-group">
            <div class="col-12">
            <input type="submit" name="submit" value="<?=$btn_save.trans('service');?>" class="btn btn-info pull-right">
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