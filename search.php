<?php
$base_search_url = '/?s='.get_search_query().'&submit=Search';
global $query_string;
$query_args = explode("&", $query_string);
$search_query = array();
foreach($query_args as $key => $string) {
	$query_split = explode("=", $string);
	$search_query[$query_split[0]] = urldecode($query_split[1]);
} // foreach
$refine_text = '';
$refine_sele = array(
	'oral_histories' => '',
	'topy_photos' => '',
	'events' => '',
	'news' => ''
);
switch($_GET['refine']){
	case 'oral_histories':
		$search_query['post_type'] = 'oral_histories';
		$refine_text = 'Oral Histories';
		$refine_sele['oral_histories'] = 'sele';
		break;
	case 'topy_photos':
		$search_query['post_type'] = 'topy_photos';
		$refine_text = 'Topy Photos';
		$refine_sele['topy_photos'] = 'sele';
		break;
	case 'events':
		$search_query['post_type'] = 'events';
		$refine_text = 'Exhibits';
		$refine_sele['events'] = 'sele';
		break;
	case 'pages':
		$search_query['post_type'] = 'page';
		$refine_text = 'Sections';
		$refine_sele['pages'] = 'sele';
		break;
	case 'news':
		$search_query['post_type'] = 'news';
		$refine_text = 'News';
		$refine_sele['news'] = 'sele';
		break;
}
if(!empty($refine_text)){
	$refine_text = ' from '.$refine_text.' <a href="'.$base_search_url.'">(Remove)</a>';
}
$search = new WP_Query($search_query);
// Phonetic Results
$pho_terms = cjhs_phonetic_html(cjhs_phonetic_search(get_search_query()));
$counter = 0;
get_header();
get_sidebar(); ?>
<section id="primary" class="primary" class="search-page">
	<div id="content" role="main">
		<div class="entry-content hentry">
			<?php if ( $search->have_posts() ) : ?>
			<div class="refine">
				<h1>Refine Your Search</h1>
				<?php echo $pho_terms?>
				<div class="options">
					<strong>Show me only results from:</strong>
					<p>
						<a href="<?php echo $base_search_url; ?>&refine=oral_histories" class="label" data-refine="oral_histories"><?php _e( 'Oral Histories', 'cjhs-functionality' ); ?></a>
						<a href="<?php echo $base_search_url; ?>&refine=topy_photos" class="label" data-refine="topy_photots"><?php _e( 'Topy Photos', 'cjhs-functionality' ); ?></a> 
						<a href="<?php echo $base_search_url; ?>&refine=events" class="label" data-refine="events"><?php _e( 'Exhibits', 'cjhs-functionality' ); ?></a> 
						<a href="<?php echo $base_search_url; ?>&refine=pages" class="label" data-refine="pages"><?php _e( 'Sections', 'cjhs-functionality' ); ?></a> 
						<a href="<?php echo $base_search_url; ?>&refine=news" class="label" data-refine="news"><?php _e( 'News', 'cjhs-functionality' ); ?></a> 
					</p>
				</div>
			</div>

			<header class="page-header search-results">
				<h1>
					<?php printf( __( 'Search Results for: %s', 'twentyeleven' ), '<span>' . get_search_query() . '</span>' ); ?> <?php echo $refine_text?>
				</h1>
			</header>
			<?php 
			while ( $search->have_posts() ) : $search->the_post();
				$counter++;
				get_template_part( 'content', get_post_format() );
			endwhile;
			if($counter >= 10 && $wp_query->max_num_pages > 1):
				twentyeleven_content_nav( 'nav-below' );
			endif;
			else : 
				?>
				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyeleven' ); ?></p>
					<div class="refine">
						<?php echo $pho_terms?>
						<div class="options">
							<strong>Show me only results from:</strong>
							<p>
								<a href="<?php echo $base_search_url; ?>&refine=oral_histories" class="label" data-refine="oral_histories"><?php _e( 'Oral Histories', 'cjhs-functionality' ); ?></a>
								<a href="<?php echo $base_search_url; ?>&refine=topy_photos" class="label" data-refine="topy_photots"><?php _e( 'Topy Photos', 'cjhs-functionality' ); ?></a> 
								<a href="<?php echo $base_search_url; ?>&refine=events" class="label" data-refine="events"><?php _e( 'Exhibits', 'cjhs-functionality' ); ?></a> 
								<a href="<?php echo $base_search_url; ?>&refine=pages" class="label" data-refine="pages"><?php _e( 'Sections', 'cjhs-functionality' ); ?></a> 
								<a href="<?php echo $base_search_url; ?>&refine=news" class="label" data-refine="news"><?php _e( 'News', 'cjhs-functionality' ); ?></a> 
							</p>
						</div>
					</div>
					<br/>
					<?php get_search_form(); ?>
				</article>
			<?php endif; ?>
			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Online Catalog Results', 'twentyeleven' ); ?></h1>
			</header>
			<div id="cse-search-results"></div>
			<script type="text/javascript">
			  var googleSearchIframeName = "cse-search-results";
			  var googleSearchFormName = "cse-search-box";
			  var googleSearchFrameWidth = 600;
			  var googleSearchDomain = "www.google.com";
			  var googleSearchPath = "/cse";
			  var nonprofit="true";
			  </script>
		</div>
	</div>
</section>
<?php get_footer(); ?>