<?php
/*
Template Name: Faq Page Template
*/
?>

<?php get_header(); ?>
<section class="faq_page inner_hero_section" style="background-image: url('<?php the_field('banner'); ?>');">
          <div class="container">
            <div class="inner_hero_content">
              <h1>faq</h1>
              <p>Can’t find answers you are looking for? <br> We shared our most frequently asked question to help you out.</p>
            </div>

          </div>
</section>

<!-- <div class="nuv_nav-tabs">
<a href="" class="nuv_nav">My Tab 1</a>
<a href="" class="nuv_nav">My Tab 2</a>
<a href="" class="nuv_nav">My Tab 3 </a>
</div>

<div class="nuv_tab-content">
 <div class="nuv_info active"> This is TAB1 Lorem ipsum for tab Lorem ipsum for tabLorem ipsum for tabLorem ipsum for tab </div>
 <div class="nuv_info"> Lorem ipsum for tab 2 </div>
<div class="nuv_info"> Lorem ipsum for tab 3 </div>
</div> -->

<section class="faq_section section">
  <div class="container">

  <div class="faq_tab_wrapper">

  <?php if( have_rows('faq') ): ?>
    <?php $i=1; while ( have_rows('faq') ) : the_row(); ?>
        <div class="faq_tab <?php echo ($i==1) ? "current" : ""; ?>" id="<?php echo"faq_tab_".$i; ?> " style="background:<?php the_sub_field('tile_color'); ?>;">
          <?php the_sub_field('faq_title'); ?>
        </div>
    <?php $i++; endwhile; ?>
  <?php else : ?>
  <?php endif; ?>
</div>

  <?php if( have_rows('faq') ): ?>
    <?php $i=1; while ( have_rows('faq') ) : the_row();  ?>
      <?php if( have_rows('faq_q_n_a') ): ?>
        <div class="faq_questions_wrapper <?php echo"faq_tab_".$i; ?> <?php echo ($i==1) ? "Faq_active" : ""; ?>">
        <?php $j=1; while( have_rows('faq_q_n_a') ): the_row(); ?>
            <div class="faq_question_answer">
              <h2 class="faq_question <?php echo ($j==1) ? "Faq_active" : ""; ?>"  id="<?php echo"faq_question_".$i."_".$j; ?>"><?php the_sub_field('question'); ?></h2>
              <div class="editable_text_container  faq_answer <?php echo"faq_question_".$i."_".$j; ?> <?php echo ($j==1) ? "Faq_active" : ""; ?>">
                <?php the_sub_field('answer'); ?>
              </div>
            </div>
        <?php $j++; endwhile; ?>
      </div>
      <?php endif; ?>
    <?php $i++; endwhile; ?>
  <?php else : ?>
  <?php endif; ?>

</div>

</section>

<?php get_footer(); ?>
