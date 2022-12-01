<?php
/**
 * Template Name: Full Width
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

wellco_get_title_area_parts();

wellco_get_page( 'container-fluid pt-0 pb-0', 'no-sidebar' );

get_footer();
