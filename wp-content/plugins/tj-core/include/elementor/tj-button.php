<?php

namespace TJCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
use \Elementor\Utils;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * TJ Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TJ_Button extends Widget_Base {

   /**
    * Retrieve the widget name.
    *
    * @since 1.0.0
    *
    * @access public
    *
    * @return string Widget name.
    */
   public function get_name() {
      return 'tj-button';
   }

   /**
    * Retrieve the widget title.
    *
    * @since 1.0.0
    *
    * @access public
    *
    * @return string Widget title.
    */
   public function get_title() {
      return __('Tj Button', 'tjcore');
   }

   /**
    * Retrieve the widget icon.
    *
    * @since 1.0.0
    *
    * @access public
    *
    * @return string Widget icon.
    */
   public function get_icon() {
      return 'tj-icon';
   }

   /**
    * Retrieve the list of categories the widget belongs to.
    *
    * Used to determine where to display the widget in the editor.
    *
    * Note that currently Elementor supports only one category.
    * When multiple categories passed, Elementor uses the first one.
    *
    * @since 1.0.0
    *
    * @access public
    *
    * @return array Widget categories.
    */
   public function get_categories() {
      return ['tjcore'];
   }

   /**
    * Retrieve the list of scripts the widget depended on.
    *
    * Used to set scripts dependencies required to run the widget.
    *
    * @since 1.0.0
    *
    * @access public
    *
    * @return array Widget scripts dependencies.
    */
   public function get_script_depends() {
      return ['tjcore'];
   }

   /**
    * Register the widget controls.
    *
    * Adds different input fields to allow the user to change and customize the widget settings.
    *
    * @since 1.0.0
    *
    * @access protected
    */
   protected function register_controls() {
      // Team group
      $this->start_controls_section(
         'tj_button',
         [
            'label' => esc_html__('Button', 'tjcore'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
         ]
      );
      $this->add_control(
         'tj_btn_type',
         [
            'label' => esc_html__('Type', 'tjcore'),
            'type' => Controls_Manager::SELECT,
            'options' => [
               'default' => __('Default', 'tjcore'),
               'white' => __('White', 'tjcore'),
            ],
            'default' => 'default',
         ]
      );
      $this->add_control(
         'tj_btn_size',
         [
            'label' => esc_html__('Size', 'tjcore'),
            'type' => Controls_Manager::SELECT,
            'options' => [
               'default' => __('Default', 'tjcore'),
               'small' => __('Small', 'tjcore'),
            ],
            'default' => 'default',
         ]
      );
      $this->add_control(
         'tj_btn_text',
         [
            'label' => esc_html__('Button Text', 'tjcore'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Button Text', 'tjcore'),
            'dynamic' => [
               'active' => true,
            ],
         ]
      );

      $this->add_control(
         'tj_btn_link_type',
         [
            'label' => esc_html__('Link Type', 'tjcore'),
            'type' => Controls_Manager::SELECT,
            'options' => [
               '1' => 'Custom Link',
               '2' => 'Internal Page',
            ],
            'default' => '1',
            'label_block' => true,
         ]
      );

      $this->add_control(
         'tj_btn_link',
         [
            'label' => esc_html__('Button link', 'tjcore'),
            'type' => Controls_Manager::URL,
            'dynamic' => [
               'active' => true,
            ],
            'placeholder' => esc_html__('https://your-link.com', 'tjcore'),
            'show_external' => false,
            'default' => [
               'url' => '#',
               'is_external' => true,
               'nofollow' => true,
               'custom_attributes' => '',
            ],
            'condition' => [
               'tj_btn_link_type' => '1',
            ],
            'label_block' => true,
         ]
      );
      $this->add_control(
         'tj_btn_page_link',
         [
            'label' => esc_html__('Select Button Page', 'tjcore'),
            'type' => Controls_Manager::SELECT2,
            'label_block' => true,
            'options' => tj_get_all_pages(),
            'condition' => [
               'tj_btn_link_type' => '2',
            ]
         ]
      );
      $this->add_responsive_control(
         'btn_alignment',
         [
            'label' => esc_html__('Alignment', 'tjcore'),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
               'start' => [
                  'title' => esc_html__('Left', 'tjcore'),
                  'icon' => 'eicon-text-align-left',
               ],
               'center' => [
                  'title' => esc_html__('Center', 'tjcore'),
                  'icon' => 'eicon-text-align-center',
               ],
               'end' => [
                  'title' => esc_html__('Right', 'tjcore'),
                  'icon' => 'eicon-text-align-right',
               ],
            ],
            'default' => 'center',
            'toggle' => true,
            'selectors' => [
               '{{WRAPPER}} .tj_custom_btn' => 'text-align: {{VALUE}};',
            ],
            'separator' => 'before',
         ]
      );
      $this->end_controls_section();


      // TAB_STYLE
      $this->start_controls_section(
         'section_style',
         [
            'label' => __('Button', 'tjcore'),
            'tab' => Controls_Manager::TAB_STYLE,
         ]
      );
      $this->add_group_control(
         \Elementor\Group_Control_Typography::get_type(),
         [
            'name' => 'title_typography',
            'selector' => '{{WRAPPER}} .tj_custom_btn .btn',
         ]
      );

      $this->start_controls_tabs(
         'style_tabs'
      );

      $this->start_controls_tab(
         'style_normal_tab',
         [
            'label' => esc_html__('Normal', 'tjcore'),
         ]
      );

      $this->add_control(
         'text_color',
         [
            'label' => esc_html__('Text Color', 'hold'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .tj_custom_btn .btn' => 'color: {{VALUE}}',
            ],
         ]
      );
      $this->add_group_control(
         \Elementor\Group_Control_Background::get_type(),
         [
            'name' => 'background',
            'types' => ['classic'],
            'exclude' => ['image', 'gradient'],
            'selector' => '{{WRAPPER}} .tj_custom_btn .btn',
         ]
      );

      $this->end_controls_tab();

      $this->start_controls_tab(
         'style_hover_tab',
         [
            'label' => esc_html__('Hover', 'tjcore'),
         ]
      );
      $this->add_control(
         'text_hover_color',
         [
            'label' => esc_html__('Text Color', 'hold'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .tj_custom_btn .btn:hover' => 'color: {{VALUE}}',
            ],
         ]
      );
      $this->add_group_control(
         \Elementor\Group_Control_Background::get_type(),
         [
            'name' => 'hover_background',
            'types' => ['classic'],
            'exclude' => ['image', 'gradient'],
            'selector' => '{{WRAPPER}} .tj_custom_btn .btn:hover',
         ]
      );
      $this->add_control(
         'hover_border_color',
         [
            'label' => esc_html__('Border Color', 'hold'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .tj_custom_btn .btn:hover' => 'border-color: {{VALUE}}',
            ],
         ]
      );

      $this->end_controls_tab();

      $this->end_controls_tabs();
      $this->add_control(
         'border_type',
         [
            'label' => esc_html__('Border Type', 'tjcore'),
            'type' => Controls_Manager::SELECT,
            'options' => [
               'none' => 'None',
               'solid' => 'Solid',
               'double' => 'Double',
               'dotted' => 'Dotted',
               'dashed' => 'Dashed',
            ],
            'default' => 'none',
            'separator' => 'before',
         ]
      );
      $this->add_responsive_control(
         'border_weight',
         [
            'label' => esc_html__('Weight', 'hold'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px'],
            'selectors' => [
               '{{WRAPPER}} .tj_custom_btn .btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
               'border_type!' => 'none',
            ]
         ]
      );
      $this->add_control(
         'border_color',
         [
            'label' => esc_html__('Color', 'hold'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .tj_custom_btn .btn' => 'border-color: {{VALUE}}',
            ],
            'condition' => [
               'border_type!' => 'none',
            ]
         ]
      );
      $this->add_control(
         'border_radius',
         [
            'label' => esc_html__('Border Radius', 'hold'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
               '{{WRAPPER}} .tj_custom_btn .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
         ]
      );
      $this->add_responsive_control(
         'btn_padding',
         [
            'label' => esc_html__('Padding', 'hold'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
               '{{WRAPPER}} .tj_custom_btn .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'before'
         ]
      );
      $this->end_controls_section();
   }

   /**
    * Render the widget output on the frontend.
    *
    * Written in PHP and used to generate the final HTML.
    *
    * @since 1.0.0
    *
    * @access protected
    */
   protected function render() {
      $settings = $this->get_settings_for_display();
?>
      <?php if ($settings['tj_btn_type']  == 'white' && $settings['tj_btn_size'] == 'small') :

         // button alignment
         $this->add_render_attribute('tj_button_alignment', 'class', 'tj_custom_btn');
         $this->add_render_attribute('tj_button_alignment', 'class', $settings['border_type']);
         // Link
         if ('2' == $settings['tj_btn_link_type']) {
            $this->add_render_attribute('tj-button-arg', 'href', get_permalink($settings['tj_btn_page_link']));
            $this->add_render_attribute('tj-button-arg', 'target', '_self');
            $this->add_render_attribute('tj-button-arg', 'rel', 'nofollow');
            $this->add_render_attribute('tj-button-arg', 'class', 'btn btn-white btn-small');
         } else {
            if (!empty($settings['tj_btn_link']['url'])) {
               $this->add_link_attributes('tj-button-arg', $settings['tj_btn_link']);
               $this->add_render_attribute('tj-button-arg', 'class', 'btn btn-white btn-small');
            }
         }
      ?>

         <?php if (!empty($settings['tj_btn_text'])) : ?>
            <div <?php echo $this->get_render_attribute_string('tj_button_alignment'); ?>>
               <a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?>>
                  <?php echo $settings['tj_btn_text']; ?>
               </a>
            </div>
         <?php endif; ?>

      <?php elseif ($settings['tj_btn_type']  == 'white' && $settings['tj_btn_size']  == 'default') :

         // button alignment
         $this->add_render_attribute('tj_button_alignment', 'class', 'tj_custom_btn');
         $this->add_render_attribute('tj_button_alignment', 'class', $settings['border_type']);
         // Link
         if ('2' == $settings['tj_btn_link_type']) {
            $this->add_render_attribute('tj-button-arg', 'href', get_permalink($settings['tj_btn_page_link']));
            $this->add_render_attribute('tj-button-arg', 'target', '_self');
            $this->add_render_attribute('tj-button-arg', 'rel', 'nofollow');
            $this->add_render_attribute('tj-button-arg', 'class', 'btn btn-white');
         } else {
            if (!empty($settings['tj_btn_link']['url'])) {
               $this->add_link_attributes('tj-button-arg', $settings['tj_btn_link']);
               $this->add_render_attribute('tj-button-arg', 'class', 'btn btn-white');
            }
         }
      ?>
         <?php if (!empty($settings['tj_btn_text'])) : ?>
            <div <?php echo $this->get_render_attribute_string('tj_button_alignment'); ?>>
               <a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?>>
                  <?php echo $settings['tj_btn_text']; ?>
               </a>
            </div>
         <?php endif; ?>
      <?php elseif ($settings['tj_btn_type']  == 'default' && $settings['tj_btn_size']  == 'small') :

         // button alignment
         $this->add_render_attribute('tj_button_alignment', 'class', 'tj_custom_btn');
         $this->add_render_attribute('tj_button_alignment', 'class', $settings['border_type']);
         // Link
         if ('2' == $settings['tj_btn_link_type']) {
            $this->add_render_attribute('tj-button-arg', 'href', get_permalink($settings['tj_btn_page_link']));
            $this->add_render_attribute('tj-button-arg', 'target', '_self');
            $this->add_render_attribute('tj-button-arg', 'rel', 'nofollow');
            $this->add_render_attribute('tj-button-arg', 'class', 'btn btn-small');
         } else {
            if (!empty($settings['tj_btn_link']['url'])) {
               $this->add_link_attributes('tj-button-arg', $settings['tj_btn_link']);
               $this->add_render_attribute('tj-button-arg', 'class', 'btn btn-small');
            }
         }
      ?>
         <?php if (!empty($settings['tj_btn_text'])) : ?>
            <div <?php echo $this->get_render_attribute_string('tj_button_alignment'); ?>>
               <a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?>>
                  <?php echo $settings['tj_btn_text']; ?>
               </a>
            </div>
         <?php endif; ?>
      <?php else :

         // button alignment
         $this->add_render_attribute('tj_button_alignment', 'class', 'tj_custom_btn');
         $this->add_render_attribute('tj_button_alignment', 'class', $settings['border_type']);

         // Link
         if ('2' == $settings['tj_btn_link_type']) {
            $this->add_render_attribute('tj-button-arg', 'href', get_permalink($settings['tj_btn_page_link']));
            $this->add_render_attribute('tj-button-arg', 'target', '_self');
            $this->add_render_attribute('tj-button-arg', 'rel', 'nofollow');
            $this->add_render_attribute('tj-button-arg', 'class', 'btn');
         } else {
            if (!empty($settings['tj_btn_link']['url'])) {
               $this->add_link_attributes('tj-button-arg', $settings['tj_btn_link']);
               $this->add_render_attribute('tj-button-arg', 'class', 'btn');
            }
         }
      ?>
         <?php if (!empty($settings['tj_btn_text'])) : ?>
            <div <?php echo $this->get_render_attribute_string('tj_button_alignment'); ?>>
               <a <?php echo $this->get_render_attribute_string('tj-button-arg'); ?>>
                  <?php echo $settings['tj_btn_text']; ?>
               </a>
            </div>
         <?php endif; ?>

      <?php endif; ?>





<?php
   }
}

$widgets_manager->register(new TJ_Button());
