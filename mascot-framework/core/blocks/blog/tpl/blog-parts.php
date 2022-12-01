<?php
	/**
	* wellco_before_blog_section hook.
	*
	*/
	do_action( 'wellco_before_blog_section' );
?>
<section>
	<div class="<?php echo esc_attr( $container_type ); ?>">
		<?php
			/**
			* wellco_blog_container_start hook.
			*
			*/
			do_action( 'wellco_blog_container_start' );
		?>

		<div class="blog-posts">
			<?php
				wellco_get_blog_sidebar_layout();
			?>
		</div>

	<?php
		/**
		* wellco_blog_container_end hook.
		*
		*/
		do_action( 'wellco_blog_container_end' );
	?>
	</div>
</section>
<?php
	/**
	* wellco_after_blog_section hook.
	*
	*/
	do_action( 'wellco_after_blog_section' );
?>
