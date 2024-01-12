<?php
/**
 * The template for displaying all the portfolio
 *
 * @package Dsignfly
 */

get_header();
get_template_part( 'template-parts/features' );
$args      = array(
	'post_type'      => 'portfolio',
	'posts_per_page' => 15,
	'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
);
$the_query = new WP_Query( $args );
?>

	<main id="primary" class="portfolio-main">
		<div class="page-title">
			<h1>DESIGN IS THE SOUL</h1>
			<div class="portfolio-filter">
				<span>Advertising</span>
				<span>Multimedia</span>
				<span>Photography</span>
			</div>
		</div>
		<hr>
		<div class="portfolio-content">
			<?php
			if ( $the_query->have_posts() ) :
				while ( $the_query->have_posts() ) :
					$the_query->the_post();
					get_template_part( 'template-parts/portfolio', 'card' );
				endwhile;

			endif;
			?>
		</div>
		<div class="portfolio-pagination">
			<?php
			$total_pages = $the_query->max_num_pages;

			if ( $total_pages > 1 ) {

				$current_page = max( 1, get_query_var( 'paged' ) );

				echo paginate_links(
					array(
						'base'      => get_pagenum_link( 1 ) . '%_%',
						'format'    => '/page/%#%',
						'current'   => $current_page,
						'total'     => $total_pages,
						'next_text' => '<img src="' . get_template_directory_uri() . '/images/pagination-arrow.png" alt="arrow-right" />',
						'prev_text' => '<img
                          style="transform: rotate(180deg);"
                         src="' . get_template_directory_uri() . '/images/pagination-arrow.png" alt="arrow-left" />',
					)
				);
			}
			?>

		</div>
	</main><!-- #main -->

<?php
wp_reset_postdata();
get_footer();
