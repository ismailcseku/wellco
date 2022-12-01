<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the .main-content div and #wrapper
 *
 */
?>


	<?php wellco_get_footer_top_callout(); ?>


	<?php
		/**
		 * wellco_main_content_end hook.
		 *
		 */
		do_action( 'wellco_main_content_end' );
	?>
	</div>
	<!-- main-content end --> 
	<?php
		/**
		 * wellco_after_main_content hook.
		 *
		 */
		do_action( 'wellco_after_main_content' );
	?>


	<?php if( apply_filters('wellco_filter_show_footer', true) ): ?>
	<?php wellco_get_footer_parts(); ?>
	<?php endif; ?>
	
	<?php
		/**
		 * wellco_wrapper_end hook.
		 *
		 */
		do_action( 'wellco_wrapper_end' );
	?>
</div>
<!-- wrapper end -->
<?php
	/**
	 * wellco_body_tag_end hook.
	 *
	 */
	do_action( 'wellco_body_tag_end' );
?>
<?php if( class_exists('Woocommerce') && mascot_core_wellco_plugin_installed() ) { wellco_floating_cart_sidebar(); } ?>
<?php
	/**
	 * nav_search_icon_popup_html hook.
	 *
	 */
	global $nav_search_holder_id;
	do_action( 'wellco_nav_search_icon_popup_html', $nav_search_holder_id );
?>
<?php wp_footer(); ?>
</body>
</html>
