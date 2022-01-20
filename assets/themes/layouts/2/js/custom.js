$(function() {

    $(".progress").each(function() {
  
      var value = $(this).attr('data-value');
      var left = $(this).find('.progress-left .progress-bar');
      var right = $(this).find('.progress-right .progress-bar');
  
      if (value > 0) {
        if (value <= 50) {
          right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
        } else {
          right.css('transform', 'rotate(180deg)')
          left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
        }
      }
  
    })
  
    function percentageToDegrees(percentage) {
  
      return percentage / 100 * 360
  
    }
  
  });

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

// tooltip
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});

 // Smooth scrolling using jQuery easing
 $('a.js-scroll-trigger[href*="#"]:not([href="#"])').on('click', function() {
  if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    if (target.length) {
      $('html, body').animate({
        scrollTop: (target.offset().top - 54)
      }, 1000, "easeInOutExpo");
      return false;
    }
  }
});



