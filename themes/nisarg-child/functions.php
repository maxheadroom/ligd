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


    if ( ! function_exists( 'nisarg_header_style' ) ) :
        /**
         * Styles the header image and text displayed on the blog
         *
         * @see nisarg_custom_header_setup().
         */
        function nisarg_header_style() {
            $header_image = get_header_image();
            $header_text_color   = get_header_textcolor();
            ?>
            <style type="text/css" id="nisarg-header-css">
            <?php
            if ( ! empty( $header_image ) ) :
                $header_width = get_custom_header()->width;
                $header_height = get_custom_header()->height;
                $header_height320 = ( $header_height / $header_width * 320 );
                $header_height360 = ( $header_height / $header_width * 360 );
                $header_height768 = ( $header_height / $header_width * 768 );
                $header_height980 = ( $header_height / $header_width * 980 );
                $header_height1280 = ( $header_height / $header_width * 1280 );
                $header_height1366 = ( $header_height / $header_width * 1366 );
                $header_height1440 = ( $header_height / $header_width * 1440 );
                $header_height1600 = ( $header_height / $header_width * 1600 );
                $header_height1920 = ( $header_height / $header_width * 1920 );
                $header_height2560 = ( $header_height / $header_width * 2560 );
                $header_height2880 = ( $header_height / $header_width * 2880 );
                ?>
                .site-header {
                    background: linear-gradient( to top, black, transparent 90%), url(<?php header_image(); ?>) no-repeat scroll top;
                    background-size: cover;
                }


                @media (min-width: 320px) and (max-width: 359px ) {
                    .site-header {
                        height: <?php echo absint( $header_height320 );?>px;
                    }
                }
                @media (min-width: 360px) and (max-width: 767px ) {
                    .site-header {
                        height: <?php echo absint( $header_height360 );?>px;
                    }
                }
                @media (min-width: 768px) and (max-width: 979px ) {
                    .site-header {
                        height: <?php echo absint( $header_height768 );?>px;
                    }
                }
                @media (min-width: 980px) and (max-width: 1279px ){
                    .site-header {
                        height: <?php echo absint( $header_height980 );?>px;
                    }
                }
                @media (min-width: 1280px) and (max-width: 1365px ){
                    .site-header {
                        height: <?php echo absint( $header_height1280 );?>px;
                    }
                }
                @media (min-width: 1366px) and (max-width: 1439px ){
                    .site-header {
                        height: <?php echo absint( $header_height1366 );?>px;
                    }
                }
                @media (min-width: 1440px) and (max-width: 1599px ) {
                    .site-header {
                        height: <?php echo absint( $header_height1440 );?>px;
                    }
                }
                @media (min-width: 1600px) and (max-width: 1919px ) {
                    .site-header {
                        height: <?php echo absint( $header_height1600 );?>px;
                    }
                }
                @media (min-width: 1920px) and (max-width: 2559px ) {
                    .site-header {
                        height: <?php echo absint( $header_height1920 );?>px;
                    }
                }
                @media (min-width: 2560px)  and (max-width: 2879px ) {
                    .site-header {
                        height: <?php echo absint( $header_height2560 );?>px;
                    }
                }
                @media (min-width: 2880px) {
                    .site-header {
                        height: <?php echo absint( $header_height2880 );?>px;
                    }
                }
                .site-header{
                    -webkit-box-shadow: 0px 0px 2px 1px rgba(182,182,182,0.3);
                    -moz-box-shadow: 0px 0px 2px 1px rgba(182,182,182,0.3);
                    -o-box-shadow: 0px 0px 2px 1px rgba(182,182,182,0.3);
                    box-shadow: 0px 0px 2px 1px rgba(182,182,182,0.3);
                }
            <?php else : ?>
                .site-header{
                    -webkit-box-shadow: 0px 0px 1px 1px rgba(182,182,182,0.3);
                    -moz-box-shadow: 0px 0px 1px 1px rgba(182,182,182,0.3);
                    -o-box-shadow: 0px 0px 1px 1px rgba(182,182,182,0.3);
                    box-shadow: 0px 0px 1px 1px rgba(182,182,182,0.3);
                }
                .site-header {
                        height: 300px;
                    }
                    @media (max-width: 767px) {
                        .site-header {
                            height: 200px;
                        }
                    }
                    @media (max-width: 359px) {
                        .site-header {
                            height: 150px;
                        }
                    }
            <?php endif;
            // Has the text been hidden?
            if ( ! display_header_text() ) :
            ?>
                .site-title,
                .site-description {
                    position: absolute;
                    clip: rect(1px 1px 1px 1px); /* IE7 */
                    clip: rect(1px, 1px, 1px, 1px);
                }
            <?php
            endif;
            if ( empty( $header_image ) ) :
                ?>
                .site-header .home-link {
                    min-height: 0;
                }
            <?php endif;  ?>
                .site-title,
                .site-description {
                    color: #<?php echo esc_attr( $header_text_color ); ?>;
                }
                .site-title::after{
                    background: #<?php echo esc_attr( $header_text_color ); ?>;
                    content:"";
                }
            </style>
            <?php
        }
    endif; // nisarg_header_style

?>