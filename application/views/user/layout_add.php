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
    <div class="card">
      <div class="card-body">
        <div class="box-body">
          <!-- For Messages -->
          <?php $this->load->view('admin/includes/_messages.php') ?>
          
          <?php echo form_open(base_url('user/layouts'), 'class="form-horizontal"');  ?>

          <div class="row form-group">
          <?php
          $iter = 0;
          foreach ($layouts as $layout):
            if ($iter %3 == 0 && $iter > 0):
                ?>
                </div>
                <div class="row form-group">
                <?php
            endif;
                ?>
                <div class="col-4" align="center" >
                    <label><?=$layout->name?></label> <br>
                    <img style="border: 1px solid" width="200" height="100" src="<?php echo base_url($layout->thumb)?>"> <br>
                    <input type="radio" name="layout_id" value="<?=$layout->id?>" <?=($user_layout_id == $layout->id)? 'checked':''?>>
                </div>

            <?php
              $iter++;
          endforeach;
            if ($iter+1 %3 != 0): // number of records printed are not multiple of 3, So close div manually
            ?>
                </div>
            <?php
            endif;
          ?>

          <div class="form-group">
            <input type="submit" name="submit" value="<?=trans('set_layout')?>" class="btn btn-info pull-right">
          </div>
          <?php echo form_close(); ?>
          
        </div>


      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
</div>