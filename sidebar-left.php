<?php
/**
 * The template for the left sidebar
 */

$sidebar = wellco_get_sidebar( 'left' );

if ( is_active_sidebar( $sidebar )  ) :
	dynamic_sidebar( $sidebar );
endif;

