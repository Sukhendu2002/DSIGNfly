<?php
/**
 * Widget to show the recent posts.
 *
 * @package dsignfly
 */

/**
 * Recent_Post_Widget widget class.
 *
 * @since 1.0.0
 */
class Recent_Post_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'recent_post_widget',
			'Recent Post Widget',
			array( 'description' => __( 'Show Recent Posts', 'dsignfly' ) )
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
			echo $args['before_title'] . 'Recent Posts' . $args['after_title'];
			echo '<hr>';

			$recent_posts = new WP_Query(
				array(
					'post_type'      => 'post',
					'posts_per_page' => 5,
					'orderby'        => 'date',
					'order'          => 'DESC',
				)
			);

			if ( $recent_posts->have_posts() ) {
				echo '<ul>';

				while ( $recent_posts->have_posts() ) {
					$recent_posts->the_post();
					?>
				<li>
					<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>">
					<div class="recent-post-content">
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
				echo 'No recent posts found.';
			}

			echo $args['after_widget'];
			wp_reset_postdata();
		}
	}
}
