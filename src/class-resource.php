<?php

namespace CleverBookingCalendar;

class Resource {


	public static function register() {
		self::register_post_type();
	}

	public static function register_post_type() {
		$labels = array(
			'name'               => __( 'Resources', CBC_SLUG ),
			'singular_name'      => __( 'Resource', CBC_SLUG ),
			'add_new'            => __( 'Add New', CBC_SLUG ),
			'add_new_item'       => __( 'Add New Resource', CBC_SLUG ),
			'edit_item'          => __( 'Edit Resource', CBC_SLUG ),
			'new_item'           => __( 'New Resource', CBC_SLUG ),
			'all_items'          => __( 'All Resources', CBC_SLUG ),
			'view_item'          => __( 'View Resource', CBC_SLUG ),
			'search_items'       => __( 'Search Resources', CBC_SLUG ),
			'not_found'          => __( 'No resources found', CBC_SLUG ),
			'not_found_in_trash' => __( 'No resources found in the Trash', CBC_SLUG ),
			'parent_item_colon'  => '',
			'menu_name'          => __( 'Resources', CBC_SLUG ),
		);
		$args   = array(
			'labels'        => $labels,
			'description'   => 'A bookable resource',
			'public'        => true,
			'menu_position' => 5,
			'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'has_archive'   => true,
		);
		register_post_type( 'resource', $args );
	}
}
