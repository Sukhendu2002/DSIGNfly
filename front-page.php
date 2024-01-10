<?php
/**
 * The template for displaying the home page.
 *
 * @package Dsignfly
 */

get_header();
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
	</div>

<?php
get_footer();
