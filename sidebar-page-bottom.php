<?php
/**
 * Sidebar Page Bottom Template
 *
 * …
 * 
 * @package Prism
 * @subpackage Templates
 */

    // action hook for placing content above the 'page-bottom' widget area
    prism_abovepagebottom();

    // action hook for creating the 'page-bottom' widget area
    prism_widget_area_page_bottom();

    // action hook for placing content below the 'page-bottom' widget area
    prism_belowpagebottom();
?>