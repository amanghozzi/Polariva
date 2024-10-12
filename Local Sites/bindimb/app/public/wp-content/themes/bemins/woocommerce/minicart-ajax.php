<?php 
if ( !class_exists('Woocommerce') ) { 
	return false;
}
global $woocommerce;
$bemins_settings = bemins_global_settings();
$cart_layout = bemins_get_config('cart-layout','dropdown');
?>
<div class="dropdown mini-cart top-cart" data-text_added="<?php echo esc_html__("Product was added to cart successfully!","bemins"); ?>">
	<a class="cart-icon" href="#" role="button">
		<div class="icons-cart"><i class="icon-cart"></i><span class="cart-count"><?php echo esc_attr($woocommerce->cart->cart_contents_count); ?></span></div>
	</a>
	<div class="cart-popup"><?php woocommerce_mini_cart(); ?></div>
</div>