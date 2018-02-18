<?php 

    if ( !is_user_logged_in() ) :
        
        get_header();
        
        while ( have_posts() ) : the_post();
        
            get_template_part( 'template-parts/content', 'home' );
        
        endwhile; // End of the loop.
    
    else :

    $members_redirect = get_permalink( get_page_by_title( 'Members Home Page' ) );

    wp_redirect( $members_redirect );

    endif;

get_footer(); ?>