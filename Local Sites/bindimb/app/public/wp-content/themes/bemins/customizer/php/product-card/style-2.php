<?php
	$wp_customize->add_section('bwp-qv_button', array(
		'title'          => 'Wpbingo Product card',
		'priority' => 3,
	));
	
	//---- button
	$wp_customize->add_setting( 'color_button_2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('color_button_2', array(
		'label'   => esc_html__('Color button','bemins'),
		'section' => 'bwp-qv_button',
		'type'    => 'color',
	));
	$wp_customize->add_setting( 'background_button_2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('background_button_2', array(
		'label'   => esc_html__('Background button','bemins'),
		'section' => 'bwp-qv_button',
		'type'    => 'color',
	));
	
	//---- button QV
	$wp_customize->add_setting( 'color_qv_button_2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_qv_button_2', array(
		'label'   => esc_html__('Color Quick View','bemins'),
		'section' => 'bwp-qv_button',
		'type'    => 'color',
	));
	$wp_customize->add_setting( 'background_qv_button_2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('background_qv_button_2', array(
		'label'   => esc_html__('Background Quick View','bemins'),
		'section' => 'bwp-qv_button',
		'type'    => 'color',
	));
	
	//---- title
	$wp_customize->add_setting( 'color_title_2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_title_2', array(
		'label'   => esc_html__('Color title','bemins'),
		'section' => 'bwp-qv_button',
		'type'    => 'color',
	));
	$wp_customize->add_setting( 'size_title_2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('size_title_2', array(
		'label'   => esc_html__('Font size title','bemins'),
		'section' => 'bwp-qv_button',
		'type'    => 'number',
	));
	
	//---- price
	$wp_customize->add_setting( 'color_price_2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_price_2', array(
		'label'   => esc_html__('Color price','bemins'),
		'section' => 'bwp-qv_button',
		'type'    => 'color',
	));
	$wp_customize->add_setting( 'color_price_sale_2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_price_sale_2', array(
		'label'   => esc_html__('Color price sale','bemins'),
		'section' => 'bwp-qv_button',
		'type'    => 'color',
	));
	$wp_customize->add_setting( 'size_price_2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('size_price_2', array(
		'label'   => esc_html__('Font size price','bemins'),
		'section' => 'bwp-qv_button',
		'type'    => 'number',
	));
	
	//---- label sale
	$wp_customize->add_setting( 'color_sale_2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_sale_2', array(
		'label'   => esc_html__('Color label sale','bemins'),
		'section' => 'bwp-qv_button',
		'type'    => 'color',
	));
	$wp_customize->add_setting( 'background_sale_2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('background_sale_2', array(
		'label'   => esc_html__('Background label sale','bemins'),
		'section' => 'bwp-qv_button',
		'type'    => 'color',
	));
	
	//---- label hot
	$wp_customize->add_setting( 'color_hot_2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_hot_2', array(
		'label'   => esc_html__('Color label hot','bemins'),
		'section' => 'bwp-qv_button',
		'type'    => 'color',
	));
	$wp_customize->add_setting( 'background_hot_2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('background_hot_2', array(
		'label'   => esc_html__('Background label hot','bemins'),
		'section' => 'bwp-qv_button',
		'type'    => 'color',
	));
	$wp_customize->add_setting( 'size_label_2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('size_label_2', array(
		'label'   => esc_html__('Font size label','bemins'),
		'section' => 'bwp-qv_button',
		'type'    => 'number',
	));
	
	//---- stock pre-order
	$wp_customize->add_setting( 'color_pre_2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('color_pre_2', array(
		'label'   => esc_html__('Color pre-order','bemins'),
		'section' => 'bwp-qv_button',
		'type'    => 'color',
	));
	$wp_customize->add_setting( 'background_pre_2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_color',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('background_pre_2', array(
		'label'   => esc_html__('Background pre-order','bemins'),
		'section' => 'bwp-qv_button',
		'type'    => 'color',
	));
	$wp_customize->add_setting( 'size_pre_2' , array(
		'default' => '',
		'sanitize_callback' => 'sanitize_input',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control('size_pre_2', array(
		'label'   => esc_html__('Font size pre','bemins'),
		'section' => 'bwp-qv_button',
		'type'    => 'number',
	));