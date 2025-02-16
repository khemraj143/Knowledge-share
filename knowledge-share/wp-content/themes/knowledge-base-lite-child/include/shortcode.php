<?php

function display_custom_posts( $atts ) {
	$attrs = shortcode_atts( array(
		'title' => false,
		'limit' => 10,
        'post_type' => false,
        'filters' => false,
	), $atts );
	wp_enqueue_style( 'shortcode' );
	
	ob_start();

		get_template_part( 'template-parts/cpt-shortcode', null, $attrs );

	return ob_get_clean();

}
add_shortcode( 'cpt_posts', 'display_custom_posts' );