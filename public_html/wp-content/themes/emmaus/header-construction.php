<?php 
	/**
	 * header-construction.php
	 * The header used for the under construction page
	 * @author TommusRhodus
	 * @package Slowave
	 * @since 1.0.0
	 */
	 
	$default = get_template_directory_uri() . '/style/images/logo.png'; 
	$logo = get_option('custom_logo', $default);
	if( $logo == '' )
		$logo = $default;
		
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