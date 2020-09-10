<?php
/**
 * Displays header jumbotron
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 */
?>
<div class="site-branding">

	<div class="site-logo">
	<?php if ( has_custom_logo() ) : ?>
		<?php the_custom_logo(); ?>
	<?php else : ?>
		<a href="http://localhost/champions/" class="custom-logo-link" rel="home" aria-current="page"><img src="<?php echo get_template_directory_uri() ?>/images/Webathon_logo.png" class="custom-logo" alt="Webathon"></a>
	<?php endif; ?>
	</div>
	<?php $blog_info = get_bloginfo( 'name' ); ?>
	

	<?php
	$description = get_bloginfo( 'description', 'display' );
	if ( $description || is_customize_preview() ) :
		?>
			<p class="site-description">
				<?php echo $description; ?>
			</p>
	<?php endif; ?>
	
	<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'champions' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'header-menu',
					'menu_class'     => 'main-menu',
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	<?php endif; ?>
	
	<?php if ( has_nav_menu( 'social' ) ) : ?>
		<nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'champions' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'social',
					'menu_class'     => 'social-links-menu',
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>' . champions_get_icon_svg( 'link' ),
					'depth'          => 1,
				)
			);
			?>
		</nav><!-- .social-navigation -->
	<?php endif; ?>
</div><!-- .site-branding -->
