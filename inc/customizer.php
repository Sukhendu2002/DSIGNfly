<?php
/**
 * Dsignfly Theme Customizer
 *
 * @package Dsignfly
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dsignfly_customize_register( WP_Customize_Manager $wp_customize ): void {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'dsignfly_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'dsignfly_customize_partial_blogdescription',
			)
		);
	}

	// Add Social Media Section.
	$wp_customize->add_section(
		'dsignfly_social_media',
		array(
			'title'       => __( 'Social Media', 'dsignfly' ),
			'description' => __( 'Add Social Media Links', 'dsignfly' ),
			'priority'    => 130,
		)
	);

	// Add Social Settings.
	$wp_customize->add_setting(
		'dsignfly_facebook',
		array(
			'default'           => 'www.facebook.com',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'dsignfly_facebook',
		array(
			'label'   => __( 'Facebook', 'dsignfly' ),
			'section' => 'dsignfly_social_media',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'dsignfly_twitter',
		array(
			'default'           => 'www.twitter.com',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'dsignfly_twitter',
		array(
			'label'   => __( 'Twitter', 'dsignfly' ),
			'section' => 'dsignfly_social_media',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'dsignfly_linkedin',
		array(
			'default'           => 'www.linkedin.com',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'dsignfly_linkedin',
		array(
			'label'   => __( 'Linkedin', 'dsignfly' ),
			'section' => 'dsignfly_social_media',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'dsignfly_pinterest',
		array(
			'default'           => 'www.pinterest.com',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'dsignfly_pinterest',
		array(
			'label'   => __( 'Pinterest', 'dsignfly' ),
			'section' => 'dsignfly_social_media',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'dsignfly_google_plus',
		array(
			'default'           => 'www.google.com',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'dsignfly_google_plus',
		array(
			'label'   => __( 'Google Plus', 'dsignfly' ),
			'section' => 'dsignfly_social_media',
			'type'    => 'text',
		)
	);
}
add_action( 'customize_register', 'dsignfly_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function dsignfly_customize_partial_blogname(): void {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function dsignfly_customize_partial_blogdescription(): void {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dsignfly_customize_preview_js() {
	wp_enqueue_script( 'dsignfly-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'dsignfly_customize_preview_js' );
