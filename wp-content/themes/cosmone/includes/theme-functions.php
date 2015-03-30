<?php

    /*	
	*	get portfolio item info
	*	---------------------------------------------------------------------
	*/

	function cosmone_get_portfolio_content()
	{
	   $postid = $_POST['postid'];
	   $post   = get_post($postid,ARRAY_A);
	   
	   $portfolio_gallery = get_post_meta( $postid ,'portfolio_gallery');
						     if($portfolio_gallery && is_array($portfolio_gallery)){
	
							 $gallery = '<div id="portfolio-gallery" class="portfolio-gallery portfolio-gallery-preview owl-theme">';
							 foreach($portfolio_gallery as $attachment){
							 $attachment_id_arr = explode(",",$attachment);
							 if($attachment_id_arr && is_array($attachment_id_arr)){
							 foreach($attachment_id_arr as $attachment_id){
							  $image_attributes = wp_get_attachment_image_src( $attachment_id, "portfolio-gallery" );
							   $gallery .=  '<div class="item"><img src="'.$image_attributes[0].'" width="'.$image_attributes[1].'" height="'.$image_attributes[2].'" alt=""/></div>';
							   }
							   }
							  }
							  $gallery .= '</div>';
		 $post['gallery'] =  $gallery;
          }
							 
	   
	   
	   echo json_encode($post);
	   exit(0);
	}
   add_action('wp_ajax_cosmone_get_portfolio_content', 'cosmone_get_portfolio_content');
   add_action('wp_ajax_nopriv_cosmone_get_portfolio_content', 'cosmone_get_portfolio_content');
   
   /*	
	*	send email
	*	---------------------------------------------------------------------
	*/
  function cosmone_contact(){
	if(trim($_POST['name']) === '') {
		$Error = __('Please enter your name.','cosmone');
		$hasError = true;
	} else {
		$name = trim($_POST['name']);
	}

	if(trim($_POST['email']) === '')  {
		$Error = __('Please enter your email address.','cosmone');
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$Error = __('You entered an invalid email address.','cosmone');
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(trim($_POST['message']) === '') {
		$Error =  __('Please enter a message.','cosmone');
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$message = stripslashes(trim($_POST['message']));
		} else {
			$message = trim($_POST['message']);
		}
	}

	if(!isset($hasError)) {

	 if (isset($_POST['sendto']) && preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['sendto']))) {
	     $emailTo = $_POST['sendto'];
	   }
	   else{
	 	 $emailTo = get_option('admin_email');
		}
		 if($emailTo !=""){
		$subject = 'From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nMessage: $message";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		wp_mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
		}
		echo json_encode(array("msg"=>__("Your message has been successfully sent!",'cosmone'),"error"=>0));
		
	}
	else
	{
	echo json_encode(array("msg"=>$Error,"error"=>1));
	}
	die() ;
	}
	add_action('wp_ajax_cosmone_contact', 'cosmone_contact');
	add_action('wp_ajax_nopriv_cosmone_contact', 'cosmone_contact');
	

   /*	
	*	get blog list
	*	---------------------------------------------------------------------
	*/
	 function cosmone_get_timeline_blog_list($cat="",$num="6",$paged="1",$ajax=true,$length=0,$style=1){
        
		if(isset($_POST["cat"])){$cat=$_POST["cat"];}
		if(isset($_POST["num"])){$num=$_POST["num"];}
		if(isset($_POST["paged"])){$paged=$_POST["paged"];}
		
		$left_list  = "";
		$right_list = "";
		$order = "";
		if($style==2){
		$order = "&orderby=data&order=asc";
		}
		
		wp_reset_query();
      	$wp_query = new WP_Query();
		$wp_query -> query('posts_per_page='.$num.'&cat='.$cat.'&paged='.$paged.'&post_status=publish&post_type=post'.$order); 
		$i = 0 ;
		if ($wp_query -> have_posts()) :
		while ( $wp_query -> have_posts() ) : $wp_query -> the_post();
		
		if($length >0){
		$the_excerpt = cosmone_get_the_content_limit(get_the_excerpt(),$length);
		}
		else{
		$the_excerpt = get_the_excerpt();
		}
		if($i%2==0){
		$left_list .= '<div class="project-box">
                        		<div class="project">
                            		<h3><a href="'.get_permalink().'">'.get_the_date("Y. m").'-'.get_the_title().'</a></h3>
                                	'.$the_excerpt.'
                            	</div>
                                <div class="timeline-dot"></div>
                            </div>';
			}else{
		$right_list .= '<div class="project-box">
                        		<div class="project">
                            		<h3><a href="'.get_permalink().'">'.get_the_date("Y. m").'-'.get_the_title().'</a></h3>
                                	'.$the_excerpt.'
                            	</div>
                                <div class="timeline-dot"></div>
                            </div>';
			}
		$i++;
		endwhile;
		endif;
		wp_reset_postdata();
		$return = array();
		$return["paged"]      = $paged; 
		$return["left_list"]  = $left_list;
		$return["right_list"] = $right_list;
		if($ajax == false){
		return $return;
		}
		else{
		echo json_encode($return);
		die();
		}
	  
   }
   	add_action('wp_ajax_cosmone_get_timeline_blog_list', 'cosmone_get_timeline_blog_list');
	add_action('wp_ajax_nopriv_cosmone_get_timeline_blog_list', 'cosmone_get_timeline_blog_list');
	
	/*	
	*	substr
	*	---------------------------------------------------------------------
	*/
	
	function cosmone_get_the_content_limit($content,$max_char, $stripteaser = 0, $more_file = '') {
	   
		$content = strip_tags($content);
	
	 if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
			$content = substr($content, 0, $espacio);
		   $str  =  $content;
		   $str .=  " [...]";
		
		  return $str;
	   }
	   else {
	 
		  return $content;
	   
	   }
	}	
	/*	
	*	get portfolio list
	*	---------------------------------------------------------------------
	*/
	 function cosmone_get_timeline_portfolio_list($cat="",$num="6",$paged="1",$ajax=true,$length=0,$style=1){
        
		if(isset($_POST["cat"])){$cat=$_POST["cat"];}
		if(isset($_POST["num"])){$num=$_POST["num"];}
		if(isset($_POST["paged"])){$paged=$_POST["paged"];}
		
		$left_list  = "";
		$right_list = "";
		$term_id    = "";
		$order = "";
		if($style==2){
		$order = "&orderby=data&order=asc";
		}
		$taxonomy   = "portfolio-category";
		wp_reset_query();
		
		if(!is_numeric($cat)){
		$term      = get_term_by('name', $cat, 'portfolio-category');
		}else{
		$term      = get_term_by('id', $cat, 'portfolio-category');
		}
        $term_slug = isset($term->slug)?$term->slug:"";
	  
      	$wp_query = new WP_Query();
		$wp_query -> query('posts_per_page='.$num.'&portfolio-category='.$term_slug.'&paged='.$paged.'&post_status=publish&post_type=portfolio'.$order); 
		$i = 0 ;
		if ($wp_query -> have_posts()) :
		while ( $wp_query -> have_posts() ) : $wp_query -> the_post();
		
		if($length >0){
		$the_excerpt = cosmone_get_the_content_limit(get_the_excerpt(),$length);
		}
		else{
		$the_excerpt = get_the_excerpt();
		}
		
		if($i%2==0){
		$left_list .= '<div class="project-box">
                        		<div class="project">
                            		<h3><a href="'.get_permalink().'">'.get_the_date("Y. m").'-'.get_the_title().'</a></h3>
                                	'.$the_excerpt.'
                            	</div>
                                <div class="timeline-dot"></div>
                            </div>';
			}else{
		$right_list .= '<div class="project-box">
                        		<div class="project">
                            		<h3><a href="'.get_permalink().'">'.get_the_date("Y. m").'-'.get_the_title().'</a></h3>
                                	'.$the_excerpt.'
                            	</div>
                                <div class="timeline-dot"></div>
                            </div>';
			}
		$i++;
		endwhile;
		endif;
		wp_reset_postdata();
		$return = array();
		$return["paged"]      = $paged; 
		$return["left_list"]  = $left_list;
		$return["right_list"] = $right_list;
		if($ajax == false){
		return $return;
		}
		else{
		echo json_encode($return);
		die();
		}
	  
   }
   	add_action('wp_ajax_cosmone_get_timeline_portfolio_list', 'cosmone_get_timeline_portfolio_list');
	add_action('wp_ajax_nopriv_cosmone_get_timeline_portfolio_list', 'cosmone_get_timeline_portfolio_list');
	
	
