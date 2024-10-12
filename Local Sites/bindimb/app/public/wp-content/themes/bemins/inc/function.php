<?php
	function bemins_get_config($option,$default='1'){
		$bemins_settings = bemins_global_settings();
		$query_string = bemins_get_query_string();
		parse_str($query_string, $params);
		if(isset($params[$option]) && $params[$option]){
			return $params[$option];
		}else{
			$value = isset($bemins_settings[$option]) ? $bemins_settings[$option] : $default;
			return $value;
		}
	}
	function bemins_get_query_string(){
		global $wp_rewrite;
		$request = remove_query_arg( 'paged' );
		$home_root = esc_url(home_url());
		$home_root = parse_url($home_root);
		$home_root = ( isset($home_root['path']) ) ? $home_root['path'] : '';
		$home_root = preg_quote( $home_root, '|' );
		$request = preg_replace('|^'. $home_root . '|i', '', $request);
		$request = preg_replace('|^/+|', '', $request);
		$request = preg_replace( "|$wp_rewrite->pagination_base/\d+/?$|", '', $request);
		$request = preg_replace( '|^' . preg_quote( $wp_rewrite->index, '|' ) . '|i', '', $request);
		$request = ltrim($request, '/');
		$qs_regex = '|\?.*?$|';
		preg_match( $qs_regex, $request, $qs_match );
		if ( !empty( $qs_match[0] ) ) {
			$query_string = $qs_match[0];
			$query_string = str_replace("?","",$query_string);
		} else {
			$query_string = '';
		}
		return 	$query_string;
	}
	function bemins_global_settings(){
		global $bemins_settings;
		return $bemins_settings;
	}
	function bemins_limit_verticalmenu(){
		global $bemins_page_id;
		$vertical = new stdClass;
		$max_number_1530	= bemins_get_config('max_number_1530',12);
		$vertical->max_number_1530 	= (get_post_meta( $bemins_page_id, 'max_number_1530', true )) ? get_post_meta($bemins_page_id, 'max_number_1530', true ) : $max_number_1530;
		
		$max_number_1200	= bemins_get_config('max_number_1200',8);
		$vertical->max_number_1200  	= (get_post_meta( $bemins_page_id, 'max_number_1200', true )) ? get_post_meta($bemins_page_id, 'max_number_1200', true ) : $max_number_1200;
		
		$max_number_991		= bemins_get_config('max_number_991',6);
		$vertical->max_number_991  	= (get_post_meta( $bemins_page_id, 'max_number_991', true )) ? get_post_meta($bemins_page_id, 'max_number_991', true ) : $max_number_991;
		
		return $vertical;
	}
	if ( ! function_exists( 'bemins_popup_newsletter' ) ) {
		function bemins_popup_newsletter() {
			$bemins_settings = bemins_global_settings();
			echo '<div id="newsletterpopup" class="bingo-modal newsletterpopup">';
			echo '<div class="newsletterpopup_overlay"></div>';
			echo '<div class="wp-newsletter">';
				if(isset($bemins_settings['background_newsletter_img']['url']) && !empty($bemins_settings['background_newsletter_img']['url'])){
					echo '<div class="image"> <img src='.esc_url($bemins_settings['background_newsletter_img']['url']).' alt="'.esc_attr__( 'Image Newsletter','bemins' ).'"></div>';
				}
				echo '<div class="newsletter-content">';
					echo '<div class="close-popup"><span class="close-wrap"><span class="close-line close-line1"></span><span class="close-line close-line2"></span></span></div>';
					dynamic_sidebar('newsletter-popup-form');
				echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	}
	function bemins_config_font(){
		$config_fonts = array();
		$text_fonts = array(
			'family_font_body',
			'family_font_custom',
			'h1-font',
			'h2-font',
			'h3-font',
			'h4-font',
			'h5-font',
			'h6-font',
			'class_font_custom'
		);
		foreach ($text_fonts as $text) {
			if(bemins_get_config($text))
				$config_fonts[$text] = bemins_get_config($text);
		}
		return $config_fonts;
	}
	function bemins_get_class(){
		$class = new stdClass;
		$sidebar_left_expand 		= bemins_get_config('sidebar_left_expand',3);
		$sidebar_left_expand_md 	= bemins_get_config('sidebar_left_expand_md',3);
		$class->class_sidebar_left  = 'col-xl-'.$sidebar_left_expand.' col-lg-'.$sidebar_left_expand_md.' col-md-12 col-12';
		$sidebar_right_expand 		= bemins_get_config('sidebar_right_expand',3);
		$sidebar_right_expand_md 	= bemins_get_config('sidebar_right_expand_md',3);
		$class->class_sidebar_right  = 'col-xl-'.$sidebar_right_expand.' col-lg-'.$sidebar_right_expand_md.' col-md-12 col-12';
		$sidebar_blog = bemins_blog_sidebar();
		if($sidebar_blog == 'left' && is_active_sidebar('sidebar-blog')){
			$blog_content_expand = 12- $sidebar_left_expand;
			$blog_content_expand_md = 12- $sidebar_left_expand_md;
		}elseif($sidebar_blog == 'right' && is_active_sidebar('sidebar-blog')){
			$blog_content_expand = 12- $sidebar_right_expand;
			$blog_content_expand_md = 12- $sidebar_right_expand_md;
		}else{
			$blog_content_expand = 12;
			$blog_content_expand_md = 12;
		}
		$class->class_blog_content  = 'col-xl-'.$blog_content_expand.' col-lg-'.$blog_content_expand_md.' col-md-12 col-12';		
		$post_single_layout = bemins_post_sidebar();
		if($post_single_layout == 'sidebar' && is_active_sidebar('sidebar-blog')){
			$blog_single_expand = 12- $sidebar_left_expand;
			$blog_single_expand_md = 12- $sidebar_left_expand_md;
		}else{
			$blog_single_expand = 12;
			$blog_single_expand_md = 12;
		}
		$class->class_single_content  = 'col-xl-'.$blog_single_expand.' col-lg-'.$blog_single_expand_md.' col-md-12 col-12';		
		$category_style = bemins_get_config('category_style','sidebar');
		if($category_style == 'sidebar' && is_active_sidebar('sidebar-product')){
			$product_content_expand = 12- $sidebar_left_expand;
			$product_content_expand_md = 12- $sidebar_left_expand_md;
		}else{
			$product_content_expand = 12;
			$product_content_expand_md = 12;
		}
		$class->class_product_content  = 'col-xl-'.$product_content_expand.' col-lg-'.$product_content_expand_md.' col-md-12 col-12';		
		$blog_col_large 	= 12/(bemins_get_config('blog_col_large',3));
		$blog_col_medium = 12/(bemins_get_config('blog_col_medium',3));
		$blog_col_sm 	= 12/(bemins_get_config('blog_col_sm',3));
		$class->class_item_blog = 'col-xl-'.$blog_col_large.' col-lg-'.$blog_col_medium.' col-md-'.$blog_col_sm.' col-sm-12 col-12';
		return $class;
	}
	function bemins_post_sidebar(){
		$post_single_layout = bemins_get_config('post-single-layout','sidebar');
		return 	$post_single_layout;
	}
	function bemins_blog_view(){
		$blog_view = bemins_get_config('layout_blog','standar');
		return 	$blog_view;
	}
	function bemins_blog_sidebar(){
		$sidebar 		= bemins_get_config('sidebar_blog','left');
		return 	$sidebar;
	}	
	function bemins_is_customize(){
		return isset($_POST['customized']) && ( isset($_POST['customize_messenger_chanel']) || isset($_POST['wp_customize']) );
	}
	if ( ! function_exists( 'bemins_search_form' ) ) {
		function bemins_search_form( $form ) {
			$form = '<form role="search" method="get" id="searchform" class="search-from" action="' . esc_url(home_url( '/' )) . '" >
						<div class="container">
							<div class="form-content">
								<input type="text" value="' . esc_attr(get_search_query()) . '" name="s"  class="s" placeholder="' . esc_attr__( 'Search...', 'bemins' ) . '" />
								<button id="searchsubmit" class="btn" type="submit">
									<i class="icon-search"></i>
									<span>' . esc_html__( 'Search', 'bemins' ) . '</span>
								</button>
							</div>
						</div>
					  </form>';
			return $form;
		}
	}
	add_filter( 'get_search_form', 'bemins_search_form' );
	// Remove each style one by one
	add_filter( 'woocommerce_enqueue_styles', 'bemins_jk_dequeue_styles' );
	function bemins_jk_dequeue_styles( $enqueue_styles ) {
		unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
		unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
		unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
		return $enqueue_styles;
	}
	// Or just remove them all in one line
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );					
	function bemins_woocommerce_breadcrumb( $args = array() ) {
		$args = wp_parse_args( $args, apply_filters( 'woocommerce_breadcrumb_defaults', array(
			'delimiter'   => '<span class="delimiter"></span>',
			'wrap_before' => '<div class="breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '>',
			'wrap_after'  => '</div>',
			'before'      => '',
			'after'       => '',
			'home'        => _x( 'Home', 'breadcrumb', 'bemins' )
		) ) );
		$breadcrumbs = new WC_Breadcrumb();
		if ( $args['home'] ) {
			$breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
		}
		$args['breadcrumb'] = $breadcrumbs->generate();
		wc_get_template( 'global/breadcrumb.php', $args );
	}
	add_filter('woocommerce_add_to_cart_fragments', 'bemins_woocommerce_header_add_to_cart_fragment');
	function bemins_woocommerce_header_add_to_cart_fragment( $fragments )
	{
	    global $woocommerce;
	    ob_start(); 
	    get_template_part( 'woocommerce/minicart-ajax' );
	    $fragments['.mini-cart'] = ob_get_clean();
	    return $fragments;
	}
	function bemins_display_view(){
		echo bemins_grid_list();
    }
	if ( ! function_exists( 'bemins_grid_list' ) ) {
		function bemins_grid_list(){
			$active_column_2 = $active_column_3 = $active_column_4 = $active_list = '';
			$product_col_large = bemins_get_config('product_col_large',4);
			$category_view_mode = bemins_category_view();
			$query_string = '?'.bemins_get_query_string();
			$product_col_medium = 12 /(bemins_get_config('product_col_medium',3));
			$product_col_sm 	= 12 /(bemins_get_config('product_col_sm',1));
			$product_col_xs 	= 12 /(bemins_get_config('product_col_xs',1));
			$class_item_product = 'col-lg-'.$product_col_medium.' col-md-'.$product_col_sm.' col-'.$product_col_xs;
			if($category_view_mode == 'grid'){
				$active_column_2 = ($product_col_large == 2 ) ? 'active' : '';
				$active_column_3 = ($product_col_large == 3 ) ? 'active' : '';
				$active_column_4 = ($product_col_large == 4 ) ? 'active' : '';			
			}else{
				$active_list = ($category_view_mode == 'list') ? 'active' : '';
			}
			$query_grid_string = add_query_arg( 'category-view-mode', 'grid', $query_string );
			$html = '<ul class="display hidden-sm hidden-xs">
					<li>
						<a data-col="col-xl-6 '.esc_attr($class_item_product).'" class="view-grid two '.esc_attr($active_column_2).'" href="'. add_query_arg('product_col_large', '2', $query_grid_string).'"><span></span><span></span></a>
					</li>
					<li>
						<a data-col="col-xl-4 '.esc_attr($class_item_product).'" class="view-grid three '.esc_attr($active_column_3).'" href="'. add_query_arg('product_col_large', '3', $query_grid_string).'"><span></span><span></span><span></span></a>
					</li>
					<li>
						<a data-col="col-xl-3 '.esc_attr($class_item_product).'" class="view-grid four '.esc_attr($active_column_4).'" href="'. add_query_arg('product_col_large', '4', $query_grid_string).'"><span></span><span></span><span></span><span></span></a>
					</li>
					<li>
						<a class="view-list '.esc_html($active_list).'" href="'. add_query_arg('category-view-mode', 'list', $query_string).'"><span></span><span></span><span></span></a>
					</li>
				</ul>';
			return $html;
		}
	}
	function bemins_category_view(){
		$id_category =  is_tax() ? get_queried_object()->term_id : 0;
		$category_view = get_term_meta( $id_category, 'category_view', true );
		if( $category_view &&  $id_category != 0 ){
			$category_view_mode = $category_view;
		}else{
			$category_view_mode 		= bemins_get_config('category-view-mode','grid');	
		}
		return 	$category_view_mode;
	}	
	function bemins_main_menu($id,$name,$layout = "") {
		global $bemins_settings, $post;
		$show_cart = $show_wishlist = false;
		if ( isset($bemins_settings['show_cart']) ) {
		$show_cart            = $bemins_settings['show_cart'];
		}
		if ( isset($bemins_settings['show_wishlist']) ) {
		$show_wishlist            = $bemins_settings['show_wishlist'];
		}
		$vertical_header_text = (isset($bemins_settings['vertical_header_text']) && $bemins_settings['vertical_header_text']) ? $bemins_settings['vertical_header_text'] : '';
		$page_menu = $menu_output = $menu_full_output = $menu_with_search_output = $menu_float_output = $menu_vert_output = "";
		$main_menu_args = array(
			'echo'            => false,
			'theme_location' => $name,
			'walker' => new bemins_mega_menu_walker,
		);
		$menu_output .= '<nav id="'.$id.'" class="std-menu clearfix">'. "\n";
		if(function_exists('wp_nav_menu')) {
			if (has_nav_menu('main_navigation')) {
				$menu_output .= wp_nav_menu( $main_menu_args );
			}
			else {
				if(is_user_logged_in()){
					$menu_output .= '<div class="no-menu">'. esc_html__("Please assign a menu to the Main Menu in Appearance > Menus", 'bemins').'</div>';
				}
			}
		}
		$menu_output .= '</nav>'. "\n";
		switch ($layout) {
			case 'full':
					$menu_full_output .= '<div class="container">'. "\n";
					$menu_full_output .= '<div class="row">'. "\n";
					$menu_full_output .= '<div class="menu-left">'. "\n";
					$menu_full_output .= $menu_output . "\n";
					$menu_full_output .= '</div>'. "\n";
					$menu_full_output .= '<div class="menu-right">'. "\n";
					$menu_full_output .= '</div>'. "\n";
					$menu_full_output .= '</div>'. "\n";
					$menu_full_output .= '</div>'. "\n";
					$menu_output = $menu_full_output;
				break;
			case 'float':
					$menu_float_output .= '<div class="float-menu">'. "\n";
					$menu_float_output .= $menu_output . "\n";
					$menu_float_output .= '</div>'. "\n";
					$menu_output = $menu_float_output;
				break;
			case 'float-2':
					$menu_float_output .= '<div class="float-menu container">'. "\n";
					$menu_float_output .= $menu_output . "\n";
					$menu_float_output .= '</div>'. "\n";
					$menu_output = $menu_float_output;
				break;				
			case 'vertical':
				$menu_vertical_output .= $menu_output . "\n";
				$menu_vertical_output .= '<div class="vertical-menu-bottom">'. "\n";
				if($vertical_header_text)
				$menu_vertical_output .= '<div class="copyright">'.do_shortcode(stripslashes($vertical_header_text)).'</div>'. "\n";
				$menu_vertical_output .= '</div>'. "\n";
				$menu_output = $menu_vertical_output;
				break;
		}	
		return $menu_output;
	}				
	add_action('admin_enqueue_scripts','bemins_upload_scripts');	
	function bemins_upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
    }		
	function bemins_body_classes( $classes ) {
		if (is_single() || is_page() && !is_front_page()) {
			$classes[] = basename(get_permalink());
		}			
		$type_banner 					= 	bemins_get_config('banners_effect');
		$product_layout_thumb 			= 	bemins_get_config('layout-thumbs');
		$header_overlay					= 	bemins_get_config('header-overlay');
		$single_background 				= 	bemins_get_config('single_background','');
		$show_page_title_bg 			= 	bemins_get_config('show_page_title_bg',false);
		$bg_default 					= 	isset($bemins_settings['page_title_bg']['url']) ? $bemins_settings['page_title_bg']['url'] : "";
		$post_single_layout 			=   bemins_post_sidebar();
		$classes[] 						= 	$type_banner;		
		$direction 						= 	bemins_get_direction(); 
		if($direction && $direction == 'rtl'){
			$classes[] = 'rtl';
		}
		if( $header_overlay == 'show' && $show_page_title_bg == 'show' && ( is_shop() || is_product_category())){
			$classes[] = 'shop-header_overlay';
		}
		if(  function_exists('is_product') && is_single() && is_product()){
			$classes[] = $product_layout_thumb;
		}
		if(is_single() && is_singular( 'post' )){
			$classes[] = 'single-post-'.$post_single_layout;
		}
		return $classes;
	}
	add_filter( 'body_class', 'bemins_body_classes' );
	function bemins_post_classes( $classes ) {
		if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
			$classes[] = 'has-post-thumbnail';
		}
		return $classes;
	}
	add_filter( 'post_class', 'bemins_post_classes' );
	function bemins_get_excerpt($limit = 45, $more_link = true, $more_style_block = false) {
		$bemins_settings = bemins_global_settings();
		if (!$limit) {
			$limit = 45;
		}
		if (has_excerpt()) {
			$content = get_the_excerpt();
		} else {
			$content = get_the_content();
		}
		if($content)
		{
			$check_readmore = false;
			$content = bemins_strip_tags( apply_filters( 'the_content', $content ) );
			$content = explode(' ', $content, $limit);
			if (count($content) >= $limit) {
				$check_readmore = true;
				array_pop($content);
				$content = implode(" ",$content).'... ';
			} else {
				$content = implode(" ",$content);
			}
			$content = '<p class="post-excerpt">'.wp_kses($content,'social').'</p>';
			if ($more_link && $check_readmore) {
				if ($more_style_block) {
					$content .= ' <a class="read-more read-more-block" href="'.esc_url( apply_filters( 'the_permalink', get_permalink() ) ).'">'.esc_html__('Read More', 'bemins').'</a>';
				} else {
					$content .= ' <a class="read-more" href="'.esc_url( apply_filters( 'the_permalink', get_permalink() ) ).'">'.esc_html__('Read More', 'bemins').'</a>';
				}
			}
		}
		return $content;
	}
	function bemins_strip_tags( $content ) {
		$content = str_replace( ']]>', ']]&gt;', $content );
		$content = preg_replace("/<script.*?\/script>/s", "", $content);
		$content = preg_replace("/<style.*?\/style>/s", "", $content);
		$content = strip_tags( $content );
		return $content;
	}
	if( !function_exists( 'bemins_get_direction' ) ) :
	function bemins_get_direction(){
		$direction = bemins_get_config('direction','ltr');		
		if (isset($_COOKIE['bemins_direction_cookie']))
			$direction = $_COOKIE['bemins_direction_cookie'];
		if(isset($_GET['direction']) && $_GET['direction'])
			$direction = $_GET['direction'];
		return 	$direction;
	}
	endif;	
	function bemins_get_entry_content_asset( $post_id ){
		$post = get_post( $post_id );
		$content = apply_filters ("the_content", $post->post_content);
		$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
		if ( ! empty( $video ) ) {
			$html = '';
			foreach ( $video as $video_html ) {
				$html .=   '<div class="video-wrapper">';
					$html .= $video_html;
				$html .= '</div>';
			}
			return $html;
		}
	}
	if ( ! function_exists( 'bemins_loading_overlay' ) ) {
		function bemins_loading_overlay(){
			$bemins_settings 		= bemins_global_settings();
			$gif_loading 			= isset($bemins_settings['gif_loading']['url']) && !empty($bemins_settings['gif_loading']['url']);
			$gif_loading_width	 	= bemins_get_config('gif_loading_width','');
			if(isset($bemins_settings['show-loading-overlay']) && $bemins_settings['show-loading-overlay'] ){ ?>
				<div class="loading-gif">
					<div id="loader-gif" <?php if($gif_loading){ ?> style="background:url('<?php echo esc_url($bemins_settings['gif_loading']['url']); ?>') no-repeat;width:<?php echo esc_attr($gif_loading_width); ?>px;background-size: contain;background-position: center;"<?php } ?>>
					</div>
				</div>
			<?php }
		}
	}
	if ( ! function_exists( 'bemins_header_logo' ) ) {
		function bemins_header_logo(){
			$bemins_settings = bemins_global_settings();
			$sitelogo = (isset($bemins_settings['sitelogo']['url']) && $bemins_settings['sitelogo']['url']) ? $bemins_settings['sitelogo']['url'] : "";
			$page_logo_url = get_post_meta( get_the_ID(), 'page_logo', true );
			$page_logo_url = ($page_logo_url) ? $page_logo_url : $sitelogo; ?>
			<div class="wpbingoLogo">
				<a  href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php if($page_logo_url){ ?>
						<img src="<?php echo esc_url($page_logo_url); ?>" alt="<?php bloginfo('name'); ?>"/>
					<?php }else{
						$logo = get_template_directory_uri().'/images/logo/logo.png'; ?>
						<img src="<?php echo esc_attr( $logo ); ?>" alt="<?php bloginfo('name'); ?>"/>
					<?php } ?>
				</a>
			</div> 
		<?php }
	}
	if ( ! function_exists( 'bemins_top_menu' ) ) {
		function bemins_top_menu(){
			$bemins_settings = bemins_global_settings();
			echo '<div class="wpbingo-menu-wrapper">
				<div class="megamenu">
					<nav class="navbar-default">
						<div  class="bwp-navigation primary-navigation navbar-mega" data-text_close = "'.esc_html__('Close','bemins').'">
							'.bemins_main_menu( 'main-navigation','main_navigation', 'float' ).'
						</div>
					</nav> 
				</div>       
			</div>';
		}
	}
	if ( ! function_exists( 'bemins_top_menu_left' ) ) {
		function bemins_top_menu_left(){
			$bemins_settings = bemins_global_settings();
			echo '<div class="wpbingo-menu-wrapper">
				<div class="megamenu">
					<nav class="navbar-default">
						<div  class="bwp-navigation primary-navigation navbar-mega">
							'.bemins_main_menu( 'menu-left','menu_left','float' ).'
						</div>
					</nav> 
				</div>       
			</div>';
		}	
	}
	if ( ! function_exists( 'bemins_top_menu_right' ) ) {	
		function bemins_top_menu_right(){
			$bemins_settings = bemins_global_settings();
			echo '<div class="wpbingo-menu-wrapper">
				<div class="megamenu">
					<nav class="navbar-default">
						<div  class="bwp-navigation primary-navigation navbar-mega">
							'.bemins_main_menu( 'menu-right','menu_right','float' ).'
						</div>
					</nav> 
				</div>       
			</div>';
		}
	}
	if ( ! function_exists( 'bemins_menu_mostsearch' ) ) {	
		function bemins_menu_mostsearch(){
			$bemins_settings = bemins_global_settings();
			echo '<div class="wpbingo-menu-wrapper">
				<div class="megamenu">
					<nav class="navbar-default">
						<div  class="bwp-navigation primary-navigation navbar-mega" data-text_close = "'.esc_html__('Close','bemins').'">
							'.bemins_main_menu( 'content-mostsearch','content_mostsearch', 'float' ).'
						</div>
					</nav> 
				</div>       
			</div>';
		}
	}
	if ( ! function_exists( 'bemins_navbar_vertical_menu' ) ) {	
		function bemins_navbar_vertical_menu(){
			echo '<div class="wpbingo-verticalmenu-mobile">
				<div class="navbar-header">
					<button type="button" id="show-verticalmenu"  class="navbar-toggle">
						<span>'. esc_html__("Vertical","bemins") .'</span>
					</button>
				</div>
			</div>';
		}
	}
	if ( ! function_exists( 'bemins_vertical_menu' ) ) {	
		function bemins_vertical_menu() {
			global $bemins_settings;
			$menu_output = "";
			$vertical_menu_args = array(
				'echo'            => false,
				'theme_location' => 'vertical_menu',
				'walker' => new bemins_mega_menu_walker,
			);	
			if(function_exists('wp_nav_menu')) {
				if (has_nav_menu('vertical_menu')) {
					$menu_output .=	'<h3 class="widget-title"><i class="fa fa-bars" aria-hidden="true"></i>'.esc_html__('Categories','bemins').'</h3>';
					$menu_output .='<div class="verticalmenu">
						<div  class="bwp-vertical-navigation primary-navigation navbar-mega">
							'.wp_nav_menu( $vertical_menu_args ).'
						</div> 
					</div>';
				}
			}
			
			return $menu_output;
		}
	}
	
	function bemins_dropdown_vertical_menu(){
		global $bemins_page_id;
		$show_vertical_menu  = (get_post_meta( $bemins_page_id, 'show_vertical_menu', true )) ? get_post_meta($bemins_page_id, 'show_vertical_menu', true ) : 'accordion';
		return $show_vertical_menu;
	}	
	
	function bemins_category_post(){
		global $post;
		$obj_category = new stdClass;
		$term_list = wp_get_post_terms($post->ID,'category',array('fields'=>'ids'));
		$cat_id = (int)$term_list[0];
		$category = get_term( $cat_id, 'category' );
		$obj_category->name = $category->name;
		$obj_category->cat_link = get_term_link ($cat_id, 'category');	
		return $obj_category;
	}
	if ( ! function_exists( 'bemins_copyright' ) ) {
		function bemins_copyright(){
			$bemins_settings = bemins_global_settings();?>
			<div class="bwp-copyright">
				<div class="container">		
					<div class="row">
						<?php if(isset($bemins_settings['footer-copyright']) && $bemins_settings['footer-copyright']) : ?>		
							<div class="site-info col-sm-6 col-xs-12">
								<?php echo esc_html($bemins_settings['footer-copyright']); ?>
							</div><!-- .site-info -->
						<?php else: ?>					
							<div class="site-info col-sm-6 col-xs-12">
								<?php echo esc_html__( 'Copyright 2024 ','bemins'); ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__('bemins', 'bemins'); ?></a><?php echo esc_html__( '. All Rights Reserved.','bemins'); ?>
							</div><!-- .site-info -->		
						<?php endif; ?>
						<?php if(isset($bemins_settings['footer-payments']) && $bemins_settings['footer-payments']) : ?>
							<div class="payment col-sm-6 col-xs-12">
								<a href="<?php echo isset($bemins_settings['footer-payments-link']) ? esc_url($bemins_settings['footer-payments-link']) : "#"; ?>">
									<img src="<?php echo isset($bemins_settings['footer-payments-image']['url']) ? esc_url($bemins_settings['footer-payments-image']['url']) : ""; ?>" alt="<?php echo isset($bemins_settings['footer-payments-image-alt']) ? esc_attr($bemins_settings['footer-payments-image-alt']) : ""; ?>" />
								</a>
							</div>		
						<?php endif; ?>	
					</div>
				</div>
			</div>	
			<?php	
		}
	}
	function bemins_render_footer($footer_style){
		$elementor_instance = Elementor\Plugin::instance();
		return $elementor_instance->frontend->get_builder_content_for_display( $footer_style );
	}
	if( !is_admin() ){
		add_filter( 'language_attributes', 'bemins_direction', 20 );
		function bemins_direction( $doctype = 'html' ){
	   		$direction = bemins_get_direction();
	   		if ( ( function_exists( 'is_rtl' ) && is_rtl() ) || $direction == 'rtl' ){
	    		$attribute[] = 'direction="rtl"';
				$attribute[] = 'dir="rtl"';
	    		$attribute[] = 'class="rtl"';
	   		}
	   		( $direction === 'rtl' ) ? $lang = 'ar' : $lang = get_bloginfo('language');
	   		if ( $lang ) {
	   			if ( get_option('html_type') == 'text/html' || $doctype == 'html' )
	    			$attribute[] = "lang=\"$lang\"";
	   			if ( get_option('html_type') != 'text/html' || $doctype == 'xhtml' )
	    			$attribute[] = "xml:lang=\"$lang\"";
	   		}
	   		$bemins_output = implode(' ', $attribute);
	   		return $bemins_output;
		}
	}
	if ( ! function_exists( 'bemins_comment' ) ) {	
		function bemins_comment( $comment, $args, $depth ) {
			if ( 'div' == $args['style'] ) {
				$tag = 'div';
				$add_below = 'comment';
			} else {
				$tag = 'li';
				$add_below = 'div-comment';
			}
			?>
			<div class="media">
				<div class="media-left">
					<?php echo get_avatar( $comment, 70 ); ?>
				</div>
				<div class="media-body">
					<div class="comment-meta media-content commentmetadata">
						<div class="comment-author vcard">
						<?php printf( wp_kses_post( '<h2 class="media-heading">%s</h2>', 'bemins' ), get_comment_author_link() ); ?>
						</div>
						<?php if ( '0' == $comment->comment_approved ) : ?>
						<em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'bemins' ); ?></em>
						<?php endif; ?>
						<div class="media-silver">
							<a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>" class="comment-date">
								<?php echo '<time datetime="' . get_comment_date( 'c' ) . '">' . get_comment_date() . ' ' . esc_attr__( 'at', 'bemins'  ) . ' ' . get_comment_time() . '</time>'; ?>
							</a>
							<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						</div>
						<div id="div-comment-<?php comment_ID() ?>" class="comment-content">
							<div class="comment-text">
							<?php comment_text(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
		}
	}
	function bemins_prefix_kses_allowed_html($allowed_tags, $context) {
		switch($context) {
			case 'social': 
			$allowed_tags = array(
				'a' => array(
					'class' => array(),
					'href'  => array(),
					'rel'   => array(),
					'title' => array(),
				),
				'abbr' => array(
					'title' => array(),
				),
				'b' => array(),
				'blockquote' => array(
					'cite'  => array(),
				),
				'cite' => array(
					'title' => array(),
				),
				'code' => array(),
				'br' => array(),
				'del' => array(
					'datetime' => array(),
					'title' => array(),
				),
				'dd' => array(),
				'div' => array(
					'class' => array(),
					'title' => array(),
					'style' => array(),
					'data-title' => array(),
					'data-min' => array(),
					'data-max' => array(),
					'data-timeout' => array(),
					'data-id_product' => array(),
				),
				'dl' => array(),
				'dt' => array(),
				'em' => array(),
				'h1' => array(),
				'h2' => array(),
				'h3' => array(),
				'h4' => array(),
				'h5' => array(),
				'h6' => array(),
				'i' => array(
					'class'  => array(),
				),
				'img' => array(
					'alt'    => array(),
					'class'  => array(),
					'height' => array(),
					'src'    => array(),
					'width'  => array(),
				),
				'li' => array(
					'class' => array(),
				),
				'ol' => array(
					'class' => array(),
				),
				'p' => array(
					'class' => array(),
					'role'  => array(),
				),
				'q' => array(
					'cite' => array(),
					'title' => array(),
				),
				'span' => array(
					'class' => array(),
					'title' => array(),
					'style' => array(),
				),
				'strike' => array(),
				'strong' => array(),
				'ul' => array(
					'class' => array(),
				),
				'button' => array(
					'class' => array(),
					'type' => array(),
					'data-id' => array(),
				),
				'input' => array(
					'class' => array(),
					'type' => array(),
					'name' => array(),
					'value' => array(),
					'size' => array(),
					'aria-required' => array(),
					'aria-invalid' => array(),
					'placeholder' => array(),
				),
				'textarea' => array(
					'class' => array(),
					'cols' => array(),
					'rows' => array(),
					'aria-required' => array(),
					'aria-invalid' => array(),
					'placeholder' => array(),
				),
				'form' => array(
					'action' => array(),
					'method' => array(),
					'class' => array(),
					'novalidate' => array(),
					'data-status' => array(),
				),				
				'label' => array(),				
			);
			return $allowed_tags;
			default:
			return $allowed_tags;
		}
	}
	add_filter( 'wp_kses_allowed_html', 'bemins_prefix_kses_allowed_html', 10, 2);
	if ( ! function_exists( 'wp_body_open' ) ) {
		function wp_body_open() {
			do_action( 'wp_body_open' );
		}
	}
	if ( ! function_exists( 'bemins_menu_mobile' ) ) {
	function bemins_menu_mobile($vertical = false){
		$bemins_settings = bemins_global_settings();
		$cart_layout = bemins_get_config('cart-layout','dropdown');
		$cart_style = bemins_get_config('cart-style','light');
		$show_minicart = (isset($bemins_settings['show-minicart']) && $bemins_settings['show-minicart']) ? ($bemins_settings['show-minicart']) : false;
		$arr_mobile_order = explode("-", get_theme_mod('header_moble_order', ''));
		?>
		<div class="header-mobile">
			<div class="container">
				<div class="header-mobile-container">
					<div class="header-left">
						<div class="navbar-header">
							<button type="button" id="show-megamenu"  class="navbar-toggle">
								<span><?php echo esc_html__('Menu','bemins'); ?></span>
							</button>
						</div>
					</div>
					<div class="header-center ">
						<?php bemins_header_logo(); ?>
					</div>
					<?php if($show_minicart && class_exists( 'WooCommerce' )){ ?>
					<div class="header-right">
						<?php if($vertical){?>
							<?php bemins_navbar_vertical_menu(); ?>
						<?php } ?>
						<div class="remove-cart-shadow"></div>
						<div class="bemins-topcart bemins-topcart-mobile <?php echo esc_attr($cart_layout); ?> <?php echo esc_attr($cart_style); ?>">
							<?php get_template_part( 'woocommerce/minicart-ajax' ); ?>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<?php if(class_exists( 'WooCommerce' ) && get_theme_mod('header_moble_bottom', true)){ ?>
			<div class="header-mobile-fixed">
				<?php foreach ($arr_mobile_order as $value) { 
					switch ($value) { 
					case 'shop': ?>
						<div class="shop-page">
							<a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">
								<i class="feather-grid"></i>
								<span><?php echo get_theme_mod('change_shop_title', 'Shop'); ?></span>
							</a>
						</div>
					<?php break;
					case 'account': ?>
						<div class="my-account">
							<div class="login-header">
								<a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>">
									<i class="feather-user"></i>
									<span><?php echo get_theme_mod('change_account_title', 'Account'); ?></span>
								</a>
							</div>
						</div>
					<?php break;
					case 'search': ?>
						<div class="search-box">
							<div class="search-toggle">
								<i class="feather-search"></i>
								<span><?php echo get_theme_mod('change_search_title', 'Search'); ?></span>
							</div>
						</div>
					<?php break;
					case 'wishlist': ?>
						<?php if( class_exists( 'WPCleverWoosw' )){ ?>
							<div class="wishlist-box">
								<a href="<?php echo WPcleverWoosw::get_url(); ?>">
									<i class="feather-heart">
										<span class="count-wishlist"><?php echo WPcleverWoosw::get_count(); ?></span>
									</i>
									<span><?php echo get_theme_mod('change_wishlist_title', 'Wishlist'); ?></span>
								</a>
							</div>
						<?php } ?>
					<?php break; default: ?>
						<div class="shop-page">
							<a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">
								<i class="feather-grid"></i>
								<span><?php echo esc_html("Shop","bemins")?></span>
							</a>
						</div>
						<div class="my-account">
							<div class="login-header">
								<a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>">
									<i class="feather-user"></i>
									<span><?php echo esc_html("Account","bemins")?></span>
								</a>
							</div>
						</div>
						<div class="search-box">
							<div class="search-toggle">
								<i class="feather-search"></i>
								<span><?php echo esc_html("Search","bemins")?></span>
							</div>
						</div>
						<?php if( class_exists( 'WPCleverWoosw' )){ ?>
							<div class="wishlist-box">
								<a href="<?php echo WPcleverWoosw::get_url(); ?>">
									<i class="feather-heart">
										<span class="count-wishlist"><?php echo WPcleverWoosw::get_count(); ?></span>
									</i>
									<span><?php echo esc_html("Wishlist","bemins")?></span>
								</a>
							</div>
						<?php } ?>
					<?php } ?>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
		<?php }
	}
	if ( ! function_exists( 'bemins_campbar' ) ) {
		function bemins_campbar(){
		$show_campbar 			= get_theme_mod('show_campar', true);
		$img_campbar 			= get_theme_mod('image_campar','');
		$color_campbar 			= get_theme_mod('background_campar','#e8f9fb');
		$color_content_campbar 	= get_theme_mod('color_campar','#000000');
		$content_campbar 		= get_theme_mod('content_campar', 'Free Delivery on orders over $100.');
		$link_campbar 			= get_theme_mod('url_campar','#');
		$content_marquee 		= get_theme_mod('marquee_campar', true);
		$number_marquee 		= get_theme_mod('repetitions_campar', 10);
		if($show_campbar) {
		?>
		<div class="header-campbar hidden" style="<?php if($show_campbar){ ?>background-color:<?php echo esc_attr($color_campbar); ?>;<?php if($img_campbar){ ?>background:url('<?php echo esc_url($img_campbar); ?>');background-size:cover;background-position:center;<?php } } ?>">
			<div class="content-campbar">
				<div class="content-text">
					<?php if( $content_marquee ){ ?>
						<div class="marquee_text_content">
							<ul>
								<?php for ($i = 1; $i <= $number_marquee; $i++) { ?>
									<li>
										<a style="<?php if($show_campbar){ ?>color:<?php echo esc_attr($color_content_campbar);?><?php } ?>" href="<?php echo esc_url($link_campbar); ?>">
											<?php echo esc_html($content_campbar); ?>
										</a>
									</li>
								<?php } ?>
							</ul>
						</div>
					<?php }else{ ?>
						<a style="<?php if($show_campbar){ ?>color:<?php echo esc_attr($color_content_campbar);?><?php } ?>" href="<?php echo esc_url($link_campbar); ?>">
							<?php echo esc_html($content_campbar); ?>
						</a>
					<?php } ?>
				</div>
				<div class="close-campbar"></div>
			</div>
		</div>
		<?php } }
	}
	if ( ! function_exists( 'bemins_login_form' ) ) {
		function bemins_login_form() { ?>
		<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
			<div class="form-login-register">
				<div class="overlay_form-login-register"></div>
				<div class="box-form-login">
					<div class="active-login"></div>
					<?php
						$bemins_settings = bemins_global_settings();
						if(isset($bemins_settings['background_sign_in_img']['url']) && !empty($bemins_settings['background_sign_in_img']['url'])):?>
							<div class="sign__in--img">
								<img src="<?php echo esc_url($bemins_settings['background_sign_in_img']['url']); ?>" alt="<?php echo esc_attr__( "Image Sign In","bemins" ); ?>">
								<h2 class="title-sign"><?php echo esc_html__("Sign in",'bemins') ?></h2>
								<h2 class="title-register hidden"><?php echo esc_html__("Register",'bemins') ?></h2>
							</div>
					<?php endif; ?>
					<div class="box-content">
						<div class="form-login active">
							<form data-login-ajax method="post" class="login">
								<div class="sign__in--content">
									<p class="status"></p>
									<div class="content">
										<?php do_action( 'woocommerce_login_form_start' ); ?>
										<div class="username">
											<input type="text" required="required" class="input-text" name="username" id="username" data-username placeholder="<?php echo esc_attr__("Name*",'bemins') ?>" />
										</div>
										<div class="password">
											<span class="password-input">
												<input class="woocommerce-Input woocommerce-Input--text input-text" required="required" type="password" name="password" id="password" data-password placeholder="<?php echo esc_attr__("Password*",'bemins') ?>" />
											</span>
										</div>
										<div class="rememberme-lost">
											<div class="lost_password">
												<a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php echo esc_html__( 'Lost your password?', 'bemins' ); ?></a>
											</div>
										</div>
										<div class="button-login">
											<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
											<input type="submit" class="button" name="login" value="<?php echo esc_attr__( 'Sign in', 'bemins' ); ?>" /> 
										</div>
										<div class="button-next-reregister" ><?php echo esc_html__("Create An Account",'bemins') ?></div>
									</div>
									<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
								</div>
							</form>
						</div>
						<div class="form-register">
							<form method="post" class="register">
								<div class="sign__in--content">
									<div class="content">
										<?php do_action( 'woocommerce_register_form_start' ); ?>
										<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
											<div class="username">
												<input type="text" class="input-text" placeholder="<?php echo esc_attr__("Username",'bemins') ?>" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
											</div>
										<?php endif; ?>
										<div class="email">
											<input type="email" class="input-text" placeholder="<?php echo esc_attr__("Email",'bemins') ?>" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
										</div>
										<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
											<div class="password">
												<span class="password-input">
													<input type="password" class="woocommerce-Input woocommerce-Input--text input-text"  placeholder="<?php echo esc_attr__("Password",'bemins') ?>" name="password" id="reg_password" />
												</span>
											</div>
										<?php endif; ?>
										<!-- Spam Trap -->
										<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php echo esc_html__( 'Anti-spam', 'bemins' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>
										<?php do_action( 'woocommerce_register_form' ); ?>
										<?php do_action( 'register_form' ); ?>
										<div class="button-register">
											<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
											<input type="submit" class="button" name="register" value="<?php echo esc_attr__( 'Register', 'bemins' ); ?>" />
										</div>
										<?php do_action( 'woocommerce_register_form_end' ); ?>
										<div class="button-next-login" ><?php echo esc_html__("Already has an account",'bemins') ?></div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php }
	}
	if ( ! function_exists( 'bemins_menu_stcky' ) ) {
		function bemins_menu_stcky(){
		$bemins_settings = bemins_global_settings();
		$cart_layout = bemins_get_config('cart-layout','dropdown');
		$cart_style = bemins_get_config('cart-style','light');
		$show_searchform = (isset($bemins_settings['show-searchform']) && $bemins_settings['show-searchform']) ? ($bemins_settings['show-searchform']) : false;
		$show_wishlist = (isset($bemins_settings['show-wishlist']) && $bemins_settings['show-wishlist']) ? ($bemins_settings['show-wishlist']) : false;
		$show_minicart = (isset($bemins_settings['show-minicart']) && $bemins_settings['show-minicart']) ? ($bemins_settings['show-minicart']) : false;
		?>
		<div class="header-sticky">
			<?php if(($show_minicart || $show_wishlist || $show_searchform || is_active_sidebar('top-link')) && class_exists( 'WooCommerce' ) ){ ?>
			<div class='header-content-sticky'>
				<div class="container">
					<div class="header-container">
						<div class="header-left">
							<?php bemins_header_logo(); ?>
						</div>
						<div class="header-center text-center">
							<div class="wpbingo-menu-mobile header-menu">
								<div class="header-menu-bg">
									<?php bemins_top_menu(); ?>
								</div>
							</div>
						</div>
						<div class="header-right">
							<div class="header-page-link">
								<!-- Begin Search -->
								<?php if($bemins_settings['show-searchform']){ ?>
								<div class="search-box search-dropdown">
									<div class="search-toggle"><i class="icon-search"></i></div>
								</div>
								<?php } ?>
								<!-- End Search -->
								<div class="login-header">
									<?php if (is_user_logged_in()) { ?>
										<?php if(is_active_sidebar('top-link')){ ?>
											<div class="block-top-link">
												<?php dynamic_sidebar( 'top-link' ); ?>
											</div>
										<?php } ?>
									<?php }else{ ?>
										<a class="active-login" href="#" ><i class="icon-login"></i></a>
										<?php bemins_login_form(); ?>
									<?php } ?>
								</div>	
								<?php if($show_wishlist && class_exists( 'WPCleverWoosw' )){ ?>
								<div class="wishlist-box">
									<a href="<?php echo WPcleverWoosw::get_url(); ?>"><i class="icon-heart"></i></a>
									<span class="count-wishlist"><?php echo WPcleverWoosw::get_count(); ?></span>
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
					</div>
				</div>		
			</div><!-- End header-wrapper -->
			<?php }else{ ?>
				<div class="header-normal">
					<div class='header-wrapper' data-sticky_header="<?php echo esc_attr($bemins_settings['enable-sticky-header']); ?>">
						<div class="container">
							<div class="row">
								<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 header-left">
									<?php bemins_header_logo(); ?>
								</div>
								<div class="col-xl-9 col-lg-9 col-md-6 col-sm-6 col-6 wpbingo-menu-mobile header-main">
									<div class="header-menu-bg">
										<?php bemins_top_menu(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<?php }
	}
	function bemins_config_header(){
		global $bemins_page_id;
		$header = new stdClass;
		$bemins_settings = bemins_global_settings();
		$direction = bemins_get_direction(); 
		$bemins_page_id = get_the_ID();		
		$header_style = bemins_get_config('header_style', '');
		$header->header_style  = (get_post_meta( $bemins_page_id, 'page_header_style', true )) ? get_post_meta($bemins_page_id, 'page_header_style', true ) : $header_style ;
		$header->enable_sticky_header = ( isset($bemins_settings['enable-sticky-header']) && $bemins_settings['enable-sticky-header'] ) ? ($bemins_settings['enable-sticky-header']) : false;
		$header->show_minicart = (isset($bemins_settings['show-minicart']) && $bemins_settings['show-minicart']) ? ($bemins_settings['show-minicart']) : false;
		$header->show_searchform = (isset($bemins_settings['show-searchform']) && $bemins_settings['show-searchform']) ? ($bemins_settings['show-searchform']) : false;
		$header->background_page = get_post_meta( get_the_ID(), 'page_background', true );
		$header->checkout_page_style="";
		if( function_exists('is_checkout') && is_checkout() ){
			$header->checkout_page_style = bemins_get_config('checkout_page_style','checkout-page-style-1');
		}
		return $header;
	}
?>