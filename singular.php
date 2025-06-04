<?php
get_header();
?>

<section class="news-single">
    <div class="container">
        <div class="row flex-center">
            <div class="col-lg-8">
                <?php if (has_post_thumbnail()) : ?>
                    <img class="cover-fill" src="<?= esc_url(wp_get_attachment_image_url(get_post_thumbnail_id(), 'large', true)); ?>" alt="<?= esc_attr(get_the_title()); ?>" />
                <?php endif; ?>
                <div class="text-group relative">
                    <h3 class="title"><?= get_the_title(); ?></h3>
                    <p class="date"><?php echo get_the_date(); ?></p>
                    <div class="content"><?php the_content(); ?></div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>