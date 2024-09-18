<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 */

?>
<footer class="Footer">
    <div class="container">
        <a href="" class="scroll-up"></a>

        <ul class="menu-footer list-c">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'footer_menu',
                'container' => false,
                'items_wrap' => '<ul id="%1$s" class="%2$s menu-footer list-c">%3$s</ul>',
            ));
            ?>
        </ul>

        <p><?php echo esc_html(get_theme_mod('footer_copyright_text')); ?></p>

        <ul class="social-icons pull-right unstyled">
            <li><a href="<?php echo esc_url(get_theme_mod('footer_facebook_url', '#')); ?>" class="Facebook"></a></li>
            <li><a href="<?php echo esc_url(get_theme_mod('footer_twitter_url', '#')); ?>" class="Twitter"></a></li>
        </ul>

    </div>

</footer>


<?php wp_footer(); ?>
</body>

</html>