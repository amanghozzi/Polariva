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
class Bwp_Recent_Post extends Widget_Base {
	public function get_name() {
		return 'bwp_recent_post';
	}
	public function get_title() {
		return __( 'Wpbingo Recent Post', 'wpbingo' );
	}
	public function get_icon() {
		return 'eicon-post-excerpt';
	}	
	public function get_categories() {
		return [ 'wpbingo' ];
	}
	protected function register_controls() {
		$number = array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6);
		$categories = get_categories();
		$terms = array();
		if($categories){
			$terms = array( '' => __( 'All Categories', "wpbingo" ) );
			foreach ( $categories as $category ) {
				$terms[$category->slug] = $category->name;
			}			
		}
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
				'label' => __( 'Main Title', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __( 'Type your title here', 'wpbingo' ),
			]
		);
		$this->add_control(
			'description',
			[
				'label' => __( 'Description', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __( 'Type your Description here', 'wpbingo' ),
			]
		);		
		$this->add_control(
			'category',
			[
				'label' => __( 'Category', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => $terms,
			]
		);
		$this->add_control(
			'limit',
			[
				'label' => __( 'Number of Posts', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 6,
				'description' => __( 'Type your Number of Posts', 'wpbingo' ),
			]
		);
		$this->add_control(
			'length',
			[
				'label' => __( 'Excerpt length (in words)', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 25,
				'description' => __( 'Type your Excerpt length (in words)', 'wpbingo' ),
			]
		);
		$this->add_control(
			'item_row',
			[
				'label' => __( 'Number row of Posts', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __( 'Type your Number row of Testimonial here', 'wpbingo' ),
				'default' => 1,
			]
		);		
		$this->add_control(
			'columns',
			[
				'label' => __( 'Number of Columns >1200px', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => $number,
				'default' => 1
			]
		);
		$this->add_control(
			'columns1',
			[
				'label' => __( 'Number of Columns on 992px to 1199px', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => $number,
				'default' => 1
			]
		);
		$this->add_control(
			'columns2',
			[
				'label' => __( 'Number of Columns on 768px to 991px', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => $number,
				'default' => 1
			]
		);
		$this->add_control(
			'columns3',
			[
				'label' => __( 'Number of Columns on 480px to 767px', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => $number,
				'default' => 1
			]
		);
		$this->add_control(
			'columns4',
			[
				'label' => __( 'Number of Columns in 480px or less than', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => $number,
				'default' => 1
			]
		);
		$this->add_control(
			'show_categories',
			[
				'label' => __( 'Show Categories', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1'  => __( 'Yes', 'wpbingo' ),
					'0' => __( 'No', 'wpbingo' ),
				],
				'default' => '1',
			]
		);
		$this->add_control(
			'show_excerpt',
			[
				'label' => __( 'Show Excerpt', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1'  => __( 'Yes', 'wpbingo' ),
					'0' => __( 'No', 'wpbingo' ),
				],
				'default' => '1',
			]
		);
		$this->add_control(
			'show_content_meta',
			[
				'label' => __( 'Show Content Meta', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1'  => __( 'Yes', 'wpbingo' ),
					'0' => __( 'No', 'wpbingo' ),
				],
				'default' => '0',
			]
		);
		$this->add_control(
			'show_posting_time',
			[
				'label' => __( 'Show Posting Time', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1'  => __( 'Yes', 'wpbingo' ),
					'0' => __( 'No', 'wpbingo' ),
				],
				'default' => '1',
			]
		);
		$this->add_control(
			'show_button',
			[
				'label' => __( 'Show Button', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1'  => __( 'Yes', 'wpbingo' ),
					'0' => __( 'No', 'wpbingo' ),
				],
				'default' => '1',
			]
		);
		$this->add_control(
			'show_nav',
			[
				'label' => __( 'Show Navigation', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1'  => __( 'Yes', 'wpbingo' ),
					'0' => __( 'No', 'wpbingo' ),
				],
				'default' => '0',
				'condition'   => [
                    'layout' => ["slider"],
                ]
			]
		);
		$this->add_control(
			'navigational_style',
			[
				'label' => __( 'Navigational Style', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'nav-show-hover',
				'options' => [
					'nav-show-hover'   => __( 'Hover show', 'wpbingo' ),
					'nav-show-always'  => __( 'Always show', 'wpbingo' )
				],
				'condition'   => [
                    'show_nav' => ['1'],
					'layout' => ["slider"],
                ]
			]
		);
		$this->add_control(
			'show_pag',
			[
				'label' => __( 'Show Pagination', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1'  => __( 'Yes', 'wpbingo' ),
					'0' => __( 'No', 'wpbingo' ),
				],
				'default' => '0',
				'condition'   => [
                    'layout' => ["slider"],
                ]
			]
		);
		$this->add_control(
			'show_clipped',
			[
				'label' => __( 'Show Clipped Content Mobile', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1'  => __( 'Yes', 'wpbingo' ),
					'0' => __( 'No', 'wpbingo' ),
				],
				'default' => '1',
				'condition'   => [
                    'layout' => ["slider"],
                ]				
			]
		);
		$this->add_control(
			'show_autoplay',
			[
				'label' => __( 'Show Autoplay', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'true'  => __( 'Yes', 'wpbingo' ),
					'false' => __( 'No', 'wpbingo' ),
				],
				'default' => 'false',
				'condition'   => [
                    'layout' => ["slider"],
                ]
			]
		);
		$this->add_control(
			'label',
			[
				'label' => __( 'Button label', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Read More',
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
			'layout',
			[
				'label' => __( 'Layout', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default'  		=> __( 'Default', 'wpbingo' ),
					'slider'  		=> __( 'Slider', 'wpbingo' ),
					'blog-menu' 	=> __( 'Blog Menu', 'wpbingo' )
				],
			]
		);
		$this->add_responsive_control(
			'main_align',
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
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .title-block' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_main_title_style',
			[
				'label' => __( 'Main Title', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'main_title_color',
			[
				'label' => __( 'Title Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .title-block h2' => 'color: {{VALUE}};',
				],
				'separator' => 'after',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'main_title_typography',
				'selector' => '{{WRAPPER}} .bwp-recent-post .title-block h2',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);
		$this->add_responsive_control(
			'main_title_bottom_space',
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
					'{{WRAPPER}} .bwp-recent-post .title-block h2' => 'margin-bottom: {{SIZE}}{{UNIT}};margin-top:0;',
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
		$this->start_controls_tabs( 'tabs_title_hover');
		$this->start_controls_tab(
			'tab_title_normal',
			[
				'label' => __( 'Normal', 'wpbingo' ),
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
					'{{WRAPPER}} .bwp-recent-post .entry-title a' => 'color: {{VALUE}};',
				],
				'separator' => 'after',
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_title_hover',
			[
				'label' => __( 'hover', 'wpbingo' ),
			]
		);
		$this->add_control(
			'title_color_hover',
			[
				'label' => __( 'Title Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .entry-title a:hover' => 'color: {{VALUE}};',
				],
				'separator' => 'after',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .bwp-recent-post .entry-title',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);
		$this->add_responsive_control(
			'margin_title',
			[
				'label' => __( 'Margin', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .entry-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_categories_style',
			[
				'label' => __( 'Categories', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'tabs_categories_hover');
		$this->start_controls_tab(
			'tab_categories_normal',
			[
				'label' => __( 'Normal', 'wpbingo' ),
			]
		);
		$this->add_control(
			'categories_color',
			[
				'label' => __( 'Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-categories a' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
			]
		);
		$this->add_control(
			'categories_background',
			[
				'label' => __( 'Background', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-categories a' => 'background: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'separator' => 'after',
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_categories_hover',
			[
				'label' => __( 'Hover', 'wpbingo' ),
			]
		);
		$this->add_control(
			'categories_color_hover',
			[
				'label' => __( 'Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-categories a:hover' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
			]
		);
		$this->add_control(
			'categories_background_hover',
			[
				'label' => __( 'Background', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-categories a:hover' => 'background: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'separator' => 'after',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'categories_typography',
				'selector' => '{{WRAPPER}} .bwp-recent-post .post-categories a',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);		
		$this->add_responsive_control(
			'categories_bottom_space',
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
					'{{WRAPPER}} .bwp-recent-post .post-categories' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'categories_border',
				'selector' => '{{WRAPPER}} .bwp-recent-post .post-categories a',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'categories_border_radius',
			[
				'label' => __( 'Border Radius', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-categories a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'categories_padding',
			[
				'label' => __( 'Padding', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-categories a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'meta_style',
			[
				'label' => __( 'Content Meta', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'tabs_meta_hover');
		$this->start_controls_tab(
			'tab_meta_normal',
			[
				'label' => __( 'Normal', 'wpbingo' ),
			]
		);
		$this->add_control(
			'meta_color',
			[
				'label' => __( 'Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .entry-meta a' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'separator' => 'after',
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_meta_hover',
			[
				'label' => __( 'Hover', 'wpbingo' ),
			]
		);
		$this->add_control(
			'meta_color_hover',
			[
				'label' => __( 'Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .entry-meta a:hover' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
				'separator' => 'after',
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'selector' => '{{WRAPPER}} .bwp-recent-post .entry-meta',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);		
		$this->add_responsive_control(
			'meta_bottom_space',
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
					'{{WRAPPER}} .bwp-recent-post .entry-meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'align_meta',
			[
				'label' => __( 'Horizontal Align', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'Default', 'elementor' ),
					'flex-start' => __( 'Start', 'elementor' ),
					'center' => __( 'Center', 'elementor' ),
					'flex-end' => __( 'End', 'elementor' ),
					'space-between' => __( 'Space Between', 'elementor' ),
					'space-around' => __( 'Space Around', 'elementor' ),
					'space-evenly' => __( 'Space Evenly', 'elementor' ),
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .entry-meta' => 'justify-content: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'heading_title_icon',
			[
				'label' => __( 'Icon', 'wpbingo' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'icon_meta_color',
			[
				'label' => __( 'Icon Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .entry-meta i' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
			]
		);
		$this->add_responsive_control(
			'icon_meta_fontsize',
			[
				'label' => __( 'Icon Font Size', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .entry-meta i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_meta_space',
			[
				'label' => __( 'icon Spacing', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .entry-meta i' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_date_style',
			[
				'label' => __( 'Date', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'date_color',
			[
				'label' => __( 'Date Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post time.entry-date' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'date_typography',
				'selector' => '{{WRAPPER}} .bwp-recent-post time.entry-date',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);
		$this->add_responsive_control(
			'date_bottom_space',
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
					'{{WRAPPER}} .bwp-recent-post time.entry-date' => 'margin-bottom: {{SIZE}}{{UNIT}};margin-top:0;display: inline-block;',
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
				'label' => __( 'Description Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-excerpt' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .bwp-recent-post .post-excerpt',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
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
					'{{WRAPPER}} .bwp-recent-post .post-excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}};margin-top:0;',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'description_border',
				'selector' => '{{WRAPPER}} .bwp-recent-post .post-excerpt',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'description_padding',
			[
				'label' => __( 'Padding', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-excerpt' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
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
				'selector' => '{{WRAPPER}} .bwp-recent-post .bwp-button',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .bwp-recent-post .bwp-button',
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
					'{{WRAPPER}} .bwp-recent-post .bwp-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .bwp-recent-post .bwp-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .bwp-recent-post .bwp-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .bwp-recent-post .bwp-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
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
					'{{WRAPPER}} .bwp-recent-post .bwp-button' => 'background-color: {{VALUE}};',
				],
				'condition' => [],
			]
		);

		$this->add_control(
			'button_border_color',
			[
				'label' => esc_html__( 'Border Color', 'wpbingo' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_11:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_11:after' => 'background-color: {{VALUE}};',
				],
				'condition'   => [],
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
					'style_10'  => __( 'Style 10', 'wpbingo' ),
					'style_11'  => __( 'Style 11', 'wpbingo' )
				],
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .bwp-button:hover, {{WRAPPER}} .bwp-recent-post .bwp-button:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button:hover svg path' => 'fill: {{VALUE}}; color: {{VALUE}};',
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
					'{{WRAPPER}} .bwp-recent-post .bwp-button.default:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_1:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_1:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_1 .bwp-button-content-wrapper:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_1 .bwp-button-content-wrapper:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_2:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_3:before' => 'border-color: transparent transparent transparent {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_3:after' => 'border-color: transparent {{VALUE}} transparent transparent;',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_4:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_4:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_4 .bwp-button-content-wrapper:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_4 .bwp-button-content-wrapper:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_5:before' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_5:after' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_6:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_7:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_8:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_8:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_9:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_10:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_11:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button:focus' => 'background-color: {{VALUE}};',
				],
				'condition' => [],
			]
		);

		$this->add_control(
			'button_border_color_hover',
			[
				'label' => esc_html__( 'Border Color Hover', 'wpbingo' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_11:before' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button.style_11:after' => 'background-color: {{VALUE}};',
				],
				'condition'   => [
					'hover_style' => ["style_11"],
                ]
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
					'{{WRAPPER}} .bwp-recent-post .bwp-button:hover, {{WRAPPER}} .bwp-recent-post .bwp-button:focus' => 'border-color: {{VALUE}};',
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
					'{{WRAPPER}} .bwp-recent-post .bwp-button svg path' => 'fill: {{VALUE}}; color: {{VALUE}};',
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
					'{{WRAPPER}} .bwp-recent-post .bwp-button svg' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button i' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .bwp-recent-post .bwp-button .bwp-button-icon.bwp-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .bwp-recent-post .bwp-button .bwp-button-icon.bwp-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .bwp-recent-post .bwp-button .bwp-button-icon' => 'top: {{SIZE}}{{UNIT}};position: relative;',
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_image_style',
			[
				'label' => __( 'Image', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} .bwp-recent-post .post-image',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'image_margin',
			[
				'label' => __( 'Margin', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Post Content', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'content_color',
			[
				'label' => __( 'Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-content' => 'background: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border',
				'selector' => '{{WRAPPER}} .bwp-recent-post .post-inner',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'border_radius_content',
			[
				'label' => __( 'Border Radius', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'padding_content',
			[
				'label' => __( 'Padding', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'margin_content',
			[
				'label' => __( 'Margin', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'show_box_shadow',
			[
				'label' => _x( 'Show Box Shadow','wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'no' => __( 'No','wpbingo' ),
					'yes' => __( 'Yes','wpbingo' ),
				],
				'default' => 'no',
			]
		);
		$this->add_responsive_control(
			'box_shadow',
			[
				'label' => _x( 'Box Shadow','wpbingo' ),
				'type' => \Elementor\Controls_Manager::BOX_SHADOW,
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-inner' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{box_shadow_position.VALUE}};',
				],
				'separator' => 'before',
				'condition'   => [
                    'show_box_shadow' => ["yes"],
                ]
			]
		);
		$this->add_control(
			'box_shadow_position',
			[
				'label' => _x( 'Position','wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					' ' => __( 'Outline','wpbingo' ),
					'inset' => __( 'Inset','wpbingo' ),
				],
				'default' => ' ',
				'render_type' => 'ui',
				'condition'   => [
                    'show_box_shadow' => ["yes"],
                ]
			]
		);

		$this->add_control(
			'heading_title_content_slick',
			[
				'label' => __( 'Content Slick', 'wpbingo' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'margin_content_slick',
			[
				'label' => __( 'Margin', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .slick-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'padding_content_slick',
			[
				'label' => __( 'Padding', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .slick-list .slick-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		
		
		$this->add_control(
			'heading_title_content',
			[
				'label' => __( 'Content Info', 'wpbingo' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border-content_info',
				'selector' => '{{WRAPPER}} .bwp-recent-post .post-content',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'border_radius_content_info',
			[
				'label' => __( 'Border Radius', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'padding_content_info',
			[
				'label' => __( 'Padding', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'margin_content_info',
			[
				'label' => __( 'Margin', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
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
				],
				'default' => 'left',
				'selectors_dictionary' => [
					'flex-start' => 'justify-content: flex-start;',
					'flex-center' => 'justify-content: center;',
					'flex-end' => 'justify-content: flex-end;',
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .post-content .content-post' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .bwp-recent-post .post-content .content-post > div' => 'justify-content: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'slick_slider',
			[
				'label' => __( 'Slick Slider', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'padding_slick',
			[
				'label' => __( 'Padding', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .slick-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'margin_slick',
			[
				'label' => __( 'Margin', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .slick-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_navigation_style',
			[
				'label' => __( 'Navigation', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'navigation_border',
				'selector' => '{{WRAPPER}} .bwp-recent-post .slick-arrow',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'navigation_border_radius',
			[
				'label' => __( 'Border Radius', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->start_controls_tabs( 'tabs_navigation_style' );
		$this->start_controls_tab(
			'tab_navigation_normal',
			[
				'label' => __( 'Normal', 'wpbingo' ),
			]
		);

		$this->add_control(
			'navigation_text_color',
			[
				'label' => __( 'Text Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .slick-arrow' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'navigation_background',
				'label' => __( 'Background', 'wpbingo' ),
				'types' => [ 'classic', 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .bwp-recent-post .slick-arrow',
				'fields_options' => [
					'background' => [
						'default' => 'classic',
					],
					'color' => [
						'global' => [
							'default' => Global_Colors::COLOR_ACCENT,
						],
					],
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_navigation_hover',
			[
				'label' => __( 'Hover', 'wpbingo' ),
			]
		);

		$this->add_control(
			'hover_navigation_color',
			[
				'label' => __( 'Text Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .slick-arrow:hover, {{WRAPPER}} .bwp-recent-post .slick-arrow:focus' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'navigation_background_hover',
				'label' => __( 'Background', 'wpbingo' ),
				'types' => [ 'classic', 'gradient' ],
				'exclude' => [ 'image' ],
				'selector' => '{{WRAPPER}} .bwp-recent-post .slick-arrow:hover, {{WRAPPER}} .bwp-recent-post .slick-arrow:focus',
				'fields_options' => [
					'background' => [
						'default' => 'classic',
					],
				],
			]
		);

		$this->add_control(
			'navigation_hover_border_color',
			[
				'label' => __( 'Border Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .slick-arrow:hover, {{WRAPPER}} .bwp-recent-post .slick-arrow:focus' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->add_responsive_control(
			'navigation_position',
			[
				'label' => __( 'Position', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-recent-post .slick-arrow' => 'top: {{SIZE}}%;',
				],
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
				'number'   => '',
				'title1'   => '',
				'description'   => '',
				'category' => '',
				'limit'	   => 8,
				'length'	=> 25,
				'item_row' => 1,	
				'columns'  => 3,
				'columns1' => 3,
				'columns2' => 3,
				'columns3' => 1,
				'columns4' => 1,
				'show_categories'  => '1',
				'show_excerpt'  => '1',
				'show_posting_time'  => '1',
				'show_content_meta'  => '1',
				'show_nav'  => '1',
				'show_pag'  => '1',					
				'layout'   => 'default',
				'show_clipped'	=> '',
				'show_button'  => '1',
				'label' 		=> '',
				'navigational_style' => 'nav-show-hover',
				'icon_align' 	=> '',
				'hover_style' 	=> 'default',
				'show_autoplay'	=> '0',
			), $settings )
		);
		$tag_id = 'recent_post_' .rand().time(); 
		if($category){
			$args = array(
			'post_type' => 'post', 
			'posts_per_page' => $limit,
			'tax_query'		=> array(
					array(
						'taxonomy'	=> 'category',
						'field'		=> 'slug',
						'terms'		=> $category
					)
				) 
			);   
		}else{
			$args = array(
			'post_type' => 'post', 
			'posts_per_page' => $limit 
			);    
		}

		$query = new \WP_Query($args);
		$post_count = $query->post_count;
		
		if( $layout == 'default' ) {
			include(WPBINGO_ELEMENTOR_TEMPLATE_PATH.'bwp-recent-post/default.php' );
		}elseif( $layout == 'slider' ) {
			include(WPBINGO_ELEMENTOR_TEMPLATE_PATH.'bwp-recent-post/slider.php' );
		}elseif( $layout == 'blog-menu' ) {
			include(WPBINGO_ELEMENTOR_TEMPLATE_PATH.'bwp-recent-post/sidebar.php' );
		}
	}
}