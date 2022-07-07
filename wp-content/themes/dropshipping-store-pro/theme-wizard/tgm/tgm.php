<?php
require get_template_directory() . '/theme-wizard/tgm/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function drop_shipping_pro_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Contact Form 7', 'dropshipping-store-pro' ),
			'slug'             => 'contact-form-7',
			'source'           => '',
			'required'         => true,
			'force_activation' => false,
		),
	    array(
		  'name'             => __( 'WooCommerce', 'dropshipping-store-pro' ),
		  'slug'             => 'woocommerce',
		  'source'           => '',
		  'required'         => true,
		  'force_activation' => false,
		),
		array(
		  'name'             => __( 'GTranslate', 'dropshipping-store-pro' ),
		  'slug'             => 'gtranslate',
		  'source'           => '',
		  'required'         => true,
		  'force_activation' => false,
		),
		array(
		  'name'             => __( 'Currency Switcher for WooCommerce', 'dropshipping-store-pro' ),
		  'slug'             => 'currency-switcher-woocommerce',
		  'source'           => '',
		  'required'         => true,
		  'force_activation' => false,
		),
		array(
			'name'             => __( 'YITH WooCommerce Wishlist', 'dropshipping-store-pro' ),
			'slug'             => 'yith-woocommerce-wishlist',
			'source'           => '',
			'required'         => true,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'YITH WooCommerce Quick View', 'dropshipping-store-pro' ),
			'slug'             => 'yith-woocommerce-quick-view',
			'source'           => '',
			'required'         => true,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'YITH WooCommerce Compare', 'dropshipping-store-pro' ),
			'slug'             => 'yith-woocommerce-compare',
			'source'           => '',
			'required'         => true,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'drop_shipping_pro_register_recommended_plugins' );