<footer class="body__footer" role="contentinfo">
  <div class="body__site-aside--mobile">
    <?php get_template_part( 'template-parts/aside/content', 'metagroup' ); ?>
  </div>
  <?php if( is_home() || is_front_page() ): ?>
  <div class="body__fp-infobox--mobile">
    <?php get_template_part( 'template-parts/pages/content', 'toutboxes' ); ?>
  </div>
  <?php endif; ?>
  <div class="footer__meta">
    <?php get_template_part( 'template-parts/menu/content', 'footer' ); ?>
    <?php get_template_part( 'template-parts/footer/content', 'compinfo' ); ?>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>