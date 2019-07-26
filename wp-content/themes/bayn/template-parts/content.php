<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bayn
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<a class="entry-media" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail(); ?>
			<?php if ( is_sticky() ) : ?>
				<span class="sticky-label"><?php esc_html_e( 'Featured', 'bayn' ); ?></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<div class="entry-text">
		<h2 class="entry-title u-text-uppercase"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space before/after the slash */
			$categories_list = get_the_category_list( esc_html__( ' / ', 'bayn' ) );
			if ( $categories_list && bayn_categorized_blog() && ! is_front_page() ) {
				echo '<div class="entry-category">', $categories_list, '</div>'; // WPCS: XSS OK.
			}
			if ( is_front_page() ) {
				echo '<div class="entry-time"><span class="posted-on">', the_time( 'M j, Y' ) , '</span><span class="entry-category">', $categories_list ,'</div>'; // WPCS: XSS OK.
			}
		} elseif ( 'jetpack-portfolio' === get_post_type() ) {
			the_terms( get_the_ID(), 'jetpack-portfolio-type', '<div class="entry-category">', ' / ', '</div>' );
		}
		$title = get_the_title();
		if ( empty( $title ) ) {
			bayn_content_more();
		}
		?>

	</div>

</article><!-- #post-## -->
