<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		
	
		<div class="site-info">
			<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
				<nav id="footer-navigation" class="footer-navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'champions' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-menu',
							'menu_class'     => 'footer-menu',
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			<?php endif; ?>
			<div class="site-logo">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<a href="http://localhost/champions/" class="custom-logo-link" rel="home" aria-current="page"><img src="<?php echo get_template_directory_uri() ?>/images/Webathon_logo.png" class="custom-logo" alt="Webathon"></a>
				<?php endif; ?>
			</div>
			<p>This is some made up copyright stuff. Our lawyers are working round the clock to ensure this text remains relevant so our editors don't have to bother keeping up to date.</p>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
