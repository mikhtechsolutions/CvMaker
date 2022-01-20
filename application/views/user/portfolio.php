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
                    <a href="<?= base_url('user/portfolio/add_cat'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?=trans('add_category')?></a>
                    <a href="<?= base_url('user/portfolio/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?=trans('add_portfolio')?></a>
                </div>
            </div>
            <!-- /.card-header -->
        </div>
        <!-- For Messages -->
        <?php $this->load->view('admin/includes/_messages.php') ?>
        <?php echo form_open('', 'class="form-horizontal"');  ?>
        <input type="hidden" id="delete_id" >
        <input type="hidden" id="delete_link" >
        <?php echo form_close(); ?>

        <div class="card">
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><?=trans('thumb')?></th>
                            <th><?=trans('name')?></th>
                            <th><?=trans('url')?></th>
                            <th><?=trans('category')?></th>
                            <th><?=trans('details')?></th>
                            <th><?=trans('from_to')?></th>
                            <th><?=trans('status')?></th>
                            <th><?=trans('action')?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($portfolios as $portfolio): ?>
                        <tr id="row_<?php echo html_escape($portfolio->id); ?>">

                            <td><img width="100px" src="<?=($portfolio->thumb != '')?base_url($portfolio->thumb):base_url('/assets/dist/img/no-image.jpg'); ?>"></td>
                            <td><?php echo html_escape($portfolio->project_name); ?></td>
                            <td><?php echo $portfolio->project_url; ?></td>
                            <td><?php echo $portfolio->cat_name; ?></td>
                            <td><?php echo character_limiter($portfolio->details, 80); ?></td>
                            <td><?php echo date_time($portfolio->from_date); ?> &nbsp;- &nbsp; <?=$portfolio->to_date=='0000-00-00'?'On Going':date_time($portfolio->to_date)?></td>
                            <td>
                                <?php
                                $arr = btn_active_deactive($portfolio->status);
                                ?>
                                <button type="button" class="btn <?=$arr['btn_class'];?>"><?=$arr['btn_label']?></button>
                            </td>

                            <td class="actions" width="12%">
                                <a title="<?=trans('edit')?>" class="update btn btn-sm btn-warning" href="<?php echo base_url('user/portfolio/edit/'.html_escape($portfolio->id));?>"><i class="fa fa-pencil-square-o"></i></a>
                                &nbsp;
                                <a title="<?=trans('delete')?>" class="delete btn btn-sm btn-danger delete_item" data-link="<?=base_url('user/portfolio/delete/'.html_escape($portfolio->id));?>" data-id="<?php echo html_escape($portfolio->id); ?>" href="#exampleModal" data-toggle="modal" data-placement="top" data-target="#exampleModal"> <i class="fa fa-trash-o"></i></a>
                                &nbsp;
                            </td>
                        </tr>

                        <?php $i++; endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th><?=trans('thumb')?></th>
                            <th><?=trans('name')?></th>
                            <th><?=trans('url')?></th>
                            <th><?=trans('category')?></th>
                            <th><?=trans('details')?></th>
                            <th><?=trans('from_to')?></th>
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