<?php

namespace TJCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Group_Control_Typography;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Tp Core
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TJ_FAQ extends Widget_Base {

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
		return 'tj-faq';
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
		return __('FAQ', 'tjcore');
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

		$this->start_controls_section(
			'_accordion',
			[
				'label' => esc_html__('Accordion', 'tjcore'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'accordion_image',
			[
				'label' => esc_html__('Accordion Image', 'tjcore'),
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
			'accordion_title',
			[
				'label' => esc_html__('Accordion Title', 'tjcore'),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('This is accordion item title', 'tjcore'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'accordion_description',
			[
				'label' => esc_html__('Description', 'tjcore'),
				'description' => tj_get_allowed_html_desc('intermediate'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Facilis fugiat hic ipsam iusto laudantium libero maiores minima molestiae mollitia repellat rerum sunt ullam voluptates? Perferendis, suscipit.',
				'label_block' => true,
			]
		);
		$this->add_control(
			'accordions',
			[
				'label' => esc_html__('Repeater Accordion', 'tjcore'),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'accordion_title' => esc_html__('6 umfangreiche E-Learning Module ', 'tjcore'),
					],
					[
						'accordion_title' => esc_html__('6 Monate persönliche Betreuung', 'tjcore'),
					],
				],
				'title_field' => '{{{ accordion_title }}}',
			]
		);

		$this->add_control(
			'space_accordion_item',
			[
				'label' => esc_html__('Accordion space gap', 'tjcore'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 35,
				],
				'selectors' => [
					'{{WRAPPER}} .tj_faq_accordion .accordion-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'image_style',
			[
				'label' => __('Image', 'tjcore'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__('Image Size', 'tjcore'),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tj_faq_accordion .accordion-item .accordion-header .accordion-button img' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tj_faq_accordion .accordion-item .accordion-header .accordion-button img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'heading_style',
			[
				'label' => __('Heading', 'tjcore'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .tj_faq_accordion .accordion-item .accordion-header .accordion-button',
			]
		);
		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__('Heading Color', 'hold'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tj_faq_accordion .accordion-item .accordion-header .accordion-button' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'heading_margin',
			[
				'label' => esc_html__('Margin', 'hold'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .tj_faq_accordion .accordion-item .accordion-header .accordion-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'body_style',
			[
				'label' => __('Body', 'tjcore'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'body_typography',
				'selector' => '{{WRAPPER}} .tj_faq_accordion .accordion-item .accordion-body p',
			]
		);
		$this->add_control(
			'body_color',
			[
				'label' => esc_html__('Body Color', 'hold'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tj_faq_accordion .accordion-item .accordion-body p' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'body_margin',
			[
				'label' => esc_html__('Margin', 'hold'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .tj_faq_accordion .accordion-item .accordion-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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


		<div class="tj_faq_wrapper">
			<div class="tj_faq_accordion">
				<div class="accordion" id="faqaccordion-<?php echo esc_attr($this->get_id()); ?>">
					<?php foreach ($settings['accordions'] as $index => $item) :
						$collapsed = ($index == '0') ? '' : 'collapsed';
						$aria_expanded = ($index == '0') ? "true" : "false";
						$show = ($index == '0') ? "show" : "";

						if (!empty($item['accordion_image']['url'])) {
							$tj_faq_image = !empty($item['accordion_image']['id']) ? wp_get_attachment_image_url($item['accordion_image']['id']) : $item['accordion_image']['url'];
							$tj_faq_image_alt = get_post_meta($item["accordion_image"]["id"], "_wp_attachment_image_alt", true);
						}
					?>
						<div class="accordion-item">
							<h2 class="accordion-header" id="faqOne-<?php echo esc_attr($index); ?>">
								<button class="accordion-button <?php echo esc_attr($collapsed); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-<?php echo esc_attr($index); ?>" aria-expanded="true" aria-controls="collapseOne-<?php echo esc_attr($index); ?>">
									<?php if (!empty($item['accordion_image']['url'])) : ?>
										<span><img src="<?php echo esc_url($tj_faq_image); ?>" alt="<?php echo esc_attr($tj_faq_image_alt); ?>"></span>
									<?php endif; ?>
									<?php echo esc_html($item['accordion_title']); ?>
								</button>
							</h2>
							<div id="collapseOne-<?php echo esc_attr($index); ?>" class="accordion-collapse collapse <?php echo esc_attr($show); ?>" aria-labelledby="faqOne-<?php echo esc_attr($index); ?>" data-bs-parent="#faqaccordion-<?php echo esc_attr($this->get_id()); ?>">
								<div class="accordion-body">
									<p><?php echo tj_kses($item['accordion_description']); ?></p>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

<?php
	}
}

$widgets_manager->register(new TJ_FAQ());
