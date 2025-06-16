<?php
/**
 * dravalife functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dravalife
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
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
	wp_enqueue_style( 'custom_style', get_template_directory_uri() . '/custom_style.css',false,'1.1','all');

	wp_register_script( 'jQuery', 'https://code.jquery.com/jquery-3.3.1.min.js', null, null, false );
	wp_enqueue_script('jQuery');

	wp_register_script( 'ajax', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', null, null, false );
  	wp_enqueue_script('ajax');

	// wp_enqueue_script( 'owlscript', get_template_directory_uri() . '/js/owl.carousel.min.js', array (), 1.1, false);

	wp_enqueue_script( 'dravalife-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dravalife_scripts' );

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


//shortcode for mini-cart
function jma_woo_minicart($atts){
 ob_start();
 global $woocommerce;
 		$cart_url = $woocommerce->cart->get_cart_url();
 				echo '<a href="'.$cart_url.'" class="cart_warpper">';
 				echo '<li class="dropdown">';
 				echo '<svg class="minicarticon_white"  viewBox="0 0 50 50"><path d="M34.6 16.1v-9c0-2.4-2-4.4-4.4-4.4H19.8c-2.4 0-4.4 2-4.4 4.4v9H8.8v25.8c0 3 2.4 5.4 5.4 5.4h21.6c3 0 5.4-2.4 5.4-5.4V16.1h-6.6zm-16.7-9c0-1 .9-1.9 1.9-1.9h10.4c1 0 1.9.9 1.9 1.9v9H17.9v-9z"/></svg>';
 				echo '<div class="basket-item-count" style="display: inline;">';
 				echo '<span class="cart-items-count count">';
 				echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);
 				echo '</span>';
 				echo '</div>';
 				echo '</a>';
 				echo '<ul class="dropdown-menu">';
 					echo '<li> <div class="widget_shopping_cart_content">';
 					woocommerce_mini_cart();
 					echo '</div></li>';
 				echo '</li></ul>';
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
$translated_text = 'Coming Soon';
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


add_filter( 'woocommerce_product_add_to_cart_text', 'custom_loop_add_to_cart_button', 20, 2 ); 
function custom_loop_add_to_cart_button( $button, $product ) {
    // HERE define your specific product IDs in this array
    $specific_ids = array(2513);

    if( in_array($product->get_id(), $specific_ids) ) {
        $button_text = __("April Fool", "woocommerce");
		$button = '<a class="button" href="' . $product->get_permalink() . '">' . $button_text . '</a>';
    } 
    return $button;
}
