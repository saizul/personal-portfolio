<?php
/**
 * @package Case-Themes
 */
$subtitle_404 = foliohub()->get_theme_opt('subtitle_404');
$title_404 = foliohub()->get_theme_opt('title_404');
$des_404 = foliohub()->get_theme_opt('des_404');
$button_404 = foliohub()->get_theme_opt('button_404');
$img_404 = foliohub()->get_opt('img_404', ['url' => get_template_directory_uri() . '/assets/img/404-image.webp', 'id' => '']);
get_header(); ?>
<div class="wrap-content-404 bg-image">
    <div class="content">
        <h3 class="pxl-error-title wow fadeInUp pxl-flex-column">
            <?php if (!empty($title_404)) {
                echo pxl_print_html($title_404);
            } else {
                echo esc_html__('404', 'foliohub');
            } ?>
        </h3>
        <div class="pxl-desc">
            <p class="pxl-error-description wow fadeInUp">
                <?php if (!empty($des_404)) {
                    echo pxl_print_html($des_404);
                } else {
                    echo esc_html__('Looks like here is something missing!', 'foliohub');
                } ?>
            </p>
        </div>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-default inline pxl-icon--right">
            <span class="pxl-btn-icon">
                <i aria-hidden="true" class="bootstrap-icons bi-arrow-right"></i>
            </span>
            <span class="pxl--btn-text">
                <?php if (!empty($button_404)) {
                    echo pxl_print_html($button_404);
                } else {
                    echo esc_html__('back to homepage', 'foliohub');
                } ?>
            </span>
        </a>
        <div class="pxl-image-404">
            <img class="img-404" src="<?php echo esc_url($img_404['url']); ?>" alt="404 image">
        </div>
    </div>
</div>
<?php get_footer();
