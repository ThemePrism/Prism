<?php
/**
 * Discussion Extensions
 *
 * @package PrismCoreLibrary
 * @subpackage DiscussionExtensions
 */
 
if ( ! function_exists( 'prism_commentmeta' ))  {
	/**
	 * Create comment meta
	 * 
	 * Located in discussion.php
	 * 
	 * Filter: prism_commentmeta
	 */
	function prism_commentmeta($print = TRUE) {
		$content = '<div class="comment-meta">' . 
					sprintf( _x('Posted %s at %s', 'Posted {$date} at {$time}', 'prism') , 
						get_comment_date(),
						get_comment_time() );

		$content .= ' <span class="meta-sep">|</span> ' . sprintf( '<a href="%1$s" title="%2$s">%3$s</a>', '#comment-' . get_comment_ID() , __( 'Permalink to this comment', 'prism' ), __( 'Permalink', 'prism' ) );
							
		if ( get_edit_comment_link() ) {
			$content .=	sprintf(' <span class="meta-sep">|</span><span class="edit-link"> <a class="comment-edit-link" href="%1$s" title="%2$s">%3$s</a></span>',
						get_edit_comment_link(),
						__( 'Edit comment' , 'prism' ),
						__( 'Edit', 'prism' ) );
			}
		
		$content .= '</div>' . "\n";
			
		return $print ? print(apply_filters('prism_commentmeta', $content)) : apply_filters('prism_commentmeta', $content);

	} // end prism_commentmeta
}

/**
 * Register action hook: prism_abovecomment
 * 
 * Located in discussion.php, at the beginning of the li#comment-[id] element.
 * Note that this is *per comment*
 */
function prism_abovecomment() {
	do_action('prism_abovecomment');
}

/**
 * Register action hook: prism_belowcomment
 * 
 * Located discussion.php, just after the comment reply link.
 * Note that this is *per comment*:
 */
function prism_belowcomment() {
	do_action('prism_belowcomment');
}

?>