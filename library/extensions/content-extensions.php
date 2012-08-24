<?php
/**
 * Content Extensions
 *
 * @package PrismCoreLibrary
 * @subpackage ContentExtensions
 * @todo revisit docblock desciptions & tags
 */
 

/**
 * Register action hook: prism_abovecontainer
 * 
 * Located in 404.php, archive.php, archives.php, attachement.php, author.php, category.php index.php, 
 * links.php, page.php, search.php, single.php, tag.php
 * Just between #main and #container
 */
function prism_abovecontainer() {
    do_action('prism_abovecontainer');
} // end prism_abovecontainer


/**
 * Register action hook: prism_abovecontent
 *
 * Located in 404.php, archive.php, archives.php, attachement.php, author.php, category.php index.php,
 * links.php, page.php, search.php, single.php, tag.php
 * Just between #main and #container
 */
function prism_abovecontent() {
    do_action('prism_abovecontent');
} // end prism_abovecontent


/**
 * Register action hook: prism_abovepost 
 *
 * Located in 404.php, archives.php, attachment.php, links.php, page.php, search.php and template-page-fullwidth.php
 * Just above #post
 */
function prism_abovepost() {
    do_action('prism_abovepost');
} // end prism_abovepost


/**
 * Register action hook: prism_archives 
 *
 * Located in archives.php
 * Just after the content
 */
function prism_archives() {
	do_action('prism_archives');
} // end prism_archives


/**
 * Register action hook: prism_navigation_above 
 *
 * Located in archive.php, author.php, category.php, index.php, search.php, single.php, tag.php
 * Just before the content
 */
function prism_navigation_above() {
	do_action('prism_navigation_above');
} // end prism_navigation_above


/**
 * Register action hook: prism_navigation_below 
 *
 * Located in archive.php, author.php, category.php, index.php, search.php, single.php, tag.php
 * Just after the content
 */
function prism_navigation_below() {
	do_action('prism_navigation_below');
} // end prism_navigation_below


/**
 * Register action hook: prism_above_indexloop 
 *
 * Located in index.php 
 * Just before the loop
 */
function prism_above_indexloop() {
    do_action('prism_above_indexloop');
} // end prism_above_indexloop


/**
 * Register action hook: prism_above_archiveloop 
 *
 * Located in archive.php 
 * Just before the loop
 */
function prism_above_archiveloop() {
    do_action('prism_above_archiveloop');
} // end prism_above_archiveloop


/**
 * Register action hook: prism_archiveloop 
 *
 * Located in archive.php
 * The Loop used on archive pages
 */
function prism_archiveloop() {
	do_action('prism_archiveloop');
} // end prism_archiveloop


/**
 * Register action hook: prism_authorloop 
 *
 * Located in author.pgp
 * The Loop used on author pages
 */
function prism_authorloop() {
	do_action('prism_authorloop');
} // end prism_authorloop


/**
 * Register action hook: prism_categoryloop 
 *
 * Located in category.php
 * The Loop used on category pages
 */
function prism_categoryloop() {
	do_action('prism_categoryloop');
} // end prism_categoryloop


/**
 * Register action hook: prism_indexloop 
 *
 * Located in index.php
 * The default loop
 */
function prism_indexloop() {
	do_action('prism_indexloop');
} // end prism_indexloop


/**
 * Register action hook: prism_searchloop 
 *
 * Located in search.php
 * The loop used on search result pages
 */
function prism_searchloop() {
	do_action('prism_searchloop');
} // end prism_searchloop


/**
 * Register action hook: prism_singlepost 
 *
 * Located in single.php
 * The Loop on single pages
 */
function prism_singlepost() {
	do_action('prism_singlepost');
} //end prism_singlepost


/**
 * Register action hook: prism_tagloop 
 *
 * Located in tag.php
 * The Loop on tag archive pages
 */
function prism_tagloop() {
	do_action('prism_tagloop');
} // end prism_tagloop


/**
 * Register action hook: prism_below_indexloop 
 *
 * Located in index.php
 * Just after the loop
 */
function prism_below_indexloop() {
    do_action('prism_below_indexloop');
} // end prism_below_indexloop


/**
 * Register action hook: prism_below_archiveloop 
 *
 * Located in archive.php
 * Just after the loop
 */
function prism_below_archiveloop() {
    do_action('prism_below_archiveloop');
} // end prism_below_archiveloop


/**
 * Register action hook: prism_above_categoryloop 
 *
 * Located in category.php
 * Just before the loop
 */
function prism_above_categoryloop() {
    do_action('prism_above_categoryloop');
} // end prism_above_categoryloop


/**
 * Register action hook: prism_below_categoryloop 
 *
 * Located in category.php
 * Just after the loop
 */
function prism_below_categoryloop() {
    do_action('prism_below_categoryloop');
} // end prism_below_categoryloop


/**
 * Register action hook: prism_above_searchloop 
 *
 * Located in search.php
 * Just before the loop
 */
function prism_above_searchloop() {
    do_action('prism_above_searchloop');
} // end prism_above_searchloop


/**
 * Register action hook: prism_below_searchloop 
 *
 * Located in search.php
 * Just after the loop
 */
function prism_below_searchloop() {
    do_action('prism_below_searchloop');
} // end prism_below_searchloop


/**
 * Register action hook: prism_above_tagloop 
 *
 * Located in tag.php
 * Just before the loop
 */
function prism_above_tagloop() {
    do_action('prism_above_tagloop');
} // end prism_above_tagloop


/**
 * Register action hook: prism_init 
 *
 * Located in tag.php
 * Just after the loop
 */
