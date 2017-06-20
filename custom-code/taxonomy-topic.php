<?php
// Create Filter Taxonomies
function mongabay_tax_register_topic() {
	$filter_content_types = array('post');
	
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
		'rewrite'           => array( 'slug' => 'topic' ),
	);

	register_taxonomy( 'topic', $filter_content_types, $args );
}


// Topic and Locations taxonomies meta fields - Display
function mongabay_tax_meta_fields_toploc($term) {
	if (isset($_GET['tag_ID'])) { $tid = intval($_GET['tag_ID']); }
	else $tid = 0;
	
 	$legacy_url = mb_termmeta( $tid , 'legacy_url'); 
	$cover_image_url = mb_termmeta( $tid , 'cover_image_url'); 
	//$tagline = mb_termmeta( $tid , 'tagline'); 

	?>
	<div class="form-field">
		<label for="term_meta[legacy_url]"><?php _e( 'Legacy URL', 'mongabay' ); ?></label>
		<input type="text" name="term_meta[legacy_url]" id="term_meta[legacy_url]" value="<?php echo esc_attr($legacy_url); ?>">
		<p class="description"><?php _e( 'Legacy URL on the original site. This should be auto-imported and shouldn\'t be modified manually.','mongabay' ); ?></p>
	</div>
    
    <div class="form-field">
		<label for="term_meta[cover_image_url]"><?php _e( 'Cover Image URL', 'mongabay' ); ?></label>
		<input type="text" name="term_meta[cover_image_url]" id="term_meta[cover_image_url]" value="<?php echo esc_attr($cover_image_url); ?>">
		<p class="description"><?php _e( 'URL to the Cover Image displayed on the category page.','mongabay' ); ?></p>
	</div>

    <?php
	
}
// Topic and Locations taxonomies meta fields - Save
function mongabay_tax_meta_fields_toploc_save( $tid ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$meta = $_POST['term_meta'];		
		mb_termmeta_set($tid,'legacy_url',$meta['legacy_url']);
		mb_termmeta_set($tid,'cover_image_url',$meta['cover_image_url']);
		//mb_termmeta_set($tid,'tagline',$meta['tagline']);
	}
}  
add_action( 'edited_topic', 'mongabay_tax_meta_fields_toploc_save', 10, 2 );  
add_action( 'create_topic', 'mongabay_tax_meta_fields_toploc_save', 10, 2 );
