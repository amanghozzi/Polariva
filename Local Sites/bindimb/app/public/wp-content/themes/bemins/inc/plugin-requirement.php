<?php
/***** Active Plugin ********/
add_action( 'tgmpa_register', 'bemins_register_required_plugins' );
function bemins_register_required_plugins() {
    $plugins = array(
		array(
            'name'               => esc_html__('Woocommerce', 'bemins'), 
            'slug'               => 'woocommerce', 
            'required'           => true
        ),
		array(
            'name'      		 => esc_html__('Elementor', 'bemins'),
            'slug'     			 => 'elementor',
            'required' 			 => true
        ),
		array(
            'name'               => esc_html__('Wpbingo Core', 'bemins'), 
            'slug'               => 'wpbingo', 
            'source'             => get_template_directory() . '/plugins/wpbingo.zip',
            'required'           => true, 
        ),
        array(
            'name'               => esc_html__('Revolution Slider', 'bemins'), 
            'slug'               => 'revslider', 
            'source'             => get_template_directory() . '/plugins/revslider.zip',
            'required'           => false, 
        ),		
		array(
            'name'               => esc_html__('Redux Framework', 'bemins'), 
            'slug'               => 'redux-framework', 
            'required'           => true
        ),			
		array(
            'name'      		 => esc_html__('Contact Form 7', 'bemins'),
            'slug'     			 => 'contact-form-7',
            'required' 			 => false
        ),	
		array(
            'name'     			 => esc_html__('WPC Smart Wishlist for WooCommerce', 'bemins'),
            'slug'      		 => 'woo-smart-wishlist',
            'required' 			 => false
        ),
        array(
            'name'     			 => esc_html__('WPC Smart Compare for WooCommerce', 'bemins'),
            'slug'      		 => 'woo-smart-compare',
            'required' 			 => false
        ),		
		array(
            'name'     			 => esc_html__('WooCommerce Variation Swatches', 'bemins'),
            'slug'      		 => 'variation-swatches-for-woocommerce',
            'required' 			 => false
        ),
    );
    $config = array();
    tgmpa( $plugins, $config );
}