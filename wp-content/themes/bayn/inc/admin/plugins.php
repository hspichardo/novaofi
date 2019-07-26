<?php
/**
 * Add required and recommended plugins.
 *
 * @package Bayn
 */

add_action( 'tgmpa_register', 'bayn_register_required_plugins' );

/**
 * Register required plugins
 *
 * @since  1.0
 */
function bayn_register_required_plugins() {
	$plugins = bayn_required_plugins();

	$config = array(
		'id'          => 'bayn',
		'has_notices' => false,
	);

	tgmpa( $plugins, $config );
}

/**
 * List of required plugins
 */
function bayn_required_plugins() {
	return array(
		array(
			'name'     => esc_html__( 'Jetpack', 'bayn' ),
			'slug'     => 'jetpack',
			'required' => true,
		),
		array(
			'name' => esc_html__( 'One click demo import', 'bayn' ),
			'slug' => 'one-click-demo-import',
		),
		array(
			'name' => esc_html__( 'Ultimate Fonts', 'bayn' ),
			'slug' => 'ultimate-fonts',
		),
		array(
			'name' => esc_html__( 'Ultimate Colors', 'bayn' ),
			'slug' => 'ultimate-colors',
		),
	);
}
