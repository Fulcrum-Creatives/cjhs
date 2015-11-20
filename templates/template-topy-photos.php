<?php
/*
Template Name: Topy Photos
*/
get_header();
?>
<main id="main" class="body__content main body__content--top-photos body__content--left-sidebar" role="main">
  <div class="content__main hentry">
    <?php 
    if( have_posts() ) : 
      while( have_posts() ) : 
        the_post();
        echo cjhs_page_title( 'Topy Photo Collection' );
      endwhile; 
    else:
      get_template_part( 'template-parts/content', 'none' );
    endif; wp_reset_postdata();
    get_template_part( 'template-parts/pages/content', 'topyphotos' );
    get_sidebar( 'left' );
    ?>
  </div>
</main>
<?php get_footer(); ?>