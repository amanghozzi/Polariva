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
if ( ! defined( 'ABSPATH' ) ) exit;
class Bwp_Filter_Homepage extends Widget_Base {
	public function get_name() {
		return 'bwp_filter_homepage';
	}
	public function get_title() {
		return __( 'Wpbingo Filter Homepage', 'wpbingo' );
	}
	public function get_icon() {
		return 'eicon-products';
	}	
	public function get_categories() {
		return [ 'wpbingo' ];
	}
	protected function register_controls() {
		$terms = get_terms( 'product_cat', array( 'hide_empty' => false ) );
		$term = array( 'all' => __( 'All Categories', "wpbingo" ) );
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
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '',
				'placeholder' => __( 'Type your Description here', 'wpbingo' ),
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
				'options' => array('1' => 1, '2' => 2, '3' => 3),
				'default' => 1,
					
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
                    'layout' => ["tab_category_slider","tab_product_slider","tab_product_slider_dividers"],
                ]				
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
                    'layout' => ["tab_category_slider","tab_product_slider","tab_product_slider_dividers"],
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
					'layout' => ["tab_category_slider","tab_product_slider","tab_product_slider_dividers"],
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
                    'layout' => ["tab_category_slider","tab_product_slider","tab_product_slider_dividers"],
                ]				
			]
		);
		$this->add_control(
			'select_order',
			[
				'label' => __( 'Order Product', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => array('date' => 'Latest', 'rating' => 'Top Rating', 'popularity' => 'Best Selling', 'featured' => 'Featured'),
				'default' => 'date',
				'condition'   => [
                    'layout' => ["tab_category_default","tab_category_slider"],
                ]				
			]
		);
		$this->add_control(
			'category',
			[
				'label' => __( 'Select Categories', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => $term,
				'default' => array(),
				'condition'   => [
                    'layout' => ["default","loadmore","slider","tab_category_default","tab_category_slider"],
                ]				
			]
		);		
		$this->add_control(
			'select_category',
			[
				'label' => __( 'Category', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $term,
				'default' => '',
				'condition'   => [
                    'layout' => ["tab_product_default","tab_product_slider","tab_product_slider_dividers","tab_product_loadmore"],
                ]				
			]
		);
		$this->add_control(
			'checkbox_order',
			[
				'label' => __( 'Order Product', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => array('date' => 'Latest', 'rating' => 'Top Rating', 'popularity' => 'Best Selling', 'featured' => 'Featured'),
				'default' => array(),
				'condition'   => [
                    'layout' => ["tab_product_default","tab_product_slider","tab_product_slider_dividers","tab_product_loadmore","loadmore"],
                ]				
			]
		);
		$this->add_responsive_control(
			'position',
			[
				'label' => esc_html__( 'Title Position', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'mobile_default' => 'top',
				'default' => 'left',
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'wpbingo' ),
						'icon' => 'eicon-h-align-left',
					],
					'top' => [
						'title' => esc_html__( 'Top', 'wpbingo' ),
						'icon' => 'eicon-v-align-top',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'wpbingo' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'selectors_dictionary' => [
					'left' => '',
					'top' => 'display: block;text-align: center;',
					'right' => 'flex-direction: row-reverse;',
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-filter-homepage .bwp-filter-heading' => '{{VALUE}};',
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
					'default' 				=> __( 'Default', 'wpbingo' ),
					'tab_category_default'  => __( 'Tab Category Default', 'wpbingo' ),
					'tab_category_slider'  	=> __( 'Tab Category Slider', 'wpbingo' ),
					'tab_product_default'  	=> __( 'Tab Product Default', 'wpbingo' ),
					'tab_product_slider'  	=> __( 'Tab Product Slider', 'wpbingo' ),
					'tab_product_slider_dividers'  	=> __( 'Tab Product Slider Dividers', 'wpbingo' ),
					'tab_product_loadmore'  => __( 'Tab Product Loadmore', 'wpbingo' )
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
					'{{WRAPPER}} .bwp-filter-homepage .title-block h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .bwp-filter-homepage .title-block h2',
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
					'{{WRAPPER}} .bwp-filter-homepage .title-block h2' => 'margin-bottom: {{SIZE}}{{UNIT}};margin-top:0;',
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
					'{{WRAPPER}} .bwp-filter-homepage .description' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .bwp-filter-homepage .description',
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
					'{{WRAPPER}} .bwp-filter-homepage .description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_tabs_style',
			[
				'label' => __( 'Title Tabs', 'wpbingo' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'tabs_title_style' );
		$this->start_controls_tab(
			'tab_title_normal',
			[
				'label' => __( 'Normal', 'wpbingo' ),
			]
		);
		$this->add_control(
			'title_tabs_color',
			[
				'label' => __( 'Title Tabs Color', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-filter-homepage .bwp-filter-heading ul li span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'border_active_title_tab',
			[
				'label' => __( 'Border Color Title Active', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-filter-homepage .bwp-filter-heading ul li.active:after' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_title_hover',
			[
				'label' => __( 'Hover', 'wpbingo' ),
			]
		);
		$this->add_control(
			'hover_color',
			[
				'label' => __( 'Title Tabs Color Hover', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .bwp-filter-homepage .bwp-filter-heading ul li span:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'border_active_title_tab_hover',
			[
				'label' => __( 'Border Color Title Active Hover', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-filter-homepage .bwp-filter-heading ul li:hover:after' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_control(
			'title_tabs_color_active',
			[
				'label' => __( 'Title Tabs Color Active', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-filter-homepage .bwp-filter-heading ul li.active span' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_tabs_typography',
				'selector' => '{{WRAPPER}} .bwp-filter-homepage .bwp-filter-heading ul li span',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);
		$this->add_control(
			'font_custom_title_tabs',
			[
				'label' => _x( 'Use custom fonts','wpbingo' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'elementor' ),
				'label_off' => esc_html__( 'Off', 'elementor' ),
				'default' => '',
			]
		);
		$this->add_control(
			'input_font_custom_title_tabs',
			[
				'label' => __( 'Enter your font name', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __( 'Enter your font name here', 'wpbingo' ),
				'selectors' => [
					'{{WRAPPER}} .bwp-filter-homepage .bwp-filter-heading ul li span' => 'font-family: {{VALUE}};',
				],
				'condition'   => [
                    'font_custom_title_tabs!' => '',
                ]
			]
		);
		$this->add_control(
			'show_dividers',
			[
				'label' => __( 'Show Dividers', 'wpbingo' ),
				'type' => Controls_Manager::SWITCHER,
				'options' => [
					'1'  => __( 'Yes', 'wpbingo' ),
					'0' => __( 'No', 'wpbingo' ),
				],
				'default' => '1',				
			]
		);
		$this->add_responsive_control(
			'title_tabs_padding',
			[
				'label' => __( 'Padding', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-filter-homepage .bwp-filter-heading ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'title_tabs_margin',
			[
				'label' => __( 'Margin', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bwp-filter-homepage .bwp-filter-heading ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'title_tabs_bottom_space',
			[
				'label' => __( 'Spacing Title Tabs', 'wpbingo' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bwp-filter-homepage .bwp-filter-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};margin-top:0;',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_products_content_style',
			[
				'label' => __( 'Products Content', 'wpbingo' ),
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
					'{{WRAPPER}} .bwp-filter-homepage .products-content' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .bwp-filter-homepage .product-wapper .product-attribute' => 'justify-content: {{VALUE}};',
					'{{WRAPPER}} .bwp-filter-homepage .products-content .price' => 'justify-content: {{VALUE}};',
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
					'{{WRAPPER}} .bwp-filter-homepage .slick-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .bwp-filter-homepage .row' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .bwp-filter-homepage .slick-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .bwp-filter-homepage .row .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .bwp-filter-homepage .products-list.grid .product-wapper' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
		$editor_content = $this->get_settings_for_display( 'description' );
		$editor_content = $this->parse_text_editor( $editor_content );
		extract( shortcode_atts(
			array(
				'title1' => '',
				'description'	=> '',
				'category' => '',
				'select_category' => 'all',
				'numberposts' => 8,
				'columns1440' => 5,
				'columns' => 4,
				'columns1' => 4,
				'columns2' => 3,
				'columns3' => 2,
				'columns4' => 1,
				'style_product' => 1,
				'show_clipped'	=> '1',
				'show_nav'	=> '0',
				'show_pag'	=> '1',
				'select_order' => 'date',
				'checkbox_order' => '',
				'item_row'	=> 1,
				'layout'  => 'default',
				'show_dividers'	=> '1',
				'navigational_style' => 'nav-show-hover',
				'position'	=> '',
			), $settings )
		);
		if( $layout == 'default' ){
			include(WPBINGO_ELEMENTOR_TEMPLATE_PATH.'bwp-filter-homepage/default.php' );
		}elseif( $layout == 'tab_category_default' ){
			include(WPBINGO_ELEMENTOR_TEMPLATE_PATH.'bwp-filter-homepage/tab-category/default.php' );
		}elseif( $layout == 'tab_category_slider' ){
			include(WPBINGO_ELEMENTOR_TEMPLATE_PATH.'bwp-filter-homepage/tab-category/slider.php' );
		}elseif( $layout == 'tab_product_default' ){
			include(WPBINGO_ELEMENTOR_TEMPLATE_PATH.'bwp-filter-homepage/tab-product/default.php' );
		}elseif( $layout == 'tab_product_slider' || $layout == 'tab_product_slider_dividers' ){
			include(WPBINGO_ELEMENTOR_TEMPLATE_PATH.'bwp-filter-homepage/tab-product/slider.php' );
		}elseif( $layout == 'tab_product_loadmore' ){
			include(WPBINGO_ELEMENTOR_TEMPLATE_PATH.'bwp-filter-homepage/tab-product/loadmore.php' );
		}	
	}
	function woocommerce_filter_homepage_price($default_min_price,$default_max_price){	 
		$currency_symbol = get_woocommerce_currency_symbol();
		echo '
		<div class="bwp-filter-price">
		    <h2>'.esc_html__('Choose Price','wpbingo').'</h2>
			<div class="bwp_slider_price" data-min="'.$default_min_price.'" data-max="'.$default_max_price.'"></div>
			<div class="price-input">
				<span>'.esc_html__('Range : ','wpbingo').'</span>
				'.$currency_symbol.'<span class="text-price-filter text-price-filter-min-text">'.$default_min_price.'</span> -
				'.$currency_symbol.'<span class="text-price-filter text-price-filter-max-text">'.$default_max_price.'</span>	
				<input class="price-filter-min-text hidden"  type="text" value="'.$default_min_price.'">
				<input class="price-filter-max-text hidden"  type="text" value="'.$default_max_price.'">
			</div>
		</div>';
	}	
	function woocommerce_filter_homepage_atribute(){
		$attribute_taxonomies = wc_get_attribute_taxonomies();	
		foreach( $attribute_taxonomies as $att ){
			$taxonomy   = 	wc_attribute_taxonomy_name( $att->attribute_name );
			$orderby 	=	$att->attribute_orderby;
			if($orderby ){
				switch ( $orderby ) {
					case 'name' :
						$get_terms_args['orderby']    = 'name';
						$get_terms_args['menu_order'] = false;
					break;
					case 'id' :
						$get_terms_args['orderby']    = 'id';
						$get_terms_args['order']      = 'ASC';
						$get_terms_args['menu_order'] = false;
					break;
					case 'menu_order' :
						$get_terms_args['menu_order'] = 'ASC';
					break;
				}
			}else{
				$get_terms_args    = array();
			}
			$tax_query = array();
			$get_terms_args['tax_query'] = $tax_query;
			$terms = get_terms( $taxonomy, $get_terms_args );
			if(count($terms)>0):?>
			<div class="bwp-filter-<?php echo esc_attr($att->attribute_name);?>">
				<h2><?php echo esc_html__('Choose ','wpbingo'); ?><?php echo ucfirst( $att->attribute_name ); ?></h2>
				<?php 								
					if(isset($att->attribute_type) && $att->attribute_type == "color"){?>	
						<ul class="<?php echo esc_attr( 'pa_'.$att->attribute_name ); ?>">
							<?php			
								foreach( $terms as $term ){
										$color = get_term_meta( $term->term_id, 'color', true ); 
										echo '<li data-value="'. esc_attr( $term -> slug ) .'">';
												echo '<span class="color" style="background-color:'.esc_attr($color).';"></span>';
												echo '<span>'. esc_html( $term->name ) .'</span>';
										echo '</li> ';
								} ?>
						</ul>						
					<?php }else{?>
						<ul class="<?php echo esc_attr( 'pa_'.$att->attribute_name ); ?>">
							<?php			
								foreach( $terms as $term ){
										echo '<li data-value="'. esc_attr( $term -> slug ) .'">';
												echo '<span>'. esc_html( $term->name ) .'</span>';
										echo '</li> ';
								} ?>
						</ul>
				<?php } ?>
			</div>
			<?php endif;
		}		
	}	
}