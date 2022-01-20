<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="<?=isset($meta_description) ? $meta_description : $this->general_settings['description']; ?>">
    <meta name="keywords" content="<?= isset($keywords) ? $keywords : ''; ?>">
    <meta name="author" content="<?=$this->general_settings['site_name'];?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo html_escape($this->general_settings['site_name']); ?></title>
    <!--Favicon-->
    <link rel="icon" href="<?php echo base_url($this->general_settings['favicon']) ?>">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- Bootstrap Css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/main/css/bootstrap.css">
    <!-- Icons Css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/main/css/themify-icons.css">
    <!-- Font Awesome Css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/main/css/fontawesome-all.min.css">
    <!-- Simple Line icons Css-->
    <link rel="stylesheet" href="<?=base_url()?>assets/main/css/simple-line-icons.css">
    <!-- OWL Carousel Css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/main/css/owl.carousel.min.css">
    <!-- Slick Css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/main/css/slick.css">
    <!-- Magnific Popup Css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/main/css/magnific-popup.css">
    
    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/main/css/style.css">
    <!-- Responsive Css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/main/css/responsive.css">

    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css">
</head>
<body>

    <?php if(!isset($navbar)):
        $header_bg = '';
        if (isset($show_login_menu_only)) {
            $header_bg = 'style="background-color: #f0f2ff; !important;"';
        }
        ?>
        <header class="main-header"  <?=$header_bg?>>
            <!-- NAVBAR WITH RESPONSIVE TOGGLE -->
            <div class="top_menu">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent"">
                    <div class="container">
                        <a class="navbar-brand" href="<?= base_url() ?>"><img class="logo" src="<?=base_url().$this->general_settings['logo']?>" alt=""></a>

                        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"> <span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <?php if(!isset($nav_menu)): ?>
                                <ul class="navbar-nav ml-auto" id="nav">
                                    <?php
                                    if(!isset($show_login_menu_only)):
                                        ?>
                                        <li class="nav-item">
                                            <a class="nav-link js-scroll-trigger" href="#how-it-works"><?=trans('how_it_works')?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link js-scroll-trigger" href="#features"><?=trans('features')?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link js-scroll-trigger" href="#pricing"><?=trans('pricing')?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link js-scroll-trigger" href="#contact-us"><?=trans('contact_us')?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link js-scroll-trigger" href="<?=base_url()?>users"><?=trans('users')?></a>
                                        </li>
                                    <?php endif;?>
                                    <?php
                                    $is_admin = $this->session->userdata('is_admin');
                                    $text_style = '';
                                    if(isset($show_login_menu_only)):
                                        $text_style = 'style="color: #0a2b1d; !important;"';
                                    endif;
                                    if (!$this->session->has_userdata('user_id')):
                                        ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('auth/login'); ?>" <?=$text_style?>><?=trans('login')?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-outline-light" href="<?= base_url('auth/register'); ?>" <?=$text_style?>><?=trans('create_profile')?></a>
                                        </li>
                                        <?php
                                    elseif($this->session->has_userdata('user_id')):
                                        $firstname = $this->session->userdata('firstname');
                                        $username = $this->session->userdata('username');
                                        ?>
                                        <li class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" <?=$text_style?>><i class="fa fa-user-circle"></i> &nbsp;<?=$firstname?></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <?php
                                                if ($is_admin): ?>
                                                    <a href="<?= base_url('admin/dashboard') ?>"  class="dropdown-item"><i class="fa fa-dashboard"></i> <?=trans('label_dashboard')?></a>
                                                    <a href="<?= base_url('admin/users') ?>" class="dropdown-item" ><i class="fa fa-users"></i> <?=trans('users')?></a>
                                                    <a href="<?= base_url('admin/packages/') ?>" class="dropdown-item" ><i class="fa fa-gift"></i> <?=trans('packages')?></a>
                                                    <a href="<?= base_url('admin/packages/payments') ?>" class="dropdown-item" ><i class="fa fa-dollar"></i> <?=trans('payments')?></a>
                                                    <a href="<?= base_url('admin/settings') ?>" class="dropdown-item" ><i class="fa fa-cogs"></i> <?=trans('settings')?></a>
                                                    <div class="dropdown-divider"></div>
                                                    <?php
                                                else:
                                                    ?>
                                                    <a href="<?= base_url('user/profile/') ?>"  class="dropdown-item"><i class="fa fa-user"></i> <?=trans('user_profile')?></a>
                                                    <a href="<?= base_url('profile/'.$username) ?>" class="dropdown-item" ><i class="fa fa-eye"></i> <?=trans('view_profile')?></a>
                                                    <a href="<?= base_url('user/packages/') ?>" class="dropdown-item" ><i class="fa fa-gift"></i> <?=trans('my_packages')?></a>
                                                    <a href="<?= base_url('user/packages/payments/') ?>" class="dropdown-item" ><i class="fa fa-dollar"></i> <?=trans('payments')?></a>
                                                    <a href="<?= base_url('auth/change_password/') ?>" class="dropdown-item" ><i class="fa fa-lock"></i> <?=trans('forgot_pass')?></a>
                                                    <div class="dropdown-divider"></div>
                                                <?php endif; ?>
                                                <a href="<?= base_url('auth/logout'); ?>"class="dropdown-item"><?=trans('label_logout')?></a>
                                            </div>
                                        </li>
                                        <?php
                                    endif;    ?>
                                    <li class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" <?=$text_style?>><i class="fa fa-lang"></i> &nbsp;<?=trans('language')?></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="<?= base_url('home/site_lang/english'); ?>" class="dropdown-item">English</a>
                                            <a href="<?= base_url('home/site_lang/french'); ?>" class="dropdown-item">French</a>
                                        </div>
                                    </li>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    <?php endif; ?>

    <!-- Preloader -->
    <div id="preloader">
        <div class="ozient-folding-cube">
            <div class="ozient-cube1 ozient-cube"></div>
            <div class="ozient-cube2 ozient-cube"></div>
            <div class="ozient-cube4 ozient-cube"></div>
            <div class="ozient-cube3 ozient-cube"></div>
        </div>
    </div>