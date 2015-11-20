<?php
if( is_singular( 'histories' ) ) :
  while ( have_posts() ) : the_post();
    if( have_rows( 'cjhs_sidebar_images' ) ) :
      echo '<ul class="aside__touts">';
      while( have_rows( 'cjhs_sidebar_images' ) ): 
        the_row();
        $cjhs_sidebar_image = ( get_sub_field( 'cjhs_sidebar_image' ) ? get_sub_field( 'cjhs_sidebar_image' ) : '' );
        ?>
        <li>
          <a href="<?php echo $cjhs_sidebar_image['url']; ?>" class="fancybox" style="position: relative" title="<?php echo $cjhs_sidebar_image['caption']; ?>">
            <img src="<?php echo $cjhs_sidebar_image['url']; ?>" alt="<?php echo $cjhs_sidebar_image['alt']; ?>" />
          </a>
        </li>
        <?php
      endwhile; 
      echo '</ul';
    endif;
  endwhile; wp_reset_postdata();
endif;
if( is_singular( 'oral_histories' ) ) :
  while ( have_posts() ) : the_post();
    if( have_rows( 'cjhs_sidebar_images' ) ) :
      $i = 0;
      echo '<ul class="aside__touts">';
      while( have_rows( 'cjhs_sidebar_images' ) ): 
        the_row();
        $i++;
        if ( $i != '1' ):
          $cjhs_sidebar_image = ( get_sub_field( 'cjhs_sidebar_image' ) ? get_sub_field( 'cjhs_sidebar_image' ) : '' );
          ?>
          <li>
            <a href="<?php echo $cjhs_sidebar_image['url']; ?>" class="fancybox" style="position: relative" title="<?php echo $cjhs_sidebar_image['caption']; ?>">
              <img src="<?php echo $cjhs_sidebar_image['url']; ?>" alt="<?php echo $cjhs_sidebar_image['alt']; ?>" />
            </a>
          </li>
          <?php
        endif;
      endwhile; 
      echo '</ul';
    endif;
  endwhile; wp_reset_postdata();
endif;