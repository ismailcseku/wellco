<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cannot access pages directly.' );
}
?>

<div class="wrap about-wrap mascot-admin-tpl-wrapper">
	<?php echo wellco_get_template_part( 'admin/admin-tpl/mascot-header' ); ?>
	<?php echo wellco_get_template_part( 'admin/admin-tpl/mascot-tabs' ); ?>

	<?php 
		if ( mascot_core_wellco_plugin_installed() ) {
			mascot_core_wellco_theme_admin_menu_system_status();
		}
	?>
</div>