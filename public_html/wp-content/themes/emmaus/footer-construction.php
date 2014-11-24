<?php 
	/**
	 * footer-construction.php
	 * The footer used the Under Construction Page
	 * @author TommusRhodus
	 * @package Slowave
	 * @since 1.0.0
	 */
?>

<footer class="black-wrapper">
  
	<?php if( is_active_sidebar('footer1') ) : ?>
		<div class="container inner">
		  <div class="row">
		  	
		  	<?php 
		  		/**
		  		 * Get footer widgets depending on active columns
		  		 */
		  		get_template_part('loop/content','footerwidgets'); 
		  	?>
		    
		  </div><!-- /.row --> 
		</div><!-- .container -->
	<?php endif; ?>
    
</footer>
  
</div><!-- /.body-wrapper --> 

<?php wp_footer(); ?>
</body>
</html>