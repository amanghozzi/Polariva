<?php 
global $post, $woocommerce, $product;
$variation_id = $product->get_id(); 
$image = get_post_meta( $variation_id, '_variation_images', true );
$image_urls = explode(";", $image);
$variation = wc_get_product( $variation_id );
$image_feature_url = wp_get_attachment_image_url( $variation->get_image_id(), 'full' );
$columns = 	bemins_image_single_product()->product_count_thumb;
?>
<?php if(bemins_image_single_product()->product_layout_thumb == "grid_sticky"){ ?>
	<div class="content-thumbnail-scroll">
		<div class="image-thumbnail" data-asnavfor=".image-additional" data-vertical="true" data-centermode="true" data-focusonselect="true" data-columns4="4" data-columns3="<?php echo esc_attr($columns); ?>" data-columns2="<?php echo esc_attr($columns); ?>" data-columns1="<?php echo esc_attr($columns); ?>" data-columns="<?php echo esc_attr($columns); ?>">
			<div class="img-thumbnail">
				<span class="img-thumbnail-scroll">
					<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($image_feature_url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
				</span>
			</div>
			<?php
			if($image){
				foreach ($image_urls as $url) { 
				?>
				<div class="img-thumbnail">
					<span class="img-thumbnail-scroll">
						<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
					</span>
				</div>
				<?php }
			}
			?>
		</div>
	</div>
<?php }elseif(bemins_image_single_product()->product_layout_thumb == "full_width"){ ?>
	<div class="content-thumbnail-scroll<?php if( count($image_urls) < $columns){ ?> max-thumbnail<?php } ?>">
		<div class="image-thumbnail slick-carousel" data-vertical="true" data-asnavfor=".image-additional" data-centermode="true" data-focusonselect="true" data-columns4="<?php echo esc_attr($columns); ?>" data-columns3="<?php echo esc_attr($columns); ?>" data-columns2="<?php echo esc_attr($columns); ?>" data-columns1="<?php echo esc_attr($columns); ?>" data-columns="<?php echo esc_attr($columns); ?>" <?php echo esc_attr(bemins_image_single_product()->class_data_image); ?>>
			<div class="img-thumbnail">
				<span class="img-thumbnail-scroll">
					<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($image_feature_url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
				</span>
			</div>
			<?php
			if($image){
				foreach ($image_urls as $url) { 
				?>
				<div class="img-thumbnail">
					<span class="img-thumbnail-scroll">
						<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
					</span>
				</div>
				<?php }
			}
			?>
		</div>
	</div>
<?php }else{ ?>
	<div class="content-thumbnail-scroll<?php if( count($image_urls) < $columns){ ?> max-thumbnail<?php } ?>">
		<div class="image-thumbnail slick-carousel" data-asnavfor=".image-additional" data-centermode="true" data-focusonselect="true" data-columns4="<?php echo esc_attr($columns); ?>" data-columns3="<?php echo esc_attr($columns); ?>" data-columns2="<?php echo esc_attr($columns); ?>" data-columns1="<?php echo esc_attr($columns); ?>" data-columns="<?php echo esc_attr($columns); ?>" data-nav="true" <?php echo esc_attr(bemins_image_single_product()->class_data_image); ?>>
			<div class="img-thumbnail">
				<span class="img-thumbnail-scroll">
					<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($image_feature_url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
				</span>
			</div>
			<?php
			if($image){
				foreach ($image_urls as $url) { 
				?>
				<div class="img-thumbnail">
					<span class="img-thumbnail-scroll">
						<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
					</span>
				</div>
				<?php }
			}
			?>
		</div>
	</div>
<?php } ?>