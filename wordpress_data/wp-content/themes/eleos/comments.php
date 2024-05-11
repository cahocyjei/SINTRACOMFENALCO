<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package eleos
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

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>		

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'eleos' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'eleos' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'eleos' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php			
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 100,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'eleos' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'eleos' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'eleos' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'eleos' ); ?></p>
	<?php endif; ?>

	    <?php
    	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
		$aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
                'id_form' => 'reply-form',              
                'class_form' => 'comments background-color-white',                  
                'title_reply'=> esc_html__('', 'eleos'),
                'fields' => apply_filters( 'comment_form_default_fields', array(
                    'author' => '<div class="three_columns clearfix"><div class="column1"><div class="column_inner"><input id="author" name="author" id="name" type="text" value="" placeholder="'. esc_html__( 'Your Name *', 'eleos' ) .'" /></div></div></div>',
                    'email' => '<div class="column2"><div class="column_inner"><input value="" id="email" name="email" type="email" placeholder="'. esc_html__( 'Email *', 'eleos' ) .'" /></div></div>', 
                    ) ),                                
                 'comment_field' => '<textarea rows="10" cols="45" name="comment" '.$aria_req.' id="comment" placeholder="'. esc_html__( 'Your Comment', 'eleos' ) .'" ></textarea>',                                                   
                 'label_submit' => esc_html__( 'Submit', 'eleos' ),
                 'comment_notes_before' => '',
                 'comment_notes_after' => '',   
                 'class_submit'      => 'btn btn-custom send_message button-effect button--moema button--text-thick button--text-upper button--size-s',            
	        )
	    ?>
	    <?php comment_form($comment_args); ?>

</div><!-- #comments -->
