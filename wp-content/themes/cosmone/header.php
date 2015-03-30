<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title('|', true, 'right'); ?></title>
<style type="text/less">
@color-link: #000000 !important;
</style>
<?php wp_head();?>
</head>
<body data-spy="scroll" data-target="#navbar-collapse" <?php body_class("onepage onepage-home"); ?>>

	<div class="site">
    	<!--site header-->
    	<header class="navbar navbar-onex affix" data-spy="affix" role="banner">
        	<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
      				<span class="sr-only"><?php _e("Toggle navigation","cosmone");?></span>
      				<span class="icon-bar"></span>
      				<span class="icon-bar"></span>
     				<span class="icon-bar"></span>
   				</button>
				  <div class="navbar-brand">
                	<a href="<?php echo esc_url(home_url('/')); ?>">
        <?php if ( ot_get_option('logo')!="") { ?>
        <img src="<?php echo ot_get_option('logo'); ?>" alt="<?php bloginfo('name'); ?>" />
        <?php }else{ ?>
        <span class="site-name">
        <?php bloginfo('name'); ?>
        </span>
        <?php }?>
        </a>
	<span class="navbar-brand-tagline blrandtop"><h4 class="brandtop"><?php echo  get_bloginfo( 'description' );?></h4></span>
                </div>
 			</div>
 			<!-- Collect the nav links, forms, and other content for toggling -->
  			<nav class="collapse navbar-collapse main-menu" id="navbar-collapse" role="navigation">
   <?php
   global $publish_sections;
 
  $cosmone_onepage_menu_items = "";
  if($publish_sections > 0){$cosmone_onepage_menu_items = cosmone_onepage_menu_items();}

  if ( has_nav_menu( "home_menu" ) ) {
 wp_nav_menu(array('theme_location'=>'home_menu','depth'=>0,'fallback_cb' =>false,'container'=>'','container_class'=>'main-menu','menu_id'=>'menu-main','menu_class'=>'main-nav','items_wrap'=> '<ul id="%1$s" class="%2$s nav  navbar-nav">'.$cosmone_onepage_menu_items.'%3$s</ul>'));
}
else{
echo '<ul class="nav navbar-nav testobianco">'.$cosmone_onepage_menu_items.'</ul>';
}
?>
            </nav>
            <!-- /.navbar-collapse -->             
        </header>