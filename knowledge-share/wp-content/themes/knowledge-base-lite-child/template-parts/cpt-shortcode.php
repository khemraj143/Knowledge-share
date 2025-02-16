<?php
ob_start();
$title = $args["title"] ?: "";
$cpt = $args["post_type"] ?: "";
$limit = $args["limit"] ?: "";
$filter = $args["filters"] ?: "";

?>
<div class="wp-section">
    <div class="blocks">
        <?php 
            if ($title) {
            ?>
                <div class="headers">
                    <h2><?php echo esc_html($title); ?></h2>
                </div>
            <?php
            }
            if ($cpt) {
                $cpt_args = array(
                    'post_type' => $cpt,
                    'post_status' => 'publish',
                    'posts_per_page' => $limit,
                );
                $cpt_query = new WP_Query($cpt_args);
                ?>
                <div class="content">
                <?php

                if ($cpt_query->have_posts()) {
                    while ($cpt_query->have_posts()) {
                        $cpt_query->the_post();
                        ?>
                        <div class="cpt-item">
                            <div class="item-title">
                                <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                            </div>
                            <?php
                                if (has_post_thumbnail(get_the_ID())) {
                                    echo '<div class="item-image">';
                                    echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
                                    echo '</div>';
                                }
                            ?>
                            <div class="item-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <?php                            
                    }
                } else {
                    ?>
                    <div class="cpt-item">
                        <p>No post data available.</p>
                    </div>
                    <?php
                }
                wp_reset_postdata();
                ?>
                </div>
                <?php
            }
        ?>
    </div>
</div>
<?php
echo ob_get_clean();