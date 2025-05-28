<?php
/*
 * Template name: Page downloads
 */
get_header(); ?>

<?php get_template_part('templates/hero', 'template'); ?>

<?php
if (have_rows('posthuys_download') && have_rows('pakhuys_download')) {
    $classRow = "col-xl-4 col-md-6 flex-col-center";
} else if (have_rows('posthuys_download') || have_rows('pakhuys_download')) {
    $classRow = "col-xl-12 col-md-12 flex-col-center";
} else {
    $classRow = "col-xl-12 col-md-12 flex-col-center";

} ?>


<?php if (have_rows('posthuys_download') || have_rows('pakhuys_download')): ?>

    <section class="downloads">
        <div class="container">
            <div class="row flex-center text-center" style="align-items: flex-start;">
                <!-- bij het invoeren van de herhaler sloeg het niet op met de naam posthuys_repeater, beetje een dirty fix, niet kunnen achterhalen waar het aan lag -->
                <div class="<?php echo $classRow; ?>">
                    <?php if (have_rows('posthuys_download')): ?>
                        <?php while (have_rows('posthuys_download')):
                            the_row(); ?>
                            <div class="ev_download-item">
                                <?php echo get_sub_field('posthuys_title'); ?>
                                <ul class="ev_download-list">
                                    <?php while (have_rows('debug_herhaler')):
                                        the_row(); ?>
                                        <?php if ($link = get_sub_field('debug_link')): ?>
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

                <div class="<?php echo $classRow; ?>">
                    <?php if (have_rows('pakhuys_download')): ?>
                        <?php while (have_rows('pakhuys_download')):
                            the_row(); ?>
                            <?php echo get_sub_field('pakhuys_title'); ?>
                            <?php while (have_rows('pakhuys_link_repeater')):
                                the_row(); ?>
                                <?php if ($link = get_sub_field('pakhuys_link')): ?>
                                    <a href="<?php echo esc_url($link['url']); ?>"
                                        target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>"><?php echo esc_html_e(($link['title']), 'hureninpurmerend.nl'); ?></a>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
get_footer();
?>