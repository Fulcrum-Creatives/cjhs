<?php
/**
  * First and Last Menu Classes
  *
  * Add a class to the first and last menu items and
  *	adds a class to the first and last sub-menu items
  */
class First_Last_Classes_Class {
	public $class_list;
	/**
	  * Class Constructor
	  *
	  * @param $first_last_classes
	  * @uses add_filter()
	  *
	  * @since 1.0
	  */
	function __construct($first_last_classes) {
		$this->class_list = $first_last_classes;
		add_filter('wp_nav_menu_objects', array($this, 'add_classes'));
	}
	/**
	  * Adds the first and last classes to the nave menu
	  * on the first and last menu and submenu items
	  *
	  * @param $items
	  * @uses end()
	  * @uses array_keys()
	  * @uses array_reverse()
	  * @return $items
	  * 
	  * @since 1.0
	  */
	public function add_classes($items) {
			// first class on parent most level
			$items[1]->classes[] = $this->class_list[0];
			// separate parents and children
			$parents = $children = array();
			foreach($items as $k => $item){
				if($item->menu_item_parent == '0'){
					$parents[] = $k;
				} else {
					$children[$item->menu_item_parent] = $k;
				}
			}
			// last class on parent most level
			$last = end(array_keys($parents));
			foreach ($parents as $k => $parent) {
				if ($k == $last) {
					$items[$parent]->classes[] = $this->class_list[1];
				}
			}
			// last class on children levels
			foreach($children as $child){
				$items[$child]->classes[] = $this->class_list[3];
			}
			// first class on children levels
			$r_items = array_reverse($items, true);
			foreach($r_items as $k => $item){
				if($item->menu_item_parent !== '0'){
					$children[$item->menu_item_parent] = $k;
				}
			}
			foreach($children as $child){
				$items[$child]->classes[] = $this->class_list[2];
			}
			return $items;
		}
		

}
?>