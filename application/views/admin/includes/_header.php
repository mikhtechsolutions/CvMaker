<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Tell the browser to be responsive to screen width -->

  <meta name="viewport" content="width=device-width, initial-scale=1">



  <link rel="icon" href="<?php echo base_url($this->general_settings['favicon']) ?>">





  <title><?php echo html_escape($this->general_settings['site_name']); ?></title>



  <!-- Font Awesome -->

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- DataTables -->

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/adminlte.css">

  <!-- Toggle Switches -->

  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

  <!-- iCheck -->

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/iCheck/flat/blue.css">

  <!-- Morris chart -->

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/morris/morris.css">

  <!-- jvectormap -->

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">

  <!-- Date Picker -->

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/datepicker/datepicker3.css">

  <!-- Daterange picker -->

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/daterangepicker/daterangepicker-bs3.css">

  <!-- bootstrap wysihtml5 - text editor -->

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- Google Font: Source Sans Pro -->

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">



  <!-- Bootstrap tags input -->

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/bootstrap-tags-input/bootstrap-tagsinput.css">





  <!-- bootstrap wysihtml5 - text editor -->

  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">



  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/plugins/timepicker/bootstrap-timepicker.min.css">



  <!-- jQuery -->

  <script src="<?= base_url()?>assets/plugins/jquery/jquery.min.js"></script>



</head>



<body>



<!-- Main Wrapper Start -->

<div class="wrapper">

 

  <?php if(!isset($navbar)): ?>



    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">

      <!-- Left navbar links -->

      <ul class="navbar-nav">

        <li class="nav-item">

          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>

        </li>

        <li class="nav-item d-none d-sm-inline-block">
          <?php $is_admin = $this->session->userdata('is_admin'); ?>
          <a href="<?= ($is_admin) ? base_url('admin/dashboard') : base_url('user/profile') ?>" class="nav-link"><?=trans('label_home')?></a>

        </li>

        <li class="nav-item d-none d-sm-inline-block">

          <a href="<?= base_url('auth/logout') ?>" class="nav-link"><?=trans('label_logout')?></a>

        </li>

      </ul>


      <!-- Right navbar links -->

      <ul class="navbar-nav ml-auto">
        <?php   
          $is_admin = $this->session->userdata('is_admin'); 
          if(!$is_admin):
        ?>
        <li class="nav-item">

          <a class="nav-link btn btn-success text-white" href="<?= base_url('/#pricing') ?>"><i

                class="fa fa-sort-up"></i> <?=trans('upgrade_package')?></a>

        </li>

        &nbsp;

        <li class="nav-item">

          <a class="nav-link btn btn-primary text-white" href="<?= base_url($this->session->userdata('username')) ?>"><i

                class="fa fa-eye"></i> <?=trans('view_profile')?></a>



        </li>

        <?php endif; ?>

        <li class="nav-item">

          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i

                class="fa fa-th-large"></i></a>

        </li>

      </ul>

    </nav>




  <?php endif; ?>



  <!-- Sideabr -->



  <?php if(!isset($sidebar)): ?>



    <?PHP

    $is_admin = $this->session->userdata('is_admin');

    if ($is_admin) {

      $this->load->view('admin/includes/_sidebar_admin');

    } else {

      $this->load->view('admin/includes/_sidebar');

    }

    ?>



  <?php endif; ?>
   

  <!-- / .Sideabr -->