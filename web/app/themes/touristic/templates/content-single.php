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
            $prev_post_day = get_the_date('d',$prev_post->ID);
            $prev_post_month = get_the_date('m',$prev_post->ID);
            $prev_post_year = get_the_date('Y',$prev_post->ID);
        ?>
            <div class="article-pagination__block pagination-prev-left"><a href="<?php echo $prev_post->guid; ?>" class="article-pagination__link"><i class="icon icon-angle-double-left"></i>Предыдущая статья</a>
                <div class="wrap-pagination-preview pagination-prev-left">
                    <div class="preview-article__img"><?php echo get_the_post_thumbnail($prev_post->ID, array(160, 109), 'class=preview-article__image');?>
                    </div>
                    <div class="preview-article__content">
                        <div class="preview-article__info"><a href="<?php echo get_day_link($prev_post_year, $prev_post_month, $prev_post_day); ?>" class="post-date"><?php echo get_the_date('',$prev_post->ID); ?></a></div>
                        <div class="preview-article__text"><?php echo $prev_post->post_title; ?></div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php
        $next_post = get_next_post();
        if ($next_post) {
            $next_post_day = get_the_date('d',$next_post->ID);
            $next_post_month = get_the_date('m',$next_post->ID);
            $next_post_year = get_the_date('Y',$next_post->ID);
        ?>
            <div class="article-pagination__block pagination-prev-right"><a href="<?php echo $next_post->guid; ?>" class="article-pagination__link">Сдедующая статья<i class="icon icon-angle-double-right"></i></a>
                <div class="wrap-pagination-preview pagination-prev-right">
                    <div class="preview-article__img"><?php echo get_the_post_thumbnail($next_post->ID, array(160, 109), 'class=preview-article__image');?>
                    </div>
                    <div class="preview-article__content">
                        <div class="preview-article__info"><a href="<?php echo get_day_link($next_post_year, $next_post_month, $next_post_day); ?>" class="post-date"><?php echo get_the_date('',$next_post->ID); ?></a></div>
                        <div class="preview-article__text"><?php echo $next_post->post_title; ?></div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

<?php endwhile; ?>
