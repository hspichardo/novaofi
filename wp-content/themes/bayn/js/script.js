jQuery( function ( $ ) {
	'use strict';

	var iOS = false,
		ieMobile = false,
		isMac = false;

	function platformDetect() {
		ieMobile = ! ! navigator.userAgent.match( /Windows Phone/i );
		iOS = /iPad|iPhone|iPod/.test( navigator.userAgent ) && ! window.MSStream;
		isMac = navigator.platform.toUpperCase().indexOf( 'MAC' ) >= 0;
	}

	/**
	 * Add toggle dropdown icon for sidebar menu.
	 * @param selector
	 */
	function toggleMenu( selector ) {
		// Add dropdown toggle icon that displays child menu items.
		var $icon = $( '<i class="dropdown-toggle fa fa-angle-right"></i>' ),
			clickEvent = 'ontouchstart' in window ? 'touchstart' : 'click',
			$container = $( selector );

		$container.find( '.menu-item-has-children > a' ).after( $icon );

		// Toggle buttons and sub menu items with active children menu items.
		$container.find( '.current-menu-ancestor > .sub-menu' ).siblings( 'i' ).addClass( 'is-open' );
		$container.on( clickEvent, '.dropdown-toggle', function ( e ) {
			e.preventDefault();
			var $this = $( this );
			$this.toggleClass( 'is-open' );
		} );
	}

	// Hero slider
	if ( $().slick ) {
		var $slider = $( '#slider' );
		var $sliderSpeed = $slider.data( 'speed' );
		$slider.slick( {
			autoplay: true,
			arrows: true,
			dots: false,
			easing: 'ease',
			speed: $sliderSpeed,
			fade: true,
			adaptiveHeight: true,
			nextArrow: '<div class="slick-next"></div>',
			prevArrow: '<div class="slick-prev"></div>'
		} );
		if ( $sliderSpeed == 0 ) {
			$slider.slick( 'pause' );
			$slider.find( $( '.slick-arrow' ) ).hide();
		}
	}

	// Testimonials
	if ( $().slick ) {
		$( '.testimonials-slider' ).slick( {
			arrows: false,
			dots: true,
			fade: true,
			speed: 500
		} );
	}

	// Toggle primary menu
	if ( $( window ).width() < 1200 ) {
		toggleMenu( '#primary-menu' );
	}

	// Toggle vertical menu
	toggleMenu( '#secondary .widget_nav_menu' );
	platformDetect();

} );
