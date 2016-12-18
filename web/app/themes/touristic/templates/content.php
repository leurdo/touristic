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
