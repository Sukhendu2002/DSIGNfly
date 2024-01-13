<?php
/**
 * Widget to show the monthly archives.
 *
 * @package dsignfly
 */

/**
 * Archive_Widget widget class.
 *
 * @since 1.0.0
 */
class Archive_Widget extends WP_Widget {
	/**
	 * Register Archive_Widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'archive_widget',
			'Archive Widget',
			array( 'description' => __( 'Show Monthly Archives', 'dsignfly' ) )
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
		echo $args['before_widget'];
		echo $args['before_title'] . 'Archives' . $args['after_title'];
		echo '<hr>';

		$archives = wp_get_archives(
			array(
				'type'            => 'monthly',
				'format'          => 'html',
				'show_post_count' => true,
				'before'          => '>  ',
			)
		);

		if ( $archives ) {
			echo '<ul>' . $archives . '</ul>';
		} else {
			// echo 'No archives found.';
		}

		echo $args['after_widget'];
	}
}
