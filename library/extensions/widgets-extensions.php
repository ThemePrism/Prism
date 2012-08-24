<?php

/**
 * Widgets Extensions
 *
 * @package PrismCoreLibrary
 * @subpackage WidgetsExtensions
 */


/**
 * Displays a filterable Search Form
 *
 * This function is called from the searchform.php template. 
 * That template is called by the WP function get_search_form()
 *
 * Filter: search_field_value Controls the input element's size attribute <br>
 * Filter: prism_search_submit Controls the form's "submit" input element <br>
 * Filters: prism_search_form Controls the entire from output just before display <br>
 *
 * @see Prism_Widget_Search
 * @link http://codex.wordpress.org/Function_Reference/get_search_form Codex: get_search_form()
 */
function prism_search_form( $id = null ) {
	$search_form_length = apply_filters('prism_search_form_length', '32');
	switch( $id ) {
        case '404' :      
			$search_form  = '<form id="error404-searchform" method="get" action="' . home_url() . '/">';
			$search_form .= '	<div>';
			$search_form .= '		<input id="error404-s" class="s" name="s" type="search" value="' . get_search_query() . '" size="' . $search_form_length . '" />';
			$search_form .= '		<input id="error404-searchsubmit" class="searchsubmmit" name="searchsubmit" type="submit" value="' . esc_attr__( 'Find', 'prism' ) . '" />';
			$search_form .= '	</div>';
			$search_form .= '</form>';
			break;
        case 'search-result':
            $search_form .= '<form id="noresults-searchform" method="get" action="' . home_url() . '/">';
			$search_form .= '	<div>';
			$search_form .= '		<input id="noresults-s" class="s" name="s" type="search" value="' . get_search_query() . '" size="' . $search_form_length . '" />';
			$search_form .= '		<input id="noresults-searchsubmit" class="name="searchsubmit" type="submit" value="' . esc_attr__( 'Find', 'prism' ) . '" />';
			$search_form .= '		<input id="noresults-searchsubmit" class="searchsubmmit" name="searchsubmit" type="submit" value="' . esc_attr__( 'Find', 'prism' ) . '" />';
			$search_form .= '	</div>';
			$search_form .= '</form>';
			break;
        default:
            $placeholder = __( 'To search, type and hit enter', 'prism' );
			$placeholder = apply_filters( 'prism_search_field_value',$placeholder );

			$search_form .= '<form class="searchform" method="get" action="' . home_url() .'/">';
			$search_form .= '	<div>';
			$search_form .= '		<input name="s" class="s" type="search" placeholder="' . $placeholder . '" value="' . $placeholder . '" onfocus="if (this.value == \'' . $placeholder . '\') {this.value = \'\';}" onblur="if (this.value == \'\') {this.value = \'' . $placeholder . '\';}" size="'. $search_form_length .'" tabindex="1" />';
			$search_submit = '		<input class="searchsubmit" name="searchsubmit" type="submit" value="' . __('Search', 'prism') . '" tabindex="2" />';
			$search_form .= apply_filters('prism_search_submit', $search_submit);
			$search_form .= '	</div>';
			$search_form .= '</form>';
			break;
    }
	echo apply_filters( 'prism_search_form', $search_form, $id );
}


/**
 * Defines the array for creating and displaying the widgetized areas
 * in the WP-Admin and front-end of the site.
 * 
 * Filter: prism_widgetized_areas
 *
 * @uses prism_before_widget()
 * @uses prism_after_widget()
 * @uses prism_before_title()
 * @uses prism_after_title()
 * @return array
 */
