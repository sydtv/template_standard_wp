<?php

function register_my_menus() {
    register_nav_menus(
        array(
            'main-nav' => __( 'Main Nav' ),
            'service-nav' => __( 'Service Nav' )
        )
    );
}

add_action( 'init', 'register_my_menus' );

add_theme_support('post-thumbnails');

function anchorIds($string)
{
    $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´", " ");
    $replace = array("ae", "oe", "ue", "ae", "oe", "ue", "ss", "", "-");
    return str_replace($search, $replace, $string);
}

function template_standard_script_enqueue()
{
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/styles/responsive.css', array(), '1.0.0', 'all');
}

add_action('wp_enqueue_scripts', 'template_standard_script_enqueue');



function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'remove_admin_login_header');



function custom_inhalt()
{
    $labels = array(
        'name' => __('Inhalte'),
        'singular_name' => 'Inhalt',
        'add_new' => 'Inhalt hinzufügen',
        'all_items' => 'Alle Inhalte',
        'add_new_item' => 'Inhalt hinzufügen',
        'edit_item' => 'Inhalt bearbeiten',
        'new_item' => 'Neuer Inhalt',
        'view_item' => 'Inhalt anschauen',
        'search_item' => 'Inhalt suchen',
        'not_found' => 'Keine Inhalte gefunden',
        'not_found_in_trash' => 'Keine Inhalte im Papierkorb gefunden',
        'parent_item_colon' => 'Parent Inhalt'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'page-attributes'),
        'taxonomies' => array('category', 'post_tag',),
        'menu_position' => 5,
        'exclude_from_search' => false
    );
    register_post_type('inhalte', $args);
}

add_action('init', 'custom_inhalt');


function custom_taxonomies () {

    // add new taxonomy hierarchical
    $label = array(
        'name' => 'Types',
        'singluar_name' => 'Type',
        'search_items' => 'Search Types',
        'all_items' => 'All Types',
        'parent_item' => 'Parent Type',
        'parent_item_colon' => 'Parent Type',
        'edit_item' => 'Edit Type',
        'update_item' => 'Update Type',
        'add_new_item' => 'Add New Type',
        'new_item_name' => 'New Type Name',
        'menu_name' => 'Type'
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $label,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'type' )
    );

    register_taxonomy('type', array( 'inhalte' ), $args);

    // add new taxonomy not hierarchical

}

add_action('init', 'custom_taxonomies');