<!DOCTYPE html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7 ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE, chrome=1" />
<title itemprop="name"><?php wp_title('|', true, 'right'); bloginfo( 'name' );?></title>
<link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="icon" type="image/x-icon" />
<link href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" rel="stylesheet" media="screen" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php echo '<link rel="canonical" href="' . home_url() . '" />'; echo "\n" ?>
<?php

	wp_head();
?>
</head>
<body <?php body_class(); ?>>
	<a href="#main" class="skip-nav assistive-text"><?php _e('Skip to main Content', DOMAIN); ?></a>
	<div id="page" class="hfeed">
		<header class="header-wrapper full-width" itemscope itemtype="http://schema.org/WPHeader" role="banner">
		    <div class="content-wrapper">
		    	<?php if( function_exists( 'cjhs_header_logo' ) ) { cjhs_header_logo(array('type' => 'custom', 'tagline' => false)); } ?>

				<ul class="header__aside">
					<li>
						<a href="<?php echo get_permalink('351'); ?>" class="foundation">
							<span class="ir"><?php _e( 'Site funded by Yelkin Family Foundation', DOMAIN ); ?></span>
						</a>
					</li>
					<li>
						<?php get_search_form(); ?>
						<ul class="social clearfix">
							<li>
								<a href="<?php the_field('cjhs_facebook_url', 'option');?>" class="facebook">
									<span class="ir"><?php _e( 'Find us on Facebook', DOMAIN ); ?></span>
								</a>
							</li>
							<li>
								<a href="<?php the_field('cjhs_linkedin_url', 'option'); ?>" class="linked-in">
									<span class="ir"><?php _e( 'Find us on Linked-In', DOMAIN ); ?></span>
								</a>
							</li>
							<li>
								<a href="<?php the_field('cjhs_linkedin_url', 'option'); ?>" class="youtube">
									<span class="ir"><?php _e( 'Find us on YouTube', DOMAIN ); ?></span>
								</a>
							</li>
						</ul>
					</li>
				</ul>
				<div class="mobile-toggle">
					<img src="<?php bloginfo('template_url'); ?>/images/menu.svg" />
				</div>
				<nav class="primary-nav" role="navigation">
            		<?php wp_nav_menu( array('theme_location' => 'primary', 'menu_class' => 'menu nav-menu' ) ); ?>
        		</nav>
		    </div>
		</header>
	<div id="main" class="clearfix">
		<nav class="mobile-nav" role="navigation">
			<?php wp_nav_menu( array('theme_location' => 'primary', 'menu_class' => 'menu nav-menu' ) ); ?>
		</nav>
