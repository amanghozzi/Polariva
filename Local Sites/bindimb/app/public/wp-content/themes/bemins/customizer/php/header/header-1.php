<?php ///////////////HEADER 1
	$wp_customize->add_section('bwp-header_1', array(
		'title'          => 'Header 1',
		'panel' => 'header_settings_section',
	));
	
	//---- Top bar
	class Topbar_order_1 extends WP_Customize_Control{
		public $type = 'topbar_order_1';
		public function render_content(){ ?>
			<div class="filed-flex">
				<div class="bwp-cus-title"><?php echo esc_html__('1.TOP BAR','bemins'); ?></div>
				<div class="filed-flex" style="margin-bottom:20px;">
					<div class="cus-label"><?php echo esc_html__('Show topbar','bemins'); ?></div>
					<div class="switch-options">
						<input type="checkbox" value="<?php echo esc_attr($this->value('top_bar_1')); ?>" <?php $this->link('top_bar_1'); ?>>
						<label class="disable"></label>
					</div>
				</div>
				<div class="bwp-drop-control">
					<div class="bwp-drag-drop-container d-flex">
						<?php
						if( $this->value('topbar_order_1') ){
							$arr_value = explode("-", $this->value('topbar_order_1'));
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
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="social">
							<div class="drag-option">
								<div class="cus-label"><?php echo esc_html__('Show social','bemins'); ?></div>
								<div class="switch-options">
									<input type="checkbox" value="<?php echo esc_attr($this->value('social_1')); ?>" <?php $this->link('social_1'); ?>>
									<label class="disable"></label>
								</div>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="shortcode">
							<div class="cus-label" style="margin:10px 0;"><?php echo esc_html__('Enter your shortcode','bemins'); ?></div>
							<textarea type="text" data-setting="shortcode_1" placeholder="[gallery id=&quot;123&quot; size=&quot;medium&quot;]" value="<?php echo esc_attr($this->value('shortcode_1')); ?>" <?php $this->link('shortcode_1'); ?>></textarea>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="topbar1">
							<div class="cus-label" style="margin-bottom:10px;"><?php echo esc_html__('Content','bemins'); ?></div>
							<textarea type="text" value="<?php echo esc_attr($this->value('content_left_top_bar_1')); ?>" <?php $this->link('content_left_top_bar_1'); ?>></textarea>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="topbar2">
							<div class="cus-label" style="margin-bottom:10px;"><?php echo esc_html__('Content','bemins'); ?></div>
							<textarea type="text" value="<?php echo esc_attr($this->value('content_center_top_bar_1')); ?>" <?php $this->link('content_center_top_bar_1'); ?>></textarea>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="topbar3">
							<div class="cus-label" style="margin-bottom:10px;"><?php echo esc_html__('Shipping','bemins'); ?></div>
							<textarea type="text" value="<?php echo esc_attr($this->value('content_right_top_bar_1')); ?>" <?php $this->link('content_right_top_bar_1'); ?>></textarea>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
					</div>
					<div class="btn-add-drop-content">
						<?php
							$arr_choices = $this->choices;
							$arr_value = explode("-", $this->value('topbar_order_1'));
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
					<input class="bwp-drag-drop-input" type="hidden" <?php $this->link('topbar_order_1'); ?> value="<?php echo esc_attr( $this->value('topbar_order_1') ); ?>">
				</div>
			</div>
		<?php }
	}
	$wp_customize->add_setting( 'top_bar_1' , array(
		'default' => false, 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'topbar_order_1' , array(
		'default' => '', 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'content_right_top_bar_1' , array(
		'default' => '', 
		'sanitize_callback' => 'sanitize_html',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'content_center_top_bar_1' , array(
		'default' => 'content topbar 2', 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'content_left_top_bar_1' , array(
		'default' => '', 
		'sanitize_callback' => 'sanitize_html',
		'transport' => 'refresh',
	));
	$wp_customize->add_setting( 'social_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'shortcode_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_control( new Topbar_order_1( $wp_customize, 'topbar_order_1', array(
		'section' => 'bwp-header_1',
		'choices' => array(
			'topbar1' => 'topbar1',
			'topbar2' => 'topbar2',
			'topbar3' => 'topbar3',
			'social' => 'social',
			'shortcode' => 'shortcode',
		),
		'settings' => [
			'top_bar_1' => 'top_bar_1',
			'topbar_order_1' => 'topbar_order_1',
			'social_1' => 'social_1',
			'shortcode_1' => 'shortcode_1',
			'content_left_top_bar_1' => 'content_left_top_bar_1',
			'content_center_top_bar_1' => 'content_center_top_bar_1',
			'content_right_top_bar_1' => 'content_right_top_bar_1',
		],
	)));
	
	//---- background
	$wp_customize->add_setting( 'background_top_bar_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('background_top_bar_1', array(
		'label'   => esc_html__('Background','bemins'),
		'section' => 'bwp-header_1',
		'type'    => 'color',
	));
	
	//---- color
	$wp_customize->add_setting( 'color_top_bar_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_top_bar_1', array(
		'label'   => esc_html__('Color','bemins'),
		'section' => 'bwp-header_1',
		'type'    => 'color',
	));
	
	//---- color link
	$wp_customize->add_setting( 'color_link_top_bar_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_link_top_bar_1', array(
		'label'   => esc_html__('Color link','bemins'),
		'section' => 'bwp-header_1',
		'type'    => 'color',
	));
	
	//---- color hover
	$wp_customize->add_setting( 'color_hover_top_bar_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('color_hover_top_bar_1', array(
		'label'   => esc_html__('Color hover','bemins'),
		'section' => 'bwp-header_1',
		'type'    => 'color',
	));
	
	//---- padding
	class Padding_topbar_1 extends WP_Customize_Control{
		public $type = 'padding_topbar_1';
		public function render_content(){ ?>
			<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
			<table class="tg">
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
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_topbar_top_1')); ?>" <?php $this->link('padding_topbar_top_1'); ?> /></td>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_topbar_right_1')); ?>" <?php $this->link('padding_topbar_right_1'); ?> /></td>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_topbar_bottom_1')); ?>" <?php $this->link('padding_topbar_bottom_1'); ?> /></td>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_topbar_left_1')); ?>" <?php $this->link('padding_topbar_left_1'); ?> /></td>
						<td>px</td>
					</tr>
				</tbody>
			</table>
		<?php }
	}
	$wp_customize->add_setting('padding_topbar_top_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_topbar_right_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_topbar_bottom_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_topbar_left_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control(new Padding_topbar_1(
		$wp_customize,'padding_topbar_1',
		array(
			'label' => esc_html__('Padding topbar','bemins'),
			'section' => 'bwp-header_1',
			'settings' => [
				'padding_topbar_top_1' => 'padding_topbar_top_1',
				'padding_topbar_right_1' => 'padding_topbar_right_1',
				'padding_topbar_bottom_1' => 'padding_topbar_bottom_1',
				'padding_topbar_left_1' => 'padding_topbar_left_1'
			],
			'type' => 'number'
		)
	));
	
	//---- logo
	class Header_order_1 extends WP_Customize_Control {
		public $type = 'header_order_1';
		public function render_content() {
			?>
			<div class="bwp-cus-title" style="margin-top:30px;"><?php echo esc_html__('2.HEADER MAIN','bemins'); ?></div>
			<div class="filed-flex">
				<div class="bwp-drop-control">
					<div class="bwp-drag-drop-container d-flex">
						<?php
						if( $this->value('header_order_1') ){
							$arr_value = explode("-", $this->value('header_order_1'));
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
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="logo">
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Logo size','bemins'); ?></span>
								<input type="range" value="<?php echo esc_attr($this->value('width_logo_1')); ?>" name="points" min="0" max="500" <?php $this->link('width_logo_1'); ?>>
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Logo position','bemins'); ?></span>
								<select class="bwp-select" <?php $this->link('logo_pos_1'); ?>>
									<option value="text-center"><?php echo esc_html__('Center','bemins'); ?></option>
									<option value="text-left"><?php echo esc_html__('Left','bemins'); ?></option>
									<option value="text-right"><?php echo esc_html__('Right','bemins'); ?></option>
								</select>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="menu">
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color menu','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('menu_color_1')); ?>" <?php $this->link('menu_color_1'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Font size','bemins'); ?></span>
								<input type="number" min="0" value="<?php echo esc_attr($this->value('menu_size_1')); ?>" <?php $this->link('menu_size_1'); ?> />
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Menu position','bemins'); ?></span>
								<select class="bwp-select" <?php $this->link('menu_pos_1'); ?>>
									<option value="menu-left"><?php echo esc_html__('Left','bemins'); ?></option>
									<option value="menu-right"><?php echo esc_html__('Right','bemins'); ?></option>
									<option value="menu-center"><?php echo esc_html__('Center','bemins'); ?></option>
								</select>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
						<div class="bwp-drag-drop-content bwp-drag-drop-toggle" data-value="icons">
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Color icon','bemins'); ?></span>
								<input type="text" class="bwp-input-color" data-default-color="" value="<?php echo esc_attr($this->value('icon_color_1')); ?>" <?php $this->link('icon_color_1'); ?> />
							</div>
							<div class="drag-option">
								<div class="cus-label"><?php echo esc_html__('Show icon cart','bemins'); ?></div>
								<div class="switch-options">
									<input type="checkbox" value="<?php echo esc_attr($this->value('icon_cart_1')); ?>" <?php $this->link('icon_cart_1'); ?>>
									<label class="disable"></label>
								</div>
							</div>
							<div class="drag-option">
								<div class="cus-label"><?php echo esc_html__('Show icon search','bemins'); ?></div>
								<div class="switch-options">
									<input type="checkbox" value="<?php echo esc_attr($this->value('icon_search_1')); ?>" <?php $this->link('icon_search_1'); ?>>
									<label class="disable"></label>
								</div>
							</div>
							<div class="drag-option">
								<div class="cus-label"><?php echo esc_html__('Show icon account','bemins'); ?></div>
								<div class="switch-options">
									<input type="checkbox" value="<?php echo esc_attr($this->value('icon_account_1')); ?>" <?php $this->link('icon_account_1'); ?>>
									<label class="disable"></label>
								</div>
							</div>
							<div class="drag-option">
								<div class="cus-label"><?php echo esc_html__('Show icon wishlist','bemins'); ?></div>
								<div class="switch-options">
									<input type="checkbox" value="<?php echo esc_attr($this->value('icon_wishlist_1')); ?>" <?php $this->link('icon_wishlist_1'); ?>>
									<label class="disable"></label>
								</div>
							</div>
							<div class="drag-option">
								<span class="customize-control-title"><?php echo esc_html__('Icons position','bemins'); ?></span>
								<select class="bwp-select" <?php $this->link('icons_pos_1'); ?>>
									<option value="text-left"><?php echo esc_html__('Left','bemins'); ?></option>
									<option value="text-right"><?php echo esc_html__('Right','bemins'); ?></option>
									<option value="text-center"><?php echo esc_html__('Center','bemins'); ?></option>
								</select>
							</div>
							<div class="btn-delete-drop-content"><button class="delete-drop-content"><?php echo esc_html__('Delete','bemins'); ?></button></div>
						</div>
					</div>
					<div class="btn-add-drop-content">
						<?php
							$arr_choices = $this->choices;
							$arr_value = explode("-", $this->value('header_order_1'));
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
					<input class="bwp-drag-drop-input" type="hidden" <?php $this->link('header_order_1'); ?> value="<?php echo esc_attr( $this->value('header_order_1') ); ?>">
				</div>
			</div>
		  <?php
		}
	}
	$wp_customize->add_setting( 'header_order_1', array(
		'default'           => 'logo-menu-icons',
		'sanitize_callback' => 'sanitize_input',
	) );
	$wp_customize->add_setting( 'width_logo_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'logo_pos_1' , array(
		'default' => 'text-left',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'menu_color_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'menu_size_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'menu_pos_1' , array(
		'default' => 'menu-center',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	//---- icon color
	$wp_customize->add_setting( 'icon_color_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_setting( 'icon_cart_1' , array(
		'default' => true,
		'sanitize_callback' => 'sanitize_input',
	));
	$wp_customize->add_setting( 'icon_search_1' , array(
		'default' => true,
		'sanitize_callback' => 'sanitize_input',
	));
	$wp_customize->add_setting( 'icon_wishlist_1' , array(
		'default' => true,
		'sanitize_callback' => 'sanitize_input', 
	));
	$wp_customize->add_setting( 'icon_account_1' , array(
		'default' => true,
		'sanitize_callback' => 'sanitize_input',
	));
	$wp_customize->add_setting( 'icons_pos_1' , array(
		'default' => 'text-right',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_control( new Header_order_1( $wp_customize, 'header_order_1', array(
		'section' => 'bwp-header_1',
		'choices' => array(
			'logo' => 'logo',
			'menu' => 'menu',
			'icons' => 'icons',
		),
		'settings' => [
			'header_order_1' => 'header_order_1',
			'width_logo_1' => 'width_logo_1',
			'logo_pos_1' => 'logo_pos_1',
			'icons_pos_1' => 'icons_pos_1',
			'menu_color_1' => 'menu_color_1',
			'menu_size_1' => 'menu_size_1',
			'menu_pos_1' => 'menu_pos_1',
			'icon_color_1' => 'icon_color_1',
			'icon_cart_1' => 'icon_cart_1',
			'icon_search_1' => 'icon_search_1',
			'icon_wishlist_1' => 'icon_wishlist_1',
			'icon_account_1' => 'icon_account_1',
		],
	)));
	
	//---- Header absolute
	class Header_absolute_1 extends WP_Customize_Control{
		public $type = 'header_absolute_1';
		public function render_content(){ ?>
			<div class="filed-flex">
				<div class="cus-label"><?php echo esc_html__('Header absolute','bemins'); ?></div>
				<div class="switch-options">
					<input type="checkbox" value="<?php echo esc_attr($this->value('header_absolute_1')); ?>" <?php $this->link('header_absolute_1'); ?>>
					<label class="disable"></label>
				</div>
			</div>
			<div class="info"><?php echo esc_html__('Header absolute will only show on homepage','bemins'); ?></div>
		<?php }
	}
	$wp_customize->add_setting('header_absolute_1', array(
		'default' => true,
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
	));
	$wp_customize->add_control(new Header_absolute_1(
		$wp_customize,'header_absolute_1',
		array(
			'label' => esc_html__('Header absolute','bemins'),
			'section' => 'bwp-header_1',
			'settings' => [
				'header_absolute_1' => 'header_absolute_1'
			]
		)
	));
	
	//---- background
	$wp_customize->add_setting( 'header_color_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage', 
	));
	$wp_customize->add_control('header_color_1', array(
		'label'   => esc_html__('Background','bemins'),
		'section' => 'bwp-header_1',
		'type'    => 'color',
	));
	
	//---- Hover color
	$wp_customize->add_setting( 'hover_color_1' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh', 
	));
	$wp_customize->add_control('hover_color_1', array(
		'label'   => esc_html__('Color hover','bemins'),
		'section' => 'bwp-header_1',
		'type'    => 'color',
	));
	
	//---- padding
	class Padding_header_1 extends WP_Customize_Control{
		public $type = 'padding_1';
		public function render_content(){ ?>
			<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
			<table class="tg">
				<thead>
					<tr>
						<th><?php echo esc_html__('Top','bemins') ?></th>
						<th><?php echo esc_html__('Right','bemins') ?></th>
						<th><?php echo esc_html__('Bottom','bemins') ?></th>
						<th><?php echo esc_html__('Left','bemins') ?></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_top_1')); ?>" <?php $this->link('padding_top_1'); ?> /></td>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_right_1')); ?>" <?php $this->link('padding_right_1'); ?> /></td>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_bottom_1')); ?>" <?php $this->link('padding_bottom_1'); ?> /></td>
						<td><input type="<?php echo esc_attr($this->type); ?>" value="<?php echo esc_attr($this->value('padding_left_1')); ?>" <?php $this->link('padding_left_1'); ?> /></td>
						<td>px</td>
					</tr>
				</tbody>
			</table>
		<?php }
	}
	$wp_customize->add_setting('padding_top_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_right_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_bottom_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_left_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control(new Padding_header_1(
		$wp_customize,'padding_1',
		array(
			'label' => esc_html__('Padding header','bemins'),
			'section' => 'bwp-header_1',
			'settings' => [
				'padding_top_1' => 'padding_top_1',
				'padding_right_1' => 'padding_right_1',
				'padding_bottom_1' => 'padding_bottom_1',
				'padding_left_1' => 'padding_left_1'
			],
			'type' => 'number'
		)
	));