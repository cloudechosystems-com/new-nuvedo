<?php
/**
 * dravalife functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dravalife
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.F
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'dravalife_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dravalife_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on dravalife, use a find and replace
		 * to change 'dravalife' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dravalife', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'dravalife' ),
			)
		);
        register_nav_menus(array(
  'header' => 'Header Menu',
));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'dravalife_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'dravalife_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dravalife_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dravalife_content_width', 640 );
}
add_action( 'after_setup_theme', 'dravalife_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dravalife_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'dravalife' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dravalife' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'dravalife_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
 

 
function dravalife_scripts() {
	wp_enqueue_style( 'dravalife-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'dravalife-style', 'rtl', 'replace' );

  // 	wp_enqueue_style( 'owlCarousel', get_template_directory_uri() . '/assets/owl.carousel.min.css',false,'1.1','all');
	// wp_enqueue_style( 'owlCarouseldefault', get_template_directory_uri() . '/assets/owl.theme.default.min.css',false,'1.1','all');
	wp_enqueue_style( 'custom_style', get_template_directory_uri() . '/custom_style.css',false,'1.3','all');
	// wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/customstyle.css',false,'1.1','all');

	wp_register_script( 'jQuery', 'https://code.jquery.com/jquery-3.3.1.min.js', null, null, false );
	wp_enqueue_script('jQuery');

	wp_register_script( 'ajax', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', null, null, false );
  	wp_enqueue_script('ajax');

	// wp_enqueue_script( 'owlscript', get_template_directory_uri() . '/js/owl.carousel.min.js', array (), 1.1, false);

	wp_enqueue_script( 'dravalife-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script('scrollmagic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js', array('jquery'), null, true);
	 wp_enqueue_style('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');

    // Enqueue Owl Carousel Theme CSS
    wp_enqueue_style('owl-carousel-theme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');

    // Enqueue jQuery (if not already enqueued)
    wp_enqueue_script('jquery');

    // Enqueue Owl Carousel JS
    wp_enqueue_script('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), '', true);

    // Enqueue GSAP library (including TweenMax)
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js', array('jquery'), null, true);
	 wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', array(), '6.0.0');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dravalife_scripts' );
function add_floating_button() {
    if (is_front_page() || is_home() || is_page() || is_cart()) {
        // Get the page content by title
        $page = get_page_by_title('mybuttonoffer');

        if ($page) {
            $content = apply_filters('the_content', $page->post_content);

            // Display the floating button with the fetched content
            echo '<div class="floating-button">Offers</div>';
            echo '<div id="coupon-popup">' . $content . '</div>';
            
            // Add jQuery script
            echo '<script>
                jQuery(document).ready(function($) {
                    $(".floating-button").hover(function() {
                        $("#coupon-popup").fadeIn();
                    }, function() {
                        $("#coupon-popup").fadeOut();
                    });
                });
            </script>';
        }
    }
}

add_action('wp_footer', 'add_floating_button');
/**add_filter( 'bos4w_subscription_text_display', function ( $display_text ) {
    $display_text = ' - or subscribe and save up to 20%';
    return $display_text;
}, 10, 1 );

**/
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
function drava_add_woocommerce_support() {
add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'drava_add_woocommerce_support' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
function force_flexslider_with_dots() {
    if ( is_product() ) {
        ?>
        <script>
        jQuery(document).ready(function($) {
            $(window).on('load', function () {
                const gallery = $('.woocommerce-product-gallery');

                if (typeof $.fn.flexslider !== 'undefined' && gallery.length) {
                    // Destroy any existing instance
                    gallery.flexslider('destroy');

                    // Reinitialize with dots
                    gallery.flexslider({
                        animation: 'slide',
                        controlNav: true,     // ✅ Show dots
                        directionNav: true,   // Keep arrows if needed
                        animationLoop: true,
                        slideshow: false
                    });
                }
            });
        });
        </script>
        <?php
    }
}
add_action( 'wp_footer', 'force_flexslider_with_dots', 999 ); // ✅ Use higher priority


//shortcode for mini-cart
// function jma_woo_minicart($atts){
//  ob_start();
//  global $woocommerce;
//  		$cart_url = $woocommerce->cart->get_cart_url();
//  				echo '<a href="'.$cart_url.'" class="cart_warpper">';
//  				echo '<li class="dropdown">';
//  				echo '<svg class="minicarticon_white"  viewBox="0 0 50 50"><path d="M34.6 16.1v-9c0-2.4-2-4.4-4.4-4.4H19.8c-2.4 0-4.4 2-4.4 4.4v9H8.8v25.8c0 3 2.4 5.4 5.4 5.4h21.6c3 0 5.4-2.4 5.4-5.4V16.1h-6.6zm-16.7-9c0-1 .9-1.9 1.9-1.9h10.4c1 0 1.9.9 1.9 1.9v9H17.9v-9z"/></svg>';
//  				echo '<div class="basket-item-count" style="display: inline;">';
//  				echo '<span class="cart-items-count count">';
//  				echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);
//  				echo '</span>';
//  				echo '</div>';
//  				echo '</a>';
//  				echo '<ul class="dropdown-menu">';
//  					echo '<li> <div class="widget_shopping_cart_content">';
//  					woocommerce_mini_cart();
//  					echo '</div></li>';
//  				echo '</li></ul>';
//  $x = ob_get_contents();
//  ob_end_clean();
//  return $x;
// }
function jma_woo_minicart($atts) {
    ob_start();
	global $woocommerce;
    echo '<a href="#" class="xoo-wsc-cart-trigger">';
    echo '<svg class="minicarticon_white" viewBox="0 0 50 50"><path d="M34.6 16.1v-9c0-2.4-2-4.4-4.4-4.4H19.8c-2.4 0-4.4 2-4.4 4.4v9H8.8v25.8c0 3 2.4 5.4 5.4 5.4h21.6c3 0 5.4-2.4 5.4-5.4V16.1h-6.6zm-16.7-9c0-1 .9-1.9 1.9-1.9h10.4c1 0 1.9.9 1.9 1.9v9H17.9v-9z"/></svg>';
    echo '<div class="basket-item-count" style="display: inline;">';
    echo '<span class="cart-items-count count">';
    echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);
    echo '</span>';
    echo '</div>';

	echo '</a>';
    $x = ob_get_contents();
    ob_end_clean();
    return $x;
}

