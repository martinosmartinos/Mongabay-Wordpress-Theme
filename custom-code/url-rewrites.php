<?php
//add_action('init', 'custom_author_base');
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
//pagination
add_rewrite_rule( '^list/([^/]*)/page/([0-9]{1,})/?$', 'index.php?section=list&nc1=$matches[1]&paged=$matches[2]', "top" );
add_rewrite_rule( '^list/([^/]*)/([^/]*)/page/([0-9]{1,})/?$', 'index.php?section=list&nc1=$matches[1]&nc2=$matches[2]&paged=$matches[3]', "top" );

//custom taxonomies
//add_rewrite_rule( '^by/([^/]*)/?$', 'byline=$matches[1]', 'top' );
//add_rewrite_rule( '^series/([^/]*)/?$', 'index.php?section=series&nc1=$matches[1]', 'top' );
add_rewrite_rule( '^topic/([^/]*)/?$', 'index.php?section=list&nc1=$matches[1]', 'top' );
add_rewrite_rule( '^list/([^/]*)/([^/]*)/?$', 'index.php?section=list&nc1=$matches[1]&nc2=$matches[2]', 'top' );
add_rewrite_rule( '^list/([^/]*)/?$', 'index.php?section=list&nc1=$matches[1]', 'top' );
add_rewrite_rule( '^wildtech/([0-9]{4})/([0-9]{1,2})/([^/]*)/?$', 'index.php?year=$matches[1]&monthnum=$matches[2]&name=$matches[3]', 'top' );
add_rewrite_rule( '^list/?$', 'index.php?section=list', 'top' );

//legacy support
add_rewrite_rule( 'news.xml$', 'index.php?section=movedxml&nc1=news', 'top' );
add_rewrite_rule( 'xml/([^/]*).xml$', 'index.php?section=movedxml&nc1=$matches[1]', 'top' );
    
add_rewrite_rule( '([0-9]{4})/([^/]*).html$', 'index.php?section=moved&nc1=$matches[1]&nc2=$matches[2]', 'top' );
add_rewrite_rule( 'news/([0-9]{4})/([^/]*).html$', 'index.php?section=moved&nc1=$matches[1]&nc2=$matches[2]', 'top' );
add_rewrite_rule( '([^/]*)/images/([^/]*).html$', 'index.php?section=moved&nc1=$matches[1]&nc2=$matches[2]', 'top' );
add_rewrite_rule( '([^/]*)/images/([^/]*)/([^/]*).html$', 'index.php?section=moved&nc1=$matches[1]&nc2=$matches[2]', 'top' );
}