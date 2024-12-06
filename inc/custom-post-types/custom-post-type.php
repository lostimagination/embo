<?php
/**
 * Custom post type registration
 *
 * @link https://developer.wordpress.org/reference/hooks/after_setup_theme/
 *
 * @package _it_start
 * @subpackage inc/custom-post-types/
 */

// Enable strict typing mode.
declare( strict_types = 1 );

/**
 * Custom Post type registration
 *
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 * @link https://developer.wordpress.org/resource/dashicons/
 *
 * @return void
 */
function it_custom_init(): void {

	$labels = array(
		'name'          => esc_html__( 'Courses', '_it_start' ),
		'singular_name' => esc_html__( 'Course', '_it_start' ),
	);

	$args = array(
		'label'               => esc_html__( 'Course', '_it_start' ),
		'labels'              => $labels,
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'rest_base'           => '',
		'has_archive'         => false,
		'menu_icon'           => 'dashicons-buddicons-activity',
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_rest'        => true,
		'exclude_from_search' => false,
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
		'hierarchical'        => false,
		'rewrite'             => array(
			'slug'       => 'course',
			'with_front' => true,
		),
		'query_var'           => true,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions' ),
	);

	register_post_type( 'course', $args );

	// Taxonomy: Example Category.
	register_taxonomy(
		'course-type',
		array( 'course' ), /* name of CPT */
		array(
			'labels'            => array(
				'name'          => esc_html__( 'Course type', '_it_start' ),
				'singular_name' => esc_html__( 'Course type', '_it_start' ),
				'add_new_item'  => esc_html__( 'Add New Course Type', '_it_start' ),
			),
			'hierarchical'      => true,     /* if this is true, it acts like categories */
			'show_admin_column' => true,
			'show_ui'           => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'course-type' ),
		)
	);
}

add_action( 'init', 'it_custom_init' );
