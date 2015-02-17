<?php
/* Theme Variables
===============================================================================*/
$theme_name =   'CJHS'; 
$content_width = 1200;

/* Required
*************************************/
require(get_template_directory() . '/includes/constant-variables.php');

/* Add Theme Support
===============================================================================*/
function addThemeSupport() {
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support( 'post-formats', array('aside', 'link', 'gallery', 'status', 'quote', 'image'));
}

add_action( 'after_setup_theme', 'addThemeSupport' );
/* Add Custom Admin CSS
===============================================================================*/
function admin_styles() {
  if ( is_admin() ) {
    wp_enqueue_style('main', THEME_URL . 'includes/css/styles.css');
  }
}
add_action('admin_print_styles', 'admin_styles');

/* Editor Styles
===============================================================================*/
function add_editor_styles() {
  add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'add_editor_styles' );

/* Localization
===============================================================================*/
function localization(){
    load_theme_textdomain(DOMAIN, get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'localization');

/* Theme Setup
===============================================================================*/
function cjhs_theme_setup() {
	global $custom_header_support;
	require( get_template_directory() . '/inc/theme-options.php' );
	register_nav_menu( 'primary', __( 'Primary Menu', 'twentyeleven' ) );
	register_nav_menu( 'footer', __( 'Footer Menu', 'twentyeleven' ) );
	set_post_thumbnail_size( 1000, 288, true );
    add_image_size( 'large-feature', 1000, 288, true );
  	add_image_size( 'small-feature', 500, 300 );
  	add_image_size( 'history-right', 185, 9999 );
}
add_action( 'after_setup_theme', 'cjhs_theme_setup' );
/* Register Sidebars
===============================================================================*/
function my_register_sidebars() {
	register_sidebar(
		array(
			'id' => 'right',
			'name' => __( 'Right Sidebar' )
		)
	);
}
add_action( 'widgets_init', 'my_register_sidebars' );

/* Excerpt
===============================================================================*/
function cjhs_excerpt_length( $length ) {
	return 12;
}
add_filter( 'excerpt_length', 'cjhs_excerpt_length' );
function cjhs_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', DOMAIN ) . '</a>';
}
function cjhs_auto_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'cjhs_auto_excerpt_more' );
function cjhs_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= cjhs_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'cjhs_custom_excerpt_more' );

/* More Results
===============================================================================*/
if ( ! function_exists( 'twentyeleven_content_nav' ) ) :
function twentyeleven_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> More Results', 'twentyeleven' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'More Results <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}
endif; // twentyeleven_content_nav

/* URL Grabber
===============================================================================*/
function twentyeleven_url_grabber() {
	if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
		return false;
	return esc_url_raw( $matches[1] );
}

/* Posted On
===============================================================================*/
if ( ! function_exists( 'twentyeleven_posted_on' ) ) :
function twentyeleven_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'twentyeleven' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentyeleven' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;

/* Custom Body Classes
===============================================================================*/
function twentyeleven_body_classes( $classes ) {
	if ( function_exists( 'is_multi_author' ) && ! is_multi_author() )
		$classes[] = 'single-author';
	if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' ) && ! is_page_template( 'sidebar-page.php' ) )
		$classes[] = 'singular';
	return $classes;
}
add_filter( 'body_class', 'twentyeleven_body_classes' );

/**
 * CJHS Specific functions 
 * ------------------------------------------------------------------------------- * */
/* Get Sponsor
===============================================================================*/
function cjhs_get_sponsor_ohistories($id_array){
	$args= array( 'post_type' => 'web_sponsor', 'post__in' => $id_array );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<span>	<?=get_the_title();?></span>
	<?php endwhile; wp_reset_query();
}

/* Get Histoires
===============================================================================*/
function cjhs_get_histories(){
	$args = array(
		   'post_type' => 'histories',
		   'posts_per_page' => -1,
	  	);
	$histories_loop = new WP_Query( $args );
	?> 
	<ul class	="pull-default"> 
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<li><a href="<?=get_permalink()?>">
			<strong><?php the_title();?></strong>
		</a></li>			
	<?php endwhile; ?>
	</ul>
	<ul class="pull-left"></ul>
		<ul class="pull-right"></ul>
			<div style="clear:both"></div>
	<?php
}
/* Get Event Tout
===============================================================================*/
function cjhs_event_tout(){
		$args = array(
		   'post_type' => 'events',
		   'posts_per_page' => 1,
		   'category_name' => 'current'
		);
		$events_tout_loop = new WP_Query( $args );
	while ( $events_tout_loop->have_posts() ) : $events_tout_loop->the_post(); ?>
		<a href="<?php the_permalink()?>">
			<strong><?php the_title(); ?></strong>
			<span><?php the_excerpt(); ?></span>
		</a>			
	<?php endwhile; wp_reset_query();
}