function prism_widgets_array() {
	$prism_widgetized_areas = array(
		'Header Aside' => array(
			'admin_menu_order' => 50,
			'args' => array (
				'name' => __( 'Header Aside', 'prism' ),
				'id' => 'header-aside',
                'description' => __('A widget area in the header.', 'prism'),
				'before_widget' => prism_before_widget(),
				'after_widget' => prism_after_widget(),
				'before_title' => prism_before_title(),
				'after_title' => prism_after_title(),
				),
			'action_hook'	=> 'prism_header',
			'function'		=> 'prism_header_aside',
			'priority'		=> 2
			),
		'Primary Aside' => array(
			'admin_menu_order' => 100,
			'args' => array (
				'name' => __( 'Primary Aside', 'prism' ),
				'id' => 'primary-aside',
                'description' => __('The primary widget area, most often used as a sidebar.', 'prism'),
				'before_widget' => prism_before_widget(),
				'after_widget' => prism_after_widget(),
				'before_title' => prism_before_title(),
				'after_title' => prism_after_title(),
				),
			'action_hook'	=> 'widget_area_primary_aside',
			'function'		=> 'prism_primary_aside',
			'priority'		=> 10,
			),
		'Secondary Aside' => array(
			'admin_menu_order' => 200,
			'args' => array (
				'name' => __( 'Secondary Aside', 'prism' ),
				'id' => 'secondary-aside',
                'description' => __('The secondary widget area, most often used as a sidebar.', 'prism'),
				'before_widget' => prism_before_widget(),
				'after_widget' => prism_after_widget(),
				'before_title' => prism_before_title(),
				'after_title' => prism_after_title(),
				),
			'action_hook'	=> 'widget_area_secondary_aside',
			'function'		=> 'prism_secondary_aside',
			'priority'		=> 10,
			),
		'1st Subsidiary Aside' => array(
			'admin_menu_order' => 300,
			'args' => array (
				'name' => __( '1st Subsidiary Aside', 'prism' ),
				'id' => '1st-subsidiary-aside',
                'description' => __('The 1st widget area in the footer.', 'prism'),
				'before_widget' => prism_before_widget(),
				'after_widget' => prism_after_widget(),
				'before_title' => prism_before_title(),
				'after_title' => prism_after_title(),
				),
			'action_hook'	=> 'widget_area_subsidiaries',
			'function'		=> 'prism_1st_subsidiary_aside',
			'priority'		=> 30,
			),
		'2nd Subsidiary Aside' => array(
			'admin_menu_order' => 400,
			'args' => array (
				'name' => __( '2nd Subsidiary Aside', 'prism' ),
				'id' => '2nd-subsidiary-aside',
                'description' => __('The 2nd widget area in the footer.', 'prism'),
				'before_widget' => prism_before_widget(),
				'after_widget' => prism_after_widget(),
				'before_title' => prism_before_title(),
				'after_title' => prism_after_title(),
				),
			'action_hook'	=> 'widget_area_subsidiaries',
			'function'		=> 'prism_2nd_subsidiary_aside',
			'priority'		=> 50,
			),
		'3rd Subsidiary Aside' => array(
			'admin_menu_order' => 500,
			'args' => array (
				'name' => __( '3rd Subsidiary Aside', 'prism' ),
				'id' => '3rd-subsidiary-aside',
                'description' => __('The 3rd widget area in the footer.', 'prism'),
				'before_widget' => prism_before_widget(),
				'after_widget' => prism_after_widget(),
				'before_title' => prism_before_title(),
				'after_title' => prism_after_title(),
				),
			'action_hook'	=> 'widget_area_subsidiaries',
			'function'		=> 'prism_3rd_subsidiary_aside',
			'priority'		=> 70,
		),
		'404 Aside' => array(
			'admin_menu_order' => 600,
			'args' => array (
				'name' => __( '404 Aside', 'prism' ),
				'id' => '404-aside',
                'description' => __('The widget area displayed beneath the 404 page content.', 'prism'),
				'before_widget' => prism_before_widget(),
				'after_widget' => prism_after_widget(),
				'before_title' => prism_before_title(),
				'after_title' => prism_after_title(),
				),
			'action_hook'	=> 'prism_widget_area_404_aside',
			'function'		=> 'prism_404_aside',
			'priority'		=> 10,
			)
		);
	
	return apply_filters('prism_widgetized_areas', $prism_widgetized_areas);
	
}

/**
 * Registers Widget Areas(Sidebars) and pre-sets default widgets
 *
 * @uses prism_presetwidgets
 * @todo consider deprecating the widgets directory search this seems to have never been used
 */
function prism_widgets_init() {

	$prism_widgetized_areas = prism_widgets_array();
	foreach ( $prism_widgetized_areas as $key => $value ) {
		register_sidebar( $prism_widgetized_areas[$key]['args'] );
	}  
	
	// Remove WP default Widgets
	// WP 2.8 function using $widget_class
    unregister_widget( 'WP_Widget_Meta' );
    unregister_widget( 'WP_Widget_Search' );

	// Finished intializing Widgets plugin, now let's load the prism default widgets
	register_widget( 'Prism_Widget_Search' );
	register_widget( 'Prism_Widget_Meta' );
	register_widget( 'Prism_Widget_RSSlinks' );

	// Pre-set Widgets
	$preset_widgets = array (
		'primary-aside'  => array( 'search-2', 'pages-2', 'categories-2', 'archives-2' ),
		'secondary-aside'  => array( 'links-2', 'rss-links-2', 'meta-2' )
		);

    if ( isset( $_GET['activated'] ) ) {
    	prism_presetwidgets();
  		update_option( 'sidebars_widgets', apply_filters('prism_preset_widgets',$preset_widgets ));
  	}

}

add_action( 'widgets_init', 'prism_widgets_init' );

/**
 * Registers action hook.
 *
 * Action Hook: prism_presetwidgets
 */
