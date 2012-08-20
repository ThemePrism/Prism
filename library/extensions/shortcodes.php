<?php
/**
 * Shortcodes
 *
 * A set of shortcodes that get registered with the 
 * WordPress {@link http://codex.wordpress.org/Shortcode_API ShortCode API}.
 *
 * These can be used display information such as attributitive links 
 * for the framework, the active child theme, and more.
 *
 * @package PrismCoreLibrary
 * @subpackage Shortcodes
 *
 * @TODO: remove all references to deprecated function, get_theme_data()
 */


/**
 * Display link to WP.org.
 */
function prism_shortcode_wp_link() {
    return '<a class="wp-link" href="http://WordPress.org/" title="WordPress" rel="generator">WordPress</a>';
}
add_shortcode('wp-link', 'prism_shortcode_wp_link');		  

		  
/**
 * Display link to Prism.
 */
function prism_shortcode_framework_link() {
    $themelink = '<a class="theme-link" href="http://themeprism.com" title="Prism Theme Framework" rel="home">Prism Theme Framework</a>';
    return apply_filters('prism_theme_link',$themelink);
}
add_shortcode('theme-link', 'prism_shortcode_framework_link');	


/**
 * Display link to wp-admin of the site.
 */
function prism_shortcode_login_link() {
    $link = wp_loginout( get_permalink(), FALSE ); 
    return apply_filters('loginout', $link);
}
add_shortcode('loginout-link', 'prism_shortcode_login_link');		  	  


/**
 * Display the site title.
 */
function prism_shortcode_blog_title() {
	return '<span class="blog-title">' . get_bloginfo('name', 'display') . '</span>';
}
add_shortcode('blog-title', 'prism_shortcode_blog_title');


/**
 * Display the site title with a link to the site.
 */
function prism_shortcode_blog_link() {
	return '<a href="' . site_url('/') . '" title="' . esc_attr( get_bloginfo('name', 'display') ) . '" >' . get_bloginfo('name', 'display') . "</a>";
}
add_shortcode('blog-link', 'prism_shortcode_blog_link');


/**
 * Display the current year.
 */
function prism_shortcode_year() {   
    return '<span class="the-year">' . date('Y') . '</span>';
}
add_shortcode('the-year', 'prism_shortcode_year');


/**
 * Display the name of the parent theme.
 */
function prism_shortcode_theme_name() {
    if ( function_exists( 'wp_get_theme' ) ) {
        $frameworkData = wp_get_theme( 'prism' );
        return $frameworkData->display( 'Name', false );
    } else { 
        $frameworkData = get_theme_data(  get_template_directory() . '/style.css' );
        return $frameworkData['Title'];
    }
}
add_shortcode('theme-name', 'prism_shortcode_theme_name');


/**
 * Display the name of the parent theme author.
 */
function prism_shortcode_theme_author() {
    if ( function_exists( 'wp_get_theme' ) ) {
        $frameworkData = wp_get_theme( 'prism' );
        return $frameworkData->display( 'Author', false );
    } else { 
        $frameworkData = get_theme_data(  get_template_directory() . '/style.css' );
        return $frameworkData['Author'];
    }
}
add_shortcode('theme-author', 'prism_shortcode_theme_author');


/**
 * Display the URI of the parent theme.
 */
function prism_shortcode_theme_uri() {
    if ( function_exists( 'wp_get_theme' ) ) {
        $frameworkData = wp_get_theme( 'prism' );
        return $frameworkData->display( 'ThemeURI', false );
    } else { 
        $frameworkData = get_theme_data(  get_template_directory() . '/style.css' );
        return $frameworkData['URI'];
    }
}
add_shortcode('theme-uri', 'prism_shortcode_theme_uri');


/**
 * Display the version no. of the parent theme.
 */
function prism_shortcode_theme_version() {
    if ( function_exists( 'wp_get_theme' ) ) {
        $frameworkData = wp_get_theme( 'prism' );
        return trim( $frameworkData->display('Version', false));
    } else { 
        $frameworkData = get_theme_data(  get_template_directory() . '/style.css' );
        return trim( $frameworkData['Version'] );
    }
}
add_shortcode('theme-version', 'prism_shortcode_theme_version');



/**
 * Display the name of the child theme.
 */
function prism_shortcode_child_name() {
    if ( function_exists( 'wp_get_theme' ) ) {
        $frameworkData = wp_get_theme();
        return $frameworkData->display( 'Name', false );
    } else { 
        $frameworkData = get_theme_data( get_stylesheet_directory() . '/style.css' );
        return $frameworkData['Title'];
    }
}
add_shortcode('child-name', 'prism_shortcode_child_name');


/**
 * Display the name of the child theme author.
 */
function prism_shortcode_child_author() {
    if ( function_exists( 'wp_get_theme' ) ) {
        $frameworkData = wp_get_theme();
        return $frameworkData->display( 'Author', false );
    } else { 
        $frameworkData = get_theme_data( get_stylesheet_directory() . '/style.css' );
        return $frameworkData['Author'];
    }
}
add_shortcode('child-author', 'prism_shortcode_child_author');


/**
 * Display the URI of the child theme.
 */
function prism_shortcode_child_uri() {
    if ( function_exists( 'wp_get_theme' ) ) {
        $frameworkData = wp_get_theme();
        return $frameworkData->display( 'ThemeURI', false );
    } else { 
        $frameworkData = get_theme_data( get_stylesheet_directory() . '/style.css' );
        return $frameworkData['URI'];
    }
}
add_shortcode('child-uri', 'prism_shortcode_child_uri');


/**
 * Display the version no. of the child theme.
 * 
 */
function prism_shortcode_child_version() {
    if ( function_exists( 'wp_get_theme' ) ) {
        $frameworkData = wp_get_theme();
        return trim( $frameworkData->display('Version', false));
    } else { 
        $frameworkData = get_theme_data( get_stylesheet_directory() . '/style.css' );
        return trim( $frameworkData['Version'] );
    }
}
add_shortcode('child-version', 'prism_shortcode_child_version');
