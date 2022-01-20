
<div class="col-lg-11 col-md-12 col-sm-12 col-12">

    <!-- Section About -->
    <section class="section-about" id="aboutss">
        <div class="container">
            <!-- About Header -->
            <div class="row">
                <div class="col-12 header1">
                    <div class="row">
                        <div class="col-lg-5 col-sm-12 col-md-12 col-12">
                            <div class="about-img">
                                <img src="<?= ($about->image != '')? base_url($about->image): base_url('/assets/dist/img/avatar5.png'); ?>" alt="team">
                            </div>
                        </div>
                        <div class="col-lg-7 col-sm-12 col-md-12 col-12">
                            <div class="about-item">
                                <h2>
                                    <?=trans('about_me')?>
                                </h2>
                                <div class="line"></div>
                                <ul class="profile-list">
                                    <li class="clearfix">
                                        <strong class="title"><?=trans('full_name')?></strong>
                                        <span class="cont"><?=  isset($about)? $about->firstname.' ':''?><?=  isset($about)? $about->lastname.' ':''?></span>
                                    </li>
                                    <li class="clearfix">
                                        <strong class="title"><?=trans('designation')?></strong>
                                        <span class="cont"><?= isset($about)?$about->designation:''?></span>
                                    </li>
                                    <li class="clearfix">
                                        <strong class="title"><?=trans('address')?></strong>
                                        <span class="cont"><?= isset($about)?$about->address:''?>, <?= isset($about)?$about->city:''?></span>
                                    </li>
                                    <li class="clearfix">
                                        <strong class="title"><?=trans('email')?></strong>
                                        <span class="cont"><?= isset($about)?$about->email:''?></span>
                                    </li>
                                    <li class="clearfix">
                                        <strong class="title"><?=trans('phone')?></strong>
                                        <span class="cont"><?= isset($about)?$about->phone:''?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="footer">
                                <div class="footer-social text-center">
                                    <?php if( $about->facebook != '' ): ?>
                                    <a href="<?= $about->facebook;?>"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                    <?php endif; ?>

                                    <?php if( $about->twitter != '' ): ?>
                                    <a href="<?= $about->twitter;?>"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                    <?php endif; ?>

                                    <?php if( $about->linkedin != ''): ?>
                                    <a href="<?= $about->linkedin;?>"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                                    <?php endif; ?>

                                    <?php if( $about->skype != '' ): ?>
                                    <a href="skype:<?= $about->skype;?>" title="<?= $about->skype;?>"><i class="fab fa-skype" aria-hidden="true"></i></a>
                                    <?php endif; ?>

                                    <?php if( $about->whatsapp != '' ): ?>
                                    <a href="https://wa.me/<?= $about->whatsapp;?>" title="<?= $about->whatsapp;?>"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                    <?php endif; ?>

                                    <?php if( $about->instagram != '' ): ?>
                                    <a href="<?= $about->instagram;?>"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End About Header -->
            </div>
        </div>
    </section>
    <!-- End About Us Section -->
    <!-- Start About Content Section -->
    <section class="about-content-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-content text-center">
                        <p>
                           <?=trans('hello_iam')?> <?=  isset($about)? $about->firstname.' ':''?>. <?= isset($about)?$about->about_me:''?>
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="about-btn mt-5 text-center">
                        <a href="<?=!empty($about->resume)?base_url($about->resume):'#'?>"><button class="btn btn-lg"> <?=trans('download_resume')?> </button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Content Section -->
    <?php
    if ($about-> is_experience):
        ?>
        <!-- Start Experience Section -->
        <section id="experiences" class="experiences">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sec-title text-center">
                            <h2><?=trans('experience')?></h2>
                        </div>
                    </div>
                    <div class="col-md-12 header1">
                        <?PHP
                        foreach ($experiences as $experience):
                            ?>
                            <div class="row row-experience media">
                                <div class="col-lg-3 media-left">
                                    <h5 class="experience-date"><?= date_y_m_d($experience->from_date);?> <br/>to <?= $experience->to_date=='0000-00-00'?'Present':date_y_m_d($experience->to_date)?></h5>
                                </div>
                                <div class="col-lg-9 ex-content media-body">
                                    <h4 class="title"><?= $experience->job_title;?></h4>
                                    <h5><?= $experience->company_name;?></h5>
                                    <p><?= character_limiter($experience->details, $char_limit);?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </section>
        <!-- End Experience Section -->
    <?php endif; ?>

    <?php
    if ($about-> is_skill):
        ?>
        <!-- Start Skills Section -->
        <section class="skills" id="skills">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>
                            <?=trans('skills')?>
                        </h2>
                    </div>
                    <div class="col-12 header1">
                        <div class="row">
                            <?PHP
                            foreach ($skills as $name => $parent_skill):
                                ?>
                                <?php
                                foreach ($parent_skill as $subskill):
                                    ?>
                                    <div class="col-md-12 col-sm-12 col-lg-6 col-12">
                                        <h3 class="progress-title"><?=$subskill->name;?></h3>
                                        <div class="progress">
                                            <div class="progress-bar" style="width:<?=$subskill->skill_level;?>%; background:#97c513;">
                                                <div class="progress-value"><?=$subskill->skill_level;?>%</div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Skills Section -->
    <?php endif; ?>

    <?php
    if ($about-> is_education):
        ?>
        <!-- Start Education Section -->
        <section id="education" class="education">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sec-title text-center">
                            <h2><?=trans('education')?></h2>
                        </div>
                    </div>
                    <div class="col-md-12 header1">
                        <?php
                        foreach ($educations as $education):
                            ?>
                            <div class="row row-education media">
                                <div class="col-lg-3 media-left">
                                    <h5 class="education-date"><?= date_y_m_d($education->from_date); ?> <br/>to <?= $education->to_date=='0000-00-00'?'Present':date_y_m_d($education->to_date)?></h5>
                                </div>
                                <div class="col-lg-9 ed-content media-body">
                                    <h4 class="title"><?= $education->degree_name;?></h4>
                                    <h5><?= $education->institution_name;?></h5>
                                    <p><?= character_limiter($education->details, $char_limit );?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End Education Section -->
