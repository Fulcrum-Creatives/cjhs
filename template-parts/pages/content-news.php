<?php
$custom_query_args = array(
    'post_type' => 'site-news'
);
$custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$custom_query = new WP_Query( $custom_query_args );
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $custom_query;

if( $custom_query->have_posts() ) :
  while( $custom_query->have_posts() ) : 
    $custom_query->the_post(); 
?>
  <article id="post-<?php the_ID(); ?>" <?php post_class('article__entries article__entries--border entries__events'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
    <header class="entry__header" role="heading">
      <h3 class="entry__title"  id="section-heading-<?php the_ID(); ?>" role="heading"><?php the_title() ?></h3>
    </header>
    <section class="article__entries--content content__events">
      <?php the_excerpt(); ?>
      <div class="article__entries--more">
        <a href="<?php the_permalink(); ?>" rel="bookmark" role="link">
          <?php _e( 'Read More', FCWP_TEXTDOMAIN ); ?>
        </a>
      </div>
    </section>
    <aside class="article__entries--aside" role="img">
      <?php echo cjhs_content_images( 'aside' ); ?>
    </aside>
  </article>
<?php 
  endwhile;
endif;
wp_reset_postdata();
?><div class="pagination"><?php
$pagi_args = array(
      'prev_text' => 'Previous',
      'next_text' => 'Next',
      'end_size'  => 5,
      'mid_size'  => 1
    );
    echo paginate_links($pagi_args );
?></div><?php
$wp_query = NULL;
$wp_query = $temp_query;