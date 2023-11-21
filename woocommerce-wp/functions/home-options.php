<?php
add_action( 'cmb2_init', 'zedds_add_homepage_shop_metabox' );
function zedds_add_homepage_shop_metabox() {

	$prefix = '_zedds_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'homepage_shop_metabox',
		'title'        => __( 'Home Page Shop Box', 'zedds' ),
		'object_types' => array( 'page' ),
		'show_on'      => array( 'key' => 'page-template', 'value' => 'page-template-home.php' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$cmb->add_field( array(
		'name' => __( 'Shop Box Title', 'zedds' ),
		'id' => $prefix . 'homepage_shop_title',
		'type' => 'text',
		'desc' => __( 'Enter the title of this box', 'zedds' ),
	) );

	$cmb->add_field( array(
		'name' => __( 'Shop Box Content', 'zedds' ),
		'id' => $prefix . 'homepage_shop_content',
		'type' => 'textarea_small',
		'desc' => __( 'Enter the text content of this box', 'zedds' ),
	) );

	$cmb->add_field( array(
		'name' => __( 'Shop Box Button LInk', 'zedds' ),
		'id' => $prefix . 'homepage_shop_url',
		'type' => 'text_url',
		'desc' => __( 'Enter the URL of the button of this box', 'zedds' ),
	) );

}

?>