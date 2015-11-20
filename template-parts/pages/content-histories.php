<?php
$histories_query = new WP_Query(array(
    'post_type'      => 'histories',
    'posts_per_page' => '99',
    'no_found_rows'  => true,
));
if( $histories_query->have_posts() ) : 
  echo '<div class="content__row-half">';
  while( $histories_query->have_posts() ) : 
    $histories_query->the_post();
    if ( 0 !== $histories_query->current_post && 0 === $histories_query->current_post%2 ) {
      echo '</div><div class="content__row-half">';
    }
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('article__entries article__entries--border entries__histories'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
      <aside class="article__entries--aside aside__small" role="img">
        <?php echo cjhs_content_images( 'aside-sm' ); ?>
      </aside>
      <section class="article__entries--content content__sml-aside">
        <header class="entry__header">
          <h3 class="entry__title" id="section-heading-<?php the_ID(); ?>" role="heading">
            <a href="<?php the_permalink(); ?>" role="link">
              <?php the_title(); ?>
            </a>
          </h3>
        </header>
        <div class="article__entries--more">
          <a href="<?php the_permalink(); ?>" role="link">
            <?php _e( 'View History', FCWP_TEXTDOMAIN ); ?>
          </a>
        </div>
      </section>
    </article>
<?php 
  endwhile; 
  echo '</div>';
endif; 
wp_reset_postdata();