function prism_below_tagloop() {
    do_action('prism_below_tagloop');
} // end prism_below_tagloop


/**
 * Register action hook: prism_belowpost 
 *
 * Located in 404.php, archives.php, attachment.php, links.php, page.php, search.php and template-page-fullwidth.php
 * Just below #post
 */
function prism_belowpost() {
    do_action('prism_belowpost');
} // end prism_belowpost


/**
 * Register action hook: prism_belowcontent 
 *
 * Located in 404.php, archive.php, archives.php, attachement.php, author.php, category.php index.php, 
 * links.php, page.php, search.php, single.php, tag.php
 * Just below #content
 */
function prism_belowcontent() {
    do_action('prism_belowcontent');
} // end prism_belowcontent


/**
 * Register action hook: prism_belowcontainer 
 *
 * Located in 404.php, archive.php, archives.php, attachement.php, author.php, category.php index.php,
 * links.php, page.php, search.php, single.php, tag.php
 * Just below #container
 */
function prism_belowcontainer() {
    do_action('prism_belowcontainer');
} // end prism_belowcontainer


if ( ! function_exists( 'prism_page_title' ))  {
	/**
	 * Create the page title.
	 * 
	 * Echoes the title of the webpage for specific queries. The markup is conditionally set using template tags.
	 * Located in templates: archive.php, attachement.php, author.php, category.php, search.php, tag.php
	 * 
	 * Filter: prism_page_title 
	 * 
	 * @todo review and remove possiblity for displaying an empty div for archive-meta
	 */
	function prism_page_title() {
		
		global $post;
		
		$content = "\t\t\t\t";
		if (is_attachment()) {
				$content .= '<h2 class="page-title"><a href="';
				$content .= apply_filters('the_permalink',get_permalink($post->post_parent));
				$content .= '" rev="attachment"><span class="meta-nav">&laquo; </span>';
				$content .= get_the_title($post->post_parent);
				$content .= '</a></h2>';
		} elseif (is_author()) {
				$content .= '<h1 class="page-title author">';
				$author = get_the_author_meta( 'display_name', $post->post_author );
				$content .= __('Author Archives:', 'prism');
				$content .= ' <span>' . $author .'</span>';
				$content .= '</h1>';
		} elseif (is_category()) {
				$content .= '<h1 class="page-title">';
				$content .= __('Category Archives:', 'prism');
				$content .= ' <span>' . single_cat_title('', FALSE) .'</span>';
				$content .= '</h1>' . "\n";
				$content .= "\n\t\t\t\t" . '<div class="archive-meta">';
				if ( !(''== category_description()) ) : $content .= apply_filters('archive_meta', category_description()); endif;
				$content .= '</div>';
		} elseif (is_search()) {
				$content .= '<h1 class="page-title">';
				$content .= __('Search Results for:', 'prism');
				$content .= ' <span id="search-terms">' . get_search_query() .'</span>';
				$content .= '</h1>';
		} elseif (is_tag()) {
				$content .= '<h1 class="page-title">';
				$content .= __('Tag Archives:', 'prism');
				$content .= ' <span>';
				$content .= single_tag_title( '', false );
				$content .= '</span></h1>';
		} elseif (is_tax()) {
			    global $taxonomy;
				$content .= '<h1 class="page-title">';
				$tax = get_taxonomy($taxonomy);
				$content .= $tax->labels->singular_name . ' ';
				$content .= __('Archives:', 'prism');
				$content .= ' <span>' . prism_get_term_name() .'</span>';
				$content .= '</h1>';
 		} elseif (is_post_type_archive()) { 
				$content .= '<h1 class="page-title">';
				$post_type_obj = get_post_type_object( get_post_type() );
				$post_type_name = $post_type_obj->labels->singular_name;
				$content .= __('Archives:', 'prism');
				$content .= ' <span>' . $post_type_name . '</span>';
				$content .= '</h1>';	
		} elseif (is_day()) {
				$content .= '<h1 class="page-title">';
				$content .= sprintf( __('Daily Archives: %s', 'prism'), '<span>' . get_the_time( get_option('date_format') ) ) . '</span>';
				$content .= '</h1>';
		} elseif (is_month()) {
				$content .= '<h1 class="page-title">';
				$content .= sprintf( __('Monthly Archives: %s', 'prism') , '<span>' . get_the_time('F Y') ) . '</span>';
				$content .= '</h1>';
		} elseif (is_year()) {
				$content .= '<h1 class="page-title">';
				$content .= sprintf( __('Yearly Archives: %s', 'prism'), '<span>' . get_the_time('Y') ) . '</span>';
				$content .= '</h1>';
		}
		$content .= "\n";
		echo apply_filters('prism_page_title', $content);
	}
}

 

if ( ! function_exists( 'prism_nav_above' ))  {
	/**
	 * Create the above navigation
	 * 
	 * Includes compatibility with WP-PageNavi plugin
	 * 
	 * @link http://wordpress.org/extend/plugins/wp-pagenavi/ WP-PageNavi Plugin Page
	 */
	function prism_nav_above() {
		if (is_single()) { 
		?>
				<nav id="nav-above" class="navigation">
				
					<div class="nav-previous"><?php prism_previous_post_link() ?></div>
					
					<div class="nav-next"><?php prism_next_post_link() ?></div>
					
				</nav>
		<?php } else { ?>
				<nav id="nav-above" class="navigation">
               		<?php if ( function_exists( 'wp_pagenavi' ) ) { ?>
                	<?php wp_pagenavi(); ?>
					<?php } else { ?>
					  
					<div class="nav-previous"><?php next_posts_link(sprintf('<span class="meta-nav">&laquo;</span> %s', __('Older posts', 'prism') ) ) ?></div>
					
					<div class="nav-next"><?php previous_posts_link(sprintf('%s <span class="meta-nav">&raquo;</span>',__( 'Newer posts', 'prism') ) ) ?></div>

					<?php } ?>
					
				</nav>	
		<?php
		}
	}
} // end nav_above

