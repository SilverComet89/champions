<?php
/**
 * Twenty Nineteen: Customizer
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function champions_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'champions_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'champions_customize_partial_blogdescription',
			)
		);
	}

	/**
	 * Primary color.
	 */
	$wp_customize->add_setting(
		'primary_color',
		array(
			'default'           => 'default',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'champions_sanitize_color_option',
		)
	);

	$wp_customize->add_control(
		'primary_color',
		array(
			'type'     => 'radio',
			'label'    => __( 'Primary Color', 'champions' ),
			'choices'  => array(
				'default' => _x( 'Default', 'primary color', 'champions' ),
				'custom'  => _x( 'Custom', 'primary color', 'champions' ),
			),
			'section'  => 'colors',
			'priority' => 5,
		)
	);

	// Add primary color hue setting and control.
	$wp_customize->add_setting(
		'primary_color_hue',
		array(
			'default'           => 199,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_color_hue',
			array(
				'description' => __( 'Apply a custom color for buttons, links, featured images, etc.', 'champions' ),
				'section'     => 'colors',
				'mode'        => 'hue',
			)
		)
	);

	/**
	 * Header text
	 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/
	 */
	$wp_customize->add_setting(
		'champions_header_title',
		array(
			'default'           => 'Your new website solution',
			'sanitize_callback' => 'wp_kses_post',
			'type' => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'champions_header_title',
		array(
			'label'   => __( 'Title text', 'champions' ),
			'section' => 'header_image',
			'type'    => 'textarea',
		)
	);

	/**
	 * Header sub text
	 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/
	 */
	$wp_customize->add_setting(
		'champions_header_subtitle',
		array(
			'default'           => 'Become <b>successful</b> with our integrated web packages',
			'sanitize_callback' => 'wp_kses_post',
			'type' => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'champions_header_subtitle',
		array(
			'label'   => __( 'Subtitle text', 'champions' ),
			'section' => 'header_image',
			'type'    => 'textarea',
		)
	);

	/**
	 * Button text
	 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/
	 */
	$wp_customize->add_setting(
		'champions_button_text',
		array(
			'default'           => 'Learn more',
			'sanitize_callback' => 'absint',
			'type' => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		'champions_button_text',
		array(
			'label'   => __( 'Button text', 'champions' ),
			'section' => 'header_image',
			'type'    => 'text',
		)
	);

	/**
	 * Button text
	 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/
	 */
	$wp_customize->add_setting(
		'champions_color_highlight',
		array(
			'default'           => '#FFA000',
			'sanitize_callback' => 'sanitize_hex_color',
			'type' => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
            $wp_customize, 
            'champions_color_highlight', 
			array(              
				'label'      => __( 'Highlight colour', 'theme_slug' ),
				'section'    => 'colors'       
			)
		)
	);

	/**
	 * Main header-text h1/h2 color.
	 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/
	 */
	$wp_customize->add_setting(
		'champions_color_header_main',
		array(
			'default'           => '#FFF',
			'sanitize_callback' => 'sanitize_hex_color',
			'type' => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
            $wp_customize, 
            'champions_color_header_main', 
			array(              
				'label'      => __( 'Main header text colour', 'theme_slug' ),
				'section'    => 'colors'       
			)
		)
	);

	/**
	 * Page background color.
	 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/
	 */
	$wp_customize->add_setting(
		'champions_color_background_page',
		array(
			'default'           => '#FFF',
			'sanitize_callback' => 'sanitize_hex_color',
			'type' => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
            $wp_customize, 
            'champions_color_background_page', 
			array(              
				'label'      => __('Page background', 'theme_slug' ),
				'section'    => 'colors'       
			)
		)
	);

	/**
	 * secondary color.
	 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/
	 */
	$wp_customize->add_setting(
		'champions_color_secondary_color',
		array(
			'default'           => '#3C2F19',
			'sanitize_callback' => 'sanitize_hex_color',
			'type' => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
            $wp_customize, 
            'champions_color_secondary_color', 
			array(              
				'label'      => __('Secondary colour', 'theme_slug' ),
				'section'    => 'colors'       
			)
		)
	);

	/**
	 * background content light color.
	 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/
	 */
	$wp_customize->add_setting(
		'champions_color_background_content_light',
		array(
			'default'           => '#EBEBEB',
			'sanitize_callback' => 'sanitize_hex_color',
			'type' => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
            $wp_customize, 
            'champions_color_background_content_light', 
			array(              
				'label'      => __('Secondary colour', 'theme_slug' ),
				'section'    => 'colors'       
			)
		)
	);

	/**
	 * background content dark color.
	 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/
	 */
	$wp_customize->add_setting(
		'champions_color_background_content_dark',
		array(
			'default'           => '#D6D6D6',
			'sanitize_callback' => 'sanitize_hex_color',
			'type' => 'theme_mod',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control( 
            $wp_customize, 
            'champions_color_background_content_dark', 
			array(              
				'label'      => __('Secondary colour', 'theme_slug' ),
				'section'    => 'colors'       
			)
		)
	);
}
add_action( 'customize_register', 'champions_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function champions_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function champions_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function champions_customize_preview_js() {
	wp_enqueue_script( 'champions-customize-preview', get_theme_file_uri( '/js/customize-preview.js' ), array( 'customize-preview' ), '20181214', true );
}
add_action( 'customize_preview_init', 'champions_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function champions_panels_js() {
	wp_enqueue_script( 'champions-customize-controls', get_theme_file_uri( '/js/customize-controls.js' ), array(), '20181214', true );
}
add_action( 'customize_controls_enqueue_scripts', 'champions_panels_js' );

/**
 * Sanitize custom color choice.
 *
 * @param string $choice Whether image filter is active.
 * @return string
 */
function champions_sanitize_color_option( $choice ) {
	$valid = array(
		'default',
		'custom',
	);

	if ( in_array( $choice, $valid, true ) ) {
		return $choice;
	}

	return 'default';
}
