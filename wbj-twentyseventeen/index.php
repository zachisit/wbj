<?php
/**
 * The main template file
 *
 * Serves as landing page for theme
 *
 * @package whistle-blower-justice
 */
get_header(); ?>

<main>
    <div id="intro">
        <div class="wrapper">
            <div id="featured_articles">
                <ul id="featured_article_slider">
                    <?php $query = new WP_Query( [
                        'post_type' => 'post',
                        'posts_per_page' => 8,
                        'category_name' => 'Featured Article'
                    ] );

                    if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) : $query->the_post(); ?>
                            <li>
                                <?=get_the_post_thumbnail() ?>
                                <div class="text_box">
                                    <div class="title"><a href="'. get_the_permalink() .'" title="'. get_the_title(). '">'. get_the_title(). '</a></div>
                                </div>
                            </li>
                        <?php endwhile; wp_reset_query();
                    else :
                        echo "<center>Sorry. But I do not see any posts in the 'Featured Article' category</center>";
                    endif ?>
                </ul>
            </div>
            <div id="latest_articles">
                <h1>Latest Articles</h1>
                <ul>
                    <?php $query = new WP_Query( [
                        'post_type' => 'post',
                        'posts_per_page' => 8,
                        'category_name' => 'Latest News'
                    ] );

                    if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) : $query->the_post();
                            echo '<li><div class="date">'. get_the_date(m .'.'.d.'.'.Y) .'</div><div class="title"><a href="'. get_the_permalink() .'" title="'. get_the_title(). '">'. get_the_title(). '</a></div></li>';
                        endwhile; wp_reset_query();
                    else :
                        echo "<center>Sorry. But I do not see any posts in the 'Latest News' category</center>";
                    endif ?>
                </ul>
            </div>
        </div>
    </div>
    <div id="fold_articles">
        <div class="wrapper">
            <h2 class="section_title">Et harum quidem rerum facilis</h2>
            <ul>
                <?php $query = new WP_Query( [
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'category_name' => 'Fold Articles'
                ] );

                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post();
                        echo '<li><div class="date">'. get_the_date(m .'.'.d.'.'.Y) .'</div><div class="title"><a href="'. get_the_permalink() .'" title="'. get_the_title(). '">'. get_the_title(). '</a></div></li>';
                    endwhile; wp_reset_query();
                else :
                    echo "<center>Sorry. But I do not see any posts in the 'Fold Articles' category</center>";
                endif ?>
            </ul>
        </div>
    </div>
    <div id="mission">
        <div id="focus">
            <h2>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</h2>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
            <a class="button" href="" title="">Learn More</a>
        </div>
    </div>
    <div id="rand_articles">
        <div class="wrapper">
            <h2 class="section_title">Et harum quidem rerum facilis</h2>
            <ul>
                <?php $query = new WP_Query( [
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'orderby'   => 'rand',
                ] );

                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post();
                        echo '<li><div class="date">'. get_the_date(m .'.'.d.'.'.Y) .'</div><div class="title"><a href="'. get_the_permalink() .'" title="'. get_the_title(). '">'. get_the_title(). '</a></div></li>';
                    endwhile; wp_reset_query();
                else :
                    echo "<center>Sorry. But I do not see any posts in the 'Fold Articles' category</center>";
                endif ?>
            </ul>
        </div>
    </div>
    <div id="video_articles">
        <div class="wrapper">
            <h2 class="section_title">Et harum quidem rerum facilis</h2>
            <ul>
                <?php $query = new WP_Query( [
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'category_name' => 'Video Article'
                ] );

                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post();
                        echo '<li><div class="date">'. get_the_date(m .'.'.d.'.'.Y) .'</div><div class="title"><a href="'. get_the_permalink() .'" title="'. get_the_title(). '">'. get_the_title(). '</a></div></li>';
                    endwhile; wp_reset_query();
                else :
                    echo "<center>Sorry. But I do not see any posts in the 'Video Article' category</center>";
                endif ?>
            </ul>
        </div>
    </div>
    <div id="all_articles">
        <div class="wrapper">
            <h2 class="section_title">Et harum quidem rerum facilis</h2>
            <ul>
                <?php $query = new WP_Query( [
                    'post_type' => 'post',
                    'posts_per_page' => 10,
                    'orderby' => 'post_date',
                ] );

                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post();
                        echo '<li><div class="date">'. get_the_date(m .'.'.d.'.'.Y) .'</div><div class="title"><a href="'. get_the_permalink() .'" title="'. get_the_title(). '">'. get_the_title(). '</a></div></li>';
                    endwhile; wp_reset_query();
                else :
                    echo "<center>Sorry. But I do not see any posts in the 'Video Article' category</center>";
                endif ?>
            </ul>
        </div>
    </div>
</main>

<?php get_footer(); ?>