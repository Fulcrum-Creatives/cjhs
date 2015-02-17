<?php get_header(); ?>
	<div id="primary" class="primary">
		<div id="content" role="main">
			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title">Page Not Found</h1>
				</header>
				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. The Columbus Jewish Historical Society recently moved to a new website, and some off-site links may be out of date. Try searching for the page you are looking for below.', 'twentyeleven' ); ?></p>
					<?php get_search_form(); ?>
					<?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ), array( 'widget_id' => '404' ) ); ?>
					<?php
					/* translators: %1$s: smilie */
					$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'twentyeleven' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', array('count' => 0 , 'dropdown' => 1 ), array( 'after_title' => '</h2>'.$archive_content ) );
					?>
					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?> -->
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->
		</div><!-- #content -->
	</div><!-- .primary -->
<?php get_footer(); ?>