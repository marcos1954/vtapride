<?php get_header(); ?>
  <div>
    <div class="w-row">
      <div class="w-col w-col-6 padding-cero">
    	<?php get_template_part( 'includes/home-slider'); ?>
      </div>
	<?php get_template_part( 'includes/home-pagefeeds'); ?>
    </div>
  </div>
    <a class="next-events" href="#events"><?= get_bloginfo('language')=='es-ES'?'Pr&oacute;ximos Eventos':'Upcoming Events'?></a>
  <?php get_template_part('includes/sponsors_carrousel'); ?>
  <div class="home-container">
    <div class="w-container home-content">
    <?php while ( have_posts() ) : the_post(); ?>
      <h1 class="home-h1"><?php the_title(); ?></h1>
      <?php the_content(); ?>
  	<?php endwhile; ?>

    </div>
  </div>
  <div>
    <div class="w-container" id="events">
	<?php get_template_part('includes/event_feed_home'); ?>
      <div style="text-align: center">
          <a href="<?php echo get_bloginfo('language')=='es-ES'?'/eventos/':'/en/events/'?>" style="color: #eb008b">
            <?php echo get_bloginfo('language')=='es-ES'?'M&aacute;s eventos':'More events'?>
          </a>
      </div>
    </div>
  </div>
<?php get_footer(); ?>