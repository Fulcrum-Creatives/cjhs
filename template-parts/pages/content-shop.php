<?php
$shop_query = new WP_Query(array(
    'post_type'      => 'shop_items',
    'posts_per_page' => '99',
    'no_found_rows'  => true,
));
if( $shop_query->have_posts() ) : 
  echo '<div class="content__row-half">';
  while( $shop_query->have_posts() ) :
    $shop_query->the_post();
    $cjhs_shop_created_by = ( get_field( 'cjhs_shop_created_by' ) ? get_field( 'cjhs_shop_created_by' ) : '' );
    $cjhs_shop_price = ( get_field( 'cjhs_shop_price' ) ? get_field( 'cjhs_shop_price' ) : '' );
    $cjhs_shop_shop_photo = ( get_field( 'cjhs_shop_shop_photo' ) ? get_field( 'cjhs_shop_shop_photo' ) : '' );
    $cjhs_shop_sold_out = ( get_field( 'cjhs_shop_sold_out' ) ? get_field( 'cjhs_shop_sold_out' ) : '' );
    if( $cjhs_shop_shop_photo ) :
      $image_size = 'aside-sm';
      $image_url = $cjhs_shop_shop_photo['sizes'][ $image_size ];
    endif;
    if ( 0 !== $shop_query->current_post && 0 === $shop_query->current_post%2 ) {
      echo '</div><div class="content__row-half">';
    }
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('article__entries article__entries--border entries__shop'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
      <aside class="article__entries--aside aside__small" role="img">
        <img src="<?php echo $image_url; ?>" alt="<?php echo $cjhs_shop_shop_photo['alt']; ?>" />
        <?php if( $cjhs_shop_sold_out == 1 ) : ?>
          <img src="<?php echo FCWP_CHILD_STYLESHEETURI; ?>/images/icons/sold-out.png" alt="Sold Out" class="sold-out"/>
        <?php endif; ?>
      </aside>
      <section class="article__entries--content content__sml-aside">
        <header class="entry__header">
          <h3 class="entry__title" id="section-heading-<?php the_ID(); ?>" role="heading">
            <?php the_title(); ?>
          </h3>
          <p class="entries__shop--price"><?php echo $cjhs_shop_price; ?>
        </header>
        
        <div class="entries__shop--buttons">
          <div class="article__entries--more">
            <a href="#desc<?php echo $post->ID; ?>" class="fancybox" role="link">
              <?php _e( 'Learn More', FCWP_TEXTDOMAIN ); ?>
            </a>
          </div>
          <div class="article__entries--purchase">
            <?php echo print_wp_cart_button_for_product( get_the_title(), str_replace( '$', '', $cjhs_shop_price) ); ?>
          </div>
        </div>

        <div id="desc<?php echo $post->ID; ?>" class="entries__shop--popup" style="display: none;">
          <img src="<?php echo $cjhs_shop_shop_photo['url']; ?>" alt="<?php echo $cjhs_shop_shop_photo['alt']; ?>" />
          <h4><?php the_title()?></h4>
          <p> <?php _e( 'Created By: ', FCWP_TEXTDOMAIN ); echo $cjhs_shop_created_by ?></p>
          <?php the_content() ?>
        </div>
      </section>
    </article>
<?php 
  endwhile; 
  echo '</div>';
endif; 
wp_reset_postdata(); 
?>