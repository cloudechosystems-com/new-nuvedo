<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dravalife
 */

?>
<footer id="colophon" class="site-footer">

    <div class="footer_main_wrapper" style="background:#111;">
      <div class="footer_web_mark">
        <img class="footer_logo" style="    margin: 10px; width: 250px; filter: invert(1); padding-left: 20px;" src="https://nuvedo.com/wp-content/uploads/2023/04/cropped-Registered-Logo.png" alt="">
		  <span class="copywrite_claim"> © Nuvedo official 2021</span>
		  <img class="footer_logo" style="filter: invert(1); margin: 75px 20px 10px 20px; width:120px;" src="https://nuvedo.com/wp-content/uploads/2023/08/NIconsAsset-1.svg" alt="">
      </div>
      <section class="store-section">
  <div class="store-container">
    
    <div class="store-heading-wrapper">
      <h2 class="store-heading">Visit Our store</h2>
    </div>
    
    <div class="store-cards-wrapper">
      
      <div class="store-card-wrapper">
        <div class="store-card">
          <div class="store-map-wrapper">
            <img class="store-map-img" src="https://via.placeholder.com/300x200" alt="Map Location 1">
          </div>
          <div class="store-info-wrapper">
            <div class="store-icon-wrapper">
             <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/07/17094183761571183081-1-1.png"/>
            </div>
            <div class="store-text-wrapper">
              <p class="store-address">
                35/1, Dwaraka industries,<br>
                Gollahalli, 10th Block,<br>
                Anjanapura, B......
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="store-card-wrapper">
        <div class="store-card">
          <div class="store-map-wrapper">
            <img class="store-map-img" src="https://via.placeholder.com/300x200" alt="Map Location 2">
          </div>
          <div class="store-info-wrapper">
            <div class="store-icon-wrapper">
              <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/07/17094183761571183081-1-1.png"/>
            </div>
            <div class="store-text-wrapper">
              <p class="store-address">
                35/1, Dwaraka industries,<br>
                Gollahalli, 10th Block,<br>
                Anjanapura, B........
              </p>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>
      <div class="footer_menu">
		  <div class="footer_spacing">
		  	<div>Quick Links</div>
		    <?php
									wp_nav_menu(
										array(
											'menu' => 'Menu 1',
											'menu_id' => 'footer-advanced-menu',
										)
									);
									?>
		  </div>
		   <div class="footer_spacing">
			<div>Certificates</div>
       		 <?php
									wp_nav_menu(
										array(
											'menu' => 'Menu 2',
											'menu_id' => 'footer-advanced-menu2',
										)
									);
									?>
		  </div>


      </div>

      <div class="footer_contact_details">
		  <div class="footer_menu">Address & Details</div>
        <div class="footer_address">
          Nuvedo labs Pvt Ltd<br> Dwaraka industries,<br> Gollahalli, 10th Block<br>Anjanapura<br> Bangalore - 560062
        </div>
        <div>
          <b>CIN:</b> U01100KA2021PTC144692<br>
		  <b>GST:</b> 29AAHCN4631L1Z2<br>
		  <b>FSSAI:</b> 11222334000732
        </div>
		<div>
			<div class="footer_phonenumber">
			  <a href="tel:+917306746936" class="phoneNumber"> Contact: +917306746936 </a>
			</div>
			<div class="footer_email">
			  <a href="mailto:support@nuvedo.com">E-mail: support@nuvedo.com</a>
			</div>
		</div>
      </div>
      <div class="footer_social_icon">
        <a href="https://www.facebook.com/nuvedo/" class="facebook"> <svg id="Capa_1" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 167.66 166.96"><path class="cls-1" d="M83.83.35a83.78,83.78,0,0,0-14,166.4V101.67H49.63V78.25H69.85V61c0-20,12.24-31,30.11-31a167.27,167.27,0,0,1,18.06.92v21h-12.4C95.9,51.89,94,56.51,94,63.29V78.24h23.19l-3,23.41H94v65.66A83.79,83.79,0,0,0,83.83.35Z" transform="translate(0 -0.35)"/></svg> </a>
        <a href="https://www.instagram.com/nuvedo/" class="instagram"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M305,256a49,49,0,1,1-49-49A49,49,0,0,1,305,256Z"/><path d="M370.59,169.3a48.62,48.62,0,0,0-27.89-27.89c-5.18-2-13-4.41-27.3-5.06-15.5-.71-20.15-.86-59.4-.86s-43.9.15-59.4.85c-14.33.66-22.12,3-27.3,5.07a48.68,48.68,0,0,0-27.9,27.89c-2,5.18-4.4,13-5.06,27.3-.7,15.5-.86,20.15-.86,59.4s.16,43.9.86,59.41c.66,14.33,3,22.11,5.06,27.29a48.73,48.73,0,0,0,27.9,27.9c5.18,2,13,4.41,27.3,5.06,15.5.71,20.14.86,59.4.86s43.9-.15,59.4-.86c14.33-.65,22.12-3.05,27.3-5.06a48.67,48.67,0,0,0,27.89-27.9c2-5.18,4.41-13,5.07-27.29.7-15.51.85-20.16.85-59.41s-.15-43.9-.85-59.4C375,182.27,372.61,174.48,370.59,169.3ZM256,331.48A75.48,75.48,0,1,1,331.48,256,75.48,75.48,0,0,1,256,331.48Zm78.47-136.31a17.64,17.64,0,1,1,17.64-17.64A17.64,17.64,0,0,1,334.47,195.17Z"/><path d="M256,0C114.64,0,0,114.64,0,256S114.64,512,256,512,512,397.36,512,256,397.36,0,256,0ZM402.11,316.61c-.71,15.64-3.2,26.33-6.83,35.68a75.15,75.15,0,0,1-43,43c-9.35,3.63-20,6.12-35.68,6.83S295.93,403,256,403s-44.93-.17-60.61-.89-26.33-3.2-35.68-6.83a75.25,75.25,0,0,1-43-43c-3.63-9.35-6.12-20-6.83-35.68S109,295.92,109,256s.17-44.93.89-60.61,3.19-26.33,6.82-35.68a75.3,75.3,0,0,1,43-43c9.35-3.63,20-6.12,35.68-6.83S216.08,109,256,109s44.93.17,60.61.89,26.33,3.2,35.68,6.82a75.23,75.23,0,0,1,43,43c3.64,9.35,6.12,20,6.84,35.68S403,216.08,403,256,402.83,300.93,402.11,316.61Z"/></svg></a>
        <a href="https://twitter.com/Nuvedo1" class="twitter"> <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256,0C114.64,0,0,114.64,0,256S114.64,512,256,512,512,397.36,512,256,397.36,0,256,0ZM372.89,199.6q.17,3.78.16,7.6c0,77.64-59.1,167.18-167.18,167.18h0A166.35,166.35,0,0,1,115.8,348a118.69,118.69,0,0,0,87-24.34,58.8,58.8,0,0,1-54.89-40.81,58.63,58.63,0,0,0,26.54-1,58.77,58.77,0,0,1-47.15-57.59c0-.27,0-.51,0-.75a58.33,58.33,0,0,0,26.62,7.34,58.82,58.82,0,0,1-18.2-78.44,166.84,166.84,0,0,0,121.12,61.39A58.79,58.79,0,0,1,357,160.19a117.75,117.75,0,0,0,37.31-14.26,59,59,0,0,1-25.84,32.5,117.49,117.49,0,0,0,33.75-9.26A119.45,119.45,0,0,1,372.89,199.6Z"/></svg></a>
		  <a href="https://www.youtube.com/@nuvedolabs" class="youtube"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3333 3333" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"><path d="M1667 0c920 0 1667 746 1667 1667 0 920-746 1667-1667 1667C747 3334 0 2588 0 1667 0 747 746 0 1667 0zm913 1294s-18-129-74-185c-71-74-151-75-187-79-261-19-652-19-652-19h-1s-392 0-652 19c-36 4-116 5-187 79-56 56-74 185-74 185s-19 151-19 302v141c0 151 19 302 19 302s18 129 74 185c71 74 164 72 206 80 149 14 634 19 634 19s392-1 653-19c36-4 116-5 187-79 56-56 74-185 74-185s19-151 19-302v-141c0-151-19-302-19-302zm-1107 615v-524l504 263-504 261z"/></svg></a>
		  
      </div>
    </div>

