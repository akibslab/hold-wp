<?php

/**
 * hold customizer
 *
 * @package hold
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Added Panels & Sections
 */
function dustrilox_customizer_panels_sections($wp_customize) {

    //Add panel
    $wp_customize->add_panel('dustrilox_customizer', [
        'priority' => 10,
        'title'    => esc_html__('Dustrilox Customizer', 'hold'),
    ]);

    /**
     * Customizer Section
     */
    $wp_customize->add_section('header_top_setting', [
        'title'       => esc_html__('Header Info Setting', 'hold'),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'dustrilox_customizer',
    ]);

    $wp_customize->add_section('header_social', [
        'title'       => esc_html__('Header Social', 'hold'),
        'description' => '',
        'priority'    => 11,
        'capability'  => 'edit_theme_options',
        'panel'       => 'dustrilox_customizer',
    ]);

    $wp_customize->add_section('section_header_logo', [
        'title'       => esc_html__('Header Setting', 'hold'),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'dustrilox_customizer',
    ]);

    $wp_customize->add_section('blog_setting', [
        'title'       => esc_html__('Blog Setting', 'hold'),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'dustrilox_customizer',
    ]);

    $wp_customize->add_section('header_side_setting', [
        'title'       => esc_html__('Side Info', 'hold'),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'dustrilox_customizer',
    ]);

    $wp_customize->add_section('breadcrumb_setting', [
        'title'       => esc_html__('Breadcrumb Setting', 'hold'),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'dustrilox_customizer',
    ]);

    $wp_customize->add_section('blog_setting', [
        'title'       => esc_html__('Blog Setting', 'hold'),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'dustrilox_customizer',
    ]);

    $wp_customize->add_section('footer_setting', [
        'title'       => esc_html__('Footer Settings', 'hold'),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'dustrilox_customizer',
    ]);

    $wp_customize->add_section('footer_social', [
        'title'       => esc_html__('Footer Social', 'hold'),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'dustrilox_customizer',
    ]);

    $wp_customize->add_section('color_setting', [
        'title'       => esc_html__('Color Setting', 'hold'),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'dustrilox_customizer',
    ]);

    $wp_customize->add_section('404_page', [
        'title'       => esc_html__('404 Page', 'hold'),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'dustrilox_customizer',
    ]);

    $wp_customize->add_section('typo_setting', [
        'title'       => esc_html__('Typography Setting', 'hold'),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'dustrilox_customizer',
    ]);

    $wp_customize->add_section('slug_setting', [
        'title'       => esc_html__('Slug Settings', 'hold'),
        'description' => '',
        'priority'    => 22,
        'capability'  => 'edit_theme_options',
        'panel'       => 'dustrilox_customizer',
    ]);
    $wp_customize->add_section('tutor_course_settings', [
        'title'       => esc_html__('Tutor Course Settings ', 'hold'),
        'description' => '',
        'priority'    => 23,
        'capability'  => 'edit_theme_options',
        'panel'       => 'dustrilox_customizer',
    ]);
}

add_action('customize_register', 'dustrilox_customizer_panels_sections');

