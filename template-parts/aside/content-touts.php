<?php
if( is_page() ) :
  while ( have_posts() ) : the_post();
    $cjhs_add_touts = ( get_field( 'add_touts' ) ? get_field( 'add_touts' ) : '' );
    if( $cjhs_add_touts ) :
      echo '<ul class="aside__touts">';
        foreach( $cjhs_add_touts as $post ):
          // Imager
          $cjhs_tout_image         = ( get_field( 'tout_image' ) ? get_field( 'tout_image' ) : '' );
          if( $cjhs_tout_image ) :
            $url   = $cjhs_tout_image['url'];
            $alt   = $cjhs_tout_image['alt'];
            $title   = $cjhs_tout_image['title'];
            $size  = 'aside-sm';
            $thumb = $cjhs_tout_image['sizes'][ $size ];
            $ricg  = wp_get_attachment_image_srcset( $cjhs_tout_image['ID'], 'aside' );
          endif;
          $cjhs_item_image         = ( $cjhs_tout_image ? '<img src="' . $thumb . '" srcset="' . $ricg . '" alt="' . $alt . '" />' : '' );
          // Text
          $cjhs_bold_weight_text   = ( get_field( 'bold_weight_text' ) ? get_field( 'bold_weight_text' ) : '' );
          $cjhs_normal_weight_text = ( get_field( 'normal_weight_text' ) ? get_field( 'normal_weight_text' ) : '' );
          $cjhs_reverse_bold       = ( get_field( 'reverse_bold' ) ? get_field( 'reverse_bold' ) : '' );
          $cjhs_tout_popup         = ( get_field( 'tout_popup' ) ? get_field( 'tout_popup' ) : '' );
          $cjhs_tout_is_image         = ( get_field( 'tout_is_image' ) ? get_field( 'tout_is_image' ) : '' );
          $cjhs_bold_text          = '';
          if( $cjhs_bold_weight_text || $cjhs_normal_weight_text ) {
            $cjhs_bold_text          = '<div><strong>' . $cjhs_bold_weight_text . '</strong>' . $cjhs_normal_weight_text . '</div>';
          } 
          $cjhs_reverse_bold_text  = '<div>' . $cjhs_bold_weight_text . '<strong>' . $cjhs_normal_weight_text . '</strong></div>';
          $cjhs_item_text          = ( $cjhs_reverse_bold ? $cjhs_reverse_bold_text : $cjhs_bold_text );
          // Link
          $cjhs_tout_link          = ( get_field( 'tout_link' ) ? get_field( 'tout_link' ) : '' );
          if( $cjhs_tout_popup  == '1' ) {
            if( $cjhs_tout_is_image ) {
              $cjhs_item_link      = ( $cjhs_tout_link ? '<a href="' . $cjhs_tout_link . '" class="fancybox" title="' . $title . '"></a>' : '' );
            } else {
              $cjhs_item_link      = ( $cjhs_tout_link ? '<a href="' . $cjhs_tout_link . '" class="fancybox--iframe" data-fancybox-type="iframe"></a>' : '' );
            }
          } else {
            $cjhs_item_link        = ( $cjhs_tout_link ? '<a href="' . $cjhs_tout_link . '"></a>' : '' );
          }
          // Outdivut
          echo '<li>' . $cjhs_item_image . $cjhs_item_link . $cjhs_item_text  . '</li>';
        endforeach; wp_reset_postdata();
      echo '</ul>';
    endif;
  endwhile; wp_reset_postdata();
endif;