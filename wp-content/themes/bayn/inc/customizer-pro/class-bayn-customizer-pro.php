<?php
/**
 * Handles the "Go Pro" section in the Customizer.
 *
 * @package Bayn
 */

/**
 * The customizer pro class.
 */
final class Bayn_Customizer_Pro {

	/**
	 * Theme slug.
	 *
	 * @var string Theme slug.
	 */
	private $slug;

	/**
	 * UTM link.
	 *
	 * @var string UTM link.
	 */
	private $utm;

	/**
	 * Sets up initial actions.
	 */
	public function init() {

		$theme      = wp_get_theme();
		$this->slug = $theme->template;
		$this->utm  = '?utm_source=WordPress&utm_medium=link&utm_campaign=' . $this->slug;

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @param  WP_Customize_Manager $manager WP_Customize_Manager instance.
	 */
	public function sections( $manager ) {
		// Load custom sections.
		require get_template_directory() . '/inc/customizer-pro/class-bayn-customizer-section-pro.php';

		// Register custom section types.
		$manager->register_section_type( 'Bayn_Customizer_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Bayn_Customizer_Section_Pro(
				$manager,
				'bayn-pro',
				array(
					'doc_title' => esc_html__( 'Need Some Help?', 'bayn' ),
					'doc_text'  => esc_html__( 'Documentation', 'bayn' ),
					'doc_url'   => esc_url( "https://gretathemes.com/wordpress-themes/{$this->slug}/{$this->utm}" ),
					'priority'  => 99999999,
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 */
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'bayn-customize-pro-script', get_template_directory_uri() . '/inc/customizer-pro/customize-controls.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'bayn-customize-pro-style', get_template_directory_uri() . '/inc/customizer-pro/customize-controls.css' );
	}
}
