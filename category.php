<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package Dsignfly
 */

get_header();

?>


	<main id="primary" class="site-main">
		<div class="content">
			<?php if ( have_posts() ) : ?>
				<div class="category-title">
					<h1>CATEGORY: <?php single_cat_title(); ?></h1>
				</div>
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<?php get_template_part( 'template-parts/content', 'card' ); ?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?> 
		</div>
		<div class="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</main><!-- #main -->
<?php
get_footer();
