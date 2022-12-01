<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */
$header_return_true_false = ( wellco_get_redux_option( '404-page-settings-show-header', true ) == true ) ? 'wellco_return_true' : 'wellco_return_false';
add_filter( 'wellco_filter_show_header', $header_return_true_false );

$footer_return_true_false = ( wellco_get_redux_option( '404-page-settings-show-footer', true ) == true ) ? 'wellco_return_true' : 'wellco_return_false';
add_filter( 'wellco_filter_show_footer', $footer_return_true_false );

get_header();

wellco_get_title_area_parts();

wellco_get_404_parts();

get_footer();
