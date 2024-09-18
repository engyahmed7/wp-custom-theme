<?php if (!empty($latest_posts)) : ?>
<div class="sliderkit-panels">
    <?php foreach ($latest_posts as $post) : setup_postdata($post); ?>
    <div class="sliderkit-panel">
        <a href="<?php the_permalink(); ?>" class="news-line" title="<?php the_title(); ?>">
            <?php echo wp_trim_words(get_the_content(), 40, '...'); ?>
        </a>
        <time><?php echo date('d F Y'); ?></time>
    </div>
    <?php endforeach;
        wp_reset_postdata(); ?>
</div>
<?php else : ?>
<div class="sliderkit-panels">
    <div class="sliderkit-panel">
        <a
            class="news-line text-decoration-none"><?php echo __('No news available for today', 'my-custom-theme'); ?></a>
    </div>
</div>
<?php endif; ?>