<?php
/**
  * Register Nav Menu
  *
  * Register Nav Menu from array of menu names
  */
class Register_Menus_Class {
	public $menu_list;
	/**
	  * Class Constructor
	  *
	  * @param $theme_menu_list
	  * @uses add_action()
	  *
	  * @since 1.0
	  */
	function __construct($theme_menu_list) {
		$this->menu_list = $theme_menu_list;
		add_action('init', array($this, 'registerMenus'), 10, 2);
	}
	/**
	  * Loop through the $theme_menu_list array
	  * and register eack item as a menu. Makes items lowercase
	  * and replaces spaces wih dashes
	  *
	  * @uses register_nav_menu()
	  * @uses strtolower()
	  * @uses str_replace()
	  * @uses unset()
	  *
	  * @since 1.0
	  */
	public function registerMenus(){
		foreach($this->menu_list as $value) {
			$string = strtolower(str_replace(' ', '-', $value));
			register_nav_menu($string , $value);
			unset($value);
		}
	}
}
?>