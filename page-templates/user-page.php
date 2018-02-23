<?php
/**
 * Template Name: User Profile Update Form
 *
 * Allow users to update their profiles from the members area.
 *
 */

/* Get user info. */
global $current_user, $wp_roles;

/* Load the registration file. */

$error = array();    

/* If profile was saved, update profile. */
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {

    /* Update user password. */
    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
        if ( $_POST['pass1'] == $_POST['pass2'] )
            wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
        else
            $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
    }

    /* Update user information. */
    if ( !empty( $_POST['url'] ) )
        wp_update_user( array( 'ID' => $current_user->ID, 'user_url' => esc_url( $_POST['url'] ) ) );

    if (isset( $_POST['email'])) {
        // check if user is really updating the value
        if ($user_email != $_POST['email']) {       
            // check if email is free to use
            if (email_exists( $_POST['email'] )){
                $error[] = __('This email is already used by another user. Please try a different one.', 'profile');
            } else {
                $args = array(
                    'ID'         => $current_user->id,
                    'user_email' => esc_attr( $_POST['email'] )
                );            
            wp_update_user( $args );
            }   
        }
    }

    if ( !empty( $_POST['first-name'] ) )
        update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
    if ( !empty( $_POST['last-name'] ) )
        update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
    if ( !empty( $_POST['description'] ) )
        update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );

    /* Redirect so the page will show updated info.*/
  /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
    if ( count($error) == 0 ) {
        //action hook for plugins and extra fields saving
        do_action('edit_user_profile_update', $current_user->ID);
        wp_redirect( get_permalink() );
        exit;
    }
}
?>

<?php
get_header('members'); 
?>

<main id="main" class="site-main">
    <div class="container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div id="page-<?php the_ID(); ?>" class="page-<?php echo strtolower( str_replace( " ", "-", get_the_title() ) ); ?>">
            <div class="entry-content entry">
                <?php the_content(); ?>
                <?php if ( !is_user_logged_in() ) : ?>
                        <p class="warning">
                            <?php _e('You must be logged in to edit your profile.', 'profile'); ?>
                        </p><!-- .warning -->
                <?php else : ?>
                    <?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
                    <form method="post" id="adduser" action="<?php the_permalink(); ?>" class="">
                        <h3><?php _e("Your profile information", "blank"); ?></h3>
                        <table class="table">
                            <tr>
                                <th>
                                    <label for="first-name"><?php _e('First Name', 'profile'); ?></label>
                                </th>
                                <td>
                                    <input class="text-input" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
                                </td>
                            </tr>
                                
                            <tr>
                                <th>
                                    <label for="last-name"><?php _e('Last Name', 'profile'); ?></label>
                                </th>
                                <td>
                                    <input class="text-input" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="email"><?php _e('E-mail *', 'profile'); ?></label>
                                </th>
                                <td>
                                    <input class="text-input" name="email" type="text" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="url"><?php _e('Website', 'profile'); ?></label>
                                </th>
                                <td>
                                    <input class="text-input" name="url" type="text" id="url" value="<?php the_author_meta( 'user_url', $current_user->ID ); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="pass1"><?php _e('Password *', 'profile'); ?> </label>
                                </th>
                                <td>
                                    <input class="text-input" name="pass1" type="password" id="pass1" onpaste="return false;" />
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="pass2"><?php _e('Repeat Password *', 'profile'); ?></label>
                                </th>
                                <td>
                                    <input class="text-input" name="pass2" type="password" id="pass2" onpaste="return false;" />
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="description"><?php _e('Biographical Information', 'profile') ?></label>
                                </th>
                                <td>
                                    <textarea name="description" id="description" rows="3" cols="50"><?php the_author_meta( 'description', $current_user->ID ); ?></textarea>
                                </td>
                            </tr>

                            <?php 
                                //action hook for plugin and extra fields
                                do_action('edit_user_profile',$current_user); 
                            ?>
                            
                            <tr>
                                <th>
                                    <?php echo $referer; ?>
                                    <input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update your profile', 'profile'); ?>" />
                                    <?php wp_nonce_field( 'update-user' ) ?>
                                    <input name="action" type="hidden" id="action" value="update-user" />
                                </th>
                                <td>
                                </td>
                            </tr>
                        </table>
                    </form><!-- #adduser -->
                <?php endif; ?>
            </div><!-- .entry-content -->
        </div><!-- .hentry .post -->
        <?php endwhile; ?>
    <?php else: ?>
        <p class="no-data">
            <?php _e('Sorry, no page matched your criteria.', 'profile'); ?>
        </p><!-- .no-data -->
    <?php endif; ?>
    </div>
</main><!-- #main -->

<?php

    get_footer();