</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
<div class="footer-bar">
  <a href="https://lightgrey-crab-521485.hostingersite.com/my-account/" class="footer-item">
  <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/14163220701548233621-1.png" class="footer-icon" alt="Home Icon"/>
    <span>Account</span>
  </a>
  <a href="https://lightgrey-crab-521485.hostingersite.com/cart/" class="footer-item">
   <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/Cart-Icon.png" class="footer-icon" alt="Cart Icon"/>
    <span>Cart</span>
  </a>
  <a href="#" class="footer-item">
    <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/18366974841582708977-1.png" class="footer-icon" alt="Home Icon"/>
    <span>Offers</span>
  </a>
  <a href="https://wa.me/+917306746936" class="footer-item">
    <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/14329293221556105345-1.png" class="footer-icon" alt="Help Icon"/>
    <span>Help/Contact</span>
  </a>
</div>

<script src="https://unpkg.com/scrollreveal"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>

<script>
$('.owlgallery').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
})

</script>
<script type="text/javascript">
$('.gallery_slider').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    dots: false,
    autoplay:true,
    loop:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:2,
            nav:false,
        }
    }
});

</script>
<script>
    $(".banners").owlCarousel({
        items: 1, // Display only one item at a time
        loop: true, // Enable loop
        autoplay: true, // Enable autoplay
        autoplayTimeout: 2000, // Autoplay interval in milliseconds (3 seconds in this example)
        autoplayHoverPause: true, // Pause autoplay on hover
        nav: true, // Enable navigation arrows
        dots: true // Enable navigation dots
    });
