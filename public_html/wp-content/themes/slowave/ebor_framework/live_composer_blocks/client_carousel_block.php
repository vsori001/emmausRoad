<?php 

add_action('dslc_hook_register_modules',
     create_function('', 'return dslc_register_module( "Slowave_Client_Carousel_Block" );')
);

class Slowave_Client_Carousel_Block extends DSLC_Module {
 		
 	// Module Attributes
    var $module_id = 'Slowave_Client_Carousel_Block';
    var $module_title = 'Clients Carousel';
    var $module_icon = 'circle';
    var $module_category = 'Slowave - Carousels';
 
 	// Module Options
    function options() { 
		
		// Get categories
		$cats = get_categories('taxonomy=dslc_partners_cats');
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
				'label' => 'Navigation Bullets',
				'id' => 'pagination',
				'std' => 'false',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => 'Hide Navigation Buttons',
						'value' => 'false'
					),
					array(
						'label' => 'Show Navigation Buttons',
						'value' => 'true'
					),
				)
			),
    		array(
    			'label' => 'Posts Amount',
    			'id' => 'amount',
    			'std' => '10',
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
			'post_type' => 'dslc_partners',
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
					'taxonomy' => 'dslc_partners_cats',
					'field' => 'id',
					'terms' => $terms,
					'operator' => 'IN',
				)
			);
		}

		// Do the query
		$block_query = new WP_Query( $args );
	?>
    	
    	<div class="owl-clients carousel-th" data-pagination="<?php echo $options['pagination']; ?>">
    		<?php 
    			if ( $block_query->have_posts() ) : while ( $block_query->have_posts() ) : $block_query->the_post();
    		?>
    				<div class="item"><?php the_post_thumbnail('full'); ?></div>
    		<?php	
    			endwhile;	
    			endif;
    			wp_reset_query();
    		?>
    	</div>
		
	<?php
    	// REQUIRED
    	$this->module_end( $options );

    }
 
}