/**
 * Helper function to format the options return value.
 *
 * @param     string    $option ID of the option to retrieve
 * @param     boolean   $css Whether the option type is CSS, deafult false.
 * @return    string
 *
 */
function cosmone_get_option( $option, $css = false ) {
  
  $default = '';
  $return = function_exists( 'ot_get_option' ) ? ot_get_option( $option, $default ) : $default;
  
  if ( $return !== $default ) {
    
    if ( true == $css ) {
      $parse = cosmone_parse_css( $option, $return );
      $return = str_replace( 'no value', '<span class="note note-danger">' . __( 'no value', 'option-tree-theme' ) . '</span>', $parse );
    }
    
    echo '<pre>';
      print_r( $return );
    echo '</pre>';
    
  } else {
  
    echo '<span class="note note-danger">' . $return . '</span>';
    
  }
  
}

/**
 * Helper function to parse and return properly formated CSS.
 *
 * @param     string    $field_id ID of the option to retrieve.
 * @param     string    $insertion The string to parse into CSS.
 * @param     boolean   $meta Whether the ID is of a meta option or regular theme option.
 * @return    string
 *
 */
function cosmone_parse_css( $field_id = '', $insertion = '', $meta = false ) {
  
  /* missing $field_id or $insertion exit early */
  if ( '' == $field_id || '' == $insertion )
    return;
  
  $insertion   = cosmone_normalize_css( $insertion );
  $regex       = "/{{([a-zA-Z0-9\_\-\#\|\=]+)}}/";
  
  /* Match custom CSS */
  preg_match_all( $regex, $insertion, $matches );
  
  /* Loop through CSS */
  foreach( $matches[0] as $option ) {

    $value        = '';
    $option_id    = str_replace( array( '{{', '}}' ), '', $option );
    $option_array = explode( '|', $option_id );

    /* get the array value */
    if ( $meta ) {
      global $post;
      
      $value = get_post_meta( $post->ID, $option_array[0], true );
      
    } else {
    
      $options = get_option( 'cosmone_option_tree' );
      
      if ( isset( $options[$option_array[0]] ) ) {
        
        $value = $options[$option_array[0]];

      }
      
    }
    
    if ( is_array( $value ) ) {
      
      if ( ! isset( $option_array[1] ) ) {
      
        /* Measurement */
        if ( isset( $value[0] ) && isset( $value[1] ) ) {
          
          /* set $value with measurement properties */
          $value = $value[0].$value[1];
          
        /* typography */
        } else if ( cosmone_array_keys_exists( $value, array( 'font-color', 'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight', 'letter-spacing', 'line-height', 'text-decoration', 'text-transform' ) ) ) {
          $font = array();
          
          if ( ! empty( $value['font-color'] ) )
            $font[] = "color: " . $value['font-color'] . ";";
          
          if ( ! empty( $value['font-family'] ) ) {
            foreach ( cosmone_recognized_font_families( $field_id ) as $key => $v ) {
              if ( $key == $value['font-family'] ) {
                $font[] = "font-family: " . $v . ";";
              }
            }
          }
          
          if ( ! empty( $value['font-size'] ) )
            $font[] = "font-size: " . $value['font-size'] . ";";
          
          if ( ! empty( $value['font-style'] ) )
            $font[] = "font-style: " . $value['font-style'] . ";";
          
          if ( ! empty( $value['font-variant'] ) )
            $font[] = "font-variant: " . $value['font-variant'] . ";";
          
          if ( ! empty( $value['font-weight'] ) )
            $font[] = "font-weight: " . $value['font-weight'] . ";";
            
          if ( ! empty( $value['letter-spacing'] ) )
            $font[] = "letter-spacing: " . $value['letter-spacing'] . ";";
          
          if ( ! empty( $value['line-height'] ) )
            $font[] = "line-height: " . $value['line-height'] . ";";
          
          if ( ! empty( $value['text-decoration'] ) )
            $font[] = "text-decoration: " . $value['text-decoration'] . ";";
          
          if ( ! empty( $value['text-transform'] ) )
            $font[] = "text-transform: " . $value['text-transform'] . ";";
          
          /* set $value with font properties or empty string */
          $value = ! empty( $font ) ? implode( "\n", $font ) : '';
          
        /* background */
        } else if ( cosmone_array_keys_exists( $value, array( 'background-color', 'background-image', 'background-repeat', 'background-attachment', 'background-position', 'background-size' ) ) ) {
          $bg = array();
          
          if ( ! empty( $value['background-color'] ) )
            $bg[] = $value['background-color'];
            
          if ( ! empty( $value['background-image'] ) )
            $bg[] = 'url("' . $value['background-image'] . '")';
            
          if ( ! empty( $value['background-repeat'] ) )
            $bg[] = $value['background-repeat'];
            
          if ( ! empty( $value['background-attachment'] ) )
            $bg[] = $value['background-attachment'];
            
          if ( ! empty( $value['background-position'] ) )
            $bg[] = $value['background-position'];
          
          if ( ! empty( $value['background-size'] ) )
            $size = $value['background-size'];
          
          /* set $value with background properties or empty string */
          $value = ! empty( $bg ) ? 'background: ' . implode( " ", $bg ) . ';' : '';
           
          if ( isset( $size ) ) {
            if ( ! empty( $bg ) ) {
              $value.= apply_filters( 'ot_cosmone_insert_css_with_markers_bg_size_white_space', "\n\x20\x20", $option_id );
            }
            $value.= "background-size: $size;";
          }
            
        }
      
      } else {
      
        $value = $value[$option_array[1]];
        
      }
     
    }
    
    // Filter the CSS
    $value = apply_filters( 'ot_cosmone_insert_css_with_markers_value', $value, $option_id );
         
    /* insert CSS, even if the value is empty */
     $insertion = stripslashes( str_replace( $option, $value, $insertion ) );
     
  }
  
  return $insertion;
      
}

