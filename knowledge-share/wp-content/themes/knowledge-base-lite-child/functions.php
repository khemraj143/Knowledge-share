<?php
add_action( 'wp_enqueue_scripts', 'knowledge_base_lite_child_style' );
function knowledge_base_lite_child_style() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
	wp_register_style( 'shortcode', get_stylesheet_directory_uri() . '/assets/css/shortcode.css' );
}

function enqueued_require_scripts_styles() {
    wp_enqueue_style( 'select2css', 'https://cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2.css', true, '1.0', 'all' );
    wp_enqueue_script( 'select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_style( 'meta-boxes', get_stylesheet_directory_uri() . '/assets/css/meta-box-style.css' );
	wp_enqueue_script( 'admin-script', get_stylesheet_directory_uri() . '/assets/js/admin-script.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'admin_enqueue_scripts', 'enqueued_require_scripts_styles' );

if(is_admin()){
	include get_theme_file_path( 'include/register_post_types.php' );
	include get_theme_file_path( 'include/register_taxonomies.php' );
	include get_theme_file_path( 'include/register_meta_boxes.php' );
	include get_theme_file_path( 'include/wp_ajax.php' );
}

include get_theme_file_path( 'include/shortcode.php' );
include get_theme_file_path( 'include/wp_rest_api.php' );

// To register and create admin menu for CPT
add_filter("register_custom_posts", "add_custom_post_types");
function add_custom_post_types($args){
	$args["labels"]["name"] = "Knowledge Hub";
	$args["args"]["taxonomies"] = array("category");
	$args["args"]["hierarchical"] = true;
	$args["args"]["has_archive"] = true;
	return $args;
}

// To register and Add admin sub-menu for CPT
add_filter("register_taxonomies", "add_custom_taxonomy");
function add_custom_taxonomy($args){
	$args["labels"]["name"] = "Literature Genre";
	$args["post_types"] = "knowledge_hub";
	$args["args"]["rewrite"] = array( 'slug' => 'literature_genre', 'with_front' => true, 'hierarchical' => true );
	return $args;
}


add_filter("register_post_mb", "add_cpt_meta_boxes");
function add_cpt_meta_boxes($cpt_args){
	$cpt_args["mb_name"] = "MB Knowledge Hub";
	$cpt_args["post_type"] = "knowledge_hub";
	$cpt_args["position"] = "normal";
	$cpt_args["fields"] = array(
		"taxonomy" => array(
			array(
				"taxonomy" => "literature_genre",
				"name"	=> "tax_content_type",
				"id"	=> "tax_content_type",
				"is_multiple" => true,
				"is_label" => true,
				"label" => "Content Type",
			),
			array(
				"taxonomy" => "category",
				"name"	=> "tax_category",
				"id"	=> "tax_category",
				"is_multiple" => true,
				"is_label" => true,
				"label" => "Category",
			)
		),
		"input" => array(
			array(
				"type" => "number",
				"name"	=> "ratings",
				"id"	=> "ratings",
				"is_label" => true,
				"label" => "Ratings",
				"placeholder" => "Rating 1 - 10",
				"min" => "1",
				"max" => "10",
			),
			array(
				"type" => "text",
				"name"	=> "author_name",
				"id"	=> "author_name",
				"is_label" => true,
				"label" => "Authors",
				"placeholder" => "Author name",
			),
		)
	);
	return $cpt_args;
}

// function modify_post_query() {
// 	echo get_permalink();
//     if ( is_archive() ) {
//         query_posts( 'post_type='.get_post_type() );
//     }
// }
// add_action( 'wp_head', 'modify_post_query' );