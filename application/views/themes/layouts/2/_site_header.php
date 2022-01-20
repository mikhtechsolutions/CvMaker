<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="description" content="CV">

    <meta name="author" content="Ozient">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= isset($about)? $about->firstname.' ':''?></title>

    <!--Favicon-->
    <link rel="icon" href="<?php echo base_url($this->general_settings['favicon']) ?>">

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- Bootstrap Css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/bootstrap.css">

    <!-- Font Awesome Css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/all.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/all.min.css">

    <!-- ICO font-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/icofont.css">

    <!-- OWL Carousel Css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/owl.carousel.min.css">

    <!-- Magnific Popup Css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/magnific-popup.css">

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/style.css">

    <!-- Responsive Css -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/responsive.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/plugins/timepicker/bootstrap-timepicker.min.css">

</head>

<body>
    <!--Start Header Section-->
    <section class="header">

        <div class="container">

            <div class="row">

                <div class="col-lg-7 offset-lg-3">

                    <div class="header">

                        <!--Header Logo-->
                        <a class="logo" href="#">

                            <img src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/images/logo.svg" atl="logo">

                            <span>.<?= isset($about)?$about->designation:''?></span>

                        </a>

                    </div>

                </div>
                <div class="col-lg-2">
                    <?php
                    if($show_users_link) { // a normal user is Logged in
                        ?>
                        &nbsp; <a href="<?=$_SERVER['HTTP_REFERER']?>" class="btn btn-primary text-white">Back</a>
                        <?php
                    }

                    ?>
                </div>

            </div>

        </div>

    </section>
    <!--End Header Section-->

    <section class="side-profile">
        <div class="container"> <!--  container to hold navigation -->
            <div class="row">
                <div class="col-lg-12 offset-lg-3 d-lg-none">
                    <div class="navbar">

                        <nav>

                            <ul class="text-center">

                                <li>

                                    <a href="#experience" data-toggle="tooltip" data-placement="left" title="<?=trans('experience')?>" class="js-scroll-trigger">

                                        <i class="fas fa-briefcase fa-2x"></i>

                                    </a>

                                </li>

                                <li>

                                    <a href="#skill" data-toggle="tooltip" data-placement="top" title="<?=trans('prof_skills')?>" class="js-scroll-trigger">

                                        <i class="fas fa-cogs fa-2x"></i>

                                    </a>

                                </li>

                                <li>

                                    <a href="#education" data-toggle="tooltip" data-placement="top" title="<?=trans('education')?>" class="js-scroll-trigger">

                                        <i class="fas fa-user-graduate fa-2x"></i>

                                    </a>

                                </li>

                                <li>

                                    <a href="#language" data-toggle="tooltip" data-placement="top" title="<?=trans('languages')?>" class="js-scroll-trigger">

                                        <i class="fas fa-language fa-2x"></i>

                                    </a>

                                </li>

                                <li>

                                    <a href="#references" data-toggle="tooltip" data-placement="top" title="<?=trans('references')?>" class="js-scroll-trigger">

                                        <i class="fas fa-quote-right fa-2x"></i>

                                    </a>

                                </li>

                                <li>

                                    <a href="#clints" data-toggle="tooltip" data-placement="top" title="<?=trans('clients')?>" class="js-scroll-trigger">

                                        <i class="fas fa-user-circle fa-2x"></i>

                                    </a>

                                </li>

                                <li>

                                    <a href="#interst" data-toggle="tooltip" data-placement="top" title="<?=trans('interests')?>" class="js-scroll-trigger">

                                        <i class="fas fa-thumbs-up fa-2x"></i>

                                    </a>

                                </li>

                                <li>

                                    <a href="#portfolio" data-toggle="tooltip" data-placement="top" title="<?=trans('portfolio')?>" class="js-scroll-trigger">

                                        <i class="far fa-image fa-2x"></i>

                                    </a>

                                </li>

                                <li>

                                    <a href="#services" data-toggle="tooltip" data-placement="top" title="<?=trans('services')?>" class="js-scroll-trigger">

                                        <i class="fas fa-cog fa-2x"></i>

                                    </a>

                                </li>

                                <li>

                                    <a href="#blog" data-toggle="tooltip" data-placement="top" title="<?=trans('label_blog')?>" class="js-scroll-trigger">

                                        <i class="fas fa-blog fa-2x"></i>

                                    </a>

                                </li>

                                <li>

                                    <a href="#awards" data-toggle="tooltip" data-placement="right" title="<?=trans('awards')?>" class="js-scroll-trigger">

                                        <i class="fas fa-trophy fa-2x"></i>

                                    </a>

                                </li>

                                <li>

                                    <a href="#contact" data-toggle="tooltip" data-placement="left" title="<?=trans('contact')?>" class="js-scroll-trigger">

                                        <i class="fas fa-envelope fa-2x"></i>

                                    </a>

                                </li>

                            </ul>

                        </nav>

                    </div>

                </div>

            </div>

    </div> <!-- Side navigation ends here... ./ div class="container" -->