add_action('prism_navigation_above', 'prism_nav_above', 2);


if ( ! function_exists( 'prism_default_loop' ))  {
	/**
	 * The Default loop
	 * 
	 * Easily change all loops at once
	 */
	function prism_default_loop() {

		while ( have_posts() ) : the_post(); 

				// action hook for insterting content above #post
				prism_abovepost(); 
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> > 

				<?php

	            	// creating the post header
	            	prism_postheader();
	            ?>
					
					<div class="entry-content">
						
						<?php prism_content(); ?>

					</div><!-- .entry-content -->
					
					<?php prism_postfooter(); ?>
					
				</article><!-- #post -->

			<?php 
				// action hook for insterting content below #post
				prism_belowpost();
		
		endwhile;
	}
} // end default_loop


if ( ! function_exists( 'prism_archive_loop') )  {
	/**
	 * The Archive loop
	 * 
	 * Located in archive.php
	 */
	function prism_archive_loop() {
		prism_default_loop();
	}
} // end archive_loop

add_action('prism_archiveloop', 'prism_archive_loop');


if ( ! function_exists( 'prism_author_loop' ))  {
	/**
	 * The Author loop
	 * 
	 * Located in author.php
	 */
	function prism_author_loop() {
		prism_default_loop();
	}
} // end author_loop

add_action('prism_authorloop', 'prism_author_loop');


if ( ! function_exists( 'prism_category_loop' ))  {
	/**
	 * The Category loop
	 * 
	 * Located in category.php
	 */
	function prism_category_loop() {
		prism_default_loop();
	}
} // end category_loop

add_action('prism_categoryloop', 'prism_category_loop');


if ( ! function_exists( 'prism_index_loop' ))  {
	/**
	 * The Index loop
	 * 
	 * Located in index.php
	 */
	function prism_index_loop() {
		prism_default_loop();
	}
} // end index_loop

add_action('prism_indexloop', 'prism_index_loop');


if ( ! function_exists( 'prism_single_post' ))  {
	/**
	 * The Single post loop
	 * 
	 * Located in single.php
	 */
	function prism_single_post() { 
		prism_default_loop();
	}
} // end single_post

add_action('prism_singlepost', 'prism_single_post');


if ( ! function_exists( 'prism_search_loop' ))  {
	/**
	 * The Search loop
	 * 
	 * Located in search.php
	 */
	function prism_search_loop() {
		prism_default_loop();
	}
} // end search_loop

add_action('prism_searchloop', 'prism_search_loop');


if ( ! function_exists( 'prism_tag_loop' ))  {
	/**
	 * The Tag loop
	 * 
	 * Located in tag.php
	 */
	function prism_tag_loop() {
		prism_default_loop();
	}
} // end tag_loop

add_action('prism_tagloop', 'prism_tag_loop');


/**
 * Filter: prism_time_title
 * 
 * Create the time url title displayed in the post header
 */
function prism_time_title() {

	$time_title = 'Y-m-d\TH:i:sO';
	
	// Filters should return correct 
	$time_title = apply_filters('prism_time_title', $time_title);
	
	return $time_title;
} // end time_title


/**
 * Filter: prism_time_display
 * 
 * Create the time displayed in the post header
 */
function prism_time_display() {

	$time_display = get_option('date_format');
	
	// Filters should return correct 
	$time_display = apply_filters('prism_time_display', $time_display);
	
	return $time_display;
} // end time_display


if ( ! function_exists( 'prism_postheader' ))  {
	/**
	 * Create the post header
	 * 
	 * Filter: prism_postheader
	 */
	function prism_postheader() {
 	   
 	   global $post;
 	 
 	   if ( is_404() || $post->post_type == 'page') {
 	       $postheader = prism_postheader_posttitle();        
 	   } else {
 	       $postheader = prism_postheader_posttitle() . prism_postheader_postmeta();    
 	   }

 	   $postheader = '<header class="entry-header">'. $postheader . ' </header>';
 	   
 	   echo apply_filters( 'prism_postheader', $postheader ); // Filter to override default post header
	}
}  // end postheader


if ( ! function_exists( 'prism_postheader_posteditlink' ))  {
	/**
	 * Create the post edit link
	 * 
	 * Filter: prism_postheader_posteditlink
	 */
	function prism_postheader_posteditlink() {

    	$posteditlink = sprintf( '<a href="%s" title="%s" class="edit">%s</a>' , 

			    			get_edit_post_link(),
			    			esc_attr__('Edit post', 'prism'),
							/* translators: post edit link */
			    			__('Edit', 'prism' ));
		
		return apply_filters('prism_postheader_posteditlink', $posteditlink); 

	}
} // end postheader_posteditlink


