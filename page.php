<?php
/**
 * Page Template
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
				echo apply_filters( 'prism_open_id_content', '<div id="content">' . "\n" );
	
	            // start the loop
	            while ( have_posts() ) : the_post();

				// action hook for placing content above #post
	            prism_abovepost();
	        ?>
    	     		
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> > 

				<?php
	                
	                // creating the post header
	                prism_postheader();
				?>
	                
					<div class="entry-content">
	
						<?php
	                    	the_content();
	                    
	                    	wp_link_pages( "\t\t\t\t\t<div class='page-link'>" . __( 'Pages: ', 'prism' ), "</div>\n", 'number' );
	                    
	                    	edit_post_link( __( 'Edit', 'prism' ), "\n\t\t\t\t\t\t" . '<span class="edit-link">' , '</span>' . "\n" );
	                    ?>

					</div><!-- .entry-content -->
					
				</div><!-- #post -->
	
			<?php
				// action hook for inserting content below #post
	        	prism_belowpost();
	        		        
       			// action hook for calling the comments_template
       			prism_comments_template();
        		
	        	// end loop
        		endwhile;
	        
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