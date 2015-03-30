<?php 


//About Video
if(function_exists('vc_map')){
   global $textdomain;
   vc_map( array(
   "name" => __($pre_text."Slider Video"),
   "base" => "slidervideo",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => __("Image Banner", $textdomain),
         "param_name" => "poster",
         "value" => "",
         "description" => __("Upload image banner if not use video.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link video mp4",
         "param_name" => "mp4",
         "value" => "",
         "description" => __("Add link video .mp4", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link video webm",
         "param_name" => "webm",
         "value" => "",
         "description" => __("Add link video .webm", $textdomain)
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link video ogg",
         "param_name" => "ogg",
         "value" => "",
         "description" => __("Add link video .ogg", $textdomain)
      ),     
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text Slider", $textdomain),
         "param_name" => "content",
         "value" => "",
         "description" => __("List text slider.", $textdomain)
      ),
    )
    ));
}

//Moving Background
if(function_exists('vc_map')){
   global $textdomain;
   vc_map( array(
   "name" => __($pre_text."Moving Background Slider"),
   "base" => "movingbg",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => __("Image Moving", $textdomain),
         "param_name" => "poster",
         "value" => "",
         "description" => __("Upload image moving.", $textdomain)
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text Slider", $textdomain),
         "param_name" => "content",
         "value" => "",
         "description" => __("List text slider.", $textdomain)
      ),
    )
    ));
}


//Moving Background
if(function_exists('vc_map')){
   global $textdomain;
   vc_map( array(
   "name" => __($pre_text."Pattern Slider"),
   "base" => "patternbg",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => __("Image Pattern", $textdomain),
         "param_name" => "poster",
         "value" => "",
         "description" => __("Upload image pattern.", $textdomain)
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text Slider", $textdomain),
         "param_name" => "content",
         "value" => "",
         "description" => __("List text slider.", $textdomain)
      ),
    )
    ));
}


// Arrow Down for Revo Slider
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Arrow Down", $textdomain),
   "base" => "arrowdown",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => __("Change Background Button", $textdomain),
         "param_name" => "bg",
         "value" => "",
         "description" => __("", $textdomain)
      ),
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Button text", $textdomain),
         "param_name" => "btntext",
         "value" => "ABOUT AGENCY",
         "description" => __("Button text.", $textdomain)
      ),
	   array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("URL (Link)", $textdomain),
         "param_name" => "link",
         "value" => "#about",
         "description" => __("Button link.", $textdomain)
      ),	  
    )));
}


//Button Slider
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Buttons Slider", $textdomain),
   "base" => "btnslider",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text Button 1", $textdomain),
         "param_name" => "text1",
         "value" => "portfolio",
         "description" => __("", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link Button 1", $textdomain),
         "param_name" => "link1",
         "value" => "#work",
         "description" => __("", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text Button 2", $textdomain),
         "param_name" => "text2",
         "value" => "contact",
         "description" => __("", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link Button 2", $textdomain),
         "param_name" => "link2",
         "value" => "#contact",
         "description" => __("", $textdomain)
      ),
    )));
}

//Button Slider
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Socials Slider", $textdomain),
   "base" => "socslider",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon 1", $textdomain),
         "param_name" => "icon1",
         "value" => "twitter",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link 1", $textdomain),
         "param_name" => "link1",
         "value" => "#",
         "description" => __("Link Social", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon 2", $textdomain),
         "param_name" => "icon2",
         "value" => "facebook",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link 2", $textdomain),
         "param_name" => "link2",
         "value" => "#",
         "description" => __("Link Social", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon 3", $textdomain),
         "param_name" => "icon3",
         "value" => "",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link 3", $textdomain),
         "param_name" => "link3",
         "value" => "#",
         "description" => __("Link Social", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon 4", $textdomain),
         "param_name" => "icon4",
         "value" => "github",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link 4", $textdomain),
         "param_name" => "link4",
         "value" => "#",
         "description" => __("Link Social", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon 5", $textdomain),
         "param_name" => "icon5",
         "value" => "google-plus",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link 5", $textdomain),
         "param_name" => "link5",
         "value" => "#",
         "description" => __("Link Social", $textdomain)
      ),
    )));
}

//About Box
if(function_exists('vc_map')){
   global $textdomain;
   vc_map( array(
   "name" => __($pre_text."About Box"),
   "base" => "aboutbox",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
     array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Icon Box",
         "param_name" => "icon",
         "value" => "",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", $textdomain)
      ),    
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title", $textdomain),
         "param_name" => "title",
         "value" => "",
         "description" => __("Title Box.", $textdomain)
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content", $textdomain),
         "param_name" => "content",
         "value" => "",
         "description" => __("Content Box", $textdomain)
      ),
    )
    ));
}

