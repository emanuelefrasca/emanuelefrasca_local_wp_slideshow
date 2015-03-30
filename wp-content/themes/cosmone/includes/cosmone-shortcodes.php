<?php

/**
	 * Shortcode: Columns
	 *
	 * @param string $content
	 * @param array $atts Shortcode attributes
	 * @return string Output html
	 * author: quan
	 */
 global $cosmone_shortcodes, $portfolio_categories,$post_type_array;
 //
 $portfolio_categories = array();
 $post_type_array      = array();
 $args = array( 'hide_empty=0' );
 $terms = get_terms('portfolio-category', $args);
 $portfolio_categories[""] = "All";
 $count = count($terms); $i=0;
	if ($count > 0) {
		foreach ($terms as $term) {
			$i++;
			if(isset($term->slug) && isset($term->name)){
			$portfolio_categories[$term->slug] = $term->name;
			}
		}
	}

 //
/*	 $args = array(
	   'public'   => true,
	   '_builtin' => false
	);
	$output = 'names'; // names or objects, note names is the default
	$operator = 'and'; // 'and' or 'or'
	$post_types = get_post_types( $args, $output, $operator ); 
	foreach ( $post_types  as $post_type ) {
	  $post_type_array[$post_type] = $post_type;
	}*/


 $cosmone_shortcodes = array(
 
 'accordions'=>array(
      array("type"=>"select","std"=>"3","id"=>"style","title"=>__("Button Color",'cosmone'),"desc"=>'',"options"=>array("1"=>"style 1","2"=>"style 2")),
	  array("type"=>"text","std"=>"1","id"=>"active","title"=>__("Active Item",'cosmone') ),
	  array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class'),
	  array("type"=>"textarea","std"=>'[accordion title="accordion #1" icon="hand-right"]accordion content #1[/accordion]&nbsp;&#13;&#10;[accordion title="accordion #2"]accordion content #2[/accordion]&nbsp;&#13;&#10;[accordion title="accordion #3"]accordion content #3[/accordion]',"id"=>"text_content","title"=>__("Content",'cosmone') ,"desc"=>'')
  ),
  'accordion'=>array(
     array("type"=>"text","std"=>"1","id"=>"title","title"=>__("Accordion Title",'cosmone') ),
     array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class'),
	 array("type"=>"textarea","std"=>'',"id"=>"text_content","title"=>__("Content",'cosmone') ,"desc"=>'')
  ),
 
  'align' => array(
  array("type"=>"select","std"=>"left","id"=>"align","title"=>__("Align",'cosmone') ,"desc"=>'',"options"=>array("left"=>"left","right"=>"right","center"=>"center")), 
  array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class'),
  array("type"=>"textarea","std"=>" Your Content ","id"=>"text_content","title"=>__("Content",'cosmone') ,"desc"=>'')
  ),
  
  'button' => array(
   array("type"=>"select","std"=>"3","id"=>"color","title"=>__("Button Color",'cosmone'),"desc"=>'',"options"=>array("purple"=>"purple","pink"=>"pink","green"=>"green","yellow"=>"yellow","orange"=>"orange")),
   array("type"=>"select","std"=>"3","id"=>"style","title"=>__("Button Style",'cosmone'),"desc"=>'',"options"=>array("1"=>"1","2"=>"2")),
   array("type"=>"text","id"=>"icon","std"=>"random","title"=>__("Icon in Button",'cosmone') ),
   array("type"=>"text","std"=>"BUTTON","id"=>"text_content","title"=>__("Button Text",'cosmone') ),
   array("type"=>"text","id"=>"link","std"=>"#","title"=>__("Button Link",'cosmone') ),
   array("type"=>"select","std"=>"_self","id"=>"target","title"=>__("Link Target",'cosmone'),"desc"=>'',"options"=>array("_self"=>"_self","_blank"=>"_blank","_parent"=>"_parent","_top"=>"_top")),
   array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class')
  ),
 
  'column' => array(
  
   array("type"=>"select","std"=>"","id"=>"col_xs","title"=>__("Extra small grid( &lt; 768px)",'cosmone') ,"desc"=>__("Select column width. This width will be calculated depend page width.",'cosmone'),"options"=>array(""=>"default","1"=>"1/12","2"=>"2/12","3"=>"3/12","4"=>"4/12","5"=>"5/12","6"=>"6/12","7"=>"7/12","8"=>"8/12","9"=>"9/12","10"=>"10/12","11"=>"11/12")),
  array("type"=>"select","std"=>"6","id"=>"col_sm","title"=>__("Small grid(&ge;  768px)",'cosmone')  ,"desc"=>'',"options"=>array("1"=>"1/12","2"=>"2/12","3"=>"3/12","4"=>"4/12","5"=>"5/12","6"=>"6/12","7"=>"7/12","8"=>"8/12","9"=>"9/12","10"=>"10/12","11"=>"11/12")),
    array("type"=>"select","std"=>"3","id"=>"col_md","title"=>__("Medium grid( &ge;  992px)",'cosmone'),"desc"=>'',"options"=>array("1"=>"1/12","2"=>"2/12","3"=>"3/12","4"=>"4/12","5"=>"5/12","6"=>"6/12","7"=>"7/12","8"=>"8/12","9"=>"9/12","10"=>"10/12","11"=>"11/12")),
    array("type"=>"select","std"=>"","id"=>"col_lg","title"=>__("Large grid( &ge;  1200px))",'cosmone') ,"desc"=>'',"options"=>array(""=>"default","1"=>"1/12","2"=>"2/12","3"=>"3/12","4"=>"4/12","5"=>"5/12","6"=>"6/12","7"=>"7/12","8"=>"8/12","9"=>"9/12","10"=>"10/12","11"=>"11/12")),
	array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class'),
	array("type"=>"textarea","std"=>" Your Content ","id"=>"text_content","title"=>__("Content",'cosmone') ,"desc"=>'')
	/* ,'col_sm_offset' =>'', 
	 'col_md_offset' =>'', 
	 'col_lg_offset' =>'', 
  
	 'col_sm_push' =>'', 
	 'col_md_push' =>'', 
	 'col_lg_push' =>'', 
  
	 'col_sm_pull' =>'', 
	 'col_md_pull' =>'', 
	 'col_lg_pull' =>'',
	 'css_class'   =>''*/),
	 'contact' => array(
       array("type"=>"text","std"=>__("Your Email Here",'cosmone'),"id"=>"sendto","title"=>__("Send To",'cosmone') ),
       array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class')
  ),
  
  
   'gmap' => array(
   array("type"=>"text","std"=>"100%","id"=>"width","title"=>__("Width",'cosmone') ),
   array("type"=>"text","std"=>"New York","id"=>"address","title"=>__("Address",'cosmone') ),
   array("type"=>"select","std"=>"yes","id"=>"marker","title"=>__("Marker",'cosmone'),"options"=>array("yes"=>"yes",""=>"no") ),
   array("type"=>"text","std"=>"15","id"=>"zoom","title"=>__("Zoom",'cosmone') ),
   array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class'),
   array("type"=>"textarea","std"=>'<strong>Hello World</strong><br> New York is the most populous city in the United States, <br>and the center of the New York metropolitan area, which is one of the most populous <br>metropolitan areas in the world.',"id"=>"infowindow","title"=>__("Content",'cosmone') ,"desc"=>'')
     
  ),
  
     'icon'=>array(
       array("type"=>"text","id"=>"name","std"=>"icon-pencil","title"=>__("Font Awesome Icon Name",'cosmone'),"desc"=>"Get more icons name <a href='http://www.mageewp.com/cosmone/demo-one/font-awesome-icons/' target='_blank'>Click Here</a>" ),
	   array("type"=>"select","std"=>"","id"=>"size","title"=>__("Icon Size",'cosmone'),"desc"=>'',"options"=>array("icon-large"=>"icon-large","icon-2x"=>"icon-2x","icon-3x"=>"icon-3x","icon-4x"=>"icon-4x")),
       array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class'),
	  
  ),
  
  'list'=>array(
       array("type"=>"text","id"=>"icon","title"=>__("Font Awesome Icon Name",'cosmone') ),
       array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class'),
	   array("type"=>"textarea","std"=>'Unum jucundum admiratio&nbsp;&#13;&#10;Si vos es vultus pro simplici elit&nbsp;&#13;&#10;Vestibulum rutrum nibh posset',"id"=>"text_content","title"=>__("Content",'cosmone') ,"desc"=>'')
  ),
  
  'row'  => array(
	 'css_class' =>array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class'),
	 array("type"=>"textarea","std"=>" Your Content ","id"=>"text_content","title"=>__("Content",'cosmone') ,"desc"=>'')
  ),
  'sns' => array(
      'icon' => array("type"=>"text","std"=>"twitter","id"=>"icon","title"=>__("Icon",'cosmone') ,"desc"=>'Font Awesome icon name or image url.'),
	  'link' => array("type"=>"text","std"=>"#","id"=>"link","title"=>__("Link",'cosmone') ),
	  'css_class'   => array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class')
  ),
  
 
  'portfolio' => array(
     array("type"=>"select","std"=>"1","id"=>"style","title"=>__("Style",'cosmone'),"options"=>array("1"=>"style 1","2"=>"style 2") ),
     array("type"=>"select","std"=>"","id"=>"category","title"=>__("Portfolio Category",'cosmone'),"options"=>$portfolio_categories ),
     array("type"=>"text","std"=>"8","id"=>"num","title"=>__("List Num",'cosmone') ),
	 array("type"=>"select","std"=>"yes","id"=>"pagination","title"=>__("Show Pagination",'cosmone'),"options"=>array("yes"=>"yes","no"=>"no") ),
     array("type"=>"select","std"=>"3","id"=>"columns","title"=>__("Columns",'cosmone') ,"options"=>array("2"=>"2/12","3"=>"3/12","4"=>"4/12","5"=>"5/12","6"=>"6/12","7"=>"7/12","8"=>"8/12","9"=>"9/12","10"=>"10/12","11"=>"11/12")),
'css_class'   => array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class')),
	 

  
  'pricing' => array(
      array("type"=>"select","std"=>"1","id"=>"style","title"=>__("Style",'cosmone'),"options"=>array("1"=>"style 1","2"=>"style 2") ),
      array("type"=>"text","std"=>"Free","id"=>"title","title"=>__("Title",'cosmone') ),
      array("type"=>"text","std"=>"$39.95","id"=>"price","title"=>__("Price",'cosmone') ),
	  array("type"=>"text","std"=>"Sign Up","id"=>"btn_text","title"=>__("Button Text",'cosmone') ),
      array("type"=>"text","std"=>"#","id"=>"btn_link","title"=>__("Button Link",'cosmone') ),
      array("type"=>"text","std"=>"_blank","id"=>"btn_target","title"=>__("Button Link Target",'cosmone') ),
      array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class'),
	  array("type"=>"textarea","std"=>'[pricing_row support="yes"] Full access [/pricing_row]&nbsp;&#13;&#10;[pricing_row support="yes"] Documentation [/pricing_row]&nbsp;&#13;&#10;[pricing_row support="no"]  Customer support [/pricing_row]&nbsp;&#13;&#10;[pricing_row support="no"] Free updates[/pricing_row]',"id"=>"text_content","title"=>__("Content",'cosmone') ,"desc"=>'')
  ),
  'pricing_row' => array(
      'support' => 'yes',
      'css_class'=> ''
  ),

   'progress' => array(
     array("type"=>"select","std"=>"1","id"=>"style","title"=>__("Style",'cosmone'),"options"=>array("1"=>"style 1","2"=>"style 2") ),
      array("type"=>"text","std"=>__("Progress Bar Name",'cosmone'),"id"=>"title","title"=>__("Title",'cosmone') ),
	  array("type"=>"text","std"=>"60","id"=>"percent","title"=>__("Percent",'cosmone') ),
      array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class')
  ),
    'service' => array(
      array("type"=>"text","std"=>"","id"=>"title","title"=>__("Title",'cosmone') ),
      array("type"=>"text","std"=>"","id"=>"icon","title"=>__("Icon",'cosmone') ,"desc"=>'URL or Font Awesome icon name'),
      array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class'),
	  array("type"=>"textarea","std"=>" Your Content ","id"=>"text_content","title"=>__("Content",'mageewp') ,"desc"=>'')
  )
  
  ,
  'tabs'=>array(
	  array("type"=>"text","std"=>"1","id"=>"active","title"=>__("Active Item",'cosmone') ),
	  array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class'),
	  array("type"=>"textarea","std"=>'[tab title="Tab #1" icon="hand-right"]Tab content #1[/tab]&nbsp;&#13;&#10;[tab title="Tab #2"]Tab content #2[/tab]&nbsp;&#13;&#10;[tab title="Tab #3"]Tab content #3[/tab]',"id"=>"text_content","title"=>__("Content",'cosmone') ,"desc"=>'')
  ),
  'tab'=>array(
     array("type"=>"text","std"=>"1","id"=>"title","title"=>__("Tab Title",'cosmone') ),
     array("type"=>"text","std"=>"","id"=>"icon","title"=>__("Tab Icon (Font Awesome Icon name)",'cosmone') ),
     array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class')
  ),
   'team' => array(
      array("type"=>"select","std"=>"1","id"=>"style","title"=>__("Style",'cosmone'),"options"=>array("1"=>"style 1","2"=>"style 2") ),
      array("type"=>"text","std"=>"","id"=>"name","title"=>__("Name",'cosmone') ),
      array("type"=>"text","std"=>"","id"=>"avatar","title"=>__("Avatar",'cosmone') ),
      array("type"=>"text","std"=>"","id"=>"byline","title"=>__("Byline",'cosmone') ),
      array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class')
  ),
  
   'testimonial' => array(
   array("type"=>"select","std"=>"1","id"=>"style","title"=>__("Style",'cosmone'),"options"=>array("1"=>"style 1","2"=>"style 2") ),
       array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class'),
	    array("type"=>"textarea","std"=>'[testimonial_item author="Jhon" avatar=""]Test Text Content #1[/testimonial_item]&nbsp;&#13;&#10;[testimonial_item author="Aimee" avatar=""]Test Text Content #2[/testimonial_item]&nbsp;&#13;&#10;[testimonial_item author="Jessie" avatar=""]Test Text Content #3[/testimonial_item]',"id"=>"text_content","title"=>__("Content",'cosmone') ,"desc"=>'')
	   
  ),
 
   'testimonial_item' => array(
     'author' => '',
     'avatar' => '',
     'css_class'=> ''
  ),
   
 'timeline' => array(
      array("type"=>"select","std"=>"1","id"=>"style","title"=>__("Style",'cosmone'),"options"=>array("1"=>"style 1","2"=>"style 2") ),
	  array("type"=>"text","std"=>"6","id"=>"num","title"=>__("List Num",'cosmone') ),
	  array("type"=>"text","std"=>"","id"=>"category","title"=>__("Category Name",'cosmone') ),
	  array("type"=>"select","std"=>"blog","id"=>"type","title"=>__("Post Type",'cosmone'),"options"=>array("blog"=>"blog","portfolio"=>"portfolio") ),
	  array("type"=>"text","std"=>"","id"=>"css_class","title"=>__("Css Class",'cosmone') ,"desc"=>'Extra CSS class')
 
  )

 );
foreach($cosmone_shortcodes as $cosmone_shortcode=>$std){
  add_shortcode($cosmone_shortcode,'cosmone_'.$cosmone_shortcode.'_shortcode');
}
 function cosmone_column_shortcode($atts,$content=NULL){
   extract( shortcode_atts( array(
  'col_xs' => '',
  'col_sm' => '',
  'col_md' => '',
  'col_lg' => '',
  
  'col_sm_offset' =>'', 
  'col_md_offset' =>'', 
  'col_lg_offset' =>'', 
  
  'col_sm_push' =>'', 
  'col_md_push' =>'', 
  'col_lg_push' =>'', 
  
  'col_sm_pull' =>'', 
  'col_md_pull' =>'', 
  'col_lg_pull' =>'',
  'css_class'   =>''

  ), $atts ) );
  
  $col_class = "";
  if(trim($col_xs) != "" && is_numeric($col_xs)){  $col_class .= "col-xs-".$col_xs." ";}
  if(trim($col_sm) != "" && is_numeric($col_sm)){  $col_class .= "col-sm-".$col_sm." ";}
  if(trim($col_md) != "" && is_numeric($col_md)){  $col_class .= "col-md-".$col_md." ";}
  if(trim($col_lg) != "" && is_numeric($col_lg)){  $col_class .= "col-lg-".$col_lg." ";}
  
  if(trim($col_sm_offset) != "" && is_numeric($col_sm_offset)){  $col_class .= "col-sm-offset-".$col_sm_offset." ";}
  if(trim($col_md_offset) != "" && is_numeric($col_md_offset)){  $col_class .= "col-md-offset-".$col_md_offset." ";}
  if(trim($col_lg_offset) != "" && is_numeric($col_lg_offset)){  $col_class .= "col-lg-offset-".$col_lg_offset." ";}
  
  if(trim($col_sm_push) != "" && is_numeric($col_sm_push)){  $col_class .= "col-sm-push-".$col_sm_push." ";}
  if(trim($col_md_push) != "" && is_numeric($col_md_push)){  $col_class .= "col-md-push-".$col_md_push." ";}
  if(trim($col_lg_push) != "" && is_numeric($col_lg_push)){  $col_class .= "col-lg-push-".$col_lg_push." ";}
  
  if(trim($col_sm_pull) != "" && is_numeric($col_sm_pull)){  $col_class .= "col-sm-pull-".$col_sm_pull." ";}
  if(trim($col_md_pull) != "" && is_numeric($col_md_pull)){  $col_class .= "col-md-pull-".$col_md_pull." ";}
  if(trim($col_lg_pull) != "" && is_numeric($col_lg_pull)){  $col_class .= "col-lg-pull-".$col_lg_pull." ";}
  
  if(trim($css_class) != ""){  $col_class .= $css_class;}
  
  $return  = '<div class="'.$col_class.'">';
  $return .= do_shortcode(cosmone_fix_shortcodes( $content) );
  $return .= '</div>';
  return $return ;
 }


/**
	 * Shortcode: row
	 *
	 * @param string $content
	 * @param array $atts Shortcode attributes
	 * @return string Output html
	 * author: quan
	 */
  function cosmone_row_shortcode($atts,$content=NULL)
  {
  
  extract( shortcode_atts( array(
  'css_class'   => '' 
  ), $atts ) );
  
  $return   = '<div class="row '.$css_class.'">';
  $return  .=  do_shortcode(cosmone_fix_shortcodes( $content) );
  $return  .= '</div>'; 
  return $return ;
  }

  
  /**
	 * Shortcode: SNS
	 *
	 * @param array $atts Shortcode attributes
	 * @return string Output html
	 * author: quan
	 */
	 
	 function cosmone_sns_shortcode($atts,$content=NULL){
	 extract( shortcode_atts( array(
	  'icon' => '',
	  'link' => '#',
	  'css_class'   => ''
	  ), $atts ) );
	 $return = '<a href="'.$link.'" class="sns-wrap '.$css_class.'"><div class="team-sns"><i class="'.$icon.'"></i></div></a>';
	 
	 return $return;
	 
	 }

	 
	  /**
	 * Shortcode: center(content align center)
	 *
	 * @param array $atts Shortcode attributes
	 * @return string Output html
	 * author: quan
	 */
	 function cosmone_align_shortcode($atts,$content=NULL){
	 extract( shortcode_atts( array(
	  'align' =>'left',
	  'css_class'   => ''
	  ), $atts ) );
	  $return = '<div class="align-'.$align.' '.$css_class.'" style="width:100%;">'.do_shortcode(cosmone_fix_shortcodes( $content) ).'</div>';
	 
	 return $return;
	 }

/**
	 * Shortcode: Portfolio List
	 *
	 * @param array $atts Shortcode attributes
	 * @return string Output html
	 * author: quan
	 */
	 
 function cosmone_portfolio_shortcode($atts,$content=NULL)
 {
 global $post,$paged;
 extract( shortcode_atts( array(
  'category' => '',
  'style' =>'1',
  'num'  => '8',
  'columns' =>'3',
  'filter' =>'yes',
  'pagination'   =>'yes',
  'css_class'   => '' 
  ), $atts ) );
	
	$size = "";
	if($num<=0 || !is_numeric($num)){$num = 8;}
	$size = $columns;
	
    $content   = '<div class="portfolio-container style'.$style.' '.$css_class.'">';
 	if($filter == "yes" || $filter == "1" ){
  	if($style == "2")
	{

	 $content   .= '<nav class="portfolio-list-cat text-center">
                    <ul id="filters" class="nav nav-pills clearfix">';
				$portfolio_terms = get_terms("portfolio-category");
				 $count = count($portfolio_terms);
				 if ( $count > 0 ){
					    $content .= '<li><a class="filter active" data-filter="all" href="#all">'.__("All",'cosmone').'</a></li>';
						foreach ( $portfolio_terms as $portfolio_term ) {
						$termname = $portfolio_term->slug;
                    	$content .= '<li><a class="filter" data-filter=".term-'.$termname.'" href="#'.$termname.'">'.$portfolio_term->name.'</a></li>';
                    }
						}
                        
      $content .= '</ul></nav>';
				
	}else{
	
	$content  .= '<div class="detail" id="portfolio-detail">
                	<div class="detail-close" id="portfolio-detail-close">
                    	<span class="icon-remove"></span>
                    </div>
                	<div class="row">
                    	<div class="col-md-8 portfolio-image-preview">
                        	<img class="img-responsive detail-img" src="'.get_template_directory_uri().'/images/blank.png" />
                        </div>
                        <div class="col-md-4 text-left">
                        	<h2 class="portfolio-detail-title"></h2>
                            <div class="detail-content portfolio-detail-content">
                            	<p></p>
                            </div>                        	
                        </div>
                    </div>
                </div>';
		
				
	$content .= '<nav class="portfolio-cat">
                	<ul id="filters" class="nav nav-pills clearfix testobiacno">';
					
	$portfolio_terms = get_terms("portfolio-category");
				 $count = count($portfolio_terms);
				 if ( $count > 0 ){
					    $content .= '<li><a class="filter active" data-filter="all" href="#all">'.__("All",'cosmone').'</a></li>';
						foreach ( $portfolio_terms as $portfolio_term ) {
						$termname = $portfolio_term->slug;
                    	$content .= '<li><a class="filter" data-filter=".term-'.$termname.'" href="#'.$termname.'">'.$portfolio_term->name.'</a></li>';
                    }
						}
     $content .= '</ul></nav>';
      }
	}
 
  if(!is_numeric($category)){
		$term      = get_term_by('name', $category, 'portfolio-category');
		}else{
		$term      = get_term_by('id', $category, 'portfolio-category');
		}
  $term_slug = isset($term->slug)?$term->slug:"";
 
  if(!$paged){$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;}
 
  $query = new WP_Query('post_type=portfolio&paged='.$paged.'&orderby=menu_order&post_status=publish&portfolio-category='.$term_slug.'&posts_per_page='.$num);
  
  ////
  if($style == "2"){
  $content .='<section class="portfolio-list-main"><div class="portfolio-list portfoliolist-wrapper">';
  }else{
  $content .= '<div class="portfoliolist portfoliolist-wrapper">';
  }
  ////
  $i        = 0 ;
  if($query->have_posts() ):
	while ($query->have_posts() ) :
    $query->the_post();
	
	$postid            = get_the_ID();
	$permalink         = get_permalink();
	$title             = get_the_title();
	$image             = "";
	$term_list         = wp_get_post_terms($postid, 'portfolio-category', array("fields" => "all"));

    if (has_post_thumbnail( $postid) ): 
	$thumb = get_the_post_thumbnail( $postid , "portfolio-thumb" ); 
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'portfolio' );
	endif;
	
	if($style == "2"){
	$content .= '<div class="column col-sm-6 col-md-'.$columns.' mix term-'.$term_list[0]->slug.'"  data-value="'.$postid.'">
                                <figure class="portfolio-list-box">
                                    <div class="portfolio-img-box">
                                        '.$thumb.'
                                        <div class="portfolio-info">
                                            <div class="portfolio-link-box">
                                                <a href="'.$image[0].'" rel="portfolio-image"><div class="portfolio-link"><i class="icon-zoom-in"></i></div></a>
                                                <a href="'.$permalink.'"><div class="portfolio-link"><i class="icon-link"></i></div></a>
                                            </div>
                                        </div>
                                    </div>
                                    <figcaption>
                                        <h3>'.$title .'</h3>
                                        <ul>'.get_the_term_list( $postid, 'portfolio-category', '<li>', ',</li><li>', '</li>' ).'</ul>
                                    </figcaption>
                                </figure>
                            </div>';
	
	}else{
		  $content .= '<div class="column col-sm-6 col-md-'.$columns.' mix term-'.$term_list[0]->slug.'" data-value="'.$postid.'">
                    	<div class="portfolio-box " data-id="'.$postid.'" data-image="'.$image[0].'">
                    		'.$thumb.'
                            <div class="portfolio-info">
                                <h3>'.$title .'</h3>
                            </div>
                        </div>
                   	</div>';
				}


	$i++ ;
	endwhile;endif;
	
    $content .= '</div>';

	if($pagination == "yes" || $pagination == "1" ){
	$content .= '<div class="page-box clear text-center">'.cosmone_native_pagenavi("",$query).'</div>';
	}
	if($style == "2"){ $content .= '</section>';}
	$content .= '</div>';
	
	wp_reset_postdata();
	
	return $content;

  }
  
  /**
	 * Shortcode: Service
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 * author: quan
	 */
  
  function cosmone_service_shortcode($atts,$content=NULL){
   extract( shortcode_atts( array(
   'title' => '',
   'icon' => '',
   'style' =>'1',
   'css_class' =>''
  ), $atts ) );
  if($style == 2 || $style == "style2"){$css_class = $css_class." style2";}
  $return  = '<div class="service-box '.$css_class.'">';
  if($icon != ""){
  if(strstr($icon,"http")){
  $return .= '<img src="'.$icon.'" alt="'.$title.'" />';
  }else{
  $return .= '<i class="'.$icon.'"></i>';
  }
  }
   if($title != ""){
  $return .= '<h3>'.$title.'</h3>';
  }
  $return .= '<p>'.$content.'</p>';
  $return .= '</div>';

				
  return $return ;           		
  }
 
  
    /**
	 * Shortcode: team
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 * author: quan
	 */
  
  function cosmone_team_shortcode($atts,$content=NULL){
   extract( shortcode_atts( array(
   'name' => '',
   'avatar' => '',
   'byline'   => '',
   'style' => '1',
   'css_class' =>''
  ), $atts ) );
  
  if($style == "2"){
   $return  = '<div class="team-box style2 '.$css_class.'">';
     if($avatar != ""){
  $return .= '<img src="'.$avatar.'" alt="'.$name.'" />';
  }
     if($name != ""){
  $return .= ' <h3>'.$name.'</h3>';
  }
  if($byline != ""){
  $return .= '<h4>'.$byline.'</h4>';
  }
  $return .= '<p>';
  $return .= do_shortcode(cosmone_fix_shortcodes( $content) );                       
  $return .= '</p></div>';
  
  }else{				
  $return  = '<div class="team-box '.$css_class.'">';
  if($avatar != ""){
  $return .= '<img src="'.$avatar.'" alt="'.$name.'" />';
  }
  if($name != ""){
  $return .= ' <h3>'.$name.'</h3>';
  }
  if($byline != ""){
  $return .= '<h4>'.$byline.'</h4>';
  }
  $return .= '<p>'.do_shortcode(cosmone_fix_shortcodes( $content) ).'</p>';
  $return .= '</div>';
  }
 
  return $return ;           		
  }
 
  
     /**
	 * Shortcode: Testimonial
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 * author: quan
	 */
	 
   function cosmone_testimonial_shortcode($atts,$content=NULL){
   extract( shortcode_atts( array(
   'css_class' =>'',
   'style' => '1'
  ), $atts ) );
  
   $content = str_replace("\r\n","",$content);
   $content = str_replace("<br />","",$content);
   
  if($style == "2"){
  $content  = str_replace("[testimonial_item","[testimonial_item style='".$style."' ",$content);
  $return   = '<div class="testimonials-wrapper"><div id="testimonial2" class="testimonials-box style2">';
  $return  .= do_shortcode(cosmone_fix_shortcodes( $content) );
  $return  .= '</div><div class="testimonials-page style2">
                 		<a href="javascript:;"><i class="icon-angle-left"></i></a>
                 		<a href="javascript:;"><i class="icon-angle-right"></i></a>
                 	</div></div>';
  }
  else{
   $return   = '<div class="row"><div id="testimonial" class="owl-carousel '.$css_class.'">';
  
   $return  .= do_shortcode(cosmone_fix_shortcodes( $content) );
   $return  .= '</div></div>';
   }

					
   return $return;
   }
   
  
  function cosmone_testimonial_item_shortcode($atts, $content = null) {

	extract(shortcode_atts(array(
				'author' => '',
				'avatar' => '',
				'style'  => '1',
				'css_class'=> ''
			), $atts));
			$avatar = $avatar == ""?get_template_directory_uri()."/images/blank.png":$avatar;
			 if($style == "2"){
			 $return = '<div class="item '.$css_class.'"><div class="testimonials-author">
                   			<img src="'.$avatar.'">
                    		<p>'.$author.'</p>                    
                    	</div>
                    	<div class="testimonials-content">
                    		<p>'.do_shortcode(cosmone_fix_shortcodes( $content) ).'</p>
                    	</div></div>';
			 }else{
			$return = '<div class="item '.$css_class.'">
                	<div class="testimonials-author col-sm-3">
                    	<p>'.$author.'</p>
                        <img src="'.$avatar.'">
                    </div>
                    <div class="col-sm-9">
                    	<div class="testimonials-content">
                    		<p>'.do_shortcode(cosmone_fix_shortcodes( $content) ).'</p>
                        </div>
                    </div>
                 </div>';
				 }
    return $return;
			}

   
   
     /**
	 * Shortcode: Pricing Table
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 * author: quan
	 */
	 
	 function cosmone_pricing_shortcode($atts, $content = null){
	 extract(shortcode_atts(array(
				'title' => 'Free',
				'price' => '',
				'btn_text' => 'Sign Up',
				'btn_link' => '#',
				'btn_target' => '_blank',
				'featured' => '',
				'style'    => '1',
				'css_class'=> ''
			), $atts));
		
		if($featured == "yes" || $featured == "1"){
		$css_class .= " featured";
		}
		
		$css_class .= " style".$style;

		$content  = str_replace("[pricing_row","[pricing_row style='".$style."' ",$content);

		
		$return = '<article class="price-box basic '.$css_class.'">
                    		<h3>'.$title.'</h3>
                        	<h4>'.$price.'</h4>
                        	<ul>';
                        	$return .=  do_shortcode(cosmone_fix_shortcodes( $content) );	
        $return .= '</ul>
                        	<a href="'.$btn_link.'" target="'.$btn_target.'"><button class="btn-normal">'.$btn_text.'</button></a>
                   		</article>';
			
	
		return $return ;
						
	 }

	 
	   /**
	 * Shortcode: Pricing row
	 *
	 * @param array $atts Shortcode attributes
	 * @param string $content
	 * @return string Output html
	 * author: quan
	 */
	 
	 function cosmone_pricing_row_shortcode($atts, $content = null){
	 extract(shortcode_atts(array(
				'support' => 'yes',
				'css_class'=> '',
				'style' => ''
			), $atts));

	if(strtolower($support) == "yes"){
	  $icon  = "icon-ok";
	}
	else{
	  $icon = "icon-remove";
	}
	if($style == "2"){
		
		$return = '<li class="'.$css_class.'"><i class="'.$icon.'"></i> '.$content.'</li>';
		}
		else{
		
		$return = '<li class="'.$css_class.'"><span class="'.$icon.'"></span> '.$content.'</li>';
		}
	 
	 return $return;
	 
	 }
	 

	function cosmone_gmap_shortcode($atts) {

	extract(shortcode_atts(array(
									'lat'   => '0', 
									'lon'    => '0',
									'id' => 'map',
									'zoom' => '1',
									'width' => '400',
									'height' => '300',
									'maptype' => 'ROADMAP',
									'address' => '',
									'kml' => '',
									'kmlautofit' => 'yes',
									'marker' => '',
									'markerimage' => '',
									'traffic' => 'no',
									'bike' => 'no',
									'fusion' => '',
									'start' => '',
									'end' => '',
									'infowindow' => '',
									'infowindowdefault' => 'yes',
									'directions' => '',
									'hidecontrols' => 'false',
									'scale' => 'false',
									'scrollwheel' => 'true',
									'radius' => ''
									
									), $atts));
									
    if(is_numeric($width)){ $container_width = $width."px";}else{ $container_width = $width;}
	if(is_numeric($radius)){$radius = "border-radius:".$radius."px;";}
	$return = '
    <div id="' .$id . '" style="width:' . $container_width  . ';height:' . $height . 'px;'.$radius.'"></div>
	';
	
	//directions panel
	if($start != '' && $end != '') 
	{
		//$panelwidth = $width-20;
		$return .= '
		<div id="directionsPanel" style="width:' . $container_width . ';height:' . $height . 'px;border:1px solid gray;padding:10px;overflow:auto;"></div><br>
		';
	}

	$return .= '<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>
       <script type="text/javascript">

		var latlng = new google.maps.LatLng(' . $lat . ', ' . $lon . ');
		var myOptions = {
			zoom: ' . $zoom . ',
			center: latlng,
			scrollwheel: ' . $scrollwheel .',
			scaleControl: ' . $scale .',
			disableDefaultUI: ' . $hidecontrols .',
			mapTypeId: google.maps.MapTypeId.' . $maptype . '
		};
		var ' . $id . ' = new google.maps.Map(document.getElementById("' . $id . '"),
		myOptions);
		';
				
		//kml
		if($kml != '') 
		{
			if($kmlautofit == 'no') 
			{
				$return .= '
				var kmlLayerOptions = {preserveViewport:true};
				';
			}
			else
			{
				$return .= '
				var kmlLayerOptions = {preserveViewport:false};
				';
			}
			$return .= '
			var kmllayer = new google.maps.KmlLayer(\'' . html_entity_decode($kml) . '\',kmlLayerOptions);
			kmllayer.setMap(' . $id . ');
			';
		}

		//directions
		if($start != '' && $end != '') 
		{
			$return .= '
			var directionDisplay;
			var directionsService = new google.maps.DirectionsService();
		    directionsDisplay = new google.maps.DirectionsRenderer();
		    directionsDisplay.setMap(' . $id . ');
    		directionsDisplay.setPanel(document.getElementById("directionsPanel"));

				var start = \'' . $start . '\';
				var end = \'' . $end . '\';
				var request = {
					origin:start, 
					destination:end,
					travelMode: google.maps.DirectionsTravelMode.DRIVING
				};
				directionsService.route(request, function(response, status) {
					if (status == google.maps.DirectionsStatus.OK) {
						directionsDisplay.setDirections(response);
					}
				});
			';
		}
		
		//traffic
		if($traffic == 'yes')
		{
			$return .= '
			var trafficLayer = new google.maps.TrafficLayer();
			trafficLayer.setMap(' . $id . ');
			';
		}
	
		//bike
		if($bike == 'yes')
		{
			$return .= '			
			var bikeLayer = new google.maps.BicyclingLayer();
			bikeLayer.setMap(' . $id . ');
			';
		}
		
		//fusion tables
		if($fusion != '')
		{
			$return .= '			
			var fusionLayer = new google.maps.FusionTablesLayer(' . $fusion. ');
			fusionLayer.setMap(' . $id . ');
			';
		}
	
		//address
		if($address != '')
		{
			$return .= '
		    var geocoder_' . $id . ' = new google.maps.Geocoder();
			var address = \'' . $address . '\';
			geocoder_' . $id . '.geocode( { \'address\': address}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					' . $id . '.setCenter(results[0].geometry.location);
					';
					
					if ($marker !='')
					{
						//add custom image
						if ($markerimage !='')
						{
							$return .= 'var image = "'. $markerimage .'";';
						}
						$return .= '
						var marker = new google.maps.Marker({
							map: ' . $id . ', 
							';
							if ($markerimage !='')
							{
								$return .= 'icon: image,';
							}
						$return .= '
							position: ' . $id . '.getCenter()
						});
						';

						//infowindow
						if($infowindow != '') 
						{
							//first convert and decode html chars
							$thiscontent = htmlspecialchars_decode($infowindow);
							$return .= '
							var contentString = \'' . $thiscontent . '\';
							var infowindow = new google.maps.InfoWindow({
								content: contentString
							});
										
							google.maps.event.addListener(marker, \'click\', function() {
							  infowindow.open(' . $id . ',marker);
							});
							';

							//infowindow default
							if ($infowindowdefault == 'yes')
							{
								$return .= '
									infowindow.open(' . $id . ',marker);
								';
							}
						}
					}
			$return .= '
				} else {
				alert("Geocode was not successful for the following reason: " + status);
			}
			});
			';
		}

		//marker: show if address is not specified
		if ($marker != '' && $marker != 'no' && $marker != '0' && $address == '')
		{
			//add custom image
			if ($markerimage !='')
			{
				$return .= 'var image = "'. $markerimage .'";';
			}

			$return .= '
				var marker = new google.maps.Marker({
				map: ' . $id . ', 
				';
				if ($markerimage !='')
				{
					$return .= 'icon: image,';
				}
			$return .= '
				position: ' . $id . '.getCenter()
			});
			';

			//infowindow
			if($infowindow != '') 
			{
				$return .= '
				var contentString = \'' . $infowindow . '\';
				var infowindow = new google.maps.InfoWindow({
					content: contentString
				});
							
				google.maps.event.addListener(marker, \'click\', function() {
				  infowindow.open(' . $id. ',marker);
				});
				';
				//infowindow default
				if ($infowindowdefault == 'yes')
				{
					$return .= '
						infowindow.open(' . $id . ',marker);
					';
				}				
			}
		}

		$return .= '</script>';
		
		return $return;
  }


	/**
	 * Shortcode: Contact Form
	 *
	 * @param array $atts Shortcode attributes
	 * @return string Output html
	 * author: quan
	 */
	 
  function cosmone_contact_shortcode($atts){
     extract( shortcode_atts( array(
	'sendto' =>'',
   'css_class' =>''
  ), $atts ) );
  
  $return = '<form method="post" class="contact-form" onsubmit="return false;" action="">
                        	<fieldset>
                        		<section>
                            		<label class="sr-only" for="contact-name">'.__("Name",'cosmone').'</label>
                                	<input type="text" aria-required="true" required="" tabindex="1" placeholder="'.__("Name","cosmone").'" id="contact-name" name="contact-name" />
                            	</section>
                            	<section>
                            		<label class="sr-only" for="contact-email">'.__("Email",'cosmone').'</label>
                                	<input type="email" aria-required="true" required="" tabindex="2" placeholder="'.__("Email",'cosmone').'" id="contact-email" name="contact-email" />
                            	</section>
                            	<section>
                            		<label class="sr-only" for="contact-msg">'.__("Message",'cosmone').'</label>
                        			<textarea placeholder="'.__("Message",'cosmone').'" aria-required="true" required="" tabindex="3" rows="5" cols="39" id="contact-msg" name="contact-msg"></textarea>
                            	</section>
                            </fieldset>
                            <section>
							<p class="noticefailed"></p>
                            	<input type="submit" class="contact-submit btn-normal" value="Submit">
								<input type="hidden" name="sendto" id="sendto" value="'.$sendto.'">
                            </section>
                     	</form>';
	return $return ;
  
  }

   
   /**
	 * Shortcode: progress bar
	 *
	 * @param array $atts Shortcode attributes
	 * @return string Output html
	 * author: quan
	 */
	 
	 function cosmone_progress_shortcode($atts){
	 extract( shortcode_atts( array(
	    'title' =>'',
		'percent' =>'60',
		'style'  =>'1',
       'css_class' =>''
        ), $atts ) );
	 $percent = str_replace("%","",$percent);
	 if(intval($percent) < 0){$percent = 0;}
	 if(intval($percent) > 100){$percent = 100;}
	 
	 $css_class = $css_class." style".$style;
	 if($style == "2"){
	  $return = '<div class="skills  progress-item '.$css_class.'">
                	<p>'.$title.'</p>
                    <div class="progress-box">
                    	<div class="progress-num-box">
                    		<div class="progress-num" style="right: '.$percent.'%;opacity:0">'.$percent.'%</div>
                        </div>
                    	<div class="progress">
							<div class="progress-bar progress-bar-item" role="progressbar" aria-valuenow="'.$percent.'" aria-valuemin="0" aria-valuemax="100" style="width: 0;">
    							<span class="sr-only">'.sprintf(__( ' %s%% Complete', 'cosmone'), $percent ).'</span>
                        	</div>
                        </div>
                	</div>                                
           		</div>';
				}else{
	 $return = '<div class="skills progress-item row '.$css_class.'">
                	<p class="col-md-3">'.$title.'</p>
                    <div class="col-md-9">
                    	<div class="progress-num-box">
                    		<div style="left: '.$percent.'%;opacity:0" class="progress-num"><span>'.$percent.'</span>%</div>
                        </div>
                    	<div class="progress">
							<div style="width: 0;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="'.$percent.'" role="progressbar" class="progress-bar progress-bar-item">
    							<span class="sr-only">'.sprintf(__( ' %s%% Complete', 'cosmone'), $percent ).'</span>
                        	</div>
                        </div>
                	</div>                                
           		</div>';
				}
		return $return ;
	 }
   /**
	 * Shortcode: icon 
	 *
	 * @param array $atts Shortcode attributes
	 * @return string Output html
	 * author: quan
	 */
	 
	  function cosmone_icon_shortcode($atts){
	 extract( shortcode_atts( array(
       'name' => 'icon-pencil',
	   'size'  => '',
       'css_class' =>''
        ), $atts ) );
		return '<i class="'.$name.' '.$size.' '.$css_class.'"></i>';
		}
	 
	    /**
	 * Shortcode: timeline (blog & portfolio)
	 *
	 * @param array $atts Shortcode attributes
	 * @return string Output html
	 * author: quan
	 */
	 function cosmone_timeline_shortcode($atts){
	 extract( shortcode_atts( array(
       'num' => '6',
	   'category' =>'',
	   'type'  => 'blog',
	   'style' => '1',
       'css_class' =>''
        ), $atts ) );
		$left_list  = "";
		$right_list = "";
		$excerpt_length = 0;
		if($style == '2'){
		$excerpt_length = 200;
		}
		switch($type){
		case "portfolio":
		$list = cosmone_get_timeline_portfolio_list($category,$num,1,false,$excerpt_length,$style);
		break;
		case "blog":
		default:
	    $list = cosmone_get_timeline_blog_list($category,$num,1,false,$excerpt_length,$style);
		
		break;
		}
		if(isset($list['left_list'])){$left_list = $list['left_list'];}
		if(isset($list['right_list'])){$right_list = $list['right_list'];}
		if(isset($list['paged'])){$paged = $list['paged'];}else{$paged = 1;}
		
		if($style == 2){
		
		$return  = '<div class="timeline-wrapper">
                    <div class="timeline-window timeline-stle2-viewport">
                        <div class="timeline-stick">
                        </div>
                        <div class="timeline-box style2">
                            <div class="timeline-top">'.$left_list.'</div>
                            <div class="timeline-bottom">'.$right_list.'</div>                    	
                        </div>
                    </div>
                    <div class="timeline-page style2">
                        <div class="pre"><a href="javascript:;"><i class="icon-angle-left"></i></a></div>
                        <div class="next"><a href="javascript:;"><i class="icon-angle-right"></i></a></div>
                    </div>
                </div>';
				
		}else{
		$return  = '<div class="timeline-container">';
		$return .= '<div class="timeline-box"><div class="timeline-stick"></div>';
		$return .= '<div class="row">';
        $return .= '<div class="col-md-6 timeline-left">'.$left_list.'</div>';
        $return .= '<div class="col-md-6 timeline-right">'.$right_list.'</div>';                  	
        $return .= '</div></div>';
		$return .= '<p><button class="timeline-load btn-normal" data-cat="'.$category.'" data-num="'.$num.'" data-type="'.$type.'" data-paged="'.$paged.'"><i class="icon-refresh"></i> '.__("Load",'cosmone').'</button></p>';
		$return .= '</div>';
		}
		
		return $return ;
	 }

	 
    /**
	 * Shortcode: button
	 *
	 * @param array $atts Shortcode attributes
	 * @return string Output html
	 * author: quan
	 */
	 function cosmone_button_shortcode($atts, $content = null){
	 extract( shortcode_atts( array(
       'icon' => '',
	   'color' => '',
	   'style' => '1',
	   'link'  => '#',
	   'target' =>'_self',
       'css_class' =>''
        ), $atts ) );
		$icon_str  = "";
		if($style == 2){$css_class = $css_class." style2";}
		if($color != ""){$css_class = $css_class." btn-".$color;}
		if($icon != ""){ $icon_str = '<i class="'.$icon.'"></i> ';}
	  $return  = '<a href="'.$link.'" class="cosmone-btn" target="'.$target.'"><button class="btn-normal '.$css_class .'">'.$icon_str.' '.$content.'</button></a>';
	  return $return ;
	 }
	 
	 /**
	 * Shortcode: List
	 *
	 * @param array $atts Shortcode attributes
	 * @return string Output html
	 * author: quan
	 */
	 
	function cosmone_list_shortcode($atts, $content = null){
	 extract( shortcode_atts( array(
       'icon' => '',
       'css_class' =>''
        ), $atts ) );

		$content = str_replace(array("<p>","</p>","<br>","<br />","<br/>"),"",$content);
		$listArray = explode("\n",$content);
		$icon_str  = "";
		$output    = "";
		if($icon != ""){$css_class = $css_class ." list-icon"; $icon_str = '<i class="'.$icon.'"></i> ';}
		$output .= "<ul class='".$css_class."'>";
		if(isset($listArray) && is_array($listArray)){
		foreach($listArray as $list){
		if($list != ""){
		$space = 0;
		for($i=0;$i<=strlen($list);$i++){
		if($list[$i]==' '){$space = $space+10; }else{ break;}
		}
		if(trim($list) != ""){
		$output .= "<li style='margin-left:".$space."px'>".$icon_str." ".do_shortcode( cosmone_fix_shortcodes($list) )."</li>";
		}
		
		}}}
		$output .= "</ul>";
	
		return $output;
		
		}
		
	 /**
	 * Shortcode: tabs
	 *
	 * @param array $atts Shortcode attributes
	 * @return string Output html
	 * author: quan
	 */
	 
