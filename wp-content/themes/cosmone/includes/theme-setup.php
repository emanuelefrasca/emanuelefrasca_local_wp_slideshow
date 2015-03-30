<?php

if( ! defined('COSMONE_THEME_BASE_URL' ) ) 	 { 	define( 'COSMONE_THEME_BASE_URL', get_template_directory_uri()); }

function cosmone_setup(){
	$lang = get_template_directory(). '/languages';
	load_theme_textdomain('cosmone', $lang);
	add_theme_support( 'post-thumbnails' ); 
	$args = array();
	$header_args = array( 
	    'default-image'          => '',
		 'default-repeat' => 'repeat',
        'default-text-color'     => '',
        'width'                  => 960,
        'height'                 => 60,
        'flex-height'            => true
     );
	//add_theme_support( 'custom-background', $args );
	//add_theme_support( 'custom-header', $header_args );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('nav_menus');
	register_nav_menus( array('primary' => __( 'Primary Menu', 'cosmone' )));
	register_nav_menus( array('home_menu' => __( 'Home Page Header Menu', 'cosmone' )));
	add_editor_style("editor-style.css");
	add_image_size( 'portfolio-thumb', 360, 270, true ); //(cropped)
	add_image_size( 'portfolio', 500, 375, true ); //(cropped)
	add_image_size( 'portfolio-gallery', 556, 417, true ); //(cropped)
	
}

