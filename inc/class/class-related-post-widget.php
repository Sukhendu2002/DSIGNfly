<?php
/**
 * Widget to show the popular posts.
 *
 * @package dsignfly
 */

/**
 * Related_Post_Widget widget class.
 *
 * @since 1.0.0
 */
class Related_Post_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'related_post_widget',
			'Related Post Widget',
			array( 'description' => __( 'Show Related Posts', 'dsignfly' ) )
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from the database.
	 */
	public function widget( $args, $instance ) {
		if ( is_single() ) {
			echo $args['before_widget'];
			echo $args['before_title'] . 'Related Posts' . $args['after_title'];
			echo '<hr>';

			// Get the current post categories.
			$current_categories = get_the_category();
			$category_ids       = array();
			foreach ( $current_categories as $category ) {
				$category_ids[] = $category->term_id;
			}

			// Query for related posts based on categories.
			$related_posts = new WP_Query(
				array(
					'post_type'      => 'post',
					'posts_per_page' => 5,
					'category__in'   => $category_ids,
					'post__not_in'   => array( get_the_ID() ),
					'orderby'        => 'rand',
				)
			);

			if ( $related_posts->have_posts() ) {
				echo '<ul>';

				while ( $related_posts->have_posts() ) {
					$related_posts->the_post();
					?>
					<li>
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>">
						<div class="related-post-content">
							<a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
							<span>
								by <span><?php echo get_the_author(); ?></span> on <?php echo get_the_date(); ?>
							</span>
						</div>
					</li>
					<?php
				}

				echo '</ul>';
			} else {
				echo 'No related posts found.';
			}

			echo $args['after_widget'];
			wp_reset_postdata();
		}
	}
}
