<?php 
if( function_exists( 'get_field' ) ) :
    $cjhs_header_sponsor = ( get_field( 'cjhs_header_sponsor', 'option' ) ? get_field( 'cjhs_header_sponsor', 'option' ) : '' );
    $cjhs_header_sponsor_url = ( get_field( 'cjhs_header_sponsor_url', 'option' ) ? get_field( 'cjhs_header_sponsor_url', 'option' ) : '' );
endif;
if( !empty( $cjhs_header_sponsor ) ) :
    $url = $cjhs_header_sponsor['url']; ?>
    <h2 class="site__sponsored-logo" style="background-image: url(<?php echo $url; ?>)">
        <a href="<?php echo $cjhs_header_sponsor_url; ?>"></a>
        <span class="ir">
            <?php _e( 'Site funded by Yelkin Family Foundation', FCWP_TEXTDOMAIN ); ?>
        </span>
    </h1>
<?php endif; ?>