add_action( 'after_setup_theme', 'cosmone_setup' );
if ( ! isset( $content_width ) ) $content_width = 1170;

 function cosmone_custom_scripts(){
    //enqueue css
	global $wp_styles,$is_IE;
	wp_enqueue_style('cosmone-font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css', false, '3.2.1', false);
	wp_enqueue_style( 'cosmone-font-awesome-ie7', get_template_directory_uri() . "/css/font-awesome-ie7.min.css", false, '3.2.1', false );
    $wp_styles->add_data( 'cosmone-font-awesome-ie7', 'conditional', 'IE 7' );

    wp_enqueue_style('cosmone-bootstrap', get_template_directory_uri() .'/css/bootstrap.css', false, '3.0.3', false);
	wp_enqueue_style( 'cosmone-main', get_stylesheet_uri(), array(), '1.0.5' );
	wp_enqueue_style('cosmone-prettyPhoto',  get_template_directory_uri() .'/css/prettyPhoto.css', false, '3.1.5', false);
	wp_enqueue_style('titillium-web', esc_url('//fonts.googleapis.com/css?family=Titillium+Web:300,400,600,700|Open+Sans:300,400,700'), false, '', false );
	$scheme = ot_get_option('scheme');
	
if(isset($scheme) && $scheme!=""){
	wp_enqueue_style('cosmone-scheme',  get_template_directory_uri() .'/css/'.$scheme.'.less', false, '', false);
	}

	$header_background_array  = ot_get_option("header_background");
    $header_background        = cosmone_get_background($header_background_array);
	
	$footer_background_array  = ot_get_option("footer_background");
    $footer_background        = cosmone_get_background($footer_background_array);
	
	$tagline_typography_array    =  ot_get_option("tagline_typography");
	$tagline_typography          = cosmone_get_typography($tagline_typography_array);
	
	$content_typography_array    =  ot_get_option("content_typography");
	$content_typography          = cosmone_get_typography($content_typography_array);
	
	$section_title_typography_array    =  ot_get_option("section_title_typography");
	$section_title_typography          = cosmone_get_typography($section_title_typography_array);
	
	$section_description_typography_array    =  ot_get_option("section_description_typography");
	$section_description_typography          = cosmone_get_typography($section_description_typography_array);
	
	$section_content_typography_array    =  ot_get_option("section_content_typography");
	$section_content_typography          = cosmone_get_typography($section_content_typography_array);

	//navbar-brand-tagline
	
    $cosmone_custom_css   = "";
	$custom_css           =  ot_get_option("custom_css");
	$cosmone_custom_css  .=  'header.navbar{'.$header_background.'}';
	$cosmone_custom_css  .=  'body .navbar-onex .navbar-brand .navbar-brand-tagline{'.$tagline_typography.'}';
	$cosmone_custom_css  .=  'body .entry-content{'.$content_typography.'}';
	
	$cosmone_custom_css  .=  'body.onepage-home section .section-title h1{'.$section_title_typography.'}';
	$cosmone_custom_css  .=  'body.onepage-home section .section-description{'.$section_description_typography.'}';
	$cosmone_custom_css  .=  'body.onepage-home section .section-content{'.$section_content_typography.'}';	
	
	$cosmone_custom_css  .=  'footer.site-footer{'.$footer_background.'}';
	$cosmone_custom_css  .=  $custom_css;
	
	wp_add_inline_style( 'cosmone-main', $cosmone_custom_css );
	
    //enqueue js
	$global_color           =  ot_get_option("global_color");
	
	wp_enqueue_script( 'cosmone-jquery-ui', get_template_directory_uri().'/js/jquery-ui.min.js', array( 'jquery' ), '', false );
 	wp_enqueue_script( 'cosmone-bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array( 'jquery' ), '', false );
	wp_enqueue_script( 'cosmone-carousel', get_template_directory_uri().'/js/owl.carousel.min.js', array( 'jquery' ), '', false );
	wp_enqueue_script( 'cosmone-scrollTo', get_template_directory_uri().'/js/scrollTo.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'cosmone-prettyPhoto', get_template_directory_uri().'/js/jquery.prettyPhoto.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'cosmone-less', get_template_directory_uri().'/js/less.min.js', array( 'jquery' ), '', false );
	wp_enqueue_script( 'cosmone-respond', get_template_directory_uri().'/js/respond.min.js', array( 'jquery' ), '', false );
	wp_enqueue_script( 'cosmone-nav', get_template_directory_uri().'/js/jquery.nav.js', array( 'jquery' ), '', false );
	wp_enqueue_script( 'cosmone-cosmone', get_template_directory_uri().'/js/cosmone.js', array( 'jquery' ), '', false );
	
	wp_localize_script( 'cosmone-cosmone', 'cosmone_params', array(
			'ajaxurl'        => admin_url('admin-ajax.php'),
			'themeurl' => get_template_directory_uri(),
		)  );
	
	if(isset($global_color) && $global_color != ""){
	 wp_localize_script( 'cosmone-less', 'cosmone_js_var', array("global_color"=>$global_color));
	}
	if( $is_IE ) {
	wp_enqueue_script( 'cosmone-html5', get_template_directory_uri().'/js/html5.js', array( 'jquery' ), '', false );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
	wp_enqueue_script( 'comment-reply' );
	}
	
	}
 
 function cosmone_admin_scripts(){
	 global $pagenow ;
	 wp_enqueue_style('cosmone-admin',  get_template_directory_uri() .'/css/admin.css', false, '', false);
	 if( $pagenow == "post.php" || $pagenow == "post-new.php" || (isset($_GET['page']) && $_GET['page'] == "cosmone-theme-options")){
	 wp_enqueue_style('cosmone-media',  get_template_directory_uri() .'/css/magnific-popup.css', false, '', false);
	 wp_enqueue_script( 'cosmone-cosmone', get_template_directory_uri().'/js/jquery.magnific-popup.min.js', array( 'jquery' ), '', true );
	 wp_enqueue_script( 'cosmone-admin', get_template_directory_uri().'/js/admin.js', array( 'jquery' ), '', true );
	 
	 wp_localize_script( 'cosmone-admin', 'cosmone_params', array(
			'ajaxurl'        => admin_url('admin-ajax.php'),
			'themeurl' => get_template_directory_uri(),
		)  );
	 
	 }
	 
	 }
   if (!is_admin()) {
  add_action( 'wp_enqueue_scripts', 'cosmone_custom_scripts' );
  }
  else{
  add_action( 'admin_enqueue_scripts', 'cosmone_admin_scripts' );
  }


 function cosmone_enqueue_less_styles($tag, $handle) {
		global $wp_styles;
		$match_pattern = '/\.less$/U';
		if ( preg_match( $match_pattern, $wp_styles->registered[$handle]->src ) ) {
			$handle = $wp_styles->registered[$handle]->handle;
			$media = $wp_styles->registered[$handle]->args;
			$href = $wp_styles->registered[$handle]->src . '?ver=' . $wp_styles->registered[$handle]->ver;
			$rel = isset($wp_styles->registered[$handle]->extra['alt']) && $wp_styles->registered[$handle]->extra['alt'] ? 'alternate stylesheet' : 'stylesheet';
			$title = isset($wp_styles->registered[$handle]->extra['title']) ? "title='" . esc_attr( $wp_styles->registered[$handle]->extra['title'] ) . "'" : '';
	
			$tag = "<link rel='stylesheet' id='$handle' $title href='$href' type='text/less' media='$media' />";
		}
		return $tag;
	}
	add_filter( 'style_loader_tag', 'cosmone_enqueue_less_styles', 5, 2);



 function cosmone_wp_footer_script(){ 
  $footer_script = ot_get_option('tracking_code');
  echo $footer_script;
 } 
 add_action('wp_footer', 'cosmone_wp_footer_script');
 