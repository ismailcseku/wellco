<?php
/**
 * ThemeMascot functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 */

global $wellco_theme_info;
$wellco_theme_info = wp_get_theme();

if (!function_exists('mascot_core_wellco_plugin_installed')) {
	/**
	 * Core Plugin installed?
	 */
	function mascot_core_wellco_plugin_installed() {
		return defined( 'MASCOT_CORE_WELLCO_VERSION' );
	}
}

if (!function_exists('mascot_core_plugin_installed')) {
	/**
	 * Core Plugin installed?
	 */
	function mascot_core_plugin_installed() {
		return defined( 'MASCOT_CORE_ELEMENTOR_VERSION' );
	}
}

/* VARIABLE DEFINITIONS
================================================== */
define( 'MASCOT_THEME_ACTIVE', 'TRUE' );
define( 'WELLCO_AUTHOR', 'ThemeMascot' );
define( 'WELLCO_FRAMEWORK_VERSION', '1.0' );
define( 'WELLCO_TEMPLATE_URI', get_template_directory_uri() );
define( 'WELLCO_TEMPLATE_DIR', get_template_directory() );

define( 'WELLCO_ASSETS_URI', WELLCO_TEMPLATE_URI . '/assets' );
define( 'WELLCO_ASSETS_DIR', WELLCO_TEMPLATE_DIR . '/assets' );

define( 'WELLCO_ADMIN_ASSETS_URI', WELLCO_TEMPLATE_URI . '/admin/assets' );
define( 'WELLCO_ADMIN_ASSETS_DIR', WELLCO_TEMPLATE_DIR . '/admin/assets' );

define( 'WELLCO_FRAMEWORK_FOLDER', 'mascot-framework' );
define( 'WELLCO_FRAMEWORK_DIR', WELLCO_TEMPLATE_DIR . '/'. WELLCO_FRAMEWORK_FOLDER );

define( 'WELLCO_THEME_VERSION', $wellco_theme_info->get( 'Version' ) );
define( 'WELLCO_POST_EXCERPT_LENGTH', 25 );


/* Initial Actions
================================================== */
add_action( 'after_setup_theme', 		'wellco_action_after_setup_theme' );
add_action( 'wp_enqueue_scripts', 		'wellco_action_wp_enqueue_scripts',12 );
add_action( 'widgets_init', 			'wellco_action_widgets_init' );
add_action( 'wp_head', 					'wellco_action_wp_head',1 );
add_action( 'wp_head', 					'wellco_action_wp_head_at_the_end', 100 );

//admin actions
add_action( 'admin_enqueue_scripts',	'wellco_action_theme_admin_enqueue_scripts' );

add_action( 'wp_footer', 				'wellco_action_wp_footer' );


/* MASCOT FRAMEWORK
================================================== */
require_once( WELLCO_FRAMEWORK_DIR . '/mascot-framework.php' );



if(!function_exists('wellco_action_after_setup_theme')) {
	/**
	 * After Setup Theme
	 */
	function wellco_action_after_setup_theme() {
		//Theme Support
		global $supported_post_formats;
		$supported_post_formats = array( 'gallery', 'link', 'quote', 'audio', 'video' );

		//This feature enables Post Formats support for this theme
		add_theme_support( 'post-formats', $supported_post_formats );

		//This feature enables Automatic Feed Links for post and comment in the head
		add_theme_support( 'automatic-feed-links' );

		//This feature enables Post Thumbnails support for this theme
		add_theme_support( 'post-thumbnails' );

		//Woocommerce theme suport
		add_theme_support( 'woocommerce' );

		// Custom Backgrounds
		add_theme_support( 'custom-background', array(
			'default-color' => 'fff',
		) );

		//This feature enables plugins and themes to manage the document title tag. This should be used in place of wp_title() function
		add_theme_support( 'title-tag' );

		//This feature allows the use of HTML5 markup for the search forms, comment forms, comment lists, gallery, and caption
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );


		// add excerpt support for pages
		add_post_type_support( 'page', 'excerpt' );

		//Thumbnail Sizes
		set_post_thumbnail_size( 672, 448, true );
		add_image_size( 'wellco_thumbnail_height', 600, 800, true );
		add_image_size( 'wellco_thumbnail_height_400', 400, 532, true );

		add_image_size( 'wellco_square', 550, 550, true );
		add_image_size( 'wellco_landscape', 1100, 550, true );
		add_image_size( 'wellco_portrait', 550, 1100, true );
		add_image_size( 'wellco_huge_square', 1100, 1100, true );
		add_image_size( 'wellco_square_150', 150, 150, true );

		add_image_size( 'wellco_small_height', 150, 180, true );

		//Content Width
		if ( ! isset( $content_width ) ) $content_width = 1170;

		//Theme Textdomain
		load_theme_textdomain( 'wellco', get_template_directory() . '/languages' );

		//Register Nav Menus
		$register_nav_menus_array = array(
			'primary' 					=> esc_html__( 'Primary Navigation Menu', 'wellco' ),
			'page-404-helpful-links' 	=> esc_html__( 'Page 404 Helpful Links', 'wellco' )
		);

		register_nav_menus( $register_nav_menus_array );
	}
}