function prism_presetwidgets() {
	do_action( 'prism_presetwidgets' );
}

if ( ! function_exists( 'prism_init_presetwidgets' ) )  {
	/**
	 * Sets the "pre-set" widgets in options table
	 */
	function prism_init_presetwidgets() {
		update_option( 'widget_search', array( 2 => array( 'title' => '' ), '_multiwidget' => 1 ) );
		update_option( 'widget_pages', array( 2 => array( 'title' => ''), '_multiwidget' => 1 ) );
		update_option( 'widget_categories', array( 2 => array( 'title' => '', 'count' => 0, 'hierarchical' => 0, 'dropdown' => 0 ), '_multiwidget' => 1 ) );
		update_option( 'widget_archives', array( 2 => array( 'title' => '', 'count' => 0, 'dropdown' => 0 ), '_multiwidget' => 1 ) );
		update_option( 'widget_links', array( 2 => array( 'title' => ''), '_multiwidget' => 1 ) );
		update_option( 'widget_rss-links', array( 2 => array( 'title' => ''), '_multiwidget' => 1 ) );
		update_option( 'widget_meta', array( 2 => array( 'title' => ''), '_multiwidget' => 1 ) );
	}
}

add_action( 'prism_presetwidgets', 'prism_init_presetwidgets' );

/**
 * Add wigitized area functions to specific action hooks.
 *
 * @uses prism_widgets_array to get function names and action hooks.
 */
function prism_connect_functions() {

	$prism_widgetized_areas = prism_widgets_array();

	foreach ( $prism_widgetized_areas as $key => $value ) {
		if ( !has_action( $prism_widgetized_areas[$key]['action_hook'], $prism_widgetized_areas[$key]['function'] ) )
			add_action( $prism_widgetized_areas[$key]['action_hook'], $prism_widgetized_areas[$key]['function'], $prism_widgetized_areas[$key]['priority'] );	
	}

}

add_action( 'wp_head', 'prism_connect_functions');


/**
 * Filters the order in which the Widget Areas (Sidebars) will be listed in the WP-Admin/Widgets
 * 
 * It sorts the array generated by prism_widgetized_areas() by [admin_menu_order]
 * allowing for child themes to filter prism_widgetized_areas to control
 * the sidebar list order in the WP-Admin/Widgets.
 * 
 * @see prism_widgetized_areas
 * @param array
 * @return array
 */
function prism_sort_widgetized_areas($content) {
	asort($content);
	return $content;
}
add_filter('prism_widgetized_areas', 'prism_sort_widgetized_areas', 100);


/**
 * Displays the Header Aside
 *
 * @uses prism_before_widget_area
 * @uses prism_after_widget_area
 */
function prism_header_aside() {
	if ( is_active_sidebar( 'header-aside' ) ) {
		echo prism_before_widget_area( 'header-aside' );
		dynamic_sidebar( 'header-aside' );
		echo prism_after_widget_area( 'header-aside' );
	}
}

/**
 * Displays the Primary Aside
 * 
 * @uses prism_before_widget_area
 * @uses prism_after_widget_area
 */
function prism_primary_aside() {	
	global $wp_customize;
	$args =	array(	
			'before_title' 	=> prism_before_title(),
			'after_title' 	=> prism_after_title()
			);
			
	if ( is_active_sidebar( 'primary-aside' ) ) { 
		echo prism_before_widget_area( 'primary-aside' );
		dynamic_sidebar( 'primary-aside' );
		echo prism_after_widget_area( 'primary-aside' );
	// WordPress 3.4
	} elseif ( method_exists ( $wp_customize,'is_preview' ) && $wp_customize->is_preview()  ){ 
		echo prism_before_widget_area( 'primary-aside' );
		the_widget('Prism_Widget_Search', null , $args);
		the_widget('WP_Widget_Pages', null , $args);
		the_widget('WP_Widget_Categories', null , $args);
		the_widget('WP_Widget_Archives', null, $args);
		echo prism_after_widget_area( 'primary-aside' );
	}
}

/**
 * Displays the Secondary Aside 
 *
 * @uses prism_before_widget_area
 * @uses prism_after_widget_area
 */
function prism_secondary_aside() {
	global $wp_customize;
	$args =	array(	
			'before_title' 	=> prism_before_title(),
			'after_title' 	=> prism_after_title()
			);
				
	if ( is_active_sidebar( 'secondary-aside' ) ) {
		echo prism_before_widget_area( 'secondary-aside' );
		dynamic_sidebar( 'secondary-aside' );
		echo prism_after_widget_area( 'secondary-aside' );
	// WordPress 3.4
	} elseif ( method_exists ( $wp_customize,'is_preview' ) && $wp_customize->is_preview()  ){ 
		echo prism_before_widget_area( 'secondary-aside' );
		the_widget('Prism_Widget_RSS', null, $args);
		the_widget('Prism_Widget_Meta', null, $args); 
		echo prism_after_widget_area( 'secondary-aside' );
	}
}

