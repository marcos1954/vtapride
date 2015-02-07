<?php get_header(); ?>
<?php get_template_part('includes/header_image');?>
  <div class="home-container">
    <div class="w-container home-content" style="text-align: center;">
        <?=LBL_404?>
    </div>
  </div>
  <div>
    <div class="w-container principal-content">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; ?>  
    </div>
  </div>
  <?php get_template_part('includes/sponsors_carrousel'); ?>
  <?php get_footer(); ?>