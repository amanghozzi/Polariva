<?php
 /**
  * @author     Polariva  Team <polariva@gmail.com >
  * @copyright  Copyright (C) 2014 polariva.com. All Rights Reserved.
  * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
  * @website  http://www.polariva.com
  */


add_action('admin_menu', 'add_menu_admin');
function add_menu_admin(){
	add_menu_page('polariva', esc_html__( 'Polariva', 'polariva' ), 'manage_options', 'polariva','bwp_info_area_notice',plugins_url( 'polariva/assets/images/icon.png' ),5);
	add_submenu_page( 'polariva', esc_html__( 'Welcome', 'polariva' ), esc_html__( 'Welcome', 'polariva' ), 'manage_options', 'polariva' );
	add_submenu_page( 'polariva', esc_html__( 'Theme Options', 'polariva' ), esc_html__( 'Theme Options', 'polariva' ), 'manage_options', 'themes.php?page=bemins_settings');
	add_submenu_page( 'polariva', esc_html__( 'Footers', 'polariva' ), esc_html__( 'Footers', 'polariva' ), 'manage_options', 'edit.php?post_type=bwp_footer');
	add_submenu_page( 'polariva', esc_html__( 'Mega Menu', 'polariva' ), esc_html__( 'Mega Menu', 'polariva' ), 'manage_options', 'edit.php?post_type=bwp_megamenu');
	add_submenu_page( 'polariva', esc_html__( 'Testimonial', 'polariva' ), esc_html__( 'Testimonial', 'polariva' ), 'manage_options', 'edit.php?post_type=testimonial');
	add_submenu_page( 'polariva', esc_html__( 'Ourteam', 'polariva' ), esc_html__( 'Ourteam', 'polariva' ), 'manage_options', 'edit.php?post_type=ourteam');
}

function bwp_info_area_notice(){
	echo '<h2>'. esc_html__('Welcome to Polariva Framework', 'polariva').'</h2>';
	echo '<p>' . esc_html__('Polariva is a very young team of developers and designers. Our goal is product quality and customer satisfaction, so we have gathered people who are driven by the passion to create an excellent product and be a helpful hand to their customers. If you are interested in Premium WordPress, PSD or Shopify Theme, one of our products may please you.

We love what we do and your review would be a big ‘Polariva’ for our development!','polariva'). '</p>';
}
