<div class="container"> <!-- This container holds all the remaining html, except about_me and navigation. It should close in footer -->
    <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12">

            <div class="side-profile-bar text-center shadow rounded">
                <img class="rounded-circle" src="<?= ($about->image != '')? base_url($about->image): base_url('/assets/dist/img/avatar5.png'); ?>" width="200px">
                <h2><?=  isset($about)? $about->firstname.' ':''?></h2>
                <div class="line"></div>
                <p><?= isset($about)?$about->designation:''?></p>
                <ul class="side-profile-bar-social-list list-inline text-center">

                    <?php if( $about->facebook != '' ): ?>
                        <li class="list-inline-item">
                            <a href="<?= $about->facebook;?>">
                                <span> <i class="fab fa-facebook-f"></i> </span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if( $about->twitter != '' ): ?>
                        <li class="list-inline-item">
                            <a href="<?= $about->twitter;?>">
                                <span> <i class="fab fa-twitter" aria-hidden="true"></i> </span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if( $about->skype != '' ): ?>
                        <li class="list-inline-item">
                            <a href="skype:<?= $about->skype;?>" title="<?= $about->skype;?>">
                                <span> <i class="fab fa-skype" aria-hidden="true"></i> </span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if( $about->whatsapp != '' ): ?>
                        <li class="list-inline-item">
                            <a href="https://wa.me/<?= $about->whatsapp;?>" title="<?= $about->whatsapp;?>">
                                <span> <i class="fab fa-whatsapp" aria-hidden="true"></i> </span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if( $about->instagram != '' ): ?>
                        <li class="list-inline-item">
                            <a href="<?= $about->instagram;?>">
                                <span> <i class="fab fa-instagram" aria-hidden="true"></i> </span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
                <aside class="side-profile-bar-btn text-center">
                    <p></p>
                    <a href="<?=!empty($about->resume)?base_url($about->resume):'#'?>"><button class="btn btn-lg-defult"><?=trans('download_cv')?></button></a>
                    <p></p>
                </aside>
            </div> <!-- div shadow rounded ends here -->
        </div>   <!-- Info Card end s here-->

        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="maim-detail-card shadow rounded" id="detail">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?=trans('hello_iam')?> <?=  isset($about)? $about->firstname.' ':''?>
                            <div class="lines"></div>
                        </h4>
                        <p class="card-text"><?= isset($about)?$about->about_me:''?></p>
                    </div>
                    <div class="brd-btm mt-5 mb-3"></div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <?=trans('personal_info')?>
                            <div class="lines"></div>
                        </h4>
                        <p class="card-text">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col"><?=trans('full_name')?></th>
                                        <td scope="col"><?=  isset($about)? $about->firstname.' ':''?> <?=  isset($about)?$about->lastname:''?></td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th scope="col"><?=trans('city')?></th>
                                        <td scope="col"><?= isset($about)?$about->city:''?></td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th scope="col"><?=trans('address')?></th>
                                        <td scope="col"><?= isset($about)?$about->address:''?></td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th scope="col"><?=trans('email')?></th>
                                        <td scope="col"><?= isset($about)?$about->email:''?></td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th scope="col"><?=trans('phone')?></th>
                                        <td scope="col"><?= isset($about)?$about->phone:''?></td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th scope="col"><?=trans('freelance')?></th>
                                        <td scope="col"><?=trans('available')?></td>
                                    </tr>
                                </thead>

                            </table>
                        </p>
                    </div>
                </div>
            </div> <!-- div Personal details ends here -->

            <?php
            if ($about-> is_experience):
                ?>
                <div class="Work-exp" id="experience">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?=trans('work_experience')?>
                            <div class="lines"></div>
                        </h4>
                        <p class="card-text">
                            <div class="col-md-12">
                                <div class="main-timeline">
                                    <?PHP
                                    foreach ($experiences as $experience):
                                        ?>
                                        <div class="timeline">
                                            <span class="timeline-icon"></span>
                                            <span class="year"><?= date_y_m_d($experience->from_date);?> - <?= $experience->to_date=='0000-00-00'?'Present':date_y_m_d($experience->to_date)?></span>
                                            <div class="timeline-content">
                                                <h3 class="title"><?= $experience->job_title;?></h3>
                                                <span class="post"><?= $experience->company_name;?></span>
                                                <p class="description">
                                                    <?= character_limiter($experience->details, $char_limit);?>
                                                </p>
                                            </div>
                                        </div>
                                        <?PHP
                                    endforeach;
                                    ?>
                                </div> <!-- ./ class = main-timeline -->
                            </div> <!-- class="col-md-12" -->
                        </p> <!-- p class="card-text" -->
                    </div> <!-- class="card-body" -->
                </div>
            </div> <!-- <div class="Work-exp" id="experience">  -->
                <?php
            endif; // experience
            ?>

            <?php
            if ($about-> is_skill):
                ?>
                <div class="pro-skill" id="skill">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?=trans('prof_skills')?>
                                <div class="lines"></div>
                            </h4>
                            <p class="card-text">
                                <?PHP
                                foreach ($skills as $name => $parent_skill):
                                    ?>
                                    <h4 class="progresss-title"><?=$name;?></h4>
                                    <?php
                                    foreach ($parent_skill as $subskill):
                                        ?>
                                        <h5 class="progresss-title"><?=$subskill->name;?></h5>
                                        <div class="progresss">
                                            <div class="progresss-bar" style="width:<?=$subskill->skill_level;?>%;">
                                                <div class="progresss-value"><?=$subskill->skill_level;?>%</div>
                                            </div>
                                        </div>
                                        <?PHP
                                    endforeach;
                                endforeach;
                                ?>
                            </p>
                        </div>
                    </div>
                </div> <!-- div Professional skills ends here -->
            <?php endif; ?>

            <?php
            if ($about-> is_education):
                ?>
                <div class="education" id="education">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?=trans('education')?>
                                <div class="lines"></div>
                            </h4>
                            <p class="card-text">
                                <div class="col-md-12">
                                    <div class="main-timeline">
                                        <?php
                                        foreach ($educations as $education):
                                            ?>
                                            <div class="timeline">
                                                <span class="timeline-icon"></span>
                                                <span class="year"><?= date_y_m_d($education->from_date); ?> - <?= $education->to_date=='0000-00-00'?'Present':date_y_m_d($education->to_date)?></span>
                                                <div class="timeline-content">
                                                    <h3 class="title"><?= $education->institution_name;?></h3>
                                                    <span class="post"><?= $education->degree_name;?></span>
                                                    <p class="description">
                                                        <?= character_limiter($education->details, $char_limit );?>
                                                    </p>
                                                </div>
                                            </div>
                                            <?php
                                        endforeach;
                                        ?>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div> <!-- Education details div ends here -->
            <?php endif; ?>
            <?php if ($about-> is_language):?>
                <div class="language" id="language">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?=trans('languages')?>
                                <div class="lines"></div>
                            </h4>
                            <p class="card-text">
                                <table class="table table-borderless text-center">
                                    <thead>
                                        <tr>
                                            <?php
                                            foreach ($languages as $language):
                                                ?>
                                                <th scope="col"><?=$language->title?></th>
                                                <?php
                                            endforeach;
                                            ?>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>
                                            <?php
                                            foreach ($languages as $language):
                                                ?>
                                                <td scope="col">
                                                    <div class="progress mx-auto" data-value='<?=$language->level?>'>
                                                        <span class="progress-left"><span class="progress-bar border-info"></span></span>
                                                        <span class="progress-right"><span class="progress-bar border-info"></span></span>
                                                        <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                                            <div class="h5 font-weight-bold"><?=$language->level?><sup class="small">%</sup></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <?php
                                            endforeach;
                                            ?>
                                        </tr>
                                    </thead>
                                </table>
                            </p>
                        </div>
                    </div>
                </div> <!-- Language div ends here -->
            <?php endif;?>

            <?php if ($about-> is_reference):?>
                <div class="References" id="references">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?=trans('references')?>
                                <div class="lines"></div>
                            </h4>
                            <p class="card-text">
                                <ul class="list-unstyled">
                                    <?php
                                    foreach ($references as $reference):
                                        ?>
                                        <li class="media">
                                            <img width="50" height="50" class="mr-3 rounded-circle" src="<?=base_url('/assets/dist/img/avatar5.png')?>" alt="Generic placeholder image">
                                            <div class="media-body brd-btm">
                                                <h5 class="mt-0"><?=$reference->name?></h5>
                                                <h5 class="mt-0"><?=$reference->email?></h5>
                                                <p><?=character_limiter($reference->details, $char_limit)?></p>
                                            </div>
                                        </li>
                                        <?php
                                    endforeach;
                                    ?>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div> <!-- References div ends here -->
            <?php endif; ?>

            <?php if ($about-> is_client):?>
                <div class="clints" id="clints">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?=trans('clients')?>
                                <div class="lines"></div>
                            </h4>
                            <p class="card-text">
                                <table class="table table-borderless text-center">
                                    <thead>
                                        <?php
                                        $iter = 0;
                                        $num_records = sizeof($clients);
                                        foreach ($clients as $client):
                                            if($iter%3 == 0):
                                                ?>
                                                <tr>
                                                    <?php
                                                endif;
                                                ?>
                                                <th scope="col">
                                                    <a href="<?=$client->url?>" target="_blank" ><img width="117" height="100" src="<?=base_url($client->thumb)?>" class=" wp-post-image"></a>
                                                </th>
                                                <?php
                                                $iter++;
                                    if (($iter > 0) && ($iter %3 == 0 || $iter == $num_records)): //  end of row
                                    ?>
                                </tr>
                                <?php
                            endif;
                        endforeach;
                        ?>
                    </thead>
                </table>
            </p>
        </div>
    </div>
