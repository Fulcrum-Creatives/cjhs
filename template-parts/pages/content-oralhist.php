<hr />
<article class="page__oral-hist" role="directory">
  <header>
    <p><?php _e( 'Can\'t find the name of the person you\'re looking for? Click <a href="' . home_url() . '/research/oral-histories/unpublished-oral-histories/">here</a> to view a list of unpublished oral histories.', FCWP_TEXTDOMAIN ); ?></p>
    <p><?php _e( 'Indicates Sponsorship', FCWP_TEXTDOMAIN ); ?> <span class="oral-hist__sponsored"></span></p>
    <div class="oral-hist__filter">
      <a href="#" class="label selected" data-osection="all" data-osplit="10" aria-checked="false">All</a>
      <a href="#" class="label" data-osection="af" data-osplit="0" aria-checked="false">A-F</a>
      <a href="#" class="label" data-osection="gl" data-osplit="2" aria-checked="false">G-L</a>
      <a href="#" class="label" data-osection="mr" data-osplit="2" aria-checked="false">M-R</a>
      <a href="#" class="label" data-osection="sz" data-osplit="1" aria-checked="false">S-Z</a>
    </div>
  </header>
  <section class="pull-left"></section>
  <section class="pull-right"></section>
  <div class="oral-hist__letter-group letter hide" data-letter="a">
    <div class="oral-hist__letter">A</div>
    <ul class="oral-hist__list">
      <?php
      $query_args = array(
        'post_type'      =>'oral_histories',
        'posts_per_page' => '999',
        'no_found_rows'  => true,
        'meta_query'     => array(
            array( 'key' => 'last_name' ),
            array( 'key' => 'first_name' ),
        ),
        'orderby'        => 'last_name first_name',
        'order'          => 'ASC',
      );
      $oral_query = new WP_Query( $query_args );
      $last_letter = 'A';
      $x = 1;
      if( $oral_query->have_posts() ) : while( $oral_query->have_posts() ) : $oral_query->the_post();
        $cjhs_first_name     = ( get_field( 'first_name' ) ? get_field( 'first_name' ) : '' );
        $cjhs_last_name      = ( get_field( 'last_name' ) ? get_field( 'last_name' ) : '' );
        $cjhs_displayed_name = ( get_field( 'cjhs_displayed_name' ) ? get_field( 'cjhs_displayed_name' ) : '' );
        $cjhs_sponsored_by   = ( get_field( 'sponsored_by' ) ? get_field( 'sponsored_by' ) : '' );
        $letter              = strtoupper( substr( $cjhs_last_name, 0, 1 ) );
        $sponsored           = ( $cjhs_sponsored_by ? '<span class="oral-hist__sponsored"></span>' : '' );
        if( $letter !== $last_letter ) :
          echo '</ul></div><div class="oral-hist__letter-group letter hide" data-letter="' . strtolower( $letter ) . '"><div class="oral-hist__letter">' . $letter . '</div><ul class="oral-hist__list">';
        endif;
        echo '<li class="oral-hist__list--item"><a href="' . get_permalink( $post->ID ) . '" rel="bookmark" role="link">' . $cjhs_displayed_name . $sponsored . '</a></li>';
        $last_letter = $letter;
        $x+=1;
      endwhile; endif; wp_reset_postdata();
      ?>
    </ul>
  </div>
</article>