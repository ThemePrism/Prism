<?php
/**
 * Header Template
 *
 * This template calls a series of functions that output the head tag of the document.
 * The body and div #main elements are opened at the end of this file. 
 * 
 * @package Prism
 * @subpackage Templates
 */
 
// Create doctype
prism_create_doctype();

// Create the <html> tag with language attributes
prism_create_html();

	// Opens the head tag 
	prism_head_profile();
		
	// Action hook for header meta 
	prism_head();
	
	/* The function wp_head() loads Prism's stylesheet and scripts.
	 * Calling wp_head() is required to provide plugins and child themes
	 * the ability to insert markup within the <head> tag.
	 */
	wp_head();
?>
</head>

<?php 
	// Create the body element and dynamic body classes
	prism_body();

	// Action hook to place content before opening #wrapper
	prism_before(); 
?>
	<?php
		// Filter provided for removing output of wrapping element follows the body tag
		if ( apply_filters( 'prism_open_wrapper', true ) ) 
  		  echo ( '<div id="wrapper" class="hfeed">' );

		// Action hook for placing content above the theme header
		prism_aboveheader(); 
	?>


		<?php
			// Filter provided for altering output of the header opening element
			echo ( apply_filters( 'prism_open_header',  '<header id="site-header">' ) );
    	?>


        	<?php 
				// Action hook creating the theme header
				prism_header();
       		?>
       		
    	<?php  	
    		// Filter provided for altering output of the header closing element
			echo ( apply_filters( 'prism_close_header', '</header><!-- #site-header-->' ) );
		?>
		        
    	<?php
			// Action hook for placing content below the theme header
			prism_belowheader();
    	?>
    	
	<div id="main">
