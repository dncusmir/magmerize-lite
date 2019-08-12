<?php
/**
 * Magmerize Lite Theme Customizer
 *
 * @package Magmerize_Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function magmerize_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'magmerize_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'magmerize_customize_partial_blogdescription',
		) );
	}
	
	/**
	 * Custom settings for theme customize
	 */
	if ( class_exists( 'WP_Customize_Control' ) ) {
        class PTD_Textarea_Control extends WP_Customize_Control {
            public function render_content() {?>
                <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label );?></span>
                <textarea class="large-text" cols="20" rows="5" <?php $this->link(); ?>>
                    <?php echo esc_textarea( $this->value() ); ?>
                </textarea>
                </label>
                <?php
            }
        }
    }
	 $wp_customize->add_setting( 'copyright_text', array(
         'default'           => '&copy; ' . date( 'Y' ) . ' <a href="' . get_bloginfo( 'url' ) . '">' . get_bloginfo( 'name' ) . '</a>. All rights reserved.',
         'transport'         => 'postMessage'
     ));
	 $wp_customize->add_control( new PTD_Textarea_Control( $wp_customize, 'copyright_text_control', array(
		'label'      => __( 'Copyright Text', 'magmerize' ),
		'section'    => 'title_tagline',
		'settings'   => 'copyright_text',
	) ) );
}
add_action( 'customize_register', 'magmerize_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function magmerize_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function magmerize_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function magmerize_customize_preview_js() {
	wp_enqueue_script( 'magmerize-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'magmerize_customize_preview_js' );
