<?php	
/*
*
*	Core Actions
*	---------------------------------------
*	Mascot Framework v1.0
* 	Copyright ThemeMascot 2017 - http://www.thememascot.com
*
*/


if(!function_exists('wellco_action_widgets_init')) {
	/**
	 * Init Widgets
	 */
	function wellco_action_widgets_init() {
	}
}


if(!function_exists('wellco_action_wp_head')) {
	/**
	 * Head Action
	 */
	function wellco_action_wp_head() {
		wellco_head_pingback();
		wellco_head_responsive_viewport();
		wellco_head_favicon();
		wellco_head_apple_touch_icons();
	}
}


if(!function_exists('wellco_head_pingback')) {
	/**
	 * link pingback
	 */
	function wellco_head_pingback() {
		if ( is_singular() && pings_open( get_queried_object() ) ) :?>

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<?php endif;
	}
}


if(!function_exists('wellco_head_responsive_viewport')) {
	/**
	 * Enable Responsive
	 */
	function wellco_head_responsive_viewport() {
		if( wellco_get_redux_option( 'general-settings-enable-responsive', true ) ) { ?>
			<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php } else { ?>
			<meta name="viewport" content="width=1140, user-scalable=yes">
		<?php }
	}
}


if(!function_exists('wellco_head_favicon')) {
	/**
	 * Add Favicon
	 */
	function wellco_head_favicon() {
		// Stop here if and icon was added via the customizer.
		if ( function_exists( 'has_site_icon' ) && has_site_icon() ) {
			return;
		}

		if( wellco_get_redux_option( 'general-settings-favicon', false, 'url' ) ) { ?>
			<link href="<?php echo esc_url( wellco_get_redux_option( 'general-settings-favicon', false, 'url' ) ); ?>" rel="shortcut icon">
		<?php } else { ?>
			<link href="<?php echo esc_url( WELLCO_ASSETS_URI . '/images/logo/favicon.png') ?>" rel="shortcut icon" type="image/png">
		<?php }
	}
}


if(!function_exists('wellco_head_apple_touch_icons')) {
	/**
	 * Add Apple Touch Icons 144x144, 114x114, 72x72, 32x32
	 */
	function wellco_head_apple_touch_icons() {
		//apple-touch-icon
		if( wellco_get_redux_option( 'general-settings-apple-touch-32', false, 'url' ) ) { ?>
			<link href="<?php echo esc_url( wellco_get_redux_option( 'general-settings-apple-touch-32', false, 'url' ) ); ?>" rel="apple-touch-icon">
		<?php } else { ?>
			<link href="<?php echo esc_url( WELLCO_ASSETS_URI . '/images/apple-touch-icon.png') ?>" rel="apple-touch-icon">
		<?php }
		
		//apple-touch-icon-72x72
		if( wellco_get_redux_option( 'general-settings-apple-touch-72', false, 'url' ) ) { ?>
			<link href="<?php echo esc_url( wellco_get_redux_option( 'general-settings-apple-touch-72', false, 'url' ) ); ?>" rel="apple-touch-icon" sizes="72x72">
		<?php } else { ?>
			<link href="<?php echo esc_url( WELLCO_ASSETS_URI . '/images/apple-touch-icon-72x72.png') ?>" rel="apple-touch-icon" sizes="72x72">
		<?php }
		
		//apple-touch-icon-114x114
		if( wellco_get_redux_option( 'general-settings-apple-touch-114', false, 'url' ) ) { ?>
			<link href="<?php echo esc_url( wellco_get_redux_option( 'general-settings-apple-touch-114', false, 'url' ) ); ?>" rel="apple-touch-icon" sizes="114x114">
		<?php } else { ?>
			<link href="<?php echo esc_url( WELLCO_ASSETS_URI . '/images/apple-touch-icon-114x114.png') ?>" rel="apple-touch-icon" sizes="114x114">
		<?php }
		
		//apple-touch-icon-144x144
		if( wellco_get_redux_option( 'general-settings-apple-touch-144', false, 'url' ) ) { ?>
			<link href="<?php echo esc_url( wellco_get_redux_option( 'general-settings-apple-touch-144', false, 'url' ) ); ?>" rel="apple-touch-icon" sizes="144x144">
		<?php } else { ?>
			<link href="<?php echo esc_url( WELLCO_ASSETS_URI . '/images/apple-touch-icon-144x144.png') ?>" rel="apple-touch-icon" sizes="144x144">
		<?php }
	}
}


if(!function_exists('wellco_action_wp_head_at_the_end')) {
	/**
	 * Head Action put code at the end
	 */
	function wellco_action_wp_head_at_the_end() {
		wellco_header_custom_html_js();
	}
}


if(!function_exists('wellco_header_custom_html_js')) {
	/**
	 * Custom HTML/JS Code (in Footer)
	 */
	function wellco_header_custom_html_js() {
		if( wellco_get_redux_option( 'custom-codes-custom-html-script-header' ) ) {
			echo "\n";
			echo wellco_get_redux_option( 'custom-codes-custom-html-script-header' );
			echo "\n";
		}
	}
}