</script>

  <script>
        // Get references to the elements
        const topBar = document.getElementById('topBar');
        const contentSection = document.getElementById('main-contents');

        let prevScrollPos = window.pageYOffset;

        // Listen for scroll events
        window.addEventListener('scroll', () => {
            const currentScrollPos = window.pageYOffset;

            if (prevScrollPos > currentScrollPos) {
                topBar.style.display = 'flex'; // Display the top bar when scrolling up
            } else {
                topBar.style.display = 'none'; // Hide the top bar when scrolling down
            }

            prevScrollPos = currentScrollPos;
        });
    </script>
<script>
    $(".testimonial").owlCarousel({
        items: 4,
        loop: true,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            1200: {
                items: 4 
            },
            992: {
                items: 3 
            },
            768: {
                items: 2
            },
            0: {
                items: 1 
            }
        }
    });
</script>
<script>
    $(".nf_wrapper,.partners_logo_wrap").owlCarousel({
        items: 4,
        loop: true,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            1200: {
                items: 4 
            },
            992: {
                items: 3 
            },
            768: {
                items: 2
            },
            0: {
                items: 2
            }
        }
    });
</script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script>
$(document).ready(function() {
    // Hide the filter content initially
    $(".filter-content").hide();

    // When the filter icon is clicked, toggle the filter content
    $(".filter-icon").click(function() {
        $(".filter-content").slideToggle(); // You can use .toggle() instead of .slideToggle() for a simple show/hide effect
    });
});
</script>
<script>
jQuery(document).ready(function($) {
    $('.menu-item-has-children').hover(
        function() {
            var submenuId = $(this).data('submenu');
            $('#' + submenuId).fadeIn('fast');
        },
        function() {
            var submenuId = $(this).data('submenu');
            $('#' + submenuId).fadeOut('fast');
        }
    );
});

</script>
<script>
$(document).ready(function() {
  $('.ReviewComment').each(function() {
    var $this = $(this);
    var $reviewSmall = $this.find('.reviewSmall');
    var $reviewExpanded = $this.find('.reviewExpanded');
    var content = $reviewSmall.text().trim(); // Get and trim the content

    if (content.length > 0) {
      // Content is present, make the button clickable
      var $showMoreButton = $this.find('.ReviewComment-showMore');
      $showMoreButton.click(function() {
        if ($reviewSmall.is(':visible')) {
          $reviewSmall.hide();
          $reviewExpanded.show();
          $showMoreButton.addClass('is-expanded');
          $showMoreButton.find('span').text('Show Less');
        } else {
          $reviewSmall.show();
          $reviewExpanded.hide();
          $showMoreButton.removeClass('is-expanded');
          $showMoreButton.find('span').text('Show More');
        }
      });
    } else {
      // No content, hide the button
      $this.find('.ReviewComment-showMore').hide();
    }
  });
});

