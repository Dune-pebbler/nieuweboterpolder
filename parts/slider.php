<?php
// Check if there are any images in the repeater
if (have_rows('slider_images')): ?>
    <div class="owl-carousel" style="width: 100%;">
        <?php
        // Loop through the slider images
        while (have_rows('slider_images')):
            the_row();
            $image = get_sub_field('slider_img'); // Get the image field
            if ($image): ?>
                <div class="slide-item">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endif;
        endwhile; ?>
    </div>
<?php endif;
?>