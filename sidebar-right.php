<?php
/**
 * The template for the right sidebar
 */

$sidebar = wellco_get_sidebar( 'right' );

if ( is_active_sidebar( $sidebar )  ) :
	dynamic_sidebar( $sidebar );
endif;

