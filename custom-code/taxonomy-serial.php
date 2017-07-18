<?php
add_action( 'init', 'mongabay_tax_register_serial', 0 );
function mongabay_tax_register_serial() {
	
	$labels = array(
		'name'              => _x( 'Serials', 'taxonomy general name' ),
		'singular_name'     => _x( 'Serial', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Serials' ),
		'popular_items'     => __( 'Popular Serials' ),
		'all_items'         => __( 'All Serials' ),
		'parent_item'       => NULL,
		'parent_item_colon' => NULL,
		'edit_item'         => __( 'Edit Serial' ),
		'update_item'       => __( 'Update Serial' ),
		'add_new_item'      => __( 'Add New Serial' ),
		'new_item_name'     => __( 'New Serial Name' ),
		'separate_items_with_commas' => __( 'Separate serials with commas' ),
		'add_or_remove_items'        => __( 'Add or remove serials' ),
		'choose_from_most_used'      => __( 'Choose from the most used serials' ),
		'not_found'                  => __( 'No serials found.' ),
		'menu_name'         => __( 'Serial' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'series' ),
	);

	register_taxonomy( 'serial', array('post'), $args );
}