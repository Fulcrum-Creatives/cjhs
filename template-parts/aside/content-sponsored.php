<?php
if( is_single() ) :
  while ( have_posts() ) : the_post();
    $cjhs_sponsored_by = ( get_field( 'sponsored_by' ) ? get_field( 'sponsored_by' ) : '' );
    if( $cjhs_sponsored_by ) :
      $sponsors = array();
      foreach( $cjhs_sponsored_by as $sponsor ) :
        $sponsors[] = $sponsor->post_title;
      endforeach;
      ?>
      <ul class="aside__touts tout__sponsors">
        <li>
        <a href="<?php echo home_url(); ?>support/wall-of-donors/"></a>
          <div>
            <strong><?php _e( '<em class="leader">This Oral History is</em> Sponsored By', FCWP_TEXTDOMAIN ); ?></strong>
            <p><?php echo cjhs_human_list( $sponsors, ', <span class="lowercase">and</span> ' ); ?></p>
          </div>
        </li>
      </ul>
      <?php
    endif;
  endwhile; wp_reset_postdata();
endif;