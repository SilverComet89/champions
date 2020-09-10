<?php
/**
 * Twenty Nineteen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

/**
 * Twenty Nineteen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'champions_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function champions_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change 'champions' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'champions', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		

		
		
		

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'champions' ),
					'shortName' => __( 'S', 'champions' ),
					'size'      => 19.5,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'champions' ),
					'shortName' => __( 'M', 'champions' ),
					'size'      => 22,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'champions' ),
					'shortName' => __( 'L', 'champions' ),
					'size'      => 36.5,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Huge', 'champions' ),
					'shortName' => __( 'XL', 'champions' ),
					'size'      => 49.5,
					'slug'      => 'huge',
				),
			)
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => 'default' === get_theme_mod( 'primary_color' ) ? __( 'Blue', 'champions' ) : null,
					'slug'  => 'primary',
					'color' => champions_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 33 ),
				),
				array(
					'name'  => 'default' === get_theme_mod( 'primary_color' ) ? __( 'Dark Blue', 'champions' ) : null,
					'slug'  => 'secondary',
					'color' => champions_hsl_hex( 'default' === get_theme_mod( 'primary_color' ) ? 199 : get_theme_mod( 'primary_color_hue', 199 ), 100, 23 ),
				),
				array(
					'name'  => __( 'Dark Gray', 'champions' ),
					'slug'  => 'dark-gray',
					'color' => '#111',
				),
				array(
					'name'  => __( 'Light Gray', 'champions' ),
					'slug'  => 'light-gray',
					'color' => '#767676',
				),
				array(
					'name'  => __( 'White', 'champions' ),
					'slug'  => 'white',
					'color' => '#FFF',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'champions_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function champions_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'champions' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'champions' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'champions_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function champions_scripts() {
	wp_enqueue_style( 'champions-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	wp_style_add_data( 'champions-style', 'rtl', 'replace' );

	wp_enqueue_style( 'champions-print-style', get_template_directory_uri() . '/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'champions_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function champions_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'champions_skip_link_focus_fix' );


/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-champions-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-champions-walker-comment.php';

/**
 * Common theme functions.
 */
require get_template_directory() . '/inc/helper-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*********************/
/* Champions changes */
/*********************/

// Replacing defaults with theme defaults, allowing for customisation whilst also allowing for less initial setup.

/**
 * custom_option_description
 * @param [string] $value
 * @return string
 */
function champions_option_description($value) {
	return ($value == 'Just another WordPress site') ? '' : $value;
}

add_filter('option_blogdescription', 'champions_option_description', 10, 1);

/**
 * champions_custom_setup
 * Creates our menu locations, creates a menu at locations, adds default menu items.
 * @return void
 */
function champions_custom_setup() {
	register_nav_menus(
	  array(
		'header-menu' => __( 'Header Menu Location' ),
		'footer-menu' => __( 'Footer Menu Location' )
	   )
	);

	// Create our menu
	if(!wp_get_nav_menu_object('Header Menu')) {
		wp_create_nav_menu('Header Menu');
	}
	if(!wp_get_nav_menu_object('Footer Menu')) {
		wp_create_nav_menu('Footer Menu');
	}
	$menu_header = wp_get_nav_menu_object('Header Menu');
	$menu_footer = wp_get_nav_menu_object('Footer Menu');

	// Set menu locations
	$locations = get_nav_menu_locations();
	$locations['header-menu'] = $menu_header->term_id;
	$locations['footer-menu'] = $menu_footer->term_id;
	set_theme_mod('nav_menu_locations', $locations);


	$pageItem = wp_get_nav_menu_items($menu_header->term_id, ["object"=>"page"] );
	if(!$pageItem){
		// Now add default values to our menus.
		$pageItem = array(
			"menu-item-title" => __('About us'),
			"menu-item-classes" => 'about us',
			"menu-item-url" => home_url(),
			"menu-item-status" => "publish",
		);

		wp_update_nav_menu_item($menu_header->term_id, 0, $pageItem);
		wp_update_nav_menu_item($menu_footer->term_id, 0, $pageItem);

		// Now all other items are the same format, but with title changed as dummy links.
		$pageItem["menu-item-title"] = __('Products');
		$pageItem["menu-item-classes"] = 'products';
		wp_update_nav_menu_item($menu_header->term_id, 0, $pageItem);
		wp_update_nav_menu_item($menu_footer->term_id, 0, $pageItem);
		$pageItem["menu-item-title"] = __('Careers');
		$pageItem["menu-item-classes"] = 'careers';
		wp_update_nav_menu_item($menu_header->term_id, 0, $pageItem);
		wp_update_nav_menu_item($menu_footer->term_id, 0, $pageItem);
		$pageItem["menu-item-title"] = __('Social');
		$pageItem["menu-item-classes"] = 'social';
		wp_update_nav_menu_item($menu_footer->term_id, 0, $pageItem);
		$pageItem["menu-item-title"] = __('Contact');
		$pageItem["menu-item-classes"] = 'contact';
		wp_update_nav_menu_item($menu_header->term_id, 0, $pageItem);
		wp_update_nav_menu_item($menu_footer->term_id, 0, $pageItem);
	}

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'        => 162,
			'width'         => 40,
			'flex-width'    => true,
			'flex-height'   => true,
		)
	);

	/**
	 * Add support for core custom header
	 * 
	 * @link https://codex.wordpress.org/Custom_Headers
	 */
    add_theme_support( 'custom-header', array(
        'default-image'      => get_template_directory_uri() . '/images/Webathon_lumberjack man.png',
		'header-text'        => false,
        'width'              => 1280,
        'height'             => 518,
        'flex-width'         => false,
        'flex-height'        => false,
    ));
}

add_action( 'after_setup_theme', 'champions_custom_setup' );


function champions_custom_css() {
	$highlight_color = get_theme_mod('champions_color_highlight', '#FFA000');
	$header_text_color = get_theme_mod('champions_color_header_main', '#FFF');
	$background_color = get_theme_mod('champions_color_background_page', '#FFF');
	$secondary_color = get_theme_mod('champions_color_secondary_color', '#3C2F19');
	$background_content_light = get_theme_mod('champions_color_background_content_light', '#EBEBEB');
	$background_content_dark = get_theme_mod('champions_color_background_content_dark', '#D6D6D6');

	$css = <<<CSS
		/*
		* Set use of the highlight color (orange by default, set inside customiser)
		*/	
		.header-text > h2 > b
		 { color: {$highlight_color}; }
		 
		.header-text > button
		{ background-color: {$highlight_color}; }

		/*
		* Set header text color.
		*/
		.header-text > h1,
		.header-text > h2
		{ color: {$header_text_color}; }

		html,
		body,
		.main-navigation .main-menu > li > a,
		.main-navigation .main-menu > li > a:hover,
		.main-navigation .main-menu > li > a:active,
		section.content-section > .section-text > h1,
		section.content-section > .section-text > p
		{ color: {$secondary_color} }

		.droplets > .droplet-item > .droplet-image 
		{ background-color: {$background_color}; }

		section.content-light 
		{ background-color: {$background_content_light}; }

		section.content-section:nth-child(odd) 
		{ background-color: {$background_content_light}; }
		section.content-section:nth-child(even) 
		{ background-color: {$background_content_dark}; }
		
CSS;

	echo '<style>'.$css.'</style>';
}

add_action( 'wp_head', 'champions_custom_css' );
