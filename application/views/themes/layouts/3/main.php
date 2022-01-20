
<!--=============Start welcome section===========-->
<section class="wel-section" id="welcome">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-left">
                <div class="header-photo">
                    <img width="225" class="img-circle" src="<?= ($about->image != '')? base_url($about->image): base_url('/assets/dist/img/avatar5.png'); ?>" alt="Photo">
                </div>
                <div class="wel-social text-center">

                    <?php if( $about->facebook != '' ): ?>
                    <a href="<?= $about->facebook;?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <?php endif; ?>

                    <?php if( $about->twitter != '' ): ?>
                    <a href="<?= $about->twitter;?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <?php endif; ?>

                    <?php if( $about->linkedin != '' ): ?>
                    <a href="<?= $about->linkedin;?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    <?php endif; ?>

                    <?php if( $about->skype != '' ): ?>
                    <a href="skype:<?= $about->skype;?>" title="<?= $about->skype;?>"><i class="fa fa-skype" aria-hidden="true"></i></a>
                    <?php endif; ?>

                    <?php if( $about->whatsapp != '' ): ?>
                    <a href="https://wa.me/<?= $about->whatsapp;?>" title="<?= $about->whatsapp;?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                    <?php endif; ?>

                    <?php if( $about->instagram != '' ): ?>
                    <a href="<?= $about->instagram;?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-9 col-right wel-content">
                <h3 class="hello-t"><?=trans('hello_iam')?></h3>
                <h1 class="name-t"><?=  isset($about)? $about->firstname.' ':''?> <br/><span><?=  isset($about)? $about->lastname.' ':''?></span></h1>
                <h2 class="expart-n"><?= isset($about)?$about->designation:''?></h2>
                <div class="header-contact-infos">
                    <div  class="header-contact-info"><i class="fa fa-map-marker" aria-hidden="true"></i><?= isset($about)?$about->address:''?>, <?= isset($about)?$about->city:''?></div>
                    <!--<a href="#" class="header-contact-info"><i class="fa fa-globe" aria-hidden="true"></i>www.michsmit.com</a>-->
                    <a href="mailto:<?= isset($about)?$about->email:''?>" class="header-contact-info"><i class="fa fa-envelope-o" aria-hidden="true"></i><?= isset($about)?$about->email:''?></a>
                    <div  class="header-contact-info"><i class="fa fa-phone" aria-hidden="true"></i><?= isset($about)?$about->phone:''?></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=============End welcome section===========-->
<!--=============Start about section===========-->
<section id="about" class="about">
    <div class="container">
        <div class="row display-f bg-color">
            <div class="col-md-3 col-left">
                <div class="sec-title">
                    <h2><?=trans('about_me')?></h2>
                    <h6><?=trans('little_about_me')?></h6>
                </div>
            </div>
            <div class="col-md-9 col-right sec-pad">
                <div class="about-content">
                    <p><?= isset($about)?$about->about_me:''?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=============End about section===========-->
<?php
if ($about-> is_skill):
    ?>
    <!--=============Start skill section===========-->
    <section id="skills" class="skills">
        <div class="container">
            <div class="row display-f">
                <div class="col-md-3 col-left">
                    <div class="sec-title">
                        <h2><?=trans('skills')?></h2>
                        <h6><?=trans('skills_subtitle')?></h6>
                    </div>
                </div>
                <div class="col-md-9 col-right sec-pad">
                    <div class="skill-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Praesent elementum hendrerit tortor. Sed semper lorem at felis. Vestibulum volutpat, lacus.</p>
                        <div id="bt-ourskill" class="row progress-element">
                            <?PHP
                            foreach ($skills as $name => $parent_skill):
                                ?>
                                <?php /*<h4><?=$name;?></h4> */?>
                                <?php
                                foreach ($parent_skill as $subskill):
                                    ?>
                                    <div class="col-xs-6 pr-item">
                                        <div class="skill-info"><h4 class="skill-name"><?=$subskill->name;?></h4><div class="skill-val"><span class="counter"><?=$subskill->skill_level;?></span>%</div></div>
                                        <div class="bt-skill">
                                            <div class="bt-skillholder" data-percent="<?=$subskill->skill_level;?>%"><div class="bt-skillbar"></div></div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============End skill section===========-->
<?php endif; ?>

<?php
if ($about-> is_service):
    ?>
    <!--=============Start expertise section===========-->
    <section id="expertise" class="expertise">
        <div class="container">
            <div class="row display-f bg-color">
                <div class="col-md-3 col-left">
                    <div class="sec-title">
                        <h2><?=trans('expertise')?></h2>
                        <h6><?=trans('expertise_subtitle')?></h6>
                    </div>
                </div>
                <div class="col-md-9 col-right sec-pad">
                    <div class="row">
                        <?php
                        foreach ($services as $service):
                            ?>
                            <div class="col-xs-6 media expertise-media">
                                <div class="media-left">
                                    <span class="ti-settings"></span>
                                </div>
                                <div class="media-body">
                                    <h4 class="title"><?=$service->service_name;?></h4>
                                    <p><?=character_limiter($service->details, $char_limit);?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============End expertise section===========-->
