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
                    <a href="<?= base_url('admin/languages/add'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Add New Language</a>
                </div>
            </div>
            <!-- /.card-header -->
        </div>
        <div class="card">
            <div class="card-body">
                <div class="box-body">
                    <div class="row form-group">
                        <div class="col-6">
                            <strong>Default Language:</strong>
                        </div>
                        <div class="col-4">
                                <?php echo form_open(base_url('admin/languages/set_default'), 'class="form-horizontal"');  ?>
                                <select class="form-control" name="default_lang_id">
                                    <?php foreach($languages as $language):?>
                                        <?php if($language->is_default): ?>
                                            <option value="<?= $language->id; ?>" selected> <?= $language->display_name; ?> </option>
                                        <?php else: ?>
                                            <option value="<?= $language->id; ?>"> <?= $language->display_name; ?> </option>
                                        <?php endif; endforeach; ?>
                                </select>
                        </div>
                        <div class="col-2 text-right">
                            <input type="submit" name="submit" value="Set Default" class="btn btn-info pull-right">
                        </div>
                        <?php echo form_close( ); ?>
                    </div>
                </div>
            </div>
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
                            <th>#</th>
                            <th>Display Name</th>
                            <th>Directory Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($languages as $language): ?>
                        <tr id="row_<?php echo html_escape($language->id); ?>">
                            <td><?=$i;?></td>

                            <td><?php echo html_escape($language->display_name); ?></td>
                            <td><?php echo html_escape($language->directory_name); ?></td>

                            <td class="actions" width="12%">
                                <a title="Edit" class="update btn btn-sm btn-warning" href="<?php echo base_url('admin/languages/edit/'.html_escape($language->id));?>"><i class="fa fa-pencil-square-o"></i></a>
                                &nbsp;
                                <a title="Delete" class="delete btn btn-sm btn-danger delete_item" data-link="<?=base_url('admin/languages/delete/'.html_escape($language->id));?>" data-id="<?php echo html_escape($language->id); ?>" href="#exampleModal" data-toggle="modal" data-placement="top" data-target="#exampleModal"> <i class="fa fa-trash-o"></i></a>
                                &nbsp;
                            </td>
                        </tr>

                        <?php $i++; endforeach; ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Display Name</th>
                            <th>Directory Name</th>
                            <th>Action</th>
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
                        <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Do you really want to delete this record?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary" id="btn_yes_delete">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>