<?php

add_action('pxl_post_metabox_register', 'foliohub_page_options_register');
function foliohub_page_options_register($metabox)
{

	$panels = [
		'post' => [
			'opt_name' => 'post_option',
			'display_name' => esc_html__('Post Settings', 'foliohub'),
			'show_options_object' => false,
			'context' => 'advanced',
			'priority' => 'default',
			'sections' => [
				'post_settings' => [
					'title' => esc_html__('Post Settings', 'foliohub'),
					'icon' => 'el el-refresh',
					'fields' => array_merge(
						foliohub_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']),
						foliohub_page_title_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						array(
							array(
								'id' => 'custom_main_title',
								'type' => 'text',
								'title' => esc_html__('Custom Main Title', 'foliohub'),
								'subtitle' => esc_html__('Custom heading text title', 'foliohub'),
								'required' => array('pt_mode', '!=', 'none')
							),

						),
					)
				],
				'colors' => [
					'title' => esc_html__('Colors', 'foliohub'),
					'icon' => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id' => 'body_bg_color',
								'type' => 'color',
								'title' => esc_html__('Body Background Color', 'foliohub'),
								'transparent' => false,
								'default' => ''
							),
							array(
								'id' => 'primary_color',
								'type' => 'color',
								'title' => esc_html__('Primary Color', 'foliohub'),
								'transparent' => false,
								'default' => ''
							),
							array(
								'id' => 'third_color',
								'type' => 'color',
								'title' => esc_html__('Third Color', 'foliohub'),
								'transparent' => false,
								'default' => ''
							),
							array(
								'id' => 'four_color',
								'type' => 'color',
								'title' => esc_html__('Four Color', 'foliohub'),
								'transparent' => false,
								'default' => ''
							),
							array(
								'id' => 'gradient_color',
								'type' => 'color_gradient',
								'title' => esc_html__('Gradient Color One', 'foliohub'),
								'transparent' => false,
								'default' => array(
									'from' => '',
									'to' => '',
								),
							),
							array(
								'id' => 'gradient_color_two',
								'type' => 'color_gradient',
								'title' => esc_html__('Gradient Color Two', 'foliohub'),
								'transparent' => false,
								'default' => array(
									'from' => '',
									'to' => '',
								),
							)
						)
					)
				],
			]
		],
		'page' => [
			'opt_name' => 'pxl_page_options',
			'display_name' => esc_html__('Page Options', 'foliohub'),
			'show_options_object' => false,
			'context' => 'advanced',
			'priority' => 'default',
			'sections' => [
				
				'header' => [
					'title' => esc_html__('Header', 'foliohub'),
					'icon' => 'el-icon-website',
					'fields' => array_merge(
						foliohub_header_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						foliohub_header_mobile_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						array(
							array(
								'id' => 'header_display',
								'type' => 'button_set',
								'title' => esc_html__('Header Display', 'foliohub'),
								'options' => array(
									'show' => esc_html__('Show', 'foliohub'),
									'hide' => esc_html__('Hide', 'foliohub'),
								),
								'default' => 'show',
							),
							array(
								'id' => 'p_menu',
								'type' => 'select',
								'title' => esc_html__('Menu', 'foliohub'),
								'options' => foliohub_get_nav_menu_slug(),
								'default' => '',
							),
							array(
								'id' => 'smooth_scroll_button',
								'type' => 'button_set',
								'title' => esc_html__('Get Smooth Scroll', 'foliohub'),
								'options' => array(
									'on' => esc_html__('On', 'foliohub'),
									'off' => esc_html__('Off', 'foliohub'),
								),
								'default' => 'off',
							),
							array(
								'id' => 'smooth_scroll',
								'type' => 'button_set',
								'title' => esc_html__('Smooth Scroll', 'foliohub'),
								'options' => array(
									'on' => esc_html__('On', 'foliohub'),
									'off' => esc_html__('Off', 'foliohub'),
								),
								'default' => 'off',
								'required' => array(
									array(
										'smooth_scroll_button','=','on'
									)
								)
							),
						),
						array(
							array(
								'id' => 'sticky_scroll',
								'type' => 'button_set',
								'title' => esc_html__('Sticky Scroll', 'foliohub'),
								'options' => array(
									'-1' => esc_html__('Inherit', 'foliohub'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'foliohub'),
									'pxl-sticky-stb' => esc_html__('Scroll To Bottom', 'foliohub'),
								),
								'default' => '-1',
							),
						)
					)

				],
				'page_title' => [
					'title' => esc_html__('Page Title', 'foliohub'),
					'icon' => 'el el-indent-left',
					'fields' => array_merge(
						foliohub_page_title_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						array(
							array(
								'id' => 'custom_main_title',
								'type' => 'text',
								'title' => esc_html__('Custom Main Title', 'foliohub'),
								'subtitle' => esc_html__('Custom heading text title', 'foliohub'),
								'required' => array('pt_mode', '!=', 'none')
							),

						),
					)
				],
				'content' => [
					'title' => esc_html__('Content', 'foliohub'),
					'icon' => 'el-icon-pencil',
					'fields' => array_merge(
						foliohub_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id' => 'content_spacing',
								'type' => 'spacing',
								'output' => array('#pxl-wapper #pxl-main'),
								'right' => false,
								'left' => false,
								'mode' => 'padding',
								'units' => array('px'),
								'units_extended' => 'false',
								'title' => esc_html__('Spacing Top/Bottom', 'foliohub'),
								'default' => array(
									'padding-top' => '',
									'padding-bottom' => '',
									'units' => 'px',
								)
							),
						)
					)
				],
				'footer' => [
					'title' => esc_html__('Footer', 'foliohub'),
					'icon' => 'el el-website',
					'fields' => array_merge(
						foliohub_footer_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						array(
							array(
								'id' => 'footer_display',
								'type' => 'button_set',
								'title' => esc_html__('Footer Display', 'foliohub'),
								'options' => array(
									'show' => esc_html__('Show', 'foliohub'),
									'hide' => esc_html__('Hide', 'foliohub'),
								),
								'default' => 'show',
							),
							array(
								'id' => 'p_footer_fixed',
								'type' => 'button_set',
								'title' => esc_html__('Footer Fixed', 'foliohub'),
								'options' => array(
									'inherit' => esc_html__('Inherit', 'foliohub'),
									'on' => esc_html__('On', 'foliohub'),
									'off' => esc_html__('Off', 'foliohub'),
								),
								'default' => 'inherit',
							),
							array(
								'id' => 'body_bg_color_ct',
								'type' => 'background',
								'title' => esc_html__('Body Background Color Custom', 'foliohub'),
								'transparent' => false,
								'output' => [
									'.pxl-footer-fixed #pxl-main',
								],
								'required' => array(0 => 'p_footer_fixed', 1 => 'equals', 2 => 'on'),
								'url' => false
							),
							array(
								'id' => 'back_top_top_style',
								'type' => 'button_set',
								'title' => esc_html__('Back to Top Style', 'foliohub'),
								'options' => array(
									'style-default' => esc_html__('Default', 'foliohub'),
									'style-round' => esc_html__('Round', 'foliohub'),
								),
								'default' => 'style-default',
							),
							array(
								'id' => 'back_top_top_hide',
								'type' => 'button_set',
								'title' => esc_html__('Back To Top Hide On Footer', 'foliohub'),
								'options' => array(
									'' => esc_html__('Off', 'foliohub'),
									'style-hide-ft' => esc_html__('On', 'foliohub'),
								),
								'default' => '',
							),
						)
					)
				],
				'colors' => [
					'title' => esc_html__('Colors', 'foliohub'),
					'icon' => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id' => 'body_bg_color',
								'type' => 'color',
								'title' => esc_html__('Body Background Color', 'foliohub'),
								'transparent' => false,
								'default' => ''
							),
							array(
								'id' => 'primary_color',
								'type' => 'color',
								'title' => esc_html__('Primary Color', 'foliohub'),
								'transparent' => false,
								'default' => ''
							),
							array(
								'id' => 'third_color',
								'type' => 'color',
								'title' => esc_html__('Third Color', 'foliohub'),
								'transparent' => false,
								'default' => ''
							),
							array(
								'id' => 'four_color',
								'type' => 'color',
								'title' => esc_html__('Four Color', 'foliohub'),
								'transparent' => false,
								'default' => ''
							),
							array(
								'id' => 'gradient_color',
								'type' => 'color_gradient',
								'title' => esc_html__('Gradient Color One', 'foliohub'),
								'transparent' => false,
								'default' => array(
									'from' => '',
									'to' => '',
								),
							),
							array(
								'id' => 'gradient_color_two',
								'type' => 'color_gradient',
								'title' => esc_html__('Gradient Color Two', 'foliohub'),
								'transparent' => false,
								'default' => array(
									'from' => '',
									'to' => '',
								),
							)
						)
					)
				],
				'extra' => [
					'title' => esc_html__('Extra', 'foliohub'),
					'icon' => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id' => 'body_custom_class',
								'type' => 'text',
								'title' => esc_html__('Body Custom Class', 'foliohub'),
							),
						)
					)
				]
			]
		],
		'portfolio' => [
			'opt_name' => 'pxl_portfolio_options',
			'display_name' => esc_html__('Portfolio Options', 'foliohub'),
			'show_options_object' => false,
			'context' => 'advanced',
			'priority' => 'default',
			'sections' => [
				'header1' => [
					'title' => esc_html__('Header', 'foliohub'),
					'icon' => 'el-icon-website',
					'fields' => array_merge(
						foliohub_header_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						foliohub_header_mobile_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						array(
							array(
								'id' => 'header_display',
								'type' => 'button_set',
								'title' => esc_html__('Header Display', 'foliohub'),
								'options' => array(
									'show' => esc_html__('Show', 'foliohub'),
									'hide' => esc_html__('Hide', 'foliohub'),
								),
								'default' => 'show',
							),
							array(
								'id' => 'p_menu',
								'type' => 'select',
								'title' => esc_html__('Menu', 'foliohub'),
								'options' => foliohub_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id' => 'sticky_scroll',
								'type' => 'button_set',
								'title' => esc_html__('Sticky Scroll', 'foliohub'),
								'options' => array(
									'-1' => esc_html__('Inherit', 'foliohub'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'foliohub'),
									'pxl-sticky-stb' => esc_html__('Scroll To Bottom', 'foliohub'),
								),
								'default' => '-1',
							),
						)
					)

				],
				'colors' => [
					'title' => esc_html__('Colors', 'foliohub'),
					'icon' => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id' => 'body_bg_color',
								'type' => 'color',
								'title' => esc_html__('Body Background Color', 'foliohub'),
								'transparent' => false,
								'default' => ''
							),
							array(
								'id' => 'primary_color',
								'type' => 'color',
								'title' => esc_html__('Primary Color', 'foliohub'),
								'transparent' => false,
								'default' => ''
							),
							array(
								'id' => 'third_color',
								'type' => 'color',
								'title' => esc_html__('Third Color', 'foliohub'),
								'transparent' => false,
								'default' => ''
							),
							array(
								'id' => 'four_color',
								'type' => 'color',
								'title' => esc_html__('Four Color', 'foliohub'),
								'transparent' => false,
								'default' => ''
							),
							array(
								'id' => 'gradient_color',
								'type' => 'color_gradient',
								'title' => esc_html__('Gradient Color One', 'foliohub'),
								'transparent' => false,
								'default' => array(
									'from' => '',
									'to' => '',
								),
							),
							array(
								'id' => 'gradient_color_two',
								'type' => 'color_gradient',
								'title' => esc_html__('Gradient Color Two', 'foliohub'),
								'transparent' => false,
								'default' => array(
									'from' => '',
									'to' => '',
								),
							)
						)
					)
				],
				'page_title' => [
					'title' => esc_html__('Page Title', 'foliohub'),
					'icon' => 'el el-indent-left',
					'fields' => array_merge(
						foliohub_page_title_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						array(
							array(
								'id' => 'custom_main_title',
								'type' => 'text',
								'title' => esc_html__('Custom Main Title', 'foliohub'),
								'subtitle' => esc_html__('Custom heading text title', 'foliohub'),
								'required' => array('pt_mode', '!=', 'none')
							),

						),
					)
				],
				'content' => [
					'title' => esc_html__('Content', 'foliohub'),
					'icon' => 'el-icon-pencil',
					'fields' => array_merge(
						foliohub_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id' => 'content_spacing',
								'type' => 'spacing',
								'output' => array('#pxl-wapper #pxl-main'),
								'right' => false,
								'left' => false,
								'mode' => 'padding',
								'units' => array('px'),
								'units_extended' => 'false',
								'title' => esc_html__('Spacing Top/Bottom', 'foliohub'),
								'default' => array(
									'padding-top' => '',
									'padding-bottom' => '',
									'units' => 'px',
								)
							),
							array(
								'id' => 'project_icon_type',
								'type' => 'button_set',
								'title' => esc_html__('Icon Type', 'foliohub'),
								'options' => array(
									'icon' => esc_html__('Icon', 'foliohub'),
									'image' => esc_html__('Image', 'foliohub'),
								),
								'default' => 'icon'
							),
							array(
								'id' => 'project_icon_font',
								'type' => 'pxl_iconpicker',
								'title' => esc_html__('Icon', 'foliohub'),
								'required' => array(0 => 'project_icon_type', 1 => 'equals', 2 => 'icon'),
								'force_output' => true
							),
							array(
								'id' => 'project_icon_img',
								'type' => 'media',
								'title' => esc_html__('Icon Image', 'foliohub'),
								'default' => '',
								'required' => array(0 => 'project_icon_type', 1 => 'equals', 2 => 'image'),
								'force_output' => true
							),
							array(
								'id' => 'tag_project',
								'type' => 'multi_text',
								'title' => ('Tag'),
								'title' => esc_html('Tag', 'foliohub'),
							),
						)
					)
				],
				'footer' => [
					'title' => esc_html__('Footer', 'foliohub'),
					'icon' => 'el el-website',
					'fields' => array_merge(
						foliohub_footer_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						array(
							array(
								'id' => 'footer_display',
								'type' => 'button_set',
								'title' => esc_html__('Footer Display', 'foliohub'),
								'options' => array(
									'show' => esc_html__('Show', 'foliohub'),
									'hide' => esc_html__('Hide', 'foliohub'),
								),
								'default' => 'show',
							),
							array(
								'id' => 'p_footer_fixed',
								'type' => 'button_set',
								'title' => esc_html__('Footer Fixed', 'foliohub'),
								'options' => array(
									'inherit' => esc_html__('Inherit', 'foliohub'),
									'on' => esc_html__('On', 'foliohub'),
									'off' => esc_html__('Off', 'foliohub'),
								),
								'default' => 'inherit',
							),
							array(
								'id' => 'back_top_top_style',
								'type' => 'button_set',
								'title' => esc_html__('Back to Top Style', 'foliohub'),
								'options' => array(
									'style-default' => esc_html__('Default', 'foliohub'),
									'style-round' => esc_html__('Round', 'foliohub'),
								),
								'default' => 'style-default',
							),
						)
					)
				],
			]
		],
		'product' => [
			'opt_name' => 'pxl_product_options',
			'display_name' => esc_html__('Product Options', 'foliohub'),
			'show_options_object' => false,
			'context' => 'advanced',
			'priority' => 'default',
			'sections' => [
				'header1' => [
					'title' => esc_html__('Header', 'foliohub'),
					'icon' => 'el-icon-website',
					'fields' => array_merge(
						foliohub_header_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						foliohub_header_mobile_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						array(
							array(
								'id' => 'header_display',
								'type' => 'button_set',
								'title' => esc_html__('Header Display', 'foliohub'),
								'options' => array(
									'show' => esc_html__('Show', 'foliohub'),
									'hide' => esc_html__('Hide', 'foliohub'),
								),
								'default' => 'show',
							),
							array(
								'id' => 'p_menu',
								'type' => 'select',
								'title' => esc_html__('Menu', 'foliohub'),
								'options' => foliohub_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id' => 'sticky_scroll',
								'type' => 'button_set',
								'title' => esc_html__('Sticky Scroll', 'foliohub'),
								'options' => array(
									'-1' => esc_html__('Inherit', 'foliohub'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'foliohub'),
									'pxl-sticky-stb' => esc_html__('Scroll To Bottom', 'foliohub'),
								),
								'default' => '-1',
							),
						)
					)

				],

				'page_title' => [
					'title' => esc_html__('Page Title', 'foliohub'),
					'icon' => 'el el-indent-left',
					'fields' => array_merge(
						foliohub_page_title_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						array(
							array(
								'id' => 'custom_main_title',
								'type' => 'text',
								'title' => esc_html__('Custom Main Title', 'foliohub'),
								'subtitle' => esc_html__('Custom heading text title', 'foliohub'),
								'required' => array('pt_mode', '!=', 'none')
							),

						),
					)
				],
				'content' => [
					'title' => esc_html__('Content', 'foliohub'),
					'icon' => 'el-icon-pencil',
					'fields' => array_merge(
						foliohub_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id' => 'content_spacing',
								'type' => 'spacing',
								'output' => array('#pxl-wapper #pxl-main'),
								'right' => false,
								'left' => false,
								'mode' => 'padding',
								'units' => array('px'),
								'units_extended' => 'false',
								'title' => esc_html__('Spacing Top/Bottom', 'foliohub'),
								'default' => array(
									'padding-top' => '',
									'padding-bottom' => '',
									'units' => 'px',
								)
							),
						)
					)
				],
				'footer' => [
					'title' => esc_html__('Footer', 'foliohub'),
					'icon' => 'el el-website',
					'fields' => array_merge(
						foliohub_footer_opts([
							'default' => true,
							'default_value' => '-1'
						]),
					)
				],
			]
		],
		'service' => [
			'opt_name' => 'pxl_service_options',
			'display_name' => esc_html__('Service Options', 'foliohub'),
			'show_options_object' => false,
			'context' => 'advanced',
			'priority' => 'default',
			'sections' => [
				'header' => [
					'title' => esc_html__('General', 'foliohub'),
					'icon' => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id' => 'service_external_link',
								'type' => 'text',
								'title' => esc_html__('External Link', 'foliohub'),
								'validate' => 'url',
								'default' => '',
							),
							array(
								'id' => 'service_icon_type',
								'type' => 'button_set',
								'title' => esc_html__('Icon Type', 'foliohub'),
								'options' => array(
									'icon' => esc_html__('Icon', 'foliohub'),
									'image' => esc_html__('Image', 'foliohub'),
								),
								'default' => 'icon'
							),
							array(
								'id' => 'service_icon_font',
								'type' => 'pxl_iconpicker',
								'title' => esc_html__('Icon', 'foliohub'),
								'required' => array(0 => 'service_icon_type', 1 => 'equals', 2 => 'icon'),
								'force_output' => true
							),
							array(
								'id' => 'service_icon_img',
								'type' => 'gallery',
								'title' => esc_html__('Icon Gallery', 'foliohub'),
								'add_title' => esc_html__('Add Images', 'foliohub'),
								'edit_title' => esc_html__('Edit Gallery', 'foliohub'),
								'clear_title' => esc_html__('Remove', 'foliohub'),
								'required' => array('service_icon_type', 'equals', 'image'),
								'force_output' => true,
							),

						)
					)
				],
				'colors' => [
					'title' => esc_html__('Colors', 'foliohub'),
					'icon' => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id' => 'body_bg_color',
								'type' => 'color',
								'title' => esc_html__('Body Background Color', 'foliohub'),
								'transparent' => false,
								'default' => ''
							),
							array(
								'id' => 'primary_color',
								'type' => 'color',
								'title' => esc_html__('Primary Color', 'foliohub'),
								'transparent' => false,
								'default' => ''
							),
							array(
								'id' => 'third_color',
								'type' => 'color',
								'title' => esc_html__('Third Color', 'foliohub'),
								'transparent' => false,
								'default' => ''
							),
							array(
								'id' => 'four_color',
								'type' => 'color',
								'title' => esc_html__('Four Color', 'foliohub'),
								'transparent' => false,
								'default' => ''
							),
							array(
								'id' => 'gradient_color',
								'type' => 'color_gradient',
								'title' => esc_html__('Gradient Color One', 'foliohub'),
								'transparent' => false,
								'default' => array(
									'from' => '',
									'to' => '',
								),
							),
							array(
								'id' => 'gradient_color_two',
								'type' => 'color_gradient',
								'title' => esc_html__('Gradient Color Two', 'foliohub'),
								'transparent' => false,
								'default' => array(
									'from' => '',
									'to' => '',
								),
							)
						)
					)
				],
				'header1' => [
					'title' => esc_html__('Header', 'foliohub'),
					'icon' => 'el-icon-website',
					'fields' => array_merge(
						foliohub_header_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						foliohub_header_mobile_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						array(
							array(
								'id' => 'header_display',
								'type' => 'button_set',
								'title' => esc_html__('Header Display', 'foliohub'),
								'options' => array(
									'show' => esc_html__('Show', 'foliohub'),
									'hide' => esc_html__('Hide', 'foliohub'),
								),
								'default' => 'show',
							),
							array(
								'id' => 'p_menu',
								'type' => 'select',
								'title' => esc_html__('Menu', 'foliohub'),
								'options' => foliohub_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id' => 'sticky_scroll',
								'type' => 'button_set',
								'title' => esc_html__('Sticky Scroll', 'foliohub'),
								'options' => array(
									'-1' => esc_html__('Inherit', 'foliohub'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'foliohub'),
									'pxl-sticky-stb' => esc_html__('Scroll To Bottom', 'foliohub'),
								),
								'default' => '-1',
							),
						)
					)

				],
				'page_title' => [
					'title' => esc_html__('Page Title', 'foliohub'),
					'icon' => 'el el-indent-left',
					'fields' => array_merge(
						foliohub_page_title_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						array(
							array(
								'id' => 'custom_main_title',
								'type' => 'text',
								'title' => esc_html__('Custom Main Title', 'foliohub'),
								'subtitle' => esc_html__('Custom heading text title', 'foliohub'),
								'required' => array('pt_mode', '!=', 'none')
							),

						),
					)
				],
				'content' => [
					'title' => esc_html__('Content', 'foliohub'),
					'icon' => 'el-icon-pencil',
					'fields' => array_merge(
						foliohub_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id' => 'content_spacing',
								'type' => 'spacing',
								'output' => array('#pxl-wapper #pxl-main'),
								'right' => false,
								'left' => false,
								'mode' => 'padding',
								'units' => array('px'),
								'units_extended' => 'false',
								'title' => esc_html__('Spacing Top/Bottom', 'foliohub'),
								'default' => array(
									'padding-top' => '',
									'padding-bottom' => '',
									'units' => 'px',
								)
							),
							array(
								'id' => 'multi_text_country_ser',
								'type' => 'multi_text',
								'title' => esc_html('Tags', 'foliohub'),
							),
							array(
								'id' => 'multi_text_list_ser',
								'type' => 'multi_text',
								'title' => esc_html('List', 'foliohub'),
							),
							array(
								'id' => 'custom_yoga_lever',
								'type' => 'text',
								'title' => esc_html__('Yoga level:', 'foliohub'),
								'subtitle' => esc_html__('Data For Service Yoga', 'foliohub'),
								'required' => array('pt_mode', '!=', 'none')
							),
							array(
								'id' => 'custom_yoga_duration',
								'type' => 'text',
								'title' => esc_html__('Duration', 'foliohub'),
								'subtitle' => esc_html__('Data For Service Yoga', 'foliohub'),
								'required' => array('pt_mode', '!=', 'none')
							),
						)
					)
				],
				'footer' => [
					'title' => esc_html__('Footer', 'foliohub'),
					'icon' => 'el el-website',
					'fields' => array_merge(
						foliohub_footer_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						array(
							array(
								'id' => 'footer_display',
								'type' => 'button_set',
								'title' => esc_html__('Footer Display', 'foliohub'),
								'options' => array(
									'show' => esc_html__('Show', 'foliohub'),
									'hide' => esc_html__('Hide', 'foliohub'),
								),
								'default' => 'show',
							),
							array(
								'id' => 'p_footer_fixed',
								'type' => 'button_set',
								'title' => esc_html__('Footer Fixed', 'foliohub'),
								'options' => array(
									'inherit' => esc_html__('Inherit', 'foliohub'),
									'on' => esc_html__('On', 'foliohub'),
									'off' => esc_html__('Off', 'foliohub'),
								),
								'default' => 'inherit',
							),
							array(
								'id' => 'back_top_top_style',
								'type' => 'button_set',
								'title' => esc_html__('Back to Top Style', 'foliohub'),
								'options' => array(
									'style-default' => esc_html__('Default', 'foliohub'),
									'style-round' => esc_html__('Round', 'foliohub'),
								),
								'default' => 'style-default',
							),
						)
					)
				],
			]
		],
		'industries' => [
			'opt_name' => 'pxl_industries_options',
			'display_name' => esc_html__('Industries Options', 'foliohub'),
			'show_options_object' => false,
			'context' => 'advanced',
			'priority' => 'default',
			'sections' => [
				'header' => [
					'title' => esc_html__('General', 'foliohub'),
					'icon' => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id' => 'industries_external_link',
								'type' => 'text',
								'title' => esc_html__('External Link', 'foliohub'),
								'validate' => 'url',
								'default' => '',
							),
							array(
								'id' => 'industries_icon_type',
								'type' => 'button_set',
								'title' => esc_html__('Icon Type', 'foliohub'),
								'options' => array(
									'icon' => esc_html__('Icon', 'foliohub'),
									'image' => esc_html__('Image', 'foliohub'),
								),
								'default' => 'icon'
							),
							array(
								'id' => 'industries_icon_font',
								'type' => 'pxl_iconpicker',
								'title' => esc_html__('Icon', 'foliohub'),
								'required' => array(0 => 'industries_icon_type', 1 => 'equals', 2 => 'icon'),
								'force_output' => true
							),
							array(
								'id' => 'industries_icon_img',
								'type' => 'media',
								'title' => esc_html__('Icon Image', 'foliohub'),
								'default' => '',
								'required' => array(0 => 'industries_icon_type', 1 => 'equals', 2 => 'image'),
								'force_output' => true
							),
						)
					)
				],
				'header1' => [
					'title' => esc_html__('Header', 'foliohub'),
					'icon' => 'el-icon-website',
					'fields' => array_merge(
						foliohub_header_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						foliohub_header_mobile_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						array(
							array(
								'id' => 'header_display',
								'type' => 'button_set',
								'title' => esc_html__('Header Display', 'foliohub'),
								'options' => array(
									'show' => esc_html__('Show', 'foliohub'),
									'hide' => esc_html__('Hide', 'foliohub'),
								),
								'default' => 'show',
							),
							array(
								'id' => 'p_menu',
								'type' => 'select',
								'title' => esc_html__('Menu', 'foliohub'),
								'options' => foliohub_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id' => 'sticky_scroll',
								'type' => 'button_set',
								'title' => esc_html__('Sticky Scroll', 'foliohub'),
								'options' => array(
									'-1' => esc_html__('Inherit', 'foliohub'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'foliohub'),
									'pxl-sticky-stb' => esc_html__('Scroll To Bottom', 'foliohub'),
								),
								'default' => '-1',
							),
						)
					)

				],
				'page_title' => [
					'title' => esc_html__('Page Title', 'foliohub'),
					'icon' => 'el el-indent-left',
					'fields' => array_merge(
						foliohub_page_title_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						array(
							array(
								'id' => 'custom_main_title',
								'type' => 'text',
								'title' => esc_html__('Custom Main Title', 'foliohub'),
								'subtitle' => esc_html__('Custom heading text title', 'foliohub'),
								'required' => array('pt_mode', '!=', 'none')
							),

						),
					)
				],
				'content' => [
					'title' => esc_html__('Content', 'foliohub'),
					'icon' => 'el-icon-pencil',
					'fields' => array_merge(
						foliohub_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id' => 'content_spacing',
								'type' => 'spacing',
								'output' => array('#pxl-wapper #pxl-main'),
								'right' => false,
								'left' => false,
								'mode' => 'padding',
								'units' => array('px'),
								'units_extended' => 'false',
								'title' => esc_html__('Spacing Top/Bottom', 'foliohub'),
								'default' => array(
									'padding-top' => '',
									'padding-bottom' => '',
									'units' => 'px',
								)
							),
						)
					)
				],
				'footer' => [
					'title' => esc_html__('Footer', 'foliohub'),
					'icon' => 'el el-website',
					'fields' => array_merge(
						foliohub_footer_opts([
							'default' => true,
							'default_value' => '-1'
						]),
						array(
							array(
								'id' => 'footer_display',
								'type' => 'button_set',
								'title' => esc_html__('Footer Display', 'foliohub'),
								'options' => array(
									'show' => esc_html__('Show', 'foliohub'),
									'hide' => esc_html__('Hide', 'foliohub'),
								),
								'default' => 'show',
							),
							array(
								'id' => 'p_footer_fixed',
								'type' => 'button_set',
								'title' => esc_html__('Footer Fixed', 'foliohub'),
								'options' => array(
									'inherit' => esc_html__('Inherit', 'foliohub'),
									'on' => esc_html__('On', 'foliohub'),
									'off' => esc_html__('Off', 'foliohub'),
								),
								'default' => 'inherit',
							),
							array(
								'id' => 'back_top_top_style',
								'type' => 'button_set',
								'title' => esc_html__('Back to Top Style', 'foliohub'),
								'options' => array(
									'style-default' => esc_html__('Default', 'foliohub'),
									'style-round' => esc_html__('Round', 'foliohub'),
								),
								'default' => 'style-default',
							),
						)
					)
				],
			]
		],

		'pxl-template' => [ //post_type
			'opt_name' => 'pxl_hidden_template_options',
			'display_name' => esc_html__('Template Options', 'foliohub'),
			'show_options_object' => false,
			'context' => 'advanced',
			'priority' => 'default',
			'sections' => [
				'header' => [
					'title' => esc_html__('General', 'foliohub'),
					'icon' => 'el-icon-website',
					'fields' => array(
						array(
							'id' => 'template_type',
							'type' => 'select',
							'title' => esc_html__('Type', 'foliohub'),
							'options' => [
								'df' => esc_html__('Select Type', 'foliohub'),
								'header' => esc_html__('Header Desktop', 'foliohub'),
								'header-mobile' => esc_html__('Header Mobile', 'foliohub'),
								'footer' => esc_html__('Footer', 'foliohub'),
								'mega-menu' => esc_html__('Mega Menu', 'foliohub'),
								'page-title' => esc_html__('Page Title', 'foliohub'),
								'tab' => esc_html__('Tab', 'foliohub'),
								'hidden-panel' => esc_html__('Hidden Panel', 'foliohub'),
								'popup' => esc_html__('Popup', 'foliohub'),
								'widget' => esc_html__('Widget Sidebar', 'foliohub'),
								'page' => esc_html__('Page', 'foliohub'),
								'slider' => esc_html__('Slider', 'foliohub'),
							],
							'default' => 'df',
						),
						array(
							'id' => 'header_type',
							'type' => 'select',
							'title' => esc_html__('Header Type', 'foliohub'),
							'options' => [
								'px-header--default' => esc_html__('Default', 'foliohub'),
								'px-header--transparent' => esc_html__('Transparent', 'foliohub'),
								'px-header--left_sidebar' => esc_html__('Left Sidebar', 'foliohub'),
								'px-header--fixed' => esc_html__('Fixed', 'foliohub'),
							],
							'default' => 'px-header--default',
							'indent' => true,
							'required' => array(0 => 'template_type', 1 => 'equals', 2 => 'header'),
						),

						array(
							'id' => 'header_mobile_type',
							'type' => 'select',
							'title' => esc_html__('Header Type', 'foliohub'),
							'options' => [
								'px-header--default' => esc_html__('Default', 'foliohub'),
								'px-header--transparent' => esc_html__('Transparent', 'foliohub'),
							],
							'default' => 'px-header--default',
							'indent' => true,
							'required' => array(0 => 'template_type', 1 => 'equals', 2 => 'header-mobile'),
						),

						array(
							'id' => 'hidden_panel_position',
							'type' => 'select',
							'title' => esc_html__('Hidden Panel Position', 'foliohub'),
							'options' => [
								'top' => esc_html__('Top', 'foliohub'),
								'right' => esc_html__('Right', 'foliohub'),
								'blinds' => esc_html__('Blinds', 'foliohub'),
							],
							'default' => 'right',
							'required' => array(0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel'),
						),
						array(
							'id' => 'hidden_panel_height',
							'type' => 'text',
							'title' => esc_html__('Hidden Panel Height', 'foliohub'),
							'subtitle' => esc_html__('Enter value with unit, e.g. 500px, 80vh, 60%.', 'foliohub'),
							'transparent' => false,
							'default' => '',
							'force_output' => true,
							'required' => array('hidden_panel_position', 'equals', 'top'),
						),
						array(
							'id' => 'hidden_panel_width',
							'type' => 'text',
							'title' => esc_html__('Hidden Panel Width', 'foliohub'),
							'subtitle' => esc_html__('Enter value with unit, e.g. 500px, 80vw, 60%.', 'foliohub'),
							'transparent' => false,
							'default' => '',
							'force_output' => true,
							'required' => array('hidden_panel_position', 'equals', 'top'),
						),
						array(
							'id' => 'hidden_panel_boxcolor',
							'type' => 'color',
							'title' => esc_html__('Box Color', 'foliohub'),
							'transparent' => false,
							'default' => '',
							'required' => array(0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel'),
						),

						array(
							'id' => 'header_sidebar_width',
							'type' => 'slider',
							'title' => esc_html__('Header Sidebar Width', 'foliohub'),
							"default" => 300,
							"min" => 50,
							"step" => 1,
							"max" => 900,
							'force_output' => true,
							'required' => array(0 => 'header_type', 1 => 'equals', 2 => 'px-header--left_sidebar'),
						),

						array(
							'id' => 'header_sidebar_border',
							'type' => 'border',
							'title' => esc_html__('Header Sidebar Border', 'foliohub'),
							'force_output' => true,
							'required' => array(0 => 'header_type', 1 => 'equals', 2 => 'px-header--left_sidebar'),
							'default' => '',
						),
					),

				],
			]
		],
	];

	$metabox->add_meta_data($panels);
}
