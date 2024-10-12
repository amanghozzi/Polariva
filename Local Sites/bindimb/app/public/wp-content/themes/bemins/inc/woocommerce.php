<?php
add_action( 'init', 'bemins_button_product' );
add_action( 'woocommerce_before_single_product', 'bemins_woocommerce_single_product_summary' );
remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
add_action( 'woocommerce_after_subcategory', 'bemins_woocommerce_template_loop_category_title', 10 );
add_action( 'woocommerce_after_subcategory_only', 'bemins_woocommerce_template_loop_only_category_title', 10 );
remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
add_action( 'woocommerce_before_subcategory_title', 'bemins_woocommerce_subcategory_thumbnail', 10 );
add_filter( 'bemins_custom_category', 'bemins_woocommerce_maybe_show_product_subcategories' );
add_filter( 'woocommerce_add_to_cart_redirect','bemins_quick_buy_redirect');
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display');
add_filter('woocommerce_placeholder_img_src', 'bemins_woocommerce_placeholder_img_src');
add_filter( 'woosw_button_position_single', '__return_false' );
add_filter( 'woosw_button_position_archive', '__return_false' );
add_filter( 'woosc_button_position_single', '__return_false' );
add_filter( 'woosc_button_position_archive', '__return_false' );
function bemins_quick_buy_redirect( $url_redirect ) {
	if ( ! isset( $_REQUEST['quick_buy'] ) || $_REQUEST['quick_buy'] == false ) {
		return $url_redirect;
	}
	return wc_get_checkout_url();
}
function bemins_woocommerce_placeholder_img_src( $src ){
	$src = get_template_directory_uri().'/images/placeholder.jpg';
	return $src;
}
function bemins_button_product(){
	$bemins_settings = bemins_global_settings();
	//Button List Product
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	//Cart
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
		remove_action('woocommerce_after_shop_loop_item', 'bemins_woocommerce_template_loop_add_to_cart', 15 );
	//Quickview
		add_action('woocommerce_after_shop_loop_item', 'bemins_quickview', 18 );	
	//Whishlist
		add_action('woocommerce_after_shop_loop_item', 'bemins_add_loop_wishlist_link', 20 );
	//Compare
		add_action('woocommerce_after_shop_loop_item', 'bemins_add_loop_compare_link', 25 );
	/* Remove sold by in product loops */
	if(class_exists("WCV_Vendors")){
		remove_action( 'woocommerce_after_shop_loop_item', array('WCV_Vendor_Shop', 'template_loop_sold_by'), 9);
		add_action('woocommerce_after_shop_loop_item_title', array('WCV_Vendor_Shop', 'template_loop_sold_by'), 5 );
	}
	//Attribute
	if( function_exists("bwp_display_woocommerce_attribute") && isset($bemins_settings['product-attribute']) && $bemins_settings['product-attribute'] ){
		add_action('woocommerce_after_shop_loop_item_title', 'bwp_display_woocommerce_attribute', 20 );
	}
	add_action('woocommerce_before_shop_loop_item_title', 'bemins_add_countdownt_item', 15 );
	/* Remove result count in product shop */
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
}
function bemins_woocommerce_single_product_summary(){
	global $product;
	$product_short_desc = bemins_get_config('product-short-desc',true);
	if(get_theme_mod('single_scroll_order', '')){
		$single_scroll_order = explode("-", get_theme_mod('single_scroll_order', ''));
	}else{
		$single_scroll_order = explode("-","title-rating-price-countview-description-countdown-stock-addtocart-imagecheckout-delivers-infomation-social_share");
	}
	remove_action( 'woocommerce_single_product_summary', 'bemins_get_brands', 5 );
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash');
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 5 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	add_action( 'woocommerce_after_single_product', 'bemins_prev_next_product', 0 );
	foreach ($single_scroll_order as $value) { 
		switch ($value) {
		case 'title':
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 0 );
		break;
		case 'brand':
			add_action( 'woocommerce_single_product_summary', 'bemins_get_brands', 0 );
		break;
		case 'rating':
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 0 );
		break;
		case 'price':
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 0 );
		break;
		case 'countview':
			add_action( 'woocommerce_single_product_summary', 'bemins_count_view', 0 );
		break;
		case 'description':
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 0 );
		break;
		case 'countdown':
			add_action( 'woocommerce_single_product_summary', 'bemins_get_countdown', 0 );
		break;
		case 'stock':
			add_action( 'woocommerce_single_product_summary', 'bemins_label_stock', 0 );
		break;
		case 'addtocart':
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 0 );
		break;
		case 'imagecheckout':
			add_action( 'woocommerce_single_product_summary', 'bemins_safe_checkout', 0 );
		break;
		case 'delivers':
			add_action( 'woocommerce_single_product_summary', 'bemins_shipping_delivers', 0 );
		break;
		case 'infomation':
			if(get_theme_mod('scroll_infomation_meta', true)){ add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 0 ); }
		break;
		case 'social_share':
			add_action( 'woocommerce_single_product_summary', 'bemins_add_social', 0 );
		break; default:
		}
	}
	add_action( 'woocommerce_single_product_summary', 'bemins_sticky_cart', 0 );
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash');
	add_action( 'woocommerce_after_add_to_cart_button', 'bemins_add_loop_wishlist_link', 15 );
	add_action( 'woocommerce_after_add_to_cart_button', 'bemins_add_loop_compare_link', 15 );
	add_action( 'woocommerce_after_single_product_summary', 'bemins_recent_view_products', 25 );
	add_action( 'woocommerce_after_add_to_cart_button', 'bemins_product_quick_buy_button', 35 );
}
function bemins_recent_view_products() {
	wc_get_template( 'single-product/recent-view.php' );
}
//End Contact Single Product //
if ( ! function_exists( 'bemins_count_view' ) ) {
	function bemins_count_view() {
		global $product;
		$show_count_view = bemins_get_config('product-count-view',false);
		if( $show_count_view ){
			$min = bemins_get_config('min-count-view',30);
			$max = bemins_get_config('max-count-view',40);
			$timeout = bemins_get_config('timeout-count-view',10000);
			$html = '';
			$html .= '<div class="product-count-view" data-min="'.esc_attr($min).'" data-max="'.esc_attr($max).'" data-timeout="'.esc_attr($timeout).'" data-id_product="'.esc_attr($product->get_id()).'"> <i class="feather-eye"></i> <span></span> '.esc_html__("people are viewing this right now","bemins").'</div>';
			echo wp_kses($html,'social');
		}
	}
}
if ( ! function_exists( 'bemins_safe_checkout' ) ) {
	function bemins_safe_checkout(){
		global $product; ?>
		<div class="safe-checkout">
			<div class="img-safe-checkout">
				<?php if(get_theme_mod('scroll_imagecheckout_image', '')){ ?>
					<img src="<?php echo esc_url(get_theme_mod('scroll_imagecheckout_image', '')); ?>" alt="<?php echo esc_attr__( "Image Checkout","bemins" ); ?>">
				<?php }else{ ?>
					<img src="<?php echo esc_url(get_template_directory_uri() . '/images/payment-product.png'); ?>" alt="<?php echo esc_attr__( "Image Checkout","bemins" ); ?>">
				<?php } ?>
			</div>
			<div class="title-safe-checkout"><?php echo esc_html(get_theme_mod('scroll_imagecheckout_title','Guaranteed Checkout')); ?></div>
		</div>
	<?php }
}
if ( ! function_exists( 'bemins_shipping_delivers' ) ) {
	function bemins_shipping_delivers(){
		$content_shipping = get_theme_mod('scroll_delivers_text1', 'Free worldwide shipping on all orders over $100');
		$content_delivers = get_theme_mod('scroll_delivers_text2', 'Delivers in: 3-7 Working Days <a href="https://wpbingosite.com/wordpress/bemins/refund_returns/">Shipping &amp; Return</a>');
		if( $content_shipping || $content_delivers ){ ?>
		<ul class="product-shipping-delivers">
			<?php if($content_shipping){ ?>
				<li class="product-shipping">
					<div class="content-info">
						<?php if(get_theme_mod('scroll_delivers_icon1', '')){
							$icon1_url = get_theme_mod('scroll_delivers_icon1', '');
							$response = wp_remote_get($icon1_url);
							if (!is_wp_error($response) && $response['response']['code'] === 200) {
								echo wp_remote_retrieve_body($response);
							}
						}else{ ?>
							<svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M29.714 7.29593L15.2312 0.0545514C15.1594 0.0186763 15.0803 0 15 0C14.9197 0 14.8406 0.0186763 14.7688 0.0545514L0.286042 7.29593C0.20006 7.33889 0.12775 7.40497 0.0772263 7.48674C0.0267024 7.56851 -3.70821e-05 7.66274 7.70867e-06 7.75886V22.2416C-0.000519374 22.3382 0.0259928 22.4329 0.0765436 22.5152C0.127094 22.5975 0.199665 22.664 0.286042 22.7071L14.7688 29.9485C14.8406 29.9844 14.9197 30.0031 15 30.0031C15.0803 30.0031 15.1594 29.9844 15.2312 29.9485L29.714 22.7071C29.8003 22.664 29.8729 22.5975 29.9235 22.5152C29.974 22.4329 30.0005 22.3382 30 22.2416V7.75886C30 7.66274 29.9733 7.56851 29.9228 7.48674C29.8723 7.40497 29.7999 7.33889 29.714 7.29593ZM15 14.422L10.9567 12.4001L23.8805 5.53472L28.3288 7.75886L15 14.422ZM6.8188 10.3311L19.7426 3.46576L22.7426 4.96576L9.82035 11.8321L6.8188 10.3311ZM6.2069 11.182L9.31035 12.7337V16.8551L8.12431 15.669C8.02734 15.572 7.89579 15.5175 7.75862 15.5175H6.2069V11.182ZM15 1.09576L18.6062 2.89679L5.68242 9.76317L1.6738 7.75886L15 1.09576ZM1.03449 8.59575L5.17242 10.6647V16.0347C5.17242 16.1719 5.22691 16.3035 5.32392 16.4005C5.42092 16.4975 5.55248 16.552 5.68966 16.552H7.54449L9.4619 18.4694C9.53424 18.5417 9.62639 18.5909 9.72671 18.6109C9.82703 18.6308 9.93101 18.6206 10.0255 18.5814C10.12 18.5423 10.2008 18.476 10.2576 18.391C10.3145 18.3059 10.3448 18.206 10.3448 18.1037V13.2509L14.4828 15.3199V28.6461L1.03449 21.922V8.59575ZM15.5172 28.6461V15.3199L28.9655 8.59575V21.922L15.5172 28.6461Z" fill="black"/>
							</svg>
						<?php } ?>
						<div class="content"><?php echo wp_kses($content_shipping,'social'); ?></div>
					</div>
				</li>
			<?php } ?>
			<?php if($content_delivers){ ?>
				<li class="product-delivers">
					<div class="content-info">
						<?php if(get_theme_mod('scroll_delivers_icon2', '')){
							$icon2_url = get_theme_mod('scroll_delivers_icon2', '');
							$response = wp_remote_get($icon2_url);
							if (!is_wp_error($response) && $response['response']['code'] === 200) {
								echo wp_remote_retrieve_body($response);
							}
						}else{ ?>
							<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M15 30C6.72884 30 0 23.2712 0 15C0 6.72884 6.72884 0 15 0C23.2712 0 30 6.72884 30 15C30 23.2712 23.2712 30 15 30ZM15 1.42863C7.51674 1.42863 1.42863 7.51674 1.42863 15C1.42863 22.4833 7.51674 28.5714 15 28.5714C22.4833 28.5714 28.5714 22.4833 28.5714 15C28.5714 7.51674 22.4833 1.42863 15 1.42863Z" fill="black"/>
								<path d="M21.984 15.7143H15C14.8106 15.7143 14.6289 15.6391 14.4949 15.5051C14.3609 15.3711 14.2857 15.1894 14.2857 15V4.7621C14.2857 4.57266 14.3609 4.39097 14.4949 4.25701C14.6289 4.12305 14.8106 4.04779 15 4.04779C15.1894 4.04779 15.3711 4.12305 15.5051 4.25701C15.6391 4.39097 15.7143 4.57266 15.7143 4.7621V14.2857H21.984C22.1734 14.2857 22.3551 14.3609 22.4891 14.4949C22.6231 14.6289 22.6983 14.8106 22.6983 15C22.6983 15.1894 22.6231 15.3711 22.4891 15.5051C22.3551 15.6391 22.1734 15.7143 21.984 15.7143Z" fill="black"/>
							</svg>
						<?php } ?>
						<div class="content"><?php echo wp_kses($content_delivers,'social'); ?></div>
					</div>
				</li>
			<?php } ?>
		</ul>
		<?php }
	}
}
function bemins_woocommerce_template_loop_category() {
	global $product;
	$html = '';
	$category =  get_the_terms( $product->get_id(), 'product_cat' );
	if ( $category && ! is_wp_error( $category ) ) {	
		$html = '<div class="cat-products">';
			$html .= '<a href="'.get_term_link( $category[0]->term_id, 'product_cat' ).'">';
				$html .= $category[0]->name;
			$html .= '</a>';
		$html .= '</div>';
	}
	echo wp_kses($html,'social');
}
function bemins_update_total_price() {
	global $woocommerce;
	$data = array(
		'total_price' => $woocommerce->cart->get_cart_total(),
	);
	wp_send_json($data);
}	
add_action( 'wp_ajax_bemins_update_total_price', 'bemins_update_total_price' );
add_action( 'wp_ajax_nopriv_bemins_update_total_price', 'bemins_update_total_price' );
/* Ajax Search */
add_action( 'wp_ajax_bemins_search_products_ajax', 'bemins_search_products_ajax' );
add_action( 'wp_ajax_nopriv_bemins_search_products_ajax', 'bemins_search_products_ajax' );
function bemins_search_products_ajax(){
	$character = (isset($_GET['character']) && $_GET['character'] ) ? $_GET['character'] : '';
	$limit = (isset($_GET['limit']) && $_GET['limit'] ) ? $_GET['limit'] : 5;
	$category = (isset($_GET['category']) && $_GET['category'] ) ? $_GET['category'] : "";
	$args = array(
		'post_type' 			=> 'product',
		'post_status'    		=> 'publish',
		'ignore_sticky_posts'   => 1,	  
		's' 					=> $character,
		'posts_per_page'		=> $limit
	);
	
	if($category){
		$args['tax_query'] = array(
			array(
				'taxonomy'  => 'product_cat',
				'field'     => 'slug',
				'terms'     => $category 
			),
			array(
			  'taxonomy'         => 'product_visibility',
			  'terms'            => array( 'exclude-from-catalog', 'exclude-from-search' ),
			  'field'            => 'name',
			  'operator'         => 'NOT IN',
			  'include_children' => false,
			)
		);
	}else{
		$args['tax_query'] = array(
			array(
			  'taxonomy'         => 'product_visibility',
			  'terms'            => array( 'exclude-from-catalog', 'exclude-from-search' ),
			  'field'            => 'name',
			  'operator'         => 'NOT IN',
			  'include_children' => false,
			)
		);		
	}
	if ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) ){
		$args['meta_query'] = array(
			array(
				  'key' => '_stock_status',
				  'value' => 'outofstock',
				  'compare' => '!='
			)
		);
	}
	$list = new WP_Query( $args );
	$json = array();
	if ($list->have_posts()) {
		while($list->have_posts()): $list->the_post();
		global $product, $post;
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'shop_catalog' );
		$json[] = array(
			'product_id' => $product->get_id(),
			'name'       => $product->get_title(),		
			'image'		 =>  $image[0],
			'link'		 =>  get_permalink( $product->get_id() ),
			'price'      =>  $product->get_price_html(),
		);			
		endwhile;
	}
	die (json_encode($json));
}
/* Time Nofication */
add_action( 'wp_ajax_bemins_time_nofication_ajax', 'bemins_time_nofication_ajax' );
add_action( 'wp_ajax_nopriv_bemins_time_nofication_ajax', 'bemins_time_nofication_ajax' );
function bemins_time_nofication_ajax(){
	check_ajax_referer( 'bemins_ajax_nonce', 'security' );
	$json = array();
	$id_product = (isset($_REQUEST["id_product"]) && $_REQUEST["id_product"]>0) ? $_REQUEST["id_product"] : 0;
	$query_args = array(
		'post_type'	=> 'product',
		'p'			=> $id_product
	);
	$list = new WP_Query($query_args);
	$json = array();
	if ($list->have_posts()) {
		while($list->have_posts()): $list->the_post();
		global $product, $post;
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'shop_catalog' );
		$json[] = array(
			'title'       => $product->get_title(),		
			'image'		 =>  $image[0],
			'href'		 =>  get_permalink( $product->get_id() ),
		);			
		endwhile;
	}
	die (json_encode($json));
}
/* Login ajax */
add_action( 'wp_ajax_bemins_login_ajax', 'bemins_login_ajax' );
add_action( 'wp_ajax_nopriv_bemins_login_ajax', 'bemins_login_ajax' );
function bemins_login_ajax(){
    check_ajax_referer( 'ajax-login-nonce', 'security' );
    $info = array();
	$info['user_login'] = sanitize_user( wp_unslash( $_POST['username'] ), true );
    $info['user_password'] = wp_unslash(trim($_POST['password']));
    $info['remember'] = sanitize_text_field($_POST['rememberme']);
    $user_signon = wp_signon( $info, false );
    if ( !is_wp_error($user_signon) ){
        wp_set_current_user($user_signon->ID);
        wp_set_auth_cookie($user_signon->ID);
        echo json_encode(array('loggedin' => true, 'message' => esc_html__('Login successful, redirecting...','bemins')));
    }else{
		echo json_encode(array('loggedin' => false, 'message'=> esc_html__('Wrong username or password.','bemins')));
	}
    die();
}
//Stock Product //
if ( ! function_exists( 'bemins_label_stock' ) ) {
	function bemins_label_stock(){
		global $product; 
		$stock = ( $product->is_in_stock() )? 'in-stock' : 'out-stock' ;
		$product_stock = bemins_get_config('product-stock',true);
		if( $product_stock && !$product->is_type('grouped') ){ ?>
			<?php if($stock == "out-stock"): ?>
				<div class="product-stock">    
					<span class="stock"><?php echo esc_html__( 'Out Of Stock', 'bemins' ); ?></span>
				</div>
				<div class="product-notify">    
					<span class="notify"><?php echo esc_html__( 'Notify Me When Available', 'bemins' ); ?></span>
				</div>
				<?php bemins_add_notify_me_form(); ?>
			<?php else: ?>
				<?php
				if($product->is_type('variable')){
					$available = 0;
					if(!$product->get_stock_quantity()){
						$variations = $product->get_available_variations();
						foreach($variations as $variation){
							$variation_id = $variation['variation_id'];
							$variation_obj = new WC_Product_variation($variation_id);
							$available = $available + $variation_obj->get_stock_quantity();
						}
					}else{
						$available 	=	$product->get_stock_quantity();
					}
				}else{
					$available 	=	$product->get_stock_quantity();
				}
				$sold		=	$product->get_total_sales();
				$total 		=	$available + $sold;
				if(($total > 0) && ($available > 0)){
					$percent = round( ($available  / $total ) * 100 ) ; ?>
					<div class="percent_quantity_stock product_main">
						<div class="quantity_stock">
							<?php echo esc_html__("Only","bemins"); ?><span><?php echo esc_attr($available); ?> <?php echo esc_html__("item(s)","bemins"); ?></span><?php echo esc_html__("left in stock!","bemins"); ?>
						</div>
						<div class="percent"><div class="content" style="width:<?php echo esc_attr($percent); ?>%;"></div></div>
					</div>
					<?php 
						if($product->is_type('variable')){
							$available_variation = 0;
							if(!$product->get_stock_quantity()){
								$variations = $product->get_available_variations();
								foreach($variations as $variation){
									$variation_id = $variation['variation_id'];
									$variation_product = wc_get_product($variation_id);
									$variation_obj_variation = new WC_Product_variation($variation_id);
									$available_variation = $variation_obj_variation->get_stock_quantity();
									$sold_variation		=	$variation_product->get_total_sales();
									$total_variation 		=	$available_variation + $sold_variation;
									if(($total_variation > 0) && ($available_variation > 0)){
										$percent_variation = round( ($available_variation  / $total_variation ) * 100 ) ;
									?>
									<div class="percent_quantity_stock hidden" data-variation_id="<?php echo esc_attr($variation_id); ?>">
										<div class="quantity_stock">
											<?php echo esc_html__("Only","bemins"); ?><span><?php echo esc_attr($available_variation); ?> <?php echo esc_html__("item(s)","bemins"); ?></span><?php echo esc_html__("left in stock!","bemins"); ?>
										</div>
										<div class="percent"><div class="content" style="width:<?php echo esc_attr($percent_variation); ?>%;"></div></div>
									</div>
								<?php }
								}
							}
						}
					?>
				<?php }	?>
			<?php endif; ?>
		<?php } ?>
	<?php }
}
//Notify Me Form
if ( ! function_exists( 'bemins_add_notify_me_form' ) ) {
	function bemins_add_notify_me_form() {
		global $product;
		$show_contact_form = bemins_get_config('product-notify-me-form',true);
		if($show_contact_form){
			$html = "";
			$html .= '<div class="single-product-notify-me-form">';
				$html .= '<div class="close-back_notify_me-form full">';
				$html .= '</div>';
				$html .= '<div class="notify-me-form-popup">';
					$html .= '<div class="notify-me-form-close">';
						$html .= '<span class="close-wrap">';
							$html .= '<span class="close-line close-line1">';
							$html .= '</span>';
							$html .= '<span class="close-line close-line2">';
							$html .= '</span>';
						$html .= '</span>';
					$html .= '</div>';
					$html .= do_shortcode('[contact-form-7 id="36196" product="'.esc_html($product->get_title()).'" product_url="'.get_permalink($product->get_id()).'"]');
				$html .= '</div>';
			$html .= '</div>';
			echo wp_kses($html,'social');
		}
	}
}
add_filter( 'shortcode_atts_wpcf7', 'bemins_shortcode_atts_wpcf7_filter', 10, 3 );
function bemins_shortcode_atts_wpcf7_filter( $out, $pairs, $atts ) {
    if ( isset( $atts['product'] ) ) {
        $out['product'] = $atts['product'];
    }
    if ( isset( $atts['product_url'] ) ) {
        $out['product_url'] = $atts['product_url'];
    }	
    return $out;
}
function bemins_product_quick_buy_button() {
	$show_quick_buy = bemins_get_config('show-quick-buy',true);
	if($show_quick_buy){
		global $product;
		if ( $product->get_type() == 'external' || $product -> is_on_backorder( 1 ) ) {
			return;
		}
		$html = '<button class="button quick-buy">'.esc_html__("Buy Now","bemins").'</button>';
		echo wp_kses($html,'social');		
	}
}
function bemins_quickview_short_desc(){
	global $post;
	if ( ! $post->post_excerpt ) {
		return;
	}
	$length_product_short_desc = bemins_get_config('length-product-short-desc',true);
	?>
	<div itemprop="description" class="description">
		<?php echo apply_filters( 'woocommerce_short_description', wp_trim_words( $post->post_excerpt, $length_product_short_desc ) ) ?>
	</div>
<?php }
if ( ! function_exists( 'bemins_get_countdown' ) ) {
	function bemins_get_countdown(){
		global $product;
		$dates = time();
		$start_time = get_post_meta( $product->get_id(), '_sale_price_dates_from', true );
		$countdown_time = get_post_meta( $product->get_id(), '_sale_price_dates_to', true ); 
		$orginal_price = get_post_meta( $product->get_id(), '_regular_price', true );	
		$sale_price = get_post_meta( $product->get_id(), '_sale_price', true );	
		$symboy = get_woocommerce_currency_symbol( get_woocommerce_currency() );
		$show_countdown = bemins_get_config('show-countdown',true);
		$countdown_title = get_theme_mod('scroll_countdown_title', 'Hurry up! <br> Deal ends in :');
		if($show_countdown && ( $dates >= $start_time )){
			if ( $countdown_time ):
				$date = bemins_timezone_offset( $countdown_time ); ?>
				<div class="countdown-single">
					<div class="content-title">
						<?php if(get_theme_mod('scroll_countdown_icon', '')){
							$icon1_url = get_theme_mod('scroll_countdown_icon', '');
							$response = wp_remote_get($icon1_url);
							if (!is_wp_error($response) && $response['response']['code'] === 200) {
								echo wp_remote_retrieve_body($response);
							}
						}else{ ?>
						<div class="icon">
							<svg width="1em" height="1em" viewBox="0 0 25 30" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M20.7969 10.643C18.2533 7.83369 16.7418 5.36067 15.9215 3.7807C15.0331 2.06937 14.742 1.00818 14.7398 0.99973L14.4753 0L13.5309 0.421251C13.4205 0.470454 10.8112 1.66043 9.34908 4.58456C8.61513 6.05251 8.46834 7.6869 8.4745 8.79941C8.47807 9.44686 8.01935 10.009 7.38381 10.1361C7.16476 10.1801 6.93824 10.1693 6.72441 10.1045C6.51057 10.0398 6.31607 9.92313 6.15823 9.76501L4.39904 8.00582L3.79388 8.84028C3.73107 8.9269 2.25215 10.9665 1.98291 11.3741C0.668133 13.3643 -0.0174327 15.6828 0.000336858 18.0787C0.0241469 21.2787 1.28256 24.2767 3.54376 26.5206C5.80484 28.7643 8.81247 30 12.0126 30C18.6364 29.9999 24.0251 24.6112 24.0251 17.9875C24.0252 15.5859 22.8485 12.9089 20.7969 10.643ZM12.0127 28.2406C9.27988 28.2406 6.71238 27.1863 4.78311 25.2718C2.85379 23.3572 1.78011 20.798 1.75976 18.0656C1.74451 16.0202 2.32933 14.0416 3.45092 12.3439C3.58786 12.1366 4.13719 11.3703 4.61404 10.7089L4.91424 11.0091C5.27668 11.3724 5.72338 11.6403 6.21451 11.789C6.70564 11.9377 7.22593 11.9626 7.72899 11.8614C9.18856 11.5694 10.2421 10.2777 10.2339 8.78979C10.2288 7.869 10.3442 6.52854 10.9228 5.37134C11.627 3.96297 12.6797 3.04253 13.4113 2.53067C14.0729 4.21356 15.7501 7.69036 19.4928 11.8239C20.3265 12.7448 22.2658 15.1888 22.2658 17.9875C22.2658 23.6411 17.6662 28.2406 12.0127 28.2406Z"/>
								<path d="M13.7956 14.9255L8.27938 23.0035H10.2296L15.7458 14.9255H13.7956ZM14.9727 18.6183C13.7494 18.6183 12.8262 19.4376 12.8262 20.8687C12.8262 22.3112 13.7494 23.1189 14.9727 23.1189C16.1959 23.1189 17.1191 22.3112 17.1191 20.8687C17.1191 19.4376 16.1959 18.6183 14.9727 18.6183ZM14.9727 21.8726C14.7188 21.8726 14.4649 21.6418 14.4649 20.8686C14.4649 20.0954 14.7188 19.8646 14.9727 19.8646C15.2265 19.8646 15.4804 20.0954 15.4804 20.8686C15.4804 21.6418 15.2265 21.8726 14.9727 21.8726ZM11.199 17.0604C11.199 15.6294 10.2759 14.8101 9.05257 14.8101C7.82928 14.8101 6.90608 15.6294 6.90608 17.0604C6.90608 18.5029 7.82928 19.3107 9.05257 19.3107C10.2759 19.3107 11.199 18.5029 11.199 17.0604ZM8.54481 17.0604C8.54481 16.2872 8.79869 16.0564 9.05257 16.0564C9.30644 16.0564 9.56032 16.2872 9.56032 17.0604C9.56032 17.8336 9.30644 18.0644 9.05257 18.0644C8.79869 18.0644 8.54481 17.8336 8.54481 17.0604Z"/>
							</svg>
						</div>
						<?php } ?>
						<div class="title-countdown">
							<?php echo wp_kses($countdown_title,'social'); ?>
						</div>					
					</div>
					<div class="product-countdown"  data-day="<?php echo esc_attr__("d","bemins"); ?>" data-hour="<?php echo esc_attr__("h","bemins"); ?>" data-min="<?php echo esc_attr__("m","bemins"); ?>" data-sec="<?php echo esc_attr__("s","bemins"); ?>" data-date="<?php echo esc_attr( $date ); ?>" data-price="<?php echo esc_attr( $symboy.$orginal_price ); ?>" data-sttime="<?php echo esc_attr( $start_time ); ?>" data-cdtime="<?php echo esc_attr( $countdown_time ); ?>" data-id="<?php echo esc_attr('product_'.$product->get_id()); ?>"></div>
				</div>
			<?php endif; ?>
		<?php } ?>
	<?php }
}
if ( ! function_exists( 'bemins_size_guide' ) ) {
	function bemins_size_guide(){
		global $product;
		$bemins_settings = bemins_global_settings();
		$size_guide = bemins_get_config('size-guide',false);
		if($size_guide && $product->is_type( 'variable' )){
			if(isset($bemins_settings['img-size-guide']['url']) && !empty($bemins_settings['img-size-guide']['url'])):?>
			<div class="size-guide">
				<div class="size-guide__title size-guide__click"><?php echo esc_html__('Size guide','bemins') ?></div>
				<div class="size-guide__overlay size-guide__click"></div>
				<div class="size-guide__img">
					<div class="size-guide__close size-guide__click"></div>
					<img src="<?php echo esc_url($bemins_settings['img-size-guide']['url']); ?>" alt="<?php echo esc_attr__( "Image Size Guide","bemins" ); ?>">
				</div>
			</div>
			<?php endif; ?>
		<?php } ?>
	<?php }
}
if ( ! function_exists( 'bemins_prev_next_product' ) ) {
	function bemins_prev_next_product(){
		$prevnext_single = bemins_get_config('prevnext-single',true);
		if($prevnext_single){
			$prev_post = get_previous_post();
			$next_post = get_next_post();
		?>
		<div class="prev_next_buttons">
			<?php
			if($prev_post){ 
				$prevpost = get_the_post_thumbnail( $prev_post->ID, array(180,120));
			?>
			<div class="prev_button">
				<?php previous_post_link( '%link', ''.esc_html__('Previous','bemins').'' ); ?>
				<div class="image">
					<?php echo wp_kses($prevpost,'social'); ?>
					<?php previous_post_link( '%link', '<h2 class="title">%title</h2>' ); ?>
				</div>
			</div>
			<?php } ?>
			<?php
			if($next_post){ 
				$nextpost = get_the_post_thumbnail( $next_post->ID, array(180,120));
			?>
			<div class="next_button">
				<?php next_post_link( '%link', ''.esc_html__('Next','bemins').'' ); ?>
				<div class="image">
					<?php echo wp_kses($nextpost,'social'); ?>
					<?php next_post_link( '%link', '<h2 class="title">%title</h2>' ); ?>
				</div>
			</div>
			<?php } ?>
			<div class="continue-shop">
				<a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>"><i class="feather-grid"></i></a>
				<span><?php echo esc_html__("Back to Shop","bemins") ?></span>
			</div>
		</div> <?php }
	}
}
if ( ! function_exists( 'bemins_sticky_cart' ) ) {
	function bemins_sticky_cart(){
		global $product; 
		$show_sticky_cart = bemins_get_config('show-sticky-cart',true);
		remove_action( 'woocommerce_after_add_to_cart_button', 'bemins_add_loop_wishlist_link', 15 );
		remove_action( 'woocommerce_after_add_to_cart_button', 'bemins_add_loop_compare_link', 15 );
		if($show_sticky_cart){ ?>
		<div class="sticky-product">
			<div class="content">
				<div class="content-product">
					<div class="item-thumb">
						<a href="<?php echo get_permalink( $product->get_id() ); ?>"><img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" /></a>
					</div>
					<div class="content-bottom">
						<div class="item-title">
							<a href="<?php echo esc_url(get_permalink( $product->get_id() )); ?>"><?php echo esc_html($product->get_title()); ?></a>
						</div>
						<div class="price">
							<?php echo wp_kses($product->get_price_html(),'social'); ?>
						</div>
					</div>
				</div>
				<div class="content-cart">
					<?php if ( $product->get_type() == 'simple' || $product->get_type() == 'external' ) {
						woocommerce_template_single_add_to_cart();
					}else{ ?>
						<div class="select-cart-option"><?php echo esc_html__("select option","bemins") ?></div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php } ?>
	<?php }
}
if ( ! function_exists( 'bemins_add_countdownt_item' ) ) {
	function bemins_add_countdownt_item(){
		global $product;
		$dates = time();
		$item_id = 'item_countdown_'.rand().time();
		$start_time = get_post_meta( $product->get_id(), '_sale_price_dates_from', true );
		$countdown_time = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );	
		$product_countdown = bemins_get_config('product-countdown',true);
		if( $product_countdown && $start_time && $countdown_time && ( $dates >= $start_time )) {
		$date = bemins_timezone_offset( $countdown_time );	
		?>
		<div class="countdown">
			<div class="item-countdown">
				<div class="product-countdown"  
					data-day="<?php echo esc_html__("d","bemins"); ?>"
					data-hour="<?php echo esc_html__("h","bemins"); ?>"
					data-min="<?php echo esc_html__("m","bemins"); ?>"
					data-sec="<?php echo esc_html__("s","bemins"); ?>"
					data-date="<?php echo esc_attr( $date ); ?>"  
					data-sttime="<?php echo esc_attr( $start_time ); ?>" 
					data-cdtime="<?php echo esc_attr( $countdown_time ); ?>"
					data-id="<?php echo esc_attr($item_id); ?>">
				</div>
			</div>
		</div>
		<?php }
	}
}
function bemins_woocommerce_template_loop_add_to_cart( $args = array() ) {
	global $product;
	$show_cart = bemins_get_config('product-cart'); 
	if ( $product && $show_cart) {
		$defaults = array(
			'quantity' => 1,
			'class'    => implode( ' ', array_filter( array(
					'button',
					'product_type_' . $product->get_type(),
					$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : 'read_more',
					$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
			) ) ),
		);
		$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );
		wc_get_template( 'loop/add-to-cart.php', $args );
	}
}
function bemins_add_excerpt_in_product_archives() {
	global $post;
	if ( ! $post->post_excerpt ) return;		
	echo '<div class="item-description item-description2">'.wp_trim_words( $post->post_excerpt, 25 ).'</div>';
}	
/*add second thumbnail loop product*/
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'bemins_woocommerce_template_loop_product_thumbnail', 10 );
function bemins_product_thumbnail( $size = 'woocommerce_thumbnail', $placeholder_width = 0, $placeholder_height = 0  ) {
	global $bemins_settings,$product;
	$html = '';
	$attachment_image='';
	$attachment_ids = $product->get_gallery_image_ids();
	if(!empty($attachment_ids)) {
		$first_image_id = $attachment_ids[0];
		$attachment_image = wp_get_attachment_image($first_image_id , $size, false, array('class' => 'hover-image back','loading' => 'eager'));
	}
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), '' );
		if ( $attachment_image ){
			if( $attachment_image && isset($bemins_settings['category-image-hover']) && $bemins_settings['category-image-hover']){
				$html .= '<div class="product-thumb-hover">';
				$html .= '<a href="' . esc_attr($product->get_permalink()) . '" class="woocommerce-LoopProduct-link">';
				$html .= (get_the_post_thumbnail( $product->get_id(), $size )) ? get_the_post_thumbnail( $product->get_id(), $size, array('class' => 'fade-in lazyload','loading' => 'eager') ): '<img src="'.get_template_directory_uri().'/images/placeholder.jpg" alt="'. esc_attr__('No thumb', 'bemins').'">';
				$html .= $attachment_image;
				$html .= '</a>';
				$html .= '</div>';				
			}else{
				$html .= '<a href="' . esc_attr($product->get_permalink()) . '" class="woocommerce-LoopProduct-link">';		
				$html .= (get_the_post_thumbnail( $product->get_id(), $size )) ? get_the_post_thumbnail( $product->get_id(), $size, array('class' => 'fade-in lazyload','loading' => 'eager') ): '<img src="'.get_template_directory_uri().'/images/placeholder.jpg" alt="'. esc_attr__('No thumb', 'bemins').'">';
				$html .= '</a>';
			}		
		}else{
			$html .= '<a href="' . esc_attr($product->get_permalink()) . '" class="woocommerce-LoopProduct-link">';		
			$html .= (get_the_post_thumbnail( $product->get_id(), $size )) ? get_the_post_thumbnail( $product->get_id(), $size, array('class' => 'fade-in lazyload','loading' => 'eager') ): '<img src="'.get_template_directory_uri().'/images/placeholder.jpg" alt="'. esc_attr__('No thumb', 'bemins').'">';
			$html .= '</a>';	
		}
	/* quickview */
	return $html;
}
function bemins_woocommerce_template_loop_product_thumbnail(){
	echo bemins_product_thumbnail();
}
function bemins_countdown_woocommerce_template_loop_product_thumbnail(){
	echo bemins_product_thumbnail("shop_single");
}
//Button List Product
/*********QUICK VIEW PRODUCT**********/
function bemins_product_quick_view_scripts() {	
	wp_enqueue_script('wc-add-to-cart-variation');
}
add_action( 'wp_enqueue_scripts', 'bemins_product_quick_view_scripts' );	
if ( ! function_exists( 'bemins_quickview' ) ) {
	function bemins_quickview(){
		global $product;
		$quickview = bemins_get_config('product_quickview'); 
		if( $quickview ) : 
			echo '<span class="product-quickview"  data-title="'.esc_html__("Quick View","bemins").'"><a href="#" data-product_id="'.esc_attr($product->get_id()).'" class="quickview quickview-button quickview-'.esc_attr($product->get_id()).'" >'.'<span>'.apply_filters( 'out_of_stock_add_to_cart_text', 'Quick View' ).'</span></a></span>';
		endif;
	}
}
add_action("wp_ajax_bemins_quickviewproduct", "bemins_quickviewproduct");
add_action("wp_ajax_nopriv_bemins_quickviewproduct", "bemins_quickviewproduct");
function bemins_quickviewproduct(){
	check_ajax_referer( 'bemins_ajax_nonce', 'security' );
	echo bemins_content_product();exit();
}
function bemins_content_product(){
	$productid = (isset($_REQUEST["product_id"]) && $_REQUEST["product_id"]>0) ? $_REQUEST["product_id"] : 0;
	$query_args = array(
		'post_type'	=> 'product',
		'p'			=> $productid
	);
	$outputraw = $output = '';
	$r = new WP_Query($query_args);
	if($r->have_posts()){ 
		while ($r->have_posts()){ $r->the_post(); setup_postdata($r->post);
			ob_start();
			wc_get_template_part( 'content', 'quickview-product' );
			$outputraw = ob_get_contents();
			ob_end_clean();
		}
	}
	$output = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $outputraw);
	return $output;	
}

