<?php

//removed product link
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

//remove from archive
add_filter('woosc_button_position_archive','__return_false');
add_filter('woosq_button_position','__return_false');
add_filter('woosw_button_position_archive','__return_false');

add_action( 'woocommerce_after_shop_loop_item_title', 'wellco_catalog_default_product_cat', 3 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_after_shop_loop_item_title', 'wellco_catalog_default_product_title', 7 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );


//title
if ( ! function_exists( 'wellco_catalog_default_product_title' ) ) {
	/**
	 * Add some HTML codes
	 *
	 */
	function wellco_catalog_default_product_title() {
	?>
		<h5 class="woocommerce-loop-product__title product-title"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
	<?php
	}
}

//category
if ( ! function_exists( 'wellco_catalog_default_product_cat' ) ) {
	/**
	 * Add some HTML codes
	 *
	 */
	function wellco_catalog_default_product_cat() {
	?>
		<span class="product-categories"><?php echo wc_get_product_category_list( get_the_ID() ); ?></span>
	<?php
	}
}


//removed quick_view_button
if (class_exists('YITH_WCQV_Frontend')):
remove_action( 'woocommerce_after_shop_loop_item', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
endif;

//add before shop loop item
add_action( 'woocommerce_before_shop_loop_item', 'wellco_catalog_default_before_shop_loop_item', 11 );
if ( ! function_exists( 'wellco_catalog_default_before_shop_loop_item' ) ) {
	/**
	 * Add some HTML codes
	 *
	 */
	function wellco_catalog_default_before_shop_loop_item() {
	?>
	<div class="tm-woo-product-item-inner">
		<div class="product-header-wrapper">
	<?php
	}
}

//add before shop loop item
add_action( 'woocommerce_before_shop_loop_item', 'wellco_catalog_default_before_shop_loop_item_two', 13 );
if ( ! function_exists( 'wellco_catalog_default_before_shop_loop_item_two' ) ) {
	/**
	 * Add some HTML codes
	 *
	 */
	function wellco_catalog_default_before_shop_loop_item_two() {
		$products_thumb_type = wellco_get_redux_option( 'shop-archive-settings-products-thumb-type', 'image-featured' );
	?>
		<div class="thumb <?php echo esc_attr( $products_thumb_type );?>">
	<?php
	}
}

//add before shop loop item
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 12 );


//add before shop loop item title
add_action( 'woocommerce_before_shop_loop_item_title', 'wellco_catalog_default_before_shop_loop_item_title', 11 );
if ( ! function_exists( 'wellco_catalog_default_before_shop_loop_item_title' ) ) {
	/**
	 * Add some HTML codes
	 *
	 */
	function wellco_catalog_default_before_shop_loop_item_title() {
	?>
		</div>
		<div class="product-button-holder">
			<?php if ( mascot_core_wellco_plugin_installed() ) { ?>
				<?php if (class_exists('WPCleverWoosc')) { ?>
					<div class="product-meta woocommerce-compare">
						<?php mascot_core_wellco_compare_button(); ?>
					</div>
				<?php } ?>
				<?php if (class_exists('WPCleverWoosw')) { ?>
					<div class="product-meta woocommerce-wishlist">
						<?php mascot_core_wellco_wishlist_button(); ?>
					</div>
				<?php } ?>
				<?php if (class_exists('WPCleverWoosq')) { ?>
					<div class="product-meta woocommerce-quick-view">
						<?php mascot_core_wellco_quickview_button(); ?>
					</div>
				<?php } ?>
				<div class="product-meta woo-cart-holder"><?php woocommerce_template_loop_add_to_cart() ?></div>
			<?php } ?>
		</div>
	</div>
	<?php
	}
}




//add shop loop item title
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'wellco_catalog_default_shop_loop_item_title', 10 );
if ( ! function_exists( 'wellco_catalog_default_shop_loop_item_title' ) ) {
	/**
	 * Add some HTML codes
	 *
	 */
	function wellco_catalog_default_shop_loop_item_title() {
	?>
	<div class="product-details">
	<?php
	}
}

//add after shop loop item title
add_action( 'woocommerce_after_shop_loop_item_title', 'wellco_catalog_default_after_shop_loop_item_title', 11 );
if ( ! function_exists( 'wellco_catalog_default_after_shop_loop_item_title' ) ) {
	/**
	 * Add some HTML codes
	 *
	 */
	function wellco_catalog_default_after_shop_loop_item_title() {
	?>
	<?php
	}
}


//add after shop loop item
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'wellco_catalog_default_after_shop_loop_item', 50 );
if ( ! function_exists( 'wellco_catalog_default_after_shop_loop_item' ) ) {
	/**
	 * Add some HTML codes
	 *
	 */
	function wellco_catalog_default_after_shop_loop_item() {
	?>
	</div>
	</div>
	<?php
	}
}
