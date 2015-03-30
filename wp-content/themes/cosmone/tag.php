<?php
/**
* The sigle template file.
*
*/
   get_header("site"); 

?>
<?php
 if (have_posts()) :
 ?>
 <div class="blog-onex">
  <div class="container">
  <div class="breadcrumb-box">
				<?php cosmone_get_breadcrumb();?>
                </div>
   <div class="blog-main">
     <section class="blog-box" role="main">
    <?php
                     while ( have_posts() ) : the_post(); 
					
					    get_template_part("content","article");
					
                    endwhile;
					
					?>
					<div class="page-box text-center">
                            <?php if(function_exists("cosmone_native_pagenavi")){cosmone_native_pagenavi("echo",$wp_query);}?>
                        </div>
					</section>
					<!-- sidebar -->
		
                    <?php cosmone_get_sidebar(7);?>
					</div></div></div>
					<?php
					
                    endif;
?>

<?php get_footer();?>