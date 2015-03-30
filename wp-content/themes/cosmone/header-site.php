<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title('|', true, 'right'); ?></title>
<?php wp_head();?>
</head>
<body data-spy="scroll" data-target="#navbar-collapse" <?php body_class("onepage"); ?>>

	 <div class="site-blog">
    	<!--site header-->
    	<header class="navbar navbar-onex" role="banner">
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
   <span class="navbar-brand-tagline"><?php echo  get_bloginfo( 'description' );?></span>
                </div>


   				
 			</div>
 			<!-- Collect the nav links, forms, and other content for toggling -->
  			<nav class="collapse navbar-collapse main-menu" id="navbar-collapse" role="navigation">
    <?php wp_nav_menu(array('theme_location'=>'primary','depth'=>0,'fallback_cb' =>false,'container'=>'','container_class'=>'main-menu','menu_id'=>'menu-main','menu_class'=>'main-nav','link_before' => '<span>', 'link_after' => '</span>','items_wrap'=> '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>'));?>
            </nav>
            <!-- /.navbar-collapse -->             
        </header>