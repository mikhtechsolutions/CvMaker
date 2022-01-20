<?php if(!isset($footer)): ?>

  <footer class="main-footer">
    <strong><?=$this->general_settings['copyright'];?></strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.5
    </div>
  </footer>

  <?php endif; ?>  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<!--
<script src="base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>-->
<!-- Slimscroll -->
<script src="<?= base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<!-- InputMask -->
<script src="<?= base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<script src="<?= base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>

<script src="<?= base_url() ?>assets/plugins/bootstrap-tags-input/bootstrap-tagsinput.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>

<script src="<?= base_url() ?>assets/plugins/notify/notify.min.js"></script>

<script>
  $(function () {
    //$("#example1").DataTable();

    $('#example1 tbody, #na_datatable tbody').on('click', '.delete_item', function () {
      $('#delete_id').val($(this).attr("data-id"))
      $('#delete_link').val($(this).attr("data-link"))
      return;

    });

    $("#btn_yes_delete").click(function () {
      window.location.href = $('#delete_link').val();
    });


    $('[data-mask]').inputmask()

    $('#is_present').click(function(){

      if($(this).prop("checked") == true){
        $("#to_date").prop("disabled", true);
      } else if($(this).prop("checked") == false){
        $("#to_date").prop("disabled", false);
      }

    });

    $('#blogForm').on('keyup keypress', function(e) {
      var keyCode = e.keyCode || e.which;
      if (keyCode === 13) {
        e.preventDefault();
        return false;
      }
    });

    $('#blog_description, #site_page_details').wysihtml5(
        {
          toolbar: { fa: true }
        }
    );

    $(document).on('change', ".profile_feature_disabled", function() {
      var status = ($(this).is(':checked') == true)?1:0;
      if (status) {
        alert('Feature available to Pro Users only.')
        $(this).bootstrapToggle('off');
      }
    });

    $(document).on('change', "input[id^='user_status_']", function() {
      var id = $(this).val();
      var status = ($(this).is(':checked') == true)?1:0;

      var url = '<?=base_url("admin/users/change_status") ?>';
      var data = {
        'id': id,
        'status': status
      };
      $.post(url,
          {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
            'data': data
          }, function(json) {
        if(json.success == 1){
          $.notify("<?=trans('user_status_change_success')?>", "success");
        } else {
          $.notify("<?=trans('user_status_change_failure')?>", "success");
        }
      },'json');
      return false;
    });

    $('input[type=file]').change(function () {
      var filePath=$('#exampleInputFile').val();
      $('#file_path_span').text(filePath)

      var filePath1 = $('#exampleInputFile1').val();
      $('#file_path_span1').text(filePath1)
    });

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })

  });
</script>
</body>
</html>
