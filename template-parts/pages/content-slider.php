<div class="slider-wrapper bg-slider">
  <div class="ribbon"></div>
  <div id="nivoslider-1359" class="nivoSlider">
    <?php
    if( have_rows('background_images', 'option') ):
        while ( have_rows('background_images', 'option') ) : the_row();
          $cjhs_background_image   = ( get_sub_field( 'cjhs_bg_image' ) ? get_sub_field( 'cjhs_bg_image' ) : '' );
          $cjhs_full_image         = ( get_sub_field( 'cjhs_bg_popup_image' ) ? get_sub_field( 'cjhs_bg_popup_image' ) : '' );
          $cjhs_full_image_caption = ( get_sub_field( 'cjhs_bg_caption' ) ? get_sub_field( 'cjhs_bg_caption' ) : '' );
          if( get_field('cjhs_bg_image') ):
            ?>
            <a href="<?php echo $cjhs_full_image['url']; ?>" class="fancybox" title="<?php echo $cjhs_full_image_caption; ?>">
              <img src="<?php echo $cjhs_background_image['url'];?>" srcset="<?php echo wp_get_attachment_image_srcset( $cjhs_background_image['ID'], 'larger' ); ?>" alt="" />
            </a>
            <?php 
          endif; 
        endwhile;
    endif;
    /*$query = new WP_Query(array(
      'post_type'      => 'background',
      'posts_per_page' => -1,
      'orderby'        => 'rand'
    ));
    if( $query->have_posts() ) :
      while( $query->have_posts() ) : 
        $query->the_post();
        $cjhs_background_image   = ( get_field( 'background_image' ) ? get_field( 'background_image' ) : '' );
        $cjhs_full_image         = ( get_field( 'full_image' ) ? get_field( 'full_image' ) : '' );
        $cjhs_full_image_caption = ( get_field( 'full_image_caption' ) ? get_field( 'full_image_caption' ) : '' );
        if( get_field('background_image') ):
          ?>
          <a href="<?php echo $cjhs_full_image['url']; ?>" class="fancybox" title="<?php echo $cjhs_full_image_caption; ?>">
            <img src="<?php echo $cjhs_background_image['url'];?>" srcset="<?php echo wp_get_attachment_image_srcset( $cjhs_background_image['ID'], 'larger' ); ?>" alt="" />
          </a>
          <?php 
        endif; 
      endwhile; 
    endif; 
    wp_reset_postdata();*/
    ?>
  </div>
</div>