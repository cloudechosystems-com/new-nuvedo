<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
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
		// Open product link
		do_action( 'woocommerce_before_shop_loop_item' );

		// Product image and sale flash
		echo "<div class='center-rating'>";
		do_action( 'woocommerce_before_shop_loop_item_title' );
		echo "</div>";

		// Product title
		do_action( 'woocommerce_shop_loop_item_title' );

		echo "<div>";
		// Price only (rating hook removed)
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
		do_action( 'woocommerce_after_shop_loop_item_title' );
		echo "</div>";

		// Add to Cart / Buttons
		echo "<div class='shop_buttons_wrapper'>";
		do_action( 'woocommerce_after_shop_loop_item' );
		echo "</div>";
		?>
	</div>
</li>
