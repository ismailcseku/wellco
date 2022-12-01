<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if (is_sticky()) {
		echo '<div class="post-sticky-icon" title="' . esc_attr__('Sticky Post', 'wellco') . '"><i class="fas fa-map-pin"></i></div>';
	}
	?>
	<?php if( $show_post_featured_image ) { ?>
		<div class="entry-header">
			<?php do_action( 'wellco_blog_post_entry_header_start' ); ?>
			<?php wellco_get_post_thumbnail( $post_format ); ?>
			<?php if ( has_post_thumbnail() ) { ?>
				<?php if( wellco_get_redux_option( 'blog-settings-post-meta', true, 'show-post-date' ) ) { ?>
					<div class="post-single-meta">
						<?php wellco_post_shortcode_single_meta( 'show-post-date-split' ); ?>
					</div>
				<?php } ?>
			<?php } ?>
			<?php do_action( 'wellco_blog_post_entry_header_end' ); ?>
		</div>
	<?php } ?>
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