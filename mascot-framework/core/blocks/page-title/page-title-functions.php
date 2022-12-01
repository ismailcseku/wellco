<?php

if(!function_exists('wellco_get_title_area_parts')) {
	/**
	 * Function that Renders Page Title HTML Codes
	 * @return HTML
	 */
	function wellco_get_title_area_parts() {
		$current_page_id = wellco_get_page_id();
		$params = array();


		//Enable Page Title
		//check if meta value is provided for this page or then get it from theme options
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'enable_page_title', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$params['enable_page_title'] = $temp_meta_value;
		} else {
			$params['enable_page_title'] = wellco_get_redux_option( 'page-title-settings-enable-page-title', true );
		}

		if( !$params['enable_page_title'] ) {
			return;
		}


		//Choose Elementor Page Title
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'page_title_widget_area', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$params['title_cpt_widget_area'] = $temp_meta_value;
		} else {
			$params['title_cpt_widget_area'] = wellco_get_redux_option( 'page-title-settings-choose-page-title-cpt-widget-area' );
		}
		if ( isset($params['title_cpt_widget_area']) && !empty($params['title_cpt_widget_area']) ) {
			//show elementor page title
			$html = wellco_get_blocks_template_part( 'page-title-elementor', null, 'page-title/tpl', $params );
			return $html;
		}




		//Enable Default Page Title
		$params['enable_default_page_title'] = wellco_get_redux_option( 'page-title-settings-enable-default-page-title', true );
		if( !$params['enable_default_page_title'] ) {
			return;
		}


		if ( isset($params['enable_page_title_page_meta']) && !empty($params['enable_page_title_page_meta']) && isset($page_title_cpt_post) && !empty($page_title_cpt_post) ) {
			//show elementor page title
			$html = wellco_get_blocks_template_part( 'page-title-elementor', null, 'page-title/tpl', $params );
			return $html;
		}

		if( !$params['enable_page_title'] ) {
			return;
		}


		$title_area_classes_array = array();
		$params['title_area_classes'] = '';


		//Page Title Container
		//check if meta value is provided for this page or then get it from theme options
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_container', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$params['title_area_container_class'] = $temp_meta_value;
		} else {
			$params['title_area_container_class'] = wellco_get_redux_option( 'page-title-settings-container', 'container' );
		}


		//Page Title Text Alignment
		//check if meta value is provided for this page or then get it from theme options
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_text_align', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$title_area_classes_array[] = $temp_meta_value;
		} else {
			$title_area_classes_array[] = wellco_get_redux_option( 'page-title-settings-text-align' );
		}


		//Default Text Color
		//check if meta value is provided for this page or then get it from theme options
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_default_text_color', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$title_area_classes_array[] = $temp_meta_value;
		} else {
			$title_area_classes_array[] = wellco_get_redux_option( 'page-title-settings-text-color' );
		}


		//Page Title Height by custom padding class
		//check if meta value is provided for this page or then get it from theme options
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_area_height', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$params['title_area_container_height'] = $temp_meta_value;
		} else {
			$params['title_area_container_height'] = wellco_get_redux_option( 'page-title-settings-height', 'padding-medium' );
		}


		//Page Title Background Overlay Status
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_area_bg_layer_overlay_status', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$params['layer_overlay_status']['status'] = $temp_meta_value;
			$params['layer_overlay_status']['from'] = 'post-meta';
		} else {
			$params['layer_overlay_status']['status'] = wellco_get_redux_option( 'page-title-settings-bg-layer-overlay-status', false );
			$params['layer_overlay_status']['from'] = 'theme-options';
		}

		if( $params['layer_overlay_status']['status'] ) {
			//Overlay Color
			//check if meta value is provided for this page or then get it from theme options
			$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_area_bg_layer_overlay_color', $current_page_id );
			if( $params['layer_overlay_status']['from'] == 'post-meta' && ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
				$params['layer_overlay_color'] = $temp_meta_value;
			} else {
				$params['layer_overlay_color'] = wellco_get_redux_option( 'page-title-settings-bg-layer-overlay-color' );
			}

			//final layer overlay class
			if( $params['layer_overlay_status']['from'] == 'post-meta' ) {
				$title_area_classes_array[] = 'layer-overlay overlay-'. $params['layer_overlay_color'] .'-'.wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_area_bg_layer_overlay_opacity', $current_page_id );
			} else if ( $params['layer_overlay_status']['from'] == 'theme-options' ) {
				$title_area_classes_array[] = 'layer-overlay overlay-'. $params['layer_overlay_color'] .'-'.wellco_get_redux_option( 'page-title-settings-bg-layer-overlay' );
			}
		}


		//Page Title Background Parallax Effect
		//check if meta value is provided for this page or then get it from theme options
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_area_bg_parallax_effect', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$title_area_classes_array[] = 'parallax';
		} else if( wellco_get_redux_option( 'page-title-settings-bg-parallax-effect' ) ) {
			$title_area_classes_array[] = 'parallax';
		}

		//Choose Page Title Layout
		//check if meta value is provided for this page or then get it from theme options
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_layout', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$title_area_classes_array[] = 'page-title-' . $temp_meta_value;
		} else {
			$title_area_classes_array[] = 'page-title-' . wellco_get_redux_option( 'page-title-settings-title-layout', 'standard' );
		}

		//bg video from theme options
		$params['title_area_add_bg_video_status'] = wellco_get_redux_option( 'page-title-settings-bg-video-status' );
		if( $params['title_area_add_bg_video_status'] ) {
			//bg video self hosted
			$params['title_area_bg_video_type'] = wellco_get_redux_option( 'page-title-settings-bg-video-type' );
			if ( $params['title_area_bg_video_type'] == 'self-hosted' ) {
				$params['title_area_bg_video_self_hosted_video_poster'] = wellco_get_redux_option( 'page-title-settings-bg-video-self-hosted-video-poster' );
				$params['title_area_bg_video_self_hosted_video_mp4_url'] = wellco_get_redux_option( 'page-title-settings-bg-video-self-hosted-mp4-video-url' );
				$params['title_area_bg_video_self_hosted_video_webm_url'] = wellco_get_redux_option( 'page-title-settings-bg-video-self-hosted-webm-video-url' );
				$params['title_area_bg_video_self_hosted_video_ogv_url'] = wellco_get_redux_option( 'page-title-settings-bg-video-self-hosted-ogv-video-url' );
			}
		}



		//Page Title Background Type
		//check if meta value is provided for this page or then get it from theme options
		$params['title_area_bgcolor'] = '';
		$params['title_area_bgimg'] = '';
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_area_bg_type', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$params['title_area_bg_type'] = $temp_meta_value;

			if( $params['title_area_bg_type'] == 'bg-color' ) {

				//Background Color
				$params['title_area_bgcolor'] = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_area_bgcolor', $current_page_id );
				if( ! wellco_metabox_opt_val_is_empty( $params['title_area_bgcolor'] ) ) {
					$params['title_area_bgcolor'] = 'background-image: url(); background-color: ' . $params['title_area_bgcolor'] . '; ';
				}

			} else if ( $params['title_area_bg_type'] == 'bg-img' ) {

				//Background Image
				$params['title_area_bgimg'] = wellco_get_rwmb_group_advanced( 'wellco_' . 'page_mb_page_title_settings', 'title_area_bgimg', $current_page_id );
				if( ! wellco_metabox_opt_val_is_empty( $params['title_area_bgimg'] ) ) {
					$params['title_area_bgimg'] = 'background-image: url(' . $params['title_area_bgimg'] . '); ';
				}

			} else if ( $params['title_area_bg_type'] == 'bg-video' ) {

				//Background Video
				$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_area_bg_video_status', $current_page_id );
				if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
					//bg video from metabox
					$params['title_area_add_bg_video_status'] = $temp_meta_value;
					if( $params['title_area_add_bg_video_status'] ) {
						//bg video self hosted
						$params['title_area_bg_video_type'] = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_area_bg_video_type', $current_page_id );
						if( ! wellco_metabox_opt_val_is_empty( $params['title_area_bg_video_type'] ) && $params['title_area_bg_video_type'] == 'self-hosted' ) {
							$params['title_area_bg_video_self_hosted_video_poster']['url'] = wellco_get_rwmb_group_advanced( 'wellco_' . 'page_mb_page_title_settings', 'title_area_bg_video_self_hosted_video_poster', $current_page_id );
							$params['title_area_bg_video_self_hosted_video_mp4_url']['url'] = wellco_get_rwmb_group_advanced( 'wellco_' . 'page_mb_page_title_settings', 'title_area_bg_video_self_hosted_mp4_video_url', $current_page_id );
							$params['title_area_bg_video_self_hosted_video_webm_url']['url'] = wellco_get_rwmb_group_advanced( 'wellco_' . 'page_mb_page_title_settings', 'title_area_bg_video_self_hosted_webm_video_url', $current_page_id );
							$params['title_area_bg_video_self_hosted_video_ogv_url']['url'] = wellco_get_rwmb_group_advanced( 'wellco_' . 'page_mb_page_title_settings', 'title_area_bg_video_self_hosted_ogv_video_url', $current_page_id );

						}
					}

				}

			}
		}



		//make array into string
		if( is_array( $title_area_classes_array ) && count( $title_area_classes_array ) ) {
			$params['title_area_classes'] = esc_attr(implode(' ', $title_area_classes_array));
		}


		//Produce HTML version by using the parameters (filename, variation, folder name, parameters)
		$html = wellco_get_blocks_template_part( 'page-title-parts', null, 'page-title/tpl', $params );

		return $html;
	}
}

