<?php
/**
 * Template file for displaying the blog posts
 *
 * @package Dsignfly
 */
get_header();
get_template_part( 'template-parts/features' );
?>
	<main id="primary" class="site-main">
		<div class="content">
		<div class="content-header">
			<h1>LET'S BLOG</h1>
			<hr>
		</div>
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'card' );
			endwhile;
			the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>
		<div class="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</main><!-- #main -->

<?php
get_footer();
