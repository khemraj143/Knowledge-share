<?php

add_action( 'init', 'ks_register_taxonomies', 0 );
/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function ks_register_taxonomies() {
    // Retrieve custom taxonomies from the filter
    $custom_taxonomies = apply_filters("register_taxonomies", array());
    $reg_tax = $custom_taxonomies && is_array($custom_taxonomies) ? $custom_taxonomies : [];
    $reg_tax_title = isset($reg_tax["labels"]["name"]) ? $reg_tax["labels"]["name"] : "";
    $reg_tax_slug = $reg_tax_title ? str_replace(" ", "_", strtolower(trim($reg_tax_title))) : "";
    $reg_slug = $reg_tax_slug && !taxonomy_exists($reg_tax_slug) ? $reg_tax_slug : '';
    $post_types = isset($reg_tax["post_types"]) ? $reg_tax["post_types"] : array();
    $domain = isset($reg_tax["textdomain"]) ? $reg_tax["textdomain"] : "wp_custom";

    if ($reg_tax_title && $reg_slug && !empty($post_types)) {
        
        // Labels for the taxonomy
        $labels = array(
            'name'              => _x( $reg_tax_title . 's', 'taxonomy general name', $domain ),
            'singular_name'     => _x( $reg_tax_title, 'taxonomy singular name', $domain ),
            'search_items'      => __( 'Search ' . $reg_tax_title . 's', $domain ),
            'all_items'         => __( 'All ' . $reg_tax_title . 's', $domain ),
            'view_item'         => __( 'View ' . $reg_tax_title, $domain ),
            'parent_item'       => __( 'Parent ' . $reg_tax_title, $domain ),
            'parent_item_colon' => __( 'Parent ' . $reg_tax_title . ":", $domain ),
            'edit_item'         => __( 'Edit ' . $reg_tax_title, $domain ),
            'update_item'       => __( 'Update ' . $reg_tax_title, $domain ),
            'add_new_item'      => __( 'Add New ' . $reg_tax_title, $domain ),
            'new_item_name'     => __( 'New ' . $reg_tax_title . ' Name', $domain ),
            'not_found'         => __( 'No ' . $reg_tax_title . 's Found', $domain ),
            'back_to_items'     => __( 'Back to ' . $reg_tax_title . 's', $domain ),
            'menu_name'         => __( $reg_tax_title, $domain ),
        );
        
        $tax_args = isset($reg_tax["args"]) ? $reg_tax["args"] : array();
        // Arguments for the taxonomy
        $args = array(
            'labels'            => $labels,
            'hierarchical'      => isset($tax_args["hierarchical"]) ? $tax_args["hierarchical"] : true,
            'public'            => isset($tax_args["public"]) ? $tax_args["public"] : true,
            'show_ui'           => isset($tax_args["show_ui"]) ? $tax_args["show_ui"] : true,
            'show_in_menu'      => isset($tax_args["show_in_menu"]) ? $tax_args["show_in_menu"] : true,
            'show_in_nav_menus' => isset($tax_args["show_in_nav_menus"]) ? $tax_args["show_in_nav_menus"] : true,
            'show_admin_column' => isset($tax_args["show_admin_column"]) ? $tax_args["show_admin_column"] : true,
            'query_var'         => isset($tax_args["query_var"]) ? $tax_args["query_var"] : true,
            'rewrite'           => isset($tax_args["rewrite"]) ? $tax_args["rewrite"] : array( 'slug' => $reg_slug, 'with_front' => true, 'hierarchical' => false ),
            'show_in_rest'      => isset($tax_args["show_in_rest"]) ? $tax_args["show_in_rest"] : true,
            'show_in_quick_edit' => isset($tax_args["show_in_quick_edit"]) ? $tax_args["show_in_quick_edit"] : true,
        );
    
        // Register the taxonomy
        register_taxonomy( $reg_slug, $post_types, $args );
    }
}