/**
 * Helper function to change the value if empty.
 *
 * @param     string    $value The options return value.
 * @param     string    $option ID of the option.
 * @return    string

 */
function cosmone_filter_css( $value, $option ) {
  
  if ( empty( $value ) )
    $value = 'no value'; 
  
  return $value;
  
}
add_filter( 'ot_cosmone_insert_css_with_markers_value', 'cosmone_filter_css', 10, 2 );

/**
 * Helper function to normalize the CSS.
 *
 * @param     string    $css The return value to normalize.
 * @return    string

 */
function cosmone_normalize_css( $css ) {
  
  /* Normalize & Convert */
  $css = str_replace( "\r\n", "\n", $css );
  $css = str_replace( "\r", "\n", $css );
  
  /* Don't allow out-of-control blank lines */
  $css = preg_replace( "/\n{2,}/", "\n\n", $css );
  
  return $css;
  
}

/**
 * Helper function to test if an array key exists.
 *
 * @param     array     $array The array to test against.
 * @param     array     $keys An array of keys to look for.
 * @return    bool
 *
 * @since     2.3.0
 */
function cosmone_array_keys_exists( $array, $keys ) {
  
  foreach( $keys as $k )
    if ( isset( $array[$k] ) )
      return true;
  
  return false;
  
}

