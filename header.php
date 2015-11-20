<?php get_template_part( 'template-parts/content', 'head' ); ?>
<header class="body__header" role="banner">
	<div class="body__content">
      <?php get_template_part( 'template-parts/content', 'logo' ); ?>
      <div class="body__site-aside--full">
        <?php get_template_part( 'template-parts/aside/content', 'metagroup' ); ?>
      </div>
	</div>
  <div id="menu__icon" class="menu__icon">
    <div class="inner"></div>
  </div>
</header>
<div class="header__menu">
  <div class="body__content primary__menu" role="navigation">
    <?php get_template_part( 'template-parts/menu/content', 'primary' ); ?>
  </div>
</div>