add_shortcode('jma_woo_minicart','jma_woo_minicart');
// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
function woocommerce_header_add_to_cart_fragment( $fragments ) {
 global $woocommerce;
 ob_start();
 ?>
 <span class="cart-items-count count">
     <?php echo WC()->cart->get_cart_contents_count(); ?>
 </span>
 <?php
     $fragments['.cart-items-count'] = ob_get_clean();
 return $fragments;
}
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

// Add the jQuery script to the footer
function codeAstrology_jquery_script() {
    ?>
    <script>
        jQuery(function ($) {
            'use strict';
            $(document).ready(function () {
                $(document.body).on('change', 'input.wqpmb_input_text.input-text.qty.text', function (e) {
                    var value = $(this).val();
                    var selector = '.wpcsb-wrapper.wpcsb-wrapper-bottom.wpcsb-active input.wqpmb_input_text.input-text.qty.text.wpcsb-qty';
                    $(selector).val(value); // Fix selector and .val() usage
                });
            });
        });
		 jQuery(function ($) {
            'use strict';
            $(document).ready(function () {
                $(document.body).on('change', '.wpcsb-wrapper.wpcsb-wrapper-bottom.wpcsb-active input.wqpmb_input_text.input-text.qty.text.wpcsb-qty', function (e) {
                    var value = $(this).val();
                    var selector = 'input.wqpmb_input_text.input-text.qty.text';
                    $(selector).val(value); // Fix selector and .val() usage
                });
            });
        });
    </script>
    <?php
}

