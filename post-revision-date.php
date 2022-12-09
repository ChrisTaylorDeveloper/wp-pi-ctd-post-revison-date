<?php
/**
 * Plugin Name: Post revison date
 * Author: Chris Taylor
 * Author URI: https://christaylordeveloper.co.uk
 */

function show_last_updated( $content ) {
	$args = array(
        'posts_per_page' => '1',
		'orderby' => 'post_date_gmt',
		'order'   => 'DESC',
	);

	global $post;
	$latest_version = wp_get_post_revisions( $post, $args );
	$revision_time = array_pop( $latest_version )->post_date_gmt;
    $revision_date_html = '<p class="last-updated">Updated: ' . date( 'd F Y', strtotime( $revision_time ) ) . ' </p>';
    return $revision_date_html . $content;
}
add_filter( 'the_content', 'show_last_updated' );
