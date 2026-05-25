<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Case-Themes
 */

if(has_post_thumbnail()){
    $content_inner_cls = 'single-post-inner has-post-thumbnail';
    $meta_class    = ''; 
} else {
    $content_inner_cls = 'single-post-inner  no-post-thumbnail';
    $meta_class = '';
}

if(class_exists('\Elementor\Plugin') && \Elementor\Plugin::$instance->documents->get( $id )->is_built_with_elementor()){
    $post_content_classes = 'single-elementor-content';
} else {
    $post_content_classes = '';
}
$sg_featured_img_size = foliohub()->get_theme_opt('sg_featured_img_size', '860x500');
$feature_image_display = foliohub()->get_theme_opt('feature_image_display', 'hide');
$post_header_meta_on = foliohub()->get_opt( 'post_header_meta_on', '1' ); 
$post_date_on = foliohub()->get_theme_opt('post_date_on', true);
$post_categories = get_the_category();
$post_comment = foliohub()->get_theme_opt( 'post_comment', true );
$post_view = foliohub()->get_theme_opt( 'post_view', true );
$views = foliohub_get_post_views(get_the_ID());
$suffix = ($views >= 1000) ? 'k' : '+';
$post_title_on = foliohub()->get_theme_opt('post_title_on');
$post_author_info = foliohub()->get_theme_opt( 'post_author_info', false );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl-single-post'); ?>>
    <div class="<?php echo esc_attr($content_inner_cls);?>">
        <?php if (has_post_thumbnail() && ($feature_image_display == 'show')) {
            $img  = pxl_get_image_by_size( array(
                'attach_id'  => get_post_thumbnail_id($post->ID),
                'thumb_size' => $sg_featured_img_size,
            ) );
            $thumbnail    = $img['thumbnail']; ?>
            <div class="pxl-item--image">
                <?php echo wp_kses_post($thumbnail); ?>
                <?php if(!empty($post_video_link)) : ?>
                    <a href="<?php echo esc_url($post_video_link); ?>" class="post-button-video pxl-action-popup"><i class="bi-play-fill"></i></a>
                <?php endif; ?>        
            </div>
        <?php } ?>
        <?php if($post_header_meta_on == '1') : ?>
            <div class="pxl-post--top">
                <div class="pxl-post--top__left">
                    <?php if ( ! empty( $post_categories ) ) :?>
                        <div class="pxl-item--category">
                            <?php
                                foreach ( $post_categories as $key => $category ) {
                                    if ( $key > 0 ) echo ', ';
                                    echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
                                }
                            ?>
                        </div>
                    <?php endif; ?>
                    <?php if($post_date_on) : ?>
                        <span class="pxl-item--date">
                            <?php echo get_the_date('M d, Y'); ?>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="pxl-post--top__right">
                    <?php if($post_comment) : ?>
                        <div class="pxl-item--comment">
                            <i aria-hidden="true" class="fas fa-comments"></i>
                            <a href="<?php the_permalink(); ?>#comments">
                                <?php echo comments_number(esc_html__('0', 'foliohub'),esc_html__('1 +', 'foliohub'),esc_html__('% +', 'foliohub')); ?>
                                <?php echo esc_html__(' Comments', 'foliohub');?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if ($post_view) : ?>
                        <div class="pxl-item--view pxl-post-list">
                            <i aria-hidden="true" class="fas fa-eye"></i>
                            <span class="pxl-mr-3"><?php echo esc_html( $views ) . esc_html( $suffix ); ?><?php echo esc_html__('View', 'foliohub');?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="post-content overflow-hidden">
            <div class="content-inner clearfix <?php echo esc_attr($post_content_classes);?>"><?php
            the_content();
        ?></div>
        <div class="<?php echo trim(implode(' ', ['navigation page-links clearfix empty-none'])); ?>"><?php 
        wp_link_pages(); 
    ?></div>
</div>
<?php
$post_tag = foliohub()->get_theme_opt( 'post_tag', true );
$post_social_share = foliohub()->get_theme_opt( 'post_social_share', false );
if ($post_tag == '1' || $post_social_share == '1'){
    ?>
    <div class="post-tags-share d-flex">
        <?php
        if ($post_tag == '1'){
            ?><div class="post-tags-wrap "><?php  foliohub()->blog->get_post_tags(); ?></div><?php
        }
        if ($post_social_share == '1'){
            ?><div class="post-share-wrap "><?php foliohub()->blog->get_post_share(); ?></div><?php
        }
        ?>
    </div>
    <?php
}
?>
</div>
<?php foliohub()->blog->get_post_author_info(); ?>
<?php foliohub()->blog->get_post_nav(); ?>
</article>