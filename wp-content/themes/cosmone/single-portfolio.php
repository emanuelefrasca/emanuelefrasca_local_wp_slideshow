<?php
/**
* The sigle portfolio template file.
*
*/
   get_header("site"); 

?>
 <?php if (have_posts()) :
		  while ( have_posts() ) : the_post();
		 
		  ?>
<div id="post-<?php the_ID(); ?>" <?php post_class("clear"); ?>>
<div class="portfolio-onex">
        	<div class="container">
        		<div class="breadcrumb-box">
                	<?php cosmone_get_breadcrumb();?>
                </div>
                <article class="portfolio-main">
                    <div class="row">
                        <div class="col-md-6 text-center">
						<?php $portfolio_gallery = get_post_meta( get_the_ID() ,'portfolio_gallery');
						     if($portfolio_gallery && is_array($portfolio_gallery)){
	
							 echo '<div id="portfolio-gallery" class="portfolio-gallery owl-theme">';
							 foreach($portfolio_gallery as $attachment){
							 $attachment_id_arr = explode(",",$attachment);
							 if($attachment_id_arr && is_array($attachment_id_arr)){
							 foreach($attachment_id_arr as $attachment_id){
							  $image_attributes = wp_get_attachment_image_src( $attachment_id, "portfolio-gallery" );
							   echo '<div class="item"><img src="'.$image_attributes[0].'" width="'.$image_attributes[1].'" height="'.$image_attributes[2].'" alt=""/></div>';
							   }
							   }
							  }
							  echo '</div>';
							 }else{
							 $feat_image = wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()), 'portfolio-gallery');
				            if($feat_image ){ 
				              echo $feat_image;
				            }
							 }
						 ?> 



						<!-- <div class="portfolio-page">
                                <i class="icon-circle"></i> 
                                <i class="icon-circle"></i> 
                                <i class="icon-circle"></i>
                            </div>-->
                        </div>
                        <div class="col-md-6 text-left">
                            <h1 class="portfolio-title"><?php the_title();?></h1>
                            <div class="portfolio-content">
                                <?php the_content();?>
                            </div>                          
                        </div>
                    </div>                  
                </article>
            </div>
        </div>
 </div>
 
<?php endwhile;?>
<?php endif;?>
<?php get_footer(); ?>