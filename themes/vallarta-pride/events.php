<?php 
/*Template Name: Events*/
get_header(); ?>
<?php get_template_part('includes/header_image');?>
 <div>
     <script>
      function blinker() {
          $('.w-col-8 span').fadeOut(500);
          $('.w-col-8 span').fadeIn(500);
      }
      setInterval(blinker, 2500);
    </script>
    <div class="w-container">
      <div class="w-row">
        <div class="w-col w-col-12">
        <h1><?php single_post_title(); ?></h1>
        </div>
      </div>
      <?php 
      $i = 0;
      $now = current_time( 'timestamp' );
      query_posts(
          array(
        'post_type'   => 'event',
        'posts_per_page'  => 50,
        'meta_key'    => 'start',
        'orderby'   => 'meta_value_num',
        'order'     => 'ASC',
        'meta_query'    => array(
          array(
            'key' => 'end',
            'value' => $now,
            'type' => 'numeric',
            'compare' => '>='
          )
        )
      ));
      if (have_posts()) : while (have_posts()) : the_post(); 
      $i ++;
      ?>
      <div class="blog-item" id="<?php  global $post; echo $post->post_name; ?>">
        <div class="w-row">
          <div class="w-col w-col-4">
            <?php //Print event image
              $event_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'events-thumbs' );
            ?>
            <img src="<?php echo $event_img['0']; ?>" width="100%" alt="<?php the_title_attribute(); ?>">

          </div>
          <div class="w-col w-col-8">
            <h2 class="blog-h2" style="text-align:left;"><?php the_title(); ?></h2>
            <?php //Get start time and language for "ongoing" message to appear 
              $hora_inicio = get_field( 'start' ); 
              $language = get_bloginfo('language');
            ?>
            <?php if ($language == 'es-ES'){ ?>
              <?= ($now >= $hora_inicio )? '<span class="ongoing">¡En marcha!</span>':''?>
            <?php }else{?>
              <?= ($now >= $hora_inicio )? '<span class="ongoing">Ongoing!</span>':''?>
            <?php } ?>
            <div class="feeed-date">
              <?php 
                $day = date("w", $hora_inicio);
                if ($language == 'es-ES'){
                  $starting = date(" j/M/Y | g:i a", $hora_inicio);
                }else{
                  $starting = date(" M/j/Y | g:i a", $hora_inicio);
                }
                if ($language == 'es-ES'){ //Translate Week days
                  $day_trans = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                }else{
                  $day_trans = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
                }
                echo $day_trans[$day];
                echo $starting;
              ?> -
              <?php 
                $hora_fin = get_field( 'end' );
                $ending = date(" g:i a", $hora_fin);
                echo $ending;
              ?> 
               @ <?php the_field('place'); ?>. 
            </div>
            <?php the_content(); ?>
          </div>
        </div>
        <div class="w-row blog-more events-list">
          <div class="w-col w-col-6"></div>
          <div class="w-col w-col-6"></div>
        </div>
        </div>
        <?php 
            if(false && $i==6){  // mpage change to remove banners on event page lists
              if( function_exists( 'wpx_bannerize' ) ) { ?>
               <figure style="margin-bottom:10px;">
                <?php wpx_bannerize( array( 'random' => true, 'category' => 'inside-list', 'numbers'  => 1, 'orderby'  => 'menu_order') );?>
              </figure>
          <?php
              }
            } 
          ?>
      <?php endwhile; endif; ?>

      </div>
  </div>
  <?php get_template_part('includes/sponsors_carrousel'); ?>
  <?php get_footer(); ?>

