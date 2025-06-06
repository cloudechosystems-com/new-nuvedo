<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

?>

<li <?php wc_product_class( '', $product ); ?>>
	<div>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	echo "<div  class='center-rating'>";
	do_action( 'woocommerce_before_shop_loop_item_title' );
		// Check if the product has a star rating
		  echo "<div class='custom-rating'>";
if (has_post_thumbnail() && wc_get_rating_html($product->get_average_rating(), $product->get_rating_count())) {
	add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_rating', 15);
	} else {
    // Display "No reviews yet" text
    echo "<span class='no-reviews-text'>No reviews yet</span>";
}
		   echo "</div>";
	echo "</div>";
	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );
	echo "<div>";
	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
	do_action( 'woocommerce_after_shop_loop_item_title' );
	echo "</div>";
	echo "<div class='shop_buttons_wrapper'>";
	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *x
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	echo "</div>";
	?>
	</div>
</li>
