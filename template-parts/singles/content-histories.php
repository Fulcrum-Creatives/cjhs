<div class="content__main hentry">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('page__content'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
      <?php echo cjhs_page_title(); ?>
      <div class="entries__content">
        <?php the_content(); ?>
      </div>
    </article>
    <?php endwhile; else: ?>
      <?php get_template_part( 'template-parts/content', 'none' ); ?>
  <?php endif; wp_reset_postdata(); ?>
</div>
<?php
$current_post = get_the_ID();
$histories_more_query = new WP_Query(array(
    'post_type'      => 'histories',
    'post__not_in'   => array($current_post),
    'posts_per_page' => '4',
    'no_found_rows'  => true,
));
if( $histories_more_query->have_posts() ) :
  ?>
  <header class="page__header--sub">
    <h3 class="page__title--sub" id="section-heading-2245">
      <?php _e( 'View More Histories', FCWP_TEXTDOMAIN ); ?>
    </h3>
  </header>
  <?php
  while( $histories_more_query->have_posts() ) : 
    $histories_more_query->the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('article__entries article__entries--border entries__histories histories__more'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
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
endif; 
wp_reset_postdata();