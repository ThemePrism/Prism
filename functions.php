<?php
/**
 * Theme Functions
 *
 * This file is used by WordPress to initialize the theme.
 * Prism is designed to be used as a theme framework and this file should not be modified.
 * You should use a Child Theme to make your customizations. A sample child theme is provided
 * as an example in root directory of this theme. You can move it into the wp-content/themes to
 * enable activation of the child theme. <br>
 *
 * Reference:  {@link http://codex.wordpress.org/Child_Themes Codex: Child Themes}
 * 
 * @package Prism
 * @subpackage ThemeInit
 */


/**
 * Registers action hook: prism_init 
 * 
 * @since Prism 1.0
 */
function prism_init() {
	do_action('prism_init');
}


/**
 * prism_theme_setup 
 *
 * @since Prism 1.0
 */
if ( ! function_exists( 'prism_theme_setup' ) ) {
	/**
	 * prism_theme_setup
	 *
	 * @todo review for impact of deprecations on child themes & fix comment blocks?
	 * @since Prism 1.0?
	 */
	function prism_theme_setup() {
		global $content_width;

		/**
		 * Set the content width based on the theme's design and stylesheet.
		 *
		 * Used to set the width of images and content. Should be equal to the width the theme
		 * is designed for, generally via the style.css stylesheet.
		 *
		 * @since Prism 1.0
		 */
		if ( !isset($content_width) )
			$content_width = 540;

		// Check for MultiSite
		define( 'PRISM_MB', is_multisite()  );

		// Create the feedlinks
		add_theme_support( 'automatic-feed-links' );
 
		if ( apply_filters( 'prism_post_thumbs', true ) )
			add_theme_support( 'post-thumbnails' );
 
		add_theme_support( 'prism_superfish' );

		// Path constants
		define( 'PRISM_LIB',  get_template_directory() .  '/library' );

		// Load required files
		$required = array ( 
							'/extensions/comments-extensions.php',  // Load custom Comments filters
							'/extensions/content-extensions.php',  // Load custom content filters
							'/extensions/discussion.php',  // Load the Comments Template functions and callbacks
							'/extensions/discussion-extensions.php',  // Load custom discussion filters
							'/extensions/dynamic-classes.php',  // Add Dynamic Contextual Classes
							'/extensions/footer-extensions.php',  // Load custom footer hooks
							'/extensions/header-extensions.php', // Load custom header extensions
							'/extensions/helpers.php',  // Need a little help from our helper functions
							'/extensions/sidebar-extensions.php',  // Load custom sidebar hooks						
							'/extensions/theme-options.php', // Create Theme Options Page				
							'/extensions/widgets.php', // Load widgets
							'/extensions/widgets-extensions.php',  // Load custom Widgets
							);

		foreach ( $required as $require ) {
			require_once ( PRISM_LIB . $require );
		}

		// Adds filters for the description/meta content in archive templates
		add_filter( 'archive_meta', 'wptexturize' );
		add_filter( 'archive_meta', 'convert_smilies' );
		add_filter( 'archive_meta', 'convert_chars' );
		add_filter( 'archive_meta', 'wpautop' );

		// Remove the WordPress Generator
 		if ( apply_filters( 'prism_hide_generators', true ) )
 			add_filter( 'the_generator', '__return_false' );
 
		// Translate, if applicable
		load_theme_textdomain( 'prism', PRISM_LIB . '/languages' );

	}
}

add_action('after_setup_theme', 'prism_theme_setup', 10);


/**
 * Registers action hook: prism_child_init
 * 
 * @since Prism 1.0
 */
function prism_child_init() {
	do_action('prism_child_init');
}

add_action('after_setup_theme', 'prism_child_init', 20);


if ( ! function_exists( 'prism_init_navmenu' ) )  {
	/**
	 * Register primary nav menu
	 * 
	 * Filter: prism_primary_menu_id
	 * Filter: prism_primary_menu_name
	 */
    function prism_init_navmenu() {
		register_nav_menu( apply_filters('prism_primary_menu_id', 'primary-menu'), apply_filters('prism_primary_menu_name', __( 'Primary Menu', 'prism' ) ) );
	}
}
add_action('init', 'prism_init_navmenu');