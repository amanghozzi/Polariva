<?php ///////////////HEADER CAMPAR
	$wp_customize->add_section('bwp-header_campar', array(
		'title'          => 'Header Campar',
		'panel' => 'header_settings_section',
	));
	
	class Campar extends WP_Customize_Control{
		public $type = 'padding_campar';
		public function render_content(){ ?>
			<div class="filed-flex">
				<div class="filed-flex" style="margin-bottom:20px;">
					<div class="cus-label"><?php echo esc_html__('Show campar','bemins'); ?></div>
					<div class="switch-options">
						<input type="checkbox" value="<?php echo esc_attr($this->value('show_campar')); ?>" <?php $this->link('show_campar'); ?>>
						<label class="disable"></label>
					</div>
				</div>
				<div class="filed-flex" style="margin-bottom:20px;">
					<div class="cus-label"><?php echo esc_html__('Marquee campar','bemins'); ?></div>
					<div class="switch-options">
						<input type="checkbox" value="<?php echo esc_attr($this->value('marquee_campar')); ?>" <?php $this->link('marquee_campar'); ?>>
						<label class="disable"></label>
					</div>
				</div>
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
						<td><input type="number" value="<?php echo esc_attr($this->value('padding_campar_top_1')); ?>" <?php $this->link('padding_campar_top_1'); ?> /></td>
						<td><input type="number" value="<?php echo esc_attr($this->value('padding_campar_right_1')); ?>" <?php $this->link('padding_campar_right_1'); ?> /></td>
						<td><input type="number" value="<?php echo esc_attr($this->value('padding_campar_bottom_1')); ?>" <?php $this->link('padding_campar_bottom_1'); ?> /></td>
						<td><input type="number" value="<?php echo esc_attr($this->value('padding_campar_left_1')); ?>" <?php $this->link('padding_campar_left_1'); ?> /></td>
						<td>px</td>
					</tr>
				</tbody>
			</table>
			</div>
		<?php }
	}
	$wp_customize->add_setting( 'show_campar' , array(
		'default' => true, 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting( 'marquee_campar' , array(
		'default' => true, 
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh', 
	));
	$wp_customize->add_setting('padding_campar_top_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_campar_right_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_campar_bottom_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_setting('padding_campar_left_1', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control(new Campar(
		$wp_customize,'padding_campar',
		array(
			'label' => esc_html__('Padding campar','bemins'),
			'section' => 'bwp-header_campar',
			'settings' => [
				'show_campar' => 'show_campar',
				'marquee_campar' => 'marquee_campar',
				'padding_campar_top_1' => 'padding_campar_top_1',
				'padding_campar_right_1' => 'padding_campar_right_1',
				'padding_campar_bottom_1' => 'padding_campar_bottom_1',
				'padding_campar_left_1' => 'padding_campar_left_1'
			]
		)
	));
	
	$wp_customize->add_setting( 'content_campar' , array(
		'default' => 'Free Delivery on orders over $100.',
		'sanitize_callback' => 'sanitize_html',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('content_campar', array(
		'label'   => esc_html__('Content Campar','bemins'),
		'section' => 'bwp-header_campar',
		'type'    => 'textarea',
	));
	
	$wp_customize->add_setting( 'repetitions_campar' , array(
		'default' => 10,
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('repetitions_campar', array(
		'label'   => esc_html__('Number Of Repetitions Marquee','bemins'),
		'section' => 'bwp-header_campar',
		'type'    => 'number',
	));
	
	$wp_customize->add_setting( 'font_campar' , array(
		'default' => 14,
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('font_campar', array(
		'label'   => esc_html__('Font size campar','bemins'),
		'section' => 'bwp-header_campar',
		'type'    => 'number',
	));
	
	$wp_customize->add_setting( 'url_campar' , array(
		'default' => '#',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('url_campar', array(
		'label'   => esc_html__('Url Campar','bemins'),
		'section' => 'bwp-header_campar',
		'type'    => 'input',
	));
	
	$wp_customize->add_setting('image_campar', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_html',
		'transport'         => 'refresh',
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'image_campar',
			array(
				'label'    => esc_html__('Image Campar', 'bemins'),
				'section'  => 'bwp-header_campar',
				'settings' => 'image_campar',
			)
		)
	);
	
	$wp_customize->add_setting( 'background_campar' , array(
		'default' => '#e8f9fb',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('background_campar', array(
		'label'   => esc_html__('Background','bemins'),
		'section' => 'bwp-header_campar',
		'type'    => 'color',
	));
	
	$wp_customize->add_setting( 'color_campar' , array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_campar', array(
		'label'   => esc_html__('Color','bemins'),
		'section' => 'bwp-header_campar',
		'type'    => 'color',
	));