<?php

/* sets predefined Post Thumbnail dimensions */

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	
	//default thumbnail size
    add_image_size( 'slide-thumb', 920, 420, true );	
	add_image_size( 'home-portfolio-thumb', 130, 85, true );
    add_image_size( 'portfolio-thumb', 204, 130, true );
	add_image_size( 'blog-thumb', 150, 150, true );
		
};

// NOTE: You need to regenerate all thumbnails if you modified the default thumbnails size
// Regenerate Thumbnails Plugin: http://wordpress.org/extend/plugins/regenerate-thumbnails/

?>