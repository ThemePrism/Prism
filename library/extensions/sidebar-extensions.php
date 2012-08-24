<?php

/**
 * Sidebars Extensions
 *
 * @package PrismCoreLibrary
 * @subpackage SidebarExtensions
 */


/**
 * Get the standard sidebar
 *
 * This includes the primary and secondary widget areas. 
 * The sidebar can be switched on or off using prism_sidebar. <br>
 * Default: ON <br>
 * 
 * Filter: prism_sidebar
 */
function prism_sidebar() {
	$show = TRUE;
	$show = apply_filters('prism_sidebar', $show);
	
    // action hook for placing content before the main asides
    prism_beforesidebar();

	if ($show)
    	get_sidebar();

    // action hook for placing content after the main asides
    prism_aftersidebar();
	
	return;
} // end prism_sidebar


/* 
 * Sidebar Hooks
 */

/**
 * Register action hook: prism_beforesidebar 
 *
 * Just before the main sidebar in prism_sidebar()
 * independent of whether the sidebar is called or not
 */
function prism_beforesidebar() {
    do_action('prism_beforesidebar');
}

/**
 * Register action hook: prism_aftersidebar 
 *
 * Just after the main sidebar in prism_sidebar()
 * independent of whether the sidebar is called or not
 */
function prism_aftersidebar() {
    do_action('prism_aftersidebar');
}

/* 
 * Main Aside Hooks
 */

/**
 * Register action hook: prism_abovemainasides 
 *
 * Located in sidebar.php
 * Just above the main asides (commonly used as sidebars)
 */
function prism_abovemainasides() {
    do_action('prism_abovemainasides');
}


/**
 * Register action hook: prism_widget_area_primary_aside 
 *
 * Located in sidebar.php
 * Regular hook for primary widget area
 */
function prism_widget_area_primary_aside() {
    do_action('prism_widget_area_primary_aside');
}


/**
 * Register action hook: prism_betweenmainasides 
 *
 * Located in sidebar.php
 * Between the main asides (commonly used as sidebars)
 */
function prism_betweenmainasides() {
    do_action('prism_betweenmainasides');
}


/**
 * Register action hook: widget_area_secondary_aside 
 *
 * Located in sidebar.php
 * Regular hook for secondary widget area
 */
function prism_widget_area_secondary_aside() {
    do_action('prism_widget_area_secondary_aside');
}


/**
 * Register action hook: prism_belowmainasides 
 *
 * Located in sidebar.php
 * Just below the main asides (commonly used as sidebars)
 */
function prism_belowmainasides() {
    do_action('prism_belowmainasides');
}



/*
 * 404 Aside Hooks
 */


/*	
 * Register action hook: prism_above404aside 
 *
 * Located in sidebar-404.php
 * Just above the '404-aside' widget area
 */
function prism_above404aside() {
	do_action('prism_above404aside');
}


/**
 * Register action hook: widget_area_index_top
 *
 * Located in sidebar-404.php
 * Regular hook for the '404-aside' widget area
 */
function prism_widget_area_404_aside() {
    do_action('prism_widget_area_404_aside');
}

	
/**
 * Register action hook: prism_below404aside 
 *
 * Located in sidebar-404.php
 * Just below the '404-aside' widget area
 */
function prism_below404aside() {
    do_action('prism_below404aside');
}


/*
 * Subsidiary Aside Hooks
 */

/**
 * Register action hook: prism_abovesubasides 
 *
 * Located in sidebar-subsidiary.php
 * Just above the subsidiary widget areas
 */
function prism_abovesubasides() {
    do_action('prism_abovesubasides');
}


/**
 * Register action hook: prism_belowsubasides 
 *
 * Located in sidebar-subsidiary.php
 * Just below the subsidiary widget areas
 */
function prism_belowsubasides() {
    do_action('prism_belowsubasides');
}


/**
 * Open the #subsidiary div
 * 
 * Will only display if there is a widget in one of the subsidiary asides
 */
