<?php
/*
Template Name: Home Page
*/
get_header();

 $layout_list_items = ot_get_option( 'layout_list_item' ); 
 $i = 0;
  $query = new WP_Query('post_type=section&post_status=publish&orderby=menu_order&posts_per_page=-1');

  if($query->have_posts() ):
	while ($query->have_posts() ) :
    $query->the_post();
    $section_meta = get_post_meta( get_the_ID() ); 
	 
/* if(is_array($layout_list_items)):
 foreach($layout_list_items as $layout_list_item){*/
 $background = "";
 if(isset($section_meta["section_background"][0])){
 if(!is_array($section_meta["section_background"][0])){
 $section_meta["section_background"][0] = unserialize($section_meta["section_background"][0]);
 }
 $background = cosmone_get_background($section_meta["section_background"][0]);
 }
 $short_description = isset($section_meta["short_description"][0])?$section_meta["short_description"][0]:"";
 $sanitize_title    = "";
 $sanitize_title    = sanitize_title(get_the_title());
 
 $menu_slug  = get_post_meta( get_the_ID() ,'menu_slug');
	if(isset($menu_slug[0]) && trim($menu_slug[0]) !=""){
	$sanitize_title  =	trim($menu_slug[0]);
		}
		
 $show_title        = isset($section_meta["show_title"][0])?$section_meta["show_title"][0]:"on";
 $content_full_width_on_off = isset($section_meta["content_full_width_on_off"][0])?$section_meta["content_full_width_on_off"][0]:"on";
 $css_class                  = isset($section_meta['css_class'][0])?$section_meta['css_class'][0]:"";
 $section_title              = isset($section_meta['section_title'][0])?$section_meta['section_title'][0]:get_the_title();
 
 $padding_top                = isset($section_meta['padding_top'][0])?$section_meta['padding_top'][0]:"";
 $padding_bottom             = isset($section_meta['padding_bottom'][0])?$section_meta['padding_bottom'][0]:"";
 $padding_top                = unserialize($padding_top);
 $padding_bottom             = unserialize($padding_bottom);

  if ( is_array($padding_top) && ! empty( $padding_top ) ) {     $background   .= "padding-top:".implode( '', $padding_top ).";"; }
  if ( is_array($padding_bottom) && ! empty( $padding_bottom ) ) {  $background   .= "padding-bottom:" .implode( '', $padding_bottom ).";"; }
 ?>
 <section id="<?php echo $sanitize_title;?>" class="section-onex <?php echo $css_class;?> <?php echo $sanitize_title;?>"  style="<?php echo $background; ?>">
    	<div  class="container">
		<?php if($show_title == "on"){?>
        	<div class="section-title">
			<h1><?php echo $section_title;?></h1>
			</div>
            <?php }?>
			<?php if($short_description != ""){?>
			<p class="section-description"><?php echo do_shortcode(cosmone_fix_shortcodes($short_description));?></p>
			<?php }?>
			<?php if($content_full_width_on_off == "off"){?>
			<div class="section-content">
            <?php the_content();?>
			</div>
			<?php }?>
        </div>
		<?php if($content_full_width_on_off == "on"){?>
		<div class="fullwidth-wrapper">
		<div class="section-content">
		<?php the_content();?>
		</div>
		<div class="clear"></div>
		</div>
		<?php }?>
    </section>
 <?php
 $i++;
 endwhile;
 endif;
  get_footer();