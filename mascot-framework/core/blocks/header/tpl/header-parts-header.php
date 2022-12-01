	<!-- Header -->
	<?php
		/**
		* wellco_before_header hook.
		*
		*/
		do_action( 'wellco_before_header' );
	?>
	<header id="header" class="header <?php echo esc_attr(implode(' ', $header_classes)); ?>" <?php if( $params['header_layout_type'] == 'header-vertical-nav' ) { ?> style="<?php echo esc_attr( $vertical_nav_bgcolor ); ?> <?php echo esc_attr( $vertical_nav_bgimg ); ?>" <?php } ?>>
		<?php
			/**
			* wellco_header_start hook.
			*
			*/
			do_action( 'wellco_header_start' );
		?>
		<?php
			/**
			* wellco_header_top_area hook.
			*
			* @hooked wellco_get_header_top
			*/
			do_action( 'wellco_header_top_area' );
		?>
		<?php
			wellco_get_header_layout_type();
		?>

		<?php
			/**
			* wellco_header_end hook.
			*
			*/
			do_action( 'wellco_header_end' );
		?>
	</header>
	<?php
		/**
		* wellco_after_header hook.
		*
		*/
		do_action( 'wellco_after_header' );
	?>