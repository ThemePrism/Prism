<?php
/**
 * Dynamic Classes
 *
 * @package PrismCoreLibrary
 * @subpackage DynamicClasses
 */
 
if ( ! function_exists( 'prism_body' ) )  {
	function prism_body() {
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



if ( ! function_exists( 'prism_date_classes' ) )  {
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


/**
 * Echos classes for markup where appropriate
 *
 * @since 1.0
 */

function prism_markup_class( $div = null ){

    $classes = prism_get_markup_class( $div );
    if ( ! empty ( $classes ) ) {  
        echo 'class="'. join( ' ', $classes ) .'"';
    }

}

/**
 * Returns an array of classes for specific divs
 *
 * Filter: prism_markup_class
 *
 * @since 1.0
 */

function prism_get_markup_class ( $div ) {

    $classes = array();

    switch ($div) {
        case 'wrapper':
            $classes[] = 'hfeed';
        break;
    }   
    return apply_filters ( 'prism_markup_class' , $classes, $div );
}

?>