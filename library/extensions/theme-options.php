<?php
/**
 * Prism Theme Options
 *
 * An improved theme options page using the WP Settings API
 * Child themes can use the WP settings api and the filters provided here to 
 * customize their child theme's options and settings validation. <br>
 *
 * For Reference: {@link http://codex.wordpress.org/Creating_an_Archive_Index Codex-Creating an Archive Index}
 *
 * @package PrismCoreLibrary
 * @subpackage ThemeOptions
 */
 
/**
 * Sets default options in database if not pre-existent.
 * Registers with WP settings API, adds a main section with three settings fields.
 * 
 * Override: childtheme_override_opt_init
 *
 * @since Prism 1.0
 */
if (function_exists('childtheme_override_opt_init')) {
	function prism_opt_init() {
		childtheme_override_opt_init();
	}
} else {
	function prism_opt_init() {

		// Retrieve current options from database	
		$current_options = prism_get_wp_opt('prism_theme_opt');
		$legacy_options = prism_convert_legacy_opt();
		
		// If no current settings exist
		if ( false === $current_options )  {
			// Check for legacy options
			if ( false !== ( $legacy_options ) )  {
				// Theme upgrade: Convert legacy to current format and add to database 
				add_option( 'prism_theme_opt', $legacy_options );
			} else {
				// Fresh theme installation: Add default settings to database
				add_option( 'prism_theme_opt', prism_default_opt() );
			}
		}

		register_setting ('prism_opt_group', 'prism_theme_opt', 'prism_validate_opt');
		
		add_settings_section ('prism_opt_section_main', '', 'prism_do_opt_section_main', 'prism_theme_opt');
	
		add_settings_field ('prism_insert_opt', __('Index Insert Position', 'prism')	, 'prism_do_insert_opt'	, 'prism_theme_opt', 'prism_opt_section_main');
		add_settings_field ('prism_auth_opt',   __('Info on Author Page'	, 'prism')	, 'prism_do_auth_opt'	, 'prism_theme_opt', 'prism_opt_section_main');
		add_settings_field ('prism_footer_opt', __('Text in Footer'	, 'prism')		, 'prism_do_footer_opt'	, 'prism_theme_opt', 'prism_opt_section_main');
		
		// Show checkbox option for removing old options from database
		if ( isset( $legacy_options ) && false !== $legacy_options ) {
			add_settings_field ('prism_legacy_opt', __('Remove Legacy Options'	, 'prism'), 'prism_do_legacy_opt'	, 'prism_theme_opt', 'prism_opt_section_main');
		} 
	
	}
}

add_action ('admin_init', 'prism_opt_init');

	
/**
 * A wrapper for get_option that provides WP multi site compatibility.
 *
 * Returns an option's value from wp_otions table in database
 * or returns false if no value is found for that row 
 *
 * @since Prism 1.0
 */
function prism_get_wp_opt( $option_name, $default = false ) {
	global $blog_id;
	
	if (PRISM_MB) {
		$opt = get_blog_option( $blog_id, $option_name, $default );
	} else {
		$opt = get_option( $option_name, $default );
	}
	
	return $opt;
}


/**
 * Returns or echoes a theme option value by its key
 * or returns false if no value is found
 *
 * @uses prism_get_wp_opt()
 * @since Prism 1.0
 */
function prism_get_theme_opt( $opt_key, $echo = false ) {
	
	$theme_opt = prism_get_wp_opt( 'prism_theme_opt' );
	
	if ( isset( $theme_opt[$opt_key] ) ) {
		if ( false === $echo ) {
			return $theme_opt[$opt_key] ;
		} else { 
			echo $theme_opt[$opt_key];
		}
	} else {
		return false;
	}
}


/**
 * Retrieves legacy Prism options from database
 * Returns theme as a sanitized array or false
 *
 * @uses prism_theme_convert_legacy_opt
 * 
 * @since Prism 1.0
 */
