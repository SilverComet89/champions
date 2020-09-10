<?php
/**
 * Displays header jumbotron
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 */
?>

<?php if ( get_header_image() ) : ?>
    <div id="site-header">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
			<div class="header-text">
				<h1><?php echo get_theme_mod('champions_header_title', 'Your new website solution'); ?></h1>
				<h2><?php echo get_theme_mod('champions_header_subtitle', wp_kses_post('Become <b>successful</b> with our integrated web packages')); ?></h2>
				<button><?php echo get_theme_mod('champions_header_button_text', 'Learn more') ?></button>
			</div>
        </a>
    </div>
<?php endif; ?>
