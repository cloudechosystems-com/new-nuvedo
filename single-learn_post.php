<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dravalife
 */
get_header();
?>
	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();?>

			<section class="blog_single_page" style="background-image: url('<?php the_field('banner'); ?>');">
			          <div class="container-narrow">
			            <div class="inner_hero_content">
			              <h1><?= the_title(); ?></h1>
										<div class="author"><?php the_field('author_name'); ?></div>
			            </div>

			          </div>
			</section>

			<section>
				<div class="container-narrow">
				 <div class="blog_content scr_rvl">
						 <div class="editable_text_container">
								<p><?= the_content(); ?></p>
						 </div>
					</div>
				</div>
			</section>
			
		<?php
		endwhile; // End of the loop.
		?>
	</main><!-- #main -->
<?php
get_sidebar();
get_footer();
