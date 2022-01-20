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
                    <a href="<?= base_url('user/experience/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?=trans('add_experience')?></a>
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
                        <th><?=trans('job_title')?></th>
                        <th><?=trans('company')?></th>
                        <th><?=trans('from_to')?></th>
                        <th><?=trans('details')?></th>
                        <th><?=trans('order')?></th>
                        <th><?=trans('status')?></th>
                        <th><?=trans('action')?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($experiences as $experience): ?>
                        <tr id="row_<?php echo html_escape($experience->id); ?>">

                            <td><?php echo html_escape($experience->job_title); ?></td>
                            <td><?php echo ($experience->company_name); ?></td>
                            <td><?php echo date_time($experience->from_date); ?> &nbsp;- &nbsp; <?=$experience->to_date=='0000-00-00'?'Present':date_time($experience->to_date)?></td>
                            <td><?php echo character_limiter($experience->details, 80); ?></td>
                            <td><?php echo ($experience->order); ?></td>
                            <td>
                                <?php
                                $arr = btn_active_deactive($experience->status);
                                ?>
                                <button type="button" class="btn <?=$arr['btn_class'];?>"><?=$arr['btn_label']?></button>

                            </td>
                            <td class="actions" width="12%">
                                <a href="<?php echo base_url('user/experience/edit/'.html_escape($experience->id));?>" class="on-default edit-row" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a> &nbsp;

                                <a id="delete_ico" data-link="<?=base_url('user/experience/delete/'.html_escape($experience->id));?>" data-id="<?php echo html_escape($experience->id); ?>" href="#exampleModal" class="on-default remove-row delete_item" data-toggle="modal" data-placement="top"
                                   title="<?=trans('delete')?>" data-target="#exampleModal"><i class="fa fa-trash-o"></i></a> &nbsp;
                            </td>
                        </tr>

                        <?php $i++; endforeach; ?>

                    </tbody>

                    <tfoot>
                    <tr>
                        <th><?=trans('job_title')?></th>
                        <th><?=trans('company')?></th>
                        <th><?=trans('from_to')?></th>
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