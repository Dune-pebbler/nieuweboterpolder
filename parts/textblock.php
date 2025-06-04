<?php

/**
 *  * expected parameter array
 * @param  $contentField 
 * @param  $linkField    
 * @param  $utilClasses  
 */
?>

<?php if ($args['contentField']) : ?>
    <div class="text-block">
        <?php echo $args['contentField']; ?>
        <?php if ($button = $args['linkField']) : ?>
            <a href="<?php echo esc_url($button['url']); ?>" target="<?php echo esc_attr($button['target'] ? $button['target'] : '_self'); ?>" class="btn"><?php echo esc_html($button['title']); ?></a>
        <?php endif; ?>
    </div>
<?php endif; ?>