function prism_convert_legacy_opt() {
    $thm_insert_position = prism_get_wp_opt( 'thm_insert_position' );
    $thm_authorinfo = prism_get_wp_opt( 'thm_authorinfo' );
    $thm_footertext = prism_get_wp_opt( 'thm_footertext' );
    
    // Return false if no options found
    if ( false === $thm_insert_position && false === $thm_authorinfo && false === $thm_footertext )
    	return false; 
    	
    // Return a sanitized array from legacy options if found
    $legacy_sanitized_opt = array(
    		'index_insert' 	=> intval( $thm_insert_position ),
    		'author_info'  	=> ( $thm_authorinfo == "true" ) ? 1 : 0,
    		'footer_txt' 	=> wp_kses_post( $thm_footertext ),
    		'del_legacy_opt'=> 0
    	);

    return apply_filters( 'prism_theme_convert_legacy_opt', $legacy_sanitized_opt );
}

/**
 * Returns default theme options.
 *
 * Filter: prism_theme_default_opt
 * 
 * @since Prism 1.0
 *
 */
function prism_default_opt() {
	$prism_default_opt = array(
		'index_insert' 	=> 2,
		'author_info'  	=> 0, // 0 = not checked 1 = checked
		'footer_txt' 	=> 'Powered by [wp-link]. Built on the [theme-link].',
		'del_legacy_opt'=> 0  // 0 = not checked 1 = check
	);

	return apply_filters( 'prism_theme_default_opt', $prism_default_opt );
}	

	
/**
 * Adds the theme option page as an admin menu item, 
 * and queues the contextual help on theme options page load
 *
 * Filter: prism_theme_add_opt_page
 * The filter provides the ability for child themes to customize or remove and add 
 * their own options page and queue contextual help in one function
 * 
 * @since Prism 1.0
 */
 
function prism_opt_add_page() {

	$prism_opt_page = add_theme_page ( __('Theme Options', 'prism') , __('Theme Options', 'prism'), 'edit_theme_options', 'prism_opt', 'prism_do_opt_page');
	$prism_opt_page = apply_filters ('prism_theme_add_opt_page', $prism_opt_page );
	
	if ( ! $prism_opt_page ) {
		return;
	}
	
	add_action( "load-$prism_opt_page", 'prism_opt_page_help' );
}

add_action( 'admin_menu', 'prism_opt_add_page' );


/**
 * Generates the help texts and help sidebar items for the options screen
 *
 * Filter: prism_theme_opt_help_txt <br>
 * Filter: prism_theme_opt_help_sidebar <br>
 * Override: childtheme_override_opt_page_help <br>
 * 
 * @since Prism 1.0 
 * @todo remove conditional compatibilty  WP version > 3.3 and remove fallback to 3.2
 */
if (function_exists('childtheme_override_opt_page_help')) {
	function prism_opt_page_help() {
		childtheme_override_opt_page_help();
	}
} else {
	function prism_opt_page_help() {	
		
		$screen = get_current_screen();
		
		$sidebar  = '<p><strong>' . __( 'For more information:', 'prism') . '</strong></p>';
		$sidebar .= '<a href="http://themeprism.com">PrismTheme.com</a></p>';
		$sidebar .= '<p><strong>' . __('For support:', 'prism') . '</strong></p>';
		$sidebar .= '<a href="http://themeprism.com/forums/"> Prism ';
		$sidebar .= __('forums', 'prism' ) . '</a></p>';
		
		$sidebar = apply_filters ( 'prism_theme_opt_help_sidebar', $sidebar );
		
		$help =  '<p>' . __('The options below are enabled by the Prism Theme framework and/or a child theme.', 'prism') .' ';
		$help .= __('New options can be added and the default ones removed by creating a child theme. This contextual help can be customized in a child theme also.', 'prism') . '</p>';
		
		$help = apply_filters ( 'prism_theme_opt_help_txt', $help );
	
        if ( method_exists( $screen, 'add_help_tab' ) ) {
        	// WordPress 3.3
			$screen->add_help_tab( array( 'title' => __( 'Overview', 'prism' ), 'id' => 'theme-opt-help', 'content' => $help, ) );
			$screen->set_help_sidebar( $sidebar );
                        
			} else {
             	prism_legacy_help();
           	}
        }
}

