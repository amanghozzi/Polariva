<?php $j = 1;$count = $list->post_count; ?>
<?php while($list->have_posts()): $list->the_post();
	global $product, $post, $wpdb, $average;
?>
	<?php if( ($j == 1) ||  ( $j % $item_row  == 1 ) || ( $item_row == 1 )) { ?>
		<div class="item <?php echo $class_col;?>">
	<?php } ?>
	<div class="item-product">
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
	</div>
	<?php  } $j++;?>
<?php endwhile; wp_reset_postdata(); ?>