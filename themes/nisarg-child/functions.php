<?php
/**
* Child theme stylesheet einbinden in Abhängigkeit vom Original-Stylesheet
*/

function child_theme_styles() {
wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
wp_enqueue_style( 'child-theme-css', get_stylesheet_directory_uri() .'/style.css' , array('parent-style'));

}
add_action( 'wp_enqueue_scripts', 'child_theme_styles' );


if ( ! function_exists( 'nisarg_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function nisarg_posted_on() {
    
    $viewbyauthor_text = __( 'View all posts by', 'nisarg' ).' %s';
    
    $entry_meta = '<i class="fa fa-calendar-o"></i> <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s </time></a>';
    
        $entry_meta = sprintf($entry_meta,
            esc_url( get_permalink() ),
            esc_attr( get_the_time() ),
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() ),
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            esc_attr( sprintf( $viewbyauthor_text, get_the_author() ) ),
            esc_html( get_the_author() ));
    
        print $entry_meta; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    
        if(comments_open()){	
            printf(' <i class="fa fa-comments-o"></i><span class="screen-reader-text">%1$s </span> ',esc_html_x( 'Comments', 'Used before post author name.', 'nisarg' ));
            comments_popup_link( __('0 Comment','nisarg'), __('1 comment','nisarg'), __('% comments','nisarg'), 'comments-link', ''); // phpcs:ignore WordPress.WP.I18n.MissingTranslatorsComment
        }
    }
    endif;
?>