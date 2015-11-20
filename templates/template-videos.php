<?php
/*
Template Name: Digital Collection 
*/
get_header();
?>
<main id="main" class="body__content main body__content--sm-aside" role="main">
  <div class="content__main">
    <?php 
    if( have_posts() ) : 
      while( have_posts() ) : 
        the_post();
        get_template_part( 'template-parts/content', 'page' );
      endwhile; 
    else:
      get_template_part( 'template-parts/content', 'none' );
    endif; wp_reset_postdata();
    get_template_part( 'template-parts/pages/content', 'video' );
    get_sidebar( 'left' );
    get_sidebar( 'right' ); 
    ?>
</main>
<?php get_footer(); ?>