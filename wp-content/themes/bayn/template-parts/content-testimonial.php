<?php
/**
 * The template used for displaying testimonials.
 *
 * @package TheFour
 */

?>

<div class="testimonial-content">
	<?php
	the_content();
	thefour_edit_link();
	?>
</div>
<div class="media author">
	<?php the_post_thumbnail( 'full', array(
		'class' => 'media__image',
	) ); ?>
</div>
