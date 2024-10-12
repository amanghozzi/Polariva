<?php 
	$arr = array('br' => array(), 'p' => array(), 'span' => array()); 
	use Elementor\Icons_Manager;
?>
<div class="bwp-image-product-countdown <?php echo esc_html( $layout ); ?>">
	<div class="bg-banner">
		<?php  if($product_id && $product = wc_get_product( $product_id )): ?>
			<?php if( $subtitle) : ?>
				<div class="bwp-image-subtitle">					
					<?php echo wp_kses( $subtitle,$arr); ?>							
				</div>	
			<?php endif;?>
			<?php if( $title1) : ?>
				<h2 class="title-banner"><?php echo wp_kses( $title1,$arr); ?></h2>
			<?php endif; ?>
			<?php if( $description) : ?>
				<div class="description-banner"><?php echo esc_html( $description ); ?></div>
			<?php endif; ?>
			<div class="content">
				<h2 class="product-title"><a href="<?php echo get_permalink( $product_id );  ?>"><?php echo $product->get_title(); ?></a></h2>
				<div class="product-price"><?php echo $product->get_price_html(); ?></div>
				<div class="countdown">
					<?php if( $time_deal) : ?>
						<div class="countdown-deal">
							<?php
								$start_time = time();
								$countdown_time = strtotime($time_deal);
								$date = bwp_timezone_offset( $countdown_time );
							?>
							<div class="product-countdown"  
								data-day="<?php echo esc_html__("Days","wpbingo"); ?>"
								data-hour="<?php echo esc_html__("Hours","wpbingo"); ?>"
								data-min="<?php echo esc_html__("Mins","wpbingo"); ?>"
								data-sec="<?php echo esc_html__("Secs","wpbingo"); ?>"	
								data-date="<?php echo esc_attr( $date ); ?>"  
								data-sttime="<?php echo esc_attr( $start_time ); ?>" 
								data-cdtime="<?php echo esc_attr( $countdown_time ); ?>" 
								data-id="<?php echo $widget_id; ?>">
							</div>
						</div>
					<?php endif;?>
				</div>
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
		<?php endif ?>
	</div>
</div>
