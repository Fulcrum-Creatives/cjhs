<?php get_header(); ?>
<main id="main" class="body__content main" role="main">
    <div class="content__main hentry content__error">
      <?php  $search = new WP_Advanced_Search('adv_search_form'); ?>
      <div style="margin: 1.5em 0; text-align: center"><?php echo cjhs_page_title( 'Not what you were looking for?' ); ?></div>
      <?php
      $topy_query = new WP_Query(array(
        'post_type'      => 'topy_photos',
        'posts_per_page' => '1',
        'orderby'        => 'rand',
        'no_found_rows'  => true
      ));
      while ($topy_query->have_posts()) : $topy_query->the_post();
        $cjhs_topy_photo = ( get_field( 'topy_photo' ) ? get_field( 'topy_photo' ) : '' );
      ?>
        <a href="<?php echo $cjhs_topy_photo['url']; ?>" class="fancybox" title="<? the_title(); ?>">
          <img src="<?php echo $cjhs_topy_photo['url']; ?>" alt="<?php echo $cjhs_topy_photo['alt']; ?>" class="error__image"/>
        </a>
      <?php endwhile; wp_reset_postdata(); ?>
      
      <p style="text-align: center; margin: 1.5em 0;"><?php _e('Check that your URL is correct or try the advaced search below.', FCWP_TEXTDOMAIN ); ?></p>
      <div class="content__adv-search">
        <?php $search->the_form(); ?>
      </div>
    </div>
</main>
<?php get_footer(); ?>