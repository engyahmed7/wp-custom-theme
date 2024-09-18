<?php get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
        ?>
        <article <?php post_class(); ?>>
            <header class="entry-header">
                <?php
                        the_title('<h1 class="entry-title">', '</h1>');
                        ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('full');
                        }

                        the_content();
                        ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
                <?php
                        the_tags('<span class="tags-links">', ', ', '</span>');
                        ?>
            </footer><!-- .entry-footer -->
        </article><!-- #post-<?php the_ID(); ?> -->

        <?php
            endwhile;
        else :
            ?>
        <p><?php _e('Sorry, no posts matched your criteria.', 'my-theme'); ?></p>
        <?php
        endif;
        ?>
    </div><!-- .container -->
</main><!-- #main -->

<?php
$related_posts = get_field('feature');
echo '<pre>';
print_r($related_posts);
echo '</pre>';

if ($related_posts): ?>
<ul>
    <?php foreach ($related_posts as $post):
            setup_postdata($post); ?>
    <li>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </li>
    <?php endforeach; ?>
</ul>
<?php wp_reset_postdata();
    ?>
<?php endif; ?>


<?php
$post_object = get_field('recommend');
echo '<pre>';
print_r($post_object);
echo '</pre>';
if ($post_object):
    $posts = $post_object;

    foreach ($posts as $post):
        setup_postdata($post);
?>
<li>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</li>
<?php endforeach; ?>


<?php wp_reset_postdata();
    ?>

<?php endif; ?>



<?php
$page_link = get_field('custom_page_link');
echo ($page_link);

if ($page_link): ?>
<a href="<?php echo esc_url($page_link); ?>">Visit the Page</a>
<?php endif; ?>


<?php
$user = get_field('user');
echo '<pre>';
print_r($user);
echo '</pre>';
if ($user) {
    echo 'User Nickname: ' . $user['nickname'] . '<br>';
    echo 'User email: ' . $user['user_email'] . '<br>';
    echo 'User display name: ' . $user['display_name'] . '<br>';
}
?>


<?php
$taxonomy = get_field('tax');
echo '<pre>';
print_r($taxonomy);
echo '</pre>';

?>


<?php
$link = get_field('link');
echo '<pre>';
print_r($link);
echo '</pre>';

if ($link) {
    echo '<a href="' . esc_url($link['url']) . '" target="' . esc_attr($link['target']) . '">' . esc_html($link['title']) . '</a>';
}
?>



<?php
$icon = get_field('icons');
echo '<pre>';
print_r($icon);
echo '</pre>';

if ($icon) {
    echo '<img src="' . esc_url($icon) . '">';
}

?>


<?php
$date_and_time = get_field('data_and_time');
echo '<pre>';
print_r($date_and_time);
echo '</pre>';

if ($date_and_time) {
    echo esc_html($date_and_time);
}
?>


<?php
$color = get_field('color');
echo '<pre>';
print_r($color);
echo '</pre>';

if ($color) {
    echo '<div style="color:' . esc_attr($color) . ';font-weight:bold;">This text has the color ' . esc_html($color) . '</div>';
}
?>


<?php
$image = get_field('image');
echo '<pre>';
print_r($image);
echo '</pre>';

if ($image) {
    echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
}
?>



<?php
$file = get_field('file');
echo '<pre>';
print_r($file);
echo '</pre>';

if ($file) {
    echo '<a href="' . esc_url($file['url']) . '">' . esc_html($file['filename']) . '</a> <br>';
}

?>

<?php
$group_fields = get_field('group_fields');

if ($group_fields) {
    $upload_file = $group_fields['upload_file'];
    echo 'File URL: ' . $upload_file['url'] . '<br>';
    $button_group = $group_fields['button_group'];
    echo 'Button Label: ' . $button_group . '<br>';
} else {
    echo 'Group fields not found.';
}
?>




<?php get_footer(); ?>