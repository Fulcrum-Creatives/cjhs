<div class="content__main hentry">
  <?php 
  if ( have_posts() ) : 
    while ( have_posts() ) : 
      the_post();
      $cjhs_topy_photo = ( get_field( 'topy_photo' ) ? get_field( 'topy_photo' ) : '' );
  ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('entries__top-photos'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
        <?php echo cjhs_page_title(); ?>
        <div class="entries__content">
          <a href="<?php echo $cjhs_topy_photo['url']; ?>" class="fancybox" title="<?php echo get_the_title(); ?>">
            <img src="<?php echo $cjhs_topy_photo['url']; ?>" alt="<?php echo $cjhs_topy_photo['alt']; ?>" class="entry__image"/>
          </a>
          <?php the_content(); ?>
        </div>
      </article>
  <?php 
    endwhile; 
  else:
    get_template_part( 'template-parts/content', 'none' );
  endif; 
  wp_reset_postdata(); 
  ?>