<?php

// Custom Action for this theme
add_action('after_setup_theme', 'wellco_custom_action_init', 0);

function wellco_custom_action_init() {

	do_action('wellco_before_custom_action');

	do_action('wellco_custom_action');

	do_action('wellco_after_custom_action');
}