if(!function_exists('wellco_action_wp_enqueue_scripts')) {
	/**
	 * Enqueue Script/Style
	 */
	function wellco_action_wp_enqueue_scripts() {
		wp_enqueue_script( 'jquery-ui-core');
		wp_enqueue_script( 'jquery-ui-tabs');
		wp_enqueue_script( 'jquery-ui-accordion');

		wp_enqueue_style( 'wp-mediaelement' );
		wp_enqueue_script( 'wp-mediaelement' );

		if( !is_admin() ){

			/**
			 * Enqueue Style
			 */

			if( is_rtl() ) {
				wp_enqueue_style( 'bootstrap-rtl', WELLCO_TEMPLATE_URI . '/assets/css/bootstrap-rtl.min.css' );
			} else {
				wp_enqueue_style( 'bootstrap', WELLCO_TEMPLATE_URI . '/assets/css/bootstrap.min.css' );
			}
			wp_enqueue_style( 'animate', WELLCO_TEMPLATE_URI . '/assets/css/animate.min.css' );

			//enable preloader
			wp_register_style( 'wellco-preloader', WELLCO_TEMPLATE_URI . '/assets/css/preloader.css' );
			$page_preloader = wellco_get_redux_option( 'general-settings-enable-page-preloader' );
			if( $page_preloader ) {
				wp_enqueue_style( 'wellco-preloader' );
			}

			/**
			 * Enqueue Fonts
			 */
			//font-awesome icons
			wp_deregister_style( 'font-awesome' );
			wp_deregister_style( 'font-awesome-v4-shims' );
			wp_enqueue_style( 'font-awesome', WELLCO_TEMPLATE_URI . '/assets/css/font-awesome5.min.css' );
			wp_enqueue_style( 'font-awesome-v4-shims', WELLCO_TEMPLATE_URI . '/assets/css/font-awesome-v4-shims.css' );
			//linear icons
			wp_enqueue_style( 'font-linear-icons', WELLCO_TEMPLATE_URI . '/assets/fonts/linear-icons/style.css' );



			//google fonts
			wp_enqueue_style( 'wellco-google-fonts', wellco_google_fonts_url(), [], null );

			/**
			 * Enqueue Script
			 */
			wp_enqueue_script( 'html5shiv', WELLCO_TEMPLATE_URI . '/assets/js/html5shiv.min.js', array(''), '3.7.3' );
			wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
			wp_enqueue_script( 'respond', WELLCO_TEMPLATE_URI . '/assets/js/respond.min.js', array(''), '1.4.2' );
			wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

			wp_enqueue_script( 'popper', WELLCO_TEMPLATE_URI . '/assets/js/plugins/popper.min.js', array('jquery'), false, true );
			wp_enqueue_script( 'bootstrap', WELLCO_TEMPLATE_URI . '/assets/js/plugins/bootstrap.min.js', array('jquery'), false, true );
			wp_enqueue_script( 'menuzord', WELLCO_TEMPLATE_URI . '/assets/js/plugins/menuzord/js/menuzord.js', array('jquery'), false, true );

			//external plugins single file:
			wp_enqueue_script( 'jquery-appear', WELLCO_TEMPLATE_URI . '/assets/js/plugins/jquery.appear.js', array('jquery'), false, true );
			wp_enqueue_script( 'isotope', WELLCO_TEMPLATE_URI . '/assets/js/plugins/isotope.pkgd.min.js', array('jquery'), false, true );
			wp_enqueue_script( 'imagesloaded' );
			wp_enqueue_script( 'jquery-scrolltofixed', WELLCO_TEMPLATE_URI . '/assets/js/plugins/jquery-scrolltofixed-min.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-easing', WELLCO_TEMPLATE_URI . '/assets/js/plugins/jquery.easing.min.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-fitvids', WELLCO_TEMPLATE_URI . '/assets/js/plugins/jquery.fitvids.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-localscroll', WELLCO_TEMPLATE_URI . '/assets/js/plugins/jquery.localscroll.min.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-scrollto', WELLCO_TEMPLATE_URI . '/assets/js/plugins/jquery.scrollto.min.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-paroller', WELLCO_TEMPLATE_URI . '/assets/js/plugins/jquery.paroller.min.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-lettering', WELLCO_TEMPLATE_URI . '/assets/js/plugins/jquery.lettering.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-textillate', WELLCO_TEMPLATE_URI . '/assets/js/plugins/jquery.textillate.js', array('jquery'), false, true );
			wp_enqueue_script( 'jquery-nice-select', WELLCO_TEMPLATE_URI . '/assets/js/plugins/jquery-nice-select/jquery.nice-select.min.js', array('jquery'), false, true );
			wp_enqueue_style( 'nice-select', WELLCO_TEMPLATE_URI . '/assets/js/plugins/jquery-nice-select/nice-select.css' );
			wp_enqueue_script( 'wow', WELLCO_TEMPLATE_URI . '/assets/js/plugins/wow.min.js', null, false, true );

			//Theme Custom JS
			wp_enqueue_script( 'mascot-custom', WELLCO_TEMPLATE_URI . '/assets/js/custom.js', array('jquery'), false, true );

			//Enqueue comment-reply.js
			if ( is_singular() && comments_open() && get_option('thread_comments') ) {
				wp_enqueue_script( 'comment-reply' );
			}
			
			//Navigation Skin
			$navigation_skin = esc_attr( wellco_get_redux_option( 'header-settings-navigation-skin' ) );
			//if layout type vertical nav then nav skin is set to default:
			$header_layout_type = wellco_return_header_layout_type();
			if( $header_layout_type == 'header-vertical-nav' ) {
				$navigation_skin = 'default';
			}
			//register and enque menuzord css skin
			if( $navigation_skin ) {
				wp_register_style( 'wellco-mascot-menuzord-navigation-skin', WELLCO_TEMPLATE_URI . '/assets/css/menuzord-skins/menuzord-'.$navigation_skin.'.css', array(), WELLCO_THEME_VERSION );
				wp_enqueue_style( 'wellco-mascot-menuzord-navigation-skin' );
			}


			//style main for this theme
			if( is_rtl() ) {
				wp_enqueue_style( 'wellco-style-main', WELLCO_TEMPLATE_URI . '/assets/css/style-main-rtl.css', array(), WELLCO_THEME_VERSION );
			} else {
				wp_enqueue_style( 'wellco-style-main', WELLCO_TEMPLATE_URI . '/assets/css/style-main.css', array(), WELLCO_THEME_VERSION );
			}

			//woo
			if( is_rtl() ) {
				if ( wellco_exists_woocommerce() ) {
				wp_enqueue_style( 'wellco-woo-shop', WELLCO_TEMPLATE_URI . '/assets/css/shop/woo-shop-rtl.css', array('wellco-style-main') );
				}
			} else {
				if ( wellco_exists_woocommerce() ) {
				wp_enqueue_style( 'wellco-woo-shop', WELLCO_TEMPLATE_URI . '/assets/css/shop/woo-shop.css', array('wellco-style-main') );
				}
			}


			//Typography Set from metabox
			$mascot_primary_typography_set = '';
			$page_metabox_change_typography = wellco_get_rwmb_group( 'wellco_' . "page_mb_typography_settings", 'change_typography', wellco_get_page_id() );
			if( $page_metabox_change_typography ) {
				//Theme Color from page meta box
				$mascot_primary_typography_set = wellco_get_rwmb_group( 'wellco_' . "page_mb_typography_settings", 'primary_typography_set', wellco_get_page_id() );
			}
			if( !empty($mascot_primary_typography_set) ) {
				wp_enqueue_style( 'wellco-primary-typography-set', WELLCO_TEMPLATE_URI . '/assets/css/typography/' . $mascot_primary_typography_set );
			}








			//Theme Color
			$mascot_primary_theme_color = '';
			$page_metabox_change_primary_theme_color = wellco_get_rwmb_group( 'wellco_' . "page_mb_theme_color_settings", 'change_primary_theme_color', wellco_get_page_id() );

			if( $page_metabox_change_primary_theme_color ) {
				//Theme Color from page meta box
				$mascot_primary_theme_color = wellco_get_rwmb_group( 'wellco_' . "page_mb_theme_color_settings", 'primary_theme_color', wellco_get_page_id() );

			} else if ( !_empty( wellco_get_redux_option( 'theme-color-settings-theme-color-type' ) ) ) {
				//Theme Color from Theme Options
				if( wellco_get_redux_option( 'theme-color-settings-theme-color-type' ) == 'predefined' ) {
					//Primary Theme Color
					$mascot_primary_theme_color = !_empty( wellco_get_redux_option( 'theme-color-settings-primary-theme-color' ) ) ? wellco_get_redux_option( 'theme-color-settings-primary-theme-color' ) : '';
				} else if ( wellco_get_redux_option( 'theme-color-settings-theme-color-type' ) == 'custom' ) {
					//Custom Theme Color
					$redux_css_file_name = wellco_get_redux_option( 'theme-color-settings-custom-theme-color-filename' );
					if( !empty( $redux_css_file_name ) ) {
						$mascot_primary_theme_color = $redux_css_file_name . '.css';
					} else if ( !is_multisite() ) {
						if ( file_exists( WELLCO_ASSETS_DIR . '/css/colors/custom-theme-color.css' ) ) {
							$mascot_primary_theme_color = 'custom-theme-color.css';
						}
					} else {
						if ( file_exists( WELLCO_ASSETS_DIR . '/css/colors/custom-theme-color-msid-' . wellco_get_multisite_blog_id() . '.css' ) ) {
							$mascot_primary_theme_color = 'custom-theme-color-msid-' . wellco_get_multisite_blog_id() . '.css';
						}
					}
				}
			} else {
				$mascot_primary_theme_color = 'theme-skin-color-set1.css';
			}

			wp_enqueue_style( 'wellco-primary-theme-color', WELLCO_TEMPLATE_URI . '/assets/css/colors/' . $mascot_primary_theme_color );


			//Attach Premade CSS File into the header
			$mascot_premade_sitewise_css_file = wellco_get_redux_option( 'theme-color-settings-premade-sitewise-css-file' );
			if( !empty($mascot_premade_sitewise_css_file) ) {
				wp_enqueue_style( 'wellco-premade-sitewise-css-file', WELLCO_TEMPLATE_URI . '/assets/css/sites/' . $mascot_premade_sitewise_css_file );
			}


			if( is_rtl() ) {
				wp_enqueue_style( 'wellco-style-main-rtl-extra', WELLCO_TEMPLATE_URI . '/assets/css/style-main-rtl-extra.css' );
			}

			//Dynamic Style
			if ( !is_multisite() ) {
				if ( mascot_core_wellco_plugin_installed() && file_exists( WELLCO_ASSETS_DIR . '/css/dynamic-style.css' ) ) {
					wp_enqueue_style( 'wellco-dynamic-style', WELLCO_TEMPLATE_URI . '/assets/css/dynamic-style.css' );
				}
			} else {
				if ( mascot_core_wellco_plugin_installed() && file_exists( WELLCO_ASSETS_DIR . '/css/dynamic-style-msid-' . wellco_get_multisite_blog_id() . '.css' ) ) {
					wp_enqueue_style( 'wellco-dynamic-style', WELLCO_TEMPLATE_URI . '/assets/css/dynamic-style-msid-' . wellco_get_multisite_blog_id() . '.css' );
				}
			}

		}
	}
}



