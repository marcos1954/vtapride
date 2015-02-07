  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo get_bloginfo ( 'template_url' ) ?>/js/webflow.js"></script>
  <script type="text/javascript" src="http://bxslider.com/lib/jquery.bxslider.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.sponsor-wrapper').bxSlider({
        slideWidth: 190,
        minSlides: 2,
        maxSlides: 4,
        moveSlides: 4,
        autoStart: true,
        autoDirection: 'next',
        auto: true,
        slideMargin: 10,
        adaptiveHeight: true,
        pager: true,
        controls: false
      });
//alert('starting slider'); // mpage
      //thumbnails gallery
      $('.bxslider').bxSlider({
        pagerCustom: '#bx-pager',
        slideWidth: 700,
        adaptiveHeight: true,
        auto: true,
        prevText: '',
        nextText: '',
        autoDirection: 'next',  // mpage
        autoStart: true, // mpage
      });

      $( ".bx-wrapper .bx-controls-direction a.bx-prev" ).css( "text-indent","1px" );
      $( ".bx-wrapper .bx-controls-direction a.bx-next" ).css( "text-indent","1px" );
      $( ".bx-wrapper .bx-controls-direction a" ).css( "width","40px" );
      $( ".bx-wrapper .bx-controls-direction a" ).css( "height","40px" );
      $( ".bx-wrapper .bx-controls-direction a" ).css( "background","#2a2160" );
      
      $( ".bx-wrapper .bx-controls-direction a.bx-prev" ).addClass( "w-icon-slider-left icon-arrow" );
      $( ".bx-wrapper .bx-controls-direction a.bx-prev" ).removeClass( ".bx-prev" );
      $( ".bx-wrapper .bx-controls-direction a.bx-prev" ).wrap( "<div class='w-slider-arrow-left'></div>" );
      
      $( ".bx-wrapper .bx-controls-direction a.bx-next" ).addClass( "w-icon-slider-right icon-arrow" );
      $( ".bx-wrapper .bx-controls-direction a.bx-next" ).removeClass( ".bx-next" );
      $( ".bx-wrapper .bx-controls-direction a.bx-next" ).wrap( "<div class='w-slider-arrow-right'></div>" );

      $( ".w-slider-arrow-left, .w-slider-arrow-right" ).css( "width","125px" );

    });
  </script>