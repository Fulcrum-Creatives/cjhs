<?php
$topy_query = new WP_Query(array(
  'post_type'      => 'topy_photos',
  'posts_per_page' => '99',
  'no_found_rows'  => true
));
?>
<div class="topy-photos">
  <div class="topy-photos__select slider-nav slick-slider">
    <?php 
    while ($topy_query->have_posts()) : $topy_query->the_post();
      $cjhs_topy_photo = ( get_field( 'topy_photo' ) ? get_field( 'topy_photo' ) : '' );
    ?>
      <div class="topy-photos__select--wrapper">
        <img src="<?php echo $cjhs_topy_photo['url']; ?>" alt="<?php echo $cjhs_topy_photo['url']; ?>" class="topy-photos__select--image" />
        <div class="topy-photos__select--overlay"></div>
      </div>
    <?php endwhile; wp_reset_postdata(); ?>
  </div>
  <div class="topy-photos__main slider-for slick-slider">
    <?php
    while ($topy_query->have_posts()) : $topy_query->the_post();
    $cjhs_topy_photo = ( get_field( 'topy_photo' ) ? get_field( 'topy_photo' ) : '' );
    ?>
        <div class="topy-photos__main--content">
          <a href="<?php echo $cjhs_topy_photo['url']; ?>" class="fancybox" >
            <img src="<?php echo $cjhs_topy_photo['url']; ?>" alt="<?php echo $cjhs_topy_photo['url']; ?>" class="topy-photos__main--content--img" />
          </a>
          <?php the_content(); ?>
        </div>
    <?php endwhile; wp_reset_postdata(); ?>
  </div>
</div>
