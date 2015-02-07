<style>
    #bx-pager{margin: -60px 0 30px 0 !important;}
    .bx-wrapper img {height: auto;}
    .attachment-gallery-thumbs{width: 69px;height: 69px;margin: 2px;}
</style>
<?php
//echo '$post = <pre>'; print_r($post); echo '</pre>';   //mpage

  $images =& get_children( array (
    'post_parent' => $post->ID,
    'post_type' => 'attachment',
    'post_mime_type' => 'image',
    'exclude'     => get_post_thumbnail_id($post->ID),
  ));
?>
<?php

if(count($images) > 1) { ?>
<div class="gallery">
	<ul class="bxslider" id="no-margin-bottom">
        <?php
            if ( empty($images)) {
              // no attachments here ?>  
              <?php } else {
              foreach ( $images as $attachment_id => $attachment ) { ?>
                <li>
                  <?php  echo wp_get_attachment_image( $attachment_id, 'gallery-img' ); ?>
                </li>
              <?php
              }
            }
      	?> 
  	</ul>
	<div id="bx-pager">
		<?php
			$i=-1;
            if ( empty($images) ) {
              // no attachments here ?>  
              <?php } else {
          		
              foreach ( $images as $attachment_id => $attachment ) { $i++; ?>
	  			<a data-slide-index="<?php echo $i; ?>" href=""><?php  echo wp_get_attachment_image( $attachment_id, 'gallery-thumbs' );			?></a>
 		<?php } } ?> 
	</div>
</div>
<?php } ?>