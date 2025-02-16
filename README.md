Overview
This WordPress project implements a Knowledge Hub custom post type (CPT) and various features like custom taxonomies, metaboxes, AJAX functionality, shortcodes, and REST API integration. The Knowledge Hub is designed to display articles or resources related to different topics and genres.

This document provides a detailed explanation of how to set up, use, and extend this project.

Files and Structure
The project consists of several PHP files that are included in your theme. These files are located in the include folder of the theme:

register_post_types.php: Contains the code for registering custom post types (CPT).
register_taxonomies.php: Contains the code for registering taxonomies associated with the CPT.
register_meta_boxes.php: Defines the metaboxes for the custom post type.
wp_ajax.php: Handles AJAX requests for dynamic functionality.
shortcode.php: Registers WordPress shortcodes.
wp_rest_api.php: Defines custom REST API endpoints for the Knowledge Hub CPT.
Custom Post Type (CPT) – Knowledge Hub
The Knowledge Hub CPT is dynamically created using the following code:

add_filter("register_custom_posts", "add_custom_post_types");
function add_custom_post_types($args){
    $args["labels"]["name"] = "Knowledge Hub";
    $args["args"]["taxonomies"] = array("category");
    $args["args"]["hierarchical"] = true;
    $args["args"]["has_archive"] = true;
    return $args;
}

This creates a post type named Knowledge Hub that supports hierarchical structure, categories, and an archive page.

Custom Taxonomy – Literature Genre
The Literature Genre taxonomy is dynamically added for the Knowledge Hub CPT using this code:

add_filter("register_taxonomies", "add_custom_taxonomy");
function add_custom_taxonomy($args){
    $args["labels"]["name"] = "Literature Genre";
    $args["post_types"] = "knowledge_hub";
    $args["args"]["rewrite"] = array( 'slug' => 'literature_genre', 'with_front' => true, 'hierarchical' => true );
    return $args;
}

This taxonomy is used to classify the Knowledge Hub posts into different genres.

Metaboxes for Knowledge Hub
Metaboxes are used to add custom fields to the Knowledge Hub CPT. The following metaboxes are defined:

add_filter("register_post_mb", "add_cpt_meta_boxes");
function add_cpt_meta_boxes($cpt_args){
    $cpt_args["mb_name"] = "MB Knowledge Hub";
    $cpt_args["post_type"] = "knowledge_hub";
    $cpt_args["position"] = "normal";
    $cpt_args["fields"] = array(
        "taxonomy" => array(
            array(
                "taxonomy" => "literature_genre",
                "name" => "tax_content_type",
                "id" => "tax_content_type",
                "is_multiple" => true,
                "is_label" => true,
                "label" => "Content Type",
            ),
            array(
                "taxonomy" => "category",
                "name" => "tax_category",
                "id" => "tax_category",
                "is_multiple" => true,
                "is_label" => true,
                "label" => "Category",
            )
        ),
        "input" => array(
            array(
                "type" => "number",
                "name" => "ratings",
                "id" => "ratings",
                "is_label" => true,
                "label" => "Ratings",
                "placeholder" => "Rating 1 - 10",
                "min" => "1",
                "max" => "10",
            ),
            array(
                "type" => "text",
                "name" => "author_name",
                "id" => "author_name",
                "is_label" => true,
                "label" => "Authors",
                "placeholder" => "Author name",
            ),
        )
    );
    return $cpt_args;
}

This code adds two taxonomies (Content Type and Category) and two custom fields (Ratings and Author Name) to the post editor.

WordPress AJAX
The AJAX functionality is included in wp_ajax.php. This file defines custom AJAX functions for the site. You can trigger specific actions (e.g., fetch posts dynamically) using AJAX calls.

Shortcodes
The shortcode.php file is used to define shortcodes that can be inserted into posts, pages, or widgets. You can create reusable content blocks with this feature.

REST API Endpoints
Custom REST API endpoints are created in wp_rest_api.php to fetch Knowledge Hub posts in various ways. The following endpoints are available:

Get all posts (paged):

http://localhost:10043/wp-json/cpt/v2/knowledge_hub/page/<page-number>

Fetch posts for a specific page.

Get a post by its ID:

http://localhost:10043/wp-json/cpt/v2/knowledge_hub/<id>

Fetch a specific post by its ID.

Get posts by term slug (Literature Genre):

http://localhost:10043/wp-json/cpt/v2/knowledge_hub/term/<term-slug>

Fetch posts that belong to a specific term (e.g., genre) in the literature_genre taxonomy.

Get posts by meta key:

http://localhost:10043/wp-json/cpt/v2/knowledge_hub/meta/<meta-key>

Fetch posts based on a specific custom field value.

Installation and Setup
Upload the theme to your WordPress installation.
Ensure the necessary files are included within the theme (referenced above).
Activate the theme through the WordPress dashboard.
You can now create new Knowledge Hub posts, assign genres and categories, and view the posts through the WordPress admin interface.
Extending the Project
You can add more custom fields to the Knowledge Hub CPT by modifying the add_cpt_meta_boxes() function.
To add more taxonomies, use the add_custom_taxonomy() function to create and register them.
Customize the REST API responses by extending the code in the wp_rest_api.php file.
