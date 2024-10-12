<?php if($settings['list_tab']){ ?>
	<?php $j = 0; ?>
	<div class="bwp-slider <?php echo esc_attr($layout); ?>">
		<div class="slick-carousel slick-carousel-center" data-autoplay="<?php echo esc_attr($show_autoplay);?>" data-centerMode="true" data-nav="<?php echo esc_attr($show_nav);?>" data-dots="<?php echo esc_attr($show_pag);?>" data-columns4="<?php echo esc_attr($columns4); ?>" data-columns3="<?php echo esc_attr($columns3); ?>" data-columns2="<?php echo esc_attr($columns2); ?>" data-columns1="<?php echo esc_attr($columns1); ?>" data-columns="<?php echo esc_attr($columns); ?>" >
			<?php foreach ($settings['list_tab'] as  $item){ ?>
				<div class="item">
					<div class="slider-container">
						<div class="slider-content">
							<div class="content-info">
								<?php if( $item['subtitle_slider'] && $item['subtitle_slider'] ){ ?>
									<div class="subtitle-slider"><span><?php echo wp_kses($item['subtitle_slider'],'social'); ?></span></div>
								<?php } ?>
								<?php if( $item['title_slider'] && $item['title_slider'] ){ ?>
									<h2 class="title-slider"><span><?php echo wp_kses($item['title_slider'],'social'); ?></span></h2>
								<?php } ?>
								<?php if( $item['description_slider'] && $item['description_slider' ]){ ?>
									<div class="description-slider"><span><?php echo wp_kses($item['description_slider'],'social'); ?></span></div>
								<?php } ?>
								<?php if( $item['button_slider'] && $item['button_slider'] ){ ?>
									<a class="bwp-button <?php echo esc_attr($hover_style) ?>" href="<?php echo wp_kses_post($item['buttonlink_slider']); ?>">
										<?php echo esc_html($item['button_slider']); ?>
									</a>						
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
<?php }?>