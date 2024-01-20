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
		<div class="footer-container">
			<hr style="border: 1px solid #62585f; margin-top: 20px">
			<div class="footer-text">
				<div>
					<p class="headliner-text" style="font-size: 28px;">Welcome to D'SIGN<em>fly</em></p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio doloribus ducimus esse et expedita facere illo illum inventore ipsa ipsam, minus natus neque, quaerat quas quasi repellendus sapiente ullam voluptatum.</p>
					<a href="#">Read More</a>
				</div>
				<div style="width: 100%">
					<p class="headliner-text" style="font-size: 28px;">Contact Us</p>
					<p>Street 21 Planet, A-11, dapibus tristique 123511<br>
						Tel:123 456 7890 Fax:123 456789<br>
						Email: <a href="mailto:contactus@dsignfly.com">contactus@dsignfly.com</a></p>
					<div class="socials">
						<a href=" <?php echo esc_url( get_theme_mod( 'dsignfly_facebook' ) ); ?>"><img src="<?php echo esc_attr( get_template_directory_uri() ); ?>/images/facebook.png" alt="facebook"></a>
						<a href=" <?php echo esc_url( get_theme_mod( 'dsignfly_google_plus' ) ); ?> "><img src="<?php echo esc_attr( get_template_directory_uri() ); ?>/images/g+.png" alt="twitter"></a>
						<a href=" <?php echo esc_url( get_theme_mod( 'dsignfly_linkedin' ) ); ?> "><img src="<?php echo esc_attr( get_template_directory_uri() ); ?>/images/linkedin.png" alt="instagram"></a>
						<a href=" <?php echo esc_url( get_theme_mod( 'dsignfly_pinterest' ) ); ?> "><img src="<?php echo esc_attr( get_template_directory_uri() ); ?>/images/pin.png" alt="pinterest"></a>
						<a href=" <?php echo esc_url( get_theme_mod( 'dsignfly_twitter' ) ); ?> "><img src="<?php echo esc_attr( get_template_directory_uri() ); ?>/images/oldx.png" alt="youtube"></a>
					</div>
				</div>
			</div>
			<hr style="border: 1px solid #62585f;margin-top: 30px">
		</div>
		<div class="site-info">
			<span>
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( '© 2021 - %1$s', 'dsignfly' ), 'D`SIGNfly' );
				?>
			</span>

			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Designed by %1$s.', 'dsignfly' ), '<a href="https://rtcamp.com/">rtCamp</a>' );
				?>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
