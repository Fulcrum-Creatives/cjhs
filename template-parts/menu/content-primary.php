<?php
$primary_nav_list = '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>';
$primary_nav_wrapper = '<nav id="primary-nav" role="navigation" aria-label="Main menu">' . "\n" . $primary_nav_list . '</nav>';
$primary_args = array(
  'theme_location' => 'primary', 
    'container'    => '',
    'menu_class'     => 'nav sm horizontal left',
    'menu_id'        => 'nav__menu',
    'items_wrap'   => $primary_nav_wrapper,
    'walker'     => new fcwp_walker_nav_menu
);
if( has_nav_menu( 'primary' ) ) : 
  wp_nav_menu( $primary_args ); 
endif;