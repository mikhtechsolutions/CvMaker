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
          <a href="<?= base_url('user/reference'); ?>" class="btn btn-success"><i class="fa fa-list"></i><?=trans('list_references')?></a>
        </div>
      </div>
      <!-- /.card-header -->
    </div>
    <div class="card">
      <div class="card-body">
        <div class="box-body">
          <!-- For Messages -->
          <?php $this->load->view('admin/includes/_messages.php') ?>
          
          <?php echo form_open(base_url('user/reference/add'), 'class="form-horizontal"');  ?>

          <div class="row form-group">
            <div class="col-12">
            <label class="control-label"><?=trans('reference_name')?></label>
            <input type="text" name="name" value="<?=isset($update_id) && empty(old('name'))?$reference->name:old('name')?>" class="form-control" placeholder="">
          </div>
            
          </div>

          <div class="row form-group">
            <div class="col-6">
              <label><?=trans('reference_phone')?></label>
              <input type="text" name="phone" value="<?=isset($update_id) && empty(old('phone'))?$reference->phone:old('phone')?>" class="form-control" placeholder="">
            </div>

            <div class="col-6">
              <label class="control-label"><?=trans('reference_email')?></label>
              <input type="email" name="email" value="<?=isset($update_id) && empty(old('email'))?$reference->email:old('email')?>" class="form-control" placeholder="">
            </div>

          </div>




          <div class="row form-group">
            <div class="col-12">
            <label><?=trans('details')?></label>
            <textarea name="details" class="form-control" rows="3" placeholder=""><?=isset($update_id) && empty(old('details'))?$reference->details:old('details')?></textarea>
          </div>
          </div>


          <div class="row form-group">
            <div class="col-6">
              <label><?=trans('order')?></label>
              <input type="number" name="order" value="<?=isset($update_id) && empty(old('order'))?$reference->order:old('order')?>" class="form-control" placeholder="">
            </div>

            <div class="col-6">
              <label><?=trans('status')?></label>
              <select name="status" class="form-control">
                <option value="1"><?=trans('active')?></option>
                <option value="0" <?=(isset($update_id) && $reference->status == 0)?'selected=selected':''?>><?=trans('deactive')?></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="<?=trans('save_reference')?>" class="btn btn-info pull-right">
          </div>
          <input type="hidden" name="update_id" value="<?=isset($update_id)?$reference->id:''?>">
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