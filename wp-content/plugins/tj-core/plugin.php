<?php

namespace TJCore;

use TJCore\PageSettings\Page_Settings;
use Elementor\Controls_Manager;


/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class TJ_Core_Plugin {

  /**
   * Instance
   *
   * @since 1.2.0
   * @access private
   * @static
   *
   * @var Plugin The single instance of the class.
   */
  private static $_instance = null;

  /**
   * Instance
   *
   * Ensures only one instance of the class is loaded or can be loaded.
   *
   * @since 1.2.0
   * @access public
   *
   * @return Plugin An instance of the class.
   */
  public static function instance() {
    if (is_null(self::$_instance)) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  /**
   * Add Category
   */

  public function tj_core_elementor_category($manager) {
    $manager->add_category(
      'tjcore',
      array(
        'title' => esc_html__('TJ Core Addons', 'tjcore'),
        'icon' => 'eicon-banner',
      )
    );
  }

  /**
   * widget_scripts
   *
   * Load required plugin core files.
   *
   * @since 1.2.0
   * @access public
   */
  public function widget_scripts() {
    wp_register_script('tjcore', plugins_url('/assets/js/hello-world.js', __FILE__), ['jquery'], false, true);
  }

  /**
   * Editor scripts
   *
   * Enqueue plugin javascripts integrations for Elementor editor.
   *
   * @since 1.2.1
   * @access public
   */
  public function editor_scripts() {
    add_filter('script_loader_tag', [$this, 'editor_scripts_as_a_module'], 10, 2);

    wp_enqueue_script(
      'tjcore-editor',
      plugins_url('/assets/js/editor/editor.js', __FILE__),
      [
        'elementor-editor',
      ],
      '1.2.1',
      true
    );
  }

  /**
   * tj_enqueue_editor_scripts
   */
  function tj_enqueue_editor_scripts() {
    wp_enqueue_style('tj-element-addons-editor', TJCORE_ADDONS_URL . 'assets/css/editor.css', null, '1.0');
  }

  /**
   * Force load editor script as a module
   *
   * @since 1.2.1
   *
   * @param string $tag
   * @param string $handle
   *
   * @return string
   */
  public function editor_scripts_as_a_module($tag, $handle) {
    if ('tjcore-editor' === $handle) {
      $tag = str_replace('<script', '<script type="module"', $tag);
    }

    return $tag;
  }



  /**
   * Register Widgets
   *
   * Register new Elementor widgets.
   *
   * @since 1.2.0
   * @access public
   *
   * @param Widgets_Manager $widgets_manager Elementor widgets manager.
   */
  public function register_widgets($widgets_manager) {
    // Its is now safe to include Widgets files
    foreach ($this->tjcore_widget_list() as $widget_file_name) {
      require_once(TJCORE_ELEMENTS_PATH . "/{$widget_file_name}.php");
    }
  }

  public function tjcore_widget_list() {
    return [
      'testimonial',
      'team',
      'feature',
      'video-popup',
      'tj-button',
      'faq'
    ];
  }

  /**
   * Add page settings controls
   *
   * Register new settings for a document page settings.
   *
   * @since 1.2.1
   * @access private
   */
  private function add_page_settings_controls() {
    require_once(__DIR__ . '/page-settings/manager.php');
    new Page_Settings();
  }



  public function tj_add_custom_icons_tab($tabs = array()) {

    // $fontawesome_icons = include(TJCORE_INCLUDE_PATH . '/icons/fa-light-fonts.php');

    $tabs['tj-fontawesome-icons'] = array(
      'name' => 'tj-fontawesome-icons',
      'label' => esc_html__('TJ - Fontawesome Pro Light', 'tjcore'),
      'labelIcon' => 'tj-icon',
      'prefix' => 'fa-',
      'displayPrefix' => 'fal',
      'url' => TJCORE_ADDONS_URL . 'assets/css/fontawesome-all.min.css',
      'icons' => include(TJCORE_INCLUDE_PATH . '/icons/fa-light-fonts.php'),
      'ver' => '1.0.0',
    );

    return $tabs;
  }


  /**
   *  Plugin class constructor
   *
   * Register plugin action hooks and filters
   *
   * @since 1.2.0
   * @access public
   */
  public function __construct() {

    // Register widget scripts
    add_action('elementor/frontend/after_register_scripts', [$this, 'widget_scripts']);

    // Register widgets
    add_action('elementor/widgets/register', [$this, 'register_widgets']);

    // Register editor scripts
    add_action('elementor/editor/after_enqueue_scripts', [$this, 'editor_scripts']);

    add_action('elementor/elements/categories_registered', [$this, 'tj_core_elementor_category']);

    // Register custom controls
    // add_action('elementor/controls/controls_registered', [$this, 'register_controls']);

    add_filter('elementor/icons_manager/additional_tabs', [$this, 'tj_add_custom_icons_tab']);

    $this->tj_add_custom_icons_tab();

    add_action('elementor/editor/after_enqueue_scripts', [$this, 'tj_enqueue_editor_scripts']);


    // $this->add_page_settings_controls();
  }
}

// Instantiate Plugin Class
TJ_Core_Plugin::instance();
