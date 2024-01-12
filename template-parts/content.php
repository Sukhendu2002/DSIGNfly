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
	<div class="post-info">

		<div class="post-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</div>
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
	</div>
	<div class="post-main">
		<div class="post-content">
			<?php the_content(); ?>
		</div>
		<div class="post-tags">
			<?php the_tags( 'TAGS: ', ', ', '<br />' ); ?>
		</div>
		<hr>
	</div>
</div><!-- #post-<?php the_ID(); ?> -->
