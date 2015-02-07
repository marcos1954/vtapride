<?php 

//Upload size
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );


// Navigation
function register_my_menus() {
  register_nav_menus( array(
	'main_nav' => 'Main Menu',
	) 
  );
}
add_action( 'init', 'register_my_menus' );


// Walker Menu from Webflow
class pride_walker_nav_menu extends Walker_Nav_Menu {
    
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
                $classes[] = 'w-nav-link';
                $classes[] = 'nav-link';

		/**
		 * Filter the CSS class(es) applied to a menu item's <li>.
		 *
		 * @since 3.0.0
		 *
		 * @param array  $classes The CSS classes that are applied to the menu item's <li>.
		 * @param object $item    The current menu item.
		 * @param array  $args    An array of arguments. @see wp_nav_menu()
		 */
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		/**
		 * Filter the ID applied to a menu item's <li>.
		 *
		 * @since 3.0.1
		 *
		 * @param string The ID that is applied to the menu item's <li>.
		 * @param object $item The current menu item.
		 * @param array $args An array of arguments. @see wp_nav_menu()
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		//$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		/**
		 * Filter the HTML attributes applied to a menu item's <a>.
		 *
		 * @since 3.6.0
		 *
		 * @param array $atts {
		 *     The HTML attributes applied to the menu item's <a>, empty strings are ignored.
		 *
		 *     @type string $title  The title attribute.
		 *     @type string $target The target attribute.
		 *     @type string $rel    The rel attribute.
		 *     @type string $href   The href attribute.
		 * }
		 * @param object $item The current menu item.
		 * @param array  $args An array of arguments. @see wp_nav_menu()
		 */
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .$class_names.'>';
		/** This filter is documented in wp-includes/post-template.php */
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		/**
		 * Filter a menu item's starting output.
		 *
		 * The menu item's starting output only includes $args->before, the opening <a>,
		 * the menu item's title, the closing </a>, and $args->after. Currently, there is
		 * no filter for modifying the opening and closing <li> for a menu item.
		 *
		 * @since 3.0.0
		 *
		 * @param string $item_output The menu item's starting HTML output.
		 * @param object $item        Menu item data object.
		 * @param int    $depth       Depth of menu item. Used for padding.
		 * @param array  $args        An array of arguments. @see wp_nav_menu()
		 */
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * Ends the element output, if needed.
	 *
	 * @see Walker::end_el()
	 *
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item   Page data object. Not used.
	 * @param int    $depth  Depth of page. Not Used.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 */
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "\n";
	}
}

//Thumbnails
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 150, 150 ); // default Post Thumbnail dimensions   
}
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'section-head', 1600, 345, true);
    add_image_size( 'home-slide', 800, 400, true);
    add_image_size( 'blog-thumbs', 240, 240, true);
    add_image_size( 'gallery-sponsors-thumbs', 235, 176, true);
    add_image_size( 'events-thumbs', 300, 300, true);
    add_image_size( 'gallery-img', 700, 522, true);
    add_image_size( 'gallery-thumbs', 80, 80, true);
    add_image_size( 'related-thumbs', 225, 136, true);
}

//New Excerpt lenght and more
function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


// Breadcrumb    
/*function the_breadcrumb() {
	echo '<ul class="breadcrumb">';
	if (!is_home()) {
		echo '<li class="item-pagination"><a  href="/">';
		bloginfo('name');
		echo '</li></a>';
		echo ' <li class="item-pagination"><a  href="#">&gt;</a></li> ';
		if (is_category() || is_single()) {
			echo '<li class="item-pagination" id="cat">';
			the_category('title_li=');
			echo '</li>';
			if (is_single()) {
				echo ' <li class="item-pagination"><a  href="#">&gt;</a></li> ';
				echo '<li class="item-pagination"><a  href="#">';
				the_title();
				echo '</li></a>';
			}
		} elseif (is_page()) {
			echo '<li class="item-pagination"><a  href="#">';
			echo the_title();
			echo '</li></a>';
		}
	}
	echo '</ul>';
} */

function the_breadcrumb() {
	global $post;
    echo '<ul class="breadcrumb">';
    if (!is_home()) {
        echo '<li class="item-pagination"><a href="';
        echo get_option('home');
        echo '"&nbsp;>';
        echo 'Home';
        echo '</a></li><li class="item-pagination"> &nbsp; > &nbsp; </li>';
        if (is_category() || is_single()) {
            echo '<li class="item-pagination">';
            the_category(' </li><li class="item-pagination">&nbsp; > &nbsp; </li><li class="item-pagination"> ');
            if (is_single()) {
                echo '</li><li class="item-pagination">&nbsp; > &nbsp;</li><li class="item-pagination">';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
				$anc = get_post_ancestors( $post->ID );
				$title = get_the_title();
				foreach ( $anc as $ancestor ) {
					$output = '<li class="item-pagination"><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'" >'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
				}
				echo $output;
				echo '<strong title="'.$title.'"> '.$title.'</strong>';
			} else {
				echo '<strong> ';
				echo the_title();
				echo '</strong>';
			}
        }
    }
    /*elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li class="item-pagination">Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li class="item-pagination">Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li class="item-pagination">Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li class="item-pagination">Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li class="item-pagination">Search Results"; echo'</li>';}*/
    echo '</ul>';
}

function my_post_queries( $query ) {
  // not an admin page and it is the main query
  if (!is_admin() && $query->is_main_query()){
    if(is_home()){
      $query->set('posts_per_page', 1);
    }
  }
}
add_action( 'pre_get_posts', 'my_post_queries' );

?>