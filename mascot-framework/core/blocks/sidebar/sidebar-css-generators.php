<?php

if (!function_exists('wellco_sidebar_padding')) {
	/**
	 * Generate CSS codes for Sidebar Padding
	 */
	function wellco_sidebar_padding() {
		global $wellco_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-padding';
		$declaration = array();
		$selector = array(
			'.sidebar-area'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		//added padding into the container.
		if( $wellco_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $wellco_redux_theme_opt[$var_name]['padding-top'] != "" ) {
			$declaration['padding-top'] = $wellco_redux_theme_opt[$var_name]['padding-top'];
		}
		if( $wellco_redux_theme_opt[$var_name]['padding-right'] != "" ) {
			$declaration['padding-right'] = $wellco_redux_theme_opt[$var_name]['padding-right'];
		}
		if( $wellco_redux_theme_opt[$var_name]['padding-bottom'] != "" ) {
			$declaration['padding-bottom'] = $wellco_redux_theme_opt[$var_name]['padding-bottom'];
		}
		if( $wellco_redux_theme_opt[$var_name]['padding-left'] != "" ) {
			$declaration['padding-left'] = $wellco_redux_theme_opt[$var_name]['padding-left'];
		}
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_sidebar_padding');
}


if (!function_exists('wellco_sidebar_bg_color')) {
	/**
	 * Generate CSS codes for Sidebar Background Color
	 */
	function wellco_sidebar_bg_color() {
		global $wellco_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-bg-color';
		$declaration = array();
		$selector = array(
			'.sidebar-area'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		if( $wellco_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		$declaration['background-color'] = $wellco_redux_theme_opt[$var_name];
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_sidebar_bg_color');
}


if (!function_exists('wellco_sidebar_text_align')) {
	/**
	 * Generate CSS codes for Sidebar Text Alignment
	 */
	function wellco_sidebar_text_align() {
		global $wellco_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-text-align';
		$declaration = array();
		$selector = array(
			'.sidebar-area'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		if( $wellco_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		$declaration['text-align'] = $wellco_redux_theme_opt[$var_name];
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_sidebar_text_align');
}





if (!function_exists('wellco_sidebar_title_padding')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Padding
	 */
	function wellco_sidebar_title_padding() {
		global $wellco_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-padding';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		//added padding into the container.
		if( $wellco_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $wellco_redux_theme_opt[$var_name]['padding-top'] != "" ) {
			$declaration['padding-top'] = $wellco_redux_theme_opt[$var_name]['padding-top'];
		}
		if( $wellco_redux_theme_opt[$var_name]['padding-right'] != "" ) {
			$declaration['padding-right'] = $wellco_redux_theme_opt[$var_name]['padding-right'];
		}
		if( $wellco_redux_theme_opt[$var_name]['padding-bottom'] != "" ) {
			$declaration['padding-bottom'] = $wellco_redux_theme_opt[$var_name]['padding-bottom'];
		}
		if( $wellco_redux_theme_opt[$var_name]['padding-left'] != "" ) {
			$declaration['padding-left'] = $wellco_redux_theme_opt[$var_name]['padding-left'];
		}
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_sidebar_title_padding');
}


if (!function_exists('wellco_sidebar_title_bg_color')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Background Color
	 */
	function wellco_sidebar_title_bg_color() {
		global $wellco_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-bg-color';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		if( $wellco_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		$declaration['background-color'] = $wellco_redux_theme_opt[$var_name];
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_sidebar_title_bg_color');
}


if (!function_exists('wellco_sidebar_title_text_color')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Text Color
	 */
	function wellco_sidebar_title_text_color() {
		global $wellco_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-text-color';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		if( $wellco_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		$declaration['color'] = $wellco_redux_theme_opt[$var_name];
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_sidebar_title_text_color');
}


if (!function_exists('wellco_sidebar_title_font_size')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Font Size
	 */
	function wellco_sidebar_title_font_size() {
		global $wellco_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-font-size';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		if( $wellco_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		$declaration['font-size'] = $wellco_redux_theme_opt[$var_name] . 'px';
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_sidebar_title_font_size');
}


if (!function_exists('wellco_sidebar_title_line_bottom_color')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Line Bottom Color
	 */
	function wellco_sidebar_title_line_bottom_color() {
		global $wellco_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-line-bottom-color';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title.widget-title-line-bottom:after'
		);

		if( !wellco_get_redux_option( 'sidebar-settings-sidebar-title-show-line-bottom' ) ) {
			return;
		}

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		if( $wellco_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		$declaration['background-color'] = $wellco_redux_theme_opt[$var_name];
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_sidebar_title_line_bottom_color');
}