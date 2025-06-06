<?php
/*
Template Name: About Page Template
*/
?>

<?php get_header(); ?>
<section class="inner_hero_section aboutPage" style="background-image: url('<?php the_field('banner'); ?>');" >
  <div class="container">
    <div class="about_banner_wrapper">
      <div class="about_banner_image">
        <img src="<?php the_field('banner_image'); ?>" alt="">
      </div>
      <div class="about_banner_decText">
        <img src="https://nuvedo.com/wp-content/uploads/2021/05/Artboard-1-copy-1.png" alt="">
      </div>
    </div>

  </div>

</section>



<section class=" section mission_and_vission" style="background-image: url('<?php the_field('about_mission_vision'); ?>');">
    <div class="mission_container">
      <div class="container">
        <div class="about_mission">
          <h2>Mission</h2>
          <p><?php the_field('about_mission'); ?></p>

        </div>
        <div class="about_mission">
          <h2>Vision</h2>
          <p><?php the_field('about_vision'); ?></p>

        </div>
      </div>
    </div>
  </div>
</section>

<section class="section navedo_about_story">
  <div class="container">
    <div class="about_story_wrapper">
      <div class="how_did_we_start">
        <?php the_field('about_story'); ?>
      </div>
      <div class="about_story_quote">
        <?php the_field('about_story_quote'); ?>
      </div>
      <div class="about_story_sub_quote">
        <?php the_field('about_story_sub_quote'); ?>
      </div>
    </div>

    <div class="our_values_ethos_wrapper">
           <h2 class="section_heading">Our Values and Ethos</h2>

      <?php
        if( have_rows('values_and_ethos') ):
          while ( have_rows('values_and_ethos') ) : the_row(); ?>
          <div class="our_ethos">
            <div class="ethos_title">
              <img class="swirl_pointer" src="https://nuvedo.com/wp-content/uploads/2021/04/swirl_pointer.svg" alt="">
              <h2><?= get_sub_field('ethos_title'); ?></h2>
            </div>
            <p><?= get_sub_field('ethos_content'); ?> </p>
          </div>
      <?php endwhile;
        else :
          // no rows found
        endif;
      ?>
    </div>

    <div class="about_team">
      <h2><?php the_field('team_heading'); ?></h2>
      <p><?php the_field('team_description'); ?></p>
    </div>

    <div class="team_members_wrapper">
      <?php
        if( have_rows('team_members') ):
          while ( have_rows('team_members') ) : the_row(); ?>
          <div class="team_member">
              <div class="team_top_wrapper">
              <?php if( get_sub_field('linkedin') ): ?>
						    	<a href="<?php the_sub_field('linkedin'); ?>"><img src="https://nuvedo.com/wp-content/uploads/2022/08/13880855881556105710-1.svg" alt=""> </a>
					     <?php endif; ?>	
                <div class="member_designation"><?= get_sub_field('designation'); ?></div>
                <img class="team_pic" src="<?= get_sub_field('member_image'); ?>" alt="">
                <img class="team_blob" src="https://nuvedo.com/wp-content/uploads/2021/04/team_blob.svg" alt="">
                <div class="team_member_name">
                    <div class="first_name">
                      <!-- <div class="first_name_stroke"><?= get_sub_field('first_name'); ?></div> -->
                      <div class="first_name_stroke"><?= get_sub_field('first_name'); ?></div>
                      <div class="first_name_text"><?= get_sub_field('first_name'); ?></div>
                    </div>
                    <div class="last_name"><?= get_sub_field('last_name'); ?></div>
                </div>

               </div>
               <p><?= get_sub_field('team_content'); ?></p>

           </div>
      <?php endwhile;
        else :
          // no rows found
        endif;
      ?>
    </div>


  </div>
  <img id="abtMush_right" src="https://nuvedo.com/wp-content/uploads/2021/04/about_d_mush_right-01.svg" alt="">
  <img id="abtMush_left" src="https://nuvedo.com/wp-content/uploads/2021/04/about_d_mush_left-02.svg" alt="">

</section>

<section class="cta_section">
  <div class="cta_container" style="background-image: url('<?php the_field('cta_image'); ?>');">
    <div class="cta_wrapper" style="background-color:#254b51">
      <div class="cta_content">
        <h3 class="cta_heading"><?= get_field('cta_heading'); ?></h3>
        <p class="cta_subheading"><?= get_field('cta_text'); ?></p>
        <a class="primary_btn" href="https://nuvedo.com/my-account/"><?= get_field('cta_button_text'); ?></a>

      </div>
      <div class="cta_image">
        <img src="<?= get_field('cta_image'); ?>" alt="">
      </div>

    </div>

  </div>
</section>
<script type="text/javascript">
var navedo_about_story = document.querySelector('.navedo_about_story');
var origTopCoordinateImg = navedo_about_story.offsetTop;

$(window).scroll(function(){
  if ($(window).scrollTop()+150 >= origTopCoordinateImg) {
    $("#abtMush_right, #abtMush_left").addClass('fixed');
  } else {
    $("#abtMush_right, #abtMush_left").removeClass('fixed');
  }

});

</script>





<?php get_footer(); ?>
