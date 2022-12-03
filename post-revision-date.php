<?php
/**
 * Plugin Name: Post revison date
 * Author: Chris Taylor
 * Author URI: https://christaylordeveloper.co.uk
 */

function show_last_updated( $content ) {
    $u_time = get_the_time( 'U' );
    $u_modified_time = get_the_modified_time( 'U' );

    if ( $u_modified_time >= $u_time + 86400 ) {
        $rev_date_el = '<p class="last-updated">Updated ' . get_the_modified_time( 'j F Y' ) . '</p>';
		return $rev_date_el . $content;
    }

    return $content;
}
add_filter( 'the_content', 'show_last_updated' );
