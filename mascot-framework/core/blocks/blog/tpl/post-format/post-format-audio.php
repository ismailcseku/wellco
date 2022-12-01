<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php do_action( 'wellco_blog_post_entry_header_start' ); ?>
		<?php wellco_get_post_thumbnail( $post_format ); ?>
		<?php do_action( 'wellco_blog_post_entry_header_end' ); ?>
	</div>
	<div class="entry-content">
		<?php do_action( 'wellco_blog_post_entry_content_start' ); ?>
		<?php wellco_post_meta(); ?>
		<?php wellco_get_post_title(); ?>
		<div class="post-excerpt">
			<?php wellco_get_excerpt(); ?>
		</div>
		<?php echo wellco_blog_read_more_link(); ?>
		<?php do_action( 'wellco_blog_post_entry_content_end' ); ?>
		<div class="clearfix"></div>
	</div>
</article>