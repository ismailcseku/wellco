<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="link-content">
		<?php do_action( 'wellco_blog_post_entry_header_start' ); ?>
		<?php wellco_get_post_thumbnail( $post_format ); ?>
		<?php do_action( 'wellco_blog_post_entry_header_end' ); ?>
	</div>
</article>