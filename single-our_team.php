<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();

        $member_name = get_post_meta(get_the_ID(), 'member_name', true);
        $member_position = get_post_meta(get_the_ID(), 'member_position', true);

?>
<div class="team-member">
    <h1><?php echo esc_html($member_name); ?></h1>
    <p><?php echo esc_html($member_position); ?></p>

    <?php if (has_post_thumbnail()) : ?>
    <div class="member-image">
        <?php the_post_thumbnail('full'); ?>
    </div>
    <?php endif; ?>

</div>

<?php endwhile;
endif;

get_footer();
?>