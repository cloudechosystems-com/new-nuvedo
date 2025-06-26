<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dravalife
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<meta name="facebook-domain-verification" content="t4cjg75b80vlnnehojyyf09le5104b" />-->
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/owl.theme.default.min.css">
  <!-- 	<link rel="preload" as="image" href="<?php echo esc_url(get_sub_field('images')); ?>"> -->
  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>


  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <!-- 	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'dravalife'); ?></a> -->

    <header>
      <!--<div  class="Loader">
			<div class="emblem_navedo">
				<img class="emblem_center" src="https://nuvedo.com/wp-content/uploads/2021/03/emblem_center.png" alt="">
				<img class="emblem_ring" src="https://nuvedo.com/wp-content/uploads/2021/03/emblem_ring.png" alt="">


			</div>
			</div>-->
      <!-- 		<div class="special_text">
			Shop for Rs 2000 and win a gorgeous hand-illustrated LIMITED EDITION Mushroom Calendar worth Rs 900 for FREE
		</div> -->


      <div class="header_warapper" id="main-contents">
        <div class="menu_wrapper">
          <div class="hamburger">
            <div class="bar_1"></div>
            <div class="bar_2"></div>
            <div class="bar_3"></div>
          </div>
          <nav class="custom-menu">
            <div class="menu-section">
              <div class="menu-title-wrapper">
                <h3 class="menu-title"><a href="https://lightgrey-crab-521485.hostingersite.com/shop/">Shop</a></h3>
                <span class="toggle-icon">+</span>
              </div>
              <div class="menu-grid">
                <a href="https://lightgrey-crab-521485.hostingersite.com/product-category/wellness-products/">
                  <div class="product-menu-item">
                    <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/f29d4ea60b3b6c05541b33a9a14c2d80f38feada-1.png" alt="Wellness Products" class="product-menu-item-img">
                    <p>Wellness Products</p>
                  </div>
                </a>
                <a href="https://lightgrey-crab-521485.hostingersite.com/product-category/grow-mushrooms/">
                  <div class="product-menu-item">
                    <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/b545e19d3e201ab4e6cbc6282fd61335b2973443-1.png" alt="Grow Mushrooms" class="product-menu-item-img">
                    <p>Grow Mushrooms</p>
                  </div>
                </a>
                <a href="https://lightgrey-crab-521485.hostingersite.com/product-category/dry-mushrooms/">
                  <div class="product-menu-item">
                    <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/16427353b5b7513c9b04ed30fb192543d4782ffc-1.png" alt="Dry Mushrooms" class="product-menu-item-img">
                    <p>Dry Mushrooms</p>
                  </div>
                </a>

                <div class="menu-link">
                  <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/10058658491557740321-1-3.png" alt="" class="menu-link-image">
                  <div class="menu-link-title">
                    <div class="menu-link-main-title">Mushrooms Of URU</div>
                    <div class="menu-link-sub-title">Mushroom Field Guide</div>
                  </div>
                  <a href="https://lightgrey-crab-521485.hostingersite.com/mushroom-field-guide/"><span class="arrow"><img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/6421887411543238876-1-1.png" class="arrow-img"></span></a>
                </div>
              </div>
            </div>
            <div class="menu-section">
              <div class="menu-title-wrapper">
                <h3 class="menu-title">Learn</h3>
                <span class="toggle-icon">+</span>
              </div>

              <div class="menu-grid">
                <div class="product-menu-item">
                  <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/Layer_x0020_1-1-1.png" alt="Blogs" class="product-menu-item-img">
                  <p><a href="https://lightgrey-crab-521485.hostingersite.com/blog/">Blogs & Articles</a></p>
                </div>
                <div class="product-menu-item">
                  <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/17659849061684884127-1.png" alt="Know Your Mushrooms" class="product-menu-item-img">
                  <p><a href="https://lightgrey-crab-521485.hostingersite.com/learn_post/know-your-mushrooms/">Know Your Mushrooms</a></p>
                </div>
                <div class="product-menu-item">
                  <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/15557438101670565711-2-1.png" alt="Medicinal Mushrooms" class="product-menu-item-img">
                  <p><a href="https://lightgrey-crab-521485.hostingersite.com/learn_post/about-medicinal-mushrooms/">Medicinal Mushrooms</a></p>
                </div>
                <div class="product-menu-item">
                  <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/18008637391692620767-1.png" alt="Workshop" class="product-menu-item-img">
                  <p><a href="https://lightgrey-crab-521485.hostingersite.com/workshop/">Cultivation Workshop</a></p>
                </div>
                <div class="product-menu-item">
                  <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/10203195841644841186-1.png" alt="FAQ" class="product-menu-item-img">
                  <div class="small-title"><a href="https://lightgrey-crab-521485.hostingersite.com/faq/">Frequently Asked Questions</a></div>
                  <p>FAQ</p>
                </div>
              </div>
            </div>

            <div class="menu-section">
              <div class="menu-wrapper">
                <h3 class="menu-title"><a href="https://lightgrey-crab-521485.hostingersite.com/about/">About</h3>
                <div class="menu-redirection"><img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/6421887411543238876-1-5.png" class="redirect-img"></a></div>
              </div>
            </div>
            <div class="menu-section">
              <div class="menu-wrapper">
                <h3 class="menu-title"><a href="https://lightgrey-crab-521485.hostingersite.com/community/">Nuvedo Circle Community</h3>
                <div class="menu-redirection"><img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/6421887411543238876-1-5.png" class="redirect-img"></a></div>
              </div>
            </div>
            <div class="menu-section">
              <div class="menu-wrapper">
                <h3 class="menu-title"><a href="https://lightgrey-crab-521485.hostingersite.com/contact">Contact</h3>
                <div class="menu-redirection"><img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/6421887411543238876-1-5.png" class="redirect-img"></a></div>
              </div>
            </div>
          </nav>


        </div>

        <div class="logo">
          <?php the_custom_logo(); ?>
        </div>
        <div class="header_cta">
          <nav class="custom-menu desktop-menu">
            <div class="menu-section">
              <div class="menu-title-wrapper">
                <h3 class="menu-title"><a href="https://lightgrey-crab-521485.hostingersite.com/shop/">Shop</h3>
                <span class="toggle-icon-desk"><img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/down.png" class="down-arrow-icon" /></span></a>
              </div>
              <div class="menu-grid menu-header-grid">
                <a href="https://lightgrey-crab-521485.hostingersite.com/product-category/wellness-products/">
                  <div class="product-menu-item">
                    <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/f29d4ea60b3b6c05541b33a9a14c2d80f38feada-1.png" alt="Wellness Products" class="product-menu-item-img">
                    <p>Wellness Products</p>
                  </div>
                </a>
                <a href="https://lightgrey-crab-521485.hostingersite.com/product-category/grow-mushrooms/">
                  <div class="product-menu-item">
                    <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/b545e19d3e201ab4e6cbc6282fd61335b2973443-1.png" alt="Grow Mushrooms" class="product-menu-item-img">
                    <p>Grow Mushrooms</p>
                  </div>
                </a>
                <a href="https://lightgrey-crab-521485.hostingersite.com/product-category/dry-mushrooms/">
                  <div class="product-menu-item">
                    <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/16427353b5b7513c9b04ed30fb192543d4782ffc-1.png" alt="Dry Mushrooms" class="product-menu-item-img">
                    <p>Dry Mushrooms</p>
                  </div>
                </a>

                <div class="menu-link">
                  <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/10058658491557740321-1-3.png" alt="" class="menu-link-image">
                  <div class="menu-link-title">
                    <div class="menu-link-main-title">Mushrooms Of URU</div>
                    <div class="menu-link-sub-title">Mushroom Field Guide</div>
                  </div>
                  <a href="https://lightgrey-crab-521485.hostingersite.com/mushroom-field-guide/"><span class="arrow"><img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/6421887411543238876-1-1.png" class="arrow-img"></span></a>
                </div>
              </div>
            </div>
            <div class="menu-section">
              <div class="menu-title-wrapper">
                <h3 class="menu-title">Learn</h3>
                <span class="toggle-icon-desk"><img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/down.png" class="down-arrow-icon" /></span>
              </div>

              <div class="menu-grid menu-header-grid">
                <div class="product-menu-item"><a href="https://lightgrey-crab-521485.hostingersite.com/blog/">
                    <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/Layer_x0020_1-1-1.png" alt="Blogs" class="product-menu-item-img">
                    <p>Blogs & Articles</p>
                  </a>
                </div>
                <div class="product-menu-item"><a href="https://lightgrey-crab-521485.hostingersite.com/learn_post/know-your-mushrooms/">
                    <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/17659849061684884127-1.png" alt="Know Your Mushrooms" class="product-menu-item-img">
                    <p>Know Your Mushrooms</p>
                  </a>
                </div>
                <div class="product-menu-item"><a href="https://lightgrey-crab-521485.hostingersite.com/learn_post/about-medicinal-mushrooms/">
                    <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/15557438101670565711-2-1.png" alt="Medicinal Mushrooms" class="product-menu-item-img">
                    <p>Medicinal Mushrooms</p>
                  </a>
                </div>
                <div class="product-menu-item"><a href="https://lightgrey-crab-521485.hostingersite.com/workshop/">
                    <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/18008637391692620767-1.png" alt="Workshop" class="product-menu-item-img">
                    <p>Cultivation Workshop</p>
                  </a>
                </div>
                <div class="product-menu-item"><a href="https://lightgrey-crab-521485.hostingersite.com/faq/">
                    <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/10203195841644841186-1.png" alt="FAQ" class="product-menu-item-img">
                    <div class="small-title">Frequently Asked Questions</div>
                    <p>FAQ</p>
                  </a>
                </div>
              </div>
            </div>

            <div class="menu-section">
              <div class="menu-wrapper">
                <h3 class="menu-title"><a href="https://lightgrey-crab-521485.hostingersite.com/learn_post/about-medicinal-mushrooms/">About</h3>
                <div class="menu-redirection"></a></div>
              </div>
            </div>
            <div class="menu-section">
              <div class="menu-wrapper">
                <h3 class="menu-title"><a href="https://lightgrey-crab-521485.hostingersite.com/community/">Nuvedo Circle Community</h3>
                <div class="menu-redirection"></a></div>
              </div>
            </div>
            <div class="menu-section">
              <div class="menu-wrapper">
                <h3 class="menu-title"><a href="https://lightgrey-crab-521485.hostingersite.com/contact">Contact</h3>
                <div class="menu-redirection"></a></div>
              </div>
            </div>
          </nav>
        </div>
        <div class="minicart_header">
          <?php echo do_shortcode('[jma_woo_minicart]'); ?>
        </div>


        <div class="header_search">
          <div class="search_click">

            <svg version="1.1" id="search_icon" x="0px" y="0px" viewBox="0 0 30 30" style="enable-background:new 0 0 30 30;" xml:space="preserve">
              <path class="st0" d="M26.2,28.7c0.7,0.7,1.8,0.7,2.5,0c0.7-0.7,0.7-1.8,0-2.5l-5.5-5.5c1.6-2.1,2.5-4.6,2.5-7.5
									c0-6.9-5.5-12.5-12.5-12.5C6.3,0.8,0.8,6.3,0.8,13.2s5.5,12.5,12.5,12.5c2.8,0,5.3-0.9,7.5-2.5L26.2,28.7z M4.3,13.2
									c0-5,3.9-8.9,8.9-8.9s8.9,3.9,8.9,8.9c0,5-3.9,8.9-8.9,8.9S4.3,18.2,4.3,13.2z" />
            </svg>

            <svg version="1.1" id="close_icon" x="0px" y="0px" viewBox="0 0 30 30" style="enable-background:new 0 0 30 30;" xml:space="preserve">
              <path d="M26.6,28.7L1.3,3.4c-0.6-0.6-0.6-1.5,0-2.1l0,0c0.6-0.6,1.5-0.6,2.1,0l25.2,25.2c0.6,0.6,0.6,1.5,0,2.1l0,0
									C28.1,29.3,27.1,29.3,26.6,28.7z" />
              <path d="M28.7,3.4L3.4,28.7c-0.6,0.6-1.5,0.6-2.1,0l0,0c-0.6-0.6-0.6-1.5,0-2.1L26.6,1.3c0.6-0.6,1.5-0.6,2.1,0l0,0
									C29.3,1.9,29.3,2.9,28.7,3.4z" />
            </svg>

            <div class="search_wrapper">
              <?php echo do_shortcode('[wcas-search-form]'); ?>

            </div>

          </div>
        </div>



      </div>
      <div class="top-bar" id="topBar">
        <div class="contact-info">
          <div class="scrolling-container">
            <script>
              for (let i = 0; i < 4; i++) {
                document.write('<a href="https://nuvedo.com/my-account/">');
                document.write('<span>Get 10% Off On Your First Order! Create A Free Account and enter your Promo code MUSHWELCOME at checkout</span>');
                document.write('<button class="buttoncta">Register Now!</button> &nbsp;&nbsp;&nbsp;');
                document.write('</a>');
              }
            </script>
          </div>
        </div>
      </div>
    </header>