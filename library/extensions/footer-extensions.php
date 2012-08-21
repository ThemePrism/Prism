<?php
/**
 * Footer Extensions
 *
 * @package PrismCoreLibrary
 * @subpackage FooterExtensions
 */
 
/**
 * Register action hook: prism_abovemainclose
 * 
 * Located in footer.php, just before the closing of the main div
 */
function prism_abovemainclose() {
    do_action('prism_abovemainclose');
} // end prism_belowmainsidebar


/**
 * Register action hook: prism_abovefooter
 * 
 * Located in footer.php, just before the footer div
 */
function prism_abovefooter() {
    do_action('prism_abovefooter');
} // end prism_abovefooter


/**
 * Register action hook: prism_footer
 * 
 * Located in footer.php, inside the footer div
 */
function prism_footer() {
    do_action('prism_footer');
} // end prism_footer


/**
 * Filter: prism_footertext
 * 
 * The footertext is now set in theme options. This function is obsolete. 
 */
function prism_footertext($thm_footertext) {
    $thm_footertext = apply_filters('prism_footertext', $thm_footertext);
    return $thm_footertext;
} // end prism_footertext


/**
 * Register action hook: prism_belowfooter
 * 
 * Located in footer.php, just after the footer div
 */
function prism_belowfooter() {
    do_action('prism_belowfooter');
} // end prism_belowfooter


/**
 * Register action hook: prism_after
 * 
 * Located in footer.php, just before the closing body tag, after everything else.
 */
function prism_after() {
    do_action('prism_after');
} // end prism_after


if ( ! function_exists('prism_subsidiaries') )  {

	/**
	 * Create the subsidiary widgets areas in footer
	 */
	function prism_subsidiaries() {
	      	
		// action hook for placing content above the subsidiary widget areas
		prism_abovesubasides();
		
		// action hook for creating the subsidiary widget areas
		prism_widget_area_subsidiaries();
		
		// action hook for placing content below subsidiary widget areas
		prism_belowsubasides();
   	}
}

add_action('prism_footer', 'prism_subsidiaries', 10);


if ( ! function_exists( 'prism_siteinfoopen') )  {
	/**
	 * Open the #siteinfo div
	 */
	function prism_siteinfoopen() {
    ?>
    
	<div id="siteinfo">        

   	<?php
   	}
}

add_action('prism_footer', 'prism_siteinfoopen', 20);
  
 
if ( ! function_exists('prism_siteinfo'))  {
	/**
	 * Display the footer text from theme options within the #siteinfo div
	 */
	function prism_siteinfo() {
		// footer text set in theme options
		echo "\t\t" . do_shortcode( prism_get_theme_opt( 'footer_txt' ) ) . "\n";
	}
}

add_action('prism_footer', 'prism_siteinfo', 30);

   
if ( ! function_exists('prism_siteinfoclose') )  {
	/**
	 * Close the #siteinfo div
	 */
	function prism_siteinfoclose() {
    ?>

	</div><!-- #siteinfo -->
	
   	<?php
   	}
}

add_action('prism_footer', 'prism_siteinfoclose', 40);