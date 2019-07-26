<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Bayn
 */

if ( ! function_exists( 'bayn_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function bayn_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$options = get_option( 'jetpack_content_post_details_author' );
		if ( $options ) {
			$posted_on = sprintf(
				/* translators: post date. */
				esc_html_x( ' on %s', 'post date', 'bayn' ),
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);
		} else {
			$posted_on = sprintf(
				/* translators: post date. */
				esc_html_x( ' On %s', 'post date', 'bayn' ),
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);
		}

		$byline = sprintf(
			/* translators: post author. */
			esc_html_x( 'by %s', 'post author', 'bayn' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo get_avatar( get_the_author_meta( 'user_email' ), 40 ), '<span class="byline">', $byline, '</span><span class="posted-on"> ', $posted_on, '.</span>'; // WPCS: XSS OK.

		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			/* translators: %s: post title */
			comments_popup_link( sprintf( wp_kses( __( ' Leave a Comment<span class="screen-reader-text"> on %s</span>', 'bayn' ), array(
				'span' => array(
					'class' => array(),
				),
			) ), get_the_title() ) );
			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'bayn_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function bayn_entry_footer() {
		// Hide tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list();
			if ( $tags_list ) {
				echo '<div class="tags-links">', $tags_list, '</div>'; // WPCS: XSS OK.
			}
		}

		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'bayn' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function bayn_categorized_blog() {
	$all_the_cool_cats = get_transient( 'bayn_categories' );
	if ( false === $all_the_cool_cats ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'bayn_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so bayn_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so bayn_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in bayn_categorized_blog.
 */
function bayn_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'bayn_categories' );
}

add_action( 'edit_category', 'bayn_category_transient_flusher' );
add_action( 'save_post', 'bayn_category_transient_flusher' );

/**
 * Display read more link.
 */
function bayn_content_more() {
	/* translators: post title */
	$text = sprintf( __( 'Continue reading &#10142; %s', 'bayn' ), '<span class="screen-reader-text">' . get_the_title() . '</span>' );
	printf( '<p class="link-more"><a href="%s" class="more-link">%s</a></p>', esc_url( get_permalink() ), wp_kses_post( $text ) );
}
