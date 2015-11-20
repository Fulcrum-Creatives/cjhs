<?php
$search = new WP_Advanced_Search('adv_search_form');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('page__content'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
  <?php 
  $title = get_the_content();
  echo cjhs_page_title( 'Type your search inquiry here to search files from The Columbus Jewish Historical Society website.' ); 
  ?>
  <div class="content__adv-search">
    <?php $search->the_form(); ?>
  </div>
</article>