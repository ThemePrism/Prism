<?php
/**
 * Discussion
 *
 * @package PrismCoreLibrary
 * @subpackage Discussion
 */
 
/**
 * Custom callback function to list comments in the Prism style. 
 * 
 * If you want to use your own comments callback for wp_list_comments, filter list_comments_arg
 *
 * @param object $comment 
 * @param array $args 
 * @param int $depth 
 */
function prism_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
	$GLOBALS['comment_depth'] = $depth;
?>
    
       	<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
    	
    		<?php 
    			// action hook for inserting content above #comment
    			prism_abovecomment();
    		?>
    		
    		<div class="comment-author vcard"><?php prism_commenter_link() ?></div>
    		
    			<?php prism_commentmeta(TRUE); ?>
    		
    			<?php  
    				if ( $comment->comment_approved == '0' ) {
    					echo "\t\t\t\t\t" . '<span class="unapproved">';
    					_e( 'Your comment is awaiting moderation', 'prism' );
    					echo ".</span>\n";
    				}
    			?>
    			
            <div class="comment-content">
            
        		<?php comment_text() ?>
        		
    		</div>
    		
			<?php // echo the comment reply link with help from Justin Tadlock http://justintadlock.com/ and Will Norris http://willnorris.com/
				
				if( $args['type'] == 'all' || get_comment_type() == 'comment' ) :
					comment_reply_link( array_merge( $args, array(
						'reply_text' => __( 'Reply','prism' ), 
						'login_text' => __( 'Log in to reply.','prism' ),
						'depth'      => $depth,
						'before'     => '<div class="comment-reply-link">', 
						'after'      => '</div>'
					)));
				endif;
			?>
			
			<?php
				// action hook for inserting content above #comment
				prism_belowcomment() 
			?>

<?php }

/**
 * Custom callback to list pings in the Prism style
 *
 * @param object $comment 
 * @param array $args 
 * @param int $depth 
 */
function prism_pings($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	?>

    		<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
    			<div class="comment-author"><?php printf(_x('By %1$s on %2$s at %3$s', 'By {$authorlink} on {$date} at {$time}', 'prism'),
    					get_comment_author_link(),
    					get_comment_date(),
    					get_comment_time() );
    					edit_comment_link(__('Edit', 'prism'), ' <span class="meta-sep">|</span>' . "\n\n\t\t\t\t\t\t" . '<span class="edit-link">', '</span>'); ?>
    			</div>
    			
    			<?php 
    				if ($comment->comment_approved == '0') {
    				echo "\t\t\t\t\t" . '<span class="unapproved">';
    					_e( 'Your trackback is awaiting moderation', 'prism' );
    					
    				echo ".</span>\n";
    				}
    			?>
    			
            	<div class="comment-content">
            	
    				<?php comment_text() ?>
    				
				</div>
				

<?php }