<?php endif; ?>

<?php
if ($about-> is_experience):
    ?>
    <!--=============Start experiences section===========-->
    <section id="experiences" class="experiences">
        <div class="container">
            <div class="row display-f">
                <div class="col-md-3 col-left">
                    <div class="sec-title">
                        <h2><?=trans('experience')?></h2>
                        <h6><?=trans('experience_subtitle')?></h6>
                    </div>
                </div>
                <div class="col-md-9 col-right sec-pad">
                    <?PHP
                    foreach ($experiences as $experience):
                        ?>
                        <div class="row row-experience">
                            <div class="col-xs-3 col-full">
                                <h5 class="experience-date"><?= date_y_m_d($experience->from_date);?> <br/>to <?= $experience->to_date=='0000-00-00'?'Present':date_y_m_d($experience->to_date)?></h5>
                            </div>
                            <div class="col-xs-9 ex-content">
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
    <!--=============End experiences section===========-->
<?php endif; ?>

<?php
if ($about-> is_portfolio):
    ?>
    <!--=============Start portfolio section===========-->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row display-f bg-color">
                <div class="col-md-3 col-left">
                    <div class="sec-title">
                        <h2><?=trans('portfolio')?></h2>
                        <h6><?=trans('portfolio_subtitle')?></h6>
                    </div>
                </div>
                <div class="col-md-9 col-right sec-pad">
                    <ul class="row m0 portfolio-filter" id="filter">
                        <li class="active" data-filter="*">All</li>
                        <?php
                        $stripped = '';
                        foreach ($portfolios as $name => $category):
                            $stripped = str_replace(' ', '', $name);
                            ?>
                            <li data-filter=".<?=$stripped?>"><?=$name?></li>
                        <?php endforeach;  ?>
                    </ul>
                    <div id="portfolio-grid" class="row portfolio-grid">
                        <?php
                        $stripped = '';
                        foreach ($portfolios as $name => $category):
                            $stripped = str_replace(' ', '', $name);
                            foreach ($category as $portfolio):
                                ?>
                                <div class="col-sm-6 col-xs-6 portfolio-item <?=$stripped?>">
                                    <a href="<?=base_url().$portfolio->image;?>" title="<?=$name?>" data-desc="<?=character_limiter($portfolio->details, 150)?>" class="popup">
                                        <div class="portfolio-image">
                                            <img src="<?=base_url().$portfolio->image;?>" alt="portfolio">
                                            <div class="texts">
                                                <h5><?=$name?></h5>
                                                <p><?=character_limiter($portfolio->details, $char_limit)?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============End portfolio section===========-->
<?php endif; ?>

<?php
if ($about-> is_education):
    ?>
    <!--=============Start Education section===========-->
    <section id="education" class="experiences">
        <div class="container">
            <div class="row display-f">
                <div class="col-md-3 col-left">
                    <div class="sec-title">
                        <h2><?=trans('education')?></h2>
                        <h6><?=trans('education_subtitle')?></h6>
                    </div>
                </div>
                <div class="col-md-9 col-right sec-pad">
                    <?php
                    foreach ($educations as $education):
                        ?>
                        <div class="row row-experience">
                            <div class="col-xs-3 col-full">
                                <h5 class="experience-date"><?= date_y_m_d($education->from_date); ?> <br/>to <?= $education->to_date=='0000-00-00'?'Present':date_y_m_d($education->to_date)?></h5>
                            </div>
                            <div class="col-xs-9 ex-content">
                                <h4 class="title"><?= $education->degree_name;?></h4>
                                <h5><?= $education->institution_name;?></h5>
                                <p><?= character_limiter($education->details, $char_limit );?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!--=============End Education section===========-->
<?php endif;?>

<?php
if ($about-> is_testimonial):
    ?>
    <!--=============start testimonials section===========-->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="row display-f bg-color">
                <div class="col-md-3 col-left">
                    <div class="sec-title">
                        <h2><?=trans('testimonials')?></h2>
                        <h6><?=trans('testi_subtitle')?></h6>
                    </div>
                </div>
                <div class="col-md-9 col-right testimonial-slider sec-pad">
                    <span class="testimonial-quotes">‘’</span>
                    <div class="testimonial-carousel owl-carousel">
                        <?php
                        foreach ($testimonials as $testimonial):
                            ?>
                            <div class="testimonial-item">
                                <p><?=character_limiter($testimonial->feedback, 400)?></p>
                                <h4 class="title"><?=$testimonial->feedback_title;?></h4>
                                <h5 class="testimonial-subheading"><?=$testimonial->client_name?></h5>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============End testimonials section===========-->
