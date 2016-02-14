<?php

// Define the version as a constant so we can easily replace it throughout the theme
define( 'LESSR_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/* Add Rss to Head
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );


/*-----------------------------------------------------------------------------------*/
/* register main menu
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'primary'	=>	__( 'Primary Menu', 'lessr' ),
	)
);

/*-----------------------------------------------------------------------------------*/
/* Enque Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function lessr_scripts()  { 

	// theme styles
	wp_enqueue_style( 'lessr-style', get_template_directory_uri() . '/style.css', '10000', 'all' );
	wp_enqueue_style( 'lessor-poststyle', get_template_directory_uri() . '/poststyle.css', '1', 'all' );
			
	// add fitvid
	wp_enqueue_script( 'lessr-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), LESSR_VERSION, true );
	
	// add theme scripts
	wp_enqueue_script( 'lessr', get_template_directory_uri() . '/js/theme.min.js', array(), LESSR_VERSION, true );
  
}
add_action( 'wp_enqueue_scripts', 'lessr_scripts' );
