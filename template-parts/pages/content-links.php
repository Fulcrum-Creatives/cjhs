<?php
$links_query = new WP_Query(array(
    'post_type'      => 'custom_link',
    'posts_per_page' => '99',
    'no_found_rows'  => true,
));
if( $links_query->have_posts() ) : 
  while( $links_query->have_posts() ) : 
    $links_query->the_post();
    $cjhs_link_logo = ( get_field( 'cjhs_link_logo' ) ? get_field( 'cjhs_link_logo' ) : '' );
    $cjhs_link_text = ( get_field( 'cjhs_link_text' ) ? get_field( 'cjhs_link_text' ) : '' );
    $cjhs_link_url = ( get_field( 'cjhs_link_url' ) ? get_field( 'cjhs_link_url' ) : '' );
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('article__entries article__entries--border entries__links'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
      <section class="article__entries--content">
        <div class="entry__link-banner">
          <img src="<?php echo $cjhs_link_logo['url']; ?>" alt="<?php echo $cjhs_link_logo['alt']; ?>" />
          <a href="<?php echo $cjhs_link_url; ?>"></a>
        </div>
        <header class="entry__header">
          <h3 class="entry__title" id="section-heading-<?php the_ID(); ?>" role="heading">
            <?php the_title(); ?>
          </h2>
        </header>
        <?php the_content(); ?>
        <a href="<?php echo $cjhs_link_url; ?>">
          <?php echo $cjhs_link_text; ?>
        </a>
      </section>
    </article>
<?php 
  endwhile; 
endif; 
wp_reset_postdata(); 
?>