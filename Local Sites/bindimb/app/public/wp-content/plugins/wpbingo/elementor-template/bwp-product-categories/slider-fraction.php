<?php  
if( $category == '' ){
	return ;
}
$item_row = (isset($item_row) && $item_row) ? $item_row : 1;
$show_name = (isset($show_name) && $show_name) ? $show_name : 'true';
if( !is_array( $category ) ){
	$category = explode( ',', $category );
}
if (is_array($category)) {
	$count = count($category);
}
$widget_id = isset( $widget_id ) ? $widget_id : 'category_slide_'.rand().time();
$arr = array('br' => array(), 'p' => array(), 'span' => array());
?>
<div id="<?php echo $widget_id; ?>" class="bwp-woo-categories <?php if(!empty($show_clipped)) echo 'clipped-content-show'; ?> <?php if ($show_nav !== 'false') { echo esc_attr($navigational_style);} ?> <?php echo esc_attr($layout); ?>">
	<div class="wpbingo-section__content">
		<div class="content-left">	
			<div class="box-title">
				<?php if( $title1) : ?>
					<h3 class="bwp-categories-title"><?php echo wp_kses( $title1,$arr); ?></h3>
				<?php endif; ?>
				<?php if( $description) : ?>
					<div class="bwp-categories-description">
						<?php if(isset($description) && $description){?>						
							<?php echo $editor_content; ?>						
						<?php }?>
					</div>	
				<?php endif;?>
			</div>
			<div class="pagination-fraction">
				<button class="btn prev"><i class="icon-arrow-left"></i></button>
					<div class="slider-pagination-fraction">	
						<span class="pagination-current"><?php echo esc_html__('1', 'wpbingo'); ?></span>
						<?php echo esc_html__('/', 'wpbingo'); ?> 
						<span class="pagination-total"><?php echo esc_attr($count); ?></span>
					</div>
				<button class="btn next"><i class="icon-arrow-right"></i></button>
			</div>
		</div>
		<div class="content-right">
			<div class="content-category slick-carousel" data-slidestoscroll="false" data-columns4="<?php echo $columns4; ?>" data-columns3="<?php echo $columns3; ?>" data-columns2="<?php echo $columns2; ?>" data-columns1="<?php echo $columns1; ?>" data-columns1440="<?php echo $columns1440; ?>" data-columns="<?php echo $columns; ?>">
				<?php
					foreach( $category as $j => $cat ){
						$term = get_term_by('slug', $cat, 'product_cat');
						if($term) :		
							$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
							$thumbnail_id1 = get_term_meta( $term->term_id, 'thumbnail_id1', true );
							$icon_category = get_term_meta( $term->term_id, 'category_icon', true );
							$thumb = wp_get_attachment_url( $thumbnail_id );
							if(!$thumb)
								$thumb = wc_placeholder_img_src();
							
							$thumb1 = $thumbnail_id1;
							if(!$thumb1)
								$thumb1 = wc_placeholder_img_src();
							?>
							<?php if( ( $j % $item_row ) == 0 ) { ?>
								<div class="item item-product-cat">	
							<?php } ?>
								<div class="item-product-cat-content">
									<?php if(isset($show_thumbnail) && $show_thumbnail) : ?>
										<a href="<?php echo get_term_link( $term->term_id, 'product_cat' ); ?>">
											<div class="item-image<?php if ($image_hover) { ?> elementor-animation-<?php echo esc_attr($image_hover); } ?>">
												<?php if($thumb) : ?>
													<img class="fade-in lazyload" src="<?php echo esc_url($thumb); ?>" alt="<?php echo $term->slug ;?>" />
												<?php endif ; ?>
											</div>
										</a>
									<?php endif;?>
									<?php if(isset($show_thumbnail1) && $show_thumbnail1) : ?>
										<a href="<?php echo get_term_link( $term->term_id, 'product_cat' ); ?>">
											<div class="item-thumbnail<?php if ($image_hover) { ?> elementor-animation-<?php echo esc_attr($image_hover); } ?>">
												<img class="fade-in lazyload" src="<?php echo esc_url($thumb1); ?>" alt="<?php echo $term->slug ;?>" />
											</div>
										</a>
									<?php endif;?>
									<div class="product-cat-content-info">
										<div class="info">
											<?php if($show_name || $show_count) : ?>
												<h2 class="item-title">
													<a href="<?php echo get_term_link( $term->term_id, 'product_cat' ); ?>">
														<?php echo esc_html( $term->name ); ?>
														<?php if(isset($show_count) && $show_count) : ?>
															<span class="item-count">
																<?php
																	if ($term->count == 1) {
																		echo esc_attr($term->count);
																	} elseif ($term->count > 1) {
																		echo esc_attr($term->count);
																	} else {
																		echo esc_html__('0', 'wpbingo');
																	}
																?>
															</span>
														<?php endif;?>
													</a>
												</h2>
											<?php endif;?>
										</div>
									</div>
								</div>
							<?php if( ( $j+1 ) % $item_row == 0 || ( $j+1 ) == count($category) ){?> 
								</div>
							<?php  } ?>
						<?php endif; ?>		
				<?php } ?>
			</div>
		</div>
	</div>
</div>