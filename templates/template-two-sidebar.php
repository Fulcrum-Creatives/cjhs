<?php
/*
Template Name: Two Sidebars
*/
get_header();
?>
<main id="main" class="body__content main" role="main">
    <?php get_template_part( 'template-parts/content' ); ?>
    <?php get_sidebar( 'left' ); ?>
    <?php get_sidebar( 'right' ); ?>
</main>
<?php get_footer(); ?>