if (!function_exists('wellco_get_title_area_layout')) {
	/**
	 * Return Page Title Layout HTML
	 */
	function wellco_get_title_area_layout() {
		$current_page_id = wellco_get_page_id();
		$params = array();

		//Choose Page Title Layout
		//check if meta value is provided for this page or then get it from theme options
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_layout', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$params['title_layout'] = $temp_meta_value;
		} else {
			$params['title_layout'] = wellco_get_redux_option( 'page-title-settings-title-layout', 'standard' );
		}

		//Show Title
		//check if meta value is provided for this page or then get it from theme options
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_area_show_title', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$params['title_area_show_title'] = $temp_meta_value;
		} else {
			$params['title_area_show_title'] = wellco_get_redux_option( 'page-title-settings-show-title', true );
		}

		//Show Subtitle
		//check if meta value is provided for this page or then get it from theme options
		$params['title_area_show_subtitle'] = wellco_get_redux_option( 'page-title-settings-show-subtitle', true );

		//Show Breadcrumbs
		//check if meta value is provided for this page or then get it from theme options
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_area_show_breadcrumbs', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$params['title_area_show_breadcrumb'] = $temp_meta_value;
		} else {
			$params['title_area_show_breadcrumb'] = wellco_get_redux_option( 'page-title-settings-show-breadcrumbs', true );
		}


		//Produce HTML version by using the parameters (filename, variation, folder name, parameters)
		$html = wellco_get_blocks_template_part( 'page-title', $params['title_layout'], 'page-title/tpl/layouts', $params );

		return $html;
	}
}


