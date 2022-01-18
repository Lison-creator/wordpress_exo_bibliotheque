<?php
/**
 * Getting started template
 */
?>
<div id="getting_started" class="bluestreet-tab-pane active">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="bluestreet-tab-pane-half bluestreet-tab-pane-first-half">
					<h3><?php esc_html_e( "Recommended Plugins", 'bluestreet' ); ?></h3>
					<div style="border-top: 1px solid #eaeaea;">
						<p style="margin-top: 16px;">
							<?php esc_html_e( 'To take full advanctage of the theme features you need to install recommended plugins.', 'bluestreet' ); ?>
						
						</p>
						<p><a target="_self" href="#recommended_actions" class="bluestreet-custom-class"><?php esc_html_e( 'Click here','bluestreet');?></a></p>
					</div>
				</div>
				<div class="bluestreet-tab-pane-half bluestreet-tab-pane-first-half">
					<h3><?php esc_html_e( "Start Customizing", 'bluestreet' ); ?></h3>
					<div style="border-top: 1px solid #eaeaea;">
						<p style="margin-top: 16px;">
							<?php esc_html_e( 'After activating recommended plugins , now you can start customization.', 'bluestreet' ); ?>
						
						</p>
						<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer','bluestreet');?></a></p>
					</div>
				</div>				
			</div>
			<div class="col-md-6">
				<div class="bluestreet-tab-pane-half bluestreet-tab-pane-first-half">
				<img src="<?php echo esc_url( BLUESTREET_TEMPLATE_DIR_URI ) . '/admin/img/bluestreet.png'; ?>" alt="<?php esc_attr_e( 'bluestreet Theme', 'bluestreet' ); ?>" />
				</div>
			</div>	
		</div>
		<div class="row">
			<div class="bluestreet-tab-center">
				<h3><?php esc_html_e( "Useful Links", 'bluestreet' ); ?></h3>
			</div>
			<div class=" useful_box">
                <div class="bluestreet-tab-pane-half bluestreet-tab-pane-first-half">
                	<div class="col-md-6">
                    <a href="<?php echo esc_url('https://bluestreet.webriti.com/'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-desktop info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('Lite Demo','bluestreet'); ?></p>
                	</a>
                	</div>
                	<div class="col-md-6">
                    <a href="<?php echo esc_url('https://webriti.com/demo/wp/preview/?prev=wallstreet'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-book-alt info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('PRO Demo','bluestreet'); ?></p>
                    </a>
                    </div>        
                </div>
                <div class="bluestreet-tab-pane-half bluestreet-tab-pane-first-half">
                	<div class="col-md-6">
                    <a href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/bluestreet'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-smiley info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('Your feedback is valuable to us','bluestreet'); ?></p>
                    </a>
                	</div>
                	<div class="col-md-6">
                    <a href="<?php echo esc_url('https://webriti.com/wallstreet/'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-book-alt info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('Premium Theme Details','bluestreet'); ?></p>
                    </a>
                	</div>
                </div>
            </div>        
        </div>            
    </div>
</div>