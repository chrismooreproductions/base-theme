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

        <div class="title-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ( $text = get_sub_field('text') ) { ?>
    
                            <h1 class="title-text__text"><?php the_sub_field('text'); ?></h1>
    
                        <?php } ?>
                    </div>
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

                                <div class="pages_summary_block-page" style="background-image="<?php echo $image_url[0]; ?>">

                                <?php if ( has_post_thumbnail($page->ID) ) {

                                    $image_id = get_post_thumbnail_id($page->ID);

                                    $image_url = wp_get_attachment_image_src( $image_id, "featured_image", array( "class" => "img-responsive" ) ); 

                                    var_dump($image_url[0]);
                                    // $pages_image = wp_get_attachment_image( $image_id, 'pages_image'  ); 
                                    
                                    }

                                    if ( $text = get_sub_field('page_subtitle_text') ) { ?>

                                    <h3 class="pages_summary_block-text"><?php echo $text; ?></h3>
                                    
                                </div><!-- // .pages_summary_block-page -->
                            </a><!-- // .pages_summary_block-link -->
                            
                        <?php } 
                        } ?>

                    <?php endwhile; ?>

                </div>
            </div>
        </div>
    <?php } 
    if ( get_row_layout() == 'banner_link_to_pdf' ) { ?>
        <div class="banner_link_to_pdf">
            <div class="container">
                <div class="row">

                    <?php if ( $text = get_sub_field('banner_text') ) { ?>
                        
                        <div class="banner_link_to_pdf-text"><?php echo $text ?></div>

                    <?php } ?>

                    <?php if ( $document = get_sub_field('document_link') ) { ?>

                        <a href="<?php echo $document['url']; ?>">

                            <?php if ( $document_link_text = get_sub_field('document_link_text') ) { ?>

                                <h4><?php echo $document_link_text; ?></h4>

                            <?php } ?>

                        </a>

                    <?php } ?>

                </div>
            </div>
        </div>
    <?php } 
    if ( get_row_layout() == 'info_and_news' ) { ?>

        <div class="info-and-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="information">

                            <?php if ( $intro_title = get_sub_field('introduction_title') ) { ?>

                                <h1 class="info-and-news-information__information-title"><?php echo $intro_title; ?></h1>

                            <?php } ?>

                            <?php if ( $intro_text = get_sub_field('introduction_text') ) {

                                echo $intro_text;

                            } ?>

                            <?php if ( $intro_page = get_sub_field('introduction_page') ) {
                                if ( $intro_link_text = get_sub_field('introduction_page_link_text') ) { ?>
                                    <a href="<?php echo $intro_page; ?>" class="info-and-news-information__information-link"><?php echo $intro_link_text; ?></a>
                                <?php }
                            } ?>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-and-news">
                            <?php if ( $news_title_text = get_sub_field('news_title_text') ) { ?>
                                
                                <h1 class="info-and-news__information-information-title"><?php echo $news_title_text; ?></h1>

                            <?php } ?>
                            <div class="container">
                                <div class="row">

                                    <?php 
                                    $cat = get_category_by_slug( 'news-posts-public' );
                                    $args = array(
                                        'numberposts'   => 2,
                                        'category'      => $cat->term_id
                                    );
                                    $recent_posts = wp_get_recent_posts( $args ); 
                                    foreach ($recent_posts as $post) { ?>
                                        <div class="col-md-6">
                                            <div class="info-and-news__news">
                                                <?php echo get_the_post_thumbnail($post["ID"], 'full'); ?>
                                                <p class="info-and-news__news-date"><?php echo $post["post_date"]; ?></p>
                                                <h4 class="info-and-news__news-title"><?php echo $post["post_title"]; ?></h4>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php }

endwhile;