<article id="post-<?php esc_attr(the_ID()); ?>" <?php post_class(); ?>>	
	<div class="entry-content clearfix">
		<?php
			the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links clearfix"><span class="page-links-title">' . esc_html__( 'Pages:', 'bemins' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->