<?php
//Set for old user
if (!get_option('wallstreet_user', false)) {
     //detect old user and set value
    $bluestreet_user = get_option('wallstreet_pro_options', array());
    if ((isset($bluestreet_user['service_title']) || isset($bluestreet_user['service_description']) || isset($bluestreet_user['home_blog_heading']) || isset($bluestreet_user['home_blog_description']))) {
        add_option('wallstreet_user', 'old');
    }else{
        add_option('wallstreet_user', 'new');
    }
}

//default data 
function bluestreet_theme_data_setup()
{
	$bluestreet_current_options = wp_parse_args(get_option('wallstreet_pro_options', array()), wallstreet_theme_data_setup());
//print_r($header_setting);
        if (get_option('wallstreet_user', 'new')=='old' || $bluestreet_current_options['upload_image_logo'] != '' || $bluestreet_current_options['webrit_custom_css'] == 'nomorenow') {

            $array_new = array(
                'header_center_layout_setting' => 'default',
                'service_box_layout_setting' => 'default',
                'blog_listed_layout_setting' => 'default',
            );
        }
        else{
            $array_new = array(
                'header_center_layout_setting' => 'center',
                'service_box_layout_setting' => 'box',
                'blog_listed_layout_setting' => 'listed',
            );
        }
		$array_old = array(
				//Logo and Fevicon header					
				'webriti_stylesheet'=>'default.css',
				'footer_copyright' => '<p>'.__( '<a href="https://wordpress.org">Proudly powered by WordPress</a> | Theme: <a href="https://webriti.com" rel="nofollow"> Bluestreet</a> by Webriti', 'bluestreet' ).'</p>',
				'footer_social_media_enabled'=> false,			
				'social_media_twitter_link' =>"",			
				'social_media_facebook_link' =>"",
				'social_media_linkedin_link' =>"",		
				'social_media_youtube_link' =>"",
				'social_media_instagram_link' => '',
			
		);
		return $result = array_merge($array_new, $array_old);
}