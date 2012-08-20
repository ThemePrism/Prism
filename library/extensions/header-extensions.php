<?php
/**
 * Header Extensions
 *
 * @package PrismCoreLibrary
 * @subpackage HeaderExtensions
 */
  

/**
 * Display the DOCTYPE
 * 
 * Filter: prism_create_doctype
 */
function prism_create_doctype() {
    $content = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' . "\n";
    $content .= '<html xmlns="http://www.w3.org/1999/xhtml"';
    echo apply_filters( 'prism_create_doctype', $content );
}


/**
 * Display the HEAD profile
 * 
 * Filter: prism_head_profile
 */
function prism_head_profile() {
    $content = '<head profile="http://gmpg.org/xfn/11">' . "\n";
    echo apply_filters('prism_head_profile', $content );
}


/**
 * Display the META content-type
 * 
 * Filter: prism_create_contenttype
 */
function prism_create_contenttype() {
    $content = "<meta http-equiv=\"Content-Type\" content=\"";
    $content .= get_bloginfo('html_type'); 
    $content .= "; charset=";
    $content .= get_bloginfo('charset');
    $content .= "\" />";
    $content .= "\n";
    echo apply_filters('prism_create_contenttype', $content);
}


if ( function_exists('childtheme_override_doctitle') )  {
	/**
	 * @ignore
	 */
	 function prism_doctitle() {
    	childtheme_override_doctitle();
    }
} else {
	/**
	 * Display the content of the title tag
	 * 
	 * Override: childtheme_override_doctitle
	 * Filter: prism_doctitle_separator
	 *
	 */
	function prism_doctitle() {
        $separator = apply_filters('prism_doctitle_separator', '|');
        $doctitle = '<title>' . wp_title( $separator, false, 'right' ) . '</title>' . "\n";
        echo $doctitle;
	} // end prism_doctitle
}

	
/**
 * Filters wp_title returning the doctitle contents
 * Located in header.php Credits: Tarski Theme
 * 
 * Override: childtheme_override_doctitle
 * Filter: prism_doctitle_separator
 * Filter: prism_doctitle
 *
 * @since 1.0.2
 */
function prism_wptitle( $wp_doctitle, $separator, $sep_location ) { 
	// return original string if on feed or if a seo plugin is being used
    if ( is_feed() || !prism_seo() )
    	return $wp_doctitle;
   	// otherwise...	
   	$site_name = get_bloginfo('name' , 'display');
        	
    if ( is_single() || ( is_home() && !is_front_page() ) || ( is_page() && !is_front_page() ) ) {
      $content = single_post_title('', FALSE);
    }
    elseif ( is_front_page() ) { 
      $content = get_bloginfo('description', 'display');
    }
    elseif ( is_page() ) { 
      $content = single_post_title('', FALSE); 
    }
    elseif ( is_search() ) { 
      $content = __('Search Results for:', 'prism'); 
      $content .= ' ' . get_search_query();
    }
    elseif ( is_category() ) {
      $content = __('Category Archives:', 'prism');
      $content .= ' ' . single_cat_title('', FALSE);;
    }
    elseif ( is_tag() ) { 
      $content = __('Tag Archives:', 'prism');
      $content .= ' ' . prism_tag_query();
    }
    elseif ( is_404() ) { 
      $content = __('Not Found', 'prism'); 
    }
    else { 
      $content = get_bloginfo('description', 'display');
    }
    
    if ( get_query_var('paged') ) {
      $content .= ' ' .$separator. ' ';
      $content .= 'Page';
      $content .= ' ';
      $content .= get_query_var('paged');
    }
    
    if($content) {
      if ( is_front_page() ) {
          $elements = array(
            'site_name' => $site_name,
            'separator' => $separator,
            'content' 	=> $content
          );
      }
      else {
          $elements = array(
            'content' => $content
          );
      }  
    } else {
      $elements = array(
        'site_name' => $site_name
      );
    }
    
    // Filters should return an array
    $elements = apply_filters('prism_doctitle', $elements);
       
    // But if they don't, it won't try to implode
    if( is_array($elements) ) {
        $prism_doctitle = implode(' ', $elements);
    } else {
   	    $prism_doctitle = $elements;
    }
   	
    return $prism_doctitle;
}

add_filter( 'wp_title', 'prism_wptitle', 10, 3);


/**
 * Switch Prism's SEO functions on or off
 * 
 * Provides compatibility with SEO plugins: All in One SEO Pack, HeadSpace, 
 * Platinum SEO Pack, wpSEO and Yoast SEO. Default: ON
 * 
 * Filter: prism_seo
 */
