        <script>
          jQuery( document ).ready(function( $ ) {
            $( ".sidebar-categories > li" ).addClass( "item-categories" );
            $( ".sidebar-categories > li > a" ).addClass( "link-categories" );
          });
        </script>
        <div class="w-col w-col-3 sidebar">
          <h3 class="sidebar-heading">
            <?php 
              $language = get_bloginfo('language');
              if ($language == 'es-ES'){
                echo 'Categor&iacute;as';
              }else{
                echo 'Categories';
              }
            ?>
          </h3>
          <ul class="sidebar-categories" id="jquery-menu-categories">            
            <?php 

            $categories = get_the_category();
            $category_id = $categories[0]->cat_ID;

            //echo $category_id;

            $args = array(
              'show_option_all'    => '',
              'orderby'            => 'name',
              'order'              => 'ASC',
              'style'              => 'list',
              'show_count'         => 0,
              'hide_empty'         => 1,
              'use_desc_for_title' => 1,
              'hierarchical'       => 1,
              'title_li'           => __( '' ),
              'show_option_none'   => __('No categories'),
              'current_category'   => 1,
            );

            $args['include']=$category_id;

            wp_list_categories($args); ?> 
          </ul>
          <div class="rss-link" id="jquery-rss-feed">
              <div><a class="content-link" target="_blank" href="<?php bloginfo('rss2_url'); ?>">RSS Feed</a></div>
          </div>
          <?php get_template_part('includes/related'); ?>

          <div class="w-hidden-small w-hidden-tiny sidebar-banner">
             <?php if( function_exists( 'wpx_bannerize' ) ) {
                wpx_bannerize( array( 'random' => true, 'category' => 'sidebar', 'numbers'  => 4, 'orderby'  => 'menu_order') );
              } ?>
          </div>
          
        </div>