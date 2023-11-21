<?php
// Register Custom Post Type Promotional Banner
function create_promotional_banner_cpt() {

	$labels = array(
		'name' => _x( 'Promotional Banners', 'Post Type General Name', 'zedds' ),
		'singular_name' => _x( 'Promotional Banner', 'Post Type Singular Name', 'zedds' ),
		'menu_name' => _x( 'Promotional Banners', 'Admin Menu text', 'zedds' ),
		'name_admin_bar' => _x( 'Promotional Banner', 'Add New on Toolbar', 'zedds' ),
		'archives' => __( 'Promotional Banner Archives', 'zedds' ),
		'attributes' => __( 'Promotional Banner Attributes', 'zedds' ),
		'parent_item_colon' => __( 'Parent Promotional Banner:', 'zedds' ),
		'all_items' => __( 'All Promotional Banners', 'zedds' ),
		'add_new_item' => __( 'Add New Promotional Banner', 'zedds' ),
		'add_new' => __( 'Add New', 'zedds' ),
		'new_item' => __( 'New Promotional Banner', 'zedds' ),
		'edit_item' => __( 'Edit Promotional Banner', 'zedds' ),
		'update_item' => __( 'Update Promotional Banner', 'zedds' ),
		'view_item' => __( 'View Promotional Banner', 'zedds' ),
		'view_items' => __( 'View Promotional Banners', 'zedds' ),
		'search_items' => __( 'Search Promotional Banner', 'zedds' ),
		'not_found' => __( 'Not found', 'zedds' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'zedds' ),
		'featured_image' => __( 'Featured Image', 'zedds' ),
		'set_featured_image' => __( 'Set featured image', 'zedds' ),
		'remove_featured_image' => __( 'Remove featured image', 'zedds' ),
		'use_featured_image' => __( 'Use as featured image', 'zedds' ),
		'insert_into_item' => __( 'Insert into Promotional Banner', 'zedds' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Promotional Banner', 'zedds' ),
		'items_list' => __( 'Promotional Banners list', 'zedds' ),
		'items_list_navigation' => __( 'Promotional Banners list navigation', 'zedds' ),
		'filter_items_list' => __( 'Filter Promotional Banners list', 'zedds' ),
	);
	$args = array(
		'label' => __( 'Promotional Banner', 'zedds' ),
		'description' => __( 'Promotional Banners for home page', 'zedds' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-format-gallery',
		'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 26,
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
	register_post_type( 'promotionalbanner', $args );

}
add_action( 'init', 'create_promotional_banner_cpt', 0 );

// Meta box with custom field
add_action( 'cmb2_init', 'bbh_add_promotionalbanner_meta_box' );
function bbh_add_promotionalbanner_meta_box() {

	$prefix = '_ewm_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'promotionalbanner_meta_box',
		'title'        => __( 'Promotional Banners Meta Data', 'zedds' ),
		'desc' 		   => 'Extra fields for promotional banners',
		'object_types' => array( 'promotionalbanner' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );



	$cmb->add_field( array(
		'name' => __( 'Banner Link', 'zedds' ),
		'desc' => 'Enter the URL of this banner',
		'id' => $prefix . 'promotionalbanner_link',
		'type' => 'text_url',
	) );

}

// Order by time
function babeehive_order_promotionalbanner($query) {
  if($query->is_admin) {

        if ($query->get('post_type') == 'promotionalbanner')
        {
          $query->set('orderby', 'time');
          $query->set('order', 'DESC');
        }
  }
  return $query;
}
add_filter('pre_get_posts', 'babeehive_order_promotionalbanner');

?>