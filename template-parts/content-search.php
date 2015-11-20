<?php
$advanced_search = new WP_Advanced_Search('adv_search_form');
$search_query = $advanced_search->query();
// if query var ptype not empty return, else return query var post_type
$get_post_type_var = ( get_query_var( 'ptype' ) ? get_query_var( 'ptype' ) : get_query_var( 'post_type' ) );
// if query var search_query_var not empty return else return query var s
$search_query_var = ( get_query_var( 'search_query' ) ? get_query_var( 'search_query' ) : get_query_var( 's' ) );
$search_query_var_lable = cjhs_get_the_post_type( $search_query_var );
$cx = get_query_var( 'cx' );
$cof = get_query_var( 'cof' );
$ie = get_query_var( 'ie' );
$wpas_id = get_query_var( 'wpas_id' );
$wpas_submit = get_query_var( 'wpas_submit' );
//$the_query_string = '/?s=' . str_replace( ' ', '+', $search_query_var ) . '&cx='. $cx . '&cof=' . $cof . '&ie=' . $ie . '&wpas_id=adv_search_form&wpas_submit=1';
$the_query_string = '/?search_query=' . str_replace( ' ', '+', $search_query_var );
$pho_terms = cjhs_phonetic_search( $search_query_var );
?>
<main id="main" class="body__content main" role="main">
  <div class="content__main hentry">
    <?php if( $search_query->have_posts() ) : ?>
    	<div class="content__adv-search">
		  	<h3 class="content__adv-search--title"><?php _e( 'Refine Your Search', FCWP_TEXTDOMAIN); ?></h3>
		  	<?php
		  	if( is_array( $pho_terms ) ) :
				  $links = '';
				  foreach( $pho_terms as $pho_term ):
				    //$the_pon_query = '/?search_query=' . str_replace( ' ', '+', $pho_term ) . '&cx='. $cx . '&cof=' . $cof . '&ie=' . $ie . '&wpas_id=adv_search_form&wpas_submit=1';
            $the_pon_query = '/?search_query=' . str_replace( ' ', '+', $pho_term );
				    $links .= '<a href="' . $the_pon_query . '" class="button__one inline">' . $pho_term . '</a> ';
				  endforeach;
				  $heading = __( 'Phonetic Match', FCWP_TEXTDOMAIN );
				  $text = __( 'You may find more accurate results by clicking an alternate spelling:', FCWP_TEXTDOMAIN );
				  $html = '<div class="content__phonetic-match"><p class="content__adv-search--subtitle">' . $heading . '</p><p>' . $text . '</p> ' . $links . '</div>';
				  echo $html;
				endif;
				?>
		  	<p class="content__adv-search--subtitle"><?php _e( 'Show me only results from:', FCWP_TEXTDOMAIN); ?></p>
		    <a href="<?php echo home_url() . '/results' . $the_query_string; ?>&ptype=oral_histories" class="button__one inline"/>Oral History</a>
		    <a href="<?php echo home_url() . '/results' . $the_query_string; ?>&ptype=topy_photos" class="button__one inline"/>Topy Photos</a>
		    <a href="<?php echo home_url() . '/results' . $the_query_string; ?>&ptype=events" class="button__one inline"/>Exhibits</a>
		    <!-- <a href="<?php echo home_url() . '/results' . $the_query_string; ?>&ptype=page" class="button__one inline"/>Section</a>
		    <a href="<?php echo home_url() . '/results' . $the_query_string; ?>&ptype=news" class="button__one inline"/>News</a> -->
        <?php if( isset( $_GET['ptype'] ) || isset( $_GET['post_type'] ) ) : ?>
          <a href="<?php echo $the_query_string; ?>" class="button__one inline"/>Clear</a>
        <?php endif; ?>
	    </div>
     <?php 
      echo cjhs_page_title( 'Search Results for: ' . $search_query_var . $search_query_var_lable ); 
      while( $search_query->have_posts() ) : $search_query->the_post();
      	$post_type = $post->post_type;
      	// if $get_post_type_var has a value return, else return the entry post type
      	$get_the_post_type = ( isset( $_REQUEST[$get_post_type_var] ) ? $get_post_type_var : $post_type );
      	$filter_type = cjhs_get_the_post_type( $get_the_post_type );
        $adv_filter_text = ( $filter_type ? '<a href="' . get_the_permalink() . '" class="button__three">' . $filter_type . '</a>' : '' );
      ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('entry__search-results article__entries--border'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
          <header class="entry__header">
            <h3 class="entry__title" id="section-heading-<?php the_ID(); ?>">
              <?php echo $adv_filter_text; ?>
              <a href="<?php the_permalink(); ?>" rel="bookmark">
                <?php the_title(); ?>
              </a>
            </h3>
          </header>
          <section class="entry__content">
            <?php the_excerpt(); ?>
          </section>
        </article>
    <?php
      endwhile;
      $pagi_args = array(
        'prev_text' => 'Previous',
        'next_text' => 'Next',
        'end_size'  => 5,
        'mid_size'  => 1
      );
      $advanced_search->pagination( $pagi_args );
    else : 
      get_template_part( 'template-parts/pages/content', 'advsearch' );
    ?>
    	<h2>
    		<?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords', FCWP_TEXTDOMAIN ); ?>
    	</h2>
    <?php
    endif; 
    ?>
        <!-- <header class="entry__header">
          <h3 class="entry__title"><?php _e( 'Online Catalog Results', FCWP_TEXTDOMAIN ); ?></h3>
        </header>
        <div id="cse-search-results"></div> -->
        <script type="text/javascript">
          /*var googleSearchIframeName = "cse-search-results";
          var googleSearchFormName = "cse-search-box";
          var googleSearchFrameWidth = 600;
          var googleSearchDomain = "www.google.com";
          var googleSearchPath = "/cse";
          var nonprofit="true";*/
        </script>
    </script>
    <?php get_sidebar( 'left' ); ?>
</main>