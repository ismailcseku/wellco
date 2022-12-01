<?php


if (!function_exists('wellco_title_area_padding_top_bottom')) {
	/**
	 * Generate CSS codes for Boxed Layout - Padding Top & Bottom
	 */
	function wellco_title_area_padding_top_bottom() {
		global $wellco_redux_theme_opt;
		$var_name = 'page-title-settings-container-padding-top-bottom';
		$declaration = array();
		$selector = array(
			'.tm-page-title > .container',
			'.tm-page-title > .container-fluid',
		);
		
		if( ! wellco_get_redux_option( 'page-title-settings-enable-custom-padding-top-bottom' ) ) {
			return;
		}

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		//if Page Layout boxed
		$padding_top = $wellco_redux_theme_opt[$var_name]['padding-top'];
		$padding_bottom = $wellco_redux_theme_opt[$var_name]['padding-bottom'];

		if( !empty( $padding_top ) && $padding_top != "" ) {
			$padding_top = wellco_remove_suffix( $padding_top, 'px');
			$declaration['padding-top'] = $padding_top . 'px';
		}
		if( !empty( $padding_bottom ) && $padding_bottom != "" ) {
			$padding_bottom = wellco_remove_suffix( $padding_bottom, 'px');
			$declaration['padding-bottom'] = $padding_bottom . 'px';
		}

		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_title_area_padding_top_bottom');
}

if (!function_exists('wellco_title_area_top_border_color')) {
	/**
	 * Generate CSS codes for Page Title Top Border Color
	 */
	function wellco_title_area_top_border_color() {
		global $wellco_redux_theme_opt;
		$var_name = 'page-title-settings-top-border-color';
		$declaration = array();
		$selector = array(
			'.tm-page-title',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		if( $wellco_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		$declaration['border-top'] = '3px solid ' . $wellco_redux_theme_opt[$var_name];
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_title_area_top_border_color');
}

if (!function_exists('wellco_title_area_bottom_border_color')) {
	/**
	 * Generate CSS codes for Page Title Bottom Border Color
	 */
	function wellco_title_area_bottom_border_color() {
		global $wellco_redux_theme_opt;
		$var_name = 'page-title-settings-bottom-border-color';
		$declaration = array();
		$selector = array(
			'.tm-page-title',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		if( $wellco_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		$declaration['border-bottom'] = '3px solid ' . $wellco_redux_theme_opt[$var_name];
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_title_area_bottom_border_color');
}

if (!function_exists('wellco_title_area_bg')) {
	/**
	 * Generate CSS codes for Page Title Background
	 */
	function wellco_title_area_bg() {
		global $wellco_redux_theme_opt;
		$var_name = 'page-title-settings-bg';
		$declaration = array();
		$selector = array(
			'.tm-page-title'
		);

		//if video background on:
		if( wellco_get_redux_option( 'page-title-settings-bg-video-status' ) ) {
			return;
		}

		$declaration = wellco_redux_option_field_background( $var_name );
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_title_area_bg');
}

if (!function_exists('wellco_title_area_title_typography')) {
	/**
	 * Generate CSS codes for Page Title Title Typography
	 */
	function wellco_title_area_title_typography() {
		$var_name = 'page-title-settings-title-typography';
		$declaration = array();
		$selector = array(
			'.tm-page-title .title'
		);
		$declaration = wellco_redux_option_field_typography( $var_name );
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_title_area_title_typography');
}

if (!function_exists('wellco_title_area_title_margin_top_bottom')) {
	/**
	 * Generate CSS codes for Page Title Title Margin Top & Bottom
	 */
	function wellco_title_area_title_margin_top_bottom() {
		global $wellco_redux_theme_opt;
		$var_name = 'page-title-settings-title-margin-top-bottom';
		$declaration = array();
		$selector = array(
			'.tm-page-title .title'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		if( $wellco_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		if( $wellco_redux_theme_opt[$var_name]['margin-top'] != "" ) {
			$declaration['margin-top'] = $wellco_redux_theme_opt[$var_name]['margin-top'];
		}
		if( $wellco_redux_theme_opt[$var_name]['margin-bottom'] != "" ) {
			$declaration['margin-bottom'] = $wellco_redux_theme_opt[$var_name]['margin-bottom'];
		}
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_title_area_title_margin_top_bottom');
}


if (!function_exists('wellco_title_area_subtitle_typography')) {
	/**
	 * Generate CSS codes for Page Title Title Typography
	 */
	function wellco_title_area_subtitle_typography() {
		$var_name = 'page-title-settings-subtitle-typography';
		$declaration = array();
		$selector = array(
			'.tm-page-title .subtitle'
		);
		$declaration = wellco_redux_option_field_typography( $var_name );
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_title_area_subtitle_typography');
}

if (!function_exists('wellco_title_area_subtitle_margin_top_bottom')) {
	/**
	 * Generate CSS codes for Page Title Title Margin Top & Bottom
	 */
	function wellco_title_area_subtitle_margin_top_bottom() {
		global $wellco_redux_theme_opt;
		$var_name = 'page-title-settings-subtitle-margin-top-bottom';
		$declaration = array();
		$selector = array(
			'.tm-page-title .subtitle'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		if( $wellco_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		if( $wellco_redux_theme_opt[$var_name]['margin-top'] != "" ) {
			$declaration['margin-top'] = $wellco_redux_theme_opt[$var_name]['margin-top'];
		}
		if( $wellco_redux_theme_opt[$var_name]['margin-bottom'] != "" ) {
			$declaration['margin-bottom'] = $wellco_redux_theme_opt[$var_name]['margin-bottom'];
		}
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_title_area_subtitle_margin_top_bottom');
}


if (!function_exists('wellco_title_area_breadcrumbs_typography')) {
	/**
	 * Generate CSS codes for Page Title Title Typography
	 */
	function wellco_title_area_breadcrumbs_typography() {
		$var_name = 'page-title-settings-breadcrumbs-typography';
		$declaration = array();
		$selector = array(
			'.tm-page-title .breadcrumbs',
			'.tm-page-title .breadcrumbs a',
			'.tm-page-title .breadcrumbs span',
			'.tm-page-title .breadcrumbs > span'
		);
		$declaration = wellco_redux_option_field_typography( $var_name );
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_title_area_breadcrumbs_typography');
}


if (!function_exists('wellco_title_area_breadcrumbs_last_child_text_color')) {
	/**
	 * Generate CSS codes for Page Title Breadcrumbs Seperator Color
	 */
	function wellco_title_area_breadcrumbs_last_child_text_color() {
		global $wellco_redux_theme_opt;
		$var_name = 'page-title-settings-breadcrumbs-last-child-text-color';
		$declaration = array();
		$selector = array(
			'.tm-page-title .breadcrumbs li.trail-end span'
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
	add_action('wellco_dynamic_css_generator_action', 'wellco_title_area_breadcrumbs_last_child_text_color');
}


if (!function_exists('wellco_title_area_breadcrumbs_seperator_color')) {
	/**
	 * Generate CSS codes for Page Title Breadcrumbs Seperator Color
	 */
	function wellco_title_area_breadcrumbs_seperator_color() {
		global $wellco_redux_theme_opt;
		$var_name = 'page-title-settings-breadcrumbs-seperator-color';
		$declaration = array();
		$selector = array(
			'.tm-page-title .breadcrumbs > li + li::before'
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
	add_action('wellco_dynamic_css_generator_action', 'wellco_title_area_breadcrumbs_seperator_color');
}

if (!function_exists('wellco_title_area_breadcrumbs_link_hover_color')) {
	/**
	 * Generate CSS codes for Page Title Breadcrumbs Link Hover/Active Color
	 */
	function wellco_title_area_breadcrumbs_link_hover_color() {
		global $wellco_redux_theme_opt;
		$var_name = 'page-title-settings-breadcrumbs-link-hover-color';
		$declaration = array();
		$selector = array(
			'.tm-page-title .breadcrumbs li a:hover',
			'.tm-page-title .breadcrumbs li a:active',
			'.tm-page-title .breadcrumbs li a.active',
			'.tm-page-title .breadcrumbs .active span'
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
	add_action('wellco_dynamic_css_generator_action', 'wellco_title_area_breadcrumbs_link_hover_color');
}