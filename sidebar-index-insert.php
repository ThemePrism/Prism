<?php 
/**
 * Sidebar Index Insert Template
 *
 * …
 * 
 * @package Prism
 * @subpackage Templates
 */
 
    // action hook for placing content above the 'index-insert' widget area
    prism_aboveindexinsert();

    // action hook creating the 'index-insert' widget area
    prism_widget_area_index_insert();

    // action hook for placing content below the 'index-insert' widget area
    prism_belowindexinsert();
?>