<?php
/**
 * The template for displaying all pages
 *
 * @package whistle-blower-justice
 */
get_header(); ?>
    <main>
        <?php while ( have_posts() ) : the_post();?>
        <?php
        //TODO: move into function
        $uploadedBannerImage = get_post_meta( $post->ID, '_listing_image_id', true );

        if ($uploadedBannerImage) :
            $image = wp_get_attachment_url($uploadedBannerImage, 'full');
        else :
            $image = get_template_directory_uri()
                . "/images/preload/featured_image_placeholder.png";
            endif; ?>
        <div id="article_banner" style="background:url(<?=$image?>) no-repeat fixed; background-size:cover"><h1><?=the_title()?></h1></div>
        <div class="wrapper internal">
            <div id="content">
                <h1 id="page_title"><?=the_title()?></h1>
                <?php
                /*
                 * TODO:this will be removed and replaced
                 * by shortcodes
                 * used to get by for tomorrow's meeting
                 */
                if (is_page('newsroom')) {
                    newsroom_block('Featured Article', 'https://whistleblowerjustice.org/wp-content/uploads/2017/03/1-146542373.jpg');
            newsroom_block('Fold Articles', 'https://whistleblowerjustice.org/wp-content/uploads/2017/10/business-q-c-640-480-1.jpg');
            newsroom_block('Latest News', 'https://whistleblowerjustice.org/wp-content/uploads/2017/04/f25b6a50-38ba-41ca-9020-3640e708a90f-large.jpeg');
            newsroom_block('Video Article', 'https://whistleblowerjustice.org/wp-content/uploads/2017/10/about.jpg');
            ?>
                    <!--@TODO:removed when we implement
                    show/hide sidebar-->
                    <style>
                    #sidebar, #page_title {display:none;}
                        #content {width:97% !important;}
                    </style>
                <?php } else {
                    the_content();
                }
                endwhile; ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </main>
<?php get_footer(); ?>