if(!function_exists('wellco_get_title_area_title')) {
	/**
	 * Function that Renders Page Title title HTML Codes
	 * @return HTML
	 */
	function wellco_get_title_area_title() {
		$current_page_id = wellco_get_page_id();
		$params = array();

		//Page Title Type
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'page_title_type', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value == "custom-title" ) {
			$params['page_title'] = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'custom_page_title_text', $current_page_id );
		} else {
			$params['page_title'] = wellco_get_title_area_title_text();
		}


		//Title Tag
		//check if meta value is provided for this page or then get it from theme options
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_tag', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$params['title_tag'] = $temp_meta_value;
		} else {
			$params['title_tag'] = wellco_get_redux_option( 'page-title-settings-title-tag', 'h3' );
		}

		//Title Animation Effect
		//check if meta value is provided for this page or then get it from theme options
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_animation_effect', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) ) {
			$params['animation_effect'] = $temp_meta_value;
		} else {
			$params['animation_effect'] = wellco_get_redux_option( 'page-title-settings-title-animation-effect' );
		}

		//Title Animation Duration
		$params['animation_duration'] = wellco_get_redux_option( 'page-title-settings-title-animation-duration' );
		if( empty( $params['animation_duration'] ) ) {
			$params['animation_duration'] = '1.5s';
		}

		//Title Color
		$params['title_color'] = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_color', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $params['title_color'] ) ) {
			$params['title_color'] = 'color: ' . $params['title_color'] . '; ';
		}

		//Produce HTML version by using the parameters (filename, variation, folder name, parameters)
		$html = wellco_get_blocks_template_part( 'page-title-title', null, 'page-title/tpl/parts', $params );

		return $html;
	}
}


