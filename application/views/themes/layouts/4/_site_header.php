<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="CodeGlamour">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=  isset($about)? $about->firstname.' ':''?></title>
    <!--Favicon-->
    <link rel="shortcut icon" href="<?=base_url($this->general_settings['favicon']) ?>" type="image/x-icon">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <!-- Bootstrap Css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/bootstrap.css">
    <!-- Icons Css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/themify-icons.css">
    <!-- Font Awesome Css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/all.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/fontawesome-all.min.css">
    <!--Hover.css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/hover.css">
    <!-- OWL Carousel Css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/vendors/owl-carousel/animate.css">
    <!-- Slick Css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/slick.css">
    <!-- Magnific Popup Css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/magnific-popup.css">
    <!-- Map Icons -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/map-icons.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/map-icons.min.css">
    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/style.css">
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top: 10px; !important;">
            <div class="col-10"></div>
            <div class="col-2">
                <?php
                if($show_users_link) { // a normal user is Logged in
                    ?>
                    &nbsp; <a href="<?= ($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : base_url('user/profile') ?>" class="btn btn-primary">Back</a>
                    <?php
                }

                ?>
            </div>
        </div>
        <div class="row" style="margin-top: 0px; !important;">
            <div class="col-lg-1">
                <div class="header">
                    <!-- menu -->
                    <div class="top-menu">
                        <ul class="smooth-scroll">
                            <li class="">
                                <a href="#aboutss">
                                    <span class="fa fa-user"></span>
                                    <span class="link"><?=trans('about_me')?></span>
                                </a>
                            </li>
                            <?php if ($about-> is_experience): ?>
                                <li class="">
                                    <a href="#experiences">
                                        <span class="fa fa-file"></span>
                                        <span class="link"><?=trans('experience')?></span>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if ($about-> is_skill): ?>
                                <li class="">
                                    <a href="#skills">
                                        <span class="fa fa-paint-brush"></span>
                                        <span class="link"><?=trans('skills')?></span>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if ($about-> is_education): ?>
                                <li class="">
                                    <a href="#education">
                                        <span class="fa fa-book"></span>
                                        <span class="link"><?=trans('education')?></span>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if ($about-> is_service): ?>
                                <li class="active">
                                    <a href="#experties">
                                        <span class="fa fa-suitcase"></span>
                                        <span class="link"><?=trans('expertise')?></span>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if ($about-> is_language): ?>
                                <li class="active">
                                    <a href="#languages">
                                        <span class="fa fa-globe"></span>
                                        <span class="link"><?=trans('languages')?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if ($about-> is_portfolio): ?>
                                <li class="active">
                                    <a href="#portfolio">
                                        <span class="fa fa-rocket"></span>
                                        <span class="link"><?=trans('portfolio')?></span>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if ($about-> is_award): ?>
                                <li class="active">
                                    <a href="#awards">
                                        <span class="fa fa-trophy"></span>
                                        <span class="link"><?=trans('awards')?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if ($about-> is_interest): ?>
                                <li class="active">
                                    <a href="#interest">
                                        <span class="fa fa-magnet"></span>
                                        <span class="link"><?=trans('interests')?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if ($about-> is_blog): ?>
                                <li class="active">
                                    <a href="#blog-section">
                                        <span class="fab fa-blogger"></span>
                                        <span class="link"><?=trans('label_blog')?></span>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if ($about-> is_reference): ?>
                                <li class="active">
                                    <a href="#reference">
                                        <span class="fas fa-quote-right"></span>
                                        <span class="link"><?=trans('references')?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if ($about-> is_testimonial): ?>
                                <li class="active">
                                    <a href="#testimonials">
                                        <span class="fas fa-quote-right"></span>
                                        <span class="link"><?=trans('testimonials')?></span>
                                    </a>
                                </li>
                            <?php endif;?>
                            <?php if ($about-> is_app): ?>
                                <li class="active">
                                    <a href="#appointment">
                                        <span class="fas fa-calendar"></span>
                                        <span class="link"><?=trans('appointment')?></span>
                                    </a>
                                </li>
                            <?php endif;?>
                            <li class="active">
                                <a href="#contact">
                                    <span class="fa fa-at"></span>
                                    <span class="link"><?=trans('contact')?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-sm-12 d-lg-none d-flex justify-content-center">
                <div class="headers">
                    <!-- menu -->
                    <div class="top-menu">
                        <ul class="smooth-scroll row">
                            <li class="">
                                <a href="#aboutss">
                                    <span class="fa fa-user"></span>
                                    <span class="link"><?=trans('about_me')?></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#experiences">
                                    <span class="fa fa-file"></span>
                                    <span class="link"><?=trans('experience')?></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#skills">
                                    <span class="fa fa-paint-brush"></span>
                                    <span class="link"><?=trans('skills')?></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#education">
                                    <span class="fa fa-book"></span>
                                    <span class="link"><?=trans('education')?></span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="#experties">
                                    <span class="fa fa-suitcase"></span>
                                    <span class="link"><?=trans('expertise')?></span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="#languages">
                                    <span class="fa fa-globe"></span>
                                    <span class="link"><?=trans('languages')?></span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="#portfolio">
                                    <span class="fa fa-rocket"></span>
                                    <span class="link"><?=trans('portfolio')?></span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="#awards">
                                    <span class="fa fa-trophy"></span>
                                    <span class="link"><?=trans('awards')?></span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="#interest">
                                    <span class="fa fa-magnet"></span>
                                    <span class="link"><?=trans('interests')?></span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="#blog-section">
                                    <span class="fab fa-blogger"></span>
                                    <span class="link"><?=trans('label_blog')?></span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="#appointment">
                                    <span class="fas fa-calendar"></span>
                                    <span class="link"><?=trans('appointment')?></span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="#contact">
                                    <span class="fa fa-at"></span>
                                    <span class="link"><?=trans('contact')?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>