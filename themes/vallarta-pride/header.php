<?php
session_start();
$lang = get_bloginfo('language');

?>
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
  <link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo ( 'template_url' ) ?>/css/pride-pop-up.webflow.css">
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
        <div class="w-col w-col-5">
          <a href="<?php echo ($lang=='en-US') ? "/en/home":"/"; ?>">
            <!--<img src="<?php echo get_bloginfo ( 'template_url' ) ?>/images/logo_pride.png" alt="Vallarta Pride">-->
            <img width=120 style="position: relative; top: 25px;" src="<?php echo get_bloginfo ( 'template_url' ) ?>/images/pridelogo140x120.png" alt="Vallarta Pride">
          </a>
          <?php if ($lang=='en-US') { ?>
            <form class="donate"  action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="JN4V4QG8CJVCG">
            <input type="image" src="https://www.paypalobjects.com/en_US/MX/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
          <?php }else{ ?>
            <form  class="donate"  action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="M64GX3YW9YAMN">
            <input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
          <?php } ?>
          
        </div>

        <div class="social-wrapper">
            <style>
                .app-download{
                    display:inline-block;
                    height: 25px;
                    vertical-align: top;
                    margin-right: 10px;
                    font-size: 12px;
                    font-weight: bold;
                }
                
                .social-link {
                    display:inline-block;
                    height: 25px;
                    vertical-align: top;
                    margin-right: 10px;
                    font-size: 12px;
                }

            </style>
          <ul>
            <li><a class="social-link" target="_blank" href="http://virtualvallarta.com/puertovallarta/news/local/eight-reasons-to-enjoy-vallarta-in-may-2015-1504011.shtml"><?= LBL_RESTAURANTWEEK ?></a></li>
            <li><a class="social-link" target="_self" href="<?php echo ($lang=='en-US') ? '/vallarta-pride-parade/':'http://vallartapride.com/?p=3446' ?>" ><?= LBL_PARADE ?></a></li>
            <li><a class="app-download" target="_blank" href="http://pride.guidevallarta.com/"><?= "App" ?></a></li>
            <li><a target="_blank" href="https://twitter.com/VallartaPride"><span class="icon-twitter">&nbsp;</span></a></li>
            <li><a target="_blank" href="https://www.facebook.com/orgullovallartapride"><span class="icon-facebook">&nbsp;</span></a></li>
            <?php echo pll_the_languages(array('hide_current' => 1, 'echo' => 0)) ?>
          </ul>
        </div>

        <div class="w-col w-col-7 banner-header">
          <?php
            if(is_front_page()){
              if( function_exists( 'wpx_bannerize' ) ) {
                if($lang=='en-US'){
                wpx_bannerize( array( 'random' => true, 'category' => 'header-home', 'numbers'  => 1, 'orderby'  => 'menu_order') );
                }else{
                wpx_bannerize( array( 'random' => true, 'category' => 'cabecera-inicio', 'numbers'  => 1, 'orderby'  => 'menu_order') );
                }
              }
            }else{
              if( function_exists( 'wpx_bannerize' ) ) {
                if($lang=='en-US'){
                wpx_bannerize( array( 'random' => true, 'category' => 'header', 'numbers'  => 1, 'orderby'  => 'menu_order') );
                }else{
                wpx_bannerize( array( 'random' => true, 'category' => 'cabecera', 'numbers'  => 1, 'orderby'  => 'menu_order') );
                }
              }
            }
          ?>
        </div>
      </div>
    </div>
  </header>
  <?php get_template_part('includes/navigation'); ?>
