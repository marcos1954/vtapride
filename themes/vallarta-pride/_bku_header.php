<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <?php wp_head(); ?>
  <?php  $lang = get_bloginfo('language');?>
  <meta charset="utf-8">
  <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo ( 'template_url' ) ?>/css/normalize.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo ( 'template_url' ) ?>/css/webflow.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo ( 'template_url' ) ?>/css/vallarta-pride.webflow.css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Open Sans:300,400,600,700,800"]
      }
    });
  </script>
  <script>
    if (/mobile/i.test(navigator.userAgent)) document.documentElement.className += ' w-mobile';
  </script>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_bloginfo ( 'template_url' ) ?>/images/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo get_bloginfo ( 'template_url' ) ?>/images/iconiphone.png">
   <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_bloginfo ( 'template_url' ) ?>/images/iconipad.png" />
   <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_bloginfo ( 'template_url' ) ?>/images/iconipadretina.png" />
  <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script><![endif]-->
  <link rel="stylesheet" href="http://bxslider.com/lib/jquery.bxslider.css" type="text/css" />
  <style>
    .bx-wrapper .bx-viewport{
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        box-shadow: none;
    }
    .bx-wrapper .bx-viewport{
        height:auto!important;
    }
    .bx-wrapper .bx-prev{
        left:-40px;
    }
    .bx-wrapper .bx-next{
        right:-30px;
    }
  </style>

</head>
<body>
  <header>
  <?php get_template_part( '/includes/'.$lang); ?>
    <div class="w-container header">
      <div class="w-row">
        <div class="w-col w-col-4">
          <a href="<?php echo ($lang=='en-US') ? "/en/home":"/"; ?>">
            <img src="<?php echo get_bloginfo ( 'template_url' ) ?>/images/logo_pride.png" alt="Vallarta Pride">
          </a>
        </div>

        <div class="social-wrapper">
            <style>
                .app_download{
                    display:inline-block;
                    height: 25px;
                    vertical-align: top;
                    margin-right: 10px;
                    font-size: 14px;
                }

            </style>
          <ul>
            <li><a class="app_download" target="_blank" href="http://pride.guidevallarta.com/"><?= LBL_APP_DOWNLOAD ?></a></li>
            <li><a target="_blank" href="https://twitter.com/VallartaPride"><span class="icon-twitter">&nbsp;</span></a></li>
            <li><a target="_blank" href="https://www.facebook.com/orgullovallartapride"><span class="icon-facebook">&nbsp;</span></a></li>
            <?php echo pll_the_languages(array('hide_current' => 1, 'echo' => 0)) ?>
          </ul>
        </div>

        <div class="w-col w-col-8 banner-header">
          <?php
            if(is_front_page()){
              if( function_exists( 'wpx_bannerize' ) ) {
                wpx_bannerize( array( 'random' => true, 'category' => 'header-home', 'numbers'  => 1, 'orderby'  => 'menu_order') );
              }
            }else{
              if( function_exists( 'wpx_bannerize' ) ) {
                wpx_bannerize( array( 'random' => true, 'category' => 'header', 'numbers'  => 1, 'orderby'  => 'menu_order' ) );
              }
            }
          ?>
        </div>
      </div>
    </div>
  </header>
  <?php get_template_part('includes/navigation'); ?>