</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const isMobile = window.innerWidth <= 768;

  // Only open by default on mobile
  if (isMobile) {
    document.querySelectorAll('.menu-grid').forEach(grid => {
      grid.classList.add('active');
    });
    document.querySelectorAll('.toggle-icon').forEach(icon => {
      icon.textContent = '–';
    });
  }

  // Click toggle works on all devices
  document.querySelectorAll('.menu-title-wrapper').forEach(wrapper => {
    wrapper.addEventListener('click', () => {
      const section = wrapper.closest('.menu-section');
      const grid = section.querySelector('.menu-grid');
      const icon = wrapper.querySelector('.toggle-icon');

      grid.classList.toggle('active');
      icon.textContent = grid.classList.contains('active') ? '–' : '+';
    });
  });
});
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const sticky = document.querySelector(".payment-section");
    const stop = document.querySelector("footer");

    if (window.innerWidth <= 768 && sticky && stop) {
      const observer = new IntersectionObserver(
        function (entries) {
          if (entries[0].isIntersecting) {
            sticky.classList.add("stop-sticky");
          } else {
            sticky.classList.remove("stop-sticky");
          }
        },
        {
          root: null,
          threshold: 0,
          rootMargin: `0px 0px -${sticky.offsetHeight}px 0px`
        }
      );

      observer.observe(stop);
    }
  });
</script>
<script>
  // When the page loads
  window.addEventListener('DOMContentLoaded', function() {
    // Select the first tab
    const firstTab = document.querySelector('.category-tab');
    if (firstTab) {
      firstTab.classList.add('active');
    }
  });
</script>

<script>
  jQuery(function($) {
  if (window.innerWidth <= 768) {
    $('.woocommerce-product-gallery').flexslider({
      animation: 'slide',
      controlNav: "thumbnails",
      smoothHeight: true,
      touch: true
    });
  }
});

</script>
<script>
jQuery(function($) {
  if (window.innerWidth <= 768) {
    var $gallery = $('.woocommerce-product-gallery');

    // If not already initialized, manually build it
    if (!$gallery.hasClass('flexslider-initialized')) {
      var $slides = $gallery.find('.woocommerce-product-gallery__wrapper > div');

      if ($slides.length > 1) {
        // Wrap images in <ul class="slides">
        var $ul = $('<ul class="slides"></ul>');
        $slides.each(function() {
          $ul.append($('<li></li>').append($(this)));
        });

        $('.woocommerce-product-gallery__wrapper').empty().append($ul);

        // Manually call FlexSlider
        $gallery.flexslider({
          animation: "slide",
          selector: ".slides > li",
          controlNav: "thumbnails",
          animationLoop: false,
          smoothHeight: true,
          start: function() {
            $gallery.addClass('flexslider-initialized');
          }
        });
      }
    }
  }
});
</script>
<script>
jQuery(function ($) {
  const secureHTML = `
    <section class="payment-section" style="padding: 10px 20px; border-top: 1px solid #ddd; border-bottom: 1px solid #eee;">
      <div class="cart-container-side-cart">
        <div class="payment-secure">
          <div class="payment-secure-text" style="display:flex;align-items:center;font-size:14px;margin-bottom:6px;">
            <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/lock.png" alt="Lock Icon" class="lock-icon" style="width:16px;margin-right:6px;">
            <span>100% secure payment by</span>
          </div>
          <div class="payment-logos-side-cart">
            <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/Frame-75.png" alt="Razorpay" class="payment-logo" style="max-height:24px;">
          </div>
        </div>
      </div>
    </section>
  `;

  function injectSecureBlock() {
    const footer = $('.xoo-wsc-footer');
    if (footer.length && $('.payment-section').length === 0) {
      $(secureHTML).insertBefore(footer);
      console.log("✅ Secure payment section injected.");
    }
  }

  // Observe any mutation to .xoo-wsc-modal (side cart root)
  const targetNode = document.querySelector('.xoo-wsc-modal');

  if (targetNode) {
    const observer = new MutationObserver(() => {
      setTimeout(injectSecureBlock, 50); // wait a bit for rendering
    });

    observer.observe(targetNode, { childList: true, subtree: true });

    // Initial manual injection attempt
    injectSecureBlock();
  }
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.getElementById("hamburger");
  const menu = document.getElementById("header-menu");

  if (hamburger && menu) {
    hamburger.addEventListener("click", function () {
      menu.classList.toggle("menu-visible");
    });
  }
});
</script>








<!-- <script src="https://troopod-widget-build.b-cdn.net/test/feed.js" async></script> -->
<div id="whatsapp-float">
    <a href="https://wa.me/+917306746936" target="_blank">
        <img src="https://nuvedo.com/wp-content/uploads/2023/08/logo-whatsapp-png-pic-0.png" alt="WhatsApp" />
    </a>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js" integrity="sha512-eYSzo+20ajZMRsjxB6L7eyqo5kuXuS2+wEbbOkpaur+sA2shQameiJiWEzCIDwJqaB0a4a6tCuEvCOBHUg3Skg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
