<?php
// Register Custom Post Type Home Collection
function create_homecollection_cpt() {

	$labels = array(
		'name' => _x( 'Home Collections', 'Post Type General Name', 'zedds' ),
		'singular_name' => _x( 'Home Collection', 'Post Type Singular Name', 'zedds' ),
		'menu_name' => _x( 'Home Collections', 'Admin Menu text', 'zedds' ),
		'name_admin_bar' => _x( 'Home Collection', 'Add New on Toolbar', 'zedds' ),
		'archives' => __( 'Home Collection Archives', 'zedds' ),
		'attributes' => __( 'Home Collection Attributes', 'zedds' ),
		'parent_item_colon' => __( 'Parent Home Collection:', 'zedds' ),
		'all_items' => __( 'All Home Collections', 'zedds' ),
		'add_new_item' => __( 'Add New Home Collection', 'zedds' ),
		'add_new' => __( 'Add New', 'zedds' ),
		'new_item' => __( 'New Home Collection', 'zedds' ),
		'edit_item' => __( 'Edit Home Collection', 'zedds' ),
		'update_item' => __( 'Update Home Collection', 'zedds' ),
		'view_item' => __( 'View Home Collection', 'zedds' ),
		'view_items' => __( 'View Home Collections', 'zedds' ),
		'search_items' => __( 'Search Home Collection', 'zedds' ),
		'not_found' => __( 'Not found', 'zedds' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'zedds' ),
		'featured_image' => __( 'Featured Image', 'zedds' ),
		'set_featured_image' => __( 'Set featured image', 'zedds' ),
		'remove_featured_image' => __( 'Remove featured image', 'zedds' ),
		'use_featured_image' => __( 'Use as featured image', 'zedds' ),
		'insert_into_item' => __( 'Insert into Home Collection', 'zedds' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Home Collection', 'zedds' ),
		'items_list' => __( 'Home Collections list', 'zedds' ),
		'items_list_navigation' => __( 'Home Collections list navigation', 'zedds' ),
		'filter_items_list' => __( 'Filter Home Collections list', 'zedds' ),
	);
	$args = array(
		'label' => __( 'Home Collection', 'zedds' ),
		'description' => __( '', 'zedds' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-multisite',
		'supports' => array('title', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 25,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => false,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'homecollection', $args );

}
add_action( 'init', 'create_homecollection_cpt', 0 );

// Meta box with custom field
add_action( 'cmb2_init', 'zedds_add_collection_meta_box' );
function zedds_add_collection_meta_box() {

	$prefix = '_zeeds_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'collection_meta_box',
		'title'        => __( 'Collection Meta Data', 'zedds' ),
		'desc' 		   => 'Extra fields for collections',
		'object_types' => array( 'homecollection' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );



	$cmb->add_field( array(
		'name' => __( 'Collection Link', 'zedds' ),
		'desc' => 'Enter the URL of this collection',
		'id' => $prefix . 'collection_link',
		'type' => 'text_url',
	) );

}

// Order by time
function zedds_order_collection($query) {
  if($query->is_admin) {

        if ($query->get('post_type') == 'homecollection')
        {
          $query->set('orderby', 'time');
          $query->set('order', 'DESC');
        }
  }
  return $query;
}
add_filter('pre_get_posts', 'zedds_order_collection');
?>