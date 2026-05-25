<?php
add_action('after_setup_theme', 'foliohub_setup_option', 1);
function foliohub_setup_option(){
    if (!class_exists('ReduxFramework')) {
        return;
    }

    $opt_name = foliohub()->get_option_name();
    $version = foliohub()->get_version();

    $args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => '', //$theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $version,
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu', //class_exists('Pxltheme_Core') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'foliohub'),
    'page_title'           => esc_html__('Theme Options', 'foliohub'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => 80,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'pxlart', //class_exists('Foliohub_Admin_Page') ? 'case' : '',
    // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'pxlart-theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'foliohub'),
    'icon'   => 'el-icon-home',
    'fields' => array(
        array(
            'id'       => 'smooth_scroll',
            'type'     => 'button_set',
            'title'    => esc_html__('Smooth Scroll', 'foliohub'),
            'options'  => array(
                'on' => esc_html__('On', 'foliohub'),
                'off' => esc_html__('Off', 'foliohub'),
            ),
            'default'  => 'off',
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'foliohub'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields' => array(
        array(
            'id'          => 'body_color',
            'type'        => 'color',
            'title'       => esc_html__('Body Color', 'foliohub'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'foliohub'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'foliohub'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'third_color',
            'type'        => 'color',
            'title'       => esc_html__('Third Color', 'foliohub'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'four_color',
            'type'        => 'color',
            'title'       => esc_html__('Four Color', 'foliohub'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'       => 'body_bg_color',
            'type'     => 'color',
            'title'    => esc_html__('Body Background Color', 'foliohub'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'gradient_color',
            'type'        => 'color_gradient',
            'title'       => esc_html__('Gradient Color One', 'foliohub'),
            'transparent' => false,
            'default'  => array(
                'from' => '',
                'to'   => '', 
            ),
        ),
        array(
            'id'          => 'gradient_color_two',
            'type'        => 'color_gradient',
            'title'       => esc_html__('Gradient Color Two', 'foliohub'),
            'transparent' => false,
            'default'  => array(
                'from' => '',
                'to'   => '', 
            ),
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Favicon', 'foliohub'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__('Favicon', 'foliohub'),
            'default'  => '',
            'url'      => false
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Mouse', 'foliohub'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'mouse_move_animation',
            'type'     => 'switch',
            'title'    => esc_html__('Mouse Move Animation', 'foliohub'),
            'default'  => false
        ),
    )
));
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Search Popup', 'foliohub'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'logo_s_p',
            'type'     => 'media',
            'title'    => esc_html__('Logo Search Popup', 'foliohub'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/img/logo.png'
            ),
        ),
        array(
            'id'      => 'placeholder_search_pu',
            'type'    => 'text',
            'title'   => esc_html__('Placeholder', 'foliohub'),
            'default' => 'Type Your Search Words...',
        )
    )
));
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Loader', 'foliohub'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'site_loader',
            'type'     => 'switch',
            'title'    => esc_html__('Loader', 'foliohub'),
            'default'  => false
        ),
        array(
            'id'    => 'loader_style',
            'type'  => 'select',
            'title' => esc_html__('Loader Style', 'foliohub'),
            'options' => [
                'style-default'           => esc_html__('Default', 'foliohub'),
                'style-line'           => esc_html__('Line', 'foliohub'),
            ],
            'default' => 'style-default',
            'indent' => true,
            'required' => array( 0 => 'site_loader', 1 => 'equals', 2 => true ),
        ),
        array(
            'id'       => 'loader_logo',
            'type'     => 'media',
            'title'    => esc_html__('Logo', 'foliohub'),
            'url'      => false,
            'required' => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-default' ),
        ),
        array(
            'id'       => 'loader_logo_height',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Height', 'foliohub'),
            'width'    => false,
            'unit'     => 'px',
            'output'    => array('.pxl-loader .loader-logo img'),
            'required' => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-default' ),
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Cookie Policy', 'foliohub'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'cookie_policy',
            'type'     => 'button_set',
            'title'    => esc_html__('Cookie Policy', 'foliohub'),
            'options'  => array(
                'show' => esc_html__('Show', 'foliohub'),
                'hide' => esc_html__('Hide', 'foliohub'),
            ),
            'default'  => 'hide',
        ),
        array(
            'id'      => 'cookie_policy_description',
            'type'    => 'text',
            'title'   => esc_html__('Description', 'foliohub'),
            'default' => '',
            'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'          => 'cookie_policy_description_typo',
            'type'        => 'typography',
            'title'       => esc_html__('Description Font', 'foliohub'),
            'google'      => true,
            'font-backup' => false,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('.pxl-cookie-policy .pxl-item--description'),
            'units'       => 'px',
            'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'      => 'cookie_policy_btntext',
            'type'    => 'text',
            'title'   => esc_html__('Button Text', 'foliohub'),
            'default' => '',
            'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
        ),
        array(
            'id'    => 'cookie_policy_link',
            'type'  => 'select',
            'title' => esc_html__( 'Button Link', 'foliohub' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'cookie_policy', 1 => 'equals', 2 => 'show' ),
        ),
    )
));

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header', 'foliohub'),
    'icon'   => 'el el-indent-left',
    'fields' => array_merge(
        foliohub_header_opts([
            'prefix' => '',            
            'default' => true,          
            'default_value' => '',     
        ]),
        array(
            array(
                'id'       => 'sticky_scroll',
                'type'     => 'button_set',
                'title'    => esc_html__('Sticky Scroll', 'foliohub'),
                'options'  => array(
                    'pxl-sticky-stt' => esc_html__('Scroll To Top', 'foliohub'),
                    'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'foliohub'),
                ),
                'default'  => 'pxl-sticky-stb',
            ),
            array(
                'id'       => 'logo_s',
                'type'     => 'media',
                'title'    => esc_html__('Logo Search Popup', 'foliohub'),
                'default' => array(
                    'url'=>get_template_directory_uri().'/assets/img/logo.png'
                ),
                'url'      => false,
                'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
            ),
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Mobile', 'foliohub'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array_merge(
        foliohub_header_mobile_opts(),
        array(
            array(
                'id'       => 'mobile_display',
                'type'     => 'button_set',
                'title'    => esc_html__('Display', 'foliohub'),
                'options'  => array(
                    'show'  => esc_html__('Show', 'foliohub'),
                    'hide'  => esc_html__('Hide', 'foliohub'),
                ),
                'default'  => 'show'
            ),
            array(
                'id'       => 'pm_menu',
                'type'     => 'select',
                'title'    => esc_html__( 'Select Menu Mobile', 'foliohub' ),
                'options'  => foliohub_get_nav_menu_slug(),
                'default' => '-1',
            ),
            array(
                'id'       => 'opt_mobile_style',
                'type'     => 'button_set',
                'title'    => esc_html__('Style', 'foliohub'),
                'options'  => array(
                    'light'  => esc_html__('Light', 'foliohub'),
                    'dark'  => esc_html__('Dark', 'foliohub'),
                ),
                'default'  => 'light',
                'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
            ),
            array(
                'id'       => 'logo_m',
                'type'     => 'media',
                'title'    => esc_html__('Logo', 'foliohub'),
                'default' => array(
                    'url'=>get_template_directory_uri().'/assets/img/logo.png'
                ),
                'url'      => false,
                'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
            ),
            array(
                'id'       => 'logo_height',
                'type'     => 'dimensions',
                'title'    => esc_html__('Logo Height', 'foliohub'),
                'width'    => false,
                'unit'     => 'px',
                'output'    => array('#pxl-header-default .pxl-header-branding img, #pxl-header-default #pxl-header-mobile .pxl-header-branding img, #pxl-header-elementor #pxl-header-mobile .pxl-header-branding img, .pxl-logo-mobile img'),
                'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
            ),
            array(
                'id'       => 'search_mobile',
                'type'     => 'switch',
                'title'    => esc_html__('Search Form', 'foliohub'),
                'default'  => true,
                'required' => array( 0 => 'mobile_display', 1 => 'equals', 2 => 'show' ),
            ),
            array(
                'id'      => 'search_placeholder_mobile',
                'type'    => 'text',
                'title'   => esc_html__('Search Text Placeholder', 'foliohub'),
                'default' => '',
                'subtitle' => esc_html__('Default: Search...', 'foliohub'),
                'required' => array( 0 => 'search_mobile', 1 => 'equals', 2 => true ),
            )
        )
    )
));

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'foliohub'),
    'icon'   => 'el-icon-map-marker',
    'fields' => array_merge(
        foliohub_page_title_opts(),
        array(
            array(
                'id'       => 'ptitle_scroll_opacity',
                'title'    => esc_html__('Scroll Opacity', 'foliohub'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'ptitle_breadcrumb_on',
                'title'    => esc_html__('Show Breadcrumb', 'foliohub'),
                'type'     => 'switch',
                'default'  => true,
            ),
        )
    )
));