if(!function_exists('wellco_action_theme_admin_enqueue_scripts')) {
	/**
	 * Add Admin Scripts
	 */
	function wellco_action_theme_admin_enqueue_scripts() {
		wp_enqueue_style( 'font-awesome', WELLCO_TEMPLATE_URI . '/assets/css/font-awesome5.min.css' );
		wp_enqueue_style( 'wellco-custom-admin', WELLCO_TEMPLATE_URI . '/admin/assets/css/custom-admin.css' );
		wp_enqueue_script( 'wellco-admin', WELLCO_TEMPLATE_URI . '/admin/assets/js/admin.js', array('jquery'), null, true );
	}
}



if(!function_exists('wellco_detect_elementor_and_add_class')) {
	/**
	 * Detect Elementor Enabled in Page Content and then add class to body
	 */
	function wellco_detect_elementor_and_add_class( $classes ) {
		$elementor_enabled = false;
		if ( did_action( 'elementor/loaded' ) ) {
			$elementor_enabled = true;
		}
		if (  is_archive() ) {
			$classes[] = 'tm_elementor_page_status_false';
		} else if (  is_search() ) {
			$classes[] = 'tm_elementor_page_status_false';
		} else if ( is_singular( 'portfolio-items' ) ) {
			$classes[] = 'tm_elementor_page_status_false';
		} else if ( $elementor_enabled != 'false' && $elementor_enabled == true ) {
			$classes[] = 'tm_elementor_page_status_true';
		} else {
			$classes[] = 'tm_elementor_page_status_false';
		}
		return $classes;
	}
	add_filter( 'body_class','wellco_detect_elementor_and_add_class' );
}