<?php endif; ?>

<?php
if ($about-> is_service):
    ?>
    <!-- Start Services Section -->
    <section id="experties" class="experties">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading Area -->
                    <div class="section-heading text-center">
                        <h2><?=trans('services')?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 header1">
                    <div class="row">
                        <?php
                        $service_icons = ['login-icon', 'data-analysis-icon', 'bulb-icon', 'testing-jar-icon' ];
                        $randIndex = 0;
                        foreach ($services as $service):
                            $randIndex = array_rand($service_icons);
                            ?>
                            <div class="col-12 col-md-6">
                                <div class="how-it-single media mt-4">
                                    <div class="single-icon media-left">
                                        <img width="150" height="150" class="img-responsive" src="<?=($service->image != '')?base_url($service->image):base_url('/assets/dist/img/no-image.jpg')?>" alt="feature">
                                    </div>
                                    <div class="single-detail media-body">
                                        <h4> <?=$service->service_name;?></h4>
                                        <p><?=character_limiter($service->details, $char_limit);?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Services Section -->
<?php endif;?>


<?php if ($about-> is_language): ?>
    <!-- Start Languages Section -->
    <section class="languages" id="languages">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title text-center">
                        <h2>
                            <?=trans('languages')?>
                        </h2>
                    </div>
                </div>
                <div class="col-12 sec-content mt-3">
                    <div class="row">
                        <?php
                        foreach ($languages as $language):
                            ?>
                            <div class="col-md-6 col-lg-3">
                                <div class="rounded-lg shadow">
                                    <h2 class="h6 font-weight-bold text-center"><?=$language->title?></h2>
                                    <!-- Progress bar 1 -->
                                    <div class="progress mx-auto" data-value='<?=$language->level?>'>
                                        <span class="progress-left">
                                            <span class="progress-bar border-primary"></span>
                                        </span>
                                        <span class="progress-right">
                                            <span class="progress-bar border-primary"></span>
                                        </span>
                                        <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                            <div class="h4 font-weight-bold text-center mt-2"><?=$language->level?><sup class="small">%</sup></div>
                                        </div>
                                    </div>
                                    <!-- END -->
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Languages Section -->
<?php endif; ?>

<?php
if ($about-> is_portfolio):
    ?>
    <!-- Start portfolio section -->
    <section class="portfolio" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec-title text-center">
                        <h2><?=trans('portfolio')?></h2>
                    </div>
                </div>
                <div class="col-md-12 portfolio-list">
                    <ul class="row portfolio-filter d-flex justify-content-center" id="filter">
                        <li class="active" data-filter="*">All</li>
                        <?php
                        $stripped = '';
                        foreach ($portfolios as $name => $category):
                            $stripped = str_replace(' ', '', $name);
                            ?>
                            <li data-filter=".<?=$stripped?>"><?=$name?></li>
                        <?php endforeach;  ?>
                    </ul>
                </div>
                <div class="col-md-12 header1">
                    <div id="portfolio-grid" class="row portfolio-grid">
                        <?php
                        $stripped = '';
                        foreach ($portfolios as $name => $category):
                            $stripped = str_replace(' ', '', $name);
                            foreach ($category as $portfolio):
                                ?>
                                <div class="col-md-6 col-xs-6 portfolio-item <?=$stripped?>">
                                    <a href="<?=base_url().$portfolio->image;?>" title="<?=$name?>" data-desc="<?=character_limiter($portfolio->details, 150)?>" class="popup">
                                        <div class="portfolio-image">
                                            <img style="width: 150px !important; height: 150px !important;" class="img-responsive" src="<?=base_url().$portfolio->image;?>" alt="portfolio">
                                            <div class="texts">
                                                <h5><?=$name?></h5>
                                                <p><?=character_limiter($portfolio->details, $char_limit)?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach;?>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End portfolio section -->
