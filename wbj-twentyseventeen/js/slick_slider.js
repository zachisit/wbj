/**
 * File slick_slider.js
 *
 * Initialize slider related to a css div
 *
 * dependencies:
 * slick slider
 * http://kenwheeler.github.io/slick/
 *
 * version:
 * 1.0.1
 *
 */

/**
 * Standard Slider Usage
 */
jQuery(document).ready(function($){
    $('#featured_article_slider').slick({
        slidesToShow:1,
        slidesToScroll:1,
        autoplay:true,
        dots:false,
        arrows:true,
        autoplaySpeed:5800
    });
});