<div class="site-aside--right">
  <?php get_template_part( 'template-parts/aside/content', 'sponsoredby' ); ?>
</div>
<div class="site-aside--left">
  <div class="left__search">
    <?php $search = new WP_Advanced_Search('sm_search_form'); $search->the_form(); ?>
  </div>
  <?php get_template_part( 'template-parts/aside/content', 'social' ); ?>
</div>