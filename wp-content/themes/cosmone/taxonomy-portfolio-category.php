<?php
/**
* The portfolio category file.
*
*/
   get_header("site"); 

?>
<?php if (have_posts()) : ?>
		<div class="portfolio-onex">
        	<div class="container">
        		<div class="breadcrumb-box">
                	<?php cosmone_get_breadcrumb();?>
                </div>
                <section class="portfolio-list-main">
                    <div class="portfolio-list">
                        <div class="row">
                            
                            <?php
							
							while ( have_posts() ) : the_post(); 
							$portfolio_image = "";
							if (has_post_thumbnail( get_the_ID()) ): 
							$thumb = get_the_post_thumbnail( get_the_ID() , "portfolio-thumb" ); 
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
							$portfolio_image = $image[0];
							endif;
							?>
                            <div class="col-sm-6 col-md-3">
                                <figure class="portfolio-list-box">
                                    <div class="portfolio-img-box">
                                       <?php echo $thumb ;?>
                                        <div class="portfolio-info">
                                            <div class="portfolio-link-box">
                                                <a href="<?php echo $portfolio_image;?>" rel="portfolio-image"><div class="portfolio-link"><i class="icon-zoom-in"></i></div></a>
                                                <a href="<?php the_permalink() ;?>"><div class="portfolio-link"><i class="icon-link"></i></div></a>
                                            </div>
                                        </div>
                                    </div>
                                    <figcaption>
                                       <a href="<?php the_permalink() ;?>"> <h3><?php the_title() ;?></h3></a>
                                   
                                           <?php echo '<ul>';
												echo get_the_term_list( $post->ID, 'portfolio-category', '<li>', ',</li><li>', '</li>' );
												echo '</ul>'; ?>
                                       
                                    </figcaption>
                                </figure>
                            </div>
							<?php  endwhile;?>
                        </div>
                        
                    </div>
                    <div class="page-box text-center">
                        <?php if(function_exists("cosmone_native_pagenavi")){cosmone_native_pagenavi("echo",$wp_query);}?>
                    </div>
                </section>
            </div>
        </div>  
<?php
 endif;
 ?>

<?php get_footer();?>