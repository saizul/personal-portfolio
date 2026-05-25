<?php

if (!class_exists('Foliohub_Footer')) {

    class Foliohub_Footer
    {
        public function getFooter()
        {
            if(is_singular('elementor_library')) return;
            
            $footer_layout = (int)foliohub()->get_opt('footer_layout');
            
            if ($footer_layout <= 0 || !class_exists('Pxltheme_Core') || !is_callable( 'Elementor\Plugin::instance' )) {
                get_template_part( 'template-parts/footer/default');
            } else {
                $args = [
                    'footer_layout' => $footer_layout
                ];
                get_template_part( 'template-parts/footer/elementor','', $args );
            } 

            // Back To Top
            $back_totop_on = foliohub()->get_theme_opt('back_totop_on', true);
            $back_top_top_style = foliohub()->get_opt('back_top_top_style', 'style-default');
            $back_top_top_hide = foliohub()->get_opt('back_top_top_hide', '');
            if (isset($back_totop_on) && $back_totop_on) : ?>
                <a class="pxl-scroll-top <?php echo esc_attr($back_top_top_style .' '. $back_top_top_hide); ?>" href="#">
                    <i class="bi-arrow-right"></i>
                    <svg class="pxl-scroll-progress-circle" width="100%" height="100%" viewBox="-1 -1 102 102">
                        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
                    </svg>
                </a>
            <?php endif;

            // Mouse Move Animation
            foliohub_mouse_move_animation();

            // Cookie Policy
            foliohub_cookie_policy();

            // Subscribe Popup
            foliohub_subscribe_popup();
            
        }
 
    }
}
 