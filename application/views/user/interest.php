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
                    <a href="<?= base_url('user/interest/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?=trans('add_interest')?></a>
                </div>
            </div>
            <!-- /.card-header -->
        </div>
        <?php echo form_open('', 'class="form-horizontal"');  ?>
        <input type="hidden" id="delete_id" >
        <input type="hidden" id="delete_link" >
        <?php echo form_close(); ?>
        <div class="card">
            <div class="card-body">
                <!-- For Messages -->
                <?php $this->load->view('admin/includes/_messages.php') ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th><?=trans('title')?></th>
                        <th><?=trans('details')?></th>
                        <th><?=trans('order')?></th>
                        <th><?=trans('status')?></th>
                        <th><?=trans('action')?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($interests as $interest): ?>
                        <tr id="row_<?php echo html_escape($interest->id); ?>">

                            <td><?php echo html_escape($interest->title); ?></td>
                            <td><?php echo character_limiter($interest->details, 80); ?></td>
                            <td><?php echo ($interest->order); ?></td>
                            <td>
                                <?php
                                $arr = btn_active_deactive($interest->status);
                                ?>
                                <button type="button" class="btn <?=$arr['btn_class'];?>"><?=$arr['btn_label']?></button>
                            </td>
                            <td class="actions" width="12%">

                                <a title="<?=trans('edit')?>" class="update btn btn-sm btn-warning" href="<?php echo base_url('user/interest/edit/'.html_escape($interest->id));?>"><i class="fa fa-pencil-square-o"></i></a>
                                &nbsp;
                                <a title="<?=trans('delete')?>" class="delete btn btn-sm btn-danger delete_item" data-link="<?=base_url('user/interest/delete/'.html_escape($interest->id));?>" data-id="<?php echo html_escape($interest->id); ?>" href="#exampleModal" data-toggle="modal" data-placement="top" data-target="#exampleModal"> <i class="fa fa-trash-o"></i></a>
                                &nbsp;
                                
                            </td>
                        </tr>

                        <?php $i++; endforeach; ?>

                    </tbody>

                    <tfoot>
                    <tr>
                        <th><?=trans('title')?></th>
                        <th><?=trans('details')?></th>
                        <th><?=trans('order')?></th>
                        <th><?=trans('status')?></th>
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