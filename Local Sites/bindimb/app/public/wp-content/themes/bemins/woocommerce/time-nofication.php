<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$time_nofication = bemins_get_config('time-nofication',false);
$start_time	= bemins_get_config('time-nofication-start',5);
$stay_time	= bemins_get_config('time-nofication-stay',5);
$products	= bemins_get_config('time-nofication-products','');
$users	= bemins_get_config('time-nofication-user','');
$ranges	= bemins_get_config('time-nofication-range','');
?>
<?php if($time_nofication){ ?>
<div class="sale-nofication" data-start="<?php echo esc_attr($start_time); ?>"
							data-stay="<?php echo esc_attr($stay_time); ?>"
							data-products="<?php echo esc_attr($products); ?>"
							data-users="<?php echo esc_attr($users); ?>"
							data-ranges="<?php echo esc_attr($ranges); ?>"
							>
	<div class="notification-card">
		<div class="notification-container">
			<div class="notification-image">
				<a href="#"><img id="image" src=""></a>
			</div>
			<div class="notification-content">
				<div class="notification-purchased">
					<span class="name"></span> <?php echo esc_html__("purchased","bemins"); ?>
				</div>
				<div class="product-title"><a href="#"></a></div>
				<div class="suggest">
					<div class="time-suggest"></div>
					<div class="verified"><?php echo esc_html__("verified","bemins"); ?></div>
				</div>
			</div>
		</div>
		<div class="close-notification"><i class="feather-x"></i></div>
		<div class="scroll-notification"></div>
	</div>
</div>
<?php } ?>