<?php


/*
* Si le message courant est protégé par un mot de passe et que 
* le visiteur n'a pas encore saisi son mot de passe, 
* nous reviendrons plus tôt sans charger les commentaires.
*/
if ( post_password_required() ) {
    return;
}
?>

<div id="comments">

    <?php
    // Vous pouvez commencer à éditer ici -- y compris ce commentaire !
    if ( have_comments() ) :
        ?>
        <h2>
            <?php
            $comments_number = get_comments_number();
            if ( '1' === $comments_number ) {
                /* translators: %s: post title */
                printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'sicca_theme' ), get_the_title() );
            } else {
                printf(
                    /* translators: 1: number of comments, 2: post title */
                    _nx(
                        '%1$s Reply to &ldquo;%2$s&rdquo;',
                        '%1$s Replies to &ldquo;%2$s&rdquo;',
                        $comments_number,
                        'comments title',
                        'sicca_theme'
                    ),
                    number_format_i18n( $comments_number ),
                    get_the_title()
                );
            }
            ?>
        </h2>

        <ol>
            <?php
                wp_list_comments(
                    array(
                        'avatar_size' => 100,
                        'style'       => 'ol',
                        'short_ping'  => true,
                        'reply_text'  => sicca_theme_get_svg( array( 'icon' => 'mail-reply' ) ) . __( 'Reply', 'sicca_theme' ),
                    )
                );
            ?>
        </ol>

        <?php
        the_comments_pagination(
            array(
                'prev_text' => sicca_theme_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous', 'sicca_theme' ) . '</span>',
                'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'sicca_theme' ) . '</span>' . sicca_theme_get_svg( array( 'icon' => 'arrow-right' ) ),
            )
        );

    endif; // Vérifiez la présence de have_comments().

    // Si les commentaires sont fermés et qu'il y a des commentaires -> Commentaires fermés !
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>

        <p><?php _e( 'Comments are closed.', 'sicca_theme' ); ?></p>
        <?php
    endif;

    comment_form();
    ?>

</div><!-- #comments -->
