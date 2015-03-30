<?php
/**
* The page template file.
*
*/
   get_header("site"); 

?>
<div id="post-<?php the_ID(); ?>" <?php post_class("clear"); ?>>

	  <?php if (have_posts()) :?>
          <?php	
		  while ( have_posts() ) : the_post();
		 $sidebar = get_post_meta( get_the_ID(),"sidebar" ,true);
		 $section_style = "";
		 $article_style = "";
		 if($sidebar == "no"){
		 $section_style = "padding:0;margin:auto 0;";
		 $article_style = " border-top:none;";
		 }
		 $page_background = get_post_meta(  get_the_ID(),"page_background" ,true); 
		 $background = cosmone_get_background($page_background);
		  ?>

        <div class="blog-onex" style=" <?php echo $background; ?>">
        	<div class="container">
        		<div class="breadcrumb-box">
				<?php cosmone_get_breadcrumb();?>
                </div>
                <div class="blog-main">
                    <section class="blog-box" role="main" style=" <?php echo $section_style;?>">
                        <article class="page-entry" style=" <?php echo $article_style;?>">
                    	    <div class="entry-main">
                                <div class="entry-header">
                                    
                        	        <h1 class="entry-title"><?php the_title();?></h1>
                            	    
                        	    </div>
                       		    <div class="entry-content">
                               <?php
							    the_content();
							   wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'cosmone' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
							   ?>
							   <div class="clear"></div>
                                </div>
                        	    <div class="entry-footer">
                            	    <div class="entry-meta">
                                	    <div class="entry-tags">
										    <?php
									if(get_the_tag_list()) {
										echo get_the_tag_list('<ul><li>','</li><li>','</li></ul>');
									}
                        ?>
                                        </div>
                                        <div class="entry-share">
                                    	    <!--<a href="#"><i class="icon-share"></i> Share</a>-->
                                        </div>								
								    </div>
                                </div>
                            </div>
                        </article>
                        <div class="comments-area">
                        	      <?php
     

	echo '<div class="comment-wrapper">';
	comments_template(); 
	echo '</div>';

?>      
                        </div>
                    </section>
                    <?php 
					
					if( $sidebar !="no" ){
					cosmone_get_sidebar(3);
					}
					?>
                </div>
            </div>
        </div>
		  	<?php endwhile;?>
            <?php endif;?>
</div>

<?php get_footer(); ?>