<?php


function twinwebdev_theme_register_projects() {

/**
 * Post Type: Projects.
 */

$labels = [
    "name" => __( "Projects", "twinwebdev" ),
    "singular_name" => __( "Project", "twinwebdev" ),
    "menu_name" => __( "Projects", "twinwebdev" ),
    "all_items" => __( "All Projects", "twinwebdev" ),
    "add_new" => __( "Add new", "twinwebdev" ),
    "add_new_item" => __( "Add new Project", "twinwebdev" ),
    "edit_item" => __( "Edit Project", "twinwebdev" ),
    "new_item" => __( "New Project", "twinwebdev" ),
    "view_item" => __( "View Project", "twinwebdev" ),
    "view_items" => __( "View Projects", "twinwebdev" ),
    "search_items" => __( "Search Projects", "twinwebdev" ),
    "not_found" => __( "No Projects found", "twinwebdev" ),
    "not_found_in_trash" => __( "No Projects found in trash", "twinwebdev" ),
    "parent" => __( "Parent Project:", "twinwebdev" ),
    "featured_image" => __( "Featured image for this Project", "twinwebdev" ),
    "set_featured_image" => __( "Set featured image for this Project", "twinwebdev" ),
    "remove_featured_image" => __( "Remove featured image for this Project", "twinwebdev" ),
    "use_featured_image" => __( "Use as featured image for this Project", "twinwebdev" ),
    "archives" => __( "Project archives", "twinwebdev" ),
    "insert_into_item" => __( "Insert into Project", "twinwebdev" ),
    "uploaded_to_this_item" => __( "Upload to this Project", "twinwebdev" ),
    "filter_items_list" => __( "Filter Projects list", "twinwebdev" ),
    "items_list_navigation" => __( "Projects list navigation", "twinwebdev" ),
    "items_list" => __( "Projects list", "twinwebdev" ),
    "attributes" => __( "Projects attributes", "twinwebdev" ),
    "name_admin_bar" => __( "Project", "twinwebdev" ),
    "item_published" => __( "Project published", "twinwebdev" ),
    "item_published_privately" => __( "Project published privately.", "twinwebdev" ),
    "item_reverted_to_draft" => __( "Project reverted to draft.", "twinwebdev" ),
    "item_scheduled" => __( "Project scheduled", "twinwebdev" ),
    "item_updated" => __( "Project updated.", "twinwebdev" ),
    "parent_item_colon" => __( "Parent Project:", "twinwebdev" ),
];

$args = [
    "label" => __( "Projects", "twinwebdev" ),
    "labels" => $labels,
    "description" => "Web design and development projects.",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "projects",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => [ "slug" => "my-work", "with_front" => true ],
    "query_var" => true,
    "supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "author" ],
    "taxonomies" => [ "category", "post_tag" ],
    "show_in_graphql" => false,
];

register_post_type( "projects", $args );
}


    add_action( 'init', 'twinwebdev_theme_register_projects' );

