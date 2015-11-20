<?php
$footer_nav_list = '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>';
$footer_nav_wrapper = '<nav id="footer-nav" class="footer-nav" role="navigation" aria-label="Footer menu">' . $footer_nav_list . '</nav>';
$footer_args = array(
    'theme_location' => 'footer', 
    'container'      => '',
    'menu_class'     => 'nav footer-sm horizontal center',
    'menu_id'        => 'nav__menu--footer',
    'items_wrap'     => $footer_nav_wrapper,
);
if( has_nav_menu( 'primary' ) ) : 
    wp_nav_menu( $footer_args ); 
endif;