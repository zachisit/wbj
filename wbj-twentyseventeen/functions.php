<?php
/**
 * whistle-blower-justice functions and definitions
 *
 * @package whistle-blower-justice
 */

require_once "shortcodes/sitemap.php";

/**
 * Widgetize Theme
 */
function theme_widgets_init()
{
    register_sidebar( [
        'name' => 'Internal Sidebar',
        'id'   => 'internal-sidebar',
        'description'   => 'Widgetized sidebar for all internal pages.',
        'before_widget' => '<div class="widgetblock">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ] );

    //additional sidebars here
}
add_action( 'widgets_init', 'theme_widgets_init' );

/**
 * Declare Theme Menus
 */
register_nav_menus( [
    'header_menu' => 'Header Main Navigation Menu',
    'footer_menu' => 'Footer Main Navigation Menu',
] );

/**
 * Theme CSS and JS Scripts
 */
function theme_scripts()
{
    //normalize
    wp_enqueue_script('jquery');

    //css
    wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
    wp_enqueue_style( get_template_directory_uri() . 'main.scss' );
    wp_enqueue_style( 'site_font_montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,700');
    wp_enqueue_style( 'site_font_lora', 'https://fonts.googleapis.com/css?family=Lora:400,400i,700');
    wp_enqueue_style( 'site_font_open_sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800');
    wp_enqueue_style( 'slick_carousel_css', 'https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css');
    wp_enqueue_style( 'slick_carousell_theme_css' , 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.min.css' );
    wp_enqueue_style( 'slick_css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css' );

    //js
    wp_enqueue_script( 'preload_directory', get_template_directory_uri() . '/js/preload_directory.js',  time() );
    wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/966d4a5f64.js', time() );
    wp_enqueue_script( 'mobile-menu', get_template_directory_uri() . '/js/mobile_menu.js', time(), true );
    wp_enqueue_script( 'videoWrapper', get_template_directory_uri() . '/js/videoWrapper.js',  time() );
    wp_enqueue_script( 'smooth_scroll', get_template_directory_uri() . '/js/smooth_scroll.js',  time() );
    wp_enqueue_script( 'pdf_css_icon_add', get_template_directory_uri() . '/js/pdf_css_icon_add.js', time() );
    wp_enqueue_script( 'slick_carousel_js', 'https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', time(), true );
    wp_enqueue_script( 'slick_slider', get_template_directory_uri() . '/js/slick_slider.js', time() );

    //localized
    wp_localize_script('preload_directory', 'ajax', [
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('preload_directory')
    ]);
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/**
 * Remove auto-linking of upload image in Media Library
 */
function theme_imagelink_setup() {
    $image_set = get_option( 'image_default_link_type' );

    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}
add_action('admin_init', 'theme_imagelink_setup', 10);

/**
 * Login Screen CSS
 */
function theme_login_script()
{
    wp_enqueue_style( 'login_custom_style', get_stylesheet_directory_uri(). '/login_view.css', ['login'] );
}
add_action( 'login_enqueue_scripts', 'theme_login_script', 1 );

/**
 * Admin CSS and JS
 */
function theme_admin_script()
{
    //css
    wp_enqueue_style( 'theme_admin_css', get_template_directory_uri() . '/admin.css' );

    //scss
    wp_enqueue_style( get_template_directory_uri() . 'admin.scss' );
}
add_action( 'admin_enqueue_scripts', 'theme_admin_script');

/**
 * Featured images in Page Edit
 */
add_theme_support( 'post-thumbnails' );

/**
 * Template Engine
 * Takes a template file and populates it into a string that is returned
 * @param $templateFile
 * @param array $args
 * @return string
 */
function populate_template_file($templateFile, $args = [])
{
    ob_start(); //start output buffer

    $templateDirectory = dirname(__FILE__) . '/templates';
    $templateFile = $templateFile . '.template.php';
    //Confirm that template file exists
    if(file_exists($templateDirectory . '/' . $templateFile)){
        extract($args); //populate args into variables
        include $templateDirectory . '/' . $templateFile; //Include template file, make sure you are passing the required variables.
    }

    return ob_get_clean();
}

/**
 * Preloading Directory of Files
 * preload entire dir
 * @return: json encoded string
 */
function wbj_theme_preload_dir() {
    header( 'Content-type: application/json' );

    $filenameArray = [];
    $templatePath = get_template_directory_uri();

    $handle = opendir(dirname(realpath(__FILE__)). '/images/preload/');

    while($file = readdir($handle)){
        if($file !== '.' && $file !== '..'){
            array_push($filenameArray, "$templatePath/images/preload/$file");
        }
    }

    echo json_encode($filenameArray);

    wp_die();//need to do at end of ajax calls to stop
}

add_action('wp_ajax_preload_images_directory', 'wbj_theme_preload_dir');
add_action('wp_ajax_nopriv_preload_images_directory', 'wbj_theme_preload_dir');

/**
 * Convert Normal YouTube link into embed code
 * Turns - https://www.youtube.com/watch?v=Aq-d4CET3rY
 * into - Aq-d4CET3rY
 * @param $youtube_url
 * @return mixed
 */
function youtube_url_to_embed($youtube_url) {
    $search = '/youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';
    $replace = "youtube.com/embed/$1";
    $embed_url = preg_replace($search,$replace,$youtube_url);
    return $embed_url;
}

/**
 * Featured Image
 * Return a featured image in a post, or return placeholder
 * @return string
 */
function page_header_image() {
    /**
     * set to only return fallback image
     * until we set up second featured image
     *

     $tub = get_the_post_thumbnail(null, 'full');

    echo '<div id="article_banner">';
    if (empty($tub)) {
        echo "<img src='"
            . get_template_directory_uri()
            . "/images/preload/featured_image_placeholder.png' alt='"
            . get_the_title()
            . "' />";

    } else {
        echo $tub;
    }*/

    echo '<div id="article_banner">';
    echo "<img src='"
        . get_template_directory_uri()
        . "/images/preload/featured_image_placeholder.png' alt='"
        . get_the_title()
        . "' />";
    echo '</div>';
}

/**
 * Return Related articles
 * used primarily on single post articles
 * @TODO:ability to pipe in category
 */
function single_related_articles() {
    $query = new WP_Query( [
        'post_type' => 'post',
        'posts_per_page' => 4,
        'orderby'   => 'rand',
    ] );

    if ( $query->have_posts() ) :
        echo '<ul>';
        while ( $query->have_posts() ) : $query->the_post(); ?>
            <li>
                <?=get_the_post_thumbnail() ?>
                <div class="title"><a href="<?=get_the_permalink()?>" title="<?=get_the_title()?>"><?=get_the_title()?></a></div></li>
        <?php endwhile; wp_reset_query();
        echo '</ul>';
        endif;
}

/**
 * Return Random Articles
 *
 * used primarily in sidebar to return list of random articles
 *
 * /@TODO:possibly move into shortcode
 */
function return_random_articles() {
    $query = new WP_Query( [
        'post_type' => 'post',
        'posts_per_page' => 10,
        'orderby'   => 'rand',
    ] );

    if ( $query->have_posts() ) :
        echo '<ul>';
        while ( $query->have_posts() ) : $query->the_post(); ?>
            <li>
                <a href="<?=get_the_permalink()?>" title="<?=get_the_title()?>"><?=get_the_title()?></a>
            </li>
        <?php endwhile;
        echo '</ul>';
        wp_reset_query();
        endif;
}