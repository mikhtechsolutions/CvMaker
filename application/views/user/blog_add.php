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
          <a href="<?= base_url('user/blog'); ?>" class="btn btn-success"><i class="fa fa-list"></i><?=trans('list_blogs')?></a>
        </div>
      </div>
      <!-- /.card-header -->
    </div>
    <div class="card">
      <div class="card-body">
        <div class="box-body">
          <!-- For Messages -->
          <?php $this->load->view('admin/includes/_messages.php') ?>

          <?php echo form_open_multipart(base_url('user/blog/add'), 'class="form-horizontal" id="blogForm"');  ?>

          <div class="row">
            <div class="col-6">
            <label for="exampleInputFile"><?=trans('blog_image')?><?=IMAGE_FILE_TYPES?></label>
            <div class="custom-file">
              <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile"><?=trans('choose_file')?></label>
              <span id="file_path_span"></span>
            </div>
            </div>

            <div class="col-6">
              <label class="control-label"><?=trans('post_category')?></label>
              <select name="cat_id" class="form-control">
                <option value=""><?=trans('select_category')?></option>
                <?php
                foreach($cats as $id=>$name):
                  ?>
                    <option value="<?= $id; ?>" <?=(isset($update_id) && $id == $post->cat_id)?'selected=selected':''?>><?= $name; ?></option>
                  <?php endforeach; ?>
              </select>
            </div>

          </div>

          <div class="row form-group">
            <div class="col-12">
              <?php if (isset($update_id)): ?>
                <img src="<?php echo base_url($post->thumb) ?>"> <br><br>
              <?php endif ?>
            </div>
          </div>

          <div class="row form-group">
            <div class="col-12">
              <label><?=trans('url')?></label>
              <input type="text" name="url" value="<?=isset($update_id) && empty(old('url'))?$post->url:old('url')?>" class="form-control" placeholder="https://wordpress.com/">
            </div>
          </div>


          <div class="row form-group">
            <div class="col-6">
            <label class="control-label"><?=trans('title')?></label>
            <input type="text" name="title" value="<?=isset($update_id) && empty(old('title'))?$post->title:old('title')?>" class="form-control" placeholder="">
            </div>

            <div class="col-6">
              <label><?=trans('slug')?></label>
              <input type="text" name="slug" value="<?=isset($update_id) && empty(old('slug'))?$post->slug:old('slug')?>" class="form-control" placeholder="">
            </div>
          </div>
          
          <div class="row form-group">
            <div class="col-6">
            <label><?=trans('tags')?></label>
              <input type="text" name="tags" value="<?=isset($update_id) && empty(old('tags'))?$post->tags:old('tags')?>" data-role="tagsinput"  class="form-control" placeholder="" aria-invalid="false">
            </div>

            <div class="col-6">
              <label><?=trans('status')?></label>
              <select name="status" class="form-control">
                <option value="1"><?=trans('active')?></option>
                <option value="0" <?=(isset($update_id) && $post->status == 0)?'selected=selected':''?>><?=trans('deactive')?></option>
              </select>
            </div>

          </div>

          <div class="form-group">
            <label><?=trans('post_description')?></label>
            <textarea name="description" id="blog_description" class="form-control" rows="3" placeholder=""><?=isset($update_id) && empty(old('description'))?$post->description:old('description')?></textarea>
          </div>

          <input type="hidden" name="update_id" value="<?=isset($update_id)?$post->id:''?>">

          <div class="form-group">
            <input type="submit" name="submit" value="<?=trans('save_blog')?>" class="btn btn-info pull-right">
          </div>
          <?php echo form_close(); ?>
        </div>


      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
</div>