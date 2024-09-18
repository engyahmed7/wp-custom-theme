<?php if (!defined('ABSPATH')) exit; ?>

<div class="Blog-box">
    <div class="title-a">
        <h2><?php _e('New on the Blog', 'healol-domain'); ?></h2>
    </div>
    <ul>
        <?php if ($blog_query->have_posts()) : ?>
        <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
        <li>
            <div class="img-box2 pull-right">
                <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive', 'width' => 130, 'height' => 108)); ?>
                <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/default.jpg" width="130" height="108">
                <?php endif; ?>
            </div>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <p><time class="pull-left"><?php the_time('d F Y'); ?></time></p>
        </li>
        <?php endwhile; ?>
        <?php else : ?>
        <li><?php _e('No posts found', 'healol-domain'); ?></li>
        <?php endif; ?>
    </ul>
    <div class="Foot-blog">
        <?php
        echo paginate_links(array(
            'total' => $blog_query->max_num_pages,
            'current' => $blog_box_paged,
            'format' => '?paged=%#%',
            'prev_text' => __('«', 'healol-domain'),
            'next_text' => __('»', 'healol-domain'),
            'before_page_number' => '<span class="page-number">',
            'after_page_number'  => '</span>',
        ));
        ?>
    </div>
</div>

<?php wp_reset_postdata(); ?>