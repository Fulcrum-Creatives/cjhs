<?php
/*
Template Name: Home
*/
get_header();
?>
<main id="main" class="fp__content" role="main">
  <?php get_template_part( 'template-parts/pages/content', 'slider' ); ?>
  <div class="body__fp-infobox--full">
    <?php get_template_part( 'template-parts/pages/content', 'toutboxes' ); ?>
  </div>
</main>
<?php get_footer(); ?>