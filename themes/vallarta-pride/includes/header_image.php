	<div>
		<?php
		  $page_headimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'section-head' );
		?>
		<img src="<?php echo $page_headimg['0']; ?>" width="100%" alt="<?php the_title_attribute(); ?>">
	</div>