// variation image group
add_action("wp_ajax_bemins_variation_group", "bemins_variation_group");
add_action("wp_ajax_nopriv_bemins_variation_group", "bemins_variation_group");

function bemins_variation_group() {
    check_ajax_referer('bemins_ajax_nonce', 'security');
	$variation_id = isset($_REQUEST["variation_id"]) && $_REQUEST["variation_id"] > 0 ? $_REQUEST["variation_id"] : 0;
    $variation_images = get_post_meta($variation_id, '_variation_images', true);
    if (empty($variation_images)) {
        wp_send_json(array());
        wp_die();
    }
    $content = bemins_content_variation_group($variation_id);
    wp_send_json($content);
}

function bemins_content_variation_group($variation_id) {
    $query_args = array(
        'post_type' => 'product_variation',
        'p' => $variation_id
    );
    $outputraw_thumbnail = $outputraw_image = '';
    $r = new WP_Query($query_args);
    if ($r->have_posts()) {
        while ($r->have_posts()){ $r->the_post(); setup_postdata($r->post);
            ob_start();
            wc_get_template_part('content', 'variationgroup-image');
            $outputraw_image = ob_get_clean();
			wc_get_template_part('content', 'variationgroup-thumbnail');
            $outputraw_thumbnail = ob_get_clean();
        }
    }
    $output_image = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $outputraw_image);
    $output_thumbnail = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $outputraw_thumbnail);
    return array('image' => $output_image, 'thumbnail' => $output_thumbnail);
}

