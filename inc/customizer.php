<?php
/**
 * Pxmacz Theme Customizer
 *
 * @package Pxmacz
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pxmacz_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->default = '#ee6f00';

	/**
          * Custom Customizer Customizations
	  */
		//
    //     $wp_customize->add_setting('header_textcolor', array(
    //         'default'           => '#ee6f00',
	  //   'transport'         => 'postMessage',
	  //   'type'              => 'theme_mod',
    //         'sanitize_callback' => 'sanitize_hex_color',
    //     ));
		//
    //     $wp_customize->add_control(
		// 	new WP_Customize_Color_Control(
		// 		$wp_customize,
		// 		'header_textcolor',
		// 			array(
		// 				'label'		=> __( 'Header Text Color', 'pxmacz'),
		// 				'section'	=> 'colors',
		// 				'settings'	=> 'header_textcolor'
		// 			)
		// 	)
		// );

		// Setting for header and footer background color
		$wp_customize->add_setting( 'theme_bg_color', array(
			'default'			=> '#1c1400',
			'transport'			=> 'postMessage',
			'type'				=> 'theme_mod',
			'sanitize_callback' => 'sanitize_hex_color', //wordpress function to clean hex color
		));


		// Control for header and footer background color.
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'theme_bg_color',
					array(
						'label'		=> __( 'Header & Footer Background Color', 'pxmacz'),
						'section'	=> 'colors',
						'settings'	=> 'theme_bg_color'
					)
			)
		);


			// Add option to select index content length // theme_options is a wordpress reserved
		$wp_customize->add_section( 'theme_options',
			array(
				'title'			=> __( 'Content Length Display', 'pxmacz' ),
				'priority'		=> 95,
				'capability'	=> 'edit_theme_options',
				'description'	=> __( 'Change how length of post is displayed on index and archive pages.', 'pxmacz' )
			)
		);

		// Create excerpt or full content settings
	$wp_customize->add_setting(	'length_setting',
		array(
			'default'			=> 'excerpt',
			'type'				=> 'theme_mod',
			'sanitize_callback' => 'pxmacz_sanitize_length', // Sanitization function to only have either two values: excerpt or full-content
			'transport'			=> 'postMessage'
		)
	);

		// Add the controls
			$wp_customize->add_control(	'pxmacz_length_control',
				array(
					'type'		=> 'radio',
					'label'		=> __( 'Both Index / Archive Display:', 'pxmacz' ),
					'section'	=> 'theme_options',
					'choices'	=> array(
						'excerpt'		=> __( 'Excerpt (default)', 'pxmacz' ),
						'full-content'	=> __( 'Full Content', 'pxmacz' )
					),
					'settings'	=> 'length_setting' // Matches setting ID from above
				)
			);

 // Refresh - _score theme default function
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'pxmacz_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'pxmacz_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'pxmacz_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function pxmacz_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function pxmacz_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pxmacz_customize_preview_js() {
	wp_enqueue_script( 'pxmacz-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'pxmacz_customize_preview_js' );


/**
 * Sanitize length options:
 * If something goes wrong and one of the two specified options are not used,
 * apply the default (excerpt).
 */

function pxmacz_sanitize_length( $value ) {
    if ( ! in_array( $value, array( 'excerpt', 'full-content' ) ) ) {
        $value = 'excerpt';
	}
    return $value;
}



if ( ! function_exists( 'pxmacz_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see pxmacz_custom_header_setup().
	 */
	function pxmacz_header_style() {
		$header_text_color = get_header_textcolor();
                $header_bg_color = get_theme_mod('theme_bg_color');

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) != $header_text_color ) {
                    // If we get this far, we have custom styles. Let's do this.
                    ?>
                    <style type="text/css">
                    <?php
                    // Has the text been hidden?
                    if ( ! display_header_text() ) :
                    ?>
                            .site-title,
                            .site-description {
                                    position: absolute;
                                    clip: rect(1px, 1px, 1px, 1px);
                            }
                    <?php
                            // If the user has set a custom color for the text use that.
                            else :
                    ?>
                            .site-title a,
                            .site-description {
                                    color: #<?php echo esc_attr( $header_text_color ); ?>;
                            }
                    <?php endif; ?>
                    </style>
                    <?php
               }
               // check _color.scss for the value of this variable
               $color__bg_footer = '#1c1400';

               if ($color__bg_footer != $header_bg_color) { ?>
                    <style type="text/css">
                        .site-footer {
                            background-color: <?php echo esc_attr($header_bg_color); ?>;
                        }
                    </style>
               <?php }

	}
endif;
