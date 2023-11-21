<?php
// Register Custom Post Type Home Banner
function create_homebanner_cpt() {

	$labels = array(
		'name' => _x( 'Home Banners', 'Post Type General Name', 'zedds' ),
		'singular_name' => _x( 'Home Banner', 'Post Type Singular Name', 'zedds' ),
		'menu_name' => _x( 'Home Banners', 'Admin Menu text', 'zedds' ),
		'name_admin_bar' => _x( 'Home Banner', 'Add New on Toolbar', 'zedds' ),
		'archives' => __( 'Home Banner Archives', 'zedds' ),
		'attributes' => __( 'Home Banner Attributes', 'zedds' ),
		'parent_item_colon' => __( 'Parent Home Banner:', 'zedds' ),
		'all_items' => __( 'All Home Banners', 'zedds' ),
		'add_new_item' => __( 'Add New Home Banner', 'zedds' ),
		'add_new' => __( 'Add New', 'zedds' ),
		'new_item' => __( 'New Home Banner', 'zedds' ),
		'edit_item' => __( 'Edit Home Banner', 'zedds' ),
		'update_item' => __( 'Update Home Banner', 'zedds' ),
		'view_item' => __( 'View Home Banner', 'zedds' ),
		'view_items' => __( 'View Home Banners', 'zedds' ),
		'search_items' => __( 'Search Home Banner', 'zedds' ),
		'not_found' => __( 'Not found', 'zedds' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'zedds' ),
		'featured_image' => __( 'Featured Image', 'zedds' ),
		'set_featured_image' => __( 'Set featured image', 'zedds' ),
		'remove_featured_image' => __( 'Remove featured image', 'zedds' ),
		'use_featured_image' => __( 'Use as featured image', 'zedds' ),
		'insert_into_item' => __( 'Insert into Home Banner', 'zedds' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Home Banner', 'zedds' ),
		'items_list' => __( 'Home Banners list', 'zedds' ),
		'items_list_navigation' => __( 'Home Banners list navigation', 'zedds' ),
		'filter_items_list' => __( 'Filter Home Banners list', 'zedds' ),
	);
	$args = array(
		'label' => __( 'Home Banner', 'zedds' ),
		'description' => __( 'Banners for home page', 'zedds' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-slides',
		'supports' => array('title', 'thumbnail', 'revisions'),
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
	register_post_type( 'homebanner', $args );

}
add_action( 'init', 'create_homebanner_cpt', 0 );

// Meta box with custom field
add_action( 'cmb2_init', 'bbh_add_homebanner_meta_box' );
function bbh_add_homebanner_meta_box() {

	$prefix = '_ewm_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'homebanner_meta_box',
		'title'        => __( 'Home Banners Meta Data', 'zedds' ),
		'desc' 		   => 'Extra fields for home page banners',
		'object_types' => array( 'homebanner' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );



	$cmb->add_field( array(
		'name' => __( 'Banner Link', 'zedds' ),
		'desc' => 'Enter the URL of this banner',
		'id' => $prefix . 'homebanner_link',
		'type' => 'text_url',
	) );

}

// Order by time
function babeehive_order_homebanner($query) {
  if($query->is_admin) {

        if ($query->get('post_type') == 'homebanner')
        {
          $query->set('orderby', 'time');
          $query->set('order', 'DESC');
        }
  }
  return $query;
}
add_filter('pre_get_posts', 'babeehive_order_homebanner');

?>