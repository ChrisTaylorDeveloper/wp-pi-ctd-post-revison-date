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
	$revision = wp_get_post_revisions( $post, $args );

	$revision_time = array_pop( $revision )->post_date_gmt;

    $rev_date_el = '<p class="last-updated">Updated ' . $revision_time . '</p>';

    return $rev_date_el . $content;
}
add_filter( 'the_content', 'show_last_updated' );
