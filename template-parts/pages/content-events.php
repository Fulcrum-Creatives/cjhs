<?php
$current = array(
             'key'     => 'date_start',
             'value'   => date('Ymd'),
             'compare' => '>',
          );
$past = array(
             'key'     => 'date',
             'value'   => date('Ymd'),
             'compare' => '<',
          );
$between = array(
             'key'     => 'date_start',
             'value'   => date('Ymd'),
             'compare' => '<',
          ); 
$order = 'ASC';
$meta_query = '';
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$args = array(
     'post_type'      => 'events',
     'meta_key'       => 'date',
     'orderby'        => 'date',
     'paged'          => $paged,
  );
if( is_page( array( 'upcoming', 'exhibits-programs' ) ) ) :
  $meta_query = array( $current );
  $args = array_merge( $args, array( 'order' => 'ASC', 'meta_query' => $meta_query ) );
elseif( is_page('current-exhibits') ) :
  $meta_query = array( $current, $between );
  $args = array_merge( $args, array( 'order' => 'ASC', 'meta_query' => $meta_query ) );
elseif( is_page('past') ) :
  $meta_query = array( $past );
  $args = array_merge( $args, array( 'order' => 'DESC', 'meta_query' => $meta_query ) );
endif;
$events_query = new WP_Query( $args );
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $events_query;
if( $events_query->have_posts() ) :
  while( $events_query->have_posts() ) : 
    $events_query->the_post(); 
    $cjhs_display_date = ( get_field( 'display_date' ) ? get_field( 'display_date' ) : '' );
    $cjhs_location = ( get_field( 'location' ) ? get_field( 'location' ) : '' );
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('article__entries article__entries--border entries__events'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
      <header class="entry__header" role="heading">
        <h3 class="entry__title"  id="section-heading-<?php the_ID(); ?>" role="heading"><?php the_title() ?></h3>
      </header>
      <section class="article__entries--content content__events">
        <?php the_content(); ?>
        <?php if( $cjhs_display_date ) :?>
          <p><span class="button__four"> Date </span><strong><?php echo $cjhs_display_date; ?></strong></p>
        <?php endif; ?>
        <?php if( $cjhs_location ) : ?>
          <p><span class="button__four">Location</span><strong><?php echo $cjhs_location; ?></strong></p>
        <?php endif; ?>
      </section>
      <aside class="article__entries--aside" role="img">
        <?php echo cjhs_content_images( 'aside' ); ?>
      </aside>
    </article>
<?php 
  endwhile; 
else : 
?>
  <article<?php post_class('article__entries article__entries--border entries__events'); ?>>
    <p><?php _e( 'There are no events at this time. Please check back here later for more events.', FCWP_TEXTDOMAIN ); ?></p>
  </article>
<?php
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