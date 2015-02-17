<?php
/**
  * Current Screen Infomation
  *
  * Displays the current screen information for pages in the admin panel
  */
class Current_Screen_Info_Class {
	public $hook_suffix;
	/**
	  * Class Constructor
	  *
	  * @uses add_action()
	  *
	  * @since 1.0
	  */
	function __construct($hook_suffix) {
		$this->hook_suffix = $hook_suffix;
		add_action('contextual_help', array($this, 'current_screen_info'), 10, 3);
	}
	/**
	  * Get the current screen's information and displays
	  * it in the contextual help tab
	  *
	  * @param  $contextual_help
	  * @param $screen_id
	  * @param $screen
	  * @uses method_exists()
	  * @uses empty()
	  * @return $contextual_help
	  *
	  *	@since 1.0
	  */
	function current_screen_info( $contextual_help, $screen_id, $screen ) {
		// The add_help_tab function.
		if ( ! method_exists($screen, 'add_help_tab') )
		return $contextual_help;
		// Get global variables
		global $current_screen;
		$hook_suffix = $this->hook_suffix;
		// The content to be included in the help panel
		$help_content = '<h3>Current Screen Information</h3><ul class="no-list-style">';
		foreach($current_screen as $key => $value){
			if(empty($value)){
				$value = '<em>no-value</em>';
			}
			$help_content .= '<li><strong>'.$key.'</strong> : '.$value.'</li>';
		}
		$help_content .= '</ul>';
		// Add new tab to help
		$screen->add_help_tab( array(
			'id'      => 'current-screen-info',
			'title'   => 'Current Screen Information',
			'content' => $help_content,
		));
		return $contextual_help;
	}
}
?>