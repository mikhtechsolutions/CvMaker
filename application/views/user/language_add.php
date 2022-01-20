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
          <a href="<?= base_url('user/language'); ?>" class="btn btn-success"><i class="fa fa-list"></i><?=trans('list_languages')?></a>
        </div>
      </div>
      <!-- /.card-header -->
    </div>
    <div class="card">
      <div class="card-body">
        <div class="box-body">
          <!-- For Messages -->
          <?php $this->load->view('admin/includes/_messages.php') ?>
          
          <?php echo form_open(base_url('user/language/add'), 'class="form-horizontal"');  ?>

          <div class="row form-group">
            <div class="col-6">
            <label class="control-label"><?=trans('title')?></label>
            <input type="text" name="title" value="<?=isset($update_id) && empty(old('title'))?$language->title:old('title')?>" class="form-control" placeholder="">
          </div>

            <div class="col-6">
              <label class="control-label"><?=trans('level')?></label>
              <select name="level" class="form-control">
                <option value="">Select Language Lavel</option>
                <?php foreach($language_levels as $level => $label): ?>
                  <option value="<?= $level; ?>" <?=(isset($update_id) && $language->level == $level)?'selected=selected':''?>><?= $label; ?></option>
                  <?php
                endforeach; ?>
              </select>
            </div>
            
          </div>

          <div class="row form-group">
            <div class="col-6">
              <label><?=trans('order')?></label>
              <input type="number" name="order" value="<?=isset($update_id) && empty(old('order'))?$language->order:old('order')?>" class="form-control" placeholder="">
            </div>

            <div class="col-6">
              <label><?=trans('status')?></label>
              <select name="status" class="form-control">
                <option value="1"><?=trans('active')?></option>
                <option value="0" <?=(isset($update_id) && $language->status == 0)?'selected=selected':''?>><?=trans('deactive')?></option>
              </select>
            </div>
          </div>



         

          <div class="form-group">
            <input type="submit" name="submit" value="<?=trans('save_language')?>" class="btn btn-info pull-right">
          </div>
          <input type="hidden" name="update_id" value="<?=isset($update_id)?$language->id:''?>">
          <?php echo form_close(); ?>

          <?php echo form_open('', 'class="form-horizontal"');  ?>
          <input type="hidden" id="delete_id" >
          <input type="hidden" id="delete_link" >
          <?php echo form_close(); ?>
          
        </div>


      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
</div>