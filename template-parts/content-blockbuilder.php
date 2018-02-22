<?php

while ( have_rows('block_builder') ) : the_row(); ?>

    <?php if ( get_row_layout() == 'splash_slider' ) { ?>
        <div class="splash_slider owl-carousel owl-theme">
            <?php while ( have_rows('slide') ) : the_row(); ?>
                <div class="splash_slider--item">
                    <?php if ( $image = get_sub_field('slide_image') ) {
                        echo wp_get_attachment_image( $image, 'full', array( 'class' => 'splash_slider--item-image' ) );
                    } ?>
                    <?php if ( $text = get_sub_field('slide_text') ) { ?>
                        <h2 class="splash_slider--item-text"><?php the_sub_field('slide_text'); ?></h2>
                    <?php } ?>
                </div>
            <?php endwhile; ?>
        </div>  
     <?php }
    if ( get_row_layout() == 'title_text' ) { ?>
        <div class="title_text">
            <div class="container">
                <div class="row">
                    <?php if ( $text = get_sub_field('text') ) { ?>
                        <h1 class="title_text--text"><?php the_sub_field('text'); ?></h1>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php }
    if ( get_row_layout() == 'pages_summary_block' ) { ?>
        <div class="pages_summary_block">
            <div class="container">
                <div class="row">
                    <?php while ( have_rows('pages') ) : the_row(); ?>
                        <?php if ( $page = get_sub_field('page') ) { ?>

                            <a class="pages_summary_block-link" href="<?php echo esc_url( get_permalink( get_page( $page->ID ) ) ); ?>">
                                <div class="pages_summary_block-page">

                                <?php if ( has_post_thumbnail($page->ID) ) {
                                    $image = wp_get_attachment_image_src( get_post_thumbnail_id($page->ID) ); ?>

                                    <img src="<?php echo $image[0]; ?>" alt="">

                                <?php }
                                }
                                if ( $text = get_sub_field('page_subtitle_text') ) { ?>

                                    <h3 class="pages_summary_block-text"><?php echo $text; ?></h3>
                                </div>
                            </a>

                        <?php } ?>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php } ?>


 <?php endwhile; ?>