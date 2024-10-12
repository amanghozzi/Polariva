<?php
	use Elementor\Icons_Manager;
?>
<div class="bwp-cta <?php echo esc_attr($layout); ?>">
	<?php if ( ! empty( $settings['icon'] ) || ! empty( $settings['selected_icon']['value'] ) ) : ?>
		<div class="icon-cta">
			<?php
				if ( $is_new || $migrated ) {
					Icons_Manager::render_icon( $icon_svg );
				} else {
					echo '<i class="' . esc_attr( $icon ) . '" aria-hidden="true"></i>';
				}
			?>
		</div>
	<?php endif; ?>
	<?php if( $count || $count_suffix) : ?>
		<div class="content">
			<h2 class="count-cta">
				<span class="counter-number"><?php echo esc_html($count); ?></span>
				<?php if($count_suffix) : ?>
					<span class="counter-number-suffix"><?php echo esc_html($count_suffix); ?></span>
				<?php endif; ?>
			</h2>
			<?php if($subtitle) : ?>
				<div class="subtitle-cta"><?php echo esc_html($subtitle); ?></div>
			<?php endif; ?>
			<?php if($title1) : ?>
				<h3 class="title-cta"><?php echo esc_html($title1); ?></h3>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</div><!-- .bwp-cta -->