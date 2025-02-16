<?php

add_action( 'rest_api_init', 'register_testimonial_rest_route' );
function register_testimonial_rest_route() {
    register_rest_route(
        'cpt/v2', '/knowledge_hub/page/(?P<id>\d+)',
        array(
            'methods' => 'GET',
            'callback' => 'get_knowledge_hub',
            'permission_callback' => '__return_true',
            'args' => array(
                'page' => array(
                    'validate_callback' => function( $param, $request, $key ) {
                        return is_numeric( $param ) && $param > 0;
                    },
                    'default' => 1,
                ),
            ),
        )
    );

    register_rest_route(
        'cpt/v2', '/knowledge_hub/(?P<id>\d+)', 
        array(
            'methods' => 'GET',
            'callback' => 'get_post_by_id',
            'args' => array(
                'id' => array(
                    'validate_callback' => function( $param, $request, $key ) {
                        return is_numeric( $param );
                    }
                ),
            ),
        )
    );

    register_rest_route(
        'cpt/v2', '/knowledge_hub/term/(?P<term_slug>[a-zA-Z0-9-_]+)',
        array(
            'methods' => 'GET',
            'callback' => 'get_posts_by_term',
            'args' => array(
                'term_slug' => array(
                    'validate_callback' => function( $param, $request, $key ) {
                        return is_string( $param );
                    }
                ),
            ),
        )
    );

    register_rest_route(
        'cpt/v2', '/knowledge_hub/meta/(?P<meta_key>[a-zA-Z0-9-_]+)',
        array(
            'methods' => 'GET',
            'callback' => 'get_posts_by_meta_key',
            'args' => array(
                'meta_key' => array(
                    'validate_callback' => function( $param, $request, $key ) {
                        return is_string( $param );
                    }
                ),
            ),
        )
    );
}

function get_knowledge_hub( $data ) {
    $page = (int) $data['page'];
    $posts_per_page = 10;

    $cache_key = 'knowledge_hub_posts_page_' . $page;
    $cached_hubs = get_transient( $cache_key );

    if ( false !== $cached_hubs ) {
        return rest_ensure_response( $cached_hubs );
    }

    $args = array(
        'post_type' => 'knowledge_hub',
        'post_status' => 'publish',
        'posts_per_page' => $posts_per_page,
        'paged' => $page,
    );

    $query = new WP_Query( $args );
    $hubs = array();

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $hubs[] = array(
                'title'   => get_the_title(),
                'content' => get_the_content(),
            );
        }
        wp_reset_postdata();
    }

    set_transient( $cache_key, $hubs, HOUR_IN_SECONDS );
    return rest_ensure_response( $hubs );
}

function get_post_by_id( $data ) {
    $post_id = (int) $data['id'];

    $post = get_post( $post_id );
    if ( !$post ) {
        return new WP_Error( 'post_not_found', 'Post not found', array( 'status' => 404 ) );
    }

    $post_data = array(
        'title'   => get_the_title( $post ),
        'content' => get_the_content( null, false, $post ),
    );

    return rest_ensure_response( $post_data );
}

function get_posts_by_term( $data ) {
    $term_slug = sanitize_text_field( $data['term_slug'] );

    $term = term_exists( $term_slug );
    if ( !$term ) {
        return new WP_Error( 'term_not_found', 'Term not found', array( 'status' => 404 ) );
    }

    // Since term_exists returns an array or int, you can use get_term() directly
    $term_obj = get_term( $term ); 

    $args = array(
        'post_type' => 'knowledge_hub',
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => $term_obj->taxonomy,
                'field'    => 'slug',
                'terms'    => $term_obj->slug,
            ),
        ),
        'posts_per_page' => -1,
    );

    $query = new WP_Query( $args );
    $posts = array();

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $posts[] = array(
                'title'   => get_the_title(),
                'content' => get_the_content(),
            );
        }
        wp_reset_postdata();
    }

    return rest_ensure_response( $posts );
}

function get_posts_by_meta_key( $data ) {
    $meta_key = sanitize_text_field( $data['meta_key'] );

    $args = array(
        'post_type' => 'knowledge_hub',
        'post_status' => 'publish',
        'meta_query' => array(
            array(
                'key'     => $meta_key,
                'compare' => 'EXISTS',
            ),
        ),
        'posts_per_page' => -1,
    );

    $query = new WP_Query( $args );
    $posts = array();

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $posts[] = array(
                'title'   => get_the_title(),
                'content' => get_the_content(),
            );
        }
        wp_reset_postdata();
    }

    return rest_ensure_response( $posts );
}