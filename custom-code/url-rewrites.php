<?php
add_action('init', 'add_rewrite_url');
function add_rewrite_url()
{
    add_rewrite_rule(
        '^list/([^/]*)$',
        'index.php?taxonomy=location&location=$matches[1]',
        'top'
    );

    add_rewrite_rule(
        '^list/([^/]*)$',
        'index.php?taxonomy=topic&topic=$matches[1]',
        'top'
    );

}


add_action('init', 'custom_author_base');
function custom_author_base() {
    global $wp_rewrite;
    $author_slug = 'by';
    $wp_rewrite->author_base = $author_slug;
}