add_action('wp_footer', 'codeAstrology_jquery_script');
// Function to refresh the cart content
function refresh_cart_callback() {
    // Your logic to update the cart content goes here

    // Example: Get the updated cart content
    ob_start();
    // Output the updated cart content here, for example:
    echo "<p>Updated cart content here.</p>";
    $cart_content = ob_get_clean();

    // Return the updated cart content as JSON
    echo json_encode(array('cart_content' => $cart_content));
    die();
}
add_action('wp_ajax_refresh_cart', 'refresh_cart_callback'); // For logged-in users
add_action('wp_ajax_nopriv_refresh_cart', 'refresh_cart_callback'); // For non-logged-in users


function create_review_post_type() {
    register_post_type('product_review', array(
        'labels' => array(
            'name' => __('Product Reviews'),
            'singular_name' => __('Product Review'),
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
}
add_action('init', 'create_review_post_type');

function enqueue_slick_assets() {
    wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');
    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true);
}
add_action('wp_enqueue_scripts', 'enqueue_slick_assets');
function display_review_carousel() {
    $args = array(
        'post_type' => 'product_review',
        'posts_per_page' => -1, // Display all reviews
    );

    $reviews = new WP_Query($args);

    if ($reviews->have_posts()) :
        echo '<div class="review-carousel">';
        while ($reviews->have_posts()) : $reviews->the_post();
            $reviewer_name = get_the_title();
            $review_content = get_the_content();
            $reviewer_image = get_the_post_thumbnail();
            ?>
            <div class="review-card">
                <div class="reviewer-image"><?php echo $reviewer_image; ?></div>
                <div class="reviewer-name"><?php echo $reviewer_name; ?></div>
                <div class="review-content"><?php echo $review_content; ?></div>
            </div>
            <?php
        endwhile;
        echo '</div>';
        wp_reset_postdata();
    else :
        echo 'No reviews found.';
    endif;
}
add_shortcode('review-carousel', 'display_review_carousel');

// only copy opening php tag if needed
// Removes cart notices from the checkout page
function sv_remove_cart_notice_on_checkout() {
	if ( function_exists( 'wc_cart_notices' ) ) {
		remove_action( 'woocommerce_before_checkout_form', array( wc_cart_notices(), 'add_cart_notice' ) );
	}
}
add_action( 'init', 'sv_remove_cart_notice_on_checkout' );

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['description'] );          // Remove the description tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab
    return $tabs;
}

add_filter( 'gettext', 'ds_change_readmore_text', 20, 3 );



