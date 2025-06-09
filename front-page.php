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
                <?php while (have_rows('bann_images')) : the_row(); ?>
                    <div class="item">
                        <div class="hero_image">
                            <img src="<?php echo esc_url(get_sub_field('images')); ?>" alt="Banner Image">
                        </div>
                        <div class="home_banner_details">
                            <h2><?= get_sub_field('banner_heading'); ?></h2>
                            <h3><?= get_sub_field('banner_sub_heading'); ?></h3>
                            <div class="banner_btn_wrap">
                                <a class="banner_btn scr_rvl_txt" href="<?= get_sub_field('banner_category_link'); ?>">Shop Now</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>
</div>

<section class="section icon_breif_section ">
<div class="category-tabs">
  <?php
  $all_top_level_cats = get_terms([
    'taxonomy' => 'product_cat',
    'parent' => 0,
    'hide_empty' => true,
  ]);

  foreach ($all_top_level_cats as $cat) {
    echo '<button class="category-tab" data-cat-slug="' . esc_attr($cat->slug) . '">' . esc_html($cat->name) . '</button>';
  }
  ?>
</div>

<div class="tab-product-container">
  <div class="products-grid" id="tab-product-grid">
    <p>Loading products...</p> <!-- default loading message -->
  </div>
</div>

<div id="product-carousel"></div>

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
        if( have_rows('nuvedo_features') ):
          while ( have_rows('nuvedo_features') ) : the_row(); ?>
      		<div class="icon_breif scr_rvl">
				<div class="second_content_wrapper">
					<img class="" src="<?= get_sub_field('icon'); ?>" alt="">
					<div class="icon_breif_content scr_rvl">
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

<section class="homepage_product_section">
  <div class="container">
    <div class="home_product_wrapper">
      <div class="home_product_row1 home_product_row">
        <div class="section_heading_wrapper home_product_row_left scr_rvl">
          <h2 class="section_heading">Let us help you in your mushroom journey.</h2>
        </div>
        <div class="home_product_item home_product_row_right scr_rvl" style="background:<?= get_field('background_color_1'); ?>">
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
            <a class="secondary_button scr_rvl_txt" href="<?php echo get_field('product_link'); ?>">Shop now</a>

          </div>
        </div>

      </div>
      <div class="home_product_row2 home_product_row">
        <div class="home_product_item home_product_row_left scr_rvl" style="background:<?= get_field('background_color_2'); ?>">
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
            <a class="secondary_button scr_rvl_txt" href="<?php echo get_field('product_link_2'); ?>">Shop now</a>

          </div>
        </div>
        <div class="home_product_item home_product_row_right scr_rvl" style="background:<?= get_field('background_color_3'); ?>">
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
            <a class="secondary_button scr_rvl_txt" href="<?php echo get_field('product_link_3'); ?>">Shop now</a>

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
<section class="section about_nuvedo" style="background-image: url('<?= get_field('about_nuvedo_background'); ?>')">
  <div class="container">
    <div class="about_nuvedo_content">
      <h2 class=""><?= get_field('about_nuvedo_heading'); ?></h2>
      <p class=""> <?= get_field('about_nuvedo_content'); ?> </p>
      <a class="primary_btn scr_rvl_txt" style="align-self:center;"
        href="<?= get_field('about_nuvedo_button_link'); ?>"><?= get_field('about_nuvedo_button_text'); ?></a>
    </div>
  </div>
