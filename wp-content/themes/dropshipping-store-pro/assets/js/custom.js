/**
 * Exoplanet Custom JS
 *
 * @package Exoplanet
 *
 * Distributed under the MIT license - http://opensource.org/licenses/MIT
 */

/* Mobile responsive Menu*/
jQuery(function(){
  jQuery('body').on('added_to_cart', function(e, fragments, cart_hash, button) {
      var product = '';
      var img = '';
      var title = '';
      var url = '';

      var home_url = bwt_custom_script_obj.home_url;

      if ( bwt_custom_script_obj.is_home == "1" ) {
        var product = jQuery(button).closest('.inner_product');
        var img = product.find('img').attr('src');
        var title = product.find('.product_head a').text();
        //var url = product.find('.woocommerce-loop-product__link').attr('href');
      var url = product.find('.product_head a').attr('href');
      } else {
        var product = jQuery(button).closest('.product');
        var img = product.find('img').attr('src');
        var title = product.find('.woocommerce-loop-product__title').text();
        var url = product.find('.product_head a').attr('href');
      }

      if ( product != '' ) {
        jQuery.notify({
          icon: img,
          title: title,
          message: "Le produit a été ajouté a votre  <a href=" + home_url + "/cart>panier</a>.",
          url: url
        }, {
          type: 'minimalist',
          delay: "30000",
          icon_type: 'image',
          template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<img data-notify="icon" class="img-circle pull-left">' +
            '<span class="prod-title" data-notify="title">{1}</span>' +
            '<div class="prod-messg" data-notify="message">{2}</div>' +
            '</div>'
        });
      }

    });

  var open_nav=document.getElementById("open_nav");
  if(open_nav != null){
    open_nav.addEventListener("click", open);
    function open() {
      document.getElementById("sidebar1").style.width = "250px";
      document.getElementById("sidebar1").style.display = "block";
    }
  }
  var close_nav= document.getElementById("close_nav");
  if(close_nav != null){
    close_nav.addEventListener("click", close);
    function close() {
      document.getElementById("sidebar1").style.width = "0";
      document.getElementById("sidebar1").style.display = "none";

    }
  }
});

var interval=null;
function show_loading_box()
{
  jQuery(".bwt-travel-loading-box").css("display","none");
  clearInterval(interval);
}


