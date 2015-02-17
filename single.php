<?php get_header(); ?>
<?php get_sidebar(); ?>
		<div id="primary" class="primary single">
			<div id="content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<nav id="nav-single">
						<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span>
					</nav><!-- #nav-single -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			            <header class="entry-header">
			                <h1 class="entry-title"><?php the_title(); ?></h1>
			            </header>
			            <div class="entry-content">
			                <?php the_content(); ?>
			            </div>
			        </article>
					<?php comments_template( '', true ); ?>
					<?php wp_link_pages(); ?>
				<?php endwhile; ?>
			</div><!-- #content -->
		</div><!-- .primary -->
<?php get_footer(); ?>