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
                    <a href="<?=base_url('admin/users/add_user'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?=trans('add_new_user')?></a>
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
            <div class="card-body table-responsive">
                <table id="na_datatable" class="table dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?=trans('thumb')?></th>
                        <th><?=trans('user_name')?></th>
                        <th><?=trans('email')?></th>
                        <th><?=trans('phone')?></th>
                        <th><?=trans('created_date')?></th>
                        <th><?=trans('user_profile')?></th>
                        <th><?=trans('status')?></th>
                        <th><?=trans('action')?></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
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
        

        <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>

        <script>
            //---------------------------------------------------
            var table = $('#na_datatable').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "<?=base_url('admin/users/user_datatable')?>",
                "order": [[5,'desc']],
                "columnDefs": [
                    { "targets": 0, "name": "id", 'searchable':true, 'orderable':false},
                    { "targets": 1,
                        "name": "thumb",
                        'searchable':false,
                        'orderable':false,
                        "data": "img",
                        "render" : function ( url, type, full) {
                            return '<img width="100px" src="'+full[1]+'"/>';
                        }

                    },
                    { "targets": 2, "name": "username", 'searchable':true, 'orderable':true},
                    { "targets": 3, "name": "email", 'searchable':true, 'orderable':true},
                    { "targets": 4, "name": "phone", 'searchable':true, 'orderable':true},
                    { "targets": 5, "name": "created_date", 'searchable':false, 'orderable':false},
                    { "targets": 6, "name": "UserProfile", 'searchable':false, 'orderable':false},
                    { "targets": 7, "name": "is_active", 'searchable':false, 'orderable':false},
                    { "targets": 8, "name": "Action", 'searchable':false, 'orderable':false}
                ]
            });
        </script>
    </section>
</div>
