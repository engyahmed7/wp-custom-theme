<ul class="list-a">
    <?php if (isset($options['contact_address'])) : ?>
    <li>
        <h2><?php _e('Address', 'healol-domain'); ?></h2>
        <p><?php echo wp_kses_post($options['contact_address']); ?></p>
    </li>
    <?php endif; ?>
    <?php if (isset($options['contact_phone'])) : ?>
    <li>
        <h2><?php _e('Phone', 'healol-domain'); ?></h2>
        <p><?php echo wp_kses_post($options['contact_phone']); ?></p>
    </li>
    <?php endif; ?>
    <?php if (isset($options['contact_email'])) : ?>
    <li>
        <h2><?php _e('Email', 'healol-domain'); ?></h2>
        <p><?php echo wp_kses_post($options['contact_email']); ?></p>
    </li>
    <?php endif; ?>
</ul>