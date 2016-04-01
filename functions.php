<?php
/*---------------------------------------------------------
 * Load Parent Stylesheets
---------------------------------------------------------*/
if( !function_exists( 'fcwp_load_parent_stylesheets' ) ) :
	function fcwp_load_parent_stylesheets() {
		// Load the main stylesheet.
		wp_enqueue_style( 'parent-style', FCWP_URI . '/style.css', array(), '1.0.0' );
	}
	add_action( 'wp_enqueue_scripts', 'fcwp_load_parent_stylesheets' );
endif;

/*---------------------------------------------------------
 * Theme Setup
---------------------------------------------------------*/
if( !function_exists( 'fcwp_theme_support' ) ) :
	function fcwp_theme_support() {
		// Load taxdomain
		load_theme_textdomain( FCWP_TEXTDOMAIN, get_template_directory() . '/languages' );
	    // Title Tage Support
	    add_theme_support( 'title-tag' );
	    // Post Thumbnails
	    add_theme_support( 'post-thumbnails' );
	    // Custom Image Sizes
	    add_image_size( 'monitor', 1400, 9999 );
	    add_image_size( 'tablet', 1024, 9999 );
	    add_image_size( 'mobile', 480, 9999 );
	    add_image_size( 'aside', 174, 174, array( 'center', 'top') );
	    add_image_size( 'aside-sm', 147, 147, array( 'center', 'top') );
	    // Register Nav Menus*/
	    register_nav_menus( array(
	        'primary' => __( 'Primary', FCWP_TEXTDOMAIN ),
	        'footer' => __( 'Footer', FCWP_TEXTDOMAIN ),
	    ) );
	}
	add_action( 'after_setup_theme', 'fcwp_theme_support' );
endif;

/*---------------------------------------------------------
 * Load Stylesheets
---------------------------------------------------------*/
if( !function_exists( 'fcwp_load_stylesheets' ) ) :
	function fcwp_load_stylesheets() {
		// Load the main stylesheet.
		wp_enqueue_style( 'olc-style', FCWP_STYLESHEETURI, array(), '1.0.1' );
		// Load the Internet Explorer 7 specific stylesheet.
		wp_enqueue_style( 'olc-ie8-style', FCWP_CHILD_STYLESHEETURI . '/css/ie8.style.css', array( 'olc-style' ), '1.0.0' );
		wp_style_add_data( 'olc-ie8-style', 'conditional', 'IE 8' );
		// Load the Internet Explorer 7 specific stylesheet.
		wp_enqueue_style( 'olc-ie9-style', FCWP_CHILD_STYLESHEETURI . '/css/ie9.style.css', array( 'olc-style' ), '1.0.0' );
		wp_style_add_data( 'olc-ie9-style', 'conditional', 'IE 9' );
		$dir = get_stylesheet_directory();
		if( filesize( $dir . '/css/quickfix.css' ) != 0 ) {
	        wp_enqueue_style( 'ohw-qf', FCWP_CHILD_STYLESHEETURI . '/css/quickfix.css', array(), '1.0.0', 'all' );
	    }
	}
	add_action( 'wp_enqueue_scripts', 'fcwp_load_stylesheets' );
endif;

