<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'post-single clearfix ' . $enable_drop_caps ) ); ?>>
	<div class="entry-header">
		<?php do_action( 'wellco_blog_single_entry_header_start' ); ?>
		<?php wellco_get_blog_single_post_thumbnail( $post_format ); ?>
		<?php do_action( 'wellco_blog_single_entry_header_end' ); ?>
	</div>
	<div class="entry-content">
		<?php do_action( 'wellco_blog_single_entry_content_start' ); ?>
		<?php wellco_get_single_post_title(); ?>
		<div class="post-excerpt">
			<?php the_content();?>
			<div class="clearfix"></div>
		</div>
		<?php wellco_get_post_wp_link_pages(); ?>
		<?php wellco_blog_single_post_meta(); ?>
		<?php do_action( 'wellco_blog_single_entry_content_end' ); ?>
	</div>
</article>