<?php
/**
 * Template Name: Home Template
 */
?>

<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part('templates/page', 'header');
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    $args = array(
        'post_type' => array('post', 'discount'),
        'paged' => $paged,
        'posts_per_page' => 5,
    );
    $query = new WP_Query($args);
    ?>
    <div class="posts-list">
        <!-- post-mini-->
        <?php
        while ($query->have_posts()) {
            $query->the_post();
             get_template_part('templates/content', '');
        } ?>
    </div>
    <div class="pagenavi-post-wrap">
        <?php wp_pagenavi( array( 'query' => $query ) ); ?>
    </div>
    <?php
    wp_reset_postdata();
    ?>

<?php endwhile; ?>
