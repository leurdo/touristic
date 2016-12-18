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
            ?>
             <div class="post-wrap">
                <div class="post-thumbnail">
                    <?php the_post_thumbnail(array(270, 190), 'class=post-thumbnail__image') ?>
                </div>
                <div class="post-content">
                    <div class="post-content__post-info">
                        <div class="post-date"><?php echo get_the_date(); ?></div>
                    </div>
                    <div class="post-content__post-text">
                        <div class="post-title">
                            <?php the_title(); ?>
                        </div>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                    <div class="post-content__post-control"><a href="<?php the_permalink(); ?>" class="btn-read-post">Читать далее >></a></div>
                </div>
            </div>

        <?php
        } ?>
    </div>
    <div class="pagenavi-post-wrap">
        <?php wp_pagenavi( array( 'query' => $query ) ); ?>
    </div>
    <?php
    wp_reset_postdata();
    ?>

<?php endwhile; ?>