if ( ! function_exists( 'prism_postheader_posttitle' ))  {
	/**
	 * Create the post title
	 * 
	 * Filter: prism_postheader_posttitle
	 */
	function prism_postheader_posttitle() {
		
		$posttitle = "\n\n\t\t\t\t\t";
	    if (is_single() || is_page()) {
	        $posttitle .= '<h1 class="entry-title">' . get_the_title() . "</h1>\n";
	    } elseif (is_404()) {    
	        $posttitle .= '<h1 class="entry-title">' . __('Not Found', 'prism') . "</h1>\n";
	    } else {
	        $posttitle .= '<h2 class="entry-title">';
	        $posttitle .= sprintf('<a href="%s" title="%s" rel="bookmark">%s</a>',
	        						apply_filters('the_permalink', get_permalink()),
									sprintf( esc_attr__('Permalink to %s', 'prism'), the_title_attribute( 'echo=0' ) ),
	        						get_the_title());   
	        $posttitle .= "</h2>\n";
	    }
	    
	    return apply_filters('prism_postheader_posttitle',$posttitle); 
	
	} 
} // end postheader_posttitle


if ( ! function_exists( 'prism_postheader_postmeta' ))  {
	/**
	 * Create the post meta
	 * 
	 * Filter: prism_postheader_postmeta
	 */
	function prism_postheader_postmeta() {
		
		$postmeta  = "\n\t\t\t\t\t";
	    $postmeta .= '<div class="entry-meta">' . "\n\n";
	    $postmeta .= "\t" . prism_postmeta_authorlink() . "\n\n";
	    $postmeta .= "\t" . '<span class="meta-sep meta-sep-entry-date"> | </span>'. "\n\n";
	    $postmeta .= "\t" . prism_postmeta_entrydate() . "\n\n";
	    
	    $postmeta .= "\t" . prism_postmeta_editlink() . "\n\n";
	                   
	    $postmeta .= '</div><!-- .entry-meta -->' . "\n";
	    
	    return apply_filters('prism_postheader_postmeta',$postmeta); 
	
	}
} // end postheader_postmeta


if ( ! function_exists( 'prism_postmeta_authorlink' ))  {
	/**
	 * Create the author link for post meta
	 * 
	 * Filter: prism_postmeta_authorlink
	 */
	function prism_postmeta_authorlink() {
		global $authordata;
	
	    $author_prep = '<span class="meta-prep meta-prep-author">' . __('By', 'prism') . ' </span>';
	    
	    if ( prism_is_custom_post_type() && !current_theme_supports( 'prism_support_post_type_author_link' ) ) {
	    	$author_info  = '<span class="vcard"><span class="fn nickname">';
	    	$author_info .= get_the_author_meta( 'display_name' ) ;
	    	$author_info .= '</span></span>';
	    } else {
	    	$author_info  = '<span class="author vcard">';
	    	$author_info .= sprintf('<a class="url fn n" href="%s" title="%s">%s</a>',
	    							get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
									/* translators: author name */
	    							sprintf( esc_attr__( 'View all posts by %s', 'prism' ), get_the_author_meta( 'display_name' ) ),
	    							get_the_author_meta( 'display_name' ));
	    	$author_info .= '</span>';
	    }
	    
	    $author_credit = $author_prep . $author_info ;
	    
	    return apply_filters('prism_postmeta_authorlink', $author_credit);
	   
	}
} // end postmeta_authorlink


if ( ! function_exists( 'prism_postmeta_entrydate' ))  {
	/**
	 * Create entry date for post meta
	 * 
	 * Filter: prism_postmeta_entrydate
	 */ 
	function prism_postmeta_entrydate() {
	
	    $entrydate = '<span class="meta-prep meta-prep-entry-date">' . __('Published:', 'prism') . ' </span>';
	    $entrydate .= '<span class="entry-date"><abbr class="published" title="';
	    $entrydate .= get_the_time(prism_time_title()) . '">';
	    $entrydate .= get_the_time(prism_time_display());
	    $entrydate .= '</abbr></span>';
	    
	    return apply_filters('prism_postmeta_entrydate', $entrydate);
	   
	}
} // end postmeta_entrydate


if ( ! function_exists( 'prism_postmeta_editlink' ))  {
	/**
	 * Create edit link for post meta
	 * 
	 * Filter: prism_postmeta_editlink
	 */
	function prism_postmeta_editlink() {
    
	    // Display edit link
	    if (current_user_can('edit_posts' )) {
	        $editlink = '<span class="meta-sep meta-sep-edit">|</span> ' . "\n\n\t\t\t\t\t\t" . prism_postheader_posteditlink();
	        return apply_filters('prism_postmeta_editlink', $editlink);
	    }               
	}
} // end postmeta_editlink


// Sets up the post content 
if ( ! function_exists( 'prism_content_init' ))  {
	/**
	 * Set up the post content to use excerpt or full posts
	 * 
	 * Uses conditional template tags to decide whether posts should be displayed using excerpts or the full content
	 * 
	 * Filter: prism_content
	 */
	function prism_content_init() {
		global $prism_content_length;
		
		$content = '';
		$prism_content_length = '';
		
		if (is_home() || is_front_page()) { 
			$content = 'full';
		} elseif (is_single()) {
			$content = 'full';
		} elseif (is_tag()) {
			$content = 'excerpt';
		} elseif (is_search()) {
			$content = 'excerpt';	
		} elseif (is_category()) {
			$content = 'excerpt';
		} elseif (is_author()) {
			$content = 'excerpt';
		} elseif (is_archive()) {
			$content = 'excerpt'; 
		}
		
		$prism_content_length = apply_filters('prism_content', $content);
		
	}
} // end content_init

add_action('prism_abovepost','prism_content_init');


