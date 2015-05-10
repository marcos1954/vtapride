	<div>
		<div class="w-container sponsors">

		<?php 
		query_posts(
		    array( 
		        'post_type' => 'sponsor',
		        'posts_per_page' => 100, 
		        'orderby' => 'menu_order',
		        'order' => 'ASC',
				
				// removed by mpage 9may15
				
		        //'meta_query' => array(
		        //      array(
		        //          'key' => 'home_featured',
		        //          'value' => '1',
		        //          'compare' => '=='
		        //      )
		        //  )
		        )
		    );
		if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<?php //Print sponsor logos ?>
			<?php $source =  get_field( "source" ); ?>
			<?php
				$sponsor_logo = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'default' );
			?>
			<?php if( !empty ( $source ) ) { ?>
	          <a href="<?php echo $source ?>" target="_blank"><img class="sponsor-logo" title="<?php the_title_attribute(); ?>" src="<?php echo $sponsor_logo['0']; ?>" /></a>
	        <?php }else if ($sponsor_logo['0'] != '') { ?> 
	          <img class="sponsor-logo" title="<?php the_title_attribute(); ?>" src="<?php echo $sponsor_logo['0']; ?>" />
	        <?php } ?>

		<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>

	</div>
