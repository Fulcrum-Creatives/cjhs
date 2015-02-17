<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	</div>
<footer class="footer" role="contentinfo">
	<div class="footer__content">
	<div class="footer_touts"></div>
		<div class="footer_aside">
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
			<a href="<?php echo get_permalink('351'); ?>" class="foundation">
				<span class="ir"><?php _e( 'Site funded by Yelkin Family Foundation', DOMAIN ); ?></span>
			</a>
		</div>
		<?php do_action( 'twentyeleven_credits' ); ?>
		<nav class="footer-menu">
			<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
		</nav>
		<p>
			<?php cjhs_auto_copyright(); ?> &copy; <?php bloginfo( 'name' ); ?>
			<span class="mobile"> | </span>
			<?php if( get_field('cjhs_street_address', 'options' ) ) : the_field('cjhs_street_address', 'options' ); endif; ?>
			<span> | </span>
			<?php if( get_field('cjhs_city', 'options' ) ) : the_field('cjhs_city', 'options' ); endif; ?>, <?php if( get_field('cjhs_state', 'options' ) ) : the_field('cjhs_state', 'options' ); endif; ?> <?php if( get_field('cjhs_zip_code', 'options' ) ) : the_field('cjhs_zip_code', 'options' ); endif; ?>
			<span class="mobile"> | </span>
			<?php _e( 'Tel: ', DOMAIN); ?><?php if( get_field('cjhs_telephone_number', 'options' ) ) : the_field('cjhs_telephone_number', 'options' ); endif; ?>
			<span> | </span>
			<?php _e( 'Email: ', DOMAIN); ?><?php cjhs_encrypted_email(); ?>
		</p>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>