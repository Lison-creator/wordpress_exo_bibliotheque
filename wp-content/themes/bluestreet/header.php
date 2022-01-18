<!DOCTYPE html>
<html xmlns="<?php echo esc_url('http://www.w3.org/1999/xhtml')?>" <?php language_attributes(); ?>>
<head>
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php wp_head(); ?>	
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
        <a class="skip-link wallstreet-screen-reader" href="#content"><?php esc_html_e( 'Skip to content', 'bluestreet' ); ?></a>
 <?php do_action('wallstreet_custom_header', false); ?>
 <?php
        $bluestreet_options = wp_parse_args(get_option('wallstreet_pro_options', array()), bluestreet_theme_data_setup());
        if ($bluestreet_options['header_center_layout_setting'] == 'center') {
            bluestreet_header_center_layout();

        }
        else{
            bluestreet_header_default_layout();
        }?>           
<!--Header Logo & Menus-->
