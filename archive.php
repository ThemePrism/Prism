<?php
/**
 * Archive Template 
 *
 * Displays an Archive index of post-type items. Other more specific archive templates 
 * may override the display of this template for example the category.php.
 *
 * @package Prism
 * @subpackage Templates
 *
 * @link http://codex.wordpress.org/Template_Hierarchy Codex: Template Hierarchy
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

        	// action hook for placing content above the archive loop
        	prism_above_archiveloop();

			// action hook creating the archive loop
			prism_archiveloop();

        	// action hook for placing content below the archive loop
        	prism_below_archiveloop();

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