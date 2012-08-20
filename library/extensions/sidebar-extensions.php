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
	
	if ($show)
    	get_sidebar();
	
	return;
} // end prism_sidebar


/* 
 * Main Aside Hooks
 */


/**
 * Register action hook: prism_abovemainasides 
 *
 * Located in sidebar.php
 * Just before the main asides (commonly used as sidebars)
 */
function prism_abovemainasides() {
    do_action('prism_abovemainasides');
}


/**
 * Register action hook: widget_area_primary_aside 
 *
 * Located in sidebar.php
 * Regular hook for primary widget area
 */
function prism_widget_area_primary_aside() {
    do_action('widget_area_primary_aside');
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
    do_action('widget_area_secondary_aside');
}


/**
 * Register action hook: prism_belowmainasides 
 *
 * Located in sidebar.php
 * Just after the main asides (commonly used as sidebars)
 */
function prism_belowmainasides() {
    do_action('prism_belowmainasides');
}


/*
 * Index Aside Hooks
 */


/*	
 * Register action hook: prism_aboveindextop 
 *
 * Located in sidebar-index-top.php
 * Just above the 'index.top' widget area
 */
function prism_aboveindextop() {
	do_action('prism_aboveindextop');
}


/**
 * Register action hook: widget_area_index_top
 *
 * Located in sidebar.php
 * Regular hook for the 'index.top' widget area
 */
function prism_widget_area_index_top() {
    do_action('widget_area_index_top');
}

	
/**
 * Register action hook: prism_belowindextop 
 *
 * Located in sidebar-index-top.php
 * Just below the 'index.top' widget area
 */
function prism_belowindextop() {
    do_action('prism_belowindextop');
}


/**
 * Register action hook: prism_aboveindexinsert 
 *
 * Located in sidebar-index-insert.php
 * Just before the 'index-insert' widget area
 */
function prism_aboveindexinsert() {
    do_action('prism_aboveindexinsert');
}


/**
 * Register action hook: widget_area_index_insert
 * 
 * Located in sidebar-index-insert.php
 * Regular hook for the 'index-insert' widget area
 */
function prism_widget_area_index_insert() {
	do_action('widget_area_index_insert');
}
	
	
/**
 * Register action hook: prism_belowindexinsert 
 *
 * Located in sidebar-index-insert.php
 * Just after the 'index-insert' widget area
 */
function prism_belowindexinsert() {
    do_action('prism_belowindexinsert');
}	


/**
 * Register action hook: prism_aboveindexbottom 
 *
 * Located in sidebar-index-bottom.php
 * Just above the 'index-bottom' widget area
 */
function prism_aboveindexbottom() {
    do_action('prism_aboveindexbottom');
}
	

/**
 * Register action hook: widget_area_index_bottom 
 *
 * Located in sidebar-index-bottom.php
 * Regular hook for the 'index-bottom' widget area
 */	
function prism_widget_area_index_bottom() {
    do_action('widget_area_index_bottom');
}
	
	
/**
 * Register action hook: prism_belowindexbottom 
 *
 * Located in sidebar-index-bottom.php
 * Just below the 'index-bottom' widget area
 */	function prism_belowindexbottom() {
    do_action('prism_belowindexbottom');
}
	
	
/*
 * Single Post Asides
 */


/**
 * Register action hook: prism_abovesingletop 
 *
 * Located in sidebar-single-top.php
 * Just above the 'single-top' widget area
 */
function prism_abovesingletop() {
    do_action('prism_abovesingletop');
}


/**
 * Register action hook: widget_area_single_top 
 *
 * Located in sidebar-single-top.php
 * Regular hook for the 'single-top' widget area
 */
function prism_widget_area_single_top() {
    do_action('widget_area_single_top');
}


/**
 * Register action hook: prism_belowsingletop 
 *
 * Located in sidebar-single-top.php
 * Just below the 'single-top' widget area
 */
