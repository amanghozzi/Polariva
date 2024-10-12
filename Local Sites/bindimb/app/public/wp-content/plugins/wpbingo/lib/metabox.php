<?php 

add_action( 'admin_init', 'bwp_page_init' );

function bwp_page_init(){
	add_meta_box( 'bwp_page_meta', esc_html__( 'Page Metabox', 'polariva' ), 'bwp_page_meta', 'page', 'normal', 'low' );
	add_meta_box( 'bwp_ourteam_meta', esc_html__( 'Profile', 'polariva' ), 'bwp_ourteam_meta', 'ourteam', 'normal', 'low' );
	add_meta_box( 'bwp_testimonial_meta', esc_html__( 'Profile', 'polariva' ), 'bwp_testimonial_meta', 'testimonial', 'normal', 'low' );
}

/* Add Custom field to category */
add_action( 'created_term', 'save_category_fields',10,3);
add_action( 'edit_term', 'save_category_fields',10,3);

	
	
function save_category_fields( $term_id, $tt_id = '', $taxonomy = '' ) {
	if ( isset( $_POST['category_layout_blog'] ) && 'category' === $taxonomy ) {
		update_term_meta( $term_id, 'layout_blog', $_POST['category_layout_blog'] );
	}
	if ( isset( $_POST['category_sidebar_blog'] ) && 'category' === $taxonomy ) {
		update_term_meta( $term_id, 'sidebar_blog', $_POST['category_sidebar_blog'] );
	}
}

/* Add Custom field to category product */
add_action( 'product_cat_add_form_fields', 'add_category_product_fields',100 );
add_action( 'product_cat_edit_form_fields','edit_category_product_fields',100 );
add_action( 'created_term', 'save_category_product_fields',10,3);
add_action( 'edit_term', 'save_category_product_fields',10,3);

function add_category_product_fields() { ?>
	<div class="form-field">
		<label><?php echo esc_html__( 'Thumbnail 1', 'polariva' ); ?></label>
		<div id="product_cat_thumbnail1" style="float: left; margin-right: 10px;">
			<img class="product_cat_thumbnail_id1" src="" style="display: none; width:60px;height:auto;" />
		</div>
		<div style="line-height: 60px;">
			<input type="hidden" id="product_cat_thumbnail_id1" name="product_cat_thumbnail_id1" />
			<button type="button" class="bwp_upload_image_button button" data-image_id="product_cat_thumbnail_id1"><?php _e( 'Upload/Add image', 'polariva' ); ?></button>
			<button type="button" class="bwp_remove_image_button button" data-image_id="product_cat_thumbnail_id1"><?php _e( 'Remove image', 'polariva' ); ?></button>
		</div>
		<div class="clear"></div>
	</div>
	<div class="form-field">
		<label><?php echo esc_html__( 'Background Breadcrumb', 'polariva' ); ?></label>
		<div id="product_cat_bgbreadcrumb" style="float: left; margin-right: 10px;">
			<img class="product_cat_bg_breadcrumb" src="" style="display: none; width:60px;height:auto;" />
		</div>
		<div style="line-height: 60px;">
			<input type="hidden" id="product_cat_bg_breadcrumb" name="product_cat_bg_breadcrumb" />
			<button type="button" class="bwp_upload_image_button button" data-image_id="product_cat_bg_breadcrumb"><?php _e( 'Upload/Add image', 'polariva' ); ?></button>
			<button type="button" class="bwp_remove_image_button button" data-image_id="product_cat_bg_breadcrumb"><?php _e( 'Remove image', 'polariva' ); ?></button>
		</div>
		<div class="clear"></div>
	</div>
	<div class="form-field term-display-type-wrap">
		<label for="product_cat_category_icon"><?php echo esc_html__( 'Category Icon', 'polariva' ); ?></label>
		<input name="product_cat_category_icon" id="product_cat_category_icon" type="text" value="" size="40">
		<p><?php echo esc_html__( 'Ex : fa fa-home', 'polariva' ); ?></p>
	</div>
	<?php
}
	