if(!function_exists('wellco_action_wp_footer')) {
	/**
	 * Footer Action
	 */
	function wellco_action_wp_footer() {
		wellco_footer_enable_smooth_scroll();
		wellco_footer_enable_backtotop();
		wellco_footer_custom_html_js();
	}
}


if(!function_exists('wellco_footer_enable_smooth_scroll')) {
	/**
	 * Enable Smooth Scrolling
	 */
	function wellco_footer_enable_smooth_scroll() {
		if( wellco_get_redux_option( 'general-settings-smooth-scroll' ) ) {
		}
	}
}


if(!function_exists('wellco_footer_enable_backtotop')) {
	/**
	 * Enable Back To Top
	 */
	function wellco_footer_enable_backtotop() {
		if( wellco_get_redux_option( 'general-settings-enable-backtotop' ) ) { ?>
			<a class="scroll-to-top" href="<?php echo esc_url( '#' )?>"><i class="fa fa-angle-up"></i></a>
		<?php }
	}
}


if(!function_exists('wellco_footer_custom_html_js')) {
	/**
	 * Custom HTML/JS Code (in Footer)
	 */
	function wellco_footer_custom_html_js() {
		if( wellco_get_redux_option( 'custom-codes-custom-html-script-footer' ) ) {
			echo "\n";
			echo wellco_get_redux_option( 'custom-codes-custom-html-script-footer' );
			echo "\n";
		}
	}
}


if (!function_exists( 'wellco_require_core_plugin_message')) {
	/**
	 * Prints a mesasge in the admin if user hides TGMPA plugin activation message
	 */
	function wellco_require_core_plugin_message() {
		if ( get_user_meta( get_current_user_id(), 'tgmpa_dismissed_notice_tgmpa', true ) && !mascot_core_wellco_plugin_installed() ) {
			$class = 'notice notice-error';
			$message = sprintf( esc_html__( 'For proper theme functioning, the %s plugins are required', 'wellco' ),
				"<strong>Mascot Core</strong>"
			);
			$message .= '<a href="' . esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) . '">' . esc_html__( 'install', 'wellco' ) . '</a>';
			$message .= esc_html__( ' and activate the plugins.', 'wellco' );
			printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), $message ); 
		}
	}
	add_action( 'admin_notices', 'wellco_require_core_plugin_message' );
}


if(!function_exists('wellco_add_theme_page')) {
	/**
	 * Add Theme Page
	 */
	function wellco_add_theme_page() {
		global $wellco_theme_info;
		$theme_name = $wellco_theme_info->get('Name');
		add_menu_page( 
			$theme_name,
			$theme_name,
			'manage_options',
			'mascot-about',
			'wellco_theme_page_about',
			'dashicons-admin-generic',
			4
		);
		add_submenu_page( 
			'mascot-about',
			esc_html__( 'Support & Help', 'wellco' ),
			esc_html__( 'Support & Help', 'wellco' ),
			'manage_options',
			'mascot-docs',
			'wellco_theme_page_docs'
		);
		add_submenu_page( 
			'mascot-about',
			esc_html__( 'FAQ', 'wellco' ),
			esc_html__( 'FAQ', 'wellco' ),
			'manage_options',
			'mascot-faq',
			'wellco_theme_page_faq'
		);
		add_submenu_page( 
			'mascot-about',
			esc_html__( 'System Status', 'wellco' ),
			esc_html__( 'System Status', 'wellco' ),
			'manage_options',
			'mascot-system-status',
			'wellco_theme_page_system_status'
		);
		if ( mascot_core_wellco_plugin_installed() ) {
			add_submenu_page( 
				'mascot-about',
				esc_html__( 'System Status', 'wellco' ),
				esc_html__( 'System Status', 'wellco' ),
				'manage_options',
				'mascot-system-status', 
				'wellco_theme_page_system_status'
			);
		}
	}
	add_action('admin_menu', 'wellco_add_theme_page');
}

if(!function_exists('wellco_theme_page_about')) {
	function wellco_theme_page_about() {
		include( WELLCO_TEMPLATE_DIR . '/admin/admin-tpl/mascot-about.php' );
	}
}

if(!function_exists('wellco_theme_page_docs')) {
	function wellco_theme_page_docs() {
		include( WELLCO_TEMPLATE_DIR . '/admin/admin-tpl/mascot-docs.php' );
	}
}

if(!function_exists('wellco_theme_page_faq')) {
	function wellco_theme_page_faq() {
		include( WELLCO_TEMPLATE_DIR . '/admin/admin-tpl/mascot-faq.php' );
	}
}

if(!function_exists('wellco_theme_page_system_status')) {
	function wellco_theme_page_system_status() {
		include( WELLCO_TEMPLATE_DIR . '/admin/admin-tpl/mascot-system-status.php' );
	}
}
