<?php 
	get_header(); 
	$bemins_settings = bemins_global_settings();
?>
<div class="page-404">
	<div class="content-page-404">
		<div class="title-error">
			<?php if(isset($bemins_settings["title-error"]) && $bemins_settings["title-error"]){
				echo esc_html($bemins_settings["title-error"]);
			}else{
				echo esc_html__("404", "bemins");
			}?>
		</div>
		<div class="sub-title">
			<?php if(isset($bemins_settings["sub-title"]) && $bemins_settings["sub-title"]){
				echo esc_html($bemins_settings["sub-title"]);
			}else{
				echo esc_html__("Oops! That page can't be found.", "bemins");
			}?>
		</div>
		<div class="sub-error">
			<?php if(isset($bemins_settings["sub-error"]) && $bemins_settings["sub-error"]){
				echo esc_html($bemins_settings["sub-error"]);
			}else{
				echo esc_html__("We're really sorry but we can't seem to find the page you were looking for.", "bemins");
			}?>
		</div>
		<a class="btn" href="<?php echo esc_url( home_url('/') ); ?>">
			<?php if(isset($bemins_settings["btn-error"]) && $bemins_settings["btn-error"]){
				echo esc_html($bemins_settings["btn-error"]);}
			else{
				echo esc_html__("Back The Homepage", "bemins");
			}?>
		</a>
	</div>
</div>
<?php
get_footer();