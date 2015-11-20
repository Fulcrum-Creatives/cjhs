<?php
$news_query = new WP_Query( array(
  'post_type'      => 'site-news',
  'posts_per_page' => 1,
  'meta_key' => '_is_ns_featured_post', 
  'meta_value' => 'yes',
  'no_found_rows'  => true
));
while ($news_query->have_posts()) : $news_query->the_post();
  ?>
  <h2 class="infobox-item--heading">
    <?php the_title(); ?>
  </h2>
  <?php the_excerpt(); ?>
  <a href="<?php the_permalink()?>"></a>
  <?php
endwhile; wp_reset_postdata();