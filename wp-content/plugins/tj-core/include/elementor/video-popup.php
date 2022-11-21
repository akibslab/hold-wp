<?php

namespace TJCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Background;
use \Elementor\Control_Media;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TJ_Video_Popup extends Widget_Base {

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
      return 'tj-video-popup';
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
      return __('TJ Video', 'tjcore');
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

      // tj_section_title
      $this->start_controls_section(
         'tj_section_title',
         [
            'label' => esc_html__('Content', 'tjcore'),
         ]
      );
      $this->add_control(
         'tj_content',
         [
            'label' => esc_html__('Content', 'tjcore'),
            'description' => tj_get_allowed_html_desc('intermediate'),
            'type' => Controls_Manager::TEXTAREA,
            'default' => esc_html__('Was für ein Video wird hier abgespielt? <br>Würde es benennen', 'tjcore'),
            'placeholder' => esc_html__('Type section content here', 'tjcore'),
         ]
      );
      $this->end_controls_section();

      // tj_video
      $this->start_controls_section(
         'tj_video',
         [
            'label' => esc_html__('Video', 'tjcore'),
         ]
      );

      $this->add_control(
         'tj_video_url',
         [
            'label' => esc_html__('Video', 'tjcore'),
            'type' => Controls_Manager::TEXT,
            'default' => 'https://www.youtube.com/watch?v=AjgD3CvWzS0',
            'title' => esc_html__('Video url', 'tjcore'),
            'label_block' => true,
         ]
      );
      $this->end_controls_section();

      // _tj_image
      $this->start_controls_section(
         '_tj_image_section',
         [
            'label' => esc_html__('Thumbnail', 'tjcore'),
         ]
      );
      $this->add_control(
         'tj_image',
         [
            'label' => esc_html__('Choose Image', 'tjcore'),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );
      $this->add_group_control(
         Group_Control_Image_Size::get_type(),
         [
            'name' => 'tj_image_size',
            'default' => 'full',
            'exclude' => [
               'custom'
            ]
         ]
      );
      $this->add_responsive_control(
         'tj_image_height',
         [
            'label' => esc_html__('Image Height', 'tjcore'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px', '%'],
            'range' => [
               'px' => [
                  'min' => 0,
                  'max' => 1000,
                  'step' => 1,
               ],
               '%' => [
                  'min' => 0,
                  'max' => 100,
               ],
               'default' => [
                  'unit' => 'px',
                  'size' => 395,
               ],
            ],
            'selectors' => [
               '{{WRAPPER}} .video_wrapper' => 'height: {{SIZE}}{{UNIT}};',
            ],
         ]
      );
      $this->add_responsive_control(
         'tj_image_weight',
         [
            'label' => esc_html__('Image Weight', 'tjcore'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => ['px', '%'],
            'range' => [
               'px' => [
                  'min' => 0,
                  'max' => 1000,
                  'step' => 1,
               ],
               '%' => [
                  'min' => 0,
                  'max' => 100,
               ],
               'default' => [
                  'unit' => 'px',
                  'size' => 615,
               ],
            ],
            'selectors' => [
               '{{WRAPPER}} .video_wrapper' => 'width: {{SIZE}}{{UNIT}};',
            ],
         ]
      );
      $this->end_controls_section();



      // TAB_STYLE
      $this->start_controls_section(
         'section_style',
         [
            'label' => __('Style', 'tjcore'),
            'tab' => Controls_Manager::TAB_STYLE,
         ]
      );

      $this->add_group_control(
         \Elementor\Group_Control_Typography::get_type(),
         [
            'name' => 'content_typography',
            'selector' => '{{WRAPPER}} .video_wrapper .video_text',
         ]
      );
      $this->add_control(
         'content_color',
         [
            'label' => esc_html__('Content Color', 'hold'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .video_wrapper .video_text' => 'color: {{VALUE}}',
            ],
         ]
      );
      $this->add_responsive_control(
         'conent_margin',
         [
            'label' => esc_html__('Margin', 'hold'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
               '{{WRAPPER}} .video_wrapper .video_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
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
      <?php
      if (!empty($settings['tj_image']['url'])) {
         $tj_image = !empty($settings['tj_image']['id']) ? wp_get_attachment_image_url($settings['tj_image']['id'], $settings['tj_image_size_size']) : $settings['tj_image']['url'];
         $tj_image_alt           = get_post_meta($settings["tj_image"]["id"], "_wp_attachment_image_alt", true);
      }
      ?>

      <section class="video_section">
         <div class="video_wrapper" style="background-image: url('<?php echo esc_url($tj_image); ?>');">

            <?php if (!empty($settings['tj_content'])) : ?>
               <div class="video_text"><?php echo tj_kses($settings['tj_content']); ?></div>
            <?php endif; ?>
            <?php if (!empty($settings['tj_video_url'])) : ?>
               <a href="<?php echo esc_url($settings["tj_video_url"]); ?>" class="video_icon">
                  <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icons/play_btn.svg'); ?>" alt="">
               </a>
            <?php endif; ?>
         </div>
      </section>

<?php

   }
}

$widgets_manager->register(new TJ_Video_Popup());
