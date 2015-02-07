<?php 

/*Template Name: Blog

This file contains News and Galleries.

*/

get_header(); ?>





<?php  

  if ( in_category( 'Noticias' ) || in_category('News')){ 

  $page_headimg = wp_get_attachment_image_src( get_post_thumbnail_id( 20 ), 'section-head' );

?>

    <img src="<?php echo $page_headimg['0']; ?>" width="100%" alt="<?php the_title_attribute(); ?>">

<?php }else{  

  $page_headimg = wp_get_attachment_image_src( get_post_thumbnail_id( 30 ), 'section-head' );

?>

  <img src="<?php echo $page_headimg['0']; ?>" width="100%" alt="<?php the_title_attribute(); ?>">

<?php } ?>



  <div>

    <div class="w-container">

      <div class="w-row">

        <div class="w-col w-col-9">

          <h1><?php single_cat_title( $prefix = '', $display = true ); ?></h1>

          <script>

            jQuery( document ).ready(function( $ ) {

              $( ".wp-pagenavi" ).addClass( "pagination" );

              $( ".wp-pagenavi span.current" ).addClass( "item-pagination link-pagination" );

              $( ".wp-pagenavi a" ).addClass( "item-pagination link-pagination" );

              $( ".wp-pagenavi a, .wp-pagenavi span" ).css( "border","none" );

              $( ".wp-pagenavi > .current" ).css( "background-color", "#422f8b" );

              $( ".wp-pagenavi > .current" ).css( "color", "yellow" );

              $( ".link-pagination" ).css( "padding","10" );

            });

          </script>

          <?php

          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

          $args = array(

            'post_type'=>'Gallery',

            'posts_per_page' => 6,

            'paged' => $paged

          );  

          $banner = 3;

          if ( in_category( 'Noticias' ) || in_category('News')){

            $args['post_type']='Post';

            $args['posts_per_page']=50; 

            $banner = 5;

          }



          $query = new WP_Query($args);

          wp_pagenavi(array('query' => $query));

          $i = 0;

          if($query->have_posts()) : while($query->have_posts()) : $query->the_post();

          $i ++;

          ?>



          <?php if ( in_category( 'Noticias' ) || in_category('News')){  ?>

            <div class="blog-item">

              <div class="w-row">

                <div class="w-col w-col-4">

                  <?php

                    $blog_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-thumbs' );

                  ?>

                  <a href="<?php the_permalink(); ?>">

                    <img class="blog-img" src="<?php echo $blog_thumb['0']; ?>" width="100%" alt="<?php the_title_attribute(); ?>">

                  </a>

                </div>

                <div class="w-col w-col-8">

                  <a href="<?php the_permalink(); ?>">

                    <h2 class="blog-h2"><?php echo get_the_title(); ?></h2>

                  </a>

                  <div class="blog-author"><?php echo get_the_date();?> | <?php the_author(); ?></div>

                  <div class="blog-source"><?php if(get_field('source')){?><?= LBL_SOURCE ?> <?php the_field('source'); ?><?php } ?></div>

                  <?php the_excerpt(); ?>

                  <a class="content-link" href="<?php the_permalink(); ?>"><?= LBL_READ_MORE ?></a>

                </div>

              </div>

              <div class="w-row blog-more">

                <div class="w-col w-col-3 w-col-small-4 w-col-tiny-4"></div>

                <div class="w-col w-col-6 w-col-small-4 w-col-tiny-4"></div>

                <div class="w-col w-col-3 w-col-small-4 w-col-tiny-4"></div>

              </div>

            </div>



          <?php }else{ ?>

            <div class="gallery-item">

              <?php

                $gallery_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'gallery-sponsors-thumbs' );

              ?>

              <a <?=get_field('video')?'class="video_thumb_list"':''?> href="<?php the_permalink(); ?>">

                <img class="blog-img" <?=get_field('video')?'style="z-index:-1;"':''?> src="<?php echo $gallery_thumb['0']; ?>" width="100%" alt="<?php the_title_attribute(); ?>">

              </a>

              <a href="<?php the_permalink(); ?>">

                <h2 class="blog-h2 gallery-h2"><?php the_title(); ?></h2>

              </a>

              <?php the_excerpt(); ?>

              <a class="feed-link" href="<?php the_permalink(); ?>"><?= LBL_MORE ?></a>

            </div>

          <?php } ?>

          

          

          <?php 

            if($i==$banner){

              if( function_exists( 'wpx_bannerize' ) ) { ?>
                <?php if($lang=='en-US'){ ?>
                <figure style="margin-bottom:10px;">
                  <?php wpx_bannerize( array( 'random' => true, 'category' => 'inside-list', 'numbers'  => 1, 'orderby'  => 'menu_order') ); ?>
                </figure>
                <?php }else{ ?>
                <figure style="margin-bottom:10px;">
                  <?php wpx_bannerize( array( 'random' => true, 'category' => 'lista-interior', 'numbers'  => 1, 'orderby'  => 'menu_order') ); ?>
                </figure>
                <?php } ?>            

          <?php

              }

            } 

          ?>

          <?php endwhile; ?>

          <?php endif; ?>

          <?php wp_pagenavi(array('query' => $query)); ?>

        </div>

        <?php get_sidebar(); ?>

      </div>

    </div>

  </div>

  <?php get_template_part('includes/sponsors_carrousel'); ?>

  <?php get_footer(); ?>