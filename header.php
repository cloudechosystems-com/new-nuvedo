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
    <header>
      <div class="header_warapper" id="main-contents">
        <div class="menu_wrapper">
          <div class="hamburger" id="hamburger">
            <div class="bar_1"></div>
            <div class="bar_2"></div>
            <div class="bar_3"></div>
          </div>

        </div>

        <div class="logo">
          <?php the_custom_logo(); ?>
        </div>
        <div class="header_cta">
          <?php
            wp_nav_menu(
              array(
                'menu' => 'header',
                'menu_id' => 'header-menu',
              )
            );
          ?>
        </div>
        <div class="minicart_header">
          <?php echo do_shortcode('[jma_woo_minicart]'); ?>
        </div>
        
        <div class="wishlist_header">
          <a href="https://nuvedo.com/my-account/">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"><path d="M13.6 13.1c0-6.4 5.2-11.7 11.7-11.7C31.7 1.4 37 6.7 37 13.1c0 6.4-5.2 11.7-11.7 11.7-6.4 0-11.7-5.2-11.7-11.7zM2 48.1v-5.8c0-6.4 10.5-11.7 23.3-11.7s23.3 5.3 23.3 11.7v5.8H2z"/></svg>
					</a>
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