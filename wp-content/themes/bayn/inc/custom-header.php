<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Bayn
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses bayn_header_style()
 */
function bayn_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'bayn_custom_header_args', array(
		'default-text-color' => 'fff',
		'width'              => 1920,
		'height'             => 500,
		'flex-width'         => true,
		'flex-height'        => true,
		'default-image'      => get_template_directory_uri() . '/images/header.jpg',
		'wp-head-callback'   => 'bayn_header_style',
	) ) );
	register_default_headers( array(
		'work-space' => array(
			'url'           => '%s/images/header.jpg',
			'thumbnail_url' => '%s/images/header.jpg',
			'description'   => esc_html__( 'Work Space', 'bayn' ),
		),
	) );
}

add_action( 'after_setup_theme', 'bayn_custom_header_setup' );

if ( ! function_exists( 'bayn_header_style' ) ) :
	/**
	 * Show the header image and optionally hide the site title, site description.
	 */
	function bayn_header_style() {
		$style = '';
		if ( has_header_image() ) {
			$style .= '.page-header { background-image: url(' . esc_url( get_header_image() ) . '); }';
		}
		if ( ! display_header_text() ) {
			$style .= '.site-title, .site-description { clip: rect(1px, 1px, 1px, 1px); position: absolute; }';
		}
		if ( $style ) :
			?>
			<style id="bayn-header-css">
				<?php echo $style; // WPCS: XSS OK. ?>
			</style>
			<?php
		endif;
	}
endif;

/**
 * Use featured image for the header image on single post/page.
 *
 * @param string $image Header image URL.
 *
 * @return string
 */
function bayn_header_image_singular( $image ) {
	/**
	 * Allow developers to bypass the featured image with filter.
	 *
	 * @param bool
	 */
	if ( false === apply_filters( 'bayn_header_image_singular', true ) ) {
		return $image;
	}

	/**
	 * List of supported post types that use featured image for the header image.
	 */
	$post_types = array( 'post', 'page', 'jetpack-portfolio' );

	$post_types = apply_filters( 'bayn_header_image_post_types', $post_types );
	if ( ! is_singular( $post_types ) || ! has_post_thumbnail() ) {
		return $image;
	}

	$thumbnail = get_the_post_thumbnail_url( null, 'full' );
	if ( $thumbnail ) {
		$image = $thumbnail;
	}

	return $image;
}

add_filter( 'theme_mod_header_image', 'bayn_header_image_singular' );
