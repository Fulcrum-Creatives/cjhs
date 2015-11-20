<?php
/*
Template Name: Left Sidebar
*/
get_header();
?>
<main id="main" class="body__content main body__content--left-sidebar" role="main">
    <?php get_template_part( 'template-parts/content' ); ?>
    <?php get_sidebar( 'left' ); ?>
</main>
<?php get_footer(); ?>