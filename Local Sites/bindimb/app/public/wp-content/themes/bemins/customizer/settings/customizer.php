<?php
$args_product = get_posts(array(
	'post_type' => 'product',
	'posts_per_page' => -1,
	'post_status' => 'publish'
));
add_action('customize_register', 'bemins_color_customizer');
add_action('customize_register', 'bemins_typo_customizer');
add_action('customize_register', 'bemins_header_customizer');
add_action('customize_register', 'bemins_mobile_customizer');
if($args_product){
	add_action('customize_register', 'bemins_product_card_customizer');
	add_action('customize_register', 'bemins_product_single_customizer');
}
function bemins_color_customizer($wp_customize){
	include( get_template_directory() . '/customizer/php/style/color.php' );
}
function bemins_typo_customizer($wp_customize){
	include( get_template_directory() . '/customizer/php/style/typo.php' );
}
function bemins_header_customizer($wp_customize){
	///////////////HEADER
	$wp_customize->add_panel( 'header_settings_section' , array(
		'title'          => 'Wpbingo Header',
		'priority' => 2,
	));
	include( get_template_directory() . '/customizer/php/header/header-1.php' );
	include( get_template_directory() . '/customizer/php/header/header-2.php' );
	include( get_template_directory() . '/customizer/php/header/header-3.php' );
	include( get_template_directory() . '/customizer/php/header/header-4.php' );
	include( get_template_directory() . '/customizer/php/header/header-5.php' );
	include( get_template_directory() . '/customizer/php/header/header-campar.php' );
	include( get_template_directory() . '/customizer/php/header/header-mobile.php' );
}
function bemins_product_card_customizer($wp_customize){
	$bemins_settings = bemins_global_settings();
	$layout_shop = bemins_get_config('layout_shop','1');
	if ($layout_shop == '1') {
		include( get_template_directory() . '/customizer/php/product-card/style-1.php' );
	}
	if ($layout_shop == '2') {
		include( get_template_directory() . '/customizer/php/product-card/style-2.php' );
	}
	if ($layout_shop == '3') {
		include( get_template_directory() . '/customizer/php/product-card/style-3.php' );
	}
	if ($layout_shop == '4') {
		include( get_template_directory() . '/customizer/php/product-card/style-4.php' );
	}
	if ($layout_shop == '5') {
		include( get_template_directory() . '/customizer/php/product-card/style-5.php' );
	}
}
function bemins_product_single_customizer($wp_customize){
	$bemins_settings = bemins_global_settings();
	$layout_thumbs = bemins_get_config('layout-thumbs','scroll');
	$wp_customize->add_panel( 'main_single_section' , array(
		'title'          => 'Wpbingo Product Single',
		'priority' => 4,
	));
	include( get_template_directory() . '/customizer/php/product-single/scroll.php' );
}
function get_custom_google_fonts() {
	update_option( 'google_font_api_key', 'AIzaSyCPdZqkQoMWMNTwdf7oDjN6sh1lwaqeJ20' );
	$api_key = get_option( 'google_font_api_key' );
    $url = 'https://www.googleapis.com/webfonts/v1/webfonts?key='.$api_key;
    $response = wp_remote_get( $url );
    $body = wp_remote_retrieve_body( $response );
    $fonts = json_decode( $body, true );
    return $fonts['items'];
}
function sanitize_color( $color ) {
    return sanitize_hex_color( $color );
}
function sanitize_input( $input ) {
	$output = sanitize_text_field($input);
    return $output;
}
function sanitize_html($input) {
	$output = wp_kses_post($input);
    return $output;
}
function bemins_customizer_scripts() {
	wp_enqueue_script( 'bemins-header', get_template_directory_uri() . '/customizer/js/customizer-preview-header.js', array( 'jquery', 'customize-preview' ), '1.0.0', true );
	wp_enqueue_script( 'bemins-card', get_template_directory_uri() . '/customizer/js/customizer-preview-card.js', array( 'jquery', 'customize-preview' ), '1.0.0', true );
	wp_enqueue_script( 'bemins-single', get_template_directory_uri() . '/customizer/js/customizer-preview-single.js', array( 'jquery', 'customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'bemins_customizer_scripts' );
function customizer_setting() { 
	global $args_product;
	$url = '';
	if($args_product){
		$random_product = $args_product[array_rand($args_product)];
		$product_id = $random_product->ID;
		$url = get_permalink($product_id); 
	} ?>
	<script type="text/javascript">
		var shopUrl 	= '<?php echo esc_js( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>';
		var homeUrl 	= '<?php echo esc_js( home_url() ); ?>';
		var productUrl 	= '<?php echo esc_url($url) ; ?>';
	</script>
    <?php wp_enqueue_script( 'customizer-setting', get_template_directory_uri().'/customizer/js/customizer-setting.js', array( 'jquery' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'customizer_setting' );
