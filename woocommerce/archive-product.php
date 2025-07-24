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

defined('ABSPATH') || exit;

get_header('shop');

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
do_action('woocommerce_before_main_content');
?>
<header class="woocommerce-products-header">
    <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
        <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
    <?php endif; ?>

    <?php
    do_action('woocommerce_archive_description');
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
            array_unshift($reordered_cats, $wellness_term);
        }

        foreach ($reordered_cats as $cat) {
            $thumb_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
            $img_url = wp_get_attachment_url($thumb_id);
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

    <div id="subcategory-container">
        <?php
        $default = get_term_by('name', 'Wellness Products', 'product_cat');
        if ($default) {
            $subcats = get_terms([
                'taxonomy' => 'product_cat',
                'parent' => $default->term_id,
                'hide_empty' => false,
            ]);

            if (!empty($subcats)) {
                echo '<div class="subcategory-list">';

                // Add the "All" option
                echo '<label class="subcategory-link"><input type="radio" name="subcategory" class="subcategory-radio" value="' . esc_attr($default->term_id) . '" checked> <span>All</span></label>';

                foreach ($subcats as $subcat) {
                    echo '<label class="subcategory-link "><input type="radio" name="subcategory" class="subcategory-radio" value="' . esc_attr($subcat->term_id) . '"> <span>' . esc_html($subcat->name) . '</span></label>';
                }

                echo '</div>';
            }
        }
        ?>
    </div>

    <div id="product-container">
        <?php
        if ($default) {
            $products = new WP_Query([
                'post_type' => 'product',
                'posts_per_page' => 12,
                'tax_query' => [
                    [
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => [$default->term_id],
                        'include_children' => true,
                    ],
                ],
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ]);

            if ($products->have_posts()) {
                woocommerce_product_loop_start();
                while ($products->have_posts()) {
                    $products->the_post();
                    wc_get_template_part('content', 'newproduct');
                }
                woocommerce_product_loop_end();
                wp_reset_postdata();
            } else {
                echo '<p>No products found.</p>';
            }
        }
        ?>
    </div>



</div>
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
    jQuery(document).ready(function($) {
        function loadSubcategories(catId) {
            $('#subcategory-container').html('<p>Loading filters...</p>');
            $('#product-container').html('<p>Loading products...</p>');

            $.post(ajaxurl, {
                action: 'load_subcategories_and_products',
                cat_id: catId
            }, function(response) {
                $('#subcategory-container').html(response.subcategories);
                $('#product-container').html(response.products);
            });
        }

        $('.category-block').on('click', function() {
            $('.category-block').removeClass('active');
            $(this).addClass('active');

            var catId = $(this).data('cat-id');
            loadSubcategories(catId);
        });

        $(document).on('change', '.subcategory-radio', function() {
            const subcatId = $(this).val();
            $('#product-container').fadeTo(100, 0.3);
            $.post(ajaxurl, {
                action: 'filter_products_by_subcat',
                subcat: subcatId
            }, function(response) {
                $('#product-container').html(response).fadeTo(100, 1);
            });
        });


    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const blocks = document.querySelectorAll(".category-block");

        blocks.forEach(block => {
            block.addEventListener("click", function() {
                blocks.forEach(b => b.classList.remove("active"));
                this.classList.add("active");
            });
        });
    });
</script>
<?php
get_footer('shop');
?>