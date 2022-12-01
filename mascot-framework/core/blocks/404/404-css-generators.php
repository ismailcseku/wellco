<?php

if (!function_exists('wellco_404_title_typography')) {
	/**
	 * Generate CSS codes for Title Typography
	 */
	function wellco_404_title_typography() {
		$var_name = '404-page-settings-title-typography';
		$declaration = array();
		$selector = array(
			'.page-404-wrapper .title'
		);
		$declaration = wellco_redux_option_field_typography( $var_name );
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_404_title_typography');
}


if (!function_exists('wellco_404_title_margin_top_bottom')) {
	/**
	 * Generate CSS codes for Title Margin Top & Bottom
	 */
	function wellco_404_title_margin_top_bottom() {
		global $wellco_redux_theme_opt;
		$var_name = '404-page-settings-title-margin-top-bottom';
		$declaration = array();
		$selector = array(
			'.page-404-wrapper .title'
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
	add_action('wellco_dynamic_css_generator_action', 'wellco_404_title_margin_top_bottom');
}



if (!function_exists('wellco_404_content_typography')) {
	/**
	 * Generate CSS codes for Content Typography
	 */
	function wellco_404_content_typography() {
		$var_name = '404-page-settings-content-typography';
		$declaration = array();
		$selector = array(
			'.page-404-wrapper .content',
			'.page-404-wrapper .content p'
		);
		$declaration = wellco_redux_option_field_typography( $var_name );
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_404_content_typography');
}


if (!function_exists('wellco_404_content_margin_top_bottom')) {
	/**
	 * Generate CSS codes for Content Margin Top & Bottom
	 */
	function wellco_404_content_margin_top_bottom() {
		global $wellco_redux_theme_opt;
		$var_name = '404-page-settings-content-margin-top-bottom';
		$declaration = array();
		$selector = array(
			'.page-404-wrapper .content p'
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
	add_action('wellco_dynamic_css_generator_action', 'wellco_404_content_margin_top_bottom');
}


if (!function_exists('wellco_404_bg')) {
	/**
	 * Generate CSS codes for Widget Footer Background
	 */
	function wellco_404_bg() {
		$var_name = '404-page-settings-bg';
		$declaration = array();
		$selector = array(
			'.page-404-wrapper'
		);

		if( wellco_get_redux_option( '404-page-settings-custom-background-status' ) ) {
			$declaration = wellco_redux_option_field_background( $var_name );
			wellco_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_404_bg');
}



if (!function_exists('wellco_404_helpful_links_heading_typography')) {
	/**
	 * Generate CSS codes for Helpful Links Heading Typography
	 */
	function wellco_404_helpful_links_heading_typography() {
		$var_name = '404-page-settings-helpful-links-heading-typography';
		$declaration = array();
		$selector = array(
			'.page-404-wrapper .helpful-links .heading'
		);
		$declaration = wellco_redux_option_field_typography( $var_name );
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_404_helpful_links_heading_typography');
}



if (!function_exists('wellco_404_helpful_links_typography')) {
	/**
	 * Generate CSS codes for Helpful Links Typography
	 */
	function wellco_404_helpful_links_typography() {
		$var_name = '404-page-settings-helpful-links-typography';
		$declaration = array();
		$selector = array(
			'.page-404-wrapper .helpful-links .page-404-helpful-links-nav li a'
		);
		$declaration = wellco_redux_option_field_typography( $var_name );
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_404_helpful_links_typography');
}



if (!function_exists('wellco_404_search_box_heading_typography')) {
	/**
	 * Generate CSS codes for Search Box Heading Typography
	 */
	function wellco_404_search_box_heading_typography() {
		$var_name = '404-page-settings-search-box-heading-typography';
		$declaration = array();
		$selector = array(
			'.page-404-wrapper .search-box .heading'
		);
		$declaration = wellco_redux_option_field_typography( $var_name );
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_404_search_box_heading_typography');
}



if (!function_exists('wellco_404_search_box_paragraph_typography')) {
	/**
	 * Generate CSS codes for Search Box Paragraph Typography
	 */
	function wellco_404_search_box_paragraph_typography() {
		$var_name = '404-page-settings-search-box-paragraph-typography';
		$declaration = array();
		$selector = array(
			'.page-404-wrapper .search-box .paragraph',
			'.page-404-wrapper .search-box .paragraph p'
		);
		$declaration = wellco_redux_option_field_typography( $var_name );
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_404_search_box_paragraph_typography');
}