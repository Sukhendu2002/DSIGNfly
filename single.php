<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dsignfly
 */

get_header();
get_template_part( 'template-parts/features' );
?>

	<main id="primary" class="site-main">
		<div class="content">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
			// If comments are open, or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		</div>
		<div class="sidebar">
			<?php get_sidebar(); ?>
		</div>

	</main><!-- #main -->

<?php
get_footer();
