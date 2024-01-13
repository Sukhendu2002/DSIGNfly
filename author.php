<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package Dsignfly
 */

get_header();

?>


	<main id="primary" class="site-main">
		<div class="content">
			<?php
				$current_author     = $wp_query->get_queried_object();
				$author_id          = $current_author->ID;
				$author_name        = $current_author->display_name;
				$author_description = $current_author->description;
				// query posts by author.
				$args         = array(
					'author'         => $author_id,
					'post_type'      => 'post',
					'posts_per_page' => -1,
					'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
				);
				$author_posts = new WP_Query( $args );

				if ( $current_author ) {
					echo '<div class="author-info">';
					echo '<div class="author-avatar">' . get_avatar( $author_id, 150 ) . '</div>';
					echo '<div class="author-name">' . $author_name . '</div>';
					echo '<div class="author-description">' . $author_description . '</div>';
					echo '</div>';
				}

				if ( $author_posts->have_posts() ) :
					while ( $author_posts->have_posts() ) :
						$author_posts->the_post();
						get_template_part( 'template-parts/content', 'card' );
					endwhile;
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			wp_reset_postdata();

			?>
		</div>
		<div class="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</main><!-- #main -->
<?php
get_footer();
