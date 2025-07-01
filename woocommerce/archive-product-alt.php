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

defined('ABSPATH') || exit;

get_header();


/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
do_action('woocommerce_before_main_content');
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10, 0);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

?>
<section class="section product_category_flex categorypage-main-wrapper">
	
	<div class="container">
		

		<?php
// Get current category name
$current_cat = get_queried_object();
$current_cat_name = isset($current_cat->name) ? $current_cat->name : '';

// Get homepage banners from front page
$front_page_id = get_option('page_on_front');
$matched_banner = null;

if (have_rows('bann_images', $front_page_id)) {
    while (have_rows('bann_images', $front_page_id)) {
        the_row();
        $banner_heading = get_sub_field('banner_heading');
        if (strcasecmp($banner_heading, $current_cat_name) === 0) {
            $matched_banner = [
                'img' => get_sub_field('images'),
                'heading' => $banner_heading,
            ];
            break;
        }
    }
}

// Fallback if no match found
if (!$matched_banner) {
    if (have_rows('bann_images', $front_page_id)) {
        the_row();
        $matched_banner = [
            'img' => get_sub_field('images'),
            'heading' => get_sub_field('banner_heading'),
        ];
    }
}
?>
<section class="about_banner">
    <div class="banner_content banner_overlay_wrap">
        <?php if ($matched_banner): ?>
            <img src="<?php echo esc_url($matched_banner['img']); ?>" alt="Nuvedo Product" class="banner_bg_img" style="width:100%;height:auto;display:block;">
            <div class="banner_overlay_title">
                <h1><?php echo esc_html($matched_banner['heading']); ?></h1>
            </div>
        <?php endif; ?>
        <img fetchpriority="high" class="banner_img_spiral" src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2021/05/bannerspiral.png" alt="Nuvedo spiral background">
    </div>
</section>

<?php
		if (woocommerce_product_loop()) {


			do_action('woocommerce_before_main_content');

			

			remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
			do_action('woocommerce_before_shop_loop');
			$current_cat = get_queried_object();
			if (isset($current_cat->term_id) && $current_cat->taxonomy === 'product_cat') {
				$default = $current_cat;
				$subcats = get_terms([
					'taxonomy' => 'product_cat',
					'parent' => $current_cat->term_id,
					'hide_empty' => false,
				]);
			}




			if (!empty($subcats)) {
				echo '<div class="subcategory-list">';

				// Add the "All" option
				echo '<label class="subcategory-link"><input type="radio" name="subcategory" class="subcategory-radio" value="' . esc_attr($default->term_id) . '" checked> <span>All</span></label>';

				foreach ($subcats as $subcat) {
					echo '<label class="subcategory-link "><input type="radio" name="subcategory" class="subcategory-radio" value="' . esc_attr($subcat->term_id) . '"> <span>' . esc_html($subcat->name) . '</span></label>';
				}

				echo '</div>';
			}



			woocommerce_product_loop_start();

			if (wc_get_loop_prop('total')) {
		?>
				<div class="product_cat_card_wrapper">
					<?php
					while (have_posts()) {
						the_post();
						wc_get_template_part('content', 'newproduct');
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
			do_action('woocommerce_after_shop_loop');
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action('woocommerce_no_products_found');
		}

		/**
		 * Hook: woocommerce_after_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action('woocommerce_after_main_content');

		/**
		 * Hook: woocommerce_sidebar.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action('woocommerce_sidebar');
		?>

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

</section>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		document.querySelectorAll('.subcategory-radio').forEach(function(radio) {
			radio.addEventListener('change', function() {
				if (this.checked) {
					var subcatId = this.value;
					var container = document.querySelector('.product_cat_card_wrapper');
					if (container) container.innerHTML = '<p>Loading...</p>';
					fetch(ajaxurl, {
							method: 'POST',
							headers: {
								'Content-Type': 'application/x-www-form-urlencoded'
							},
							body: 'action=filter_products_by_subcat&subcat=' + subcatId
						})
						.then(response => response.text())
						.then(html => {
							if (container) {
								container.innerHTML = html;
							}
						});
				}
			});
		});
	});
</script>
<?php
get_footer('shop');
