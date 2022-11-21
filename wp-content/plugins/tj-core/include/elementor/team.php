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
class TJ_Team extends Widget_Base {

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
      return 'team';
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
      return __('Tj Team', 'tjcore');
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
         'team_list',
         [
            'label' => esc_html__('Teams', 'tjcore'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
         ]
      );

      $repeater = new \Elementor\Repeater();


      $repeater->add_control(
         'team_image',
         [
            'label' => esc_html__('Team Image', 'tjcore'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
               'url' => Utils::get_placeholder_image_src(),
            ],
            'dynamic' => [
               'active' => true,
            ]
         ]
      );
      $repeater->add_control(
         'team_title',
         [
            'label' => esc_html__('Team Title', 'tjcore'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('Team Title', 'tjcore'),
            'label_block' => true,
         ]
      );
      $repeater->add_control(
         'team_content',
         [
            'label' => esc_html__('Team Content', 'tjcore'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'rows' => 10,
            'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ',
            'placeholder' => esc_html__('Type your team content here', 'tjcore'),
         ]
      );
      $this->add_control(
         'team_lists',
         [
            'label' => esc_html__('Team List', 'tjcore'),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' =>  $repeater->get_controls(),
            'default' => [
               [
                  'team_title' => esc_html__('David, <br> Gründer und Geschäftsführer', 'tjcore'),
                  'team_content' => esc_html__('Hier steht ein kleiner Satz, was dem Teammitglied wichtig ist und was sie ausmacht.', 'tjcore'),
               ],
               [
                  'team_title' => esc_html__('David, <br> Gründer und Geschäftsführer', 'tjcore'),
                  'team_content' => esc_html__('Hier steht ein kleiner Satz, was dem Teammitglied wichtig ist und was sie ausmacht.', 'tjcore'),
               ],
               [
                  'team_title' => esc_html__('David, <br> Gründer und Geschäftsführer', 'tjcore'),
                  'team_content' => esc_html__('Hier steht ein kleiner Satz, was dem Teammitglied wichtig ist und was sie ausmacht.', 'tjcore'),
               ],
               [
                  'team_title' => esc_html__('David, <br> Gründer und Geschäftsführer', 'tjcore'),
                  'team_content' => esc_html__('Hier steht ein kleiner Satz, was dem Teammitglied wichtig ist und was sie ausmacht.', 'tjcore'),
               ],

            ],
            'title_field' => '{{{ team_title }}}',
         ]
      );
      $this->add_group_control(
         Group_Control_Image_Size::get_type(),
         [
            'name' => 'thumbnail_size',
            'default' => 'full',
            'exclude' => ['custom'],
            'separator' => 'none',
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

      $this->add_responsive_control(
         'section_padding',
         [
            'label' => esc_html__('Padding', 'hold'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
               '{{WRAPPER}} .team_wrapper .single_slide .team_title, .team_wrapper .single_slide .team_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
         ]
      );
      $this->end_controls_section();

      $this->start_controls_section(
         'single_title',
         [
            'label' => __('Title', 'tjcore'),
            'tab' => Controls_Manager::TAB_STYLE,
         ]
      );
      $this->add_group_control(
         \Elementor\Group_Control_Typography::get_type(),
         [
            'name' => 'title_typography',
            'selector' => '{{WRAPPER}} .team_wrapper .single_slide .team_title h5',
         ]
      );
      $this->add_control(
         'text_color',
         [
            'label' => esc_html__('Title Color', 'hold'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .team_wrapper .single_slide .team_title h5' => 'color: {{VALUE}}',
            ],
         ]
      );
      $this->add_responsive_control(
         'title_margin',
         [
            'label' => esc_html__('Margin', 'hold'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
               '{{WRAPPER}} .team_wrapper .single_slide .team_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
         ]
      );
      $this->end_controls_section();

      $this->start_controls_section(
         'single_content',
         [
            'label' => __('Content', 'tjcore'),
            'tab' => Controls_Manager::TAB_STYLE,
         ]
      );
      $this->add_group_control(
         \Elementor\Group_Control_Typography::get_type(),
         [
            'name' => 'content_typography',
            'selector' => '{{WRAPPER}} .team_wrapper .single_slide .team_content p',
         ]
      );
      $this->add_control(
         'content_color',
         [
            'label' => esc_html__('Content Color', 'hold'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .team_wrapper .single_slide .team_content p' => 'color: {{VALUE}}',
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
               '{{WRAPPER}} .team_wrapper .single_slide .team_content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

      echo '<script>
      jQuery(document).ready(function($) {

         var $slickTeam = $(".team_carousel .sliders");
         $slickTeam.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            appendArrows: $(".team_slider_arrows"),
            autoplay: false,
            infinite: false,
            dots: true,
            arrows: true,
            prevArrow: \'<img class="slick-prev" src="' . get_template_directory_uri() . '/assets/img/icons/arrow_left_dark.svg" alt="">\',
            nextArrow: \'<img class="slick-next" src="' . get_template_directory_uri() . '/assets/img/icons/arrow_right_dark.svg" alt="">\',
            responsive: [{
               breakpoint: 1366,
               settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1,
               },
            },
            {
               breakpoint: 900,
               settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  arrows: false,
               },
            },
            {
               breakpoint: 767,
               settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  arrows: false,
               },
            },
         ],
         });
         $slickTeam.on(
            "init reInit afterChange",
            function (event, slick, currentSlide, nextSlide) {
               if ($(".team_carousel .single_slide:last").hasClass("slick-active")) {
                  $(".team_carousel .slick-list").addClass("hasPadding");
               } else if (
                  $(".team_carousel .single_slide:first").hasClass("slick-active")
               ) {
                  $(".team_carousel .slick-list").removeClass("hasPadding");
               } else {
               }
            }
         );
          
   });
   </script>';
?>

      <section class="team_carousel">
         <div class="container-xxl padding">
            <div class="row">
               <div class="col">
                  <div class="team_wrapper">
                     <div class="sliders">

                        <?php foreach ($settings['team_lists'] as $index => $item) :
                           if (!empty($item['team_image']['url'])) {
                              $tj_team_image = !empty($item['team_image']['id']) ? wp_get_attachment_image_url($item['team_image']['id'], $settings['thumbnail_size_size']) : $item['team_image']['url'];
                              $ttj_team_image_alt = get_post_meta($item["team_image"]["id"], "_wp_attachment_image_alt", true);
                           }
                        ?>
                           <div class="single_slide">

                              <?php if (!empty($tj_team_image)) : ?>
                                 <div class="team_img">
                                    <img src="<?php echo esc_url($tj_team_image); ?>" alt="<?php echo esc_url($ttj_team_image_alt); ?>">
                                 </div>
                              <?php endif; ?>

                              <?php if (!empty($item['team_title'])) : ?>
                                 <div class="team_title">
                                    <h5><?php echo tj_kses($item['team_title']); ?></h5>
                                 </div>
                              <?php endif; ?>
                              <?php if (!empty($item['team_content'])) : ?>
                                 <div class="team_content">
                                    <p><?php echo tj_kses($item['team_content']); ?></p>
                                 </div>
                              <?php endif; ?>
                           </div>

                        <?php endforeach; ?>
                     </div>
                     <div class="team_slider_arrows"></div>
                  </div>
               </div>
            </div>
         </div>
      </section>

<?php
   }
}

$widgets_manager->register(new TJ_Team());
