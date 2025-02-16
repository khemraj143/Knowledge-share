<?php
/**
 * Knowledge Base Lite functions and definitions
 *
 * @package Knowledge Base Lite
 */

/* Breadcrumb Begin */
function knowledge_base_lite_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			echo "<span> ";
				the_title();
		}
	}
}

/* Theme Setup */
if ( ! function_exists( 'knowledge_base_lite_setup' ) ) :
 
function knowledge_base_lite_setup() {

	$GLOBALS['content_width'] = apply_filters( 'knowledge_base_lite_content_width', 640 );
	
	load_theme_textdomain( 'knowledge-base-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('knowledge-base-lite-homepage-thumb',240,145,true);
	
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'knowledge-base-lite' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	//selective refresh for sidebar and widgets
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', knowledge_base_lite_font_url() ) );

	// Theme Activation Notice
	global $pagenow;

	if (is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] )) {
		add_action('admin_notices', 'knowledge_base_lite_activation_notice');
	}
}
endif;

add_action( 'after_setup_theme', 'knowledge_base_lite_setup' );

// Notice after Theme Activation
function knowledge_base_lite_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome-notice">';
		echo '<p>'. esc_html__( 'Thank you for choosing Knowledge Base Lite. Would like to have you on our Welcome page so that you can reap all the benefits of our Knowledge Base Lite.', 'knowledge-base-lite' ) .'</p>';
		echo '<span><a href="'. esc_url( admin_url( 'themes.php?page=knowledge_base_lite_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'knowledge-base-lite' ) .'</a></span>';
		echo '<span class="demo-btn"><a href="'. esc_url( 'https://www.vwthemes.net/vw-knowledge-base-pro/' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'VIEW DEMO', 'knowledge-base-lite' ) .'</a></span>';
		echo '<span class="upgrade-btn"><a href="'. esc_url( 'https://www.vwthemes.com/products/knowledge-base-wordpress-theme' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'UPGRADE PRO', 'knowledge-base-lite' ) .'</a></span>';
		echo '<span class="bundle-btn"><a href="'. esc_url( 'https://www.vwthemes.com/products/wp-theme-bundle' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'THEME BUNDLE', 'knowledge-base-lite' ) .'</a></span>';

	echo '</div>';
}

/* Theme Widgets Setup */
function knowledge_base_lite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'knowledge-base-lite' ),
		'description'   => __( 'Appears on blog page sidebar', 'knowledge-base-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title py-3 px-4">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'knowledge-base-lite' ),
		'description'   => __( 'Appears on page sidebar', 'knowledge-base-lite' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title py-3 px-4">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'knowledge-base-lite' ),
		'description'   => __( 'Appears on page sidebar', 'knowledge-base-lite' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title py-3 px-4">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 1', 'knowledge-base-lite' ),
		'description'   => __( 'Appears on footer 1', 'knowledge-base-lite' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget py-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-0 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 2', 'knowledge-base-lite' ),
		'description'   => __( 'Appears on footer 2', 'knowledge-base-lite' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget py-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-0 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 3', 'knowledge-base-lite' ),
		'description'   => __( 'Appears on footer 3', 'knowledge-base-lite' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget py-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-0 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 4', 'knowledge-base-lite' ),
		'description'   => __( 'Appears on footer 4', 'knowledge-base-lite' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget py-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-0 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'knowledge-base-lite' ),
		'description'   => __( 'Appears on shop page', 'knowledge-base-lite' ),
		'id'            => 'woocommerce-shop-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-3 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Single Product Sidebar', 'knowledge-base-lite' ),
		'description'   => __( 'Appears on single product page', 'knowledge-base-lite' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-3 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Social Icon', 'knowledge-base-lite' ),
		'description'   => __( 'Appears on right side footer', 'knowledge-base-lite' ),
		'id'            => 'footer-icon',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-3 py-2">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'knowledge_base_lite_widgets_init' );

/* Theme Font URL */
function knowledge_base_lite_font_url() {
	$font_family   = array(
		'ABeeZee:ital@0;1',
	 	'Abril Fatface',
	 	'Acme',
	 	'Alfa Slab One',
	 	'Allura',
	 	'Anton',
	 	'Architects Daughter',
	 	'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	 	'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
	 	'Arvo:ital,wght@0,400;0,700;1,400;1,700',
	 	'Alegreya Sans:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900',
	 	'Asap:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Assistant:wght@200;300;400;500;600;700;800',
	 	'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
	 	'Bangers',
	 	'Boogaloo',
	 	'Bad Script',
	 	'Barlow Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Bree Serif',
	 	'BenchNine:wght@300;400;700',
	 	'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	 	'Cardo:ital,wght@0,400;0,700;1,400',
	 	'Courgette',
	 	'Caveat Brush',
	 	'Cherry Swash:wght@400;700',
	 	'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
	 	'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
	 	'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	 	'Cookie',
	 	'Coming Soon',
	 	'Charm:wght@400;700',
	 	'Chewy',
		'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
		'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900'

	);
	
	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_family ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
	return $contents;
}

/* Theme enqueue scripts */
function knowledge_base_lite_scripts() {
	wp_enqueue_style( 'knowledge-base-lite-font', knowledge_base_lite_font_url(), array() );
	wp_enqueue_style( 'knowledge-base-lite-block-style', get_theme_file_uri('/assets/css/blocks.css') );
	wp_enqueue_style( 'knowledge-base-lite-block-patterns-style-frontend', get_theme_file_uri('/inc/block-patterns/css/block-frontend.css') );
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );
	wp_enqueue_style( 'knowledge-base-lite-basic-style', get_stylesheet_uri() );
	wp_style_add_data('knowledge-base-lite-basic-style', 'rtl', 'replace');
	/* Inline style sheet */
	require get_parent_theme_file_path( '/custom-style.php' );
	wp_add_inline_style( 'knowledge-base-lite-basic-style',$knowledge_base_lite_custom_css );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
	wp_enqueue_script( 'jquery-superfish', get_theme_file_uri( '/assets/js/jquery.superfish.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri(). '/assets/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'knowledge-base-lite-custom-scripts', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'),'' ,true );	

	if (get_theme_mod('knowledge_base_lite_animation', true) == true){
		wp_enqueue_script( 'jquery-wow', get_template_directory_uri() . '/assets/js/wow.js', array('jquery') );
		wp_enqueue_style( 'animate-css', get_template_directory_uri().'/assets/css/animate.css' );
	}
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/* Enqueue the Dashicons script */
	wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'knowledge_base_lite_scripts' );

/**
 * Enqueue block editor style
 */
function knowledge_base_lite_block_editor_styles() {
	wp_enqueue_style( 'knowledge-base-lite-font', knowledge_base_lite_font_url(), array() );
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );
    wp_enqueue_style( 'knowledge-base-lite-block-patterns-style-editor', get_theme_file_uri( '/inc/block-patterns/css/block-editor.css' ), false, '1.0', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'knowledge_base_lite_block_editor_styles' );


define('KNOWLEDGE_BASE_LITE_FREE_THEME_DOC',__('https://preview.vwthemesdemo.com/docs/free-knowledge-base/','knowledge-base-lite'));
define('KNOWLEDGE_BASE_LITE_SUPPORT',__('https://wordpress.org/support/theme/knowledge-base-lite/','knowledge-base-lite'));
define('KNOWLEDGE_BASE_LITE_REVIEW',__('https://wordpress.org/support/theme/knowledge-base-lite/reviews','knowledge-base-lite'));
define('KNOWLEDGE_BASE_LITE_BUY_NOW',__('https://www.vwthemes.com/products/knowledge-base-wordpress-theme','knowledge-base-lite'));
define('KNOWLEDGE_BASE_LITE_LIVE_DEMO',__('https://www.vwthemes.net/vw-knowledge-base-pro/','knowledge-base-lite'));
define('KNOWLEDGE_BASE_LITE_PRO_DOC',__('https://preview.vwthemesdemo.com/docs/vw-knowledge-base-pro/','knowledge-base-lite'));
define('KNOWLEDGE_BASE_LITE_FAQ',__('https://www.vwthemes.com/faqs/','knowledge-base-lite'));
define('KNOWLEDGE_BASE_LITE_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','knowledge-base-lite'));
define('KNOWLEDGE_BASE_LITE_CONTACT',__('https://www.vwthemes.com/contact/','knowledge-base-lite'));
define('KNOWLEDGE_BASE_LITE_COPYRIGHT_CREDIT',__('https://www.vwthemes.com/','knowledge-base-lite'));
define('KNOWLEDGE_BASE_LITE_CREDIT',__('https://www.vwthemes.com/products/free-knowledge-base-wordpress-theme','knowledge-base-lite'));
define('KNOWLEDGE_BASE_LITE_THEME_BUNDLE_BUY_NOW',__('https://www.vwthemes.com/products/wp-theme-bundle','knowledge-base-lite'));
define('KNOWLEDGE_BASE_LITE_THEME_BUNDLE_DOC',__('https://preview.vwthemesdemo.com/docs/theme-bundle/','knowledge-base-lite'));


if ( ! function_exists( 'knowledge_base_lite_credit' ) ) {
	function knowledge_base_lite_credit(){
		echo "<a href=".esc_url(KNOWLEDGE_BASE_LITE_CREDIT)." target='_blank'>".esc_html__('Knowledge Base WordPress Theme','knowledge-base-lite')."</a>";
	}
}

function knowledge_base_lite_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );
  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function knowledge_base_lite_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function knowledge_base_lite_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function knowledge_base_lite_sanitize_number_range( $number, $setting ) {
	
	// Ensure input is an absolute integer.
	$number = absint( $number );
	
	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	
	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	
	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	
	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	
	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

/* Excerpt Limit Begin */
function knowledge_base_lite_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'knowledge_base_lite_loop_columns');
	if (!function_exists('knowledge_base_lite_loop_columns')) {
		function knowledge_base_lite_loop_columns() {
		return 3; // 3 products per row
	}
}

function knowledge_base_lite_logo_title_hide_show(){
	if(get_theme_mod('knowledge_base_lite_logo_title_hide_show') == '1' ) {
		return true;
	}
	return false;
}

function knowledge_base_lite_tagline_hide_show(){
	if(get_theme_mod('knowledge_base_lite_tagline_hide_show',0) == '1' ) {
		return true;
	}
	return false;
}

//Active Callback
function knowledge_base_lite_default_slider(){
	if(get_theme_mod('knowledge_base_lite_slider_type', 'Default slider') == 'Default slider' ) {
		return true;
	}
	return false;
}

function knowledge_base_lite_advance_slider(){
	if(get_theme_mod('knowledge_base_lite_slider_type', 'Default slider') == 'Advance slider' ) {
		return true;
	}
	return false;
}

function knowledge_base_lite_blog_post_featured_image_dimension(){
	if(get_theme_mod('knowledge_base_lite_blog_post_featured_image_dimension') == 'custom' ) {
		return true;
	}
	return false;
}

/* Starter Content */
	add_theme_support( 'starter-content', array(
		'widgets' => array(
			'footer-1' => array(
				'categories',
			),
			'footer-2' => array(
				'archives',
			),
			'footer-3' => array(
				'meta',
			),
			'footer-4' => array(
				'search',
			),
		),
    ));

// edit

if (!function_exists('knowledge_base_lite_edit_link')) :

    function knowledge_base_lite_edit_link($view = 'default')
    {
        global $post;
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'knowledge-base-lite'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link"><i class="fas fa-edit"></i>',
                '</span>'
            );

    }
endif;


/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Typography */
require get_template_directory() . '/inc/typography/ctypo.php';

/* Block Pattern */
require get_template_directory() . '/inc/block-patterns/block-patterns.php';

/* Implement the About theme page */
require get_template_directory() . '/inc/getstart/getstart.php';

/* TGM Plugin Activation */
require get_template_directory() . '/inc/tgm/tgm.php';

/* Plugin Activation */
require get_template_directory() . '/inc/getstart/plugin-activation.php';

/* Webfonts */
require get_template_directory() . '/inc/wptt-webfont-loader.php';

/* Customizer additions. */
require get_template_directory() . '/inc/themes-widgets/social-icon.php';

/* Customizer additions. */
require get_template_directory() . '/inc/themes-widgets/about-us-widget.php';

/* Customizer additions. */
require get_template_directory() . '/inc/themes-widgets/contact-us-widget.php';