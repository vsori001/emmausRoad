<?php 
	/**
	 * single.php
	 * The single blog post template in Slowave
	 * @author TommusRhodus
	 * @package Slowave
	 * @since 1.0.0
	 */
	get_header(); 
	the_post();	
	
	$width = 'col-sm-8';
		
	/**
	 * Get Wrapper Start Title - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','starttitle'); 
?>
    
      <h1 class="pull-left"><?php echo get_option('staff_title','Our Staff'); ?></h1>
  
<?php
	get_template_part('loop/content','postnav');
	
	/**
	 * Get Wrapper End title - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','endtitle'); 
	
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start'); 
?>
    
  <div class="row">
  	
  	<div class="col-sm-4">
  		<figure>
  			<?php the_post_thumbnail('large'); ?>
  		</figure>
  	</div>
  	
    <div class="<?php echo $width; ?> content">
      <div class="classic-blog single">
      
        <div id="post-<?php the_ID(); ?>" <?php post_class('post format-image'); ?>>
          
          <div class="post-content image-caption">

            <?php 
            	the_title('<h1 class="post-title entry-title">','</h1>'); 
            	get_template_part('loop/content','metapost');
            	the_content(); 
            	wp_link_pages();
            ?>
            
          </div><!-- /.post-content --> 
          
        </div><!-- /.post .format-image --> 
        
      </div>
      
    </div>
    
  </div><!-- /.row --> 
  
<?php 
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 
	
	get_footer();