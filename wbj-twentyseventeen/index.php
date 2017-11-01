<?php
/**
 * The main template file
 *
 * Serves as landing page for theme
 *
 * @package whistle-blower-justice
 */
get_header();
//@TODO:page is riddled w/same query to output posts. make function to spit all this out and allow vars to select type, number of posts to show, category, nd if random post category
//@TODO: change get_the_post_thumbnail() to function to output fallback
?>

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
                                    <div class="title"><a href="<?=get_the_permalink()?>" title="<?=get_the_title()?>"><?=get_the_title()?></a><div class="category">Lorem Ipsum</div></div>
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
                        while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li><div class="title"><a href="<?=get_the_permalink()?>" title="<?=get_the_title()?>"><?=get_the_title()?></a></div></li>
                        <?php endwhile; wp_reset_query();
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
            <div class="section_title_line"></div>
            <ul>
                <?php $query = new WP_Query( [
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'category_name' => 'Fold Articles'
                ] );

                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                        <li>
                            <a href="<?=get_the_permalink()?>" title="<?=get_the_title()?>">
                                <?=get_the_post_thumbnail() ?>
                            <div class="title"><a href="<?=get_the_permalink()?>" title="<?=get_the_title()?>"><?=get_the_title()?></a></div>
                            <?php endwhile; wp_reset_query();
                            else :
                                echo "<center>Sorry. But I do not see any posts in the 'Fold Articles' category</center>";
                            endif ?>
                            </a>
                        </li>
            </ul>
        </div>
    </div>
    <div id="mission">
        <div id="focus">
            <h2>Sed ut perspiciatis unde omnis</h2>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Aenean hendrerit quis mi nec congue. Suspendisse fringilla ullamcorper lacus, a bibendum lectus mollis quis. Praesent sed orci et nisi malesuada viverra quis sit amet turpis. Sed vulputate nisi magna, in bibendum metus viverra ac. Curabitur mollis vitae nibh eu cursus.</p>
            <a class="button" href="" title="">Learn More</a>
        </div>
    </div>
    <div id="rand_articles">
        <div class="wrapper">
            <h2 class="section_title">Et harum quidem rerum facilis</h2>
            <div class="section_title_line"></div>
            <ul>
                <?php $query = new WP_Query( [
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'orderby'   => 'rand',
                ] );

                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                <li>
                    <a href="<?=get_the_permalink()?>" title="<?=get_the_title()?>">
                        <?=get_the_post_thumbnail() ?>
                        <div class="title"><a href="<?=get_the_permalink()?>" title="<?=get_the_title()?>"><?=get_the_title()?></a></div>
                        <?php endwhile; wp_reset_query();
                        else :
                            echo "<center>Sorry. But I do not see any posts in any category</center>";
                        endif ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div id="video_articles">
        <div class="wrapper">
            <h2 class="section_title">Et harum quidem rerum facilis</h2>
            <div class="section_title_line"></div>
            <ul>
                <?php $query = new WP_Query( [
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'category_name' => 'Video Article'
                ] );

                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                <li>
                    <a href="<?=get_the_permalink()?>" title="<?=get_the_title()?>"><?=get_the_post_thumbnail() ?>
                    <div class="title"><?=get_the_title()?></a></div>
                <?php endwhile; wp_reset_query();
                else :
                    echo "<center>Sorry. But I do not see any posts in the 'Video Article' category</center>";
                endif ?>
                </li>
            </ul>
        </div>
    </div>
    <div id="newsroom">
        <div class="wrapper">
            <h2 class="section_title">Et harum quidem rerum facilis</h2>
            <div class="section_title_line"></div>
            <ul>
                <?php
                //@TODO: turn into slider
                $query = new WP_Query( [
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'orderby' => 'post_date',
                ] );

                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                        <li>
                            <div class="title"><a href="<?=get_the_permalink()?>" title="<?=get_the_title()?>"><?=get_the_title()?></a></div>
                            <div class="excerpt"><?=wp_trim_words( get_the_content(), 100, '...' );?></div>
                            <a class="caret" href="<?=get_the_permalink()?>" title="<?=get_the_title()?>">read more</a>
                    <?php endwhile; wp_reset_query();
                else :
                    echo "<center>Sorry. But I do not see any posts in the 'Video Article' category</center>";
                endif ?>
                        </li>
            </ul>
        </div>
    </div>
</main>

<?php get_footer(); ?>