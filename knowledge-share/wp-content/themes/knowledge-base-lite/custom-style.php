<?php

	$knowledge_base_lite_custom_css= "";

	/*------------------First highlight color-------------------*/

	$knowledge_base_lite_first_color = get_theme_mod('knowledge_base_lite_first_color');

	if($knowledge_base_lite_first_color != false){
		$knowledge_base_lite_custom_css .='.main-navigation ul.sub-menu>li>a:before,.woocommerce span.onsale{';
			$knowledge_base_lite_custom_css .='background-color: '.esc_attr($knowledge_base_lite_first_color).';';
		$knowledge_base_lite_custom_css .='}';
	}

	if($knowledge_base_lite_first_color != false){
		$knowledge_base_lite_custom_css .='#slider .carousel-control-prev-icon,  #slider .carousel-control-next-icon, .woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce ul.products li.product .price,.topbar-btn a:hover, .inner-box h4 a:hover,a.wc-block-components-product-name, .wc-block-components-product-name{';
			$knowledge_base_lite_custom_css .='color: '.esc_attr($knowledge_base_lite_first_color).'!important;';
		$knowledge_base_lite_custom_css .='}';
	}

	/*-----------------Second highlight color-------------------*/

	$knowledge_base_lite_second_color = get_theme_mod('knowledge_base_lite_second_color');

	if($knowledge_base_lite_second_color != false){
		$knowledge_base_lite_custom_css .='#preloader,.wp-block-woocommerce-cart .wc-block-cart__submit-button:hover, .wc-block-components-checkout-place-order-button:hover,.wc-block-components-totals-coupon__button{';
			$knowledge_base_lite_custom_css .='background-color: '.esc_attr($knowledge_base_lite_second_color).'!important;';
		$knowledge_base_lite_custom_css .='}';
	}

	if($knowledge_base_lite_second_color != false){
		$knowledge_base_lite_custom_css .='#footer .textwidget a,#footer li a:hover,.post-main-box:hover h3 a,#sidebar ul li a:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.post-navigation a:hover,.post-navigation a:focus, .slider-inner-box h1 a:hover, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .single-post .post-info:hover a,#footer .wp-block-button.aligncenter, .wp-block-calendar a, #footer .wp-block-button.aligncenter, .wp-block-calendar a:hover{';
			$knowledge_base_lite_custom_css .='color: '.esc_attr($knowledge_base_lite_second_color).';';
		$knowledge_base_lite_custom_css .='}';
	}

	if($knowledge_base_lite_first_color != false || $knowledge_base_lite_second_color != false){
		$knowledge_base_lite_custom_css .='.middle-bar, .slide-search input[type="submit"],.main-inner-box span.entry-date,.more-btn a:hover,input[type="submit"]:hover,#comments input[type="submit"]:hover,#comments a.comment-reply-link:hover,#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover,.pagination .current,.pagination a:hover,#footer .tagcloud a:hover,#sidebar .tagcloud a:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.widget_product_search button:hover, .slide-image, #footer-2, .scrollup i, .pagination span, .pagination a, .widget_product_search button,nav.woocommerce-MyAccount-navigation ul li:hover, input[type="submit"], input.button, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, .bradcrumbs a:hover, .bradcrumbs span,.wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button{
		background: linear-gradient(to right, '.esc_attr($knowledge_base_lite_first_color).', '.esc_attr($knowledge_base_lite_second_color).');
		}';
	}

	if($knowledge_base_lite_first_color != false || $knowledge_base_lite_second_color != false){
		$knowledge_base_lite_custom_css .='.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.bradcrumbs a:hover, .bradcrumbs span, .post-categories li a:hover,#sidebar label.wp-block-search__label, #sidebar .wp-block-heading, #sidebar .widget .custom-about-us h3, #sidebar .widget .custom-contact-us h3,.wp-block-tag-cloud a:hover,#sidebar h3,.wp-block-button__link,.wp-block-woocommerce-cart .wc-block-cart__submit-button:hover, .wc-block-components-checkout-place-order-button:hover,.slide-search input[type="submit"], .main-inner-box span.entry-date, .more-btn a:hover, input[type="submit"]:hover, #comments input[type="submit"]:hover, #comments a.comment-reply-link:hover, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .pagination .current, .pagination a:hover, #footer .tagcloud a:hover, #sidebar .tagcloud a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .widget_product_search button:hover, nav.woocommerce-MyAccount-navigation ul li,header.woocommerce-Address-title.title a:hover, #tag-cloud-sec .tag-cloud-link:hover, .wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link:hover:hover,.wp-block-woocommerce-cart .wc-block-components-product-badge,.wc-block-grid__product-onsale{
		background: linear-gradient(to right, '.esc_attr($knowledge_base_lite_first_color).', '.esc_attr($knowledge_base_lite_second_color).') !important;
		}';
	}

	if($knowledge_base_lite_first_color != false || $knowledge_base_lite_second_color != false){
		$knowledge_base_lite_custom_css .='@media screen and (max-width: 1000px){
			.page-template-custom-home-page .middle-bar{';
		$knowledge_base_lite_custom_css .='background-image: linear-gradient(to right, '.esc_attr($knowledge_base_lite_first_color).', '.esc_attr($knowledge_base_lite_second_color).');';
		$knowledge_base_lite_custom_css .='} }';
	}

	/*---------------------------Width Layout -------------------*/

	$knowledge_base_lite_theme_lay = get_theme_mod( 'knowledge_base_lite_width_option','Full Width');
    if($knowledge_base_lite_theme_lay == 'Boxed'){
		$knowledge_base_lite_custom_css .='body{';
			$knowledge_base_lite_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$knowledge_base_lite_custom_css .='}';
		$knowledge_base_lite_custom_css .='#slider img{';
			$knowledge_base_lite_custom_css .='height: 660px;';
		$knowledge_base_lite_custom_css .='}';
		$knowledge_base_lite_custom_css .='#slider .carousel-caption{';
			$knowledge_base_lite_custom_css .='right: 18% !important; left: 18% !important;';
		$knowledge_base_lite_custom_css .='}';
		$knowledge_base_lite_custom_css .='.scrollup i{';
			$knowledge_base_lite_custom_css .='right: 100px;';
		$knowledge_base_lite_custom_css .='}';
		$knowledge_base_lite_custom_css .='.scrollup.left i{';
			$knowledge_base_lite_custom_css .='left: 100px;';
		$knowledge_base_lite_custom_css .='}';
	}else if($knowledge_base_lite_theme_lay == 'Wide Width'){
		$knowledge_base_lite_custom_css .='body{';
			$knowledge_base_lite_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$knowledge_base_lite_custom_css .='}';
		$knowledge_base_lite_custom_css .='.scrollup i{';
			$knowledge_base_lite_custom_css .='right: 30px;';
		$knowledge_base_lite_custom_css .='}';
		$knowledge_base_lite_custom_css .='.scrollup.left i{';
			$knowledge_base_lite_custom_css .='left: 30px;';
		$knowledge_base_lite_custom_css .='}';
	}else if($knowledge_base_lite_theme_lay == 'Full Width'){
		$knowledge_base_lite_custom_css .='body{';
			$knowledge_base_lite_custom_css .='max-width: 100%;';
		$knowledge_base_lite_custom_css .='}';
	}

		/*--------------------------- Slider Opacity -------------------*/

	$knowledge_base_lite_theme_lay = get_theme_mod( 'knowledge_base_lite_slider_opacity_color','0.2');
	if($knowledge_base_lite_theme_lay == '0'){
		$knowledge_base_lite_custom_css .='#slider img{';
			$knowledge_base_lite_custom_css .='opacity:0';
		$knowledge_base_lite_custom_css .='}';
		}else if($knowledge_base_lite_theme_lay == '0.1'){
		$knowledge_base_lite_custom_css .='#slider img{';
			$knowledge_base_lite_custom_css .='opacity:0.1';
		$knowledge_base_lite_custom_css .='}';
		}else if($knowledge_base_lite_theme_lay == '0.2'){
		$knowledge_base_lite_custom_css .='#slider img{';
			$knowledge_base_lite_custom_css .='opacity:0.2';
		$knowledge_base_lite_custom_css .='}';
		}else if($knowledge_base_lite_theme_lay == '0.3'){
		$knowledge_base_lite_custom_css .='#slider img{';
			$knowledge_base_lite_custom_css .='opacity:0.3';
		$knowledge_base_lite_custom_css .='}';
		}else if($knowledge_base_lite_theme_lay == '0.4'){
		$knowledge_base_lite_custom_css .='#slider img{';
			$knowledge_base_lite_custom_css .='opacity:0.4';
		$knowledge_base_lite_custom_css .='}';
		}else if($knowledge_base_lite_theme_lay == '0.5'){
		$knowledge_base_lite_custom_css .='#slider img{';
			$knowledge_base_lite_custom_css .='opacity:0.5';
		$knowledge_base_lite_custom_css .='}';
		}else if($knowledge_base_lite_theme_lay == '0.6'){
		$knowledge_base_lite_custom_css .='#slider img{';
			$knowledge_base_lite_custom_css .='opacity:0.6';
		$knowledge_base_lite_custom_css .='}';
		}else if($knowledge_base_lite_theme_lay == '0.7'){
		$knowledge_base_lite_custom_css .='#slider img{';
			$knowledge_base_lite_custom_css .='opacity:0.7';
		$knowledge_base_lite_custom_css .='}';
		}else if($knowledge_base_lite_theme_lay == '0.8'){
		$knowledge_base_lite_custom_css .='#slider img{';
			$knowledge_base_lite_custom_css .='opacity:0.8';
		$knowledge_base_lite_custom_css .='}';
		}else if($knowledge_base_lite_theme_lay == '0.9'){
		$knowledge_base_lite_custom_css .='#slider img{';
			$knowledge_base_lite_custom_css .='opacity:0.9';
		$knowledge_base_lite_custom_css .='}';
		}

	/*---------------- Slider Content Layout -------------------*/

	$knowledge_base_lite_theme_lay = get_theme_mod( 'knowledge_base_lite_slider_content_option','Center');
    if($knowledge_base_lite_theme_lay == 'Left'){
		$knowledge_base_lite_custom_css .='#slider .carousel-caption{';
			$knowledge_base_lite_custom_css .='text-align:left; right: 40%; left:20%';
		$knowledge_base_lite_custom_css .='}';
	}else if($knowledge_base_lite_theme_lay == 'Center'){
		$knowledge_base_lite_custom_css .='#slider .carousel-caption{';
			$knowledge_base_lite_custom_css .='text-align:center; right: 25%; left: 25%;';
		$knowledge_base_lite_custom_css .='}';
	}else if($knowledge_base_lite_theme_lay == 'Right'){
		$knowledge_base_lite_custom_css .='#slider .carousel-caption{';
			$knowledge_base_lite_custom_css .='text-align:right; right: 20%; left: 40%;';
		$knowledge_base_lite_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$knowledge_base_lite_slider_content_padding_top_bottom = get_theme_mod('knowledge_base_lite_slider_content_padding_top_bottom');
	$knowledge_base_lite_slider_content_padding_left_right = get_theme_mod('knowledge_base_lite_slider_content_padding_left_right');
	if($knowledge_base_lite_slider_content_padding_top_bottom != false || $knowledge_base_lite_slider_content_padding_left_right != false){
		$knowledge_base_lite_custom_css .='#slider .carousel-caption{';
			$knowledge_base_lite_custom_css .='top: '.esc_attr($knowledge_base_lite_slider_content_padding_top_bottom).'; bottom: '.esc_attr($knowledge_base_lite_slider_content_padding_top_bottom).';left: '.esc_attr($knowledge_base_lite_slider_content_padding_left_right).';right: '.esc_attr($knowledge_base_lite_slider_content_padding_left_right).';';
		$knowledge_base_lite_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$knowledge_base_lite_slider = get_theme_mod('knowledge_base_lite_slider_arrows');
	if($knowledge_base_lite_slider == false){
		$knowledge_base_lite_custom_css .='.page-template-custom-home-page .middle-bar{';
			$knowledge_base_lite_custom_css .='position: static; background-image: linear-gradient(to right, #6d5ef9 , #3bb7cf);';
		$knowledge_base_lite_custom_css .='}';
		$knowledge_base_lite_custom_css .='.page-template-custom-home-page .inner-head-box{';
			$knowledge_base_lite_custom_css .='border-bottom: none; padding-bottom: 0px;';
		$knowledge_base_lite_custom_css .='}';
		$knowledge_base_lite_custom_css .='#services-sec{';
			$knowledge_base_lite_custom_css .='margin-top: 3%;';
		$knowledge_base_lite_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$knowledge_base_lite_slider_height = get_theme_mod('knowledge_base_lite_slider_height');
	if($knowledge_base_lite_slider_height != false){
		$knowledge_base_lite_custom_css .='#slider img{';
			$knowledge_base_lite_custom_css .='height: '.esc_attr($knowledge_base_lite_slider_height).';';
		$knowledge_base_lite_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$knowledge_base_lite_theme_lay = get_theme_mod( 'knowledge_base_lite_blog_layout_option','Default');
    if($knowledge_base_lite_theme_lay == 'Default'){
		$knowledge_base_lite_custom_css .='.post-main-box{';
			$knowledge_base_lite_custom_css .='';
		$knowledge_base_lite_custom_css .='}';
	}else if($knowledge_base_lite_theme_lay == 'Center'){
		$knowledge_base_lite_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p{';
			$knowledge_base_lite_custom_css .='text-align:center;';
		$knowledge_base_lite_custom_css .='}';
		$knowledge_base_lite_custom_css .='.post-info{';
			$knowledge_base_lite_custom_css .='margin-top:10px;';
		$knowledge_base_lite_custom_css .='}';
	}else if($knowledge_base_lite_theme_lay == 'Left'){
		$knowledge_base_lite_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, #our-services p{';
			$knowledge_base_lite_custom_css .='text-align:Left;';
		$knowledge_base_lite_custom_css .='}';
		$knowledge_base_lite_custom_css .='.post-main-box h2{';
			$knowledge_base_lite_custom_css .='margin-top:10px;';
		$knowledge_base_lite_custom_css .='}';
	}

	/*--------------------- Blog Page Posts -------------------*/

	$knowledge_base_lite_blog_page_posts_settings = get_theme_mod( 'knowledge_base_lite_blog_page_posts_settings','Into Blocks');
    if($knowledge_base_lite_blog_page_posts_settings == 'Without Blocks'){
		$knowledge_base_lite_custom_css .='.post-main-box{';
			$knowledge_base_lite_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_single_blog_post_navigation_show_hide = get_theme_mod('knowledge_base_lite_single_blog_post_navigation_show_hide',true);
	if($knowledge_base_lite_single_blog_post_navigation_show_hide != true){
		$knowledge_base_lite_custom_css .='.post-navigation{';
			$knowledge_base_lite_custom_css .='display: none;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_related_image_box_shadow = get_theme_mod('knowledge_base_lite_related_image_box_shadow',0);
    if($knowledge_base_lite_related_image_box_shadow != false){
        $knowledge_base_lite_custom_css .='.related-post .box-image img{';
            $knowledge_base_lite_custom_css .='box-shadow: '.esc_attr($knowledge_base_lite_related_image_box_shadow).'px '.esc_attr($knowledge_base_lite_related_image_box_shadow).'px '.esc_attr($knowledge_base_lite_related_image_box_shadow).'px #cccccc;';
        $knowledge_base_lite_custom_css .='}';
    }

	/*----------------Responsive Media -----------------------*/

	$knowledge_base_lite_resp_slider = get_theme_mod( 'knowledge_base_lite_resp_slider_hide_show',true);
	if($knowledge_base_lite_resp_slider == true && get_theme_mod( 'knowledge_base_lite_slider_arrows', false) == false){
    	$knowledge_base_lite_custom_css .='#slider{';
			$knowledge_base_lite_custom_css .='display:none;';
		$knowledge_base_lite_custom_css .='} ';
	}
    if($knowledge_base_lite_resp_slider == true){
    	$knowledge_base_lite_custom_css .='@media screen and (max-width:575px) {';
		$knowledge_base_lite_custom_css .='#slider{';
			$knowledge_base_lite_custom_css .='display:block;';
		$knowledge_base_lite_custom_css .='} }';
	}else if($knowledge_base_lite_resp_slider == false){
		$knowledge_base_lite_custom_css .='@media screen and (max-width:575px) {';
		$knowledge_base_lite_custom_css .='#slider{';
			$knowledge_base_lite_custom_css .='display:none;';
		$knowledge_base_lite_custom_css .='} }';
	}

	$knowledge_base_lite_resp_sidebar = get_theme_mod( 'knowledge_base_lite_sidebar_hide_show',true);
    if($knowledge_base_lite_resp_sidebar == true){
    	$knowledge_base_lite_custom_css .='@media screen and (max-width:575px) {';
		$knowledge_base_lite_custom_css .='#sidebar{';
			$knowledge_base_lite_custom_css .='display:block;';
		$knowledge_base_lite_custom_css .='} }';
	}else if($knowledge_base_lite_resp_sidebar == false){
		$knowledge_base_lite_custom_css .='@media screen and (max-width:575px) {';
		$knowledge_base_lite_custom_css .='#sidebar{';
			$knowledge_base_lite_custom_css .='display:none;';
		$knowledge_base_lite_custom_css .='} }';
	}

	$knowledge_base_lite_resp_scroll_top = get_theme_mod( 'knowledge_base_lite_resp_scroll_top_hide_show',true);
	if($knowledge_base_lite_resp_scroll_top == true && get_theme_mod( 'knowledge_base_lite_footer_scroll',true) != true){
    	$knowledge_base_lite_custom_css .='.scrollup i{';
			$knowledge_base_lite_custom_css .='visibility:hidden !important;';
		$knowledge_base_lite_custom_css .='} ';
	}
    if($knowledge_base_lite_resp_scroll_top == true){
    	$knowledge_base_lite_custom_css .='@media screen and (max-width:575px) {';
		$knowledge_base_lite_custom_css .='.scrollup i{';
			$knowledge_base_lite_custom_css .='visibility:visible !important;';
		$knowledge_base_lite_custom_css .='} }';
	}else if($knowledge_base_lite_resp_scroll_top == false){
		$knowledge_base_lite_custom_css .='@media screen and (max-width:575px){';
		$knowledge_base_lite_custom_css .='.scrollup i{';
			$knowledge_base_lite_custom_css .='visibility:hidden !important;';
		$knowledge_base_lite_custom_css .='} }';
	}

	$knowledge_base_lite_resp_menu_toggle_btn_bg_color = get_theme_mod('knowledge_base_lite_resp_menu_toggle_btn_bg_color');
	if($knowledge_base_lite_resp_menu_toggle_btn_bg_color != false){
		$knowledge_base_lite_custom_css .='.toggle-nav i{';
			$knowledge_base_lite_custom_css .='background-color: '.esc_attr($knowledge_base_lite_resp_menu_toggle_btn_bg_color).';';
		$knowledge_base_lite_custom_css .='}';
	}

	/*---------------- Menus Settings ------------------*/

	$knowledge_base_lite_navigation_menu_font_size = get_theme_mod('knowledge_base_lite_navigation_menu_font_size');
	if($knowledge_base_lite_navigation_menu_font_size != false){
		$knowledge_base_lite_custom_css .='.main-navigation a{';
			$knowledge_base_lite_custom_css .='font-size: '.esc_attr($knowledge_base_lite_navigation_menu_font_size).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_navigation_menu_font_weight = get_theme_mod('knowledge_base_lite_navigation_menu_font_weight','500');
	if($knowledge_base_lite_navigation_menu_font_weight != false){
		$knowledge_base_lite_custom_css .='.main-navigation a{';
			$knowledge_base_lite_custom_css .='font-weight: '.esc_attr($knowledge_base_lite_navigation_menu_font_weight).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_theme_lay = get_theme_mod( 'knowledge_base_lite_menu_text_transform','Capitalize');
	if($knowledge_base_lite_theme_lay == 'Capitalize'){
		$knowledge_base_lite_custom_css .='.main-navigation a{';
			$knowledge_base_lite_custom_css .='text-transform:Capitalize;';
		$knowledge_base_lite_custom_css .='}';
	}
	if($knowledge_base_lite_theme_lay == 'Lowercase'){
		$knowledge_base_lite_custom_css .='.main-navigation a{';
			$knowledge_base_lite_custom_css .='text-transform:Lowercase;';
		$knowledge_base_lite_custom_css .='}';
	}
	if($knowledge_base_lite_theme_lay == 'Uppercase'){
		$knowledge_base_lite_custom_css .='.main-navigation a{';
			$knowledge_base_lite_custom_css .='text-transform:Uppercase;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_header_menus_color = get_theme_mod('knowledge_base_lite_header_menus_color');
	if($knowledge_base_lite_header_menus_color != false){
		$knowledge_base_lite_custom_css .='.main-navigation a{';
			$knowledge_base_lite_custom_css .='color: '.esc_attr($knowledge_base_lite_header_menus_color).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_header_menus_hover_color = get_theme_mod('knowledge_base_lite_header_menus_hover_color');
	if($knowledge_base_lite_header_menus_hover_color != false){
		$knowledge_base_lite_custom_css .='.main-navigation a:hover{';
			$knowledge_base_lite_custom_css .='color: '.esc_attr($knowledge_base_lite_header_menus_hover_color).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_header_submenus_color = get_theme_mod('knowledge_base_lite_header_submenus_color');
	if($knowledge_base_lite_header_submenus_color != false){
		$knowledge_base_lite_custom_css .='.main-navigation ul ul a{';
			$knowledge_base_lite_custom_css .='color: '.esc_attr($knowledge_base_lite_header_submenus_color).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_header_submenus_hover_color = get_theme_mod('knowledge_base_lite_header_submenus_hover_color');
	if($knowledge_base_lite_header_submenus_hover_color != false){
		$knowledge_base_lite_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$knowledge_base_lite_custom_css .='color: '.esc_attr($knowledge_base_lite_header_submenus_hover_color).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_menus_item = get_theme_mod( 'knowledge_base_lite_menus_item_style','None');
    if($knowledge_base_lite_menus_item == 'None'){
		$knowledge_base_lite_custom_css .='.main-navigation a{';
			$knowledge_base_lite_custom_css .='';
		$knowledge_base_lite_custom_css .='}';
	}else if($knowledge_base_lite_menus_item == 'Zoom In'){
		$knowledge_base_lite_custom_css .='.main-navigation a:hover{';
			$knowledge_base_lite_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color: #fff;';
		$knowledge_base_lite_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$knowledge_base_lite_button_border_radius = get_theme_mod('knowledge_base_lite_button_border_radius');
	if($knowledge_base_lite_button_border_radius != false){
		$knowledge_base_lite_custom_css .='.post-main-box .more-btn a{';
			$knowledge_base_lite_custom_css .='border-radius: '.esc_attr($knowledge_base_lite_button_border_radius).'px;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_button_padding_top_bottom = get_theme_mod('knowledge_base_lite_button_padding_top_bottom');
	$knowledge_base_lite_button_padding_left_right = get_theme_mod('knowledge_base_lite_button_padding_left_right');
	if($knowledge_base_lite_button_padding_top_bottom != false || $knowledge_base_lite_button_padding_left_right != false){
		$knowledge_base_lite_custom_css .='.post-main-box .more-btn a{';
			$knowledge_base_lite_custom_css .='padding-top: '.esc_attr($knowledge_base_lite_button_padding_top_bottom).'!important; 
			padding-bottom: '.esc_attr($knowledge_base_lite_button_padding_top_bottom).'!important;
			padding-left: '.esc_attr($knowledge_base_lite_button_padding_left_right).'!important;
			padding-right: '.esc_attr($knowledge_base_lite_button_padding_left_right).'!important;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_button_font_size = get_theme_mod('knowledge_base_lite_button_font_size',14);
	$knowledge_base_lite_custom_css .='.post-main-box .more-btn a{';
		$knowledge_base_lite_custom_css .='font-size: '.esc_attr($knowledge_base_lite_button_font_size).';';
	$knowledge_base_lite_custom_css .='}';

	$knowledge_base_lite_theme_lay = get_theme_mod( 'knowledge_base_lite_button_text_transform','Uppercase');
	if($knowledge_base_lite_theme_lay == 'Capitalize'){
		$knowledge_base_lite_custom_css .='.post-main-box .more-btn a{';
			$knowledge_base_lite_custom_css .='text-transform:Capitalize;';
		$knowledge_base_lite_custom_css .='}';
	}
	if($knowledge_base_lite_theme_lay == 'Lowercase'){
		$knowledge_base_lite_custom_css .='.post-main-box .more-btn a{';
			$knowledge_base_lite_custom_css .='text-transform:Lowercase;';
		$knowledge_base_lite_custom_css .='}';
	}
	if($knowledge_base_lite_theme_lay == 'Uppercase'){ 
		$knowledge_base_lite_custom_css .='.post-main-box .more-btn a{';
			$knowledge_base_lite_custom_css .='text-transform:Uppercase;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_button_letter_spacing = get_theme_mod('knowledge_base_lite_button_letter_spacing',14);
	$knowledge_base_lite_custom_css .='.post-main-box .more-btn a{';
		$knowledge_base_lite_custom_css .='letter-spacing: '.esc_attr($knowledge_base_lite_button_letter_spacing).';';
	$knowledge_base_lite_custom_css .='}';

	/*---------------- Single post ------------------*/

	$knowledge_base_lite_single_blog_comment_title = get_theme_mod('knowledge_base_lite_single_blog_comment_title', 'Leave a Reply');
	if($knowledge_base_lite_single_blog_comment_title == ''){
		$knowledge_base_lite_custom_css .='#comments h2#reply-title {';
			$knowledge_base_lite_custom_css .='display: none;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_single_blog_comment_button_text = get_theme_mod('knowledge_base_lite_single_blog_comment_button_text', 'Post Comment');
	if($knowledge_base_lite_single_blog_comment_button_text == ''){
		$knowledge_base_lite_custom_css .='#comments p.form-submit {';
			$knowledge_base_lite_custom_css .='display: none;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_comment_width = get_theme_mod('knowledge_base_lite_single_blog_comment_width');
	if($knowledge_base_lite_comment_width != false){
		$knowledge_base_lite_custom_css .='#comments textarea{';
			$knowledge_base_lite_custom_css .='width: '.esc_attr($knowledge_base_lite_comment_width).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_singlepost_image_box_shadow = get_theme_mod('knowledge_base_lite_singlepost_image_box_shadow',0);
	if($knowledge_base_lite_singlepost_image_box_shadow != false){
		$knowledge_base_lite_custom_css .='.feature-box img{';
			$knowledge_base_lite_custom_css .='box-shadow: '.esc_attr($knowledge_base_lite_singlepost_image_box_shadow).'px '.esc_attr($knowledge_base_lite_singlepost_image_box_shadow).'px '.esc_attr($knowledge_base_lite_singlepost_image_box_shadow).'px #cccccc;';
		$knowledge_base_lite_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$knowledge_base_lite_copyright_first_color = get_theme_mod('knowledge_base_lite_copyright_first_color');

	$knowledge_base_lite_copyright_second_color = get_theme_mod('knowledge_base_lite_copyright_second_color');

	if($knowledge_base_lite_copyright_first_color != false || $knowledge_base_lite_copyright_second_color != false){
		$knowledge_base_lite_custom_css .='#footer-2{
		background: linear-gradient(to right, '.esc_attr($knowledge_base_lite_copyright_first_color).', '.esc_attr($knowledge_base_lite_copyright_second_color).');
		}';
	}
	
	$knowledge_base_lite_footer_widgets_heading = get_theme_mod( 'knowledge_base_lite_footer_widgets_heading','Left');
    if($knowledge_base_lite_footer_widgets_heading == 'Left'){
		$knowledge_base_lite_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$knowledge_base_lite_custom_css .='text-align: left;';
		$knowledge_base_lite_custom_css .='}';
	}else if($knowledge_base_lite_footer_widgets_heading == 'Center'){
		$knowledge_base_lite_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$knowledge_base_lite_custom_css .='text-align: center;';
		$knowledge_base_lite_custom_css .='}';
	}else if($knowledge_base_lite_footer_widgets_heading == 'Right'){
		$knowledge_base_lite_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$knowledge_base_lite_custom_css .='text-align: right;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_footer_widgets_content = get_theme_mod( 'knowledge_base_lite_footer_widgets_content','Left');
    if($knowledge_base_lite_footer_widgets_content == 'Left'){
		$knowledge_base_lite_custom_css .='#footer .widget{';
		$knowledge_base_lite_custom_css .='text-align: left;';
		$knowledge_base_lite_custom_css .='}';
	}else if($knowledge_base_lite_footer_widgets_content == 'Center'){
		$knowledge_base_lite_custom_css .='#footer .widget{';
			$knowledge_base_lite_custom_css .='text-align: center;';
		$knowledge_base_lite_custom_css .='}';
	}else if($knowledge_base_lite_footer_widgets_content == 'Right'){
		$knowledge_base_lite_custom_css .='#footer .widget{';
			$knowledge_base_lite_custom_css .='text-align: right;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_footer_background_color = get_theme_mod('knowledge_base_lite_footer_background_color');
	if($knowledge_base_lite_footer_background_color != false){
		$knowledge_base_lite_custom_css .='#footer{';
			$knowledge_base_lite_custom_css .='background-color: '.esc_attr($knowledge_base_lite_footer_background_color).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_copyright_font_size = get_theme_mod('knowledge_base_lite_copyright_font_size');
	if($knowledge_base_lite_copyright_font_size != false){
		$knowledge_base_lite_custom_css .='.copyright p{';
			$knowledge_base_lite_custom_css .='font-size: '.esc_attr($knowledge_base_lite_copyright_font_size).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_copyright_alingment = get_theme_mod('knowledge_base_lite_copyright_alingment');
	if($knowledge_base_lite_copyright_alingment != false){
		$knowledge_base_lite_custom_css .='.copyright p,#footer-2 p{';
			$knowledge_base_lite_custom_css .='text-align: '.esc_attr($knowledge_base_lite_copyright_alingment).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_footer_padding = get_theme_mod('knowledge_base_lite_footer_padding');
	if($knowledge_base_lite_footer_padding != false){
		$knowledge_base_lite_custom_css .='#footer{';
			$knowledge_base_lite_custom_css .='padding: '.esc_attr($knowledge_base_lite_footer_padding).' 0;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_footer_icon = get_theme_mod('knowledge_base_lite_footer_icon');
	if($knowledge_base_lite_footer_icon == false){
		$knowledge_base_lite_custom_css .='.copyright p{';
			$knowledge_base_lite_custom_css .='width:100%; text-align:center; float:none;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_footer_background_image = get_theme_mod('knowledge_base_lite_footer_background_image');
	if($knowledge_base_lite_footer_background_image != false){
		$knowledge_base_lite_custom_css .='#footer{';
			$knowledge_base_lite_custom_css .='background: url('.esc_attr($knowledge_base_lite_footer_background_image).');background-size:cover;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_theme_lay = get_theme_mod( 'knowledge_base_lite_img_footer','scroll');
	if($knowledge_base_lite_theme_lay == 'fixed'){
		$knowledge_base_lite_custom_css .='#footer{';
			$knowledge_base_lite_custom_css .='background-attachment: fixed !important;';
		$knowledge_base_lite_custom_css .='}';
	}elseif ($knowledge_base_lite_theme_lay == 'scroll'){
		$knowledge_base_lite_custom_css .='#footer{';
			$knowledge_base_lite_custom_css .='background-attachment: scroll !important;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_footer_img_position = get_theme_mod('knowledge_base_lite_footer_img_position','center center');
	if($knowledge_base_lite_footer_img_position != false){
		$knowledge_base_lite_custom_css .='#footer{';
			$knowledge_base_lite_custom_css .='background-position: '.esc_attr($knowledge_base_lite_footer_img_position).'!important;';
		$knowledge_base_lite_custom_css .='}';
	} 

	/*------------- Woocommerce Products Settings -------------*/

	$knowledge_base_lite_related_product_show_hide = get_theme_mod('knowledge_base_lite_related_product_show_hide',true);
	if($knowledge_base_lite_related_product_show_hide != true){
		$knowledge_base_lite_custom_css .='.related.products{';
			$knowledge_base_lite_custom_css .='display: none;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_products_btn_padding_top_bottom = get_theme_mod('knowledge_base_lite_products_btn_padding_top_bottom');
	if($knowledge_base_lite_products_btn_padding_top_bottom != false){
		$knowledge_base_lite_custom_css .='.woocommerce a.button{';
			$knowledge_base_lite_custom_css .='padding-top: '.esc_attr($knowledge_base_lite_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($knowledge_base_lite_products_btn_padding_top_bottom).' !important;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_products_btn_padding_left_right = get_theme_mod('knowledge_base_lite_products_btn_padding_left_right');
	if($knowledge_base_lite_products_btn_padding_left_right != false){
		$knowledge_base_lite_custom_css .='.woocommerce a.button{';
			$knowledge_base_lite_custom_css .='padding-left: '.esc_attr($knowledge_base_lite_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($knowledge_base_lite_products_btn_padding_left_right).' !important;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_woocommerce_sale_position = get_theme_mod( 'knowledge_base_lite_woocommerce_sale_position','left');
    if($knowledge_base_lite_woocommerce_sale_position == 'left'){
		$knowledge_base_lite_custom_css .='.woocommerce ul.products li.product .onsale{';
			$knowledge_base_lite_custom_css .='left: -10px; right: auto;';
		$knowledge_base_lite_custom_css .='}';
	}else if($knowledge_base_lite_woocommerce_sale_position == 'right'){
		$knowledge_base_lite_custom_css .='.woocommerce ul.products li.product .onsale{';
			$knowledge_base_lite_custom_css .='left: auto !important; right: 5px !important;';
		$knowledge_base_lite_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$knowledge_base_lite_logo_padding = get_theme_mod('knowledge_base_lite_logo_padding');
	if($knowledge_base_lite_logo_padding != false){
		$knowledge_base_lite_custom_css .='.logo{';
			$knowledge_base_lite_custom_css .='padding: '.esc_attr($knowledge_base_lite_logo_padding).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_logo_margin = get_theme_mod('knowledge_base_lite_logo_margin');
	if($knowledge_base_lite_logo_margin != false){
		$knowledge_base_lite_custom_css .='.logo{';
			$knowledge_base_lite_custom_css .='margin: '.esc_attr($knowledge_base_lite_logo_margin).';';
		$knowledge_base_lite_custom_css .='}';
	}

	// Site title Font Size
	$knowledge_base_lite_site_title_font_size = get_theme_mod('knowledge_base_lite_site_title_font_size');
	if($knowledge_base_lite_site_title_font_size != false){
		$knowledge_base_lite_custom_css .='p.site-title, .logo h1{';
			$knowledge_base_lite_custom_css .='font-size: '.esc_attr($knowledge_base_lite_site_title_font_size).';';
		$knowledge_base_lite_custom_css .='}';
	}

	// Site tagline Font Size
	$knowledge_base_lite_site_tagline_font_size = get_theme_mod('knowledge_base_lite_site_tagline_font_size');
	if($knowledge_base_lite_site_tagline_font_size != false){
		$knowledge_base_lite_custom_css .='.logo p.site-description{';
			$knowledge_base_lite_custom_css .='font-size: '.esc_attr($knowledge_base_lite_site_tagline_font_size).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_site_title_color = get_theme_mod('knowledge_base_lite_site_title_color');
	if($knowledge_base_lite_site_title_color != false){
		$knowledge_base_lite_custom_css .='p.site-title a{';
			$knowledge_base_lite_custom_css .='color: '.esc_attr($knowledge_base_lite_site_title_color).'!important;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_site_tagline_color = get_theme_mod('knowledge_base_lite_site_tagline_color');
	if($knowledge_base_lite_site_tagline_color != false){
		$knowledge_base_lite_custom_css .='.logo p.site-description{';
			$knowledge_base_lite_custom_css .='color: '.esc_attr($knowledge_base_lite_site_tagline_color).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_logo_width = get_theme_mod('knowledge_base_lite_logo_width');
	if($knowledge_base_lite_logo_width != false){
		$knowledge_base_lite_custom_css .='.logo img{';
			$knowledge_base_lite_custom_css .='width: '.esc_attr($knowledge_base_lite_logo_width).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_logo_height = get_theme_mod('knowledge_base_lite_logo_height');
	if($knowledge_base_lite_logo_height != false){
		$knowledge_base_lite_custom_css .='.logo img{';
			$knowledge_base_lite_custom_css .='height: '.esc_attr($knowledge_base_lite_logo_height).';';
		$knowledge_base_lite_custom_css .='}';
	}

	// Woocommerce img

	$knowledge_base_lite_shop_featured_image_border_radius = get_theme_mod('knowledge_base_lite_shop_featured_image_border_radius', 0);
	if($knowledge_base_lite_shop_featured_image_border_radius != false){
		$knowledge_base_lite_custom_css .='.woocommerce ul.products li.product a img{';
			$knowledge_base_lite_custom_css .='border-radius: '.esc_attr($knowledge_base_lite_shop_featured_image_border_radius).'px;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_shop_featured_image_box_shadow = get_theme_mod('knowledge_base_lite_shop_featured_image_box_shadow');
	if($knowledge_base_lite_shop_featured_image_box_shadow != false){
		$knowledge_base_lite_custom_css .='.woocommerce ul.products li.product a img{';
				$knowledge_base_lite_custom_css .='box-shadow: '.esc_attr($knowledge_base_lite_shop_featured_image_box_shadow).'px '.esc_attr($knowledge_base_lite_shop_featured_image_box_shadow).'px '.esc_attr($knowledge_base_lite_shop_featured_image_box_shadow).'px #ddd;';
		$knowledge_base_lite_custom_css .='}';
	}

	/*---------------- Blog Page Settings ------------------*/

	$knowledge_base_lite_featured_image_border_radius = get_theme_mod('knowledge_base_lite_featured_image_border_radius', 0);
	if($knowledge_base_lite_featured_image_border_radius != false){
		$knowledge_base_lite_custom_css .='.box-image img, .feature-box img{';
			$knowledge_base_lite_custom_css .='border-radius: '.esc_attr($knowledge_base_lite_featured_image_border_radius).'px;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_featured_image_box_shadow = get_theme_mod('knowledge_base_lite_featured_image_box_shadow',0);
	if($knowledge_base_lite_featured_image_box_shadow != false){
		$knowledge_base_lite_custom_css .='.box-image img, #content-vw img{';
			$knowledge_base_lite_custom_css .='box-shadow: '.esc_attr($knowledge_base_lite_featured_image_box_shadow).'px '.esc_attr($knowledge_base_lite_featured_image_box_shadow).'px '.esc_attr($knowledge_base_lite_featured_image_box_shadow).'px #cccccc;';
		$knowledge_base_lite_custom_css .='}';
	}

	// featured image dimention
	$knowledge_base_lite_blog_post_featured_image_dimension = get_theme_mod('knowledge_base_lite_blog_post_featured_image_dimension', 'default');
	$knowledge_base_lite_blog_post_featured_image_custom_width = get_theme_mod('knowledge_base_lite_blog_post_featured_image_custom_width',250);
	$knowledge_base_lite_blog_post_featured_image_custom_height = get_theme_mod('knowledge_base_lite_blog_post_featured_image_custom_height',250);
	if($knowledge_base_lite_blog_post_featured_image_dimension == 'custom'){
		$knowledge_base_lite_custom_css .='.box-image img{';
			$knowledge_base_lite_custom_css .='width: '.esc_attr($knowledge_base_lite_blog_post_featured_image_custom_width).'; height: '.esc_attr($knowledge_base_lite_blog_post_featured_image_custom_height).';';
		$knowledge_base_lite_custom_css .='}';
	}

	/*-------------- Preloader Background Color  -------------------*/

	$knowledge_base_lite_preloader_bg_color = get_theme_mod('knowledge_base_lite_preloader_bg_color');
	if($knowledge_base_lite_preloader_bg_color != false){
		$knowledge_base_lite_custom_css .='#preloader{';
			$knowledge_base_lite_custom_css .='background-color: '.esc_attr($knowledge_base_lite_preloader_bg_color).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_preloader_border_color = get_theme_mod('knowledge_base_lite_preloader_border_color');
	if($knowledge_base_lite_preloader_border_color != false){
		$knowledge_base_lite_custom_css .='.loader-line{';
			$knowledge_base_lite_custom_css .='border-color: '.esc_attr($knowledge_base_lite_preloader_border_color).'!important;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_preloader_bg_img = get_theme_mod('knowledge_base_lite_preloader_bg_img');
	if($knowledge_base_lite_preloader_bg_img != false){
		$knowledge_base_lite_custom_css .='#preloader{';
			$knowledge_base_lite_custom_css .='background: url('.esc_attr($knowledge_base_lite_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$knowledge_base_lite_custom_css .='}';
	}

	// Header Background Color
	$knowledge_base_lite_header_first_color = get_theme_mod('knowledge_base_lite_header_first_color');

	$knowledge_base_lite_header_second_color = get_theme_mod('knowledge_base_lite_header_second_color');

	if($knowledge_base_lite_header_first_color != false || $knowledge_base_lite_header_second_color != false){
		$knowledge_base_lite_custom_css .='.middle-bar{
		background: linear-gradient(to right, '.esc_attr($knowledge_base_lite_header_first_color).', '.esc_attr($knowledge_base_lite_header_second_color).');
		}';
	}

	$knowledge_base_lite_header_img_position = get_theme_mod('knowledge_base_lite_header_img_position','center top');
	if($knowledge_base_lite_header_img_position != false){
		$knowledge_base_lite_custom_css .='.middle-bar{';
			$knowledge_base_lite_custom_css .='background-position: '.esc_attr($knowledge_base_lite_header_img_position).'!important;';
		$knowledge_base_lite_custom_css .='}';
	}
	/*----------------Sroll to top Settings ------------------*/

	$knowledge_base_lite_scroll_to_top_font_size = get_theme_mod('knowledge_base_lite_scroll_to_top_font_size');
	if($knowledge_base_lite_scroll_to_top_font_size != false){
		$knowledge_base_lite_custom_css .='.scrollup i{';
			$knowledge_base_lite_custom_css .='font-size: '.esc_attr($knowledge_base_lite_scroll_to_top_font_size).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_scroll_to_top_padding = get_theme_mod('knowledge_base_lite_scroll_to_top_padding');
	$knowledge_base_lite_scroll_to_top_padding = get_theme_mod('knowledge_base_lite_scroll_to_top_padding');
	if($knowledge_base_lite_scroll_to_top_padding != false){
		$knowledge_base_lite_custom_css .='.scrollup i{';
			$knowledge_base_lite_custom_css .='padding-top: '.esc_attr($knowledge_base_lite_scroll_to_top_padding).'!important;padding-bottom: '.esc_attr($knowledge_base_lite_scroll_to_top_padding).'!important;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_scroll_to_top_width = get_theme_mod('knowledge_base_lite_scroll_to_top_width');
	if($knowledge_base_lite_scroll_to_top_width != false){
		$knowledge_base_lite_custom_css .='.scrollup i{';
			$knowledge_base_lite_custom_css .='width: '.esc_attr($knowledge_base_lite_scroll_to_top_width).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_scroll_to_top_height = get_theme_mod('knowledge_base_lite_scroll_to_top_height');
	if($knowledge_base_lite_scroll_to_top_height != false){
		$knowledge_base_lite_custom_css .='.scrollup i{';
			$knowledge_base_lite_custom_css .='height: '.esc_attr($knowledge_base_lite_scroll_to_top_height).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_scroll_to_top_border_radius = get_theme_mod('knowledge_base_lite_scroll_to_top_border_radius');
	if($knowledge_base_lite_scroll_to_top_border_radius != false){
		$knowledge_base_lite_custom_css .='.scrollup i{';
			$knowledge_base_lite_custom_css .='border-radius: '.esc_attr($knowledge_base_lite_scroll_to_top_border_radius).'px;';
		$knowledge_base_lite_custom_css .='}';
	}


	/*----------------Social Icons Settings ------------------*/

	$knowledge_base_lite_social_icon_font_size = get_theme_mod('knowledge_base_lite_social_icon_font_size');
	if($knowledge_base_lite_social_icon_font_size != false){
		$knowledge_base_lite_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$knowledge_base_lite_custom_css .='font-size: '.esc_attr($knowledge_base_lite_social_icon_font_size).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_social_icon_padding = get_theme_mod('knowledge_base_lite_social_icon_padding');
	if($knowledge_base_lite_social_icon_padding != false){
		$knowledge_base_lite_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$knowledge_base_lite_custom_css .='padding: '.esc_attr($knowledge_base_lite_social_icon_padding).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_social_icon_width = get_theme_mod('knowledge_base_lite_social_icon_width');
	if($knowledge_base_lite_social_icon_width != false){
		$knowledge_base_lite_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$knowledge_base_lite_custom_css .='width: '.esc_attr($knowledge_base_lite_social_icon_width).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_social_icon_height = get_theme_mod('knowledge_base_lite_social_icon_height');
	if($knowledge_base_lite_social_icon_height != false){
		$knowledge_base_lite_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$knowledge_base_lite_custom_css .='height: '.esc_attr($knowledge_base_lite_social_icon_height).';';
		$knowledge_base_lite_custom_css .='}';
	}

	/*--------------------- Grid Posts Posts -------------------*/

	$knowledge_base_lite_display_grid_posts_settings = get_theme_mod( 'knowledge_base_lite_display_grid_posts_settings','Into Blocks');
    if($knowledge_base_lite_display_grid_posts_settings == 'Without Blocks'){
		$knowledge_base_lite_custom_css .='.grid-post-main-box{';
			$knowledge_base_lite_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_grid_featured_image_box_shadow = get_theme_mod('knowledge_base_lite_grid_featured_image_box_shadow',0);
	if($knowledge_base_lite_grid_featured_image_box_shadow != false){
		$knowledge_base_lite_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img, #content-vw img{';
			$knowledge_base_lite_custom_css .='box-shadow: '.esc_attr($knowledge_base_lite_grid_featured_image_box_shadow).'px '.esc_attr($knowledge_base_lite_grid_featured_image_box_shadow).'px '.esc_attr($knowledge_base_lite_grid_featured_image_box_shadow).'px #cccccc;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_grid_featured_image_border_radius = get_theme_mod('knowledge_base_lite_grid_featured_image_border_radius', 0);
	if($knowledge_base_lite_grid_featured_image_border_radius != false){
		$knowledge_base_lite_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img, #content-vw img{';
			$knowledge_base_lite_custom_css .='border-radius: '.esc_attr($knowledge_base_lite_grid_featured_image_border_radius).'px;';
		$knowledge_base_lite_custom_css .='}';
	}

/*---------------------------Footer Style -------------------*/

	$knowledge_base_lite_theme_lay = get_theme_mod( 'knowledge_base_lite_footer_template','knowledge_base_lite-footer-one');
    if($knowledge_base_lite_theme_lay == 'knowledge_base_lite-footer-one'){
		$knowledge_base_lite_custom_css .='#footer{';
			$knowledge_base_lite_custom_css .='';
		$knowledge_base_lite_custom_css .='}';

	}else if($knowledge_base_lite_theme_lay == 'knowledge_base_lite-footer-two'){
		$knowledge_base_lite_custom_css .='#footer{';
			$knowledge_base_lite_custom_css .='background: linear-gradient(to right, #f9f8ff, #dedafa);';
		$knowledge_base_lite_custom_css .='}';
		$knowledge_base_lite_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$knowledge_base_lite_custom_css .='color:#000;';
		$knowledge_base_lite_custom_css .='}';
		$knowledge_base_lite_custom_css .='#footer ul li::before{';
			$knowledge_base_lite_custom_css .='background:#000;';
		$knowledge_base_lite_custom_css .='}';
		$knowledge_base_lite_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$knowledge_base_lite_custom_css .='border: 1px solid #000;';
		$knowledge_base_lite_custom_css .='}';

	}else if($knowledge_base_lite_theme_lay == 'knowledge_base_lite-footer-three'){
		$knowledge_base_lite_custom_css .='#footer{';
			$knowledge_base_lite_custom_css .='background: #232524;';
		$knowledge_base_lite_custom_css .='}';
	}
	else if($knowledge_base_lite_theme_lay == 'knowledge_base_lite-footer-four'){
		$knowledge_base_lite_custom_css .='#footer{';
			$knowledge_base_lite_custom_css .='background: #f7f7f7;';
		$knowledge_base_lite_custom_css .='}';
		$knowledge_base_lite_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$knowledge_base_lite_custom_css .='color:#000;';
		$knowledge_base_lite_custom_css .='}';
		$knowledge_base_lite_custom_css .='#footer ul li::before{';
			$knowledge_base_lite_custom_css .='background:#000;';
		$knowledge_base_lite_custom_css .='}';
		$knowledge_base_lite_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$knowledge_base_lite_custom_css .='border: 1px solid #000;';
		$knowledge_base_lite_custom_css .='}';
	}
	else if($knowledge_base_lite_theme_lay == 'knowledge_base_lite-footer-five'){
		$knowledge_base_lite_custom_css .='#footer{';
			$knowledge_base_lite_custom_css .='background: linear-gradient(to right, #01093a, #2d0b00);';
		$knowledge_base_lite_custom_css .='}';
	}

 	/*---------------- Footer Settings ------------------*/

	$knowledge_base_lite_button_footer_heading_letter_spacing = get_theme_mod('knowledge_base_lite_button_footer_heading_letter_spacing',1);
	$knowledge_base_lite_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
		$knowledge_base_lite_custom_css .='letter-spacing: '.esc_attr($knowledge_base_lite_button_footer_heading_letter_spacing).'px;';
	$knowledge_base_lite_custom_css .='}';

	$knowledge_base_lite_button_footer_font_size = get_theme_mod('knowledge_base_lite_button_footer_font_size','30');
	$knowledge_base_lite_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
		$knowledge_base_lite_custom_css .='font-size: '.esc_attr($knowledge_base_lite_button_footer_font_size).'px;';
	$knowledge_base_lite_custom_css .='}';

	$knowledge_base_lite_theme_lay = get_theme_mod( 'knowledge_base_lite_button_footer_text_transform','Capitalize');
	if($knowledge_base_lite_theme_lay == 'Capitalize'){
		$knowledge_base_lite_custom_css .='#footer h3{';
			$knowledge_base_lite_custom_css .='text-transform:Capitalize;';
		$knowledge_base_lite_custom_css .='}';
	}
	if($knowledge_base_lite_theme_lay == 'Lowercase'){
		$knowledge_base_lite_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
			$knowledge_base_lite_custom_css .='text-transform:Lowercase;';
		$knowledge_base_lite_custom_css .='}';
	}
	if($knowledge_base_lite_theme_lay == 'Uppercase'){
		$knowledge_base_lite_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
			$knowledge_base_lite_custom_css .='text-transform:Uppercase;';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_footer_heading_weight = get_theme_mod('knowledge_base_lite_footer_heading_weight','600');
	if($knowledge_base_lite_footer_heading_weight != false){
		$knowledge_base_lite_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
			$knowledge_base_lite_custom_css .='font-weight: '.esc_attr($knowledge_base_lite_footer_heading_weight).';';
		$knowledge_base_lite_custom_css .='}';
	}

	$knowledge_base_lite_responsive_preloader_hide = get_theme_mod('knowledge_base_lite_responsive_preloader_hide',false);
	if($knowledge_base_lite_responsive_preloader_hide == true && get_theme_mod('knowledge_base_lite_loader_enable',false) == false){
		$knowledge_base_lite_custom_css .='@media screen and (min-width:575px){
			#preloader{';
			$knowledge_base_lite_custom_css .='display:none !important;';
		$knowledge_base_lite_custom_css .='} }';
	}

	if($knowledge_base_lite_responsive_preloader_hide == false){
		$knowledge_base_lite_custom_css .='@media screen and (max-width:575px){
			#preloader{';
			$knowledge_base_lite_custom_css .='display:none !important;';
		$knowledge_base_lite_custom_css .='} }';
	}

	$knowledge_base_lite_bradcrumbs_alignment = get_theme_mod( 'knowledge_base_lite_bradcrumbs_alignment','Left');
    if($knowledge_base_lite_bradcrumbs_alignment == 'Left'){
    	$knowledge_base_lite_custom_css .='@media screen and (min-width:768px) {';
		$knowledge_base_lite_custom_css .='.bradcrumbs{';
			$knowledge_base_lite_custom_css .='text-align:start;';
		$knowledge_base_lite_custom_css .='}}';
	}else if($knowledge_base_lite_bradcrumbs_alignment == 'Center'){
		$knowledge_base_lite_custom_css .='@media screen and (min-width:768px) {';
		$knowledge_base_lite_custom_css .='.bradcrumbs{';
			$knowledge_base_lite_custom_css .='text-align:center;';
		$knowledge_base_lite_custom_css .='}}';
	}else if($knowledge_base_lite_bradcrumbs_alignment == 'Right'){
		$knowledge_base_lite_custom_css .='@media screen and (min-width:768px) {';
		$knowledge_base_lite_custom_css .='.bradcrumbs{';
			$knowledge_base_lite_custom_css .='text-align:end;';
		$knowledge_base_lite_custom_css .='}}';
	}