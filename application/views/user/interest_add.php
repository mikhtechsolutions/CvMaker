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
          <a href="<?= base_url('user/interest'); ?>" class="btn btn-success"><i class="fa fa-list"></i><?=trans('list_interests')?></a>
        </div>
      </div>
      <!-- /.card-header -->
    </div>
    <div class="card">
      <div class="card-body">
        <div class="box-body">
          <!-- For Messages -->
          <?php $this->load->view('admin/includes/_messages.php') ?>
          
          <?php echo form_open(base_url('user/interest/add'), 'class="form-horizontal"');  ?>

          <div class="row form-group">
            <div class="col-6">
            <label class="control-label"><?=trans('title')?></label>
            <input type="text" name="title" value="<?=isset($update_id) && empty(old('title'))?$interest->title:old('title')?>" class="form-control" placeholder="">
            </div>

            <div class="col-6">
               <label><?=trans('font_awesome')?></label>
               <input type="text" name="fa_class" value="<?=isset($update_id) && empty(old('fa_class'))?$interest->fa_class:old('fa_class')?>" class="form-control" placeholder="e.g., fas fa-plane-departure">
               <p><small><a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Fontawesome Icons</a></small></p>
            </div>
            
          </div>




          <div class="row form-group">
            <div class="col-12">
            <label><?=trans('details')?></label>
            <textarea name="details" class="form-control" rows="3" placeholder=""><?=isset($update_id) && empty(old('details'))?$interest->details:old('details')?></textarea>
          </div>
          </div>


          <div class="row form-group">
            <div class="col-6">
              <label><?=trans('order')?></label>
              <input type="number" name="order" value="<?=isset($update_id) && empty(old('order'))?$interest->order:old('order')?>" class="form-control" placeholder="">
            </div>

            <div class="col-6">
              <label><?=trans('status')?></label>
              <select name="status" class="form-control">
                <option value="1"><?=trans('active')?></option>
                <option value="0" <?=(isset($update_id) && $interest->status == 0)?'selected=selected':''?>><?=trans('deactive')?></option>
              </select>
            </div>
          </div>



         

          <div class="form-group">
            <input type="submit" name="submit" value="Save Interest" class="btn btn-info pull-right">
          </div>
          <input type="hidden" name="update_id" value="<?=isset($update_id)?$interest->id:''?>">
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