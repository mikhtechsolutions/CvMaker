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
        <img src="<?= user_avatar_thumb($this->session->user_id) ?>" class="img-circle elevation-2" alt="Site favicon">
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
        <li id="dashboard" class="nav-item">
          <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link">
            <i class="nav-icon fa fa-dashboard"></i>
            <p class="text"><?=trans('label_dashboard')?></p>
          </a>
        </li>

        <li id="users" class="nav-item">
          <a href="<?= base_url('admin/users'); ?>" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p><?=trans('users')?></p>
          </a>

        <li id="packages" class="nav-item">
          <a href="<?= base_url('admin/packages'); ?>" class="nav-link">
            <i class="nav-icon fa fa-gift"></i>
            <p><?=trans('packages')?></p>
          </a>
        </li>

        <li id="payments" class="nav-item">
          <a href="<?= base_url('admin/payments'); ?>" class="nav-link">
            <i class="nav-icon fa fa-dollar"></i>
            <p><?=trans('payments')?></p>
          </a>
        </li>

        <li id="screen_shots" class="nav-item">
          <a href="<?= base_url('admin/screen_shots'); ?>" class="nav-link">
            <i class="nav-icon fa fa-cog"></i>
            <p class="text"><?=trans('screenshots')?></p>
          </a>
        </li>

        <li id="services" class="nav-item">
          <a href="<?= base_url('admin/services'); ?>" class="nav-link">
            <i class="nav-icon fa fa-cog"></i>
            <p class="text"><?=trans('services')?></p>
          </a>
        </li>

        <li id="contact" class="nav-item">
           <a href="<?= base_url('admin/contact'); ?>" class="nav-link">
            <i class="nav-icon fa fa-envelope"></i>
            <p><?=trans('contact_messages')?></p>
          </a>
        </li>

        <li id="pages" class="nav-item">
          <a href="<?= base_url('admin/pages'); ?>" class="nav-link">
            <i class="nav-icon fa fa-book"></i>
            <p class="text"><?=trans('pages')?></p>
          </a>
        </li>
        
        <li id="settings" class="nav-item">
          <a href="<?= base_url('admin/settings'); ?>" class="nav-link">
            <i class="nav-icon fa fa-cog"></i>
            <p class="text"><?=trans('settings')?></p>
          </a>
        </li>

        <li id="languages" class="nav-item">
          <a href="<?= base_url('admin/languages'); ?>" class="nav-link">
            <i class="nav-icon fa fa-cog"></i>
            <p class="text"><?=trans('language_settings')?></p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
            <i class="nav-icon fa fa-circle-o text-danger"></i>
            <p class="text"><?=trans('label_logout')?></p>
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