function _header_top_fields($fields) {
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'dustrilox_topbar_switch',
        'label'    => esc_html__('Topbar Swicher', 'hold'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'hold'),
            'off' => esc_html__('Disable', 'hold'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'dustrilox_preloader',
        'label'    => esc_html__('Preloader On/Off', 'hold'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'hold'),
            'off' => esc_html__('Disable', 'hold'),
        ],
    ];


    $fields[] = [
        'type'     => 'switch',
        'settings' => 'dustrilox_backtotop',
        'label'    => esc_html__('Back To Top On/Off', 'hold'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'hold'),
            'off' => esc_html__('Disable', 'hold'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'dustrilox_header_right',
        'label'    => esc_html__('Header Right On/Off', 'hold'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'hold'),
            'off' => esc_html__('Disable', 'hold'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'dustrilox_search',
        'label'    => esc_html__('Header Search On/Off', 'hold'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'hold'),
            'off' => esc_html__('Disable', 'hold'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'dustrilox_header_lang',
        'label'    => esc_html__('language On/Off', 'hold'),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'hold'),
            'off' => esc_html__('Disable', 'hold'),
        ],
    ];

    // button
    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_button_text',
        'label'    => esc_html__('Button Text', 'hold'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('Contact Us', 'hold'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'dustrilox_header_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'link',
        'settings' => 'dustrilox_button_link',
        'label'    => esc_html__('Button URL', 'hold'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('#', 'hold'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'dustrilox_header_right',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];


    // phone
    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_phone_num',
        'label'    => esc_html__('Phone Number', 'hold'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('+(088) 234 567 899', 'hold'),
        'priority' => 10,
    ];

    // email
    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_mail_id',
        'label'    => esc_html__('Mail ID', 'hold'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('info@hold.com', 'hold'),
        'priority' => 10,
    ];

    // email
    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_address',
        'label'    => esc_html__('Address', 'hold'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('16/A, New York, US', 'hold'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_address_url',
        'label'    => esc_html__('Address URL', 'hold'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('https://goo.gl/maps/qzqY2PAcQwUz1BYN9', 'hold'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_header_feed',
        'label'    => esc_html__('Feed Text', 'hold'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('Our company is one of the', 'hold'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_header_delivery_text',
        'label'    => esc_html__('Delivery Text', 'hold'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('Deliver the sustainable success', 'hold'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_header_delivery_url',
        'label'    => esc_html__('Delivery URL', 'hold'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('#', 'hold'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'dustrilox_top_menu',
        'label'    => esc_html__('Top Menu', 'hold'),
        'section'  => 'header_top_setting',
        'default'  => esc_html__('<a href="faq.html">Faq</a><a href="contact.html">Careers</a>', 'hold'),
        'priority' => 10,
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_top_fields');

/*
Header Social
 */
function _header_social_fields($fields) {
    // header section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_topbar_fb_url',
        'label'    => esc_html__('Facebook Url', 'hold'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'hold'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_topbar_twitter_url',
        'label'    => esc_html__('Twitter Url', 'hold'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'hold'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_topbar_linkedin_url',
        'label'    => esc_html__('Linkedin Url', 'hold'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'hold'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_topbar_instagram_url',
        'label'    => esc_html__('Instagram Url', 'hold'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'hold'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_topbar_youtube_url',
        'label'    => esc_html__('Youtube Url', 'hold'),
        'section'  => 'header_social',
        'default'  => esc_html__('#', 'hold'),
        'priority' => 10,
    ];


    return $fields;
}
add_filter('kirki/fields', '_header_social_fields');

/*
Header Settings
 */
function _header_header_fields($fields) {
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__('Select Header Style', 'hold'),
        'section'     => 'section_header_logo',
        'placeholder' => esc_html__('Select an option...', 'hold'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1'   => get_template_directory_uri() . '/inc/img/header/header-1.png',
            'header-style-2' => get_template_directory_uri() . '/inc/img/header/header-2.png',
            'header-style-3'  => get_template_directory_uri() . '/inc/img/header/header-3.png'
        ],
        'default'     => 'header-style-1',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__('Header Logo', 'hold'),
        'description' => esc_html__('Upload Your Logo.', 'hold'),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo-white.png',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'seconday_logo',
        'label'       => esc_html__('Header Secondary Logo', 'hold'),
        'description' => esc_html__('Header Logo Black', 'hold'),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo-black.png',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'preloader_logo',
        'label'       => esc_html__('Preloader Logo', 'hold'),
        'description' => esc_html__('Upload Preloader Logo.', 'hold'),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/favicon.png',
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_header_fields');

/*
Header Side Info
 */
function _header_side_fields($fields) {
    // side info settings
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'dustrilox_side_hide',
        'label'    => esc_html__('Side Info On/Off', 'hold'),
        'section'  => 'header_side_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'hold'),
            'off' => esc_html__('Disable', 'hold'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'dustrilox_side_search',
        'label'    => esc_html__('Side Search On/Off', 'hold'),
        'section'  => 'header_side_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'hold'),
            'off' => esc_html__('Disable', 'hold'),
        ],
    ];
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'dustrilox_side_logo',
        'label'       => esc_html__('Logo Side', 'hold'),
        'description' => esc_html__('Logo Side', 'hold'),
        'section'     => 'header_side_setting',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo-black.png',
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'dustrilox_extra_about_text',
        'label'    => esc_html__('Side Description Text', 'hold'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and will give you a complete account of the system and expound the actual teachings of the great explore', 'hold'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'dustrilox_extra_map_iframe',
        'label'    => esc_html__('Map Address Iframe', 'hold'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29176.030811137334!2d90.3883827!3d23.924917699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1605272373598!5m2!1sen!2sbd', 'hold'),
        'priority' => 10,
    ];

    // contact
    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_contact_title',
        'label'    => esc_html__('Contact Title', 'hold'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('Contact Title', 'hold'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'dustrilox_extra_address',
        'label'    => esc_html__('Office Address', 'hold'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('12/A, Mirnada City Tower, NYC', 'hold'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'dustrilox_extra_map',
        'label'    => esc_html__('Address Map Link', 'hold'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('#', 'hold'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'dustrilox_extra_phone',
        'label'    => esc_html__('Phone Number', 'hold'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('+0989 7876 9865 9', 'hold'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'dustrilox_extra_email',
        'label'    => esc_html__('Email ID', 'hold'),
        'section'  => 'header_side_setting',
        'default'  => esc_html__('info@themepure.net', 'hold'),
        'priority' => 10,
    ];

    // repeater start
    $fields[] = [
        'type'     => 'repeater',
        'label'    => esc_html__('Image Gallery', 'hold'),
        'section'  => 'header_side_setting',
        'row_label' => [
            'type'     => 'text',
            'value'    => esc_html__('Client', 'hold'),
        ],

        'button_label' => esc_html__('Add new Gallery Item', 'hold'),

        'settings'     => 'dustrilox_side_gallery_items',
        'fields' => [
            'dustrilox_g_image' => [
                'type'         => 'image',
                'label'        => esc_html__('Gallery Image', 'hold'),
                'description'  => esc_attr__('Upload Gallery Image', 'hold'),
            ]
        ]
    ];
    // repeater end

    return $fields;
}
add_filter('kirki/fields', '_header_side_fields');

/*
_header_page_title_fields
 */
function _header_page_title_fields($fields) {
    // Breadcrumb Setting
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => esc_html__('Breadcrumb Background Image', 'hold'),
        'description' => esc_html__('Breadcrumb Background Image', 'hold'),
        'section'     => 'breadcrumb_setting',
        'default'     => get_template_directory_uri() . '/assets/img/page-title/page-title.jpg',
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'dustrilox_breadcrumb_bg_color',
        'label'       => __('Breadcrumb BG Color', 'hold'),
        'description' => esc_html__('This is a Breadcrumb bg color control.', 'hold'),
        'section'     => 'breadcrumb_setting',
        'default'     => '#f4f9fc',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_info_switch',
        'label'    => esc_html__('Breadcrumb Info switch', 'hold'),
        'section'  => 'breadcrumb_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'hold'),
            'off' => esc_html__('Disable', 'hold'),
        ],
    ];

    return $fields;
}
add_filter('kirki/fields', '_header_page_title_fields');

/*
Header Social
 */
function _header_blog_fields($fields) {
    // Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'dustrilox_blog_btn_switch',
        'label'    => esc_html__('Blog BTN On/Off', 'hold'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'hold'),
            'off' => esc_html__('Disable', 'hold'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'dustrilox_blog_cat',
        'label'    => esc_html__('Blog Category Meta On/Off', 'hold'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'hold'),
            'off' => esc_html__('Disable', 'hold'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'dustrilox_blog_author',
        'label'    => esc_html__('Blog Author Meta On/Off', 'hold'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'hold'),
            'off' => esc_html__('Disable', 'hold'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'dustrilox_blog_date',
        'label'    => esc_html__('Blog Date Meta On/Off', 'hold'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'hold'),
            'off' => esc_html__('Disable', 'hold'),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'dustrilox_blog_comments',
        'label'    => esc_html__('Blog Comments Meta On/Off', 'hold'),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'hold'),
            'off' => esc_html__('Disable', 'hold'),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_blog_btn',
        'label'    => esc_html__('Blog Button text', 'hold'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Read More', 'hold'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__('Blog Title', 'hold'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Blog', 'hold'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__('Blog Details Title', 'hold'),
        'section'  => 'blog_setting',
        'default'  => esc_html__('Blog Details', 'hold'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_blog_fields');

/*
Footer
 */
function _header_footer_fields($fields) {
    // Footer Setting
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__('Choose Footer Style', 'hold'),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__('Select an option...', 'hold'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
            'footer-style-2' => get_template_directory_uri() . '/inc/img/footer/footer-2.png',
            'footer-style-3' => get_template_directory_uri() . '/inc/img/footer/footer-3.png',
        ],
        'default'     => 'footer-style-1',
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'footer_widget_number',
        'label'       => esc_html__('Widget Number', 'hold'),
        'section'     => 'footer_setting',
        'default'     => '4',
        'placeholder' => esc_html__('Select an option...', 'hold'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            '4' => esc_html__('Widget Number 4', 'hold'),
            '3' => esc_html__('Widget Number 3', 'hold'),
            '2' => esc_html__('Widget Number 2', 'hold'),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'dustrilox_footer_bg',
        'label'       => esc_html__('Footer Background Image.', 'hold'),
        'description' => esc_html__('Footer Background Image.', 'hold'),
        'section'     => 'footer_setting',
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'dustrilox_footer_bg_color',
        'label'       => __('Footer BG Color', 'hold'),
        'description' => esc_html__('This is a Footer bg color control.', 'hold'),
        'section'     => 'footer_setting',
        'default'     => '#f4f9fc',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_style_2_switch',
        'label'    => esc_html__('Footer Style 2 On/Off', 'hold'),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'hold'),
            'off' => esc_html__('Disable', 'hold'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_style_3_switch',
        'label'    => esc_html__('Footer Style 3 On/Off', 'hold'),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'hold'),
            'off' => esc_html__('Disable', 'hold'),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'dustrilox_footer_social_switch',
        'label'    => esc_html__('Footer Social On/Off', 'hold'),
        'section'  => 'footer_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'hold'),
            'off' => esc_html__('Disable', 'hold'),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_copyright',
        'label'    => esc_html__('Copyright', 'hold'),
        'section'  => 'footer_setting',
        'default'  => esc_html__('Copyright &copy; 2022 Theme_Pure. All Rights Reserved', 'hold'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', '_header_footer_fields');

/*
Header Social
 */
function _footer_social_fields($fields) {
    // header section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_footer_fb_url',
        'label'    => esc_html__('Facebook Url', 'hold'),
        'section'  => 'footer_social',
        'default'  => esc_html__('#', 'hold'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_footer_twitter_url',
        'label'    => esc_html__('Twitter Url', 'hold'),
        'section'  => 'footer_social',
        'default'  => esc_html__('#', 'hold'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_footer_linkedin_url',
        'label'    => esc_html__('Linkedin Url', 'hold'),
        'section'  => 'footer_social',
        'default'  => esc_html__('#', 'hold'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_footer_instagram_url',
        'label'    => esc_html__('Instagram Url', 'hold'),
        'section'  => 'footer_social',
        'default'  => esc_html__('#', 'hold'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_footer_youtube_url',
        'label'    => esc_html__('Youtube Url', 'hold'),
        'section'  => 'footer_social',
        'default'  => esc_html__('#', 'hold'),
        'priority' => 10,
    ];


    return $fields;
}
add_filter('kirki/fields', '_footer_social_fields');


// color
function dustrilox_color_fields($fields) {
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'dustrilox_color_option',
        'label'       => __('Theme Color', 'hold'),
        'description' => esc_html__('This is a Theme color control.', 'hold'),
        'section'     => 'color_setting',
        'default'     => '#2b4eff',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'dustrilox_color_option_2',
        'label'       => __('Primary Color', 'hold'),
        'description' => esc_html__('This is a Primary color control.', 'hold'),
        'section'     => 'color_setting',
        'default'     => '#f2277e',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'dustrilox_color_option_3',
        'label'       => __('Secondary Color', 'hold'),
        'description' => esc_html__('This is a Secondary color control.', 'hold'),
        'section'     => 'color_setting',
        'default'     => '#30a820',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'dustrilox_color_option_3_2',
        'label'       => __('Secondary Color 2', 'hold'),
        'description' => esc_html__('This is a Secondary color 2 control.', 'hold'),
        'section'     => 'color_setting',
        'default'     => '#ffb352',
        'priority'    => 10,
    ];
    // Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'dustrilox_color_scrollup',
        'label'       => __('ScrollUp Color', 'hold'),
        'description' => esc_html__('This is a ScrollUp colo control.', 'hold'),
        'section'     => 'color_setting',
        'default'     => '#2b4eff',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter('kirki/fields', 'dustrilox_color_fields');

// 404
function dustrilox_404_fields($fields) {
    // 404 settings
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'dustrilox_404_bg',
        'label'       => esc_html__('404 Image.', 'hold'),
        'description' => esc_html__('404 Image.', 'hold'),
        'section'     => '404_page',
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_error_title',
        'label'    => esc_html__('Not Found Title', 'hold'),
        'section'  => '404_page',
        'default'  => esc_html__('Page not found', 'hold'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'dustrilox_error_desc',
        'label'    => esc_html__('404 Description Text', 'hold'),
        'section'  => '404_page',
        'default'  => esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted', 'hold'),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_error_link_text',
        'label'    => esc_html__('404 Link Text', 'hold'),
        'section'  => '404_page',
        'default'  => esc_html__('Back To Home', 'hold'),
        'priority' => 10,
    ];
    return $fields;
}
add_filter('kirki/fields', 'dustrilox_404_fields');


/**
 * Added Fields
 */
function dustrilox_typo_fields($fields) {
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__('Body Font', 'hold'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h_setting',
        'label'       => esc_html__('Heading h1 Fonts', 'hold'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h2_setting',
        'label'       => esc_html__('Heading h2 Fonts', 'hold'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h2',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h3_setting',
        'label'       => esc_html__('Heading h3 Fonts', 'hold'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h4_setting',
        'label'       => esc_html__('Heading h4 Fonts', 'hold'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h5_setting',
        'label'       => esc_html__('Heading h5 Fonts', 'hold'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h6_setting',
        'label'       => esc_html__('Heading h6 Fonts', 'hold'),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

add_filter('kirki/fields', 'dustrilox_typo_fields');





/**
 * Added Fields
 */
function dustrilox_slug_setting($fields) {
    // slug settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_ev_slug',
        'label'    => esc_html__('Event Slug', 'hold'),
        'section'  => 'slug_setting',
        'default'  => esc_html__('ourevent', 'hold'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'dustrilox_port_slug',
        'label'    => esc_html__('Portfolio Slug', 'hold'),
        'section'  => 'slug_setting',
        'default'  => esc_html__('ourportfolio', 'hold'),
        'priority' => 10,
    ];

    return $fields;
}

add_filter('kirki/fields', 'dustrilox_slug_setting');


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function dustrilox_THEME_option($name) {
    $value = '';
    if (class_exists('hold')) {
        $value = Kirki::get_option(dustrilox_get_theme(), $name);
    }

    return apply_filters('dustrilox_THEME_option', $value, $name);
}

/**
 * Get config ID
 *
 * @return string
 */
function dustrilox_get_theme() {
    return 'hold';
}
