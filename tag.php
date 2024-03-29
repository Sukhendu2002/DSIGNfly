<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package Dsignfly
 */

get_header();
get_template_part( 'template-parts/features' );
?>


	<main id="primary" class="site-main">
		<div class="content">
			<?php if ( have_posts() ) : ?>
				<div class="category-title">
					<h1>Tag: <?php single_cat_title(); ?></h1>
				</div>
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<?php get_template_part( 'template-parts/content', 'card' ); ?>
				<?php endwhile; ?>
				<div class="pagination">
					<?php
					echo paginate_links(
						array(
							'next_text' => '<img src="' . get_template_directory_uri() . '/images/pagination-arrow.png" alt="arrow-right" />',
							'prev_text' => '<img
                          style="transform: rotate(180deg);"
                         src="' . get_template_directory_uri() . '/images/pagination-arrow.png" alt="arrow-left" />',
						)
					);
					?>
				</div>
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
