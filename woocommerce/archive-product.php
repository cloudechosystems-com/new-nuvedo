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
/* Template Name : Main Shop Page Template */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
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
<div class="container">
<div id="category-container" class="menu-grid shop-page-menu">
<?php
$top_cats = get_terms([
    'taxonomy' => 'product_cat',
    'parent' => 0,
    'hide_empty' => false,
]);

$reordered_cats = [];
$wellness_term = null;

foreach ($top_cats as $cat) {
    if (strtolower($cat->name) === 'wellness products') {
        $wellness_term = $cat;
    } else {
        $reordered_cats[] = $cat;
    }
}

if ($wellness_term) {
    array_unshift($reordered_cats, $wellness_term); // Add Wellness to beginning
}

foreach ($reordered_cats as $cat) {
    $thumb_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
    $img_url = wp_get_attachment_url($thumb_id);
    ?>
   <?php
$active_class = (strtolower($cat->name) === 'wellness products') ? ' active' : '';
?>
<div class="category-block product-menu-item<?php echo $active_class; ?>" data-cat-id="<?php echo $cat->term_id; ?>" data-cat-name="<?php echo esc_attr($cat->name); ?>">

        <img class="shop-product-menu-item-img" src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($cat->name); ?>">
        <h3 class="shop-product-name"><?php echo esc_html($cat->name); ?></h3>
    </div>
    
<?php } ?>

</div>

 <div class="menu-link mfg-box">
      <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/10058658491557740321-1-3.png" alt="" class="menu-link-image">
      <div class="menu-link-title">
        <div class="menu-link-main-title">Mushrooms Of URU</div>
       <div class="menu-link-sub-title">Mushroom Field Guide</div>
      </div>
      <a href="https://lightgrey-crab-521485.hostingersite.com/mushroom-field-guide/"><span class="arrow"><img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/6421887411543238876-1-1.png" class="arrow-img"></span></a>
    </div>
<div class="shop-page-products-title">Shop for Mushroom</div>
<div id="subcategory-container"></div>
<div id="product-container"></div>
</div>

	<?php
get_footer( 'shop' );
?>