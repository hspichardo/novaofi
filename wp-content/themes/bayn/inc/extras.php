<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Bayn
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bayn_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'bayn_body_classes' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bayn_hide_sidebar( $classes ) {
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'bayn_hide_sidebar' );

/**
 * Adds custom classes to the .site-branding if logo width is larger than 96px.
 *
 * @return string
 */
function bayn_logo_class() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if ( ! $custom_logo_id ) {
		return '';
	}

	$logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
	if ( is_array( $logo ) && isset( $logo[1] ) && 96 < $logo[1] ) {
		return ' site-branding--vertical';
	}

	return '';
}

add_filter( 'navigation_markup_template', 'bayn_navigation_markup_template' );

/**
 * Filters the navigation markup template.
 *
 * @param string $template markup template.
 *
 * @return string
 */
function bayn_navigation_markup_template( $template ) {
	return '
	<nav class="navigation %1$s">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>';
}

/**
 * HTML Tag Scheme
 */
function bayn_html_tag_schema() {
	$schema = 'http://schema.org/';
	// Is single post.
	if ( is_single() ) {
		$type = 'Article';
	} // End if().
	elseif ( is_author() ) {
		$type = 'ProfilePage';
	} // Is search results page.
	elseif ( is_search() ) {
		$type = 'SearchResultsPage';
	} else {
		$type = 'WebPage';
	}
	echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"'; // WPCS: XSS OK.
}

/**
 * Demo files for importing.
 *
 * @return array List of demos configuration.
 */
function bayn_import_files() {
	return array(
		array(
			'import_file_name'           		=> esc_html__( 'Demo 1', 'bayn' ),
			'local_import_file_url'           	=> get_template_directory_uri() . '/demo/content.xml',
			'local_import_widget_file_url'     	=> get_template_directory_uri() . '/demo/widgets.wie',
			'local_import_customizer_file_url' 	=> get_template_directory_uri() . '/demo/theme-options.dat',
			'import_preview_image_url'   		=> get_template_directory_uri() . '/screenshot.jpg',
		),
	);
}

add_filter( 'pt-ocdi/import_files', 'bayn_import_files' );

/**
 * Setup the theme after importing demo.
 */
function bayn_after_import_setup() {
	// Assign menus to their locations.
	$menu_main = get_term_by( 'slug', 'main', 'nav_menu' );
	set_theme_mod( 'nav_menu_locations', array(
		'menu-1' => $menu_main->term_id,
	) );

	// Font page.
	$home = get_page_by_title( 'Front Page' );
	if ( $home ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home->ID );
	}

	// Blog page.
	$blog = get_page_by_title( 'Blog' );
	if ( $blog ) {
		update_option( 'page_for_posts', $blog->ID );
	}

}

add_action( 'pt-ocdi/after_import', 'bayn_after_import_setup' );
