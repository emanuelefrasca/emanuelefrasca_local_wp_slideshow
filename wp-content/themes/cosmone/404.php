<?php
/**
 * The template for displaying 404 pages (Not Found).
 */

get_header(); ?>

<section class="page-onex">
        	<div class="container">
        		<div class="breadcrumb-box">
         <?php cosmone_get_breadcrumb();?>
                </div>
                <div class="page-content text-center">
                    <h2><?php echo ot_get_option('not_found_title'); ?></h2>
                    <p><?php echo do_shortcode(ot_get_option('not_found_content')); ?></p>
                </div>
            </div>  
        </section>
		
<!--main_content-->
<?php get_footer(); ?>
