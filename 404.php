<?php
/* Template Name: 404 */
get_header('404');
?>
<div class="container">
    <h1><?php _e('Not found', 'healol-domain'); ?> <span>:(</span></h1>
    <p><?php _e('Sorry, but the page you were trying to view does not exist.', 'healol-domain'); ?></p>
    <p><?php _e('It looks like this was the result of either:', 'healol-domain'); ?></p>
    <ul>
        <li><?php _e('a mistyped address', 'healol-domain'); ?></li>
        <li><?php _e('an out-of-date link', 'healol-domain'); ?></li>
    </ul>
</div>