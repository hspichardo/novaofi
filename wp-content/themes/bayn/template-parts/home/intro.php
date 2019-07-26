<?php
/**
 * The template part that shows the intro section on the front page.
 *
 * @package Bayn
 */

$features_page = get_theme_mod( 'features_section' );
if ( ! $features_page ) {
	return;
}

$post = get_post( $features_page );
setup_postdata( $post );

?>

<section class="section intro u-text-center">
	<div class="container">
		<h2 class="section section__title u-text-uppercase"><?php the_title(); ?></h2>
		<div class="section__content"><?php the_content(); ?></div>
	</div>
</section>
