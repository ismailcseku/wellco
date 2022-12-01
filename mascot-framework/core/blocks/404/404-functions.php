<?php


if(!function_exists('wellco_get_404_parts')) {
	/**
	 * Function that Renders Coming Soon Page HTML Codes
	 * @return HTML
	 */
	function wellco_get_404_parts() {
		$params = array();
		$section_classes_array = array();
		$params['section_classes'] = '';
		$layout = wellco_get_redux_option( '404-page-settings-layout', 'simple' );
		$section_classes_array[] = 'page-404-layout-' . $layout;

		//Text Alignment
		$params['text_align'] = wellco_get_redux_option( '404-page-settings-text-align', 'text-center' );
		
		//Add Background Overlay
		if( wellco_get_redux_option( '404-page-settings-bg-layer-overlay-status' ) ) {
			$section_classes_array[] = 'layer-overlay overlay-'.wellco_get_redux_option( '404-page-settings-bg-layer-overlay-color' ) .'-'.wellco_get_redux_option( '404-page-settings-bg-layer-overlay' );
		}

		//make array into string
		if( is_array( $section_classes_array ) && count( $section_classes_array ) ) {
			$params['section_classes'] = esc_attr(implode(' ', $section_classes_array));
		}

		$params['page_title'] = wellco_get_redux_option( '404-page-settings-title', wellco_redux_fallback_text_collection('404') );
		$params['page_subtitle'] = wellco_get_redux_option( '404-page-settings-subtitle', wellco_redux_fallback_text_collection('404_oops') );
		$params['page_content'] = wellco_get_redux_option( '404-page-settings-content', wellco_redux_fallback_text_collection('404_notexist') );


		//fullscreen if not show header footer
		if( wellco_get_redux_option( '404-page-settings-show-header', true ) == true || wellco_get_redux_option( '404-page-settings-show-footer', true ) == true ) {
			$params['fullscreen'] = 'page-404-wrapper-padding';
		} else {
			$params['fullscreen'] = 'section-fullscreen';
		}

		//Search Box
		$params['show_search_box'] = wellco_get_redux_option( '404-page-settings-show-search-box', false );
		$params['search_box_heading'] = wellco_get_redux_option( '404-page-settings-search-box-heading' );
		$params['search_box_paragraph'] = wellco_get_redux_option( '404-page-settings-search-box-paragraph' );

		//Helpful Links
		$params['show_helpful_links'] = wellco_get_redux_option( '404-page-settings-show-helpful-links', 0 );
		$params['helpful_links_heading'] = wellco_get_redux_option( '404-page-settings-helpful-links-heading' );
		$params['helpful_links_nav'] = 'page-404-helpful-links';

		//Show Social Links
		$params['show_social_links'] = wellco_get_redux_option( '404-page-settings-show-social-links', false );

		//Back Button Label
		$params['show_back_to_home_button'] = wellco_get_redux_option( '404-page-settings-show-back-to-home-button', true );
		$params['back_to_home_button_label'] = wellco_get_redux_option( '404-page-settings-back-to-home-button-label', wellco_redux_fallback_text_collection('404_btn') );

		//Produce HTML version by using the parameters (filename, variation, folder name, parameters)
		$html = wellco_get_blocks_template_part( 'template', wellco_get_redux_option( '404-page-settings-layout', 'simple' ), '404/tpl', $params );
		
		return $html;
	}
}