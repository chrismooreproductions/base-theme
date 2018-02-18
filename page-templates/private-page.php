<?php
/**
 * Template Name: Members Only Page
 */

if ( !is_user_logged_in() ) :

    wp_redirect( home_url() );
    
    else :
        
    get_header();
        
    while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'page' );

    endwhile; // End of the loop.

endif;

get_footer();