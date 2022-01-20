
<!-- *****Main Wrapper***** -->
<div id="home" class="main-wrapper">

    <!-- *****Main Cntainer***** -->
    <section class="main_banner_area text-white">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5 col-md-6 mr-md-auto">
                    <div class="info">
                        <h1 class="display-4 mb-3 bold"><?=$this->general_settings['site_title'];?></h1>
                        <p class="mb-5"><?=trans('site_subtitle')?></p>
                        <?php
                        if (!$this->session->has_userdata('user_id')):
                            ?>
                            <a href="<?=base_url()?>auth/register" ><button type="button" class="btn"><?=trans('create_profile')?></button></a>
                            <a href="<?=base_url()?>auth/login" ><button type="button" class="btn"><?=trans('sign_in')?></button></a>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-12 col-lg-5 col-md-6">
                    <div class="app-img">
                        <img src="<?=base_url('assets/main/images/img02.png')?>" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- *****How it works Section***** -->
    <section id="how-it-works">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading Area -->
                    <div class="section-heading text-center">
                        <h2><?=trans('how_it_works')?>?</h2>
                        <div class="line-title-center"></div>
                        <p><?=trans('how_works_text')?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4 col-md-6">
                    <div class="how-it-single">
                        <h4><i class="icon-screen-smartphone"></i> <?=trans('fully_responsive')?></h4>
                        <p><?=trans('fully_responsive_text')?></p>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6">
                    <div class="how-it-single">
                        <h4><i class="icon-equalizer icons"></i> <?=trans('awesome_design')?></h4>
                        <p><?=trans('awesome_design_text')?></p>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6">
                    <div class="how-it-single">
                        <h4><i class="icon-support icons"></i> <?=trans('support_24_7')?></h4>
                        <p><?=trans('support_text')?></p>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- ***** Our Features Section ***** -->

    <!-- ***** Why is the Best Section ***** -->
    <section id="features">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading Area -->
                    <div class="section-heading text-center">
                        <h2><?=trans('features')?></h2>
                        <div class="line-title-center"></div>
                        <p><?=trans('unique_features_text')?></p>
                    </div>
                </div>
            </div>
            <?php
            $i = 0;
            foreach($features as $feature) {
                ?>
                <div class="row">
                    <?PHP
                    if ($i%2 == 0) {
                        ?>
                        <div class="col-lg-6">
                            <div class="img-padding-tb">
                                <img src="<?=base_url().$feature->image;?>" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 ml-md-auto">
                            <!-- Section Heading Area -->
                            <div class="section-heading mb-4">
                                <h2><?=$feature->service_name;?></h2>
                            </div>
                            <p><?=$feature->details;?></p>


                        </div>
                        <?PHP

                    } else {
                        ?>
                        <div class="col-lg-6 ml-md-auto">
                            <!-- Section Heading Area -->
                            <div class="section-heading mb-4">
                                <h2><?=$feature->service_name;?></h2>
                            </div>
                            <p><?=$feature->details;?></p>
                        </div>
                        <div class="col-lg-6">
                            <div class="img-padding-tb">
                                <img src="<?=base_url().$feature->image;?>" alt="">
                            </div>
                        </div>
                        <?PHP
                    }
                    $i++;
                    ?>


                </div>
                <?PHP
            }
            ?>
        </div>
    </section>

    <!-- ***** Pricing Plane Area *****==== -->
    <section class="pricing_plane_area bg-light" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Heading Text  -->
                    <div class="section-heading text-center">
                        <h2><?=trans('pricing_plan')?></h2>
                        <div class="line-title-center"></div>
                    </div>
                </div>
            </div>
                <?php
                $counter = 3;
                foreach ($packages as $package):
                // Make grid of 3 colums in a row
                if(!fmod($counter,3)):
                ?>
                <div class="row justify-content-center" <?= ($counter > 3) ? 'style="margin-top:35px;"' : '' ?>>
                <?php endif; ?>
                    <div class="col-12 col-md-4 col-lg-4" style="height: 500px; overflow-y: scroll; !important;">
                        <!-- Package Price  -->
                        <div class="plan-item">
                            <!-- Package Text  -->

                            <div class="pricing-detail text-center">
                                <h5><?=$package['package_name']?></h5>
                            </div>
                            <div class="package-price text-center">
                                <h4><span>$</span> <?=$package['package_price']?>

                                <?=($package['package_type'] != 'Free')? '&nbsp;/&nbsp;'.$package['package_type']:'';?></h4>
                            </div>
                            <div class="package-description">
                                <?php
                                foreach ($package['features'] as $feature):
                                    ?>
                                    <p><?=$feature->feature_name;?> <i class="fas fa-check float-right"></i></p>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                            <!-- Plan Button  -->
                            <div class="text-center  pricing-btn">
                                <?php
                                if ($package['package_type'] != 'Free'):
                                 ?>
                                 <a href="<?=base_url('/user/packages/initiate_purchase/'.$package['package_id'])?>">
                                    <button class="btn btn-outline-primary my-4" type="button"><?=trans('purchase')?></button></a>
                                    <?php
                                endif;
                                ?>

                            </div>
                        </div>
                    </div>
                    <?php

                    $counter++;
                if(!fmod($counter,3) && $counter > 3)
                    echo '</div>';
                endforeach;
                ?>
        </div>
    </section>  

    <!-- ***** Team Area Section End ***** -->

    <!-- ***** App Screenshots Area Start ***** -->
    <section class="app-screenshots-area bg-white" id="screenshot">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Heading Text -->
                    <div class="section-heading text-center">
                        <h2><?=trans('app_screenshots')?></h2>
                        <div class="line-title-center"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- App Screenshots Slides  -->
                    <div class="app_screenshots_slides owl-carousel">
                        <?PHP
                        foreach ($shots as $shot) {
                            ?>
                            <div class="single-shot">
                                <img src="<?=base_url().$shot->image;?>" alt="">
                            </div>
                            <?PHP
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** App Screenshots Area End *****====== -->

    <!-- Contact Section Start -->
    <section id="contact-us" class="bg-light">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12">
                    <!-- Heading Text -->
                    <div class="section-heading text-center">
                        <h2><?=trans('contact_us')?></h2>
                        <div class="line-title-center"></div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <?php echo form_open('#', 'class="my-form"');  ?>
                            <div class="form-group">
                                <label for="fname"><i class="icon-user"></i></label>
                                <input type="text" name="name" id="name" class="form-control" id="fname" placeholder="<?=trans('name')?>">
                            </div>
                            <div class="form-group">
                                <label for="myemail"><i class="icon-envelope"></i></label>
                                <input type="email" name="email" id="email" class="form-control" id="myemail" placeholder="<?=trans('email')?>">
                            </div>
                            <div class="form-group">
                                <label for="cname"><i class="icon-star"></i></label>
                                <input type="text" name="subject" id="subject" class="form-control" id="cname" placeholder="<?=trans('subject')?>">
                            </div>
                            <div class="form-group">
                                <label for="mnumber"><i class="icon-book-open"></i></label>
                                <textarea class="form-control" rows="60" id="message" name="message" placeholder="<?=trans('message')?>" required="required"></textarea>
                            </div>
                            <input type="hidden" id="mail_to_admin" name="mail_to_admin" value="1">
                            <div>
                                <input type="button" id="btn_send_msg" name="submit" class="btn btn-submit btn-block" value="<?=trans('send_message')?>">
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->