if(!function_exists('wellco_google_fonts_url')) {
	/**
	 * @return string Google fonts URL
	 */
	function wellco_google_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		//fonts
		$fonts = apply_filters( 'wellco_google_web_fonts', $fonts );

		//font subsets
		$subsets = apply_filters('wellco_google_font_subset', 'latin,latin-ext');

		if ( !empty( $fonts ) ) {
			foreach ($fonts as $key => $value) {
				$fonts[$key] = "family=" . $value;
			}
		}
		$fonts_url = implode( '&', $fonts );
		$fonts_url = '//fonts.googleapis.com/css2?' . $fonts_url. '&display=swap';

		return $fonts_url;
	}
}


if(!function_exists('wellco_primary_google_fonts')) {
	/**
	 * @return primary google fonts used in this theme
	 */
	function wellco_primary_google_fonts( $fonts ) {

		/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'wellco' ) ) {
			$fonts[] = 'DM+Sans:wght@500;700';
			$fonts[] = 'Poppins:wght@400;600';
		}

		return $fonts;
	}
	add_filter( 'wellco_google_web_fonts', 'wellco_primary_google_fonts' );
}

if(!function_exists('wellco_wrap_embed_with_div')) {
	function wellco_wrap_embed_with_div( $cache, $url, $attr, $post_ID ) {
		$classes = array();

		// Add these classes to all embeds.
		$classes_all = array(
			'tm-responsive-video-wrapper',
		);

		// Check for different providers and add appropriate classes.

		if ( false !== strpos( $url, 'vimeo.com' ) ) {
			$classes[] = 'tm-responsive-video';
			$classes[] = 'video-vimeo';
		}

		if ( false !== strpos( $url, 'youtube.com' ) ) {
			$classes[] = 'tm-responsive-video';
			$classes[] = 'video-youtube';
		}

		if ( false !== strpos( $url, 'wordpress.tv' ) ) {
			$classes[] = 'tm-responsive-video';
			$classes[] = 'video-videopress';
		}

		$classes = array_merge( $classes, $classes_all );

		return '<div class="' . esc_attr( implode( ' ', $classes ) ) . '">' . $cache . '</div>';
	}
	add_filter( 'embed_oembed_html', 'wellco_wrap_embed_with_div', 99, 4 );
}

if(!function_exists('wellco_override_mce_options')) {
	function wellco_override_mce_options($initArray) {
		$opts = '*[*]';
		$initArray['valid_elements'] = $opts;
		$initArray['extended_valid_elements'] = $opts;
		return $initArray;
	}
	add_filter('tiny_mce_before_init', 'wellco_override_mce_options');
}