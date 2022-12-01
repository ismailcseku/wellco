<?php	
/*
*
*	Mascot Framework Main Class
*	---------------------------------------
*	Mascot Framework v1.0
* 	Copyright Theme Mascot 2014 - http://www.thememascot.com
*
*/


/* TGM PLUGINS INCLUDED
================================================== */
require_once( WELLCO_FRAMEWORK_DIR . '/tgm/tgm-plugins-register.php' );


/* Core Utility Variables and Functions
================================================== */
require_once( WELLCO_FRAMEWORK_DIR . '/core/core-utility-variables-functions.php' );


/* REDUX OPTIONS FRAMEWORK DATA
================================================== */
if ( mascot_core_plugin_installed() && mascot_core_wellco_plugin_installed() && class_exists( 'ReduxFramework' ) && file_exists( WELLCO_FRAMEWORK_DIR . '/redux-framework/config.php' ) ) {
	require_once( WELLCO_FRAMEWORK_DIR . '/redux-framework/config.php' );
}

/* Breadcrumb Trail
================================================== */
if ( !function_exists( 'wellco_breadcrumb_trail' ) ) {
require_once( WELLCO_FRAMEWORK_DIR . '/lib/breadcrumbs.php' );
}


/* Custom Actions
================================================== */
require_once( WELLCO_FRAMEWORK_DIR . '/mascot-custom-action.php' );

/* Core Functions
================================================== */
require_once( WELLCO_FRAMEWORK_DIR . '/core/core-functions.php' );

/* Load Core Lib
================================================== */
require_once( WELLCO_FRAMEWORK_DIR . '/core/core-loader.php' );

/* Core Actions
================================================== */
require_once( WELLCO_FRAMEWORK_DIR . '/core/core-actions.php' );

/* Core Filters
================================================== */
require_once( WELLCO_FRAMEWORK_DIR . '/core/core-filters.php' );

/* Custom Nav Walker
================================================== */
require_once( WELLCO_FRAMEWORK_DIR . '/custom-nav-walker/sweet-custom-menu.php' );

// Register Custom Comment Walker
require_once( WELLCO_FRAMEWORK_DIR . '/lib/class-wp-bootstrap-comment-walker.php' );


/* One Click Demo Import
================================================== */
require_once( WELLCO_FRAMEWORK_DIR . '/tgm/demo-content-import.php' );