if ( ! function_exists( 'prism_content' ))  {
	/**
	 * Create the post content
	 *
	 * Detects whether to use the full length or excerpt of a post and displays it. Post thumbnails are included on
	 * excerpt posts.
	 * 
	 * Filter: prism_post_thumbs <br>
	 * Filter: prism_post_thumb_size <br>
	 * Filter: prism_post_thumb_attr <br>
	 * Filter: prism_post 
	 */
	function prism_content() {
		global $prism_content_length;
	
		if ( strtolower($prism_content_length) == 'full' ) {
			$post = get_the_content( prism_more_text() );
			$post = apply_filters('the_content', $post);
			$post = str_replace(']]>', ']]&gt;', $post);
		} elseif ( strtolower($prism_content_length) == 'excerpt') {
			$post = '';
			$post .= get_the_excerpt();
			$post = apply_filters('the_excerpt',$post);
			if ( apply_filters( 'prism_post_thumbs', TRUE) ) {
				$post_title = get_the_title();
				$size = apply_filters( 'prism_post_thumb_size' , array(100,100) );
				$attr = apply_filters( 'prism_post_thumb_attr', array('title'	=> sprintf( esc_attr__('Permalink to %s', 'prism'), the_title_attribute( 'echo=0' ) ) ) );
				if ( has_post_thumbnail() ) {
					$post = sprintf('<a class="entry-thumb" href="%s" title="%s">%s</a>',
									get_permalink() ,
									sprintf( esc_attr__('Permalink to %s', 'prism'), the_title_attribute( 'echo=0' ) ),
									get_the_post_thumbnail(get_the_ID(), $size, $attr)) . $post;
					}
			}
		} elseif ( strtolower($prism_content_length) == 'none') {
		} else {
			$post = get_the_content( prism_more_text() );
			$post = apply_filters('the_content', $post);
			$post = str_replace(']]>', ']]&gt;', $post);
		}
		echo apply_filters('prism_post', $post);
	} 
} // end content


if ( ! function_exists( 'prism_archivesopen' ))  {
	/**
	 * Open the list of archived posts in the page template Archives Page
	 */
	function prism_archivesopen() { ?>
		
		<ul id="archives-page" class="xoxo">
<?php }
} // end archivesopen

add_action('prism_archives', 'prism_archivesopen', 1);


if ( ! function_exists( 'prism_category_archives' ))  {
	/**
	 * Display category archives 
	 * 
	 * Added to the archive list on the page template Archives Page
	 */
	function prism_category_archives() { ?>
				<li id="category-archives" class="content-column">
					<h2><?php _e('Archives by Category', 'prism') ?></h2>
					<ul>
						<?php wp_list_categories(array('optioncount' => true, 
														'feed' => 'RSS',
														'title_li' => '',
														'show_count' => true)); ?> 
					</ul>
				</li>
<?php }
} // end category_archives

add_action('prism_archives', 'prism_category_archives', 3);


if ( ! function_exists( 'prism_monthly_archives' ))  {
	/**
	 * Display monthly archives 
	 * 
	 * Added to the archive list on the page template Archives Page
	 */
	function prism_monthly_archives() { ?>
				<li id="monthly-archives" class="content-column">
					<h2><?php _e('Archives by Month', 'prism') ?></h2>
					<ul>
						<?php wp_get_archives(array('type' => 'monthly',
													'show_post_count' => true )); ?>
					</ul>
				</li>
<?php }
} // end monthly_archives

add_action('prism_archives', 'prism_monthly_archives', 5);


 if ( ! function_exists( 'prism_archivesclose' ))  {
	/**
	 * Close the archive list used in the page template Archives Page
	 */
	function prism_archivesclose() { ?>
		</ul>
<?php }
} // end _archivesclose

add_action('prism_archives', 'prism_archivesclose', 9);
		

/**
 * Register action hook: prism_404 
 *
 * Located in 404.php
 */
function prism_404() {
	do_action('prism_404');
} // end prism_404


if ( ! function_exists('prism_404_content') )  {
	/**
	 * Create the content for the 404 Error page
	 * 
	 * Located in 404.php
	 */
	function prism_404_content() { ?>
  			<?php prism_postheader(); ?>
  			
			<div class="entry-content">
				<p><?php _e( 'Apologies, but we were unable to find what you were looking for. Perhaps searching will help.', 'prism' ) ?></p>
			</div><!-- .entry-content -->		
			
			<?php prism_search_form( '404' ) ?>
<?php }
} // end 404_content

add_action( 'prism_404','prism_404_content' );


/**
 * Create the $more_link_text for the_content
 * 
 * Used on posts that are divided using the more tag in post editor
 * 
 * Filter: more_text
 */
function prism_more_text() {
	/* translators: %s is right angle brackets */
	$content = sprintf ( __('Read More %s', 'prism'), ' <span class="meta-nav">&raquo;</span>');
	return apply_filters('more_text', $content);
} // end prism_more_text


/**
 * Create the arguments for wp_list_bookmarks in links.php
 * 
 * Filter: list_bookmarks_args
 *
 */
function prism_list_bookmarks_args() {
	$content = array ( 'title_before' => '<h2>',
						'title_after' => '</h2>');
	return apply_filters('list_bookmarks_args', $content);
} // end prism_list_bookmarks_args


