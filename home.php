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
			?>
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
			<?php

		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

<!--            //add pagination-->

		</div>
		<div class="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</main><!-- #main -->

<?php
get_footer();