function edit_category_product_fields( $term ) {

	$thumbnail_id1 = get_term_meta( $term->term_id, 'thumbnail_id1', true );
	if ( $thumbnail_id1 ) {
		$image = $thumbnail_id1;
	} else {
		$image = "";
	}
	$bg_breadcrumb = get_term_meta( $term->term_id, 'category_bg_breadcrumb', true );
	if ( $bg_breadcrumb ) {
		$image1 = $bg_breadcrumb;
	} else {
		$image1 = "";
	}
	$banner = get_term_meta( $term->term_id, 'category_banner', true );
	if ( $banner ) {
		$image2 = $banner;
	} else {
		$image2 = "";
	}
	$category_title_banner = get_term_meta( $term->term_id, 'category_title_banner', true );
	$category_subtitle_banner = get_term_meta( $term->term_id, 'category_subtitle_banner', true );
	$category_button_banner = get_term_meta( $term->term_id, 'category_button_banner', true );
	$category_link_button = get_term_meta( $term->term_id, 'category_link_button', true );
	$category_icon = get_term_meta( $term->term_id, 'category_icon', true );
	$category_view = get_term_meta( $term->term_id, 'category_view', true );
	?>
	<tr class="form-field">
		<th scope="row" valign="top"><label><?php echo esc_html__( 'Thumbnail 1', 'polariva' ); ?></label></th>
		<td>
			<div id="product_cat_thumbnail1" style="float: left; margin-right: 10px;">
				<?php if($image){ ?>
					<img class="product_cat_thumbnail_id1" src="<?php echo esc_url( $image ); ?>" style="display: block; width:60px;height:auto;" />
				<?php }else{ ?>
					<img class="product_cat_thumbnail_id1" src="<?php echo esc_url( $image ); ?>" style="display: none; width:60px;height:auto;" />
				<?php } ?>
			</div>
			<div style="line-height: 60px;">
				<input type="hidden" id="product_cat_thumbnail_id1" name="product_cat_thumbnail_id1" value="<?php echo $thumbnail_id1; ?>" />
				<button type="button" class="bwp_upload_image_button button" data-image_id="product_cat_thumbnail_id1"><?php echo esc_html__( 'Upload/Add image', 'polariva' ); ?></button>
				<button type="button" class="bwp_remove_image_button button" data-image_id="product_cat_thumbnail_id1"><?php echo esc_html__( 'Remove image', 'polariva' ); ?></button>
			</div>
			<div class="clear"></div>
		</td>	
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top"><label><?php echo esc_html__( 'Background Breadcrumb', 'polariva' ); ?></label></th>
		<td>
			<div id="product_cat_bgbreadcrumb" style="float: left; margin-right: 10px;">
				<?php if($image1){ ?>
					<img class="product_cat_bg_breadcrumb" src="<?php echo esc_url( $image1 ); ?>" style="display: block; width:60px;height:auto;" />
				<?php }else{ ?>
					<img class="product_cat_bg_breadcrumb" src="<?php echo esc_url( $image1 ); ?>" style="display: none; width:60px;height:auto;" />
				<?php } ?>
			</div>
			<div style="line-height: 60px;">
				<input type="hidden" id="product_cat_bg_breadcrumb" name="product_cat_bg_breadcrumb" value="<?php echo esc_attr($bg_breadcrumb); ?>" />
				<button type="button" class="bwp_upload_image_button button" data-image_id="product_cat_bg_breadcrumb"><?php echo esc_html__( 'Upload/Add image', 'polariva' ); ?></button>
				<button type="button" class="bwp_remove_image_button button" data-image_id="product_cat_bg_breadcrumb"><?php echo esc_html__( 'Remove image', 'polariva' ); ?></button>
			</div>
			<div class="clear"></div>
		</td>	
	</tr>
	<tr class="form-field">
		<th scope="row" valign="top"><label><?php echo esc_html__( 'Category Icon', 'polariva' ); ?></label></th>
		<td>
			<input name="product_cat_category_icon" id="product_cat_category_icon" type="text" value="<?php  echo esc_attr($category_icon); ?>" size="40">
			<p><?php echo esc_html__( 'Ex : fa fa-home', 'polariva' ); ?></p>
		</td>
	</tr>
	<?php
}
	
function save_category_product_fields( $term_id, $tt_id = '', $taxonomy = '' ) {
	if ( isset( $_POST['product_cat_thumbnail_id1'] ) && 'product_cat' === $taxonomy ) {
		update_term_meta( $term_id, 'thumbnail_id1', $_POST['product_cat_thumbnail_id1'] );
	}
	if ( isset( $_POST['product_cat_bg_breadcrumb'] ) && 'product_cat' === $taxonomy ) {
		update_term_meta( $term_id, 'category_bg_breadcrumb', $_POST['product_cat_bg_breadcrumb'] );
	}
	if ( isset( $_POST['product_cat_banner'] ) && 'product_cat' === $taxonomy ) {
		update_term_meta( $term_id, 'category_banner', $_POST['product_cat_banner'] );
	}
	if ( isset( $_POST['product_cat_title_banner'] ) && 'product_cat' === $taxonomy ) {
		update_term_meta( $term_id, 'category_title_banner', $_POST['product_cat_title_banner'] );
	}
	if ( isset( $_POST['product_cat_subtitle_banner'] ) && 'product_cat' === $taxonomy ) {
		update_term_meta( $term_id, 'category_subtitle_banner', $_POST['product_cat_subtitle_banner'] );
	}
	if ( isset( $_POST['product_cat_button_banner'] ) && 'product_cat' === $taxonomy ) {
		update_term_meta( $term_id, 'category_button_banner', $_POST['product_cat_button_banner'] );
	}
	if ( isset( $_POST['product_cat_link_button'] ) && 'product_cat' === $taxonomy ) {
		update_term_meta( $term_id, 'category_link_button', $_POST['product_cat_link_button'] );
	}
	if ( isset( $_POST['product_cat_category_icon'] ) && 'product_cat' === $taxonomy ) {
		update_term_meta( $term_id, 'category_icon', $_POST['product_cat_category_icon'] );
	}	
	if ( isset( $_POST['product_cat_category_view'] ) && 'product_cat' === $taxonomy ) {
		update_term_meta( $term_id, 'category_view', $_POST['product_cat_category_view'] );
	}
}

