   <div class="principal-navigation">
    <section class="w-container">
      <div class="w-nav navigation-wrapper" data-collapse="small" data-animation="over-right" data-duration="400" data-contain="1">
        <div class="w-container">
          <a class="w-nav-brand logo-mobile" href="<?php echo (get_bloginfo('language')=='en-US') ? "/en/home":"/"; ?>">
            <img src="<?php echo get_bloginfo ( 'template_url' ) ?>/images/logo-pride-mobile.png" alt="52f3e8b073df7f296b001187_logo-pride-mobile.png">
          </a>
          
          <?php
            echo wp_nav_menu(array(
              "theme_location" => "main_nav" ,
              'container'      => '',
              "container_id"   => 'main-nav',
              'items_wrap'     => '<nav class="w-nav-menu nav-menu" role="navigation">%3$s <ul class="social-nav">
                                    <li><a class="app_download" target="_blank" href="http://pride.guidevallarta.com/">&nbsp;</a></li>
                                    <li><a target="_blank" href="https://twitter.com/VallartaPride"><span class="icon-twitter">&nbsp;</span></a></li>
                                    <li><a target="_blank" href="https://www.facebook.com/orgullovallartapride"><span class="icon-facebook">&nbsp;</span></a></li>
                                    '.pll_the_languages(array('hide_current' => 1, 'echo' => 0)) .'
                                  </ul></nav>',
              'walker'         => new pride_walker_nav_menu()
            ));
          ?>

          <div class="w-nav-button button-menu">
            <div class="w-icon-nav-menu icon-menu"></div>
          </div>
        </div>
      </div>
    </section>
  </div>