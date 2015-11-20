<?php
$dir     = '/past-perfect/vex1/'; // diectory of the past perfect files
$toc     = file_get_html( ABSPATH . $dir . 'toc.htm' );// get the table of contents file
$results = array();
foreach( $toc->find('li.descrip') as $elm ) {
  $item      = $elm->find( 'a.reclink', 0 ); // Get items with the class reclink in the link
  $link      = $item->attr['href']; // Get the URL string
  $title     = $elm->prev_sibling()->innertext; // Get the title of the item
  $the_title = ( $title == '&nbsp;' ? __( 'Click for a surprise', FCWP_TEXTDOMAIN ) : $title );// If the title is &nbsp; 
  $results[] = '<h2 class="infobox-item--heading">From the Archives</h2>' . $the_title . '<a href="' . $dir . $link . '" class="fancybox--iframe"></a>'; // Add to the $results array
}
// Get a ramdom item
$randomize = rand( 0, count($results) -1 );
echo $results[$randomize];