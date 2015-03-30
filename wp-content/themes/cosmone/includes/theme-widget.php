<?php
// global $wp_registered_sidebars;
#########################################
function cosmone_widgets_init() {
		register_sidebar(array(
		
			'name' => 'Displayed Everywhere',
			'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h1 class="widget-title">', 
			'after_title' => '</h1>', 
			));
			register_sidebar(array(
				'name' => 'Sidebar Blog Post',
				'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h1 class="widget-title">', 
			'after_title' => '</h1>', 
			));
		
			register_sidebar(array(
				'name' => 'Sidebar Pages',
				'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h1 class="widget-title">', 
			'after_title' => '</h1>', 
			));
		
			register_sidebar(array(
				'name' => 'Sidebar Category',
				'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h1 class="widget-title">', 
			'after_title' => '</h1>', 
			));
			register_sidebar(array(
				'name' => 'Sidebar Archive',
				'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h1 class="widget-title">', 
			'after_title' => '</h1>', 
			));
		
			register_sidebar(array(
				'name' => 'Sidebar Search',
				'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h1 class="widget-title">', 
			'after_title' => '</h1>', 
			));
			register_sidebar(array(
				'name' => 'Sidebar Tags',
				'before_widget' => '<div id="%1$s" class="widget widget-box %2$s">', 
			'after_widget' => '<span class="seperator extralight-border"></span></div>', 
			'before_title' => '<h1 class="widget-title">', 
			'after_title' => '</h1>', 
			));
			
}
add_action( 'widgets_init', 'cosmone_widgets_init' );