<?php
/**
 * Comments Template
 *
 * Lists the comments and displays the comments form. 
 * 
 * @package Prism
 * @subpackage Templates
 *
 * @todo chase the invalid counts & pagination for comments/trackbacks
 * @todo remove the PRISM_COMPATIBLE_COMMENT_FORM condition to a legacy function for template berevity
 */
?>
				<?php
					// action hook for inserting content above #comments
					prism_abovecomments() 
				?>
				
				<div id="comments">
	
				<?php 
					// Disable direct access to the comments script
					if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) )
					    die ( __('Please do not load this page directly.', 'prism')  );
					
					// Set required varible from options
					$req = get_option('require_name_email');
					
					// Check post password and cookies
					if ( post_password_required() ) :
				?>
	
					<div class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'prism') ?></div>
				
				</div><!-- #comments -->
	
				<?php 
						return;
					endif; 
				
				?>
	
				<?php if ( have_comments() ) : ?>
	
					<?php
						// Collect the comments and pings
						$prism_comments = $wp_query->comments_by_type['comment'];
						$prism_pings = $wp_query->comments_by_type['pings'];
						
						// Calculate the total number of each
						$prism_comment_count = count( $prism_comments );
						$prism_ping_count = count( $prism_pings );
						
						// Get the page count for each
						$prism_comment_pages = get_comment_pages_count( $prism_comments );
						$prism_ping_pages = get_comment_pages_count( $prism_pings );
						
						// Determine which is the greater pagination number between the two (comment,ping) paginations
						$prism_max_response_pages = ( $prism_ping_pages > $prism_comment_pages ) ? $prism_ping_pages : $prism_comment_pages;
						
						// Reset the query var to use our calculation for the maximum page (newest/oldest)
						if ( $overridden_cpage )
							set_query_var( 'cpage', 'newest' == get_option('default_comments_page') ? $prism_comment_pages : 1 );
					?>
					
					<?php if ( ! empty( $comments_by_type['comment'] ) ) : ?>
							
					<?php
						// action hook for inserting content above #comments-list
						prism_abovecommentslist() ;
					?>

						<?php if ( get_query_var('cpage') <= $prism_comment_pages )  : ?>
					
					<div id="comments-list-wrapper" class="comments">

						<h3><?php printf( $prism_comment_count > 1 ? __( prism_multiplecomments_text(), 'prism' ) : __( prism_singlecomment_text(), 'prism' ), $prism_comment_count ) ?></h3>
	
						<ol id="comments-list" >
							<?php wp_list_comments( prism_list_comments_arg() ); ?>
						</ol>
										
					</div><!-- #comments-list-wrapper .comments -->
					
						<?php endif; ?>
						
					<?php 
						// action hook for inserting content below #comments-list
						prism_belowcommentslist() 
					?>
					
					<?php endif; ?>
					
					<div id="comments-nav-below" class="comment-navigation">
	        		
	        			<div class="paginated-comments-links"><?php paginate_comments_links( 'total=' . $prism_max_response_pages ); ?></div>
	                
	                </div>	
	                	                  
					<?php if ( ! empty( $comments_by_type['pings'] ) ) : ?>
	
					<?php 
						// action hook for inserting content above #trackbacks-list-wrapper
						prism_abovetrackbackslist();
					?>
						
						<?php if ( get_query_var('cpage') <= $prism_ping_pages ) : ?>
						
					<div id="pings-list-wrapper" class="pings">
						
						<h3><?php printf( $prism_ping_count > 1 ? '<span>%d</span> ' . __( 'Trackbacks', 'prism' ) : sprintf( _x( '%1$sOne%2$s Trackback', '%1$ and %2$s are <span> tags', 'prism' ), '<span>', '</span>' ), $prism_ping_count ) ?></h3>
	
						<ul id="trackbacks-list">
							<?php wp_list_comments( 'type=pings&callback=prism_pings' ); ?>
						</ul>				
	
					</div><!-- #pings-list-wrapper .pings -->			
						
						<?php endif; ?>
						
					<?php
						// action hook for inserting content below #trackbacks-list
						prism_belowtrackbackslist();
					?>
									
					<?php endif; ?>

				<?php endif; ?>
							
			<?php
				if ( 'open' == $post->comment_status ) : 
					
					// action hook for inserting content above #commentform
					prism_abovecommentsform();
						
					comment_form( prism_comment_form_args() );

					// action hook for inserting content below #commentform
					prism_belowcommentsform();
								
				endif /* if ( 'open' == $post->comment_status ) */ 
						?>
	
				</div><!-- #comments -->
				
				<?php
					// action hook for inserting content below #comments
					prism_belowcomments()
				?>