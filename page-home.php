<?php
/*
 * Template name: Page builder
 */
get_header();
?>

<?php if (have_rows('pagebuilder')): ?>
    <?php while (have_rows('pagebuilder')):
        the_row(); ?>

        <?php if (get_row_layout() == 'hero_banner'): ?>
            <section class="hero relative">
                <?php if ($gallery = get_sub_field('afbeelding')): ?>
                    <div class="owl-carousel" style="width: 100%;">
                        <?php foreach ($gallery as $image): ?>
                            <div class="slide-item">
                                <img class="cover-fill banner-img" src="<?php echo esc_url($image['url']); ?>"
                                    alt="<?php echo esc_attr($image['alt']); ?>" />
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <?php if (get_sub_field('overlay_tekst')): ?>
                        <div class="banner-text relative flex-col-center">
                            <?php if ($badge_link = get_sub_field('badge_link')): ?>
                                <div class="badge">
                                    <a href="<?php echo esc_url($badge_link['url']); ?>"
                                        target="<?php echo esc_attr($badge_link['target'] ? $badge_link['target'] : '_self'); ?>">
                                        <h2><?php echo esc_html($badge_link['title']); ?></h2>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php echo get_sub_field('overlay_tekst'); ?>
                            <?php if ($button = get_sub_field('button')): ?>
                                <a href="<?php echo esc_url($button['url']); ?>"
                                    target="<?php echo esc_attr($button['target'] ? $button['target'] : '_self'); ?>"
                                    class="btn"><?php echo esc_html($button['title']); ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($image = get_sub_field('afbeelding-deco')): ?>
                    <img class="cover-width deco-img" src="<?php echo esc_url($image['url']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </section>
        <?php elseif (get_row_layout() == 'een_kolom'): ?>
            <section class="one-column">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <?php if (get_sub_field('tekst')): ?>
                                <?= the_sub_field('tekst') ?>
                            <?php endif; ?>
                            <?php if ($image = get_sub_field('afbeelding')): ?>
                                <a href="<?php echo esc_url($image['url']); ?>">
                                    <img class="cover-width " src="<?php echo esc_url($image['url']); ?>"
                                        alt="<?php echo esc_attr($image['alt']); ?>" />
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'een_slider'): ?>
            <section class="one-column">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <?php if (get_sub_field('tekst')): ?>
                                <h2 style="text-align: center;"> <?= the_sub_field('tekst') ?></h2>
                            <?php endif; ?>
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

                        </div>
                    </div>
                </div>
            </section>

            <section class="hero-slider relative">
                <?php if (get_sub_field('overlay_tekst')): ?>
                    <div class="banner-text relative flex-col-center">
                        <?php if ($badge_link = get_sub_field('badge_link')): ?>
                            <div class="badge">
                                <a href="<?php echo esc_url($badge_link['url']); ?>"
                                    target="<?php echo esc_attr($badge_link['target'] ? $badge_link['target'] : '_self'); ?>">
                                    <h2><?php echo esc_html($badge_link['title']); ?></h2>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php echo get_sub_field('overlay_tekst'); ?>
                        <?php if ($button = get_sub_field('button')): ?>
                            <a href="<?php echo esc_url($button['url']); ?>"
                                target="<?php echo esc_attr($button['target'] ? $button['target'] : '_self'); ?>"
                                class="btn"><?php echo esc_html($button['title']); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div style="position: absolute;" class="overlay-tekst">
                                <?php if ($badge_link = get_sub_field('badge_link')): ?>
                                    <!-- <div class="badge">
                                        <a href="<?php echo esc_url($badge_link['url']); ?>"
                                            target="<?php echo esc_attr($badge_link['target'] ? $badge_link['target'] : '_self'); ?>">
                                            <h2><?php echo esc_html($badge_link['title']); ?></h2>
                                        </a>
                                    </div> -->
                                <?php endif; ?>
                                <?php echo get_sub_field('overlay_tekst'); ?>
                                <?php if ($button = get_sub_field('button')): ?>
                                    <a href="<?php echo esc_url($button['url']); ?>"
                                        target="<?php echo esc_attr($button['target'] ? $button['target'] : '_self'); ?>"
                                        class="btn"><?php echo esc_html($button['title']); ?></a>
                                <?php endif; ?>

                            </div>
                            <?php
                            // Check if there are any images in the repeater
                            if (have_rows('hero_slider_images')): ?>
                                <div class="owl-carousel" style="width: 100%;">
                                    <?php
                                    // Loop through the slider images
                                    while (have_rows('hero_slider_images')):
                                        the_row();
                                        $image = get_sub_field('hero_slider_img'); // Get the image field
                                        if ($image): ?>
                                            <div class="slide-item">
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                            </div>
                                    <?php endif;
                                    endwhile; ?>
                                </div>
                            <?php endif;
                            ?>

                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'tekst_met_carousel'): ?>
            <section class="carousel relative">
                <div class="half-page-left">
                    <?php if (have_rows('impressie_slider')): ?>
                        <div class="owl-carousel">
                            <?php while (have_rows('impressie_slider')):
                                the_row(); ?>
                                <div class="slide relative">
                                    <?php if ($image = get_sub_field('afbeelding')): ?>
                                        <img class="cover-fill" src="<?php echo esc_url($image['url']); ?>"
                                            alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>
                                    <?php if (get_sub_field('afbeelding_beschrijving')): ?>
                                        <span class="slide-description">
                                            <?= get_sub_field('afbeelding_beschrijving') ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="container">
                    <div class="row flex-end">
                        <div class="col-xl-6">
                            <div class="content-container">
                                <?php get_template_part('parts/textblock', null, array(
                                    'contentField' => get_sub_field('tekst'),
                                    'linkField' => get_sub_field('button'),
                                    'utilClasses' => 'flex-col-start text-left',
                                )); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'tekst_met_afbeelding'): ?>
            <section class="two-column relative">
                <?php $flip = get_sub_field('layout') ?>
                <div class="<?= $flip ? 'half-page-left' : 'half-page-right' ?>">
                    <?php if ($image = get_sub_field('afbeelding')): ?>
                        <img class="cover-fill" src="<?php echo esc_url($image['url']); ?>"
                            alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
                <div class="container">
                    <div class="row <?= $flip ? 'flex-end' : 'flex-start' ?>">
                        <div class="col-xl-6">
                            <div class="content-container">
                                <?php get_template_part('parts/textblock', null, array(
                                    'contentField' => get_sub_field('tekst'),
                                    'linkField' => get_sub_field('button'),
                                    'utilClasses' => 'flex-col-start text-left',
                                )); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'tekst_met_kleine_afbeelding'): ?>
            <section class="two-column relative">
                <?php $flip = get_sub_field('layout') ?>
                <div class="container">
                    <div class="row <?= $flip ? 'row-reverse' : '' ?>">
                        <div class="col-lg-7">
                            <div class="content-container">
                                <?php get_template_part('parts/textblock', null, array(
                                    'contentField' => get_sub_field('tekst'),
                                    'linkField' => get_sub_field('button'),
                                    'utilClasses' => 'flex-col-start text-left',
                                )); ?>
                            </div>
                        </div>
                        <div class="col-lg-1">
                        </div>
                        <?php if ($image = get_sub_field('afbeelding')): ?>
                            <div class="col-lg-4 flex-center">
                                <img class="contain-width" src="<?php echo esc_url($image['url']); ?>"
                                    alt="<?php echo esc_attr($image['alt']); ?>" />
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'tekst_met_kaart'): ?>
            <section class="two-column relative">
                <?php $flip = get_sub_field('layout') ?>
                <div class="<?= $flip ? 'half-page-left' : 'half-page-right' ?>">
                    <div id="custom-map"></div>
                </div>
                <div class="container">
                    <div class="row <?= $flip ? 'flex-end' : 'flex-start' ?>">
                        <div class="col-xl-6">
                            <div class="content-container">
                                <?php get_template_part('parts/textblock', null, array(
                                    'contentField' => get_sub_field('tekst'),
                                    'linkField' => get_sub_field('button'),
                                    'utilClasses' => 'flex-col-start text-left',
                                )); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'uitgelichte_woningen'): ?>
            <section class="featured-residences relative" id="woningen-scroll">

                <?php if ($image = get_sub_field('afbeelding')): ?>
                    <img class="background-cover" src="<?php echo esc_url($image['url']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>

                <div class="container">
                    <div class="row">
                        <?php if (get_sub_field('tekst')): ?>
                            <div class="col-12">
                                <?= get_sub_field('tekst') ?>
                            </div>
                        <?php endif; ?>
                        <?php $woningen_query = new WP_Query(array(
                            'post_type' => 'woningen',
                            'posts_per_page' => 6,
                            'orderby' => 'date',
                            'order' => 'ASC',
                        )); ?>

                        <?php if ($woningen_query->have_posts()): ?>
                            <?php while ($woningen_query->have_posts()):
                                $woningen_query->the_post(); ?>
                                <div class="col-lg-4" style="margin-bottom:2em;">
                                    <div class="content-group flex-col overlayTrigger">

                                        <?php if (has_post_thumbnail()): ?>
                                            <img class="cover-fill" style="height:220px; object-position: center;"
                                                src="<?= esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>"
                                                alt="<?= esc_attr(get_the_title()); ?>" />
                                        <?php endif; ?>

                                        <div class="text-group relative">
                                            <h2 class="title"><?= get_the_title(); ?></h2>
                                            <h3 class="subtitle"><?= get_field('woning_subtitel') ?></h3>
                                            <span class="btn-secondary read-more">Bekijken</span>
                                        </div>
                                        <div class="overlay">
                                            <div class="inner-container relative">
                                                <i class="fa-solid fa-xmark"></i>
                                                <div class="text-container">
                                                    <div class="image-container relative">
                                                        <div class="inner-img-container">
                                                            <?php if ($gallery = get_field('woning_gallery')): ?>
                                                                <div class="owl-carousel" style="width: 100%; height: 100%;">
                                                                    <?php foreach ($gallery as $image): ?>
                                                                        <div class="slide-item">
                                                                            <img class="contain" style="height: 100%;"
                                                                                src="<?php echo esc_url($image['url']); ?>"
                                                                                alt="<?php echo esc_attr($image['alt']); ?>" />
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="grouper">
                                                        <h2 class="title"><?= get_the_title(); ?></h2>
                                                        <?= get_field('woning_beschrijving') ?>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>

                        <?php if ($button = get_sub_field('button')): ?>
                            <div class="col-12 flex-center">
                                <a href="<?php echo esc_url($button['url']); ?>"
                                    target="<?php echo esc_attr($button['target'] ? $button['target'] : '_self'); ?>"
                                    class="btn"><?php echo esc_html($button['title']); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
            </section>

        <?php elseif (get_row_layout() == 'recent_nieuws'): ?>
            <section class="recent-news ">

                <div class="container">
                    <div class="row">
                        <?php if (get_sub_field('tekst')): ?>
                            <div class="col-12 heading-tekst">
                                <?= get_sub_field('tekst') ?>
                            </div>
                        <?php endif; ?>
                        <?php $woningen_query = new WP_Query(array(
                            'post_type' => 'post',
                            'posts_per_page' => get_sub_field('hoeveelheid'),
                        )); ?>

                        <?php if ($woningen_query->have_posts()): ?>
                            <?php while ($woningen_query->have_posts()):
                                $woningen_query->the_post(); ?>
                                <div class="col-lg-4" style="margin-bottom:2em;">
                                    <div class="content-group flex-col" onclick="window.location.href='<?= get_permalink(); ?>';"
                                        style="cursor: pointer;">
                                        <?php if (has_post_thumbnail()): ?>
                                            <img class="cover-fill"
                                                src="<?= esc_url(wp_get_attachment_image_url(get_post_thumbnail_id(), 'large', true)); ?>"
                                                alt="<?= esc_attr(get_the_title()); ?>" />
                                        <?php endif; ?>
                                        <div class="text-group relative flex-col-between">
                                            <div class="grouper">
                                                <h3 class="title"><?= get_the_title(); ?></h3>
                                                <p class="date" style="color: white;"><?php echo get_the_date(); ?></p>
                                                <div class="content"><?php the_content(); ?></div>
                                                <p class="read-more">Lees meer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>

                        <?php if ($button = get_sub_field('button')): ?>
                            <div class="col-12 flex-center">
                                <a href="<?php echo esc_url($button['url']); ?>"
                                    target="<?php echo esc_attr($button['target'] ? $button['target'] : '_self'); ?>"
                                    class="btn"><?php echo esc_html($button['title']); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
            </section>

        <?php elseif (get_row_layout() == 'formulier'): ?>
            <section class="form" id="inschrijf-id">
                <div class="tweety">
                    <img src="<?= get_template_directory_uri() . '/images/tweety.svg'; ?>" />
                </div>
                <div class="container">
                    <div class="row">
                        <?php if (get_sub_field('tekst')): ?>
                            <div class="col-12">
                                <?= get_sub_field('tekst') ?>
                            </div>
                        <?php endif; ?>

                        <div class="col-12">
                            <iframe src="https://account.nieuweboterpolder.nl/aanmelden/"  style="border:0; width: 100%"></iframe> 
                            <script type="text/javascript"
                                src="https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.5.1/iframeResizer.min.js"></script>
                            <script>
                                iFrameResize({
                                    checkOrigin: false
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'faq'): ?>
            <section class="faq">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-12 col-lg-7">
                            <?php if (have_rows('faq_repeater')): ?>
                                <?php while (have_rows('faq_repeater')):
                                    the_row(); ?>
                                    <div class="question-container">
                                        <?php if (get_sub_field('vraag')): ?>
                                            <strong><?php echo get_sub_field('vraag') ?></strong>
                                        <?php endif; ?>
                                        <?php if (get_sub_field('antwoord')): ?>
                                            <p class="answer"><?php echo get_sub_field('antwoord') ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>
                        <div class="col-12 col-lg-4">
                            <?php if ($image = get_sub_field('sfeer_afbeelding_naast_faq')): ?>
                                <img class="contain-fill" src="<?php echo esc_url($image['url']); ?>"
                                    alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'downloads'): ?>
            <section class="downloads">
                <div class="container">
                    <div class="row flex-center text-center" style="align-items: flex-start;">
                        <h1 class="downloads__title">Downloads</h1>
                        <div class="downloads-container">
                            <?php if (have_rows('download_repeater')): ?>
                                <?php while (have_rows('download_repeater')):
                                    the_row(); ?>
                                    <div class="ev_download-item" style="display:flex;">
                                        <?php echo get_sub_field('download_category'); ?>
                                        <ul class="ev_download-list">
                                            <?php while (have_rows('download_links')):
                                                the_row(); ?>
                                                <?php if ($link = get_sub_field('download_link')): ?>
                                                    <li><a href="<?php echo esc_url($link['url']); ?>"
                                                            target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>"><?php echo esc_html_e(($link['title']), 'hureninpurmerend.nl'); ?></a>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endwhile; ?>
                                        </ul>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>

<?php else: ?>
<?php endif; ?>
<?php get_footer(); ?>