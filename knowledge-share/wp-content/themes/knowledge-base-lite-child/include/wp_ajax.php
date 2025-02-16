<?php

add_action("wp_ajax_update_post_terms", "ajax_post_terms_callback");
function ajax_post_terms_callback(){
	$post = $_POST;
	$term_ids = $post["terms"];
	$post_id = $post["id"];
	$taxonomy = $post["tax"];

	if ( !$term_ids || !$post_id || !$taxonomy ) {
        echo json_encode(array("400" => "Invalid data"));
        wp_die();
    }

	$update = wp_set_post_terms($post_id, $term_ids, $taxonomy);
	
	if(is_wp_error( $update )){
		echo json_encode(array("400" => $update->get_error_message()));
	}else{
		echo json_encode(array("200" => "success"));
	}
	wp_die();
}