<?php endif;?>

<?php if ($about-> is_award): ?>
    <!--=============start awards-area section===========-->
    <section id="awards" class="awards-area">
        <div class="container">
            <div class="row display-f">
                <div class="col-md-3 col-left">
                    <div class="sec-title">
                        <h2><?=trans('awards')?></h2>
                        <h6><?=trans('award_subtitle')?></h6>
                    </div>
                </div>
                <div class="col-md-9 col-right awards">
                    <div class="row">
                        <?php
                        foreach ($awards as $award):
                            ?>
                            <div class="col-xs-6 award-item">
                                <img src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/image/awards/a.png" alt="Award">
                                <h4 class="title"><?=$award->title?></h4>
                                <p><?=character_limiter($award->details, $char_limit)?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============End awards-area section===========-->
<?php endif; ?>


<?php if ($about-> is_client): ?>
    <!--=============start clients section===========-->
    <section id="clients" class="clients">
        <div class="container">
            <div class="row display-f">
                <div class="col-md-3 col-left">
                    <div class="sec-title">
                        <h2><?=trans('clients')?></h2>
                        <h6><?=trans('clients_subtitle')?></h6>
                    </div>
                </div>
                <div class="col-md-9 col-right sec-pad">
                    <div class="clients-slider row">
                        <?php
                        foreach ($clients as $client):
                            ?>
                            <div class="col-sm-4 col-xs-6 client-logo">
                                <a href="<?=$client->url?>" target="_blank"><img src="<?=base_url($client->thumb)?>" alt="Client"></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============End clients section===========-->
<?php endif; ?>

<?php
if ($about-> is_blog):
    ?>
    <!--=============start Blog section===========-->
    <section id="blog" class="blog">
        <div class="container">
            <div class="row display-f bg-color">
                <div class="col-md-3 col-left">
                    <div class="sec-title">
                        <h2><?=trans('label_blog')?></h2>
                        <h6><?=trans('blog_subtitle')?></h6>
                    </div>
                </div>
                <div class="col-md-9 col-right sec-pad">
                    <div class="blog-carousel owl-carousel">
                        <?php
                        foreach ($blogs as $name => $category):
                            foreach ($category as $blog):
                                ?>
                                <div class="blog-item">
                                    <a class="blog-thumb img-fill-container" href="<?= $blog->url ?>" target="_blank"><img src="<?=base_url().$blog->image;?>" alt="Blog"></a>
                                    <div class="text">
                                        <h5 class="blog-date">Last updated at <?=date_with_time($blog->updated_date);?></h5>
                                        <a href="<?=$blog->url?>" target="_blank"><h4 class="title"><?=$blog->title;?></h4></a>
                                        <p><?=character_limiter($blog->description, $char_limit)?></p>
                                        <p><a href="<?= $blog->url ?>">Read More...</a></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============End Blog section===========-->
<?php endif; ?>

<?php
if ($about-> is_app):
    ?>
    <!--=============Start appointment section===========-->
    <section id="appointment" class="contact">
        <div class="container">
            <div class="row display-f">
                <div class="col-md-3 col-left">
                    <div class="sec-title">
                        <h2><?=trans('appointment')?></h2>
                        <h6><?=trans('appoint_subtitle')?></h6>
                    </div>
                </div>
                <div class="col-md-9 col-right sec-pad">
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
    <!--=============End appointment section===========-->
<?php endif; ?>

<!--=============Start contact section===========-->
<section id="contact" class="contact">
    <div class="container">
        <div class="row display-f">
            <div class="col-md-3 col-left">
                <div class="sec-title">
                    <h2><?=trans('contact')?></h2>
                    <h6><?=trans('say_hello')?></h6>
                </div>
            </div>
            <div class="col-md-9 col-right sec-pad">
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
                <div class="contact-infos">
                    <div  class="header-contact-info"><i class="fa fa-map-marker" aria-hidden="true"></i><?= isset($about)?$about->address:''?>, <?= isset($about)?$about->city:''?></div>
                    <!--<a href="#" class="header-contact-info"><i class="fa fa-globe" aria-hidden="true"></i>www.michsmit.com</a>-->
                    <a href="mailto:<?= isset($about)?$about->email:''?>" class="header-contact-info"><i class="fa fa-envelope-o" aria-hidden="true"></i><?= isset($about)?$about->email:''?></a>
                    <div  class="header-contact-info"><i class="fa fa-phone" aria-hidden="true"></i><?= isset($about)?$about->phone:''?></div>
                </div>
            </div>
        </div>
    </div>
</section>
        <!--=============End contact section===========-->