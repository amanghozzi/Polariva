<?php
namespace ElementorWpbingo\Widgets;
use Elementor\Widget_Base;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Icons_Manager;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Bwp_Image_Countdown_Product extends Widget_Base {
	public function get_name() {
		return 'bwp_image_countdown_product';
	}
	public function get_title() {
		return __( 'Wpbingo Image Countdown Product', 'wpbingo' );
	}
	public function get_icon() {
		return 'eicon-countdown';
	}	
	public function get_categories() {
		return [ 'wpbingo' ];
	}
	
	protected function register_controls() {		
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);		
		$this->add_control(
			'title1',
			[
				'label' => __( 'Title', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __( 'Type your title here', 'wpbingo' ),
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label' => __( 'Sub Title', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __( 'Type your sub title here', 'wpbingo' ),
			]
		);
		$this->add_control(
			'description',
			[
				'label' => __( 'Description', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => '',
				'placeholder' => __( 'Type your Description here', 'wpbingo' ),
			]
		);
		$this->add_control(
			'label',
			[
				'label' => __( 'Button label', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __( 'Type your Button label here', 'wpbingo' ),
			]
		);
		$this->add_control(
			'selected_icon',
			[
				'label' => esc_html__( 'Icon', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'skin' => 'inline',
				'label_block' => false,
				'icon_exclude_inline_options' => [],
			]
		);
		$this->add_control(
			'icon_align',
			[
				'label' => esc_html__( 'Icon Position', 'wpbingo' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => esc_html__( 'Before', 'wpbingo' ),
					'right' => esc_html__( 'After', 'wpbingo' ),
				],
				'condition' => array_merge( [ 'selected_icon[value]!' => '' ] ),
			]
		);		
		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '#',
				'placeholder' => __( 'Type your Link here', 'wpbingo' ),
			]
		);
		$this->add_control(
			'time_deal',
			[
				'label' => __( 'Time Coundown', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __( 'Ex : 2019-5-25', 'wpbingo' ),
			]
		);
		$this->add_control(
			'product_id',
			[
				'label' => __( 'Product Id', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __( 'Type your Product Id here', 'wpbingo' ),
			]
		);
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'wpbingo' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'wpbingo' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'wpbingo' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'wpbingo' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}  .bwp-image-product-countdown' => 'text-align: {{VALUE}};',
				],
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
					'banner-countdown'  => __( 'Banner Countdown', 'wpbingo' ),
					'banner-product-countdown'  => __( 'Banner Product Countdown', 'wpbingo' ),
					'layout-1'  => __( 'Layout 1', 'wpbingo' ),
				],
			]
		);		
		$this->end_controls_section();
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown .title-banner' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .bwp-image-product-countdown .title-banner',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);
		$this->add_responsive_control(
			'title_bottom_space',
			[
				'label' => __( 'Spacing', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown .title-banner' => 'margin-bottom: {{SIZE}}{{UNIT}};margin-top:0;',
				],
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_subtitle_style',
			[
				'label' => __( 'Subtitle', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' => __( 'Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-image-subtitle' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
			]
		);		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .bwp-image-product-countdown .bwp-image-subtitle',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);		
		$this->add_responsive_control(
			'subtitle_bottom_space',
			[
				'label' => __( 'Spacing', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-image-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_description_style',
			[
				'label' => __( 'Description', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'description_color',
			[
				'label' => __( 'Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-image-description' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .bwp-image-product-countdown .bwp-image-description',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);		
		$this->add_responsive_control(
			'description_bottom_space',
			[
				'label' => __( 'Spacing', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-image-description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => __( 'Button', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .bwp-image-product-countdown .bwp-button',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .bwp-image-product-countdown .bwp-button',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'button_margin',
			[
				'label' => __( 'Margin', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'button_padding',
			[
				'label' => __( 'Padding', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs( 'tabs_button_style' );
		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'wpbingo' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label' => esc_html__( 'Background Color', 'wpbingo' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button' => 'background-color: {{VALUE}};',
				],
				'condition' => [],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'wpbingo' ),
			]
		);

		$this->add_control(
			'hover_style',
			[
				'label' => __( 'Hover Style', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default'  => __( 'Default', 'wpbingo' ),
					'style_1'  => __( 'Style 1', 'wpbingo' ),
					'style_2'  => __( 'Style 2', 'wpbingo' ),
					'style_3'  => __( 'Style 3', 'wpbingo' ),
					'style_4'  => __( 'Style 4', 'wpbingo' ),
					'style_5'  => __( 'Style 5', 'wpbingo' ),
					'style_6'  => __( 'Style 6', 'wpbingo' ),
					'style_7'  => __( 'Style 7', 'wpbingo' ),
					'style_8'  => __( 'Style 8', 'wpbingo' ),
					'style_9'  => __( 'Style 9', 'wpbingo' ),
					'style_10'  => __( 'Style 10', 'wpbingo' )
				],
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button:hover, {{WRAPPER}} .bwp-image-product-countdown .bwp-button:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button:hover svg path' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_color_hover',
			[
				'label' => esc_html__( 'Background Color Hover', 'wpbingo' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.default:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_1:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_1:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_1 .bwp-button-content-wrapper:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_1 .bwp-button-content-wrapper:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_2:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_3:before' => 'border-color: transparent transparent transparent {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_3:after' => 'border-color: transparent {{VALUE}} transparent transparent;',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_4:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_4:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_4 .bwp-button-content-wrapper:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_4 .bwp-button-content-wrapper:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_5:before' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_5:after' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_6:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_7:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_8:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_8:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_9:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button.style_10:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button:focus' => 'background-color: {{VALUE}};',
				],
				'condition' => [],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button:hover, {{WRAPPER}} .bwp-image-product-countdown .bwp-button:focus' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => __( 'Icon', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'wpbingo' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button svg path' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'size_icon',
			[
				'label' => esc_html__( 'Size Icon', 'wpbingo' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button svg' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_indent',
			[
				'label' => esc_html__( 'Icon Spacing', 'wpbingo' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button .bwp-button-icon.bwp-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button .bwp-button-icon.bwp-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_position',
			[
				'label' => esc_html__( 'Icon Position', 'wpbingo' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 15,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown .bwp-button .bwp-button-icon' => 'top: {{SIZE}}{{UNIT}};position: relative;',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Content', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'content_background_color',
			[
				'label' => __( 'Background Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'content_padding',
			[
				'label' => __( 'Padding', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-image-product-countdown' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->end_controls_section();
	}
	protected function render_text( Widget_Base $instance = null ) {
		if ( empty( $instance ) ) {
			$instance = $this;
		}
		$settings = $instance->get_settings_for_display();
		$migrated = isset( $settings['__fa4_migrated']['selected_icon'] );
		$is_new = empty( $settings['icon'] ) && Icons_Manager::is_migration_allowed();
		?>
			<?php if ( ! empty( $settings['icon'] ) || ! empty( $settings['selected_icon']['value'] ) ) : ?>
			<span>
				<?php if ( $is_new || $migrated ) :
					Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
				else : ?>
					<i class="<?php echo esc_attr( $settings['icon'] ); ?>" aria-hidden="true"></i>
				<?php endif; ?>
			</span>
			<?php endif; ?>
		<?php
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$icon_svg = $this->get_settings_for_display( 'selected_icon' );
		$icon = $this->get_settings_for_display( 'icon' );
		$migrated = isset( $settings['__fa4_migrated']['selected_icon'] );
		$is_new = empty( $settings['icon'] ) && Icons_Manager::is_migration_allowed();
		extract( shortcode_atts(
			array(
				'title1' 	=> '',
				'subtitle' 	=> '',
				'description' => '',
				'link' 		=> '#',
				'label' 	=> '',
				'image' 	=> '',
				'time_deal' => '25-5-2023',
				'product_id'	=> '',
				'layout'  	=> 'default',
				'image_hover' => '',
				'hover_style' 	=> 'default',
				'icon_align' 	=> '',
			), $settings )
		);
		$widget_id = 'bwp_banner_image_'.rand().time();
		if( $layout == 'default' ){
			include(WPBINGO_ELEMENTOR_TEMPLATE_PATH.'bwp-image-countdown-product/default.php' );
		}
	}
}