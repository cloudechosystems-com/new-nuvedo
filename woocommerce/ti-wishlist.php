<?php
/**
 * The Template for displaying wishlist if a current user is owner.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/ti-wishlist.php.
 *
 * @version             1.21.5
 * @package           TInvWishlist\Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
wp_enqueue_script( 'tinvwl' );
?>
<div class="tinv-wishlist woocommerce tinv-wishlist-clear">
	<?php do_action( 'tinvwl_before_wishlist', $wishlist ); ?>

	<?php
	$wl_paged = get_query_var( 'wl_paged' );
	$form_url = tinv_url_wishlist( $wishlist['share_key'], $wl_paged, true );
	?>
	<form action="<?php echo esc_url( $form_url ); ?>" method="post" autocomplete="off">
		<?php do_action( 'tinvwl_before_wishlist_table', $wishlist ); ?>
		<div class="tinvwl-table-manage-list">

			<div class="wishlist_table_content">
			<?php do_action( 'tinvwl_wishlist_contents_before' ); ?>

			<?php

			global $product, $post;
			// store global product data.
			$_product_tmp = $product;
			// store global post data.
			$_post_tmp = $post;

			foreach ( $products as $wl_product ) {

				if ( empty( $wl_product['data'] ) ) {
					continue;
				}

				// override global product data.
				$product = apply_filters( 'tinvwl_wishlist_item', $wl_product['data'] );
				// override global post data.
				$post = get_post( $product->get_id() );

				unset( $wl_product['data'] );
				if ( $wl_product['quantity'] > 0 && apply_filters( 'tinvwl_wishlist_item_visible', true, $wl_product, $product ) ) {
					$product_url = apply_filters( 'tinvwl_wishlist_item_url', $product->get_permalink(), $wl_product, $product );
					do_action( 'tinvwl_wishlist_row_before', $wl_product, $product );
					?>
					<div class=" <?php echo esc_attr( apply_filters( 'tinvwl_wishlist_item_class', 'wishlist_item', $wl_product, $product ) ); ?>">
						<?php if ( isset( $wishlist_table['colm_checkbox'] ) && $wishlist_table['colm_checkbox'] ) { ?>


							<div class="product-cb">
								<?php
								echo apply_filters( 'tinvwl_wishlist_item_cb', sprintf( // WPCS: xss ok.
										'<input type="checkbox" name="wishlist_pr[]" value="%d" title="%s">', esc_attr( $wl_product['ID'] ), __( 'Select for bulk action', 'ti-woocommerce-wishlist' )
								), $wl_product, $product );
								?>
							</div>

						<?php } ?>
							<div class="product-thumbnail">
								<?php
								$thumbnail = apply_filters( 'tinvwl_wishlist_item_thumbnail', $product->get_image(), $wl_product, $product );

								if ( ! $product->is_visible() ) {
									echo $thumbnail; // WPCS: xss ok.
								} else {
									printf( '<a href="%s">%s</a>', esc_url( $product_url ), $thumbnail ); // WPCS: xss ok.
								}
								?>
							</div>

						<div class="cart_product_content">
							<div class="product-remove">
								<button type="submit" name="tinvwl-remove"
										value="<?php echo esc_attr( $wl_product['ID'] ); ?>"
										title="<?php _e( 'Remove', 'ti-woocommerce-wishlist' ) ?>">
										<i
											class="ftinvwl ftinvwl-times"></i>
								</button>
							</div>

							<div class="product-name">
								<?php
								if ( ! $product->is_visible() ) {
									echo apply_filters( 'tinvwl_wishlist_item_name', is_callable( array(
													$product,
													'get_name'
											) ) ? $product->get_name() : $product->get_title(), $wl_product, $product ) . '&nbsp;'; // WPCS: xss ok.
								} else {
									echo apply_filters( 'tinvwl_wishlist_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_url ), is_callable( array(
											$product,
											'get_name'
									) ) ? $product->get_name() : $product->get_title() ), $wl_product, $product ); // WPCS: xss ok.
								}

								echo apply_filters( 'tinvwl_wishlist_item_meta_data', tinv_wishlist_get_item_data( $product, $wl_product ), $wl_product, $product ); // WPCS: xss ok.
								?>
							</div>

							<?php if ( isset( $wishlist_table_row['colm_stock'] ) && $wishlist_table_row['colm_stock'] ) { ?>
								<div class="product-stock">
									<?php
									$availability = (array) $product->get_availability();
									if ( ! array_key_exists( 'availability', $availability ) ) {
										$availability['availability'] = '';
									}
									if ( ! array_key_exists( 'class', $availability ) ) {
										$availability['class'] = '';
									}
									$availability_html = empty( $availability['availability'] ) ? '<p class="stock ' . esc_attr( $availability['class'] ) . '"><span><i class="ftinvwl ftinvwl-check"></i></span><span class="tinvwl-txt">' . esc_html__( 'In stock', 'ti-woocommerce-wishlist' ) . '</span></p>' : '<p class="stock ' . esc_attr( $availability['class'] ) . '"><span><i class="ftinvwl ftinvwl-' . ( ( 'out-of-stock' === esc_attr( $availability['class'] ) ? 'times' : 'check' ) ) . '"></i></span><span>' . wp_kses_post( $availability['availability'] ) . '</span></p>';

									echo apply_filters( 'tinvwl_wishlist_item_status', $availability_html, $availability['availability'], $wl_product, $product ); // WPCS: xss ok.
									?>
								</div>
							<?php } ?>
							<div class="cart_product_price_qnt">
								<?php if ( isset( $wishlist_table_row['colm_price'] ) && $wishlist_table_row['colm_price'] ) { ?>
									<div class="product-price">
										<?php
										echo apply_filters( 'tinvwl_wishlist_item_price', $product->get_price_html(), $wl_product, $product ); // WPCS: xss ok.
										?>
									</div>
								<?php } ?>
								<?php if ( isset( $wishlist_table_row['add_to_cart'] ) && $wishlist_table_row['add_to_cart'] ) { ?>
									<div class="product-action">
										<?php
										if ( apply_filters( 'tinvwl_wishlist_item_action_add_to_cart', $wishlist_table_row['add_to_cart'], $wl_product, $product ) ) {
											?>
											<button class="button alt" name="tinvwl-add-to-cart"
													value="<?php echo esc_attr( $wl_product['ID'] ); ?>"
													title="<?php echo esc_html( apply_filters( 'tinvwl_wishlist_item_add_to_cart', $wishlist_table_row['text_add_to_cart'], $wl_product, $product ) ); ?>">
												<i
														class="ftinvwl ftinvwl-shopping-cart"></i><span
														class="tinvwl-txt"><?php echo wp_kses_post( apply_filters( 'tinvwl_wishlist_item_add_to_cart', $wishlist_table_row['text_add_to_cart'], $wl_product, $product ) ); ?></span>
											</button>
										<?php } elseif ( apply_filters( 'tinvwl_wishlist_item_action_default_loop_button', $wishlist_table_row['add_to_cart'], $wl_product, $product ) ) {
											woocommerce_template_loop_add_to_cart();
										} ?>
									</div>
								<?php } ?>

							</div>

						</div>




						<!-- <?php if ( isset( $wishlist_table_row['colm_date'] ) && $wishlist_table_row['colm_date'] ) { ?>
							<div class="product-date">
								<?php
								echo apply_filters( 'tinvwl_wishlist_item_date', sprintf( // WPCS: xss ok.
										'<time class="entry-date" datetime="%1$s">%2$s</time>', $wl_product['date'], mysql2date( get_option( 'date_format' ), $wl_product['date'] )
								), $wl_product, $product );
								?>
							</div>
						<?php } ?> -->


					</div>
					<?php
					do_action( 'tinvwl_wishlist_row_after', $wl_product, $product );
				} // End if().
			} // End foreach().
			// restore global product data.
			$product = $_product_tmp;
			// restore global post data.
			$post = $_post_tmp;
			?>
			<?php do_action( 'tinvwl_wishlist_contents_after' ); ?>
			</div>
			<div>
			<div class="wishlist_cta_container">
				<div class="wishlist_cta_wrapper" colspan="100">
					<?php do_action( 'tinvwl_after_wishlist_table', $wishlist ); ?>
					<?php wp_nonce_field( 'tinvwl_wishlist_owner', 'wishlist_nonce' ); ?>
				</div>
			</div>
			</div>
		</div>
	</form>
	<?php do_action( 'tinvwl_after_wishlist', $wishlist ); ?>
	<div class="tinv-lists-nav tinv-wishlist-clear">
		<?php do_action( 'tinvwl_pagenation_wishlist', $wishlist ); ?>
	</div>
</div>
