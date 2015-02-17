<form method="get" class="searchform" id="cse-search-box" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <input type="hidden" name="cx" value="001913862702435252083:w-an4r9gbnu" />  
      <input type="hidden" name="cof" value="FORID:10" />  
      <input type="hidden" name="ie" value="UTF-8" />
	<input type="text" class="field s" id="q" name="q"  placeholder="<?php esc_attr_e( 'Search the CJHS Website', 'twentyeleven' ); ?>" />
	<input type="hidden" class="refine" name="refine" value="" />
      <input type="hidden" name="s" id="s" value="" />
	<input type="submit" class="submit searchsubmit" name="submit-my-form"  value="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />
</form>
<script>  
  jQuery('#q').bind('change', function() {  
    jQuery(this).val(function(i, val) {  
      jQuery('#s').val(val);  
      return val;  
    });  
  });  
</script> 