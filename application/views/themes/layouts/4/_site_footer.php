<!-- Start Footer Area -->
<section class="footers">
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="copy-right">
                    <h6><?=$this->general_settings['copyright']?></h6>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Footer Area -->
</div>
</div>
</div>
<!-- Java Script -->
<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/jquery-2.2.4.js"></script>
<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/vendors/waypoint/waypoints.min.js"></script>
<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/vendors/countdown/jquery.counterup.min.js"></script>
<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/apear.js"></script>
<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/vendors/isotope/isotope-min.js"></script>
<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/jquery-imagefill.js"></script>
<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/jquery-nav.js"></script>
<!--Slick Js -->
<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/slick.min.js"></script>
<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/jquery.stellar.js"></script>
<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/nicescroll.js"></script>
<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/language.js"></script>
<!-- custom js -->
<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/custom.js"></script>
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