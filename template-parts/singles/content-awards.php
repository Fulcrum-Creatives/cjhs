<div class="content__main hentry">
  <?php
    global $wp_query;
    $term = $wp_query->get_queried_object();
    $title = $term->name; 
  ?>
  <header class="page__header">
    <h2 class="page__title" id="section-heading-1340">
      <?php echo $title; ?>
    </h2>
  </header>
  <?php 
   $tax_query = new WP_Query( array(
      'post_type'     => 'awards',
      'tax_query'     => array(
        array(
          'taxonomy' => 'award_type',
          'field'    => 'slug',
          'terms'    => $term->slug,
        )
      ),
      'posts_per_page' => '99',
      'meta_key'       => 'award_year',
      'orderby'        => 'meta_value',  
      'no_found_rows'  => true
  ) );
    while( $tax_query->have_posts() ) : 
      $tax_query->the_post();
      $cjhs_award_year = ( get_field( 'award_year' ) ? get_field( 'award_year' ) : '' );
      ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('page__content'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
        <div class="entries__content">
          <strong><?php the_title(); ?></strong>: <?php echo $cjhs_award_year; ?>
        </div>
      </article>
      <?php
    endwhile;
  wp_reset_postdata();
  ?>
</div>