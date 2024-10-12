<?php   
if( $select_category || $checkbox_order){	
	$numberposts = (int)$numberposts;
	$count_loadmore = ceil($numberposts/$numberposts);
	$class_col_lg = ($columns == 5) ? '2-4'  : (12/$columns);
	$class_col_md = ($columns1 == 5) ? '2-4'  : (12/$columns1);
	$class_col_sm = ($columns2 == 5) ? '2-4'  : (12/$columns2);
	$class_col_xs = ($columns3 == 5) ? '2-4'  : (12/$columns3);
	$class_col = 'col-xl-'.$class_col_lg .' col-lg-'.$class_col_md .' col-md-'.$class_col_sm .' col-'.$class_col_xs;
?>
<div class="bwp-filter-homepage <?php echo esc_attr($layout); ?>" <?php if($style_product > 1) { ?>data-content_product="<?php echo esc_attr($style_product) ?>"<?php } ?> data-class_col = "<?php echo esc_attr($class_col); ?>" data-numberposts = "<?php echo esc_attr($numberposts); ?>"  data-showmore="<?php echo esc_attr($numberposts); ?>">
	<div class="bwp-filter-heading">
		<?php if(isset($title1) && $title1) { ?>
		<div class="title-block">
			<h2><?php echo esc_html($title1); ?></h2>
		</div>
		<?php } ?>
		<div class="filter-order-by">
			<ul class="filter-orderby">
				<?php $i=0; foreach($checkbox_order as $option){
					$tab_title = '';						
					switch ($option) {
						case 'date':
							$tab_title = __( 'Latest Products', "wpbingo" );
						break;
						case 'popularity':
							$tab_title = __( 'Best Sellers', "wpbingo" );
						break;						
						case 'featured':
							$tab_title = __( 'Featured Products', "wpbingo" );
						break;
						case 'rating':
							$tab_title = __( 'Top Rating', "wpbingo" );
						break;
				} ?>			
				<li data-value="<?php echo esc_attr($option); ?>" <?php if($i == 0) echo 'class="active"'?>><span><?php echo $tab_title; ?></span></li>
				<?php $i++;} ?>				
			</ul>
		</div>
	</div>
	<div class="bwp-filter-content">
		<?php
			$select_order = (isset($checkbox_order[0]) && $checkbox_order[0]) ? $checkbox_order[0] : 'date';
			$args = array(
				'post_type' 			=> 'product',
				'post_status' 			=> 'publish',
				'posts_per_page' 		=> $numberposts,	
			);
			$tax_query = array();
			if($select_category != 'all'){
				$tax_query[] = array(
								'taxonomy'	=> 'product_cat',
								'field'		=> 'slug',
								'terms'		=> $select_category );
			}
			$meta_query = array();
			switch ($select_order) {
				case 'date':
					$args['orderby']	= 'date';
				break;
				case 'rating':
					add_filter( 'posts_clauses',  'order_by_rating_post_clauses'  );				
				break;
				case 'popularity':
					$args['meta_key']	= 'total_sales';
					$args['orderby']	= 'meta_value_num';
				break;
				case 'featured':
					$product_visibility_term_ids = wc_get_product_visibility_term_ids();
					$tax_query[] = 	array(
										'taxonomy' => 'product_visibility',
										'field'    => 'term_taxonomy_id',
										'terms'    => $product_visibility_term_ids['featured'],
									);			
				break;
			}
			$args['tax_query'] = $tax_query;
			$args['meta_query'] = $meta_query;	
			$list = new WP_Query( $args );
			$args['posts_per_page'] = -1;
			$list_total = new WP_Query( $args );
			$total = $list_total->post_count;
		?>
		<div class="content products-list grid row">
			<?php while($list->have_posts()): $list->the_post();
				global $product, $post, $wpdb, $average; ?>
				<div class="item <?php echo $class_col; ?>">
					<?php
						$template_path = WPBINGO_ELEMENTOR_TEMPLATE_PATH . 'content-product' . $style_product . '.php';
						if (file_exists($template_path)) {
							include($template_path);
						} else {
							include(WPBINGO_ELEMENTOR_TEMPLATE_PATH . 'content-product.php');
						}
					?>
				</div>
			<?php endwhile; wp_reset_postdata();?>
		</div>
	</div>
	<div class="products_loadmore" <?php if($numberposts >= $total) echo 'style="display:none;"' ?>>
		<button type="button" class="btn btn-default loadmore" name="loadmore">
			<strong class="lds-ellipsis"><strong></strong><strong></strong><strong></strong><strong></strong></strong>
			<span class="loadmore-button-text"><?php echo esc_html__('Load more', 'wpbingo'); ?></span>
		</button>
		<input type="hidden" data-default = "<?php echo esc_attr($count_loadmore + 1); ?>" value="<?php echo esc_attr($count_loadmore + 1); ?>" class="count_loadmore" />
	</div>	
</div>
<?php } ?>