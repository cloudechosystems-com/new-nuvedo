<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-newproduct.php.
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
  <?php
  $term = get_queried_object();
$term_slug=$term->slug;
  $prod_args = array(
	  'post__not_in' => array(3485),
      'post_type' => 'product',
      'product_cat' => $term_slug,
      'orderby' => 'date',
      'order' => 'DESC',
      'posts_per_page' => -1,
      'paged' => get_query_var( 'paged' ),
  );
 ?>
 <div class="product_card new prodcat<?php echo $product->get_id() ?>">
	 <div class="">
		 <a href="<?php echo get_permalink( ) ?>">
			 <div class="product_card_image_wrapper">
				 <div class="product_image">
					 <img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" />
				 </div>
			 </div>
		 </a>
	 </div>
	 <div class="product_details_wrapper">
			 <div class="product_item_name">
				 <a href="<?php echo get_permalink( ) ?>">
					 <h2> <?php the_title(); ?></h2>
				 </a>
			 </div>
	 </div>
	 <!--star rating-->
	<div class="star-rating starrating">
    <?php
    echo wc_get_rating_html($product->get_average_rating(), $product->get_rating_count());
    ?>
</div>
<!---star-rating code ends-->
	 <div class="content_price">
		 <?php if ($product->get_regular_price()): ?>
		 <span class="price product-price <?=($product->get_sale_price()) ? "strike":""; ?> ">
			 &#x20B9; <?php echo $product->get_regular_price(); ?>
		 </span>
		 <?php endif; ?>

		 <?php if ($product->get_sale_price()): ?>
		 <span class="price old-price">
			 &#x20B9; <?php echo $product->get_sale_price(); ?>
		 </span>
		 <?php endif; ?>
	 </div>
	  <div class="add-to-cart ">
		  <?php
		  echo sprintf( '<a href="%s" data-quantity="1" class="%s" %s>%s</a>',
					   esc_url( $product->add_to_cart_url() ),
					   esc_attr( implode( ' ', array_filter( array(
						   'button', 'product_type_' . $product->get_type(),
						   $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
						   $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
					   ) ) ) ),
					   wc_implode_html_attributes( array(
						   'data-product_id'  => $product->get_id(),
						   'data-product_sku' => $product->get_sku(),
						   'aria-label'       => $product->add_to_cart_description(),
					   ) ),
					   esc_html( $product->add_to_cart_text() )
					  );
		  ?>
		 </div>



 </div>

      <?php

   ?>