if ( ! function_exists( 'prism_postfooter' ))  {
	/**
	 * Create the post footer
	 * 
	 * Filter: prism_postfooter
	 */
	function prism_postfooter() {
	    	    
	    $post_type = get_post_type();
	    $post_type_obj = get_post_type_object($post_type);
	    
		// Check for "Page" post-type and logged in user to show edit link
	    if ( $post_type == 'page' && current_user_can('edit_posts') ) {
	        $postfooter = prism_postfooter_posteditlink();
	    // Display nothing for logged out users on a "Page" post-type 
	    } elseif ( $post_type == 'page' ) {
	        $postfooter = '';
	    // For post-types other than "Pages" press on
	    } else {
	    	$postfooter = '';
	        if ( is_single() ) {
	        	$post_type_archive_link = ( function_exists( 'get_post_type_archive_link' )  ? get_post_type_archive_link( $post_type ) :  home_url( '/?post_type=' . $post_type ) );
	        	if ( prism_is_custom_post_type() && $post_type_obj->has_archive ) {
		
					/* translators: %s is custom post type singular name, wrapped in link tags */
					$postfooter .= sprintf( __( 'Browse the %s archive.', 'prism' ), 
					/* translators: %s is custom post type singular name */
					' <a href="' . $post_type_archive_link . '" title="' . sprintf( esc_attr__( 'Permalink to %s Archive', 'prism' ), $post_type_obj->labels->singular_name )  . '">' . $post_type_obj->labels->singular_name . '</a>'
					);
					$postfooter .= ' ';

	        	}
	        	$postfooter .= prism_postfooter_posttax();
	    		$postfooter .= sprintf( _x('Bookmark the %1$spermalink%2$s.', '1s and 2s are the a href link wrappers, do not reverse them', 'prism'), sprintf('<a title="%s" href="%s">', sprintf( esc_attr__('Permalink to %s', 'prism'), the_title_attribute( 'echo=0' ) ), apply_filters('the_permalink', get_permalink())) , '</a>') . ' ';

	    			if ( post_type_supports( $post_type, 'comments') ) {
	            		$postfooter .= prism_postfooter_postconnect();
	            	}
	        } elseif ( post_type_supports( $post_type, 'comments') ) {
	        	$postfooter .= prism_postfooter_posttax();
	            $postfooter .= prism_postfooter_postcomments();
	        }
	       	// Display edit link
	    	if (current_user_can('edit_posts' )) {
	    		if ( !is_single() && post_type_supports( $post_type, 'comments') ) {
	        		$postfooter .= "\n\n\t\t\t\t\t\t" . '<span class="meta-sep meta-sep-edit">|</span> ';
	        	} 
	        	$postfooter .= ' ' . prism_postfooter_posteditlink();
	    	}   
	    }

	    if($postfooter != '')
	    	$postfooter = '<footer class="entry-utility">' . $postfooter . "</footer><!-- .entry-utility -->\n";

	    // Put it on the screen
	    echo apply_filters( 'prism_postfooter', $postfooter ); // Filter to override default post footer
    }
} // end postfooter


if ( ! function_exists( 'prism_postfooter_posteditlink' ))  {
	/**
	 * Create the post edit link for the post footer
	 * 
	 * Filter: prism_postfooter_posteditlink
	 */
	function prism_postfooter_posteditlink() {

	    $posteditlink = sprintf( '<a href="%s" title="%s" class="edit">%s</a>' , 
			    			get_edit_post_link(),
			    			esc_attr__('Edit post', 'prism'),
							/* translators: post edit link */
			    			__('Edit', 'prism' ));


	    return apply_filters('prism_postfooter_posteditlink',$posteditlink); 
	    
	} 
} // end postfooter_posteditlink


if ( ! function_exists( 'prism_postfooter_posttax' ))  {
	/**
	 * Create the taxonomy list for the post footer
	 * 
	 * Lists categories, tags, and custom taxonomies
	 * 
	 * Filter: prism_postfooter_posttax
	 */
	function prism_postfooter_posttax() {		
		
		$post_type_tax = get_post_taxonomies();
		$post_tax_list = ''; 
		
		if ( isset($post_type_tax) && $post_type_tax ) { 
	    	foreach ( $post_type_tax as $tax  )   {
	    		if ($tax  == 'category') {
	    			$post_tax_list .= prism_postfooter_postcategory();
	    		} elseif ($tax  == 'post_tag') {
	    			$post_tax_list .= prism_postfooter_posttags();
	    		} else {
	    			$post_tax_list .= prism_postfooter_postterms($tax);
	    		}
	    	}
	    }
		return apply_filters('prism_postfooter_posttax',$post_tax_list); // Filter for default post terms	
	}
}


if ( ! function_exists( 'prism_postfooter_postterms' ))  {
	/**
	 * Create the list of custom taxonomy terms for post footer
	 *
	 * Filter: prism_postfooter_postterms
	 * 
	 * @param string $tax The taxonomy that the terms will be fetched from
	 */
	function prism_postfooter_postterms($tax) {
		global $post;
		
		if ($tax == 'post_format') return;
		$tax_terms = '';	
		$tax_obj = get_taxonomy($tax);
		
		if ( wp_get_object_terms($post->ID, $tax) ) {
			$term_list = get_the_term_list( 0, $tax, '' , ', ', '' );		
			$tax_terms = '<span class="' . $tax . '-links">';
			
			if ( strpos( $term_list, ',' ) ) {
				$tax_terms .= $tax_obj->labels->name . ': ';
			} else {
				$tax_terms .= $tax_obj->labels->singular_name . ': ';
			}
			
			$tax_terms .= $term_list;

			if ( is_single() ) { 
		 		$tax_terms .= '. ';
		 		$tax_terms .= '</span>';
			} else {
				$tax_terms .= '</span>' . "\n\n\t\t\t\t\t\t" . '<span class="meta-sep meta-sep-tag-links">|</span> ';
			}
			
		}
		
		return apply_filters('prism_postfooter_postterms', $tax_terms ); // Filter for custom taxonomy terms
	}
}


