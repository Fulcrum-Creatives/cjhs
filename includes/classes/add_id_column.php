<?php
/**
  * Add ID Column
  *
  * Adds a ID column to post and page list table in the admin panel
  */
class Add_Id_Column_Class {
	/**
	  * Class Constructor
	  *
	  * @uses add_filter()
	  * @uses add_action()
	  *
	  * @since 1.0
	  */
	function __construct() {
		add_filter('manage_pages_columns', array($this, 'add_column_header'), 5, 1);
		add_filter('manage_posts_columns', array($this, 'add_column_header'), 5, 1);
		add_filter('manage_media_columns', array($this, 'add_column_header'), 5, 1);
		add_action('manage_posts_custom_column', array($this, 'add_id'), 5, 2);
		add_action('manage_pages_custom_column', array($this, 'add_id'), 5, 2);
		add_action('manage_media_custom_column', array($this, 'add_id'), 5, 2);
		add_filter('manage_edit-post_sortable_columns', array($this, 'make_sortable'), 5, 1);
		add_filter('manage_edit-page_sortable_columns', array($this, 'make_sortable'), 5, 1);
		add_filter('manage_upload_sortable_columns', array($this, 'make_sortable'), 5, 1);
		add_action('pre_get_posts', array($this, 'order_by'), 5, 1);
	}

	/**
	  * Adds 'ID' text to the column header
	  *
	  * @param string $columns
	  * @return $columns
	  *
	  * @since 1.0
	  */
	public function add_column_header($columns){
		$columns['id'] = __('ID');
		return $columns;
	}

	/**
	  * Add the ID for each post
	  *
	  * @param string $columns
	  * @param int $post_id
	  *
	  * @since 1.0
	  */
	public function add_id($columns, $post_id){
		if($columns === 'id'){
				echo $post_id;
		}
	}

	/**
	  * Makes the columns sortable
	  *
	  * @param $columns
	  * @return $columns
	  *
	  * @since 1.0
	  */
	public function make_sortable( $columns ) {
		$columns['id'] = 'id';
		return $columns;
	}
	
	/**
	  * Set the value to sort the columns by
	  *
	  * @param $query
	  * @uses is_admin()
	  * @uses get()
	  * @uses set()
	  * @return self
	  *
	  * @since 1.0
	  */
	public function order_by($query) {
		if( ! is_admin() )
			return;
		$orderby = $query->get( 'orderby');
		if( 'id' == $orderby ) {
			$query->set('meta_key','id');
			$query->set('orderby','meta_value_num');
		}
	}
		
		
}
?>