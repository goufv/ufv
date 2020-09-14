<?php
/**
 * Customs RSS template with related posts.
 * 
 * Place this file in your theme's directory.
 *
 * @package sometheme
 * @subpackage theme
 */
/**
 * Get related posts.
 */
function my_rss_related() {
	global $post;
	// Setup post data
	$pid     = $post->ID;
	$tags    = wp_get_post_tags( $pid );
	$tag_ids = array();
	// Loop through post tags
	foreach ( $tags as $individual_tag ) {
		$tag_ids[] = $individual_tag->term_id;
	}
	// Execute WP_Query
	$related_by_tag = new WP_Query( array(
		'tag__in'          => $tag_ids,
		'post__not_in'     => array( $pid ),
		'posts_per_page'   => 6,
	) );
	// Loop through posts and build HTML
	if ( $related_by_tag->have_posts() ) :
		echo 'Related:<br />';
			while ( $related_by_tag->have_posts() ) : $related_by_tag->the_post();
				echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a><br />';
			endwhile;
		else :
			echo '';
	endif;
	wp_reset_postdata();
}
/**
 * Feed defaults.
 */
header( 'Content-Type: ' . feed_content_type( 'rss-http' ) . '; charset=' . get_option( 'blog_charset' ), true );
$frequency  = 1;        // Default '1'. The frequency of RSS updates within the update period.
$duration   = 'hourly'; // Default 'hourly'. Accepts 'hourly', 'daily', 'weekly', 'monthly', 'yearly'.
$postlink   = '<a href="' . get_permalink() . '" class="btn btn-success rss" role="button">Full story &raquo;</a>';
$postimages = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
$numwords 	= 20;
// Check for images
if ( $postimages ) {
	// Get featured image
	$postimage = $postimages[0];
} else {
	// Fallback to a default
	$postimage = get_stylesheet_directory_uri() . '/images/default.jpg';
}
/**
 * Start RSS feed.
 */
echo '<?xml version="1.0" encoding="' . get_option( 'blog_charset' ) . '"?' . '>'; ?>
<rss version="2.0"
xmlns:content="http://purl.org/rss/1.0/modules/content/"
xmlns:media="http://search.yahoo.com/mrss/"
xmlns:wfw="http://wellformedweb.org/CommentAPI/"
xmlns:dc="http://purl.org/dc/elements/1.1/"
xmlns:atom="http://www.w3.org/2005/Atom"
xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
<?php do_action( 'rss2_ns' ); ?>
>
<channel>
<title><?php bloginfo_rss( 'name' ); //wp_title_rss(); ?></title>
<link><?php bloginfo_rss( 'url' ) ?></link>
<description><?php bloginfo_rss( 'description' ) ?></description>
<lastBuildDate><?php echo mysql2date( 'D, d M Y H:i:s +0000', get_lastpostmodified( 'GMT' ), false ); ?></lastBuildDate>
<language><?php bloginfo_rss( 'language' ); ?></language>
<sy:updatePeriod><?php echo apply_filters( 'rss_update_period', $duration ); ?></sy:updatePeriod>
<sy:updateFrequency><?php echo apply_filters( 'rss_update_frequency', $frequency ); ?></sy:updateFrequency>
<atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
<image>
<url>https://www.ufv.ca/media/2015/ufv2015/imgs/badges/UFV-Social-Media-Badge-400px-MAIN.jpg</url>
<title><?php bloginfo_rss( 'name' ); //wp_title_rss(); ?></title>
<link><?php bloginfo_rss( 'url' ) ?></link>
</image><?php //do_action( 'rss2_head' ); ?>
<?php while( have_posts()) : the_post(); 
$postimages = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); if ( $postimages ) { 	$postimage = $postimages[0]; } else { $postimage = 'https://www.ufv.ca/media/2015/blogs/ufv-news-events-blogs.jpg'; }
?><item>
<title><?php the_title_rss(); ?></title>
<link><?php the_permalink_rss(); ?></link>
<guid isPermaLink="false"><?php the_guid(); ?></guid>
<image><![CDATA[<?php echo esc_url( $postimage ); ?>]]></image>
<media:content url="<?php echo esc_url( $postimage ); ?>" medium="image"/>
<pubDate><?php echo mysql2date( 'D, d M Y', get_post_time( 'Y-m-d H:i:s', true ), false ); ?></pubDate>
<description><![CDATA[<?php $excerpt = get_the_excerpt(); $excerpt = substr($excerpt,0,200); echo trim($excerpt); ?>]]></description>
</item>
<?php endwhile; ?>
</channel>
</rss>