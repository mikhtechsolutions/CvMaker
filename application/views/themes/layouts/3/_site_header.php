<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Smith" content="This is a porsonal portfolio template">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?=  isset($about)? $about->firstname.' ':''?></title>
    <!--    favicon-->
    <link rel="shortcut icon" href="<?=base_url($this->general_settings['favicon']) ?>" type="image/x-icon">

    <!-- Bootstrap -->
    <link href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/themify-icons.css">
    <!-- strock-Gap-icon -->
    <link rel="stylesheet" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/vendors/linear-icon/style.css">
    <!-- magnific popup-->
    <link rel="stylesheet" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/vendors/magnific-popup/magnific-popup.css">
    <!--        owl carousel css-->
    <link rel="stylesheet" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/vendors/owl-carousel/animate.css">
    <!--    css-->
    <link rel="stylesheet" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/style.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/css/responsive.css">
    
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="60">
    <!-- Preloader-->
    <div class="loader-container">
     <div class="loader">
        <div id="mask">
            <svg class="preloader-icon" width="34" height="38" viewbox="0 0 34 38">
              <path class="preloader-path" stroke-dashoffset="0" d="M29.437 8.114L19.35 2.132c-1.473-.86-3.207-.86-4.68 0L4.153 8.114C2.68 8.974 1.5 10.56 1.5 12.28v11.964c0 1.718 1.22 3.306 2.69 4.165l10.404 5.98c1.47.86 3.362.86 4.834 0l9.97-5.98c1.472-.86 2.102-2.45 2.102-4.168V12.28c0-1.72-.59-3.306-2.063-4.166z"></path>
          </svg>
      </div>
  </div>
</div>
<!-- End Preloader-->
<header>
    <nav class="navbar navbar-default navbar-fixed-top" data-spy="affix" data-offset-top="80">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div>
                <?php
                if($show_users_link) { // a normal user is Logged in
                    ?>
                    &nbsp; <a href="<?=$_SERVER['HTTP_REFERER']?>" class="btn btn-primary mt-1">Back</a>
                    <?php
                }

                ?>
                </div>
                <a class="navbar-brand" href="#"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right menu smooth-scroll">
                    <li class="active"><a href="#welcome"><?=trans('welcome')?></a></li>
                    <li><a href="#about"><?=trans('about_me')?></a></li>
                    <?php if ($about-> is_skill): ?><li><a href="#skills"><?=trans('skills')?></a></li><?php endif;?>
                    <?php if ($about-> is_service): ?><li><a href="#expertise"><?=trans('expertise')?></a></li><?php endif;?>
                    <?php if ($about-> is_experience): ?><li><a href="#experiences"><?=trans('experience')?></a></li><?php endif;?>
                    <?php if ($about-> is_portfolio): ?><li><a href="#portfolio"><?=trans('portfolio')?></a></li><?php endif;?>
                    <?php if ($about-> is_education): ?><li><a href="#education"><?=trans('education')?></a></li><?php endif;?>
                    <?php if ($about-> is_testimonial): ?><li><a href="#testimonials"><?=trans('testimonials')?></a></li><?php endif;?>
                    <?php if ($about-> is_award): ?><li><a href="#awards"><?=trans('awards')?></a></li><?php endif;?>
                    <!--<li><a href="#profiles">Profiles</a></li>-->
                    <?php if ($about-> is_client): ?><li><a href="#clients"><?=trans('clients')?></a></li><?php endif;?>
                    <?php if ($about-> is_blog): ?><li><a href="#blog"><?=trans('label_blog')?></a></li><?php endif;?>
                    <?php if ($about-> is_app): ?><li><a href="#appointment"><?=trans('appointment')?></a></li><?php endif;?>
                    <li><a href="#contact"><?=trans('contact')?></a></li>
                    <li class="nav-lang">
                        <a class="active" href="#">EN</a>
                        <a href="#">FR</a>
                        <a href="#">GR</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>