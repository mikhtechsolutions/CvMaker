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
                    <a href="<?= base_url('user/skills/add_skill'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?=trans('add_skill')?></a>
                </div>
            </div>
            <!-- /.card-header -->
        </div>
        <div class="card">
            <div class="card-body">
                <div class="box-body">
                    <!-- For Messages -->
                    <?php $this->load->view('admin/includes/_messages.php') ?>

                <?php echo form_open(base_url('user/skills/add_subskill'), 'class="form-horizontal"');  ?>
                    <div class="row form-group">
                        <div class="col-12">
                        <label class="control-label"><?=trans('skill')?></label>
                            <?php $selected = ''; ?>
                        <select name="parent_id" class="form-control">
                            <option value=""><?=trans('select_skill')?></option>
                            <?php foreach($skills as $skill): ?>
                                <option value="<?= $skill->id; ?>" <?=(isset($update_id) && $subskill->parent_id == $skill->id)?'selected=selected':''?>><?= $skill->name; ?></option>
                            <?php
                                endforeach; ?>
                        </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-6">
                        <label class="control-label"><?=trans('subskill_name')?></label>
                        <input type="text" name="subskill" value="<?=isset($update_id) && empty(old('subskill'))?$subskill->name:old('subskill')?>" class="form-control" placeholder="e.g., PHP, Java, Android ...">
                        </div>
                        <div class="col-6">
                            <label class="control-label"><?=trans('subskill_level')?></label>
                            <select name="level" class="form-control">
                                <option value=""><?=trans('select_subskill_level')?></option>
                                <?php foreach($subskill_levels as $level => $label): ?>
                                    <option value="<?= $level; ?>" <?=(isset($update_id) && $subskill->skill_level == $level)?'selected=selected':''?>><?= $label; ?></option>
                                <?php
                                    endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-6">
                        <label><?=trans('order')?></label>
                        <input type="number" name="order" value="<?=isset($update_id) && empty(old('order'))?$subskill->order:old('order')?>" class="form-control" placeholder="">
                        </div>

                        <div class="col-6">
                            <label><?=trans('status')?></label>
                            <select name="status" class="form-control">
                                <option value="1"><?=trans('active')?></option>
                                <option value="0" <?=(isset($update_id) && $subskill->status == 0)?'selected=selected':''?>><?=trans('deactive')?></option>
                            </select>
                        </div>
                    </div>




                <div class="row">
                    <div class="col-12">
                        <input type="submit" name="submit" value="<?=trans('save')?>" class="btn btn-info pull-right">
                        </div>
                </div>
                    <input type="hidden" name="update_id" value="<?=isset($update_id)?$subskill->id:''?>">
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
                        <th><?=trans('subskill')?></th>
                        <th><?=trans('skill')?></th>
                        <th><?=trans('level')?></th>
                        <th><<?=trans('status')?>/th>
                        <th><?=trans('order')?></th>
                        <th><?=trans('action')?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($subskills as $subskill): ?>
                        <tr id="row_<?php echo html_escape($subskill->id); ?>">

                            <td><?php echo html_escape($subskill->name); ?></td>
                            <td><?php echo ($subskill->parent_skill); ?></td>
                            <td><?php echo $subskill->skill_level.'%'; ?></td>
                            <td>
                                <?php
                                    $arr = btn_active_deactive($subskill->status);
                                ?>
                                <button type="button" class="btn <?=$arr['btn_class'];?>"><?=$arr['btn_label']?></button>
                            </td>
                            <td><?php echo ($subskill->order); ?></td>

                            <td class="actions" width="12%">

                                <a title="<?=trans('edit')?>" class="update btn btn-sm btn-warning" href="<?php echo base_url('user/skills/edit_subskill/'.html_escape($subskill->id));?>"><i class="fa fa-pencil-square-o"></i></a>
                                &nbsp;
                                <a title="<?=trans('delete')?>" class="delete btn btn-sm btn-danger delete_item" data-link="<?=base_url('user/skills/delete_subskill/'.html_escape($subskill->id));?>" data-id="<?php echo html_escape($subskill->id); ?>" href="#exampleModal" data-toggle="modal" data-placement="top" data-target="#exampleModal"> <i class="fa fa-trash-o"></i></a>
                                &nbsp;

                                
                            </td>
                        </tr>

                        <?php $i++; endforeach; ?>

                    </tbody>

                    <tfoot>
                    <tr>
                        <th><?=trans('subskill')?></th>
                        <th><?=trans('skill')?></th>
                        <th><?=trans('level')?></th>
                        <th><<?=trans('status')?>/th>
                        <th><?=trans('order')?></th>
                        <th><?=trans('action')?></th>
                    </tr>
                    </tfoot>

                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

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