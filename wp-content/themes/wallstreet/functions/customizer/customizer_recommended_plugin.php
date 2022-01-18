<?php
/* Notifications in customizer */


require get_template_directory() . '/functions/customizer-notify/wallstreet-customizer-notify.php';


$wallstreet_config_customizer = array(
	'recommended_plugins'       => array(
		'webriti-companion' => array(
			'recommended' => true,
			'description' => sprintf( esc_html__( 'Install and activate the %s plugin to take full advantage of all the features this theme has to offer.', 'wallstreet' ), sprintf( '<strong>%s</strong>', 'Webriti Companion' ) ),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'wallstreet' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'wallstreet' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'wallstreet' ),
	'activate_button_label'     => esc_html__( 'Activate', 'wallstreet' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'wallstreet' ),
);
wallstreet_Customizer_Notify::init( apply_filters( 'wallstreet_customizer_notify_array', $wallstreet_config_customizer ) );