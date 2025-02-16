<?php
/**
 * Knowledge Base Lite Theme Customizer
 *
 * @package Knowledge Base Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function knowledge_base_lite_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'knowledge_base_lite_custom_controls' );

function knowledge_base_lite_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'knowledge_base_lite_Customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'knowledge_base_lite_Customize_partial_blogdescription',
	));

	//add home page setting pannel
	$knowledge_base_lite_parent_panel = new Knowledge_Base_Lite_WP_Customize_Panel( $wp_customize, 'knowledge_base_lite_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Homepage Settings', 'knowledge-base-lite' ),
		'priority' => 10,
	));

	//Top Header
	$wp_customize->add_section( 'knowledge_base_lite_top_header' , array(
    	'title' => esc_html__( 'Top Header', 'knowledge-base-lite' ),
		'panel' => 'knowledge_base_lite_panel_id'
	) );
	
   	// Header Background color
	$wp_customize->add_setting( 'knowledge_base_lite_header_first_color', array(
	    'default' => '#6d5ef9',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'knowledge_base_lite_header_first_color', array(
  		'label' => __('Header First Color Option', 'knowledge-base-lite'),
	    'section' => 'knowledge_base_lite_top_header',
	    'settings' => 'knowledge_base_lite_header_first_color',
  	)));

	$wp_customize->add_setting('knowledge_base_lite_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_header_img_position',array(
		'type' => 'select',
		'label' => __('Header Image Position','knowledge-base-lite'),
		'section' => 'knowledge_base_lite_top_header',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'knowledge-base-lite' ),
			'center top'   => esc_html__( 'Top', 'knowledge-base-lite' ),
			'right top'   => esc_html__( 'Top Right', 'knowledge-base-lite' ),
			'left center'   => esc_html__( 'Left', 'knowledge-base-lite' ),
			'center center'   => esc_html__( 'Center', 'knowledge-base-lite' ),
			'right center'   => esc_html__( 'Right', 'knowledge-base-lite' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'knowledge-base-lite' ),
			'center bottom'   => esc_html__( 'Bottom', 'knowledge-base-lite' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'knowledge-base-lite' ),
		), 
	));

  	$wp_customize->add_setting( 'knowledge_base_lite_header_second_color', array(
	    'default' => '#3bb7cf',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'knowledge_base_lite_header_second_color', array(
  		'label' => __('Header Second Color Option', 'knowledge-base-lite'),
	    'section' => 'knowledge_base_lite_top_header',
	    'settings' => 'knowledge_base_lite_header_second_color',
  	))); 

	$wp_customize->add_setting('knowledge_base_lite_signin_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('knowledge_base_lite_signin_text',array(
		'label'	=> esc_html__('Button Text','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Sign In', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_signin_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('knowledge_base_lite_signin_link',array(
		'label'	=> esc_html__('Button Link','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'https://www.example.com/signin', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_top_header',
		'type'=> 'url'
	));

	//Menus Settings
	$wp_customize->add_section( 'knowledge_base_lite_menu_section' , array(
    	'title' => __( 'Menus Settings', 'knowledge-base-lite' ),
		'panel' => 'knowledge_base_lite_panel_id'
	) );

	$wp_customize->add_setting('knowledge_base_lite_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','knowledge-base-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_navigation_menu_font_weight',array(
        'default' => 500,
        'transport' => 'refresh',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_menu_section',
        'choices' => array(
        	'100' => __('100','knowledge-base-lite'),
            '200' => __('200','knowledge-base-lite'),
            '300' => __('300','knowledge-base-lite'),
            '400' => __('400','knowledge-base-lite'),
            '500' => __('500','knowledge-base-lite'),
            '600' => __('600','knowledge-base-lite'),
            '700' => __('700','knowledge-base-lite'),
            '800' => __('800','knowledge-base-lite'),
            '900' => __('900','knowledge-base-lite'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('knowledge_base_lite_menu_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menus Text Transform','knowledge-base-lite'),
		'choices' => array(
            'Uppercase' => __('Uppercase','knowledge-base-lite'),
            'Capitalize' => __('Capitalize','knowledge-base-lite'),
            'Lowercase' => __('Lowercase','knowledge-base-lite'),
        ),
		'section'=> 'knowledge_base_lite_menu_section',
	));

	$wp_customize->add_setting('knowledge_base_lite_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_menus_item_style',array(
        'type' => 'select',
        'section' => 'knowledge_base_lite_menu_section',
		'label' => __('Menu Item Hover Style','knowledge-base-lite'),
		'choices' => array(
            'None' => __('None','knowledge-base-lite'),
            'Zoom In' => __('Zoom In','knowledge-base-lite'),
        ),
	) );

	$wp_customize->add_setting('knowledge_base_lite_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'knowledge_base_lite_header_menus_color', array(
		'label'    => __('Menus Color', 'knowledge-base-lite'),
		'section'  => 'knowledge_base_lite_menu_section',
	)));

	$wp_customize->add_setting('knowledge_base_lite_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'knowledge_base_lite_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'knowledge-base-lite'),
		'section'  => 'knowledge_base_lite_menu_section',
	)));

	$wp_customize->add_setting('knowledge_base_lite_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'knowledge_base_lite_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'knowledge-base-lite'),
		'section'  => 'knowledge_base_lite_menu_section',
	)));

	$wp_customize->add_setting('knowledge_base_lite_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'knowledge_base_lite_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'knowledge-base-lite'),
		'section'  => 'knowledge_base_lite_menu_section',
	)));

	//Slider
	$wp_customize->add_section( 'knowledge_base_lite_slidersettings' , array(
    	'title' => esc_html__( 'Slider Settings', 'knowledge-base-lite' ),
    	'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/knowledge-base-wordpress-theme">GET PRO</a>','knowledge-base-lite'),
		'panel' => 'knowledge_base_lite_panel_id'
	) );

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('knowledge_base_lite_slider_arrows',array(
		'selector'        => '#slider .carousel-caption h1',
		'render_callback' => 'knowledge_base_lite_Customize_partial_knowledge_base_lite_slider_arrows',
	));

	$wp_customize->add_setting( 'knowledge_base_lite_slider_arrows',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','knowledge-base-lite' ),
      	'section' => 'knowledge_base_lite_slidersettings'
    )));

    $wp_customize->add_setting('knowledge_base_lite_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	) );
	$wp_customize->add_control('knowledge_base_lite_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','knowledge-base-lite'),
            'Advance slider' => __('Advance slider','knowledge-base-lite'),
        ),
	));

	$wp_customize->add_setting('knowledge_base_lite_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_slidersettings',
		'type'=> 'text',
		'active_callback' => 'knowledge_base_lite_advance_slider'
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'knowledge_base_lite_slider_page' . $count, array(
			'default'  => '',
			'sanitize_callback' => 'knowledge_base_lite_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'knowledge_base_lite_slider_page' . $count, array(
			'label'    => esc_html__( 'Select Slider Page', 'knowledge-base-lite' ),
			'description' => esc_html__('Slider image size (650 x 500)','knowledge-base-lite'),
			'section'  => 'knowledge_base_lite_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'knowledge_base_lite_default_slider'
		) );
	}

	//content layout
	$wp_customize->add_setting('knowledge_base_lite_slider_content_option',array(
        'default' => 'Center',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Knowledge_Base_Lite_Image_Radio_Control($wp_customize, 'knowledge_base_lite_slider_content_option', array(
        'type' => 'select',
        'label' => esc_html__('Slider Content Layouts','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ),'active_callback' => 'knowledge_base_lite_default_slider'
    )));

    //Slider content padding
    $wp_customize->add_setting('knowledge_base_lite_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','knowledge-base-lite'),
		'description'	=> __('Enter a value in %. Example:20%','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_slidersettings',
		'type'=> 'text',
		'active_callback' => 'knowledge_base_lite_default_slider'
	));

	$wp_customize->add_setting('knowledge_base_lite_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','knowledge-base-lite'),
		'description'	=> __('Enter a value in %. Example:20%','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_slidersettings',
		'type'=> 'text',
		'active_callback' => 'knowledge_base_lite_default_slider'
	));

	//Slider height
	$wp_customize->add_setting('knowledge_base_lite_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_slider_height',array(
		'label'	=> __('Slider Height','knowledge-base-lite'),
		'description'	=> __('Specify the slider height (px).','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_slidersettings',
		'type'=> 'text',
		'active_callback' => 'knowledge_base_lite_default_slider'
	));

	//Opacity
	$wp_customize->add_setting('knowledge_base_lite_slider_opacity_color',array(
      'default'              => 0.2,
      'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));

	$wp_customize->add_control( 'knowledge_base_lite_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','knowledge-base-lite' ),
		'section'     => 'knowledge_base_lite_slidersettings',
		'type'        => 'select',
		'settings'    => 'knowledge_base_lite_slider_opacity_color',
		'choices' => array(
	      '0' =>  esc_attr( __('0','knowledge-base-lite')),
	      '0.1' =>  esc_attr( __('0.1','knowledge-base-lite')),
	      '0.2' =>  esc_attr( __('0.2','knowledge-base-lite')),
	      '0.3' =>  esc_attr( __('0.3','knowledge-base-lite')),
	      '0.4' =>  esc_attr( __('0.4','knowledge-base-lite')),
	      '0.5' =>  esc_attr( __('0.5','knowledge-base-lite')),
	      '0.6' =>  esc_attr( __('0.6','knowledge-base-lite')),
	      '0.7' =>  esc_attr( __('0.7','knowledge-base-lite')),
	      '0.8' =>  esc_attr( __('0.8','knowledge-base-lite')),
	      '0.9' =>  esc_attr( __('0.9','knowledge-base-lite'))
	),'active_callback' => 'knowledge_base_lite_default_slider'
	));


	//Features Section
	$wp_customize->add_section('knowledge_base_lite_features', array(
		'title'       => __('Features Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_features_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_features_text',array(
		'description' => __('<p>1. More options for features section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for features section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_features',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_features_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_features_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_features',
		'type'=> 'hidden'
	));

	//Services
	$wp_customize->add_section('knowledge_base_lite_services',array(
		'title'	=> __('Services Section','knowledge-base-lite'),
		'description' => __('For more options services section</br><a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/knowledge-base-wordpress-theme">GET PRO</a>','knowledge-base-lite'),
		'panel' => 'knowledge_base_lite_panel_id',
	));

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';	
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('knowledge_base_lite_services_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'knowledge_base_lite_sanitize_choices',
	));
	$wp_customize->add_control('knowledge_base_lite_services_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display services','knowledge-base-lite'),
		'section' => 'knowledge_base_lite_services',
	));

	// Browse Topics Section
	$wp_customize->add_section('knowledge_base_lite_browse_topics', array(
		'title'       => __('Browse Topics Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_browse_topics_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_browse_topics_text',array(
		'description' => __('<p>1. More options for browse topics section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for browse topics section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_browse_topics',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_browse_topics_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_browse_topics_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_browse_topics',
		'type'=> 'hidden'
	));

	// Blog Section
	$wp_customize->add_section('knowledge_base_lite_blog', array(
		'title'       => __('Blog Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_blog_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_blog_text',array(
		'description' => __('<p>1. More options for blog section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for blog section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_blog',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_blog_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_blog_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_blog',
		'type'=> 'hidden'
	));

	// Getstarted Blog Section
	$wp_customize->add_section('knowledge_base_lite_getstarted_blog', array(
		'title'       => __('Getstarted Blog Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_getstarted_blog_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_getstarted_blog_text',array(
		'description' => __('<p>1. More options for getstarted blog section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for getstarted blog section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_getstarted_blog',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_getstarted_blog_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_getstarted_blog_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_getstarted_blog',
		'type'=> 'hidden'
	));

	//Records Section
	$wp_customize->add_section('knowledge_base_lite_records', array(
		'title'       => __('Records Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_records_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_records_text',array(
		'description' => __('<p>1. More options for records section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for records section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_records',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_records_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_records_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_records',
		'type'=> 'hidden'
	));

	// Why Choose Us Section
	$wp_customize->add_section('knowledge_base_lite_why_choose_us', array(
		'title'       => __('Why Choose Us Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_why_choose_us_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_why_choose_us_text',array(
		'description' => __('<p>1. More options for why choose us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for why choose us section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_why_choose_us',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_why_choose_us_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_why_choose_us_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_why_choose_us',
		'type'=> 'hidden'
	));

	// How It Work Section
	$wp_customize->add_section('knowledge_base_lite_how_it_work', array(
		'title'       => __('How It Work Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_how_it_work_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_how_it_work_text',array(
		'description' => __('<p>1. More options for how it work section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for how it work section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_how_it_work',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_how_it_work_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_how_it_work_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_how_it_work',
		'type'=> 'hidden'
	));

	// Team Section
	$wp_customize->add_section('knowledge_base_lite_team', array(
		'title'       => __('Team Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_team_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_team_text',array(
		'description' => __('<p>1. More options for team section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for team section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_team',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_team_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_team_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_team',
		'type'=> 'hidden'
	));

	// Introduction Section
	$wp_customize->add_section('knowledge_base_lite_introduction', array(
		'title'       => __('Introduction Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_introduction_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_introduction_text',array(
		'description' => __('<p>1. More options for introduction section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for introduction section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_introduction',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_introduction_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_introduction_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_introduction',
		'type'=> 'hidden'
	));

	//Newsletter  Section
	$wp_customize->add_section('knowledge_base_lite_newsletter', array(
		'title'       => __('Newsletter Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_newsletter_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_newsletter_text',array(
		'description' => __('<p>1. More options for newsletter section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for newsletter section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_newsletter',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_newsletter_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_newsletter_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_newsletter',
		'type'=> 'hidden'
	));

	// Testimonial Section
	$wp_customize->add_section('knowledge_base_lite_testimonial', array(
		'title'       => __('Testimonial Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_testimonial_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_testimonial_text',array(
		'description' => __('<p>1. More options for testimonial section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for testimonial section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_testimonial',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_testimonial_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_testimonial_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_testimonial',
		'type'=> 'hidden'
	));

	// Contact Partners Section
	$wp_customize->add_section('knowledge_base_lite_contact_partners', array(
		'title'       => __('Contact Partners Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_contact_partners_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_contact_partners_text',array(
		'description' => __('<p>1. More options for contact partners section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for contact partners section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_contact_partners',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_contact_partners_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_contact_partners_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_contact_partners',
		'type'=> 'hidden'
	));

	// Faq Section
	$wp_customize->add_section('knowledge_base_lite_faq', array(
		'title'       => __('Faq Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_faq_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_faq_text',array(
		'description' => __('<p>1. More options for faq section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for faq section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_faq',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_faq_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_faq_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_faq',
		'type'=> 'hidden'
	));

	// Live Chat Blog Section
	$wp_customize->add_section('knowledge_base_lite_live_chat_blog', array(
		'title'       => __('Live Chat Blog Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_live_chat_blog_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_live_chat_blog_text',array(
		'description' => __('<p>1. More options for live chat blog section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for live chat blog section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_live_chat_blog',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_live_chat_blog_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_live_chat_blog_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_live_chat_blog',
		'type'=> 'hidden'
	));

	// Active Articals Section
	$wp_customize->add_section('knowledge_base_lite_active_articals', array(
		'title'       => __('Active Articals Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_active_articals_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_active_articals_text',array(
		'description' => __('<p>1. More options for active articals section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for active articals section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_active_articals',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_active_articals_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_active_articals_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_active_articals',
		'type'=> 'hidden'
	));

	// Our Partners Section
	$wp_customize->add_section('knowledge_base_lite_our_partners', array(
		'title'       => __('Our Partners Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_our_partners_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_our_partners_text',array(
		'description' => __('<p>1. More options for our partners section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our partners section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_our_partners',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_our_partners_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_our_partners_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_our_partners',
		'type'=> 'hidden'
	));

	// Get In Touch Section
	$wp_customize->add_section('knowledge_base_lite_get_in_touch', array(
		'title'       => __('Get In Touch Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_get_in_touch_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_get_in_touch_text',array(
		'description' => __('<p>1. More options for get in touch section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for get in touch section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_get_in_touch',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_get_in_touch_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_get_in_touch_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_get_in_touch',
		'type'=> 'hidden'
	));

	// Pricing Plans Section
	$wp_customize->add_section('knowledge_base_lite_pricing_plans', array(
		'title'       => __('Pricing Plans Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_pricing_plans_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_pricing_plans_text',array(
		'description' => __('<p>1. More options for pricing plans section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for pricing plans section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_pricing_plans',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_pricing_plans_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_pricing_plans_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_pricing_plans',
		'type'=> 'hidden'
	));

	// Latest News Section
	$wp_customize->add_section('knowledge_base_lite_latest_news', array(
		'title'       => __('Latest News Section', 'knowledge-base-lite'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','knowledge-base-lite'),
		'priority'    => null,
		'panel'       => 'knowledge_base_lite_panel_id',
	));

	$wp_customize->add_setting('knowledge_base_lite_latest_news_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_latest_news_text',array(
		'description' => __('<p>1. More options for latest news section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for latest news section.</p>','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_latest_news',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('knowledge_base_lite_latest_news_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_latest_news_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(KNOWLEDGE_BASE_LITE_BUY_NOW).">More Info</a>",
		'section'=> 'knowledge_base_lite_latest_news',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('knowledge_base_lite_footer',array(
		'title'	=> esc_html__('Footer Settings','knowledge-base-lite'),
		'description' => __('For more options footer section</br><a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/knowledge-base-wordpress-theme">GET PRO</a>','knowledge-base-lite'),
		'panel' => 'knowledge_base_lite_panel_id',
	));	

	$wp_customize->add_setting( 'knowledge_base_lite_footer_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ));
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_footer_hide_show',array(
      'label' => esc_html__( 'Show / Hide Footer','knowledge-base-lite' ),
      'section' => 'knowledge_base_lite_footer'
    )));

	// font size
	$wp_customize->add_setting('knowledge_base_lite_button_footer_font_size',array(
		'default'=> 30,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_button_footer_font_size',array(
		'label'	=> __('Footer Heading Font Size','knowledge-base-lite'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'knowledge_base_lite_footer',
	));

	$wp_customize->add_setting('knowledge_base_lite_button_footer_heading_letter_spacing',array(
		'default'=> 1,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_button_footer_heading_letter_spacing',array(
		'label'	=> __('Heading Letter Spacing','knowledge-base-lite'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'knowledge_base_lite_footer',
	));

	// text trasform
	$wp_customize->add_setting('knowledge_base_lite_button_footer_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_button_footer_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Heading Text Transform','knowledge-base-lite'),
		'choices' => array(
	      'Uppercase' => __('Uppercase','knowledge-base-lite'),
	      'Capitalize' => __('Capitalize','knowledge-base-lite'),
	      'Lowercase' => __('Lowercase','knowledge-base-lite'),
    ),
		'section'=> 'knowledge_base_lite_footer',
	));

	$wp_customize->add_setting('knowledge_base_lite_footer_heading_weight',array(
        'default' => 600,
        'transport' => 'refresh',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_footer_heading_weight',array(
        'type' => 'select',
        'label' => __('Heading Font Weight','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_footer',
        'choices' => array(
        	'100' => __('100','knowledge-base-lite'),
            '200' => __('200','knowledge-base-lite'),
            '300' => __('300','knowledge-base-lite'),
            '400' => __('400','knowledge-base-lite'),
            '500' => __('500','knowledge-base-lite'),
            '600' => __('600','knowledge-base-lite'),
            '700' => __('700','knowledge-base-lite'),
            '800' => __('800','knowledge-base-lite'),
            '900' => __('900','knowledge-base-lite'),
        ),
	) );

  	$wp_customize->add_setting('knowledge_base_lite_footer_template',array(
      'default'	=> esc_html('knowledge_base_lite-footer-one'),
      'sanitize_callback'	=> 'knowledge_base_lite_sanitize_choices'
  	));
  	$wp_customize->add_control('knowledge_base_lite_footer_template',array(
      'label'	=> esc_html__('Footer style','knowledge-base-lite'),
      'section'	=> 'knowledge_base_lite_footer',
      'setting'	=> 'knowledge_base_lite_footer_template',
      'type' => 'select',
      'choices' => array(
          'knowledge_base_lite-footer-one' => esc_html__('Style 1', 'knowledge-base-lite'),
          'knowledge_base_lite-footer-two' => esc_html__('Style 2', 'knowledge-base-lite'),
          'knowledge_base_lite-footer-three' => esc_html__('Style 3', 'knowledge-base-lite'),
          'knowledge_base_lite-footer-four' => esc_html__('Style 4', 'knowledge-base-lite'),
          'knowledge_base_lite-footer-five' => esc_html__('Style 5', 'knowledge-base-lite'),
          )
  	));

	$wp_customize->add_setting('knowledge_base_lite_footer_background_color', array(
		'default'           => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'knowledge_base_lite_footer_background_color', array(
		'label'    => __('Footer Background Color', 'knowledge-base-lite'),
		'section'  => 'knowledge_base_lite_footer',
	)));

	$wp_customize->add_setting('knowledge_base_lite_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'knowledge_base_lite_footer_background_image',array(
        'label' => __('Footer Background Image','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_footer'
	)));

	$wp_customize->add_setting('knowledge_base_lite_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','knowledge-base-lite'),
		'section' => 'knowledge_base_lite_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'knowledge-base-lite' ),
			'center top'   => esc_html__( 'Top', 'knowledge-base-lite' ),
			'right top'   => esc_html__( 'Top Right', 'knowledge-base-lite' ),
			'left center'   => esc_html__( 'Left', 'knowledge-base-lite' ),
			'center center'   => esc_html__( 'Center', 'knowledge-base-lite' ),
			'right center'   => esc_html__( 'Right', 'knowledge-base-lite' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'knowledge-base-lite' ),
			'center bottom'   => esc_html__( 'Bottom', 'knowledge-base-lite' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'knowledge-base-lite' ),
		),
	)); 

	// Footer
	$wp_customize->add_setting('knowledge_base_lite_img_footer',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_img_footer',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','knowledge-base-lite'),
		'choices' => array(
            'fixed' => __('fixed','knowledge-base-lite'),
            'scroll' => __('scroll','knowledge-base-lite'),
        ),
		'section'=> 'knowledge_base_lite_footer',
	));

	$wp_customize->add_setting('knowledge_base_lite_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_footer',
        'choices' => array(
        	'Left' => __('Left','knowledge-base-lite'),
            'Center' => __('Center','knowledge-base-lite'),
            'Right' => __('Right','knowledge-base-lite')
        ),
	) );

	$wp_customize->add_setting('knowledge_base_lite_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_footer',
        'choices' => array(
        	'Left' => __('Left','knowledge-base-lite'),
            'Center' => __('Center','knowledge-base-lite'),
            'Right' => __('Right','knowledge-base-lite')
        ),
	) );

	// footer padding
	$wp_customize->add_setting('knowledge_base_lite_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','knowledge-base-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'knowledge-base-lite' ),
    ),
		'section'=> 'knowledge_base_lite_footer',
		'type'=> 'text'
	));

    // footer social icon
  	$wp_customize->add_setting( 'knowledge_base_lite_footer_icon',array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ) );
  	$wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_footer_icon',array(
		'label' => esc_html__( 'Show / Hide Footer Social Icon','knowledge-base-lite' ),
		'section' => 'knowledge_base_lite_footer'
    )));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('knowledge_base_lite_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'knowledge_base_lite_Customize_partial_knowledge_base_lite_footer_text', 
	));

	$wp_customize->add_setting( 'knowledge_base_lite_copyright_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ));
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_copyright_hide_show',array(
      'label' => esc_html__( 'Show / Hide Copyright','knowledge-base-lite' ),
      'section' => 'knowledge_base_lite_footer'
    )));

	$wp_customize->add_setting( 'knowledge_base_lite_copyright_first_color', array(
	    'default' => '#6d5ef9',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'knowledge_base_lite_copyright_first_color', array(
  		'label' => __('Copyright First Color Option', 'knowledge-base-lite'),
	    'section' => 'knowledge_base_lite_footer',
	    'settings' => 'knowledge_base_lite_copyright_first_color',
  	)));

  	$wp_customize->add_setting( 'knowledge_base_lite_copyright_second_color', array(
	    'default' => '#3bb7cf',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'knowledge_base_lite_copyright_second_color', array(
  		'label' => __('Copyright Second Color Option', 'knowledge-base-lite'),
	    'section' => 'knowledge_base_lite_footer',
	    'settings' => 'knowledge_base_lite_copyright_second_color',
  	))); 
	
	$wp_customize->add_setting('knowledge_base_lite_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('knowledge_base_lite_footer_text',array(
		'label'	=> esc_html__('Copyright Text','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2020, .....', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','knowledge-base-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Knowledge_Base_Lite_Image_Radio_Control($wp_customize, 'knowledge_base_lite_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_footer',
        'settings' => 'knowledge_base_lite_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'knowledge_base_lite_footer_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_footer_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','knowledge-base-lite' ),
      	'section' => 'knowledge_base_lite_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('knowledge_base_lite_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'knowledge_base_lite_Customize_partial_knowledge_base_lite_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('knowledge_base_lite_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Knowledge_Base_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'knowledge_base_lite_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','knowledge-base-lite'),
		'transport' => 'refresh',
		'section'	=> 'knowledge_base_lite_footer',
		'setting'	=> 'knowledge_base_lite_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('knowledge_base_lite_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','knowledge-base-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','knowledge-base-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_scroll_to_top_width',array(
		'label'	=> __('Icon Width','knowledge-base-lite'),
		'description'	=> __('Enter a value in pixels Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_scroll_to_top_height',array(
		'label'	=> __('Icon Height','knowledge-base-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'knowledge_base_lite_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'knowledge_base_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'knowledge_base_lite_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','knowledge-base-lite' ),
		'section'     => 'knowledge_base_lite_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('knowledge_base_lite_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Knowledge_Base_Lite_Image_Radio_Control($wp_customize, 'knowledge_base_lite_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_footer',
        'settings' => 'knowledge_base_lite_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

	//Blog Post
	$wp_customize->add_panel( $knowledge_base_lite_parent_panel );

	$BlogPostParentPanel = new Knowledge_Base_Lite_WP_Customize_Panel( $wp_customize, 'knowledge_base_lite_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'knowledge-base-lite' ),
		'panel' => 'knowledge_base_lite_panel_id',
		'priority' => 20,
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'knowledge_base_lite_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'knowledge-base-lite' ),
		'panel' => 'knowledge_base_lite_blog_post_parent_panel',
	));

	//Blog layout
    $wp_customize->add_setting('knowledge_base_lite_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
    ));
    $wp_customize->add_control(new Knowledge_Base_Lite_Image_Radio_Control($wp_customize, 'knowledge_base_lite_blog_layout_option', array(
        'type' => 'select',
        'label' => esc_html__('Blog Layouts','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

	$wp_customize->add_setting('knowledge_base_lite_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','knowledge-base-lite'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_post_settings',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','knowledge-base-lite'),
            'Right Sidebar' => esc_html__('Right Sidebar','knowledge-base-lite'),
            'One Column' => esc_html__('One Column','knowledge-base-lite'),
            'Three Columns' => esc_html__('Three Columns','knowledge-base-lite'),
            'Four Columns' => esc_html__('Four Columns','knowledge-base-lite'),
            'Grid Layout' => esc_html__('Grid Layout','knowledge-base-lite')
        ),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('knowledge_base_lite_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'knowledge_base_lite_Customize_partial_knowledge_base_lite_toggle_postdate', 
	));

	$wp_customize->add_setting( 'knowledge_base_lite_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_toggle_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','knowledge-base-lite' ),
        'section' => 'knowledge_base_lite_post_settings'
    )));

  	$wp_customize->add_setting('knowledge_base_lite_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Knowledge_Base_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'knowledge_base_lite_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','knowledge-base-lite'),
		'transport' => 'refresh',
		'section'	=> 'knowledge_base_lite_post_settings',
		'setting'	=> 'knowledge_base_lite_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('knowledge_base_lite_toggle_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Knowledge_Base_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'knowledge_base_lite_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','knowledge-base-lite'),
		'transport' => 'refresh',
		'section'	=> 'knowledge_base_lite_post_settings',
		'setting'	=> 'knowledge_base_lite_toggle_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'knowledge_base_lite_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_toggle_author',array(
		'label' => esc_html__( 'Show / Hide Author','knowledge-base-lite' ),
		'section' => 'knowledge_base_lite_post_settings'
    )));

    $wp_customize->add_setting('knowledge_base_lite_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Knowledge_Base_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'knowledge_base_lite_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','knowledge-base-lite'),
		'transport' => 'refresh',
		'section'	=> 'knowledge_base_lite_post_settings',
		'setting'	=> 'knowledge_base_lite_toggle_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('knowledge_base_lite_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Knowledge_Base_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'knowledge_base_lite_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','knowledge-base-lite'),
		'transport' => 'refresh',
		'section'	=> 'knowledge_base_lite_post_settings',
		'setting'	=> 'knowledge_base_lite_toggle_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'knowledge_base_lite_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','knowledge-base-lite' ),
		'section' => 'knowledge_base_lite_post_settings'
    )));

    $wp_customize->add_setting('knowledge_base_lite_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Knowledge_Base_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'knowledge_base_lite_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','knowledge-base-lite'),
		'transport' => 'refresh',
		'section'	=> 'knowledge_base_lite_post_settings',
		'setting'	=> 'knowledge_base_lite_toggle_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'knowledge_base_lite_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','knowledge-base-lite' ),
		'section' => 'knowledge_base_lite_post_settings'
    )));

    $wp_customize->add_setting( 'knowledge_base_lite_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
	));
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','knowledge-base-lite' ),
		'section' => 'knowledge_base_lite_post_settings'
    )));

    $wp_customize->add_setting( 'knowledge_base_lite_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'knowledge_base_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'knowledge_base_lite_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','knowledge-base-lite' ),
		'section'     => 'knowledge_base_lite_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'knowledge_base_lite_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'knowledge_base_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'knowledge_base_lite_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','knowledge-base-lite' ),
		'section'     => 'knowledge_base_lite_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('knowledge_base_lite_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'knowledge_base_lite_sanitize_choices'
	));
  	$wp_customize->add_control('knowledge_base_lite_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','knowledge-base-lite'),
		'section'	=> 'knowledge_base_lite_post_settings',
		'choices' => array(
		'default' => __('Default','knowledge-base-lite'),
		'custom' => __('Custom Image Size','knowledge-base-lite'),
      ),
  	));

	$wp_customize->add_setting('knowledge_base_lite_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('knowledge_base_lite_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','knowledge-base-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'knowledge-base-lite' ),),
		'section'=> 'knowledge_base_lite_post_settings',
		'type'=> 'text',
		'active_callback' => 'knowledge_base_lite_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('knowledge_base_lite_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','knowledge-base-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'knowledge-base-lite' ),),
		'section'=> 'knowledge_base_lite_post_settings',
		'type'=> 'text',
		'active_callback' => 'knowledge_base_lite_blog_post_featured_image_dimension'
	));

    $wp_customize->add_setting( 'knowledge_base_lite_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'knowledge_base_lite_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'knowledge_base_lite_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','knowledge-base-lite' ),
		'section'     => 'knowledge_base_lite_post_settings',
		'type'        => 'range',
		'settings'    => 'knowledge_base_lite_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting('knowledge_base_lite_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','knowledge-base-lite'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_post_settings',
		'type'=> 'text'
	));

   $wp_customize->add_setting('knowledge_base_lite_blog_page_posts_settings',array(
        'default' => 'Into Blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_blog_page_posts_settings',array(
        'type' => 'select',
        'label' => __('Display Blog Posts','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_post_settings',
        'choices' => array(
        	'Into Blocks' => __('Into Blocks','knowledge-base-lite'),
            'Without Blocks' => __('Without Blocks','knowledge-base-lite')
        ),
	) );

    $wp_customize->add_setting('knowledge_base_lite_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','knowledge-base-lite'),
            'Excerpt' => esc_html__('Excerpt','knowledge-base-lite'),
            'No Content' => esc_html__('No Content','knowledge-base-lite')
        ),
	) );

	$wp_customize->add_setting('knowledge_base_lite_blog_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_blog_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'knowledge_base_lite_blog_pagination_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ));
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_blog_pagination_hide_show',array(
		'label' => esc_html__( 'Show / Hide Blog Pagination','knowledge-base-lite' ),
		'section' => 'knowledge_base_lite_post_settings'
    )));

	$wp_customize->add_setting( 'knowledge_base_lite_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'knowledge_base_lite_sanitize_choices'
    ));
    $wp_customize->add_control( 'knowledge_base_lite_blog_pagination_type', array(
        'section' => 'knowledge_base_lite_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'knowledge-base-lite' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'knowledge-base-lite' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'knowledge-base-lite' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'knowledge_base_lite_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'knowledge-base-lite' ),
		'panel' => 'knowledge_base_lite_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('knowledge_base_lite_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'knowledge_base_lite_Customize_partial_knowledge_base_lite_button_text', 
	));

    $wp_customize->add_setting('knowledge_base_lite_button_text',array(
		'default'=> esc_html__('Read More','knowledge-base-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_button_text',array(
		'label'	=> esc_html__('Add Button Text','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('knowledge_base_lite_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_button_font_size',array(
		'label'	=> __('Button Font Size','knowledge-base-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'knowledge-base-lite' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'knowledge_base_lite_button_settings',
	));

	$wp_customize->add_setting( 'knowledge_base_lite_button_border_radius', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'knowledge_base_lite_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'knowledge_base_lite_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','knowledge-base-lite' ),
		'section'     => 'knowledge_base_lite_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('knowledge_base_lite_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_button_padding_top_bottom',array(
		'label'	=> esc_html__('Padding Top Bottom','knowledge-base-lite'),
		'description' => esc_html__('Enter a value in pixels. Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '10px', 'knowledge-base-lite' ),
        ),
		'section' => 'knowledge_base_lite_button_settings',
		'type' => 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_button_padding_left_right',array(
		'label'	=> esc_html__('Padding Left Right','knowledge-base-lite'),
		'description' => esc_html__('Enter a value in pixels. Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '10px', 'knowledge-base-lite' ),
        ),
		'section' => 'knowledge_base_lite_button_settings',
		'type' => 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','knowledge-base-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'knowledge-base-lite' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'knowledge_base_lite_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('knowledge_base_lite_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','knowledge-base-lite'),
		'choices' => array(
            'Uppercase' => __('Uppercase','knowledge-base-lite'),
            'Capitalize' => __('Capitalize','knowledge-base-lite'),
            'Lowercase' => __('Lowercase','knowledge-base-lite'),
        ),
		'section'=> 'knowledge_base_lite_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'knowledge_base_lite_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'knowledge-base-lite' ),
		'panel' => 'knowledge_base_lite_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('knowledge_base_lite_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'knowledge_base_lite_Customize_partial_knowledge_base_lite_related_post_title', 
	));

    $wp_customize->add_setting( 'knowledge_base_lite_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_related_post',array(
		'label' => esc_html__( 'Show / Hide Related Post','knowledge-base-lite' ),
		'section' => 'knowledge_base_lite_related_posts_settings'
    )));

    $wp_customize->add_setting('knowledge_base_lite_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('knowledge_base_lite_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'knowledge_base_lite_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'knowledge_base_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'knowledge_base_lite_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','knowledge-base-lite' ),
		'section'     => 'knowledge_base_lite_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'knowledge_base_lite_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );


	$wp_customize->add_setting( 'knowledge_base_lite_related_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
	));
  	$wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_related_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','knowledge-base-lite' ),
		'section' => 'knowledge_base_lite_related_posts_settings'
  	)));

  	$wp_customize->add_setting( 'knowledge_base_lite_related_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'knowledge_base_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'knowledge_base_lite_related_image_box_shadow', array(
		'label'       => esc_html__( 'Related post Image Box Shadow','knowledge-base-lite' ),
		'section'     => 'knowledge_base_lite_related_posts_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

  	$wp_customize->add_setting('knowledge_base_lite_related_button_text',array(
		'default'=> esc_html__('Read More','knowledge-base-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_related_button_text',array(
		'label'	=> esc_html__('Add Button Text','knowledge-base-lite'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Read More', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_related_posts_settings',
		'type'=> 'text'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'knowledge_base_lite_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'knowledge-base-lite' ),
		'panel' => 'knowledge_base_lite_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('knowledge_base_lite_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Knowledge_Base_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'knowledge_base_lite_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','knowledge-base-lite'),
		'transport' => 'refresh',
		'section'	=> 'knowledge_base_lite_single_blog_settings',
		'setting'	=> 'knowledge_base_lite_single_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'knowledge_base_lite_single_postdate',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
	) );
	$wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_single_postdate',array(
	    'label' => esc_html__( 'Show / Hide Date','knowledge-base-lite' ),
	   'section' => 'knowledge_base_lite_single_blog_settings'
	)));

	$wp_customize->add_setting('knowledge_base_lite_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Knowledge_Base_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'knowledge_base_lite_single_author_icon',array(
		'label'	=> __('Add Author Icon','knowledge-base-lite'),
		'transport' => 'refresh',
		'section'	=> 'knowledge_base_lite_single_blog_settings',
		'setting'	=> 'knowledge_base_lite_single_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'knowledge_base_lite_single_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
	) );
	$wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_single_author',array(
	    'label' => esc_html__( 'Show / Hide Author','knowledge-base-lite' ),
	    'section' => 'knowledge_base_lite_single_blog_settings'
	)));

   	$wp_customize->add_setting('knowledge_base_lite_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Knowledge_Base_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'knowledge_base_lite_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','knowledge-base-lite'),
		'transport' => 'refresh',
		'section'	=> 'knowledge_base_lite_single_blog_settings',
		'setting'	=> 'knowledge_base_lite_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'knowledge_base_lite_single_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
	) );
	$wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_single_comments',array(
	    'label' => esc_html__( 'Show / Hide Comments','knowledge-base-lite' ),
	    'section' => 'knowledge_base_lite_single_blog_settings'
	)));

  	$wp_customize->add_setting('knowledge_base_lite_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Knowledge_Base_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'knowledge_base_lite_single_time_icon',array(
		'label'	=> __('Add Time Icon','knowledge-base-lite'),
		'transport' => 'refresh',
		'section'	=> 'knowledge_base_lite_single_blog_settings',
		'setting'	=> 'knowledge_base_lite_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'knowledge_base_lite_single_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
	) );

	$wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_single_time',array(
	    'label' => esc_html__( 'Show / Hide Time','knowledge-base-lite' ),
	    'section' => 'knowledge_base_lite_single_blog_settings'
	)));

	$wp_customize->add_setting( 'knowledge_base_lite_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','knowledge-base-lite' ),
		'section' => 'knowledge_base_lite_single_blog_settings'
    )));

    // Single Posts Category
  	$wp_customize->add_setting( 'knowledge_base_lite_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ) );
  	$wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','knowledge-base-lite' ),
		'section' => 'knowledge_base_lite_single_blog_settings'
    )));

	$wp_customize->add_setting( 'knowledge_base_lite_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
	));
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','knowledge-base-lite' ),
		'section' => 'knowledge_base_lite_single_blog_settings'
    )));

	$wp_customize->add_setting( 'knowledge_base_lite_singlepost_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'knowledge_base_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'knowledge_base_lite_singlepost_image_box_shadow', array(
		'label'       => esc_html__( 'Single post Image Box Shadow','knowledge-base-lite' ),
		'section'     => 'knowledge_base_lite_single_blog_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('knowledge_base_lite_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','knowledge-base-lite'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_single_blog_settings',
		'type'=> 'text'
	));


	$wp_customize->add_setting( 'knowledge_base_lite_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
	));
	$wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_single_blog_post_navigation_show_hide', array(
		  'label' => esc_html__( 'Show / Hide Post Navigation','knowledge-base-lite' ),
		  'section' => 'knowledge_base_lite_single_blog_settings'
	)));

	//navigation text
	$wp_customize->add_setting('knowledge_base_lite_single_blog_prev_navigation_text',array(
		'default'=> 'PREVIOUS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','knowledge-base-lite'),
		'input_attrs' => array(
    'placeholder' => __( 'PREVIOUS', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_single_blog_next_navigation_text',array(
		'default'=> 'NEXT',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_single_blog_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('knowledge_base_lite_single_blog_comment_title',array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('knowledge_base_lite_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_single_blog_comment_button_text',array(
		'default'=> 'Post Comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('knowledge_base_lite_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_single_blog_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('knowledge_base_lite_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','knowledge-base-lite'),
		'description'	=> __('Enter a value in %. Example:50%','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_single_blog_settings',
		'type'=> 'text'
	));

	// Grid layout setting
	$wp_customize->add_section( 'knowledge_base_lite_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'knowledge-base-lite' ),
		'panel' => 'knowledge_base_lite_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('knowledge_base_lite_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Knowledge_Base_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'knowledge_base_lite_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','knowledge-base-lite'),
		'transport' => 'refresh',
		'section'	=> 'knowledge_base_lite_grid_layout_settings',
		'setting'	=> 'knowledge_base_lite_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'knowledge_base_lite_grid_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_grid_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','knowledge-base-lite' ),
        'section' => 'knowledge_base_lite_grid_layout_settings'
    )));

	$wp_customize->add_setting('knowledge_base_lite_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Knowledge_Base_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'knowledge_base_lite_grid_author_icon',array(
		'label'	=> __('Add Author Icon','knowledge-base-lite'),
		'transport' => 'refresh',
		'section'	=> 'knowledge_base_lite_grid_layout_settings',
		'setting'	=> 'knowledge_base_lite_grid_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'knowledge_base_lite_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','knowledge-base-lite' ),
		'section' => 'knowledge_base_lite_grid_layout_settings'
    )));

   	$wp_customize->add_setting('knowledge_base_lite_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Knowledge_Base_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'knowledge_base_lite_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','knowledge-base-lite'),
		'transport' => 'refresh',
		'section'	=> 'knowledge_base_lite_grid_layout_settings',
		'setting'	=> 'knowledge_base_lite_grid_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'knowledge_base_lite_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','knowledge-base-lite' ),
		'section' => 'knowledge_base_lite_grid_layout_settings'
    )));

	$wp_customize->add_setting( 'knowledge_base_lite_grid_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
  	) );
  	$wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_grid_time',array(
		'label' => esc_html__( 'Show / Hide Time','knowledge-base-lite' ),
		'section' => 'knowledge_base_lite_grid_layout_settings'
  	)));

  	$wp_customize->add_setting('knowledge_base_lite_grid_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Knowledge_Base_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'knowledge_base_lite_grid_time_icon',array(
		'label'	=> __('Add Time Icon','knowledge-base-lite'),
		'transport' => 'refresh',
		'section'	=> 'knowledge_base_lite_grid_layout_settings',
		'setting'	=> 'knowledge_base_lite_grid_time_icon',
		'type'		=> 'icon'
	)));


    $wp_customize->add_setting( 'knowledge_base_lite_grid_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
	));
  	$wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_grid_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','knowledge-base-lite' ),
		'section' => 'knowledge_base_lite_grid_layout_settings'
  	)));

   	$wp_customize->add_setting('knowledge_base_lite_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','knowledge-base-lite'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','knowledge-base-lite'),
		'section'=> 'knowledge_base_lite_grid_layout_settings',
		'type'=> 'text'
	));

	 $wp_customize->add_setting( 'knowledge_base_lite_grid_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'knowledge_base_lite_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'knowledge_base_lite_grid_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','knowledge-base-lite' ),
		'section'     => 'knowledge_base_lite_grid_layout_settings',
		'type'        => 'range',
		'settings'    => 'knowledge_base_lite_grid_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

  	$wp_customize->add_setting('knowledge_base_lite_display_grid_posts_settings',array(
	    'default' => 'Into Blocks',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_display_grid_posts_settings',array(
	    'type' => 'select',
	    'label' => __('Display Grid Posts','knowledge-base-lite'),
	    'section' => 'knowledge_base_lite_grid_layout_settings',
	    'choices' => array(
	    	'Into Blocks' => __('Into Blocks','knowledge-base-lite'),
	      'Without Blocks' => __('Without Blocks','knowledge-base-lite')
	      ),
	) );

	$wp_customize->add_setting('knowledge_base_lite_grid_button_text',array(
		'default'=> esc_html__('Read More','knowledge-base-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','knowledge-base-lite'),
		'input_attrs' => array(
        'placeholder' => esc_html__( 'Read More', 'knowledge-base-lite' ),
      ),
		'section'=> 'knowledge_base_lite_grid_layout_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_grid_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_grid_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_grid_layout_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_grid_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_grid_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Grid Post Content','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_grid_layout_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','knowledge-base-lite'),
            'Excerpt' => esc_html__('Excerpt','knowledge-base-lite'),
            'No Content' => esc_html__('No Content','knowledge-base-lite')
        ),
	) );

	$wp_customize->add_setting( 'knowledge_base_lite_grid_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'knowledge_base_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'knowledge_base_lite_grid_featured_image_border_radius', array(
		'label'       => esc_html__( 'Grid Featured Image Border Radius','knowledge-base-lite' ),
		'section'     => 'knowledge_base_lite_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'knowledge_base_lite_grid_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'knowledge_base_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'knowledge_base_lite_grid_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Grid Featured Image Box Shadow','knowledge-base-lite' ),
		'section'     => 'knowledge_base_lite_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Other Settings
	$wp_customize->add_panel( $knowledge_base_lite_parent_panel );

	$OtherParentPanel = new Knowledge_Base_Lite_WP_Customize_Panel( $wp_customize, 'knowledge_base_lite_other_parent_panel', array(
		'title' => esc_html__( 'Other Settings', 'knowledge-base-lite' ),
		'panel' => 'knowledge_base_lite_panel_id',
		'priority' => 20,
	));

	$wp_customize->add_panel( $OtherParentPanel );

	// Layout
	$wp_customize->add_section( 'knowledge_base_lite_left_right', array(
    	'title' => esc_html__( 'General Settings', 'knowledge-base-lite' ),
		'panel' => 'knowledge_base_lite_other_parent_panel'
	) );

	$wp_customize->add_setting('knowledge_base_lite_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control(new Knowledge_Base_Lite_Image_Radio_Control($wp_customize, 'knowledge_base_lite_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','knowledge-base-lite'),
        'description' => esc_html__('Here you can change the width layout of Website.','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('knowledge_base_lite_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','knowledge-base-lite'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','knowledge-base-lite'),
            'Right Sidebar' => esc_html__('Right Sidebar','knowledge-base-lite'),
            'One Column' => esc_html__('One Column','knowledge-base-lite')
        ),
	) );

    $wp_customize->add_setting( 'knowledge_base_lite_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_single_page_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Page Breadcrumb','knowledge-base-lite' ),
		'section' => 'knowledge_base_lite_left_right'
    )));

    //Wow Animation
	$wp_customize->add_setting( 'knowledge_base_lite_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ));
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_animation',array(
        'label' => esc_html__( 'Show / Hide Animations','knowledge-base-lite' ),
        'description' => __('Here you can disable overall site animation effect','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_left_right'
    )));

    //Pre-Loader
	$wp_customize->add_setting( 'knowledge_base_lite_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_loader_enable',array(
        'label' => esc_html__( 'Show / Hide Pre-Loader','knowledge-base-lite' ),
        'section' => 'knowledge_base_lite_left_right'
    )));

	$wp_customize->add_setting('knowledge_base_lite_preloader_bg_color', array(
		'default'           => '#3bb7cf',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'knowledge_base_lite_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'knowledge-base-lite'),
		'section'  => 'knowledge_base_lite_left_right',
	)));

	$wp_customize->add_setting('knowledge_base_lite_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'knowledge_base_lite_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'knowledge-base-lite'),
		'section'  => 'knowledge_base_lite_left_right',
	)));

	$wp_customize->add_setting('knowledge_base_lite_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'knowledge_base_lite_preloader_bg_img',array(
        'label' => __('Preloader Background Image','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_left_right'
	)));

	$wp_customize->add_setting('knowledge_base_lite_bradcrumbs_alignment',array(
        'default' => 'Left',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_bradcrumbs_alignment',array(
        'type' => 'select',
        'label' => __('Bradcrumbs Alignment','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_left_right',
        'choices' => array(
            'Left' => __('Left','knowledge-base-lite'),
            'Right' => __('Right','knowledge-base-lite'),
            'Center' => __('Center','knowledge-base-lite'),
        ),
	) );

    //404 Page Setting
	$wp_customize->add_section('knowledge_base_lite_404_page',array(
		'title'	=> __('404 Page Settings','knowledge-base-lite'),
		'panel' => 'knowledge_base_lite_other_parent_panel',
	));

	$wp_customize->add_setting('knowledge_base_lite_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('knowledge_base_lite_404_page_title',array(
		'label'	=> __('Add Title','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('knowledge_base_lite_404_page_content',array(
		'label'	=> __('Add Text','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_404_page_button_text',array(
		'label'	=> __('Add Button Text','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'GO BACK', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('knowledge_base_lite_no_results_page',array(
		'title'	=> __('No Results Page Settings','knowledge-base-lite'),
		'panel' => 'knowledge_base_lite_other_parent_panel',
	));	

	$wp_customize->add_setting('knowledge_base_lite_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('knowledge_base_lite_no_results_page_title',array(
		'label'	=> __('Add Title','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('knowledge_base_lite_no_results_page_content',array(
		'label'	=> __('Add Text','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('knowledge_base_lite_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','knowledge-base-lite'),
		'panel' => 'knowledge_base_lite_other_parent_panel',
	));

	$wp_customize->add_setting('knowledge_base_lite_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','knowledge-base-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_social_icon_padding',array(
		'label'	=> __('Icon Padding','knowledge-base-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_social_icon_width',array(
		'label'	=> __('Icon Width','knowledge-base-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
    'placeholder' => __( '10px', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_social_icon_height',array(
		'label'	=> __('Icon Height','knowledge-base-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_social_icon_settings',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('knowledge_base_lite_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','knowledge-base-lite'),
		'panel' => 'knowledge_base_lite_other_parent_panel',
	));

    $wp_customize->add_setting( 'knowledge_base_lite_resp_slider_hide_show',array(
      	'default' => 0,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','knowledge-base-lite' ),
      	'section' => 'knowledge_base_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'knowledge_base_lite_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','knowledge-base-lite' ),
      	'section' => 'knowledge_base_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'knowledge_base_lite_responsive_preloader_hide',array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_responsive_preloader_hide',array(
        'label' => esc_html__( 'Show / Hide Preloader','knowledge-base-lite' ),
        'section' => 'knowledge_base_lite_responsive_media'
    )));

    $wp_customize->add_setting( 'knowledge_base_lite_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ));  
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','knowledge-base-lite' ),
      	'section' => 'knowledge_base_lite_responsive_media'
    )));

    $wp_customize->add_setting('knowledge_base_lite_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'knowledge_base_lite_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'knowledge-base-lite'),
		'section'  => 'knowledge_base_lite_responsive_media',
	)));

    $wp_customize->add_setting('knowledge_base_lite_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Knowledge_Base_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'knowledge_base_lite_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','knowledge-base-lite'),
		'transport' => 'refresh',
		'section'	=> 'knowledge_base_lite_responsive_media',
		'setting'	=> 'knowledge_base_lite_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('knowledge_base_lite_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Knowledge_Base_Lite_Fontawesome_Icon_Chooser(
        $wp_customize,'knowledge_base_lite_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','knowledge-base-lite'),
		'transport' => 'refresh',
		'section'	=> 'knowledge_base_lite_responsive_media',
		'setting'	=> 'knowledge_base_lite_res_close_menu_icon',
		'type'		=> 'icon'
	)));
	
    //Woocommerce settings
	$wp_customize->add_section('knowledge_base_lite_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'knowledge-base-lite'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

    //Shop Page Featured Image
	$wp_customize->add_setting( 'knowledge_base_lite_shop_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'knowledge_base_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'knowledge_base_lite_shop_featured_image_border_radius', array(
		'label'       => esc_html__( 'Shop Page Featured Image Border Radius','knowledge-base-lite' ),
		'section'     => 'knowledge_base_lite_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'knowledge_base_lite_shop_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'knowledge_base_lite_sanitize_number_range'
	) );
	$wp_customize->add_control( 'knowledge_base_lite_shop_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Shop Page Featured Image Box Shadow','knowledge-base-lite' ),
		'section'     => 'knowledge_base_lite_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'knowledge_base_lite_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'knowledge_base_lite_customize_partial_knowledge_base_lite_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'knowledge_base_lite_woocommerce_shop_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','knowledge-base-lite' ),
		'section' => 'knowledge_base_lite_woocommerce_section'
    )));

    $wp_customize->add_setting('knowledge_base_lite_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','knowledge-base-lite'),
            'Right Sidebar' => __('Right Sidebar','knowledge-base-lite'),
        ),
	) );

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'knowledge_base_lite_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'knowledge_base_lite_customize_partial_knowledge_base_lite_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'knowledge_base_lite_woocommerce_single_product_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','knowledge-base-lite' ),
		'section' => 'knowledge_base_lite_woocommerce_section'
    )));

   $wp_customize->add_setting('knowledge_base_lite_single_product_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','knowledge-base-lite'),
            'Right Sidebar' => __('Right Sidebar','knowledge-base-lite'),
        ),
	) );

	$wp_customize->add_setting('knowledge_base_lite_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','knowledge-base-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('knowledge_base_lite_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('knowledge_base_lite_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','knowledge-base-lite'),
		'description'	=> __('Enter a value in pixels. Example:20px','knowledge-base-lite'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'knowledge-base-lite' ),
        ),
		'section'=> 'knowledge_base_lite_woocommerce_section',
		'type'=> 'text'
	));

	//Products Sale Badge
	$wp_customize->add_setting('knowledge_base_lite_woocommerce_sale_position',array(
        'default' => 'left',
        'sanitize_callback' => 'knowledge_base_lite_sanitize_choices'
	));
	$wp_customize->add_control('knowledge_base_lite_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','knowledge-base-lite'),
        'section' => 'knowledge_base_lite_woocommerce_section',
        'choices' => array(
            'left' => __('Left','knowledge-base-lite'),
            'right' => __('Right','knowledge-base-lite'),
        ),
	) );

  	// Related Product
    $wp_customize->add_setting( 'knowledge_base_lite_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'knowledge_base_lite_switch_sanitization'
    ) );
    $wp_customize->add_control( new Knowledge_Base_Lite_Toggle_Switch_Custom_Control( $wp_customize, 'knowledge_base_lite_related_product_show_hide',array(
        'label' => esc_html__( 'Show / Hide Related product','knowledge-base-lite' ),
        'section' => 'knowledge_base_lite_woocommerce_section'
    )));

    // Has to be at the top
	$wp_customize->register_panel_type( 'Knowledge_Base_Lite_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'Knowledge_Base_Lite_WP_Customize_Section' );
}

add_action( 'customize_register', 'knowledge_base_lite_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Knowledge_Base_Lite_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'knowledge_base_lite_panel';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;
			return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class Knowledge_Base_Lite_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'knowledge_base_lite_section';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;

			if ( $this->panel ) {
			$array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
			} else {
			$array['customizeAction'] = 'Customizing';
			}
			return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function knowledge_base_lite_Customize_controls_scripts() {
	wp_enqueue_script( 'knowledge-base-lite-customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'knowledge_base_lite_Customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Knowledge_Base_Lite_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Knowledge_Base_Lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Knowledge_Base_Lite_Customize_Section_Pro( $manager,'knowledge_base_lite_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Knowledge Base PRO', 'knowledge-base-lite' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'knowledge-base-lite' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/products/knowledge-base-wordpress-theme'),
		) )	);

		$manager->add_section(new Knowledge_Base_Lite_Customize_Section_Pro($manager,'knowledge_base_lite_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'knowledge-base-lite' ),
			'pro_text' => esc_html__( 'DOCS', 'knowledge-base-lite' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-knowledge-base/')
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'knowledge-base-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'knowledge-base-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Knowledge_Base_Lite_Customize::get_instance();