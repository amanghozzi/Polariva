<?php
$arr = array('br' => array(), 'p' => array(), 'span' => array());
$widget_id = isset( $widget_id ) ? $widget_id : 'bwp_woo_slider_'.rand().time();
$count = $list->post_count;
$j = 1;
do_action( 'before' ); 
if ( $list -> have_posts() ){ ?>
	<div id="<?php echo $widget_id; ?>" class="bwp_product_list <?php if(!empty($show_clipped)) echo 'clipped-content-show'; ?> <?php if ($show_nav !== 'false') { echo esc_attr($navigational_style);} ?> <?php echo esc_attr($layout); ?> <?php if(empty($title1)) echo 'no-title'; ?>">
		<?php if($title1) { ?>
			<div class="title-block">   
				<h2><?php echo wp_kses( $title1,$arr); ?></h2>
				<?php if($description) { ?>
					<div class="description"><?php echo wp_kses( $description,$arr); ?></div>
				<?php } ?> 
			</div> 
		<?php } ?>
		<div class="list-product">
			<div class="product-content">
				<div class="content-product-list">	
					<div class="slider products-list grid slick-carousel" data-slidesToScroll="true" data-autoplay="<?php echo esc_attr($show_autoplay);?>" data-dots="<?php echo esc_attr($show_pag);?>"  data-nav="<?php echo esc_attr($show_nav);?>" data-columns4="<?php echo $columns4; ?>" data-columns3="<?php echo $columns3; ?>" data-columns2="<?php echo $columns2; ?>" data-columns1="<?php echo $columns1; ?>" data-columns1440="<?php echo $columns1440; ?>" data-columns="<?php echo $columns; ?>">	
						<?php while($list->have_posts()): $list->the_post();global $product, $post, $wpdb, $average; ?>
							<?php if( ($j == 1) || ( $j % $item_row  == 1 ) || ( $item_row == 1 )) { ?>
								<div class="item-product">
							<?php } ?>
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
							<?php if( ($j == $count) || ($j % $item_row == 0) || ($item_row == 1)){?> 
								</div><!-- #post-## -->
							<?php  } $j++;?>
							<?php endwhile; wp_reset_postdata();?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
?>