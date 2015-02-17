<div class="siderbar-right widget-area" role="complementary">
    <?php
    if( is_page( 'archives' ) ) :
    ?>
        <div class="o-sidebar">                 
            <a href="http://columbusjewishhistory.org/ftp_test/vex1/toc.htm?cache=1" data-fancybox-type="iframe" class="touts archive fancybox-pp"></a>
        </div>
    <?php
    elseif( is_page( 'photo-collection' ) ) :
    ?>
        <div class="o-sidebar">                 
            <a href="/?post_type=topy_photos&p=174" class="touts topy"></a>
        </div>
    <?php
    else :
	add_touts(get_the_ID());
    endif;
    ?>
</div>