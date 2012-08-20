<?php
/**
 * Attachments Template
 *
 * Displays singular WordPress Media Library items.
 *
 * @package Prism
 * @subpackage Templates
 *
 * @link http://codex.wordpress.org/Using_Image_and_File_Attachments Codex:Using Attachments
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

	        	// displays the page title
				prism_page_title();

				// action hook for placing content above #post
				prism_abovepost();
			?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> > 

				<?php

	            	// creating the post header
	            	prism_postheader();
	            ?>

					<div class="entry-content">

						<div class="entry-attachment"><?php the_attachment_link( $post->ID, true ) ?></div>

	                        <?php 
	                        	the_content( prism_more_text() );

	                        	wp_link_pages( 'before=<div class="page-link">' . __( 'Pages:', 'prism' ) . '&after=</div>' );
	                        ?>

					</div><!-- .entry-content -->

					<?php
	                	// creating the post footer
	                	prism_postfooter();
	                ?>

				</div><!-- #post -->

	            <?php
					// action hook for placing contentbelow #post
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