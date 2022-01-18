<?php

function bluestreet_header_layout_customizer($wp_customize) {

    /**
     * Image Radio Button Custom Control
     *
     * @author Anthony Hortin <http://maddisondesigns.com>
     * @license http://www.gnu.org/licenses/gpl-2.0.html
     * @link https://github.com/maddisondesigns
     */
    class bluestreet_Image_Radio_Button_Custom_Control extends WP_Customize_Control {

        /**
         * The type of control being rendered
         */
        public $type = 'image_radio_button';

        public function enqueue() {
            add_action('customize_controls_print_styles', array($this, 'print_styles'));
        }

        public function print_styles() {
            ?><style>
                /*blue child*/
                #customize-control-wallstreet_pro_options-header_center_layout_setting img {
                    margin-top: 5%;
                }
                #customize-control-wallstreet_pro_options-header_center_layout_setting input{
                    display: none;
                }
                .image_radio_button_control .radio-button-label > input:checked + img {
                        border: 3px solid #2885BB;
                }
                #customize-control-wallstreet_pro_options-blog_listed_layout_setting input{
                    display: none;
                }
                #customize-control-wallstreet_pro_options-blog_listed_layout_setting img {
                    margin-top: 5%;
                }
            </style>
            <?php
        }

        /**
         * Render the control in the customizer
         */
        public function render_content() {
            ?>
            <div class="image_radio_button_control">
                <?php if (!empty($this->label)) { ?>
                    <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <?php } ?>
                <?php if (!empty($this->description)) { ?>
                    <span class="customize-control-description"><?php echo esc_html($this->description); ?></span>
                <?php } ?>

            <?php foreach ($this->choices as $key => $value) { ?>
                    <label class="radio-button-label">
                        <input type="radio" name="<?php echo esc_attr($this->id); ?>" value="<?php echo esc_attr($key); ?>" <?php $this->link(); ?> <?php checked(esc_attr($key), $this->value()); ?>/>
                        <img src="<?php echo esc_attr($value['image']); ?>" alt="<?php echo esc_attr($value['name']); ?>" title="<?php echo esc_attr($value['name']); ?>" />
                    </label>
            <?php } ?>
            </div>
            <?php
        }

    }

    $bluestreet_current_options = wp_parse_args(get_option('wallstreet_pro_options', array()), wallstreet_theme_data_setup());


    /* Header Layout section */
    $wp_customize->add_panel('header_options', array(
        'priority' => 450,
        'capability' => 'edit_theme_options',
        'title' => esc_html__('Header settings', 'bluestreet'),
    ));

    $wp_customize->add_section('header_center_layout_setting', array(
        'title' => esc_html__('Header Layout', 'bluestreet'),
        'panel' => 'header_options'
    ));

    // Header Layout settings
    if (get_option('wallstreet_user', 'new')=='old' || $bluestreet_current_options['upload_image_logo'] != '' || $bluestreet_current_options['webrit_custom_css'] == 'nomorenow') {

        $wp_customize->add_setting('wallstreet_pro_options[header_center_layout_setting]', array(
            'default' => 'default',
            'sanitize_callback' => 'bluestreet_sanitize_radio',
            'type' => 'option'
        ));
    } else {

        $wp_customize->add_setting('wallstreet_pro_options[header_center_layout_setting]', array(
            'default' => 'center',
            'sanitize_callback' => 'bluestreet_sanitize_radio',
            'type' => 'option'
        ));
    }
    $wp_customize->add_control(new bluestreet_Image_Radio_Button_Custom_Control($wp_customize, 'wallstreet_pro_options[header_center_layout_setting]',
            array(
                'label' => esc_html__('Header Layout Setting', 'bluestreet'),
                'section' => 'header_center_layout_setting',
                'choices' => array(
                    'default' => array(
                        'image' => get_stylesheet_directory_uri() . '/images/bluestreet-header-default.png',
                        'name' => esc_html__('Standard Layout', 'bluestreet')
                    ),
                    'center' => array(
                        'image' => get_stylesheet_directory_uri() . '/images/bluestreet-header-center.png',
                        'name' => esc_html__('Center Layout', 'bluestreet')
                    )
                )
            )
    ));
}

add_action('customize_register', 'bluestreet_header_layout_customizer');

//radio box sanitization function
function bluestreet_sanitize_radio($input, $setting) {

    $input = sanitize_key($input);

    $choices = $setting->manager->get_control($setting->id)->choices;

    //return if valid 
    return ( array_key_exists($input, $choices) ? $input : $setting->default );
}
