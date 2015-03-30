<?php
 	/*	
	*	mageewp Section Options
	*	---------------------------------------------------------------------
	* 	@author		magee
	* 	@link		http://www.mageewp.com
	* 	@copyright	Copyright (c) mageewp.com
	*	---------------------------------------------------------------------
	*/
		
 add_action('init', 'cosmone_section_register');
 function cosmone_section_register() {
 global $cosmone_options;
 $section_slug = $cosmone_options['section_slug']?$cosmone_options['section_slug']:"section";
	$labels = array(
		'name' => 'Home Sections',
		'singular_name' => __('Section', 'Section Singular Name', 'cosmone'),
		'add_new_item' => 'Add New Section',
		'edit_item' => __('Edit Section', 'cosmone'),
		'new_item' => __('New Section', 'cosmone'),
		'view_item' => '',
		'all_items' => 'All Sections',
		'search_items' => __('Search Section', 'cosmone'),
		'not_found' =>  __('Nothing found', 'cosmone'),
		'not_found_in_trash' => __('Nothing found in Trash', 'cosmone'),
	);
 
	$args = array(
		'labels' => $labels,
		'public' => false,
		'show_ui' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'menu_icon' => COSMONE_THEME_BASE_URL.'/images/admin-section-icon.png',
		'can_export' => true,
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 8,
		'rewrite' => array('slug' =>$section_slug, 'with_front' => false),
		'supports' => array('title','editor','page-attributes'),
		'menu_position' => null,
	  ); 
 	   
	register_post_type( 'section' , $args );
   }

		
	
	add_filter("manage_edit-section_columns", "show_section_column");	
	function show_section_column($columns){
		$columns = array(
			"cb" => "<input type=\"checkbox\" />",
			"title" => __("Title",'cosmone'),
			"date" => "date");
		return $columns;
	}

	
				