<?php

// Global variables define
define('BLUESTREET_PARENT_TEMPLATE_DIR_URI', get_template_directory_uri());
define('BLUESTREET_TEMPLATE_DIR_URI', get_stylesheet_directory_uri());
define('BLUESTREET_TEMPLATE_DIR', trailingslashit(get_stylesheet_directory()));

if (!function_exists('wp_body_open')) {

    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }

}

// Enqueue Script and Style
function bluestreet_enqueue_scripts() {
    wp_enqueue_style('bluestreet-parent-style', BLUESTREET_PARENT_TEMPLATE_DIR_URI . '/style.css');
    wp_enqueue_style('bluestreet-parent-media-style', BLUESTREET_PARENT_TEMPLATE_DIR_URI . '/css/media-responsive.css');
    wp_enqueue_style('bootstrap', BLUESTREET_PARENT_TEMPLATE_DIR_URI . '/css/bootstrap.css');
    wp_dequeue_style('wallstreet-default', BLUESTREET_PARENT_TEMPLATE_DIR_URI . '/css/default.css');
    wp_enqueue_style('bluestreet-default', BLUESTREET_TEMPLATE_DIR_URI . '/css/default.css');
}

add_action('wp_enqueue_scripts', 'bluestreet_enqueue_scripts', 999);

// Theme Setup
add_action('after_setup_theme', 'bluestreet_theme_setup');

function bluestreet_theme_setup() {
    require_once( BLUESTREET_TEMPLATE_DIR . '/theme_setup_data.php' );
    load_child_theme_textdomain('bluestreet', BLUESTREET_TEMPLATE_DIR . '/languages');
    require( BLUESTREET_TEMPLATE_DIR . '/functions/customizer/customizer-copyright.php' );
    require( BLUESTREET_TEMPLATE_DIR . '/functions/customizer/customizer-header-layout.php' );
    require( BLUESTREET_TEMPLATE_DIR . '/functions/customizer/customizer-blog-layout.php' );
    require( BLUESTREET_TEMPLATE_DIR . '/functions/template-tag.php' );
    require_once BLUESTREET_TEMPLATE_DIR . '/class-tgm-plugin-activation.php';

    //About Theme
    $theme = wp_get_theme(); // gets the current theme
    if ('Bluestreet' == $theme->name) {
        if (is_admin()) {
            require BLUESTREET_TEMPLATE_DIR . '/admin/admin-init.php';
        }
    }

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );

}

add_action('tgmpa_register', 'bluestreet_register_required_plugins');

//Set for old user
if (!get_option('leo_user', false)) {
    //detect old user and set value
    $bluestreet_user = get_option('wallstreet_pro_options', array());
    if ((isset($bluestreet_user['service_title']) || isset($bluestreet_user['service_description']) || isset($bluestreet_user['home_blog_heading']) || isset($bluestreet_user['home_blog_description']))) {
        add_option('leo_user', 'old');
    } else {
        add_option('leo_user', 'new');
    }
}

function bluestreet_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name' => esc_html__('Custom FaceBook Feed','bluestreet'),
            'slug' => 'facebook-feed',
            'required' => false,
        ),
    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id' => 'bluestreet', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
    );

    tgmpa($plugins, $config);
}

add_action('customize_controls_print_styles', 'bluestreet_custmizer_style');

function bluestreet_custmizer_style() {
    wp_enqueue_style('bluestreet-customizer-css', BLUESTREET_TEMPLATE_DIR_URI . '/css/cust-style.css');
}

// Add script for sticky header
add_action('wp_head', 'bluestreet_sticky_header');

function bluestreet_sticky_header() {
    $bluestreet_options = wp_parse_args(get_option('wallstreet_pro_options', array()), bluestreet_theme_data_setup());
    if ($bluestreet_options['header_center_layout_setting'] == 'center') {
        ?>
        <script>
            jQuery(document).ready(function (jQuery) {
                jQuery(window).bind('scroll', function () {
                    if (jQuery(window).scrollTop() > 200) {
                        jQuery('.navbar').addClass('stickymenu1');
                        jQuery('.navbar').slideDown();
                    } else {
                        jQuery('.navbar').removeClass('stickymenu1');
                        jQuery('.navbar').attr('style', '');
                    }
                });
            });
        </script>
        <?php

    }
}

/* sidebar */
add_action('widgets_init', 'bluestreet_widgets_init');

function bluestreet_widgets_init() {
  
    register_sidebar(array(
        'name' => esc_html__('Footer widget area', 'bluestreet'),
        'id' => 'footer-widget-area',
        'description' => esc_html__('Footer widget area', 'bluestreet'),
        'before_widget' => '<div class="col-md-3 col-sm-6 footer_widget_column">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="footer_widget_title">',
        'after_title' => '</h2>',
    ));

}
