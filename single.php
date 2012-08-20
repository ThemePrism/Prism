<?php
/**
 * Single Post Template
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
							
	            // start the loop
	            while ( have_posts() ) : the_post();
    	        
    	        // create the navigation above the content
				prism_navigation_above();
		
    	        // calling the widget area 'single-top'
    	        get_sidebar('single-top');
		
    	        // action hook creating the single post
    	        prism_singlepost();
				
    	        // calling the widget area 'single-insert'
    	        get_sidebar('single-insert');
		
    	        // create the navigation below the content
				prism_navigation_below();
		
       			// action hook for calling the comments_template
    	        prism_comments_template();
    	        
    	        // end the loop
        		endwhile;
		
    	        // calling the widget area 'single-bottom'
    	        get_sidebar('single-bottom');
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