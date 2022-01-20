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
                            <th><?=trans('method')?></th>
                            <th><?=trans('txn_id')?></th>
                            <th><?=trans('user')?></th>
                            <th><?=trans('currency')?></th>
                            <th><?=trans('amount')?></th>
                            <th><?=trans('status')?></th>
                            <th><?=trans('payout_date')?></th>
                            <th><?=trans('package')?></th>
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
        "ajax": "<?=base_url('admin/packages/payments_dt')?>",
        "order": [[7,'desc']],
        "columnDefs": [
            { "targets": 0, "name": "`a`.id", 'searchable':true, 'orderable':true},
            { "targets": 1, "name": "payment_method", 'searchable':true, 'orderable':true},
            { "targets": 2, "name": "txn_id", 'searchable':true, 'orderable':true},
            { "targets": 3, "name": "User", 'searchable':false, 'orderable':true},
            { "targets": 4, "name": "currency", 'searchable':true, 'orderable':true},
            { "targets": 5, "name": "payment_amount", 'searchable':true, 'orderable':true},
            { "targets": 6, "name": "payment_status", 'searchable':true, 'orderable':true},
            { "targets": 7, "name": "payment_date", 'searchable':false, 'orderable':false},
            { "targets": 8, "name": "Package", 'searchable':false, 'orderable':false}
        ]
    });
</script>