function prism_seo() {
	if ( class_exists('All_in_One_SEO_Pack') || class_exists('HeadSpace_Plugin') || class_exists('Platinum_SEO_Pack') || class_exists('wpSEO') || defined('WPSEO_VERSION') ) {
		$content = FALSE;
	} else {
		$content = true;
	}
		return apply_filters( 'prism_seo', $content );
}


/**
 * Switch use of prism_the_excerpt() in the meta-tag description
 * 
 * Default: ON
 * 
 * Filter: prism_use_excerpt
 */
function prism_use_excerpt() {
    $display = TRUE;
    $display = apply_filters('prism_use_excerpt', $display);
    return $display;
}


/**
 * Switch use of prism_use_autoexcerpt() in the meta-tag description
 * 
 * Default: OFF
 * 
 * Filter: prism_use_autoexcerpt
 */
function prism_use_autoexcerpt() {
    $display = FALSE;
    $display = apply_filters('prism_use_autoexcerpt', $display);
    return $display;
}


/**
 * Display the meta-tag description
 * 
 * This can be switched on or off using prism_show_description
 * 
 * Filter: prism_create_description
 */
function prism_create_description() {
	$content = '';
	if ( prism_seo() ) {
    	if ( is_single() || is_page() ) {
      		if ( have_posts() ) {
          		while ( have_posts() ) {
            		the_post();
					if ( prism_the_excerpt() == "" ) {
                        if ( prism_use_autoexcerpt() ) {
					    	$content = '<meta name="description" content="';
                    		$content .= prism_excerpt_rss();
                    		$content .= '" />';
                    		$content .= "\n";
                        }
                	} else {
                        if ( prism_use_excerpt() ) {
                    		$content = '<meta name="description" content="';
                    		$content .= prism_the_excerpt();
                    		$content .= '" />';
                    		$content .= "\n";
                        }
                	}
            	}
        	}
        } elseif ( is_home() || is_front_page() ) {
    		$content = '<meta name="description" content="';
    		$content .= get_bloginfo( 'description', 'display' );
    		$content .= '" />';
    		$content .= "\n";
        }
        echo apply_filters ('prism_create_description', $content);
	}
} // end prism_create_description


/**
 * Switch creating the meta-tag description
 * 
 * Default: ON
 * 
 * Filter: prism_show_description
 */
function prism_show_description() {
    $display = TRUE;
    $display = apply_filters('prism_show_description', $display);
    if ( $display ) {
        prism_create_description();
    }
} // end prism_show_description


/**
 * Create the robots meta-tag
 * 
 * This can be switched on or off using prism_show_robots
 * 
 * Filter: prism_create_robots
 */
function prism_create_robots() {
        global $paged;
		if ( prism_seo() ) {
    		if ( ( is_home() && ( $paged < 2 ) ) || is_front_page() || is_single() || is_page() || is_attachment() ) {
				$content = '<meta name="robots" content="index,follow" />';
    		} elseif ( is_search() ) {
        		$content = '<meta name="robots" content="noindex,nofollow" />';
    		} else {	
        		$content = '<meta name="robots" content="noindex,follow" />';
    		}
    		$content .= "\n";
    		if ( get_option('blog_public') ) {
    				echo apply_filters('prism_create_robots', $content);
    		}
		}
} // end prism_create_robots


/**
 * Switch creating the robots meta-tag
 * 
 * Default: ON
 * 
 * Filter: prism_show_robots
 */
function prism_show_robots() {
    $display = TRUE;
    $display = apply_filters('prism_show_robots', $display);
    if ( $display ) {
        prism_create_robots();
    }
} // end prism_show_robots

/**
 * Display links to RSS feed
 * 
 * This can be switched on or off using prism_show_rss. Default: ON
 * 
 * Filter: prism_show_rss
 * Filter: prism_rss
 */
function prism_show_rss() {
    $display = TRUE;
    $display = apply_filters('prism_show_rss', $display);
    if ($display) {
        $content = '<link rel="alternate" type="application/rss+xml" href="';
        $content .= get_feed_link( get_default_feed() );
        $content .= '" title="';
        $content .= esc_attr( get_bloginfo('name', 'display') );
        $content .= ' ' . __('Posts RSS feed', 'prism');
        $content .= '" />';
        $content .= "\n";
        echo apply_filters('prism_rss', $content);
    }
}


/**
 * Display links to RSS feed for comments
 * 
 * This can be switched on or off using prism_show_commentsrss. Default: ON
 * 
 * Filter: prism_show_commentsrss
 * Filter: prism_commentsrss
 */
