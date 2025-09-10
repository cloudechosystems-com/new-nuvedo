<?php get_header(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"></script>

<div class="banner_bg">
  <div class="sharktank">
    <a href="https://youtu.be/VZIBSYwbtQA?si=p1NaVh8GgbP2SJTv" target="_blank">
      <img src="https://nuvedo.com/wp-content/uploads/2024/03/extract-4.png" alt="shartank">
    </a>
  </div>
  <section class="banner_section">
  <div class="banners owl-carousel owl-theme">
    <?php if (have_rows('bann_images')) : ?>
      <?php while (have_rows('bann_images')) : the_row();
        // Image field can be URL or ACF image array
        $image    = get_sub_field('images');
        $img_url  = is_array($image) ? ($image['url'] ?? '') : $image;
        $img_alt  = is_array($image) ? (!empty($image['alt']) ? $image['alt'] : ($image['title'] ?? 'Banner')) : (get_sub_field('banner_heading') ?: 'Banner');

        // Your existing link field
        $href = trim((string) get_sub_field('banner_category_link'));
      ?>
        <div class="item">
          <?php if (!empty($href)) : ?><a class="banner-link" href="<?php echo esc_url($href); ?>"><?php endif; ?>

            <div class="hero_image">
              <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>">
            </div>
            <div class="home_banner_details">
              <h2><?php echo esc_html(get_sub_field('banner_heading')); ?></h2>
              <h3><?php echo esc_html(get_sub_field('banner_sub_heading')); ?></h3>
            </div>

          <?php if (!empty($href)) : ?></a><?php endif; ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>

</div>

<section class="section icon_breif_section ">
  <div class="container">

    <?php
    // Get all top-level categories ONCE, in WooCommerce menu order
    $all_top_level_cats = get_terms([
      'taxonomy'   => 'product_cat',
      'parent'     => 0,
      'hide_empty' => true,
      'orderby'    => 'menu_order', // respects WooCommerce category drag/drop
      'order'      => 'ASC',
    ]);
    ?>

    <div class="category-tabs">
      <?php if (!empty($all_top_level_cats)) : ?>
        <?php foreach ($all_top_level_cats as $i => $cat) : ?>
          <button
            class="category-tab<?php echo $i === 0 ? ' active' : ''; ?>"
            data-cat-slug="<?php echo esc_attr($cat->slug); ?>">
            <?php echo esc_html($cat->name); ?>
          </button>
        <?php endforeach; ?>
      <?php else : ?>
        <p>No categories found.</p>
      <?php endif; ?>
    </div>

    <div class="tab-product-container">
      <div class="best-products" id="tab-product-grid">
        <?php
        // Load products from the FIRST category, ordered by product "Menu order"
        if (!empty($all_top_level_cats)) {
          $first_cat = $all_top_level_cats[0];

          $args = [
            'post_type'      => 'product',
            'posts_per_page' => -1,
            'tax_query'      => [[
              'taxonomy' => 'product_cat',
              'field'    => 'slug',
              'terms'    => $first_cat->slug,
            ]],
            'orderby'        => 'menu_order', // respects product "Menu order" field
            'order'          => 'ASC',
          ];

          $loop = new WP_Query($args);

          if ($loop->have_posts()) {
            echo '<ul class="products columns-4">';
            while ($loop->have_posts()) : $loop->the_post();
              wc_get_template_part('content', 'newproduct');
            endwhile;
            echo '</ul>';
          } else {
            echo '<p>No products found in this category.</p>';
          }
          wp_reset_postdata();
        }
        ?>
      </div>
    </div>

    <div id="product-carousel" class="best-product-carousel owl-carousel owl-theme"></div>
  </div>
</section>

<section class="section nuvedo_numuste">
  <div class="second_section_wrapper">
    <div class="second_section">
      <div class="imgwrapper">
        <img src="<?= get_field('nuvedo_numuste_icon'); ?>" alt="Nuvedo Product">
      </div>
      <div class="second_contents" style="text-align:center;">
        <h2><?= get_field('_numuste_title'); ?></h2>
        <div class="phonetics">/ˈnu:məsteɪ/</div>
        <h3><?= get_field('numuste_content'); ?></h3>
        <div class="other_tiles_banner">
          <span>Functional</span>
          <span>Receptive</span>
          <span>Timeless</span>
        </div>
      </div>
    </div>
    <div class="icon_breif_wrapper">
      <?php
      if (have_rows('nuvedo_features')):
        while (have_rows('nuvedo_features')) : the_row(); ?>
          <div class="icon_breif">
            <div class="second_content_wrapper">
              <img class="" src="<?= get_sub_field('icon'); ?>" alt="">
              <div class="icon_breif_content">
                <span class=""><?= get_sub_field('first_text'); ?></span>
              </div>
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
<section class="section newsandfeatures ">
  <div class="container">
    <h2 class="section_heading new-section-heading">Featured In</h2>
    <div class="nf_wrapper owl-carousel owl-theme">
      <?php
      if (have_rows('news_card')):
        while (have_rows('news_card')) : the_row(); ?>
          <div class="news_card">
            <a href="<?= get_sub_field('news-readmore'); ?>" class="read_more" target="_blank">
              <div class="news_card_img">
                <img src="<?= get_sub_field('news-image'); ?>" alt="">
                <div class="read_more_overlay">Read More</div>
              </div>
            </a>
          </div>
      <?php endwhile;
      else :
      // no rows found
      endif;
      ?>
    </div>
  </div>
</section>
<section class="homepage_product_section">
  <div class="product-category-container">
    <div class="home_product_wrapper">
      <div class="home_product_row1 home_product_row">
        <div class="section_heading_wrapper home_product_row_left">
          <h2 class="section_heading">Let us help you in your mushroom journey.</h2>
        </div>
        <div class="home_product_item home_product_row_right" style="background:<?= get_field('background_color_1'); ?>">
          <div class="home_product_item_img">
            <img class="" src="<?= get_field('product_image_01'); ?>" alt="">
          </div>
          <div class="home_product_item_content">
            <div class="home_product_item_name">
              <?= get_field('product_name_01'); ?>
            </div>
            <p class="home_product_item_discription">
              <?= get_field('product_description_01'); ?>
            </p>
            <a class="secondary_button" href="<?php echo get_field('product_link'); ?>">Shop now</a>

          </div>
        </div>

      </div>
      <div class="home_product_row2 home_product_row">
        <div class="home_product_item home_product_row_left " style="background:<?= get_field('background_color_2'); ?>">
          <div class="home_product_item_img">
            <img class="" src="<?= get_field('product_image_2'); ?>" alt="">
          </div>
          <div class="home_product_item_content">
            <div class="home_product_item_name">
              <?= get_field('product_name_2'); ?>
            </div>
            <p class="home_product_item_discription">
              <?= get_field('product_description_2'); ?>
            </p>
            <a class="secondary_button" href="<?php echo get_field('product_link_2'); ?>">Shop now</a>

          </div>
        </div>
        <div class="home_product_item home_product_row_right" style="background:<?= get_field('background_color_3'); ?>">
          <div class="home_product_item_img">
            <img class="" src="<?= get_field('product_image_3'); ?>" alt="">
          </div>
          <div class="home_product_item_content">
            <div class="home_product_item_name">
              <?= get_field('product_name_3'); ?>
            </div>
            <p class="home_product_item_discription">
              <?= get_field('product_description_3'); ?>
            </p>
            <a class="secondary_button" href="<?php echo get_field('product_link_3'); ?>">Shop now</a>

          </div>
        </div>
        


      </div>
      <div class="home_product_row3 home_product_row">
        <div class="home_product_item home_product_row_left" style="background:<?= get_field('background_color_4'); ?>">
          <div class="home_product_item_img">
            <img class="" src="<?= get_field('product_image_4'); ?>" alt="">
          </div>
          <div class="home_product_item_content">
            <div class="home_product_item_name">
              <?= get_field('product_name_4'); ?>
            </div>
            <p class="home_product_item_discription">
              <?= get_field('product_description_4'); ?>
            </p>
            <a class="secondary_button" href="<?php echo get_field('product_link_4'); ?>">Shop now</a>

          </div>
        </div>
        <div class="home_product_item home_product_row_right final-row-hide" style="background:<?= get_field('background_color_3'); ?>">
          <div class="home_product_item_img">
            <img class="" src="<?= get_field('product_image_3'); ?>" alt="">
          </div>
          <div class="home_product_item_content">
            <div class="home_product_item_name">
              <?= get_field('product_name_3'); ?>
            </div>
            <p class="home_product_item_discription">
              <?= get_field('product_description_3'); ?>
            </p>
            <a class="secondary_button" href="<?php echo get_field('product_link_3'); ?>">Shop now</a>

          </div>
        </div>
        


      </div>
<div class="featured">
          <div class="emblem_navedo">
            <img class="emblem_center" src="https://nuvedo.com/wp-content/uploads/2021/03/emblem_center_r.png"
              alt="">
            <img class="emblem_ring" src="https://nuvedo.com/wp-content/uploads/2021/03/emblem_ring_r.png" alt="">
          </div>
        </div>
    </div>
   
  </div>



</section>
<section class="section our_story " style="background-image: url('https://nuvedo.com/wp-content/uploads/2025/07/WhatsApp-Image-2025-04-24-at-09.37.33.jpeg')">
  <div class="container">
    <div class="our_story_content">
      <h2 class=""><?= get_field('story_nuvedo_heading'); ?></h2>
      <h3 class=""><?= get_field('story_nuvedo_subheading'); ?></h3>
      <p class=""> <?= get_field('story_nuvedo_content'); ?> </p>
      <a class="primary_btn" href="<?= get_field('about_nuvedo_button_link'); ?>"><?= get_field('about_nuvedo_button_text'); ?></a>
    </div>
  </div>
</section>
<section class="section">
  <div class="container">
    <div class="community_wrapper">
      <h2 class="section_heading heading_community_wrapper new-section-heading"><?= get_field('google_review_heading'); ?></h2>
      <div class="review_wrapper">
        <div class="community_img_wrapper">
          <?php echo do_shortcode('[trustindex no-registration=google]'); ?>
        </div>
      </div>
    </div>
    <a class="primary_btn" href="<?= get_field('view_shop_button_link'); ?>"><?= get_field('view_shop_button_text_'); ?><img src="<?= get_field('view_shop_button_img'); ?>" alt="" class="view-sho-icon"></a>
  </div>

</section>
<section class="section about_nuvedo" style="background-image: url('<?= get_field('about_nuvedo_background'); ?>')">
  <div class="container">
    <div class="about_nuvedo_content">
      <h2 class=""><?= get_field('about_nuvedo_heading'); ?></h2>
      <p class=""> <?= get_field('about_nuvedo_content'); ?> </p>
      <a class="primary_btn" style="align-self:center;"
        href="<?= get_field('about_nuvedo_button_link'); ?>"><?= get_field('mushroom_revolution_btn_text'); ?></a>
    </div>
  </div>
</section>
</section>
<!-- <section class="section partners_logo_section">
  <div class="container">
    <h2 class="section_heading"> Platforms </h2>

    <ul class="partners_logo_wrap">
      <?php
      $i = 0;
      if (have_rows('shop_at')):
        while (have_rows('shop_at')) : the_row(); ?>
        <li class="partners_logo_item">
          <a href="<?= get_sub_field('URL'); ?>"><img src="<?= get_sub_field('image'); ?>" alt=""></a>
        </li>

        <?php $i++;
        endwhile;
      else :
      // no rows found
      endif;
        ?>

    </ul>
  </div>

</section> -->
<section>

  <section class="section">
    <div class="container">
      <h2 class="section_heading new-section-heading">New Arrivals</h2>
      <?php $args = array(
        'post_type' => 'product',
        'posts_per_page' => 8,
        'orderby' => 'date',
        'order' => 'DESC'
      );
      $loop = new WP_Query($args);
      if ($loop->have_posts()) {
        echo '<ul class="products columns-4">';
        while ($loop->have_posts()) : $loop->the_post();
          wc_get_template_part('content', 'newproduct');
        endwhile;
        echo '</ul>';
      }
      wp_reset_postdata();
      ?>
    </div>
  </section>
  <section class="section partners_logo_section">
    <div class="container">
      <h2 class="section_heading new-section-heading">Brand Associations & Partners</h2>
      <ul class="partners_logo_wrap owl-carousel owl-theme">
        <?php
        $i = 0;
        if (have_rows('partners')):
          while (have_rows('partners')) : the_row(); ?>
            <li class="partners_logo_item">
              <img src="<?= get_sub_field('image'); ?>" alt="">

              <span class="partners_logo_item_text">
                <?= get_sub_field('text'); ?>

              </span>
            </li>
        <?php $i++;
          endwhile;
        else :
        // no rows found
        endif;
        ?>
      </ul>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <h2 class="section_heading new-section-heading">Blogs & Articles</h2>
      <div class="home-blog_post_container">
        <?php
        $loop = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => -1));
        if ($loop->have_posts()) : ?>
          <?php
          while ($loop->have_posts()) : $loop->the_post(); ?>
            <div class="new-home_blog_post">
              <div class="blog_image_wrapper">
                <img src="<?= get_the_post_thumbnail_url(); ?>" alt="">
              </div>
              <div class="home_blog_content_wrapper">
                <a href="<?= get_the_permalink(); ?>">
                  <h1><?= the_title(); ?></h1>
                  <!--                       <span><?php echo get_the_date('Y/m/d'); ?></span> -->
                </a>
                <p><?= wp_trim_words(get_the_content(), 40); ?></p>
                <div style="display: flex; flex-direction: column;">
                  <span class="blog-date"><?php echo get_the_date('Y/m/d'); ?></span>
                  <a class="secondary_button" href="<?= get_the_permalink(); ?>">read more</a>
                </div>

              </div>

            </div>
        <?php endwhile;
        endif;
        wp_reset_postdata();
        ?>



      </div>
      <a class="primary_btn" href="https://nuvedo.com/blog/">Show All</a>
    </div>



  </section>


  <section class="section">
    <div class="container">
      <div class="community_wrapper_home">
        <h2 class="section_heading"><?= get_field('community_heading'); ?></h2>
        <div class="community_img_wrapper">
          <?php echo do_shortcode('[instagram-feed showheader=false showfollow=false]'); ?>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="cta_container">
      <div class="cta_wrapper" style="background-color:#254b51">
        <div class="cta_content">
          <h3 class="cta_heading"><?= get_field('cta_heading'); ?></h3>
          <p class="cta_subheading"><?= get_field('cta_subheading'); ?></p>
          <?php echo do_shortcode('[contact-form-7 id="3132" title="CTA form"]'); ?>
        </div>
        <div class="cta_image">
          <img src="<?= get_field('cta_image'); ?>" alt="Subscribe">
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript">
    var overlay = document.getElementById('morph');
    var morphing = anime({
      targets: '.morph',
      d: [{
          value: 'M0,214c0,0,154.2,51.9,274,41c110-10,437-148,680-149c243-1,557,145,692,149s274-41,274-41v80H0V214z'
        },
        {
          value: 'M0,214c0,0,154.2-45.1,274-56c110-10,437,72,680,71c243-1,557-75,692-71s274,56,274,56v80H0V214z'
        },
        {
          value: 'M0,214c0,0,154.2,51.9,274,41c110-10,437-70,680-71c243-1,557,67,692,71s274-41,274-41v80H0V214z'
        },

      ],
      easing: 'easeInOutQuad',
      duration: 10000,
      loop: true,
    });
  </script>
  <script>
    jQuery(document).ready(function($) {
      function loadTabProducts(slug) {
        $('#tab-product-grid').fadeTo(100, 0.3);
        $.post(ajaxurl, {
          action: 'load_tab_products',
          cat_slug: slug
        }, function(response) {
          $('#tab-product-grid').html(response).fadeTo(100, 1);
        });
      }

      $('.category-tab').on('click', function() {
        $('.category-tab').removeClass('active');
        $(this).addClass('active');
        const slug = $(this).data('cat-slug');
        loadTabProducts(slug);
      });
    });
  </script>
  <?php get_footer(); ?>