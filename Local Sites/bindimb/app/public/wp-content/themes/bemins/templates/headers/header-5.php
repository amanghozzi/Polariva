<?php 
	$bemins_settings = bemins_global_settings();
	$cart_layout = bemins_get_config('cart-layout','dropdown');
	$cart_style = bemins_get_config('cart-style','light');
	$show_minicart = get_theme_mod('icon_cart_5', true);
	$show_searchform = get_theme_mod('icon_search_5', true);
	$show_wishlist = get_theme_mod('icon_wishlist_5', true);
	$show_account = get_theme_mod('icon_account_5', true);
	$sticky_header = (isset($bemins_settings['enable-sticky-header']) && $bemins_settings['enable-sticky-header']) ? ($bemins_settings['enable-sticky-header']) : false;
	if(get_theme_mod('header_order_5')){
		$header_order_5 = get_theme_mod('header_order_5','');
		$arr_header_order = explode("-", get_theme_mod('header_order_5', ''));
	}else{
		$header_order_5 = 'logo-menu-icons';
		$arr_header_order = explode("-", 'logo-menu-icons');
	}
	if(get_theme_mod('topbar_order_5')){
		$arr_topbar_order = explode("-", get_theme_mod('topbar_order_5', ''));
	}else{
		$arr_topbar_order = explode("-", 'topbar1-topbar3');
	}
?>
<header id='bwp-header' class="bwp-header header-v5<?php if(get_theme_mod('header_absolute_5', false)) { ?> header-absolute<?php } ?>">
	<?php bemins_campbar(); ?>
	<?php if(get_theme_mod('top_bar_5', false)) { ?>
		<div id="bwp-topbar" class="topbar-v2<?php if(!get_theme_mod('topbar_mobile','')) { ?> hidden-md hidden-sm hidden-xs<?php } ?>">
			<div class="topbar-inner">
				<div class="container">
					<div class="topbar-container">
						<?php foreach ($arr_topbar_order as $value) { 
							switch ($value) {
							case 'topbar1': ?>
								<?php if(get_theme_mod('content_left_top_bar_5', '')) { ?>
									<div class="topbar-left">
										<?php echo get_theme_mod('content_left_top_bar_5', ''); ?>
									</div>
								<?php } ?>
							<?php break;
							case 'topbar2': ?>
								<?php if(get_theme_mod('content_center_top_bar_5', 'content topbar 5')) { ?>
									<div class="topbar-center">
										<?php echo get_theme_mod('content_center_top_bar_5', 'content topbar 5'); ?>
									</div>
								<?php } ?>
							<?php break;
							case 'topbar3': ?>
								<?php if(get_theme_mod('content_right_top_bar_5', '')) { ?>
									<div class="topbar-right">
										<?php echo get_theme_mod('content_right_top_bar_5', ''); ?>
									</div>
								<?php } ?>
							<?php break;
							case 'social': ?>
								<?php if(get_theme_mod('social_5', '') && shortcode_exists("social_link")) { ?>
									<div class="social-link_topbar">
										<?php echo do_shortcode ("[social_link]") ?>
									</div>
								<?php } ?>
							<?php break;
							case 'shortcode': ?>
								<?php if(get_theme_mod('shortcode_5', '')) { ?>
									<div class="shortcode_topbar">
										<?php echo do_shortcode (get_theme_mod('shortcode_5','')); ?>
									</div>
								<?php } ?>
							<?php break; default: ?>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php bemins_menu_mobile(); ?>
	<div class="header-desktop">
		<div class='header-wrapper' data-sticky_header="<?php echo esc_attr($bemins_settings['enable-sticky-header']); ?>">
			<div class="container">
				<div class="header-container <?php echo esc_attr($header_order_5); ?> <?php echo get_theme_mod('menu_pos_5','menu-left'); ?>">
					<?php foreach ($arr_header_order as $value) {
						switch ($value) {
							case 'logo': ?>
								<div class="header-logo <?php echo get_theme_mod('logo_pos_5', 'text-left'); ?>">
									<?php bemins_header_logo(); ?>
								</div>
							<?php break;
							case 'menu': ?>
								<div class="header-menu <?php echo get_theme_mod('menu_pos_5','menu-left'); ?>">
									<div class="wpbingo-menu-mobile">
										<div class="header-menu-bg">
											<?php bemins_top_menu(); ?>
										</div>
									</div>
								</div>
							<?php break;
							case 'icons': ?>
								<?php if(($show_account || $show_minicart || $show_wishlist || $show_searchform || is_active_sidebar('top-link')) && class_exists( 'WooCommerce' ) ){ ?>
									<div class="header-icon <?php echo get_theme_mod('icons_pos_5', 'text-right'); ?>">
										<div class="header-page-link">
											<!-- Begin Search -->
											<?php if($show_searchform){ ?>
												<div class="search-box search-dropdown">
													<div class="search-toggle"><i class="icon-search"></i></div>
												</div>
											<?php } ?>
											<!-- End Search -->
											<?php if($show_account){ ?>
												<div class="login-header">
													<?php if (is_user_logged_in()) { ?>
														<?php if(is_active_sidebar('top-link')){ ?>
															<div class="block-top-link">
																<?php dynamic_sidebar( 'top-link' ); ?>
															</div>
														<?php } ?>
													<?php }else{ ?>
														<a class="active-login" href="#" ><i class="icon-account"></i></a>
														<?php if( !is_account_page() ) {bemins_login_form();} ?>
													<?php } ?>
												</div>
											<?php } ?>
											<?php if($show_wishlist && class_exists( 'WPCleverWoosw' )){ ?>
											<div class="wishlist-box">
												<a href="<?php echo WPcleverWoosw::get_url(); ?>">
													<i class="icon-wishlist"></i>
													<span class="count-wishlist"><?php echo WPcleverWoosw::get_count(); ?></span>
												</a>
											</div>
											<?php } ?>
											<?php if($show_minicart && class_exists( 'WooCommerce' )){ ?>
												<div class="remove-cart-shadow"></div>
												<div class="bemins-topcart bemins-topcart-desktop <?php echo esc_attr($cart_layout); ?> <?php echo esc_attr($cart_style); ?>">
													<?php get_template_part( 'woocommerce/minicart-ajax' ); ?>
												</div>
											<?php } ?>
										</div>
									</div>
								<?php } ?>
							<?php break; default: ?>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</header><!-- End #bwp-header -->