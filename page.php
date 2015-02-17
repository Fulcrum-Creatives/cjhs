<?php
get_header();
get_sidebar();
?>
<div id="primary" class="primary default-page">
	<div id="content" role="main">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php get_sidebar( 'right' ); ?>
		<?php endwhile; endif; ?>			
	</div>
</div>
<?php get_footer(); ?>