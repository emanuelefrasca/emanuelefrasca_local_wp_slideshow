<?php
/**
 * Initialize the custom Theme Options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.0
 */
function custom_theme_options() {
 
 /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( ot_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
     
  $custom_settings = array( 

    'sections'        => array( 
      array(
        'id'          => 'general_options',
        'title'       => __( 'General Options', 'cosmone' )
      ),
	  array(
        'id'          => 'home_page',
        'title'       => __( 'Home Page', 'cosmone' )
      ),
	  
	  array(
        'id'          => 'header',
        'title'       => __( 'Header', 'cosmone' )
      ),
	  array(
        'id'          => 'footer',
        'title'       => __( 'Footer', 'cosmone' )
      ),
	  array(
        'id'          => 'not_found',
        'title'       => __( '404 Page', 'cosmone' )
      )
    ),
    'settings'        => array( 
	array(
        'id'          => 'scheme',
        'label'       => __( 'Theme Scheme', 'cosmone' ),
        'std'         => 'scheme-orange',
        'type'        => 'select',
		'section'     => 'general_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
		'choices'     => array( 
     
	   array(
            'value'       => 'scheme-orange',
            'label'       => __( 'Succinite', 'cosmone' ),
            'src'         => ''
          )
		  ,
          array(
            'value'       => 'scheme-blue',
            'label'       => __( 'SteelBlue', 'cosmone' ),
            'src'         => ''
          ),
          array(
            'value'       => 'scheme-green',
            'label'       => __( 'YellowGreen', 'cosmone' ),
            'src'         => ''
          )
		  ,
        
          array(
            'value'       => 'scheme-red',
            'label'       => __( 'PeachBlossom', 'cosmone' ),
            'src'         => ''
          )
		 
        )
      ),
	  array(
        'id'          => 'global_color',
        'label'       => __( 'Global Theme Color', 'cosmone' ),

        'std'         => '',
        'type'        => 'colorpicker',
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
        'id'          => 'logo',
        'label'       => __( 'Upload Logo', 'cosmone' ),

        'std'         => '',
        'type'        => 'upload',
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
        'id'          => 'favicon',
        'label'       => __( 'Upload Favicon', 'cosmone' ),
         'desc'        => __( 'An icon associated with a URL that is variously displayed, as in a browser\'s address bar or next to the site name in a bookmark list. Learn more about <a href="'.esc_url("http://en.wikipedia.org/wiki/Favicon").'" target="_blank">Favicon</a>', 'cosmone' ),
        'std'         => '',
        'type'        => 'upload',
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
        'id'          => 'content_typography',
        'label'       => __( 'Post Content Typography', 'cosmone' ),
        'std'         => '',
        'type'        => 'typography',
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
        'id'          => 'custom_css',
        'label'       => __( 'Custom CSS', 'cosmone' ),
        'std'         => '#custom {
  margin:0;
}',
        'type'        => 'css',
        'section'     => 'general_options',
        'rows'        => '20',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
//// home page

 array(
        'id'          => 'onepage_on_off',
        'label'       => __( 'One Page Home On/Off', 'cosmone' ),
		'desc'        =>'',
        'std'         => 'on',
        'type'        => 'on-off',
		'section'     => 'home_page',
      ),
	      array(
        'id'          => 'section_title_typography',
        'label'       => __( 'Section Title Typography', 'cosmone' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'home_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	      array(
        'id'          => 'section_description_typography',
        'label'       => __( 'Section Description Typography', 'cosmone' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'home_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	      array(
        'id'          => 'section_content_typography',
        'label'       => __( 'Section Content Typography', 'cosmone' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'home_page',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
 //header options
 
 array(
        'id'          => 'header_background',
        'label'       => __( 'Header Background', 'cosmone' ),
        'type'        => 'background',
		'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	   array(
        'id'          => 'tagline_typography',
        'label'       => __( 'Tagline Typography', 'cosmone' ),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
	// footer options
	  ,
	  
	   array(
        'id'          => 'footer_background',
        'label'       => __( 'Footer Background', 'cosmone' ),
        'type'        => 'background',
		'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  array(
        'id'          => 'sns_list_item',
        'label'       => __( 'Footer SNS Icon', 'cosmone' ),
        'desc'        => '',
        'std'         => array(
						
    array('title'=>'Facebook','sns' => 'facebook', 'link'=>'#'),
	array('title'=>'Twitter','sns' => 'twitter', 'link'=>'#'), 
	array('title'=>'LinkedIn','sns' => 'linkedin', 'link'=>'#'),
    array('title'=>'Email','sns' => 'envelope', 'link'=>'#')
        ),
        'type'        => 'list-item',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
		 'desc'        => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'settings'    => array( 

		array(
        'id'          => 'sns',
        'label'       => __( 'SNS', 'cosmone' ),
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
            'value'       => '',
            'label'       => __( '-- Choose One --', 'cosmone' ),
            'src'         => ''
          ),
          array(
            'value'       => 'facebook',
            'label'       => __( 'facebook', 'cosmone' ),
            'src'         => ''
          ),
          array(
            'value'       => 'twitter',
            'label'       => __( 'twitter', 'cosmone' ),
            'src'         => ''
          ),
          array(
            'value'       => 'linkedin',
            'label'       => __( 'linkedin', 'cosmone' ),
            'src'         => ''
          )
		  ,
          array(
            'value'       => 'pinterest',
            'label'       => __( 'pinterest', 'cosmone' ),
            'src'         => ''
          )
		  ,
          array(
            'value'       => 'google-plus',
            'label'       => __( 'google plus', 'cosmone' ),
            'src'         => ''
          )
		  ,
          array(
            'value'       => 'envelope',
            'label'       => __( 'email', 'cosmone' ),
            'src'         => ''
          )
        )
      ),
		array(
        'id'          => 'link',
        'label'       => __( 'SNS Link', 'cosmone' ),
        'std'         => '',
        'type'        => 'text',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
        )
      )
	  ,
        array(
        'id'          => 'copyright',
        'label'       => __( 'Copyright', 'cosmone' ),
        'std'         => 'Copyright &copy; '.date("Y"),
        'type'        => 'textarea-simple',
        'section'     => 'footer',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	   array(
        'id'          => 'tracking_code',
        'label'       => __( 'Tracking Code', 'cosmone' ),
        'type'        => 'textarea-simple',
        'section'     => 'footer',
		'desc'        => 'The Tracking Code initiates the recording process for every page on your site on which it is placed, although not every visitor will actually be recorded. That is determined by your recording ration, quota, visitor type, browser and other parameters. (e.g. google analytics tracking code)',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
	  
	  //// 404 page

		array(
        'id'          => 'not_found_title',
        'label'       => __( 'Title', 'cosmone' ),
        'std'         => 'WHOOPS!',
        'type'        => 'text',
		'section'     => 'not_found',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
        array(
        'id'          => 'not_found_content',
        'label'       => __( 'Content', 'cosmone' ),
        'std'         => 'THERE IS NOTHING HERE.<br />PERHAPS YOU WERE GIVEN THE WRONG URL?',
        'type'        => 'textarea',
        'section'     => 'not_found',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
	
	  
	  )
	  );
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings ); 
  }
  
	  }