/*---------------------------------------------------------
 * Load JavaScript
---------------------------------------------------------*/
if( !function_exists( 'fcwp_load_child_javascript' ) ) :
	function fcwp_load_child_javascript() {
		// jQuery
	    wp_enqueue_script('jquery');
	    // scripts.min.js
	    wp_register_script( 'scripts.min.js', FCWP_CHILD_STYLESHEETURI . '/js/scripts.min.js', false, '1.0.0', true );
	    wp_enqueue_script( 'scripts.min.js' );
	    if( is_home() || is_front_page() ) {
	    	wp_register_script( 'slider.min.js', FCWP_CHILD_STYLESHEETURI . '/js/slider.min.js', false, '1.0.0', true );
	    	wp_enqueue_script( 'slider.min.js' );
	    }
	    if( is_page('results') && !is_page( 'oral-histories' ) ) {
	    	wp_enqueue_script('search-script', 'http://www.google.com/afsonline/show_afs_search.js', false, '1.0', true );
	    }
	    wp_enqueue_script('g-map', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', false, '1.0', false );
	    // comment reply
	    /*if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}*/
	}
	add_action( 'wp_enqueue_scripts', 'fcwp_load_child_javascript' );
endif;

/*---------------------------------------------------------
 * IE Conditional JavaScript
---------------------------------------------------------*/
if( !function_exists( 'fcwp_load_ie' ) ) :
	function fcwp_load_ie() {
	  ob_start();?>
	<!--[if (lt IE 9) & (!IEMobile)]><script src="<?php echo FCWP_CHILD_STYLESHEETURI; ?>/js/ie.min.js"></script><![endif]-->
	  <?php
	  echo ob_get_clean();
	}
	add_action( 'wp_head', 'fcwp_load_ie',10 );
endif;

/*---------------------------------------------------------
 * Sidebar Widget Area
---------------------------------------------------------*/
function fcwp_register_custom_sidebars() {
    register_sidebar( array(
        'name'          => __( 'Left Sidebar', FCWP_TEXTDOMAIN ),
        'id'            => 'left-sidebar',
        'description'   => '',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ));
    register_sidebar( array(
        'name'          => __( 'Right Sidebar', FCWP_TEXTDOMAIN ),
        'id'            => 'right-sidebar',
        'description'   => '',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ));
}
add_action( 'widgets_init', 'fcwp_register_custom_sidebars' );
/* Custom Nav Walker
================================================================================*/
if( !class_exists( 'fcwp_walker_nav_menu' ) ) :
	class fcwp_walker_nav_menu extends Walker_Nav_Menu {
		  
		// add classes to ul sub-menus
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
		    // depth dependent classes
		    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
		    $classes = array(
			        'sub-menu',
			        'menu-depth-' . $display_depth
		        );
		    $class_names = implode( ' ', $classes );
		  
		    // build html
		    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
		}
		  
		// add main/sub classes to li's and links
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );
		  	$display_depth = ( $depth + 1);
		    // depth dependent classes
		    $depth_classes = array(
		        ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
		        'menu-item-depth-' . $depth,
		        'menu-item-' . strtolower( str_replace( ' ', '-', $item->title ) )
		    );
		    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
		 
		    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
		    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
		  
		    // build html
		    $output .= $indent . '<li class="' . $depth_class_names . ' ' . $class_names . '" role="menuitem" aria-lable="' . apply_filters( 'the_title', $item->title, $item->ID ) . '">';
		  
		    // link attributes
		    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
		  
		    
		   	$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
		  
		    // build html
		    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
endif;

