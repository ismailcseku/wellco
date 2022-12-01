<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<div class="page-content">
			<?php
				wellco_get_blog_single_post_thumbnail();
			?>
			<?php
				/**
				* wellco_before_page_content hook.
				*
				*/
				do_action( 'wellco_before_page_content' );
			?>
			<?php
				the_content();
			?>
			<?php
				/**
				* wellco_after_page_content hook.
				*
				*/
				do_action( 'wellco_after_page_content' );
			?>

			<?php wellco_get_post_wp_link_pages(); ?>
			
			<?php
				if( wellco_get_redux_option( 'page-settings-show-share' ) ) {
					wellco_get_social_share_links();
				}
			?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php
	if( $page_show_comments ) {
		wellco_show_comments();
	}
?>
