<?php
/**
 * Index Template
 *
 * This file is required by WordPress to recoginze Prism as a valid theme.
 * It is also the default template WordPress will use to display your web site,
 * when no other applicable templates are present in this theme's root directory
 * that apply to the query made to the site.
 * 
 * WP Codex Reference: http://codex.wordpress.org/Template_Hierarchy
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
				
				// create the navigation above the content
            	prism_navigation_above();
				
            	// calling the widget area 'index-top'
            	get_sidebar('index-top');
				
            	// action hook for placing content above the index loop
            	prism_above_indexloop();
				
            	// action hook creating the index loop
            	prism_indexloop();
				
            	// action hook for placing content below the index loop
            	prism_below_indexloop();
				
            	// calling the widget area 'index-bottom'
            	get_sidebar('index-bottom');
				
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