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
          <a href="<?= base_url('user/portfolio'); ?>" class="btn btn-success"><i class="fa fa-list"></i><?=trans('list_projects')?></a>
        </div>
      </div>
      </div>
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <div class="box-body">
          <!-- For Messages -->
          <?php $this->load->view('admin/includes/_messages.php') ?>

          <?php echo form_open(base_url('user/portfolio/add_cat'), 'class="form-horizontal"');  ?>

          <div class="row form-group">
            <div class="col-12">
            <label class="control-label"><?=trans('category_name')?></label>
            <input type="text" name="name" value="<?=isset($update_id) && empty(old('name'))?$cat->name:old('name')?>" class="form-control" placeholder="">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-12">
            <label><?=trans('status')?></label>
            <select name="status" class="form-control">
              <option value="1"><?=trans('active')?></option>
              <option value="0" <?=(isset($update_id) && $cat->status == 0)?'selected=selected':''?>><?=trans('deactive')?></option>
            </select>
            </div>

          </div>



          <div class="row">
            <div class="col-12">
            <input type="submit" name="submit" value="<?=trans('save_category')?>" class="btn btn-info pull-right">
            </div>
          </div>
          <input type="hidden" name="update_id" value="<?=isset($update_id)?$cat->id:''?>">
          <?php echo form_close(); ?>

          <?php echo form_open('', 'class="form-horizontal"');  ?>
          <input type="hidden" id="delete_id" >
          <input type="hidden" id="delete_link" >
          <?php echo form_close(); ?>

        </div>
        <br><br>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th><?=trans('category')?></th>
            <th><?=trans('status')?></th>
            <th><?=trans('action')?></th>
          </tr>
          </thead>
          <tbody>
          <?php $i=1; foreach ($cats as $cat): ?>
            <tr id="row_<?php echo html_escape($cat->id); ?>">

              <td><?php echo $i; ?></td>
              <td><?php echo html_escape($cat->name); ?></td>
              <td>
                <?php
                $arr = btn_active_deactive($cat->status);
                ?>
                <button type="button" class="btn <?=$arr['btn_class'];?>"><?=$arr['btn_label']?></button>
              </td>

              <td class="actions" width="12%">
                <a title="<?=trans('edit')?>" class="update btn btn-sm btn-warning" href="<?php echo base_url('user/portfolio/edit_cat/'.html_escape($cat->id));?>"><i class="fa fa-pencil-square-o"></i></a>
                &nbsp;
                <a title="<?=trans('delete')?>" class="delete btn btn-sm btn-danger delete_item" data-link="<?=base_url('user/portfolio/delete_cat/'.html_escape($cat->id));?>" data-id="<?php echo html_escape($cat->id); ?>" href="#exampleModal" data-toggle="modal" data-placement="top" data-target="#exampleModal"> <i class="fa fa-trash-o"></i></a>
                &nbsp;
              </td>
            </tr>

            <?php $i++; endforeach; ?>

          </tbody>
          <tfoot>
          <tr>
            <th>#</th>
            <th><?=trans('skill')?></th>
            <th><?=trans('status')?></th>
            <th><?=trans('action')?></th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?=trans('warning')?>!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?=trans('delete_record_question')?>?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=trans('no')?></button>
            <button type="button" class="btn btn-primary" id="btn_yes_delete"><?=trans('yes')?></button>
          </div>
        </div>
      </div>
    </div>

  </section>
</div>
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
  $('#example1').DataTable();
</script>