//Video Popup
jQuery(function() {
  //----- OPEN
  jQuery('[data-popup-open]').on('click', function(e) {
    var targeted_popup_class = jQuery(this).attr('data-popup-open');
    jQuery('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

    e.preventDefault();
  });

  //----- CLOSE
  jQuery('[data-popup-close]').on('click', function(e) {
    var targeted_popup_class = jQuery(this).attr('data-popup-close');
    jQuery('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

    e.preventDefault();
  });
});

function dealscountdown($timer,mydate){
    // Set the date we're counting down to
    var countDownDate = new Date(mydate).getTime();
    // Update the count down every 1 second
    var x = setInterval(function() {
        // Get todays date and time
        var now = new Date().getTime();
        // Find the distance between now an the count down date
        var distance = countDownDate - now;
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // Output the result in an element with id="timer"
        $timer.html( "<div class='numbers'>" + days + "<br><span class='nofont'>Day</span>" + "</div>" + "   " +"<div class='numbers'>" + hours + "<br><span class='nofont'>Hrs</span>" + "</div>" + "   " + "<div class='numbers'>" + minutes + "<br><span class='nofont'>Min</span>" + "</div>" + "   " + "<div class='numbers'>" + seconds + "<br><span class='nofont'>Sec</spn" + "</div>");

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            $timer.html("Timer Up -EVENT EXPIRED");
        }
    }, 1000);
}
jQuery('document').ready(function(){

  interval = setInterval(show_loading_box,1100);
  jQuery('.count').each(function () {
      jQuery(this).prop('Counter',0).animate({
          Counter: jQuery(this).text()
      }, {
          duration: 8000,
          easing: 'swing',
          step: function (now) {
             jQuery(this).text(Math.ceil(now));
          }
      });
  });
  var mydate =jQuery('.date').val();
  jQuery(".countdown").each(function(){
      dealscountdown(jQuery(this),mydate);
  });
    var owl = jQuery('#feature-block .owl-carousel');
      owl.owlCarousel({
      margin: 30,
      nav: false,
      autoplay : false,
      lazyLoad: true,
      autoplayTimeout: 3000,
      loop: false,
      navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        425: {
          items: 2
        },
        768: {
          items: 3
        },
        1199: {
          items: 3
        },
        1200: {
          items: 4
        }
      },
      autoplayHoverPause : true,
      mouseDrag: true
    });

    var owl = jQuery('#main-category .owl-carousel');
      owl.owlCarousel({
      margin: 30,
      nav: false,
      autoplay : false,
      lazyLoad: true,
      autoplayTimeout: 3000,
      loop: false,
      navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        425: {
          items: 2
        },
        768: {
          items: 3
        },
        1024: {
          items: 4
        },
        1200: {
          items: 5
        }
      },
      autoplayHoverPause : true,
      mouseDrag: true
    });

    var owl = jQuery('#popular-brand .owl-carousel');
      owl.owlCarousel({
      margin: 20,
      nav:true,
      autoplay : true,
      lazyLoad: true,
      autoplayTimeout: 5000,
      loop: true,
      dots: false,
      autoplayHoverPause:true,
      navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1,
           margin: 30,
        },
        450: {
          items: 1,
           margin: 30,
        },
        575: {
          items: 2,
           margin: 30,
        },
        600: {
          items: 2
        },
        768: {
          items: 3
        },
        1024: {
          items: 5
        }
      },
      autoplayHoverPause : true,
      mouseDrag: true
    });

    var owl = jQuery('#new-arrival .owl-carousel');
      owl.owlCarousel({
      margin: 20,
      nav:true,
      autoplay : true,
      lazyLoad: true,
      autoplayTimeout: 5000,
      loop: true,
      dots: false,
      autoplayHoverPause:true,
      navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1,
           margin: 30,
        },
        450: {
          items: 1,
           margin: 30,
        },
        575: {
          items: 2,
           margin: 30,
        },
        600: {
          items: 2
        },
        768: {
          items: 3
        },
        1024: {
          items: 4
        }
      },
      autoplayHoverPause : true,
      mouseDrag: true
    });

    var owl = jQuery('#our-products .owl-carousel');
      owl.owlCarousel({
      margin: 20,
      nav:true,
      autoplay : true,
      lazyLoad: true,
      autoplayTimeout: 5000,
      loop: true,
      dots: false,
      autoplayHoverPause:true,
      navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1,
           margin: 30,
        },
        450: {
          items: 1,
           margin: 30,
        },
        575: {
          items: 2,
           margin: 30,
        },
        600: {
          items: 2
        },
        768: {
          items: 3
        },
        1024: {
          items: 4
        }
      },
      autoplayHoverPause : true,
      mouseDrag: true
    });

    var owl = jQuery('#deals .owl-carousel');
      owl.owlCarousel({
      margin: 20,
      nav:true,
      autoplay : false,
      lazyLoad: true,
      autoplayTimeout: 5000,
      loop: false,
      dots: false,
      autoplayHoverPause:true,
      navText : ['<i class="fas fa-long-arrow-alt-left"></i>','<i class="fas fa-long-arrow-alt-right"></i>'],
      responsive: {
        0: {
          items: 1,
           margin: 30,
        },
        450: {
          items: 1,
           margin: 30,
        },
        575: {
          items: 1,
           margin: 30,
        },
        600: {
          items: 1
        },
        768: {
          items: 1
        },
        1200: {
          items: 2
        }
      },
      autoplayHoverPause : true,
      mouseDrag: true
    });

    var owl = jQuery('#our-blog .owl-carousel');
      owl.owlCarousel({
      margin: 20,
      nav:true,
      autoplay : false,
      lazyLoad: true,
      autoplayTimeout: 5000,
      loop: false,
      dots: false,
      autoplayHoverPause:true,
      navText : ['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
      responsive: {
        0: {
          items: 1,
           margin: 30,
        },
        767: {
          items: 1,
           margin: 30,
        },
        768: {
          items: 2,
           margin: 30,
        },
        1024: {
          items: 1,
           margin: 30,
        }
      },
      autoplayHoverPause : true,
      mouseDrag: true
    });

    jQuery(".slick-carousel-trending").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      rows: 4,
      dots: false,
      arrows: true,
      autoplaySpeed: 3000,
      autoplay: true,
      prevArrow :'<i class="fas fa-chevron-left"></i>',
      nextArrow : '<i class="fas fa-chevron-right"></i>',
      cssEase: 'ease-out',
      draggable: true
    });
    jQuery(".slick-carousel-rated").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      rows: 4,
      dots: false,
      arrows: true,
      autoplaySpeed: 3000,
      autoplay: true,
      prevArrow :'<i class="fas fa-chevron-left"></i>',
      nextArrow : '<i class="fas fa-chevron-right"></i>',
      cssEase: 'ease-out',
      draggable: true
    });
    jQuery(".slick-carousel-popular").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      rows: 4,
      dots: false,
      arrows: true,
      autoplaySpeed: 3000,
      autoplay: true,
      prevArrow :'<i class="fas fa-chevron-left"></i>',
      nextArrow : '<i class="fas fa-chevron-right"></i>',
      cssEase: 'ease-out',
      draggable: true
    });
    jQuery(".slick-carousel-selling").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      rows: 4,
      dots: false,
      arrows: true,
      autoplaySpeed: 3000,
      autoplay: true,
      prevArrow :'<i class="fas fa-chevron-left"></i>',
      nextArrow : '<i class="fas fa-chevron-right"></i>',
      cssEase: 'ease-out',
      draggable: true
    });

   // AOS.init();
    AOS.init({
    disable: function() {
    var maxWidth = 800;
    return window.innerWidth < maxWidth;
    }
  });

  // ------------ Sticky Navbar -------------------
  var stickyon=jQuery('#sticky-onoff').text().trim();
  var a1=stickyon.length;
  var navbar = document.getElementById("site-sticky-menu");

  window.onscroll = function() {
    if(a1==3)
    {
      if(navbar!=null)
      {
        myScrollNav();
      }
    }
  }

  if(navbar!=null)
  {
    var sticky = jQuery( navbar ).offset().top;
  }
  function myScrollNav() {
    if (window.pageYOffset > sticky) {
      //alert(window.pageYOffset);
      navbar.classList.add("sticky");
      navbar.classList.add("stickynavbar");
    } else {
      navbar.classList.remove("sticky");
      navbar.classList.remove("stickynavbar");
    }
  }


  jQuery('#advance_search_section .nav-link').on('click', function(){
    var tab_id = jQuery(this).attr('data-tab-id');
    jQuery('#advance_search_section #tab_cat').attr('value', tab_id);
  });
});



  //At the document ready event
  jQuery(function(){
    new WOW().init();
  });
  //also at the window load event
  jQuery(window).on('load', function(){
       new WOW().init();
  });