/* Get News Tout
===============================================================================*/
function cjhs_news_tout(){
		$args = array(
		   'post_type' => 'site-news',
		   'posts_per_page' => 1
		);
		$news_tout_loop = new WP_Query( $args );
	while ( $news_tout_loop->have_posts() ) : $news_tout_loop->the_post(); ?>
		<a href="<?=get_permalink()?>">
			<strong><?php the_title(); ?></strong>
			<span><?php the_excerpt(); ?></span>
		</a>			
	<?php endwhile; wp_reset_query();
}

/* Get Featured History Tout
===============================================================================*/
function cjhs_feat_hist_tout(){
		$args = array(
			'post_type'		=> 'oral_histories',
			'posts_per_page' => 1,
			'meta_query' => array(
			  	array(
					'key' => 'featured_history',
					'value' => 1,
					'compare' => '='
				)
			)
		);
		$feat_hist_tout_loop = new WP_Query( $args );
	if( $feat_hist_tout_loop->have_posts() ): while ( $feat_hist_tout_loop->have_posts() ) : $feat_hist_tout_loop->the_post();
	$post_objects = get_field('sponsored_by');
	if( get_field( 'featured_history' ) ): ?>
		<a href="<?php the_permalink(); ?>" class="last">
			<strong>Featured Oral History</strong>
			<span class="oral-history hist-btns"><?php the_title(); 
			if(get_field('sponsored_by')): ?>
				<em class="sponsor-indicate"></em>
			<?php endif; ?>
			</span>
		</a>
	<?php 
	endif; endwhile; endif; wp_reset_query(); 
}
/* Get Archives Tout Tout
===============================================================================*/
function cjhs_past_perfect_tout(){
	$bmpm_path = WP_PLUGIN_DIR.'/php_html_dom/';
    include $bmpm_path."simple_html_dom.php";
	$past_perfect_toc = file_get_html(getcwd().'/ftp_test/vex1/toc.htm');
	//echo $past_perfect_toc;
	$results = '';
	// Find all images with class="cls"
	foreach($past_perfect_toc->find('li.descrip') as $elm) {
	//	if ($count = substr_count(strtolower($elm->innertext), strtolower(trim($searchTerm)))) {
				$result_href = $elm->find('a.reclink',0);
				//echo $result_href->attr['href'];
				//echo $elm->prev_sibling()->innertext;
				$results[] = cjhs_acrchive_tout_result($result_href->attr['href'], $elm->prev_sibling()->innertext, $elm->innertext);
	//	}
	}
	// find random result
	$rand_result = rand(0,count($results)-1);
	return $results[$rand_result];
}
/* Archive Tout Results
===============================================================================*/
function cjhs_acrchive_tout_result($link, $title, $desc){
	$link_base = '/ftp_test/vex1/';
	if($title == '&nbsp;'){
		$title = 'Click for a surprise';
	}
	$result_html = '<a href="'.$link_base.$link.'" class="fancybox-tout" rel="bookmark" data-fancybox-type="iframe">';
	$result_html .= '<strong>From the Archives</strong>';
	$result_html .= '<span>'.$title.'</span>';
	$result_html .= '</a>';
	return $result_html;
}
/* Phonetic Search Suggestions
===============================================================================*/
function cjhs_phonetic_search($name){
	/// encode name using BM phonetic code
    // assume name to be encoded is in $name, can be in utf-8 or in html-ampersand notation
    $bmpm_path = WP_PLUGIN_DIR.'/bmpm/';
    include $bmpm_path."phoneticutils.php";
    include $bmpm_path."phoneticengine.php";
    include $bmpm_path."gen/lang.php";
    include $bmpm_path."gen/exactcommon.php";
   	// print_r($languages);
    //$languages = array('hebrew');
    //print_r($languages);
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
	if(!is_array($phoResults))
		return '';
	$phoLinks = '';
	foreach($phoResults as $phoTerms){
		$phoLinks .= '<a href="?s='.$phoTerms.'&submit=Search" class="label">'.$phoTerms.'</a> ';
	}
	
	$phoHtml = '<div class="phonetic"><strong>Phonetic Match</strong><p>You may find more accurate results by clicking an alternate spelling:</p><p class="pho_results">'.$phoLinks.'</p></div>';
	
	return $phoHtml;
}
/* Get Sponsor
===============================================================================*/
function get_sponsor_section($tax_term, $cash){
	//$loop = '';
	$term = get_term( $tax_term, 'sponsor_level' );
	?>
		<div class="section <?=$term->slug?> clearfix">
			<h2><?=$cash?></h2>
			<h3><?=$term->name?></h3>
			<ul class="pull-default">
		<?php
		$ws_args = array(
			'post_type' => 'web_sponsor',
			'sponsor_level' => $term->slug, 
			'posts_per_page' => -1
		);
		$ws_loop = new WP_Query( $ws_args );
		while ( $ws_loop->have_posts() ) : $ws_loop->the_post();
			echo '<li>'.get_the_title().'</li>';
		endwhile;
	?>
			</ul>
			<ul class="pull-left"></ul>
			<ul class="pull-right"></ul>
			<div style="clear:both"></div>
		</div><!-//end div.section -->
	<?php
}
/* Archives Ordery By
===============================================================================*/
function wpa82795_archives_orderby( $query ) {
    if ( $query->is_archive() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', '-1');
        $query->set( 'meta_key', 'award_year' );
        $query->set( 'orderby', 'award_year' );
        $query->set( 'order', 'ASC' );
    }
    return $query;
}
add_action( 'pre_get_posts', 'wpa82795_archives_orderby' );