function cosmone_tabs_shortcode($atts, $content = null) {
	
		extract(shortcode_atts(array('active'=>'1','css_class'=>''), $atts));
			$tabs_title = "";
			$panes  = "";
			$active_item  = "";
			$uniqid = uniqid("tab");
			$return = '<div class="tab-box '.$css_class.'">';
			$GLOBALS['tab_count'] = 0;
			do_shortcode(cosmone_fix_shortcodes( $content) );
			if ( is_array( $GLOBALS['tabs'] ) ) {
			$i = 1 ;
			$j = count($GLOBALS['tabs']);
	        if($j < $active) {$active = 1;}
			foreach ( $GLOBALS['tabs'] as $tab ) {
			$is_active    = "";
			$icon_str     = "";			
			$tab_slug = sanitize_title( $tab['title'] );
			if($active == $i){$is_active = "active";$active_item  = 'tab-'.$tab_slug;}
			
			if(isset($tab['icon']) && $tab['icon']!= ""){$icon_str = '<i class="'.$tab['icon'].'"></i> ';}
			
			$tabs_title .= '<li class="'.$is_active.'"><a data-toggle="tab" href="#tab-'.$tab_slug.'">'.$icon_str.' ' . $tab['title'] . '</a></li>';
			$panes      .= '<div class="tab-pane '.$is_active.'" id="tab-'.$tab_slug.'">' . $tab['content'] . '<div class="clear"></div></div>';
			$i++ ;
			}
			$return .= '<ul class="nav nav-tabs" id="'.$uniqid.'">'.$tabs_title.'</ul>';
			
			$return .= '<div class="tab-content">'.$panes.'</div>';
			
			$return .= '</div>';
		
		   }
	
			// Unset globals
			unset( $GLOBALS['tabs'], $GLOBALS['tab_count'] );
	
			return $return;
	}

	function cosmone_tab_shortcode($atts, $content = null) {
		
		extract( shortcode_atts( array( 'title' => 'Tab %d',"icon"=>"" ), $atts ) );
			$x = $GLOBALS['tab_count'];
			$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' => do_shortcode(cosmone_fix_shortcodes( $content) ) ,"icon"=>$icon);
			$GLOBALS['tab_count']++;
	}
	
	
	/**
	 * Shortcode: accordions
	 *
	 * @param array $atts Shortcode attributes
	 * @return string Output html
	 * author: quan
	 */
	function cosmone_accordions_shortcode($atts, $content = null){
	  extract(shortcode_atts(array('active'=>'1',"style"=>"1",'css_class'=>''), $atts));
	
	         $css_class = $css_class." style".$style;
			$return  = '<div class="accordion-box '.$css_class.'" >';
			$GLOBALS['accordion_count'] = 0;
			do_shortcode(cosmone_fix_shortcodes( $content) );
			if ( is_array( $GLOBALS['accordions'] ) ) {
			$i = 1 ;
			$j = count($GLOBALS['accordions']);
	        if($j < $active) {$active = 1;}
			foreach ( $GLOBALS['accordions'] as $accordion ) {
			$is_active    = "icon-angle-down";
			if($style == 2){$is_active = "icon-plus";}
			$css_style    = "display:none;";
			$active_class       = "";
			if($active == $i){$is_active = "icon-angle-right";if($style == 2){$is_active = "icon-minus";}$active_class = "active";$css_style = "display:block;";}
			$return .= '<div class="accordion '.$active_class.'">
                      	<div class="accordion-title">
							<i class="'.$is_active.'"></i>
                          	<h3>'.$accordion["title"].'</h3>
                          
                      	</div>
                      	<div class="accordion-detail" style="'.$css_style.'">' . $accordion['content'] . '</div>
                  	</div>';
			$i++;
			}
			
			}
			
			$return .= "</div>";
			
			// Unset globals
			unset( $GLOBALS['accordions'], $GLOBALS['accordion_count'] );
	return $return;
	}
	function cosmone_accordion_shortcode($atts, $content = null){
	extract( shortcode_atts( array( 'title' => 'Accordion %d',"css_class"=>"" ), $atts ) );
			$x = $GLOBALS['accordion_count'];
			$GLOBALS['accordions'][$x] = array( 'title' => sprintf( $title, $GLOBALS['accordion_count'] ), 'content' => do_shortcode(cosmone_fix_shortcodes( $content) ) ,"css_class"=>$css_class);
			$GLOBALS['accordion_count']++;
			
					
	}
	
	