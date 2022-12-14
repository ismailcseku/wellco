
	<?php if( $show_header_nav_row ): ?>
	<?php do_action( 'wellco_before_header_nav' ); ?>
	<!-- fullpage nav --> 

	<div class="tm-fullpage-nav-header">
		<div class="tm-fullpage-nav-header-inner navbar-scrolltofixed">
			<div class="container-fluid tm-fullpage-nav-header-container">
				<div class="row">
					<div class="col-auto align-self-center header-mid-left text-center text-sm-left">
					<?php
						/**
						* wellco_header_logo hook.
						*
						* @hooked wellco_get_header_logo
						*/
						do_action( 'wellco_header_logo' );
					?>
					</div>
					<div class="col-auto align-self-center <?php echo (is_rtl()) ? esc_attr( 'me-auto' ) : esc_attr( 'ms-auto' );?> header-mid-right text-center text-sm-right">
						<a href="#fullpage-nav" class="fullpage-nav-toggle"> <span>Toggle menu</span> </a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<nav id="fullpage-nav" class="panel" role="navigation">
		<div class="fullpage-nav-inner">
			<div class="fullpage-nav-menu">
				<?php
					/**
					* wellco_header_primary_nav hook.
					*
					* @hooked wellco_get_header_primary_nav
					*/
					do_action( 'wellco_header_primary_nav', 'main-nav' );
				?>
			</div>
			<?php
				wellco_get_header_menufullpage_sidebar();
			?>
		</div>
	</nav>
	<!-- end fullpage nav --> 
	<?php do_action( 'wellco_after_header_nav' ); ?>
	<?php endif; ?>