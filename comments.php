<?php
/**
 * @package Case-Themes
 */

if ( post_password_required() ) {
    return;
    } ?>

    <div id="comments" class="comments-area">

        <?php
        if ( have_comments() ) : ?>
            <div class="comment-list-wrap">

                <h2 class="comments-title">
                    <?php
                        $comment_count = get_comments_number();
                        if ( 1 === intval($comment_count) ) {
                            echo esc_html__( '1 Comment', 'foliohub' );
                        } else {
                            echo esc_attr( $comment_count ).' '.esc_html__('Comments', 'foliohub');
                        }
                    ?>
                </h2>

                <?php the_comments_navigation(); ?>

                <ul class="comment-list">
                    <?php
                        wp_list_comments( array(
                            'style'      => 'ul',
                            'short_ping' => true,
                            'callback'   => 'foliohub_comment_list',
                            'max_depth'  => 3
                        ) );
                    ?>
                </ul>

                <?php the_comments_navigation(); ?>
            </div>
            <?php if ( ! comments_open() ) : ?>
                <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'foliohub' ); ?></p>
            <?php
            endif;

        endif;

    $args = array(
        'id_form'           => 'commentform',
        'id_submit'         => 'submit',
        'class_submit'      => 'btn-submit btn btn-default inline pxl-icon--right',
        'label_submit' => esc_html__('add your comment', 'foliohub'),
        'title_reply'       => esc_html__('Add comment:', 'foliohub'),
        'title_reply_to'    => esc_html__('Add comment to %s:', 'foliohub'),
        'cancel_reply_link' => esc_attr__('Cancel Comment', 'foliohub'),
        'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s"> <span class="pxl-btn-icon"> <i aria-hidden="true" class="bootstrap-icons bi-arrow-right"></i> </span> <span class="pxl--btn-text">%4$s</span> </button>',
        'comment_notes_before' => '',
        'fields' => apply_filters('comment_form_default_fields', array(
            'author' =>
            '<div class="row"><div class="col-12 notice-f">' . esc_attr('Your email address will not be published. Required fields are marked *', 'foliohub') . '</div>
            <div class="comment-form-author ">
            <i aria-hidden="true" class="fas fa-user"></i>
            <input id="author" name="author" type="text" placeholder="' . esc_attr__('Your name*', 'foliohub') . '" value="' . esc_attr($commenter['comment_author']) . '" size="30"/></div>',

            'email' =>
            '<div class="comment-form-email ">
            <i aria-hidden="true" class="fas fa-envelope-open"></i>
            <input id="email" name="email" type="text" placeholder="' . esc_attr__('Email address*', 'foliohub') . '" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"/></div>',
        )),
        'comment_field' =>
            '<div class="comment-form-comment">
            <i aria-hidden="true" class="fas fa-pen"></i>
            <textarea id="comment" name="comment" cols="45" rows="8" placeholder="' . esc_attr__('Write comment...', 'foliohub') . '" aria-required="true"></textarea></div>' .
            '<div class="col-12 notice-f">' . esc_attr('Please note, your email won’t be published.', 'foliohub') . '</div>',
    );

    comment_form($args);

    ?>
</div>