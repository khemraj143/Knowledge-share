WordPress Custom Post Type - Knowledge Hub
This WordPress theme/plugin is designed to add a custom post type, custom taxonomies, custom meta boxes, and provide REST API endpoints for the Knowledge Hub. The theme/plugin also integrates shortcodes and WP AJAX functionality to extend the WordPress experience. The code in this repository helps developers easily register custom content types, taxonomies, and meta data fields to enhance content management in WordPress.

Features
Custom Post Type
A custom post type (CPT) named Knowledge Hub is dynamically registered and configured.

Allows hierarchical content (like pages) for better organization.
Can have its own archive page.
Linked with the default WordPress category taxonomy for classification.
Custom Taxonomy
A custom taxonomy named Literature Genre is created specifically for the Knowledge Hub posts.

Supports hierarchical taxonomies (like categories).
Custom taxonomy can be associated with Knowledge Hub posts.
Custom Meta Boxes
Dynamic meta boxes are added to the Knowledge Hub custom post type for additional content fields.

Content Type (taxonomy-based): Allows multiple selections from the Literature Genre taxonomy.
Category (taxonomy-based): Allows multiple selections from the default WordPress categories.
Ratings (numeric field): Accepts a number between 1 and 10 for rating the content.
Author Name (text field): To store the name(s) of authors contributing to the content.
WP AJAX
AJAX functionality for dynamic content loading is available via wp_ajax for an enhanced user experience.

Shortcode Integration
Shortcodes are provided to dynamically render and display content wherever required.

REST API Endpoints
Custom REST API endpoints are created to interact with Knowledge Hub posts. These endpoints support the following functionalities:

Get all posts by page number (pagination).
Get a specific post by ID.
Get posts by taxonomy term (slug).
Get posts by meta key.
Installation
To install this feature on your WordPress site, follow the steps below:

Download the theme or plugin zip file.
In your WordPress dashboard, go to Appearance → Themes (or Plugins → Add New if you're adding it as a plugin).
Click Upload and select the zip file to upload and install it.
Once installed, activate the theme or plugin.
Ensure that any custom post types, taxonomies, and meta boxes are properly initialized by checking the relevant settings in the WordPress admin.
Code Walkthrough
The project is divided into multiple files, each responsible for different features:

1. Register Custom Post Types (Post Types)
Path: include/register_post_types.php
This file contains the logic to register the Knowledge Hub custom post type. It is configured to support categories and has its own archive page.
2. Register Custom Taxonomies (Taxonomies)
Path: include/register_taxonomies.php
Defines a custom taxonomy Literature Genre and associates it with the Knowledge Hub post type.
3. Register Meta Boxes (Meta Boxes)
Path: include/register_meta_boxes.php
Adds meta boxes for the Knowledge Hub post type to capture custom fields such as ratings, author names, and taxonomy selections.
4. WP AJAX (AJAX)
Path: include/wp_ajax.php
Handles AJAX requests for dynamically loading content without page reloads.
5. Shortcodes (Shortcodes)
Path: include/shortcode.php
Includes shortcodes to render content dynamically on pages/posts.
6. REST API (REST API)
Path: include/wp_rest_api.php
Custom REST API endpoints to interact with the Knowledge Hub posts. These allow for retrieving posts by page, post ID, taxonomy term, and meta key.
REST API Endpoints
The following custom REST API endpoints are available for interacting with Knowledge Hub posts:

Get All Posts on a Specific Page

bash
Copy
GET http://localhost:10043/wp-json/cpt/v2/knowledge_hub/page/<page-number>
Fetches a paginated list of all Knowledge Hub posts.
Get a Single Post by Post ID

bash
Copy
GET http://localhost:10043/wp-json/cpt/v2/knowledge_hub/<id>
Fetches the Knowledge Hub post with the specified post ID.
Get Posts by Taxonomy Term (Slug)

bash
Copy
GET http://localhost:10043/wp-json/cpt/v2/knowledge_hub/term/<term-slug>
Fetches posts associated with a specific taxonomy term (e.g., Literature Genre).
Get Posts by Meta Key

bash
Copy
GET http://localhost:10043/wp-json/cpt/v2/knowledge_hub/meta/<meta-key>
Fetches posts filtered by a specific meta key (e.g., Ratings or Author Name).
Example Use Cases
Example 1: Displaying posts based on a specific taxonomy term.

Use the REST API endpoint to fetch all posts related to a specific term and display them on your website.
Example 2: Get posts based on rating or author names.

You can query the API to fetch all posts with a certain rating or authored by a specific person.
Example 3: Displaying Knowledge Hub content on custom pages via shortcodes.

Use the provided shortcodes to display Knowledge Hub posts directly within WordPress pages.
Customization
The plugin allows easy customization:

Modify Labels: You can change the display names of the Knowledge Hub post type or Literature Genre taxonomy by updating the labels array in the corresponding functions.
Custom Meta Fields: You can easily add more fields to the meta boxes by extending the $cpt_args["fields"] array.
Taxonomies: You can adjust the relationship of post types and taxonomies based on your requirements by modifying the register_taxonomy arguments.
