<?php 
    // If user is not logged in...
    if ( !is_user_logged_in() ) :
        // Display the template-parts/content-home.php page
        get_header();
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', 'home' );
        endwhile; // End of the loop.
    else :
        // Redirect to the Members Home Page - 
        // do not change the Members Home Page title.
        $members_page = get_page_by_title('Members Home Page');
        wp_redirect( get_permalink($members_page->ID) );
        exit;
    endif;

get_footer(); ?>