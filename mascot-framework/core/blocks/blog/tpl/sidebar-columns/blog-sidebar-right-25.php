<div class="row tm-blog-sidebar-row">
	<div class="col-lg-9">
		<div class="main-content-area">
			<?php do_action( 'wellco_blog_main_content_area_start' ); ?>

			<?php
				wellco_get_blog_post_layout();
			?>
			<?php
				wellco_get_pagination();
			?>

			<?php do_action( 'wellco_blog_main_content_area_end' ); ?>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="sidebar-area tm-sidebar-area sidebar-right">
			<div class="sidebar-area-inner">
				<?php get_sidebar( 'right' ); ?>
			</div>
		</div>
	</div>
</div>