<?php

/* Add feed query vars */
function mongabay_feeds_query_vars( $vars ) {

	$vars[] = 'show';
	$vars[] = 'feedtype';
	return $vars;

}
add_filter( 'query_vars', 'mongabay_feeds_query_vars' );


/* Modify feed query */
function mongabay_feeds_query($query) {

    if (!$query->is_feed) return;
	add_filter( 'option_posts_per_rss', 'mongabay_feeds_posts_no' );
    return $query;

}
add_filter('pre_get_posts','mongabay_feeds_query');

/* Set posts nubmer */
function mongabay_feeds_posts_no() {
	return get_query_var('show',20);
}

?>