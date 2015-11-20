<aside class="body__aside body__aside--right" role="complementary">
  <?php 
  get_template_part( 'template-parts/aside/content', 'cart' );
  get_template_part( 'template-parts/aside/content', 'touts' );
  get_template_part( 'template-parts/aside/content', 'sponsored' );
  get_template_part( 'template-parts/aside/content', 'images' );
  ?>
  <ul class="widget-area">
        <?php dynamic_sidebar('right-sidebar'); ?>
  </ul>
</aside>