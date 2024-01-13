<?php
/**
 * Widget to show the popular posts.
 *
 * @package dsignfly
 */

/**
 * Portfolio_Widget widget class.
 *
 * @since 1.0.0
 */
class Portfolio_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'portfolio_widget',
			'Portfolio Widget',
			array( 'description' => __( 'A Portfolio Widget', 'dsignfly' ) )
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
		echo $args['before_title'] . 'Portfolio' . $args['after_title'];
		echo '<hr>';

		$portfolio_query = new WP_Query(
			array(
				'post_type'      => 'portfolio',
				'posts_per_page' => 8,
			)
		);

		if ( $portfolio_query->have_posts() ) {
			echo '<ul>';

			while ( $portfolio_query->have_posts() ) {
				$portfolio_query->the_post();

				if ( has_post_thumbnail() ) {
					echo '<li>';
					the_post_thumbnail();
					echo '</li>';
				}
			}

			echo '</ul>';
		} else {
			echo 'No portfolio items found.';
		}

		echo $args['after_widget'];

		wp_reset_postdata();
	}
}
