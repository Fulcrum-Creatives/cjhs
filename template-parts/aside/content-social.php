<?php
if( function_exists( 'get_field' ) ) :
    $cjhs_facebook_profile_url = ( get_field( 'cjhs_facebook_profile_url', 'option' ) ? get_field( 'cjhs_facebook_profile_url', 'option' ) : '' );
    $cjhs_linkedin_profile_url = ( get_field( 'cjhs_linkedin_profile_url', 'option' ) ? get_field( 'cjhs_linkedin_profile_url', 'option' ) : '' );
    $cjhs_youtube_channel_url = ( get_field( 'cjhs_youtube_channel_url', 'option' ) ? get_field( 'cjhs_youtube_channel_url', 'option' ) : '' );
endif;
?>
<div class="site__social-links">
    <div class="social-links__icon social-links__facebook">
        <a href="<?php echo $cjhs_facebook_profile_url; ?>">
            <span class="ir"><?php _e( 'Facebook Link', FCWP_TEXTDOMAIN ); ?></span>
        </a>
    </div>
    <div class="social-links__icon social-links__linkedin">
        <a href="<?php echo $cjhs_linkedin_profile_url; ?>">
            <span class="ir"><?php _e( 'LinkedIn Link', FCWP_TEXTDOMAIN ); ?></span>
        </a>
    </div>
    <div class="social-links__icon social-links__youtube">
        <a href="<?php echo $cjhs_youtube_channel_url; ?>">
            <span class="ir"><?php _e( 'YouTube Link', FCWP_TEXTDOMAIN ); ?></span>
        </a>
    </div>
</div>