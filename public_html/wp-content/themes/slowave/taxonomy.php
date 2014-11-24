<?php 
	/**
	 * taxonomy.php
	 * The template for display taxonomy archives Slowave
	 * @author TommusRhodus
	 * @package Slowave
	 * @since 1.0.0
	 */
	get_header(); 
	
	/**
	 * Get Wrapper Start Title - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','starttitle'); 
?>

      <h1><?php echo get_queried_object()->name; ?></h1>
  
<?php
	/**
	 * Get Wrapper End title - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','endtitle'); 

	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start'); 
?>
  
      <div class="portfolio">
		
        <ul class="items col4">
          
          <?php 
          	if ( have_posts() ) : while ( have_posts() ) : the_post();
          		
          		/**
          		 * Get blog posts by blog layout.
          		 */
          		get_template_part('loop/content', 'portfolio');
          	
          	endwhile;	
          	else : 
          		
          		/**
          		 * Display no posts message if none are found.
          		 */
          		get_template_part('loop/content','none');
          		
          	endif;
          ?>
          
        </ul>
        
      </div><!-- /.portfolio --> 

<?php 
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 
	
	get_footer();