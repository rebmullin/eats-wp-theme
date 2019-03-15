<?php
	/*-----------------------------------------------------------------------------------*/
	/* This file will be referenced every time a template/page loads on your Wordpress site
	/* This is the place to define custom fxns and specialty code
	/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme/
define( 'EATS_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );

/*-----------------------------------------------------------------------------------*/
/* Add post thumbnail/featured image support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );

/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'primary'	=>	__( 'Primary Menu', 'eats' ), // Register the Primary menu
		// Copy and paste the line above right here if you want to make another menu, 
		// just change the 'primary' to another name
	)
);

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/


function eats_scripts()  { 

  // TODO: concatenate the following
	wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Raleway', false );
  wp_enqueue_style('fontello.css', get_stylesheet_directory_uri() . '/iconfont/css/fontello.css', false);
  wp_enqueue_style('fontello-codes.css', get_stylesheet_directory_uri() . '/iconfont/css/fontello-codes.css', false);

	wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/dist/css/style.css');

	// Use minified libraries if SCRIPT_DEBUG is turned off
	// $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

  // TODO: load just lodash debounce?
  wp_enqueue_script( 'header-script', get_template_directory_uri() . '/dist/js/header.js', array('lodash'), EATS_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'eats_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header


function eats_menu_classes($classes, $item, $args) {

  $newClasses = array();
  $isCurrent = in_array('current-menu-item', $classes) || in_array('current_page_parent', $classes);
  
  if($isCurrent ) {
    $newClasses[] = 'eats-nav-list-item--active';
  }
  
  $classes = array(); 
  if($args->theme_location == 'primary') {
    $newClasses[] = 'eats-nav-list-item';
  }
  return $newClasses;
}
add_filter('nav_menu_css_class', 'eats_menu_classes', 1, 3);



function eats_filter_function_name( $atts, $item, $args ) {
    // Manipulate attributes
    if( $args->theme_location == 'primary' ) {
      $atts['class'] = 'eats-nav-link';
    }
    return $atts;
}

add_filter( 'nav_menu_link_attributes', 'eats_filter_function_name', 10, 3 );