jQuery(function(jQuery){
  var comingWin=jQuery(window).width();
  "use strict";
  if(comingWin > 1024)
  {
    jQuery('.menu > ul').superfish({
      delay:       500,
      animation:   {opacity:'show',height:'show'},
      speed:       'fast'
    });
  }
});



jQuery(document).ready(function() {
  jQuery('.main-navigation ul li a').click(function() {
    jQuery(this).siblings(".sub-menu").toggle();
  });

  jQuery('.middle-header .wishlist_view').append('<i class="yith-wcwl-icon far fa-heart"></i>');
  jQuery('#our-products .yith-wcwl-add-button .add_to_wishlist,.products-temp .yith-wcwl-add-button .add_to_wishlist').append('<i class="yith-wcwl-icon far fa-heart"></i>');
  jQuery('#new-arrival .yith-wcwl-add-button .add_to_wishlist,.products-temp .yith-wcwl-add-button .add_to_wishlist').append('<i class="yith-wcwl-icon far fa-heart"></i>');
  jQuery('#featured-product .yith-wcwl-add-button .add_to_wishlist,.products-temp .yith-wcwl-add-button .add_to_wishlist').append('<i class="yith-wcwl-icon far fa-heart"></i>');
/*  jQuery('.yith-wcwl-wishlistexistsbrowse a').append('<i class="yith-wcwl-icon fas fa-heart"></i>');*/
  jQuery('.entry-summary .yith-wcwl-add-button .add_to_wishlist').append('<i class="yith-wcwl-icon far fa-heart"></i>');
  jQuery('#sidebar .widget_search input[type="submit"]').replaceWith('<button type="submit" class="wpcf7-form-control wpcf7-submit"><i class="fas fa-search"></i></button>');
  jQuery('.widget_search form input[type="submit"]').replaceWith('<button type="submit" class="wpcf7-form-control wpcf7-submit"><i class="fas fa-search"></i></button>');
  jQuery('.yith-wcqv-button i').replaceWith('<i class="fas fa-expand-alt"></i>');

  // ------------ Scroll Top ---------------

  jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
      jQuery('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
      jQuery('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
  });
  jQuery('#return-to-top').click(function() {      // When arrow is clicked
    jQuery('body,html').animate({
      scrollTop : 0                       // Scroll to top of body
    }, 1000);
  });

});

