<?php get_header(); ?>
<main id="main" class="body__content main" role="main">
    <div class="content__main hentry">
        <?php 
        if ( have_posts() ) : while ( have_posts() ) : the_post(); 
          $cjhs_display_date = ( get_field( 'display_date' ) ? get_field( 'display_date' ) : '' );
          $cjhs_location = ( get_field( 'location' ) ? get_field( 'location' ) : '' );
          $cjhs_time = ( get_field( 'time' ) ? get_field( 'time' ) : '' );
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('page__content'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
          <?php echo cjhs_page_title(); ?>
          <div class="entries__content">
            <?php the_content(); ?>
            <?php if( $cjhs_display_date ) :?>
              <p><span class="button__four"> Date </span><strong><?php echo $cjhs_display_date; ?></strong></p>
            <?php endif; ?>
            <?php if( $cjhs_location ) : ?>
              <p><span class="button__four">Location</span><strong><?php echo $cjhs_location; ?></strong></p>
            <?php endif; ?>
            <?php if( $cjhs_location ) : ?>
              <p><span class="button__four">Time</span><strong><?php echo $cjhs_time; ?></strong></p>
            <?php endif; ?>
          </div>
        </article>
        <?php endwhile; else: ?>
          <?php get_template_part( 'template-parts/content', 'none' ); ?>
      <?php endif; wp_reset_postdata(); ?>
    </div>
    <?php get_sidebar( 'left' ); ?>
    <?php get_sidebar( 'right' ); ?>
</main>
<?php get_footer(); ?>