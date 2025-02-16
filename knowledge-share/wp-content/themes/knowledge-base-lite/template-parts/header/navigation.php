<?php
/**
 * The template part for header
 *
 * @package Knowledge Base Lite 
 * @subpackage knowledge-base-lite
 * @since knowledge-base-lite 1.0
 */
?>

<div id="header">
  <?php ?>
    <div class="toggle-nav mobile-menu text-center">
      <button role="tab" onclick="knowledge_base_lite_menu_open_nav()" class="responsivetoggle"><i class="py-3 px-4 <?php echo esc_attr(get_theme_mod('knowledge_base_lite_res_open_menu_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','knowledge-base-lite'); ?></span></button>
    </div>
  <?php ?>
  <div id="mySidenav" class="nav sidenav">
    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'knowledge-base-lite' ); ?>">
      <?php
        wp_nav_menu( array( 
          'theme_location' => 'primary',
          'container_class' => 'main-menu my-2 clearfix' ,
          'menu_class' => 'clearfix',
          'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
          'fallback_cb' => 'wp_page_menu',
        ) );
       ?>
      <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="knowledge_base_lite_menu_close_nav()"><i class="<?php echo esc_attr(get_theme_mod('knowledge_base_lite_res_close_menu_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','knowledge-base-lite'); ?></span></a>
    </nav>
  </div>
</div>