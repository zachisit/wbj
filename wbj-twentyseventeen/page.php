<?php
/**
 * The template for displaying all pages
 *
 * @package whistle-blower-justice
 */
get_header(); ?>
    <main>
        <?php while ( have_posts() ) : the_post();?>
        <?php page_header_image() ?>
        <div class="wrapper internal">
            <div id="content_left">
                <h1 id="page_title"><?=the_title()?></h1>
                <?=the_content();
                endwhile; ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </main>
<?php get_footer(); ?>