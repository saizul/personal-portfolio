<?php if(!function_exists('foliohub_configs')){
    function foliohub_configs($value){
        $configs = [
            'theme_colors' => [
                'body'   => [
                    'title' => esc_html__('Body Color', 'foliohub'), 
                    'value' => foliohub()->get_opt('body_color', '#FFFFFFB3')
                ],
                'primary'   => [
                    'title' => esc_html__('Primary', 'foliohub'), 
                    'value' => foliohub()->get_opt('primary_color', '#EB5838')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'foliohub'), 
                    'value' => foliohub()->get_opt('secondary_color', '#E4D969')
                ],
                'third'   => [
                    'title' => esc_html__('Third', 'foliohub'), 
                    'value' => foliohub()->get_opt('third_color', '#0F0F0F')
                ],
                'four'   => [
                    'title' => esc_html__('Four', 'foliohub'), 
                    'value' => foliohub()->get_opt('four_color', '#191919')
                ],
                'body_bg'   => [
                    'title' => esc_html__('Body Background Color', 'foliohub'), 
                    'value' => foliohub()->get_opt('body_bg_color', '#000')
                ]
            ],

            'link' => [
                'color' => foliohub()->get_opt('link_color', ['regular' => '#000000'])['regular'],
                'color-hover'   => foliohub()->get_opt('link_color', ['hover' => '#EB5838'])['hover'],
                'color-active'  => foliohub()->get_opt('link_color', ['active' => '#EB5838'])['active'],
            ],
            'gradient' => [
                'color-from' => foliohub()->get_opt('gradient_color', ['from' => '#00614B'])['from'],
                'color-to' => foliohub()->get_opt('gradient_color', ['to' => '#73A145'])['to'],
            ],
            'gradient_two' => [
                'color-from_two' => foliohub()->get_opt('gradient_color_two', ['from' => '#9E85FF'])['from'],
                'color-to_two' => foliohub()->get_opt('gradient_color_two', ['to' => '#2C1A74'])['to'],
            ],
        ];
        return $configs[$value];
    }
}
if(!function_exists('foliohub_inline_styles')) {
    function foliohub_inline_styles() {  

        $theme_colors      = foliohub_configs('theme_colors');
        $link_color        = foliohub_configs('link');
        $gradient_color        = foliohub_configs('gradient');
        $gradient_color_two        = foliohub_configs('gradient_two');
        ob_start();
        echo ':root{';

        foreach ($theme_colors as $color => $value) {
            printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
        }
        foreach ($theme_colors as $color => $value) {
            printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  foliohub_hex_rgb($value['value']));
        }
        foreach ($link_color as $color => $value) {
            printf('--link-%1$s: %2$s;', $color, $value);
        } 
        foreach ($gradient_color as $color => $value) {
            printf('--gradient-%1$s: %2$s;', $color, $value);
        } 
        foreach ($gradient_color_two as $color => $value) {
            printf('--gradient-two-%1$s: %2$s;', $color, $value);
        } 
        echo '}';

        return ob_get_clean();

    }
}
