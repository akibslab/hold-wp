<?php

/**
 * This file displaying customizer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hold
 */

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}

/**
 * hold config
 */
Kirki::add_config('hold_config', array(
   'capability'    => 'edit_theme_options',
   'option_type'   => 'theme_mod',
));

/**
 * Hold Panel
 */
Kirki::add_panel('hold_panel', array(
   'priority'    => 10,
   'title'       => esc_html__('Hold Options', 'hold'),
   'description' => esc_html__('Update website content here.', 'hold'),
   'icon'  => 'dashicons-admin-generic',
));


/**
 * Header Section
 */
Kirki::add_section('header_section', array(
   'title'          => esc_html__('Header Section', 'hold'),
   'description'    => esc_html__('Add/Edit header content here.', 'hold'),
   'panel'          => 'hold_panel',
   'priority'       => 160,
));

// header logo
Kirki::add_field('hold_config', [
   'type'        => 'image',
   'settings'    => 'desktop_logo',
   'label'       => esc_html__('Desktop Logo', 'hold'),
   'section'     => 'header_section',
   'choices'     => [
      'save_as' => 'url',
   ],
]);
Kirki::add_field('hold_config', [
   'type'        => 'image',
   'settings'    => 'mobile_logo',
   'label'       => esc_html__('Mobile Logo', 'hold'),
   'section'     => 'header_section',
   'choices'     => [
      'save_as' => 'url',
   ],
]);
// header button switch
Kirki::add_field('hold_config', [
   'type'        => 'switch',
   'settings'    => 'header_btn_switcher',
   'label'       => esc_html__('Enable the header button?', 'hold'),
   'section'     => 'header_section',
   'default'     => 'on',
   'priority'    => 10,
   'choices'     => [
      'on'  => esc_html__('Enable', 'hold'),
      'off' => esc_html__('Disable', 'hold'),
   ],
]);
// button text
Kirki::add_field('hold_config', [
   'type'     => 'text',
   'settings' => 'header_btn_text',
   'label'    => esc_html__('Button Text', 'hold'),
   'section'  => 'header_section',
   'default'  => esc_html__('Kontakt', 'hold'),
   'priority' => 10,
   'transport' => 'postMessage',
   'js_vars'   => [
      [
         'element'  => '.navigation_button .btn',
         'function' => 'html',
         'property' => 'text',
      ],
   ],
   'active_callback' => [
      [
         'setting'  => 'header_btn_switcher',
         'operator' => '==',
         'value'    => true,
      ]
   ],
]);
// button link
Kirki::add_field('hold_config', [
   'type'     => 'link',
   'settings' => 'header_btn_link',
   'label'    => esc_html__('Button Link', 'hold'),
   'section'  => 'header_section',
   'default'  => esc_html__('#', 'hold'),
   'priority' => 10,
   'active_callback' => [
      [
         'setting'  => 'header_btn_switcher',
         'operator' => '==',
         'value'    => true,
      ]
   ],
]);
// end: header section

/**
 * Footer Section
 */
