<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dsignfly
 */

?>

	<footer id="colophon" class="site-footer">

		<hr>
		<div class="site-info">
			<span>
				<?php
				printf( esc_html__( '© 2021 - %1$s', 'dsignfly' ), 'D`SIGNfly' );
				?>
			</span>

			<span class="sep"> | </span>
				<?php

				printf( esc_html__( 'Designed by %1$s.', 'dsignfly' ), '<a href="https://rtcamp.com/">rtCamp</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