</div> <!-- Clients div ends here -->
<?php endif;?>

<?php if ($about-> is_interest):?>
    <div class="Interst" id="interst">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <?=trans('interests')?>
                    <div class="lines"></div>
                </h4>
                <p class="card-text">
                    <table class="table table-borderless text-center">
                        <thead>
                            <?php
                            $iter = 0;
                            $num_records = sizeof($interests);
                            foreach ($interests as $interest):
                                if($iter%3 == 0):
                                    ?>
                                    <tr>
                                        <?php
                                    endif;
                                    ?>
                                    <th>
                                        <i class="<?=$interest->fa_class?>"></i>
                                        <?=$interest->title?>
                                    </th>
                                    <?php
                                    $iter++;
                                    if (($iter > 0) && ($iter %3 == 0 || $iter == $num_records)): //  end of row
                                    ?>
                                </tr>
                                <?php
                            endif;
                        endforeach;
                        ?>
                    </thead>
                </table>
            </p>
        </div>
    </div>
</div> <!-- Interests div ends here -->
<?php endif;?>

<?php
if ($about-> is_portfolio):
    ?>
    <div class="portfolio" id="portfolio">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <?=trans('portfolio')?>
                    <div class="lines"></div>
                </h4>
                <p class="card-text">
                    <div class="col-md-12 portfolio-list">
                        <ul class="row portfolio-filter d-flex justify-content-center" id="filter">
                            <li class="active" data-filter="*">All</li>
                            <?php
                            $stripped = '';
                            foreach ($portfolios as $name => $category):
                                $stripped = str_replace(' ', '', $name);
                                ?>
                                <li data-filter=".<?=$stripped?>"><?=$name?></li>
                                <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>

                    <div class="col-md-12 portfolio-bg">
                        <div id="portfolio-grid" class="row portfolio-grid">

                            <?php
                            $stripped = '';
                            foreach ($portfolios as $name => $category):
                                $stripped = str_replace(' ', '', $name);
                                foreach ($category as $portfolio):
                                    ?>
                                    <div class="col-md-6 col-xs-6 portfolio-item <?=$stripped?>">
                                        <a href="<?=base_url().$portfolio->image;?>" title="<?=$name?>"
                                           data-desc="<?=character_limiter($portfolio->details, 150)?>"
                                           class="popup">
                                           <div class="portfolio-image">
                                            <img src="<?=base_url().$portfolio->image;?>" alt="portfolio">
                                            <div class="texts">
                                                <h5><?=$portfolio->project_name;?></h5>
                                                <p><?=character_limiter($portfolio->details, $char_limit)?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            endforeach;
                            ?>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </p>
        </div>
    </div>
