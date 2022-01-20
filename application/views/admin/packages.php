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
                    <a href="<?= base_url('admin/packages/add_package'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?=trans('add_new_package')?></a>
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
                        <th><?=trans('type')?></th>
                        <th><?=trans('price')?></th>
                        <th><?=trans('status')?></th>
                        <th><?=trans('action')?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($packages as $package): ?>
                        <tr id="row_<?php echo html_escape($package->id); ?>">


                            <td><img width="100px" src="<?=($package->thumb != '')?base_url($package->thumb):base_url('/assets/dist/img/no-image.jpg'); ?>"></td>
                            <td><?php echo html_escape($package->name); ?></td>
                            <?php
                            $type = trans('free');
                            if ($package->type != 'F') {
                                $type = ($package->type == 'M')? trans('monthly'): trans('yearly');
                            }
                            ?>
                            <td><?=$type;?></td>
                            <td><?=$package->price?></td>

                            <td>
                                <?php
                                $arr = btn_active_deactive($package->is_active);
                                ?>
                                <button type="button" class="btn btn-sm <?=$arr['btn_class'];?>"><?=$arr['btn_label']?></button>
                            </td>

                            <td class="actions" width="12%" align="center">
                                <a title="<?=trans('edit')?>" class="update btn btn-sm btn-warning" href="<?php echo base_url('admin/packages/edit_package/'.html_escape($package->id));?>"><i class="fa fa-pencil-square-o"></i></a>

                                &nbsp;

                                <a title="<?= trans('delete') ?>" class="delete btn btn-sm btn-danger delete_item" data-link="<?= base_url('admin/packages/delete/'.html_escape($package->id)) ?>" data-id=" <?= html_escape($package->id) ?>" href="#exampleModal" data-toggle="modal" data-placement="top" data-target="#exampleModal"> <i class="fa fa-trash-o"></i></a>

                                &nbsp;
                            </td>
                        </tr>

                        <?php $i++; endforeach; ?>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th><?=trans('thumb')?></th>
                        <th><?=trans('name')?></th>
                        <th><?=trans('type')?></th>
                        <th><?=trans('price')?></th>
                        <th><?=trans('status')?></th>
                        <th><?=trans('action')?></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
</div>

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
                <?=trans('delete_package_question')?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=trans('no')?></button>
                <button type="button" class="btn btn-primary" id="btn_yes_delete"><?=trans('yes')?></button>
            </div>
        </div>
    </div>
</div>
