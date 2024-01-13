<?php
/**
 * The template for displaying Date/Month/Year archive page
 *
 * @package Dsignfly
 */

get_header();

?>


	<main id="primary" class="site-main">
		<div class="content">
			<?php if ( have_posts() ) : ?>
				<div class="category-title">
					<h1>
						<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'dsignfly' ), get_the_date() );
						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'dsignfly' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'dsignfly' ) ) );
						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'dsignfly' ), get_the_date( _x( 'Y', 'yearly archives date format', 'dsignfly' ) ) );
						else :
							_e( 'Archives', 'dsignfly' );
						endif;
						?>
					</h1>
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