</div> <!-- Portfolio div ends here -->
<?php endif;?>

<?php
if ($about-> is_testimonial):
    ?>
    <div class="testimonials" id="testimonials">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <?=trans('testimonials')?>
                    <div class="lines"></div>
                </h4>
                <p class="card-text">
                    <div class="container">
                        <div class="blog-item">
                            <div class="row">
                                <div class="col-12">
                                    <div id="carouselTestimonial" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php
                                            $active = 'active';
                                            foreach ($testimonials as $testimonial):
                                                ?>
                                                <div class="carousel-item <?=$active?>">
                                                    <div class="blog-item-start">
                                                        <div class="card mb-3">
                                                            <img class="card-img-top" src="<?=base_url().$testimonial->image;?>" alt="BLOG-1">
                                                            <div class="card-body">
                                                                <h5 class="card-title"><?=$testimonial->feedback_title;?></h5>
                                                                <p class="card-text"><?=character_limiter($testimonial->feedback, $char_limit)?></p>
                                                                <p class="card-text">
                                                                   <small class="text-muted"><?=$testimonial->client_name?></small>
                                                               </p>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                               <?php
                                               $active = '';
                                           endforeach;
                                           ?>
                                       </div> <!-- div carousel-inner ends here -->
                                       <a class="carousel-control-prev" href="#carouselTestimonial" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only"><?=trans('previous')?></span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselTestimonial" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only"><?=trans('next')?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </p>
        </div>
    </div>
