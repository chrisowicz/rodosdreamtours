<?php

// Option pages in the admin panel

if( function_exists('acf_add_options_page') ) {

acf_add_options_page(array(
'page_title' => 'Themes general settings',
'menu_title' => 'Theme settings',
'menu_slug' => 'general-settings',
'capability' => 'edit_posts',
'update_button' => __('Save', 'acf'),
'updated_message' => __("Alright Gold! Tagged with.", 'acf'),
//'redirect' => false
));
acf_add_options_sub_page(array(
'page_title' => 'Themes general settings',
'menu_title' => 'Theme settings',
'parent_slug' => 'general-settings',
'update_button' => __('Save', 'acf'),
'updated_message' => __("Alright Gold! Tagged with.", 'acf')
));
acf_add_options_sub_page(array(
'page_title' => 'Header',
'menu_title' => 'Header',
'parent_slug' => 'general-settings',
'update_button' => __('Save', 'acf'),
'updated_message' => __("Alright Gold! Tagged with.", 'acf')
));
acf_add_options_sub_page(array(
'page_title' => 'Footer',
'menu_title' => 'Footer',
'parent_slug' => 'general-settings',
'update_button' => __('Save', 'acf'),
'updated_message' => __("Alright Gold! Tagged with.", 'acf')
));
acf_add_options_sub_page(array(
'page_title' => 'Home page settings',
'menu_title' => 'Home page',
'parent_slug' => 'general-settings',
'update_button' => __('Save', 'acf'),
'updated_message' => __("Alright Gold! Tagged with.", 'acf')
));
acf_add_options_sub_page(array(
'page_title' => 'Contact',
'menu_title' => 'Contact',
'parent_slug' => 'general-settings',
'update_button' => __('Save', 'acf'),
'updated_message' => __("Alright Gold! Tagged with.", 'acf')
));
acf_add_options_sub_page(array(
'page_title' => 'Componets',
'menu_title' => 'Componets',
'parent_slug' => 'general-settings',
'update_button' => __('Save', 'acf'),
'updated_message' => __("Alright Gold! Tagged with.", 'acf')
));
}

// Toggle admin ACF
if( function_exists('get_field') ) {
$show_acf_admin = get_field('settings_advanced', 'option');
if($show_acf_admin) {
add_filter('acf/settings/show_admin', '__return_false');
}
}