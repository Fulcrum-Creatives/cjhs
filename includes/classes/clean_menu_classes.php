<?php
/**
  * Clean Menu Items
  *
  * Remove Default classes from Nav Menu Items
  */
/**
  * Clean Menu Classes
  * The list of generated menu classes that you may want to keep
  *
  * Generated Classes:
  *		.menu-item
  *		.menu-item-object-{object}
  *		.menu-item-object-category
  *		.menu-item-object-tag
  *		.menu-item-object-page
  *		.menu-item-object-{custom}
  *		.menu-item-type-{type}
  *		.menu-item-type-post_type
  *		.menu-item-type-taxonomy
  *		.current-menu-item
  *		.current-menu-parent
  *		.current-{object}-parent
  *		.current-{type}-parent
  *		.current-menu-ancestor
  *		.current-{object}-ancestor
  *		.current-{type}-ancestor
  *		.menu-item-home
  *		.page_item
  *		.page-item-$ID
  *		.current_page_item
  *		.current_page_parent
  *		.current_page_ancestor
  *
  * @since 1.0
  */
$menu_class_list = array(	
					'current-menu-item',
					'current-menu-parent',
					'current-menu-ancestor',
					'current_page_item',
					'current-page-parent',
					'current_page_ancestor',
);
class Clean_Menu_Classes_Class {
	public $menu_classes;
	public $first_last_classes;
	/**
	  * Class Constructor
	  *
	  * @param $menu_class_list
	  * @param $first_last_classes
	  * @uses add_filter()
	  * 
	  * @since 1.0
	  */
	function __construct($menu_class_list, $first_last_classes) {
		$this->menu_classes = $menu_class_list;
		$this->first_last_classes = $first_last_classes;
		add_filter('nav_menu_css_class', array($this, 'remove_classes'), 1, 1);
		add_filter('page_css_class', array($this, 'remove_classes'), 1, 1);
	}

	/**
	  * Removes unwatned classes of nav-menu
	  * item ecluding the classes defined in
	  * the  $menu_class_list array and
	  * the $first_last_classes array
	  *
	  * @param $var
	  * @uses empty()
	  * @uses array_merge()
	  * @uses  is_array()
	  * @uses array_intersect()
	  *
	  * @since 1.0
	  */
	public function remove_classes($var) {
		if (!empty($this->first_last_classes)) {
			$the_list = array_merge($this->menu_classes, $this->first_last_classes);
		} else {
			$the_list = $this->menu_classes;
		}
		return is_array($var) ? array_intersect($var,$the_list) : '';
	}
}
?>