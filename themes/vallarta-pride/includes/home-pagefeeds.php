  <?php if(get_bloginfo('language')=="en-US") : ?>
      <div class="w-col w-col-3 padding-cero">
        <a href="<?php echo get_permalink( 38 ); ?>">
        <div class="one-block">
          <div class="one-block-text"><?php $sponsors_title = get_post(38, ARRAY_A); $title = $sponsors_title['post_title']; echo $title; ?></div>
        </div>
        </a>
        <a href="<?php echo get_permalink( 30 ); ?>">
        <div class="two-block">
          <div class="two-block-text"><?php $gallery_title = get_post(30, ARRAY_A); $title = $gallery_title['post_title']; echo $title; ?></div>
        </div>
        </a>
      </div>
      <div class="w-col w-col-3 padding-cero">
        <a href="<?php echo get_permalink( 20 ); ?>">
          <div class="one-quarter-block">
            <div class="one-quarter-block-text"><?php $blog_title = get_post(20, ARRAY_A); $title = $blog_title['post_title']; echo $title; ?></div>
          </div>
        </a>
        <a href="<?php echo get_permalink( 24 ); ?>">
          <div class="last-block">
          <div class="last-block-text"><?php $about_title = get_post(24, ARRAY_A); $title = $about_title['post_title']; echo $title; ?></div>
        </div> 
        </a>
      </div>
  <?php else: ?>
      <div class="w-col w-col-3 padding-cero">
        <a href="<?php echo get_permalink( 36 ); ?>">
        <div class="one-block">
          <div class="one-block-text"><?php $sponsors_title = get_post(36, ARRAY_A); $title = $sponsors_title['post_title']; echo $title; ?></div>
        </div>
        </a>
        <a href="<?php echo get_permalink( 28 ); ?>">
        <div class="two-block">
          <div class="two-block-text"><?php $gallery_title = get_post(28, ARRAY_A); $title = $gallery_title['post_title']; echo $title; ?></div>
        </div>
        </a>
      </div>
      <div class="w-col w-col-3 padding-cero">
        <a href="<?php echo get_permalink( 12 ); ?>">
          <div class="one-quarter-block">
            <div class="one-quarter-block-text"><?php $blog_title = get_post(12, ARRAY_A); $title = $blog_title['post_title']; echo $title; ?></div>
          </div>
        </a>
        <a href="<?php echo get_permalink( 22 ); ?>">
          <div class="last-block">
          <div class="last-block-text"><?php $about_title = get_post(22, ARRAY_A); $title = $about_title['post_title']; echo $title; ?></div>
        </div> 
        </a>
      </div>
  <?php endif; ?>