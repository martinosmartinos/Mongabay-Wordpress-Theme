<?php
add_action('init', 'custom_author_base');
function custom_author_base() {
    global $wp_rewrite;
    $author_slug = 'by';
    $wp_rewrite->author_base = $author_slug;

}

add_action('init', 'add_rewrite_url');
function add_rewrite_url()
{
    // add_rewrite_rule(
    //     '^list/([^/]+)/?$',
    //     'index.php?location=$matches[1]',
    //     'bottom'
    // );

    // add_rewrite_rule(
    //     '^list/([^/]+)/?$',
    //     'index.php?topic=$matches[1]',
    //     'bottom'
    // );
    add_rewrite_rule( '^by/([^/]*)/?$', 'index.php?section=author&nc1=$matches[1]', 'top' );
    add_rewrite_rule( '^series/([^/]*)/?$', 'index.php?section=series&nc1=$matches[1]', 'top' );
	add_rewrite_rule( '^topic/([^/]*)/?$', 'index.php?section=news&nc1=$matches[1]', 'top' );
	add_rewrite_rule( '^list/([^/]*)/([^/]*)/?$', 'index.php?section=list&nc1=$matches[1]&nc2=$matches[2]', 'top' );
	add_rewrite_rule( '^list/([^/]*)/?$', 'index.php?section=list&nc1=$matches[1]', 'top' );
	add_rewrite_rule( '^wildtech/([0-9]{4})/([0-9]{1,2})/([^/]*)/?$', 'index.php?year=$matches[1]&monthnum=$matches[2]&name=$matches[3]', 'top' );
	add_rewrite_rule( '^list/?$', 'index.php?section=list', 'top' );
}