//Cart Ajax
add_action("wp_ajax_bemins_cartajax", "bemins_cartajax");
add_action("wp_ajax_nopriv_bemins_cartajax", "bemins_cartajax");
function bemins_cartajax(){
	check_ajax_referer( 'bemins_ajax_nonce', 'security' );
	echo bemins_content_cart();exit();
}
function bemins_content_cart(){
	$outputraw = $output = '';
	ob_start();
		wc_get_template_part( 'content', 'cart-popup' );
		$outputraw = ob_get_contents();
	ob_end_clean();
	$output = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $outputraw);
	return $output;
}
//sale flash
function bemins_add_sale_flash(){	
	wc_get_template( 'loop/sale-flash.php' );
}
//Wishlist
function bemins_add_loop_wishlist_link(){
	global $product;
	$product_wishlist	 = bemins_get_config('product-wishlist',true);
	$product_id = $product->get_id();
	$html = "";
	if( class_exists( 'WPCleverWoosw' ) && $product_wishlist){
		$html .= '<div class="woosw-wishlist" data-title="'.esc_html__("Wishlist","bemins").'">';
			$html .= do_shortcode('[woosw id='.esc_attr($product_id).']');
		$html .= '</div>';
	}
	echo wp_kses($html,'social');
}
//Compare
function bemins_add_loop_compare_link(){
	global $product;
	$product_compare	 = bemins_get_config('product-compare',true);
	$product_id = $product->get_id();
	$html = "";
	if( class_exists( 'WPCleverWoosc' ) && $product_compare){
		$html .= '<div class="woosc-compare" data-title="'.esc_html__("Compare","bemins").'">';
			$html .= do_shortcode('[woosc id='.esc_attr($product_id).']');
		$html .= '</div>';
	}
	echo wp_kses($html,'social');
}
function bemins_add_social() {
	$product_share	 = bemins_get_config('product-share',true);
	if ( shortcode_exists( 'social_share' ) && $product_share) :
		echo '<div class="social-icon">';
			echo '<label>';
			echo esc_html__('Share : ','bemins');
			echo '</label>';
			echo do_action( 'woocommerce_share' );
			echo do_shortcode( '[social_share]' );
		echo '</div>';
	endif;	
}
function bemins_add_thumb_single_product() {
	echo '<div class="image-thumbnail-list">';
	do_action( 'woocommerce_product_thumbnails' );
	echo '</div>';
}
function bemins_get_class_item_product(){
	$product_col_large = 12 /(bemins_get_config('product_col_large',4));	
	$product_col_medium = 12 /(bemins_get_config('product_col_medium',3));
	$product_col_sm 	= 12 /(bemins_get_config('product_col_sm',1));
	$product_col_xs 	= 12 /(bemins_get_config('product_col_xs',1));
	$class_item_product = 'col-lg-'.$product_col_large.' col-md-'.$product_col_medium.' col-sm-'.$product_col_sm.' col-'.$product_col_xs;
	return $class_item_product;
}
if ( ! function_exists( 'bemins_catalog_perpage' ) ) {
	function bemins_catalog_perpage(){
		$bemins_settings = bemins_global_settings();
		$query_string = bemins_get_query_string();
		parse_str($query_string, $params);
		$query_string 	= '?'.$query_string;
		$per_page 	=   (isset($bemins_settings['product_count']) && $bemins_settings['product_count'])  ? (int)$bemins_settings['product_count'] : 12;
		$product_count = (isset($params['product_count']) && $params['product_count']) ? ($params['product_count']) : $per_page;
		?>
		<div class="bemins-woocommerce-sort-count">
			<div class="woocommerce-sort-count">
				<ul class="list-show">
					<li data-value="<?php echo esc_attr($per_page); 	?>"<?php if ($product_count == $per_page){?>class="active"<?php } ?>><a href="<?php echo add_query_arg('product_count', $per_page, $query_string); ?>"><?php echo esc_attr($per_page); ?></a></li>
					<li data-value="<?php echo esc_attr($per_page*2); 	?>"<?php if ($product_count == $per_page*2){?>class="active"<?php } ?>><a href="<?php echo add_query_arg('product_count', $per_page*2, $query_string); ?>"><?php echo esc_attr($per_page*2); ?></a></li>
					<li data-value="<?php echo esc_attr($per_page*3); 	?>"<?php if ($product_count == $per_page*3){?>class="active"<?php } ?>><a href="<?php echo add_query_arg('product_count', $per_page*3,$query_string); ?>"><?php echo esc_attr($per_page*3); ?></a></li>
				</ul>
			</div>
		</div>
	<?php }	
}
add_filter('loop_shop_per_page', 'bemins_loop_shop_per_page');
function bemins_loop_shop_per_page() {
	$bemins_settings = bemins_global_settings();
	$query_string = bemins_get_query_string();
	parse_str($query_string, $params);
	$per_page 	=   (isset($bemins_settings['product_count']) && $bemins_settings['product_count'])  ? (int)$bemins_settings['product_count'] : 12;
	$product_count = (isset($params['product_count']) && $params['product_count']) ? ($params['product_count']) : $per_page;
	return $product_count;
}	
function bemins_found_posts(){
	wc_get_template( 'loop/woocommerce-found-posts.php' );
}	
remove_action('woocommerce_before_main_content', 'bemins_woocommerce_breadcrumb', 20);	
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
if ( ! function_exists( 'bemins_search_form_product' ) ) {
	function bemins_search_form_product(){
		$query_string = bemins_get_query_string();
		parse_str($query_string, $params);
		$category_slug = isset( $params['product_cat'] ) ? $params['product_cat'] : '';
		$terms =	get_terms( 'product_cat', 
		array(  
			'hide_empty' => true,	
			'parent' => 0	
		));
		$class_ajax_search 	= "";	 
		$ajax_search 		= bemins_get_config('show-ajax-search',false);
		$limit_ajax_search 		= bemins_get_config('limit-ajax-search',5);
		if($ajax_search){
			$class_ajax_search = "ajax-search";
		}
		?>
		<form role="search" method="get" class="search-from <?php echo esc_attr($class_ajax_search); ?>" action="<?php echo esc_url(home_url( '/' )); ?>" data-admin="<?php echo admin_url( 'admin-ajax.php', 'bemins' ); ?>" data-noresult="<?php echo esc_html__('No Result','bemins') ; ?>" data-limit="<?php echo esc_attr($limit_ajax_search); ?>">
			<?php if($terms && is_object($terms)){ ?>
			<div class="select_category pwb-dropdown dropdown">
				<span class="pwb-dropdown-toggle dropdown-toggle" data-toggle="dropdown"><?php echo esc_html__('Category','bemins'); ?></span>
				<span class="caret"></span>
				<ul class="pwb-dropdown-menu dropdown-menu category-search">
				<li data-value="" class="<?php  echo (empty($category_slug) ?  esc_attr("active") : ""); ?>"><?php echo esc_html__('Browse Category','bemins'); ?></li>
					<?php foreach($terms as $term){ ?>
						<?php if( $term && is_object($term) ){ ?>
							<li data-value="<?php echo esc_attr($term->slug); ?>" class="<?php  echo (($term->slug == $category_slug) ?  esc_attr("active") : ""); ?>"><?php echo esc_html($term->name); ?></li>
							<?php
								$terms_vl1 =	get_terms( 'product_cat', 
								array( 
										'parent' => '', 
										'hide_empty' => false,
										'parent' 		=> $term->term_id, 
								));						
							?>	
							<?php foreach ($terms_vl1 as $term_vl1) { ?>
								<?php if( $term_vl1 && is_object($term_vl1) ){ ?>
									<li data-value="<?php echo esc_attr($term_vl1->slug); ?>" class="<?php  echo (($term_vl1->slug == $category_slug) ?  esc_attr("active") : ""); ?>"><?php echo esc_html($term_vl1->name); ?></li>
									<?php
										$terms_vl2 =	get_terms( 'product_cat', 
										array( 
												'parent' => '', 
												'hide_empty' => false,
												'parent' 		=> $term_vl1->term_id, 
									));	?>					
									<?php foreach ($terms_vl2 as $term_vl2) { ?>
										<?php if( $term_vl2 && is_object($term_vl2) ){ ?>
											<li data-value="<?php echo esc_attr($term_vl2->slug); ?>" class="<?php  echo (($term_vl2->slug == $category_slug) ?  esc_attr("active") : ""); ?>"><?php echo esc_html($term_vl2->name); ?></li>
										<?php } ?>
									<?php } ?>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					<?php } ?>
				</ul>	
				<input type="hidden" name="product_cat" class="product-cat" value="<?php echo esc_attr($category_slug); ?>"/>
			</div>	
			<?php } ?>	
			<div class="search-box">
				<button id="searchsubmit" class="btn" type="submit">
					<i class="icon-search"></i>
					<span><?php echo esc_html__('search','bemins'); ?></span>
				</button>
				<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="input-search s" placeholder="<?php echo esc_attr__( 'Search products...', 'bemins' ); ?>" />
				<div class="result-search-products-content">
					<ul class="result-search-products">
					</ul>
				</div>
			</div>
			<input type="hidden" name="post_type" value="product" />
		</form>
	<?php }
}
if ( ! function_exists( 'bemins_top_cart' ) ) {
	function bemins_top_cart(){
		global $woocommerce; ?>
		<div id="cart" class="top-cart">
			<a class="cart-icon" href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>" title="<?php esc_attr_e('View your shopping cart', 'bemins'); ?>">
				<i class="flaticon-bag"></i>
			</a>
		</div>
	<?php }
}
function bemins_button_filter(){
	$html = '<a class="button-filter-toggle"></a>';
	echo wp_kses($html,'social');
}	
function bemins_image_single_product(){
	$class = new stdClass;
	$class->show_thumb = bemins_get_config('product-thumbs');
	$position = bemins_get_config('position-thumbs',"bottom");
	$product_layout_thumb = bemins_get_config("layout-thumbs","scroll");
	$class->position = $position;
	if($class->show_thumb == 'show' && $position == "outsite"){
		add_action( 'woocommerce_single_product_summary', 'bemins_add_thumb_single_product', 40 );
	}	
	if(( $position == 'left' || $position == "right" ) &&  ( $product_layout_thumb == "scroll" || $product_layout_thumb == "light" ) && $class->show_thumb == 'show' ){
		$class->class_thumb = "col-md-2";
		$class->class_data_image = 'data-vertical="true" data-verticalswiping="true"';
		$class->class_image = "col-md-10";
	}else{
		$class->class_thumb = $class->class_image = "col-sm-12";
		$class->class_data_image = "";
	}
	$product_count_thumb = bemins_get_config("product-thumbs-count",4) ? bemins_get_config("product-thumbs-count",4) : apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
	$class->product_count_thumb =	$product_count_thumb;
	$product_layout_thumb = bemins_get_config("layout-thumbs","scroll");
	$class->product_layout_thumb =	$product_layout_thumb;
	return $class;
}
function bemins_category_top_bar(){
	remove_action('woocommerce_before_shop_loop','woocommerce_result_count',40); 
	add_action('woocommerce_before_shop_loop','bemins_display_view', 35);
	remove_action('woocommerce_before_shop_loop','bemins_found_posts', 20);
	add_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering', 30);
	$category_style  = bemins_get_config('category_style','sidebar');
	if(is_active_sidebar('sidebar-product')){
		add_action('woocommerce_before_shop_loop','bemins_button_filter', 25);
	}
	do_action( 'woocommerce_before_shop_loop' );
}
function bemins_get_product_discount(){
	global $product;
	$discount = 0;
	if ($product->is_on_sale() && $product->is_type( 'variable' )){
		$available_variations = $product->get_available_variations();
		for ($i = 0; $i < count($available_variations); ++$i) {
			$variation_id=$available_variations[$i]['variation_id'];
			$variable_product1= new WC_Product_Variation( $variation_id );
			$regular_price = $variable_product1->get_regular_price();
			$sales_price = $variable_product1->get_sale_price();
			if(is_numeric($regular_price) && is_numeric($sales_price)){
				$percentage = round( (( $regular_price - $sales_price ) / $regular_price ) * 100 ) ;
				if ($percentage > $discount) {
					$discount = $percentage;
				}
			}
		}
	}elseif($product->is_on_sale() && $product->is_type( 'simple' )){
		$regular_price	= $product->get_regular_price();
		$sales_price	= $product->get_sale_price();
		if(is_numeric($regular_price) && is_numeric($sales_price)){
			$discount = round( ( ( $regular_price - $sales_price ) / $regular_price ) * 100 );
		}
	}
	if( $discount > 0 ){
		$text_discount = "-".$discount.'%';
	}else{
		$text_discount = '';
	}
	return 	$text_discount;
}
add_action( 'woocommerce_before_quantity_input_field', 'bemins_display_quantity_plus' );
function bemins_display_quantity_plus() {
   $html = '<button type="button" class="plus" ><i class="feather-plus" aria-hidden="true"></i></button>';
   echo wp_kses($html,'social');
}
add_action( 'woocommerce_after_quantity_input_field', 'bemins_display_quantity_minus' );
function bemins_display_quantity_minus() {
	$html = '<button type="button" class="minus" ><i class="feather-minus" aria-hidden="true"></i></button>';
	echo wp_kses($html,'social');
}
if ( ! function_exists( 'bemins_woocommerce_template_loop_category_title' ) ) {
	function bemins_woocommerce_template_loop_category_title( $category ) { ?>
		<div class="woocommerce-loop-category">
			<h2 class="woocommerce-loop-category__title">
				<a href="<?php echo get_term_link( $category->term_id, 'product_cat' ); ?>"><?php echo esc_html( $category->name ); ?></a>
			</h2>
		</div>
		<?php
	}
}
if ( ! function_exists( 'bemins_woocommerce_template_loop_only_category_title' ) ) {
	function bemins_woocommerce_template_loop_only_category_title( $category ) { ?>
			<div class="woocommerce-loop-category">
				<h2 class="woocommerce-loop-category__title">
					<a href="<?php echo get_term_link( $category->term_id, 'product_cat' ); ?>"><?php echo esc_html( $category->name ); ?></a>
				</h2>
				<div class="count-product">
					<?php if ( $category->count == 1 ) {
						echo apply_filters( 'woocommerce_subcategory_count_html', esc_html( $category->count ) . '' . esc_html__(' product','bemins'), $category );
					}else{
						echo apply_filters( 'woocommerce_subcategory_count_html', esc_html( $category->count ) . '' . esc_html__(' products','bemins'), $category );
					} ?>
				</div>
				<div class="view-all">
					<a href="<?php echo get_term_link( $category->term_id, 'product_cat' ); ?>"><?php echo esc_html__('View all products','bemins'); ?></a>
				</div>
			</div>
		<?php
	}
}
function bemins_woocommerce_subcategory_thumbnail( $category ){
	$subcategories_style = bemins_get_config('style-subcategories','shop_mini_categories');
	if($subcategories_style == "icon_categories"){
		$icon_category = get_term_meta( $category->term_id, 'category_icon', true );
		if($icon_category){?>
			<i class="<?php echo esc_attr($icon_category); ?>"></i>
			<?php }
	}else{
		$thumbnail_id         = get_term_meta( $category->term_id, 'thumbnail_id', true );
		if ( $thumbnail_id ) {
			$image        = wp_get_attachment_image_src( $thumbnail_id, 'full' );
			$image        = $image[0]; ?>
			<img class="fade-in lazyloaded" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $category->name ); ?>"/>
			<?php
		}
	}
}
if ( ! function_exists( 'bemins_get_video_product' ) ) {
	function bemins_get_video_product(){
		global $product;
		$video  = (get_post_meta( $product->get_id(), 'video_product', true )) ? get_post_meta($product->get_id(), 'video_product', true ) : "";
		if($video){ ?>
			<?php
				$youtube_id = bemins_get_youtube_video_id($video);
				$vimeo_id = bemins_get_vimeo_video_id($video);
				$url_video = "#";
				if($youtube_id){
					$url_video = "https://www.youtube.com/embed/".esc_attr($youtube_id);
				}elseif($vimeo_id){
					$url_video = "https://player.vimeo.com/video/".esc_attr($vimeo_id);
				}
			?>
			<div class="bemins-product-button ">
				<div class="bemins-bt-video">
					<div class="bwp-video modal" data-src="<?php echo esc_attr($url_video); ?>" data-title="<?php echo esc_attr__( 'Play video', 'bemins' ); ?>">
						<i class="wpb-icon-play-video"></i>
					</div>
					<div class="content-video modal fade" id="myModal">
						<div class="remove-show-modal"></div>
						<div class="modal-dialog modal-dialog-centered">
							<?php bemins_display_video_product(); ?>
						</div>
					</div>
				</div>
			</div>
		<?php }
	}
}
if ( ! function_exists( 'bemins_display_video_product' ) ) {
	function bemins_display_video_product(){
		global $product;
		$video  = (get_post_meta( $product->get_id(), 'video_product', true )) ? get_post_meta($product->get_id(), 'video_product', true ) : "";
		if($video){
			$youtube_id = bemins_get_youtube_video_id($video);
			$vimeo_id = bemins_get_vimeo_video_id($video);
			?>
			<?php if($youtube_id){ ?>
				<iframe id="video" src="https://www.youtube.com/embed/<?php echo esc_attr($youtube_id); ?>" title="<?php echo esc_html__('YouTube video player','bemins'); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<?php }elseif($vimeo_id){?>
				<iframe id="video" src="https://player.vimeo.com/video/<?php echo esc_attr($vimeo_id); ?>"  frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
			<?php } ?>
		<?php }
	}
}
function bemins_display_thumb_video(){
	global $product;
	$html = "";
	$video  = (get_post_meta( $product->get_id(), 'video_product', true )) ? get_post_meta($product->get_id(), 'video_product', true ) : "";
	if($video){
		$youtube_id = bemins_get_youtube_video_id($video);
		$vimeo_id = bemins_get_vimeo_video_id($video);		
		if($youtube_id){
			$html .= '<div class="img-thumbnail-video">';
				$html .= '<img src="http://img.youtube.com/vi/'.$youtube_id.'/sddefault.jpg"/>';
			$html .= '</div>';
		}elseif($vimeo_id){
			$arr_vimeo = unserialize(WP_Filesystem_Direct::get_contents("https://vimeo.com/api/v2/video/".esc_attr($vimeo_id).".php"));
			$html .= '<div class="img-thumbnail-video">';
				$html .= '<img src="'.esc_attr($arr_vimeo[0]['thumbnail_large']).'"/>';
			$html .= '</div>';
		}
	}
	if($html){
		echo wp_kses($html,'social');
	}
}
function bemins_get_vimeo_video_id($url){
	$regs = array();
	$video_id = '';
	if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $regs)) {
	$video_id = $regs[3];
	}
	return $video_id;
}
function bemins_get_youtube_video_id($url){
	$video_id = false;
	$url = parse_url($url);
	if (strcasecmp($url['host'], 'youtu.be') === 0)
	{
		$video_id = substr($url['path'], 1);
	}
	elseif (strcasecmp($url['host'], 'www.youtube.com') === 0)
	{
		if (isset($url['query'])){
			parse_str($url['query'], $url['query']);
			if (isset($url['query']['v'])){
				$video_id = $url['query']['v'];
			}
		}
		if ($video_id == false){
			$url['path'] = explode('/', substr($url['path'], 1));
			if (in_array($url['path'][0], array('e', 'embed', 'v'))){
				$video_id = $url['path'][1];
			}
		}
	}else{
		return false;
	}
	return $video_id;
}
if ( ! function_exists( 'bemins_view_product' ) ) {
	function bemins_view_product(){
		global $product;
		$view  = (get_post_meta( $product->get_id(), 'view_product', true )) ? get_post_meta($product->get_id(), 'view_product', true ) : "";
		if($view == 'true'){ $j=0; ?>
		<?php $attachment_ids = $product->get_gallery_image_ids(); ?>
		<div class="bemins-360-button image" data-title="<?php echo esc_attr__('360 Degree','bemins') ?>"><i class="feather-box"></i></div>
		<div class="content-product-360-view">
			<div class="product-360-view" data-count="<?php echo esc_attr(count($attachment_ids)-1); ?>">
				<div class="bemins-360-button"></div>
				<div class="images-display">
					<ul class="images-list">
					<?php
						foreach ( $attachment_ids as $attachment_id ) {		
							$image_link = wp_get_attachment_url( $attachment_id );
							if ( ! $image_link )
								continue;
							$image_title 	= esc_attr( get_the_title( $attachment_id ) );
							$image_caption 	= esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );
							$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'full' ), 0, $attr = array(
								'title' => $image_title,
								'alt'   => $image_title
								) ); ?>
							<li class="images-display image-<?php echo esc_attr($j); ?> <?php if($j==0){ ?>active<?php } ?>"><?php echo wp_kses($image,'social'); ?></li>
							<?php $j++;
						}
					?>
					</ul>
				</div>
			</div>
		</div>
		<?php }
	}
}
function bemins_woocommerce_maybe_show_product_subcategories( $loop_html = '' ) {
	if(class_exists( 'WooCommerce' )){
		$product_categories = get_terms( 'product_cat', array('hide_empty' => true,'parent' => 0) );
		ob_start();
		foreach ( $product_categories as $category ) {
			wc_get_template(
				'content-product_cat.php',
				array(
					'category' => $category,
				)
			);
		}
		$loop_html .= ob_get_clean();
		return $loop_html;
	}
}
function bemins_woocommerce_output_product_categories( ){
	if(class_exists( 'WooCommerce' )){ 
		$product_categories = get_terms( 'product_cat', array('hide_empty' => true,'parent' => 0) );
		if ( ! $product_categories ) {
			return false;
		}
		foreach ( $product_categories as $category ) {
			wc_get_template(
				'content-only-product_cat.php',
				array(
					'category' => $category,
				)
			);
		}
		return true;
	}
}
//Cart Ajax Page
add_action("wp_ajax_bemins_cartajax_page", "bemins_cartajax_page");
add_action("wp_ajax_nopriv_bemins_cartajax_page", "bemins_cartajax_page");
function bemins_cartajax_page(){
	check_ajax_referer( 'bemins_ajax_nonce', 'security' );
	echo bemins_content_cart_page();exit();
}
function bemins_content_cart_page(){
	$outputraw = $output = '';
	ob_start();
		wc_get_template('cart/cart.php');
		$outputraw = ob_get_contents();
	ob_end_clean();
	$output = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $outputraw);
	return $output;
}
function bemins_timezone_offset( $countdowntime ){
	$timeOffset = 0;	
	if( get_option( 'timezone_string' ) != '' ) :
		$timezone = get_option( 'timezone_string' );
		$dateTimeZone = new DateTimeZone( $timezone );
		$dateTime = new DateTime( "now", $dateTimeZone );
		$timeOffset = $dateTimeZone->getOffset( $dateTime );
	else :
		$dateTime = get_option( 'gmt_offset' );
		$dateTime = intval( $dateTime );
		$timeOffset = $dateTime * 3600;
	endif;
	$offset =  ( $timeOffset < 0 ) ? '-' . gmdate( "H:i", abs( $timeOffset ) ) : '+' . gmdate( "H:i", $timeOffset );
	$date = date( 'Y/m/d H:i:s', $countdowntime );
	$date1 = new DateTime( $date );
	$cd_date =  $date1->format('Y-m-d H:i:s') . $offset;
	return strtotime( $cd_date );
}
add_action('wp_ajax_bemins_ajax_add_to_cart', 'bemins_ajax_add_to_cart');
add_action('wp_ajax_nopriv_bemins_ajax_add_to_cart', 'bemins_ajax_add_to_cart');
 
function bemins_ajax_add_to_cart(){
	check_ajax_referer( 'bemins_ajax_nonce', 'security' );
    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);
    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {
        do_action('woocommerce_ajax_added_to_cart', $product_id);
        if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }
        WC_AJAX:: get_refreshed_fragments();
    } else {
        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));
 
        echo wp_send_json($data);
    }
    wp_die();
	echo bemins_content_cart();exit();
}
function bemins_time_nofication(){
	if ( class_exists( 'WooCommerce' ) ) {
		wc_get_template( 'time-nofication.php' );
	}
}
?>