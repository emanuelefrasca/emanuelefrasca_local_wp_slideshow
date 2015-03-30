<?php
/**
* The sigle template file.
*
*/
   get_header("site"); 

?>
<?php if (have_posts()) :
		  while ( have_posts() ) : the_post();
		 
		  ?>
<div id="post-<?php the_ID(); ?>" <?php post_class("clear"); ?>>

	 

        <div class="blog-onex">
        	<div class="container">
        		<div class="breadcrumb-box">
				<?php cosmone_get_breadcrumb();?>
                </div>
                <div class="blog-main">
                    <section class="blog-box" role="main">
                        <article class="post-entry">
                    	    <div class="entry-main">
                                <div class="entry-header">
                                    <div class="entry-meta">
                                        <span class="entry-category"><i class="icon-folder-open"></i><?php the_category(', '); ?></span>
                                    </div>
                        	        <h1 class="entry-title"><?php the_title();?></h1>
                            	    <div class="entry-meta">
                                	    <span class="entry-date"><i class="icon-time"></i><?php echo get_the_time("M d, Y"); ?></span> |
                                        <span class="entry-author"><i class="icon-user"></i><?php echo get_the_author_link();?></span> |
                                        <span class="entry-comments"><i class="icon-comments"></i><?php comments_popup_link(  __( 'No comments yet', 'cosmone' ), __( '1 comment ', 'cosmone' ), __( '% comments' , 'cosmone' ), 'comments-link', '');?></span>
								    </div>
                        	    </div>
                       		    <div class="entry-content">
                               <?php 
							   the_content();
							    wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'cosmone' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
							   ?>
							   
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
                    <?php cosmone_get_sidebar(2);?>
                </div>
            </div>
        </div>
		  	
</div>
<?php endwhile;?>
<?php endif;?>
<?php get_footer(); ?>