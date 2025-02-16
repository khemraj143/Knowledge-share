<?php
//about theme info
add_action( 'admin_menu', 'knowledge_base_lite_gettingstarted' );
function knowledge_base_lite_gettingstarted() {
	add_theme_page( esc_html__('About Knowledge Base Lite', 'knowledge-base-lite'), esc_html__('About Knowledge Base Lite', 'knowledge-base-lite'), 'edit_theme_options', 'knowledge_base_lite_guide', 'knowledge_base_lite_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function knowledge_base_lite_admin_theme_style() {
	wp_enqueue_style('knowledge-base-lite-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('knowledge-base-lite-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'knowledge_base_lite_admin_theme_style');

//guidline for about theme
function knowledge_base_lite_mostrar_guide() { 
	//custom function about theme customizer
	$knowledge_base_lite_return = add_query_arg( array()) ;
	$knowledge_base_lite_theme = wp_get_theme( 'knowledge-base-lite' );
?>

<div class="wrapper-info">
    <div class="col-left sshot-section">
    	<h2><?php esc_html_e( 'Welcome to Knowledge Base Lite', 'knowledge-base-lite' ); ?> <span class="version"><?php esc_html_e( 'Version', 'knowledge-base-lite' ); ?>: <?php echo esc_html($knowledge_base_lite_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','knowledge-base-lite'); ?></p>
    </div>
    <div class="col-right coupen-section">
    	<div class="logo-section">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
		</div>
		<div class="logo-right">			
			<div class="update-now">
				<h4><?php esc_html_e('Try Premium ','knowledge-base-lite'); ?></h4>
				<h4><?php esc_html_e('Knowledge Base Lite Theme','knowledge-base-lite'); ?></h4>
				<h4 class="disc-text"><?php esc_html_e('at 20% Discount','knowledge-base-lite'); ?></h4>
				<h4><?php esc_html_e('Use Coupon','knowledge-base-lite'); ?> ( <span><?php esc_html_e('vwpro20','knowledge-base-lite'); ?></span> ) </h4> 
				<div class="info-link">
					<a href="<?php echo esc_url( KNOWLEDGE_BASE_LITE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'knowledge-base-lite' ); ?></a>
				</div>
			</div>
		</div>   
		<div class="logo-img">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
    </div>

    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="knowledge_base_lite_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'knowledge-base-lite' ); ?></button>
			
			<button class="tablinks" onclick="knowledge_base_lite_open_tab(event, 'pro_theme')"><?php esc_html_e( 'Get Premium', 'knowledge-base-lite' ); ?></button>
			<button class="tablinks" onclick="knowledge_base_lite_open_tab(event, 'lite_pro')"><?php esc_html_e( 'Free VS Premium', 'knowledge-base-lite' ); ?></button>
			<button class="tablinks" onclick="knowledge_base_lite_open_tab(event, 'get_bundle')"><?php esc_html_e( 'Get 250+ Themes Bundle at $99', 'knowledge-base-lite' ); ?></button>
		</div>

		<?php 
			$knowledge_base_lite_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$knowledge_base_lite_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Knowledge_Base_Lite_Plugin_Activation_Settings::get_instance();
				$knowledge_base_lite_actions = $plugin_ins->recommended_actions;
				?>
				<div class="knowledge-base-lite-recommended-plugins">
				    <div class="knowledge-base-lite-action-list">
				        <?php if ($knowledge_base_lite_actions): foreach ($knowledge_base_lite_actions as $key => $knowledge_base_lite_actionValue): ?>
				                <div class="knowledge-base-lite-action" id="<?php echo esc_attr($knowledge_base_lite_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($knowledge_base_lite_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($knowledge_base_lite_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($knowledge_base_lite_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','knowledge-base-lite'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($knowledge_base_lite_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'knowledge-base-lite' ); ?></h3>
				<hr class="h3hr">	
				<p><?php esc_html_e('Knowledge Base Lite is a WP theme providing a complete all-in-one support platform solution. It combines nice features for establishing a Knowledge Base Lite, forums, help desk, support, wiki-how, library, knowledge based website, FAQs, and customer support centers. The theme can be used by many niches and websites for High Schools, Colleges, Universities, Online classes, LMS Website, Education Website, Kindergarten, Primary Education , Tutor LMS, Online Course Selling and etc. This specialized WP theme is built using the Bootstrap framework and comes with great documentation. You can create a stunning Knowledge Base Lite that is a resource of helpful articles, information, and FAQs for your customers regarding the availed services or products. You get a sophisticated and retina-ready website that looks beautiful and adapts to any screen because of its responsive nature. The SEO-friendly codes which are also optimized for performance give faster page load time resulting in pages loading at a quick speed. The Call to Action Button (CTA) makes the entire page interactive making it easy for the customers to look for the relevant info in the Knowledge Base Lite. This theme is translation ready which is a huge advantage for customers who are non-English speakers. It has a professionally designed banner and a lot of customization options for tweaking. The secure and clean codes incorporated in this theme make it work flawlessly on any browser and deliver a clutter-free performance. You will find a number of social media options, different sections such as Team, About Us, Testimonials, etc.','knowledge-base-lite'); ?></p>		  	
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'knowledge-base-lite' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'knowledge-base-lite' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( KNOWLEDGE_BASE_LITE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'knowledge-base-lite' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'knowledge-base-lite'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'knowledge-base-lite'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'knowledge-base-lite'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'knowledge-base-lite'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'knowledge-base-lite'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( KNOWLEDGE_BASE_LITE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'knowledge-base-lite'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'knowledge-base-lite'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'knowledge-base-lite'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( KNOWLEDGE_BASE_LITE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'knowledge-base-lite'); ?></a>
					</div>
					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'knowledge-base-lite' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','knowledge-base-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=knowledge_base_lite_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','knowledge-base-lite'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=knowledge_base_lite_top_header') ); ?>" target="_blank"><?php esc_html_e('Top Header Section','knowledge-base-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=knowledge_base_lite_services') ); ?>" target="_blank"><?php esc_html_e('Services Section','knowledge-base-lite'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','knowledge-base-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','knowledge-base-lite'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=knowledge_base_lite_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','knowledge-base-lite'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=knowledge_base_lite_responsive_media') ); ?>" target="_blank"><?php esc_html_e('Responsive Media','knowledge-base-lite'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=knowledge_base_lite_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','knowledge-base-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=knowledge_base_lite_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','knowledge-base-lite'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','knowledge-base-lite'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','knowledge-base-lite'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','knowledge-base-lite'); ?></span><?php esc_html_e(' Go to ','knowledge-base-lite'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','knowledge-base-lite'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','knowledge-base-lite'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','knowledge-base-lite'); ?></span><?php esc_html_e(' Go to ','knowledge-base-lite'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','knowledge-base-lite'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','knowledge-base-lite'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','knowledge-base-lite'); ?> <a class="doc-links" href="<?php echo esc_url( KNOWLEDGE_BASE_LITE_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','knowledge-base-lite'); ?></a></p>
			  	</div>
			</div>
		</div>	

		<div id="block_pattern" class="tabcontent">
			<?php  if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Knowledge_Base_Lite_Plugin_Activation_Settings::get_instance();
			$knowledge_base_lite_actions = $plugin_ins->recommended_actions;
			?>
				<div class="knowledge-base-lite-recommended-plugins">
				    <div class="knowledge-base-lite-action-list">
				        <?php if ($knowledge_base_lite_actions): foreach ($knowledge_base_lite_actions as $key => $knowledge_base_lite_actionValue): ?>
				                <div class="knowledge-base-lite-action" id="<?php echo esc_attr($knowledge_base_lite_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($knowledge_base_lite_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($knowledge_base_lite_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($knowledge_base_lite_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','knowledge-base-lite'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($knowledge_base_lite_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'knowledge-base-lite' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','knowledge-base-lite'); ?></p>
	              		<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon ','knowledge-base-lite'); ?></b></p>
	              	<div class="knowledge-base-lite-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','knowledge-base-lite'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern1.png" alt="" />
	              	<p><b><?php esc_html_e('Click on Patterns Tab >> Click on Theme Name >> Click on Section >> Publish.','knowledge-base-lite'); ?></b></p>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />	
	            </div>

              	<div class="block-pattern-link-customizer">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'knowledge-base-lite' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','knowledge-base-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=knowledge_base_lite_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','knowledge-base-lite'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','knowledge-base-lite'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=knowledge_base_lite_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','knowledge-base-lite'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=knowledge_base_lite_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','knowledge-base-lite'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','knowledge-base-lite'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>

	        </div>
		</div>


		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Knowledge_Base_Lite_Plugin_Activation_Settings::get_instance();
			$knowledge_base_lite_actions = $plugin_ins->recommended_actions;
			?>
				<div class="knowledge-base-lite-recommended-plugins">
				    <div class="knowledge-base-lite-action-list">
				        <?php if ($knowledge_base_lite_actions): foreach ($knowledge_base_lite_actions as $key => $knowledge_base_lite_actionValue): ?>
				                <div class="knowledge-base-lite-action" id="<?php echo esc_attr($knowledge_base_lite_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($knowledge_base_lite_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($knowledge_base_lite_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($knowledge_base_lite_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'knowledge-base-lite' ); ?></h3>
				<hr class="h3hr">
				<div class="knowledge-base-lite-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','knowledge-base-lite'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'knowledge-base-lite' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','knowledge-base-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=knowledge_base_lite_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','knowledge-base-lite'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','knowledge-base-lite'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=knowledge_base_lite_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','knowledge-base-lite'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=knowledge_base_lite_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','knowledge-base-lite'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','knowledge-base-lite'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = Knowledge_Base_Lite_Plugin_Activation_Woo_Products::get_instance();
				$knowledge_base_lite_actions = $plugin_ins->recommended_actions;
				?>
				<div class="knowledge-base-lite-recommended-plugins">
					    <div class="knowledge-base-lite-action-list">
					        <?php if ($knowledge_base_lite_actions): foreach ($knowledge_base_lite_actions as $key => $knowledge_base_lite_actionValue): ?>
					                <div class="knowledge-base-lite-action" id="<?php echo esc_attr($knowledge_base_lite_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($knowledge_base_lite_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($knowledge_base_lite_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($knowledge_base_lite_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'knowledge-base-lite' ); ?></h3>
				<hr class="h3hr">
				<div class="knowledge-base-lite-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','knowledge-base-lite'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','knowledge-base-lite'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','knowledge-base-lite'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','knowledge-base-lite'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','knowledge-base-lite'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','knowledge-base-lite'); ?></span></b></p>
	              	<div class="knowledge-base-lite-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','knowledge-base-lite'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','knowledge-base-lite'); ?></span></p>
			    </div>
			<?php } ?>
		</div> 

		<div id="pro_theme" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'knowledge-base-lite' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('This Knowledge Base WordPress Theme is one of the most preferred choices for establishing a website that acts as a self-serve online collection of information and FAQ about your product and services. To ensure that your knowledge base website matches perfectly with your product brand, there is a theme customizer that provides you many easy and code-free customization options. Its professional design and sober colors give your knowledgebase website a perfect feel and look. Just in case if you don’t like the color, simply change it as you have plenty of choices to make from the color palette. Apart from all this, you do get a user-friendly drag and drop page builder or editor for page building and putting your content at the right place. For the visitors and website users who want to find the relevant information, this WP Knowledge Base WordPress Theme makes use of a live search tool.','knowledge-base-lite'); ?></p>
		    </div>
		    <div class="col-right-pro">
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( KNOWLEDGE_BASE_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'knowledge-base-lite'); ?></a>
					<a href="<?php echo esc_url( KNOWLEDGE_BASE_LITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'knowledge-base-lite'); ?></a>
					<a href="<?php echo esc_url( KNOWLEDGE_BASE_LITE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'knowledge-base-lite'); ?></a>
					<a href="<?php echo esc_url( KNOWLEDGE_BASE_LITE_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get 250+ Themes Bundle at $99', 'knowledge-base-lite'); ?></a>
				</div>
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		</div>

		<div id="lite_pro" class="tabcontent">
		  	<div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'knowledge-base-lite' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'knowledge-base-lite'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'knowledge-base-lite'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'knowledge-base-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'knowledge-base-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'knowledge-base-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('21', 'knowledge-base-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'knowledge-base-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'knowledge-base-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'knowledge-base-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'knowledge-base-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'knowledge-base-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'knowledge-base-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'knowledge-base-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( KNOWLEDGE_BASE_LITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'knowledge-base-lite'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="get_bundle" class="tabcontent">		  	
		   <div class="col-left-pro">
		   	<h3><?php esc_html_e( 'WP Theme Bundle', 'knowledge-base-lite' ); ?></h3>
		    	<p><?php esc_html_e('Enhance your website effortlessly with our WP Theme Bundle. Get access to 250+ premium WordPress themes and 5+ powerful plugins, all designed to meet diverse business needs. Enjoy seamless integration with any plugins, ultimate customization flexibility, and regular updates to keep your site current and secure. Plus, benefit from our dedicated customer support, ensuring a smooth and professional web experience.','knowledge-base-lite'); ?></p>
		    	<div class="feature">
		    		<h4><?php esc_html_e( 'Features:', 'knowledge-base-lite' ); ?></h4>
		    		<p><?php esc_html_e('250+ Premium Themes & 5+ Plugins.', 'knowledge-base-lite'); ?></p>
		    		<p><?php esc_html_e('Seamless Integration.', 'knowledge-base-lite'); ?></p>
		    		<p><?php esc_html_e('Customization Flexibility.', 'knowledge-base-lite'); ?></p>
		    		<p><?php esc_html_e('Regular Updates.', 'knowledge-base-lite'); ?></p>
		    		<p><?php esc_html_e('Dedicated Support.', 'knowledge-base-lite'); ?></p>
		    	</div>
		    	<p><?php esc_html_e('Upgrade now and give your website the professional edge it deserves, all at an unbeatable price of $99!', 'knowledge-base-lite'); ?></p>
		    	<div class="pro-links">
					<a href="<?php echo esc_url( KNOWLEDGE_BASE_LITE_THEME_BUNDLE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'knowledge-base-lite'); ?></a>
					<a href="<?php echo esc_url( KNOWLEDGE_BASE_LITE_THEME_BUNDLE_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'knowledge-base-lite'); ?></a>
				</div>
		   </div>
		   <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/bundle.png" alt="" />
		   </div>		    
		</div>
		
	</div>
</div>

<?php } ?>