/**
 * Recognized font families
 *
 * @return    array
 *
 * @access    public
 */
function cosmone_recognized_font_families( $field_id = '' ) {

  return apply_filters( 'ot_cosmone_recognized_font_families', array(
    'arial'     => 'Arial',
    'georgia'   => 'Georgia',
    'helvetica' => 'Helvetica',
    'palatino'  => 'Palatino',
    'tahoma'    => 'Tahoma',
    'times'     => '"Times New Roman", sans-serif',
    'trebuchet' => 'Trebuchet',
    'verdana'   => 'Verdana'
  ), $field_id );
  
}

 	/*	
	*	get background 
	*	---------------------------------------------------------------------
	*/
function cosmone_get_background($args){
$result = "";

if(isset($args) && is_array($args))
{
if(isset($args['background-color'])&& $args['background-color']!="")
$result .= 'background-color: '. $args['background-color'] .';' ;
if(isset($args['background-repeat']))
$result .= 'background-repeat:'.$args['background-repeat'] .';';
if(isset($args['background-attachment']))
$result .= 'background-attachment:'. $args['background-attachment'].';';
if(isset($args['background-position']))
$result .= 'background-position:'.$args['background-position'].';';
if(isset($args['background-image']))
$result .= 'background-image:url('.$args['background-image'] .'); ';
}
return $result;
}