//About Video
if(function_exists('vc_map')){
   global $textdomain;
   vc_map( array(
   "name" => __($pre_text."About Video or Image"),
   "base" => "aboutvideo",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => __("Image Left", $textdomain),
         "param_name" => "poster",
         "value" => "",
         "description" => __("Upload image left if not use video.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link video mp4",
         "param_name" => "mp4",
         "value" => "",
         "description" => __("Add link video .mp4", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link video webm",
         "param_name" => "webm",
         "value" => "",
         "description" => __("Add link video .webm", $textdomain)
      ), 
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Link video ogg",
         "param_name" => "ogg",
         "value" => "",
         "description" => __("Add link video .ogg", $textdomain)
      ),     
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Text Over Video", $textdomain),
         "param_name" => "textover",
         "value" => "",
         "description" => __("", $textdomain)
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content 1", $textdomain),
         "param_name" => "content1",
         "value" => "",
         "description" => __("Content About", $textdomain)
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content 2", $textdomain),
         "param_name" => "content2",
         "value" => "",
         "description" => __("Content About", $textdomain)
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content 3", $textdomain),
         "param_name" => "content3",
         "value" => "",
         "description" => __("Content About", $textdomain)
      ),
    )
    ));
}


//Our Team
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Our Team", $textdomain),
   "base" => "memberItem",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Name", $textdomain),
         "param_name" => "name",
         "value" => "",
         "description" => __("Member's Name", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Job", $textdomain),
         "param_name" => "job",
         "value" => "",
         "description" => __("Member's job.", $textdomain)
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Avarta",
         "param_name" => "src",
         "value" => "",
         "description" => __("Avarta of member, Recomended Size: 280 x 280", $textdomain)
      ), 
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Icon 1", $textdomain),
         "param_name"=> "icon1",
         "value"     => "twitter",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", $textdomain)
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Url 1",
         "param_name"=> "url1",
         "value"     => "#",
         "description" => __("Url.", $textdomain)
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Icon 2", $textdomain),
         "param_name"=> "icon2",
         "value"     => "facebook",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", $textdomain)
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Url 2",
         "param_name"=> "url2",
         "value"     => "#",
         "description" => __("Url.", $textdomain)
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Icon 3", $textdomain),
         "param_name"=> "icon3",
         "value"     => "github",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", $textdomain)
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Url 3",
         "param_name"=> "url3",
         "value"     => "#",
         "description" => __("Url.", $textdomain)
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Icon 4", $textdomain),
         "param_name"=> "icon4",
         "value"     => "google-plus",
         "description" => __("Find here: <a target='_blank' href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", $textdomain)
      ),
     array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => "Url 4",
         "param_name"=> "url4",
         "value"     => "#",
         "description" => __("Url.", $textdomain)
      ),
    )));
}


//Call To Action
if(function_exists('vc_map')){
   global $textdomain;
   vc_map( array(
   "name" => __($pre_text."Call To Action"),
   "base" => "callto",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
     array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Label Button",
         "param_name" => "btntext",
         "value" => "",
         "description" => __("", $textdomain)
      ),    
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Label Button Hover", $textdomain),
         "param_name" => "btnhover",
         "value" => "",
         "description" => __("", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link Button", $textdomain),
         "param_name" => "link",
         "value" => "#",
         "description" => __("", $textdomain)
      ),
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content", $textdomain),
         "param_name" => "content",
         "value" => "",
         "description" => __("Content Box", $textdomain)
      ),
    )
    ));
}

// Our Facts
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Our Facts", $textdomain),
   "base" => "ourfacts",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title Fact", $textdomain),
         "param_name" => "title",
         "value" => "",
         "description" => __("Title display in Our Facts box.", $textdomain)
      ),
     array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number Fact", $textdomain),
         "param_name" => "number",
         "value" => "",
         "description" => __("Number display in Our Facts box.", $textdomain)
      ),
      
    )));
}


// Slide Show
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text."Slide Show", $textdomain),
   "base" => "slideshow",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      
    )));
}


// Services Box
if(function_exists('vc_map')){
	global $textdomain;
	vc_map( array(
   "name" => __($pre_text."Services Box"),
   "base" => "servicebox",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => "Icon Service",
         "param_name" => "icon",
         "value" => "",
         "description" => __("Find here: <a target='_blank' href='http://html.vegatheme.com/svg-icons/'>http://html.vegatheme.com/svg-icons/</a>", $textdomain)
      ), 	
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title Service", $textdomain),
         "param_name" => "title",
         "value" => "",
         "description" => __("Title display in Services box.", $textdomain)
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content Service", $textdomain),
         "param_name" => "content",
         "value" => "",
         "description" => __("About your Services.", $textdomain)
      ),
    )
    ));
}


