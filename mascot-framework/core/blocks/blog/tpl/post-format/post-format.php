<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if( $show_post_featured_image ) { ?>
	<div class="entry-header">
		<?php do_action( 'wellco_blog_post_entry_header_start' ); ?>
		<?php wellco_get_post_thumbnail( $post_format ); ?>
		<?php do_action( 'wellco_blog_post_entry_header_end' ); ?>
	</div>
	<?php } ?>
	<div class="entry-content">
		<?php do_action( 'wellco_blog_post_entry_content_start' ); ?>
		<?php wellco_get_post_title(); ?>
		<?php wellco_post_meta(); ?>
		<div class="post-excerpt">
			<?php wellco_get_excerpt(); ?>
		</div>
		<?php echo wellco_blog_read_more_link(); ?>
		<?php do_action( 'wellco_blog_post_entry_content_end' ); ?>
		<div class="clearfix"></div>
	</div>
</article>