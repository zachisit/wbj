<?php
/**
 * The template for displaying all single posts
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
            <!--@TODO;move into breadcrumb function-->
            <div id="breadcrumb">
                <ul>
                    <li><a href="" title="Home">Home</a></li>
                    <li><a href="" title="Category Name">Category Name</a></li>
                    <li><?=wp_trim_words( get_the_title(), 10, '...' );?></li>
                </ul>
            </div>
            <div id="content">
                <h1 id="page_title"><?=the_title()?></h1>
                <?=the_content();
                endwhile; ?>
                <div id="related_articles">
                    <h3>Related Articles</h3>
                    <?php single_related_articles() ?>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </main>
<?php get_footer(); ?>