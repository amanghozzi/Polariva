<?php 
global $post, $woocommerce, $product;
$variation_id = $product->get_id(); 
$image = get_post_meta( $variation_id, '_variation_images', true );
$image_urls = explode(";", $image);
$variation = wc_get_product( $variation_id );
$image_feature_url = wp_get_attachment_image_url( $variation->get_image_id(), 'full' );
?>
<?php if(bemins_image_single_product()->product_layout_thumb == "grid_sticky"){ ?>
	<div class="image-additional" <?php if(bemins_image_single_product()->show_thumb == 'show') { ?> data-asnavfor=".image-thumbnail"<?php } ?> data-fade="true">
		<div class="img-thumbnail">
			<a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" href="<?php echo esc_url($image_feature_url);?>">
				<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($image_feature_url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
			</a>
		</div>
		<?php
		if($image){
			foreach ($image_urls as $url) { 
			?>
			<div class="img-thumbnail">
				<a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" href="<?php echo esc_url($url);?>">
					<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
				</a>
			</div>
			<?php }
		}
		?>
	</div>
<?php }elseif(bemins_image_single_product()->product_layout_thumb == "one_column"){ ?>
	<div class="image-additional slick-carousel-mobile" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns="1" data-nav="true">
		<div class="img-thumbnail">
			<a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" href="<?php echo esc_url($image_feature_url);?>">
				<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($image_feature_url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
			</a>
		</div>
		<?php
		if($image){
			foreach ($image_urls as $url) { 
			?>
			<div class="img-thumbnail">
				<a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" href="<?php echo esc_url($url);?>">
					<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
				</a>
			</div>
			<?php }
		}
		?>
	</div>
<?php }elseif(bemins_image_single_product()->product_layout_thumb == "two_column"){ ?>
	<div class="image-additional slick-carousel-mobile" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns="1" data-nav="true">
		<div class="img-thumbnail">
			<a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" href="<?php echo esc_url($image_feature_url);?>">
				<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($image_feature_url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
			</a>
		</div>
		<?php
		if($image){
			foreach ($image_urls as $url) { 
			?>
			<div class="img-thumbnail">
				<a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" href="<?php echo esc_url($url);?>">
					<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
				</a>
			</div>
			<?php }
		}
		?>
	</div>
<?php }elseif(bemins_image_single_product()->product_layout_thumb == "lagre_gallery"){ ?>
	<div class="image-additional slick-carousel" data-slidestoscroll="true" data-nav="true" data-dots="true" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns="1">
		<div class="img-thumbnail woocommerce-product-gallery__image">
			<a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" href="<?php echo esc_url($image_feature_url);?>">
				<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($image_feature_url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
			</a>
		</div>
		<?php
		if($image){
			foreach ($image_urls as $url) { 
			?>
			<div class="img-thumbnail">
				<a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" href="<?php echo esc_url($url);?>">
					<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
				</a>
			</div>
			<?php }
		}
		?>
	</div>
<?php }elseif(bemins_image_single_product()->product_layout_thumb == "grid"){ ?>
	<div class="image-additional slick-carousel-mobile" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns="1" data-nav="true">
		<div class="img-thumbnail woocommerce-product-gallery__image">
			<a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" href="<?php echo esc_url($image_feature_url);?>">
				<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($image_feature_url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
			</a>
		</div>
		<?php
		if($image){
			foreach ($image_urls as $url) { 
			?>
			<div class="img-thumbnail">
				<a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" href="<?php echo esc_url($url);?>">
					<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
				</a>
			</div>
			<?php }
		}
		?>
	</div>
<?php }elseif(bemins_image_single_product()->product_layout_thumb == "slider"){ ?>
	<div class="image-additional slick-carousel have-variation" data-slidestoscroll="true" data-nav="true" data-dots="true" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns="1">
		<div class="img-thumbnail woocommerce-product-gallery__image">
			<a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" href="<?php echo esc_url($image_feature_url);?>">
				<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($image_feature_url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
			</a>
		</div>
		<?php
		if($image){
			foreach ($image_urls as $url) { 
			?>
			<div class="img-thumbnail">
				<a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" href="<?php echo esc_url($url);?>">
					<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
				</a>
			</div>
			<?php }
		}
		?>
	</div>
<?php }elseif(bemins_image_single_product()->product_layout_thumb == "clean"){ ?>
	<div class="image-additional slick-carousel have-variation" data-slidestoscroll="true" data-dots="true" data-nav="true" data-dots="true" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns="1">
		<div class="img-thumbnail woocommerce-product-gallery__image">
			<a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" href="<?php echo esc_url($image_feature_url);?>">
				<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($image_feature_url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
			</a>
		</div>
		<?php
		if($image){
			foreach ($image_urls as $url) { 
			?>
			<div class="img-thumbnail">
				<a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" href="<?php echo esc_url($url);?>">
					<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
				</a>
			</div>
			<?php }
		}
		?>
	</div>
<?php }else{ ?>
	<div class="image-additional slick-carousel have-variation" <?php if(bemins_image_single_product()->show_thumb == 'show') { ?> data-asnavfor=".image-thumbnail"<?php } ?> data-fade="true" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns="1" data-nav="true">
		<div class="img-thumbnail woocommerce-product-gallery__image">
			<a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" href="<?php echo esc_url($image_feature_url);?>">
				<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($image_feature_url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
			</a>
		</div>
		<?php
		if($image){
			foreach ($image_urls as $url) { 
			?>
			<div class="img-thumbnail">
				<a data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="image-additional" href="<?php echo esc_url($url);?>">
					<img id="image" class="attachment-shop_single size-shop_single wp-post-image" src="<?php echo esc_url($url);?>" alt="<?php echo esc_attr__('variation image','bemins') ?>" />
				</a>
			</div>
			<?php }
		}
		?>
	</div>
<?php } ?>