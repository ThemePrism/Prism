<?php 
/**
 * Sidebar 404 Template
 *
 * …
 * 
 * @package Prism
 * @subpackage Templates
 */
 
    // action hook for placing content above the '404-aside' widget area
    prism_above404aside();

    // action hook creating the '404-aside' widget area
    prism_widget_area_404_aside();

    // action hook for placing content below the '404-aside' widget area
    prism_below404aside();
?>