<script>
	function blinker() {
	    $('span.ongoing').fadeOut(500);
	    $('span.ongoing').fadeIn(500);
	}
	setInterval(blinker, 2500);
</script>

<?php 
$now = current_time( 'timestamp' );

query_posts(

    array(

	'post_type'		=> 'event',

	'posts_per_page'	=> 4,

	'meta_key'		=> 'start',

	'orderby'		=> 'meta_value_num',

	'order'			=> 'ASC',

	'meta_query'		=> array(

		array(
		
			'key' => 'end',
			'value' => $now,
			'type' => 'numeric',
			'compare' => '>='
		),
		
		//array(
		//
		//	'key' => 'homepage_event',
		//	'value' => '1',
		//	'compare' => '=='
		//
		//)
	)
));

if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="w-clearfix feed-wrapper">

		<?php //Print event image

			$event_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'default' );

		?>

		<img class="feed-image" src="<?php echo $event_img['0']; ?>" width="100%" alt="<?php the_title_attribute(); ?>">

		<h2 class="feed-h2"><?php the_title();?></h2>

		<?php //Get start time and language for "ongoing" message to appear 

			$hora_inicio = get_field( 'start' ); 

			$language = get_bloginfo('language');

		?>

		<?php if ($language == 'es-ES'){ ?>

			<?= ($now >= $hora_inicio )? '<span class="ongoing">¡En marcha!</span>':''?>

		<?php }else{?>

			<?= ($now >= $hora_inicio )? '<span class="ongoing">Ongoing!</span>':''?>

		<?php } ?>

		<div class="feeed-date">

			<?php 

				$day = date("w", $hora_inicio);

				if ($language == 'es-ES'){

					$starting = date(" j/M/Y | g:i a", $hora_inicio);

				}else{

					$starting = date(" M/j/Y | g:i a", $hora_inicio);

				}

				if ($language == 'es-ES'){ //Translate Week days

					$day_trans = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");

				}else{

					$day_trans = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");

				}

				echo $day_trans[$day];

				echo $starting;

			?> -

			<?php 

				$hora_fin = get_field( 'end' );

				$ending = date(" g:i a", $hora_fin);

				echo $ending;

			?> 

			 @ <?php the_field('place');?>. 





		</div>

		<?php //the_excerpt(); ?>
		<?php the_content(); ?>

		<a class="feed-link"></a>

	</div>

<?php endwhile; ?>

<?php endif; ?>

<?php wp_reset_query(); ?>

