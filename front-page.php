<?php
/**
 * The template for displaying the home page.
 *
 * @package Dsignfly
 */

get_header();
$args      = array(
	'post_type'      => 'portfolio',
	'posts_per_page' => 6,
);
$the_query = new WP_Query( $args );
?>

	<div class="main-content">
		<div class="slider">
			<div class="slider-text"><p>Gearing up the ideas</p></div>
			<div class="slider-arrow1">
				<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-right.png" alt="arrow">
			</div>
			<div class="slider-arrow2">
				<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-left.png" alt="arrow">
			</div>
			<div class="slider-text2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium eaque et iusto natus nostrum omnis quia quo.</div>
		</div>
		<?php get_template_part( 'template-parts/features' ); ?>
		<main id="primary" class="portfolio-main">
			<div class="page-title">
				<h1>DESIGN IS THE SOUL</h1>
				<div class="portfolio-filter">
					<span><a href="/portfolio">View All</a></span>
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
		</main><!-- #main -->
	</div>

<?php
wp_reset_postdata();
get_footer();
