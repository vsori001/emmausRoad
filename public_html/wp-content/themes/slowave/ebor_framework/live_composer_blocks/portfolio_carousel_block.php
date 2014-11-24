<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Slowave_Portfolio_Carousel_Block" );')
);

class Slowave_Portfolio_Carousel_Block extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Slowave_Portfolio_Carousel_Block';
    var $module_title = 'Portfolio Carousel';
    var $module_icon = 'circle';
    var $module_category = 'Slowave - Carousels';
 
 	// Module Options
    function options() { 
		
		// Get categories
		$cats = get_categories('taxonomy=dslc_projects_cats');
		$cats_choices = array();

		// Generate usable array of categories
		foreach ( $cats as $cat ) {
			$cats_choices[] = array(
				'label' => $cat->name,
				'value' => $cat->cat_ID
			);
		}
		
		
    	// The options array
    	$dslc_options = array(
			
    		array(
    			'label' => 'Posts Amount',
    			'id' => 'amount',
    			'std' => '6',
    			'type' => 'text',
    		),
    		array(
    			'label' => 'Show Which Categories?',
    			'id' => 'categories',
    			'std' => '',
    			'type' => 'checkbox',
    			'choices' => $cats_choices
    		),
    		array(
    			'label' => 'Order By',
    			'id' => 'orderby',
    			'std' => 'date',
    			'type' => 'select',
    			'choices' => array(
    				array(
    					'label' => 'Publish Date',
    					'value' => 'date'
    				),
    				array(
    					'label' => 'Modified Date',
    					'value' => 'modified'
    				),
    				array(
    					'label' => 'Random',
    					'value' => 'rand'
    				),
    				array(
    					'label' => 'Alphabetic',
    					'value' => 'title'
    				),
    				array(
    					'label' => 'Comment Count',
    					'value' => 'comment_count'
    				),
    			)
    		),
    		array(
    			'label' => 'Order',
    			'id' => 'order',
    			'std' => 'DESC',
    			'type' => 'select',
    			'choices' => array(
    				array(
    					'label' => 'Ascending',
    					'value' => 'ASC'
    				),
    				array(
    					'label' => 'Descending',
    					'value' => 'DESC'
    				)
    			)
    		),
    		array(
    			'label' => 'Offset',
    			'id' => 'offset',
    			'std' => '0',
    			'type' => 'text',
    		),
    		array(
    			'label' => 'Button Text',
    			'id' => 'button',
    			'std' => 'See All Work',
    			'type' => 'text',
    			'section' => 'styling',
    			'tab' => 'button'
    		),
    		array(
    			'label' => 'Button Link e.g http://google.com',
    			'id' => 'link',
    			'std' => '#',
    			'type' => 'text',
    			'section' => 'styling',
    			'tab' => 'button'
    		),

    	);

    	// Return the array
    	return apply_filters( 'dslc_module_options', $dslc_options, $this->module_id );

    }
 
 	// Module Output
    function output( $options ) {

    	global $dslc_active;
    	
		if ( $dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) )
			$dslc_is_admin = true;
		else
			$dslc_is_admin = false;

		$this->module_start( $options );
		
		// General args
		$args = array(
			'post_type' => 'dslc_projects',
			'posts_per_page' => $options['amount'],
			'order' => $options['order'],
			'orderby' => $options['orderby'],
			'offset' => $options['offset']
		);

		// Category args
		if ( isset( $options['categories'] ) && $options['categories'] !== '' ) {
			$terms = explode( ' ', $options['categories']);
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'dslc_projects_cats',
					'field' => 'id',
					'terms' => $terms,
					'operator' => 'IN',
				)
			);
		}

		// Do the query
		$block_query = new WP_Query( $args );
	?>
    	
		<div class="owl-portfolio owlcarousel carousel-th black-wrapper">
		    
		    <?php 
		    	if ( $block_query->have_posts() ) : while ( $block_query->have_posts() ) : $block_query->the_post();
		    		
		    		/**
		    		 * Get blog posts by blog layout.
		    		 */
		    		get_template_part('loop/content', 'carouselportfolio');
		    	
		    	endwhile;	
		    	else : 
		    		
		    		/**
		    		 * Display no posts message if none are found.
		    		 */
		    		get_template_part('loop/content','none');
		    		
		    	endif;
		    	wp_reset_query();
		    ?>
		  
		</div>
		
		<?php if( $options['button'] !== '' ) : ?>
		<div class="divide50"></div>
		<div class="text-center"> 
			<a class="btn btn-border-light" href="<?php echo esc_url($options['link']); ?>"><?php echo $options['button']; ?></a> 
		</div>
		<?php endif; ?>
		
	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}