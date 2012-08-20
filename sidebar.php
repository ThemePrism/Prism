<?php 
/**
 * Main Sidebar Template
 *
 * …
 * 
 * @package Prism
 * @subpackage Templates
 */

    // action hook for placing content above the main asides
    prism_abovemainasides();

    // action hook creating the primary aside
    prism_widget_area_primary_aside();	
	
    // action hook for placing content between primary and secondary aside
    prism_betweenmainasides();

    // action hook creating the secondary aside
    prism_widget_area_secondary_aside();		
	
    // action hook for placing content below the main asides
    prism_belowmainasides(); 
?>