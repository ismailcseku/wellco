<?php

/* Loads all blocks located in blocks folder
================================================== */
if( !function_exists('wellco_load_all_template_parts') ) {
	function wellco_load_all_template_parts() {
		foreach( glob(WELLCO_FRAMEWORK_DIR.'/core/blocks/*/loader.php') as $each_template_part_loader ) {
			require_once $each_template_part_loader;
		}
	}
	add_action('wellco_before_custom_action', 'wellco_load_all_template_parts');
}