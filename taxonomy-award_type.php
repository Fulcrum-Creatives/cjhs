<?php
get_header();
get_sidebar();
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
?>
<div id="primary" class="primary">
	<div id="content" role="main" class="award-type">
		<div class="entry-content">
			<h1 class="entry-title"><?php echo $term->name; ?></h1>
			<ul class="awards">
			<?php
			$term = $wp_query->queried_object; get_term( $term->slug, 'award-type', '', '' ) ;
			query_posts( 
				array( 
					'post_type' => 'awards',
				    'post_status' => 'publish',
				    'posts_per_page' => -1,
				    'tax_query' => array(
				        array(
				            'taxonomy' => 'award_type',
				            'field' => 'slug',
				            'terms' => $term->slug
				        )
				    ),
				    'meta_key' => 'award_year',
				    'orderby' => 'meta_value',
				    'order' => 'DESC',
				)
			);
			if ( have_posts() ) : while ( have_posts() ) : the_post();
				?>
			    <?php $year = get_post_meta(get_the_ID(), 'award_year', true); ?>
				<li><span><?php echo $year; ?></span><?php the_title(); ?></li>
			<?php endwhile; else: ?>
			<p> No Awards Found </p>
			<?php endif; wp_reset_postdata(); ?>
			</ul>
		</div>
	</div>
</div>
<?php get_footer(); ?>