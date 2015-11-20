<?php
$videos_query = new WP_Query(array(
    'post_type'      => 'videos',
    'posts_per_page' => '99',
    'no_found_rows'  => true,
));
if( $videos_query->have_posts() ) : 
  while( $videos_query->have_posts() ) : 
    $videos_query->the_post();
    $cjhs_video_embed_url = ( get_field( 'cjhs_video_embed_url' ) ? get_field( 'cjhs_video_embed_url' ) : '' );
    $thumb = str_replace( 'http://youtu.be/', '', $cjhs_video_embed_url );
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('article__entries article__entries--border entries__vidoes'); ?> aria-labelledby="section-heading-<?php the_ID(); ?>" role="article">
      <aside class="article__entries--aside aside__large" role="img">
        <a href="<?php the_permalink(); ?>">
          <div class="thumb__digital-overlay"></div>
          <img src="http://img.youtube.com/vi/<?php echo $thumb; ?>/0.jpg" alt="<?php the_title(); ?>" />
        </a>
      </aside>
      <section class="article__entries--content content__lrg-aside">
        <header class="entry__header">
          <h3 class="entry__title" id="section-heading-<?php the_ID(); ?>" role="heading">
            <?php the_title(); ?>
          </h2>
        </header>
        <?php the_excerpt(); ?>
        <div class="article__entries--more"><a href="<?php the_permalink(); ?>" role="link"><?php _e( 'View Video', FCWP_TEXTDOMAIN ); ?></a></div>
      </section>
    </article>
<?php 
  endwhile; 
endif; 
wp_reset_postdata(); 
?>