/*	
	*	Form generator
	*	---------------------------------------------------------------------
	*/
	

function cosmone_form_generator($value){
	
		if(!isset($value['id'])){exit;}
		$value['std'] = isset($value['std'])?$value['std']:"";
			$value['std'] = str_replace("\r\n",' ', $value['std']);
	?>
		<div class="cosmone-shortcode-attr-container">
			<label for="cosmone-<?php echo $value['id']; ?>"><h5><?php  echo $value['title']; ?></h5></label>
		<?php
		switch ( $value['type'] ) {
		
			case 'text': ?>
				<input  name="<?php echo $value['id']; ?>" id="cosmone-<?php  echo $value['id']; ?>" type="text" value="<?php echo $value['std']; ?>" />
			<?php 
			break;
	
			case 'checkbox':
				if($value['id']){$checked = "checked=\"checked\"";  $checkbox_switch = "on";} else{$checked = "";$checkbox_switch = "off";} ?>
				
					<input class="on-of" type="checkbox" name="cosmone-<?php echo $value['id'] ?>" id="<?php echo $value['id'] ?>" value="true" <?php echo $checked; ?> />
			<?php	
			break;
			case 'radio':
			?>
				<div style="float:left; width: 295px;">
					<?php foreach ($value['options'] as $key => $option) { ?>
					<label style="display:block; margin-bottom:8px;"><input name="<?php echo $value['id']; ?>" id="cosmone-<?php echo $value['id']; ?>" type="radio" value="<?php echo $key ?>" <?php if ( $value['id'] == $key) { echo ' checked="checked"' ; } ?>> <?php echo $option; ?></label>
					<?php } ?>
				</div>
			<?php
			break;
			
			case 'select':
			?>
				<select name="<?php echo $value['id']; ?>" id="cosmone-<?php echo $value['id']; ?>">
					<?php foreach ($value['options'] as $key => $option) { ?>
					<option value="<?php echo $key ?>" <?php if (  $value['std'] == $key) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
					<?php } ?>
				</select>
			<?php
			break;
			
			case 'textarea':
			?>
				<textarea name="<?php echo $value['id']; ?>" id="cosmone-<?php echo $value['id']; ?>" type="textarea" cols="100%" rows="8" tabindex="4"><?php echo $value['std'];  ?></textarea>
			<?php
			break;
	
			case 'upload':
			?>
		
			<input id="<?php echo $value['id']; ?>" class="img-path upload_box" type="text" size="56" style="direction:ltr; text-laign:left" name="<?php echo $value['id']; ?>" value="<?php echo $value['std']; ?>" />
					<input id="upload_<?php echo $value['id']; ?>_button" type="button" class="upload_image_button" value="Upload" />
					<?php
					if(isset($value['std']) && $value['std'] != ""){
					$img_preview = '<div id="'.$value['id'].'-preview" class="img-preview"><img src="'.$value['std'].'" alt="" /><a class="del-img" title="Delete"></a></div>';}
					?>
		
			<?php
			break;
			case 'color':
			?>
			<input type="text" value="<?php echo $value['std'] ; ?>" class="minicolors" data-theme="bootstrap" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" />					
			<?php
			break;
			}
			?>
			<?php if( isset( $value['desc'] ) ) : ?><div class="cosmone-shortcode-attr-desc"><?php echo $value['desc'] ?></div><?php endif; ?>
		
			<div class="clear"></div>
		</div>
<?php
	}
	