function prism_show_commentsrss() {
    $display = TRUE;
    $display = apply_filters('prism_show_commentsrss', $display);
    if ($display) {
        $content = '<link rel="alternate" type="application/rss+xml" href="';
        $content .= get_feed_link( 'comments_' . get_default_feed() );
        $content .= '" title="';
        $content .= esc_attr( get_bloginfo('name') );
        $content .= ' ' . __('Comments RSS feed', 'prism');
        $content .= '" />';
        $content .= "\n";
        echo apply_filters('prism_commentsrss', $content);
    }
}


/**
 * Display pingback link
 * 
 * This can be switched on or off using prism_show_pingback. Default: ON
 * 
 * Filter: prism_show_pingback
 * Filter: prism_pingback_url
 */
function prism_show_pingback() {
    $display = TRUE;
    $display = apply_filters('prism_show_pingback', $display);
    if ($display) {
        $content = '<link rel="pingback" href="';
        $content .= get_bloginfo('pingback_url');
        $content .= '" />';
        $content .= "\n";
        echo apply_filters('prism_pingback_url',$content);
    }
}

/**
 * Add the default stylesheet to the head of the document.
 * 
 * Register and enqueue Prism style.css
 * 
 * @todo check WP versions > 3.3 for addiytion of wp_enqueue_styles
 */
function prism_create_stylesheet() {
	wp_enqueue_style( 'prism_style', get_stylesheet_uri() );
}

add_action('wp_enqueue_scripts','prism_create_stylesheet');

if ( function_exists('childtheme_override_head_scripts') )  {
    /**
     * @ignore
     */
    function prism_head_scripts() {
    	childtheme_override_head_scripts();
    }
} else {
    /**
     * Adds comment reply and navigation menu scripts to the head of the document.
     *
     * Child themes should use wp_dequeue_scripts to remove individual scripts.
     * Larger changes can be made using the override.
     *
     * Override: childtheme_override_head_scripts <br>
     *
     * For Reference: {@link http://users.tpg.com.au/j_birch/plugins/superfish/#getting-started Superfish Jquery Plugin}
     *
     * @since 1.0
     */
    function prism_head_scripts() {
    	
    	// load comment reply script on posts and pages when option is set and check for deprecated filter
    	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			has_filter( 'prism_show_commentreply' ) ? prism_show_commentreply() : wp_enqueue_script( 'comment-reply' );
		
		// load jquery and superfish associated plugins when theme support is active
    	if ( current_theme_supports('prism_superfish') ) {
			$scriptdir = get_template_directory_uri();
			$scriptdir .= '/library/scripts/';

			wp_enqueue_script('jquery');
			wp_deregister_script('hoverIntent');
      wp_enqueue_script('hoverIntent', includes_url('js/hoverIntent.js'), array('jquery'), false, true);
			wp_enqueue_script('superfish', $scriptdir . 'superfish.js', array('jquery'), '1.4.8', true);
			wp_enqueue_script('supersubs', $scriptdir . 'supersubs.js', array('jquery'), '0.2b', true);
			wp_enqueue_script('prism-dropdowns', apply_filters('prism_dropdown_options', $scriptdir . 'prism-dropdowns.js') , array('jquery', 'superfish' ), '1.0', true);
     	
     	}
 	}
 }

add_action('wp_enqueue_scripts','prism_head_scripts');


/**
 * Return the default arguments for wp_page_menu()
 * 
 * This is used as fallback when the user has not created a custom nav menu in wordpress admin
 * 
 * Filter: prism_page_menu_args
 *
 * @return array
 */
function prism_page_menu_args() {
	$args = array (
		'sort_column' => 'menu_order',
		'menu_class'  => 'menu',
		'include'     => '',
		'exclude'     => '',
		'echo'        => FALSE,
		'show_home'   => FALSE,
		'link_before' => '',
		'link_after'  => ''
	);
	return apply_filters('prism_page_menu_args', $args);
}


/**
 * Return the default arguments for wp_nav_menu
 * 
 * Filter: prism_primary_menu_id <br>
 * Filter: prism_nav_menu_args
 *
 * @return array
 */
function prism_nav_menu_args() {
	$args = array (
		'theme_location'	=> apply_filters('prism_primary_menu_id', 'primary-menu'),
		'menu'				=> '',
		'container'			=> 'div',
		'container_class'	=> 'menu',
		'menu_class'		=> 'sf-menu',
		'fallback_cb'		=> 'wp_page_menu',
		'before'			=> '',
		'after'				=> '',
		'link_before'		=> '',
		'link_after'		=> '',
		'depth'				=> 0,
		'walker'			=> '',
		'echo'				=> false
	);
	
	return apply_filters('prism_nav_menu_args', $args);
}


