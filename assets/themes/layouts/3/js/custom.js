;(function($){
"use strict";
    
    // Nav Scroll Click
//    if ($(".smooth-scroll > li > a").length > 0) {
//        $(".smooth-scroll > li > a").on("click", function (e) {
//            e.preventDefault();
//            $("html, body").animate({scrollTop: $($(this).attr("href")).offset().top + "px"}, 1600, "swing");
//        });
//    }
    
    //js for scroll to section content
    $('.smooth-scroll a, #nav li a').on('click', function (event) {
        var target = $(this.getAttribute('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top - 90
            }, 1600);
        }
    });
    
    /*
	  =======================================================================
		  		Page nav
	  =======================================================================
	*/
    var bgi2 = $(".fbgs").data("bgscr");
    var bgt2 = $(".fbgs").data("bgtex");
    $(".bg-scroll").css("background-image", "url(" + bgi2 + ")");
    $(".bg-title span").html(bgt2);
    $(".scroll-nav  ul").singlePageNav({
        filter: ":not(.external)",
        updateHash: false,
        offset: 60,
        threshold: 120,
        speed: 1200,
        currentClass: "current"
    });
    
//    $("#nav").singlePageNav({
//        filter: ":not(.external)",
//        updateHash: false,
//        threshold: 120,
//        speed: 1200,
//        currentClass: "current"
//    });
    
    
    /*
     * ----------------------------------------------------------------------------------------
     *  PROGRESS BAR JS
     * ----------------------------------------------------------------------------------------
     /*---------------------------------------
			SKILLS PROGRESS BAR
     ---------------------------------------*/
	try {
		jQuery('#bt-ourskill').appear(function () {
			jQuery('.bt-skillholder').each(function () {
				jQuery(this).find('.bt-skillbar').animate({
					width: jQuery(this).attr('data-percent')
				}, 2500);
			});
		});
	} catch (err) {}
	/*---------------------------------------
			SKILLS PROGRESS BAR
     ---------------------------------------*/
    
    /*===========Portfolio isotope js===========*/
    function portfolioMasonry(){
        var portfolio = $("#portfolio-grid");
        if( portfolio.length ){
            portfolio.imagesLoaded( function() {
              // images have loaded
                // Activate isotope in container
                portfolio.isotope({
                    itemSelector: ".portfolio-item",
                    layoutMode: 'masonry',
                    transformsEnabled: true,
                    transitionDuration: "700ms",
                });

                // Add isotope click function
                $("#filter li").on('click',function(){
                    $("#filter li").removeClass("active");
                    $(this).addClass("active");

                    var selector = $(this).attr("data-filter");
                    portfolio.isotope({
                        filter: selector,
                        animationOptions: {
                          animationDuration: 750,
                          easing: 'linear',
                          queue: false
                      }
                    })
                    return false;
                })
            })
        }
    }
    portfolioMasonry();
    
    // Portfolio popup
    $('.popup').magnificPopup({
        type: 'image',
        gallery: {
            // options for gallery
            enabled: true
        },
        image: {
            // options for image content type
            titleSrc: function(item) {
                return item.el.attr("title") + "<small>" + item.el.attr("data-desc") + "</small>"
            }
        }
    });
    
    /*===========Start testimonialdslider js ===========*/
    function testimonialdslider(){
        var testimonial_carousel = $(".testimonial-carousel");
        if( testimonial_carousel.length ){
            testimonial_carousel.owlCarousel({
                loop:true,
                margin:30,
                items: 1,
                thumbs: false,
                nav:false,
                autoplay: true,
                smartSpeed: 1000,
                dotsSpeed:600,
            })
        }
    }
    testimonialdslider();
    /*===========End testimonialdslider js ===========*/
    
    /*===========Start blogCarousel js ===========*/
    function blogCarousel(){
        var blog_carousel = $(".blog-carousel");
        if( blog_carousel.length ){
            blog_carousel.owlCarousel({
                loop:true,
                margin:30,
                items: 2,
                nav:false,
                autoplay: true,
                smartSpeed: 1000,
                dotsSpeed:600,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1, 
                        margin:0
                    },
                    650:{
                        items:2, 
                    }
                }
            })
        }
    }
    blogCarousel();
    /*===========End blogCarousel js ===========*/
    
    
    /*===========Start blog-carousel2 js ===========*/
    function blog_2Carousel(){
        var blog_carousels = $(".blog-carousel2");
        if( blog_carousels.length ){
            blog_carousels.owlCarousel({
                loop:true,
                margin:30,
                items: 3,
                nav:false,
                autoplay: true,
                smartSpeed: 1000,
                dotsSpeed:600,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1, 
                    },
                    650:{
                        items:2, 
                    },
                    992:{
                        items:3,
                    }
                }
            })
        }
    }
    blog_2Carousel();
    /*===========End blogCarousel2 js ===========*/
    
    /*===========Start testimonialdslider js ===========*/
    function servicesSlider(){
        var clients_slider = $(".services-slider");
        if( clients_slider.length ){
            clients_slider.owlCarousel({
                loop:true,
                margin:30,
                items: 3,
                nav:false,
                autoplay: true,
                smartSpeed: 2000,
                dotsSpeed:600,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1, 
                        margin:0,
                    },
                    500:{
                        items:2, 
                        margin:10,
                    },
                    992:{
                        items:3
                    }
                },
            });
        }
    }
    servicesSlider();
    /*===========End testimonialdslider js ===========*/
    
    /*===========Start Image fill plugin js ===========*/
    $('.img-fill-container').imagefill();
    
    /*===========Start Counter js ===========*/
    function counting_data(){
        var counter = $(".counter");
        if( counter.length){
            counter.counterUp({
                delay:10,
                time:2000
            });
        }
    } 
    counting_data();
    /*===========End Counter js ===========*/
    
    
    /*============= scrool js  ==============*/
    function scroolEffect(){
        if($(".wrapper").length){
            $('#fullpage').fullpage({
                sectionSelector: '.op-section',
                navigation: true,
                slidesNavigation: true,
                controlArrows: false,
                scrollOverflow: true
            }); 
        }
    }
    scroolEffect();
    
    
    // full screen side nav
    $(".burger-icon,#open-button").on('click', function () {
        $('.canvas-menu,.left_offcanvas_menu,.offcanvas_closer').toggleClass("mySideBar");
        $(this).toggleClass("actives");
    });
    $(".canvas-menu ul >li a,.close,.offcanvas_closer").on('click', function () {
        $('.canvas-menu,.left_offcanvas_menu,.offcanvas_closer').removeClass("mySideBar");
        $('.close,#open-button').removeClass("actives");
    });
    
    /*==========  Header  ==========*/
    $('#nav>li').each(function(index) {
		index = (index + 2) * .1;
		index = index + 's';
		$(this).css('animation-delay', index);
	});

    /*---------parallax js-----------*/
    function parallaxActivitor(){
        if($(window).width()>768){
            $.stellar({
                horizontalOffset:true,
                verticalOffset: 60,
                responsive: true,
            });
        }
    }
    parallaxActivitor();
    
    /*------ main slider js -------*/
    function revsliderOne(){
		if ( $('#slider').length ){
			$("#slider").revolution({
                sliderType:"standard",
                sliderLayout:"fullscreen",
                dottedOverlay:"none",
                delay:9000,
                navigation: {
                    keyboardNavigation:"off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation:"off",
                    mouseScrollReverse:"default",
                    onHoverStop:"off",
                    touch:{
                        touchenabled:"on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    }
                },
                responsiveLevels:[1240,1024,778,480],
                visibilityLevels:[1240,1024,778,480],
                gridwidth:[1240,1024,778,480],
                gridheight:[900,768,960,720],
                lazyType:"smart",
                parallax: {
                    type:"mouse",
                    origo:"slidercenter",
                    speed:300,
                    levels:[2,4,6,8,10,12,14,16,18,20,22,24,49,50,51,55],
                    type:"mouse",
                },
                shadow:0,
                spinner:"false",
                stopLoop:"on",
                stopAfterLoops:0,
                stopAtSlide:1,
                shuffle:"off",
                autoHeight:"off",
                fullScreenAutoWidth:"off",
                fullScreenAlignForce:"off",
                fullScreenOffsetContainer: "",
                fullScreenOffset: "",
                disableProgressBar:"on",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            });
		}
	}
	revsliderOne();
    
    
    /*------ main slider js -------*/
    function revsliderTwo(){
		if ( $('#rev_slider_106_2').length ){
			$("#rev_slider_106_2").revolution({
                sliderType:"standard",
                sliderLayout:"fullscreen",
                dottedOverlay:"none",
                delay:9000,
                navigation: {
                    keyboardNavigation:"off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation:"off",
                    mouseScrollReverse:"default",
                    onHoverStop:"off",
                    touch:{
                        touchenabled:"on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    bullets: {
                        enable:true,
                        hide_onmobile:false,
                        style:"hermes",
                        hide_onleave:false,
                        direction:"horizontal",
                        h_align:"center",
                        v_align:"bottom",
                        h_offset:0,
                        v_offset:70,
                        space:5,
                        tmp:''
                    }
                },
                responsiveLevels:[1440,1240,1024,778,480],
                visibilityLevels:[1440,1240,1024,778,480],
                gridwidth:[1400,1240,778,550,490],
                gridheight:[1000,700,700,500, 480],
                lazyType:"none",
    //			parallax: {
    //				type:"scroll",
    //				origo:"slidercenter",
    //				speed:400,
    //				speedbg:0,
    //				speedls:0,
    //				levels:[5,10,15,20,25,30,35,40,45,46,47,48,49,50,51,55],
    //			},
                shadow:0,
                spinner:"false",
                stopLoop:"true",
                stopAfterLoops:0,
                stopAtSlide:1,
                shuffle:"off",
                autoHeight:"off",
                fullScreenAutoWidth:"off",
                fullScreenAlignForce:"off",
                fullScreenOffsetContainer: "",
                fullScreenOffset: "0px",
                disableProgressBar:"on",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            });
		}
	}
	revsliderTwo();
    
    /*----------------- Contact Form - submission js ----------------*/
    var contactForm = $(".contact-form");
    contactForm.on("submit", function (e) {
        e.preventDefault();
        var contactFormName = $("input.contact-name").val(),
            contactFormEmail = $("input.contact-mail").val(),
            contactFormMessage = $(".contact-message").val();
        
        function validateEmail(useremail){
            filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (filter.test(useremail)) {
                // Yay! valid
                return true;
            }
        }
        if (contactFormName !== "" && contactFormEmail !== "" && contactFormMessage !== "") {
            
            contactForm.each(function () {
                $(this).find(":input").removeClass("validation-error");
            });
            //ajax
             $.ajax({
                type: "POST",
                url: contactForm.attr("action"),
                data: {"formName": contactFormName, "formMail": contactFormEmail, "formMessage": contactFormMessage},
                dataType: "json",
                success: function (data) {

                    $(".contact-submit-progress")
                        .append("<i class='fa fa-refresh' aria-hidden='true'></i>")
                        .hide()
                        .fadeIn("slow", function () {
                            $(".contact-submit-progress").hide();
                        });
                        function showUp() {
                          if (data.message_status == 'ok') {
                            $(".contact-submit-message").text(data.content).fadeOut(5000);
	                  } 
	                  else {
	                      $(".contact-submit-message").text(data.content).fadeOut(5000);
	                  }
                        }
                    setTimeout(showUp, 2000);
                    $(".contact-form")[0].reset();
                }
            });
        } else {
            contactForm.find(".form-control").each(function () {
                if ($(this).val() === "") {
                    $(this).addClass("validation-error");
                } else {
                    $(this).removeClass("validation-error");
                    $(this).addClass("validation-valid");
                }
            });
        }
    });

    contactForm.find(".form-control").each(function () {
        $(this).on("keyup", function () {
            if ($(this).val() === "") {
                $(this).removeClass("validation-valid");
                $(this).addClass("validation-error");
            } else {
                $(this).removeClass("validation-error");
                $(this).addClass("validation-valid");
            }
        });
    });
    
    $(".scroll").niceScroll({
        cursorcolor: "#f1b200",
        cursoropacitymin: 0.3,
        background: "transparent",
        cursorborder: "0",
        autohidemode: false,
        cursorminheight: 30
    });
    
    //Activa el nicescroll cuando esta oculto
    
    $(".scroll").getNiceScroll().resize();
    $("html").mouseover(function() {
        $(".scroll").getNiceScroll().resize();
    });
    
    /*------------- preloader js --------------*/
     $(window).load(function() { // makes sure the whole site is loaded
		$('.loader-container').fadeOut(); // will first fade out the loading animation
		$('.loader').delay(150).fadeOut('slow'); // will fade out the white DIV that covers the website.
		$('body').delay(150).css({'overflow':'visible'})
    });
    
    
})(jQuery)