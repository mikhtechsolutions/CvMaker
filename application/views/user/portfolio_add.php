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
          <a href="<?= base_url('user/portfolio'); ?>" class="btn btn-success"><i class="fa fa-list"></i><?=trans('list_portfolios')?></a>
        </div>
      </div>
      <!-- /.card-header -->
    </div>
    <div class="card">
      <div class="card-body">
        <div class="box-body">
          <!-- For Messages -->
          <?php $this->load->view('admin/includes/_messages.php') ?>
          
          <?php echo form_open_multipart(base_url('user/portfolio/add'), 'class="form-horizontal"');  ?>

          <div class="row form-group">
            <div class="col-6">
            <label for="exampleInputFile"><?=trans('project_image')?><?=IMAGE_FILE_TYPES?> (max, 150x150)</label>
            <div class="custom-file">
              <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile"><?=trans('choose_file')?></label>
              <span id="file_path_span"></span>
            </div>
            </div>

            <div class="col-6">
              <label><?=trans('project_category')?></label>
              <select name="cat_id" class="form-control">
                <option value=""><?=trans('select_category')?></option>
                <?php
                foreach($cats as $id=>$name):
                  ?>
                  <option value="<?= $id; ?>" <?=(isset($update_id) && $id == $portfolio->cat_id)?'selected=selected':''?>><?= $name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

          </div>

          <div class="row form-group">
            <div class="col-12">
              <?php if (isset($update_id)): ?>
                <img src="<?php echo base_url($portfolio->thumb) ?>"> <br><br>
              <?php endif ?>
            </div>
          </div>

          <div class="row form-group">
          <div class="col-12">
            <label><?=trans('project_name')?></label>
            <input type="text" name="project_name" value="<?=isset($update_id) && empty(old('project_name'))?$portfolio->project_name:old('project_name')?>" class="form-control" placeholder="">
          </div>
          </div>

          <div class="row form-group">
            <div class="col-12">
            <label><?=trans('project_url')?></label>
            <input type="text" name="project_url" value="<?=isset($update_id) && empty(old('project_url'))?$portfolio->project_url:old('project_url')?>" class="form-control" placeholder="">
          </div>
          </div>

          <div class="row ">
            <div class="col-6">
              <label><?=trans('from_date')?></label>
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
              </div>
              <input type="text" name="from_date" value="<?=isset($update_id) && empty(old('from_date'))?$portfolio->from_date:old('from_date')?>" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
              </div>
            </div>

            <div class="col-6">
              <label><?=trans('to_date')?></label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
              <input type="text" name="to_date" value="<?=isset($update_id) && empty(old('to_date'))?$portfolio->to_date:old('to_date')?>"
                  <?=isset($update_id)&& $portfolio->to_date=='0000-00-00'?'disabled':''?> id="to_date" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-6">&nbsp;</div>
            <div class="col-6"><input type="checkbox" name="is_present" id="is_present" class="minimal" <?=isset($update_id)&& $portfolio->to_date=='0000-00-00'?'checked':''?>> &nbsp; On Going<?=trans('')?></div>
          </div>

          <div class="row form-group">
            <div class="col-12">
            <label><?=trans('details')?></label>
            <textarea name="details"  class="form-control" rows="3" placeholder=""><?=isset($update_id) && empty(old('details'))?$portfolio->details:old('details')?></textarea>
          </div>
          </div>


          <div class="row form-group">
            <div class="col-6">
            <label><?=trans('order')?></label>
            <input type="number" name="order" value="<?=isset($update_id) && empty(old('order'))?$portfolio->order:old('order')?>" class="form-control" placeholder="">
            </div>

            <div class="col-6">
              <label><?=trans('status')?></label>
              <select name="status" class="form-control">
                <option value="1"><?=trans('active')?></option>
                <option value="0" <?=(isset($update_id) && $portfolio->status == 0)?'selected=selected':''?>><?=trans('deactive')?></option>
              </select>
            </div>
          </div>
          <input type="hidden" name="update_id" value="<?=isset($update_id)?$portfolio->id:''?>">

          <div class="form-group">
            <input type="submit" name="submit" value="<?=trans('save_portfolio')?>" class="btn btn-info pull-right">
          </div>
          <?php echo form_close(); ?>
        </div>


      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
</div>