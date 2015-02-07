          <?php /* Blog detail related articles */ ?>
         
          <?php
          

          if(is_single()) { ///////////////////mpage
            ?>    
            <div class="w-hidden-small w-hidden-tiny sidebar-feature">
              <?php  
                $orig_post = $post;  
                global $post;  
                $tags = wp_get_post_tags($post->ID);  
                  
                if ($tags) {  
                $tag_ids = array();  
                foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
                $args=array(  
                  'tag__in' => $tag_ids,  
                  'post__not_in' => array($post->ID),  
                  'posts_per_page'=>2, // Number of related posts to display.  
                  'caller_get_posts'=>1  
                );  
                
                $my_query = new wp_query( $args );  
              
                while( $my_query->have_posts() ) {  
                $my_query->the_post();  
              ?>
              
              
              <div class="item-feature">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('related-thumbs');?>
                </a>
                <h2 class="feature-h2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
                <a class="feed-link" href="<?php the_permalink(); ?>"><?= LBL_MORE ?></a>
                <div class="block-label"><?= LBL_RELATED ?></div>
              </div>
              
               <?php }  
                }  
                $post = $orig_post;  
                wp_reset_query();  
              ?> 
            </div>
          <?php } ?>