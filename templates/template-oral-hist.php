<?php
/*
Template Name: Oral Histories
*/
get_header();
?>
<main id="main" class="body__content main body__content--oral-hist" role="main">
  <div class="content__main hentry">
    <?php 
    if( have_posts() ) : 
      while( have_posts() ) : 
        the_post();
        get_template_part( 'template-parts/content', 'page' );
      endwhile; else:
      get_template_part( 'template-parts/content', 'none' );
    endif; 
    wp_reset_postdata();
    get_template_part( 'template-parts/pages/content', 'oralhist' );
    get_sidebar( 'left' );
    get_sidebar( 'right' ); 
    ?>
</main>
<?php get_footer(); ?>