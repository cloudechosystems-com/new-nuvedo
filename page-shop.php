<?php
/*
Template Name: New Shop Page Template
*/
defined( 'ABSPATH' ) || exit;
get_header(  );
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
?>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title  page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>
	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>


<section class="section">
  <div class="container">
    <div class="icon_breif_wrapper">
      <?php
        if( have_rows('drava_features') ):
          while ( have_rows('drava_features') ) : the_row(); ?>
          <div class="icon_breif scr_rvl">
            <img src="<?= get_sub_field('icon'); ?>" alt="">
            <div class="icon_breif_content">
              <span><?= get_sub_field('first_text'); ?></span>
              <span><?= get_sub_field('second_text'); ?></span>
            </div>

          </div>
          <?php endwhile;
        else :
          // no rows found
        endif;
      ?>
    </div>

  </div>

</section>

<section class="section">
  <div class="container">
    <div class="category_wrapper">
      <h2 class="section_heading"><?= get_field('category_heading'); ?></h2>

      <div class="owl-carousel owl-carousel-single-line owl-theme">

          <?php
          $args = array(
              'taxonomy'   => "product_cat"
          );
          $product_categories = get_terms($args);
          foreach ($product_categories as $term) :
          $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
              $image = wp_get_attachment_url( $thumbnail_id );
              $term_link = get_term_link( $term, 'product_cat' );
              ?>
              <div class="item">
                <div class="cat_product_wrapper">
                  <img src="<?= $image ?>" alt="">

                  <a class="primary_btn" href="<?= $term_link ?>">SHOP NOW</a>

                </div>

              </div>
          <?php endforeach;
           ?>


    </div>

    </div>

  </div>

</section>



<?php
if ( woocommerce_product_loop() ) {
	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );
	woocommerce_product_loop_start();
		$args = array(
		    'taxonomy'   => "product_cat"
		);
		$product_categories = get_terms($args);
		foreach ($product_categories as $term) :
		  $term_name = $term->name;
      $term_slug = $term->slug;
		    ?>
        <section class="section">
              <div class="container">
                <div class="product_categorie_name">
                  <h2 class=" section_heading"><?= $term_name ?></h2>
                </div>
                <div class="product_cat_card_wrapper">
                  <?php
                  $prod_args = array(
                      'post_type' => 'product',
                      'product_cat' => $term_slug,
                      'orderby' => 'date',
                      'order' => 'DESC',
                      'posts_per_page' => -1,
                      'paged' => get_query_var( 'paged' ),
                  );
                  $products = new WP_Query( $prod_args );
                  if ( $products->have_posts() ) :
                      while ( $products->have_posts() ) : $products->the_post(); ?>
											<div class="product_card ">
												<a href="<?php echo get_permalink( ) ?>">
													<div class="product_card_image_wrapper">
														<div class="product_image">
															<img  src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" />

														</div>
														<div class="product_card_wishlist">
															<?php
															$id = $product->get_id();
															$shortcode = "[ti_wishlists_addtowishlist product_id=$id ]";
															 echo do_shortcode( $shortcode ); ?>
														</div>
													</div>
												</a>
												<div class="product_details_wrapper">
													<div class="product_item_name">
														<a href="<?php echo get_permalink( ) ?>">
															<h2> <?php the_title(); ?></h2>
														</a>
													</div>
													<div class="content_price">
														<span class="price product-price">
															 &#x20B9; <?php echo $product->get_regular_price(); ?>

														</span>
														<?php if ($product->get_sale_price()): ?>
															<span class="price old-price">
															&#x20B9; <?php echo $product->get_sale_price(); ?>
															</span>

														<?php endif; ?>


													</div>
													<div class="add-to-cart "><?php
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



											</div>

                      <?php
                      endwhile;
                      wp_reset_postdata();
                  endif;
                   ?>
                </div>
              </div>
            </section>
		<?php endforeach;
	woocommerce_product_loop_end();
	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );


get_footer(  );
