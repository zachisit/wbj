<?php
/**
 * The 404 page for our theme (not found)
 *
 * This is the template that displays generic 404 message
 *
 */
get_header(); ?>

<div id="page_content">
    <h1>404 Page Not Found</h1>
    <p>Oppsie! This page is not found. Please <a href="<?php echo get_home_url(); ?>" title="Home">return to the homepage</a>.</p>
</div>

<?php get_footer(); ?>
