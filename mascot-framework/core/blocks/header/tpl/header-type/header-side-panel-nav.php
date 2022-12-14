
	<?php if( $show_header_nav_row ): ?>
	<?php do_action( 'wellco_before_header_nav' ); ?>
	<div class="header-nav">
		<div class="header-nav-wrapper navbar-scrolltofixed">
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

						<nav id="top-primary-nav" class="menuzord-primary-nav menuzord <?php echo esc_attr( $navigation_color_scheme );?> d-flex justify-content-between align-items-center" data-effect="<?php echo esc_attr( $navigation_primary_effect );?>" data-animation="<?php echo esc_attr( $navigation_css3_animation );?>" data-align="right">
						
							<?php
								/**
								* wellco_header_logo hook.
								*
								* @hooked wellco_get_header_logo
								*/
								do_action( 'wellco_header_logo' );
							?>
							
							<div id="side-panel-trigger" class="side-panel-trigger float-end pt-20 pb-10">
								<a href="#">
									<div class="hamburger-box">
										<div class="hamburger-inner"></div>
									</div>
								</a>
							</div>
						</nav>
						<div class="side-panel-body-overlay"></div>
						<div id="side-panel-container" class="dark">
							<div class="side-panel-wrap">
								<div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="fa fa-times side-panel-trigger-icon"></i></a></div>
								<?php
									/**
									* wellco_header_logo hook.
									*
									* @hooked wellco_get_header_logo
									*/
								?>
								<div class="clearfix"></div>
								<?php
									/**
									* wellco_header_primary_nav hook.
									*
									* @hooked wellco_get_header_primary_nav
									*/
								?>
								<?php
									wellco_get_header_side_push_panel_sidebar();
								?>
							</div>
						</div>

						<?php
							/**
							* wellco_header_nav_container_end hook.
							*
							*/
							do_action( 'wellco_header_nav_container_end' );
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php do_action( 'wellco_after_header_nav' ); ?>
	<?php endif; ?>