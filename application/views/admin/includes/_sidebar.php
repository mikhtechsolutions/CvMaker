<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
?>  

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
 <a href="<?= base_url(''); ?>" class="brand-link">
    <img src="<?= base_url($this->general_settings['logo']); ?>" alt="Site Logo" class="brand-image elevation-3"
         style="opacity: .8">
    <div class="mb-4"></div>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= user_avatar_thumb($this->session->user_id) ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?=$this->session->userdata('firstname').' '.$this->session->userdata('lastname')?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-header"><?=trans('main_menu')?></li>
        <?php
        foreach ($this->features_list as $feature) :
          if ($feature->id == 7):   // portfolio, 2 sub menus
            ?>
            <li id="<?=strtolower($feature->name)?>" class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa <?=$feature->fa_class?>"></i>
                <p>
                  <?=$feature->name?>
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="<?= base_url('user/portfolio/add_cat'); ?>" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p><?=trans('project_category')?></p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('user/portfolio'); ?>" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p><?=trans('add_projects')?></p>
                  </a>
                </li>
              </ul>
            </li>
            <?php
          elseif($feature->id == 8):  // blog, 2 submenus
          ?>
            <li id="<?=strtolower($feature->name)?>" class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa <?=$feature->fa_class?>"></i>
                <p>
                  <?=$feature->name?>
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="<?= base_url('user/blog/add_cat'); ?>" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p><?=trans('blog_category')?></p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('user/blog'); ?>" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p><?=trans('add_blog_post')?></p>
                  </a>
                </li>
              </ul>
            </li>
          <?php

          else:
          ?>
          <li id="<?=strtolower($feature->name)?>" class="nav-item">
            <a href="<?= base_url($feature->controller); ?>" class="nav-link">
              <i class="nav-icon fa <?=$feature->fa_class?>"></i>
              <p class="text"><?=$feature->name?></p>
            </a>
          </li>
        <?php
          endif;
        endforeach;
        ?>
        <li id="change_password" class="nav-item">
          <a href="<?= base_url('auth/change_password'); ?>" class="nav-link">
            <i class="nav-icon fa fa-lock"></i>
            <p><?=trans('label_change_pass')?></p>
          </a>
        </li>

        <li id="logout" class="nav-item">
          <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
            <i class="nav-icon fa fa-circle-o text-danger"></i>
            <p><?=trans('label_logout')?></p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<script>
  $("#<?= $cur_tab ?>").addClass('menu-open');
  $("#<?= $cur_tab ?> > a").addClass('active');
</script>