/* Get Oh Side Photo
===============================================================================*/
function get_oh_side_photo( $post_id, $photo_number){
	$oh_photo = 'oh_photo_'.$photo_number;
	if( get_post_meta($post_id, $oh_photo, true)):
		$attachment_id = get_post_meta($post_id, $oh_photo, true);?>
		<!--	<?=wp_get_attachment_link( $attachment_id, array(146,146));?>  -->
		<?=wp_get_attachment_link( $attachment_id, 'history-right');?>
		<?php						 
	endif;	
}

/* Get History Side Photo
===============================================================================*/
function get_history_side_photo( $post_id, $photo_number){
	$oh_photo = 'history_image_'.$photo_number;
	if( get_post_meta($post_id, $oh_photo, true)):
		$attachment_id = get_post_meta($post_id, $oh_photo, true);
		?>
			<?php echo wp_get_attachment_link( $attachment_id, array(146,146));?>  
		<?php						 
	endif;	
}
/* Get Header Extras Funded
===============================================================================*/
function cjhs_get_header_extras_funded(){ ?> 
	<a href="/?page_id=351" class="foundation hide-text">Site funded by Yelkin Family Foundation</a>			
<?php }

/* Get Header Extras Social
===============================================================================*/
function cjhs_get_header_extras_social(){ ?> 								
	<ul class="social">
		<li><a href="https://www.facebook.com/pages/Columbus-Jewish-Historical-Society/194503726665" target="_blank" class="facebook hide-text">Find us on Facebook</a></li>
		<li><a href="http://www.linkedin.com/company/columbus-jewish-historical-society" target="_blank" class="linked-in hide-text">Find us on Linked-In</a></li>
		<li><a href="http://www.youtube.com/user/TheCJHS" target="_blank" class="youtube hide-text">Find us on YouTube</a></li>
	</ul>
<?php }