if(!function_exists('wellco_get_title_area_title_text')) {
	/**
	 * Function that Renders Page Title title Text
	 * @return HTML
	 */
	function wellco_get_title_area_title_text() {

		$id = wellco_get_page_id();
		$title  = '';

		//is current page tag archive?
		if (is_tag()) {
			//get title of current tag
			$title = single_tag_title("", false).esc_html__(' Tag', 'wellco');
		}

		//is current page date archive?
		elseif (is_date()) {
			//get current date archive format
			$title = get_the_time('F Y');
		}

		//is current page author archive?
		elseif (is_author()) {
			//get current author name
			$title = esc_html__('Author:', 'wellco') . " " . get_the_author();
		}

		//us current page category archive
		elseif (is_category()) {
			//get current page category title
			$title = single_cat_title('', false);
		}

		//is current page blog post page and front page? Latest posts option is set in Settings -> Reading
		elseif (is_home() && is_front_page()) {
			//get site name from options
			$title = get_option('blogname');
		}

		//is current page blog post page and front page? Latest posts option is set in Settings -> Reading
		elseif (is_home()) {
			//get site name from options
			$title = get_option('blogname');
		}

		//is current page search page?
		elseif (is_search()) {
			//get title for search page
			$title = esc_html__('Search results for: ', 'wellco') . get_search_query();
		}

		//is current page 404?
		elseif (is_404()) {
			//is 404 title text set in theme options?
			if( wellco_get_redux_option( '404-page-settings-title' ) != "" ) {
				//get it from options
				$title = wellco_get_redux_option( '404-page-settings-title' );
			} else {
				//get default 404 page title
				$title = esc_html__('404 - Page not found', 'wellco');
			}
		}

		//is WooCommerce installed and is single product page?
		elseif( class_exists( 'WooCommerce' ) && ( is_singular('product') ) ) {
			$custom_page_title  = wellco_get_redux_option( 'shop-single-product-settings-custom-page-title', esc_html__( 'Shop', 'wellco' ) );
			if ( isset($custom_page_title) && !empty($custom_page_title) ) {
				$title = esc_html( $custom_page_title );
			} else {
				global $wp_query;
				$post_obj 	= $wp_query->get_queried_object();
				$Page_ID 	= $post_obj->ID;
				$title 		= get_the_title($Page_ID); 
			}
		}

		//is WooCommerce installed and is shop?
		elseif( class_exists( 'WooCommerce' ) && ( is_shop() ) ) {
			//get shop page id from options table
			$shop_id = get_option('woocommerce_shop_page_id');

			//get shop page and get it's title if set
			$shop = get_post($shop_id);
			if(isset($shop->post_title) && $shop->post_title !== '') {
				$title = $shop->post_title;
			}
		}

		//is WooCommerce installed and is current page product archive page?
		elseif( class_exists( 'WooCommerce' ) && (is_product_category() || is_product_tag() ) ) {
			global $wp_query;

			//get current taxonomy and it's name and assign to title
			$tax			= $wp_query->get_queried_object();
			$category_title = $tax->name;
			$title			= $category_title;
		}

		//is current page some archive page?
		elseif (is_archive()) {
			$title = get_the_archive_title();
		}

		//current page is regular page
		else {
			$title = get_the_title($id);
		}

		return apply_filters( 'wellco_filter_page_title_text', $title );
	}
}

if(!function_exists('wellco_custom_archive_title')) {
	/**
	 * If you would like to get rid of the "Category:", "Tag:", "Author:", "Archives:" and "Other taxonomy name:" in the archive title, use this little function
	 */
	function wellco_custom_archive_title( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>';
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
		}

		return $title;
	}
}
add_filter( 'get_the_archive_title', 'wellco_custom_archive_title' );


