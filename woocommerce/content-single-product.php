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

  defined('ABSPATH') || exit;

  global $product;
  add_action('woocommerce_after_single_variation', function() {
      global $product;
      if ( $product && $product->is_type('variable') ) {
          ?>
          <div class="single-buy-now-button">
              <a href="<?php echo esc_url(wc_get_checkout_url() . '?add-to-cart=' . $product->get_id()); ?>" class="singlepage-buynow">
                  Buy Now - <?php echo wc_price($product->get_price()); ?>
              </a>
          </div>
          <?php
      }
  });
  /**
   * Hook: woocommerce_before_single_product.
   *
   * @hooked woocommerce_output_all_notices - 10
   */
  do_action('woocommerce_before_single_product');

  if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
  }
  ?>


 <div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
   <?php
    /**
     * Hook: woocommerce_before_single_product_summary.
     *
     * @hooked woocommerce_show_product_sale_flash - 10
     * @hooked woocommerce_show_product_images - 20
     */
    do_action('woocommerce_before_single_product_summary');

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
      remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

      remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50, 0);
      remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40, 0);
      add_action('woocommerce_single_product_summary', 'custom_title_after_price', 15);
      do_action('woocommerce_single_product_summary');
      echo '<div class="product_title_wrap">';
      function custom_title_after_price()
      {
        echo '<div class="custom-price-wrap">';
        woocommerce_template_single_price();

        echo "<div class='price-message'>";
        echo '<p>+ Tax and Shipping rate calculated at checkout</p>';
        echo "</div>";
        echo '</div>';
      }
      echo '</div>';
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
     <?php if (has_term('mushroom-art', 'product_cat')) {
      } else { ?>
      
       <!-- 	   <div class="special_content">
		   Due to large volume of orders, we will be shipping out orders placed after 28th December only after 3rd January. We apologize for the inconvenience caused. Happy Holidays!
	   </div> -->

     <?php } ?>
     
   </div>
   <div class="wrapper_content">
     <div class="description_wrapper">
       <div class="product-section-heading">Key Benefits</div>
       <div class="key-feature-Wrapper">
         <div class="key-feature-Cards">
           <?php
            if (have_rows('key_features_repeater')):
              $i = 0;
              while (have_rows('key_features_repeater')): the_row(); ?>
               <div class="key-feature-card">
                 <div class="key-feature-imgCard">
                   <img src="<?php echo get_sub_field('key_icon'); ?>" />
                 </div>
                 <div class="imgDescription">
                   <div class="imgHeading"><?php echo get_sub_field('feature_name'); ?></div>
                 </div>
               </div>
           <?php $i++;
              endwhile;
            else:
            //no rows found
            endif;
            ?>
         </div>
       </div>
       <section>
         <div class="product-section-heading">Usage Guide</div>
         <?php if (have_rows('usage_guide_repeater')) :
            $i = 0;
            while (have_rows('usage_guide_repeater')) : the_row();
              $open = ($i === 0) ? 'block' : 'none'; // first one open
              $icon = ($i === 0) ? '-' : '+';
          ?>
             <div class="usageGuideCard">
               <div class="usageGuideHeader" data-toggle="usage-toggle-<?php echo $i; ?>">
                 <div class="usageGuideTitle"><?php echo esc_html(get_sub_field('usage_title')); ?></div>
                 <div class="usageGuideToggle" id="usage-icon-<?php echo $i; ?>"><?php echo $icon; ?></div>
               </div>

               <div class="usageGuideContent" id="usage-toggle-<?php echo $i; ?>" style="display:<?php echo $open; ?>;">
                 <div class="usageGuideImage">
                   <img src="<?php echo esc_url(get_sub_field('usage_image')); ?>" alt="">
                 </div>
                 <?php if (have_rows('steps')) : ?>
                   <div class="usageGuideSteps">
                     <?php while (have_rows('steps')) : the_row(); ?>
                       <div class="usageGuideStep">
                         <div class="stepTitle"><?php echo esc_html(get_sub_field('step_title')); ?></div>
                         <div class="stepContent"><?php echo esc_html(get_sub_field('step_content')); ?></div>
                       </div>
                     <?php endwhile; ?>
                   </div>
                 <?php endif; ?>
               </div>
             </div>

         <?php
              $i++;
            endwhile;
          endif;
          ?>
       </section>
       <section>
         <div class="product-section-heading">Lab Reports</div>
         <?php if (have_rows('lab_reports_repeater')) : ?>
           <?php while (have_rows('lab_reports_repeater')) : the_row(); ?>
             <div class="labReportCard">
               <div class="reportText">
                 <div class="reportName"><?php the_sub_field('report_name'); ?></div>
                 <div class="reportDesc"><?php the_sub_field('report_description'); ?></div>
               </div>
               <?php if (get_sub_field('report_file')) : ?>
                 <a href="<?php the_sub_field('report_file'); ?>" target="_blank" class="downloadLink">
                   <img src="https://lightgrey-crab-521485.hostingersite.com/wp-content/uploads/2025/06/icond.png" alt="Download">
                 </a>
               <?php endif; ?>
             </div>
           <?php endwhile; ?>
         <?php endif; ?>

       </section>
       <section>
         <div class="product-section-heading">Product Details</div>
         <?php if (have_rows('item_description')): ?>
           <div class="accordion">
             <?php while (have_rows('item_description')): the_row(); ?>
               <div class="accordion-item">
                 <h3 class="accordion-title">
                   <?php the_sub_field('item_description_title'); ?>
                   <span class="toggle">+</span>
                 </h3>
                 <div class="accordion-content">
                   <?php the_sub_field('item_description_content'); ?>
                 </div>
               </div>
             <?php endwhile; ?>
           </div>
         <?php endif; ?>

       </section>
       <section class="section">

         <div class="product-section-heading">Reviews</div>
         <div class="community_wrapper">
           <h2 class="section_heading heading_community_wrapper new-section-heading"><?= get_field('google_review_heading'); ?></h2>
           <div class="review_wrapper">
             <div class="community_img_wrapper">
               <?php echo do_shortcode('[trustindex no-registration=google]'); ?>
             </div>
           </div>
         </div>


       </section>
       <section>
         <div class="product-section-heading">FAQ</div>
         <?php if (have_rows('faq_items')) : ?>
           <div class="custom-faq">
             <?php while (have_rows('faq_items')) : the_row(); ?>
               <div class="faq-item">
                 <h3 class="faq-question">
                   <?php the_sub_field('question'); ?>
                   <span class="faq-toggle">+</span>
                 </h3>
                 <div class="faq-answer">
                   <?php the_sub_field('answers'); ?>
                 </div>
               </div>
             <?php endwhile; ?>
           </div>
         <?php endif; ?>

       </section>
     </div>
     <section>
     </section>

     <?php
      /**
       * Hook: woocommerce_after_single_product_summary.
       *
       * @hooked woocommerce_output_product_data_tabs - 10
       * @hooked woocommerce_upsell_display - 15
       * @hooked woocommerce_output_related_products - 20
       */
      do_action('woocommerce_after_single_product_summary');
      ?>



     <?php do_action('woocommerce_after_single_product'); ?>
     <script>
       jQuery(document).ready(function($) {
         // Find the main product image and thumbnail images
         var $mainImage = $('.woocommerce-product-gallery__image img');
         var $thumbnailImages = $('.thumbnails .woocommerce-product-gallery__image img');

         // Add a hover event listener to each thumbnail image
         $thumbnailImages.on('mouseenter', function() {
           // Get the src of the hovered thumbnail image
           var newImageSrc = $(this).attr('src');

           // Update the main product image source
           $mainImage.attr('src', newImageSrc);
         });
       });
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
     <script>
       document.addEventListener("DOMContentLoaded", function() {
         const headers = document.querySelectorAll(".usageGuideHeader");
         headers.forEach(header => {
           header.addEventListener("click", function() {
             const toggleId = this.getAttribute("data-toggle");
             const content = document.getElementById(toggleId);
             const icon = this.querySelector(".usageGuideToggle");

             if (content.style.display === "none" || content.style.display === "") {
               content.style.display = "block";
               icon.textContent = "-";
             } else {
               content.style.display = "none";
               icon.textContent = "+";
             }
           });
         });
       });
     </script>
     <script>
       document.querySelectorAll(".faq-question, .accordion-title").forEach(function(title) {
         title.addEventListener("click", function() {
           const content = this.nextElementSibling;
           const icon = this.querySelector(".faq-toggle, .toggle");
           const isOpen = content.style.display === "block";

           // Close all
           document.querySelectorAll(".faq-answer, .accordion-content").forEach(function(c) {
             c.style.display = "none";
           });
           document.querySelectorAll(".faq-toggle, .toggle").forEach(function(t) {
             t.textContent = "+";
           });

           // Open current
           if (!isOpen) {
             content.style.display = "block";
             icon.textContent = "-";
           }
         });
       });
     </script>
     