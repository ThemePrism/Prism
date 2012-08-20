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
	echo " ";
	language_attributes();
	echo ">\n";
	
	// Opens the head tag 
	prism_head_profile();
	
	// Create the meta content type
	prism_create_contenttype();
	
	// Create the title tag 
	prism_doctitle();
	
	// Create the meta description
	prism_show_description();
	
	// Create the tag <meta name="robots"  
	prism_show_robots();
	
	// Create pingback adress
	prism_show_pingback();
	
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
			echo ( apply_filters( 'prism_open_header',  '<div id="header">' ) );
    	?>


        	<?php 
				// Action hook creating the theme header
				prism_header();
       		?>
       		
    	<?php  	
    		// Filter provided for altering output of the header closing element
			echo ( apply_filters( 'prism_close_header', '</div><!-- #header-->' ) );
		?>
		        
    	<?php
			// Action hook for placing content below the theme header
			prism_belowheader();
    	?>
    	
	<div id="main">