function prism_belowsingletop() {
    do_action('prism_belowsingletop');
}
	
	
/**
 * Register action hook: prism_abovesingleinsert 
 *
 * Located in sidebar-single-insert.php
 * Just above the 'single-insert' widget area
 */
function prism_abovesingleinsert() {
    do_action('prism_abovesingleinsert');
}


/**
 * Register action hook: widget_area_single_insert 
 *
 * Located in sidebar-single-insert.php
 * Regular hook for the 'single-insert' widget area
 */
function prism_widget_area_single_insert() {
    do_action('widget_area_single_insert');
}


/**
 * Register action hook: prism_belowsingleinsert 
 *
 * Located in sidebar-single-insert.php
 * Just below the 'single-insert' widget area
 */
function prism_belowsingleinsert() {
    do_action('prism_belowsingleinsert');
}


/**
 * Register action hook: prism_abovesinglebottom 
 *
 * Located in sidebar-single-bottom.php
 * Just above the 'single-bottom' widget area
 */
function prism_abovesinglebottom() {
    do_action('prism_abovesinglebottom');
}


/**
 * Register action hook: widget_area_single_bottom 
 *
 * Located in sidebar-single-bottom.php
 * Regular hook for the 'single-bottom' widget area
 */
function prism_widget_area_single_bottom() {
    do_action('widget_area_single_bottom');
}


/**
 * Register action hook: prism_belowsinglebottom 
 *
 * Located in sidebar-single-bottom.php
 * Just below the 'single-bottom' widget area
 */
function prism_belowsinglebottom() {
    do_action('prism_belowsinglebottom');
}


/*
 * Page Aside Hooks
 */


/**
 * Register action hook: prism_abovepagetop 
 *
 * Located in sidebar-page-top.php
 * Just above the 'page-top' widget area
 */
function prism_abovepagetop() {
    do_action('prism_abovepagetop');
}


/**
 * Register action hook: widget_area_page_top 
 *
 * Located in sidebar-page-top.php
 * Regular hook for the 'page-top' widget area
 */
function prism_widget_area_page_top() {
    do_action('widget_area_page_top');
}


/**
 * Register action hook: prism_belowpagetop 
 *
 * Located in sidebar-page-top.php
 * Just below the 'page-top' widget area
 */
function prism_belowpagetop() {
    do_action('prism_belowpagetop');
} // end prism_belowpagetop


/**
 * Register action hook: prism_abovepagebottom 
 *
 * Located in sidebar-page-bottom.php
 * Just above the 'page-bottom' widget area
 */
function prism_abovepagebottom() {
    do_action('prism_abovepagebottom');
} // end prism_abovepagebottom


/**
 * Register action hook: widget_area_page_bottom 
 *
 * Located in sidebar-page-bottom.php
 * Regular hook for the 'page-bottom' widget area
 */
function prism_widget_area_page_bottom() {
    do_action('widget_area_page_bottom');
} // end widget_area_page_bottom


/**
 * Register action hook: prism_belowpagebottom 
 *
 * Located in sidebar-page-bottom.php
 * Just below the 'page-bottom' widget area
 */
function prism_belowpagebottom() {
    do_action('prism_belowpagebottom');
} // end prism_belowpagebottom	


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
add_action('widget_area_subsidiaries', 'prism_subsidiaryopen', 10);


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
add_action('widget_area_subsidiaries', 'prism_add_before_first_sub',20);

	
/**
 * Register action hook: widget_area_subsidiaries 
 *
 * Located in sidebar-subsidiary.php
 * Regular hook for the subsidiary widget areas
 */
function prism_widget_area_subsidiaries() {
    do_action('widget_area_subsidiaries');
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
add_action('widget_area_subsidiaries', 'prism_add_between_firstsecond_sub',40);


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
add_action('widget_area_subsidiaries', 'prism_add_between_secondthird_sub',60);


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
add_action('widget_area_subsidiaries', 'prism_add_after_third_sub',80);


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
add_action('widget_area_subsidiaries', 'prism_subsidiaryclose', 200);