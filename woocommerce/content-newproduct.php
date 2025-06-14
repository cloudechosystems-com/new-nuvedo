<?php
defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$regular = (float) $product->get_regular_price();
$sale = (float) $product->get_sale_price();
$discount = ($regular && $sale) ? round((($regular - $sale) / $regular) * 100) : 0;
?>

<div class="product_card new prodcat<?php echo $product->get_id(); ?>">
	<?php if ( $discount > 0 ) : ?>
		<div class="discount-badge"><?php echo $discount; ?>% OFF</div>
	<?php endif; ?>

	<div>
		<a href="<?php echo get_permalink(); ?>">
			<div class="product_card_image_wrapper">
				<div class="product_image">
					<img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" class="product-img"/>
				</div>
			</div>
		</a>
	</div>

	<div class="product_details_wrapper">
		<div class="product_item_name">
			<a href="<?php echo get_permalink(); ?>">
				<h2><?php the_title(); ?></h2>
			</a>
		</div>
	</div>

	<div class="product-short-description">
		<?php echo apply_filters( 'woocommerce_short_description', $product->get_short_description() ); ?>
	</div>

	<div class="star-rating starrating">
		<?php echo wc_get_rating_html($product->get_average_rating(), $product->get_rating_count()); ?>
	</div>

	<div class="content_price">
		<?php if ( $product->is_type( 'variable' ) ) : ?>
			<?php
			$currency_symbol = get_woocommerce_currency_symbol();

			// Show starting and ending price for variable products
			$prices = $product->get_variation_prices();
			$min_price = current( $prices['price'] );
			$max_price = end( $prices['price'] );

			echo '<div class="variable-price-range">';
			echo sprintf(
				'<span class="price product-price">%s %s - %s %s</span>',
				$currency_symbol,
				number_format( $min_price, 2 ),
				$currency_symbol,
				number_format( $max_price, 2 )
			);
			echo '</div>';
			?>
		<?php else : ?>
			<?php if ( $product->get_regular_price() ) : ?>
				<span class="price product-price <?= ( $product->get_sale_price() ) ? 'strike' : ''; ?>">
					&#x20B9; <?php echo number_format( $regular, 2 ); ?>
				</span>
			<?php endif; ?>

			<?php if ( $product->get_sale_price() ) : ?>
				<span class="price old-price">
					&#x20B9; <?php echo number_format( $sale, 2 ); ?>
				</span>
			<?php endif; ?>
		<?php endif; ?>
	</div>

	<div class="add-to-cart">
		<?php
		if ( $product->is_type( 'variable' ) ) {
			// Variable product: Show "Select Options" button
			echo sprintf(
				'<a href="%s" class="my-custom-btn select-options-btn">
					<span class="cart-icon-wrapper">
						<img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/Group-3-1.png" class="cart-icon" alt="Cart Icon" />
					</span>
					%s
				</a>',
				esc_url( $product->get_permalink() ),
				esc_html__( 'Select Options', 'woocommerce' )
			);
		} else {
			// Simple product: Show "Add to Cart" button
			echo sprintf(
				'<a href="%s" data-quantity="1" class="my-custom-btn" %s>
					<span class="cart-icon-wrapper">
						<img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/Group-3-1.png" class="cart-icon" alt="Cart Icon" />
					</span>
					%s
				</a>',
				esc_url( $product->add_to_cart_url() ),
				wc_implode_html_attributes( array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => $product->add_to_cart_description(),
				) ),
				esc_html__( 'Add to Cart', 'woocommerce' )
			);
		}
		?>
	</div>

	<div class="buy-now-button">
		<a href="<?php echo esc_url( wc_get_checkout_url() . '?add-to-cart=' . $product->get_id() ); ?>" class="buynow-btnnew">Buy Now</a>
	</div>
</div>
