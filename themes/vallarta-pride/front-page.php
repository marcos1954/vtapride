<?php
get_header();
?>
<?php if(get_bloginfo('language')=='es-ES') { ?>
<!--Pop Up spanish --
<div class="pop-up-wrapper" data-ix="fadein">
    <div class="w-container content">
    <img class="close no-float" data-ix="close" src="<?php echo get_bloginfo ( 'template_url' ) ?>/images/logo.png" alt="5391f8d5bdefff9240965024_logo.png">
    </div>
    <p class="thank-you-text">&iexcl;Gracias!<br><br>Nos vemos en Vallarta Pride 2015</p>
    <ul class="w-list-unstyled links_landing">
        <li class="links_landing_items"><a class="links_landing_link close no-float" data-ix="close" href="#"><span class="rosita">&bull;</span> Vallarta Pride</a>
        <img class="arrow" src="<?php echo get_bloginfo ( 'template_url' ) ?>/images/flecha_1.png" alt="5391fcf1bdefff9240965088_flecha.png">
      </li>
      <li class="links_landing_items"><a class="links_landing_link" href="http://vallartapride.com/acerca-del-vallarta-pride/#acerca-act-lgbt-ac"><span class="rosita">&bull;</span> Acerca de ACT LGBT AC</a>
        <img class="arrow" src="<?php echo get_bloginfo ( 'template_url' ) ?>/images/flecha_1.png" alt="5391fcf1bdefff9240965088_flecha.png">
      </li>
      <li class="links_landing_items"><a class="links_landing_link" href="http://vallartapride.com/galeria/"><span class="rosita">&bull;</span> Clic para Eventos & Galer&iacute;as 2014</a>
        <img class="arrow" src="<?php echo get_bloginfo ( 'template_url' ) ?>/images/flecha_1.png" alt="5391fcf1bdefff9240965088_flecha.png">
      </li>
      <li class="links_landing_items"><a class="links_landing_link" href="http://vallartapride.com/patrocinadores/"><span class="rosita">&bull;</span> Clic para Patrocinadores & Partidarios 2014</a>
        <img class="arrow" src="<?php echo get_bloginfo ( 'template_url' ) ?>/images/flecha_1.png" alt="5391fcf1bdefff9240965088_flecha.png">
      </li>
      <li class="links_landing_items"><a class="links_landing_link" href="http://vallartapride.com/noticias/"><span class="rosita">&bull;</span> Clic para Noticias 2014</a>
        <img class="arrow" src="<?php echo get_bloginfo ( 'template_url' ) ?>/images/flecha_1.png" alt="5391fcf1bdefff9240965088_flecha.png">
      </li>
    </ul>
</div> -->
<?php }else{ ?>
<!--Pop Up english --
<div class="pop-up-wrapper" data-ix="fadein">
    <div class="w-container content">
      <img class="close no-float" data-ix="close" src="<?php echo get_bloginfo ( 'template_url' ) ?>/images/logo.png" alt="5391f8d5bdefff9240965024_logo.png">
    </div>
    <p class="thank-you-text">Thank you!<br><br>See you at Vallarta Pride 2015</p>
    <ul class="w-list-unstyled links_landing">
        <li class="links_landing_items"><a class="links_landing_link close no-float" data-ix="close" href="#"><span class="rosita">&bull;</span> Vallarta Pride</a>
        <img class="arrow" src="<?php echo get_bloginfo ( 'template_url' ) ?>/images/flecha_1.png" alt="5391fcf1bdefff9240965088_flecha.png">
      </li>
      <li class="links_landing_items"><a class="links_landing_link" href="http://vallartapride.com/en/about-vallarta-pride/#about-act-lgbt-ac"><span class="rosita">&bull;</span> About ACT LGBT AC</a>
        <img class="arrow" src="<?php echo get_bloginfo ( 'template_url' ) ?>/images/flecha_1.png" alt="5391fcf1bdefff9240965088_flecha.png">
      </li>
      <li class="links_landing_items"><a class="links_landing_link" href="http://vallartapride.com/en/gallery/"><span class="rosita">&bull;</span> Click here for 2014 Events & Galleries</a>
        <img class="arrow" src="<?php echo get_bloginfo ( 'template_url' ) ?>/images/flecha_1.png" alt="5391fcf1bdefff9240965088_flecha.png">
      </li>
      <li class="links_landing_items"><a class="links_landing_link" href="http://vallartapride.com/en/sponsors/"><span class="rosita">&bull;</span> Click here for 2014 Sponsors & Supporters</a>
        <img class="arrow" src="<?php echo get_bloginfo ( 'template_url' ) ?>/images/flecha_1.png" alt="5391fcf1bdefff9240965088_flecha.png">
      </li>
      <li class="links_landing_items"><a class="links_landing_link" href="http://vallartapride.com/en/news/"><span class="rosita">&bull;</span> Click here for 2014 News</a>
        <img class="arrow" src="<?php echo get_bloginfo ( 'template_url' ) ?>/images/flecha_1.png" alt="5391fcf1bdefff9240965088_flecha.png">
      </li>
    </ul>
</div> -->
<?php } ?>
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