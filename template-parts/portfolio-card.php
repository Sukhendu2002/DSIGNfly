<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dsignfly
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="portfolio-card">
		<div class="portfolio-card-image">
			<a href="<?php the_post_thumbnail_url(); ?>" data-lightbox="portfolio-images" data-title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail(); ?>
				<div class="overlay">
					<span class="dashicons dashicons-admin-links"></span>
					<p>View Image</p>
				</div>
			</a>
		</div>
	</div>
</div><!-- #post-<?php the_ID(); ?> -->