function ds_change_readmore_text( $translated_text, $text, $domain ) {
if ( ! is_admin() && $domain === 'woocommerce' && $translated_text === 'Read more') {
$translated_text = 'Out of stock';
}
return $translated_text;
}
/**
 * Hide shipping rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
// Save checkbox field data to order meta
add_action('woocommerce_checkout_create_order', 'save_wrap_in_gift_checkbox');
function save_wrap_in_gift_checkbox($order) {
    if ($_POST['wrap_in_gift'] == 1) {
        $order->update_meta_data('_wrap_in_gift', 'yes');
    }
}

// Display checkbox field data on the order review section
add_action('woocommerce_order_details_after_order_table', 'display_wrap_in_gift_on_order');
function display_wrap_in_gift_on_order($order) {
    $wrap_in_gift = $order->get_meta('_wrap_in_gift');
    if ($wrap_in_gift === 'yes') {
        echo '<p><strong>' . __('Wrap in Gift') . '</strong></p>';
    }
}

function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );

add_filter( 'woocommerce_product_add_to_cart_text', function( $text ) {
	global $product;
	if ( $product->is_type( 'variable' ) ) {
		$text = $product->is_purchasable() ? __( 'SHOP NOW', 'woocommerce' ) : __( 'Read more', 'woocommerce' );
	}
	return $text;
}, 10 );

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // Return -1 to show all products
  return -1;
}
function update_cart_item_quantity() {
    if (isset($_POST['hash']) && isset($_POST['quantity'])) {
        $cart_item_key = $_POST['hash'];
        $quantity = intval($_POST['quantity']);

        WC()->cart->set_quantity($cart_item_key, $quantity, true);
        WC()->cart->calculate_totals();
        WC()->cart->maybe_set_cart_cookies();

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }

    die();
}

add_action('wp_ajax_update_cart_item_quantity', 'update_cart_item_quantity');
add_action('wp_ajax_nopriv_update_cart_item_quantity', 'update_cart_item_quantity');

add_action('wp_enqueue_scripts', 'hide_shipping_for_guests');

function hide_shipping_for_guests() {
    if (!is_user_logged_in()) {
        wp_add_inline_style(
            'woocommerce-general', // Enqueue WooCommerce's main style or your theme's stylesheet
            '.ocwma_select_shipping, .form_option_shipping { display: none !important; }'
        );
    }
}
add_filter('woocommerce_sale_flash', 'disable_sale_badge_on_pages', 10, 3);

function disable_sale_badge_on_pages($html, $post, $product) {
    if (is_product() || is_shop()) { // Replace with the condition for the pages where you want to disable
        return '';
    }
    return $html;
}

function load_jquery_from_google_cdn() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', false, '3.6.0');
        wp_enqueue_script('jquery');
    }
}

// Handle initial subcategory + product load
add_action('wp_ajax_load_subcategories_and_products', 'load_subcategories_and_products');
add_action('wp_ajax_nopriv_load_subcategories_and_products', 'load_subcategories_and_products');

function load_subcategories_and_products() {
    $cat_id = intval($_POST['cat_id']);

    $subcats = get_terms([
        'taxonomy' => 'product_cat',
        'parent' => $cat_id,
        'hide_empty' => false,
    ]);

    $output = [
        'subcategories' => '',
        'products' => '',
    ];

    if (!empty($subcats)) {
        $output['subcategories'] .= '<div class="subcategory-list">';
        // "All" radio
        $output['subcategories'] .= '<label class="subcategory-link"><input type="radio" class="subcategory-radio" name="subcategory" value="' . esc_attr($cat_id) . '" checked> <span>All</span></label>';

        foreach ($subcats as $subcat) {
            $output['subcategories'] .= '<label class="subcategory-link"><input type="radio" class="subcategory-radio" name="subcategory" value="' . esc_attr($subcat->term_id) . '"> <span>' . esc_html($subcat->name) . '</span></label>';
        }
        $output['subcategories'] .= '</div>';

        // Load all products by default (category level, not subcat yet)
        $output['products'] = get_products_html($cat_id);
    } else {
        // No subcategories — just load direct products
        $output['products'] = get_products_html($cat_id);
    }

    wp_send_json($output);
}

// Handle subcategory product filtering
add_action('wp_ajax_filter_products_by_subcat', 'filter_products_by_subcat');
add_action('wp_ajax_nopriv_filter_products_by_subcat', 'filter_products_by_subcat');

function filter_products_by_subcat() {
    if (empty($_POST['subcat'])) {
        wp_send_json_error('No subcategory selected.');
        wp_die();
    }

    $subcat_id = intval($_POST['subcat']);
    echo get_products_html($subcat_id);
    wp_die();
}

// Reusable product loop (WooCommerce style)
function get_products_html($cat_id) {
    $args = [
        'post_type'      => 'product',
        'posts_per_page' => 12,
        'tax_query'      => [[
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => $cat_id,
        ]],
        'post_status'    => 'publish',
        'no_found_rows'  => true, // Performance
    ];

    $query = new WP_Query($args);
    ob_start();

    if ($query->have_posts()) {
        echo '<div class="products-grid product_cat_card_wrapper">';
        while ($query->have_posts()) {
            $query->the_post();
            wc_get_template_part('content', 'newproduct'); // Uses WooCommerce templates
        }
        echo '</div>';
    } else {
        echo '<p>No products found.</p>';
    }

    wp_reset_postdata();
    return ob_get_clean();
}

add_action('wp_ajax_load_tab_products', 'load_tab_products');
add_action('wp_ajax_nopriv_load_tab_products', 'load_tab_products');

function load_tab_products() {
  $slug = sanitize_text_field($_POST['cat_slug'] ?? '');
  $term = get_term_by('slug', $slug, 'product_cat');

  if (!$term) {
    echo '<p>Invalid category.</p>';
    wp_die();
  }
  $child_ids = get_term_children($term->term_id, 'product_cat');
  $all_ids = array_merge([$term->term_id], $child_ids);
  $args = [
    'post_type' => 'product',
    'posts_per_page' => 8,
    'tax_query' => [[
      'taxonomy' => 'product_cat',
      'field' => 'term_id',
      'terms' => $all_ids,
      'include_children' => true,
      'operator' => 'IN'
    ]]
  ];
  $loop = new WP_Query($args);

  if ($loop->have_posts()) {
    woocommerce_product_loop_start();
    while ($loop->have_posts()) {
      $loop->the_post();
      wc_get_template_part('content', 'newproduct'); // or 'content', 'product'
    }
    woocommerce_product_loop_end();
  } else {
    echo '<p>No products found in this category.</p>';
  }

  wp_reset_postdata();
  wp_die();
}

add_action('woocommerce_single_product_summary', 'custom_product_rating_box', 9);
function custom_product_rating_box() {
    global $product;

    if ( ! wc_review_ratings_enabled() ) return;

    $average = $product->get_average_rating();
    $review_count = $product->get_review_count();

    if ( $average > 0 ) {
        echo '<div class="custom-star-rating">';
        echo '<span class="star">★</span>';
        echo '<span class="rating-number">' . number_format( $average, 1 ) . '</span>';
        echo '<span class="review-count">' . $review_count . ' reviews</span>';
        echo '</div>';
    }
}
add_filter( 'woocommerce_add_to_cart_redirect', 'redirect_to_checkout_for_buy_now' );

function redirect_to_checkout_for_buy_now( $url ) {
    if ( isset( $_REQUEST['buy_now'] ) ) {
        return wc_get_checkout_url();
    }
    return $url;
}
// Add this to your theme's functions.php file
add_action( 'woocommerce_after_single_product_summary', 'ak_custom_suggestions', 20 );

function ak_custom_suggestions() {
	global $product;
	if ( ! $product ) return;

	$product_id = $product->get_id();

	$related_products = wc_get_products( array(
		'limit'    => 4,
		'status'   => 'publish',
		'category' => $product->get_category_ids(),
		'exclude'  => array( $product_id )
	) );

	if ( ! empty( $related_products ) ) {
		echo '<h3 class="section-title">Suggested Products</h3>';
		echo '<ul class="products columns-4">';
		foreach ( $related_products as $prod ) {
			setup_postdata( $GLOBALS['post'] = get_post( $prod->get_id() ) );
			wc_get_template_part( 'content', 'newproduct' );
		}
		wp_reset_postdata();
		echo '</ul>';
	}
}
function pass_ajaxurl_to_frontend() {
    ?>
    <script type="text/javascript">
        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <?php
}
add_action('wp_head', 'pass_ajaxurl_to_frontend');
add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');

function enable_wc_gallery_supports() {
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'enable_wc_gallery_supports');
function enqueue_wc_gallery_scripts_if_missing() {
    if (is_product()) {
        wp_enqueue_script('flexslider'); // Required by wc-single-product.js
        wp_enqueue_script('photoswipe'); // Optional
        wp_enqueue_script('wc-single-product'); // Core script to initialize gallery

        wp_enqueue_style('photoswipe'); // Optional, safe to include
    }
}
add_action('wp_enqueue_scripts', 'enqueue_wc_gallery_scripts_if_missing', 20);

function enqueue_mobile_swiper_assets() {
    if (is_product()) {
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);
        wp_enqueue_script('mobile-product-slider', get_template_directory_uri() . '/mobile-product-slider.js', ['swiper-js'], null, true);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_mobile_swiper_assets');