/**
 * Switch adding superfish css class to wp_page_menu
 * 
 * This adds a css class of "sf-menu" to the first <ul> of wp_page_menu. Default: ON
 * Switchable using included filter.
 * 
 * Filter: prism_use_superfish
 *
 * @param string
 * @return string
 */
function prism_add_menuclass($ulclass) {
	if ( apply_filters( 'prism_use_superfish', TRUE ) ) {
		return preg_replace( '/<ul>/', '<ul class="sf-menu">', $ulclass, 1 );
	} else {
		return $ulclass;
	}
}


/**
 * Register action hook: prism_before
 * 
 * Located in header.php, just after the opening body tag, before anything else.
 */
function prism_before() {
    do_action( 'prism_before' );
}


/**
 * Register action hook: prism_abovefooter
 * 
 * Located in header.php, inside the header div
 */
function prism_aboveheader() {
    do_action( 'prism_aboveheader' );
}


/**
 * Register action hook: prism_abovefooter
 * 
 * Located in header.php, inside the header div
 */
function prism_header() {
    do_action( 'prism_header' );
}


if ( function_exists( 'childtheme_override_brandingopen' ) )  {
	/**
	 * @ignore
	 */
	function prism_brandingopen() {
		childtheme_override_brandingopen();
		}
	} else {
	/**
	 * Display the opening of the #branding div
	 * 
	 * Override: childtheme_override_brandingopen
	 */
    function prism_brandingopen() {
    	echo "\t<div id=\"branding\">\n";
    }
}

add_action( 'prism_header','prism_brandingopen',1 );


if ( function_exists( 'childtheme_override_blogtitle' ) )  {
	/**
	 * @ignore
	 */
    function prism_blogtitle() {
    	childtheme_override_blogtitle();
    }
} else {
    /**
     * Display the blog title within the #branding div
     * 
     * Override: childtheme_override_blogtitle
     */    
    function prism_blogtitle() { 
    ?>
    
    	<div id="blog-title"><span><a href="<?php echo home_url() ?>/" title="<?php bloginfo('name') ?>" rel="home"><?php bloginfo('name') ?></a></span></div>
    
    <?php 
    }
}

add_action('prism_header','prism_blogtitle',3);


if ( function_exists('childtheme_override_blogdescription') )  {
	/**
	 * @ignore
	 */
    function prism_blogdescription() {
    	childtheme_override_blogdescription();
    }
} else {
    /**
     * Display the blog description within the #branding div
     * 
     * Override: childtheme_override_blogdescription
     */
    function prism_blogdescription() {
    	$blogdesc = '"blog-description">' . get_bloginfo('description', 'display');
    	if ( is_home() || is_front_page() ) { 
        	echo "\t<h1 id=$blogdesc</h1>\n\n";
        } else {	
        	echo "\t<div id=$blogdesc</div>\n\n";
        }
    }
}

add_action('prism_header','prism_blogdescription',5);


if ( function_exists('childtheme_override_brandingclose') )  {
	/**
	 * @ignore
	 */
	 function prism_brandingclose() {
    	childtheme_override_brandingclose();
    }
} else {
    /**
     * Display the closing of the #branding div
     * 
     * Override: childtheme_override_brandingclose
     */    
    function prism_brandingclose() {
    	echo "\t\t</div><!--  #branding -->\n";
    }
}

add_action('prism_header','prism_brandingclose',7);


if ( function_exists('childtheme_override_access') )  {
    /**
	 * @ignore
	 */
	 function prism_access() {
    	childtheme_override_access();
    }
} else {
    /**
     * Display the #access div
     * 
     * Override: childtheme_override_access
     */    
    function prism_access() { 
    ?>
    
    <div id="access">
    
    	<div class="skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip navigation to the content', 'prism' ); ?>"><?php _e('Skip to content', 'prism'); ?></a></div><!-- .skip-link -->
    	
    	<?php 
    	if ( ( function_exists("has_nav_menu") ) && ( has_nav_menu( apply_filters('prism_primary_menu_id', 'primary-menu') ) ) ) {
    	    echo  wp_nav_menu(prism_nav_menu_args());
    	} else {
    	    echo  prism_add_menuclass(wp_page_menu(prism_page_menu_args()));	
    	}
    	?>
    	
    </div><!-- #access -->
    <?php 
    }
}

add_action('prism_header','prism_access',9);


/**
 * Register action hook: prism_belowheader
 * 
 * Located in header.php, just after the header div
 */
function prism_belowheader() {
    do_action('prism_belowheader');
} // end prism_belowheader
		

?>