Kirki::add_section('footer_section', array(
   'title'          => esc_html__('Footer Section', 'hold'),
   'description'    => esc_html__('Add/Edit Footer content here.', 'hold'),
   'panel'          => 'hold_panel',
   'priority'       => 160,
));
// footer logo
Kirki::add_field('hold_config', [
   'type'        => 'image',
   'settings'    => 'footer_logo',
   'label'       => esc_html__('Footer Logo', 'hold'),
   'section'     => 'footer_section',
   'choices'     => [
      'save_as' => 'url',
   ],
]);
// footer title
Kirki::add_field('hold_config', [
   'type'     => 'text',
   'settings' => 'footer_title',
   'label'    => esc_html__('Footer Title', 'hold'),
   'section'  => 'footer_section',
   'default'  => esc_html__('house of life design', 'hold'),
   'priority' => 10,
   'transport' => 'postMessage',
   'js_vars'   => [
      [
         'element'  => '.footer_address .title',
         'function' => 'html',
         'property' => 'text',
      ],
   ],
]);
// address
Kirki::add_field('hold_config', [
   'type'     => 'textarea',
   'settings' => 'footer_address',
   'label'    => esc_html__('Address', 'hold'),
   'section'  => 'footer_section',
   'default'  => esc_html__('Musterstraße 54 <br> 22507 Hamburg', 'hold'),
   'priority' => 10,
   'transport' => 'postMessage',
   'js_vars'   => [
      [
         'element'  => '.footer_address .address',
         'function' => 'html',
         'property' => 'text',
      ],
   ],
]);
// phone
Kirki::add_field('hold_config', [
   'type'     => 'text',
   'settings' => 'footer_phone',
   'label'    => esc_html__('Phone', 'hold'),
   'section'  => 'footer_section',
   'default'  => esc_html__('+49 40 55 67888 55', 'hold'),
   'priority' => 10,
   'transport' => 'postMessage',
   'js_vars'   => [
      [
         'element'  => '.footer_address .phone',
         'function' => 'html',
         'property' => 'text',
      ],
   ],
]);
// email
Kirki::add_field('hold_config', [
   'type'     => 'text',
   'settings' => 'footer_email',
   'label'    => esc_html__('Email', 'hold'),
   'section'  => 'footer_section',
   'default'  => esc_html__('#', 'hold'),
   'priority' => 10,
   'transport' => 'postMessage',
   'js_vars'   => [
      [
         'element'  => '.footer_socials li a',
         'function' => 'html',
         'property' => 'text',
      ],
   ],
]);
// footer button switch
Kirki::add_field('hold_config', [
   'type'        => 'switch',
   'settings'    => 'footer_btn_switcher',
   'label'       => esc_html__('Enable the footer button?', 'hold'),
   'section'     => 'footer_section',
   'default'     => 'on',
   'priority'    => 10,
   'choices'     => [
      'on'  => esc_html__('Enable', 'hold'),
      'off' => esc_html__('Disable', 'hold'),
   ],
]);
// button text
Kirki::add_field('hold_config', [
   'type'     => 'text',
   'settings' => 'footer_btn_text',
   'label'    => esc_html__('Button Text', 'hold'),
   'section'  => 'footer_section',
   'default'  => esc_html__('Telefontermin', 'hold'),
   'priority' => 10,
   'transport' => 'postMessage',
   'js_vars'   => [
      [
         'element'  => '.footer_button .btn',
         'function' => 'html',
         'property' => 'text',
      ],
   ],
   'active_callback' => [
      [
         'setting'  => 'footer_btn_switcher',
         'operator' => '==',
         'value'    => true,
      ]
   ],
]);
// button link
Kirki::add_field('hold_config', [
   'type'     => 'link',
   'settings' => 'footer_btn_link',
   'label'    => esc_html__('Button Link', 'hold'),
   'section'  => 'footer_section',
   'default'  => esc_html__('#', 'hold'),
   'priority' => 10,
   'active_callback' => [
      [
         'setting'  => 'footer_btn_switcher',
         'operator' => '==',
         'value'    => true,
      ]
   ],
]);
// footer socials switch
Kirki::add_field('hold_config', [
   'type'        => 'switch',
   'settings'    => 'footer_socials_switcher',
   'label'       => esc_html__('Enable the socials button?', 'hold'),
   'section'     => 'footer_section',
   'default'     => 'on',
   'priority'    => 10,
   'choices'     => [
      'on'  => esc_html__('Enable', 'hold'),
      'off' => esc_html__('Disable', 'hold'),
   ],
]);
// facebook link
Kirki::add_field('hold_config', [
   'type'     => 'link',
   'settings' => 'facebook_link',
   'label'    => esc_html__('Facebook Link', 'hold'),
   'section'  => 'footer_section',
   'default'  => esc_html__('#', 'hold'),
   'priority' => 10,
   'active_callback' => [
      [
         'setting'  => 'footer_socials_switcher',
         'operator' => '==',
         'value'    => true,
      ]
   ],
]);
// instagram link
Kirki::add_field('hold_config', [
   'type'     => 'link',
   'settings' => 'instagram_link',
   'label'    => esc_html__('Instagram Link', 'hold'),
   'section'  => 'footer_section',
   'default'  => esc_html__('#', 'hold'),
   'priority' => 10,
   'active_callback' => [
      [
         'setting'  => 'footer_socials_switcher',
         'operator' => '==',
         'value'    => true,
      ]
   ],
]);
// youtube link
Kirki::add_field('hold_config', [
   'type'     => 'link',
   'settings' => 'youtube_link',
   'label'    => esc_html__('Youtube Link', 'hold'),
   'section'  => 'footer_section',
   'default'  => esc_html__('#', 'hold'),
   'priority' => 10,
   'active_callback' => [
      [
         'setting'  => 'footer_socials_switcher',
         'operator' => '==',
         'value'    => true,
      ]
   ],
]);
// linkedin link
Kirki::add_field('hold_config', [
   'type'     => 'link',
   'settings' => 'linkedin_link',
   'label'    => esc_html__('Linkedin Link', 'hold'),
   'section'  => 'footer_section',
   'default'  => esc_html__('#', 'hold'),
   'priority' => 10,
   'active_callback' => [
      [
         'setting'  => 'footer_socials_switcher',
         'operator' => '==',
         'value'    => true,
      ]
   ],
]);