//Post Metabox




//Page Metabox
add_action( 'save_post', 'bwp_page_save_meta', 10, 1 );

function bwp_metabox_pages(){
	$bwp_metabox_pages[] = array(
		'title' 	=> esc_html__( 'Header', 'polariva' ),
		'fields'	=> array(	
			array(
				'type'	=> 'upload',
				'title'	=> esc_html__( 'Page Logo', 'polariva' ),
				'id'	=> 'page_logo',
				'description' => esc_html__( 'Upload custom Logo for this page', 'polariva' ),
				'std' => ''
			),		
			array(
				'type'	=> 'select',
				'title'	=> esc_html__( 'Header Style Select', 'polariva' ),
				'id'	=> 'page_header_style',
				'description' => esc_html__( ' Chose to select header page content for this page. ', 'polariva' ),
				'std'	 => '',
				'values' => get_header_types()
			)		
		)
	);
	
	$bwp_metabox_pages[] = array(
		'title' 	=> esc_html__( 'Footer', 'polariva' ),
		'fields'	=> array(
			array(
				'type'	=> 'select',
				'title'	=> esc_html__( 'Footer Page Select', 'polariva' ),
				'id'	=> 'page_footer_style',
				'description' => esc_html__( ' Chose to select footer page content for this page. ', 'polariva' ),
				'std'	 => '',
				'values' => get_footers_types()
			),
		)
	);
	
	return $bwp_metabox_pages;
}

