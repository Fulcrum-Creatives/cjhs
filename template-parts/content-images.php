<?php
if( have_rows('cjhs_content_images') ):
  echo '<ul class="article__aside--list">';
  while ( have_rows('cjhs_content_images') ) : the_row();
    $cjhs_content_image = ( get_sub_field( 'cjhs_content_image' ) ? get_sub_field( 'cjhs_content_image' ) : '' );
    if( $cjhs_content_image != '' ) :
      $url     = $cjhs_content_image['url'];
      $alt     = $cjhs_content_image['alt'];
      $caption = $cjhs_content_image['caption'];
      $size    = 'aside';
      $thumb   = $cjhs_content_image['sizes'][ $size ];
      $ricg    = wp_get_attachment_image_srcset( $cjhs_content_image['ID'], 'aside' );
      echo '<li>
              <a href="'. $url .'" title="'. $caption .'" class="fancybox-img">
                <img src="'. $thumb .'" srcset="' . $ricg . '" alt="'. $alt .'" />
              </a>
            </li>';
    endif;
  endwhile;
  echo '</ul>';
endif;
?>