/*	
	*	Shortcode  generator Form
	*	---------------------------------------------------------------------
	*/
	
 function cosmone_shortcode_form(){
   global $cosmone_shortcodes ;
   $shortcode = $_POST['shortcode'];
  if(isset($cosmone_shortcodes[$shortcode]) && is_array($cosmone_shortcodes[$shortcode])){
	foreach($cosmone_shortcodes[$shortcode] as $key=>$value){
		if(is_array($value)){
		  array_push($value,array("id"=>$key));
		  cosmone_form_generator($value);
		  }
	 }

 echo '<input type="hidden" id="cosmone-curr-shortcode" value="'.$shortcode.'" />';
 echo '<div class="clear"></div>';

	}

	exit();
	}
	add_action('wp_ajax_cosmone_shortcode_form', 'cosmone_shortcode_form');
	add_action('wp_ajax_nopriv_cosmone_shortcode_form', 'cosmone_shortcode_form');

	/*	
	*	Shortcode Generator
	*	---------------------------------------------------------------------
	*/
	
	function cosmone_get_shortcode(){
	global $cosmone_shortcodes ;
	$attr      = isset($_POST['attr'])?$_POST['attr']:"";
	$shortcode = isset($_POST['shortcode'])?$_POST['shortcode']:"";
	$content   = "";
	$result    = "";
	$shortcodes_attr = array();

	if(is_array($attr) && $attr != null && array_key_exists( $shortcode,$cosmone_shortcodes))
	{
	foreach($cosmone_shortcodes[$shortcode] as $key=>$value){
	$shortcodes_attr[] = $value['id'];
	}
	$result = '['.$shortcode.' ';
	  foreach($attr as $k=>$v){
	  if($v["name"] != "content" && $v["name"] != "text_content"){
	      if($v["value"] !="" && in_array($v["name"],$shortcodes_attr)){
	       $result .= $v["name"].'=\''.$v["value"].'\' ';
		   }
	    }
		else{
		   $content = $v["value"] . '[/'.$shortcode.']';
		}
	  }
	  $result .= ']';
	  $result .= $content ;
	}
	$result = stripslashes($result);
//	$result = str_replace("\r\n",' ', $result);
	echo $result; 
	exit();
	}
	
	add_action('wp_ajax_cosmone_get_shortcode', 'cosmone_get_shortcode');
	add_action('wp_ajax_nopriv_cosmone_get_shortcode', 'cosmone_get_shortcode');
	
	/*	
	*	Shortcode Preview
	*	---------------------------------------------------------------------
	*/
	
	function cosmone_shortcode_preview(){
	   $shortcode = isset($_POST['shortcode'])?$_POST['shortcode']:"";
	   $shortcode = stripslashes($shortcode);
	   $result    = do_shortcode($shortcode);
	   echo $result; 
	   exit();
	}
	add_action('wp_ajax_cosmone_shortcode_preview', 'cosmone_shortcode_preview');
	add_action('wp_ajax_nopriv_cosmone_shortcode_preview', 'cosmone_shortcode_preview');
	
	
/*	add_filter('image_send_to_editor', 'cosmone_image_send_to_editor', 10, 2); 
	function cosmone_image_send_to_editor($html, $id) 
	{ 
		$description = str_replace("\r\n",' ', $description); 
	}*/
	
	/*	
	*	action before simple textarea
	*	---------------------------------------------------------------------
	*/
	
	function cosmone_before_textarea_simple(){
	
	 $img = get_template_directory_uri() .'/images/shortcode_button.png';
	echo '<a title="'.__("Cosmone Shortcodes","cosmone").'" class="cosmone_shortcodes_textarea"><img src="'.$img.'"></a>';

	}
	add_action("before_textarea_simple","cosmone_before_textarea_simple");
	
		/*
*  page navigation
*
*/
function cosmone_native_pagenavi($echo,$wp_query){
    if(!$wp_query){global $wp_query;}
    global $wp_rewrite;      
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
    'base' => @add_query_arg('paged','%#%'),
    'format' => '',
    'total' => $wp_query->max_num_pages,
    'current' => $current,
    'prev_text' => ' &laquo; ',
    'next_text' => ' &raquo;',
	'type'      => 'list'
    );
 
    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged');
 
    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array('s'=>get_query_var('s'));
    if($echo == "echo"){
	echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination page-numbers">', paginate_links($pagination) );
	}else
	{
	
	return str_replace("<ul class='page-numbers'>", '<ul class="pagination page-numbers">', paginate_links($pagination) );
	}
}

	// get breadcrumbs
 function cosmone_get_breadcrumb(){
   global $post;
   $show_breadcrumb = "";
	 new cosmone_breadcrumb;
	}
	
	// get sidebar
	
 function cosmone_get_sidebar($sidebar,$default = true){
 echo '<aside class="widget-area">';
 if($default){
 if ( is_active_sidebar($sidebar) ){
 dynamic_sidebar($sidebar);
 }
 else{
 dynamic_sidebar(1);
 }
 }else{
 if ( is_active_sidebar($sidebar) ){
 dynamic_sidebar($sidebar);
 }
 }
 echo '</aside>';
 }
		// fix shortcode

  function cosmone_fix_shortcodes($content){   
			$replace_tags_from_to = array (
				'<p>[' => '[', 
				']</p>' => ']', 
				']<br />' => ']',
				']<br>' => ']',
				']\r\n' => ']',
				']\n' => ']',
				']\r' => ']',
				'\r\n[' => '[',
			);

			return strtr( $content, $replace_tags_from_to );
		}

	function cosmone_the_content_filter($content) {
	  $content = cosmone_fix_shortcodes($content);
	  return $content;
	}
	
	add_filter( 'the_content', 'cosmone_the_content_filter' );
	
	 //// Custom comments list
   
   function cosmone_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   
   <li  <?php comment_class("comment"); ?> id="comment-<?php comment_ID() ;?>">
                                	<article class="comment-body">
                                    	<div class="comment-avatar"><?php echo get_avatar($comment,'52','' ); ?></div>
                                        <div class="comment-box">
                                            <div class="comment-info"><?php printf(__('%s <span class="says">says:</span>','onetone'), get_comment_author_link()) ;?> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ;?>">
