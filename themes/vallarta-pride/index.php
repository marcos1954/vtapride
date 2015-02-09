<?php 
/*Template Name: Blog*/
get_header(); echo 'index template<br />'; ?>
<?php get_template_part('includes/header_image');?>
  <div>
    <div class="w-container">
      <div class="w-row">
        <div class="w-col w-col-9">
          <h1><?php single_post_title(); ?></h1>
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
            $my_query = new WP_Query(array('post_type'=>'Post','posts_per_page' => 2, 'paged' => get_query_var('paged')));
            //wp_pagenavi(array('query' => $my_query)); //Paginacion superior
          ?>
          <?php 
            while ($my_query->have_posts()) : $my_query->the_post();
                    ?>
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
                  <h2 class="blog-h2"><?php get_the_title(); ?></h2>
                </a>
                <div class="blog-author"><?php echo get_the_date();?> | <?php the_author(); ?></div>
                <div class="blog-source">Source: www.mijobrands.com</div>
                <?php the_excerpt(); ?>
                <a class="content-link" href="<?php the_permalink(); ?>">READ MORE</a>
              </div>
            </div>
            <div class="w-row blog-more">
              <div class="w-col w-col-3 w-col-small-4 w-col-tiny-4"></div>
              <div class="w-col w-col-6 w-col-small-4 w-col-tiny-4"></div>
              <div class="w-col w-col-3 w-col-small-4 w-col-tiny-4"></div>
            </div>
          </div>
          <?php endwhile; ?>
          <!-- <img class="inlist-banner" src="images/700x150.gif" alt="52fd1506121bc8277e000f78_700x150.gif">  -->       
            <?php //wp_pagenavi(array('query' => $my_query)); ?>
        </div>
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
  <?php get_template_part('includes/sponsors_carrousel'); ?>
  <?php get_footer(); ?>