<?php
/**
 * The template for displaying all single posts
 *
 * @package whistle-blower-justice
 */
get_header(); ?>
    <main>
        <?php while ( have_posts() ) : the_post();?>
        <?php page_header_image() ?>
        <div class="wrapper internal">
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