if ( ! function_exists( 'prism_postfooter_postcategory' ))  {
	/**
	 * Create the category list for post footer
	 * 
	 * Filter: prism_postfooter_postcategory
	 */
	function prism_postfooter_postcategory() {
    
	    $postcategory = "\n\n\t\t\t\t\t\t" . '<span class="cat-links">';
	    if (is_single()) {
			/* translators: %s is postfooter categories */
	        $postcategory .= sprintf( __('This entry was posted in %s', 'prism'), get_the_category_list(', ') );
	        $postcategory .= '</span>';
	        $posttags = get_the_tags();
			if ( !$posttags ) {
				$postcategory .= '. ';
			} else {
				//$postcategory .= ' ';
			}

	    } elseif ( is_category() && $cats_meow = prism_cats_meow(', ') ) { /* Returns categories other than the one queried */
			/* translators: %s is postfooter categories */
	        $postcategory .= sprintf( __('Also posted in %s', 'prism'), $cats_meow );
	        $postcategory .= '</span>' . "\n\n\t\t\t\t\t\t" . '<span class="meta-sep meta-sep-tag-links">|</span> ';
	    } else {
			/* translators: %s is postfooter categories */
	        $postcategory .= sprintf( __('Posted in %s', 'prism'), get_the_category_list(', ') );
	        $postcategory .= '</span>' . "\n\n\t\t\t\t\t\t" . '<span class="meta-sep meta-sep-tag-links">|</span> ';
	    }
	    return apply_filters('prism_postfooter_postcategory',$postcategory); 
	    
	}
}  // end postfooter_postcategory


if ( ! function_exists( 'prism_postfooter_posttags' ))  {
	/**
	 * Create the tags list for post footer
	 * 
	 * Filter: prism_postfooter_posttags
	 */
	function prism_postfooter_posttags() {

	    if ( is_single() && !is_object_in_taxonomy( get_post_type(), 'category' ) ) {
	        $tagtext = __('This entry is tagged', 'prism') . ' ';
	        $posttags = get_the_tag_list("<span class=\"tag-links\"> $tagtext ",', ','</span>. ');
	    } elseif ( is_single() ) {
	    	$tagtext = __('and tagged', 'prism') . ' ';
	        $posttags = get_the_tag_list("<span class=\"tag-links\"> $tagtext ",', ','</span>. ');
	    } elseif ( is_tag() && $tag_ur_it = prism_tag_ur_it(', ') ) { /* Returns tags other than the one queried */
	        $posttags = '<span class="tag-links">' . __('Also tagged', 'prism') . ' ' . $tag_ur_it . '</span>' . "\n\n\t\t\t\t\t\t" . '<span class="meta-sep meta-sep-comments-link">|</span> ';
	    } else {
	        $tagtext = __('Tagged', 'prism') . ' ';
	        $posttags = get_the_tag_list("<span class=\"tag-links\"> $tagtext ",', ','</span>' . "\n\n\t\t\t\t\t\t" . '<span class="meta-sep meta-sep-comments-link">|</span> ');
	    }
	    return apply_filters('prism_postfooter_posttags',$posttags); 
	
	}
} // end postfooter_posttags


if ( ! function_exists( 'prism_postfooter_postcomments' ))  {
	/**
	 * Create the comments link for the post footer on archive pages
	 * 
	 * Filter: prism_postfooter_postcomments
	 */
	function prism_postfooter_postcomments() {
	    if (comments_open()) {
	        $postcommentnumber = get_comments_number();

	        if ($postcommentnumber > '0') {
	        	$postcomments = sprintf('<span class="comments-link"><a href="%s" title="%s" rel="bookmark">%s</a></span>',
	        						apply_filters('the_permalink', get_permalink()) . '#respond',
	        						sprintf( esc_attr__('Comment on %s', 'prism'), the_title_attribute( 'echo=0' ) ),
									/* translators: number of comments and trackbacks */
	        						sprintf( _n('%s Response', '%s Responses', $postcommentnumber, 'prism'), number_format_i18n( $postcommentnumber ) ) );
			} else {
	            $postcomments = sprintf('<span class="comments-link"><a href="%s" title="%s" rel="bookmark">%s</a></span>',
	        						apply_filters('the_permalink', get_permalink()) . '#respond',
	        						sprintf( esc_attr__('Comment on %s', 'prism'), the_title_attribute( 'echo=0' ) ),
	        						__('Leave a comment', 'prism' ));
	        }
	    } else {
	        $postcomments = '<span class="comments-link comments-closed-link">' . __('Comments closed', 'prism') .'</span>';
	    }            
	    return apply_filters('prism_postfooter_postcomments',$postcomments); 
	}
} // end postfooter_postcomments


