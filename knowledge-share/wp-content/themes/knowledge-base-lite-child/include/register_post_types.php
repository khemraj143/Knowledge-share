<?php

add_action( 'init', 'ks_register_post_types' );
/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function ks_register_post_types() {
    // Retrieve custom post types from the filter
    $custom_posts = apply_filters("register_custom_posts", array());
    $reg_post = $custom_posts && is_array($custom_posts) ? $custom_posts : [];
    $reg_post_title = $reg_post && isset($reg_post["labels"]["name"]) ? $reg_post["labels"]["name"] : "";
    $reg_post_slug = $reg_post_title ? str_replace(" ", "_", strtolower(trim($reg_post_title))) : "";
    $reg_slug = $reg_post_slug && !post_type_exists($reg_post_slug) ? $reg_post_slug : '';
    $domain = isset($reg_post["textdomain"]) ? $reg_post["textdomain"] : "wp_custom";

    if ($reg_post_title && $reg_slug) {
        // Labels for the custom post type
        $labels = array(
            'name'                  => _x( $reg_post_title . 's', 'Post type general name', $domain ),
            'singular_name'         => _x( $reg_post_title, 'Post type singular name', $domain ),
            'menu_name'             => _x( $reg_post_title . 's', 'Admin Menu text', $domain ),
            'name_admin_bar'        => _x( $reg_post_title, 'Add New on Toolbar', $domain ),
            'add_new'               => __( 'Add New', $domain ),
            'add_new_item'          => __( 'Add New ' . $reg_post_title, $domain ),
            'new_item'              => __( 'New ' . $reg_post_title, $domain ),
            'edit_item'             => __( 'Edit ' . $reg_post_title, $domain ),
            'view_item'             => __( 'View ' . $reg_post_title, $domain ),
            'all_items'             => __( 'All ' . $reg_post_title . 's', $domain ),
            'search_items'          => __( 'Search ' . $reg_post_title . 's', $domain ),
            'parent_item_colon'     => __( 'Parent ' . $reg_post_title . 's:', $domain ),
            'not_found'             => __( 'No ' . strtolower($reg_post_title) . 's found.', $domain ),
            'not_found_in_trash'    => __( 'No ' . strtolower($reg_post_title) . 's found in Trash.', $domain ),
            'featured_image'        => _x( $reg_post_title . ' Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', $domain ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', $domain ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', $domain ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', $domain ),
            'archives'              => _x( $reg_post_title . ' archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', $domain ),
            'insert_into_item'      => _x( 'Insert into ' . strtolower($reg_post_title), 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', $domain ),
            'uploaded_to_this_item' => _x( 'Uploaded to this ' . strtolower($reg_post_title), 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', $domain ),
            'filter_items_list'     => _x( 'Filter ' . strtolower($reg_post_title) . 's list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', $domain ),
            'items_list_navigation' => _x( $reg_post_title . 's list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', $domain ),
            'items_list'            => _x( $reg_post_title . 's list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', $domain ),
        );

        $cpt_args = isset($reg_post["args"]) ? $reg_post["args"] : "";
        $cpt_desc = isset($cpt_args["description"]) ? $cpt_args["description"] : "";
        // Arguments for the custom post type
        $args = array(
            'labels'             => $labels,
            'description'        => __( $cpt_desc, $domain ),
            'public'             => isset($cpt_args["public"]) ? $cpt_args["public"] : true,
            'hierarchical'       => isset($cpt_args["hierarchical"]) ? $cpt_args["hierarchical"] : false,
            'exclude_from_search'=> isset($cpt_args["exclude_from_search"]) ? $cpt_args["exclude_from_search"] : true,
            'publicly_queryable' => isset($cpt_args["publicly_queryable"]) ? $cpt_args["publicly_queryable"] : true,
            'show_ui'            => isset($cpt_args["show_ui"]) ? $cpt_args["show_ui"] : true,
            'show_in_menu'       => isset($cpt_args["show_in_menu"]) ? $cpt_args["show_in_menu"] : true,
            'show_in_nav_menus'  => isset($cpt_args["show_in_nav_menus"]) ? $cpt_args["show_in_nav_menus"] : false,
            'show_in_admin_bar'  => isset($cpt_args["show_in_admin_bar"]) ? $cpt_args["show_in_admin_bar"] : false,
            'show_in_rest'       => isset($cpt_args["show_in_rest"]) ? $cpt_args["show_in_rest"] : true,
            'menu_position'      => isset($cpt_args["menu_position"]) ? $cpt_args["menu_position"] : null,
            'menu_icon'          => isset($cpt_args["menu_icon"]) ? $cpt_args["menu_icon"] : 'dashicons-wordpress',
            'query_var'          => isset($cpt_args["query_var"]) ? $cpt_args["query_var"] : true,
            'rewrite'            => isset($cpt_args["rewrite"]) ? array( 'slug' => $cpt_args["rewrite"] ) : array( 'slug' => $reg_slug ),
            'capability_type'    => isset($cpt_args["capability_type"]) ? $cpt_args["capability_type"] : 'post',
            'taxonomies'         => isset($cpt_args["taxonomies"]) ? $cpt_args["taxonomies"] : array(),
            'has_archive'        => isset($cpt_args["has_archive"]) ? $cpt_args["has_archive"] : false,
            'hierarchical'       => isset($cpt_args["hierarchical"]) ? $cpt_args["hierarchical"] : false,
            'supports'           => isset($cpt_args["supports"]) ? $cpt_args["supports"] : array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
            'can_export'         => isset($cpt_args["can_export"]) ? $cpt_args["can_export"] : true,
            'delete_with_user'   => isset($cpt_args["delete_with_user"]) ? $cpt_args["delete_with_user"] : false,
            'template'           => isset($cpt_args["template"]) ? $cpt_args["template"] : array(),
            'template_lock'      => isset($cpt_args["template_lock"]) ? $cpt_args["template_lock"] : false,
            'rest_base'          => isset($cpt_args["rest_base"]) ? $cpt_args["rest_base"] : $reg_slug,
        );

        // Register the custom post type
        register_post_type( $reg_slug, $args );
    }
}