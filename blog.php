<?php
/*
Template Name: Blog Page Template
*/
?>
<?php get_header(); ?>
<section class="blogpage" style="background-image: url('<?php the_field('banner'); ?>');">
          <div class="container">
            <div class="inner_blog_content">
              <h3><?= get_field('top_title'); ?></h3>
              <h1><?= get_field('big_white_title'); ?></h1>
              <p><?= get_field('content'); ?></p>

            </div>

          </div>
</section>
<section class="section blog_post_section">
  <div class="container">
    <div class="blog_post_container">
      <?php
       $loop = new WP_Query( array( 'post_type' => 'post', 'post_status' => 'publish','posts_per_page' => -1) );
       if ( $loop->have_posts() ) :?>
       <?php
           while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <div class="blog_post">
                  <div class="blog_image_wrapper">
                    <img src="<?= get_the_post_thumbnail_url(); ?>" alt="">
                  </div>
                  <div class="blog_content_wrapper">
                    <a href="<?= get_the_permalink(); ?>">
                      <h1><?= the_title(); ?></h1>
<!--                       <span><?php echo get_the_date( 'Y/m/d' ); ?></span> -->
                    </a>
                    <p><?= wp_trim_words(get_the_content(),40); ?></p>
					  <div style="display: flex; flex-direction: column;">
						<span style="color:#000; font-weight: bold; font-size: 18px; position: absolute; bottom: 0;"><?php echo get_the_date( 'Y/m/d' ); ?></span>
                    <a class="secondary_button" href="<?= get_the_permalink(); ?>">read more</a>
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
