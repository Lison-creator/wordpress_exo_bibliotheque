<?php  
	$bluestreet_actions = $this->recommended_actions;
	$bluestreet_actions_todo = get_option( 'recommended_actions', false );
?>
<div id="recommended_actions" class="bluestreet-tab-pane panel-close">
	<div class="action-list row">
		<?php if($bluestreet_actions): foreach ($bluestreet_actions as $key => $bluestreet_actionValue): ?>
		<div class="action col-md-6 col-sm-6 col-xs-12" id="<?php echo esc_attr($bluestreet_actionValue['id']); ?>">
			<div class="recommended_box">
				<div class="seprate-plugin-box">
					<img width="772" height="180" src="<?php echo esc_url(BLUESTREET_TEMPLATE_DIR_URI.'/images/'.str_replace(' ', '-', strtolower($bluestreet_actionValue['title'])).'.png');?>">
					<div class="action-inner">
						<h3 class="action-title"><?php echo esc_html($bluestreet_actionValue['title']); ?></h3>
						<div class="action-desc"><?php echo esc_html($bluestreet_actionValue['desc']); ?></div>
						<?php echo wp_kses_post($bluestreet_actionValue['link']); ?>
						<div class="action-watch">
							<?php if(!$bluestreet_actionValue['is_done']): ?>
								<?php if(!isset($bluestreet_actions_todo[$bluestreet_actionValue['id']]) || !$bluestreet_actions_todo[$bluestreet_actionValue['id']]): ?>
									<span class="dashicons dashicons-visibility"></span>
								<?php else: ?>
									<span class="dashicons dashicons-hidden"></span>
								<?php endif; ?>
							<?php else: ?>
								<span class="dashicons dashicons-yes"></span>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; endif; ?>
	</div>
</div>