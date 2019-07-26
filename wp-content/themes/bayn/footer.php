<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bayn
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div class="footer-widgets">
			<div class="container">
				<div class="grid grid--4">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="site-info">
		<div class="container">
			<p> Todos los Derechos Reservados ----  NOVA-OFI S.A </p>
			<!-- <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bayn' ) ); ?>">
				<?php
					/* translators: Wordpress
					printf( esc_html__( 'Proudly powered by %s', 'bayn' ), 'WordPress' ); */
				?>
			</a> -->
			<!-- <span class="sep"> | </span> -->
			<?php
				/* translators: theme name and theme author url 
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'bayn' ), '<a href="https://gretathemes.com/wordpress-themes/bayn/">Bayn</a>', 'GretaThemes' );*/
			?>
		</div><!-- .site-info -->
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
