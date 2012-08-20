<?php
/**
 * Tag Archive Template
 *
 * …
 * 
 * @package Prism
 * @subpackage Templates
 */


    // calling the header.php
    get_header();

    // action hook for placing content above #container
    prism_abovecontainer();
?>

		<div id="container">
		
			<?php
				// action hook for placing content above #content
				prism_abovecontent();

				// filter for manipulating the element that wraps the content 
				echo apply_filters( 'prism_open_id_content', '<div id="content">' . "\n\n" );
			
				// displays the page title
	            prism_page_title();
	
	            // create the navigation above the content
	            prism_navigation_above();
				
	            // action hook for placing content above the tag loop
	            prism_above_tagloop();		
	
	            // action hook creating the tag loop
	            prism_tagloop();
	
	            // action hook for placing content below the tag loop
	            prism_below_tagloop();
	
	            // create the navigation below the content
	            prism_navigation_below();
			?>
	
			</div><!-- #content -->
			
			<?php 
				// action hook for placing content below #content
				prism_belowcontent();
			?>
						
		</div><!-- #container -->
	
<?php 
    // action hook for placing content below #container
    prism_belowcontainer();

    // calling the standard sidebar 
    prism_sidebar();
    
    // calling footer.php
    get_footer();
?>