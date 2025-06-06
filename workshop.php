<?php
/*
Template Name: Workshop Page
*/
?>
<?php get_header(); ?>
<section class="workshop" style="background-image: url('<?php the_field('banner'); ?>');">
          <div class="container">
            <div class="inner_workshop_content">
              <h3><?= get_field('top_title'); ?></h3>
            </div>

          </div>
</section>
<section class="section blog_post_section">
  <div class="container">
    <div class="blog_post_container">
      <?php
       $loop = new WP_Query( array( 'post_type' => 'workshop', 'post_status' => 'publish','posts_per_page' => -1) );
       if ( $loop->have_posts() ) :?>
       <?php
           while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <div class="blog_post scr_rvl">
                  <div class="blog_image_wrapper">
                    <img src="<?= get_the_post_thumbnail_url(); ?>" alt="">
                  </div>
                  <div class="blog_content_wrapper">
                      <h1><?= the_title(); ?></h1>
                    <p><?= wp_trim_words(get_the_content(),40); ?></p>
					  <div style="display: flex; flex-direction: column;">
                    <a class="secondary_button" href="<?= get_field('apply_link'); ?>">Apply Now</a>
					  </div>

                  </div>

                </div>
           <?php endwhile;
       endif;
       wp_reset_postdata();
    ?>



    </div>

  </div>



</section>
<?php get_footer(); ?>
