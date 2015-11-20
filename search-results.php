<?php get_header(); ?>
<main id="main" class="body__content main body__content--sm-aside" role="main">
  <div class="content__main hentry">
    <?php 
    $search = new WP_Advanced_Search('newpage');
    $search->the_form();
    if( have_posts() ) : 
      while( have_posts() ) : 
        the_post();
        get_template_part( 'template-parts/content', 'search' );
      endwhile; 
    else:
      get_template_part( 'template-parts/content', 'none' );
    endif; wp_reset_postdata();
    get_template_part( 'template-parts/pages/content', 'video' );
    get_sidebar( 'left' );
    get_sidebar( 'right' ); 
    ?>
</main>