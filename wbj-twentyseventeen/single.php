<?php
/**
 * The template for displaying all single posts
 *
 * @package whistle-blower-justice
 */
get_header(); ?>
<main>
    <div id="content_left">
        <?php while ( have_posts() ) : the_post();

        endwhile; ?>
    </div>
    <?php get_sidebar(); ?>
<?php get_footer(); ?>