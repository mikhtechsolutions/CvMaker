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
          <a href="<?= base_url('user/education'); ?>" class="btn btn-success"><i class="fa fa-list"></i><?=trans('list_degrees')?></a>
        </div>
      </div>
      <!-- /.card-header -->
    </div>
    <div class="card">
      <div class="card-body">
        <div class="box-body">
          <!-- For Messages -->
          <?php $this->load->view('admin/includes/_messages.php') ?>
          
          <?php echo form_open(base_url('user/education/add'), 'class="form-horizontal"');  ?>

          <div class="row form-group">
            <div class="col-12">
            <label class="control-label"><?=trans('degree_title')?></label>
            <input type="text" name="degree_name" value="<?=isset($update_id) && empty(old('degree_name'))?$education->degree_name:old('degree_name')?>" class="form-control" placeholder="">
          </div>
          </div>

          <div class="row form-group">
            <div class="col-12">
            <label class="control-label"><?=trans('institute')?></label>
            <input type="text" name="institution_name" value="<?=isset($update_id) && empty(old('institution_name'))?$education->institution_name:old('institution_name')?>" class="form-control" placeholder="">
          </div>
          </div>

          <div class="row">
            <div class="col-6">
            <label class="control-label"><?=trans('from_date')?></label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" name="from_date" value="<?=isset($update_id) && empty(old('from_date'))?$education->from_date:old('from_date')?>" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
              </div>
            </div>

            <div class="col-6">
              <label><?=trans('to_date')?></label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" name="to_date" value="<?=isset($update_id) && empty(old('to_date'))?$education->to_date:old('to_date')?>"
                       <?=isset($update_id)&& $education->to_date=='0000-00-00'?'disabled':''?> id="to_date" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-6">&nbsp;</div>
            <div class="col-6"><input type="checkbox" name="is_present" id="is_present" class="minimal" <?=isset($update_id)&& $education->to_date=='0000-00-00'?'checked':''?>> &nbsp; <?=trans('currently_present')?></div>
          </div>



          <div class="row form-group">
            <div class="col-12">
            <label><?=trans('details')?></label>
            <textarea name="details" class="form-control" rows="3" placeholder=""><?=isset($update_id) && empty(old('details'))?$education->details:old('details')?></textarea>
          </div>
          </div>


          <div class="row form-group">
            <div class="col-6">
              <label><?=trans('order')?></label>
              <input type="number" name="order" value="<?=isset($update_id) && empty(old('order'))?$education->order:old('order')?>" class="form-control" placeholder="">
            </div>

            <div class="col-6">
              <label><?=trans('status')?></label>
              <select name="status" class="form-control">
                <option value="1"><?=trans('active')?></option>
                <option value="0" <?=(isset($update_id) && $education->status == 0)?'selected=selected':''?>><?=trans('deactive')?></option>
              </select>
            </div>
          </div>



         

          <div class="form-group">
            <input type="submit" name="submit" value="<?=trans('save_education')?>" class="btn btn-info pull-right">
          </div>
          <input type="hidden" name="update_id" value="<?=isset($update_id)?$education->id:''?>">
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