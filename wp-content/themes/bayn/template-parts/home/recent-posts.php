<?php
/**
 * The template part that shows the services on the front page.
 *
 * @package Bayn
 */

$query = new WP_Query( array(
	'posts_per_page' => 4,
	'post_type'      => 'post',
	'post_status'    => 'publish',
) );

if ( ! $query->have_posts() ) {
	return;
}

?>

<section class="recent-posts section u-text-center">
	<div class="container">
		<h2 class="section__title u-text-uppercase"><?php echo esc_html( get_theme_mod( 'front_page_blog_title', esc_html__( 'Recent Posts', 'bayn' ) ) ); ?></h2>
		<h3 class="section__subtitle"><?php echo esc_html( get_theme_mod( 'front_page_blog_subtitle' ) ); ?></h3>

		<div class="section__content">
			<div class="grid grid--2">
				<?php
				while ( $query->have_posts() ) : $query->the_post();
					get_template_part( 'template-parts/content' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>

		<div class="projects__more">
			<?php
			if ( get_option( 'page_for_posts' ) ) {
				echo '<a class="button" href="' . esc_url( get_permalink( get_option( 'page_for_posts' ) ) ) . '">' . esc_html__( 'View all', 'bayn' ) . '</a>';
			} else {
				echo '<a class="button" href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'View all', 'bayn' ) . '</a>';
			} ?>
		</div>
	</div>
</section>
