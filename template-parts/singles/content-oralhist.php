<div class="content__main hentry">
  <?php 
  if ( have_posts() ) : 
    while ( have_posts() ) : 
      the_post();
      $cjhs_audio = ( get_field( 'cjhs_audio' ) ? get_field( 'cjhs_audio' ) : '' );
  ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('entries__oral_histories'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
        <?php echo cjhs_page_title(); ?>
        <div class="entries__content">
        <?php
          if( have_rows( 'cjhs_audio' ) ):
            while( have_rows( 'cjhs_audio' ) ): 
              the_row();
              if( $cjhs_audio == 1 ) :
                $cjhs_audio_title = ( get_sub_field( 'cjhs_audio_title' ) ? get_sub_field( 'cjhs_audio_title' ) : '' );
                $cjhs_audio_file = ( get_sub_field( 'cjhs_audio_file' ) ? get_sub_field( 'cjhs_audio_file' ) : '' );
                $cjhs_audio_url = 'audio src="' . $cjhs_audio_file['url'] . '"';
            ?>
                <div class="entries__oral_histories--audio">
                  <h3 class="audio__title"><?php echo $cjhs_audio_title; ?></h3>
                  <?php echo do_shortcode('['.$cjhs_audio_url.']') ?>
                </div>
            <?php 
              endif;
            endwhile; 
          endif;
          if( have_rows( 'cjhs_sidebar_images' ) ) :
            $i = 0;
            while( have_rows( 'cjhs_sidebar_images' ) ): 
              the_row();
              $i++;
              if( $i == '1' ) :
                $cjhs_sidebar_image = ( get_sub_field( 'cjhs_sidebar_image' ) ? get_sub_field( 'cjhs_sidebar_image' ) : '' );
                ?>
                <a href="<?php echo $cjhs_sidebar_image['url']; ?>" class="fancybox" title="<?php echo $cjhs_sidebar_image['caption']; ?>">
                  <img src="<?php echo $cjhs_sidebar_image['url']; ?>" alt="<?php echo $cjhs_sidebar_image['alt']; ?>" class="alignleft entry__image" />
                </a>
                <?php
              endif;
            endwhile; 
          endif; 
          ?>
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