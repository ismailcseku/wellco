<div class="row">
  <div class="col-md-12 sm-text-center title-content">
	<?php do_action( 'wellco_page_title_content_start' ); ?>
	<?php if( $title_area_show_breadcrumb ) { wellco_display_breadcrumbs(); } ?>
	<?php if( $title_area_show_subtitle ) { wellco_get_title_area_subtitle(); } ?>
	<?php if( $title_area_show_title ) { wellco_get_title_area_title(); } ?>
	<?php do_action( 'wellco_page_title_content_end' ); ?>
  </div>
</div>