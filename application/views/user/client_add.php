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
          <a href="<?= base_url('user/clients'); ?>" class="btn btn-success"><i class="fa fa-list"></i><?=trans('list_clients')?></a>
        </div>
      </div>
      <!-- /.card-header -->
    </div>
    <div class="card">
      <div class="card-body">
        <div class="box-body">
          <!-- For Messages -->
          <?php $this->load->view('admin/includes/_messages.php') ?>

          <?php echo form_open_multipart(base_url('user/clients/add'), 'class="form-horizontal"');  ?>

          <div class="row form-group">
            <div class="col-12">
              <label class="control-label"><?=trans('client_name')?></label>
              <input type="text" name="client_name" value="<?=isset($update_id) && empty(old('client_name'))?$client->client_name:old('client_name')?>" class="form-control" placeholder="">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-12">
              <label class="control-label"><?=trans('url')?></label>
              <input type="text" placeholder="http://www.example.com" name="url" value="<?=isset($update_id) && empty(old('url'))?$client->url:old('url')?>" class="form-control">
            </div>
          </div>


          <div class="row form-group">
            <div class="col-6">
              <label for="exampleInputFile"><?=trans('client_image')?><?=IMAGE_FILE_TYPES?> (max, 150x150)</label>
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
                <option value="0" <?=(isset($update_id) && $client->status == 0)?'selected=selected':''?>><?=trans('deactive')?></option>
              </select>
            </div>

          </div>

          <div class="row form-group">
            <div class="col-12">
              <?php if (isset($update_id)): ?>
                <img src="<?php echo base_url($client->thumb) ?>"> <br><br>
              <?php endif ?>
            </div>
          </div>
          
          <input type="hidden" name="update_id" value="<?=isset($update_id)?$client->id:''?>">

          <div class="row">
            <div class="col-12">
              <input type="submit" name="submit" value="<?=isset($update_id)?trans('update'):trans('save')?><?=' '.trans('client');?>" class="btn btn-info pull-right">
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