<?php
/**
 * The template for displaying the footer
 */
 global $theme_option; 
?>

<div id="footer" style="<?php if($theme_option['background_footer']){ echo esc_attr( 'background-color: '.$theme_option['background_footer'].';' ); } ?>
 <?php if($theme_option['color_footer']){ echo esc_attr( 'color:'.$theme_option['color_footer'].';' ); } ?>">
	<a class="scroll" href="#home"><div class="back-top">&#xf102;</div></a>	
	<div class="container">
		<div class="sixteen columns">
			<?php echo htmlspecialchars_decode($theme_option['footer_text']); ?>
		</div>
	</div>	
</div>
<?php wp_footer(); ?>
</body>
</html>