<?php

add_action('init', 'theme_init_posttypes');

function theme_init_posttypes() {
  $realization_args = array(
		'labels' => array(
			'name' => 'Realizacje',
			'singular_name' => 'Realizacje',
			'all_items' => 'Wszystkie artykuły',
			'add_new' => 'Dodaj nowy',
			'add_new_item' => 'Dodaj nowy',
			'edit_item' => 'Edytujy',
			'new_item' => 'Nowy artykuł',
			'view_item' => 'Zobacz',
			'search_items' => 'Szukaj',
			'not_found' =>  'Nie znaleziono żadnych elementów',
			'not_found_in_trash' => 'Nie znaleziono żadnych elementów',
			'parent_item_colon' => ''
		),
		'show_in_rest' => true, // editor gutenberg
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 6,
		'menu_icon' => 'dashicons-format-aside',
		// https://developer.wordpress.org/resource/dashicons/
		'supports' => array(
      'revisions', 'title','editor','author','thumbnail','excerpt','custom-fields'
		),
		'has_archive' => true,
    'rewrite' => array('slug' => 'realizacje'),
	);
	register_post_type('realizacje', $realization_args);
}