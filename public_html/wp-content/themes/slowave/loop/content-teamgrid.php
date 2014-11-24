<li id="team-<?php the_ID(); ?>" <?php post_class('item ' . ebor_the_isotope_terms() ); ?>>

	<?php 
		echo '<figure class="icon-overlay medium icn-link"><a href="'. get_permalink() .'">';
		the_post_thumbnail('index'); 
		echo '</a></figure>';
	?>
	
	<div class="image-caption">
		<?php 
			the_title('<h3><a href="'. get_permalink() .'">','</a></h3>'); 
			echo '<span class="meta">'. get_post_meta( $post->ID, '_ebor_the_job_title', true ) .'</span>';
		?>
	</div>
    
</li>