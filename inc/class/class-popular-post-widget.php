<?php
/**
 * Widget to show the popular posts.
 *
 * @package dsignfly
 */

/**
 * Popular_Post_Widget widget class.
 *
 * @since 1.0.0
 */
class Popular_Post_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'popular_post_widget',
			'Popular Post Widget',
			array( 'description' => __( 'Show Popular Post', 'dsignfly' ) )
		);
	}
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		echo $args['before_title'] . 'Popular Posts' . $args['after_title'];
		echo '<hr>';

		$popular_posts = new WP_Query(
			array(
				'post_type'      => 'post',
				'posts_per_page' => 5,
				'orderby'        => 'comment_count',
				'order'          => 'DESC',
			)
		);

		if ( $popular_posts->have_posts() ) {
			echo '<ul>';

			while ( $popular_posts->have_posts() ) {
				$popular_posts->the_post();
				?>
				<li>
					<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>">
				<div class="popular-post-content">
					<a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
					<span>
                        by <span><?php echo get_the_author(); ?></span> on <?php echo get_the_date(); ?>
					</span>
				</div>
				<?php
			}

			echo '</ul>';
		} else {
			echo 'No popular posts found.';
		}

		echo $args['after_widget'];

		wp_reset_postdata();
	}
}
