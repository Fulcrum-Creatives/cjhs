<?php
/*
Template Name: News
*/
get_header();
?>
<main id="main" class="body__content main body__content--events body__content--full" role="main">
  <div class="content__main hentry">
    <?php 
    if( have_posts() ) : 
      while( have_posts() ) : 
        the_post();
        echo cjhs_page_title();
        get_template_part( 'template-parts/pages/content', 'news' );
      endwhile; 
    else:
      get_template_part( 'template-parts/content', 'none' );
    endif; wp_reset_postdata();
    ?>
  </div>
  <?php get_sidebar( 'left' ); ?>
</main>
<?php get_footer(); ?>