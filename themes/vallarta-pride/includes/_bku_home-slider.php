<div class="w-slider principal-slider" data-animation="slide" data-duration="500" data-infinite="1">
  <div class="w-slider-mask">
  <?php 
    query_posts(
        array( 
            'post_type' => array('post', 'gallery','event'),
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
    <article class="w-slide item-slide">
    <?php if(get_post_type()!='event') { ?>
      
      <a <?=get_field('video')?'class="video_thumb"':''?> href="<?php the_permalink();?>">
      <?php } ?>
        <img class="item-image" src="<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'home-slide' );
        $url = $thumb['0']; echo $url; ?>">
      <?php if(get_post_type()!='event') { ?>
      </a>
    
    <?php } ?>
      <div class="w-clearfix item-caption">
        <h3 class="item-h3"><?php the_title();?></h3>
        <?php the_excerpt(); ?>
        <?php if(get_post_type()!='event') { ?>
          <a class="link-more" href="<?php the_permalink();?>"><?= LBL_MORE ?></a>
        <?php } ?>
      </div>
    </article>
  <?php endwhile; ?>
  <?php endif; ?>
  <?php wp_reset_query(); ?>
  </div>
  <div class="w-slider-arrow-left w-hidden-medium w-hidden-small w-hidden-tiny arrow-wrapper">
    <div class="w-icon-slider-left icon-arrow"></div>
  </div>
  <div class="w-slider-arrow-right w-hidden-medium w-hidden-small w-hidden-tiny arrow-wrapper">
    <div class="w-icon-slider-right icon-arrow"></div>
  </div>
  <div class="w-slider-nav slide-navigation"></div>
</div>