</section>
<section class="section">
  <div class="container">
    <div class="community_wrapper">
      <h2 class="section_heading heading_community_wrapper"><?= get_field('google_review_heading'); ?></h2>
		<div class="review_wrapper">
			<section class="section testimonial_section">
				<div class="testimonial owl-carousel owl-theme">
					<?php
					$loop = new WP_Query(array('post_type' => 'testimonial', 'post_status' => 'publish',));
					if ($loop->have_posts()) :
					while ($loop->have_posts()) : $loop->the_post(); ?>
					<div class=" testimonial-item">
						<div class="testimonial-card">
							<div class="testimonial-content">
								<div class="website-logo">
									<img src="https://nuvedo.com/wp-content/uploads/2021/03/siteicon.png" alt="Website Logo">
								</div>
								<div class="ReviewComment">
									<div class="reviewSmall"><?= get_field('content'); ?></div>
									<div class="reviewExpanded"><?= get_field('content'); ?></div>
									<button class="ReviewComment-showMore"><span>Show More</span><i class="fas fa-angle-down"></i></button>
								</div>
							</div>
						</div>
						<p><?php echo $reviewer_name; ?></p>
                     	<p><?php echo $review_date; ?></p>
					</div>
					 
					<?php endwhile;
					endif;
					wp_reset_postdata();
					?>
				</div>
		</section>
		<div class="community_img_wrapper">
			<?php echo do_shortcode('[trustindex no-registration=google]'); ?>
		</div>
		</div>
	  </div>
  </div>
</section>

<section class="section newsandfeatures ">
  <div class="container">
    <h2 class="section_heading">News And Features</h2>
    <div class="nf_wrapper">
		<?php
        if( have_rows('news_card') ):
          while ( have_rows('news_card') ) : the_row(); ?>
     	<div class="news_card">
			<a href="<?= get_sub_field('news-readmore'); ?>" class="read_more" target="_blank">
			   <div class="news_card_img"><img src="<?= get_sub_field('news-image'); ?>" alt=""></div>
			   <div class="news_card_content">
				  <h3><?php echo implode(' ', array_slice(explode(' ', get_sub_field('news-title')), 0, 9)); ?></h3>
				  <p><?php echo implode(' ', array_slice(explode(' ', get_sub_field('news-dis')), 0, 20)); ?></p>
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
<section class="section scr_rvl">
  <div class="container">
    <div class="community_wrapper_home">
      <h2 class="section_heading"><?= get_field('community_heading'); ?></h2>
      <div class="community_img_wrapper">
        <?php echo do_shortcode('[instagram-feed showheader=false showfollow=false]'); ?>
      </div>
    </div>
  </div>
</section>

<section class="section our_story " style="background-image: url('https://nuvedo.com/wp-content/uploads/2023/10/our-story-bg.jpg')">
  <div class="container">
    <div class="our_story_content">
      <h2 class="scr_rvl"><?= get_field('story_nuvedo_heading'); ?></h2>
      <h3 class="scr_rvl"><?= get_field('story_nuvedo_subheading'); ?></h3>
      <p class="scr_rvl"> <?= get_field('story_nuvedo_content'); ?> </p>
      <a class="primary_btn scr_rvl_txt" href="<?= get_field('about_nuvedo_button_link'); ?>"><?= get_field('about_nuvedo_button_text'); ?></a>
    </div>
  </div>
</section>

<section class="section partners_logo_section">
  <div class="container">
    <h2 class="section_heading"> Brand Association</h2>
    <ul class="partners_logo_wrap">
      <?php
      $i=0;
      if( have_rows('partners') ):
        while ( have_rows('partners') ) : the_row(); ?>
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
<!-- <section class="section partners_logo_section">
  <div class="container">
    <h2 class="section_heading"> Platforms </h2>

    <ul class="partners_logo_wrap">
      <?php
      $i=0;
      if( have_rows('shop_at') ):
        while ( have_rows('shop_at') ) : the_row(); ?>
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
    $('#tab-product-grid').html('<p>Loading products...</p>');

    $.post(ajaxurl, {
      action: 'load_tab_products',
      cat_slug: slug
    }, function(response) {
      $('#tab-product-grid').html(response);
    });
  }

  // Initial load for first category
  const firstTab = $('.category-tab').first();
  if (firstTab.length) {
    firstTab.addClass('active');
    loadTabProducts(firstTab.data('cat-slug'));
  }

  // On tab click
  $('.category-tab').on('click', function() {
    $('.category-tab').removeClass('active');
    $(this).addClass('active');
    const slug = $(this).data('cat-slug');
    loadTabProducts(slug);
  });
});
</script>



<?php get_footer(); ?>
