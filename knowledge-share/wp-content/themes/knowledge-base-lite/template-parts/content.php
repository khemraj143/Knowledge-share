<?php
/**
 * The template part for displaying post
 *
 * @package Knowledge Base Lite 
 * @subpackage knowledge-base-lite
 * @since knowledge-base-lite 1.0
 */
?>

<?php 
  $knowledge_base_lite_archive_year  = get_the_time('Y'); 
  $knowledge_base_lite_archive_month = get_the_time('m'); 
  $knowledge_base_lite_archive_day   = get_the_time('d'); 
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box p-3 mb-3 wow zoomInUp delay-1000" data-wow-duration="2s">
    <?php $knowledge_base_lite_theme_lay = get_theme_mod( 'knowledge_base_lite_blog_layout_option','Default');
    if($knowledge_base_lite_theme_lay == 'Default'){ ?>
      <div class="row">
        <?php if(has_post_thumbnail() && get_theme_mod( 'knowledge_base_lite_featured_image_hide_show',true) == 1) {?>
          <div class="box-image col-lg-6 col-md-6">
            <?php the_post_thumbnail(); ?>
          </div>
        <?php } ?>
        <article class="new-text <?php if(has_post_thumbnail() && get_theme_mod( 'knowledge_base_lite_featured_image_hide_show',true) == 1) { ?>col-lg-6 col-md-6" <?php } else { ?>col-lg-12 col-md-12" <?php } ?>>
          <h2 class="section-title mt-0 pt-0"><a href="<?php the_permalink(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
          <?php if( get_theme_mod( 'knowledge_base_lite_toggle_postdate',true) == 1 || get_theme_mod( 'knowledge_base_lite_toggle_author',true) == 1 || get_theme_mod( 'knowledge_base_lite_toggle_comments',true) == 1 || get_theme_mod( 'knowledge_base_lite_toggle_time',true) == 1) { ?>
            <div class="post-info p-2 my-3">
              <?php if(get_theme_mod('knowledge_base_lite_toggle_postdate',true)==1){ ?>
                <i class="<?php echo esc_attr(get_theme_mod('knowledge_base_lite_toggle_postdate_icon','fas fa-calendar-alt')); ?>"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $knowledge_base_lite_archive_year, $knowledge_base_lite_archive_month, $knowledge_base_lite_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span><?php echo esc_html(get_theme_mod('knowledge_base_lite_meta_field_separator', '|'));?></span>
              <?php } ?>

              <?php if(get_theme_mod('knowledge_base_lite_toggle_author',true)==1){ ?>
                <i class="<?php echo esc_attr(get_theme_mod('knowledge_base_lite_toggle_author_icon','fas fa-user')); ?>"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span><?php echo esc_html(get_theme_mod('knowledge_base_lite_meta_field_separator', '|'));?></span>
              <?php } ?>

              <?php if(get_theme_mod('knowledge_base_lite_toggle_comments',true)==1){ ?>
                <i class="<?php echo esc_attr(get_theme_mod('knowledge_base_lite_toggle_comments_icon','fa fa-comments')); ?>" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'knowledge-base-lite'), __('0 Comments', 'knowledge-base-lite'), __('% Comments', 'knowledge-base-lite') ); ?></span><span><?php echo esc_html(get_theme_mod('knowledge_base_lite_meta_field_separator', '|'));?></span>
              <?php } ?>

              <?php if(get_theme_mod('knowledge_base_lite_toggle_time',true)==1){ ?>
                <i class="<?php echo esc_attr(get_theme_mod('knowledge_base_lite_toggle_time_icon','fas fa-clock')); ?>"></i><span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
              <?php } ?>
              <?php echo esc_html (knowledge_base_lite_edit_link()); ?>
            </div>
          <?php } ?>
          <p class="mb-0">
            <?php $knowledge_base_lite_theme_lay = get_theme_mod( 'knowledge_base_lite_excerpt_settings','Excerpt');
            if($knowledge_base_lite_theme_lay == 'Content'){ ?>
              <?php the_content(); ?>
            <?php }
            if($knowledge_base_lite_theme_lay == 'Excerpt'){ ?>
              <?php if(get_the_excerpt()) { ?>
                <?php $knowledge_base_lite_excerpt = get_the_excerpt(); echo esc_html( knowledge_base_lite_string_limit_words( $knowledge_base_lite_excerpt, esc_attr(get_theme_mod('knowledge_base_lite_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('knowledge_base_lite_blog_excerpt_suffix',''));?>
              <?php }?>
            <?php }?>
          </p>
          <?php if( get_theme_mod('knowledge_base_lite_button_text','Read More') != ''){ ?>
            <div class="more-btn mt-4 mb-4">
              <a class="p-3" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('knowledge_base_lite_button_text',__('Read More','knowledge-base-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('knowledge_base_lite_button_text',__('Read More','knowledge-base-lite')));?></span></a>
            </div>
          <?php } ?>
        </article>
      </div>
    <?php }else if($knowledge_base_lite_theme_lay == 'Center'){ ?>
      <div class="service-text">
        <h2 class="section-title mt-0 pt-0"><a href="<?php the_permalink(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
        <?php if( get_theme_mod( 'knowledge_base_lite_featured_image_hide_show',true) == 1) { ?>
          <div class="box-image">
            <?php the_post_thumbnail(); ?>
          </div>
        <?php } ?>
        <?php if( get_theme_mod( 'knowledge_base_lite_toggle_postdate',true) == 1 || get_theme_mod( 'knowledge_base_lite_toggle_author',true) == 1 || get_theme_mod( 'knowledge_base_lite_toggle_comments',true) == 1 || get_theme_mod( 'knowledge_base_lite_toggle_time',true) == 1) { ?>
          <div class="post-info p-2 my-3">
            <?php if(get_theme_mod('knowledge_base_lite_toggle_postdate',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('knowledge_base_lite_toggle_postdate_icon','fas fa-calendar-alt')); ?>"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $knowledge_base_lite_archive_year, $knowledge_base_lite_archive_month, $knowledge_base_lite_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span><?php echo esc_html(get_theme_mod('knowledge_base_lite_meta_field_separator', '|'));?></span>
            <?php } ?>

            <?php if(get_theme_mod('knowledge_base_lite_toggle_author',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('knowledge_base_lite_toggle_author_icon','fas fa-user')); ?>"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span><?php echo esc_html(get_theme_mod('knowledge_base_lite_meta_field_separator', '|'));?></span>
            <?php } ?>

            <?php if(get_theme_mod('knowledge_base_lite_toggle_comments',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('knowledge_base_lite_toggle_comments_icon','fa fa-comments')); ?>" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'knowledge-base-lite'), __('0 Comments', 'knowledge-base-lite'), __('% Comments', 'knowledge-base-lite') ); ?></span><span><?php echo esc_html(get_theme_mod('knowledge_base_lite_meta_field_separator', '|'));?></span>
            <?php } ?>

            <?php if(get_theme_mod('knowledge_base_lite_toggle_time',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('knowledge_base_lite_toggle_time_icon','fas fa-clock')); ?>"></i><span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
            <?php } ?>
            <?php echo esc_html (knowledge_base_lite_edit_link()); ?>
          </div>
        <?php } ?>
        <p class="mb-0">
          <?php $knowledge_base_lite_theme_lay = get_theme_mod( 'knowledge_base_lite_excerpt_settings','Excerpt');
          if($knowledge_base_lite_theme_lay == 'Content'){ ?>
            <?php the_content(); ?>
          <?php }
          if($knowledge_base_lite_theme_lay == 'Excerpt'){ ?>
            <?php if(get_the_excerpt()) { ?>
              <?php $knowledge_base_lite_excerpt = get_the_excerpt(); echo esc_html( knowledge_base_lite_string_limit_words( $knowledge_base_lite_excerpt, esc_attr(get_theme_mod('knowledge_base_lite_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('knowledge_base_lite_blog_excerpt_suffix',''));?>
            <?php }?>
          <?php }?>
        </p>
        <?php if( get_theme_mod('knowledge_base_lite_button_text','Read More') != ''){ ?>
          <div class="more-btn mt-4 mb-4">
            <a class="p-3" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('knowledge_base_lite_button_text',__('Read More','knowledge-base-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('knowledge_base_lite_button_text',__('Read More','knowledge-base-lite')));?></span></a>
          </div>
        <?php } ?>
      </div>
    <?php }else if($knowledge_base_lite_theme_lay == 'Left'){ ?>
      <div class="service-text">
        <?php if( get_theme_mod( 'knowledge_base_lite_featured_image_hide_show',true) == 1) { ?>
          <div class="box-image">
            <?php the_post_thumbnail(); ?>
          </div>
        <?php } ?>
        <h2 class="section-title mt-0 pt-0"><a href="<?php the_permalink(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
        <?php if( get_theme_mod( 'knowledge_base_lite_toggle_postdate',true) == 1 || get_theme_mod( 'knowledge_base_lite_toggle_author',true) == 1 || get_theme_mod( 'knowledge_base_lite_toggle_comments',true) == 1 || get_theme_mod( 'knowledge_base_lite_toggle_time',true) == 1) { ?>
          <div class="post-info p-2 my-3">
            <?php if(get_theme_mod('knowledge_base_lite_toggle_postdate',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('knowledge_base_lite_toggle_postdate_icon','fas fa-calendar-alt')); ?>"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $knowledge_base_lite_archive_year, $knowledge_base_lite_archive_month, $knowledge_base_lite_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span><?php echo esc_html(get_theme_mod('knowledge_base_lite_meta_field_separator', '|'));?></span>
            <?php } ?>

            <?php if(get_theme_mod('knowledge_base_lite_toggle_author',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('knowledge_base_lite_toggle_author_icon','fas fa-user')); ?>"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
            <?php } ?><span><?php echo esc_html(get_theme_mod('knowledge_base_lite_meta_field_separator', '|'));?></span>

            <?php if(get_theme_mod('knowledge_base_lite_toggle_comments',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('knowledge_base_lite_toggle_comments_icon','fa fa-comments')); ?>" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'knowledge-base-lite'), __('0 Comments', 'knowledge-base-lite'), __('% Comments', 'knowledge-base-lite') ); ?></span>
            <?php } ?><span><?php echo esc_html(get_theme_mod('knowledge_base_lite_meta_field_separator', '|'));?></span>

            <?php if(get_theme_mod('knowledge_base_lite_toggle_time',true)==1){ ?>
              <i class="<?php echo esc_attr(get_theme_mod('knowledge_base_lite_toggle_time_icon','fas fa-clock')); ?>"></i><span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
            <?php } ?>
            <?php echo esc_html (knowledge_base_lite_edit_link()); ?>
          </div>
        <?php } ?>
        <p class="mb-0">
          <?php $knowledge_base_lite_theme_lay = get_theme_mod( 'knowledge_base_lite_excerpt_settings','Excerpt');
          if($knowledge_base_lite_theme_lay == 'Content'){ ?>
            <?php the_content(); ?>
          <?php }
          if($knowledge_base_lite_theme_lay == 'Excerpt'){ ?>
            <?php if(get_the_excerpt()) { ?>
              <?php $knowledge_base_lite_excerpt = get_the_excerpt(); echo esc_html( knowledge_base_lite_string_limit_words( $knowledge_base_lite_excerpt, esc_attr(get_theme_mod('knowledge_base_lite_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('knowledge_base_lite_blog_excerpt_suffix',''));?>
            <?php }?>
          <?php }?>
        </p>
        <?php if( get_theme_mod('knowledge_base_lite_button_text','Read More') != ''){ ?>
          <div class="more-btn mt-4 mb-4">
            <a class="p-3" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('knowledge_base_lite_button_text',__('Read More','knowledge-base-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('knowledge_base_lite_button_text',__('Read More','knowledge-base-lite')));?></span></a>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</div>