/**
 * Adds a settings section to display legacy help text and theme links
 *
 * @since Prism 1.0
 * @todo remove Legacy help when two point relases of WP have occurred after 3.3
 */
function prism_legacy_help() {
        add_settings_section ('prism_opt_help_section', '', 'prism_do_legacy_help_section', 'prism_opt_page');
}


/**
 * Renders the legacy help text and theme links
 * 
 * @since Prism 1.0
 * @todo remove Legacy help when two point relases of WP have occurred after 3.3
 */
function prism_do_legacy_help_section() { 
    echo '<p>'. sprintf ( _x( 'For more information about this theme, %1$svisit PrismTheme.com%2$s', '%1$s and %2$s are <a> tags', 'prism') , '<a href="http://themeprism.com">', '</a>') . ' ' . sprintf ( _x( 'Please visit the %1$sPrismTheme.com Forums%2$s if you have any questions about Prism.', '%1$s and %2$s are <a> tags', 'prism'), '<a href="http://themeprism.com/forums/">', '</a>' ) .'</p>' ;
}

/**
 * Renders the them options page
 *
 * @since Prism 1.0
 * @todo: remove get_current_theme()
 */
function prism_do_opt_page() { ?>

 <div class="wrap">
	<?php screen_icon(); ?>

	<?php 
	if ( function_exists( 'wp_get_theme' ) ) {
        $frameworkData = wp_get_theme();
        $theme = $frameworkData->display( 'Name', false );
 	} else {
 		$theme = get_current_theme();
 	} 
 	?>

	<h2><?php printf( _x( '%s Theme Options', '{$current theme} Theme Options', 'prism' ), $theme ); ?></h2>
	<?php settings_errors(); ?>
	
	<form action="options.php" method="post" >
		<?php
			settings_fields( 'prism_opt_group' );
			do_settings_sections( 'prism_theme_opt' );
			submit_button();			
		?>
	</form>
 
 </div>
 
<?php 
}


/**
 * Renders the "Main" settings section. This is left blank in Theamatic and outputs nothing
 *
 * Filter: prism_theme_opt_section_main
 *
 * @since Prism 1.0
 */
function prism_do_opt_section_main() {
	$prism_opt_section_main = '';
	echo ( apply_filters( 'prism_theme_opt_section_main' , $prism_opt_section_main ) );
}


/**
 * Renders Index Insert elements
 *
 * @since Prism 1.0
 */
function prism_do_insert_opt() { 
?>
	<input type="text" maxlength="4" size="4" value="<?php esc_attr_e( (prism_get_theme_opt('index_insert') ) ) ;  ?>" id="thm_insert_position" name="prism_theme_opt[index_insert]">
	<label for="thm_insert_position"><?php _e('The Index Insert widget area will appear after this post number. Entering nothing or 0 will disable this feature.','prism'); ?></label>
<?php 
}


/**
 * Renders Author Info elements
 *
 * @since Prism 1.0
 */
function prism_do_auth_opt() { 
?>
	<input id="thm_authorinfo" type="checkbox"  value="1" name="prism_theme_opt[author_info]"  <?php checked( prism_get_theme_opt('author_info') , 1 ); ?> />
	<label for="thm_authorinfo"><?php printf( _x('Display a %1$smicroformatted vCard%2$s with the author\'s avatar, bio and email on the author page.', '%1$s and %2$s are <a> tags', 'prism' ) , '<a target="_blank" href="http://microformats.org/wiki/hcard">', '</a>' ); ?></label>
<?php
}


