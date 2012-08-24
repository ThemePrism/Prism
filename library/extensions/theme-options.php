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
 

if ( ! function_exists( 'prism_opt_init' )) {
	/**
	 * Sets default options in database if not pre-existent.
	 * Registers with WP settings API, adds a main section with three settings fields.
	 *
	 * @since Prism 1.0
	 */
	function prism_opt_init() {

		// Retrieve current options from database	
		$current_options = prism_get_wp_opt('prism_theme_opt');
		
		// If no current settings exist
		if ( false === $current_options )  {
			// Fresh theme installation: Add default settings to database
			add_option( 'prism_theme_opt', prism_default_opt() );
		}

		register_setting ('prism_opt_group', 'prism_theme_opt', 'prism_validate_opt');
		
		add_settings_section ('prism_opt_section_main', '', 'prism_do_opt_section_main', 'prism_theme_opt');
	
		add_settings_field ('prism_auth_opt',   __('Info on Author Page'	, 'prism')	, 'prism_do_auth_opt'	, 'prism_theme_opt', 'prism_opt_section_main');
		add_settings_field ('prism_footer_opt', __('Text in Footer'	, 'prism')		, 'prism_do_footer_opt'	, 'prism_theme_opt', 'prism_opt_section_main');
	
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
		'footer_txt' 	=> 'Powered by [wp-link]. Built on the [theme-link].'
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



if ( ! function_exists( 'prism_opt_page_help' )) {
	/**
	 * Generates the help texts and help sidebar items for the options screen
	 *
	 * Filter: prism_theme_opt_help_txt <br>
	 * Filter: prism_theme_opt_help_sidebar <br>
	 * 
	 * @since Prism 1.0 
	 */
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
	
		$screen->add_help_tab( array( 'title' => __( 'Overview', 'prism' ), 'id' => 'theme-opt-help', 'content' => $help, ) );
		$screen->set_help_sidebar( $sidebar );
                        
        }
}


/**
 * Renders the them options page
 *
 * @since Prism 1.0
 */
function prism_do_opt_page() { ?>

 <div class="wrap">
	<?php screen_icon(); ?>

	<?php 
        $frameworkData = wp_get_theme();
        $theme = $frameworkData->display( 'Name', false );
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


if ( ! function_exists( 'prism_validate_opt' )) {
	/**
	 * Validates theme options form post data.
	 * Provides error reporting for invalid input.
	 *
	 * Filter: prism_theme_opt_validation
	 * 
	 * @since Prism 1.0 
	 */
 	function prism_validate_opt($input){
 	   $output = prism_get_wp_opt( 'prism_theme_opt', prism_default_opt() );	
 	   
 	   // Author Info CheckBox value either 1(yes) or 0(no)
 	   if ( isset( $input['author_info'] ) ) {
 	   	$output['author_info'] =  ( $input['author_info'] == 0 ? 0 : 1 );
 	   }
 	 
 	   // Footer Text sanitized allowing HTML and WP shortcodes
 	   if ( isset( $input['footer_txt'] ) ) {
 	   	$output['footer_txt'] = wp_kses_post( $input['footer_txt'] ) ;	
 	   }
 	   	   	
 	   return apply_filters( 'prism_theme_opt_validation', $output, $input );
 	}
} 
