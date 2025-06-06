<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();


/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
 remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10, 0);
 remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);


?>
<section class="section product_category_flex">
	<section class="weatherapp categorypage" style="max-width:300px; margin:0 auto;">
					<div class="weatherapp-wrapper">
						<img src="https://nuvedo.com/wp-content/uploads/2022/08/weather-e1648668406832.png" alt="">
						<div class="weather-content">
							<h3>Not sure which Mushroom Growing Kit to grow?</h3>
							<a  href="https://nuvedo.com/weather/" class="weatherapplink">CLICK</a>

						</div>
					</div>
		  </section>
	<section class="weatherapp categorypage" style="max-width:300px; margin:0 auto;">
					<div class="wellness-wrapper">
						<img src="https://nuvedo.com/wp-content/uploads/2024/01/7d11ccde-f63f-46d8-b942-a163db0f8f73-e1705058017432.png" alt="">
						<div class="weather-content">
							<h3>Find your perfect Mushroom Extract</h3>
							<a  href="https://nuvedo.com/wellness-widget/" class="weatherapplink">CLICK</a>

						</div>
					</div>
		  </section>
	<div class="container">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="section_heading center woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
		<p>
			<?php 
the_archive_description( '<div class="taxonomy-description">', '</div>' ); 
?>
		</p>



  	<?php endif; ?>

		<?php
		if ( woocommerce_product_loop() ) {
			
			add_action('woocommerce_before_main_content','woocommerce_breadcrumb',10);
			do_action( 'woocommerce_before_main_content' );

			/**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked woocommerce_output_all_notices - 10
			 * @hooked woocommerce_result_count - 20
			 * @hooked woocommerce_catalog_ordering - 30
			 */
			
			 remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
			do_action( 'woocommerce_before_shop_loop' );
			


			woocommerce_product_loop_start();

			if ( wc_get_loop_prop( 'total' ) ) {
				?>
				<div class="product_cat_card_wrapper">
				<?php
				while ( have_posts() ) {
					the_post();

					/**
					 * Hook: woocommerce_shop_loop.
					 */
					do_action( 'woocommerce_shop_loop' );


					wc_get_template_part( 'content', 'newproduct' );
				}
				?>
			</div>
				<?php
			}

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

		/**
		 * Hook: woocommerce_sidebar.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
		?>

	</div>
</section>
<?php
get_footer( 'shop' );


