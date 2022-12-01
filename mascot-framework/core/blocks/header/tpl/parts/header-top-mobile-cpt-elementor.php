<?php if( $header_top_mobile_cpt_post ) { ?>
<div id="elementor-header-top-mobile">
	<?php 
		//query args
		$args = array(
			'post_type' => 'header-top',
			'p' => $header_top_mobile_cpt_post,
		);
		$the_query = new \WP_Query( $args );
		$params['the_query'] = $the_query;
		if ( $the_query->have_posts() ) : 
			while ( $the_query->have_posts() ) : 
				$the_query->the_post();
				the_content(get_the_ID());
			endwhile;
			wp_reset_postdata();
		endif;
	?>
</div>
<?php } ?>