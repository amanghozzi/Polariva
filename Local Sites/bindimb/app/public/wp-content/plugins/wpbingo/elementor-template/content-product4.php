<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $product, $woocommerce_loop;
$bemins_settings = bemins_global_settings();
if($product -> is_on_backorder( 1 ) ){ 
	$stock = 'pre-order';			
}else{ 
	$stock = ( $product->is_in_stock() )? 'in-stock' : 'out-stock';			
}
add_action('woocommerce_after_shop_loop_item', 'bemins_quickview', 18 );
add_action('woocommerce_after_shop_loop_item', 'bemins_add_loop_wishlist_link', 20 );
add_action('woocommerce_after_shop_loop_item', 'bemins_woocommerce_template_loop_add_to_cart', 15 );
?>
<div class="products-entry content-product4 clearfix product-wapper">
	<div class="products-thumb">
		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
		<div class='product-button'>
			<?php do_action('woocommerce_after_shop_loop_item'); ?>
		</div>
		<?php if($stock == "out-stock"): ?>
			<div class="product-stock">    
				<span class="stock"><?php echo esc_html__( 'Out Of Stock', 'bemins' ); ?></span>
			</div>
		<?php elseif($stock == "pre-order"): ?>
			<div class="product-stock pre-order">    
				<span class="stock"><?php echo esc_html__( 'Pre Order', 'bemins' ); ?></span>
			</div>
		<?php endif; ?>
		<div class="product-button-mobile">
			<?php if(isset($bemins_settings['product-wishlist']) && $bemins_settings['product-wishlist'] && class_exists( 'WPCleverWoosw' ) ){
				bemins_add_loop_wishlist_link();
			} ?>
			<?php bemins_quickview(); ?>
		</div>
	</div>
	<div class="products-content">
		<div class="contents">
			<h3 class="product-title"><a href="<?php echo esc_attr($product->get_permalink()); ?>"><?php echo esc_html($product->get_name()); ?></a></h3>
			<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
		</div>
	</div>
</div>