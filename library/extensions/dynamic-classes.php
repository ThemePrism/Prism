<?php
/**
 * Dynamic Classes
 *
 * @package PrismCoreLibrary
 * @subpackage DynamicClasses
 */
 
if ( function_exists( 'childtheme_override_body' ) )  {
	/**
	 * @ignore
	 */function prism_body() {
		childtheme_override_body();
	}
} else {
	/**
	 * @ignore
	 */function prism_body() {
		prism_bodyopen();
	}
}

/**
 * prism_bodyopen function
 */
function prism_bodyopen() {
    if ( apply_filters( 'prism_show_bodyclass',TRUE ) ) { 
        // Creating the body class
    	echo '<body ';
    	body_class();
    	echo '>' . "\n\n";
    } else {
    	echo '<body>' . "\n\n";
    }
}



if (function_exists('childtheme_override_post_class'))  {
	_deprecated_function( 'childtheme_override_post_class', '1.0.1.3', 'filter post_class()' );
	/**
	 * @ignore
	 */function prism_post_class() {
		childtheme_override_post_class();
	}
} else {
	/**
	 * Generates semantic classes for each post DIV element
	 */
	function prism_post_class( $c ) {
		_deprecated_function( 'prism_post_class', '1.0.1.3', 'filter post_class()' );

		global $post, $prism_post_alt, $prism_content_length, $taxonomy;
	
		// hentry for hAtom compliace, gets 'alt' for every other post DIV, describes the post type and p[n]
		$c = array( 'hentry', "p$prism_post_alt", str_replace( '_', '-', $post->post_type) , $post->post_status );
	
		// Author for the post queried
		$c[] = 'author-' . sanitize_title_with_dashes( strtolower( get_the_author_meta( 'user_login' ) ) );
	
		// Category for the post queried
		foreach ( ( array ) get_the_category() as $cat )
			$c[] = 'category-' . $cat->slug;
		
		// Tags for the post queried; if not tagged, use .untagged
		if ( get_the_tags() == null ) {
			$c[] = 'untagged';
		} else {
			foreach ( ( array ) get_the_tags() as $tag )
				$c[] = 'tag-' . $tag->slug;
		}
		
		if (function_exists('get_post_type_object')) {
			// Taxonomies and terms for the post queried
			$single_post_type = get_post_type_object( get_post_type( $post->ID ) );
			// Check for post types without taxonomy inclusion
			if ( isset($single_post_type->taxonomy) ) {
				foreach ( ( array ) get_the_terms( $post->ID, get_post_taxonomies() )  as $term  )   {
					// Remove tags and categories from results
					if  ( $term->taxonomy != 'category' )	{
						if  ( $term->taxonomy != 'post_tag' )   { 
							$c[] = 'p-tax-' . $term->taxonomy;
							$c[] = 'p-' . $term->taxonomy . '-' . $term->slug;
						}
					}
				}
			}
		}

		// For posts displayed as full content
		if ($prism_content_length == 'full')
			$c[] = 'is-full';

		// For posts displayed as excerpts
		if ($prism_content_length == 'excerpt') {
			$c[] = 'is-excerpt';
			if ( has_excerpt() && !preg_match( '/<!--more(.*?)?-->/', $post->post_content ) ) {
				// For wp-admin Write Page generated excerpts
				$c[] = 'custom-excerpt';
			} else {
				// For automatically generated excerpts
				$c[] = 'auto-excerpt';
			}
		}
		
		// For single posts that had a wp-admin Write Page generated excerpt  
		if ( has_excerpt() && is_single() )
			$c[] = 'has-excerpt';
			
		//	For posts using more tag
		if ( preg_match( '/<!--more(.*?)?-->/', $post->post_content ) ) {	
			if ( !is_single() ) {
				$c[] = 'wp-teaser';
			} elseif ( is_single() ) {
				$c[] = 'has-teaser';
			}
		}
						
		// For posts with comments open or closed
		if ( comments_open() ) {
			$c[] = 'comments-open';		
		} else {
			$c[] = 'comments-closed';
		}
	
		// For posts with pings open or closed
		if (pings_open()) {
			$c[] = 'pings-open';
		} else {
			$c[] = 'pings-closed';
		}
	
		// For password-protected posts
		if ( $post->post_password )
			$c[] = 'protected';
	
		// For sticky posts
		if (is_sticky())
		   $c[] = 'sticky';
	
		// Applies the time- and date-based classes (below) to post DIV
		prism_date_classes( mysql2date( 'U', $post->post_date ), $c );
	
		// If it's the other to the every, then add 'alt' class
		if ( ++$prism_post_alt % 2 )
			$c[] = 'alt';
	
	    // Adds post slug class, prefixed by 'slug-'
	    $c[] = 'slug-' . $post->post_name; 
	
		// And tada!
		return array_unique(apply_filters( 'prism_post_class', $c )); // Available filter: prism_post_class
	}
}
if ( current_theme_supports ( 'prism_legacy_post_class' ) ) {
	add_filter( 'post_class', 'prism_post_class', 20 );
}

/**
 * Define the num val for 'alt' classes (in post DIV and comment LI)
 * 
 * @var int  (default value: 1)
 */
$prism_post_alt = 1;



/** 
 * Adds classes to commment li's using the WordPress comment_class filter
 *
 * @since 1.0
 */
function prism_add_comment_class($classes) {
    global $comment, $post;

    // Add time and date based classes
    prism_date_classes( mysql2date( 'U', $comment->comment_date ), $classes, 'thm-c-' );

    // Do not duplicate values
    return array_unique( $classes );
}

add_filter( 'comment_class', 'prism_add_comment_class', 20 );



if ( function_exists( 'childtheme_override_date_classes' ) )  {
	/**
	 * @ignore
	 */
	function prism_date_classes() {
		childtheme_override_date_classes();
	}
} else {
	/**
	 * Generates time and date based classes relative to GMT (UTC)
	 */
	function prism_date_classes( $t, &$c, $p = '' ) {
		$t = $t + ( get_option('gmt_offset') * 3600 );
		$c[] = $p . 'y' . gmdate( 'Y', $t ); // Year
		$c[] = $p . 'm' . gmdate( 'm', $t ); // Month
		$c[] = $p . 'd' . gmdate( 'd', $t ); // Day
		$c[] = $p . 'h' . gmdate( 'H', $t ); // Hour
	}
}

// Remember: Prism, like The Sandbox, is for play.

?>