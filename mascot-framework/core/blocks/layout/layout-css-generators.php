<?php

if (!function_exists('wellco_layout_settings_boxed_layout_padding_top_bottom')) {
	/**
	 * Generate CSS codes for Boxed Layout - Padding Top & Bottom
	 */
	function wellco_layout_settings_boxed_layout_padding_top_bottom() {
		global $wellco_redux_theme_opt;
		$var_name = 'layout-settings-boxed-layout-padding-top-bottom';
		$declaration = array();
		$selector = array(
			'body.tm-boxed-layout',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		//if Page Layout boxed
		if( wellco_get_redux_option( 'layout-settings-page-layout' ) == 'boxed' ) {
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
		}

		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_layout_settings_boxed_layout_padding_top_bottom');
}


if (!function_exists('wellco_stretched_layout_background_color')) {
	/**
	 * Generate CSS codes for Stretched Layout - Background Color
	 */
	function wellco_stretched_layout_background_color() {
		global $wellco_redux_theme_opt;
		$var_name = 'layout-settings-stretched-layout-bg-bgcolor';
		$declaration = array();
		$selector = array(
			'body.tm-stretched-layout',
		);

		//if empty then return
		if( wellco_get_redux_option( 'layout-settings-page-layout' ) != 'stretched' ) {
			return;
		}
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		if( wellco_get_redux_option( 'layout-settings-boxed-layout-bg-type' ) == 'bg-color' ) {
			if( $wellco_redux_theme_opt[$var_name] != "" ) {
				$declaration['background-color'] = $wellco_redux_theme_opt[$var_name];
			}
			wellco_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_stretched_layout_background_color');
}


if (!function_exists('wellco_boxed_layout_background_color')) {
	/**
	 * Generate CSS codes for Boxed Layout - Background Color
	 */
	function wellco_boxed_layout_background_color() {
		global $wellco_redux_theme_opt;
		$var_name = 'layout-settings-boxed-layout-bg-type-bgcolor';
		$declaration = array();
		$selector = array(
			'body.tm-boxed-layout',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		if( wellco_get_redux_option( 'layout-settings-boxed-layout-bg-type' ) == 'bg-color' ) {
			if( $wellco_redux_theme_opt[$var_name] != "" ) {
				$declaration['background-color'] = $wellco_redux_theme_opt[$var_name];
			}
			wellco_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_boxed_layout_background_color');
}




if (!function_exists('wellco_boxed_layout_background_pattern')) {
	/**
	 * Generate CSS codes for Boxed Layout - Background Pattern
	 */
	function wellco_boxed_layout_background_pattern() {
		global $wellco_redux_theme_opt;
		$var_name = 'layout-settings-boxed-layout-bg-type-pattern';
		$declaration = array();
		$selector = array(
			'body.tm-boxed-layout',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		if( wellco_get_redux_option( 'layout-settings-boxed-layout-bg-type' ) == 'bg-patter' ) {
			if( $wellco_redux_theme_opt[$var_name] != "" ) {
				$declaration['background-image'] = 'url('.$wellco_redux_theme_opt[$var_name].')';
			}
			wellco_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_boxed_layout_background_pattern');
}


if (!function_exists('wellco_boxed_layout_bg')) {
	/**
	 * Generate CSS codes for Widget Footer Background
	 */
	function wellco_boxed_layout_bg() {
		global $wellco_redux_theme_opt;
		$var_name = 'layout-settings-boxed-layout-bg-type-bgimg';
		$declaration = array();
		$selector = array(
			'body.tm-boxed-layout',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		if( wellco_get_redux_option( 'layout-settings-boxed-layout-bg-type' ) == 'bg-image' ) {
			$declaration = wellco_redux_option_field_background( $var_name );
			wellco_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_boxed_layout_bg');
}

