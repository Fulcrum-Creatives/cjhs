<?php
$histories_query = new WP_Query( array(
  'post_type'   => 'oral_histories',
  'posts_per_page' => 1,
  'meta_key' => '_is_ns_featured_post', 
  'meta_value' => 'yes',
  'no_found_rows'  => true
));
while ($histories_query->have_posts()) : $histories_query->the_post();
  $cjhs_sponsored_by = ( get_field( 'sponsored_by' ) ? get_field( 'sponsored_by' ) : '' );
  $sponsored = ( $cjhs_sponsored_by ? '<div class="oral-hist__sponsored"></div>' : '' );
  $cjhs_audio_file = ( get_field( 'cjhs_audio_file' ) ? get_field( 'cjhs_audio_file' ) : '' );
  $the_content = get_the_content();
  ?>
  <h2 class="infobox-item--heading">
    <?php _e( 'Featured Oral History', FCWP_TEXTDOMAIN ); ?>
  </h2>
  <div class="heading--oral-hist">
    <?php the_title(); echo $sponsored; ?>
  </div>
  <div class="fp-infobox-item--type">
    <?php if( $the_content ) : ?>
      <a href="#inline-content" class="type--oral fancybox" class="fancybox--inline" title="<?php echo get_the_title(); ?>"></a>
      <div style="display: none;">
        <div id="inline-content" class="type--oral-popup">
          <article id="post-<?php the_ID(); ?>" <?php post_class('entries__oral_histories'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
            <div class="entries__content">
              <?php
              echo cjhs_page_title();
              if( have_rows( 'cjhs_sidebar_images' ) ) :
                while( have_rows( 'cjhs_sidebar_images' ) ): 
                  the_row();
                  $cjhs_sidebar_image = ( get_sub_field( 'cjhs_sidebar_image' ) ? get_sub_field( 'cjhs_sidebar_image' ) : '' );
                  ?>
                  <a href="<?php echo $cjhs_sidebar_image['url']; ?>" class="fancybox">
                    <img src="<?php echo $cjhs_sidebar_image['url']; ?>" alt="<?php echo $cjhs_sidebar_image['alt']; ?>" class="alignleft entry__image" />
                  </a>
                  <?php
                endwhile; 
              endif; 
              ?>
              <?php the_content(); ?>
            </div>
          </article>
        </div>
      </div>
    <?php endif; ?>
    <?php 
      $rows = ( get_field( 'cjhs_audio' ) ? get_field( 'cjhs_audio' ) : '' );
      if( $rows == 1 ) :
        $first_row = $rows[0]; // get the first row
        $first_row_audio = $first_row['cjhs_audio_file' ];
        $first_row_title = $first_row['cjhs_audio_title' ];
          if( $first_row_audio ) :
            $audio_url = 'audio src="' . $first_row_audio['url'] . '"';
    ?>
          <a href="#inline-audio" class="type--audio fancybox-audio" class="fancybox--inline" title="<?php echo $first_row_title; ?>"></a>
          <div style="display: none;">
            <div id="inline-audio" class="type--audio-popup">
              <?php echo do_shortcode('['.$audio_url.']') ?>
            </div>
          </div>
    <?php 
          endif; 
      endif;
    ?>
  </div>
  <a href="<?php the_permalink()?>"></a>
  <?php
endwhile; wp_reset_postdata();