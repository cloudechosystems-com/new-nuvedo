$(document).ready(function() {
  // Loader
  $(".Loader").addClass("hide");

  // hamburger
  $(".hamburger").click(function() {
    $("nav").toggleClass("active");
    $(".hamburger").toggleClass("toggle");
  });


  $(".search_click").click(function() {
    $(".search_click").addClass("active");
  });


  $('#close_icon').click(function(e){
              e.stopPropagation();
              $(this).parents(".search_click").removeClass("active");
  });


});

$(document).ready(function(){
    $('.faq_tab').click(function(e) {
      var btn = $('.faq_tab'),
      info = $('.faq_questions_wrapper');
      id = $(this).attr('id');
      $(".faq_questions_wrapper").removeClass("Faq_active");
      if (!$("." + id).hasClass("Faq_active")) {
        $("." + id).addClass("Faq_active");
      } else {
        $("." + id).removeClass("Faq_active");
      }
        btn.removeClass('current');
        $(this).addClass('current');
    });
});

$(document).ready(function(){
    $('.faq_question').click(function(e) {
      $(this).addClass("Faq_active");
      id = $(this).attr('id');
      if (!$("." + id).hasClass("Faq_active")) {
        $("." + id).addClass("Faq_active");
      } else {
        $(this).removeClass("Faq_active");
        $("." + id).removeClass("Faq_active");
      }
    });
});


// $(window).scroll(function(){
//     if ($(this).scrollTop() >= $('.navedo_about_story').offset().top - 80)  {
//        $("#abtMush_right, #abtMush_left").addClass('fixed');
//     } else {
//        $("#abtMush_right, #abtMush_left").removeClass('fixed');
//     }
// });





// Banner carousel

// $('.banner-carousel').owlCarousel({
//   loop: true,
//   margin: 10,
//   autoplay: true,
//   singleItem: true,
//   dots: true,
//   animateOut: 'fadeOut',
//   responsive: {
//     0: {
//       items: 1,
//     },
//     600: {
//       items: 1,
//     },
//     1000: {
//       items: 1,
//     }
//   }
// });


$(".menu_wrapper .menu-item-has-children").click(function() {
  $(".menu-item-has-children .sub-menu").toggleClass("main");
});



$(document).ready(function() {
  $(".woocommerce-remove-coupon").text("X");

  // single product
  $('.collapse_menu').click(function() {
    var id = $(this).attr('id');
    var show_id = id + "s";
    $('.collapse_item').addClass("hidden");
    $('#' + show_id).toggleClass('hidden');
    $('.collapse_menu').removeClass('active');
    $('#' + id).addClass('active');

  });

  $('.reg_form_button').click(function() {
    var id = $(this).attr('id');
    var show_id = id + "content";
    $('.reg_content').addClass("hidden");
    $('#' + show_id).toggleClass('hidden');
    $('.reg_form_button').toggleClass('active');
  });
});







$(window).on("scroll", function() {
  if ($(window).scrollTop() > 50) {
    $(".header_warapper").addClass("transparent");
    $(".header_warapper").removeClass("white_color");
  } else {
    //remove the background property so it comes transparent again (defined in your css)
    $(".header_warapper").removeClass("transparent");
    $(".header_warapper").addClass("white_color");
  }

});


$(document).ready(function() {
  $(".step_box").hover(function() {
    var elmId = $(this).attr("id");
    var myId = $(elmId) + _text;
    alert(myId);
  });

});

$(document).ready(function() {

  var slides = $(".htu_item");
  var slideDetails = $(".htu_item_details");

  //Init slide 1
  slideTo(slides[0]);

  var slideIndex = 0;
  var slidedetailIndex = 0;
  var slideTime = animate();

  $(".htu_item").click(function() {
    var detailId = $(this).attr('id');
    detailId = "#" + detailId + "_txt";

    //Reset the interval to 0 and start it again
    clearInterval(slideTime);
    slideTime = animate();

    slideTo(this);
    showDetail(detailId);

  });


  function slideTo(slide) {
    $(".htu_item").removeClass("active");
    $(slide).addClass("active");
    slideIndex = jQuery(slide).index();
  }

  function showDetail(slideDetail) {
    $(".htu_item_details").removeClass("active");
    $(slideDetail).addClass("active");
    slidedetailIndex = jQuery(slideDetail).index();

  }

  function animate() {
    return setInterval(function() {
      var slide = slides[slideIndex];
      var slideDetail = slideDetails[slideIndex];
      slideTo(slide)
      showDetail(slideDetail)
      slideIndex++;
      if (slideIndex == slides.length) {
        slideIndex = 0;
      }
    }, 3000);
  }



});

$(document).on('change', 'input.qty', function() {
	console.log("log");
        // Get the current button, product id and new quantity
        var $this = $(this),
            item_hash = $this.attr('name').replace(/cart\[([\w]+)\]\[qty\]/g, '$1'),
            item_quantity = $this.val();

        // Update cart item quantity
        $.ajax({
            type: 'POST',
            url: wc_cart_params.ajax_url,
            data: {
                action: 'update_cart_item_quantity',
                hash: item_hash,
                quantity: item_quantity
            },
            success: function(response) {
                // Update cart totals
                $("[name='update_cart']").click();
                $(document.body).trigger('updated_wc_div');
            }
        });
	
    });


