<?php
$image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>
<li>
    <div class="img-box">
        <?php if ($image_url) : ?>
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
        <?php else : ?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img1.jpg" alt="<?php the_title(); ?>">
        <?php endif; ?>
        <div class="caption-a">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </div>
    </div>
    <p><?php echo get_the_content(); ?></p>
</li>