/* Add Touts
===============================================================================*/
function add_touts($post_id){
	$tout_array = get_post_meta($post_id, 'add_touts', true);
	if(is_array($tout_array)){
		?>
		<div class="o-sidebar">
		<?php
		cjhs_get_page_touts_html($tout_array);
		?>
		</div>
		<?php
	}
	
}
/* get Page Touts HTML
===============================================================================*/
function cjhs_get_page_touts_html($id_array){
	$args= array( 'post_type' => 'tout', 'post__in' => $id_array );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post(); 
		$bold_weight_text = get_post_meta(get_the_id(), 'bold_weight_text', true);
		$normal_weight_text = get_post_meta(get_the_id(), 'normal_weight_text', true);
		$tout_link = get_post_meta(get_the_id(), 'tout_link', true);
		$tout_image = '';
		if( get_post_meta(get_the_id(), 'tout_image', true)):
			$attachment_id = get_post_meta(get_the_id(), 'tout_image', true);
			$tout_image_array = wp_get_attachment_image_src( $attachment_id, 'full' );
			$tout_image = '<img src="' . $tout_image_array[0] . '" width="' . $tout_image_array[1] . '" height="' . $tout_image_array[2] . '" />';					 
		endif;
			$reverse_bold = get_post_meta(get_the_id(), 'reverse_bold', true);
		if($reverse_bold){
			$bold_weight_text = '<em>' . $bold_weight_text . '</em>';
		}else{
			$normal_weight_text = '<em>' . $normal_weight_text . '</em>';
		} ?>
			<div class="touts sponsored disclaimer web_sponsor">
				<a href="<?php echo get_permalink( $tout_link ); ?>">
					<?=$tout_image?>
					<strong class="no-sponsor"><?php echo $bold_weight_text ?> <?php echo $normal_weight_text?></strong>			
				</a>																									
			</div>
	<?php endwhile;
}
/* Remove line breaks from Oral Histories posts
===============================================================================*/
/**
 * remove unwanted the line breaks from the Oral Histories posts
 * @return mixed return the content with out the line breaks on the frontend
 */
function remove_breaks_from_content($content){
	if ( 'oral_histories' == get_post_type() ){
		$content = preg_replace('#(<[/]?br.*>)#U', '', $content);
	}
    return $content;
}
add_filter('the_content', 'remove_breaks_from_content');

/* Add Labe to Search Terms
===============================================================================*/
/**
 * Add a lable for the post type in the search
 * @return string returns defined text for each post type 
 */
