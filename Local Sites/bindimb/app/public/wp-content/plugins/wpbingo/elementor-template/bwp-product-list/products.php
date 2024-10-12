<?php if ( $wp_query->have_posts() ) : ?>
		<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
			<div class="item-product <?php echo esc_attr($attributes); ?>">
			<?php
				$template_path = WPBINGO_ELEMENTOR_TEMPLATE_PATH . 'content-product' . esc_attr($style_product) . '.php';
				if (file_exists($template_path)) {
					include($template_path);
				} else {
					include(WPBINGO_ELEMENTOR_TEMPLATE_PATH . 'content-product.php');
				}
			?>
			</div>
		<?php endwhile;
endif; ?>	
