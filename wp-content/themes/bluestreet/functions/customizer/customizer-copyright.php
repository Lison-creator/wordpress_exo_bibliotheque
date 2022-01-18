<?php
// Footer copyright section 
	function bluestreet_copyright_customizer( $wp_customize ) {
	
    $wp_customize->add_section(
        'copyright_section_one',
        array(
            'title' => esc_html__('Footer copyright settings','bluestreet'),
            'priority' => 800,
        )
    );
	$wp_customize->add_setting(
    'wallstreet_pro_options[footer_copyright]',
    array(
        'default' => '<p>'.__( '<a href="https://wordpress.org">Proudly powered by WordPress</a> | Theme: <a href="https://webriti.com" rel="nofollow"> Bluestreet</a> by Webriti', 'bluestreet' ).'</p>',
		'type' =>'option',
		'sanitize_callback' => 'bluestreet_copyright_sanitize_text'
		
    )
);
$wp_customize->add_control(
    'wallstreet_pro_options[footer_copyright]',
    array(
        'label' => esc_html__('Copyright text','bluestreet'),
        'section' => 'copyright_section_one',
        'type' => 'textarea',
    ));
	
	function bluestreet_copyright_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

}

}
add_action( 'customize_register', 'bluestreet_copyright_customizer' );