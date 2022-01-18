<?php

function bluestreet_blog_layout_customizer($wp_customize) {

    $bluestreet_current_options = wp_parse_args(get_option('wallstreet_pro_options', array()), wallstreet_theme_data_setup());

    // blog Layout settings
    if (get_option('wallstreet_user', 'new')=='old' || $bluestreet_current_options['upload_image_logo'] != '' || $bluestreet_current_options['webrit_custom_css'] == 'nomorenow') {

        $wp_customize->add_setting('wallstreet_pro_options[blog_listed_layout_setting]', array(
            'default' => 'default',
            'sanitize_callback' => 'bluestreet_sanitize_radio',
            'type' => 'option'
        ));
    } else {

        $wp_customize->add_setting('wallstreet_pro_options[blog_listed_layout_setting]', array(
            'default' => 'listed',
            'sanitize_callback' => 'bluestreet_sanitize_radio',
            'type' => 'option'
        ));
    }
    $wp_customize->add_control(new bluestreet_Image_Radio_Button_Custom_Control($wp_customize, 'wallstreet_pro_options[blog_listed_layout_setting]',
            array(
                'label' => esc_html__('Blog Layout Setting', 'bluestreet'),
                'section' => 'blog_setting',
                'priority'              => 20,
                'choices' => array(
                    'default' => array(
                        'image' => get_stylesheet_directory_uri() . '/images/bluestreet-blog-default.png',
                        'name' => esc_html__('Standard Layout', 'bluestreet')
                    ),
                    'listed' => array(
                        'image' => get_stylesheet_directory_uri() . '/images/bluestreet-blog-listed.png',
                        'name' => esc_html__('Listed Layout', 'bluestreet')
                    )
                )
            )
    ));
}
add_action('customize_register', 'bluestreet_blog_layout_customizer');