function bwp_page_meta(){
	global $post;
	$bwp_metabox_pages = bwp_metabox_pages();
	$current_screen =  get_current_screen();
	wp_nonce_field( 'bwp_page_save_meta', 'bwp_metabox_plugin_nonce' );
	if( $current_screen->post_type == 'page' ) : 
		wp_register_style( 'pwb_metabox_style', plugins_url('/polariva/assets/css/metabox.css') );
		if (!wp_style_is('pwb_metabox_style')) {
			wp_enqueue_style('pwb_metabox_style'); 
		} 
		wp_register_script( 'bwp_tab_script', plugins_url( '/polariva/assets/js/tab.js' ),array(), null, true );		
		if (!wp_script_is('bwp_tab_script')) {
			wp_enqueue_script('bwp_tab_script');
		}
		wp_register_script( 'pwb_radio_img_select', plugins_url( '/polariva/assets/js/radio_img_select.js' ),array(), null, true );		
		if (!wp_script_is('pwb_radio_img_select')) {
			wp_enqueue_script('pwb_radio_img_select');
		}		
	endif; 
	?>
	<div class="bwp-metabox" id="bwp_metabox">
		<div class="bwp-metabox-content">
			<ul class="nav nav-tabs">
			<?php 
				foreach( $bwp_metabox_pages as $key => $metabox ){ 
					$active = ( $key == 0 ) ? 'active' : '';
					echo '<li class="' . esc_attr( $active ) . '"><a href="#bwp_'. strtolower( $metabox['title'] ) .'" data-toggle="tab">' . $metabox['title'] . '</a></li>';
				} 
			?>
			</ul>
			<div class="tab-content">
			<?php 
				foreach( $bwp_metabox_pages as $key => $metabox ){ 
				$active = ( $key == 0 ) ? 'active' : '';				
			?>
				<div class="tab-pane <?php echo esc_attr( $active ); ?>" id="bwp_<?php echo strtolower( $metabox['title'] ) ; ?>">
					<?php if( isset( $metabox['fields'] ) && count( $metabox['fields'] ) > 0 ) {?>
						<?php 
							foreach( $metabox['fields'] as $meta_field ) { 
							$values = isset( $meta_field['values'] ) ? $meta_field['values'] : '';
						?>
							<div class="tab-inner clearfix">
								<div class="bwptab-description pull-left">
								
									<!-- Title meta field -->
									<?php if( $meta_field['title'] != '' ) { ?>
									<div class="bwptab-item-title">
										<?php echo $meta_field['title']; ?>
									</div>
									<?php } ?>
									
									<!-- Description -->
									<?php if( $meta_field['description'] != '' ) { ?>
									<div class="bwptab-item-shortdes">
										<?php echo $meta_field['description']; ?>
									</div>
									<?php } ?>
								</div>
								<!-- Meta content -->
								<div class="bwptab-content">
									<?php bwp_render_html( $meta_field['id'], $meta_field['type'], $values, $meta_field['std'] ); ?>									
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
<?php 
}

function bwp_page_save_meta(){
	global $post;
	$bwp_metabox_pages = bwp_metabox_pages();
	if ( ! isset( $_POST['bwp_metabox_plugin_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['bwp_metabox_plugin_nonce'], 'bwp_page_save_meta' ) ) {
		return;
	}
	bwp_save_post_meta($bwp_metabox_pages);
}

//Ourteam
add_action( 'save_post', 'bwp_ourteam_save_meta', 10, 1 );
function  bwp_metabox_ourteams(){
	$bwp_metabox_ourteams[] = array(
		'fields'	=> array(
			array(
				'type'	=> 'text',
				'title'	=> esc_html__( 'Job', 'polariva' ),
				'id'	=> 'team_job',
				'std'	 => ''
			)		
		)
	);	
	$bwp_metabox_ourteams[] = array(
		'fields'	=> array(
			array(
				'type'	=> 'text',
				'title'	=> esc_html__( 'Facebook', 'polariva' ),
				'id'	=> 'team_facebook',
				'std'	 => '#'
			)		
		)
	);

	$bwp_metabox_ourteams[] = array(
		'fields'	=> array(
			array(
				'type'	=> 'text',
				'title'	=> esc_html__( 'Twitter', 'polariva' ),
				'id'	=> 'team_twitter',
				'std'	 => '#'
			),
		)
	);

	$bwp_metabox_ourteams[] = array(
		'fields'	=> array(
			array(
				'type'	=> 'text',
				'title'	=> esc_html__( 'Youtube', 'polariva' ),
				'id'	=> 'team_youtube',
				'std'	 => '#'
			),
		)
	);

	$bwp_metabox_ourteams[] = array(
		'fields'	=> array(
			array(
				'type'	=> 'text',
				'title'	=> esc_html__( 'Tumblr', 'polariva' ),
				'id'	=> 'team_tumblr',
				'std'	 => '#'
			),
		)
	);	
	
	$bwp_metabox_ourteams[] = array(
		'fields'	=> array(
			array(
				'type'	=> 'text',
				'title'	=> esc_html__( 'Linkedin', 'polariva' ),
				'id'	=> 'team_linkedin',
				'std'	 => '#'
			),
		)
	);		
	
	return $bwp_metabox_ourteams;
}

function bwp_ourteam_meta(){
	$bwp_metabox_ourteams = bwp_metabox_ourteams();
	$current_screen =  get_current_screen();
	wp_nonce_field( 'bwp_ourteam_save_meta', 'bwp_metabox_plugin_nonce' );
	if( $current_screen->post_type == 'ourteam' ) : 
		wp_register_style( 'metabox_style', plugins_url('/polariva/assets/css/metabox.css') );
		if (!wp_style_is('metabox_style')) {
			wp_enqueue_style('metabox_style'); 
		} 
	endif;	
	
	foreach( $bwp_metabox_ourteams as $key => $metabox ){ 
	if( isset( $metabox['fields'] ) && count( $metabox['fields'] ) > 0 ) {
			foreach( $metabox['fields'] as $meta_field ) { 
			$values = isset( $meta_field['values'] ) ? $meta_field['values'] : '';
			?>
			<div class="ourteam-inner clearfix">
				<!-- Title meta field -->
				<?php if( $meta_field['title'] != '' ) { ?>
				<div class="ourteam-item-title">
					<?php echo $meta_field['title']; ?>
				</div>
				<?php } ?>
				<!-- Meta content -->
				<div class="ourteam-content">
					<?php bwp_render_html( $meta_field['id'], $meta_field['type'], $values, $meta_field['std'] ); ?>									
				</div>
			</div>
		<?php } ?>
	<?php }		
	}
}

function bwp_ourteam_save_meta(){
	global $post;
	$bwp_metabox_ourteams = bwp_metabox_ourteams();
	if ( ! isset( $_POST['bwp_metabox_plugin_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['bwp_metabox_plugin_nonce'], 'bwp_ourteam_save_meta' ) ) {
		return;
	}
	bwp_save_post_meta($bwp_metabox_ourteams);
}

//Testimonial
add_action( 'save_post', 'bwp_testimonial_save_meta', 10, 1 );
function  bwp_metabox_testimonials(){
	$bwp_metabox_testimonials[] = array(
		'fields'	=> array(
			array(
				'type'	=> 'text',
				'title'	=> esc_html__( 'Job', 'polariva' ),
				'id'	=> 'testimonial_job',
				'std'	 => ''
			),
			array(
				'type'	=> 'text',
				'title'	=> esc_html__( 'Title', 'polariva' ),
				'id'	=> 'testimonial_title',
				'std'	 => ''
			),
			array(
				'type'	=> 'select',
				'title'	=> esc_html__( 'Star Rating', 'polariva' ),
				'id'	=> 'testimonial_star',
				'std'	 => '5',
				'values' => array("1" => "1","2" => "2","3" => "3","4" => "4","5" => "5")
			)			
		)
	);		
	
	return $bwp_metabox_testimonials;
}

function bwp_testimonial_meta(){
	$bwp_metabox_testimonials = bwp_metabox_testimonials();
	$current_screen =  get_current_screen();
	wp_nonce_field( 'bwp_testimonial_save_meta', 'bwp_metabox_plugin_nonce' );
	if( $current_screen->post_type == 'testimonial' ) : 
		wp_register_style( 'metabox_style', plugins_url('/polariva/assets/css/metabox.css') );
		if (!wp_style_is('metabox_style')) {
			wp_enqueue_style('metabox_style');
		} 
	endif;	
	
	foreach( $bwp_metabox_testimonials as $key => $metabox ){ 
	if( isset( $metabox['fields'] ) && count( $metabox['fields'] ) > 0 ) {
			foreach( $metabox['fields'] as $meta_field ) { 
			$values = isset( $meta_field['values'] ) ? $meta_field['values'] : '';
			?>
			<div class="ourteam-inner clearfix">
				<!-- Title meta field -->
				<?php if( $meta_field['title'] != '' ) { ?>
				<div class="ourteam-item-title">
					<?php echo $meta_field['title']; ?>
				</div>
				<?php } ?>
				<!-- Meta content -->
				<div class="ourteam-content">
					<?php bwp_render_html( $meta_field['id'], $meta_field['type'], $values, $meta_field['std'] ); ?>									
				</div>
			</div>
		<?php } ?>
	<?php }		
	}
}

function bwp_testimonial_save_meta(){
	global $post;
	$bwp_metabox_testimonials = bwp_metabox_testimonials();
	if ( ! isset( $_POST['bwp_metabox_plugin_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['bwp_metabox_plugin_nonce'], 'bwp_testimonial_save_meta' ) ) {
		return;
	}
	bwp_save_post_meta($bwp_metabox_testimonials);
}

//Slider
add_action( 'save_post', 'bwp_slider_save_meta', 10, 1 );
function  bwp_metabox_sliders(){
	$bwp_metabox_sliders[] = array(
		'fields'	=> array(
			array(
				'type'	=> 'text',
				'title'	=> esc_html__( 'Url', 'polariva' ),
				'id'	=> 'url',
				'std'	 => '#'
			)		
		)
	);
	return $bwp_metabox_sliders;
}

function bwp_slider_meta(){
	$bwp_metabox_sliders = bwp_metabox_sliders();
	$current_screen =  get_current_screen();
	wp_nonce_field( 'bwp_slider_save_meta', 'bwp_metabox_plugin_nonce' );
	if( $current_screen->post_type == 'bwp_slider' ) : 
		wp_register_style( 'metabox_style', plugins_url('/polariva/assets/css/metabox.css') );
		if (!wp_style_is('metabox_style')) {
			wp_enqueue_style('metabox_style'); 
		} 
	endif;	
	
	foreach( $bwp_metabox_sliders as $key => $metabox ){ 
	if( isset( $metabox['fields'] ) && count( $metabox['fields'] ) > 0 ) {
			foreach( $metabox['fields'] as $meta_field ) { 
			$values = isset( $meta_field['values'] ) ? $meta_field['values'] : '';
			?>
			<div class="slider-inner clearfix">
				<!-- Title meta field -->
				<?php if( $meta_field['title'] != '' ) { ?>
				<div class="slider-item-title">
					<?php echo $meta_field['title']; ?>
				</div>
				<?php } ?>
				<!-- Meta content -->
				<div class="slider-content">
					<?php bwp_render_html( $meta_field['id'], $meta_field['type'], $values, $meta_field['std'] ); ?>									
				</div>
			</div>
		<?php } ?>
	<?php }		
	}
}

function bwp_slider_save_meta(){
	global $post;
	$bwp_metabox_sliders = bwp_metabox_sliders();
	if ( ! isset( $_POST['bwp_metabox_plugin_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['bwp_metabox_plugin_nonce'], 'bwp_slider_save_meta' ) ) {
		return;
	}
	bwp_save_post_meta($bwp_metabox_sliders);
}	

//Brand

add_action( 'product_brand_add_form_fields','add_brand_fields', 100 );
add_action( 'product_brand_edit_form_fields','edit_brand_fields', 100 );
add_action( 'created_term','save_brand_fields', 10, 3 );
add_action( 'edit_term', 'save_brand_fields', 10, 3 );

function add_brand_fields() { 
	?>
	<div class="form-field">
		<label><?php _e( 'Thumbnail', 'polariva' ); ?></label>
		<div id="product_brand_thumbnail" style="float: left; margin-right: 10px;">
			<img class="product_brand_thumbnail_id" src="" style="display: none; width:60px;height:auto;">
		</div>				
		<div style="line-height: 60px;">
			<input type="hidden" id="product_brand_thumbnail_id" name="product_brand_thumbnail_id" value="">
			<input type="button" class="bwp_upload_image_button button" data-image_id="product_brand_thumbnail_id"  value="<?php _e( 'Browse', 'polariva' ); ?>">
			<input type="button" class="bwp_remove_image_button button" data-image_id="product_brand_thumbnail_id" value="<?php _e( 'Remove', 'polariva' ); ?>">
		</div>
		<div class="clear"></div>
	</div>
	<?php
}

function edit_brand_fields( $term ) {
	$image = ( get_term_meta( $term->term_id, 'thumbnail_bid', true ) );
	?>
	<tr class="form-field">
		<th scope="row" valign="top"><label><?php _e( 'Thumbnail', 'polariva' ); ?></label></th>
		<td>
			<div id="product_brand_thumbnail" style="float: left; margin-right: 10px;">
				<?php if($image){?>
					<img class="product_brand_thumbnail_id" src="<?php echo esc_url( $image ); ?>" style="display: block; width:60px;height:auto;">
				<?php }else{ ?>
					<img class="product_brand_thumbnail_id" src="<?php echo esc_url( $image ); ?>" style="display: none; width:60px;height:auto;">
				<?php } ?>
			</div>
			<div style="line-height: 60px;">
				<input type="hidden" id="product_brand_thumbnail_id" name="product_brand_thumbnail_id" value="<?php echo esc_url( $image ); ?>">
				<input type="button" class="bwp_upload_image_button button" data-image_id="product_brand_thumbnail_id"  value="<?php _e( 'Browse', 'polariva' ); ?>">
				<input type="button" class="bwp_remove_image_button button" data-image_id="product_brand_thumbnail_id" value="<?php _e( 'Remove image', 'polariva' ); ?>">
			</div>
			<div class="clear"></div>
		</td>
	</tr>
	<?php
}
function save_brand_fields( $term_id, $tt_id = '', $taxonomy = '' ) {
	if ( isset( $_POST['product_brand_thumbnail_id'] ) && 'product_brand' === $taxonomy ) {
		update_woocommerce_term_meta( $term_id, 'thumbnail_bid', ( $_POST['product_brand_thumbnail_id'] ) );
	}
}

/*
** Function Save Post Meta HTML
*/
function bwp_save_post_meta($metaboxs){
	global $post;
	if(!$metaboxs)
		return;
	foreach( $metaboxs as $key => $metabox ){ 
		foreach( $metabox['fields'] as $meta_field ) { 			
			if( isset( $_POST[$meta_field['id']] ) ){
				$data = $_POST[$meta_field['id']];
				update_post_meta( $post->ID, $meta_field['id'], $data );
			}
			else{
				if( $meta_field['std'] != '' ){
					update_post_meta( $post->ID, $meta_field['id'], $meta_field['std'] );
				}else{
					delete_post_meta( $post->ID, $meta_field['id'] );
				}
			}
		}
	}	
}
/*
** Function Render HTML
*/

function bwp_render_html( $id, $type, $values, $std ){
	global $post;
	$meta_value = '';
	if( get_post_meta( $post->ID, $id, true ) != '' ){
			$meta_value = get_post_meta( $post->ID, $id, true );
	}else if( isset( $std ) && $std != '' ){
		$meta_value = $std;
	}
	$html = '';
	switch( $type ) {
		case 'text' :
			$html .= '<input type="text" value="'. esc_attr( $meta_value ) .'" id="'. esc_attr( $id ) .'" name="'. esc_attr( $id ) .'"/>';
		break;
		case 'textarea' :
			$html .= '<textarea rows="4" cols="50" id="'. esc_attr( $id ) .'" name="'. esc_attr( $id ) .'">'. esc_attr( $meta_value ) .'</textarea>';
		break;		
		case 'select' :
			$html .= '<select id="'. esc_attr( $id ) .'" name="'. esc_attr( $id ) .'">';
				foreach( $values as $key => $value ) {
					$html .= '<option value="'. esc_attr( $key ) .'" '. selected( $meta_value, $key, false ) .'>'. $value .'</option>';
				}
			$html .= '</select>';
		break;
		case 'radio_img' :
			$i = 0;
			$html .= '<div class="page-metabox-radio-img">';
			foreach( $values as $key => $value ) {
				$key_val = ( $key == 'none' ) ? esc_html__( 'No Select', 'polariva' ) : $key; 
				$selected = ( checked( $meta_value, $key, false ) != '' ) ? ' bwp-radio-img-selected' : '';
				$html .= '<label class="radio-label bwp-radio-img'.$selected.' bwp-radio-img-'. esc_attr( $id ) .'" for="'. esc_attr( $id ) .'_'. $i .'">';
				$html .= '<input type="radio" id="'. esc_attr( $id ) .'_'. $i .'" name="'. esc_attr( $id ) .'" value="'. esc_attr( $key ) .'" '.checked($meta_value, $key, false).'/>';
				$html .= '<div class="page-radio-color" style="background: '. esc_attr( $value ) .'" onclick="jQuery:bwp_radio_img_select(\''. esc_attr( $id ) .'_'. $i .'\', \''. esc_attr( $id ) .'\');"></div>';
				$html .= '<br/><span>'. esc_attr( $key_val ) .'</span>';
				$html .= '</label>';
				$i ++;
			}
			$html .= '</div>';
		break;		
		case 'upload' :
			ob_start(); ?>
			<div class="upload-formfield">
				<div id="metabox_thumbnail" style="float: left; margin-right: 10px;">
					<?php if($meta_value){ ?>
						<img class="<?php echo esc_attr( $id ); ?>" src="<?php echo esc_url( $meta_value ); ?>" alt="" style="display: block; width:150px;height :auto;" />
					<?php }else{ ?>
						<img class="<?php echo esc_attr( $id ); ?>" src="<?php echo esc_url( $meta_value ); ?>" alt="" style="display: none; width:150px;height :auto;" />
					<?php } ?>
				</div>
				<div class="metabox-thumbnail-wrapper">
					<input type="hidden" id="<?php echo esc_attr( $id ); ?>" name="<?php echo esc_attr( $id ); ?>" value="<?php echo esc_attr( $meta_value ) ?>"/>
					<button type="button" class="bwp_upload_image_button button" data-image_id="<?php echo esc_attr( $id ); ?>"><?php echo esc_html__( 'Upload/Add image', 'polariva' ) ?></button>
					<button type="button" class="bwp_remove_image_button button" data-image_id="<?php echo esc_attr( $id ); ?>"><?php echo esc_html__( 'Remove image', 'polariva' ) ?></button>
				</div>
				<div class="clear"></div>
			</div>
		<?php
			$html .= ob_get_clean();
		break;
		
	}
	echo $html;
}
function polariva_woocommerce_maybe_show_product_subcategories( $loop_html = '' ) {
	ob_start();
	woocommerce_output_product_categories(
		array(
			'parent_id' => is_product_category() ? get_queried_object_id() : 0,
		)
	);
	$loop_html .= ob_get_clean();
	return $loop_html;
}
function polariva_video_product() {
	$video = array(
		'id' => 'video_product',
		'label' => __( 'Featured Video URL', 'polariva' ),
		'class' => 'polariva-video-product',
		'desc_tip' => true,
		'description' => __( 'Enter the Featured Video URL field.', 'polariva' ),
	);
	woocommerce_wp_text_input( $video );
	$view = array(
		'id' => 'view_product',
		'label' => __( '360 product view', 'polariva' ),
		'class' => 'polariva-view-product',
        'options' =>  array(
			'false' => __( 'No', 'polariva' ),
			'true' => __( 'Yes', 'polariva' ),
		)
	);
	woocommerce_wp_select( $view );
}
add_action( 'woocommerce_product_options_advanced', 'polariva_video_product' );

function add_variation_image_field( $loop, $variation_data, $variation ) {
	$image = get_post_meta( $variation->ID, '_variation_images', true );
	$image_urls = explode(";", $image);
	$index =0;
    ?>
    <tr>
        <td>
            <div class="polariva_variation_image">
                <div style="display:flex;align-items:center;margin-bottom:20px;">
                    <label style="margin-right:10px;" for="variation_image_<?php echo $loop; ?>"><?php _e( 'Images', 'woocommerce' ); ?></label>
                    <textarea class="hidden" name="variation_images[<?php echo $loop; ?>]" id="variation_images_<?php echo esc_attr( $loop ); ?>" rows="5" cols="50"><?php echo esc_textarea($image); ?></textarea>
                    <button class="upload_variation_image_button button"><?php _e( 'Upload Images', 'woocommerce' ); ?></button>
                </div>
                <div class="image_preview" style="display:flex;flex-wrap:wrap;">
					<?php
					if($image){
						foreach ($image_urls as $url) { 
						$index =$index + 1;
						?>
							<div class="image" style="position: relative;margin-right: 5px">
								<div class="upload_image_button bwp_remove_image_variation tips remove" style="position: absolute;width: 100%;height: 100%; margin: 0;float: unset;"></div>
								<img src="<?php echo esc_url($url);?>" data-option="<?php echo esc_attr($index); ?>" alt="Image" style="max-width:50px;height:auto">
							</div>
						<?php }
					}
					?>
				</div>
            </div>
        </td>
    </tr>
    <?php
}
add_action( 'woocommerce_variation_options', 'add_variation_image_field', 10, 3 );
function save_variation_image_field( $variation_id, $loop ) {
    if( isset( $_POST['variation_images'][$loop] ) ) {
        $images = wp_kses_post( trim( $_POST['variation_images'][$loop] ) );
        update_post_meta( $variation_id, '_variation_images', $images );
    }
}
add_action( 'woocommerce_save_product_variation', 'save_variation_image_field', 10, 2 );

add_action('admin_footer', 'custom_variation_field_reload_script');
function custom_variation_field_reload_script() {
    ?>
    <script type="text/javascript">
		jQuery(document).ready(function($) {
			upload_image_variation();
			remove_image_variation();
			function remove_image_variation(){
				$(document.body).on('click', '.bwp_remove_image_variation', function(e) {
					var $parent = $(this).closest('.image');
					var $parent2 = $(this).closest('.polariva_variation_image');
					var $option = $('img',$parent).data('option');
					var $total = $('.image',$parent2).length;
					$parent.remove();
					if($total==1){
						var $url = $('img',$parent).attr('src');
					}else if($option>=$total){
						var $url = ';'.concat($('img',$parent).attr('src'));
					}else{
						var $url = $('img',$parent).attr('src').concat("", ';');
					}
					var $image = $parent2.find('textarea').val();
					var $new_image = $image.replace($url, '');
					$parent2.attr('data-total', $('.image',$parent2).length);
					$('textarea',$parent2).val($new_image);
					$parent2.find('textarea').change();
				});
			}
			function upload_image_variation(){
				var custom_uploader,$button,parent;
				$(document.body).on('click', '.upload_variation_image_button', function(e) {
					if (!$(e.target).hasClass('upload_variation_image_button')) return;
					e.preventDefault();
					$button = $(this);
					parent = $button.closest('.polariva_variation_image');
					if (typeof custom_uploader === 'undefined') {
						custom_uploader = wp.media({
							title: 'Insert images',
							library: {
								type: 'image'
							},
							button: {
								text: 'Use images'
							},
							multiple: true
						}).on('select', function() {
							var attachment = custom_uploader.state().get('selection').toJSON();
							var imageUrls = [];
							$.each(attachment, function(index, value) {
								imageUrls.push(value.url);
							});
							var currentImages = $('textarea',parent).val();
							var newImages = currentImages.length > 0 ? currentImages + ';' + imageUrls.join(';') : imageUrls.join(';' );
							$('textarea',parent).val(newImages);
							$('textarea',parent).change();
							$.each(imageUrls, function(index, image) {
								var html = '';
								html += '<div class="image" style="position: relative;margin-right: 5px">';
								html += '	<div class="upload_image_button bwp_remove_image_variation tips remove" style="position: absolute;width: 100%;height: 100%; margin: 0;float: unset;"></div>';
								html += '<img src="'+image+'" data-option="'+index+'" alt="Image" style="max-width:50px;height:auto">';
								html += '</div>';
								$('.image_preview',parent).append(html);
							});
							parent.attr('data-total',$('.image',parent).length);
						});
						custom_uploader.open();
					} else {
						custom_uploader.open();
					}
				});
			};
		});
	</script>
    <?php
}

function polariva_save_product( $post_id ) {
 $product = wc_get_product( $post_id );
 $video = isset( $_POST['video_product'] ) ? $_POST['video_product'] : '';
 $view = isset( $_POST['view_product'] ) ? $_POST['view_product'] : 'false';
 $product->update_meta_data( 'video_product', sanitize_text_field( $video ) );
 $product->update_meta_data( 'view_product', wp_kses_post( $view ) );
 $product->save();
}
add_action( 'woocommerce_process_product_meta', 'polariva_save_product' );