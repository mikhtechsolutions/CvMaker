<?php if(!isset($footer)): ?>

<!-- ***** footer-Area-start ***** -->
<footer class="text-center">
    <ul class="social-icons list-inline">
        <li class="list-inline-item"><?=anchor_popup($this->general_settings['facebook'], '<i class="fab fa-facebook"></i>');?></li>
        <li class="list-inline-item"><?=anchor_popup($this->general_settings['twitter'], '<i class="fab fa-twitter"></i>');?></li>
        <li class="list-inline-item"><?=anchor_popup($this->general_settings['instagram'], '<i class="fab fa-instagram"></i>');?></li>
        <li class="list-inline-item"><?=anchor_popup($this->general_settings['linkedin'], '<i class="fab fa-linkedin-in"></i>');?></li>
    </ul>
    <p class="copy-right"><?=$this->general_settings['footer_about']?></p>
    <p class="copy-right"><?=$this->general_settings['copyright']?> <a href=""><?=$this->general_settings['site_name']?></a></p>
     <ul class="list-inline">
        
        <?php 
          $pages = get_pages(); 
          foreach($pages as $page):
        ?>
            <li class="list-inline-item"><?=anchor_popup(base_url('p/'.$page['slug']), $page['title']);?></li>
        <?php endforeach; ?>

    </ul>
</footer>

<?php endif; ?>

<!-- ***** footer-Area-End ***** -->
</div>
<!-- ***** End Main Wrapper ***** -->

<!-- Jquery-2.2.4 JS -->
<script src="<?=base_url()?>assets/main/js/jquery-2.2.4.min.js"></script>
<!-- Bootstrap-4 Beta JS -->
<script src="<?=base_url()?>assets/main/js/bootstrap.min.js"></script>
<!--Jquery Easing Js -->
<script src="<?=base_url()?>assets/main/js/easing.js"></script>
<!--Slick Js -->
<script src="<?=base_url()?>assets/main/js/slick.min.js"></script>
<!--Magnific Popup Js -->
<script src="<?=base_url()?>assets/main/js/magnific-popup.js"></script>
<!--OWL Carousel Js -->
<script src="<?=base_url()?>assets/main/js/owl-carousel.min.js"></script>
<!-- Custom JS -->
<script src="<?=base_url()?>assets/main/js/custom.js"></script>

<script type="text/javascript">


    $(document).ready(function() {
        $("#btn_send_msg").click(function(e) {
            e.preventDefault();
            var user_id = $("#user_id").val();
            var username = $("#username").val();
            var mail_to_admin = $("#mail_to_admin").val();
            var name = $("#name").val();
            var email = $("#email").val();
            var subject = $("#subject").val();
            var message = $("#message").val();
            if (!(name == '' || email == '' || subject == '' || message == '')) {
                var url = '<?=base_url("profile/send_contact_message") ?>';

                $.post(url,
                    {
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                        'user_id': user_id,
                        'username' : username,
                        'name': name,
                        'email': email,
                        'subject': subject,
                        'message': message,
                        'mail_to_admin': mail_to_admin
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
    });


</script>
<!-- Below code for Stripe payment form -->
<script type="text/javascript">
    //set your publishable key
    Stripe.setPublishableKey('pk_test_Vq7vPui3v2LZPWCzT9LBeaVv00RAS7HwZ1');

    //callback to handle the response from stripe
    function stripeResponseHandler(status, response) {
        if (response.error) {
            //enable the submit button
            $('#payBtn').removeAttr("disabled");
            //display the errors on the form
            $('#payment-errors').addClass('alert alert-danger');
            $("#payment-errors").html(response.error.message);
        } else {
            var form$ = $("#paymentFrm");
            //get token id
            var token = response['id'];
            //insert the token into the form
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            //submit form to the server
            form$.get(0).submit();
        }
    }
    $(document).ready(function() {
        //on form submit
        $("#paymentFrm").submit(function(event) {
            //disable the submit button to prevent repeated clicks
            $('#payBtn').attr("disabled", "disabled");

            //create single-use token to charge the user
            Stripe.createToken({
                number: $('#card-number').val(),
                cvc: $('#card-cvc').val(),
                exp_month: $('#card-expiry-month').val(),
                exp_year: $('#card-expiry-year').val()
            }, stripeResponseHandler);

            //submit from callback
            return false;
        });
    });
</script>

</body>
</html>