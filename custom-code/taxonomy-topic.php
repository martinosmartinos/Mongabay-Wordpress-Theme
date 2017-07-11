<?php
add_action( 'init', 'mongabay_tax_register_topic', 0 );
function mongabay_tax_register_topic() {
	
	$labels = array(
		'name'              => _x( 'Topics', 'taxonomy general name' ),
		'singular_name'     => _x( 'Topic', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Topics' ),
		'popular_items'     => __( 'Popular Topics' ),
		'all_items'         => __( 'All Topics' ),
		'parent_item'       => NULL,
		'parent_item_colon' => NULL,
		'edit_item'         => __( 'Edit Topic' ),
		'update_item'       => __( 'Update Topic' ),
		'add_new_item'      => __( 'Add New Topic' ),
		'new_item_name'     => __( 'New Topic Name' ),
		'separate_items_with_commas' => __( 'Separate topics with commas' ),
		'add_or_remove_items'        => __( 'Add or remove topics' ),
		'choose_from_most_used'      => __( 'Choose from the most used topics' ),
		'not_found'                  => __( 'No topics found.' ),
		'menu_name'         => __( 'Topic' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array(
			'with_front' => true,
			'slug' => 'topic'
			)
	);

	register_taxonomy( 'topic', array('post'), $args );
}