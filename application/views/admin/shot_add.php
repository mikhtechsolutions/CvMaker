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
          <a href="<?= base_url('admin/screen_shots'); ?>" class="btn btn-success"><i class="fa fa-list"></i><?=trans('list_shots')?></a>
        </div>
      </div>
      <!-- /.card-header -->
    </div>
    <div class="card">
      <div class="card-body">
        <div class="box-body">
          <!-- For Messages -->
          <?php $this->load->view('admin/includes/_messages.php') ?>

          <?php echo form_open_multipart(base_url('admin/screen_shots/add_shot'), 'class="form-horizontal"');  ?>
          <div class="row form-group">
            <div class="col-12">
              <label><?=trans('title')?></label>
              <input type="text" name="title" value="<?=isset($update_id)?$shot->title:''?>" class="form-control" placeholder="">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-6">
              <label for="exampleInputFile"><?=trans('screen_shot')?></label>
              <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile"><?=trans('choose_file')?></label>
                <span id="file_path_span"></span>
              </div>
            </div>

            <div class="col-6">
              <label><?=trans('status')?></label>
              <select name="status" class="form-control">
                <option value="1"><?=trans('active')?></option>
                <option value="0" <?=(isset($update_id) && $shot->is_active == 0)?'selected=selected':''?>><?=trans('deactive')?></option>
              </select>
            </div>

          </div>
          <div class="row form-group">
            <div class="col-12">
              <?php if (isset($update_id)): ?>
                <img src="<?php echo base_url($shot->thumb) ?>"> <br><br>
              <?php endif ?>
            </div>
          </div>


          <?PHP
          $btn_save = trans('save');
          if (isset($update_id)):
            $btn_save = trans('update');
            ?>
            <input type="hidden" name="update_id" value="<?=isset($update_id)?$shot->id:''?>">
            <?PHP endif;?>


            <div class="row form-group">
              <div class="col-12">
                <input type="submit" name="submit" value="<?=$btn_save.trans('shot');?>" class="btn btn-info pull-right">
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