/**
 * Displays the 1st Subsidiary Aside
 *
 * @uses prism_before_widget_area
 * @uses prism_after_widget_area
 */
function prism_1st_subsidiary_aside() {
	if ( is_active_sidebar( '1st-subsidiary-aside' ) ) {
		echo prism_before_widget_area( '1st-subsidiary-aside' );
		dynamic_sidebar( '1st-subsidiary-aside' );
		echo prism_after_widget_area( '1st-subsidiary-aside' );
	}
}

/**
 * Displays the 2nd Subsidiary Aside
 *
 * @uses prism_before_widget_area
 * @uses prism_after_widget_area
 */
function prism_2nd_subsidiary_aside() {
	if ( is_active_sidebar( '2nd-subsidiary-aside' ) ) {
		echo prism_before_widget_area('2nd-subsidiary-aside' );
		dynamic_sidebar( '2nd-subsidiary-aside' );
		echo prism_after_widget_area( '2nd-subsidiary-aside' );
	}
}

/**
 * Displays the 3rd Subsidiary Aside
 *
 * @uses prism_before_widget_area
 * @uses prism_after_widget_area
 */
function prism_3rd_subsidiary_aside() {
	if ( is_active_sidebar( '3rd-subsidiary-aside' ) ) {
		echo prism_before_widget_area('3rd-subsidiary-aside' );
		dynamic_sidebar( '3rd-subsidiary-aside' );
		echo prism_after_widget_area( '3rd-subsidiary-aside' );
	}
}


/**
 * Displays the 404 Aside Aside
 *
 * @uses prism_before_widget_area
 * @uses prism_after_widget_area
 */
function prism_404_aside() {
	if ( is_active_sidebar( '404-aside' ) ) {
		echo prism_before_widget_area( '404-aside' );
		dynamic_sidebar('404-aside');
		echo prism_after_widget_area( '404-aside' );
	}
}


/**
 * Returns the opening CSS markup before the widget area
 *
 * Filter: prism_before_widget_area
 * 
 * @param $hook determines the markup specific to the widget area
 * @return string 
 */
function prism_before_widget_area($hook) {
	$content =  "\n\t\t";
	if ( $hook == 'primary-aside' ) {
		$content .= '<aside id="primary" class="aside main-aside">' . "\n\n";
	} elseif ( $hook == 'secondary-aside' ) {
		$content .= '<aside id="secondary" class="aside main-aside">' . "\n\n";
	} elseif ( $hook == '1st-subsidiary-aside' ) {
		$content .= '<aside id="first" class="aside sub-aside">' . "\n\n";
	} elseif ( $hook == '2nd-subsidiary-aside' ) {
		$content .= '<aside id="second" class="aside sub-aside">' . "\n\n";
	} elseif ( $hook == '3rd-subsidiary-aside' ) {
		$content .= '<aside id="third" class="aside sub-aside">' . "\n\n";
	} else {
		$content .= '<aside id="' . $hook . '" class="aside">' ."\n";
	}
	$content .= "\t\t\t" . '<ul class="xoxo">' . "\n\n\t\t\t\t";
	return apply_filters( 'prism_before_widget_area', $content, $hook );
}

/**
 * Returns the closing CSS markup before the widget area
 *
 * Filter: prism_after_widget_area
 * 
 * @param $hook determines the markup specific to the widget area
 * @return string 
 */
function prism_after_widget_area($hook) {
	$content = "\n\t\t\t\t" . '</ul>' ."\n\n\t\t";
	if ( $hook == 'header-aside' ) {
		$content .= '</aside><!-- #header .aside -->' ."\n\n";
	} elseif ( $hook == 'primary-aside' ) {
		$content .= '</aside><!-- #primary .aside -->' ."\n\n";
	} elseif ( $hook == 'secondary-aside' ) {
		$content .= '</aside><!-- #secondary .aside -->' ."\n\n";
	} elseif ( $hook == '1st-subsidiary-aside' ) {
		$content .= '</aside><!-- #first .aside -->' ."\n\n";
	} elseif ( $hook == '2nd-subsidiary-aside' ) {
		$content .= '</aside><!-- #second .aside -->' ."\n\n";
	} elseif ( $hook == '3rd-subsidiary-aside' ) {
		$content .= '</aside><!-- #third .aside -->' ."\n\n";
	} else {
		$content .= '</aside><!-- #' . $hook . ' .aside -->' ."\n\n";
	} 
	return apply_filters( 'prism_after_widget_area', $content, $hook );
}

?>