if(!function_exists('wellco_get_title_area_subtitle')) {
	/**
	 * Function that Renders Page Title subtitle HTML Codes
	 * @return HTML
	 */
	function wellco_get_title_area_subtitle() {
		$current_page_id = wellco_get_page_id();
		$params = array();

		$params['subtitle_text'] = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'page_sub_title_text', $current_page_id );

		//Title Tag
		//check if meta value is provided for this page or then get it from theme options
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'subtitle_tag', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$params['subtitle_tag'] = $temp_meta_value;
		} else {
			$params['subtitle_tag'] = wellco_get_redux_option( 'page-title-settings-subtitle-tag' );
		}


		//Subtitle Animation Effect
		//check if meta value is provided for this page or then get it from theme options
		$temp_meta_value = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'subtitle_animation_effect', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $temp_meta_value ) ) {
			$params['animation_effect'] = $temp_meta_value;
		} else {
			$params['animation_effect'] = wellco_get_redux_option( 'page-title-settings-subtitle-animation-effect' );
		}

		//Subtitle Animation Duration
		$params['animation_duration'] = wellco_get_redux_option( 'page-title-settings-subtitle-animation-duration' );
		if( empty( $params['animation_duration'] ) ) {
			$params['animation_duration'] = '1.5s';
		}

		//Subtitle Color
		$params['subtitle_color'] = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'subtitle_color', $current_page_id );
		if( ! wellco_metabox_opt_val_is_empty( $params['subtitle_color'] ) ) {
			$params['subtitle_color'] = 'color: ' . $params['subtitle_color'] . '; ';
		}

		//Produce HTML version by using the parameters (filename, variation, folder name, parameters)
		$html = wellco_get_blocks_template_part( 'page-title-subtitle', null, 'page-title/tpl/parts', $params );

		return $html;
	}
}

if(!function_exists('wellco_get_title_area_bg_video_youtube')) {
	/**
	 * Function that Renders Page Title Background Youtube Video HTML Codes
	 * @return HTML
	 */
	function wellco_get_title_area_bg_video_youtube() {
		$current_page_id = wellco_get_page_id();
		$params = array();


		//bg video youtube from theme options
		$params['title_area_bg_video_youtube_id'] = wellco_get_redux_option( 'page-title-settings-bg-video-youtube-id' );


		$params['subtitle_color'] = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'subtitle_color', $current_page_id );
		//bg video youtube from metabox
		if( wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_area_bg_type', $current_page_id ) == "bg-video" &&
			wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_area_bg_video_status', $current_page_id ) == "1"  &&
			wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_area_bg_video_type', $current_page_id ) == "youtube" ) {
			$params['title_area_bg_video_youtube_id'] = wellco_get_rwmb_group( 'wellco_' . "page_mb_page_title_settings", 'title_area_bg_video_youtube_id', $current_page_id );
		}


		if( $params['title_area_bg_video_youtube_id'] != '' ) {
			//Produce HTML version by using the parameters (filename, variation, folder name, parameters)
			$html = wellco_get_blocks_template_part( 'page-title-bg-video-youtube', null, 'page-title/tpl/parts', $params );
			return $html;
		}

		return;
	}
}

if ( !function_exists( 'wellco_display_breadcrumbs' ) ) {
	/**
	 * Return correct breadcrumbs function
	 */
	function wellco_display_breadcrumbs( $icon_html = '<i class="tm-breadcrumb-arrow-icon fas fa-arrow-right"></i>' ) {

		if ( wellco_get_redux_option( 'page-title-settings-show-breadcrumbs', true ) ) {
			// Yoast breadcrumbs
			if ( function_exists('yoast_breadcrumb') ) {
				return yoast_breadcrumb('<nav id="breadcrumbs" class="breadcrumbs">','</nav>');
			} else if ( function_exists( 'bcn_display' ) ) {
			?>
			<div class="breadcrumbs">
				<?php bcn_display(); ?>
			</div>
			<?php
			} else {
				if ( function_exists( 'wellco_breadcrumb_trail' ) ) {
					echo wellco_breadcrumb_trail(array('icon_html' => $icon_html));
				}
			}
		}

	} // End function

} // End if