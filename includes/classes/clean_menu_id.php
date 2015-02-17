<?php
/**
  * Clean Nav Menu ID's
  *
  * Filter that converts nav menu ID's to cleaner looking names
  */
class Clean_Menu_IDs_Class_Class {
	/**
	  * Class Constructor
	  *
	  * @uses add_filter()
	  *
	  * @since 1.0
	  */
	function __construct() {
		add_filter( 'nav_menu_item_id', array($this, 'clean_ids'), 10, 3);
	}

	/**
	  * Removes default id and replaces them
	  * with nav-(menu item)
	  *
	  * @uses preg_replace()
	  * @uses strtolower()
	  * @uses str_replace()
	  *
	  * @since 1.0
	  */
	public function clean_ids($id, $item) {
		$str = preg_replace('/[^a-zA-Z0-9s]/', '', $item->title);
		$str = strtolower(str_replace(' ', '-', $item->title));
		return 'nav-' . $str;
	}
}
?>