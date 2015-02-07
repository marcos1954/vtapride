<?php 
/*Template Name: Sponsors*/
get_header(); ?>
<?php get_template_part('includes/header_image');?>
  <div>
    <div class="w-container">  
      <h1><?php the_title(); ?></h1>
      <?php
        $my_query = new WP_Query(array('post_type'=>'sponsor','posts_per_page' => 500, 'orderby' => 'title', 'order' => 'ASC'));
        while ($my_query->have_posts()) : $my_query->the_post();
      ?>
      <div class="gallery-item sponsor-item">
        <?php the_post_thumbnail('gallery-sponsors-thumbs');?>
          <h2 class="blog-h2 gallery-h2" style="min-height: 30px;"><?php the_title(); ?></h2>
        <?php the_content(); ?>
        <a class="feed-link abs"
        href="javascript:void(0)"></a>
      </div>
      <?php endwhile; ?>
    </div>  
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php if(get_the_content()) { ?>
        <div class="w-container" style="margin-top: 40px; padding-top: 40px; border-top: 1px solid #422f8b;">
          <?php  the_content(); ?>
        </div>
        <?php } ?>
      <?php endwhile; else: ?>
      <?php endif; ?>
    <?php /*Check for existing supporters*/ $hassupporters = get_posts('post_type=supporter'); if( !empty ( $hassupporters ) ) { ?>
    <div class="w-container" style="margin-top: 40px; border-top: 1px solid #422f8b;">  
    <h2><?= get_bloginfo('language')=='es-ES'?'Partidarios':'Supporters'?></h2>
    <?php } ?> 
    <?php
      $my_query = new WP_Query(array('post_type'=>'supporter','posts_per_page' => 500, 'orderby' => 'title', 'order' => 'ASC'));
      while ($my_query->have_posts()) : $my_query->the_post();
    ?>
    <div class="gallery-item sponsor-item" style="height:200px;">
        <?php the_post_thumbnail('gallery-sponsors-thumbs');?>
        <h2 class="blog-h2 gallery-h2" style="min-height: 30px;font-size:15px;text-align:center;font-weight:bold;"><?php the_title(); ?></h2>
    </div>
    <?php endwhile; ?>
    <?php $hassupporters = get_posts('post_type=supporter'); if( !empty ( $hassupporters ) ) { ?>
    </div>
    <?php } ?>
  </div>
  <?php get_footer(); ?>