<?php printf(__('%1$s at %2$s','onetone'), get_comment_date(), get_comment_time()) ;?></a>  <?php edit_comment_link(__('(Edit)','onetone'),'  ','') ;?></div>

 <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.','onetone') ;?></em>
         <br />
      <?php endif; ?>
     <div class="comment-content"><?php comment_text() ;?>
      <div class="reply-quote">
             <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ;?>
			</div>
       </div>
    </div></article>

<?php
        }
			
function cosmone_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( ' Page %s ', 'cosmone' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'cosmone_wp_title', 10, 2 );

function cosmone_title( $title ) {
	if ( $title == '' ) {
	return 'Untitled';
	} else {
	return $title;
	}
	}
	add_filter( 'the_title', 'cosmone_title' );


// filter search nav menu items & add one page menu

function cosmone_nav_menu_items( $nav, $args ) {
    if( $args->theme_location == 'home_menu' )
	{
	    $query = new WP_Query('post_type=section&post_status=publish&orderby=menu_order');
   $onepage_menu = "";
  if($query->have_posts() ):
	while ($query->have_posts() ) :
    $query->the_post();
	$sanitize_title = sanitize_title(get_the_title());
	$onepage_menu .= '<li class="cosmone-menuitem" id="cosmone-'.$sanitize_title.'"><a href="#'.$sanitize_title.'"><span>'.get_the_title().'</span></a></li>';
	endwhile;
	endif;
	 wp_reset_postdata() ;
        return $onepage_menu.$nav;
		}
else{
    return $nav;
	}
}
//add_filter('wp_nav_menu_items','cosmone_nav_menu_items', 10, 2);

function cosmone_onepage_menu_items() {
  
	$query = new WP_Query('post_type=section&post_status=publish&orderby=menu_order&posts_per_page=-1');
   $onepage_menu = "";
  if($query->have_posts() ):
	while ($query->have_posts() ) :
    $query->the_post();
	$sanitize_title = sanitize_title(get_the_title());
	$menu_slug  = get_post_meta( get_the_ID() ,'menu_slug');
	if(isset($menu_slug[0]) && trim($menu_slug[0]) !=""){
	$sanitize_title  =	trim($menu_slug[0]);
		}
	$show_menu  = get_post_meta( get_the_ID() ,'show_menu');
	$show_nav_menu  = (isset($show_menu[0])&&$show_menu[0]!="")?$show_menu[0]:"on";
	if($show_nav_menu == "on"){
	$onepage_menu .= '<li class="cosmone-menuitem" id="cosmone-'.$sanitize_title.'"><a href="#'.$sanitize_title.'"><span>'.get_the_title().'</span></a></li>';
	}
	endwhile;
	endif;
	 wp_reset_postdata() ;
    return $onepage_menu;
	
}


// filter search form
function cosmone_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
	
    <div><label class="screen-reader-text" for="s" style=" display:none">' . __( 'Search for:' ,'cosmone') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ,'cosmone') .'" />
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'cosmone_search_form' );

// get  typography


