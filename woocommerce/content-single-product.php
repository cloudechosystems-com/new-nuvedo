 <?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.9.2
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>


 <div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
   <?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
		do_action( 'woocommerce_before_single_product_summary' );

	 ?>

   <div id="scrollimg" class="summary entry-summary">
     <?php
    /**
     * Hook: woocommerce_single_product_summary.
     *
     * @hooked woocommerce_template_single_title - 5

     * @hooked woocommerce_template_single_rating - 10
     * @hooked woocommerce_template_single_price - 10
     * @hooked woocommerce_template_single_excerpt - 20
     * @hooked woocommerce_template_single_add_to_cart - 30
     * @hooked woocommerce_template_single_meta - 40
     * @hooked woocommerce_template_single_sharing - 50
     * @hooked WC_Structured_Data::generate_product_data() - 60
     */
   	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing',50, 0);
   	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta',40, 0);
    add_action('woocommerce_single_product_summary', 'custom_title_after_price', 15);
    do_action( 'woocommerce_single_product_summary' );
	 
    function custom_title_after_price() {
		  // Display the additional message
    echo "<div class='price-message'>";
		echo '<p>+ Tax and Shipping rate calculated at checkout</p>';
	echo "</div>";
    }
	    
    ?>
	  <?php
global $product;
$target_product_ids = array(5285, 4989);

// Get the current product ID
$product_id = $product->get_id();

// Check if the current product ID is in the target IDs array
if (in_array($product_id, $target_product_ids)) {
    echo '<div class="troopod-feed mobile_only"
			  data-productId="' . $product_id . '"
			  data-tag="primary"
			  data-title="Product Highlights"
			  data-showFooter=""
			></div>';
}
?>
	<?php if ( has_term( 'mushroom-art', 'product_cat' ) ) {
} else { ?>
<!-- 	   <div class="special_content">
		   Due to large volume of orders, we will be shipping out orders placed after 28th December only after 3rd January. We apologize for the inconvenience caused. Happy Holidays!
	   </div> -->
<div class="product_inner_process_link_wrap">
	<a href="https://nuvedo.com/processing-time/" target="_blank">
        <img src="https://nuvedo.com/wp-content/uploads/2022/08/timeicon.svg" alt=""> View order processing time
    </a>
<?php
// Check if the current post has the "Mushroom growing kit" category
if (has_term('mushroom-growing-kit', 'product_cat')) {
    ?>
    <a href="https://nuvedo.com/weather/" target="_blank"><img src="https://nuvedo.com/wp-content/uploads/2022/08/weathericon.svg" alt=""> Not sure which Mushroom Growing Kit to grow?
</a>
    <?php
}
?>

    </div>
<?php } ?>
   </div>
<div class="wrapper_content">	 
	 <div class="description_wrapper">
		<div class="sp_content">
			<div class="description_heading">Item Description</div>
			<?php the_content(); ?>
		</div>
     <div class="sp_content">

        <div class="spp_drp_title">
			<?php if(get_field('mushroom')){ ?>
          <div class="spp_drp_content">
            <div id="ingredient" class="collapse_menu active">Mushroom</div>
            <div id="ingredients" class="collapse_item editable_text_container "><?= get_field('mushroom'); ?></div>
          </div>
		<?php } ?>
		<?php if(get_field('key_features')){ ?>
          <div class="spp_drp_content">
            <div id="usage" class="collapse_menu">Key Features</div>
            <div id="usages" class="collapse_item editable_text_container  hidden"><?= get_field('key_features'); ?></div>
          </div>
		<?php } ?>
       </div>

     </div>


  <?php
    if(get_field('in_action')){ ?>
      <section class="single_product_section" id="in-action">
          <h2 class="description_heading" style="text-align: center;"><?= get_field('in_action_heading'); ?></h2>
          <div class="video_wrap container-narrow">
            <?= get_field('in_action'); ?>
          </div>
      </section>
  <?php } ?>
	 </div>
	 </div>

 <?php
/**
 * Hook: woocommerce_after_single_product_summary.
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */
do_action( 'woocommerce_after_single_product_summary' );

?>


 <?php do_action( 'woocommerce_after_single_product' ); ?>
<script>
    jQuery( document ).ready( function( $ ) {
        // Find the main product image and thumbnail images
        var $mainImage = $( '.woocommerce-product-gallery__image img' );
        var $thumbnailImages = $( '.thumbnails .woocommerce-product-gallery__image img' );

        // Add a hover event listener to each thumbnail image
        $thumbnailImages.on( 'mouseenter', function() {
            // Get the src of the hovered thumbnail image
            var newImageSrc = $( this ).attr( 'src' );

            // Update the main product image source
            $mainImage.attr( 'src', newImageSrc );
        } );
    } );
</script>
 <?php
global $product;
$target_product_ids = array(5285, 4989);

// Get the current product ID
$product_id = $product->get_id();

// Check if the current product ID is in the target IDs array
if (in_array($product_id, $target_product_ids)) {
		echo '<div class="troopod-checkout"
  data-productId="' . $product_id . '"
></div>';
	 }
?>