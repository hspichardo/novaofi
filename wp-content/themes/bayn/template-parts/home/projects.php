<?php
/**
 * The template part that shows latest portfolio projects on the front page.
 *
 * @package Bayn
 */

$query = new WP_Query( array(
	'post_type'      => 'jetpack-portfolio',
	'posts_per_page' => 6,
) );

// Don't output anything if no portfolios are created.
if ( ! $query->have_posts() ) {
	return;
}
?>
<section class="section projects u-text-center">
	<div class="container">
		<h2 class="section__title u-text-uppercase"><?php echo esc_html( get_theme_mod( 'front_page_portfolio_title', esc_html__( 'Recent Work', 'bayn' ) ) ); ?></h2>
		<h3 class="section__subtitle"><?php echo esc_html( get_theme_mod( 'front_page_portfolio_subtitle' ) ); ?></h3>

		<div class="section__content">
			<div class="grid grid--3">
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php get_template_part( 'template-parts/content' ); ?>
				<?php endwhile; ?>
			</div>
		</div>

		<div class="projects__more">
			<a class="button" href="<?php echo esc_url( get_post_type_archive_link( 'jetpack-portfolio' ) ); ?>"><?php esc_html_e( 'More Projects', 'bayn' ); ?></a>
		</div>
	</div>
</section>

<?php wp_reset_postdata();
