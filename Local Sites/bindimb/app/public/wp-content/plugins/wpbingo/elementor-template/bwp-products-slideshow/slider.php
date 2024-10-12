<?php 
	$arr = array('br' => array(), 'p' => array(), 'span' => array());
?>
<div class="bwp-products-slideshow <?php echo esc_attr($layout);?> <?php if ($show_nav !== 'false') { echo esc_attr($navigational_style);} ?>">
	<div class="slider-container">
		<div class="wpbingo-wrapper">
			<?php if($title1) { ?>
				<div class="title-block">   
					<h2><?php echo wp_kses( $title1,$arr); ?></h2>
					<?php if($description) { ?>
						<div class="description"><?php echo wp_kses( $description,$arr); ?></div>
					<?php } ?> 
				</div> 
			<?php } ?>
			<div class="slider-nav wpbingo-products wpbingo-thumbs-products slick-carousel" data-asnavfor=".slider-for" data-nav="<?php echo esc_attr($show_nav);?>" data-dots="<?php echo esc_attr($show_pag);?>">
				<?php
				global $product, $post, $wpdb, $average;
				foreach ($settings['list_tab'] as $item){ 
					$product = wc_get_product( $item['product_name'] );
				?>
				<div class="item">
					<?php if($product) :?>
						<div class="content products-list grid">
							<div class="item-product">
								<div class="items">
									<?php
										$template_path = WPBINGO_ELEMENTOR_TEMPLATE_PATH . 'content-product' . esc_attr($style_product) . '.php';
										if (file_exists($template_path)) {
											include($template_path);
										} else {
											include(WPBINGO_ELEMENTOR_TEMPLATE_PATH . 'content-product.php');
										}
									?>
								</div>
							</div>
						</div>
					<?php endif;?>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="slider-for wpbingo-thumbs-products wpbingo-thumbs-swiper slick-carousel" data-asnavfor=".slider-nav" data-fade="true">
			<?php
				foreach ($settings['list_tab'] as $item){ 
			?>
				<div class="item">
					<img class="product-feature-image fade-in lazyload <?php if ($image_hover) { ?> elementor-animation-<?php echo esc_attr($image_hover); } ?>" src="<?php echo esc_url($item['image']['url']); ?>" style="background-image:url(<?php echo esc_url($item['image']['url']); ?>)"></img>
				</div>
			<?php } ?>
		</div>
	</div>
	<div class="pagination-products-slideshow">
		<div class="pagination-fraction">
			<button class="btn-products prev"><i class="icon-arrow-left"></i></button>
				<div class="slider-pagination-fraction">    
					<span class="pagination-current-products"><?php echo esc_html__('1', 'wpbingo'); ?></span>
					<?php echo esc_html__('/', 'wpbingo'); ?> 
					<span class="pagination-total-products"><?php echo count($settings['list_tab']); ?></span>
				</div>
			<button class="btn-products next"><i class="icon-arrow-right"></i></button>
		</div>
	</div>
</div>