function cjhs_search_results_type(){
	global $post;
	$post_type = get_post_type( $post );
	switch ($post_type) {
		case "oral_histories":
				echo '<span class="label">Oral Histories</span>';
		   break;
		case "topy_photos":
		   	echo '<span class="label">Topy Photos</span>';
		   break;
		case "events":
		   	echo '<span class="label">Events</span>';
		   break;
		case "web_sponsor":
		   	echo '<span class="label">Web Sponsor</span>';
		   break;
		case "histories":
		   	echo '<span class="label">Histories</span>';
		   break;
		case "awards":
		   	echo '<span class="label">Awards</span>';
		   break;
		case "shop":
		   	echo '<span class="label">Online Catalog</span>';
		   break;
		case "news":
		   	echo '<span class="label">News</span>';
		   break;
		case "tout":
		   	echo '<span class="label">Oral Histories</span>';
		   break;
		default:
			echo '<span></span>';
		break;
	}
} 
add_action('search_lable', 'cjhs_search_results_type', 10);
/* Enqueue Javascript
===============================================================================*/
function load_javascript() {
    // jQuery
    wp_enqueue_script( 'jquery' );
    
    wp_register_script( 'fancybox.js', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', false, '1.0', true );
  	wp_enqueue_script( 'fancybox.js' );

  	wp_register_script( 'jquery_ui.js', get_template_directory_uri() . '/js/jquery-ui-1.8.13.custom.min.js', false, '1.0', false );
	wp_register_script( 'thumbnail_scroller.js', get_template_directory_uri() . '/js/jquery.thumbnailScroller.js', false, '1.0', true );

	wp_register_script( 'onthefly', 'https://www.google.com/cse/tools/onthefly?form=searchbox_demo&lang&ver=1.0', false, '1.0', true );
  	if( is_search() ){
		wp_enqueue_script( 'onthefly' );
	}

  	wp_register_script( 'scripts.js', get_template_directory_uri() . '/js/scripts.js', false, '1.0', true );
	wp_enqueue_script( 'scripts.js' );
	
	if( is_page('home') ){
    	wp_register_script( 'home.js', get_template_directory_uri() . '/js/home.js', false, '1.0', true  );
    	wp_enqueue_script( 'home.js');
    }
	if( 'topy_photos' == get_post_type() ) {
		wp_enqueue_script('jquery_ui.js' );
		wp_enqueue_script('thumbnail_scroller.js' );
	}
	if (is_singular( 'topy_photos' ) ) {
		wp_register_script('toby-photos', get_template_directory_uri() . '/js/toby-photos.js', false, '1.0', true  );
  		wp_enqueue_script('toby-photos' );
	}
	if( is_page( 'search-site') ){
    	wp_register_script('home.js', get_template_directory_uri() . '/js/search-site.js', false, '1.0', true  );
    	wp_enqueue_script('home.js' );
    }
    if( is_singular() ) {
        if( get_option( 'thread_comments' ) )  {
            wp_enqueue_script( 'comment-reply' );
        }
    }
    if( is_search() && ! is_page( 'oral-histories' ) ) {
    	wp_enqueue_script('search-script', 'http://www.google.com/afsonline/show_afs_search.js', false, '1.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'load_javascript' );
/* IE Conditional
*************************************/
function load_ie() {
  ob_start();?>
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/ie.min.js"></script><![endif]-->
  <?php
  echo ob_get_clean(); echo "\n";
}
add_action('wp_head', 'load_ie',10);

/* Topy
*************************************/
function load_topu() {
	wp_register_script('jquery_ui.js', get_template_directory_uri() . '/js/jquery-ui-1.8.13.custom.min.js', false, '1.0', false);
	wp_register_script('thumbnail_scroller.js', get_template_directory_uri() . '/js/jquery.thumbnailScroller.js', false, '1.0', true);
	wp_enqueue_script('jquery_ui.js');
	wp_enqueue_script('thumbnail_scroller.js');
}
add_action('top_scripts', 'load_topu'); 

/* User Roles and Permissions
===============================================================================*/
/**
 * remove the default WordPress roles that are not going to be used
 */
remove_role('subscriber');
remove_role('editor');
remove_role('author');
remove_role('contributor');
/**
 * remove access to admin menu items for the Client role
 */
function cjhs_roles_menu() {
  // If the user does not have access to publish posts
  if(!current_user_can('add_users')) {
    // Remove the "Tools" menu
    remove_menu_page('tools.php');
    remove_menu_page('options-general.php');
  }
}
add_action( 'admin_init', 'cjhs_roles_menu' );

/* Image with Caption
===============================================================================*/
/**
 * Get the attachment ID from the Image URL
 * @param  string  $attachment_url the image url
 * @return interger  the attchment ID
 * @source  http://philipnewcomer.net/2012/11/get-the-attachment-id-from-an-image-url-in-wordpress/
 */
function cjhs_get_attachment_id( $attachment_url = '' ) {
	global $wpdb;
	$attachment_id = false;
	if ( '' == $attachment_url )
		return;
	$upload_dir_paths = wp_upload_dir();
	if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
		$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
		$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
		$attachment_id = $wpdb->get_var( 
			$wpdb->prepare( "	SELECT wposts.ID 
								FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta 
								WHERE wposts.ID = wpostmeta.post_id 
								AND wpostmeta.meta_key = '_wp_attached_file' 
								AND wpostmeta.meta_value = '%s' 
								AND wposts.post_type = 'attachment'", 
								$attachment_url ) );
	}
	return $attachment_id;
}
/**
 * Use the image attachment caption for the link title attribute
 * @param  int $post_id				the post ID
 * @param  string $image_type    	the type of image to display
 * @param  string $image_size    	the size of image to display
 * @param  string $link_rel      	optional: the rel attribute
 * @param  string $image_classes 	optional: additional classes to add to the image tag
 * @return mixed                	output the link and image tags
 */
function cjhs_show_image_with_caption($post_id, $image_type, $image_size = 'full', $link_rel = '', $image_classes = ''){
	$attachment_id = get_post_meta($post_id, $image_type, true);
	$alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
	$url =  wp_get_attachment_image_src($attachment_id, $image_size );
	$linkurl =  wp_get_attachment_image_src($attachment_id, 'large' );
	$title = the_title();
	$caption = get_post_field('post_excerpt', cjhs_get_attachment_id( $url[0] ));
	echo '<a href="' . $linkurl[0] . '" rel="' . $link_rel . '" title="' . $caption . '">
	<img src="' . $url[0] . '" alt="' . $alt . '"  class="attachment-' . $image_size . ' ' . $image_classes . '"/>
	</a>';
}
function theme_prefix_rewrite_flush() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'theme_prefix_rewrite_flush' );


/* Hide Custom Fields
===============================================================================*/
define( 'ACF_LITE' , true );