<?php endif;?>

<?php if ($about-> is_award): ?>
    <!-- Start Awards-Area Section -->
    <section id="awards" class="awards-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec-title text-center">
                        <h2><?=trans('awards')?></h2>
                    </div>
                </div>
                <div class="col-md-12 header1">
                    <div class="row">
                        <?php
                        foreach ($awards as $award):
                            ?>
                            <div class="col-md-6 award-item media">
                                <div class="media-left">
                                    <img src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/images/awards/a.png" alt="Award">
                                </div>
                                <div class="media-body ml-4">
                                    <h4 class="title"><?=$award->title?></h4>
                                    <h5>Adobe Yearly Awards</h5>
                                    <p><?=character_limiter($award->details, $char_limit)?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Awards-Area Section -->
<?php endif; ?>

<?php if ($about-> is_interest): ?>
    <!-- Start Interest Section -->
    <section class="interest" id="interest">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="interest-title text-center">
                        <h2>
                            <?=trans('interests')?>
                        </h2>
                    </div>
                </div>
                <div class="col-12 header1">
                    <div class="row">
                        <div class="col-12">
                            <div class="i-content text-center">
                                <p>
                                    <?=trans('my_interests_subtitle')?>:
                                </p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="i-list">
                                <ul class="row interest-list d-flex justify-content-center">
                                    <?php
                                    foreach ($interests as $interest):
                                        ?>
                                        <li>
                                            <i class="fa fa-star"></i>
                                            <span style="left: 7px;"><?=$interest->title?></span>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Interest Section -->
<?php endif; ?>

<?php if ($about-> is_client): ?>
    <!-- Start Clients Section -->
    <section id="clients" class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec-title text-center">
                        <h2><?=trans('clients')?></h2>
                    </div>
                </div>
                <div class="col-md-12 header1">
                    <div class="clients-slider row">
                        <?php
                        foreach ($clients as $client):
                            ?>
                            <div class="col-md-4 client-logo">
                                <a href="<?=$client->url?>" target="_blank"><img width="150" height="150" class="img-responsive" src="<?=base_url($client->image)?>" alt="Client"></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Clients Section -->
<?php endif; ?>

<?php
if ($about-> is_blog):
    ?>
    <!-- Start Blog Section -->
    <section class="blog-section" id="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>
                        <?=trans('blog')?>
                    </h2>
                </div>
                <div class="col-md-12 blog-area">
                    <div class="row">
                        <?php
                        foreach ($blogs as $name => $category):
                            foreach ($category as $blog):
                                ?>
                                <div class="col-lg-6 col-sm-12 blog-hover">
                                    <div class="blog-img">
                                        <a class="blog-thumb img-fill-container" href="<?=$blog->url?>" target="_blank"><img src="<?=base_url().$blog->image;?>" alt="Blog"></a>
                                    </div>
                                    <div class="blog-content">
                                        <h5 class="blog-date"> Last updated at <?=date_with_time($blog->updated_date);?> </h5>
                                        <a class="blog-link" href="<?=$blog->url?>" target="_blank">
                                            <h4> <?=$blog->title;?></h4>
                                        </a>
                                        <p class="blog-para">
                                            <?=character_limiter($blog->description, $char_limit)?>
                                        </p>
                                        <div class="blog-btn">
                                            <a href="<?=$blog->url?>" target="_blank"><button class="btn btn-lg"> Read More </button></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Section -->
<?php endif; ?>

<?php if ($about-> is_reference): ?>
    <!-- Start References -->
    <section class="References" id="reference">
        <div class="container">
            <div class="row">
                <div class="col-12 ref-title text-center">
                    <h2>
                        <?=trans('references')?>
                    </h2>
                </div>
                <div class="col-12 header1">
                    <div class="card-text pt-3">
                        <ul class="list-unstyled">
                            <?php
                            foreach ($references as $reference):
                                ?>
                                <li class="media">
                                    <img width="50" height="50" class="mr-3 rounded-circle" src="<?=base_url('/assets/dist/img/avatar5.png')?>" alt="Reference">
                                    <div class="media-body brd-btm">
                                        <h5 class="mt-0"><?=$reference->name?></h5>
                                        <h5 class="mt-0"><?=$reference->email?></h5>
                                        <p><?=character_limiter($reference->details, $char_limit)?>
                                    </p>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End References -->
