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
            </div>
            <!-- /.card-header -->
        </div>
        <!-- For Messages -->
        <?php $this->load->view('admin/includes/_messages.php') ?>
        <div class="card">
            <div class="card-body">
                <!-- For Messages -->
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th><?=trans('image')?></th>
                        <th><?=trans('name')?></th>
                        <th><?=trans('type')?></th>
                        <th><?=trans('price')?></th>
                        <th><?=trans('expiry_date')?></th>
                        <th><?=trans('remaining_days')?></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr id="row_<?php echo html_escape($package->id); ?>">
                            <td><img width="100px" src="<?=($package->thumb != '')?base_url($package->thumb):base_url('/assets/dist/img/no-image.jpg'); ?>"></td>
                            <td><?php echo html_escape($package->name); ?></td>
                            <td><?php echo package_type_label($package->type); ?></td>
                            <td><?php echo ($package->price); ?></td>
                            <td><?= ($package->expiry_date == '0000-00-00')? 'Never' : date_time($package->expiry_date); ?></td>
                            <td><?=$package->remaining_days?></td>

                        </tr>

                    </tbody>

                    <tfoot>
                    <tr>
                        <th><?=trans('image')?></th>
                        <th><?=trans('name')?></th>
                        <th><?=trans('type')?></th>
                        <th><?=trans('price')?></th>
                        <th><?=trans('expiry_date')?></th>
                        <th><?=trans('remaining_days')?></th>
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