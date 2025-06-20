<?php

/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>


<section class="">
	<div class="cart_page_container">
		<div class="cart-container">
			<h2 class="your_cart">Cart Page</h2>
			<form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
				<?php do_action('woocommerce_before_cart_table'); ?>

				<div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">

					<div>
						<?php do_action('woocommerce_before_cart_contents'); ?>

						<?php
						foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
							$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
							$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

							if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
								$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
						?>
								<div class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">



									<div class="product-thumbnail">
										<?php
										$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

										if (! $product_permalink) {
											echo $thumbnail; // PHPCS: XSS ok.
										} else {
											printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
										}
										?>
									</div>
									<div class="cart_product_content">
										<div class="product-name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
											<?php
											if (! $product_permalink) {
												echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
											} else {
												echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
											}

											do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

											// Meta data.
											echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

											// Backorder notification.
											if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
												echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
											}
											?>

										</div>
										<div class="cart-product-short-description">
											<?php echo $_product->get_short_description(); ?>
										</div>

										<div class="cart_product_price_qnt">
											<div class="product-subtotal" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
												<?php
												echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
												?>
											</div>
											<div class="productqn-wrapper">
												<div class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
													<?php
													if ($_product->is_sold_individually()) {
														$product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
													} else {
														$product_quantity = woocommerce_quantity_input(
															array(
																'input_name'   => "cart[{$cart_item_key}][qty]",
																'input_value'  => $cart_item['quantity'],
																'max_value'    => $_product->get_max_purchase_quantity(),
																'min_value'    => '0',
																'product_name' => $_product->get_name(),
															),
															$_product,
															false
														);
													}

													echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
													?>
												</div>
												<div class="update-cart-button">
													<button type="submit" class="button visible" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>
												</div>

												<div class="product-remove">
													<?php
													echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
														'woocommerce_cart_item_remove_link',
														sprintf(
															'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><svg width="23" height="23" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>',
															esc_url(wc_get_cart_remove_url($cart_item_key)),
															esc_html__('Remove this item', 'woocommerce'),
															esc_attr($product_id),
															esc_attr($_product->get_sku())
														),
														$cart_item_key
													);
													?>
												</div>
											</div>
										</div>
									</div>




								</div>
						<?php
							}
						}
						?>

						<?php do_action('woocommerce_cart_contents');
						// Display the additional message

						?>

						<div>
							<div colspan="6" class="actions">
								<!-- Your custom buttons start -->
								<div class="cart-top-buttons">
									<a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="button continue-shopping">Continue Shopping</a>
									<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="button continue-shopping">View Cart</a>
									<a href="javascript:void(0);" onclick="navigator.share ? navigator.share({url:window.location.href}) : alert('Copy this link: ' + window.location.href);" class="button continue-shopping">Share</a>
								</div>

								<?php if (wc_coupons_enabled()) { ?>
									<div class="coupon">
										<!-- <label for="coupon_code"><?php esc_html_e('Coupon:', 'woocommerce'); ?></label> -->
										<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon', 'woocommerce'); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>"><?php esc_attr_e('Apply coupon', 'woocommerce'); ?></button>
										<?php do_action('woocommerce_cart_coupon'); ?>
									</div>
								<?php } ?>

								<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>

								<?php do_action('woocommerce_cart_actions'); ?>

								<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
							</div>
						</div>

						<?php do_action('woocommerce_after_cart_contents'); ?>
					</div>
				</div>
				<?php do_action('woocommerce_after_cart_table'); ?>
			</form>
		</div>
		<section class="similar-products">
			<div class="cart-container">
				<?php do_action('woocommerce_before_cart_collaterals'); ?>
				<?php
				// Get product IDs in cart
				$cart_product_ids = array();
				foreach (WC()->cart->get_cart() as $cart_item) {
					$cart_product_ids[] = $cart_item['product_id'];
				}

				// Get categories of products in cart
				$cart_categories = array();
				foreach ($cart_product_ids as $product_id) {
					$terms = get_the_terms($product_id, 'product_cat');
					if ($terms && ! is_wp_error($terms)) {
						foreach ($terms as $term) {
							$cart_categories[] = $term->term_id;
						}
					}
				}
				$cart_categories = array_unique($cart_categories);

				// Query similar products (exclude those already in cart)
				$args = array(
					'post_type' => 'product',
					'posts_per_page' => 4,
					'post__not_in' => $cart_product_ids,
					'tax_query' => array(
						array(
							'taxonomy' => 'product_cat',
							'field'    => 'term_id',
							'terms'    => $cart_categories,
						),
					),
				);

				$similar_products = new WP_Query($args);

				if ($similar_products->have_posts()) : ?>
					<div class="cart-similar-products">
						<h3>Similar Products</h3>
						<ul class="products">
							<?php while ($similar_products->have_posts()) : $similar_products->the_post();
								global $product; ?>
								<li <?php wc_product_class('cart-similar-product-card', get_the_ID()); ?>>
									<div class="card-inner">
										<?php if ($product->is_on_sale()) : ?>
											<span class="discount-badge">
												<?php
												$regular = $product->get_regular_price();
												$sale = $product->get_sale_price();
												if ($regular && $sale) {
													$percent = round((($regular - $sale) / $regular) * 100);
													echo esc_html($percent) . '% OFF';
												}
												?>
											</span>
										<?php endif; ?>
										<a href="<?php the_permalink(); ?>">

											<div class="cart-similar-product-img-wrapper">
												<?php
												$image_id = get_post_thumbnail_id();
												$image_url = wp_get_attachment_image_url($image_id, 'woocommerce_thumbnail');
												if ($image_url) {
													echo '<img src="' . esc_url($image_url) . '" class="cart-similar-product-img" alt="' . esc_attr(get_the_title()) . '">';
												}
												?>
											</div>

										</a>
										<div class="card-content">
											<a href="<?php the_permalink(); ?>">
												<h2 class="woocommerce-loop-product__title"><?php the_title(); ?></h2>
											</a>
											<div class="card-price">
												<?php woocommerce_template_loop_price(); ?>
											</div>
											<div class="card-add-to-cart">
												<?php woocommerce_template_loop_add_to_cart(); ?>
											</div>
										</div>
									</div>
								</li>
							<?php endwhile; ?>
						</ul>
					</div>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
											</div>
		</section>
		<section class="payment-section">
			<div class="cart-container">
				<div class="payment-secure">
					<div class="payment-secure-text">
						<img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/lock.png" alt="Lock Icon" class="lock-icon">
						<span>100% secure payment by</span>
					</div>
					<div class="payment-logos">
						<img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/Frame-75.png" alt="Razorpay" class="payment-logo">
					</div>
				</div>
			</div>

			<div class='price-message cartpage-pricemsg'>
				<p>Tax and Shipping rate calculated at checkout</p>
			</div>
			<div class="cart-container">
				<div class="cart-collaterals">
					<?php
					/**
					 * Cart collaterals hook.
					 *
					 * @hooked woocommerce_cross_sell_display
					 * @hooked woocommerce_cart_totals - 10
					 */

					do_action('woocommerce_cart_collaterals');

					?>
				</div>

				<?php do_action('woocommerce_after_cart'); ?>

			</div>

		</section>

</section>