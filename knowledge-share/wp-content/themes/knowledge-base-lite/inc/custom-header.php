<?php
/**
 * @package Knowledge Base Lite
 * Setup the WordPress core custom header feature.
 *
 * @uses knowledge_base_lite_header_style()
*/
function knowledge_base_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'knowledge_base_lite_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 2000,
		'height'                 => 200,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'knowledge_base_lite_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'knowledge_base_lite_custom_header_setup' );

if ( ! function_exists( 'knowledge_base_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see knowledge_base_lite_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'knowledge_base_lite_header_style' );

function knowledge_base_lite_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .middle-bar{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: cover;
		}";
	   	wp_add_inline_style( 'knowledge-base-lite-basic-style', $custom_css );
	endif;
}
endif;