<?php endif; ?>

<?php
if ($about-> is_testimonial):
    ?>
    <!-- Start Testimonial Section -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec-title text-center">
                        <h2><?=trans('testimonials')?></h2>
                    </div>
                </div>
                <div class="col-md-12 testimonial-slider sec-pad">
                    <div class="testimonial-carousel owl-carousel">
                        <?php
                        foreach ($testimonials as $testimonial):
                            ?>
                            <div class="testimonial-item">
                                <div style="text-align: center !important;">
                                    <img style="width: 72px ; height: 72px ; display: block; margin-left: auto; margin-right: auto;" src="<?=base_url($testimonial->thumb)?>" alt="testi-img">
                                </div>
                                <p>
                                    <?=character_limiter($testimonial->feedback, 400)?>
                                </p>
                                <h4 class="title"><?=$testimonial->feedback_title;?></h4>
                                <h5 class="testimonial-subheading"><?=$testimonial->client_name?></h5>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Section -->
<?php endif;?>

<?php if ($about-> is_app): ?>
    <!-- Start Appointment Section -->
    <section id="appointment" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="sec-title text-center">
                        <h2><?=trans('appoint_subtitle')?></h2>
                    </div>
                </div>
                <div class="col-md-12 col-right sec-pad">
                    <div class="skill-content">
                        <h4><?=trans('appoint_msg')?></h4>
                        <p>
                            <?PHP
                            foreach ($app_days as $app_day):
                                ?>
                                <?=$week_days[$app_day->day].' ('.$app_day->book_time_start.' to '.$app_day->book_time_end.')'?><br>
                            <?php endforeach;?>
                        </p>

                    </div>
                    <?php echo form_open('#', 'class="contact-form" id="site_contact_form"');  ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form-name"><?=trans('title')?></label>
                                <input id="title" name="title" type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-name"><?=trans('email')?></label>
                                <input id="app_email" name="app_email" type="email" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-email"><?=trans('date')?></label>
                                <input id="book_date" name="book_date" type="date" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-name"><?=trans('from_time')?></label>
                                <input id="book_time_start" name="book_time_start" type="text" class="form-control timepicker"  required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form-email"><?=trans('to_time')?></label>
                                <input id="book_time_end" name="book_time_end" type="text" class="form-control timepicker" required>
                            </div>
                        </div>
                    </div>

                    <button id="btn_set_app"><?=trans('set_appointment')?></button>
                    <span class="contact-submit-progress"></span>
                    <p style="display:block;" class="contact-submit-message"></p>
                    <input type="hidden" id="user_id" name="user_id" value="<?=isset($user_id)?$user_id:''?>">
                    <input type="hidden" id="username" name="username" value="<?=isset($username)?$username:''?>">
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End Appointment Section -->
<?php endif; ?>
<!-- Start Contact Section -->
<section id="contact" class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sec-title text-center">
                    <h2><?=trans('contact')?></h2>
                </div>
            </div>
            <div class="col-md-12 sec-pad">
                <?php echo form_open('#', 'class="contact-form" id="site_contact_form"');  ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form-name"><?=trans('subject')?></label>
                            <input id="subject" name="subject" type="text" class="form-control contact-name" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form-name"><?=trans('name')?></label>
                            <input id="name" name="name" type="text" class="form-control contact-name" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form-email"><?=trans('email')?></label>
                            <input id="email" name="email" type="email" class="form-control contact-mail" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="form-message"><?=trans('help_you')?>?</label>
                    <textarea id="message" name="message" class="form-control contact-message" placeholder=""></textarea>
                </div>
                <button id="btn_send_msg"><?=trans('send_message')?></button>
                <span class="contact-submit-progress"></span>
                <p style="display:block;" class="contact-submit-message"></p>

                <input type="hidden" id="user_id" name="user_id" value="<?=isset($user_id)?$user_id:''?>">
                <input type="hidden" id="username" name="username" value="<?=isset($username)?$username:''?>">
                <?php echo form_close(); ?>
                <div class="row contact-infos">
                    <div class="header-contact-info">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?= isset($about)?$about->address:''?>, <?= isset($about)?$about->city:''?>
                    </div>
                    <a href="mailto:<?= isset($about)?$about->email:''?>" class="header-contact-info"><i class="fa fa-envelope-open" aria-hidden="true"></i>&nbsp;<?= isset($about)?$about->email:''?></a>
                    <div class="header-contact-info">
                        <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;<?= isset($about)?$about->phone:''?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Section -->
