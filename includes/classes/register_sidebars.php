<?php
/**
  * Register Sidebar
  *
  * Register Sidebars from array of sidebar names
  */
class Register_Sidebars_Class {
	public $sidebar_list;
	/**
	  * Class Constructor
	  *
	  * @param $kanatan_theme_sidebar_list
	  * @uses add_action()
	  *
	  * @since 1.0
	  */
	function __construct($theme_sidebar_list) {
		$this->sidebar_list = $theme_sidebar_list;
		add_action('init', array($this, 'resigster_sidebars'), 10, 2);
	}

	/**
	  * Loops through the $theme_sidebar_list array
	  * and regesters each value as a sidebar
	  *
	  * @uses strtolower()
	  * @uses register_sidebar()
	  * @uses sprintf()
	  *
	  * @since 1.0
	  */
	public function resigster_sidebars(){
		foreach($this->sidebar_list as $value => $key) {
			$string = strtolower(str_replace(' ', '-', $value));
			register_sidebar(array(
				'name'          => sprintf(__($value.' Sidebar' ), DOMAIN),
				'id'            => $string.'-sidebar',
				'description'   => sprintf(__('Widgets in this area will be shown in the '.$value.' Sidebar' ), DOMAIN),
				'class' => $key['class'],
				'before_widget' => $key['before_widget'],
				'after_widget'  => $key['after_widget'],
				'before_title'  => $key['before_title'],
				'after_title'   => $key['after_title']
			));
			unset ($value);
		}
	}

}
?>