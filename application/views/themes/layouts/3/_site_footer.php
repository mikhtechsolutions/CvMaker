<!--=============Start footer-area ===========-->
<footer class="footer-area">
    <div class="container">
        <div class="row display-f bg-color">
            <div class="col-md-3 col-sm-4 col-left">
                <div class="sec-title">
                    <h6><?=$this->general_settings['copyright']?></h6>
                </div>
            </div>
            <div class="col-md-9 col-sm-8 col-right f-right">
                <div class="footer-links">
                   &nbsp;
                </div>
                <div class="footer-social">
                    <a href="<?=$this->general_settings['facebook']?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="<?=$this->general_settings['twitter']?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="<?=$this->general_settings['linkedin']?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    <a href="<?=$this->general_settings['instagram']?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--=============End footer-area ===========-->
<!-- js -->
<script type="text/javascript" src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/jquery-2.2.4.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/vendors/waypoint/waypoints.min.js"></script>
<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/vendors/countdown/jquery.counterup.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/apear.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/vendors/isotope/isotope-min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/vendors/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/jquery-imagefill.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/jquery-nav.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/jquery.stellar.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/nicescroll.js"></script>
<!-- custom js -->
<script type="text/javascript" src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/custom.js"></script>
<script src="<?= base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#btn_send_msg").click(function(e) {
            e.preventDefault();
            var user_id = $("#user_id").val();
            var username = $("#username").val();
            var name = $("#name").val();
            var email = $("#email").val();
            var subject = $("#subject").val();
            var message = $("#message").val();
            if (!(name == '' || email == '' || subject == '' || message == '')) {
                var url = "<?=base_url("profile/send_contact_message") ?>";
                $.post(url,
                {
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                    'user_id': user_id,
                    'username' : username,
                    'name': name,
                    'email': email,
                    'subject': subject,
                    'message': message
                }, function(json) {
                    if(json.success == 1){
                        alert('Message has been sent successfully!')
                    } else {
                        alert('Error while sending contact message');
                    }
                },'json');
                return false;

            } else {
                alert("Please Fill All Fields.");
            }
        });

        $("#btn_set_app").click(function(e) {
            e.preventDefault();
            var user_id = $("#user_id").val();
            var username = $("#username").val();
            var title = $("#title").val();
            var email = $("#app_email").val();
            var book_date = $("#book_date").val();
            var book_time_start = $("#book_time_start").val();
            var book_time_end = $("#book_time_end").val();


            if (!(title == '' || email == '' || book_date == '')) {
                var url = '<?=base_url("profile/set_appointment") ?>';

                $.post(url,
                {
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                    'user_id': user_id,
                    'username' : username,
                    'title': title,
                    'email': email,
                    'book_date': book_date,
                    'book_time_start': book_time_start,
                    'book_time_end' : book_time_end
                }, function(json) {
                    if(json.success == 1){
                        alert('Appointment has been set successfully!')
                    } else {
                        alert('Error while sending data');
                    }
                },'json');
                return false;

            } else {
                alert("Please Fill All Fields.");
            }
        });

                //Timepicker
                $('.timepicker').timepicker({
                    showInputs: false
                })
            });
        </script>
    </body>
    </html>