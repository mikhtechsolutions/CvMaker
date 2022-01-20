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
          <a href="<?= base_url('user/appointment'); ?>" class="btn btn-success"><i class="fa fa-list"></i><?=trans('list_appointments')?></a>
        </div>
      </div>
      <!-- /.card-header -->
    </div>
    <div class="card">
      <div class="card-body">
        <div class="box-body">
          <!-- For Messages -->
          <?php $this->load->view('admin/includes/_messages.php') ?>
          <?php echo form_open(base_url('user/appointment/add'), 'class="form-horizontal"');  ?>
          <div class="row">
              <div class="col-4">
                  <label class="form-label"><?=trans('day')?></label>
              </div>
              <div class="col-4">
                  <label class="form-label"><?=trans('from_time')?></label>
              </div>
              <div class="col-4">
                  <label class="form-label"><?=trans('to_time')?></label>
              </div>
          </div>


          <div class="row">
            <div class="col-4">
              <input class="form-input" type="checkbox" value="1" name="days[]" <?=isset($app_days[1])?'checked':''?>>
              <label class="form-label"><?=trans('saturday')?></label>
            </div>
            <div class="col-4">
              <input type="text" id="book_time_start" name="book_time_start_1" value="<?=empty(old('book_time_start_1')) && isset($app_days[1]) ?$app_days[1]['book_time_start']:old('book_time_start_1')?>" class="form-control timepicker">
            </div>
            <div class="col-4">
              <input type="text" id="book_time_end" name="book_time_end_1" value="<?=empty(old('book_time_end_1')) && isset($app_days[1])?$app_days[1]['book_time_end']:old('book_time_end_1')?>" class="form-control timepicker">
            </div>
          </div><br>


          <div class="row">
              <div class="col-4">
                  <input class="form-input" type="checkbox" value="2" name="days[]" <?=isset($app_days[2])?'checked':''?>>
                  <label class="form-label"><?=trans('sunday')?></label>
              </div>
              <div class="col-4">
                  <input type="text" id="book_time_start" name="book_time_start_2" value="<?=empty(old('book_time_start_2')) && isset($app_days[2]) ?$app_days[2]['book_time_start']:old('book_time_start_2')?>" class="form-control timepicker">
              </div>
              <div class="col-4">
                  <input type="text" id="book_time_end" name="book_time_end_2" value="<?=empty(old('book_time_end_2')) && isset($app_days[2])?$app_days[2]['book_time_end']:old('book_time_end_2')?>" class="form-control timepicker">
              </div>
          </div><br>

          <div class="row">
              <div class="col-4">
                  <input class="form-input" type="checkbox" value="3" name="days[]" <?=isset($app_days[3])?'checked':''?>>
                  <label class="form-label"><?=trans('monday')?></label>
              </div>
              <div class="col-4">
                  <input type="text" id="book_time_start" name="book_time_start_3" value="<?=empty(old('book_time_start_3')) && isset($app_days[3]) ?$app_days[3]['book_time_start']:old('book_time_start_3')?>" class="form-control timepicker">
              </div>
              <div class="col-4">
                  <input type="text" id="book_time_end" name="book_time_end_3" value="<?=empty(old('book_time_end_3')) && isset($app_days[3])?$app_days[3]['book_time_end']:old('book_time_end_3')?>" class="form-control timepicker">
              </div>
          </div><br>

          <div class="row">
              <div class="col-4">
                  <input class="form-input" type="checkbox" value="4" name="days[]" <?=isset($app_days[4])?'checked':''?>>
                  <label class="form-label"><?=trans('tuesday')?></label>
              </div>
              <div class="col-4">
                  <input type="text" id="book_time_start" name="book_time_start_4" value="<?=empty(old('book_time_start_4')) && isset($app_days[4]) ?$app_days[4]['book_time_start']:old('book_time_start_4')?>" class="form-control timepicker">
              </div>
              <div class="col-4">
                  <input type="text" id="book_time_end" name="book_time_end_4" value="<?=empty(old('book_time_end_4')) && isset($app_days[4])?$app_days[4]['book_time_end']:old('book_time_end_4')?>" class="form-control timepicker">
              </div>
          </div><br>

          <div class="row">
              <div class="col-4">
                  <input class="form-input" type="checkbox" value="5" name="days[]" <?=isset($app_days[5])?'checked':''?>>
                  <label class="form-label"><?=trans('wednesday')?></label>
              </div>
              <div class="col-4">
                  <input type="text" id="book_time_start" name="book_time_start_5" value="<?=empty(old('book_time_start_5')) && isset($app_days[5]) ?$app_days[5]['book_time_start']:old('book_time_start_5')?>" class="form-control timepicker">
              </div>
              <div class="col-4">
                  <input type="text" id="book_time_end" name="book_time_end_5" value="<?=empty(old('book_time_end_5')) && isset($app_days[5])?$app_days[5]['book_time_end']:old('book_time_end_5')?>" class="form-control timepicker">
              </div>
          </div><br>

          <div class="row">
              <div class="col-4">
                  <input class="form-input" type="checkbox" value="6" name="days[]" <?=isset($app_days[6])?'checked':''?>>
                  <label class="form-label"><?=trans('thursday')?></label>
              </div>
              <div class="col-4">
                  <input type="text" id="book_time_start" name="book_time_start_6" value="<?=empty(old('book_time_start_6')) && isset($app_days[6]) ?$app_days[6]['book_time_start']:old('book_time_start_6')?>" class="form-control timepicker">
              </div>
              <div class="col-4">
                  <input type="text" id="book_time_end" name="book_time_end_6" value="<?=empty(old('book_time_end_6')) && isset($app_days[6])?$app_days[6]['book_time_end']:old('book_time_end_6')?>" class="form-control timepicker">
              </div>
          </div><br>

          <div class="row">
              <div class="col-4">
                  <input class="form-input" type="checkbox" value="7" name="days[]" <?=isset($app_days[7])?'checked':''?>>
                  <label class="form-label"><?=trans('friday')?></label>
              </div>
              <div class="col-4">
                  <input type="text" id="book_time_start" name="book_time_start_7" value="<?=empty(old('book_time_start_7')) && isset($app_days[7]) ?$app_days[7]['book_time_start']:old('book_time_start_7')?>" class="form-control timepicker">
              </div>
              <div class="col-4">
                  <input type="text" id="book_time_end" name="book_time_end_7" value="<?=empty(old('book_time_end_7')) && isset($app_days[7])?$app_days[7]['book_time_end']:old('book_time_end_7')?>" class="form-control timepicker">
              </div>
          </div><br>
          <input type="hidden" name="update_id" value="<?=isset($update_id)?$app->id:''?>">
          <div class="row">
              <div class="col-12">
                  <input type="submit" name="submit" value="<?=trans('save_slots')?>" class="btn btn-info pull-right">
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