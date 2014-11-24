<?php 
	global $post;
	
	if(get_post_type() == 'dslc_staff'){
	
		$icons = array(
	     	get_post_meta( $post->ID, '_ebor_team_social_icon_1', true ), 
	     	get_post_meta( $post->ID, '_ebor_team_social_icon_2', true ),
	     	get_post_meta( $post->ID, '_ebor_team_social_icon_3', true ), 
	     	get_post_meta( $post->ID, '_ebor_team_social_icon_4', true ),
	     	get_post_meta( $post->ID, '_ebor_team_social_icon_5', true ), 
	     	get_post_meta( $post->ID, '_ebor_team_social_icon_6', true )
	 	);
	 	
	 	$urls = array(
			esc_url(get_post_meta( $post->ID, '_ebor_team_social_icon_1_url', true )), 
			esc_url(get_post_meta( $post->ID, '_ebor_team_social_icon_2_url', true )),
			esc_url(get_post_meta( $post->ID, '_ebor_team_social_icon_3_url', true )), 
			esc_url(get_post_meta( $post->ID, '_ebor_team_social_icon_4_url', true )),
			esc_url(get_post_meta( $post->ID, '_ebor_team_social_icon_5_url', true )), 
			esc_url(get_post_meta( $post->ID, '_ebor_team_social_icon_6_url', true )),
		);
		
	} else {
		
		$icons = array(
		 	get_user_meta( $post->post_author, '_ebor_team_social_icon_1', true ), 
		 	get_user_meta( $post->post_author, '_ebor_team_social_icon_2', true ),
		 	get_user_meta( $post->post_author, '_ebor_team_social_icon_3', true ), 
		 	get_user_meta( $post->post_author, '_ebor_team_social_icon_4', true ),
		 	get_user_meta( $post->post_author, '_ebor_team_social_icon_5', true ), 
		 	get_user_meta( $post->post_author, '_ebor_team_social_icon_6', true )
		);
		
		$urls = array(
			esc_url(get_user_meta( $post->post_author, '_ebor_team_social_icon_1_url', true )), 
			esc_url(get_user_meta( $post->post_author, '_ebor_team_social_icon_2_url', true )),
			esc_url(get_user_meta( $post->post_author, '_ebor_team_social_icon_3_url', true )), 
			esc_url(get_user_meta( $post->post_author, '_ebor_team_social_icon_4_url', true )),
			esc_url(get_user_meta( $post->post_author, '_ebor_team_social_icon_5_url', true )), 
			esc_url(get_user_meta( $post->post_author, '_ebor_team_social_icon_6_url', true )),
		);
		
	}
	
	$urls = array_filter(array_map(NULL, $urls)); 
?>
  
<ul class="social">
   <?php foreach ($urls as $index => $url ) : ?>
   	   <li><a href="<?php echo $url; ?>" target="_blank"><i class="icon-s-<?php echo $icons[$index]; ?>"></i></a></li>
   <?php endforeach; ?>
</ul>