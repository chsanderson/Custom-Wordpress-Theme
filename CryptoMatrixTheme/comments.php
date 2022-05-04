<?php
    /**
     * The template for displaying Comments.
     * 
     * The area of the page that contains comments and the comment form
     * 
     * @package WordPress
     * @subpackage CryptoMatrixTheme
     * @since CryptoMatrixTheme 1.0
     */

     /***
      * if the current post is protected by a password and the vistitor has not yet entered the password we will return early without loading the comments
      */
      if( post_password_required())
      return;
?>
<div id="comments" class="comments-area">
    <?php
    if(have_comments()) :?>
    <h2 class="comments-title">
        <?php
            printf(_nx('One thought on "%2$s"', '%1$s thoughts on "%2$s"', get_comments_number(), 'comments title', 'cryptomatrixtheme'),  number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>');
        ?>
    </h2>


    <ol class="comment-list"> 
        <?php
            wp_list_comments( array(
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 74,
            ));
        ?>
    </ol><!-- .comment-list -->

    <?php
        //Are there comments to navigate through?
        if(get_comment_pages_count() > 1 && get_option('page_comments')):
    ?>
    <nav class="navigation comment-navigation" role="navigation">
        <h1 class="screen-reader-text section-heading"><?php _e('Comment navigation', 'cryptomatrixtheme');?></h1>
        <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'cryptomatrixtheme')); ?></div>
        <div class="nav-next"><?php __( 'Newer Comments &rarr;', 'cryptomatrixtheme' ); ?></div>
    </nav><!-- .comment-navigation -->
    <?php endif; //check for comment navigation ?>

    <?php if( ! comments_open() && get_comments_number() ) :?>
        <p class="no-comments"><?php _e('Comments are closed.', 'cryptomatrixtheme'); ?></p>
    <?php endif;?>

    <?php endif; //have comments() ?>
    <?php comment_form();?>
</div><!-- #comments -->