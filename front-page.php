<?php 

    if ( !is_user_logged_in() ) :
        
        get_header();
        
        while ( have_posts() ) : the_post();
        
            get_template_part( 'template-parts/content', 'home' );
        
        endwhile; // End of the loop.
    
    else :

        get_header( 'members' );

        echo "Logged in!";

    endif;

get_footer(); ?>