/*---------------------------------------------------------
 * Excerpt Length
---------------------------------------------------------*/
function cjhs_excerpt_length( $length ) {
	return 11;
}
add_filter( 'excerpt_length', 'cjhs_excerpt_length' );
/*---------------------------------------------------------
 * Excerpt Link
---------------------------------------------------------*/
function cjhs_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', DOMAIN ) . '</a>';
}
/*---------------------------------------------------------
 * Excerpt More
---------------------------------------------------------*/
function cjhs_auto_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'cjhs_auto_excerpt_more' );
/*---------------------------------------------------------
 * Listings Excerpt More
---------------------------------------------------------*/
function cjhs_custom_excerpt_more( $output ) {
	if ( has_excerpt() && !is_attachment() ) {
		$output .= cjhs_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'cjhs_custom_excerpt_more' );
/*---------------------------------------------------------
 * Page Title
---------------------------------------------------------*/
function cjhs_page_title( $title = '' ) {
	global $post;
	$the_title = ( $title != '' ? __( $title, FCWP_TEXTDOMAIN ) : $post->post_title );
  $post_id = ( $post ? 'id="section-heading-' . $post->ID . '"' : '' );
  if( $the_title ) {
	 return '<header class="page__header"><h2 class="page__title" '. $post_id . '>' . $the_title . '</h2></header>';
  }
}
/*---------------------------------------------------------
 * Content Images
---------------------------------------------------------*/
function cjhs_content_images( $img_size ){
	echo '<ul class="article__aside--list">';
	$rows = ( get_field( 'cjhs_content_images' ) ? get_field( 'cjhs_content_images' ) : '' );
    if( $rows ) {
    // get the first row
  	$first_row = $rows[0]; 
  	$first_row_image = $first_row['cjhs_content_image' ];
    if( $first_row_image ) {
  	  $html = '';
  	    $url     = $first_row_image['url'];
  	    $alt     = $first_row_image['alt'];
  	    $caption = $first_row_image['caption'];
  	    $size    = $img_size;
  	    $thumb   = $first_row_image['sizes'][ $size ];
  	    $ricg    = wp_get_attachment_image_srcset( $first_row_image['ID'], $img_size );
  	    $html .= '<li>
  	            <a href="'. $url .'" title="'. $caption .'" class="fancybox-img">
  	              <img src="'. $thumb .'" srcset="' . $ricg . '" alt="'. $alt .'" />
  	            </a>
  	          </li>';
  		$html .= '</ul>';
  		return $html;
    }
  }
}


/*---------------------------------------------------------
 * Phonetic Hints
---------------------------------------------------------*/
function cjhs_phonetic_search($name){
    $bmpm_path = WP_PLUGIN_DIR.'/bmpm/';
    include $bmpm_path."phoneticutils.php";
    include $bmpm_path."phoneticengine.php";
    include $bmpm_path."gen/lang.php";
    include $bmpm_path."gen/exactcommon.php";
    for ($i=0; $i<count($languages); $i++) {
      include $bmpm_path."gen/rules" . $languages[$i] . ".php";
      include $bmpm_path."gen/exact" . $languages[$i] . ".php";
    }
    $lang = Language($name, $languageRules);
    $codes =
    PhoneticNumbers(
        Phonetic($name,
                 $rules[LanguageIndexFromCode($lang, $languages)],
                 $exactCommon,
                 $exact[LanguageIndexFromCode($lang, $languages)],
                 $lang));
     if($codes == $name)
     	return '';
     
     if(!empty($codes)){
	     return explode(' ', $codes);
     }
}
function cjhs_phonetic_html($phoResults){
	if( !is_array( $phoResults ) ) {
		return '';
  }
	$phoLinks = '';
	foreach( $phoResults as $phoTerms ){
		$phoLinks .= '<a href="?s='.$phoTerms.'&submit=Search" class="label">'.$phoTerms.'</a> ';
	}
  $heading = __( 'Phonetic Match', FCWP_TEXTDOMAIN );
	$text = __( 'You may find more accurate results by clicking an alternate spelling:', FCWP_TEXTDOMAIN );
	$phoHtml = '<p class="content__adv-search--subtitle">' . $heading . '</p><p>' . $text . '</p> ' . $phoLinks;
	
	return $phoHtml;
}

/*---------------------------------------------------------
 * Custom Search forms
---------------------------------------------------------*/

require_once('wp-advanced-search/wpas.php');
function cjhs_adv_search_form() {
    $args = array();
    // Set default WP_Query
    $args['wp_query'] = array( 'post_type' => array(
      'oral_histories',
      'topy_photos',
      'events',
      'page',
      'news'
    ), 
   'orderby' => 'title', 
   'order' => 'ASC' );
    // form
    $args['form'] = array(
      'action' => get_bloginfo('url') . '/results/'
    );
    // Configure form fields
    $args['fields'][] = array( 
      'type'        => 'search', 
      'placeholder' => 'Search the CJHS Website' 
    );
    $args['fields'][] = array( 
      'type'        => 'post_type', 
      'format'      => 'radio', 
      'label'       => 'Show me only results from:', 
      'default_all' => false,
      'values'      => array(
        'oral_histories' => 'Oral Histories',
        'topy_photos'    => "Topy Photos",
        'events'         => 'Exhibits',
      ) );
    $args['fields'][] = array( 'type' => 'submit',
                               'class' => 'button__one',
                               'value' => 'Search Site' );

    register_wpas_form('adv_search_form', $args); 
}
add_action('init','cjhs_adv_search_form');

function cjhs_sm_search_form() {
    $args = array();
    // Set default WP_Query
    $args['wp_query'] = array( 'post_type' => array(
      'oral_histories',
      'topy_photos',
      'events',
    ), 
   'orderby' => 'title', 
   'order' => 'ASC' );
    // form
    $args['form'] = array(
      'action' => get_bloginfo('url') . '/results/'
    );
    // Configure form fields
    $args['fields'][] = array( 
      'type'        => 'search', 
      'placeholder' => 'Search the CJHS Website' 
    );
    $args['fields'][] = array( 'type' => 'submit',
                               'class' => 'button__one',
                               'value' => 'Search Site' );

    register_wpas_form('sm_search_form', $args); 
}
add_action('init','cjhs_sm_search_form');

/*---------------------------------------------------------
 * Get Query args
---------------------------------------------------------*/
function chjs_add_query_vars_filter( $vars ){
  $vars[] = "s";
  $vars[] = "ptype";
  $vars[] = "search_query";
  $vars[] = "post_type";
  $vars[] = "cx";
  $vars[] = "cof";
  $vars[] = "ie";
  $vars[] = "wpas_id";
  $vars[] = "wpas_submit";
  return $vars;
}
add_filter( 'query_vars', 'chjs_add_query_vars_filter' );

/*---------------------------------------------------------
 * Get the post type for the search
---------------------------------------------------------*/
function cjhs_get_the_post_type( $type ) {
  $filter_type = '';
  switch( $type ) {
    case 'oral_histories':
      $filter_type = ' from Oral Histories';
    break;
    case 'topy_photos':
      $filter_type = ' from Topy Photos';
    break;
    case 'events':
      $filter_type = ' from Exhibits';
    break;
    case 'page':
      $filter_type = ' from Sections';
    break;
    case 'news':
      $filter_type = ' from News';
    break;
    case '' :
    default :
      $filter_type = '';
    break;
  }
  return $filter_type;
}

/*---------------------------------------------------------
 * Remove p tags on images
---------------------------------------------------------*/
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

/*---------------------------------------------------------
 * Add classes to image link
---------------------------------------------------------*/
function add_classes_to_linked_images( $content ) {
   // separate classes by spaces
  $classes = 'fancybox-img';
  // check if there are already a class property assigned to the anchor
  if ( preg_match('/<a.*? class=".*?"><img/', $content) ) {
    // If there is, simply add the class
    $content = preg_replace('/(<a.*? class=".*?)(".*?><img)/', '$1 ' . $classes . '$2', $content);
  } else {
    // If there is not an existing class, create a class property
    $content = preg_replace('/(<a.*?)><img/', '$1 class="' . $classes . '" ><img', $content);
  }
  return $content;
}
add_filter('the_content', 'add_classes_to_linked_images', 100, 1);

/*---------------------------------------------------------
 * List with commas and conjunctions
---------------------------------------------------------*/
function cjhs_human_list( $array = array(), $conjuction ) {
  $last  = array_slice( $array, -1 );
  $first = join(', ', array_slice( $array, 0, -1 ) );
  $both  = array_filter( array_merge( array( $first ), $last ) );
  return join( $conjuction, $both );
}

/*---------------------------------------------------------
 * Get Sponsors
---------------------------------------------------------*/
function cjhs_get_sponsor_lists( $id, $amount ) {
  $term = get_term( $id, 'sponsor_level' );
  ?>
  <section class="sponsor__level" aria-labelledby="section-heading-<?php echo $term->slug ?>">
    <header id="section-heading-<?php echo $term->slug ?>" class="sponsor__level--header">
      <h3 class="sponsor__level--header-amount"><?php echo $amount; ?></h3>
      <h4 class="sponsor__level--header-type"><?php echo $term->name; ?></h4>
    </header>
    <?php
    $sponsors_query = new WP_Query(array(
        'post_type'      => 'web_sponsor',
        'tax_query' => array(
            array(
                'taxonomy' => 'sponsor_level',
                'field' => 'slug',
                'terms' => $term->slug
            )
        ),
        'posts_per_page' => '99',
        'no_found_rows'  => true,
    ));
    if( $sponsors_query->have_posts() ) :
      echo '<ul class="sponsor__level--list split-list">';
      while( $sponsors_query->have_posts() ) :
        $sponsors_query->the_post();
    ?>
      <li><?php the_title(); ?></li>
    <?php 
      endwhile;
      echo '</ul>';
    endif; 
    wp_reset_postdata();
    ?>
  </section>
  <?php
}

/*---------------------------------------------------------
 * Purge Cache on custom post type edit
---------------------------------------------------------*/
function w3_flush_page_custom( $post_id ) {
  if ( 'custom_post_type' != get_post_type( $post_id ) ) {
    return;
  }
  $w3_plugin_totalcache->flush_pgcache();
}
add_action( 'edit_post', 'w3_flush_page_custom', 10, 1 );
/*---------------------------------------------------------
 * Redirects
---------------------------------------------------------*/
function fcwp_single_redirects() {
  $queried_post_type = get_query_var('post_type');
  $post_types = array(
    'tout',
    'awards',
    'custom_link',
    'web_sponsor',
    'shop_items',
  );
  foreach( $post_types as $post_type ) {
    if( is_single() && $post_type ==  $queried_post_type ) {
      wp_redirect( home_url(), 301 );
      exit;
    }
  }
}
add_action( 'template_redirect', 'fcwp_single_redirects' );