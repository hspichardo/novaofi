<?php
/**
 * The template part that shows the services on the front page.
 *
 * @package Bayn
 */

$query = new WP_Query( array(
	'post_type'      => 'jetpack-testimonial',
	'posts_per_page' => 3,
) );

// Don't output anything if no portfolios are created.
if ( ! $query->have_posts() ) {
	return;
}

?>

<section class="testimonials section u-text-center">
	<h2 class="section__title u-text-uppercase"><?php echo esc_html( get_theme_mod( 'front_page_testimonials_title', esc_html__( 'Testimonials', 'bayn' ) ) ); ?></h2>

	<div class="testimonials-slider container">
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>

			<div class="testimonial-content">
				<?php
				the_content();
				the_post_thumbnail();
				?>
			</div>

	<?php endwhile; ?>
	</div>
	<?php wp_reset_postdata(); ?>
</section>
