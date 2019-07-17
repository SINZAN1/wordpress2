jQuery("document").ready(function() {

    //loader
    jQuery(window).on('load', function() {
        jQuery("#cover").fadeOut();
    });

    // header sticky

    jQuery('.sticky').sticky();
    

    //Back to top
    jQuery(window).on('scroll', function() {
        // toggles the display of scroll to top button
        if (jQuery(this).scrollTop() > 400) {
            jQuery('.scrollUp').addClass('shw');
        } else {
            jQuery('.scrollUp').removeClass('shw');
        }
    });


    // scroll to top
    jQuery('.scrollUp').on("click", function() {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 1500);
        return false;
    }); 


    // banner slider
    jQuery(".hero-slider").slick({
        autoplay: true,
        slidesToScroll: 1,
        pauseOnFocus: false,
        pauseOnHover: false,
        arrows: true,
        dots: true,
        infinite: true,
        fade: true,
        autoplaySpeed: 5000
    });

    // room slider
    jQuery(".listing-slider").slick({
        autoplay: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        responsive: [
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 2
              }
            },
            {
              breakpoint: 481,
              settings: {
                slidesToShow: 1
              }
            }
        ]
    });


    // parallax
    jQuery('.jarallax').jarallax({
        speed: 0.2
    });     

    if (jQuery(window).width() < 991) {
       jQuery('li.menu-item-has-children > a').on('click', function(e) {
            e.preventDefault();
            jQuery(this).next().slideToggle();
        });
    } 
});