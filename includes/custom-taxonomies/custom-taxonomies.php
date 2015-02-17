<?php
register_taxonomy(
	'sponsor_level',
	'web_sponsor',
	array(
		'hierarchical' => true, 
		'label' => __( 'Sponsor Level' ),
	)
);
/*
register_taxonomy(
	'award_type',
	'awards',
	array(
		'hierarchical' => true, 
		'label' => __( 'Award Type' ),
		'rewrite' => array('slug' => 'award-type') 
	)
);
*/
?>