/**
 * Renders Footer Text elements
 *
 * @since Prism 1.0
 */
function prism_do_footer_opt() { 
?>
	<textarea rows="5" cols="94" id="thm_footertext" name="prism_theme_opt[footer_txt]"><?php prism_get_theme_opt('footer_txt', true ); ?></textarea>
	<br><?php printf( _x('You can use HTML and shortcodes in your footer text. Shortcode examples: %s', '%s are shortcode tags', 'prism'), '[wp-link] [theme-link] [loginout-link] [blog-title] [blog-link] [the-year]' ); ?>
<?php
}


/**
 * Renders Leagcy Options elements
 *
 * @since Prism 1.0
 * @todo: remove get_current_theme()
 */
function prism_do_legacy_opt() {
?>
	<input id="thm_legacy_opt" type="checkbox" value="1" name="prism_theme_opt[del_legacy_opt]"  <?php checked( prism_get_theme_opt('del_legacy_opt'), 1 ); ?> />

	<?php 
	if ( function_exists( 'wp_get_theme' ) ) {
        $frameworkData = wp_get_theme();
        $theme = $frameworkData->display( 'Name', false );
 	} else {
 		$theme = get_current_theme();
 	} 
 	?>

	<label for="thm_legacy_opt"><?php printf( _x( '%s Theme Options have been upgraded to an improved format. Remove the legacy options from the database.', '{$current theme} Theme Options', 'prism' ), $theme ); ?></label>
<?php
}


/**
 * Validates theme options form post data.
 * Provides error reporting for invalid input.
 *
 * Override: childtheme_override_validate_opt <br>
 * Filter: prism_theme_opt_validation
 * 
 * @since Prism 1.0 
 */
if (function_exists('childtheme_override_validate_opt')) {
	function prism_prism_validate_opt() {
		childtheme_override_validate_opt();
	}
} else {
 	function prism_validate_opt($input){
 	   $output = prism_get_wp_opt( 'prism_theme_opt', prism_default_opt() );	
 	   
 	   // Index Insert position must be a non-negative number
 	   if ( !is_numeric( $input['index_insert'] ) || $input['index_insert'] < 0 )  {
 	   		add_settings_error(
 	   		'prism_theme_opt',
 	   		'prism_insert_opt',
 	   		__('The index insert position value must be a number equal to or greater than zero. This setting has been reverted to the previous value.', 'prism' ),
 	   		'error'
 	   		);
 	   } else {
 	   	// A sanitize numeric value to ensure a whole number
 	   	$output['index_insert'] = intval( $input['index_insert'] );
 	   }
 	   
 	   // Author Info CheckBox value either 1(yes) or 0(no)
 	   if ( isset( $input['author_info'] ) ) {
 	   	$output['author_info'] =  ( $input['author_info'] == 0 ? 0 : 1 );
 	   }
 	 
 	   // Footer Text sanitized allowing HTML and WP shortcodes
 	   if ( isset( $input['footer_txt'] ) ) {
 	   	$output['footer_txt'] = wp_kses_post( $input['footer_txt'] ) ;	
 	   }
 	   
 	   // Remove Legacy Options CheckBox value either 1(yes) or 0(no)
 	   if ( isset( $input['del_legacy_opt'] ) ) {
 	   	$output['del_legacy_opt'] = ( $input['del_legacy_opt'] == 0 ? 0 : 1 );
 	   }
 	   
 	   if ( 1 == $output['del_legacy_opt'] ) {
 	   	
 	   	// Remove options if the choice is yes
 	   	delete_option('thm_insert_position');
 	   	delete_option('thm_authorinfo');
 	   	delete_option('thm_footertext');
 	   	
 	   	// Reset checkbox value to unchecked in case a legacy set of options is ever saved to database again
 	   	$output['del_legacy_opt'] = 0;
 	   }
 	   	
 	   return apply_filters( 'prism_theme_opt_validation', $output, $input );
 	}
} 