
       	<a href="javascript:;">
        	<div class="top" id="back-to-top">
        		<span class="icon-arrow-up"></span>
            	<span><?php _e("TOP","cosmone");?></span>
        	</div>
        </a>

        <footer class="site-footer text-center">
            <div class="site-sns-box">
			<?php
			$sns_list_items = ot_get_option( 'sns_list_item' ); 
			 if(is_array($sns_list_items) && !empty($sns_list_items)):
             foreach($sns_list_items as $sns_list_item){
			?>
                <a target="_blank" href="<?php echo $sns_list_item["link"];?>"><div class="site-sns"><i class="icon-<?php echo $sns_list_item["sns"];?>"></i></div></a>
              <?php } endif;?>
            </div>
            <div class="site-info">
            	<p><?php echo ot_get_option('copyright'); ?></p>
            </div>
        </footer>
	</div>
	<?php wp_footer();?>
	</body>
</html>