// Pricing Table
if(function_exists('vc_map')){
	vc_map( array(
   "name" => __($pre_text." Pricing Table", $textdomain),
   "base" => "pricingtable",
   "class" => "",
   "category" => 'Content',
   "icon" => "icon-st",
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title Pricing", $textdomain),
         "param_name" => "title",
         "value" => "",
         "description" => __("Title display in Pricing Table.", $textdomain)
      ),
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Price Pricing", $textdomain),
         "param_name" => "price",
         "value" => "",
         "description" => __("Price display in Pricing Table.", $textdomain)
      ),
      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Detail Pricing", $textdomain),
         "param_name" => "content",
         "value" => "",
         "description" => __("Content Pricing Table.", $textdomain)
      ),
	  array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Label Button", $textdomain),
         "param_name" => "buttontext",
         "value" => "sign up",
         "description" => __("Text display in button.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link Button", $textdomain),
         "param_name" => "link",
         "value" => "#",
         "description" => __("Link in button.", $textdomain)
      ),
	  array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Featured Pricing?", $textdomain),
         "param_name" => "featured",
         "value" => array(   

                     __('No', $textdomain) => 'no',

                     __('Yes', $textdomain) => 'yes',

                    ),
         "description" => __("", $textdomain)
      ),
    )));
}

//blog
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __($pre_text." Blog Post", $textdomain),
   "base" => "blog",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Label button", $textdomain),
         "param_name" => "btntext",
         "value" => "VIEW ALL",
         "description" => __("Text display in button.", $textdomain)
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("link button", $textdomain),
         "param_name" => "link",
         "value" => "",
         "description" => __("Link button.", $textdomain)
      ),
      
    )));
}

// Portfolio
if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($pre_text."Portfolio", $textdomain),
   "base"      => "portfolio",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
       array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Text Show All Portfolio", $textdomain),
         "param_name"=> "all",
         "value"     => "Show All",
         "description" => __("Text Filter Show All Portfolio.", $textdomain)
      ),
	  array(         
         "type" => "textfield",         
         "holder" => "div",         
         "class" => "",         
         "heading" => "Order by :",         
         "param_name" => "orderby",         
         "value" => "date",         
         "description" => __("Enter Order by. Example: title, date, rand ", $textdomain )      
      ),  
      array(         
         "type" => "textfield",         
         "holder" => "div",         
         "class" => "",         
         "heading" => "Order : ",         
         "param_name" => "order",         
         "value" => "ASC",         
         "description" => __("Enter Order. Example: DESC, ASC ", $textdomain )      
      ),  
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Number Show Portfolio", $textdomain),
         "param_name"=> "show",
         "value"     => "8",
         "description" => __("Number Show Portfolio, Default: 8.", $textdomain)
      ),
    )));
}

//Clients Logo 

if(function_exists('vc_map')){
   vc_map( array(
   "name"      => __($pre_text." Clients Logo", $textdomain),
   "base"      => "clients",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Logo Client",
         "param_name" => "src",
         "value" => "",
         "description" => __("Logo Client, Recomended Size: 156 x 113", $textdomain)
      ), 
           array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link Out Client", $textdomain),
         "param_name" => "link",
         "value" => "",
         "description" => __("Link Out Client.", $textdomain)
      ),
      
    )));
}


//Contact Info
if(function_exists('vc_map')){
	vc_map( array(
   "name"      => __($pre_text."Contact Info", $textdomain),
   "base"      => "cinfo",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Icon", $textdomain),
         "param_name"=> "icon",
         "value"     => "",
         "description" => __("Icon before title info", $textdomain)
      ),
	   array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Title", $textdomain),
         "param_name"=> "title",
         "value"     => "",
         "description" => __("Title info", $textdomain)
      ),
      array(
         "type"      => "textarea",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Description", $textdomain),
         "param_name"=> "desc",
         "value"     => "",
         "description" => __("Description info", $textdomain)
      ),
    )));
}


//Google Map

if(function_exists('vc_map')){
	vc_map( array(
   "name"      => __($pre_text." Maps", $textdomain),
   "base"      => "maps",
   "class"     => "",
   "icon" => "icon-st",
   "category"  => 'Content',
   "params"    => array(
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Text Button Toggle Map", $textdomain),
         "param_name"=> "btntext",
         "value"     => 'Locate Us on Map',
         "description" => __("", $textdomain)
      ),
		array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Latitude", $textdomain),
         "param_name"=> "latitude",
         "value"     => 44.789511,
         "description" => __("", $textdomain)
      ),
	  array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Longitude", $textdomain),
         "param_name"=> "longitude",
         "value"     => 20.43633,
         "description" => __("", $textdomain)
      ),     
	  array(
         "type"      => "attach_images",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Location Image", $textdomain),
         "param_name"=> "imgmap",
         "value"     => "",
         "description" => __("Upload Location Image.", $textdomain)
      ),
      array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Tootip Location Click", $textdomain),
         "param_name"=> "tooltip",
         "value"     => 'Ananke',
         "description" => __("", $textdomain)
      ),
	  array(
         "type"      => "textfield",
         "holder"    => "div",
         "class"     => "",
         "heading"   => __("Zoom map number", $textdomain),
         "param_name"=> "zoommap",
         "value"     => '14',
         "description" => __("", $textdomain)
      ),
    )));
}
 ?>