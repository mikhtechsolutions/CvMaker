
<!-- *****Main Wrapper***** -->
<div id="home" class="main-wrapper">

    <!-- start banner Area -->

    <br><br>

    <!-- End banner Area -->



    <section class="section-gap">
        <?php $this->load->view('admin/includes/_messages.php') ?>

        <div class="container">

            <div class="row">

                <div class="col-lg-12">
                    <h3><?=trans('order_summary')?></h3>
                    <hr />
                </div>

                <div class="col-lg-6">

                    <div class="card">

                        <div class="card-body">
                            <p><img src="<?=base_url().$package->thumb?>"></p>

                            <h5 class="card-title"><?= $package->name ?> &nbsp; (<span>$</span> <?=$package->price?><?=($package->type != 'F')? '&nbsp;/&nbsp;'.package_type_label($package->type):'';?>)</h5>

                            <p class="card-text"><?=trans('package_features')?>:</p>
                            <p class="card-text">
                                <?php
                                $features_list = '';
                                foreach ($package_features as $pf):
                                    $features_list .= $pf->feature_name.', ';
                                endforeach;
                                ?>
                                <?=substr($features_list, 0, -2);?>
                            </p>
                            <p><h4><?=trans('total_due')?>: &nbsp;$ <?=$package->price?></h4></p>
                            <p><h4><?=trans('next_expiry')?>: &nbsp; <?=$expiry_date?></h4></p>

                        </div>

                    </div>

                </div>

                <div class="card col-lg-5">
                    <div class="card-body">
                        <!-- Credit card form tabs -->
                        <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
                            <li class="nav-item">
                                <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
                                    <i class="fa fa-credit-card"></i>
                                    <?=trans('credit_card')?>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a data-toggle="pill" href="#nav-tab-paypal" class="nav-link rounded-pill">
                                    <i class="fa fa-paypal"></i>
                                    Paypal
                                </a>
                            </li>

                        </ul>
                        <!-- End -->


                        <!-- Credit card form content -->
                        <div class="tab-content">

                            <!-- credit card info-->
                            <div id="nav-tab-card" class="tab-pane fade show active">
                                <p class="payment-status" id="payment-errors">&nbsp;</p>
                                <?php $attributes = array('id' => 'paymentFrm', 'method' => 'post' , 'class' => 'form_horizontal'); ?>
                                <?php echo form_open_multipart(base_url('user/packages/pay_with_stripe'),$attributes);?>
                                <div class="form-group">
                                    <label for="username"><?=trans('full_name')?></label>
                                    <input type="text" name="name" id="name" placeholder="Jason Doe" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email"><?=trans('email')?></label>
                                    <input type="email" name="email" id="email"  placeholder="test@example.com" required class="form-control">
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="item_number" class="form-control" value="<?= $package->id ?>" required>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="item_price" class="form-control" value="<?= $package->price ?>" required />
                                </div>

                                <div class="form-group">
                                    <label for="cardNumber"><?=trans('card_number')?></label>
                                    <div class="input-group">
                                        <input type="text" name="card-number" id="card-number" autocomplete="off" placeholder="Your card number" class="form-control" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text text-muted">
                                                <i class="fa fa-cc-visa mx-1"></i>
                                                <i class="fa fa-cc-amex mx-1"></i>
                                                <i class="fa fa-cc-mastercard mx-1"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label><span class="hidden-xs"><?=trans('expiration')?></span></label>
                                            <div class="input-group">
                                                <input type="number" placeholder="MM" maxlength="2" name="card-expiry-month" id="card-expiry-month" class="form-control" required>
                                                <input type="number" placeholder="YY" maxlength="4" name="card-expiry-year" id="card-expiry-year" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-4">
                                            <label data-toggle="tooltip" title="Three-digits code on the back of your card">CVV
                                                <i class="fa fa-question-circle"></i>
                                            </label>
                                            <input type="text" name="card-cvc" id="card-cvc" required class="form-control">
                                        </div>
                                    </div>



                                </div>
                                <button type="submit" id="payBtn" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> <?=trans('confirm')?>  </button>
                                <?php echo form_close(); ?>
                            </div>
                            <!-- End -->

                            <!-- Paypal info -->
                            <div id="nav-tab-paypal" class="tab-pane fade">
                                <?php echo form_open(base_url('user/packages/buy'), 'class="my-form" '); ?>
                                <input type="hidden" name="package_id" value="<?=$package->id?>">
                                <p><?=trans('pay_with_paypal')?></p>
                                <p>
                                    <input type="submit" name="submit" class="btn btn-primary rounded-pill" value="Pay with Paypal">
                                </p>
                                <p class="text-muted"><?=trans('going_to_paypal')?>
                                </p>
                                <?php echo form_close(); ?>
                            </div>
                            <!-- End -->




                        </div>
                        <!-- End -->

                    </div>
                </div>


            </div>

        </div>

    </section>

    <script>
        var csfr_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csfr_token_value = '<?php echo $this->security->get_csrf_hash(); ?>';
        var total_amount = '<?php $package->price;  ?>';
        var currency = '<?php echo 'USD'; ?>';
        var stripe_key = '<?php echo 'sk_test_TMbUaFbCy6vreanBfGa64frP00mxfxxHiv' ?>';
    </script>

    <!-- Stripe JavaScript library -->
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>


    <!-- Contact Section End -->
