<?php
/**
 * The template for displaying all pages
 *
 * @package whistle-blower-justice
 */
get_header(); ?>
    <main>
        <?php while ( have_posts() ) : the_post();?>
        <?php //page_header_image()
        //echo get_the_post_thumbnail(null, 'full'); ?>
        <div id="article_banner" style="background:url(<?=get_template_directory_uri()
        . "/images/preload/featured_image_placeholder.png"?>) no-repeat fixed"><h1><?=the_title()?></h1></div>
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