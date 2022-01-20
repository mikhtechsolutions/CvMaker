<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap4.css"> 

<section class="content-wrapper">
  <section class="content">
    <!-- For Messages -->
    <?php $this->load->view('admin/includes/_messages') ?>
    <?php echo form_open('', 'class="form-horizontal"');  ?>
      <input type="hidden" id="delete_id" >
      <input type="hidden" id="delete_link" >
    <?php echo form_close(); ?>
    <div class="card card-default">

      <div class="card-header">
        <div class="d-inline-block">
            <h3 class="card-title"> <i class="fa fa-list"></i>
            &nbsp; <?= $title ?> </h3>
        </div>
        <div class="d-inline-block float-right">
          <a href="<?= base_url('admin/pages/add'); ?>" class="btn btn-success"><i class="fa fa-list"></i> <?= trans('add_new_page') ?></a>
        </div>
      </div>

      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>No.</th>
            <th><?= trans('page_name') ?></th>
            <th><?= trans('sort_order') ?></th>
            <th><?= trans('status') ?></th>
            <th style="width: 150px;"><?= trans('action') ?></th>
          </tr>
          </thead>
          <tbody>
            <?php $count=0; foreach($pages as $row):?>
            <tr>
              <td><?= ++$count; ?></td>
              <td><?= $row['title']; ?></td>
              <td><?= $row['sort_order']; ?></td>
              <td><?= ($row['is_active'] == 1)? '<span class="btn btn-success btn-xs">'.trans('active').'</span>': '<span class="btn btn-success btn-xs">'.trans('deactive').'</span>'; ?></td>
              <td>
              
              <a title="Edit" class="update btn btn-sm btn-warning" href="<?= base_url('admin/pages/edit/'.$row['id'])?>"> <i class="fa fa-pencil-square-o"></i></a>
              <a title="Delete" class="delete btn btn-sm btn-danger delete_item" data-link="<?= base_url('admin/pages/del/'.html_escape($row['id'])) ?>" data-id="<?= html_escape($row['id']) ?>" href="#exampleModal" data-toggle="modal" data-placement="top" data-target="#exampleModal"> <i class="fa fa-trash"></i></a>
              
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>  
</section>  

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
                <?=trans('delete_record_question')?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=trans('no')?></button>
                <button type="button" class="btn btn-primary" id="btn_yes_delete"><?=trans('yes')?></button>
            </div>
        </div>
    </div>
</div>

  <!-- DataTables -->

<script src="<?= base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap4.js"></script>
	<script>
  $(function () {
    $("#example1").DataTable();
  });
	</script>

  <script>
  $("#pages").addClass('active');
  </script>

