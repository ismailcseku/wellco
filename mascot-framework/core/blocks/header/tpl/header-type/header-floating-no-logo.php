

	<?php if( $show_header_nav_row ): ?>
	<?php do_action( 'wellco_before_header_nav' ); ?>
	<div class="header-nav">
		<div class="header-nav-wrapper navbar-scrolltofixed">
			<div class="menuzord-container header-nav-container <?php echo esc_attr( $header_nav_row_bg_theme_colored ); ?>">
				<div class="<?php echo esc_attr( $header_layout_container_class ); ?> position-relative">
					<div class="row">
						<div class="col">
							<?php
								/**
								* wellco_header_nav_container_start hook.
								*
								*/
								do_action( 'wellco_header_nav_container_start' );
							?>

							<div class="row header-nav-col-row">
								<div class="col-sm-auto align-self-center menuzord-brand-parent me-auto me-xl-0 d-block d-xl-none">
									<?php
										/**
										* wellco_header_logo hook.
										*
										* @hooked wellco_get_header_logo
										*/
										do_action( 'wellco_header_logo' );
									?>
								</div>
								<div class="col-sm-auto align-self-center">
									<nav id="top-primary-nav" class="menuzord-primary-nav menuzord <?php echo esc_attr( $navigation_color_scheme );?> p-0" data-effect="<?php echo esc_attr( $navigation_primary_effect );?>" data-animation="<?php echo esc_attr( $navigation_css3_animation );?>" data-align="left">
										<?php
											/**
											* wellco_header_primary_nav hook.
											*
											* @hooked wellco_get_header_primary_nav
											*/
											do_action( 'wellco_header_primary_nav', 'main-nav' );
										?>
									</nav>
								</div>
								<div class="col-sm-auto <?php echo (is_rtl()) ? esc_attr( 'me-xl-auto' ) : esc_attr( 'ms-xl-auto' );?> align-self-center pe-lg-0">
									<div class="list-inline nav-side-icon-list">
									<?php
										/**
										* wellco_header_nav_side_icons hook.
										*
										* @hooked wellco_get_header_search_icon - 10
										* @hooked wellco_get_header_mini_cart_icon - 15
										* @hooked wellco_get_header_side_push_panel_sidebar - 20
										* @hooked wellco_get_header_nav_custom_button - 25
										*/
										do_action( 'wellco_header_nav_side_icons' );
									?>
									</div>
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
						<div class="col-12 d-block d-xl-none top-primary-nav-clone-parent">
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