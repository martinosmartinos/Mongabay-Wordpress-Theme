<?php
// Create Filter Taxonomies
function mongabay_tax_register_serial() {
	$filter_content_types = array('post');
	
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
		'rewrite'           => array( 'slug' => 'serial' ),
	);

	register_taxonomy( 'serial', $filter_content_types, $args );
}


// Serial and Locations taxonomies meta fields - Display
function mongabay_tax_meta_fields_serial($term) {
	if (isset($_GET['tag_ID'])) { $tid = intval($_GET['tag_ID']); }
	else $tid = 0;
	
	$cover_image_url = mb_termmeta( $tid , 'cover_image_url'); 

	?>
    <div class="form-field">
		<label for="term_meta[cover_image_url]"><?php _e( 'Cover Image / Logo URL', 'mongabay' ); ?></label>
		<input type="text" name="term_meta[cover_image_url]" id="term_meta[cover_image_url]" value="<?php echo esc_attr($cover_image_url); ?>">
		<p class="description"><?php _e( 'URL to the Cover Image or Logo displayed on the serial page.','mongabay' ); ?></p>
	</div>

    <?php
	
} 
// Serial and Locations taxonomies meta fields - Save
function mongabay_tax_meta_fields_serial_save( $tid ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$meta = $_POST['term_meta'];
		
		mb_termmeta_set($tid,'cover_image_url',$meta['cover_image_url']);

	}
}  
add_action( 'edited_serial', 'mongabay_tax_meta_fields_serial_save', 10, 2 );  
add_action( 'create_serial', 'mongabay_tax_meta_fields_serial_save', 10, 2 );