function prism_subsidiaryopen() {
    if ( is_active_sidebar('1st-subsidiary-aside') || is_active_sidebar('2nd-subsidiary-aside') || is_active_sidebar('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget ?>
        
        <div id="subsidiary">
        
    <?php
    }
}
add_action('prism_widget_area_subsidiaries', 'prism_subsidiaryopen', 10);


/**
 * Register action hook: prism_before_first_sub 
 *
 * Is only available if there is a widget in one of the subsidiary asides
 */
function prism_before_first_sub() {
    do_action('prism_before_first_sub');
}


/**
 * Add the prism_before_first_sub hook within the #subsidiary div
 *
 * Will only add the hook if there is a widget in one of the subsidiary asides
 */
function prism_add_before_first_sub() {
    if ( is_active_sidebar('1st-subsidiary-aside') || is_active_sidebar('2nd-subsidiary-aside') || is_active_sidebar('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget
        prism_before_first_sub();
    }
}
add_action('prism_widget_area_subsidiaries', 'prism_add_before_first_sub',20);

	
/**
 * Register action hook: widget_area_subsidiaries 
 *
 * Located in sidebar-subsidiary.php
 * Regular hook for the subsidiary widget areas
 */
function prism_widget_area_subsidiaries() {
    do_action('prism_widget_area_subsidiaries');
}


/**
 * Register action hook: prism_between_firstsecond_sub 
 *
 * Is only available if there is a widget in one of the subsidiary asides
 */
function prism_between_firstsecond_sub() {
    do_action('prism_between_firstsecond_sub');
}


/**
 * Add the prism_between_firstsecond_sub hook within the #subsidiary div
 *
 * Will only add the hook if there is a widget in one of the subsidiary asides
 */
function prism_add_between_firstsecond_sub() {
    if ( is_active_sidebar('1st-subsidiary-aside') || is_active_sidebar('2nd-subsidiary-aside') || is_active_sidebar('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget
        prism_between_firstsecond_sub();
    }
}
add_action('prism_widget_area_subsidiaries', 'prism_add_between_firstsecond_sub',40);


/**
 * Register action hook: prism_between_secondthird_sub 
 *
 * Is only available if there is a widget in one of the subsidiary asides
 */
function prism_between_secondthird_sub() {
    do_action('prism_between_secondthird_sub');
}


/**
 * Add the prism_between_secondthird_sub hook within the #subsidiary div
 *
 * Will only add the hook if there is a widget in one of the subsidiary asides
 */
function prism_add_between_secondthird_sub() {
    if ( is_active_sidebar('1st-subsidiary-aside') || is_active_sidebar('2nd-subsidiary-aside') || is_active_sidebar('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget
        prism_between_secondthird_sub();
    }
}
add_action('prism_widget_area_subsidiaries', 'prism_add_between_secondthird_sub',60);


/**
 * Register action hook: prism_after_third_sub 
 *
 * Is only available if there is a widget in one of the subsidiary asides
 */
function prism_after_third_sub() {
    do_action('prism_after_third_sub');
}	


/**
 * Add the prism_after_third_sub hook within the #subsidiary div
 *
 * Will only add the hook if there is a widget in one of the subsidiary asides
 */
function prism_add_after_third_sub() {
    if ( is_active_sidebar('1st-subsidiary-aside') || is_active_sidebar('2nd-subsidiary-aside') || is_active_sidebar('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget
        prism_after_third_sub();
    }
}
add_action('prism_widget_area_subsidiaries', 'prism_add_after_third_sub',80);


/**
 * Close the #subsidiary div
 * 
 * Will only display if there is a widget in one of the subsidiary asides
 */
function prism_subsidiaryclose() {
    if ( is_active_sidebar('1st-subsidiary-aside') || is_active_sidebar('2nd-subsidiary-aside') || is_active_sidebar('3rd-subsidiary-aside') ) { // one of the subsidiary asides has a widget ?>
        
        </div><!-- #subsidiary -->
        
    <?php
    }
}
add_action('prism_widget_area_subsidiaries', 'prism_subsidiaryclose', 200);