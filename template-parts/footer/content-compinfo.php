<?php
$cjhs_street_address   = ( get_field( 'cjhs_street_address', 'option' ) ? get_field( 'cjhs_street_address', 'option' ) : '' );
$cjhs_city             = ( get_field( 'cjhs_city', 'option' ) ? get_field( 'cjhs_city', 'option' ) : '' );
$cjhs_state            = ( get_field( 'cjhs_state', 'option' ) ? get_field( 'cjhs_state', 'option' ) : '' );
$cjhs_zip_code         = ( get_field( 'cjhs_zip_code', 'option' ) ? get_field( 'cjhs_zip_code', 'option' ) : '' );
$cjhs_telephone_number = ( get_field( 'cjhs_telephone_number', 'option' ) ? get_field( 'cjhs_telephone_number', 'option' ) : '' );
$cjhs_name             = __( 'The Columbus Jewish Historical Society', FCWP_TEXTDOMAIN );
$cjhs_email            = get_bloginfo( 'admin_email' );
?>
<ul class="footer__info" itemscope itemtype="http://schema.org/PostalAddress">
    <li itemprop="name">
        <?php echo date('Y')  . ' &copy; ' . $cjhs_name; ?>
    </li>
    <address class="footer__address">
        <li itemprop="streetAddress">
            <?php echo $cjhs_street_address; ?>
        </li>
        <li>
            <?php echo '<span itemprop="addressLocality">' . $cjhs_city . '</span>, <span itemprop="addressRegion">' . $cjhs_state . '</span> <span itemprop="postalCode">' . $cjhs_zip_code . '</span>'; ?>
        </li>
    </address>
    <li>
        <?php echo '<a href="tel:' . $cjhs_telephone_number . '" aria-lable="Phone Number" itemprop="telephone">' . $cjhs_telephone_number . '</a>'; ?>
    </li>
    <li>
        <?php echo '<a href="mailto:' . $cjhs_email . '" aria-lable="Email" itemprop="email">' . $cjhs_email . '</a>'; ?>
    </li>
</ul>