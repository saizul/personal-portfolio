<?php
/**
 * @package Case-Themes
 */

get_header();
$foliohub_sidebar = foliohub()->get_sidebar_args(['type' => 'blog', 'content_col'=> '8', 'sidebar_layout' => 'style1']); 
$post_category_on = foliohub()->get_theme_opt('post_category_list_on', true);
?>
<div class="container">
    <?php if ($post_category_on) {foliohub()->blog->get_all_categories_list();} ?>
    <div class="row <?php echo esc_attr($foliohub_sidebar['wrap_class']) ?>" >
        <div id="pxl-content-area" class="<?php echo esc_attr($foliohub_sidebar['content_class']) ?>">
            <main id="pxl-content-main">
                <?php if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        get_template_part( 'template-parts/content/archive/standard' );
                    }
                    foliohub()->page->get_pagination();
                } else {
                    get_template_part( 'template-parts/content/content', 'none' );
                } ?>
            </main>
        </div>
        <?php if ($foliohub_sidebar['sidebar_class']) : ?>
            <div id="pxl-sidebar-area" class="<?php echo esc_attr($foliohub_sidebar['sidebar_class']) ?>">
                <div class="pxl-sidebar-sticky">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer();