</div> <!-- Testimonials div ends here -->
<?php endif; ?>


<?php
if ($about-> is_service):
    ?>
    <div class="Services" id="services">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <?=trans('what_i_doing')?>
                    <div class="lines"></div>
                </h4>
                <p class="card-text">
                    <ul class="list-unstyled">
                        <?php
                        foreach ($services as $service):
                            ?>
                            <li class="media">
                                <h4><i class="<?=$service->fa_class?>"></i></h4>
                                <div class="media-body brd-btm">
                                    <h5 class="mt-0"><?=$service->service_name;?></h5>
                                    <p><?=character_limiter($service->details, $char_limit);?></p>
                                </div>
                            </li>
                            <?php
                        endforeach;
                        ?>
                    </ul>
                </p>
            </div>
        </div>
    </div> <!-- Services div ends here -->
<?php endif;?>

<?php
if ($about-> is_blog):
    ?>
    <div class="blog" id="blog">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <?=trans('latest_blog')?>
                    <div class="lines"></div>
                </h4>
                <p class="card-text">
                    <div class="container">
                        <div class="blog-item">
                            <div class="row">
                                <div class="col-12">
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php
                                            $active = 'active';
                                            foreach ($blogs as $name => $category):
                                                foreach ($category as $blog):
                                                    ?>
                                                    <div class="carousel-item <?=$active?>">
                                                        <div class="blog-item-start">
                                                            <div class="card mb-3">
                                                                <a href="<?=$blog->url?>" target="_blank"><img class="card-img-top" src="<?=base_url().$blog->image;?>" alt="BLOG-1"></a>
                                                                <div class="card-body">
                                                                    <h5 class="card-title"><?=$blog->title;?></h5>
                                                                    <p class="card-text"><?=$blog->description?></p>
                                                                    <p class="card-text">
                                                                       <small class="text-muted"><?=trans('last_updated')?> <?=time_ago($blog->updated_date)?></small>
                                                                    </p>
                                                                    <p class="card-text"><a href="<?= $blog->url ?>" target=_blank>Read More...</a></p>

                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <?php
                                               endforeach;
                                               $active = '';
                                           endforeach;
                                           ?>
                                       </div> <!-- div carousel-inner ends here -->
                                
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only"><?=trans('next')?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </p>
        </div>
    </div>
