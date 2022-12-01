
	<?php
	/**
	* wellco_before_top_sliders_container hook.
	*
	*/
	do_action( 'wellco_before_top_sliders_container' );
	?>
	<div class="top-sliders-container">
		<?php
			/**
			* wellco_top_sliders_container_start hook.
			*
			*/
			do_action( 'wellco_top_sliders_container_start' );
		?>

		<?php
			echo wellco_get_top_main_slider();
		?>
		
		<?php
			/**
			* wellco_top_sliders_container_end hook.
			*
			*/
			do_action( 'wellco_top_sliders_container_end' );
		?>
	</div>
	<?php
	/**
	* wellco_after_top_sliders_container hook.
	*
	*/
	do_action( 'wellco_after_top_sliders_container' );
	?>
