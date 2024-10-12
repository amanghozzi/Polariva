<?php 
	$arr = array('br' => array(), 'p' => array(), 'span' => array()); 
	use Elementor\Icons_Manager;
?>
<div class="bwp-widget-banner <?php echo esc_html( $layout ); ?>">
	<div class="bg-banner">		
		<div class="banner-wrapper">
			<div class="banner-wrapper-centainer">
				<?php if($image): ?>
					<div class="bwp-image <?php if ($image_hover) { ?> elementor-animation-<?php echo esc_attr($image_hover); } ?>">
						<?php if($link): ?>
							<a href="<?php echo esc_url($link);?>"><img class="fade-in lazyload" src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr__("Banner Image","wpbingo"); ?>"></a>
						<?php endif;?>
					</div>
				<?php endif;?>
				<div class="banner-wrapper-infor">
					<div class="info">
						<div class="content">
							<?php if( $subtitle) : ?>
								<div class="bwp-image-subtitle">
									<?php if(isset($subtitle) && $subtitle){?>						
										<?php echo wp_kses( $subtitle,$arr); ?>							
									<?php }?>
								</div>	
							<?php endif;?>
							<?php if( $title1 ) : ?>
								<h3 class="title-banner"><?php echo wp_kses( $title1,$arr); ?></h3>
							<?php endif; ?>
							<?php if( $description) : ?>
								<div class="bwp-image-description">
									<?php if(isset($description) && $description){?>						
										<?php echo $editor_content; ?>						
									<?php }?>
								</div>	
							<?php endif;?>
							<?php if( $time_deal) : ?>
								<div class="countdown-deal">
									<?php
										$start_time = time();
										$countdown_time = strtotime($time_deal);
										$date = bwp_timezone_offset( $countdown_time );
									?>
									<div class="product-countdown"	
										data-date="<?php echo esc_attr( $date ); ?>"  
										data-sttime="<?php echo esc_attr( $start_time ); ?>" 
										data-cdtime="<?php echo esc_attr( $countdown_time ); ?>" 
										data-id="<?php echo $widget_id; ?>">
									</div>
								</div>
							<?php endif;?>	
							<?php if($label): ?>
								<a class="bwp-button <?php echo esc_attr($hover_style) ?>" href="<?php echo esc_url($link);?>">
									<span class="bwp-button-content-wrapper">
										<span class="bwp-button-text"><?php echo ($label); ?></span>
										<?php if ( ! empty( $settings['icon'] ) || ! empty( $settings['selected_icon']['value'] ) ) : ?>
											<div class="bwp-button-icon bwp-align-icon-<?php echo esc_attr($icon_align);?>">
												<?php
													if ( $is_new || $migrated ) {
														Icons_Manager::render_icon( $icon_svg );
													} else {
														echo '<i class="' . esc_attr( $icon ) . '" aria-hidden="true"></i>';
													}
												?>
											</div>
										<?php endif; ?>
									</span>
								</a>						
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