function cosmone_get_typography($value){
 $return = "";
if ( is_array($value) && cosmone_array_keys_exists( $value, array( 'font-color', 'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight', 'letter-spacing', 'line-height', 'text-decoration', 'text-transform' ) ) ) {
          $font = array();
          
          if ( ! empty( $value['font-color'] ) )
            $font[] = "color: " . $value['font-color'] . ";";
          
          if ( ! empty( $value['font-family'] ) ) {
                $font[] = "font-family: " . $value['font-family'] . ";";
          }
          
          if ( ! empty( $value['font-size'] ) )
            $font[] = "font-size: " . $value['font-size'] . ";";
          
          if ( ! empty( $value['font-style'] ) )
            $font[] = "font-style: " . $value['font-style'] . ";";
          
          if ( ! empty( $value['font-variant'] ) )
            $font[] = "font-variant: " . $value['font-variant'] . ";";
          
          if ( ! empty( $value['font-weight'] ) )
            $font[] = "font-weight: " . $value['font-weight'] . ";";
            
          if ( ! empty( $value['letter-spacing'] ) )
            $font[] = "letter-spacing: " . $value['letter-spacing'] . ";";
          
          if ( ! empty( $value['line-height'] ) )
            $font[] = "line-height: " . $value['line-height'] . ";";
          
          if ( ! empty( $value['text-decoration'] ) )
            $font[] = "text-decoration: " . $value['text-decoration'] . ";";
          
          if ( ! empty( $value['text-transform'] ) )
            $font[] = "text-transform: " . $value['text-transform'] . ";";
          
          /* set $value with font properties or empty string */
          $return = ! empty( $font ) ? implode( " ", $font ) : '';

        } 
		return $return;
		}

/* =============================================================================
Include the  Google Fonts 
========================================================================== */

if( class_exists( 'OT_Loader' ) ):

global $ot_options;

$ot_options = get_option( 'cosmone_option' );

   // default fonts used in this theme, even though there are no google fonts
   $default_theme_fonts = array(
   'arial' => 'Arial, Helvetica, sans-serif',
   'helvetica' => 'Helvetica, Arial, sans-serif',
   'georgia' => 'Georgia, "Times New Roman", Times, serif',
   'tahoma' => 'Tahoma, Geneva, sans-serif',
   'times' => '"Times New Roman", Times, serif',
   'trebuchet' => '"Trebuchet MS", Arial, Helvetica, sans-serif',
   'verdana' => 'Verdana, Geneva, sans-serif'
   );

   defined('OT_FONT_DEFAULTS') or define('OT_FONT_DEFAULTS', serialize($default_theme_fonts));
   defined('OT_FONT_API_KEY') or define('OT_FONT_API_KEY', 'AIzaSyBsVUFJxtKkCCLwyezox7_oo0lRIG6lcXY'); // enter your own Google Font API key here
   defined('OT_FONT_CACHE_INTERVAL') or define('OT_FONT_CACHE_INTERVAL', 0); // Checking once a week for new Fonts. The time interval for the remote XML cache in the database (21600 seconds = 6 hours)

// get the OT-Google-Font plugin file
include_once( get_template_directory().'/includes/google-fonts.php' );
global $google_font_array;
// get the google font array - build in ot-google-fonts.php
$google_font_array = ot_get_google_font(OT_FONT_API_KEY, OT_FONT_CACHE_INTERVAL);

// Now apply the fonts to the font dropdowns in theme options with the build in OptionTree hook
function ot_filter_recognized_font_families( $array, $field_id ) {

global $google_font_array;

// loop through the cached google font array if available and append to default fonts
$font_array = array();
if($google_font_array){
foreach($google_font_array as $index => $value){
$font_array[$index] = $value['family'];
}
}

// put both arrays together
$array = array_merge(unserialize(OT_FONT_DEFAULTS), $font_array);

return $array;

}
add_filter( 'ot_recognized_font_families', 'ot_filter_recognized_font_families', 1, 2 );

endif;

add_action( 'wp_head', 'cosmone_favicon' );

	function cosmone_favicon()
	{
	    $url =  ot_get_option('favicon');
		$icon_link = "";
		if($url)
		{
			$type = "image/x-icon";
			if(strpos($url,'.png' )) $type = "image/png";
			if(strpos($url,'.gif' )) $type = "image/gif";
		
			$icon_link = '<link rel="icon" href="'.esc_url($url).'" type="'.$type.'">';
		}
		
		echo $icon_link;
	}
