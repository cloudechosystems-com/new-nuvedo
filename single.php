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
										<div class="author"><?php the_field('author_name'); ?><br><span><?php echo get_the_date( 'Y/m/d' ); ?></span></div>
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
			<section class="section about_author_section">
				<div class="container">
					<h2 class="section_heading">About the author</h2>
					<div class="author"><?php the_field('author_name'); ?></div>
					<div><?php the_field('about_the_author'); ?></div>
					<div class="author-social">
						<?php if( get_field('facebook') ): ?>
							<a href="<?php the_field('facebook'); ?>"><img src="https://nuvedo.com/wp-content/uploads/2022/08/10502791911556105704-1.svg" alt=""> </a>
						<?php endif; ?>
						<?php if( get_field('instagram') ): ?>
							<a href="<?php the_field('instagram'); ?>"><img src="https://nuvedo.com/wp-content/uploads/2022/08/9920775951556105709-1.svg" alt=""> </a>
						<?php endif; ?>
						<?php if( get_field('linkedin') ): ?>
							<a href="<?php the_field('linkedin'); ?>"><img src="https://nuvedo.com/wp-content/uploads/2022/08/13880855881556105710-1.svg" alt=""> </a>
						<?php endif; ?>					
					</div>


				</div>
			</section>
			</section>
			<div class="section">
				<div class="container">
				<?php 
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
				</div>
			</div>
			<?php
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'dravalife' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'dravalife' ) . '</span> <span class="nav-title">%title</span>',
				)
			); ?>
		<?php
		endwhile; // End of the loop.
		?>
	</main><!-- #main -->
<?php
get_sidebar();
get_footer();
