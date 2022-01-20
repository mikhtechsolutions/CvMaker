
<div> <!-- this div starts in main.php   div class="row" -->
</div>
</section>


<script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/jquery.min.js"></script>
<script>
            //var $ = jQuery.noConflict();
        </script>
        <script src="<?=base_url()?>assets/themes/vendor/jquery/jquery.min.js"></script>
        <script>
            var jQuery_3_4_1 = $.noConflict(true);
        </script>

        <script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/proper.js"></script>

        <script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/waypoints.js"></script>

        <script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/jquery.counterup.min.js"></script>

        <script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/bootstrap.min.js"></script>

        <script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/magnific-popup.min.js"></script>

        <script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/all.js"></script>

        <script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/all.min.js"></script>

        <script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/isotope.min.js"></script>

        <script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/images-loded.min.js"></script>

        <script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/owl.carousel.min.js"></script>

        <script src="<?=base_url()?>assets/themes/layouts/<?=$user_layout_id?>/js/custom.js"></script>


        <script src="<?= base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                jQuery_3_4_1("#btn_send_msg").click(function(e) {
                    e.preventDefault();
                    var user_id = $("#user_id").val();
                    var username = $("#username").val();
                    var name = $("#name").val();
                    var email = $("#email").val();
                    var subject = $("#subject").val();
                    var message = $("#message").val();
                    if (!(name == '' || email == '' || subject == '' || message == '')) {
                        var url = "<?=base_url("profile/send_contact_message") ?>";
                        jQuery_3_4_1.post(url,
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

                        jQuery_3_4_1.post(url,
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

