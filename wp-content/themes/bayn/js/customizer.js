/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $, customize ) {
	'use strict';

	// List of text elements that have postMessage transport.
	var texts = {
		blogname: '.site-title a',
		blogdescription: '.site-description',
		front_page_portfolio_title: '.projects .section__title',
		front_page_portfolio_subtitle: '.projects .section__subtitle',
		front_page_blog_title: '.recent-posts .section__title',
		front_page_blog_subtitle: '.recent-posts .section__subtitle',
		front_page_testimonials_title: '.testimonials .section__title',
		front_page_contact_title: '.contact-info__title',
		front_page_contact_info: '.contact-info__details',
		cta_text: '.section--cta__text',
		cta_link_text: '.section--cta__link a',
	};

	// Live update the text elements.
	$.each( texts, function ( setting, selector ) {
		customize( setting, function ( value ) {
			value.bind( function ( to ) {
				$( selector ).text( to );
			} );
		} );
	} );

	// Live update HTML content for Contact info details.
	customize( 'front_page_cta', function ( value ) {
		value.bind( function ( to ) {
			$( '.contact-info__details' ).html( to );
		} );
	} );
} )( jQuery, wp.customize );
