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
	<div class="card-info">
		<div class="card-date">
			<div class="card-day">
				<?php echo get_the_date( 'd' ); ?>
			</div>
			<div class="card-month">
				<?php echo get_the_date( 'M' ); ?>
			</div>
		</div>
		<div class="card-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</div>
	</div>
	<div class="card-main">
		<div class="card-img">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'medium' ); ?>
			</a>

		</div>
		<div class="card-content">
			<div class="card-title">
				<span>by
					<a
						href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
						<?php the_author(); ?>
					</a>
					on <?php the_time( 'F j, Y' ); ?>
				</span>
				<span>
					<a href="<?php the_permalink(); ?>">
					<?php
					comments_number(
						__( 'No Comments' ),
						__( '1 Comment' ),
						__( '% Comments' )
					);
					?>
					</a>
				</span>
			</div>
				<hr>
			<div class="card-excerpt">
				<?php the_excerpt(); ?>
			</div>
			<div class="card-read-more">
				<a href="<?php the_permalink(); ?>">READ MORE</a>
			</div>
		</div>
	</div>
</div><!-- #post-<?php the_ID(); ?> -->