</div> <!-- Blog div ends here -->
<?php endif; ?>

<?php if ($about-> is_award):?>
    <div class="awards" id="awards">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <?=trans('awards')?>
                    <div class="lines"></div>
                </h4>
                <p class="card-text">
                    <ul class="list-unstyled">
                        <?php
                        foreach ($awards as $award):
                            ?>
                            <li class="media">
                                <div class="media-body brd-btm">
                                    <h5 class="mt-0"><?=$award->title?></h5>
                                    <p><?=character_limiter($award->details, $char_limit)?></p>
                                </div>
                                <h4><i class="<?=$award->fa_class?>"></i></h4>
                            </li>
                            <?php
                        endforeach;
                        ?>
                    </ul>
                </p>
            </div>
        </div>
    </div> <!-- Awards div ends here -->
<?php endif; ?>

<?php
if ($about-> is_app):
    ?>
    <div class="appointment" id="appointment">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <?=trans('appointment')?>
                    <div class="lines"></div>
                </h4>
                <h5>Available Days and Timings</h5>
                <?PHP
                foreach ($app_days as $app_day):
                    ?>
                    <?=$week_days[$app_day->day].' ('.$app_day->book_time_start.' to '.$app_day->book_time_end.')'?><br>
                <?php endforeach;?>
                <p class="card-text">
                    <?php echo form_open('#', 'class="contact_form clearfix" id="site_contact_form"');  ?>
                    <div class="form-row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label><?=trans('title')?></label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label><?=trans('email')?></label>
                                <input type="email" name="email" id="app_email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label><?=trans('date')?></label>
                                <input type="date" name="book_date" id="book_date" class="form-control" placeholder="e.g., yyyy-mm-dd" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label><?=trans('from_time')?></label>
                                <input type="text" name="book_time_start" id="book_time_start" class="form-control timepicker" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label><?=trans('to_time')?></label>
                                <input type="text" name="book_time_end" id="book_time_end" class="form-control timepicker" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="contact-btn">
                                <input type="button" id="btn_set_app" name="submit" class="btn btn-outline-info pl-3 pr-3" value="<?=trans('set_appointment')?>">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="user_id" name="user_id" value="<?=isset($user_id)?$user_id:''?>">
                    <input type="hidden" id="username" name="username" value="<?=isset($username)?$username:''?>">
                    <?php echo form_close(); ?>
                </p>
            </div>
        </div>
    </div> <!-- Appointment me ends here -->
<?php endif; ?>

<div class="contact" id="contact">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <?=trans('contact_now')?>
                <div class="lines"></div>
            </h4>
            <p class="card-text">
                <?php echo form_open('#', 'class="contact_form clearfix" id="site_contact_form"');  ?>
                <div class="form-row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label><?=trans('name')?></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Full Name">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label><?=trans('email')?></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder=Email>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label><?=trans('subject')?></label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label><?=trans('message')?></label>
                            <textarea name="message" id="message" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="button" id="btn_send_msg" name="submit" class="btn btn-outline-info pl-3 pr-3" value="<?=trans('send_message')?>">
                    </div>
                </div>
                <input type="hidden" id="user_id" name="user_id" value="<?=isset($user_id)?$user_id:''?>">
                <input type="hidden" id="username" name="username" value="<?=isset($username)?$username:''?>">
                <?php echo form_close(); ?>
            </p>
        </div>
    </div>
</div> <!-- Contact me ends here -->



</div>  <!-- class="col-lg-8 col-md-12 col-sm-12" main div which holds center contents of template -->


