	<div>
		<div class="w-container">
		<div class="sponsor-wrapper">
		<?php 
		query_posts(
		    array( 
		        'post_type' => 'sponsor',
		        'posts_per_page' => 50, 
		        'meta_query' => array(
		              array(
		                  'key' => 'home_featured',
		                  'value' => '1',
		                  'compare' => '=='
		              )
		          )
		        )
		    );
		if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<?php //Print sponsor logos ?>
			<?php
				$sponsor_logo = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'default' );
			?>
			<img class="sponsor-logo slide" title="<?php the_title_attribute(); ?>" src="<?php echo $sponsor_logo['0']; ?>" />
		<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		</div>
	</div>