jQuery(document).ready(function(){
  jQuery('#mySidenav ul li a').next('.sub-menu').hide();
  jQuery('#menu-primary-menu li.menu-item-has-children a').click(function() {
    jQuery(this).closest('li.menu-item-has-children').find('ul.sub-menu:first').toggleClass('menu-item-has-children');
  });
});

jQuery('#wp-block-search__input-1').attr('placeholder',"Search...");

  jQuery('document').ready(function(){
    jQuery(".copyright-text p").html(function(){
      var text1= jQuery(this).text().trim().split(" ");
      var last = text1[4];
      var l = text1.length;
      text1.splice(4,1)
      if(text1.length > 0 ){
        var updatedText = `<a class='last_copy_head' href="https://www.buywptemplates.com/" target='_blank'>${last}</a>`
        text1.splice(4, 0, updatedText)
      text1.splice(5,0);
        return text1.join(" ");
      }else{
        return text1.join(" ");
      }
    });
  });

  jQuery('document').ready(function(){
  jQuery('.cat_togglee').click(function() {
    jQuery('#cart_animate').toggle('slow');
  });

  jQuery('.cat_toggle span, .cat_toggle i').click(function() {
    jQuery('#cart_animate1').toggle('slow');
  });

  jQuery(document).click(function(e) {

    if (e.target.id != 'cat_togglee' && !jQuery('#cat_togglee').find(e.target).length && e.target.id != 'cart_animate' && !jQuery('#cart_animate').find(e.target).length) {
        jQuery("#cart_animate").hide();
    }

    if (e.target.id != 'cat_toggle' && !jQuery('#cat_toggle').find(e.target).length && e.target.id != 'cart_animate1' && !jQuery('#cart_animate1').find(e.target).length) {
        jQuery("#cart_animate1").hide();
    }
  });
  jQuery('.comment-form-comment #comment').attr('placeholder',"Comments:");
    jQuery('#author').attr('placeholder',"Name:");
    jQuery('#email').attr('placeholder',"Email:");
    jQuery('#url').attr('placeholder',"Website:");
    jQuery('.submit-date2').attr('placeholder',"Website:");
  jQuery('.widget_product_search input').attr('placeholder',"Recherche ...");

  jQuery('.widget_product_search button').text('');
  jQuery('.widget_product_search button').append('<i class="fas fa-search ms-3"></i>');
});

  jQuery(function(){
    var url = window.location.href;
        jQuery('#menu-primary-menu li a').each(function() {
             if ( this.href == url ) {
                jQuery(this).parent().addClass('current_page_item');
            }
        });
  });