/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'foliohub'),
    'icon'   => 'el el-website',
    'fields' => array_merge(
        foliohub_footer_opts(),
        array(
            array(
                'id'       => 'back_totop_on',
                'type'     => 'switch',
                'title'    => esc_html__('Button Back to Top', 'foliohub'),
                'default'  => false,
            ),
            array(
                'id'       => 'footer_fixed',
                'type'     => 'button_set',
                'title'    => esc_html__('Footer Fixed', 'foliohub'),
                'options'  => array(
                    'on' => esc_html__('On', 'foliohub'),
                    'off' => esc_html__('Off', 'foliohub'),
                ),
                'default'  => 'off',
            ),
        ) 
    )
    
));

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog', 'foliohub'),
    'icon'  => 'el-icon-pencil',
    'fields'     => array(
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog Archive', 'foliohub'),
    'icon'  => 'el-icon-pencil',
    'subsection' => true,
    'fields'     => array_merge(
        foliohub_sidebar_pos_opts([ 'prefix' => 'blog_']),
        array(
            array(
                'id'       => 'archive_date',
                'title'    => esc_html__('Date', 'foliohub'),
                'subtitle' => esc_html__('Display the Date for each blog post.', 'foliohub'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'post_category_list_on',
                'title'    => esc_html__('Categorie List', 'foliohub'),
                'subtitle' => esc_html__('Display the Categorie List for each blog post.', 'foliohub'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'archive_social',
                'title'    => esc_html__('Social', 'foliohub'),
                'subtitle' => esc_html__('Display the Social for each blog post.', 'foliohub'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_author',
                'title'    => esc_html__('Author', 'foliohub'),
                'subtitle' => esc_html__('Display the Author for each blog post.', 'foliohub'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_category',
                'title'    => esc_html__('Categorie', 'foliohub'),
                'subtitle' => esc_html__('Display the Categorie for each blog post.', 'foliohub'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_comment',
                'title'    => esc_html__('Comment', 'foliohub'),
                'subtitle' => esc_html__('Display the Comment for each blog post.', 'foliohub'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'      => 'featured_img_size',
                'type'    => 'text',
                'title'   => esc_html__('Featured Image Size', 'foliohub'),
                'default' => '',
                'subtitle' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
            ),
            array(
                'id'      => 'archive_excerpt_length',
                'type'    => 'text',
                'title'   => esc_html__('Excerpt Length', 'foliohub'),
                'default' => '',
                'subtitle' => esc_html__('Default: 50', 'foliohub'),
            ),
            array(
                'id'      => 'archive_readmore_text',
                'type'    => 'text',
                'title'   => esc_html__('Read More Text', 'foliohub'),
                'default' => '',
                'subtitle' => esc_html__('Default: Read more', 'foliohub'),
            ),
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'foliohub'),
    'icon'       => 'el el-circle-arrow-right',
    'subsection' => true,
    'fields'     => array_merge(
        foliohub_sidebar_pos_opts([ 'prefix' => 'post_']),
        array(
            
            array(
                'id'       => 'feature_image_display',
                'type'     => 'button_set',
                'title'    => esc_html__('Feature Image', 'foliohub'),
                'subtitle' => esc_html__('Display Feature Image', 'foliohub'),
                'options'  => array(
                    'hide' => esc_html__('Hide', 'foliohub'),
                    'show' => esc_html__('Show', 'foliohub'),
                ),
                'default'  => 'hide',
            ),
            array(
                'id'       => 'sg_post_title',
                'type'     => 'button_set',
                'title'    => esc_html__('Page Title Type', 'foliohub'),
                'options'  => array(
                    'default' => esc_html__('Default', 'foliohub'),
                    'custom_text' => esc_html__('Custom Text', 'foliohub'),
                ),
                'default'  => 'default',
            ),
            array(
                'id'      => 'sg_post_title_text',
                'type'    => 'text',
                'title'   => esc_html__('Page Title Text', 'foliohub'),
                'default' => 'Blog Details',
                'required' => array( 0 => 'sg_post_title', 1 => 'equals', 2 => 'custom_text' ),
            ),
            array(
                'id'      => 'sg_featured_img_size',
                'type'    => 'text',
                'title'   => esc_html__('Featured Image Size', 'foliohub'),
                'default' => '',
                'subtitle' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
            ),
            array(
                'id'       => 'post_title_on',
                'title'    => esc_html__('Title', 'foliohub'),
                'subtitle' => esc_html__('Display the Title for blog post.', 'foliohub'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_date',
                'title'    => esc_html__('Date', 'foliohub'),
                'subtitle' => esc_html__('Display the Date for blog post.', 'foliohub'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_author',
                'title'    => esc_html__('Author', 'foliohub'),
                'subtitle' => esc_html__('Display the Author for blog post.', 'foliohub'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_author_info',
                'title'    => esc_html__('Author Info', 'foliohub'),
                'subtitle' => esc_html__('Display the Author info for blog post.', 'foliohub'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'post_navigation',
                'title'    => esc_html__('Navigation', 'foliohub'),
                'subtitle' => esc_html__('Display Navigation for blog post.', 'foliohub'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_tag_on',
                'title'    => esc_html__('Tags', 'foliohub'),
                'subtitle' => esc_html__('Display the Tags for blog post.', 'foliohub'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_tag',
                'title'    => esc_html__('Tags', 'foliohub'),
                'subtitle' => esc_html__('Display the Tag for blog post.', 'foliohub'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_related_on',
                'title'    => esc_html__('Related Post', 'foliohub'),
                'subtitle' => esc_html__('Display the related post for blog post.', 'foliohub'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_header_meta_on',
                'title'    => esc_html__('Show Post Header Meta', 'foliohub'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'title' => esc_html__('Social', 'foliohub'),
                'type'  => 'section',
                'id' => 'social_section',
                'indent' => true,
            ),
            array(
                'id'       => 'post_social_share',
                'title'    => esc_html__('Social', 'foliohub'),
                'subtitle' => esc_html__('Display the Social Share for blog post.', 'foliohub'),
                'type'     => 'switch',
                'default'  => false,
            ),
            array(
                'id'       => 'social_facebook',
                'title'    => esc_html__('Facebook', 'foliohub'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_twitter',
                'title'    => esc_html__('Twitter', 'foliohub'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_pinterest',
                'title'    => esc_html__('Pinterest', 'foliohub'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_linkedin',
                'title'    => esc_html__('LinkedIn', 'foliohub'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
        )
)
));

/*--------------------------------------------------------------
# Shop
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Shop', 'foliohub'),
        'icon'   => 'el el-shopping-cart',
        'fields'     => array_merge(
            array(
            )
        )
    ));

    Redux::setSection($opt_name, array(
        'title' => esc_html__('Product Archive', 'foliohub'),
        'icon'  => 'el-icon-pencil',
        'subsection' => true,
        'fields'     => array_merge(
            foliohub_sidebar_pos_opts([ 'prefix' => 'shop_']),
            array(
                array(
                    'id'      => 'shop_featured_img_size',
                    'type'    => 'text',
                    'title'   => esc_html__('Featured Image Size', 'foliohub'),
                    'default' => '',
                    'subtitle' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                ),
                array(
                    'title'         => esc_html__('Products displayed per row', 'foliohub'),
                    'id'            => 'products_columns',
                    'type'          => 'slider',
                    'subtitle'      => esc_html__('Number product to show per row', 'foliohub'),
                    'default'       => 4,
                    'min'           => 2,
                    'step'          => 1,
                    'max'           => 5,
                    'display_value' => 'text',
                ),
                array(
                    'title'         => esc_html__('Products displayed per page', 'foliohub'),
                    'id'            => 'product_per_page',
                    'type'          => 'slider',
                    'subtitle'      => esc_html__('Number product to show', 'foliohub'),
                    'default'       => 12,
                    'min'           => 3,
                    'step'          => 1,
                    'max'           => 50,
                    'display_value' => 'text'
                ),
                array(
                    'id'       => 'cart_payment_methods_text',
                    'type'     => 'text',
                    'title'    => esc_html__('Payment Methods Text', 'foliohub'),
                    'default' => 'Accept Payment Methods',
                ), 
                array(
                    'id'       => 'cart_payment_methods_logo',
                    'type'     => 'media',
                    'title'    => esc_html__('Payment Methods Logo', 'foliohub'),
                    'default' => array(
                        'url'=>''
                    ),
                ), 
            )
        )
    ));

    Redux::setSection($opt_name, array(
        'title' => esc_html__('Single Product', 'foliohub'),
        'icon'  => 'el-icon-pencil',
        'subsection' => true,
        'fields'     => array_merge(
            array(
                array(
                    'id'       => 'single_img_size',
                    'type'     => 'dimensions',
                    'title'    => esc_html__('Image Size', 'foliohub'),
                    'unit'     => 'px',
                ),
                array(
                    'id'       => 'sg_product_ptitle',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Page Title Type', 'foliohub'),
                    'options'  => array(
                        'default' => esc_html__('Default', 'foliohub'),
                        'custom_text' => esc_html__('Custom Text', 'foliohub'),
                    ),
                    'default'  => 'default',
                ),
                array(
                    'id'      => 'sg_product_ptitle_text',
                    'type'    => 'text',
                    'title'   => esc_html__('Page Title Text', 'foliohub'),
                    'default' => 'Shop Details',
                    'required' => array( 0 => 'sg_product_ptitle', 1 => 'equals', 2 => 'custom_text' ),
                ),
                array(
                    'id'       => 'product_title',
                    'type'     => 'switch',
                    'title'    => esc_html__('Product Title', 'foliohub'),
                    'default'  => false
                ),
                array(
                    'id'       => 'product_social_share',
                    'type'     => 'switch',
                    'title'    => esc_html__('Social Share', 'foliohub'),
                    'default'  => false
                ),
                array(
                    'id'       => 'single_testi_text',
                    'type'     => 'textarea',
                    'title'    => esc_html__('Testimonial Methods Text', 'foliohub'),
                    'default' => 'Accept Testimonial Methods',
                ), 
                array(
                    'id'       => 'single_testi_title',
                    'type'     => 'text',
                    'title'    => esc_html__('Testimonial Methods Title', 'foliohub'),
                ), 
                array(
                    'id'       => 'single_testi_position',
                    'type'     => 'text',
                    'title'    => esc_html__('Testimonial Methods Position', 'foliohub'),
                ), 
                array(
                    'id'       => 'single_testi_logo',
                    'type'     => 'media',
                    'title'    => esc_html__('Testimonial Methods Logo', 'foliohub'),
                    'default' => array(
                        'url'=>''
                    ),
                ), 
                array(
                    'id'       => 'single_testi_flag',
                    'type'     => 'media',
                    'title'    => esc_html__('Testimonial Methods Flag', 'foliohub'),
                    'default' => array(
                        'url'=>''
                    ),
                ), 
            )
        )
    ));
}


/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'foliohub'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'       => 'pxl_body_typography',
            'type'     => 'select',
            'title'    => esc_html__('Body Font Type', 'foliohub'),
            'options'  => array(
                'default-font'  => esc_html__('Default Font', 'foliohub'),
                'google-font'  => esc_html__('Google Font', 'foliohub'),
            ),
            'default'  => 'default-font',
        ),

        array(
            'id'          => 'font_body',
            'type'        => 'typography',
            'title'       => esc_html__('Body Google Font', 'foliohub'),
            'google'      => true,
            'font-backup' => false,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'output'      => array('body'),
            'units'       => 'px',
            'required' => array( 0 => 'pxl_body_typography', 1 => 'equals', 2 => 'google-font' ),
            'force_output' => true
        ),

        array(
            'id'       => 'pxl_heading_typography',
            'type'     => 'select',
            'title'    => esc_html__('Heading Font Type', 'foliohub'),
            'options'  => array(
                'default-font'  => esc_html__('Default Font', 'foliohub'),
                'google-font'  => esc_html__('Google Font', 'foliohub'),
            ),
            'default'  => 'default-font',
        ),
        
        array(
            'id'          => 'font_heading',
            'type'        => 'typography',
            'title'       => esc_html__('Heading Google Font', 'foliohub'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'line-height'  => false,
            'font-size'  => false,
            'font-backup'  => false,
            'font-style'  => false,
            'output'      => array('h1,h2,h3,h4,h5,h6,.ft-theme-default-default'),
            'units'       => 'px',
            'required' => array( 0 => 'pxl_heading_typography', 1 => 'equals', 2 => 'google-font' ),
            'force_output' => true
        ),

        array(
            'id'          => 'theme_default',
            'type'        => 'typography',
            'title'       => esc_html__('Theme Default', 'foliohub'),
            'google'      => true,
            'font-backup' => false,
            'all_styles'  => false,
            'line-height'  => false,
            'font-size'  => false,
            'color'  => false,
            'font-style'  => false,
            'font-weight'  => false,
            'text-align'  => false,
            'units'       => 'px',
            'required' => array( 0 => 'pxl_heading_typography', 1 => 'equals', 2 => 'google-font' ),
            'force_output' => true
        ),

    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Extra Post Type', 'foliohub'),
    'icon'       => 'el el-briefcase',
    'fields'     => array(

        array(
            'title' => esc_html__('Portfolio', 'foliohub'),
            'type'  => 'section',
            'id' => 'post_portfolio',
            'indent' => true,
        ),
        array(
            'id'      => 'link_grid',
            'type'    => 'text',
            'title'   => esc_html__('Grid Page Link At A Project Page', 'foliohub'),
        ),
        array(
            'id'       => 'portfolio_display',
            'type'     => 'switch',
            'title'    => esc_html__('Portfolio', 'foliohub'),
            'default'  => true
        ),
        array(
            'id'       => 'sg_portfolio_title',
            'type'     => 'button_set',
            'title'    => esc_html__('Page Title Type', 'foliohub'),
            'options'  => array(
                'default' => esc_html__('Default', 'foliohub'),
                'custom_text' => esc_html__('Custom Text', 'foliohub'),
            ),
            'default'  => 'default',
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'      => 'sg_portfolio_title_text',
            'type'    => 'text',
            'title'   => esc_html__('Page Title Text', 'foliohub'),
            'default' => 'Single Portfolio',
            'required' => array( 0 => 'sg_portfolio_title', 1 => 'equals', 2 => 'custom_text' ),
        ),
        array(
            'id'      => 'portfolio_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Slug', 'foliohub'),
            'default' => '',
            'desc'     => 'Default: portfolio',
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'      => 'portfolio_name',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Name', 'foliohub'),
            'default' => '',
            'desc'     => 'Default: Portfolio',
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),

        array(
            'id'      => 'portfolio_categorie_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Categorie Slug', 'foliohub'),
            'default' => '',
            'desc'     => 'Default: Portfolio',
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),

        array(
            'id'      => 'portfolio_categorie_name',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Categorie Name', 'foliohub'),
            'default' => '',
            'desc'     => 'Default: Portfolio',
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),

        array(
            'id'    => 'archive_portfolio_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'foliohub' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'portfolio_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'title' => esc_html__('Service', 'foliohub'),
            'type'  => 'section',
            'id' => 'post_service',
            'indent' => true,
        ),
        array(
            'id'       => 'service_display',
            'type'     => 'switch',
            'title'    => esc_html__('Service', 'foliohub'),
            'default'  => true
        ),
        array(
            'id'       => 'sg_service_title',
            'type'     => 'button_set',
            'title'    => esc_html__('Page Title Type', 'foliohub'),
            'options'  => array(
                'default' => esc_html__('Default', 'foliohub'),
                'custom_text' => esc_html__('Custom Text', 'foliohub'),
            ),
            'default'  => 'default',
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'      => 'sg_service_title_text',
            'type'    => 'text',
            'title'   => esc_html__('Page Title Text', 'foliohub'),
            'default' => 'Single Service',
            'required' => array( 0 => 'sg_service_title', 1 => 'equals', 2 => 'custom_text' ),
        ),
        array(
            'id'      => 'service_slug',
            'type'    => 'text',
            'title'   => esc_html__('Service Slug', 'foliohub'),
            'default' => '',
            'desc'     => 'Default: service',
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'      => 'service_name',
            'type'    => 'text',
            'title'   => esc_html__('Service Name', 'foliohub'),
            'default' => '',
            'desc'     => 'Default: Services',
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'    => 'archive_service_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'foliohub' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'service_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'title' => esc_html__('Industries', 'foliohub'),
            'type'  => 'section',
            'id' => 'post_industries',
            'indent' => true,
        ),
        array(
            'id'       => 'industries_display',
            'type'     => 'switch',
            'title'    => esc_html__('Industries', 'foliohub'),
            'default'  => true
        ),
        array(
            'id'       => 'sg_industries_title',
            'type'     => 'button_set',
            'title'    => esc_html__('Page Title Type', 'foliohub'),
            'options'  => array(
                'default' => esc_html__('Default', 'foliohub'),
                'custom_text' => esc_html__('Custom Text', 'foliohub'),
            ),
            'default'  => 'default',
            'required' => array( 0 => 'industries_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'      => 'sg_industries_title_text',
            'type'    => 'text',
            'title'   => esc_html__('Page Title Text', 'foliohub'),
            'default' => 'Single Industries',
            'required' => array( 0 => 'sg_industries_title', 1 => 'equals', 2 => 'custom_text' ),
        ),
        array(
            'id'      => 'industries_slug',
            'type'    => 'text',
            'title'   => esc_html__('Industries Slug', 'foliohub'),
            'default' => '',
            'desc'     => 'Default: industries',
            'required' => array( 0 => 'industries_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'      => 'industries_name',
            'type'    => 'text',
            'title'   => esc_html__('Industries Name', 'foliohub'),
            'default' => '',
            'desc'     => 'Default: Industriess',
            'required' => array( 0 => 'industries_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
        array(
            'id'      => 'industries_categorie_slug',
            'type'    => 'text',
            'title'   => esc_html__('Industries Categorie Slug', 'foliohub'),
            'default' => '',
            'desc'     => 'Default: Industries',
            'required' => array( 0 => 'industries_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),

        array(
            'id'      => 'industries_categorie_name',
            'type'    => 'text',
            'title'   => esc_html__('Industries Categorie Name', 'foliohub'),
            'default' => '',
            'desc'     => 'Default: Industries',
            'required' => array( 0 => 'industries_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),

        array(
            'id'    => 'archive_industries_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'foliohub' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'industries_display', 1 => 'equals', 2 => 'true' ),
            'force_output' => true
        ),
    )
));
Redux::setSection($opt_name, array(
    'title'      => esc_html__('404 Page', 'foliohub'),
    'icon'       => 'el el-error',
    'fields'     => array_merge(
        foliohub_header_opts(['prefix' => '404_']),
        array(
            array(
                'id'       => 'img_404',
                'type'     => 'media',
                'title'    => esc_html__('Image 404', 'foliohub'),
                'default' => array(
                    'url'=>get_template_directory_uri().'/assets/img/404-image.webp'
                ),
            ),
            array(
                'id'      => 'title_404',
                'type'    => 'text',
                'title'   => esc_html__('Title', 'foliohub'),
            ),
            array(
                'id'      => 'des_404',
                'type'    => 'text',
                'title'   => esc_html__('Description', 'foliohub'),
            ),
            array(
                'id'      => 'button_404',
                'type'    => 'text',
                'title'   => esc_html__('Button Text', 'foliohub'),
            ),
        )
    )
));
}