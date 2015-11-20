<article id="post-<?php the_ID(); ?>" <?php post_class('page__content'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
  <?php echo cjhs_page_title(); ?>
  <div class="entries__content">
    <?php the_content(); ?>
  </div>
</article>