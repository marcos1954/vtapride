<?php get_header(); ?>
<?php //get_template_part('includes/header_image');?>
<div>
    <div class="w-container">
      <div class="w-row">
        <div class="w-col w-col-9">
          <?php get_template_part('includes/breadcrumbs'); ?>
          <?php while ( have_posts() ) : the_post(); ?>
          <h1><?php the_title(); ?></h1>
          <?php get_template_part('includes/gallery'); ?>
          <div class="text-container">
            <div class="blog-date"><?php the_date(); ?></div>
            <div class="blog-source"><?php if(get_field('source')){?><?= LBL_SOURCE ?> <?php the_field('source'); ?><?php } ?></div>
          </div>
          <div class="addthis-wrapper">
            <div class="w-embed w-script">
              <!-- AddThis Button BEGIN -->
              <div class="addthis_toolbox addthis_default_style ">
                <a class="addthis_button_preferred_1"></a>
                <a class="addthis_button_preferred_2"></a>
                <a class="addthis_button_preferred_3"></a>
                <a class="addthis_button_preferred_4"></a>
                <a class="addthis_button_compact"></a>
                <a class="addthis_counter addthis_bubble_style"></a>
              </div>
              <script type="text/javascript">
                var addthis_config = {"data_track_addressbar":true};
              </script>
              <script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52fa5ef147491c3e"></script>
              <!-- AddThis Button END -->
            </div>
          </div>
          <div class="text-container">            
              <?php the_content(); ?>
          </div>
          <?php endwhile; ?> 
          <div class="disqus-wrapper">
            <div class="w-embed w-script">
              <div id="disqus_thread"></div>
              <script type="text/javascript">
                /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                var disqus_shortname = 'vallartapride'; // required: replace example with your forum shortname
                /* * * DON'T EDIT BELOW THIS LINE * * */
                (function() {
                    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                })();
              </script>
              <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a>
              </noscript>
              <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
            </div>
          </div>
        </div>
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
  <div>
    <div class="w-container">
      <?php get_template_part('includes/sponsors_carrousel'); ?>
    </div>
  </div>

<?php get_footer(); ?>