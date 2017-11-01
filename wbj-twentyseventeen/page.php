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
                <?=the_content();
                endwhile; ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </main>
<?php get_footer(); ?>