<div class="col-lg-1">
    <div class="navigation-bar">
        <nav>
            <ul class="clear-list text-center">
                <li>
                    <a href="#detail" data-toggle="tooltip" data-placement="left" title="<?=trans('about_me')?>" class="js-scroll-trigger">
                        <img src="<?= ($about->image != '')? base_url($about->image): base_url('/assets/dist/img/avatar5.png'); ?>" class="rounded-circle avatar" width="100%">
                    </a>
                </li>
                <?php
                if ($about-> is_experience):
                    ?>
                    <li>
                        <a href="#experience" data-toggle="tooltip" data-placement="left" title="<?=trans('experience')?>" class="js-scroll-trigger">
                            <i class="fas fa-briefcase fa-2x"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php
                if ($about-> is_skill):
                    ?>
                    <li>
                        <a href="#skill" data-toggle="tooltip" data-placement="left" title="<?=trans('prof_skills')?>" class="js-scroll-trigger">
                            <i class="fas fa-cogs fa-2x"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php
                if ($about-> is_education):
                    ?>
                    <li>
                        <a href="#education" data-toggle="tooltip" data-placement="left" title="<?=trans('education')?>" class="js-scroll-trigger">
                            <i class="fas fa-user-graduate fa-2x"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($about-> is_language): ?>
                    <li>
                        <a href="#language" data-toggle="tooltip" data-placement="left" title="<?=trans('languages')?>" class="js-scroll-trigger">
                            <i class="fas fa-language fa-2x"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($about-> is_reference): ?>
                    <li>
                        <a href="#references" data-toggle="tooltip" data-placement="left" title="<?=trans('references')?>" class="js-scroll-trigger">
                            <i class="fas fa-quote-right fa-2x"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($about-> is_client): ?>
                    <li>
                        <a href="#clints" data-toggle="tooltip" data-placement="left" title="<?=trans('clients')?>" class="js-scroll-trigger">
                            <i class="fas fa-user-circle fa-2x"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($about-> is_interest): ?>
                    <li>
                        <a href="#interst" data-toggle="tooltip" data-placement="left" title="<?=trans('interests')?>" class="js-scroll-trigger">
                            <i class="fas fa-thumbs-up fa-2x"></i>
                        </a>
                    </li>
                <?php endif;?>
                <?php
                if ($about-> is_portfolio):
                    ?>
                    <li>
                        <a href="#portfolio" data-toggle="tooltip" data-placement="left" title="<?=trans('portfolio')?>" class="js-scroll-trigger">
                            <i class="far fa-image fa-2x"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php
                if ($about-> is_testimonial):
                    ?>
                    <li>
                        <a href="#testimonials" data-toggle="tooltip" data-placement="left" title="<?=trans('testimonials')?>" class="js-scroll-trigger">
                            <i class="fas fa-user-circle fa-2x"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php
                if ($about-> is_service):
                    ?>
                    <li>
                        <a href="#services" data-toggle="tooltip" data-placement="left" title="<?=trans('services')?>" class="js-scroll-trigger">
                            <i class="fas fa-cog fa-2x"></i>
                        </a>
                    </li>
                <?php endif; ?>

                <?php
                if ($about-> is_blog):
                    ?>
                    <li>
                        <a href="#blog" data-toggle="tooltip" data-placement="left" title="<?=trans('label_blog')?>" class="js-scroll-trigger">
                            <i class="fas fa-blog fa-2x"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($about-> is_award): ?>
                    <li>
                        <a href="#awards" data-toggle="tooltip" data-placement="left" title="<?=trans('awards')?>" class="js-scroll-trigger">
                            <i class="fas fa-trophy fa-2x"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <?php
                if ($about-> is_app):
                    ?>
                    <li>
                        <a href="#appointment" data-toggle="tooltip" data-placement="left" title="<?=trans('appointment')?>" class="js-scroll-trigger">
                            <i class="fas fa-calendar fa-2x"></i>
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a href="#contact" data-toggle="tooltip" data-placement="left" title="<?=trans('contact')?>" class="js-scroll-trigger">
                        <i class="fas fa-envelope fa-2x"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>