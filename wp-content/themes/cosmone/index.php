<?php
/**
 * The main template file.
 */

 global $publish_sections;
 $count_sections   = wp_count_posts('section');
 $publish_sections = $count_sections->publish;
 $onepage_on_off   = ot_get_option("onepage_on_off");
 if ( ('page' == get_option( 'show_on_front' ) && ( '' != get_option( 'page_for_posts' ) ) && $wp_query->get_queried_object_id() == get_option( 'page_for_posts' )) ||    $publish_sections <= 0 || $onepage_on_off == "off") :
 get_header("site");
 if (have_posts()) :
 ?>
 <div class="blog-onex">
  <div class="container">
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
           <?php cosmone_get_sidebar(1);?>
       </div>
     </div>
   </div>
<?php					

 endif;
   get_footer();
 else:
   get_template_part("template","home");
 endif;
