<?php
/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', 'custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   */
  $page_meta_box = array(
    'id'          => 'page_meta_box',
    'title'       => __( 'Page Meta Box', 'cosmone' ),
    'desc'        => '',
    'pages'       => array( 'page' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => __( 'General Options', 'cosmone' ),
        'id'          => 'general_options',
        'type'        => 'tab'
      ),
    array(
        'id'          => 'sidebar',
        'label'       => __( 'Sidebar', 'cosmone' ),
        'std'         => '',
        'type'        => 'select',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		'choices'     => array( 
         
          array(
            'value'       => 'left',
            'label'       => __( 'left', 'cosmone' ),
            'src'         => ''
          ),
          
          array(
            'value'       => 'no',
            'label'       => __( 'no', 'cosmone' ),
            'src'         => ''
          )
	
        )
      )
	  ,  array(
        'id'          => 'page_background',
        'label'       => __( 'Background', 'cosmone' ),
        'std'         => '',
        'type'        => 'background',
		'section'     => ''
      )
    )
  );
  
  
    $section_meta_box = array(
    'id'          => 'section_options',
    'title'       => __( 'Section Options', 'cosmone' ),
    'desc'        => '',
    'pages'       => array( 'section' ),
    'context'     => 'normal',
    'priority'    => 'high',
	 'section'     => '',
    'fields'      => array(
      array(
        'label'       => __( 'General Options', 'cosmone' ),
        'id'          => 'general_options',
        'type'        => 'tab',
		'section'     => ''
		
      ),
	  
	    array(
        'id'          => 'menu_slug',
        'label'       => __( 'Menu Slug', 'cosmone' ),
        'std'         => '',
        'type'        => 'text',
		'desc'        =>'The "slug" is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.',
		'section'     => ''
      ),
		
	   array(
        'id'          => 'content_full_width_on_off',
        'label'       => __( 'Content Full Width On/Off', 'cosmone' ),
        'std'         => 'off',
        'type'        => 'on-off',
		'section'     => ''
      ),
	  array(
        'id'          => 'show_menu',
        'label'       => __( 'Assign to nav menu', 'cosmone' ),
        'std'         => 'on',
        'type'        => 'on-off',
		'section'     => ''
      ),
	   array(
        'id'          => 'show_title',
        'label'       => __( 'Show/hide section title', 'cosmone' ),
        'std'         => 'on',
        'type'        => 'on-off',
		'section'     => ''
      ),
	   array(
        'id'          => 'section_title',
        'label'       => __( 'Custom section title (default post title)', 'cosmone' ),
        'std'         => '',
        'type'        => 'text',
		'section'     => ''
      ),
	  
	  array(
        'id'          => 'section_background',
        'label'       => __( 'Background', 'cosmone' ),
        'std'         => '',
        'type'        => 'background',
		'section'     => ''
      ),
	    array(
        'id'          => 'padding_top',
        'label'       => __( 'Padding Top', 'cosmone' ),
        'std'         =>  array( '50', 'px' ),
        'type'        => 'measurement',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	      array(
        'id'          => 'padding_bottom',
        'label'       => __( 'Padding Bottom', 'cosmone' ),
        'std'         => array( '50', 'px' ),
        'type'        => 'measurement',
        'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	   array(
        'id'          => 'css_class',
        'label'       => __( 'Section Css Class', 'cosmone' ),
		'desc'        => 'Extra css class name.',
        'std'         => '',
        'type'        => 'text',
		'section'     => ''
      ),
       array(
            'id'          => 'short_description',
            'label'       => __( 'Short description', 'cosmone' ),
            'desc'        => '',
            'std'         => '',
            'type'        => 'textarea-simple',
            'rows'        => '5',
			 'section'     => ''
          )
   
     
    )
  );
  
    $portfolio_meta_box = array(
    'id'          => 'portfolio_meta_box',
    'title'       => __( 'Portfolio Meta Box', 'cosmone' ),
    'desc'        => '',
    'pages'       => array( 'portfolio' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => __( 'Gallery', 'cosmone' ),
        'id'          => 'gallery',
        'type'        => 'tab'
      ),
    array(
        'id'          => 'portfolio_gallery',
        'label'       => __( 'Gallery', 'cosmone' ),
        'std'         => '',
        'type'        => 'gallery',
        'section'     => 'gallery',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
	  
    )
  );
  

  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) ){
    ot_register_meta_box( $page_meta_box );
	ot_register_meta_box( $section_meta_box );
	ot_register_meta_box( $portfolio_meta_box );
	}

}