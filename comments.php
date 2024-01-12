<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dsignfly
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			Comments
		</h2><!-- .comments-title -->
		<hr>
		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'div',
					'short_ping' => true,
					'format'     => 'html5',
					'callback'   => 'better_commets',
				)
			);
			?>
		</ol><!-- .comment-list -->
		<hr>
		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'dsignfly' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	$comments_args = array(
		'label_submit'         => 'Submit',
		'title_reply'          => 'Post your comment',
		'comment_form_top'     => 'ds',
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
		'comment_field'        => '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="Your Comment* " aria-required="true"></textarea></p>',
		'fields'               => apply_filters(
			'comment_form_default_fields',
			array(
				'author'  => '<span class="comment-form-fields"><p class="comment-form-author"><label for="author">Name <span class="required">*</span></label> <input id="author" name="author" type="text" value="" maxlength="245" autocomplete="name" required=""></p>',
				'email'   => '<p class="comment-form-email"><label for="email">Email <span class="required">*</span></label> <input id="email" name="email" type="email" value=""  maxlength="100" autocomplete="email" required=""></p>',
				'url'     => '<p class="comment-form-url"><label for="url">Website</label> <input id="url" name="url" type="url" value=""  maxlength="200" autocomplete="url"></p></span>',
				'cookies' => ' ',
			)
		),
	);

	comment_form( $comments_args );
	?>

</div><!-- #comments -->
