<?php
	$wp_customize->add_section('bwp-single_scroll', array(
		'title'          => 'Product Single Content',
		'panel' => 'main_single_section',
	));
	
	class Single_scroll_order extends WP_Customize_Control{
		public $type = 'single_scroll_order';
		public function render_content(){ ?>
			<div class="filed-flex">
				<div class="bwp-drop-control bwp-drop-2">
					<div class="bwp-drag-drop-container d-flex">
						<?php
						if( $this->value('single_scroll_order') ){
							$arr_value = explode("-", $this->value('single_scroll_order'));
							foreach ($arr_value as $value) { ?>
								<div class="bwp-drag-drop-items bwp-drag-drop-toggle" data-value="<?php echo esc_attr( $value ); ?>">
									<div class="bwp-drag-drop-item">
										<?php echo esc_html( $value ); ?>
										<div class="icon-show"><i class="feather-chevron-down"></i></div>
									</div>
								</div>
							<?php }
						}else{ ?>
							<div class="bwp-drag-drop-empty"><div class="bwp-drag-drop-item"><?php echo esc_html__('default content','bemins') ?></div></div>
						<?php } ?>
					</div>
					<div class="bwp-drag-dropdown_content">
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="title">
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_title_color')); ?>" <?php $this->link('scroll_title_color'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Font size','bemins'); ?></span>
								<input type="number" min="0" value="<?php echo esc_attr($this->value('scroll_title_size')); ?>" <?php $this->link('scroll_title_size'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Margin','bemins'); ?></span>
								<table class="table-space">
									<thead>
										<tr>
											<th><?php echo esc_html__('Top','bemins'); ?></th>
											<th><?php echo esc_html__('Right','bemins'); ?></th>
											<th><?php echo esc_html__('Bottom','bemins'); ?></th>
											<th><?php echo esc_html__('Left','bemins'); ?></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_title_margin_top')); ?>" <?php $this->link('scroll_title_margin_top'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_title_margin_right')); ?>" <?php $this->link('scroll_title_margin_right'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_title_margin_bottom')); ?>" <?php $this->link('scroll_title_margin_bottom'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_title_margin_left')); ?>" <?php $this->link('scroll_title_margin_left'); ?> /></td>
											<td>px</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="rating">
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="price">
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_price_color')); ?>" <?php $this->link('scroll_price_color'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Font size','bemins'); ?></span>
								<input type="number" min="0" value="<?php echo esc_attr($this->value('scroll_price_size')); ?>" <?php $this->link('scroll_price_size'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Margin','bemins'); ?></span>
								<table class="table-space">
									<thead>
										<tr>
											<th><?php echo esc_html__('Top','bemins'); ?></th>
											<th><?php echo esc_html__('Right','bemins'); ?></th>
											<th><?php echo esc_html__('Bottom','bemins'); ?></th>
											<th><?php echo esc_html__('Left','bemins'); ?></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_price_margin_top')); ?>" <?php $this->link('scroll_price_margin_top'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_price_margin_right')); ?>" <?php $this->link('scroll_price_margin_right'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_price_margin_bottom')); ?>" <?php $this->link('scroll_price_margin_bottom'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_price_margin_left')); ?>" <?php $this->link('scroll_price_margin_left'); ?> /></td>
											<td>px</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="countview">
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_countview_color')); ?>" <?php $this->link('scroll_countview_color'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Font size','bemins'); ?></span>
								<input type="number" min="0" value="<?php echo esc_attr($this->value('scroll_countview_size')); ?>" <?php $this->link('scroll_countview_size'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Margin','bemins'); ?></span>
								<table class="table-space">
									<thead>
										<tr>
											<th><?php echo esc_html__('Top','bemins'); ?></th>
											<th><?php echo esc_html__('Right','bemins'); ?></th>
											<th><?php echo esc_html__('Bottom','bemins'); ?></th>
											<th><?php echo esc_html__('Left','bemins'); ?></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_countview_margin_top')); ?>" <?php $this->link('scroll_countview_margin_top'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_countview_margin_right')); ?>" <?php $this->link('scroll_countview_margin_right'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_countview_margin_bottom')); ?>" <?php $this->link('scroll_countview_margin_bottom'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_countview_margin_left')); ?>" <?php $this->link('scroll_countview_margin_left'); ?> /></td>
											<td>px</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="description">
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_description_color')); ?>" <?php $this->link('scroll_description_color'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Font size','bemins'); ?></span>
								<input type="number" min="0" value="<?php echo esc_attr($this->value('scroll_description_size')); ?>" <?php $this->link('scroll_description_size'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Margin','bemins'); ?></span>
								<table class="table-space">
									<thead>
										<tr>
											<th><?php echo esc_html__('Top','bemins'); ?></th>
											<th><?php echo esc_html__('Right','bemins'); ?></th>
											<th><?php echo esc_html__('Bottom','bemins'); ?></th>
											<th><?php echo esc_html__('Left','bemins'); ?></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_description_margin_top')); ?>" <?php $this->link('scroll_description_margin_top'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_description_margin_right')); ?>" <?php $this->link('scroll_description_margin_right'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_description_margin_bottom')); ?>" <?php $this->link('scroll_description_margin_bottom'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_description_margin_left')); ?>" <?php $this->link('scroll_description_margin_left'); ?> /></td>
											<td>px</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="countdown">
							<div class="drag-option">
								<?php $value = get_theme_mod( 'scroll_countdown_icon', '' ); ?>
								<span class="customize-control-title"><?php echo esc_html__('SVG icon','bemins'); ?></span>
								<div class="container-image">
									<?php if($value){ ?><img src="<?php echo esc_url($value); ?>" /><?php } ?>
								</div>
								<div class="group-btn-image">
									<?php if($value){ ?>
										<input type="button" class="bwp-select-image have-image" value="<?php echo esc_attr__( 'Select SVG', 'bemins' ); ?>" />
										<input type="button" class="bwp-remove-image" value="<?php echo esc_attr__( 'Remove SVG', 'bemins' ); ?>" />
									<?php }else{ ?>
										<input type="button" class="bwp-select-image " value="<?php echo esc_attr__( 'Select SVG', 'bemins' ); ?>" />
										<input type="button" class="bwp-remove-image hidden" value="<?php echo esc_attr__( 'Remove SVG', 'bemins' ); ?>" />
									<?php } ?>
								</div>
								<input type="hidden" class="bwp-input-image" data-default-color="" value="<?php echo esc_attr($this->value('scroll_countdown_icon')); ?>" <?php $this->link('scroll_countdown_icon'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Title','bemins'); ?></span>
								<textarea type="text"  value="<?php echo esc_attr($this->value('scroll_countdown_title')); ?>" <?php $this->link('scroll_countdown_title'); ?>></textarea>
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color title','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_countdown_color')); ?>" <?php $this->link('scroll_countdown_color'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color time & icon','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_countdown_color_time')); ?>" <?php $this->link('scroll_countdown_color_time'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Font size','bemins'); ?></span>
								<input type="number" min="0" value="<?php echo esc_attr($this->value('scroll_countdown_size')); ?>" <?php $this->link('scroll_countdown_size'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Font size time','bemins'); ?></span>
								<input type="number" min="0" value="<?php echo esc_attr($this->value('scroll_countdown_size_time')); ?>" <?php $this->link('scroll_countdown_size_time'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Margin','bemins'); ?></span>
								<table class="table-space">
									<thead>
										<tr>
											<th><?php echo esc_html__('Top','bemins'); ?></th>
											<th><?php echo esc_html__('Right','bemins'); ?></th>
											<th><?php echo esc_html__('Bottom','bemins'); ?></th>
											<th><?php echo esc_html__('Left','bemins'); ?></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_countdown_margin_top')); ?>" <?php $this->link('scroll_countdown_margin_top'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_countdown_margin_right')); ?>" <?php $this->link('scroll_countdown_margin_right'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_countdown_margin_bottom')); ?>" <?php $this->link('scroll_countdown_margin_bottom'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_countdown_margin_left')); ?>" <?php $this->link('scroll_countdown_margin_left'); ?> /></td>
											<td>px</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="stock">
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_stock_color')); ?>" <?php $this->link('scroll_stock_color'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color stock','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_stock_stock_color')); ?>" <?php $this->link('scroll_stock_stock_color'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Font size','bemins'); ?></span>
								<input type="number" min="0" value="<?php echo esc_attr($this->value('scroll_stock_size')); ?>" <?php $this->link('scroll_stock_size'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Margin','bemins'); ?></span>
								<table class="table-space">
									<thead>
										<tr>
											<th><?php echo esc_html__('Top','bemins'); ?></th>
											<th><?php echo esc_html__('Right','bemins'); ?></th>
											<th><?php echo esc_html__('Bottom','bemins'); ?></th>
											<th><?php echo esc_html__('Left','bemins'); ?></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_stock_margin_top')); ?>" <?php $this->link('scroll_stock_margin_top'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_stock_margin_right')); ?>" <?php $this->link('scroll_stock_margin_right'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_stock_margin_bottom')); ?>" <?php $this->link('scroll_stock_margin_bottom'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_stock_margin_left')); ?>" <?php $this->link('scroll_stock_margin_left'); ?> /></td>
											<td>px</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="addtocart">
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color add to cart','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_atc_color')); ?>" <?php $this->link('scroll_atc_color'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Background add to cart','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_atc_bg')); ?>" <?php $this->link('scroll_atc_bg'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color buy now','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_atc_buynow_color')); ?>" <?php $this->link('scroll_atc_buynow_color'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Background buy now','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_atc_buynow_bg')); ?>" <?php $this->link('scroll_atc_buynow_bg'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color hover','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_atc_color_hover')); ?>" <?php $this->link('scroll_atc_color_hover'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Background hover','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_atc_bg_hover')); ?>" <?php $this->link('scroll_atc_bg_hover'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Font size','bemins'); ?></span>
								<input type="number" min="0" value="<?php echo esc_attr($this->value('scroll_atc_size')); ?>" <?php $this->link('scroll_atc_size'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Margin','bemins'); ?></span>
								<table class="table-space">
									<thead>
										<tr>
											<th><?php echo esc_html__('Top','bemins'); ?></th>
											<th><?php echo esc_html__('Right','bemins'); ?></th>
											<th><?php echo esc_html__('Bottom','bemins'); ?></th>
											<th><?php echo esc_html__('Left','bemins'); ?></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_atc_margin_top')); ?>" <?php $this->link('scroll_atc_margin_top'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_atc_margin_right')); ?>" <?php $this->link('scroll_atc_margin_right'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_atc_margin_bottom')); ?>" <?php $this->link('scroll_atc_margin_bottom'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_atc_margin_left')); ?>" <?php $this->link('scroll_atc_margin_left'); ?> /></td>
											<td>px</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="imagecheckout">
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Background','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_imagecheckout_bg')); ?>" <?php $this->link('scroll_imagecheckout_bg'); ?> />
							</div>
							<div class="drag-option">
								<?php $value = get_theme_mod( 'scroll_imagecheckout_image', '' ); ?>
								<span class="customize-control-title"><?php echo esc_html__('Image','bemins'); ?></span>
								<div class="container-image">
									<?php if($value){ ?><img src="<?php echo esc_url($value); ?>" /><?php } ?>
								</div>
								<div class="group-btn-image">
									<?php if($value){ ?>
										<input type="button" class="bwp-select-image have-image" value="<?php echo esc_attr__( 'Select Image', 'bemins' ); ?>" />
										<input type="button" class="bwp-remove-image" value="<?php echo esc_attr__( 'Remove Image', 'bemins' ); ?>" />
									<?php }else{ ?>
										<input type="button" class="bwp-select-image " value="<?php echo esc_attr__( 'Select Image', 'bemins' ); ?>" />
										<input type="button" class="bwp-remove-image hidden" value="<?php echo esc_attr__( 'Remove Image', 'bemins' ); ?>" />
									<?php } ?>
								</div>
								<input type="hidden" class="bwp-input-image" data-default-color="" value="<?php echo esc_attr($this->value('scroll_imagecheckout_image')); ?>" <?php $this->link('scroll_imagecheckout_image'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Title','bemins'); ?></span>
								<textarea type="text"  value="<?php echo esc_attr($this->value('scroll_imagecheckout_title')); ?>" <?php $this->link('scroll_imagecheckout_title'); ?>></textarea>
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_imagecheckout_color')); ?>" <?php $this->link('scroll_imagecheckout_color'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Font size','bemins'); ?></span>
								<input type="number" min="0" value="<?php echo esc_attr($this->value('scroll_imagecheckout_size')); ?>" <?php $this->link('scroll_imagecheckout_size'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Width content title','bemins'); ?></span>
								<input type="number" min="0" value="<?php echo esc_attr($this->value('scroll_imagecheckout_width')); ?>" <?php $this->link('scroll_imagecheckout_width'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Margin','bemins'); ?></span>
								<table class="table-space">
									<thead>
										<tr>
											<th><?php echo esc_html__('Top','bemins'); ?></th>
											<th><?php echo esc_html__('Right','bemins'); ?></th>
											<th><?php echo esc_html__('Bottom','bemins'); ?></th>
											<th><?php echo esc_html__('Left','bemins'); ?></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_imagecheckout_margin_top')); ?>" <?php $this->link('scroll_imagecheckout_margin_top'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_imagecheckout_margin_right')); ?>" <?php $this->link('scroll_imagecheckout_margin_right'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_imagecheckout_margin_bottom')); ?>" <?php $this->link('scroll_imagecheckout_margin_bottom'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_imagecheckout_margin_left')); ?>" <?php $this->link('scroll_imagecheckout_margin_left'); ?> /></td>
											<td>px</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="delivers">
							<div class="drag-option">
								<?php $value = get_theme_mod( 'scroll_delivers_icon1', '' ); ?>
								<span class="customize-control-title"><?php echo esc_html__('SVG icon','bemins'); ?></span>
								<div class="container-image">
									<?php if($value){ ?><img src="<?php echo esc_url($value); ?>" /><?php } ?>
								</div>
								<div class="group-btn-image">
									<?php if($value){ ?>
										<input type="button" class="bwp-select-image have-image" value="<?php echo esc_attr__( 'Select SVG', 'bemins' ); ?>" />
										<input type="button" class="bwp-remove-image" value="<?php echo esc_attr__( 'Remove SVG', 'bemins' ); ?>" />
									<?php }else{ ?>
										<input type="button" class="bwp-select-image " value="<?php echo esc_attr__( 'Select SVG', 'bemins' ); ?>" />
										<input type="button" class="bwp-remove-image hidden" value="<?php echo esc_attr__( 'Remove SVG', 'bemins' ); ?>" />
									<?php } ?>
								</div>
								<input type="hidden" class="bwp-input-image" data-default-color="" value="<?php echo esc_attr($this->value('scroll_delivers_icon1')); ?>" <?php $this->link('scroll_delivers_icon1'); ?> />
							</div>
							<div class="drag-option">
								<?php $value = get_theme_mod( 'scroll_delivers_icon2', '' ); ?>
								<span class="customize-control-title"><?php echo esc_html__('SVG icon','bemins'); ?></span>
								<div class="container-image">
									<?php if($value){ ?><img src="<?php echo esc_url($value); ?>" /><?php } ?>
								</div>
								<div class="group-btn-image">
									<?php if($value){ ?>
										<input type="button" class="bwp-select-image have-image" value="<?php echo esc_attr__( 'Select SVG', 'bemins' ); ?>" />
										<input type="button" class="bwp-remove-image" value="<?php echo esc_attr__( 'Remove SVG', 'bemins' ); ?>" />
									<?php }else{ ?>
										<input type="button" class="bwp-select-image " value="<?php echo esc_attr__( 'Select SVG', 'bemins' ); ?>" />
										<input type="button" class="bwp-remove-image hidden" value="<?php echo esc_attr__( 'Remove SVG', 'bemins' ); ?>" />
									<?php } ?>
								</div>
								<input type="hidden" class="bwp-input-image" data-default-color="" value="<?php echo esc_attr($this->value('scroll_delivers_icon2')); ?>" <?php $this->link('scroll_delivers_icon2'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Text 1','bemins'); ?></span>
								<textarea type="text"  value="<?php echo esc_attr($this->value('scroll_delivers_text1')); ?>" <?php $this->link('scroll_delivers_text1'); ?>></textarea>
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Text 2','bemins'); ?></span>
								<textarea type="text"  value="<?php echo esc_attr($this->value('scroll_delivers_text2')); ?>" <?php $this->link('scroll_delivers_text2'); ?>></textarea>
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_delivers_color')); ?>" <?php $this->link('scroll_delivers_color'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Background','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_delivers_icon_color')); ?>" <?php $this->link('scroll_delivers_icon_color'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Font size','bemins'); ?></span>
								<input type="number" min="0" value="<?php echo esc_attr($this->value('scroll_delivers_size')); ?>" <?php $this->link('scroll_delivers_size'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Font icon size','bemins'); ?></span>
								<input type="number" min="0" value="<?php echo esc_attr($this->value('scroll_delivers_icon_size')); ?>" <?php $this->link('scroll_delivers_icon_size'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Padding','bemins'); ?></span>
								<table class="table-space">
									<thead>
										<tr>
											<th><?php echo esc_html__('Top','bemins'); ?></th>
											<th><?php echo esc_html__('Right','bemins'); ?></th>
											<th><?php echo esc_html__('Bottom','bemins'); ?></th>
											<th><?php echo esc_html__('Left','bemins'); ?></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_delivers_padding_top')); ?>" <?php $this->link('scroll_delivers_padding_top'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_delivers_padding_right')); ?>" <?php $this->link('scroll_delivers_padding_right'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_delivers_padding_bottom')); ?>" <?php $this->link('scroll_delivers_padding_bottom'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_delivers_padding_left')); ?>" <?php $this->link('scroll_delivers_padding_left'); ?> /></td>
											<td>px</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Margin','bemins'); ?></span>
								<table class="table-space">
									<thead>
										<tr>
											<th><?php echo esc_html__('Top','bemins'); ?></th>
											<th><?php echo esc_html__('Right','bemins'); ?></th>
											<th><?php echo esc_html__('Bottom','bemins'); ?></th>
											<th><?php echo esc_html__('Left','bemins'); ?></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_delivers_margin_top')); ?>" <?php $this->link('scroll_delivers_margin_top'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_delivers_margin_right')); ?>" <?php $this->link('scroll_delivers_margin_right'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_delivers_margin_bottom')); ?>" <?php $this->link('scroll_delivers_margin_bottom'); ?> /></td>
											<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('scroll_delivers_margin_left')); ?>" <?php $this->link('scroll_delivers_margin_left'); ?> /></td>
											<td>px</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="infomation">
							<div class="drag-option">
								<div class="cus-label"><?php echo esc_html__('Show category and sku','bemins'); ?></div>
								<div class="switch-options">
									<input type="checkbox" value="<?php echo esc_attr($this->value('scroll_infomation_meta')); ?>" <?php $this->link('scroll_infomation_meta'); ?>>
									<label class="disable"></label>
								</div>
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_infomation_color')); ?>" <?php $this->link('scroll_infomation_color'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color Label','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_infomation_label_color')); ?>" <?php $this->link('scroll_infomation_label_color'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Font size','bemins'); ?></span>
								<input type="number" min="0" value="<?php echo esc_attr($this->value('scroll_infomation_size')); ?>" <?php $this->link('scroll_infomation_size'); ?> />
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="social_share">
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color Label','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_social_label_color')); ?>" <?php $this->link('scroll_social_label_color'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color Icon','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('scroll_social_icon_color')); ?>" <?php $this->link('scroll_social_icon_color'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Font size','bemins'); ?></span>
								<input type="number" min="0" value="<?php echo esc_attr($this->value('scroll_social_size')); ?>" <?php $this->link('scroll_social_size'); ?> />
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
					</div>
					<div class="btn-add-drop-content">
						<?php
							$arr_choices = $this->choices;
							$arr_value = explode("-", $this->value('single_scroll_order'));
							$different_values = array_merge(array_diff($arr_choices, $arr_value)); 
						?>
						<button class="add-drop-content<?php if(!$different_values){ ?> disabled<?php } ?>" <?php if(!$different_values){ ?> disabled="disabled"<?php } ?>><?php echo esc_html__('Add item','bemins'); ?></button>
						<div class="add-drop-content-container">
							<?php foreach ($different_values as $value) { ?>
								<div class="add-drop-content-item" data-value="<?php echo esc_attr( $value ); ?>">
									<div class="icon-add"><i class="feather-plus"></i></div>
									<?php echo esc_html( $value ); ?>
								</div>
							<?php } ?>
						</div>
					</div>
					<input class="bwp-drag-drop-input" type="hidden" <?php $this->link('single_scroll_order'); ?> value="<?php echo esc_attr( $this->value('single_scroll_order') ); ?>">
				</div>
			</div>
		<?php }
	}
	$wp_customize->add_setting( 'single_scroll_order' , array(
		'default' => 'title-rating-price-countview-description-countdown-stock-addtocart-imagecheckout-delivers-infomation-social_share', 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	
	//TITLE
	$wp_customize->add_setting( 'scroll_title_color' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_title_size' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting('scroll_title_margin_top', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_title_margin_right', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_title_margin_bottom', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_title_margin_left', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	
	//PRICE
	$wp_customize->add_setting( 'scroll_price_color' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_price_size' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting('scroll_price_margin_top', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_price_margin_right', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_price_margin_bottom', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_price_margin_left', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	
	//COUNT VIEW
	$wp_customize->add_setting( 'scroll_countview_color' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_countview_size' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting('scroll_countview_margin_top', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_countview_margin_right', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_countview_margin_bottom', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_countview_margin_left', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	
	//DESCRIPTION
	$wp_customize->add_setting( 'scroll_description_color' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_description_size' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting('scroll_description_margin_top', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_description_margin_right', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_description_margin_bottom', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_description_margin_left', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	
	//COUNTDOWN
	$wp_customize->add_setting( 'scroll_countdown_icon' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'scroll_countdown_title' , array(
		'default' => 'Hurry up! <br> Deal ends in :',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'scroll_countdown_color' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_countdown_color_time' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_countdown_size' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_countdown_size_time' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting('scroll_countdown_margin_top', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_countdown_margin_right', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_countdown_margin_bottom', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_countdown_margin_left', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	
	//STOCK
	$wp_customize->add_setting( 'scroll_stock_color' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_stock_stock_color' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_stock_size' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting('scroll_stock_margin_top', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_stock_margin_right', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_stock_margin_bottom', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_stock_margin_left', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	
	//ADD TO CART
	$wp_customize->add_setting( 'scroll_atc_color' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_atc_bg' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_atc_buynow_color' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_atc_buynow_bg' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_atc_color_hover' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'scroll_atc_bg_hover' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'scroll_atc_size' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting('scroll_atc_margin_top', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_atc_margin_right', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_atc_margin_bottom', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_atc_margin_left', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	
	//IMAGE CHECKOUT
	$wp_customize->add_setting( 'scroll_imagecheckout_bg' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_imagecheckout_image' , array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'scroll_imagecheckout_title' , array(
		'default' => 'Guaranteed Safe Checkout',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'scroll_imagecheckout_color' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_imagecheckout_size' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_imagecheckout_width' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting('scroll_imagecheckout_margin_top', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_imagecheckout_margin_right', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_imagecheckout_margin_bottom', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_imagecheckout_margin_left', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	
	//DELIVERY
	$wp_customize->add_setting( 'scroll_delivers_icon1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'scroll_delivers_icon2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'scroll_delivers_text1' , array(
		'default' => 'Free worldwide shipping on all orders over $100',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'scroll_delivers_text2' , array(
		'default' => 'Delivers in: 3-7 Working Days	<a href="https://wpbingosite.com/wordpress/bemins/refund_returns/">Shipping & Return</a>',
		'sanitize_callback' => 'sanitize_html',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'scroll_delivers_color' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_delivers_icon_color' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_delivers_size' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_delivers_icon_size' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting('scroll_delivers_padding_top', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_delivers_padding_right', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_delivers_padding_bottom', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_delivers_padding_left', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_delivers_margin_top', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_delivers_margin_right', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_delivers_margin_bottom', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('scroll_delivers_margin_left', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	
	//INFOMATION
	$wp_customize->add_setting( 'scroll_infomation_meta' , array(
		'default' => true,
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'scroll_infomation_color' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_infomation_label_color' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_infomation_size' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));

	//SOCIAL
	$wp_customize->add_setting( 'scroll_social_label_color' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_social_icon_color' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'scroll_social_size' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_control( new Single_scroll_order( $wp_customize, 'single_scroll_order', array(
		'section' => 'bwp-single_scroll',
		'choices' => array(
			'title' 		=> 'title',
			'rating' 		=> 'rating',
			'price' 		=> 'price',
			'countview'	 	=> 'countview',
			'description' 	=> 'description',
			'countdown' 	=> 'countdown',
			'stock' 		=> 'stock',
			'addtocart' 	=> 'addtocart',
			'imagecheckout' => 'imagecheckout',
			'delivers' 		=> 'delivers',
			'infomation' 	=> 'infomation',
			'social_share' 	=> 'social_share',
		),
		'settings' => [
			'single_scroll_order' 				=> 'single_scroll_order',
			'scroll_title_color' 				=> 'scroll_title_color',
			'scroll_title_size' 				=> 'scroll_title_size',
			'scroll_title_margin_top' 			=> 'scroll_title_margin_top',
			'scroll_title_margin_right' 		=> 'scroll_title_margin_right',
			'scroll_title_margin_bottom' 		=> 'scroll_title_margin_bottom',
			'scroll_title_margin_left' 			=> 'scroll_title_margin_left',
			'scroll_price_color' 				=> 'scroll_price_color',
			'scroll_price_size' 				=> 'scroll_price_size',
			'scroll_price_margin_top' 			=> 'scroll_price_margin_top',
			'scroll_price_margin_right' 		=> 'scroll_price_margin_right',
			'scroll_price_margin_bottom' 		=> 'scroll_price_margin_bottom',
			'scroll_price_margin_left' 			=> 'scroll_price_margin_left',
			'scroll_countview_color' 			=> 'scroll_countview_color',
			'scroll_countview_size' 			=> 'scroll_countview_size',
			'scroll_countview_margin_top' 		=> 'scroll_countview_margin_top',
			'scroll_countview_margin_right' 	=> 'scroll_countview_margin_right',
			'scroll_countview_margin_bottom' 	=> 'scroll_countview_margin_bottom',
			'scroll_countview_margin_left' 		=> 'scroll_countview_margin_left',
			'scroll_description_color' 			=> 'scroll_description_color',
			'scroll_description_size' 			=> 'scroll_description_size',
			'scroll_description_margin_top' 	=> 'scroll_description_margin_top',
			'scroll_description_margin_right' 	=> 'scroll_description_margin_right',
			'scroll_description_margin_bottom' 	=> 'scroll_description_margin_bottom',
			'scroll_description_margin_left' 	=> 'scroll_description_margin_left',
			'scroll_countdown_icon' 			=> 'scroll_countdown_icon',
			'scroll_countdown_title' 			=> 'scroll_countdown_title',
			'scroll_countdown_color' 			=> 'scroll_countdown_color',
			'scroll_countdown_color_time' 		=> 'scroll_countdown_color_time',
			'scroll_countdown_size' 			=> 'scroll_countdown_size',
			'scroll_countdown_size_time' 		=> 'scroll_countdown_size_time',
			'scroll_countdown_margin_top' 		=> 'scroll_countdown_margin_top',
			'scroll_countdown_margin_right' 	=> 'scroll_countdown_margin_right',
			'scroll_countdown_margin_bottom' 	=> 'scroll_countdown_margin_bottom',
			'scroll_countdown_margin_left' 		=> 'scroll_countdown_margin_left',
			'scroll_stock_color' 				=> 'scroll_stock_color',
			'scroll_stock_stock_color' 			=> 'scroll_stock_stock_color',
			'scroll_stock_size' 				=> 'scroll_stock_size',
			'scroll_stock_margin_top' 			=> 'scroll_stock_margin_top',
			'scroll_stock_margin_right' 		=> 'scroll_stock_margin_right',
			'scroll_stock_margin_bottom' 		=> 'scroll_stock_margin_bottom',
			'scroll_stock_margin_left' 			=> 'scroll_stock_margin_left',
			'scroll_atc_color' 					=> 'scroll_atc_color',
			'scroll_atc_buynow_color' 			=> 'scroll_atc_buynow_color',
			'scroll_atc_bg' 					=> 'scroll_atc_bg',
			'scroll_atc_buynow_bg' 				=> 'scroll_atc_buynow_bg',
			'scroll_atc_color_hover' 			=> 'scroll_atc_color_hover',
			'scroll_atc_bg_hover' 				=> 'scroll_atc_bg_hover',
			'scroll_atc_size' 					=> 'scroll_atc_size',
			'scroll_atc_margin_top' 			=> 'scroll_atc_margin_top',
			'scroll_atc_margin_right' 			=> 'scroll_atc_margin_right',
			'scroll_atc_margin_bottom' 			=> 'scroll_atc_margin_bottom',
			'scroll_atc_margin_left' 			=> 'scroll_atc_margin_left',
			'scroll_imagecheckout_bg' 			=> 'scroll_imagecheckout_bg',
			'scroll_imagecheckout_image' 		=> 'scroll_imagecheckout_image',
			'scroll_imagecheckout_title' 		=> 'scroll_imagecheckout_title',
			'scroll_imagecheckout_color' 		=> 'scroll_imagecheckout_color',
			'scroll_imagecheckout_size' 		=> 'scroll_imagecheckout_size',
			'scroll_imagecheckout_width' 		=> 'scroll_imagecheckout_width',
			'scroll_imagecheckout_margin_top' 	=> 'scroll_imagecheckout_margin_top',
			'scroll_imagecheckout_margin_right' => 'scroll_imagecheckout_margin_right',
			'scroll_imagecheckout_margin_bottom' => 'scroll_imagecheckout_margin_bottom',
			'scroll_imagecheckout_margin_left' 	=> 'scroll_imagecheckout_margin_left',
			'scroll_delivers_icon1' 			=> 'scroll_delivers_icon1',
			'scroll_delivers_icon2' 			=> 'scroll_delivers_icon2',
			'scroll_delivers_text1' 			=> 'scroll_delivers_text1',
			'scroll_delivers_text2' 			=> 'scroll_delivers_text2',
			'scroll_delivers_color' 			=> 'scroll_delivers_color',
			'scroll_delivers_icon_color' 		=> 'scroll_delivers_icon_color',
			'scroll_delivers_size' 				=> 'scroll_delivers_size',
			'scroll_delivers_icon_size' 		=> 'scroll_delivers_icon_size',
			'scroll_delivers_padding_top' 		=> 'scroll_delivers_padding_top',
			'scroll_delivers_padding_right' 	=> 'scroll_delivers_padding_right',
			'scroll_delivers_padding_bottom' 	=> 'scroll_delivers_padding_bottom',
			'scroll_delivers_padding_left' 		=> 'scroll_delivers_padding_left',
			'scroll_delivers_margin_top' 		=> 'scroll_delivers_margin_top',
			'scroll_delivers_margin_right' 		=> 'scroll_delivers_margin_right',
			'scroll_delivers_margin_bottom' 	=> 'scroll_delivers_margin_bottom',
			'scroll_delivers_margin_left' 		=> 'scroll_delivers_margin_left',
			'scroll_infomation_meta' 			=> 'scroll_infomation_meta',
			'scroll_infomation_color' 			=> 'scroll_infomation_color',
			'scroll_infomation_label_color' 	=> 'scroll_infomation_label_color',
			'scroll_infomation_size' 			=> 'scroll_infomation_size',
			'scroll_social_label_color' 		=> 'scroll_social_label_color',
			'scroll_social_icon_color' 			=> 'scroll_social_icon_color',
			'scroll_social_size' 				=> 'scroll_social_size',
		],
	)));