<?php 
	global $instance;
	$format = get_post_format();
?>
<div class="list-post">
    <article id="post-<?php esc_attr(the_ID()); ?>" <?php post_class(); ?>>
		<?php if( empty($format) || $format == 'image' || $format == 'quote') : ?>	
			<?php if ( get_the_post_thumbnail() ){?>
			<div class="entry-thumb single-thumb">
				<a class="post-thumbnail" href="<?php echo esc_url(the_permalink()); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail( 'bemins-full-width' )?>				
				</a>
				<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && bemins_categorized_blog() ) : ?>
					<div class="cat-links"><?php echo get_the_category_list(''); ?></div>
				<?php endif; ?>	
			</div>		
			<?php } ?>
		<?php elseif( $format == 'video' || $format == 'audio' ) : ?>
			<?php if ( get_the_post_thumbnail() ){?>
			<div class="entry-thumb single-thumb">
				<a class="post-thumbnail" href="<?php esc_url(the_permalink()); ?>" title="<?php echo the_title_attribute(); ?>">
					<?php the_post_thumbnail( 'bemins-full-width', array( 'alt' => get_the_title() ) );	?>      
				</a>
				<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && bemins_categorized_blog() ) : ?>
					<div class="cat-links"><?php echo get_the_category_list(''); ?></div>
				<?php endif; ?>	
			</div>
			<?php } ?>
		<?php elseif( $format == 'gallery' ) : 
			$ids = "";	
			if(preg_match_all('/\[gallery(.*?)?\]/', get_the_content(), $matches)){
				$attrs = array();
					if (count($matches[1])>0){
						foreach ($matches[1] as $m){
							$attrs[] = shortcode_parse_atts($m);
						}
					}
					if (count($attrs)> 0){
						foreach ($attrs as $attr){
							if (is_array($attr) && array_key_exists('ids', $attr)){
								$ids = $attr['ids'];
								break;
							}
						}
					}
				?>
				<?php if($ids){ ?>
				<div class="entry-thumb">
					<div id="gallery_slider_<?php echo esc_attr($post->ID); ?>" class="gallery-slider">	
						<div class="slick-carousel" data-columns4="1" data-columns3="1" data-columns2="1" data-columns1="1" data-columns="1" data-nav="true">
								<?php
									if($ids){
										$ids = explode(',', $ids);						
										foreach ( $ids as $i => $id ){ ?>
											<div class="item">
													<?php echo wp_get_attachment_image($id, 'bemins-full-width'); ?>
											</div>
										<?php }	
									}
								?>
						</div>
					</div>
					<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && bemins_categorized_blog() ) : ?>
						<div class="cat-links"><?php echo get_the_category_list(''); ?></div>
					<?php endif; ?>	
				</div>
				<?php }
			} ?>			
		<?php endif; ?>			
		<div class="post-content">
			<?php bemins_posted_on_2(); ?>
			<?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
				<span class="sticky-post<?php if ( get_the_post_thumbnail() ){?> have-thumbnail<?php } ?>"><?php echo esc_html__( 'Featured', 'bemins' ) ?></span>
			<?php } ?>
			<h3 class="entry-title"><a href="<?php echo esc_url(the_permalink()) ?>"><?php echo the_title(); ?></a></h3>
			<?php
        		if (bemins_get_config('blog-excerpt')) {
                    echo bemins_get_excerpt( bemins_get_config('list-blog-excerpt-length',70), true);
                }
			?>
    	</div>	
    </article><!-- #post-## -->
</div>