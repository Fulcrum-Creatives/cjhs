<div class="content__main hentry">
  <?php 
  if ( have_posts() ) : 
    while ( have_posts() ) : 
      the_post();
      $cjhs_video_embed_url = ( get_field( 'cjhs_video_embed_url' ) ? get_field( 'cjhs_video_embed_url' ) : '' ); 
  ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('entries__videos'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
        <?php echo cjhs_page_title(); ?>
        <div class="entries__content">
          <?php echo wp_oembed_get( $cjhs_video_embed_url ); ?>
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
</div>