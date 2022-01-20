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
          <a href="<?= base_url('admin/packages'); ?>" class="btn btn-success"><i class="fa fa-list"></i><?=trans('list_packages')?></a>
        </div>
      </div>
      <!-- /.card-header -->
    </div>
    <div class="card">
      <div class="card-body">
        <div class="box-body">
          <!-- For Messages -->
          <?php $this->load->view('admin/includes/_messages.php') ?>

          <?php echo form_open_multipart(base_url('admin/packages/add_package'), 'class="form-horizontal"');  ?>
          <div class="row form-group">
            <div class="col-6">
            <label><?=trans('name')?></label>
            <input type="text" name="name" value="<?=isset($update_id)?$package->name:''?>" class="form-control" placeholder="">
            </div>

            <div class="col-6">
              <label><?=trans('type')?></label>
              <select name="type" class="form-control">
                <option value="F">Free</option>
                <option value="M" <?=(isset($update_id) && $package->type == 'M')?'selected=selected':''?>><?=trans('monthly')?></option>
                <option value="Y" <?=(isset($update_id) && $package->type == 'Y')?'selected=selected':''?>><?=trans('yearly')?></option>
              </select>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-6">
              <label><?=trans('price')?></label>
              <input type="number" name="price" value="<?=isset($update_id)?$package->price:''?>" class="form-control" placeholder="">
            </div>

            <div class="col-6">
              <label><?=trans('status')?></label>
              <select name="is_active" class="form-control">
                <option value="1"><?=trans('active')?></option>
                <option value="0" <?=(isset($update_id) && $package->is_active == 0)?'selected=selected':''?>><?=trans('deactive')?></option>
              </select>
            </div>

          </div>

          <div class="row form-group">
            <div class="col-12">
              <label for="exampleInputFile"><?=trans('image')?></label>
              <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile"><?=trans('choose_file')?></label>
                <span id="file_path_span"></span>
              </div>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-12">
              <?php if (isset($update_id)): ?>
                <img src="<?php echo base_url($package->thumb) ?>"> <br><br>
              <?php endif ?>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-12">
              <label><?=trans('features')?>:</label><br>
            </div>
          </div>
          <div class="row">
            <?php
            foreach ($features as $id => $name):
              ?>
            <div class="col-3" style="margin-bottom: 2em;">
              <input type="checkbox" <?=(isset($package_features) && in_array($id, $package_features))? 'checked':''?> value="<?=$id?>" name="features[]" data-toggle="toggle">
              <label class="form-check-label" style="margin-left: 2.5em"><b><?=$name?></b></label>
            </div><br><br>
              <?php
            endforeach;
            ?>
          </div>


          <?PHP
          $btn_save = trans('save');
          if (isset($update_id)):
            $btn_save = 'Update';
            ?>
            <input type="hidden" name="update_id" value="<?=isset($update_id)?$package->id:''?>">
          <?PHP endif;?>


          <div class="row form-group">
            <div class="col-12">
            <input type="submit" name="submit" value="<?=$btn_save.' Package';?>" class="btn btn-info pull-right">
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