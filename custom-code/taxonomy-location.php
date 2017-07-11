<?php
add_action( 'init', 'mongabay_tax_register_location', 0 );
function mongabay_tax_register_location() {
	
	$labels = array(
		'name'              => _x( 'Locations', 'taxonomy general name' ),
		'singular_name'     => _x( 'Location', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Locations' ),
		'popular_items'     => __( 'Popular Locations' ),
		'all_items'         => __( 'All Locations' ),
		'parent_item'       => NULL,
		'parent_item_colon' => NULL,
		'edit_item'         => __( 'Edit Location' ),
		'update_item'       => __( 'Update Location' ),
		'add_new_item'      => __( 'Add New Location' ),
		'new_item_name'     => __( 'New Location Name' ),
		'separate_items_with_commas' => __( 'Separate locations with commas' ),
		'add_or_remove_items'        => __( 'Add or remove locations' ),
		'choose_from_most_used'      => __( 'Choose from the most used locations' ),
		'not_found'                  => __( 'No locations found.' ),
		'menu_name'         => __( 'Location' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array(
			'with_front' => true,
			'slug' => 'location'
			)
	);

	register_taxonomy( 'location', array('post'), $args );
}
?>
