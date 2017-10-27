/**
 * File document_open_new_window.js
 *
 * check if any document links are in the
 * Projects sidebar and currently do not have
 * a target="_blank" tag set to the a links.
 *
 * this will help when client forgets to set
 * the document links to open in new window,
 * and will serve as a fallback
 *
 * dependecies:
 * jquery
 *
 * version:
 * 1.0.0
 *
 */
jQuery(document).ready(function($) {
    $('a[href$=".pdf"]').attr('target', '_blank');
});