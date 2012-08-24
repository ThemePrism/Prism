<?php
/**
 * Search Template
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
	            // action hook for inserting contentabove #content
				prism_abovecontent();
		
				// filter for manipulating the element that wraps the content 
				echo apply_filters( 'prism_open_id_content', '<div id="content">' . "\n\n" );
							
				if (have_posts()) {
	
	                // displays the page title
	                prism_page_title();
	
	                // create the navigation above the content
	                prism_navigation_above();
				
	                // action hook for placing content above the search loop
	                prism_above_searchloop();			
	
	                // action hook creating the search loop
	                prism_searchloop();
	
	                // action hook for placing content below the search loop
	                prism_below_searchloop();			
	
	                // create the navigation below the content
	                prism_navigation_below();
	
	            } else {
	            
	            	// action hook for inserting content above #post
	           		prism_abovepost();
	           ?>

					<div id="post-0" class="post noresults">
						
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'prism' ) ?></h1>
						
						<div class="entry-content">
							
							<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'prism' ) ?></p>
						
						</div><!-- .entry-content -->
						
						<?php prism_search_form( 'search-result' ) ?>
					
					</div><!-- #post -->
		
		            <?php
	            	// action hook for inserting content below #post
	            	prism_belowpost();
	            }
	            ?>
	            
			</div><!-- #content -->
			
			<?php 
				// action hook for inserting content below #content
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