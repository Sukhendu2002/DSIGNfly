<?php
/**
 * Custom comment walker for this theme.
 *
 * @package Dsignfly
 */

if ( ! function_exists( 'better_commets' ) ) :
	/**
	 * Template for comments    .
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @since 1.0.0
	 * @param object $comment Comment to display.
	 * @param array  $args    An array of arguments.
	 * @param int    $depth   Depth of comment.
	 */
	function better_commets( $comment, $args, $depth ) {
		?>

		<div class="comment">
		<div class="comment-header">
			<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
				<path d="M18 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3.546l3.2 3.659a1 1 0 0 0 1.506 0L13.454 14H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-8 10H5a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Zm5-4H5a1 1 0 0 1 0-2h10a1 1 0 1 1 0 2Z"/>
			</svg>
		<span class="comment-data">
			<div class="comment-author">

				<span class="comment-name"><?php echo get_comment_author_link(); ?></span>
				said on
				<span class="comment-date"><?php echo get_comment_date(); ?></span>
				at
				<span class="comment-time"><?php echo get_comment_time(); ?></span>

			</div>
			<div class="comment-content">
				<div class="comment-text">
					<?php comment_text(); ?>
				</div>

			</div>
		</span>
		</div>
		<div class="comment-reply">
			<div class="reply-icon">
			<svg  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.5 4.046H9V2.119c0-.921-.9-1.446-1.524-.894l-5.108 4.49a1.2 1.2 0 0 0 0 1.739l5.108 4.49C8.1 12.5 9 11.971 9 11.051V9.123h2a3.023 3.023 0 0 1 3 3.046V15a5.593 5.593 0 0 0-1.5-10.954Z"/>
			</svg>
			</div>
			<?php
			comment_reply_link(
				array_merge(
					$args,
					array(
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
					)
				)
			);
			?>
		</div>

		<?php
	}
endif;
