<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cannot access pages directly.' );
}
?>

<div class="wrap about-wrap mascot-admin-tpl-wrapper">
	<?php echo wellco_get_template_part( 'admin/admin-tpl/mascot-header' ); ?>
	<?php echo wellco_get_template_part( 'admin/admin-tpl/mascot-tabs' ); ?>

	<div class="feature-section three-col">
		<div class="col">
			<div class="mascot-faq-tab">
				<div class="heading"><?php esc_html_e( 'Documentation', 'wellco' ); ?></div>
				<div class="content">
					<?php esc_html_e( 'Goto the following link to get documentation on this theme.', 'wellco' ); ?> <br><br>
					<a class="button button-default" target="_blank" href="http://docs.kodesolution.info/wp/"><?php esc_html_e( 'Online Documentation', 'wellco' ); ?> >></a>
				</div>
			</div>
		</div>

	</div>
</div>