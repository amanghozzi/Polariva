<?php

namespace ElementorWpbingo\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Repeater;
use Elementor\Utils;
if ( ! defined( 'ABSPATH' ) ) exit;
class Bwp_Marquee_Text extends Widget_Base {
	
	public function get_name() {
		return 'wpbingo-elementor-marquee-text';
	}
	
	public function get_title() {
		return __( 'Wpbingo Marquee Text', 'wpbingo' );
	}
	
	public function get_icon() {
		return 'eicon-grow';
	}
	
	public function get_categories() {
		return [ 'wpbingo' ];
	}

	
	protected function _register_controls() {

		/*-----------------------------------------------------------------------------------*/
		/*  *.  Marquee Text - Content
		/*-----------------------------------------------------------------------------------*/
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

			$repeater = new Repeater();

			$repeater->add_control(
				'wpbingo_elementor_marquee_item',
				[
					'label'			=> esc_html__( 'Content', 'wpbingo'),
					'type'			=> \Elementor\Controls_Manager::TEXT,
					'label_block'	=> true,
					'dynamic'		=> [ 'active' => true ]
				]
			);

			$repeater->add_control(
				'wpbingo_elementor_marquee_link',
				[
					'label'			=> esc_html__( 'Link', 'wpbingo'),
					'type' 			=> \Elementor\Controls_Manager::URL,
					'dynamic'		=> [ 'active' => true ],
					'placeholder' => esc_html__( 'https://your-link.com', 'wpbingo' ),
					'default' => [
						'url' => '#',
					],
				]
			);

			$this->add_control(
				'wpbingo_elementor_marquee_item_strings',
				[
					'type'   	  => \Elementor\Controls_Manager::REPEATER,
					'show_label'  => true,
					'fields'      =>  $repeater->get_controls(),
					'title_field' => '{{ wpbingo_elementor_marquee_item }}',
					'default'     => [
						['wpbingo_elementor_marquee_item' => esc_html__('Item #1', 'wpbingo')],
						['wpbingo_elementor_marquee_item' => esc_html__('Item #2', 'wpbingo')],
						['wpbingo_elementor_marquee_item' => esc_html__('Item #3', 'wpbingo')],
						['wpbingo_elementor_marquee_item' => esc_html__('Item #4', 'wpbingo')],
						['wpbingo_elementor_marquee_item' => esc_html__('Item #5', 'wpbingo')],
						['wpbingo_elementor_marquee_item' => esc_html__('Item #6', 'wpbingo')],
						['wpbingo_elementor_marquee_item' => esc_html__('Item #7', 'wpbingo')],
						['wpbingo_elementor_marquee_item' => esc_html__('Item #8', 'wpbingo')],
						['wpbingo_elementor_marquee_item' => esc_html__('Item #9', 'wpbingo')],
						['wpbingo_elementor_marquee_item' => esc_html__('Item #10', 'wpbingo')],
					],
				]
			);

		$this->end_controls_section();

		/*-----------------------------------------------------------------------------------*/
		/*  *.  Marquee Text/Settings - Content
		/*-----------------------------------------------------------------------------------*/

		$this->start_controls_section(
			'wpbingo_elementor_section_marquee_text_settings',
			[
				'label' => esc_html__( 'Settings', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'wpbingo_elementor_marquee_text_start_visible',
				[
					'label' => __( 'Start Visible', 'wpbingo' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'return_value' => 'true',
					'default' => 'true',
				]
			);

			$this->add_control(
				'wpbingo_elementor_marquee_text_duplicated',
				[
					'label' => __( 'Duplicated', 'wpbingo' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'return_value' => 'true',
					'default' => 'true',
				]
			);

			$this->add_control(
				'wpbingo_elementor_marquee_text_pause_on_hover',
				[
					'label' => __( 'Pause On Hover', 'wpbingo' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'return_value' => 'true',
					'default' => 'false',
				]
			);

			$this->add_control(
				'wpbingo_elementor_marquee_text_direction',
				[
					'label' => __( 'Direction', 'wpbingo' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'left',
					'options' => [
						'left'  => __( 'Left', 'wpbingo' ),
						'right' => __( 'Right', 'wpbingo' ),
					],
				]
			);

			$this->add_control(
				'wpbingo_elementor_marquee_text_duration',
				[
					'label' => __( 'Duration', 'wpbingo' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 1000,
					'max' => 100000,
					'step' => 100,
					'default' => 5000,
				]
			);

			$this->add_responsive_control(
				'wpbingo_elementor_marquee_text_gap',
				[
					'label' => __( 'Gap', 'wpbingo' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 0,
					'max' => 99999,
					'step' => 1,
					'default' => 50,
					'selectors' => [
						'{{WRAPPER}} .wpbingo-elementor-marquee-text .js-marquee' => 'gap: {{VALUE}}px',
					],
				]
			);

			$this->add_control(
				'wpbingo_elementor_marquee_text_delay_before_start',
				[
					'label' => __( 'Delay Before Start', 'wpbingo' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 0,
					'max' => 99999,
					'step' => 1,
					'default' => 0,
				]
			);

			$this->add_control(
				'layout',
				[
					'label' => __( 'Layout', 'wpbingo' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'default',
					'options' => [
						'default'  => __( 'Default', 'wpbingo' ),
						'style-1'  => __( 'Style 1', 'wpbingo' )
					],
				]
			);

		$this->end_controls_section();

		/*-----------------------------------------------------------------------------------*/
		/*  *.  Marquee Text - Style
		/*-----------------------------------------------------------------------------------*/

		$this->start_controls_section(
			'wpbingo_elementor_section_marquee_text_style',
			[
				'label' => esc_html__( 'Marquee Text', 'wpbingo'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'wpbingo_elementor_marquee_text_typography',
					'label' => __('Typography', 'wpbingo'),
					'scheme' => Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .wpbingo-elementor-marquee-text *',
				]
			);

			$this->add_control(
				'font_custom_title',
				[
					'label' => _x( 'Use custom fonts','wpbingo' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'On', 'elementor' ),
					'label_off' => esc_html__( 'Off', 'elementor' ),
					'default' => '',
				]
			);

			$this->add_control(
				'input_font_custom_title',
				[
					'label' => __( 'Enter your font name', 'wpbingo' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => '',
					'placeholder' => __( 'Enter your font name here', 'wpbingo' ),
					'selectors' => [
						'{{WRAPPER}} .wpbingo-elementor-marquee-text .wpbingo-elementor-marquee-text-item' => 'font-family: {{VALUE}};',
					],
					'condition'   => [
						'font_custom_title!' => '',
					]
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'wpbingo_elementor_marquee_text_shadow',
					'label' => __( 'Text Shadow', 'wpbingo' ),
					'selector' => '{{WRAPPER}} .wpbingo-elementor-marquee-text *',
				]
			);

			$this->add_control(
				'wpbingo_elementor_marquee_text_color',
				[
					'label' => __( 'Color', 'wpbingo' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wpbingo-elementor-marquee-text *' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'wpbingo_elementor_marquee_border_color',
				[
					'label' => __( 'Border Color', 'wpbingo' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .wpbingo-elementor-marquee-text.style-1 .js-marquee span:after' => 'background-color: {{VALUE}};',
					],
					'condition'   => [
						'layout' => ["style-1"],
					]	
				]
			);

			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'wpbingo_elementor_marquee_text_background',
					'label' => __( 'Background', 'wpbingo' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .wpbingo-elementor-marquee-text .js-marquee .wpbingo-elementor-marquee-text-item',
				]
			);

			$this->add_responsive_control(
				'wpbingo_elementor_marquee_text_padding',
				[
					'label' => esc_html__( 'Padding', 'wpbingo'),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%', 'rem' ],
					'selectors' => [
						'{{WRAPPER}} .wpbingo-elementor-marquee-text .js-marquee .wpbingo-elementor-marquee-text-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};display: inline-block;',
					],
				]
			);

			$this->add_responsive_control(
				'wpbingo_elementor_marquee_text_margin',
				[
					'label' => esc_html__( 'Margin', 'wpbingo'),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%', 'rem' ],
					'selectors' => [
						'{{WRAPPER}} .wpbingo-elementor-marquee-text .js-marquee .wpbingo-elementor-marquee-text-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'wpbingo_elementor_marquee_text_border',
					'label' => esc_html__( 'Border', 'wpbingo'),
					'selector' => '{{WRAPPER}} .wpbingo-elementor-marquee-text .js-marquee .wpbingo-elementor-marquee-text-item',
				]
			);
		
			$this->add_responsive_control(
				'wpbingo_elementor_marquee_text_radius',
				[
					'label' => esc_html__( 'Border Radius', 'wpbingo'),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'selectors' => [
						'{{WRAPPER}} .wpbingo-elementor-marquee-text .js-marquee .wpbingo-elementor-marquee-text-item' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'wpbingo_elementor_marquee_text_box_shadow',
					'exclude' => [
						'box_shadow_position',
					],
					'selector' => '{{WRAPPER}} .wpbingo-elementor-marquee-text .js-marquee .wpbingo-elementor-marquee-text-item',
				]
			);

		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		$this->add_render_attribute( 'marquee-text', 'data-direction', $settings['wpbingo_elementor_marquee_text_direction'] );
		$this->add_render_attribute( 'marquee-text', 'data-duration', $settings['wpbingo_elementor_marquee_text_duration'] );
		$this->add_render_attribute( 'marquee-text', 'data-delayBeforeStart', $settings['wpbingo_elementor_marquee_text_delay_before_start'] );
		$this->add_render_attribute( 'marquee-text', 'data-gap', $settings['wpbingo_elementor_marquee_text_gap'] );
		$this->add_render_attribute( 'marquee-text', 'data-startVisible', $settings['wpbingo_elementor_marquee_text_start_visible'] );
		$this->add_render_attribute( 'marquee-text', 'data-duplicated', $settings['wpbingo_elementor_marquee_text_duplicated'] );
		$this->add_render_attribute( 'marquee-text', 'data-pauseOnHover', $settings['wpbingo_elementor_marquee_text_pause_on_hover'] );
		?>
			<div class="wpbingo-elementor-marquee-text-widget">
				<div class="wpbingo-elementor-marquee-text <?php echo esc_html($settings['layout']) ?>"<?php echo $this->get_render_attribute_string('marquee-text'); ?>>
					<?php foreach ($settings['wpbingo_elementor_marquee_item_strings'] as $marquee_string) {
						echo '<a href="' . $marquee_string['wpbingo_elementor_marquee_link']['url'] . '"><span class="wpbingo-elementor-marquee-text-item">' . wp_kses($marquee_string['wpbingo_elementor_marquee_item'], true) . '</span></a>';
					} ?>
				</div>
			</div>
		<?php
	}
}
