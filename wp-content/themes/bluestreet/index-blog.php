<?php $bluestreet_current_options = wp_parse_args(  get_option( 'wallstreet_pro_options', array() ),wallstreet_theme_data_setup());
 if($bluestreet_current_options['blog_section_enabled'] == true) { ?>	
<div class="container home-blog-section">
	<div class="row">
		<?php if ($bluestreet_current_options['home_blog_heading'] || $bluestreet_current_options['home_blog_description'] ) { ?>
		<div class="section_heading_title">
		<?php if($bluestreet_current_options['home_blog_heading']) { ?>
			<h1><?php echo esc_html($bluestreet_current_options['home_blog_heading']); ?></h1>
		<?php } ?>
		<?php if($bluestreet_current_options['home_blog_description']) { ?>
			<div class="pagetitle-separator">
				<div class="pagetitle-separator-border">
					<div class="pagetitle-separator-box"></div>
				</div>
			</div>
			<p><?php echo esc_html($bluestreet_current_options['home_blog_description']); ?></p>
		<?php } ?>
		</div>
		<?php } ?>
	</div>
	<!--Blog Content-->
       <?php 
        $bluestreet_current_options= wp_parse_args(get_option('wallstreet_pro_options', array()), bluestreet_theme_data_setup());
        if ($bluestreet_current_options['blog_listed_layout_setting'] == 'listed') {
            bluestreet_blog_listed_layout();
        } else {
            bluestreet_blog_default_layout();
        }?> 

</div>
<?php } ?>