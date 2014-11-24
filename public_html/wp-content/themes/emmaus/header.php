<?php 
	/**
	 * header.php
	 * The header used in Slowave
	 * @author TommusRhodus
	 * @package Slowave
	 * @since 1.0.0
	 */
	 
	$default = get_template_directory_uri() . '/style/images/logo.png'; 
	$logo = get_option('custom_logo', $default);
	if( $logo == '' )
		//$logo = $default;
		$logo = '';
		
	$layout = get_option('site_layout','full-width');
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php echo ( is_home() || is_front_page() ) ? bloginfo('name') : wp_title('| ', true, 'right'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
  
    <link href='http://fonts.googleapis.com/css?family=Montez|Raleway:400,900,800,700,600,500,300,200,100' rel='stylesheet' type='text/css'>
</head>

<body <?php body_class( $layout ); ?>>

<div class="body-wrapper">

  <div class="yamm navbar basic default">
    <div class="navbar-header">
      <div class="container">
      	
      	<div id="shop-dropdown-marker"></div>
      	
        <div class="basic-wrapper"> 
        <a class="btn responsive-menu" data-toggle="collapse" data-target=".navbar-collapse"><i class='icon-menu-1'></i></a> 
        	<?php /*?><a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse"><i class='icon-menu-1'></i></a> <?php */?>
        	<?php /*?><a class="navbar-brand" href="<?php echo home_url(); ?>">
        		
        		<img src="<?php echo $logo; ?>" alt="<?php echo get_option('custom_logo_alt_text'); ?>" class="retina" />
        	</a> <?php */?>
        </div>
        
        <div class="collapse navbar-collapse">
        <?php /*?><div class="collapse navbar-collapse pull-right"><?php */?>
        	<?php
        		if( is_page_template('page_one_pager.php') ){
        		
				    wp_nav_menu( array(
				        'theme_location'    => 'single',
				        'depth'             => 3,
				        'container'         => false,
				        'container_class'   => false,
				        'menu_class'        => 'nav navbar-nav',
				        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				        'walker'            => new ebor_bootstrap_navwalker())
				    );
				
				} else {
					
				    wp_nav_menu( array(
				        'theme_location'    => 'primary',
				        'depth'             => 3,
				        'container'         => false,
				        'container_class'   => false,
				        'menu_class'        => 'nav navbar-nav',
				        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				        'walker'            => new ebor_bootstrap_navwalker())
				    );
					    
				}
			?>
        </div>
        
      </div>
    </div><!--/.nav-collapse --> 
  </div><!--/.navbar -->
  <div class="offset"></div>