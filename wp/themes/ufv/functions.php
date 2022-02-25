<?php

/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// Set path to WooFramework and theme specific functions
$functions_path = get_template_directory() . '/functions/';
$includes_path = get_template_directory() . '/includes/';

// Don't load alt stylesheet from WooFramework
if ( ! function_exists( 'woo_output_alt_stylesheet' ) ) {
	function woo_output_alt_stylesheet () {}
}

// Define the theme-specific key to be sent to PressTrends.
define( 'WOO_PRESSTRENDS_THEMEKEY', 'tnla49pj66y028vef95h2oqhkir0tf3jr' );

// WooFramework
require_once ( $functions_path . 'admin-init.php' );	// Framework Init

if ( get_option( 'woo_woo_tumblog_switch' ) == 'true' ) {
	//Enable Tumblog Functionality and theme is upgraded
	update_option( 'woo_needs_tumblog_upgrade', 'false' );
	update_option( 'tumblog_woo_tumblog_upgraded', 'true' );
	update_option( 'tumblog_woo_tumblog_upgraded_posts_done', 'true' );
	require_once ( $functions_path . 'admin-tumblog-quickpress.php' );  // Tumblog Dashboard Functionality 
}

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
				'includes/theme-options.php', 			// Options panel settings and custom settings
				'includes/theme-functions.php', 		// Custom theme functions
				'includes/theme-actions.php', 			// Theme actions & user defined hooks
				'includes/theme-comments.php', 			// Custom comments/pingback loop
				'includes/theme-js.php', 				// Load JavaScript via wp_enqueue_script
				'includes/sidebar-init.php', 			// Initialize widgetized areas
				'includes/theme-widgets.php',			// Theme widgets
				'includes/theme-advanced.php',			// Advanced Theme Functions
				'includes/theme-shortcodes.php',	 	// Custom theme shortcodes
				'includes/woo-layout/woo-layout.php',	// Layout Manager
				'includes/woo-meta/woo-meta.php',		// Meta Manager
				'includes/woo-hooks/woo-hooks.php'		// Hook Manager
				);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );

foreach ( $includes as $i ) {
	locate_template( $i, true );
}

// Load WooCommerce functions, if applicable.
if ( is_woocommerce_activated() ) {
	locate_template( 'includes/theme-woocommerce.php', true );
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/







function woo_archive_title ( $before = '', $after = '', $echo = true ) {
 	
 		global $wp_query;
 		
 		if ( is_category() || is_tag() || is_tax() ) {
 		
 			$taxonomy_obj = $wp_query->get_queried_object();
			$term_id = $taxonomy_obj->term_id;
			$taxonomy_short_name = $taxonomy_obj->taxonomy;
			
			$taxonomy_raw_obj = get_taxonomy( $taxonomy_short_name );
 		
 		} // End IF Statement
 	
		$title = '';
		$delimiter = ' | ';
		$date_format = get_option( 'date_format' );
		
		// Category Archive
		if ( is_category() ) {
			
			$title = '<span class="fl cat">' . single_cat_title( '', false ) . '</span> <span class="fr catrss">';
			$cat_obj = $wp_query->get_queried_object();
			$cat_id = $cat_obj->cat_ID;
			$title .= '<a href="' . get_term_feed_link( $term_id, $taxonomy_short_name, '' ) . '">' . __( 'RSS feed for this section','woothemes' ) . '</a></span>';
			
			$has_title = true;
		}
		
		// Day Archive
		if ( is_day() ) {
			
			$title = __( 'Archive', 'woothemes' ) . $delimiter . get_the_time( $date_format );
		}
		
		// Month Archive
		if ( is_month() ) {
			
			$date_format = apply_filters( 'woo_archive_title_date_format', 'F, Y' );
			$title = __( 'Archive', 'woothemes' ) . $delimiter . get_the_time( $date_format );
		}
		
		// Year Archive
		if ( is_year() ) {
			
			$date_format = apply_filters( 'woo_archive_title_date_format', 'Y' );
			$title = __( 'Archive', 'woothemes' ) . $delimiter . get_the_time( $date_format );
		}
		
		// Author Archive
		if ( is_author() ) {
		
			$title = __( 'Author Archive', 'woothemes' ) . $delimiter . get_the_author_meta( 'display_name', get_query_var( 'author' ) );
		}
		
		// Tag Archive
		if ( is_tag() ) {
		
			$title = __( 'Tag Archives', 'woothemes' ) . $delimiter . single_tag_title( '', false );
		}
		
		// Post Type Archive
		if ( function_exists( 'is_post_type_archive' ) && is_post_type_archive() ) {

			/* Get the post type object. */
			$post_type_object = get_post_type_object( get_query_var( 'post_type' ) );

			$title = $post_type_object->labels->name . ' ' . __( 'Archive', 'woothemes' );
		}
		
		// Post Format Archive
		if ( get_query_var( 'taxonomy' ) == 'post_format' ) {

			$post_format = str_replace( 'post-format-', '', get_query_var( 'post_format' ) );

			$title = get_post_format_string( $post_format ) . ' ' . __( ' Archives', 'woothemes' );
		}
		
		// General Taxonomy Archive
		if ( is_tax() ) {
		
			$title = sprintf( __( '%1$s Archives: %2$s' ), $taxonomy_raw_obj->labels->name, $taxonomy_obj->name );
		
		}
		
		if ( strlen($title) == 0 )
		return;
		
		$title = $before . $title . $after;
		
		// Allow for external filters to manipulate the title value.
		$title = apply_filters( 'woo_archive_title', $title, $before, $after );
		
		if ( $echo )
			echo $title;
		else
			return $title;
 	
 	} // End woo_archive_title()




/* 
Custom RSS Feed
Anthony Lepki - Aug 2016
*/

/*
* Custom RSS Feeds
*
*	
*/

add_action( 'after_setup_theme', 'my_rss_template' );
/**
 * Register custom RSS template.
 */
function my_rss_template() {
	add_feed( 'short', 'my_custom_rss_render' );
}
/**
 * Custom RSS template callback.
 */
function my_custom_rss_render() {
	get_template_part( 'feed', 'short' );
}


/*
MAILCHIMP RSS FEED
*/

add_action( 'after_setup_theme', 'my_rss_mailchimp' );

function my_rss_mailchimp() {
    add_feed( 'mailchimp', 'my_custom_rss_render_m' );
}
function my_custom_rss_render_m() {
    get_template_part( 'feed', 'mailchimp' );
}




/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>