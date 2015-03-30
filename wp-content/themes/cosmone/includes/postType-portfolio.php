<?php
 	/*	
	*	mageewp Portfolio Options
	*	---------------------------------------------------------------------
	* 	@author		magee
	* 	@link		http://www.mageewp.com
	* 	@copyright	Copyright (c) mageewp.com
	*	---------------------------------------------------------------------
	*/
		
 add_action('init', 'cosmone_portfolio_register');
 function cosmone_portfolio_register() {
 global $cosmone_options;
 $portfolio_slug = $cosmone_options['portfolio_slug']?$cosmone_options['portfolio_slug']:"portfolio";
	$labels = array(
		'name' => 'Portfolios',
		'singular_name' => __('Portfolio', 'Portfolio Singular Name', 'cosmone'),
		'add_new_item' => 'Add New Portfolio',
		'edit_item' => __('Edit Portfolio', 'cosmone'),
		'new_item' => __('New Portfolio', 'cosmone'),
		'view_item' => 'View Portfolio',
		'all_items' => 'All Portfolios',
		'search_items' => __('Search Portfolio', 'cosmone'),
		'not_found' =>  __('Nothing found', 'cosmone'),
		'not_found_in_trash' => __('Nothing found in Trash', 'cosmone'),
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'menu_icon' => COSMONE_THEME_BASE_URL.'/images/admin-portfolio-icon.png',
		'can_export' => true,
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 7,
		'rewrite' => array('slug' =>$portfolio_slug, 'with_front' => false),
		'supports' => array('title','editor','thumbnail','excerpt','page-attributes')
	  ); 
 	   
	register_post_type( 'portfolio' , $args );
   }
		register_taxonomy(
			"portfolio-category", array("portfolio"), array(
				"hierarchical" => true,
				"label" => __("Portfolio Categories",'cosmone'), 
				"singular_label" => __("Portfolio Categories",'cosmone'), 
				"rewrite" => true));
		register_taxonomy_for_object_type('portfolio-category', 'portfolio');
		
	
	add_filter("manage_edit-portfolio_columns", "show_portfolio_column");	
	function show_portfolio_column($columns){
		$columns = array(
			"cb" => "<input type=\"checkbox\" />",
			"title" => __("Title",'cosmone'),
			"portfolio-category" => __("Portfolio Categories",'cosmone'),
			"date" => "date");
		return $columns;
	}
	add_action("manage_posts_custom_column","portfolio_custom_columns");
	function portfolio_custom_columns($column){
		global $post;

		switch ($column) {
				
			case "portfolio-category":
			echo get_the_term_list($post->ID, 'portfolio-category', '', ', ','');
			break;
		}
	}	
	
				