if ( ! function_exists( 'prism_postfooter_postconnect' ))  {
	/**
	 * Create the comments link for the post footer on single posts
	 * 
	 * Filter: prism_postfooter_postconnect
	 */
		function prism_postfooter_postconnect() {
    
	    if ((comments_open()) && (pings_open())) { /* Comments are open */
	        $postconnect = sprintf( _x('%1$sPost a comment%2$s or leave a trackback: %3$s', '1s and 2s are the a href link wrappers, do not reverse them. 3s is trackback url.', 'prism'), 
								sprintf('<a class="comment-link" title="%s" href="#respond">', esc_attr__('Post a comment', 'prism' )), 
								'</a>' ,
								sprintf('<a class="trackback-link" href="%s" title ="%s" rel="trackback">%s</a>.', 
									get_trackback_url(),
									esc_attr__('Trackback URL for your post', 'prism'),
						 			__('Trackback URL', 'prism' ))
							);
	    } elseif (!(comments_open()) && (pings_open())) { /* Only trackbacks are open */
	        $postconnect = sprintf( _x('Comments are closed, but you can leave a trackback: %s', '%s is trackback url, wrapped in link tags', 'prism'),
							sprintf('<a class="trackback-link" href="%s" title="%s" rel="trackback">%s</a>.', 
								get_trackback_url(), 
								esc_attr__('Trackback URL for your post', 'prism'), 
								__('Trackback URL', 'prism' ))
							);
	    } elseif ((comments_open()) && !(pings_open())) { /* Only comments open */
	        $postconnect = sprintf( __('Trackbacks are closed, but you can %1$spost a comment%2$s.', '1s and 2s are the a href link wrappers, do not reverse them', 'prism'), sprintf('<a class="comment-link" title="%s" href="#respond">', esc_attr__('Post a comment', 'prism' )), '</a>');
	    } elseif (!(comments_open()) && !(pings_open())) { /* Comments and trackbacks closed */
	        $postconnect = __('Both comments and trackbacks are currently closed.', 'prism');
	    }
	    return apply_filters('prism_postfooter_postconnect',$postconnect); 
	}
} // end postfooter_postconnect


// Action to create the below navigation
if ( ! function_exists( 'prism_nav_below' ))  {
	/**
	 * Create the below navigation
	 * 
	 * Provides compatibility with WP-PageNavi plugin
	 * 
	 * @link http://wordpress.org/extend/plugins/wp-pagenavi/ WP-PageNavi Plugin Page
	 */
	function prism_nav_below() {
		if (is_single()) { ?>

			<nav id="nav-below" class="navigation">
				<div class="nav-previous"><?php prism_previous_post_link() ?></div>
				<div class="nav-next"><?php prism_next_post_link() ?></div>
			</nav>

<?php
		} else { ?>

			<nav id="nav-below" class="navigation">
                <?php if( ! function_exists( 'wp_pagenavi' )) { ?>
                <?php wp_pagenavi(); ?>
                <?php } else { ?>  
				
				<div class="nav-previous"><?php next_posts_link(sprintf('<span class="meta-nav">&laquo;</span> %s', __('Older posts', 'prism') ) ) ?></div>
					
				<div class="nav-next"><?php previous_posts_link(sprintf('%s <span class="meta-nav">&raquo;</span>',__( 'Newer posts', 'prism') ) ) ?></div>

				<?php } ?>
			</nav>	
	
<?php
		}
	}
} // end nav_below

add_action('prism_navigation_below', 'prism_nav_below', 2);


if ( ! function_exists( 'prism_previous_post_link' ))  {
	/**
	 * Create the previous post link on single pages
	 * 
	 * Filter: prism_previous_post_link_args
	 */
	function prism_previous_post_link() {
	
		$args = array ( 
			'format'              => '%link',
			'link'                => '<span class="meta-nav">&laquo;</span> %title',
			'in_same_cat'         => FALSE,
			'excluded_categories' => ''
		);
						
		$args = apply_filters('prism_previous_post_link_args', $args );
		
		previous_post_link($args['format'], $args['link'], $args['in_same_cat'], $args['excluded_categories']);
	}
} // end previous_post_link


if ( ! function_exists( 'prism_next_post_link' ))  {
	/**
	 * Create the next post link on single pages
	 * 
	 * Filter: prism_next_post_link_args
	 */
	function prism_next_post_link() {
		$args = array (
			'format' => '%link',
			'link' => '%title <span class="meta-nav">&raquo;</span>',
			'in_same_cat' => FALSE,
			'excluded_categories' => ''
		);
		
		$args = apply_filters('prism_next_post_link_args', $args );
		next_post_link($args['format'], $args['link'], $args['in_same_cat'], $args['excluded_categories']);
	}
} // end next_post_link


if ( ! function_exists( 'prism_author_info_avatar' ))  {
	/**
	 * Create an avatar image for the author info
	 * 
	 * Includes the hCard-compliant photo class on the image. Located in author.php
	 */
	function prism_author_info_avatar() {
    
	    global $wp_query; $curauth = $wp_query->get_queried_object();
		
		$email = $curauth->user_email;
		$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar("$email") );
		echo $avatar;
	}
} // end author_info_avatar


if ( ! function_exists( 'prism_cats_meow' ))  {
	/**
	 * Create a category list with all categories except the current one
	 * 
	 * Used in post footer on category archives (redundant)
	 */
	function prism_cats_meow($glue) {
		$current_cat = single_cat_title( '', false );
		$separator = "\n";
		$cats = explode( $separator, get_the_category_list($separator) );
		foreach ( $cats as $i => $str ) {
			if ( strpos( $str, ">$current_cat<" ) > 0) {
				unset($cats[$i]);
				break;
			}
		}
		if ( empty($cats) )
			return false;
	
		return trim(join( $glue, $cats ));
	}
} // end cats_meow


if ( ! function_exists( 'prism_tag_ur_it' ))  {
	/**
	 * Create a tag list with all tags except the current one
	 * 
	 * Used in post footer on tag archives (redundant)
	 */
	function prism_tag_ur_it($glue) {
		$current_tag = single_tag_title( '', '',  false );
		$separator = "\n";
		$tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
		foreach ( $tags as $i => $str ) {
			if ( strpos( $str, ">$current_tag<" ) > 0 ) {
				unset($tags[$i]);
				break;
			}
		}
		if ( empty($tags) )
			return false;
		
		return trim( join( $glue, $tags ) );
	}
} // end prism_tag_ur_it


?>