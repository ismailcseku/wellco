	<?php if( $show_header_nav_row ): ?>
	<?php do_action( 'wellco_before_header_nav' ); ?>
	<div class="header-nav">
		<div class="header-nav-wrapper">
			<div class="menuzord-container header-nav-container <?php echo esc_attr( $header_nav_row_bg_theme_colored ); ?>">
				<div class="<?php echo esc_attr( $header_layout_container_class ); ?> position-relative">
					<div class="row">

						<?php
							/**
							* wellco_header_nav_container_start hook.
							*
							*/
							do_action( 'wellco_header_nav_container_start' );
						?>

						<nav id="top-primary-nav" class="menuzord-primary-nav menuzord <?php echo esc_attr( $navigation_color_scheme );?>" data-effect="<?php echo esc_attr( $navigation_primary_effect );?>" data-animation="<?php echo esc_attr( $navigation_css3_animation );?>" data-align="right">
						
							<?php
								/**
								* wellco_header_logo hook.
								*
								* @hooked wellco_get_header_logo
								*/
								do_action( 'wellco_header_logo' );
							?>
							
							<?php
								/**
								* wellco_header_primary_nav hook.
								*
								* @hooked wellco_get_header_primary_nav
								*/
								do_action( 'wellco_header_primary_nav', 'main-nav' );
							?>

						</nav>
						
						<div class="vertical-nav-sidebar-widget-wrapper">
						<?php if ( is_active_sidebar( 'header-vertical-nav-sidebar' ) ) : ?>
							<?php dynamic_sidebar( 'header-vertical-nav-sidebar' ); ?>
						<?php else: ?>
							<h4><?php esc_html_e( 'This is your Vertical Nav Sidebar!', 'wellco' )?></h4>
							<p><?php echo sprintf( esc_html__( 'Please add your sidebar widgets to this section from %1$sAppearance > Widgets%2$s (Vertical Nav Sidebar).', 'wellco' ), '<strong>', '</strong>')?></p>
						<?php endif; ?>
						</div>
						
						<?php
							/**
							* wellco_header_nav_container_end hook.
							*
							*/
							do_action( 'wellco_header_nav_container_end' );
						?>

					</div>
					<div class="row top-primary-nav-clone-parent">
						<div class="col-12">
							<nav id="top-primary-nav-clone" class="menuzord-primary-nav menuzord d-block d-xl-none <?php echo esc_attr( $navigation_color_scheme );?>" data-effect="<?php echo esc_attr( $navigation_primary_effect );?>" data-animation="<?php echo esc_attr( $navigation_css3_animation );?>" data-align="right">
							<?php
								/**
								* wellco_header_primary_nav hook.
								*
								* @hooked wellco_get_header_primary_nav
								*/
								do_action( 'wellco_header_primary_nav', 'main-nav-clone' );
							?>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php do_action( 'wellco_after_header_nav' ); ?>
	<?php endif; ?>