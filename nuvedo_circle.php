<?php
/*
Template Name: Nuvedo Circle Page Template
*/
?>

<?php get_header(); ?>
<section class="blog_single_page nuvedo_circle_page hero_section" style="background-image: url('<?php the_field('banner'); ?>');">
          <div class="container">
            <div class="inner_hero_content">
              <h2><?= the_title(); ?></h2>
            </div>

          </div>
</section>
<?php
$field = get_field_object('theme');
$value = $field['value'];
?>
<section class="<?= $value?> section">
  <div class="container-narrow">
    <div class="editable_text_container">
       <p><?= the_field('objective'); ?></p>
    </div>

  </div>

</section>
<section class="section">
  <div class="container">
  <h2>Gallery</h2>
<!-- <?php echo do_shortcode('[Best_Wordpress_Gallery id="5" gal_title="Events"]'); ?> -->
<div class="owl-carousel owl-theme gallery_slider">
  <?php
  $i=0;
  if( have_rows('gallery_slider') ):
    while ( have_rows('gallery_slider') ) : the_row(); ?>
    <!-- <li id="pager_indicator<?= $i ?>" class="pager_indicator <?=($i==0) ? "active":""; ?>"></li> -->
    <div class="item">
      <div class="gallery_slider_item_wrap">
        <img src="<?= get_sub_field('slider_image'); ?>" alt="">
        <div class="gallery_slider_item_content">
          <?= get_sub_field('slider_content'); ?>

        </div>
      </div>

    </div>
    <?php $i++;
  endwhile;
  else :
    // no rows found
  endif;
  ?>

</div>

  </div>
</section>

<section>
  <div class="container-narrow">
    <div class="editable_text_container dark">
      <p><?= the_field('content'); ?></p>
    </div>
  </div>
</section>
<section class="workshop_section">
  <div class="container">
    <h2 class="section_heading"> Workshops</h2>

    <div class="home_workshops_items_wrapper">
  <?php
     $loop = new WP_Query( array( 'post_type' => 'workshop', 'post_status' => 'publish',) );
     if ( $loop->have_posts() ) :?>
     <?php
         while ( $loop->have_posts() ) : $loop->the_post(); ?>
         <div class="home_workshops_item">
           <div class="home_workshops_item_img">
             <img src="<?= get_the_post_thumbnail_url(); ?>" alt="">

           </div>
           <div class="home_workshops_item_details">
             <h3><?= get_the_title();?></h3>
             <p> <?= get_the_content() ?></p>
		      <a href="<?= get_field('apply_link'); ?>" class="workshops_btn primary_btn" target="_blank">Apply</a>

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
