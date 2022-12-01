<?php


if (!function_exists('wellco_get_header_top_cpt_elementor_wpb_shortcodes_custom_css')) {
	/**
	 * Add VC inline css to body
	 */
	function wellco_get_header_top_cpt_elementor_wpb_shortcodes_custom_css() {
		$current_page_id = wellco_get_page_id();

		//Footer Widget Area
		//check if meta value is provided for this page or then get it from theme options
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_header_settings", 'headertop_cpt_elementor', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$params['header_top_cpt_post'] = $temp_meta_value;
		} else {
			$params['header_top_cpt_post'] = wellco_get_redux_option( 'header-settings-choose-header-top-cpt-elementor', 'default' );
		}


		//VC Custom CSS
		$shortcodes_custom_css = get_post_meta( $params['header_top_cpt_post'], '_wpb_shortcodes_custom_css', true );
		if ( ! empty( $shortcodes_custom_css ) ) {
			wp_add_inline_style( 'wellco-dynamic-style', $shortcodes_custom_css );
		}


	}
	add_action( 'wp_enqueue_scripts', 'wellco_get_header_top_cpt_elementor_wpb_shortcodes_custom_css' );
}


if (!function_exists('wellco_header_logo_maximum_width')) {
	/**
	 * Generate CSS codes for Maximum logo width
	 */
	function wellco_header_logo_maximum_width() {
		global $wellco_redux_theme_opt;
		$var_name = 'logo-settings-maximum-logo-width';
		$declaration = array();
		$selector = array(
			'header#header .menuzord-brand img'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}


		$declaration['max-width'] = $wellco_redux_theme_opt[$var_name].'px';
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_logo_maximum_width');
}


if (!function_exists('wellco_header_logo_maximum_height')) {
	/**
	 * Generate CSS codes for Maximum logo height
	 */
	function wellco_header_logo_maximum_height() {
		global $wellco_redux_theme_opt;
		$var_name = 'logo-settings-maximum-logo-height';
		$declaration = array();
		$selector = array(
			'header#header .menuzord-brand img'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}


		$declaration['max-height'] = $wellco_redux_theme_opt[$var_name].'px';
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_logo_maximum_height');
}


if (!function_exists('wellco_header_logo_maximum_height_in_sticky_mode')) {
	/**
	 * Generate CSS codes for Maximum logo height in Sticky Mode
	 */
	function wellco_header_logo_maximum_height_in_sticky_mode() {
		global $wellco_redux_theme_opt;
		$var_name = 'logo-settings-maximum-logo-height-in-sticky-mode';
		$declaration = array();
		$selector = array(
			'header#header .header-nav-wrapper.tm-sticky-menu .menuzord-brand img'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}


		$declaration['max-height'] = $wellco_redux_theme_opt[$var_name].'px';
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_logo_maximum_height_in_sticky_mode');
}




if (!function_exists('wellco_header_logo_margin_around_it')) {
	/**
	 * Generate CSS codes for logo margin
	 */
	function wellco_header_logo_margin_around_it() {
		global $wellco_redux_theme_opt;
		//margin around it
		$var_name = 'logo-settings-logo-margin-around';
		$declaration = array();
		$selector = array(
			'header#header .menuzord-brand'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		//added margin into the container.
		if( $wellco_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $wellco_redux_theme_opt[$var_name]['margin-top'] != "" ) {
			$declaration['margin-top'] = $wellco_redux_theme_opt[$var_name]['margin-top'];
		}
		if( $wellco_redux_theme_opt[$var_name]['margin-right'] != "" ) {
			$declaration['margin-right'] = $wellco_redux_theme_opt[$var_name]['margin-right'];
		}
		if( $wellco_redux_theme_opt[$var_name]['margin-bottom'] != "" ) {
			$declaration['margin-bottom'] = $wellco_redux_theme_opt[$var_name]['margin-bottom'];
		}
		if( $wellco_redux_theme_opt[$var_name]['margin-left'] != "" ) {
			$declaration['margin-left'] = $wellco_redux_theme_opt[$var_name]['margin-left'];
		}
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_logo_margin_around_it');
}

if (!function_exists('wellco_header_logo_sticky_margin_around_it')) {
	/**
	 * Generate CSS codes for logo margin in sticky
	 */
	function wellco_header_logo_sticky_margin_around_it() {
		global $wellco_redux_theme_opt;
		//margin around it
		$var_name = 'logo-settings-logo-sticky-margin-around';
		$declaration = array();
		$selector = array(
			'header#header .header-nav-wrapper.tm-sticky-menu .menuzord-brand'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		//added margin into the container.
		if( $wellco_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $wellco_redux_theme_opt[$var_name]['margin-top'] != "" ) {
			$declaration['margin-top'] = $wellco_redux_theme_opt[$var_name]['margin-top'];
		}
		if( $wellco_redux_theme_opt[$var_name]['margin-right'] != "" ) {
			$declaration['margin-right'] = $wellco_redux_theme_opt[$var_name]['margin-right'];
		}
		if( $wellco_redux_theme_opt[$var_name]['margin-bottom'] != "" ) {
			$declaration['margin-bottom'] = $wellco_redux_theme_opt[$var_name]['margin-bottom'];
		}
		if( $wellco_redux_theme_opt[$var_name]['margin-left'] != "" ) {
			$declaration['margin-left'] = $wellco_redux_theme_opt[$var_name]['margin-left'];
		}
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_logo_sticky_margin_around_it');
}


if (!function_exists('wellco_header_nav_row_custom_background_color')) {
	/**
	 * Generate CSS codes for Header Navigation Row Custom Background Color
	 */
	function wellco_header_nav_row_custom_background_color() {
		global $wellco_redux_theme_opt;
		$var_name = 'header-settings-navigation-custom-bgcolor';
		$declaration = array();
		$selector = array(
			'header#header .header-nav .header-nav-container',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		if( $wellco_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		$header_layout_type = wellco_get_redux_option( 'header-settings-choose-header-layout-type' );
		if( $header_layout_type == 'header-vertical-nav' ) {
			$selector = array(
				'body.tm-vertical-nav header#header',
			);
		}

		$declaration['background-color'] = $wellco_redux_theme_opt[$var_name];
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_nav_row_custom_background_color');
}



if (!function_exists('wellco_header_nav_row_nav_item_font_size')) {
	/**
	 * Generate CSS codes for Main Nav Item Font Size
	 */
	function wellco_header_nav_row_nav_item_font_size() {
		global $wellco_redux_theme_opt;
		$var_name = 'header-settings-navigation-item-font-size';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu > li > a'
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
}


if (!function_exists('wellco_header_nav_row_nav_dropdown_menu_width')) {
	/**
	 * Generate CSS codes for Dropdown Menu Width(px)
	 */
	function wellco_header_nav_row_nav_dropdown_menu_width() {
		global $wellco_redux_theme_opt;
		$var_name = 'header-settings-navigation-skin-dropdown-menu-width';
		$declaration = array();
		$selector = array(
			'.menuzord-menu ul.dropdown',
			'.menuzord-menu ul.dropdown li ul.dropdown',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}


		$declaration['min-width'] = $wellco_redux_theme_opt[$var_name].'px';
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_nav_row_nav_dropdown_menu_width');
}

if (!function_exists('wellco_header_nav_row_nav_item_typography')) {
	/**
	 * Generate CSS codes for Main Nav Item Typography
	 */
	function wellco_header_nav_row_nav_item_typography() {
		global $wellco_redux_theme_opt;
		$var_name = 'header-settings-navigation-item-typography';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu > li > a'
		);

		$declaration = wellco_redux_option_field_typography( $var_name );
		wellco_dynamic_css_generator($selector, $declaration);




		//hover color
		$var_name = 'header-settings-navigation-item-hover-color';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu > li:hover > a',
			'#top-primary-nav .menuzord-menu > li.active > a'
		);

		if( $wellco_redux_theme_opt[$var_name] != '' ) {
			$declaration['color'] = $wellco_redux_theme_opt[$var_name];
			wellco_dynamic_css_generator($selector, $declaration);
		}
		


		//padding around it
		$var_name = 'header-settings-navigation-item-padding';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu > li'
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
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_nav_row_nav_item_typography');
}


if (!function_exists('wellco_header_nav_row_nav_item_dropdown_typography')) {
	/**
	 * Generate CSS codes for Main Nav Item dropdown Typography
	 */
	function wellco_header_nav_row_nav_item_dropdown_typography() {
		global $wellco_redux_theme_opt;
		$var_name = 'header-settings-navigation-item-dropdown-typography';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu ul.dropdown li a'
		);

		$declaration = wellco_redux_option_field_typography( $var_name );
		wellco_dynamic_css_generator($selector, $declaration);

		//hover color
		$var_name = 'header-settings-navigation-item-dropdown-hover-color';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu ul.dropdown li:hover > .menu-item-link:not(.tm-submenu-title)',
			'#top-primary-nav .menuzord-menu ul.dropdown li.active > .menu-item-link:not(.tm-submenu-title)'
		);

		if( $wellco_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		$declaration['color'] = $wellco_redux_theme_opt[$var_name];
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_nav_row_nav_item_dropdown_typography');
}


if (!function_exists('wellco_header_nav_row_nav_item_megamenu_dropdown_typography')) {
	/**
	 * Generate CSS codes for Main Nav Item megamenu dropdown Typography
	 */
	function wellco_header_nav_row_nav_item_megamenu_dropdown_typography() {
		global $wellco_redux_theme_opt;
		$var_name = 'header-settings-navigation-item-megamenu-dropdown-typography';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu > li > .megamenu .megamenu-row li a.menu-item-link'
		);

		$declaration = wellco_redux_option_field_typography( $var_name );
		wellco_dynamic_css_generator($selector, $declaration);

		//hover color
		$var_name = 'header-settings-navigation-item-megamenu-dropdown-hover-color';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu > li > .megamenu .megamenu-row li:hover > .menu-item-link:not(.tm-submenu-title)',
			'#top-primary-nav .menuzord-menu > li > .megamenu .megamenu-row li.active > .menu-item-link:not(.tm-submenu-title)'
		);

		if( $wellco_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		$declaration['color'] = $wellco_redux_theme_opt[$var_name];
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_nav_row_nav_item_megamenu_dropdown_typography');
}



if (!function_exists('wellco_header_nav_row_custom_nav_link_n_icon_color')) {
	/**
	 * Generate CSS codes for Header Navigation Row Link and Cart/Search/Side Push Icon Color
	 */
	function wellco_header_nav_row_custom_nav_link_n_icon_color() {
		global $wellco_redux_theme_opt;
		$var_name = 'header-settings-navigation-custom-navigation-link-n-icon-color';
		$declaration = array();
		
		$selector = array(
			'header#header .header-nav .header-nav-container .menuzord-menu > li > a',
			'header#header .header-nav .header-nav-container .search-icon',
			'header#header .header-nav .header-nav-container .mini-cart-icon',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $wellco_redux_theme_opt ) ) {
			return;
		}

		if( $wellco_redux_theme_opt[$var_name] == '' ) {
			return;
		}
		
		echo "@media (min-width: ". WELLCO_MENUZORD_MEGAMENU_BREAKPOINT_FW ."){";
		
		$declaration['color'] = $wellco_redux_theme_opt[$var_name];
		wellco_dynamic_css_generator($selector, $declaration);


		
		$header_layout_type = wellco_get_redux_option( 'header-settings-choose-header-layout-type' );
		if( $header_layout_type == 'header-vertical-nav' ) {
			$selector = array(
				'body.tm-vertical-nav header#header .vertical-nav-sidebar-widget-wrapper .widget',
				'body.tm-vertical-nav header#header .vertical-nav-sidebar-widget-wrapper .widget-title',
			);
			$declaration['color'] = $wellco_redux_theme_opt[$var_name];
			wellco_dynamic_css_generator($selector, $declaration);
		}


		//background color
		$selector = array(
			'header#header .header-nav .header-nav-container .hamburger-box .hamburger-inner',
			'header#header .header-nav .header-nav-container .hamburger-box .hamburger-inner:before',
			'header#header .header-nav .header-nav-container .hamburger-box .hamburger-inner:after',
		);
		$declaration['background-color'] = $wellco_redux_theme_opt[$var_name];
		wellco_dynamic_css_generator($selector, $declaration);
		
		echo "}";

	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_nav_row_custom_nav_link_n_icon_color');
}


if (!function_exists('wellco_header_navigation_vertical_navbar_width')) {
	/**
	 * Generate CSS codes for Vertical Nav Bar Width
	 */
	function wellco_header_navigation_vertical_navbar_width() {
		global $wellco_redux_theme_opt;
		$var_name = 'header-settings-navigation-vertical-navbar-width';
		$declaration = array();
		$selector = array(
			'body.tm-vertical-nav header#header'
		);
		
		$navbar_width = $wellco_redux_theme_opt[$var_name];
		$declaration['width'] = $navbar_width.'px';
		$dynamic_css_width = wellco_dynamic_css_generator($selector, $declaration, false);

		//margin left
		$declaration = array();
		$selector = array(
			'body.tm-vertical-nav .main-content',
			'body.tm-vertical-nav footer.footer'
		);
		$declaration['margin-left'] = $navbar_width.'px';
		$dynamic_css_margin_left = wellco_dynamic_css_generator($selector, $declaration, false);


		//container width
		$var_name = 'header-settings-navigation-vertical-nav-container-width';
		$declaration = array();

		$selector = array(
			'body.tm-vertical-nav .elementor-top-section.elementor-section-boxed>.elementor-container'
		);
		$container_width = $wellco_redux_theme_opt[$var_name];
		echo "@media (min-width: ". ($container_width + $navbar_width + 50) .'px' ."){";
		$declaration['max-width'] = $container_width.'px !important';
		$declaration['width'] = $container_width.'px !important';
		echo esc_attr( $dynamic_css_width );
		echo esc_attr( $dynamic_css_margin_left );
		wellco_dynamic_css_generator($selector, $declaration);
		echo "}";

	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_navigation_vertical_navbar_width');
}


if (!function_exists('wellco_header_navigation_vertical_nav_bgimg')) {
	/**
	 * Generate CSS codes for Background Image for Vertical Nav
	 */
	function wellco_header_navigation_vertical_nav_bgimg() {
		global $wellco_redux_theme_opt;
		$var_name = 'header-settings-navigation-vertical-nav-bgimg';
		$declaration = array();
		$selector = array(
			'body.tm-vertical-nav header#header'
		);

		$declaration = wellco_redux_option_field_background( $var_name );
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_navigation_vertical_nav_bgimg');
}



if (!function_exists('wellco_header_navigation_vertical_nav_widget_title_typography')) {
	/**
	 * Generate CSS codes for Header vertical-nav Widget Text Typography
	 */
	function wellco_header_navigation_vertical_nav_widget_title_typography() {
		global $wellco_redux_theme_opt;
		$var_name = 'header-settings-navigation-vertical-nav-widget-title-typography';
		$declaration = array();
		$selector = array(
			'body.tm-vertical-nav header#header .header-nav .widget .widget-title'
		);

		$declaration = wellco_redux_option_field_typography( $var_name );
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_navigation_vertical_nav_widget_title_typography');
}

if (!function_exists('wellco_header_navigation_vertical_nav_widget_text_typography')) {
	/**
	 * Generate CSS codes for Header vertical-nav Widget Text Typography
	 */
	function wellco_header_navigation_vertical_nav_widget_text_typography() {
		global $wellco_redux_theme_opt;
		$var_name = 'header-settings-navigation-vertical-nav-widget-text-typography';
		$declaration = array();
		$selector = array(
			'body.tm-vertical-nav header#header .header-nav .widget'
		);

		$declaration = wellco_redux_option_field_typography( $var_name );
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_navigation_vertical_nav_widget_text_typography');
}

if (!function_exists('wellco_header_navigation_vertical_nav_widget_link_typography')) {
	/**
	 * Generate CSS codes for Header vertical-nav Widget Link Typography
	 */
	function wellco_header_navigation_vertical_nav_widget_link_typography() {
		global $wellco_redux_theme_opt;
		$var_name = 'header-settings-navigation-vertical-nav-widget-link-typography';
		$declaration = array();
		$selector = array(
			'body.tm-vertical-nav header#header .header-nav .widget a'
		);

		$declaration = wellco_redux_option_field_typography( $var_name );
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_navigation_vertical_nav_widget_link_typography');
}

if (!function_exists('wellco_header_navigation_vertical_nav_widget_link_hover_color')) {
	/**
	 * Generate CSS codes for Header vertical-nav Widget Link Hover Color
	 */
	function wellco_header_navigation_vertical_nav_widget_link_hover_color() {
		global $wellco_redux_theme_opt;
		$var_name = 'header-settings-navigation-vertical-nav-widget-link-hover-color';
		$declaration = array();
		$selector = array(
			'body.tm-vertical-nav header#header .header-nav .widget a:hover'
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
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_navigation_vertical_nav_widget_link_hover_color');
}






if (!function_exists('wellco_header_navigation_side_push_panel_width')) {
	/**
	 * Generate CSS codes for Side push panel Bar Width
	 */
	function wellco_header_navigation_side_push_panel_width() {
		global $wellco_redux_theme_opt;
		$var_name = 'header-settings-navigation-side-push-panel-width';
		$declaration = array();
		$selector = array(
			'.side-panel-container'
		);
		
		$navbar_width = $wellco_redux_theme_opt[$var_name];
		$declaration['width'] = $navbar_width.'px';
		$dynamic_css_width = wellco_dynamic_css_generator($selector, $declaration, false);

		//right or left
		$declaration = array();
		$selector = array(
			'.side-panel-container'
		);
		$declaration['right'] = '-'.$navbar_width.'px';
		$dynamic_css_pos_right = wellco_dynamic_css_generator($selector, $declaration, false);

		echo "@media (min-width: 1200px){";
		echo esc_attr( $dynamic_css_width );
		echo esc_attr( $dynamic_css_pos_right );
		echo "}";

	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_navigation_side_push_panel_width');
}


if (!function_exists('wellco_header_navigation_side_push_panel_bgimg')) {
	/**
	 * Generate CSS codes for Background Image for Side push panel
	 */
	function wellco_header_navigation_side_push_panel_bgimg() {
		global $wellco_redux_theme_opt;
		$var_name = 'header-settings-navigation-side-push-panel-bgimg';
		$declaration = array();
		$selector = array(
			'.side-panel-container'
		);

		$declaration = wellco_redux_option_field_background( $var_name );
		wellco_dynamic_css_generator($selector, $declaration);
	}
	add_action('wellco_dynamic_css_generator_action', 'wellco_header_navigation_side_push_panel_bgimg');
}