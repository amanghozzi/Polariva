<?php
namespace ElementorWpbingo\Widgets;
use Elementor\Widget_Base;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
if ( ! defined( 'ABSPATH' ) ) exit;
class Bwp_Product_List extends Widget_Base {
	public function get_name() {
		return 'bwp_product_list';
	}
	public function get_title() {
		return __( 'Wpbingo Product List', 'wpbingo' );
	}
	public function get_icon() {
		return 'eicon-product-images';
	}	
	public function get_categories() {
		return [ 'wpbingo' ];
	}
	protected function register_controls() {
		$terms = get_terms( 'product_cat', array( 'hide_empty' => false ) );
		$term = array( '' => __( 'All Categories', "wpbingo" ) );
		foreach( $terms as $cat ){
			$term[$cat->slug] = $cat -> name;
		}	
		$number = array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7);
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
			'description',
			[
				'label' => __( 'Description', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
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
				'options' => $term			
			]
		);
		$this->add_control(
			'source',
			[
				'label' => __( 'Source Product', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => array( 'default' => 'Default', 'featured' => 'Featured Product ', 'sale' => 'Sale Product', 'toprating' => 'Top Rating', 'bestsales' => 'Best Sales', 'childcat' => 'Child Category')			
			]
		);
		$this->add_control(
			'orderby',
			[
				'label' => __( 'Order By', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array('name' => 'Name', 'author' => 'Author', 'date' => 'Date', 'title' => 'Title', 'modified' => 'Modified', 'parent' => 'Parent', 'ID' => 'ID', 'rand' =>'Random', 'comment_count' => 'Comment Count')
			]
		);
		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'DESC'  => __( 'Descending', 'wpbingo' ),
					'ASC' => __( 'No', 'Ascending' ),
				],
				'default' => 'ASC'
			]
		);
		$this->add_control(
			'numberposts',
			[
				'label' => __( 'Number Of Products', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '5',
				'placeholder' => __( 'Number Of Products', 'wpbingo' ),
			]
		);	
		$this->add_control(
			'item_row',
			[
				'label' => __( 'Number row per column', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5),
				'default' => 1,
				'condition'   => [
                    'layout' => ["slider","sidebar"],
                ]
			]
		);
		$this->add_control(
			'columns',
			[
				'label' => __( 'Number of Columns >1440px', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => $number,
				'default' => 1
			]
		);
		$this->add_control(
			'columns1440',
			[
				'label' => __( 'Number of Columns 1200px to 1440px', 'wpbingo' ),
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
			'style_product',
			[
				'label' => __( 'Style content product', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5),
				'default' => 1
			]
		);
		$this->add_control(
			'time_deal',
			[
				'label' => __( 'Time Coundown', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __( 'Ex : 2023-5-5', 'wpbingo' ),
				'condition'   => [
                    'layout' => ['list-deal'],
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
                    'layout' => ["slider","sidebar","list-deal"],
                ]
			]
		);
		$this->add_control(
			'show_pag',
			[
				'label' => __( 'Show Pagination', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'true'  => __( 'Yes', 'wpbingo' ),
					'false' => __( 'No', 'wpbingo' ),
				],
				'default' => 'false',
				'condition'   => [
                    'layout' => ["slider","sidebar","list-deal"],
                ]
			]
		);
		$this->add_control(
			'show_nav',
			[
				'label' => __( 'Show Navigation', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'true'  => __( 'Yes', 'wpbingo' ),
					'false' => __( 'No', 'wpbingo' ),
				],
				'default' => 'true',
				'condition'   => [
                    'layout' => ["slider","sidebar","list-deal"],
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
                    'show_nav' => ['true'],
					'layout' => ["slider","sidebar","list-deal"],
                ]
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'label_list',
			[		
				'label' => __( 'label', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __( 'Type your text here', 'wpbingo' ),
			]
		);
		$repeater->add_control(
			'link_list',
			[
				'label' => __( 'Link', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '#',
				'placeholder' => __( 'Type your link here', 'wpbingo' ),
				'condition'   => [
                    'show_active' => ["0"],
                ]
			]
		);
		$repeater->add_control(
			'show_active',
			[
				'label' => __( 'Show Active', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1'  => __( 'Yes', 'wpbingo' ),
					'0' => __( 'No', 'wpbingo' ),
				],
				'default' => '0',			
			]
		);		
        $this->add_control('list_tab',
            [
                'label'  => esc_html__('List Link', 'wpbingo'),
                'type'   => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
				'condition'   => [
                    'layout' => ["list-link"],
                ]
            ]
        );		
		$this->add_control(
			'layout',
			[
				'label' => __( 'Layout', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' 		=> __( 'Default', 'wpbingo' ),
					'slider'  		=> __( 'Slider', 'wpbingo' ),
					'sidebar'  		=> __( 'Sidebar', 'wpbingo' )
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
					'{{WRAPPER}} .bwp_product_list .title-block h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .bwp_product_list .title-block h2',
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
					'{{WRAPPER}} .bwp_product_list .title-block h2' => 'margin-bottom: {{SIZE}}{{UNIT}};margin-top:0;',
				],
			]
		);
		$this->add_responsive_control(
			'align_title',
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
					'{{WRAPPER}} .bwp_product_list .title-block' => 'text-align: {{VALUE}};',
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
					'{{WRAPPER}} .bwp_product_list .description' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .bwp_product_list .description',
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
					'{{WRAPPER}} .bwp_product_list .description' => 'margin-bottom: {{SIZE}}{{UNIT}};margin-top:0;',
				],
			]
		);
		$this->add_responsive_control(
			'align_description',
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
					'{{WRAPPER}} .bwp_product_list .description' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_products_image_style',
			[
				'label' => __( 'Products Image', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_image',
				'selector' => '{{WRAPPER}} .bwp_product_list .products-list.grid .product-wapper .products-thumb',
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'products_image_space',
			[
				'label' => __( 'Image spacing', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bwp_product_list .products-list.grid .product-wapper .products-thumb' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_products_item_style',
			[
				'label' => __( 'Products Item', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .bwp_product_list .products-list.grid .product-wapper',
				'separator' => 'before',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_products_content_style',
			[
				'label' => __( 'Products Info', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'align_info',
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
					'{{WRAPPER}} .bwp_product_list .products-content' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .bwp_product_list .product-wapper .product-attribute' => 'justify-content: {{VALUE}};',
					'{{WRAPPER}} .bwp_product_list .products-content .price' => 'justify-content: {{VALUE}};',
				],
			]
		);	
		$this->add_responsive_control(
			'margin_content',
			[
				'label' => __( 'Margin', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .products-list.grid .product-wapper .products-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'padding_content',
			[
				'label' => __( 'Padding', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .products-list.grid .product-wapper .products-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_products_spacing_style',
			[
				'label' => __( 'Products Spacing', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'margin_products',
			[
				'label' => __( 'Margin', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp_product_list .slick-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .bwp_product_list .row' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'padding_products',
			[
				'label' => __( 'Padding', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp_product_list .slick-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .bwp_product_list .row .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'products_bottom_space',
			[
				'label' => __( 'Bottom spacing', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bwp_product_list .products-list.grid .product-wapper' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
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
				'selector' => '{{WRAPPER}} .bwp_product_list .slick-arrow',
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
					'{{WRAPPER}} .bwp_product_list .slick-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .bwp_product_list .slick-arrow' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'navigation_text_color',
			[
				'label' => __( 'Text Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .bwp_product_list .slick-arrow' => 'fill: {{VALUE}}; color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .bwp_product_list .slick-arrow',
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
					'{{WRAPPER}} .bwp_product_list .slick-arrow:hover, {{WRAPPER}} .bwp_product_list .slick-arrow:focus' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .bwp_product_list .slick-arrow:hover, {{WRAPPER}} .bwp_product_list .slick-arrow:focus',
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
					'{{WRAPPER}} .bwp_product_list .slick-arrow:hover, {{WRAPPER}} .bwp_product_list .slick-arrow:focus' => 'border-color: {{VALUE}};',
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
					'{{WRAPPER}} .bwp_product_list .slick-arrow' => 'top: {{SIZE}}%;',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_pagination_style',
			[
				'label' => __( 'Pagination', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'pagination_position',
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
					'{{WRAPPER}} .bwp_product_list ul.slick-dots' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		extract( shortcode_atts(
			array(
				'title1' => '',
				'description' => '',
				'label_button' => '',	
				'link_button' => '#',	
				'orderby' => '',
				'order'	=> '',
				'category' => '',
				'numberposts' => 5,
				'length' => 25,
				'item_row'=> 1,
				'columns' => 4,
				'columns1440' => 4,
				'columns1' => 4,
				'columns2' => 3,
				'columns3' => 2,
				'columns4' => 1,
				'style_product' => 1,
				'time_deal' => '',
				'show_autoplay'	=> '0',
				'show_nav'	=> 'true',
				'navigational_style' => 'nav-show-hover',
				'show_pag'	=> '0',
				'show_clipped'	=> '',
				'source'  => 'default',
				'link' => '#',					
				'layout'  => 'default',
			), $settings )
		);
		switch ($source) {
		case 'default':
			$default = array();
			if( $category){
				$default = array(
					'post_type' => 'product',
					'tax_query' => array(
					array(
						'taxonomy'  => 'product_cat',
						'field'     => 'slug',
						'terms'     => $category ) ),
					'orderby' => $orderby,
					'order' => $order,
					'post_status' => 'publish',
					'showposts' => $numberposts
				);
			}else{
				$default = array(
					'post_type' => 'product',		
					'orderby' => $orderby,
					'order' => $order,
					'post_status' => 'publish',
					'showposts' => $numberposts
				);
			}
			$widget_id = 'bwp_default_'.rand().time();
			$widget_class = 'bwp_list_default';
			$list = new \WP_Query( $default );
			break;
		case 'featured':
			$product_visibility_term_ids = wc_get_product_visibility_term_ids();
			if( $category){
				$default = array(
					'post_type'				=> 'product',
					'post_status' 			=> 'publish',
					'tax_query'	=> array(
						array(
							'taxonomy'	=> 'product_cat',
							'field'		=> 'slug',
							'terms'		=> $category
						),
						array(
							'taxonomy' => 'product_visibility',
							'field'    => 'term_taxonomy_id',
							'terms'    => $product_visibility_term_ids['featured'],
						)						
					),
					'ignore_sticky_posts'	=> 1,
					'posts_per_page' 		=> $numberposts,
					'orderby' 				=> $orderby,
					'order' 				=> $order
				);
			}else{
				$default = array(
					'post_type'				=> 'product',
					'post_status' 			=> 'publish',
					'ignore_sticky_posts'	=> 1,
					'posts_per_page' 		=> $numberposts,
					'orderby' 				=> $orderby,
					'order' 				=> $order,
					'tax_query'	=> array(
						array(
							'taxonomy' => 'product_visibility',
							'field'    => 'term_taxonomy_id',
							'terms'    => $product_visibility_term_ids['featured'],
						)						
					)
				);
			}
			$widget_id = 'bwp_featured_'.rand().time();
			$widget_class = 'bwp_list_featured';
			$list = new \WP_Query( $default );
			break;
		case 'toprating':
			if( $category){
			$default = array(
				'post_type'		=> 'product',
				'tax_query' => array(
					array(
						'taxonomy'	=> 'product_cat',
						'field'		=> 'slug',
						'terms'		=> $category,
						'operator' 	=> 'IN'
					)
				),
				'post_status' 	=> 'publish',
				'no_found_rows' => 1,					
				'showposts' 	=> $numberposts						
			);
			}else{
				$default = array(
					'post_type'		=> 'product',		
					'post_status' 	=> 'publish',
					'no_found_rows' => 1,					
					'showposts' 	=> $numberposts						
				);
			}
			$default['meta_query'] = WC()->query->get_meta_query();
			add_filter( 'posts_clauses', 'order_by_rating_post_clauses' );
			$widget_id = 'bwp_toprated_'.rand().time();
			$widget_class = 'bwp_list_toprated';
			$list = new \WP_Query( $default );
			break;
		case 'sale':
			$product_ids_on_sale    = wc_get_product_ids_on_sale();
			$product_ids_on_sale[]  = 0;
			if( $category){
				$default = array(
					'post_type' 			=> 'product',
					'tax_query' => array(
						array(
							'taxonomy'	=> 'product_cat',
							'field'	=> 'slug',
							'terms'	=> $category,
							'operator' => 'IN'
						)
					),
					'post__in' 				=> $product_ids_on_sale,		
					'post_status' 			=> 'publish',
					'ignore_sticky_posts'   => 1,
					'showposts'				=> $numberposts
				);
			}else{
				$default = array(
					'post_type' 			=> 'product',		
					'post_status' 			=> 'publish',
					'ignore_sticky_posts'   => 1,
					'showposts'				=> $numberposts,
					'post__in' 				=> $product_ids_on_sale
				);
			}
			$widget_id = 'bwp_sale_product_'.rand().time();
			$widget_class = 'bwp_sale_product';
			$list = new \WP_Query( $default );
			break;	
		case 'bestsales':
			if( $category){
				$default = array(
					'post_type' 			=> 'product',
					'tax_query' => array(
						array(
							'taxonomy'	=> 'product_cat',
							'field'	=> 'slug',
							'terms'	=> $category,
							'operator' => 'IN'
						)
					),
					'post_status' 			=> 'publish',
					'ignore_sticky_posts'   => 1,
					'paged'	=> 1,
					'showposts'				=> $numberposts,
					'meta_key' 		 		=> 'total_sales',
					'orderby' 		 		=> 'meta_value_num'
				);
			}else{
				$default = array(
					'post_type' 			=> 'product',		
					'post_status' 			=> 'publish',
					'ignore_sticky_posts'   => 1,
					'showposts'				=> $numberposts,
					'meta_key' 		 		=> 'total_sales',
					'orderby' 		 		=> 'meta_value_num'
				);
			}
			$widget_id = 'bwp_bestsales_'.rand().time();
			$widget_class = 'bwp_list_bestsales';
			$list = new \WP_Query( $default );
			break;
			case 'childcat':
			$default = array();
			$default = array(
				'post_type' => 'product',
				'tax_query' => array(
				array(
					'taxonomy'  => 'product_cat',
					'field'     => 'slug',
					'terms'     => $category ) ),
				'orderby' => $orderby,
				'order' => $order,
				'post_status' => 'publish',
				'showposts' => $numberposts
			);
			$term = get_term_by( 'slug', $category, 'product_cat' );
			$widget_id = 'bwp_childcat_'.rand().time();	
			$list = new \WP_Query( $default );				
			break;
		}
		if( $layout == 'default' ){
			include( WPBINGO_ELEMENTOR_TEMPLATE_PATH.'bwp-product-list/default.php' );				
		}elseif( $layout == 'slider' || $layout == 'sidebar' ){
			include( WPBINGO_ELEMENTOR_TEMPLATE_PATH.'bwp-product-list/slider.php' );			
		}elseif( $layout == 'load_more' ){
			$args_count 	= 	$default;	
			$args_count['showposts'] 	= 	-1;
			$wp_query_count = new \WP_Query($args_count);	
			$total = $wp_query_count->post_count;
			include( WPBINGO_ELEMENTOR_TEMPLATE_PATH.'bwp-product-list/loadmore.php' );
		}	
	}
}