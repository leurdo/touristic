<?php while (have_posts()) : the_post(); ?>
<div class="article-title title-page">
      <?php the_title(); ?>
</div>
    <div class="article-image">
        <?php the_post_thumbnail('full') ?>
    </div>
    <div class="article-info">
        <div class="post-date"><?php echo get_the_date(); ?></div>
    </div>
    <div class="article-text">
       <?php the_content(); ?>
    </div>

    <div class="article-pagination">
        <?php
        $prev_post = get_previous_post();
        if ($prev_post) {
            echo App\singlePostPagination($prev_post, 'Предыдущая статья');
        }

        $next_post = get_next_post();
        if ($next_post) {
            echo App\singlePostPagination($next_post, 'Следующая статья');
        }
        ?>
    </div>

<?php endwhile; ?>
