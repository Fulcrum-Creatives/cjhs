<?php
/**
  * Prevent malicious URL requests
  */
class Malicious_URL_Requests_Class {
	public $user_id;
	/**
	  * Class Constructor
	  *
	  * @uses current_user_can()
	  * @uses strlen()
	  * @uses stripos()
	  * 
	  * @since 1.0
	  */
	function __construct($user_ID) {
		$this->user_id = $user_ID;
		if($this->user_id) {
			if(!current_user_can('level_10')) {
				if (strlen($_SERVER['REQUEST_URI']) > 255 || 
					stripos($_SERVER['REQUEST_URI'], "eval(") || 
					stripos($_SERVER['REQUEST_URI'], "CONCAT") || 
					stripos($_SERVER['REQUEST_URI'], "UNION+SELECT") || 
					stripos($_SERVER['REQUEST_URI'], "base64")) {
						@header("HTTP/1.1 414 Request-URI Too Long");
						@header("Status: 414 Request-URI Too Long");
						@header("Connection: Close");
						@exit;
				}
			}
		} 
	}
}
?>